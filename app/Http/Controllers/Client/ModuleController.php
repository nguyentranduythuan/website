<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    public static function menu()
    {

        $module = new ModuleController();
        $data = $module->getViewMenu();

        return view('clients.menu', compact('data'));
    }

    public function getViewMenu()
    {
    	//dd(request()->all());
    	$data = array();
        $page            = request()->get("page");

        return $data;
    }
}
