<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Service;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\ServiceCategory;

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
}
