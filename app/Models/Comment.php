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
    	return $this->belongsTo('App\User','id_user');
    }

    public function commentable()
    {
    	return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class,'comment_id');
    }
}
