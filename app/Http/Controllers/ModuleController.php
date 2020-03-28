<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public static function box_bye_now()
    {
        $module = new ModuleController();
        $data = $module->getDataBoxByeNow();

        return view('section.bye_now', compact('data'));
    }

    private function getDataBoxByeNow()
    {
    	return "";
    }
}
