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
use App\Models\DataTopUpMember;
use App\Models\DataHistoryMember;

class AccountController extends Controller
{
    public function login()
    {
    	if(!Session::has("client_id"))
        {
            return view("clients.login");
        }
        else
        {
            return Redirect::to("/client");
        }
    	
    }

    public function postLogin(Request $request)
    {
    	$result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập email và mật khẩu";
        $result->link = "";

        $email      = $request->get('email');
        $password   = $request->get('password');

        $rules = array(
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        );

        $message = array(
            'email.required' => 'Vui lòng nhập email / id của bạn',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'g-recaptcha-response.required' => 'Vui lòng kiểm tra captcha',
            'g-recaptcha-response.captcha' => 'Captcha không hợp lệ'
        );

        $validator = validator()->make($request->all(), $rules, $message);
        if ($validator->fails())
        {
            $errors = $validator->errors()->all();
            $result->message = $errors[0];
        }
        else 
        {
            $email = strtolower($email);

            $user   = Member::where("is_active", 1)->where("email", $email)->first();
            
            if($user)
            {
                if(Hash::check($password, $user->password))
                {
                    $this->saveSessionUser($user);

                    $user->ip_last_login        = getIP();
                    $user->time_last_login      = Carbon::now();
                    $user->save();

                    $result->status = true;
                    $result->message = "";
                }
                else
                {
                    $result->message = "Mật khẩu không đúng";
                }
            }
            else
            {
            	// $user = new Member;
            	// $user->email 			= $email;
            	// $user->password         = Hash::make($password);
            	// $user->is_active		= 1;
            	// $user->fullname 		= "Phong Tran";
            	// $user->address 			= "Quận 10";
            	// $user->phone 			= "0944223879";
            	// $user->save();

                $result->message = "Tài khoản này không tồn tại";
            }
        }

        return response()->json($result);
    	
    }

    public function logout()
    {
        if(Session::has("client_id"))
        {
            Session::forget('client_id');
            Session::forget('client_email');
            Session::forget('client_full_name');
            Session::forget('client_phone');

            return Redirect::to("/client");
        }
        else
        {
            return Redirect::to("/client");
        }
    }

    public function profile()
    {
        if(Session::has("client_id"))
        {
            $data = Member::where("id", Session::get("client_id"))->first();
            return view('clients.profile', compact('data'));
        }
        else
        {
            return Redirect::to("/client");
        }
    }

