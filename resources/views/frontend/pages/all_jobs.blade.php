@extends('frontend.layout.app')

@section('frontend_content')
    <!-- Banner Sectoin -->
    <section id="page-banner">
        <div class="banner" style="background-image: url('{{ asset('assets/img/banner/banner.jpg') }}');">
            <div class="container">
                <div class="row">
                <div class="col-sm-12">
                    <h1 class="fw-bold display-4">Available Jobs</h1>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job List & Category Section -->
    <section id="joblist">
        <div class="container bggg  my-4">
                <div class="row">
                    <div class="col-lg-9">
                        @foreach ($jobsList as $Jobs)
                        <div class="job-list-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="job-cnt">
                                        <a href="{{ route('job-details', $Jobs->id)}}" class="text-primary text-decoration-none fs-5 fw-bold">{{$Jobs->designation}}</a></h5>
                                        <p class="fw-bold ">{{$Jobs->organization_name}}</p>
                                        <p class="text-gray"><i class="fa-solid fa-location-dot"></i> {{$Jobs->job_location}}</p>
                                        <p class="mb-1"><i class="fa fa-calendar"></i> Deadline: <b>{{$Jobs->application_deadline}}</b></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="job-cnt">

                                        <p class="mb-1"><i class="fa-solid fa-briefcase"></i> {{$Jobs->experience}}</p>
                                        <p class="mb-1"><i class="fa-solid fa-graduation-cap"></i> {{$Jobs->education}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="job-cnt mt-4">

                                        <a href="{{ route('apply_job', $Jobs->id)}}" class="btn btn-sm btn-primary ap-btn">Apply Now</a>

                                        <a href="{{ route('job-details', $Jobs->id)}}" class="btn btn-sm btn-primary mt-3">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                <!-- Job Category Section -->
                <div class="col-md-3 joblist_item mb-2">
                    <div class="card">
                        <div class="card-header bg-white text-center">
                            <h5 class="fw-bold">Job Category</h5>
                        </div>
                        @foreach ($jobPublished as $jp)
                        <div class="card-body">
                            <!-- Card content goes here -->
                            <a href="{{ route('alljobs-by-category', $jp->category_id)}}" target="_blank" class="text-decoration-none fs-5">
                                <p class="fs-5">{{$jp->category_name}} ({{$jp->total_jobs}})</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
