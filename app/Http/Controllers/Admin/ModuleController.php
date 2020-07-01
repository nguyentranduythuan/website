<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\AdminMenu;

class ModuleController extends Controller
{
    //
    public static function menu()
    {
    	$module = new ModuleController();
    	$data = $module->_fetchMenu();

    	return view("admin.menu", compact('data'));
    }

    function _fetchMenu($id = 0)
    {
		if(Session::get('admin_user_id') == 1)
		{
			$data = AdminMenu::where('is_active', '1')
					->where('parent_id', $id)
					->orderBy('p_order', 'ASC')
					->get();
		}
		else
		{
			$admin_permissions = explode(",", Session::get('admin_permissions'));
			$data = AdminMenu::where('is_active', '1')
					->where('parent_id', $id)
					->whereIn('model', $admin_permissions)
					->orderBy('p_order', 'ASC')
					->get();
		}
        
        $data = json_decode(json_encode($data), true);

		if(count($data) > 0)
        {
            $i = 0;
            foreach($data as $dt)
            {
                $data[$i]['sub'] = $this->_fetchMenu($dt['id']);
                $i++;
            }
        }
        return $data;
    }
}
