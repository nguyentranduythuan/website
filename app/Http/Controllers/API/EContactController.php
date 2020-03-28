<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EContactController extends Controller
{
    public function login()
    {
    	$result = new \stdClass();
        $result->status = true;
        $result->message = "Đăng nhập thành công";

    	return response()->json($result);
    }

    public function logout()
    {
    	$result = new \stdClass();
        $result->status = true;
        $result->message = "Logout thành công";
        
    	return response()->json($result);
    }

    public function getAllContact()
    {
    	$result = new \stdClass();
        $result->status = true;
        $result->message = "Vui lòng nhập email và mật khẩu";
        
    	return response()->json($result);
    }

    public function syncOneContact()
    {
    	$result = new \stdClass();
        $result->status = false;
        $result->message = "Vui lòng nhập email và mật khẩu";
        
    	return response()->json($result);
    }
}
