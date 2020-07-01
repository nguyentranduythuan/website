<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\AdminUser;
use Hash;

class BaseController extends Controller
{
	public function index(Request $requests)
	{
		$this->check();
	}

    public function check()
    {
    	$controller = request()->segment(2);
        $action = request()->segment(3);
        if(!isset($controller))
        {
            $controller = '';
        }
        if(!isset($action))
        {
            $action = '';
        }
        if(!defined("CONTROLLER"))
        {
	        define('CONTROLLER', $controller);
	        define('ACTION', $action);
    	}
    	
        if($controller == "login" || $controller == "logout")
        {
        	if($controller == "login" && $this->_IsSession())
        	{
        		Redirect::to('/cms')->send();
        	}
        }
        else
        {
        	$this->checkPermission();
        }
    }

    public function checkPermission()
    {
        if($this->_IsSession()==FALSE)
        {
			Redirect::to('cms/login')->send();
		}
		else
		{
			$uid = Session::get('admin_user_id');
			
			$permissions = explode(',',Session::get('admin_permissions'));
			
			if(!in_array(CONTROLLER, $permissions, true) && $uid != 1)
			{
				if(count($permissions) > 0)
				{
					Redirect::to('/cms/'.$permissions[0])->send();
				}
				else
				{
					Redirect::to('/cms/login')->send();
				}
			}
			else
			{
				return TRUE;
			}
		}
    }
    
    public function _IsSession(){
    	
    	if (Session::has('admin_username')) 
    	{
            return TRUE;
        }

        return FALSE;
	}
    
    public function _logout($redirect='cms/login'){
    	
		Session::forget('admin_fullname');
		Session::forget('admin_username');
		Session::forget('admin_user_id');
		Session::forget('admin_group');
		Session::forget('admin_permissions');
		Session::forget('admin_supper_lawyer');
		Session::forget('admin_group_lawyer');
		

		Redirect::to('cms/login')->send();
	}
  
    public function _checkAuth($uName,$pass)
    {
		// Kiem tra user co trong CSDL hay khong ?
		$user = AdminUser::where("username", $uName)->first();
		
		if(!$user)
        {
			return FALSE;
		}
        else
        {
        	if(Hash::check($pass, $user->password))
            {
				Session::put("admin_fullname", $user->fullname);
				Session::put("admin_username", $user->username);
				Session::put("admin_user_id", $user->id);
				Session::put("admin_group", $user->group_id);
				Session::put("admin_permissions", $user->permissions);
				Session::put("admin_supper_lawyer", $user->supper_lawyer);
				Session::put("admin_group_lawyer", $user->group_lawyer);
                Session::save();
                
				return TRUE;
			}
            else
            {
				return FALSE;
			}
		}
	}
}
