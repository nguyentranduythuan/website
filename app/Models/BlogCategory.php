<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_category';
    protected $fillable = ['id','name','slug'];

    public function blog()
    {
    	return $this->hasMany(Blog::class,'blogcategory_id');
    }
}
