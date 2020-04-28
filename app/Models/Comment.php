<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['id','parent_id','name','content'];

    public function blog(){
    	return $this->belongsTo(Blog::class,'blog_id');
    }

    public function user() {
    	return $this->belongsTo(User::class,'id_user');
    }
}
