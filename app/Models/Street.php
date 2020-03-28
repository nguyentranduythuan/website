<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $connection = 'mysql_data_center';
    
    public function getDistrict()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }
}
