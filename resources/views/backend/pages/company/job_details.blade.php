@extends('backend.layout.app')

@section('page-content')

<section>
    <!-- start page title -->
    <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Show Single Job</h4>
                    <h4 class="pb-3 border-bottom "><a href="{{ route('job-list') }}">Back</a></h4>
                </div>
                <div class="job-details">
                    <div class="row">
                        {{-- <div class="col-lg-12">
                            <img src="{{ asset('backend/assets/images') }}/{{ $jobList->image }}" alt="">
                        </div> --}}
                        <div class="col-lg-6">
                            <p class="border p-3"><strong>Company Name:</strong> {{$jobList->organization_name}}</p>
                            <p class="border p-3"><strong>Job Title:</strong> {{$jobList->designation}}</p>
                            <p class="border p-3"><strong>Vacancy:</strong> {{$jobList->vacancy_count}}</p>
                            <p class="border p-3"><strong>Location:</strong> {{$jobList->job_location}}</p>
                            <p class="border p-3"><strong>Salary:</strong> {{$jobList->minimum_salary}}</p>

                        </div>
                        <div class="col-lg-6">
                            <p class="border p-3"><strong>Public Date:</strong> {{$jobList->published_date}}</p>
                            <p class="border p-3"><strong>Deadline:</strong> {{$jobList->application_deadline}}</p>
                            <p class="border p-3"><strong>Vacancy:</strong> {{$jobList->vacancy_count}}</p>
                            <p class="border p-3"><strong>Requirements:</strong> {{$jobList->requirements}}</p>
                            <p class="border p-3"><strong>Benefits:</strong> {{$jobList->benefits}}</p>
                            <p class="border p-3"><strong>Employment Status:</strong> {{$jobList->employment_status}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end page title -->
</section>

@endsection
