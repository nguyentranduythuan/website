<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'job_titles';

    public function content()
    {
    	return $this->hasMany(JobContent::class,'job_title_id');
    }
}
