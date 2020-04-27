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

class HomeController extends Controller
{
    public function index(){
        $serviceCates = ServiceCategory::all();
        $slides = Slide::all();
        $services = Service::inRandomOrder()->take(6)->get();
        $projects = Project::inRandomOrder()->take(8)->get();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        $tags = Tag::inRandomOrder()->take(8)->get();
        return view('pages.home',['slides'=>$slides,'services'=>$services,'projects'=>$projects,'blogs'=>$blogs,'tags'=>$tags,'serviceCates'=>$serviceCates]);
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
        return view('pages.blogs_detail',['serviceCates'=>$serviceCates,'blogDetail'=>$blogDetail,'tags'=>$tags,'blogCates'=>$blogCates,'blogs'=>$blogs]);
    }

    public function post(Request $request){
        $request->all();
    }

    public function contact(){
        $serviceCates = ServiceCategory::all();
        $blogs = Blog::inRandomOrder()->take(3)->get();
        return view('pages.contact',['serviceCates'=>$serviceCates,'blogs'=>$blogs]);
    }
}
