<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyTitle;
use Illuminate\Support\Facades\Redirect;

class CompanyTitleController extends BaseController
{
    public function index(Request $requests)
    {
    	parent::index($requests);
    	
    	$title = "Company Info Page";

    	return view("admin.company_title", compact('title'));
    }

    function getDataAjax(Request $requests)
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
					$order = "name";
					break;
				case 2:
					$order = "description";
					break;
			}

			$by = $tmp_order['dir'];
		}

		$where = array();
		if($requests->get("id"))
		{
			$where[] = ['id', '=', intval($requests->get("id"))];
		}
		if($requests->get("name"))
		{
			$where[] = ['name', 'like', "%".$requests->get("name")."%"];
		}
		if($requests->get("description"))
		{
			$where[] = ['description', 'like', "%".$requests->get("description")."%"];
		}

		$iTotalRecords 		= CompanyTitle::where($where)->count();
    	$iDisplayLength 	= intval($requests->get('length'));
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart 		= intval($requests->get('start'));
		$sEcho 				= intval($requests->get('draw'));
		$start 				= intval($requests->get('start'));

		$data 				= CompanyTitle::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i = 0;

		foreach($data as $dt) {
			
			$records["data"][$i] = array(
			$dt->id,
			$dt->title,
			$dt->description,
			'<a href="'.url('cms/company-title/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a> 
			<a href="javascript:onDelete('.$dt->id.', \''.url('cms/company-title/delete/'.$dt->id).'\');" class="btn btn-xs default btn-editable delete_record"><i class="fa fa-times"></i> Delete</a>',
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

    public function addData(Request $requests)
    {
    	parent::index($requests);
    	
    	if ($requests->isMethod('post'))
    	{
    		$rules = array(
	            'name' => 'required',
	            'description' => 'required',
	        );

	        $message = array(
	            'name.required' => 'The Name is required and cannot be empty',
	            'description.required' => 'The Name is required and cannot be empty'
	        );
	        $validator = validator()->make($requests->all(), $rules, $message);
	        if ($validator->fails())
	        {
	        	$errors = $validator->errors()->all();
	        	return response()->json(['status' => 'error', 'message' => $errors[0]]);
	    	}
	    	else
	    	{
	    		$user = new CompanyTitle;
	    		$user->title 			= $requests->get("name");
	    		$user->description 			= $requests->get("description");
	    		$user->save();

	    		return response()->json(['status' => 'success', 'link' => url('/cms/company-title/lists')]);
	    	}
	    }
	    else
	    {
	    	$title = "About Page";
	    	return view("admin.company_title_add", compact('title'));
    	}
    }

    function editData($id, Request $requests)
    {
    	parent::index($requests);
    	if ($requests->isMethod('post'))
    	{
    		$rules = array(
	            'name' => 'required'
	        );

	        $message = array(
	            'name.required' => 'The Name is required and cannot be empty'
	        );
	        $validator = validator()->make($requests->all(), $rules, $message);
	        if ($validator->fails())
	        {
	        	return response()->json(['status' => 'error', 'message' => $validator->errors()]);
	    	}
	    	else
	    	{
	    		$user = CompanyTitle::where("id", $id)->first();
	    		if($user)
	    		{
		    		$user->title 			= $requests->get("name");
		    		$user->description 			= $requests->get("description");
		    		$user->save();

		    		return response()->json(['status' => 'success', 'link' => url('/cms/company-title/lists')]);
	    		}
	    		else
	    		{
	    			return response()->json(['status' => 'error', 'message' => "Item không tồn tại"]);
	    		}
	    	}
	    }
	    else
	    {
	    	$title = "Conpany Info Page";

	    	$content 	= CompanyTitle::where("id", $id)->first();
	    	
	    	return view("admin.company_title_edit", compact('title', 'content'));
    	}
    }

    function deleteData($id)
    {
		$user = CompanyTitle::where("id", $id)->first();
		if($user)
		{
			$user->delete();
		}

		return Redirect::to('cms/company-title/lists');
    }
}
