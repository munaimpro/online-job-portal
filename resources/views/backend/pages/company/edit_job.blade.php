@extends('backend.layout.app')

@section('page-content')

<section>
    <!-- start page title -->
    <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="pb-3 border-bottom "><a href="{{ route('job-list') }}">Back</a></h4>
                </div>
                <div class="company-inner card mt-5">
                    <h1 class="text-center pt-4 pb-4 border-bottom">Job Details Update</h1>
                    {{-- Error Message Start --}}
                    @if (Session::has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
    
                    {{-- Success Message Start --}}
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{route('company.update',$jobList->id)}}" method="POST" enctype="multipart/form-data"
                        class="row g-3 p-4">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="organization_name" class="form-label">Organization Name</label>
                            <input name="organization_name" placeholder="organization name" type="text" value="{{$jobList->organization_name}}"
                                class="form-control" id="organization_name">
                            @error('organization_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="designation" class="form-label">designation</label>
                            <input name="designation" placeholder="designation" type="text" class="form-control" value="{{$jobList->designation}}"
                                id="designation">
                            @error('designation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="application_deadline" class="form-label">Application Deadline</label>
                            <input name="application_deadline" type="date" class="form-control" value="{{$jobList->application_deadline}}"
                                id="application_deadline" placeholder="application_deadline">
                            @error('application_deadline')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="col-6">
                            <label for="company_logo" class="form-label">Company Logo</label>
                            <input name="company_logo" type="file" value="{{$jobList->company_logo}}" class="form-control" id="company_logo"
                                placeholder="application_deadline">
                            @error('company_logo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="col-6">
                            <label for="vacancy_count" class="form-label">Vacancy Count</label>
                            <input name="vacancy_count" type="number" value="{{$jobList->vacancy_count}}" class="form-control" id="vacancy_count"
                                placeholder="vacancy_count">
                            @error('vacancy_count')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="job_location" class="form-label">Job Location</label>
                            <input name="job_location" type="text" value="{{$jobList->job_location}}" class="form-control" id="job_location"
                                placeholder="job_location">
                            @error('job_location')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="minimum_salary" class="form-label">Minimum Salary</label>
                            <input name="minimum_salary" placeholder="minimum_salary" type="number" class="form-control" value="{{$jobList->minimum_salary}}"
                                id="minimum_salary">
                            @error('minimum_salary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="published_date" class="form-label">Published Date</label>
                            <input name="published_date" placeholder="published_date" type="date" class="form-control" value="{{$jobList->published_date}}"
                                id="published_date">
                            @error('published_date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="education" class="form-label">education</label>
                            <input name="education" placeholder="education" type="text" class="form-control" value="{{$jobList->education}}"
                                id="education">
                            @error('education')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="experience" class="form-label">experience</label>
                            <input name="experience" placeholder="experience" type="text" class="form-control" value="{{$jobList->experience}}"
                                id="experience">
                            @error('experience')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="requirements" class="form-label">Requirements</label>
                            <input name="requirements" placeholder="requirements" type="text" class="form-control" value="{{$jobList->requirements}}"
                                id="requirements">
                            @error('requirements')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="responsibilities" class="form-label">Responsibilities</label>
                            <input name="responsibilities" value="{{$jobList->responsibilities}}" placeholder="responsibilities" type="text"
                                class="form-control" id="responsibilities">
                            @error('responsibilities')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="benefits" class="form-label">Benefits</label>
                            <input name="benefits" placeholder="benefits" type="text" class="form-control" value="{{$jobList->benefits}}"
                                id="benefits">
                            @error('benefits')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="employment_status" class="form-label">Employment Status</label>
                            <input name="employment_status" value="{{$jobList->employment_status}}" placeholder="employment_status" type="text"
                                class="form-control" id="employment_status">
                            @error('employment_status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-md-4">
                          <label for="inputState" class="form-label">State</label>
                          <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">Zip</label>
                          <input type="text" class="form-control" id="inputZip">
                        </div> --}}
                        <div class="col-12">
                            <button id="liveToastBtn" type="submit" class="btn btn-primary">Update Job</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    <!-- end page title -->
</section>

@endsection
