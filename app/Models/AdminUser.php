<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    public function getGroup()
    {
        return $this->belongsTo('App\Models\GroupLawyer', 'group_lawyer');
    }
}
