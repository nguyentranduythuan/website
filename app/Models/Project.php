<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['id','title','slug','project-category_id'];

    public function projectcate()
    {
    	return $this->belongsTo(ProjectCategory::class,'project-category_id');
    }
}
