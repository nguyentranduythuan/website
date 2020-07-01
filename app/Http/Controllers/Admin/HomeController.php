<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\AdminMenu;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HomeController extends BaseController
{
    public function index(Request $requests)
    {
        
    	parent::index($requests);
    	
    	$title = "Dashboard Page";
    	$data = new \stdClass();

        $data->total_user_register                      = 1;
        $data->total_user_register_last_login           = 2;
        $data->total_user_register_today                = 3;
        $data->total_user_register_month                = 4;

        $data->total_event                              = 5;
        $data->total_event_today                        = 6;

        $data->total_join_event_today                   = 7;
        $data->total_join_event_month                   = 8;

        return view("admin.index", compact('title', 'data'));
    }
}
