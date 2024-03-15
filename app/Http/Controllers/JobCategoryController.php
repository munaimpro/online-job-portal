<?php

namespace App\Http\Controllers;
use App\Models\JobCircular;
use App\Models\JobCategories;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobscategories= JobCategories::orderBy('id', 'desc')->get();
       // dd('$jobscategories');
         return view('backend.pages.admin.job_category', compact('jobscategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.admin.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:100'
        ]);

        $employee = JobCategories::create([
            'category_name' => $request->input('category_name')
        ]);

        if($employee){
            return redirect('/admin/job_category_list')->with('success', 'Category Added Successfully');
        }
         else{
            return back()->with('error', 'Something went wrong');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryEdit(string $id){
        $categories = JobCategories::findOrFail($id);
        return view('backend.pages.admin.edit_category',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function categoryUpdate(Request $request, string $id)
    // {
    //     $request->validate([
    //         'category_name' => 'required|string|max:100',
    //     ]);

    //     $cat = JobCategories::findOrFail($id);

    //     $cat->category_name = $request->input('category_name');
    //     // Update the category
    //     $result =  $cat->update();
    
    //     if($result){
    //         return back()->with('successMessage', 'Category updated successfully');
    //     } else{
    //         return back()->with('errorMessage', 'Category could not be updated');
    //     }
        
    // }


    public function categoryUpdate(Request $request, JobCategories $id){
        $request->validate([
            'category_name' => 'required|string|max:100',
        ]);

        $id->category_name = $request->input('category_name');
        // Update the category
        $result = $id->update();

        if ($result) {
            return back()->with('successMessage', 'Category updated successfully');
        } else {
            return back()->with('errorMessage', 'Category could not be updated');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function categoryDelete(Request $request, string $id){
        $categories = JobCategories::find($id);
        $categories->delete();

        return back();
    }

}
