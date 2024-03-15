<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Models\JobCategories;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyEmployeesInfo;
use App\Models\JobCircular;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    // user Controller
    public function user_type_check(){
        // Admin dashboard items
        $totalUser = User::get()->count();
        $totalJobCategory = JobCategories::get()->count();
        $totalCompany = CompanyInfo::get()->count();

        // Company dashboard items
        $totalPendingJob = JobCircular::join('company_infos', 'company_infos.id', '=', 'job_circulars.company_id')->where('company_infos.user_id', '=', Auth::id())->where('job_circulars.status', 0)->get()->count();

        $totalPublishedJob = JobCircular::join('company_infos', 'company_infos.id', '=', 'job_circulars.company_id')->where('company_infos.user_id', '=', Auth::id())->where('job_circulars.status', 1)->get()->count();

        $totalEmployee = CompanyEmployeesInfo::join('company_infos', 'company_infos.id', '=', 'company_employees_infos.company_id')->where('company_infos.user_id', '=', Auth::id())->get('company_employees_infos.id')->count();

        $totalApplication = JobApplication::join('company_infos', 'job_applications.company_id', '=', 'company_infos.id')->where('company_infos.user_id', '=', Auth::id())->get('job_applications.id')->count();

        // User dashboard items
        $totalAppliedJob = JobApplication::where('user_id', '=', Auth::id())->count();
        
        if(Auth::id()){
            $usertype=Auth()->user()->role;
            // return $usertype;
            if($usertype=== 0){
                return view('backend.pages.dashboard.dashboard', compact('totalAppliedJob'));
            } elseif($usertype=== 1) {
                return view('backend.pages.dashboard.dashboard', compact('totalUser', 'totalJobCategory', 'totalCompany'));
            } elseif($usertype=== 2) {
                return view('backend.pages.dashboard.dashboard', compact('totalApplication', 'totalEmployee', 'totalPendingJob', 'totalPublishedJob'));
               }
         }
    }

    // Index page
    public function show_index_page(){
        $category = JobCategories::select('job_categories.category_name', 'job_categories.id as category_id')
        ->leftJoin('job_circulars', 'job_categories.id', '=', 'job_circulars.job_category_id')
        ->selectRaw('COUNT(job_circulars.id) as total_jobs')
        ->groupBy('job_categories.id', 'job_categories.category_name')
        ->get();

        $jobsList= JobCircular::orderBy('id', 'desc')->get();

        return view('frontend.pages.index', compact('category', 'jobsList'));
    }

    // About page
    public function show_about_page(){
        return view('frontend.pages.about');
    }

    // Contact page
    public function show_contact_page(){
        return view('frontend.pages.contact');
    }
}
