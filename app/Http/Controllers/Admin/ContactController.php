<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;

class ContactController extends BaseController
{
    public function index(Request $requests)
    {
    	parent::index($requests);
    	
    	$title = "Contact Page";
    	//$category = NewsCategory::where("is_active", 1)->get();
    	return view("admin.contact", compact('title'));
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
				case 3:
					$order = "image";
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
		if($requests->get("image") != "" && $requests->get("image") != -1)
		{
			$where[] = ['image', '=', $requests->get("image")];
		}
		// if($requests->get("cate_id") != "" && $requests->get("cate_id") != -1)
		// {
		// 	$where[] = ['cate_id', '=', $requests->get("cate_id")];
		// }

		$iTotalRecords 	= Contact::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart 	= intval($requests->get('start'));
		$sEcho 			= intval($requests->get('draw'));
		$start 			= intval($requests->get('start'));

		$data 			= Contact::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();
		
		$i = 0;

		$status_list = array(
		    array("danger" => "Tạm ngưng"),
		    array("success" => "Hoạt động")
		);
		foreach($data as $dt) {
		
			//$status = $status_list[$dt->is_active];

			$records["data"][$i] = array(
			$dt->id,
			$dt->name,
			$dt->description,
			(!empty($dt->image) ? "<img width='100' src='".\URL::asset(\Config::get('constants.LINK_CONTACT')).'/'.$dt->image."'/>" : ''),
			//$dt->title,
			// (!empty($dt->thumb) ? "<img width='100' src='".\URL::asset(\Config::get('constants.LINK_NEWS')).'/'.$dt->thumb."'/>" : ''),
			// '<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
			// '<a href="'.url('cms/news/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a>',


			'<a href="'.url('cms/contact/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a> 
			<a href="javascript:onDelete('.$dt->id.', \''.url('cms/contact/delete/'.$dt->id).'\');" class="btn btn-xs default btn-editable delete_record"><i class="fa fa-times"></i> Delete</a>',
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
	            'name' 	=> 'required',
	            'thumb' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
	        );

	        $message = array(
	            
	            'name.required' => 'The Name is required and cannot be empty',
	            'thumb.required' => 'The Thumb is required and cannot be empty',
	            'thumb.image' => 'This is not a image file',
	            'thumb.mimes' => 'This file is not allow',
	        );
	        $validator = validator()->make($requests->all(), $rules, $message);
	        if ($validator->fails())
	        {
	        	$errors = $validator->errors()->all();
	        	return response()->json(['status' => 'error', 'message' => $errors[0]]);
	    	}
	    	else
	    	{
	    		$item = new Contact;
	    		$item->name 			= $requests->get("name");
	    		$item->description 			= $requests->get("description");
	    		$item->save();

	    		$tmp                = createdFolderContact();
             	$dir_final          = $tmp['dir_final'];
                $folder             = $tmp['folder'];
                
	    		if ($requests['thumb'] != null)
                {
                    $file = $requests['thumb'];

                    $pic_1      = $file->getClientOriginalName();
                    $pic_1      = explode(".", $pic_1);
                    $extension  = $file->getClientOriginalExtension();
                    $file_name  = $item->id.'-thumb-'.time().'.'.$extension;

                    $file->move($dir_final.$folder, $file_name);
                    $file_name = $folder.'/'.$file_name;

                    $item->image   = $file_name;
                }
	    		$item->save();

	    		return response()->json(['status' => 'success', 'link' => url('/cms/contact/lists')]);
	    	}
	    }
	    else
	    {
	    	$title = "Contact Page";
	    	return view("admin.contact_add", compact('title'));
    	}
    }

    function editData($id, Request $requests)
    {
    	parent::index($requests);
    	if ($requests->isMethod('post'))
    	{
    		$rules = array(
	            'name' 	=> 'required',
	            
	            //'thumb' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
	        );

	        $message = array(
	            
	            'name.required' => 'The Name is required and cannot be empty',
	            //'thumb.required' => 'The Thumb is required and cannot be empty',
	            //'thumb.image' => 'This is not a image file',
	            //'thumb.mimes' => 'This file is not allow',
	        );
	        $validator = validator()->make($requests->all(), $rules, $message);
	        if ($validator->fails())
	        {
	        	return response()->json(['status' => 'error', 'message' => $validator->errors()]);
	    	}
	    	else
	    	{
	    		$item = Contact::where("id", $id)->first();
	    		if($item)
	    		{
		    		$item->name 			= $requests->get("name");
		    		$item->description 			= $requests->get("description");
		    		$item->save();

		    		$tmp                = createdFolderContact();
	                $dir_final          = $tmp['dir_final'];
	                $folder             = $tmp['folder'];
	                
		    		if ($requests['thumb'] != null)
                    {
                        $file = $requests['thumb'];

                        $pic_1      = $file->getClientOriginalName();
                        $pic_1      = explode(".", $pic_1);
                        $extension  = $file->getClientOriginalExtension();
                        $file_name  = $item->id.'-thumb-'.time().'.'.$extension;

                        $file->move($dir_final.$folder, $file_name);
                        $file_name = $folder.'/'.$file_name;

                        if(!empty($item->image))
                        {
                        	@unlink($dir_final.'/'.$item->image);
                        }
                        $item->image   = $file_name;
                    }
		    		$item->save();

		    		return response()->json(['status' => 'success', 'link' => url('/cms/contact/lists')]);
	    		}
	    		else
	    		{
	    			return response()->json(['status' => 'error', 'message' => "Item không tồn tại"]);
	    		}
	    	}
	    }
	    else
	    {
	    	$title = "Contact Page";
	    	//$blogs = Blog::all();
	    	$content 		= Contact::where("id", $id)->first();

	    	return view("admin.contact_edit", compact('title', 'content',));
    	}
    }

    function deleteData($id)
    {
		$item = Contact::where("id", $id)->first();
		if($item)
		{
			$tmp                = createdFolderContact();
            $dir_final          = $tmp['dir_final'];
            $folder             = $tmp['folder'];
			if(!empty($item->thumb))
            {
            	@unlink($dir_final.'/'.$item->thumb);
            }
			$item->delete();
		}

		return Redirect::to('cms/contact/lists');
    }
}