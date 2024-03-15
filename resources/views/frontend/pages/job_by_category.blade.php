@extends('frontend.layout.app')

@section('frontend_content')
<!-- Banner Sectoin -->
<section id="page-banner">
    <div class="banner" style="background-image: url('{{ asset('assets/img/banner/banner.jpg') }}');">
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                <h5>Job Category</h5>
                <h1 class="fw-bold display-4">{{ $cat_id->category_name }}</h1>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Job List & Category Section -->
<section id="joblist">
    <div class="container bg-white my-4">
        <div class="row">
            <div class="col-md-12 p-3">
                <!-- Job List Content Section -->
                <div class="joblist_content">
                @forelse ($jobsList as $Jobs)
                    <!-- Job List Item -->
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
                                <div class="job-cnt">

                                    <a href="{{ route('apply_job', $Jobs->id)}}" class="btn btn-md btn-primary ap-btn">Apply Now</a>

                                    <a href="{{ route('job-details', $Jobs->id)}}" class="btn btn-md btn-primary mt-3">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="joblist_item mb-2">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>No jobs available in this category</h5>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection