<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $connection = 'mysql_data_center';

    public function getWard()
    {
        return $this->hasMany('App\Models\Ward', 'district_id');
    }
    public function getStreet()
    {
        return $this->hasMany('App\Models\Street', 'district_id');
    }

    public function getProvince()
    {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }
}
