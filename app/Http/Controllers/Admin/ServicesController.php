<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Redirect;

class ServicesController extends BaseController
{
    public function index(Request $requests)
    {
    	parent::index($requests);
    	
    	$title = "Service Page";
    	//$category = NewsCategory::where("is_active", 1)->get();
    	return view("admin.service", compact('title'));
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
					$order = "slug";
					break;
				case 3:
					$order = "description";
					break;
				case 4:
					$order = "image";
					break;
				case 5:
					$order = "content";
					break;
				case 6:
					$order = "category";
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
		if($requests->get("slug") != "" && $requests->get("slug") != -1)
		{
			$where[] = ['slug', '=', $requests->get("slug")];
		}
		if($requests->get("description") != "" && $requests->get("description") != -1)
		{
			$where[] = ['description', '=', $requests->get("description")];
		}
		if($requests->get("image") != "" && $requests->get("image") != -1)
		{
			$where[] = ['image', '=', $requests->get("image")];
		}
		if($requests->get("content") != "" && $requests->get("content") != -1)
		{
			$where[] = ['content', '=', $requests->get("content")];
		}
		if($requests->get("category") != "" && $requests->get("category") != -1)
		{
			$where[] = ['category', '=', $requests->get("category")];
		}
		// if($requests->get("cate_id") != "" && $requests->get("cate_id") != -1)
		// {
		// 	$where[] = ['cate_id', '=', $requests->get("cate_id")];
		// }

		$iTotalRecords 	= Service::where($where)->count();
    	$iDisplayLength = intval($requests->get('length'));
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		$iDisplayStart 	= intval($requests->get('start'));
		$sEcho 			= intval($requests->get('draw'));
		$start 			= intval($requests->get('start'));

		$data 			= Service::where($where)->offset($start)->limit($iDisplayLength)->orderBy($order, $by)->get();
		//dd($data);
		$i = 0;

		$status_list = array(
		    array("danger" => "Tạm ngưng"),
		    array("success" => "Hoạt động")
		);
		foreach($data as $dt) {
		
			//$status = $status_list[$dt->is_active];

			$records["data"][$i] = array(
			$dt->id,
			$dt->title,
			$dt->slug,
			$dt->description,
			(!empty($dt->image) ? "<img width='100' src='".\URL::asset(\Config::get('constants.LINK_SERVICE').$dt->image)."'/>" : ''),
			$dt->detail,
			$dt->ServiceCate->name,
			//$dt->title,
			// (!empty($dt->thumb) ? "<img width='100' src='".\URL::asset(\Config::get('constants.LINK_NEWS')).'/'.$dt->thumb."'/>" : ''),
			// '<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
			// '<a href="'.url('cms/news/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a>',


			'<a href="'.url('cms/services/edit/'.$dt->id).'" class="btn btn-xs default btn-editable"><i class="fa fa-edit"></i> Edit</a> 
			<a href="javascript:onDelete('.$dt->id.', \''.url('cms/services/delete/'.$dt->id).'\');" class="btn btn-xs default btn-editable delete_record"><i class="fa fa-times"></i> Delete</a>',
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
	            'title' 	=> 'required',
	            'category' 	=> 'required',
	            'thumb' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
	        );

	        $message = array(
	            'category.required' => 'The category is required and cannot be empty',
	            'title.required' => 'The Name is required and cannot be empty',
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
	    		$item = new Service;
	    		$item->servicecate_id 			= $requests->get("category");
	    		$item->title 			= $requests->get("title");
	    		//$item->image 			= $requests->get("thumb");
	    		$item->slug 			= str_slug($requests->get("title"));
	    		$item->description 			= $requests->get("description");
	    		$item->detail 			= $requests->get("content");
	    		//$item->is_active 		= $requests->get("is_active");
	    		$item->save();

	    		$tmp                = createdFolderService();
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

	    		return response()->json(['status' => 'success', 'link' => url('/cms/services/lists')]);
	    	}
	    }
	    else
	    {
	    	$title = "Service Page";
	    	$category = ServiceCategory::all();
	    	return view("admin.service_add", compact('title','category'));
    	}
    }

    function editData($id, Request $requests)
    {
    	parent::index($requests);
    	if ($requests->isMethod('post'))
    	{
    		$rules = array(
	            'title' 	=> 'required',
	            'category' 	=> 'required',
	            'thumb' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
	        );

	        $message = array(
	            'category.required' => 'The category is required and cannot be empty',
	            'title.required' => 'The Name is required and cannot be empty',
	            'thumb.required' => 'The Thumb is required and cannot be empty',
	            'thumb.image' => 'This is not a image file',
	            'thumb.mimes' => 'This file is not allow',
	        );
	        $validator = validator()->make($requests->all(), $rules, $message);
	        if ($validator->fails())
	        {
	        	return response()->json(['status' => 'error', 'message' => $validator->errors()]);
	    	}
	    	else
	    	{
	    		$item = Service::where("id", $id)->first();
	    		if($item)
	    		{
	    			$item->servicecate_id 			= $requests->get("category");
	    			$item->title 			= $requests->get("title");
	    			//$item->image 			= $requests->get("thumb");
	    			$item->slug 			= str_slug($requests->get("title"));
	    			$item->description 			= $requests->get("description");
	    			$item->detail 			= $requests->get("content");
	    			//$item->is_active 		= $requests->get("is_active");
	    			//$item->save();
	    			//$item->is_active 		= $requests->get("is_active");

		    		$tmp                = createdFolderService();
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
                        	@unlink($dir_final.'/'.$item->thumb);
                        }
                        $item->image   = $file_name;
                    }
		    		$item->save();

		    		return response()->json(['status' => 'success', 'link' => url('/cms/services/lists')]);
	    		}
	    		else
	    		{
	    			return response()->json(['status' => 'error', 'message' => "Service không tồn tại"]);
	    		}
	    	}
	    }
	    else
	    {
	    	$title = "Service Page";

	    	$content 		= Service::where("id", $id)->first();
	    	$category 		= ServiceCategory::all();

	    	return view("admin.service_edit", compact('title', 'content','category'));
    	}
    }

    function deleteData($id)
    {
		$item = Service::where("id", $id)->first();
		if($item)
		{
			$tmp                = createdFolderService();
            $dir_final          = $tmp['dir_final'];
            $folder             = $tmp['folder'];
			if(!empty($item->image))
            {
            	@unlink($dir_final.'/'.$item->image);
            }
			$item->delete();
		}

		return Redirect::to('cms/services/lists');
    }
}
