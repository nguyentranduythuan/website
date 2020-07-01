<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\AdminUser;
use App\Models\AdminMenu;
use Hash;

class PermissionsController extends BaseController
{
    //

    public function index(Request $requests)
    {
    	parent::index($requests);
    	
    	$title = "Dashboard Page";

    	$data = "";
    	return view("admin.permissions", compact('title', 'data'));
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
					$order = "username";
					break;
				case 2:
					$order = "fullname";
					break;
				case 3:
					$order = "is_active";
					break;
			}

			$by = $tmp_order['dir'];
		}

		$admin_user_id = Session::get('admin_user_id');
		$where = array();
		if($admin_user_id != 1)
		{
			$where[] = ['id', '=', $admin_user_id];
		}
		else
		{
			if($requests->get("id"))
			{
				$where[] = ['id', '=', intval($requests->get("id"))];
			}
			$where[] = ['group_id', "<", 2];
		}
		if($requests->get("username"))
		{
			$where[] = ['username', 'like', "%".$requests->get("username")."%"];
		}
		if($requests->get("fullname"))
		{
			$where[] = ['fullname', 'like', "%".$requests->get("fullname")."%"];
		}
		if($requests->get("is_active"))
		{
			$where[] = ['is_active', '=', intval($requests->get("is_active"))];
		}

		$iTotalRecords = AdminUser::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart = intval($requests->get('start'));
		$sEcho = intval($requests->get('draw'));
		$start = intval($requests->get('start'));
		
		$data = AdminUser::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();

		$i =0;

		$status_list = array(
		    array("danger" => "Không hoạt động"),
		    array("success" => "Hoạt động")
		  );
		foreach($data as $dt) {
		
			$status = $status_list[$dt->is_active];
			$records["data"][$i] = array(
			$dt->id,
			$dt->username,
			$dt->fullname,
			'<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
			'<a href="'.url('cms/permissions/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Chỉnh sửa</a> 
			<a href="javascript:onDelete('.$dt->id.', \''.url('cms/permissions/delete/'.$dt->id).'\');" class="btn btn-xs default btn-editable delete_record"><i class="fa fa-times"></i> Xóa</a>',
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
    	
    	if(Session::get('admin_group') == 1)
    	{
	    	if ($requests->isMethod('post'))
	    	{
	    		$rules = array(
		            'username' => 'required',
		            'fullname' => 'required'
		        );

		        $message = array(
		            'username.required' => 'The User Name is required and cannot be empty',
		            'fullname.required' => 'The Full Name is required and cannot be empty'
		        );
		        $validator = validator()->make($requests->all(), $rules, $message);
		        if ($validator->fails())
		        {
		        	$errors = $validator->errors()->all();
		        	return response()->json(['status' => 'error', 'message' => $errors[0]]);
		    	}
		    	else
		    	{
		    		$user = new AdminUser;
		    		$user->username 	= $requests->get("username");
		    		$user->group_id 	= 0;
		    		$user->password 	= Hash::make($requests->get("password"));
		    		$user->fullname 	= $requests->get("fullname");
		    		$user->permissions 	= implode(",", $requests->get("permissions"));
		    		$user->is_active 	= $requests->get("is_active");
		    		$user->save();

		    		return response()->json(['status' => 'success', 'link' => url('/cms/permissions/lists')]);
		    	}
		    }
		    else
		    {
		    	$title = "Dashboard Page";

		    	$data = AdminMenu::where("parent_id", 0)->get();
		    	return view("admin.permissions_add", compact('title', 'data'));
	    	}
	    }
    }

    function editData($id, Request $requests)
    {
    	parent::index($requests);
	    $admin_user_id = Session::get('admin_user_id');

    	if(Session::get('admin_group') == 2)
    	{
			if ($requests->isMethod('post'))
	    	{
	    		$rules = array(
		            'username' => 'required',
		            'fullname' => 'required'
		        );

		        $message = array(
		            'username.required' => 'The User Name is required and cannot be empty',
		            'fullname.required' => 'The Full Name is required and cannot be empty'
		        );
		        $validator = validator()->make($requests->all(), $rules, $message);
		        if ($validator->fails())
		        {
		        	return response()->json(['status' => 'error', 'message' => $validator->errors()]);
		    	}
		    	else
		    	{
		    		$user = AdminUser::where("id", $id)->first();
		    		if($user)
		    		{
			    		$user->username 		= $requests->get("username");
			    		if(!empty($requests->get("password")))
			    			$user->password 	= Hash::make($requests->get("password"));
			    		$user->fullname 		= $requests->get("fullname");
			    		$user->email 			= $requests->get("email");
			    		$user->phone 			= $requests->get("phone");
			    		$user->save();

			    		return response()->json(['status' => 'success', 'link' => url('/cms/permissions/lists')]);
		    		}
		    		else
		    		{
		    			return response()->json(['status' => 'error', 'message' => "User không tồn tại"]);
		    		}
		    	}
		    }
		    else
		    {
		    	$title = "Dashboard Page";

		    	$data 		= AdminMenu::where("parent_id", 0)->get();
		    	$content 	= AdminUser::where("id", $id)->first();
		    	return view("admin.permissions_supper_luat_su_edit", compact('title', 'data', 'content'));
	    	}
    	}
    	else
    	{
	    	if($admin_user_id == 1 || $admin_user_id == $id)
	    	{
		    	if ($requests->isMethod('post'))
		    	{
		    		$rules = array(
			            'username' => 'required',
			            'fullname' => 'required'
			        );

			        $message = array(
			            'username.required' => 'The User Name is required and cannot be empty',
			            'fullname.required' => 'The Full Name is required and cannot be empty'
			        );
			        $validator = validator()->make($requests->all(), $rules, $message);
			        if ($validator->fails())
			        {
			        	return response()->json(['status' => 'error', 'message' => $validator->errors()]);
			    	}
			    	else
			    	{
			    		$user = AdminUser::where("id", $id)->first();
			    		if($user)
			    		{
				    		$user->username 	= $requests->get("username");
				    		if(!empty($requests->get("password")))
				    			$user->password 	= Hash::make($requests->get("password"));
				    		$user->fullname 	= $requests->get("fullname");
				    		$user->permissions 	= implode(",", $requests->get("permissions"));
				    		$user->is_active 	= $requests->get("is_active");
				    		$user->save();

				    		return response()->json(['status' => 'success', 'link' => url('/cms/permissions/lists')]);
			    		}
			    		else
			    		{
			    			return response()->json(['status' => 'error', 'message' => "User không tồn tại"]);
			    		}
			    	}
			    }
			    else
			    {
			    	$title = "Dashboard Page";

			    	$data = AdminMenu::where("parent_id", 0)->get();
			    	$content = AdminUser::where("id", $id)->first();
			    	return view("admin.permissions_edit", compact('title', 'data', 'content'));
		    	}
		    }
		    else
		    {
		    	return Redirect::to('cms/permissions/lists');
		    }
		}
    }

    function deleteData($id)
    {
    	$admin_user_id = Session::get('admin_user_id');
    	if($admin_user_id == 1 || $admin_user_id == $id)
    	{
	    	$user = AdminUser::where("id", $id)->first();
			if($user)
			{
				$user->delete();
			}
		}

		return Redirect::to('cms/permissions/lists');
    }
}
