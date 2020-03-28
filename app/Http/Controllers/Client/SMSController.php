<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Response;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Member;
use App\Models\Campaign;
use App\Models\DataCampaignSMS;
use App\Models\APICampaignSMS;
use Importer;
use Rap2hpoutre\FastExcel\FastExcel;

class SMSController extends Controller
{
    
    public function importDataSms(Request $request)
    {
    	if(Session::has("client_id"))
        {
        	$campaign_id = $request->get("campaign_id");

            $data 		= Member::where("id", Session::get("client_id"))->first();
            $campaigns 	= Campaign::where("member_id", Session::get("client_id"))->get();
            $campaign_selected = Campaign::where("id", $campaign_id)->first();

            if($campaigns)
            {
            	return view('clients.import_sms', compact('data', 'campaigns', 'campaign_id', 'campaign_selected'));
            }
            else
            {
            	return Redirect::to("/client");
            }
        }
        else
        {
            return Redirect::to("/client");
        }
    }

    function listDataSMSAjax(Request $requests)
    {
    	$campaign_id 			= $requests->get("campaign_id");

    	$records = array();
		$records["data"] = array(); 

		$order = "id";
		$by = "asc";
		$tmp_order = $requests->get("order");
		if(count($tmp_order) > 0)
		{
			$tmp_order = $tmp_order[0];
			switch ($tmp_order['column']) {
				case 1:
					$order = "phone";
					break;
				case 2:
					$order = "content_sms";
					break;
				case 3:
					$order = "status";
					break;
				case 4:
					$order = "time_send";
					break;
			}

			$by = $tmp_order['dir'];
		}

		$where = array();
		$where[] = ['member_id', '=', Session::get("client_id")];
		$where[] = ['campaign_id', '=', $campaign_id];
		
		if($requests->get("id"))
		{
			$where[] = ['id', '=', intval($requests->get("id"))];
		}
		if($requests->get("phone"))
		{
			$where[] = ['phone', 'like', "%".$requests->get("phone")."%"];
		}
		if($requests->get("content_sms"))
		{
			$where[] = ['content_sms', 'like', "%".$requests->get("content_sms")."%"];
		}
		if($requests->get("status") != "" && $requests->get("status") != -1)
		{
			$where[] = ['status', '=', $requests->get("status")];
		}

		if($requests->get("time_send_from"))
		{
			$where[] = ['time_send', '>=', $requests->get("time_send_from")];
		}

		if($requests->get("time_send_to"))
		{
			$where[] = ['time_send', '>=', $requests->get("time_send_to")];
		}

		$iTotalRecords = DataCampaignSMS::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));

		$data = DataCampaignSMS::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		$status_list = array(
		    array("info" => "Waiting"),
		    array("success" => "Done"),
		    array("danger" => "Error")
		  );
		foreach($data as $dt) {
		
			$status = $status_list[$dt->status];

			$records["data"][$i] = array(
			$dt->id,
			$dt->phone,
			$dt->content_sms,
			'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
			date("d/m/Y H:i:s", strtotime($dt->time_send)),
			$dt->status == 0 ? '<a href="'.url('/client/list_campaign/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a>' : '',
			);

			$i++;
		}

		if (!empty($requests->get('customActionType')) && $requests->get('customActionType') == "group_action") {
		$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
		$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
    }

    public function postImportDataSMS(Request $request)
    {
    	$result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $campaign_id 			= $request->get("campaign_id");
	        $file             		= $request->get('file');

	        $rules = array(
	            'campaign_id'     	=> 'required',
	            'file'         		=> 'required',
	        );

	        $message = array(
	            'campaign_id.required'    	=> 'Vui lòng chọn chiến dịch',
	            'file.required'        		=> 'Vui lòng chọn file excel',
	        );

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	        	$file       = $request->file('file');
		        $savePath   = public_path("/uploads/");

		        $extension  = $file->getClientOriginalExtension();
				$fileName  = 'tmp-sms-'.$campaign_id.'.'.$extension;

		        $file->move($savePath, $fileName);

		        $excel = Importer::make('Excel');
		        $excel->load($savePath.$fileName);
		        $collection = $excel->getCollection();

		        $n = count($collection);
		        for($i = 1; $i < $n; $i++) 
		        {
		            $row = $collection[$i]; 

		            if(!empty($row[0]) && !empty($row[1]))
		            {
		            	$phone = getPhoneNumber(!empty($row[0]) ? $row[0] : '');

		                $dt = new DataCampaignSMS;
	                    $dt->member_id          = Session::get("client_id");
	                    $dt->campaign_id        = $campaign_id;
	                    $dt->phone              = $phone;
	                    $dt->content_sms        = !empty($row[1]) ? $row[1] : '';

	                    $carrier 				= getCarrier($dt->phone);
	                    $dt->carrier 			= $carrier;
	                    $dt->save();
		            }
		        }

	            $result->status = true;
	            $result->message = "Bạn đã nhập data thành công thành công.";
	        }
	    }

        return response()->json($result);

    }

    public function reportDataSms()
    {
    	if(Session::has("client_id"))
    	{
    		$campaigns 	= Campaign::where("member_id", Session::get("client_id"))->get();
    		return view("clients.report_sms", compact('campaigns'));
    	}
    	else
    	{
    		return Redirect::to("/client");
    	}
    }

    public function reportDataSmsAjax(Request $requests)
    {
    	$records = array();
		$records["data"] = array(); 

		$order = "id";
		$by = "asc";
		$tmp_order = $requests->get("order");
		if(count($tmp_order) > 0)
		{
			$tmp_order = $tmp_order[0];
			switch ($tmp_order['column']) {
				case 1:
					$order = "campaign_id";
					break;
				case 2:
					$order = "phone";
					break;
				case 3:
					$order = "content_sms";
					break;
				case 4:
					$order = "status";
					break;
				case 5:
					$order = "time_send";
					break;
			}

			$by = $tmp_order['dir'];
		}

		$where = array();
		$where[] = ['member_id', '=', Session::get("client_id")];
		
		if($requests->get("id"))
		{
			$where[] = ['id', '=', intval($requests->get("id"))];
		}
		if($requests->get("campaign_id") != "" && $requests->get("campaign_id") != -1)
		{
			$where[] = ['campaign_id', '=', intval($requests->get("campaign_id"))];
		}
		if($requests->get("phone"))
		{
			$where[] = ['phone', 'like', "%".$requests->get("phone")."%"];
		}
		if($requests->get("content_sms"))
		{
			$where[] = ['content_sms', 'like', "%".$requests->get("content_sms")."%"];
		}
		if($requests->get("status") != "" && $requests->get("status") != -1)
		{
			$where[] = ['status', '=', $requests->get("status")];
		}

		if($requests->get("time_send_from"))
		{
			$where[] = ['time_send', '>=', $requests->get("time_send_from")];
		}

		if($requests->get("time_send_to"))
		{
			$where[] = ['time_send', '>=', $requests->get("time_send_to")];
		}

		$iTotalRecords = DataCampaignSMS::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));

		$data = DataCampaignSMS::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		$status_list = array(
		    array("info" => "Waiting"),
		    array("success" => "Done"),
		    array("danger" => "Error")
		  );
		foreach($data as $dt) {
		
			$status = $status_list[$dt->status];

			$records["data"][$i] = array(
			$dt->id,
			$dt->getCampaign->campaign_name,
			$dt->phone,
			$dt->content_sms,
			'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
			date("d/m/Y H:i:s", strtotime($dt->time_send)),
			'',
			);

			$i++;
		}

		if (!empty($requests->get('customActionType')) && $requests->get('customActionType') == "group_action") {
		$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
		$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
    }

    public function reportDataSmsDownload(Request $requests)
    {
    	$result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";
        
		$order = "id";
		$by = "asc";

		$where = array();
		$where[] = ['member_id', '=', Session::get("client_id")];
		
		if($requests->get("id"))
		{
			$where[] = ['id', '=', intval($requests->get("id"))];
		}
		if($requests->get("campaign_id") != 'null' && $requests->get("campaign_id") != "" && $requests->get("campaign_id") != -1)
		{
			$where[] = ['campaign_id', '=', intval($requests->get("campaign_id"))];
		}
		if($requests->get("phone"))
		{
			$where[] = ['phone', 'like', "%".$requests->get("phone")."%"];
		}
		if($requests->get("content_sms"))
		{
			$where[] = ['content_sms', 'like', "%".$requests->get("content_sms")."%"];
		}
		if($requests->get("status") != "" && $requests->get("status") != -1)
		{
			$where[] = ['status', '=', $requests->get("status")];
		}

		if($requests->get("time_send_from"))
		{
			$where[] = ['time_send', '>=', $requests->get("time_send_from")];
		}

		if($requests->get("time_send_to"))
		{
			$where[] = ['time_send', '>=', $requests->get("time_send_to")];
		}

		$tmp        = createdFolderFileDownload();
        $dir_final  = $tmp['dir_final'];
        $folder     = $tmp['folder'];

        $file_tmp = $folder.'/sms-'.Session::get("client_id").'.xlsx'; 
     
		(new FastExcel($this->usersGenerator($where, $order, $by)))->export($dir_final.$file_tmp, function ($user) {
			$status_list = array(
			array("info" => "Waiting"),
			array("success" => "Done"),
			array("danger" => "Error")
			);
		    return [
		        'ID' 			=> $user->id,
		        'Chiến dịch' 	=> $user->getCampaign->campaign_name,
		        'Phone' 		=> $user->phone,
		        'SMS' 			=> $user->content_sms,
		        'Trạng thái' 	=> current($status_list[$user->status]),
		        'Thời gian gửi' => ($user->status > 0 ? date("d/m/Y H:i:s", strtotime($user->time_send)) : ''),
		    ];
		});
		$path = "";
		$result->status = true;
        $result->message = "";
        $result->link = \URL::asset(\Config::get('constants.LINK_FILE_EXPORT').$file_tmp);

		echo json_encode($result);
    }

    private function usersGenerator($where, $order, $by)
    {
	    foreach (DataCampaignSMS::where($where)->orderBy($order, $by)->cursor() as $user) {
	        yield $user;
	    }
	}

	public function APISMS(Request $request)
	{
		if(Session::has("client_id"))
        {
        	$campaign_id = $request->get("campaign_id");

            $data 		= Member::where("id", Session::get("client_id"))->first();
            $campaigns 	= Campaign::where("member_id", Session::get("client_id"))->get();
            $campaign_selected = Campaign::where("id", $campaign_id)->first();

            if($campaigns)
            {
            	return view('clients.api_sms', compact('data', 'campaigns', 'campaign_id', 'campaign_selected'));
            }
            else
            {
            	return Redirect::to("/client");
            }
        }
        else
        {
            return Redirect::to("/client");
        }
	}

	public function createAPI(Request $request)
	{
		$result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $campaign_id 			= $request->get("campaign_id");

	        $rules = array(
	            'campaign_id'     	=> 'required',
	        );

	        $message = array(
	            'campaign_id.required'    	=> 'Vui lòng chọn chiến dịch',
	        );

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	        	$check = APICampaignSMS::where("member_id", Session::get("client_id"))->where("campaign_id", $campaign_id)->first();
	        	if(!$check)
	        	{
		        	$dt 					= new APICampaignSMS;
	                $dt->member_id          = Session::get("client_id");
	                $dt->campaign_id        = $campaign_id;
	                $dt->app_key            = quickRandom(12);
	                $dt->app_scret        	= quickRandom(32);
	                $dt->save();

	                $result->status = true;
	            	$result->message = "Bạn đã tạo API thành công thành công.";
	            }
	            else
	            {
	            	$result->message = "Chiến dịch này đã tạo API rồi";
	            }
	        }
	    }

        return response()->json($result);
	}

	public function changeAPI($id)
	{
		if(Session::has("client_id"))
		{
			$check = APICampaignSMS::where("member_id", Session::get("client_id"))->where("id", intval($id))->first();
	    	if($check)
	    	{
	            $check->app_key            	= quickRandom(12);
	            $check->app_scret        	= quickRandom(32);
	            $check->save();

	            return Redirect::to("/client/api_sms");
	        }
	        else
	        {
	        	return Redirect::to("/client/api_sms");
	        }
	    }
        else
        {
            return Redirect::to("/client");
        }
	}

	public function APISMSAjax(Request $requests)
	{
		$records = array();
		$records["data"] = array(); 

		$order = "id";
		$by = "asc";
		$tmp_order = $requests->get("order");
		if(count($tmp_order) > 0)
		{
			$tmp_order = $tmp_order[0];
			switch ($tmp_order['column']) {
				case 1:
					$order = "campaign_id";
					break;
				case 4:
					$order = "status";
					break;
			}

			$by = $tmp_order['dir'];
		}

		$where = array();
		$where[] = ['member_id', '=', Session::get("client_id")];
		
		if($requests->get("id"))
		{
			$where[] = ['id', '=', intval($requests->get("id"))];
		}
		if($requests->get("campaign_id") != "" && $requests->get("campaign_id") != -1)
		{
			$where[] = ['campaign_id', '=', intval($requests->get("campaign_id"))];
		}
		if($requests->get("status") != "" && $requests->get("status") != -1)
		{
			$where[] = ['status', '=', $requests->get("status")];
		}

		$iTotalRecords = APICampaignSMS::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));

		$data = APICampaignSMS::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		foreach($data as $dt) {

			$records["data"][$i] = array(
			$dt->id,
			$dt->getCampaign->campaign_name,
			$dt->app_key,
			$dt->app_scret,
			'<input type="checkbox" data-id="'.$dt->id.'" class="make-switch" '.($dt->status ? 'checked' : '').' data-on-color="success" data-off-color="danger">',
			'<a href="'.url('/client/api_sms/renewkey/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Đổi API</a>',
			);

			$i++;
		}

		if (!empty($requests->get('customActionType')) && $requests->get('customActionType') == "group_action") {
		$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
		$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}

		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;

		echo json_encode($records);
	}

	public function APISMSUpdateStatus(Request $request)
	{
		$result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $id 			= $request->get("id");
	        $status 		= $request->get("status");

	        $rules = array(
	            'id'     	=> 'required',
	        );

	        $message = array(
	            'id.required'    	=> 'Vui lòng chọn chiến dịch',
	        );

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	        	$check = APICampaignSMS::where("member_id", Session::get("client_id"))->where("id", $id)->first();
	        	if($check)
	        	{
		        	$check->status = $status;
		        	$check->save();

	                $result->status = true;
	            	$result->message = "Bạn đã cập nhật thành công thành công.";
	            }
	            else
	            {
	            	$result->message = "Chiến dịch này đã tạo API rồi";
	            }
	        }
	    }

        return response()->json($result);
	}
}
