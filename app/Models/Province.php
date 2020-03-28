<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $connection = 'mysql_data_center';
    
    public function getDistrict()
    {
        return $this->hasMany('App\Models\District', 'province_id');
    }
}
