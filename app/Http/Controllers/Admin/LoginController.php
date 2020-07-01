<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class LoginController extends BaseController
{
    public function index(Request $requests)
    {
    	if(Session::get("admin_user_id"))
    	{
    		return Redirect::to('/cms');
    	}
    	else
    	{
	    	$title = "";
	    	$data = "";
	    	return view("admin.login", compact('title', 'data'));
    	}
    }

    public function post_login()
    {
    	$result = new \stdClass();
		$result->status = false;
		$result->message = "Vui lòng nhập tên và mật khẩu";

        $rules = array(
            'username'    => 'required',
            'password' => 'required'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) 
        {
            $result->message = "Tên và mật khẩu không đúng";
        } 
        else 
        {
            // create our user data for the authentication
            $userdata = array(
                'username'      => Input::get('username'),
                'password'      => Input::get('password')
            );

            if($this->_checkAuth($userdata['username'],$userdata['password']))
            {
                $result->status = true;
                $result->message = "";
            }
            else
            {
                $message = "Tên và mật khẩu không đúng";
            }
        }

		return response()->json($result);
    }

    public function logout()
    {
    	$this->_logout();
    }
}
