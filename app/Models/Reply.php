<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $table = 'replies';
    protected $fillable = ['id','content','comment_id'];

	public function user()
	{
		return $this->belongsTo('App\User','user_id');
	}

    public function binhluan()
    {
    	return $this->belongsTo(Comment::class,'comment_id');
    }
}
