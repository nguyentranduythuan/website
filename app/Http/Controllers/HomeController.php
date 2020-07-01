<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\About;
use App\Models\AboutInfo;
use App\Models\CompanyTitle;
use App\Models\AchievementTitle;
use App\Models\JobTitle;
use App\Models\BenefitTitle;
use App\Models\ServiceTop;
use App\Models\ServiceBot;
use App\Models\Portfollio;
use App\Models\ClientTitle;
use App\Models\Contact;
use App\Models\JobContent;

class HomeController extends Controller
{
    public function index()
    {
    	$banners = Banner::all();
    	$abouts = About::all();
    	$about_infos = AboutInfo::all();
    	$company = CompanyTitle::all();
    	$achievement = AchievementTitle::all();
    	$jobs = JobTitle::all();
    	$benefits = BenefitTitle::all();
    	// $servicetops = ServiceTop::all();
    	$service1 = ServiceTop::where('id',1)->first();
    	$service2 = ServiceTop::where('id',2)->first();
    	$service3 = ServiceTop::where('id',3)->first();
    	$service4 = ServiceTop::where('id',4)->first();
    	$service5 = ServiceTop::where('id',5)->first();
    	$servicebots = ServiceBot::all();
    	$portfollios = Portfollio::all();
    	$clients = ClientTitle::all();
    	$contacts = Contact::all();
    	$jobcontent1 = JobContent::where('id',1)->first();
    	$jobcontent2 = JobContent::where('id',2)->first();
    	$jobcontent3 = JobContent::where('id',3)->first();
    	$jobcontent4 = JobContent::where('id',4)->first();
    	$jobcontent5 = JobContent::where('id',5)->first();
        return view('pages.home',[
        	'banners' => $banners,
        	'abouts' => $abouts,
        	'about_infos' => $about_infos,
        	'company' => $company,
        	'achievement' => $achievement,
        	'jobs' => $jobs,
        	'benefits' => $benefits,
        	'servicebots' => $servicebots,
        	'portfollios' => $portfollios,
        	'clients' => $clients,
        	'contacts' => $contacts,
        	'jobcontent1' => $jobcontent1,
        	'jobcontent2' => $jobcontent2,
        	'jobcontent3' => $jobcontent3,
        	'jobcontent4' => $jobcontent4,
        	'jobcontent5' => $jobcontent5,
        	'service1' => $service1,
        	'service2' => $service2,
        	'service3' => $service3,
        	'service4' => $service4,
        	'service5' => $service5,
        ]);
    }
}
