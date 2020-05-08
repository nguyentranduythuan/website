<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Request $request, $id)
    {
    	$blog = Blog::find($id);
    	//dd($blog);
        $comment = new Comment;
        //$comment->parent_id = $comment->id;
        $comment->name = $request->name;
        $comment->content = $request->message;
        $comment->blog()->associate($blog);
        $comment->id_user = Auth::user()->id;
        //$blog->comments()->save($comment);
        $comment->save();
    // return redirect()->route('blog_details',[$blog->slug])->with('message','Bạn đã đăng bình luận thành công');

    	return back();
    }

    public function reply(Request $request, $id, Comment $comment)
    {
    	$comment = Comment::find($id);
    	$reply = new Reply;
    	$reply->content = $request->message;
    	$reply->binhluan()->associate($comment);
    	$reply->user_id = Auth::user()->id;
    	//$comment->replies()->save($reply);
    	$reply->save();

    	return back();
    }
}
