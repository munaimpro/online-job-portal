<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\JobCircular;
use App\Models\JobCategories;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JobCircularController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  Front End Start
    public function jobs_list(){
        // $jobPublished= JobCategories::orderBy('id', 'desc')->get();
        $jobPublished = JobCategories::select('job_categories.category_name', 'job_categories.id as category_id')
        ->leftJoin('job_circulars', 'job_categories.id', '=', 'job_circulars.job_category_id')
        ->selectRaw('COUNT(job_circulars.id) as total_jobs')
        ->groupBy('job_categories.id', 'job_categories.category_name')
        ->get();
        //dd($jobPublished);
         $jobsList= JobCircular::orderBy('id', 'desc')->get();

         return view('frontend.pages.all_jobs', compact('jobsList','jobPublished'));
    }

    public function show_alljobs_by_category(string $id)
    {
        $cat_id = JobCategories::findOrFail($id);
        $jobsList = JobCircular::where('job_category_id', $id)->get();
        return view('frontend.pages.job_by_category', compact('jobsList', 'cat_id'));
        //dd($cat_id);
    }

    public function show_jobDetails(string $id)
    {
        $job_details= JobCircular::findOrFail($id);
        return view('frontend.pages.job_details', compact('job_details'));
    }

    // public function job_application_form(string $id)

    // {
    //     $job_details= JobCircular::findOrFail($id);
    //     $existingJob = DB::table('job_applications')->where('job_id', $id)->first();
    //     if ($existingJob ) {
    //         return redirect()->back()->with('error', 'You have already applied.');
    //     } else {
    //         return view('frontend.pages.application_form', compact('job_details'));
    //     }
        
    // }
    public function job_application_form(string $id)

    {
        $job_details= JobCircular::findOrFail($id);
        //dd($job_details);
        $auth_id = auth()->user()->id;
        $existingJob = DB::table('job_applications')
        ->where('job_id', $id)
        ->where('user_id', $auth_id)
        ->first();
        //dd($id, $existingJob);
        if ($existingJob ) {
            return redirect()->back()->with('error', 'You have already applied.');
        } else {
            return view('frontend.pages.job_application_form', compact('job_details'));
        }
        
    }

    public function job_application_submit(request $request)
    {

        //dd($request);
        $user_id = auth()->user()->id;
        $job_id=$request->input('job_id');
        //$existingJob = JobApplication::findOrFail($user_id);
        $existingJob = DB::table('job_applications')
        ->where('job_id', $job_id)
        ->where('user_id', $user_id)
        ->first();
        //dd($existingJob);
        if ($existingJob) {
            return redirect()->back()->with('error', 'You have already applied.');
        } else {

            $request->validate([
                'job_id' => 'required',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'address' => 'required|string',
                'gender' => 'required|string',
                'dob' => 'required|date'
                // 'image' => 'image|mimes:jpg,png,jpeg|max:1024',
                // 'signature' => 'image|mimes:jpg,png,jpeg|max:1024',
                // 'cv' => 'file|mimes:pdf,doc,docx|max:2048', // Assuming CV is a document
    
            ]);
            $image = $request->file('image');
            if ($image) {
                    // Processing image file
                    $picFile = $image;
                    $getPicFileName = $picFile->getClientOriginalName();
                    $picname = $user_id.$getPicFileName;
                    $picFile->move('assets/img/profile', $picname);
            }
            $signature = $request->file('signature');
            if ($signature) {
                // Processing image file
                $picFile = $signature;
                $getPicFileName = $picFile->getClientOriginalName();
                $signame = $user_id.$getPicFileName;
                $picFile->move('assets/img/profile', $picname);
            }
            $cv = $request->file('cv');
            if ($cv) {
                // Processing image file
                $picFile = $cv;
                $getPicFileName = $picFile->getClientOriginalName();
                $cvname = $user_id.$getPicFileName;
                $picFile->move('assets/img/profile', $picname);
             }

            $job_application= JobApplication::create([
                'user_id'           =>  auth()->user()->id,
                'company_id'         => $request->input('company_id'),
                'job_id'              => $request->input('job_id'),
                'first_name'          => $request->input('first_name'),
                'last_name'          => $request->input('last_name'),
                'address'             => $request->input('address'),
                'gender'             => $request->input('gender'),
                'dob'                => $request->input('dob'),
                'image'              =>$picname,
                'signature'          =>$signame,
                'cv'                 =>$cvname,

            ]);
            
        $result = $job_application ->save();

        if ($result) {
                // return redirect()->back()->with('success', 'Job application submitted successfully.');
                return redirect()->route('job-details', ['id' => $job_id])->with('success', 'Job application submitted successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to submit job application.');
            }

        }

            // User input validation process
            
    }

    public function applied_jobs_list()
    {
   
  $user_id = auth()->user()->id;
  //$job_details = JobApplication::where('user_id', $user_id)->get();
  $job_details = DB::table('job_applications')
        ->join('job_circulars', 'job_applications.job_id', '=', 'job_circulars.id')
        ->select('job_circulars.*','job_applications.*') // Select all columns from job_circulers table
        ->where('job_applications.user_id', $user_id)
        ->get();
      //dd("$job_details");
       //$existingJob = JobCircular::findOrFail($id);
        if ($job_details) {
            return view('backend.pages.user.applied_jobs', compact('job_details'));
        } else {
            return redirect()->back()->with('error', 'No Data Found.');
        }
        
    }
     //  Front End End

    public function index()
    {
        $createJobs = JobCircular::orderBy('id', 'desc')->get();
        // return view('backend.company.pages.index', compact('createJobs'));
        return view('frontend.pages.all_jobs',['createJobs'=>$createJobs]);
        // dd($createJobs);
    }

    /**
     * Show the form for creating a new resource.
     */

    
    public function create()
    {
        $jobCategory = JobCategories::get();
        return view('backend.pages.company.create_job', compact('jobCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'organization_name' => 'required|string|max:100',
            'designation' => 'required|string|max:100',
            'application_deadline' => 'required|date|max:100',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'vacancy_count'=> 'required|numeric',
            'job_category_id'=> 'required|numeric',
            'job_location'=> 'required|string|max:200',
            'minimum_salary'=> 'required|numeric',
            'published_date'=> 'required|date|string',
            'requirements'=> 'required|string',
            'responsibilities'=> 'required|string',
            'benefits'=> 'required|string',
            'education'=> 'required|string',
            'experience'=> 'required|string',
            'employment_status'=> 'required|string',
        ]);

        if($request->hasFile('company_logo')){
            $image = $request->company_logo;
            $imageName = 'company_logo'.time().'.'.$image->getClientOriginalExtension();
            $image->move('backend/assets/images/company/', $imageName);
        }
        // $image->move(public_path('backend/assets/images/company/'), $imageName);

        $user_id = auth()->user()->id;
        $company_info = CompanyInfo::where('user_id', $user_id)->first();
        // dd($company_info);
        $company_id=$company_info->id;

        $createJobs= JobCircular::create([
            'organization_name'=> $request->input('organization_name'),
            'designation' => $request->input('designation'),
            'application_deadline' => $request->input('application_deadline'),
            'company_id' => $company_id,
            'company_logo' => $imageName,
            'job_category_id' => $request->input('job_category_id'),
            'vacancy_count' => $request->input('vacancy_count'),
            'job_location' => $request->input('job_location'),
            'minimum_salary' => $request->input('minimum_salary'),
            'published_date' => $request->input('published_date'),
            'requirements' => $request->input('requirements'),
            'responsibilities'=> $request->input('responsibilities'),
            'benefits' => $request->input('benefits'),
            'education' => $request->input('education'),
            'experience' => $request->input('experience'),
            'employment_status'=> $request->input('employment_status')
        ]);

        $result= $createJobs->save();
        if($result){
            return back()->with('success', 'Job Circular Created Successfully');
        }else{
            return back()->with('failed', 'Something went wrong');
        }
    }
    // show Jobs List to Company Dashboard
    public function jobList(){
        // dd('jobs');
        $user_id = auth()->user()->id;
        $company_info = DB::table('company_infos')
        ->where('user_id', $user_id)
        ->first();
        $company_id=$company_info->id;

        $jobsLists = DB::table('job_circulars')
        ->where('company_id', $company_id)
        ->get();
        //dd($jobsLists);
        return view('backend.pages.company.job_list', compact('jobsLists'));
    }

    public function applicants_list(Request $request)
    {
        $jobID=$request->input('job_id');
        $companyID=$request->input('company_id');
        //dd($jobID, $companyID);

        $applicantsLists = DB::table('job_applications')
        ->where('job_id', $jobID)
        ->where('company_id', $companyID)
        ->get();
        $totalApplicants = $applicantsLists->count();
        //dd( $applicantsLists);
        return view('backend.pages.company.apllicants_list', compact('applicantsLists'));
    }

    public function applicant_details(string $id)
    {
        $applicantsinfo = DB::table('job_applications')
         ->where('id', $id)
        // ->where('company_id', $companyID)
        ->first();
        //dd($applicantsinfo);
        return view('backend.pages.company.applicant_details', compact('applicantsinfo'));
    }

    public function applicants_update(Request $request)
    {
        $id=$request->input('id');
        $job_apply = JobApplication::find($id);

        if($job_apply){
            $result = $job_apply->update([
                'status' => $request->input('status'),
            ]);
            
            if($result){
                return redirect()->route('company/applicant_details', $id)->with('success', 'Status updated successfully');
            } else {
                return redirect()->route('company/applicant_details', $id)->with('fail', 'Status Not updated');
            }
        } else {
            return redirect()->route('company/applicant_details', $id)->with('fail', 'Job application not found');
        }

    }
    public function applicant_delete(string $id)
    {
        dd("Hello");
    }
    /**
     * Display data to Fron End for Specific Id.
     */
    public function show(string $id)
    {
        $createJobs= JobCircular::findOrFail($id);
        return view('frontend.pages.job_details', compact('createJobs'));
    }
    /**
     * Display data to Company End for Specific Id.
     */
    public function show_jobs_for_id(string $id)
    {
        $jobList= JobCircular::findOrFail($id);
        return view('backend.pages.company.job_details',compact('jobList'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobList = JobCircular::findOrFail($id);
        return view('backend.pages.company.edit_job', compact('jobList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$jobList= JobCircular::findOrFail($id);
        //dd($jobList);
        $request->validate([
            'organization_name' => 'required|string|max:100',
            'designation' => 'required|string|max:100',
            'application_deadline' => 'required|max:100',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'vacancy_count' => 'required|numeric',
            'job_location' => 'required|string|max:200',
            'minimum_salary' => 'required|numeric',
            'published_date' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'benefits' => 'required|string',
            'employment_status' => 'required|string',
            'education' => 'required|string'
        ]);

        if ($request->hasFile('company_logo')) {
            $image = $request->company_logo;
            $imageName = 'company_logo'.time().'.'.$image->getClientOriginalExtension();
            $image->move('backend/assets/images/company/', $imageName);
        }

        $jobList= JobCircular::findOrFail($id);
//dd($jobList);
$result=$jobList->update([
            'organization_name' => $request->input('organization_name'),
            'designation' => $request->input('designation'),
            'application_deadline' => $request->input('application_deadline'),
            'company_logo' => $imageName,
            'vacancy_count' => $request->input('vacancy_count'),
            'job_location' => $request->input('job_location'),
            'minimum_salary' => $request->input('minimum_salary'),
            'published_date' => $request->input('published_date'),
            'education' =>$request->input('education'),
            'experience' => $request->input('experience'),
            'requirements' => $request->input('requirements'),
            'responsibilities' => $request->input('responsibilities'),
            'benefits' => $request->input('benefits'),
            'employment_status' => $request->input('employment_status')
        ]);
        if($result){
            return redirect()->route('company.edit', $id)->with('success', 'Post updated successfully');
        }else{
        return redirect()->route('company.edit', $id)->with('fail', 'Post Not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobList = JobCircular::findOrFail($id);
        $jobList->delete();
        return redirect('job-list')->with('success', 'Job deleted successfully');
    }
}
