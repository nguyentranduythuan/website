<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['id','name','slug','description','image','content','blogcategory_id','blogtag_id'];

    public function blogcate()
    {
    	return $this->belongsTo(BlogCategory::class,'blogcategory_id');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Models\Tag');
    }
}
