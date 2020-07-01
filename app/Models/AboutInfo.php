<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutInfo extends Model
{
    protected $table = 'about_infos';

    public function content(){
    	return $this->hasMany(AboutContent::class,'about_title_id');
    }
}
