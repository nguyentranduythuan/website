<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'project_category';
    protected $fillable = ['id','name','slug'];

    public function project()
    {
    	return $this->hasMany(Project::class,'project_category_id');
    }
}
