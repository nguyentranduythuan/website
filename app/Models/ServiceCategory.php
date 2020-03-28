<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_category';

    public function services()
    {
    	return $this->hasMany('App\Models\Service');
    }
}