    public function postProfile(Request $request)
    {
        $result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $full_name              = $request->get('fullname');
	        $phone                  = $request->get('phone');
	        $address       			= $request->get('address');

	        $rules = array(
	            'fullname'              => 'required',
	            'phone'                 => 'required',
	            'address' 				=> 'required',
	        );

	        $message = array(
	            'fullname.required'    	=> 'Vui lòng nhập tên của bạn',
	            'phone.required'        => 'Vui lòng nhập số điện thoại',
	            'address.required' 		=> 'Vui lòng nhập địa chỉ',
	        );

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	            $user = Member::where("id", Session::get("client_id"))->first();
	            if($user)
	            {
	                $user->fullname            	= $full_name;
	                $user->phone                = $phone;
	                $user->address          	= $address;
	                $user->save();

	                $result->status = true;
	                $result->message = "Bạn đã cập nhật thông tin thành công.";
	            }
	            else
	            {
	                $result->message = "Email này đã đăng ký trước đó";
	            }
	        }
	    }

        return response()->json($result);
    }

    public function payment()
    {
    	if(Session::has("client_id"))
        {
            $data = Member::where("id", Session::get("client_id"))->first();
            return view('clients.payment', compact('data'));
        }
        else
        {
            return Redirect::to("/client");
        }
    }

    function listPaymentAjax(Request $requests)
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
					$order = "monery";
					break;
				case 2:
					$order = "type";
					break;
				case 3:
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
		if($requests->get("status") != "" && $requests->get("status") != -1)
		{
			$where[] = ['status', '=', $requests->get("status")];
		}

		$iTotalRecords = DataTopUpMember::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));

		$data = DataTopUpMember::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		$status_list = array(
		    array("danger" => "Pending"),
		    array("success" => "Done")
		  );
		foreach($data as $dt) {
		
			$status = $status_list[$dt->status];

			$records["data"][$i] = array(
			$dt->id,
			formatCurrency($dt->monery),
			$dt->type,
			date("d/m/Y H:i:s", strtotime($dt->created_at)),
			'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
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

    public function paymentHistory()
    {
    	if(Session::has("client_id"))
        {
            $data = Member::where("id", Session::get("client_id"))->first();
            return view('clients.payment_history', compact('data'));
        }
        else
        {
            return Redirect::to("/client");
        }
    }

    function paymentHistoryAjax(Request $requests)
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
					$order = "monery";
					break;
				case 2:
					$order = "content";
					break;
				case 3:
					$order = "created_at";
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

		$iTotalRecords = DataHistoryMember::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));

		$data = DataHistoryMember::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		$status_list = array(
		    array("danger" => "Pending"),
		    array("success" => "Done")
		  );
		foreach($data as $dt) {
		
			$status = $status_list[$dt->status];

			$records["data"][$i] = array(
			$dt->id,
			formatCurrency($dt->monery),
			$dt->content,
			date("d/m/Y H:i:s", strtotime($dt->created_at)),
			'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
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

    public function postChangePassword(Request $request)
    {
        $result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $current_password       = $request->get('current_password');
	        $password               = $request->get('password');
	        $password_confirmation  = $request->get('password_confirmation');

	        $rules = array();

	        $message = array();

	        $rules['current_password']                  = 'required';
	        $message['current_password.required']       = 'Vui lòng nhập mật khẩu';
	        $rules['password']                          = 'required|confirmed|min:6';
	        $message['password.required']               = 'Vui lòng nhập mật khẩu';
	        $message['password.min']                    = 'Mật khẩu phải trên 6 ký tự';
	        $message['password.confirmed']              = 'Xác nhận mật khẩu không chính xác';
	        $rules['password_confirmation']             = 'required|same:password';
	        $message['password_confirmation.required']  = 'Mật khẩu không trùng khớp';

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	            $user = Member::where("id", Session::get("client_id"))->first();
	            if($user)
	            {
	            	if(!empty($current_password))
	                {
	                    if(Hash::check($current_password, $user->password))
	                    {
	                        if($password == $password_confirmation)
	                        {
	                            $user->password  = Hash::make($password_confirmation);
	                            $user->save();

	                            $result->status = true;
	                			$result->message = "Bạn đã cập nhật mật khẩu thành công.";
	                        }
	                        else
	                        {
	                            $result->status = false;
	                            $result->message = "Mật khẩu không trùng khớp";
	                        }
	                    }
	                    else
	                    {
	                        $result->status = false;
	                        $result->message = "Mật khẩu hiện tại không đúng";
	                    }
	                }
	            }
	            else
	            {
	                $result->message = "Email này đã đăng ký trước đó";
	            }
	        }
	    }

        return response()->json($result);
    }

    public function postChangeAvatar(Request $request)
    {
        $result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $user = Member::where("id", Session::get("client_id"))->first();
            if($user)
            {
        
                if ($request['avatar'] != null)
                {
                    if(!empty($user->avatar))
                    {
                        unlink(\Config::get('constants.DIR_AVATAR').$user->avatar);
                    }
                    $tmp        = createdFolderAvatar();
                    $dir_final  = $tmp['dir_final'];
                    $folder     = $tmp['folder'];

				    $file = $request['avatar'];

                    $pic_1      = $file->getClientOriginalName();
                    $pic_1      = explode(".", $pic_1);
                    $extension  = $file->getClientOriginalExtension();
                    $file_name  = 'avatar-'.time().'.'.$extension;

                    $file->move($dir_final.$folder, $file_name);

                    if(!empty($file_name))
                    {
	                    $file_name = $folder.'/'.$file_name;
	                    $user->avatar   = $file_name;
	                    $user->save();
	                    $result->status = true;
	                	$result->message = "Bạn đã cập nhật avatar thành công.";

	                	Session::put("client_avatar", $user->avatar);
        				Session::save();
	                }
                    else
                    {
                    	$result->message = "Không lưu được hình ảnh";
                    }
                }
                else
                {
                	$result->message = "Không có Avatar";
                }
            }
            else
            {
                $result->message = "Email này đã đăng ký trước đó";
            }
        }

        return response()->json($result);
    }

    public function createCampaign()
    {
        if(Session::has("client_id"))
        {
            $data = Member::where("id", Session::get("client_id"))->first();
            return view('clients.create_campaign', compact('data'));
        }
        else
        {
            return Redirect::to("/client");
        }
    }

    public function postCreateCampaign(Request $request)
    {
        $result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $campaign_name          = $request->get('campaign_name');
	        $start_run             	= $request->get('start_run');
	        $end_run       			= $request->get('end_run');
	        $budget_limit       	= $request->get('budget_limit');
	        $note       			= $request->get('note');

	        $rules = array(
	            'campaign_name'     => 'required',
	            'start_run'         => 'required',
	            'end_run' 			=> 'required',
	            'budget_limit' 		=> 'required',
	        );

	        $message = array(
	            'campaign_name.required'    => 'Vui lòng nhập tên chiến dịch',
	            'start_run.required'        => 'Vui lòng chọn thời gian chạy chiến dịch',
	            'end_run.required' 			=> 'Vui lòng chọn thời gian chạy chiến dịch',
	            'budget_limit.required' 	=> 'Vui lòng nhập số tiền giới hạn',
	        );

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	        	$campaign = new Campaign;
	        	$campaign->member_id 		= Session::get("client_id");
	        	$campaign->campaign_name 	= $campaign_name;
	        	$campaign->start_run 		= date("Y-m-d", strtotime($start_run));
	        	$campaign->end_run 			= date("Y-m-d", strtotime($end_run));
	        	$campaign->budget_limit 	= intval($budget_limit);
	        	$campaign->note 			= $note;
	        	$campaign->price_sms 		= 200;
	        	$campaign->price_call 		= 100;
	        	$campaign->is_active 		= 0;
	        	$campaign->save();

	        	$member = Member::where("id", Session::get("client_id"))->first();
	        	if($member)
	        	{
	        		$member->total_campaign = Campaign::where("member_id", Session::get("client_id"))->count();
	        		$member->save();
	        	}

	            $result->status = true;
	            $result->message = "Bạn đã tạo chiến dịch thành công thành công.";
	        }
	    }

        return response()->json($result);
    }

    public function listCampaign()
    {
    	if(Session::has("client_id"))
    	{
    		return view("clients.list_campaign");
    	}
    	else
    	{
    		return Redirect::to("/client");
    	}
    }

    function listCampaignAjax(Request $requests)
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
					$order = "campaign_name";
					break;
				case 2:
					$order = "start_run";
					break;
				case 3:
					$order = "end_run";
					break;
				case 4:
					$order = "budget_limit";
					break;
				case 5:
					$order = "amount_used";
					break;
				case 6:
					$order = "price_sms";
					break;
				case 7:
					$order = "price_call";
					break;
				case 8:
					$order = "is_active";
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
		if($requests->get("campaign_name"))
		{
			$where[] = ['campaign_name', 'like', "%".$requests->get("campaign_name")."%"];
		}
		if($requests->get("is_active") != "" && $requests->get("is_active") != -1)
		{
			$where[] = ['is_active', '=', $requests->get("is_active")];
		}

		if($requests->get("start_run_from"))
		{
			$where[] = ['start_run', '>=', $requests->get("start_run_from")];
		}
		if($requests->get("start_run_to"))
		{
			$where[] = ['start_run', '<=', $requests->get("start_run_to")];
		}

		if($requests->get("end_run_from"))
		{
			$where[] = ['end_run', '>=', $requests->get("end_run_from")];
		}
		if($requests->get("end_run_to"))
		{
			$where[] = ['end_run', '<=', $requests->get("end_run_to")];
		}

		if($requests->get("budget_limit_from"))
		{
			$where[] = ['budget_limit', '>=', $requests->get("budget_limit_from")];
		}
		if($requests->get("budget_limit_to"))
		{
			$where[] = ['budget_limit', '<=', $requests->get("budget_limit_to")];
		}

		if($requests->get("amount_used_from"))
		{
			$where[] = ['amount_used', '>=', $requests->get("amount_used_from")];
		}
		if($requests->get("amount_used_to"))
		{
			$where[] = ['amount_used', '<=', $requests->get("amount_used_to")];
		}

		$iTotalRecords = Campaign::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));

		$data = Campaign::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		$status_list = array(
		    array("danger" => "Chưa chạy"),
		    array("success" => "Đang chạy"),
		    array("info" => "Đã chạy thành công")
		  );
		foreach($data as $dt) {
		
			$status = $status_list[$dt->is_active];

			$records["data"][$i] = array(
			$dt->id,
			$dt->campaign_name,
			date("d/m/Y H:i:s", strtotime($dt->start_run)),
			date("d/m/Y H:i:s", strtotime($dt->end_run)),
			formatCurrency($dt->budget_limit),
			formatCurrency($dt->amount_used),
			formatCurrency($dt->price_sms, ""),
			formatCurrency($dt->price_call, ""),
			'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
			'<a href="'.url('/client/list_campaign/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a>',
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

    public function editCampaign($id)
    {
        if(Session::has("client_id"))
        {
            $data 		= Member::where("id", Session::get("client_id"))->first();
            $campaign 	= Campaign::where("id", $id)->first();
            if($campaign)
            {
            	return view('clients.edit_campaign', compact('data', 'campaign'));
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

    public function postEditCampaign(Request $request)
    {
        $result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập đầy đủ thông tin";

        if(Session::has("client_id"))
        {
	        $campaign_name          = $request->get('campaign_name');
	        $start_run             	= $request->get('start_run');
	        $end_run       			= $request->get('end_run');
	        $budget_limit       	= $request->get('budget_limit');
	        $note       			= $request->get('note');

	        $rules = array(
	            'campaign_name'     => 'required',
	            'start_run'         => 'required',
	            'end_run' 			=> 'required',
	            'budget_limit' 		=> 'required',
	        );

	        $message = array(
	            'campaign_name.required'    => 'Vui lòng nhập tên chiến dịch',
	            'start_run.required'        => 'Vui lòng chọn thời gian chạy chiến dịch',
	            'end_run.required' 			=> 'Vui lòng chọn thời gian chạy chiến dịch',
	            'budget_limit.required' 	=> 'Vui lòng nhập số tiền giới hạn',
	        );

	        $validator = validator()->make($request->all(), $rules, $message);
	        if ($validator->fails())
	        {
	            $errors = $validator->errors()->all();
	            $result->message = $errors[0];
	        }
	        else 
	        {
	        	$campaign = new Campaign;
	        	$campaign->member_id 		= Session::get("client_id");
	        	$campaign->campaign_name 	= $campaign_name;
	        	$campaign->start_run 		= date("Y-m-d", strtotime($start_run));
	        	$campaign->end_run 			= date("Y-m-d", strtotime($end_run));
	        	$campaign->budget_limit 	= intval($budget_limit);
	        	$campaign->note 			= $note;
	        	$campaign->price_sms 		= 200;
	        	$campaign->price_call 		= 100;
	        	$campaign->is_active 		= 0;
	        	$campaign->save();

	            $result->status = true;
	            $result->message = "Bạn đã tạo chiến dịch thành công thành công.";
	        }
	    }

        return response()->json($result);
    }

    private function saveSessionUser($user)
    {
        Session::put("client_id", $user->id);
        Session::put("client_email", $user->email);
        Session::put("client_full_name", $user->fullname);
        Session::put("client_phone", $user->phone);
        Session::put("client_avatar", $user->avatar);
        Session::save();
    }
}
