<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use DB;
use Mail;
use Session;
use App\Mail\SendContact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\DataPeopleExport;
use App\Imports\DataPeopleImport;
use App\Models\DataPeople;
use App\Models\Slide;
use App\Models\About;
use App\Models\Service;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\BlogCategory;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $services = DB::table('service')->orderBy('created_at','desc')->limit(9)->get();
        $projects = DB::table('project')->orderBy('created_at','desc')->limit(3)->get();
        // $blogs = DB::table('blog')->orderBy('created_at','desc')->limit(3)->get();
        $blogs = Blog::orderBy('created_at','desc')->limit(3)->get();
        $tags = Tag::orderBy('created_at','desc')->limit(4)->get();
    	return view('pages.home',['slides' => $slides,'services'=>$services,'projects'=>$projects,'blogs'=>$blogs,'tags'=>$tags]);
    }

    public function about()
    {
        $abouts = About::all();
        return view('pages.about',['abouts' => $abouts]);
    }

    public function service()
    {
        $services = Service::paginate(6);
        return view('pages.service',['services' => $services]);
    }

    public function service_detail($slug)
    {
        $serviceDetail = Service::where('slug',$slug)->first();
        return view('pages.service_detail',['serviceDetail'=>$serviceDetail]);
    }

    public function projects()
    {
        $projectcates = ProjectCategory::all();
        $projects = Project::all();

        return view('pages.projects',['projectcates'=>$projectcates,'projects'=>$projects]);
        
    }

    public function getProjectCate($slug)
    {
        $cateDetail = ProjectCategory::where(['slug'=>$slug])->first();
        $cateByProject = Project::where(['project-category_id'=>$cateDetail->id])->get();
        return view('pages.category-project',['cateDetail'=>$cateDetail,'cateByProject'=>$cateByProject]);

    }

    public function projects_detail($slug)
    {
        $projectDetail = Project::where(['slug'=>$slug])->first();
        return view('pages.projects_detail',['projectDetail'=>$projectDetail]);
    }

    public function blogs()
    {
        $tags = Tag::all();
        $blogs = Blog::all();

        //$tagDetail = Tag::where('slug',$slug)->first();
        //$blogDetail = Blog::where(['blogtag_id'=>$tagDetail->id])->get();

        //$blogCategory = BlogCategory::all();

        //$data = BlogCategory::with('blog')->get()->toArray();
        //dd($data);
        return view('pages.blogs',['blogs' => $blogs,'tags' => $tags]);
    }

    public function blogByTag($slug)
    {
        $tagDetail = Tag::where(['slug'=>$slug])->first();
        $blogbyTags = Blog::where(['blogtag_id'=>$tagDetail->id])->get();

        return view('pages.tag-blog',['blogbyTags'=>$blogbyTags]);
    }

    public function blogs_detail($slug)
    {
        $blogDetail = Blog::where('slug',$slug)->first();
        //dd($blogDetail);
        return view('pages.blogs_detail',compact('blogDetail'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        // Alert::success('status', 'Success Message');
        // $contact = new Contact;
        // $contact->fullname = $request->fullname;
        // $contact->email = $request->email;
        // $contact->phone = $request->phone;
        // $contact->subject = $request->subject;
        // $contact->message = $request->message;
        // $contact->save(); 

        Mail::to('nguyentranduythuan@gmail.com')->send(new SendContact($request));

        $request->all();

        return response()->json(['message' => 'Your message is sent'],200);
    }

    private function don_dep_email()
    {
        $data = DataPeople::whereNotNull("email")->get();
        foreach ($data as $dt)
        {
            if(!empty($dt->email))
            {
                if (strpos($dt->email, '@') === false)
                {
                    $dt->email = NULL;
                    $dt->save();
                }
            }
        }
    }

    private function don_dep_phone()
    {
        $data = DataPeople::whereRaw('LENGTH(phone) > ?', [10])->get();
        foreach ($data as $dt)
        {
            $dt->phone = NULL;
            $dt->save();
        }
    }

    public function import_export()
    {
    	return view('import_data');
    }

    public function export()
    {
    	return Excel::download(new DataPeopleExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
		Excel::import(new DataPeopleImport,request()->file('file'));
           
        return back();
    }
}
