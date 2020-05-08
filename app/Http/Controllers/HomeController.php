<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Service;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\ServiceCategory;
use App\Models\About;
use App\Models\ProjectCategory;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Custommer;
use Mail;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        $serviceCates = ServiceCategory::all();
        $slides = Slide::all();
        $abouts = About::all();
        $services = Service::inRandomOrder()->take(6)->get();
        $projects = Project::inRandomOrder()->take(8)->get();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $tags = Tag::inRandomOrder()->take(8)->get();
        $customers = Custommer::all();
        return view('pages.home',['slides'=>$slides,'abouts'=>$abouts,'services'=>$services,'projects'=>$projects,'blogs'=>$blogs,'tags'=>$tags,'serviceCates'=>$serviceCates,'customers'=>$customers]);
    }

    public function search(Request $request)
    {
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $search = $request->search;
        //dd($searchs);
        $services = Service::where('title','like','%$search%')->orwhere('description','like','%'.$search.'%')->orwhere('detail','like','%'.$search.'%')->orwhere('detail','like','%'.$search.'%')->paginate(5);
        $services->appends($request->only('search'));
        //dd($services);
        $projects = Project::where('title','like','%'.$search.'%')->orwhere('description','like','%'.$search.'%')->orwhere('content','like','%'.$search.'%')->orwhere('content','like','%'.$search.'%')->paginate(5);
        $projects->appends($request->only('search'));
        dd($projects);
        $blogs = Blog::where('name','like','%'.$search.'%')->orwhere('description','like','%'.$search.'%')->orwhere('content','like','%'.$search.'%')->paginate(5);
        $blogs->appends($request->only('search'));
        //dd($blogs);
        return view('pages.search',['serviceCates'=>$serviceCates,'services'=>$services,'blogs'=>$blogs]);
    }

    public function master()
    {
        $serviceCates = ServiceCategory::all();
        return view('layouts.master',['serviceCates'=>$serviceCates]);
    }

    public function about() {
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $abouts = About::all();
        return view('pages.about',['abouts'=>$abouts,'serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }

    public function service() {
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $services = Service::paginate(3);
        return view('pages.service',['services'=>$services,'serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }

    public function serviceByCate($slug) {
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $category = ServiceCategory::where('slug',$slug)->first();
        $services = Service::where('servicecate_id',$category->id)->get();
        return view('pages.category-service',['serviceCates'=>$serviceCates,'category'=>$category,'services'=>$services,'blogs'=>$blogs]);
    }

    public function service_detail($slug) {
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $serviceDetail = Service::where('slug',$slug)->first();
        return view('pages.service_detail',['serviceDetail'=>$serviceDetail,'serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }

    public function projects(){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $projects = Project::paginate(4);
        $projectcates = ProjectCategory::all();
        return view('pages.projects',['serviceCates'=>$serviceCates,'blogs'=>$blogs,'projects'=>$projects,'projectcates'=>$projectcates]);
    }

    public function projectByCate($slug){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $cate = ProjectCategory::where('slug',$slug)->first();
        $projects = Project::where('project-category_id',$cate->id)->get();
        return view('pages.category-project',['serviceCates'=>$serviceCates,'blogs'=>$blogs,'cate'=>$cate,'projects'=>$projects]);
    }

    public function projects_detail($slug){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $projects = Project::select('title','slug','image')->orderBy('created_at','desc')->take(4)->get();
        $projectDetail = Project::where('slug',$slug)->first();
        $categories = ProjectCategory::all();
        return view('pages.projects_detail',['projectDetail'=>$projectDetail,'categories'=>$categories,'blogs'=>$blogs,'projects'=>$projects,'serviceCates'=>$serviceCates]);
    }

    public function blogs(){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::paginate(6);
        //dd($blogs);
        $tags = Tag::all();
        return view('pages.blogs',['serviceCates'=>$serviceCates,'blogs'=>$blogs,'tags'=>$tags]);
    }

    public function blogByTag($slug){
        $serviceCates = ServiceCategory::all();
        $tag = Tag::where('slug',$slug)->first();
        $blogs = Blog::where('blogtag_id',$tag->id)->get();
        return view('pages.tag-blog',['blogs'=>$blogs,'serviceCates'=>$serviceCates,'tag'=>$tag]);
    }

    public function blogbyCate($slug){
        $serviceCates = ServiceCategory::all();
        $blogCate = BlogCategory::where('slug',$slug)->first();
        $blogs = Blog::where('blogcategory_id',$blogCate->id)->get();
        return view('pages.category-blog',['serviceCates'=>$serviceCates,'blogCate'=>$blogCate,'blogs'=>$blogs]);
    }

    public function blogs_detail($slug){
        $serviceCates = ServiceCategory::all();
        $tags = Tag::all();
        $blogCates = BlogCategory::all();
        $blogs = Blog::orderBy('created_at','desc')->take(3)->get();
        $blogDetail = Blog::where('slug',$slug)->first();
        $blog = Blog::all();
        
        return view('pages.blogs_detail',['serviceCates'=>$serviceCates,'blogDetail'=>$blogDetail,'tags'=>$tags,'blogCates'=>$blogCates,'blogs'=>$blogs,'blog'=>$blog]);
    }

    public function postContact(Request $request){
        
        $arr = array(
            'firstname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        );
        Mail::send('pages.mail',$arr,function($message) use ($arr){
            $message->from($arr['email']);
            $message->to('nguyentranduythuan@gmail.com');
            $message->subject($arr['subject']);
        });
    }

    public function consultant(Request $request){
        
        $arr = array(
            'firstname' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->result,
            //'message' => $request->message
        );
        //dd($arr);
        Mail::send('pages.mail',$arr,function($message) use ($arr){
            $message->from($arr['email']);
            $message->to('nguyentranduythuan@gmail.com');
            $message->subject($arr['subject']);
        });

        return response()->json(['message' => 'Bạn đã gửi thông tin thành công. Chúng tôi sẽ liên hệ lại bạn'],200);
    }

    public function contact(){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        return view('pages.contact',['serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }

    public function getLogin(){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        return view('pages.login',['serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('/');
        } else {
            return redirect()->route('postLogin')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function dangxuat()
    {
        Auth::logout();
        return redirect()->route('/');
    }

    public function register(){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        return view('pages.register',['serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }

    public function postRegister(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required|same:password'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('postRegister')->with('thongbao','Bạn đã đăng kí thành công');
    }

    // public function comment(Request $request,$id)
    // {
    //     $blog = Blog::find($id);
    //     $comment = new Comment;
    //     //$comment->parent_id = $comment->id;
    //     $comment->name = $request->name;
    //     $comment->content = $request->message;
    //     $comment->blog()->associate($blog);
    //     $comment->id_user = Auth::user()->id;
    //     $comment->save();
    //     return redirect()->route('blog_details',[$blog->slug])->with('message','Bạn đã đăng bình luận thành công');
    // }
}
