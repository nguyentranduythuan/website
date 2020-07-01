<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }

    public function store(Request $request,$id)
    {
    	$blog = Blog::find($id);
        //dd($blog);
        $comment = new Comment;
        $comment->parent_id = $request->comment_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->subject = $request->subject;
        $comment->content = $request->message;
        $comment->blog()->associate($blog);
        //dd($comment);
        //$comment->id_user = Auth::user()->id;
        //$blog->comments()->save($comment);
        $comment->save();
        return redirect()->route('blog_details',[$blog->id])->with('message','Bạn đã đăng bình luận thành công');
    	//return back();
        //return response()->json(['message' => 'Bạn đã đăng bình luận thành công'],200);
    }
}
