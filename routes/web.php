<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobCircularController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\JobCompanyInfoController;
use App\Http\Controllers\SettingsInformationController;
use App\Http\Controllers\CompanyEmployeesInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Route for ForntEnd
Route::get('/', [HomeController::class, 'show_index_page']);
Route::get('/jobs', [JobCircularController::class, 'jobs_list']);
//Route::get('job-details/{id}', [JobCircularController::class, 'show_jobDetails']);
Route::get('/job-details/{id}', [JobCircularController::class, 'show_jobDetails'])->name('job-details');
Route::get('/alljobs-by-category/{id}', [JobCircularController::class, 'show_alljobs_by_category'])->name('alljobs-by-category');
Route::get('/about', [HomeController::class, 'show_about_page'])->name('about');
Route::get('/contact', [HomeController::class, 'show_contact_page'])->name('contact');


//Resource Controller route
Route::resource('company', JobCircularController::class);
Route::resource('jobcategories', JobCategoryController::class);
//company employee route
Route::resource('company-employee', CompanyEmployeesInfoController::class);
// company_profile_details
Route::resource('company-profile', CompanyDetailsController::class);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class, 'user_type_check'])->name('dashboard');
    // Profile Setting
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/user_list',[UserController::class, 'index'])->name('admin/user_list');
    Route::get('/admin/job_category_list',[JobCategoryController::class, 'index'])->name('admin/job_category_list');
    Route::get('/admin/company_list',[JobCompanyInfoController::class, 'index'])->name('admin/company_list');
    // Website Setting
    Route::get('/settings', [SettingsInformationController::class, 'systemSettings']);
    Route::post('/updateSystemInfo', [SettingsInformationController::class, 'updateSystemInformation']);
    Route::post('/updateSystemMenu/{menuId}', [SettingsInformationController::class, 'updateSystemMenu']);
    Route::get('/deleteSystemMenu/{menuId}', [SettingsInformationController::class, 'deleteSystemMenu']);
    Route::post('/createSystemMenu', [SettingsInformationController::class, 'createSystemMenu']);
    // For Company Dashboard
    Route::get('/job-list', [JobCircularController::class, 'jobList'])->name('job-list');
    Route::post('/applicants_list', [JobCircularController::class, 'applicants_list'])->name('applicants_list');
    Route::get('/company/applicant_details/{id}', [JobCircularController::class, 'applicant_details'])->name('company/applicant_details');
    Route::post('/applicants_update', [JobCircularController::class, 'applicants_update'])->name('applicants_update');
    Route::get('company/applicant_delete/{id}', [JobCircularController::class, 'applicant_delete'])->name('company/applicant_delete');
    Route::get('/company/single_job/{id}', [JobCircularController::class, 'show_jobs_for_id'])->name('company/single_job');
    // User Job Application
    //Route::get('/apply_job/{id}', [JobCircularController::class, 'job_application_form'])->name('apply_job');
    Route::get('/apply_job/{id}', [JobCircularController::class, 'job_application_form'])->name('apply_job');
    Route::post('/job_submit', [JobCircularController::class, 'job_application_submit'])->name('job_submit');   
    Route::get('/user/jobs_application', [JobCircularController::class, 'applied_jobs_list'])->name('user/jobs_application');
    // Plugin
    Route::get('/plugins', [PluginController::class, 'show_plugin_page'])->name('plugins');
    Route::get('/activate_plugin/{id}', [PluginController::class, 'activate_plugin'])->name('activate_plugin');
    Route::get('/deactivate_plugin/{id}', [PluginController::class, 'deactivate_plugin'])->name('deactivate_plugin');

    // Category
    Route::get('/category-list', [JobCategoryController::class, 'categoryList'])->middleware(['auth', 'verified'])->name('category-list');
    Route::get('/category-create', [JobCategoryController::class, 'categoryCreate'])->middleware(['auth', 'verified'])->name('category-create');
    Route::post('/category-store', [JobCategoryController::class, 'categoryStore'])->middleware(['auth', 'verified'])->name('category-store');
    Route::get('/category/{id}/edit', [JobCategoryController::class, 'categoryEdit'])->middleware(['auth', 'verified'])->name('category.edit');
    Route::put('/category/{id}', [JobCategoryController::class, 'categoryUpdate'])->middleware(['auth', 'verified'])->name('category.update');
    Route::get('/category/{id}', [JobCategoryController::class, 'categoryDelete'])->middleware(['auth', 'verified'])->name('category.delete');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
