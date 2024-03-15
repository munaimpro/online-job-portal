@extends('frontend.layout.app')

@section('frontend_content')
<!-- Banner Sectoin -->
<section id="page-banner">
    <div class="banner" style="background-image: url('{{ asset('assets/img/banner/banner.jpg') }}');">
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                <h1 class="fw-bold display-4">Job Detail</h1>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Job Details Section -->
<section id="jobdetails">
    <div class="container bg-white my-4">
        <div class="col-md-12">
            <!-- Job Details Header Section -->
            <div class="jobdetails_header">
                <div class="row">
                        <div class="company_logo text-center">
                            <img src="{{ asset('backend/assets/images/company/' . $job_details->company_logo) }}" alt="company_logo">
                        </div>
                        <h2>{{ $job_details->organization_name }}</h2>
                        <h2 class="text-primary">{{ $job_details->designation }}</h2>
                    </div>

                <div class="mb-5">
                    <p>Application Deadline: <span class="text-primary fw-bold">{{ $job_details->application_deadline }}</span></p>
                </div>
            </div>

            <div class="row">
                {{-- Job Applied Validation Check --}}
                @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Job Details Content Section -->
                <div class="col-md-9">
                    <div class="jobdetails_content">
                        <div class="card">
                            <div class="card-body">
                            <!-- Job Requirements -->
                                <div class="py-4 col-12 border-bottom jobdetails_content_body">
                                    <div class="jobdetails_content_title">
                                        <h4 class="text-primary">Educational Qualification</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        <p>{{ $job_details->education }}</p>
                                    </div>
                                </div>

                                <!-- Job Experience -->
                                <div class="py-4 col-12 border-bottom py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h4 class="text-primary">Experience</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        <p>{{ $job_details->experience }}</p>
                                    </div>
                                </div>

                                <!-- Job Requirements -->
                                <div class="py-4 col-12 border-bottom py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h4 class="text-primary">Requirements</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        {{ $job_details->requirements }}
                                    </div>
                                </div>

                                <!-- Job Responsibility -->
                                <div class="py-4 col-12 border-bottom py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h4 class="text-primary">Responsibilities & Context</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        {{ $job_details->responsibilities }}
                                    </div>
                                </div>

                                <!-- Job Benefits -->
                                <div class="py-4 col-12 py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h4 class="text-primary">Compensation & Other Benefits</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        <p>{{ $job_details->benefits }}</p>
                                    </div>
                                </div>

                                <!-- Job Employment -->
                                <div class="py-4 col-12 py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h4 class="text-primary">Employment Status</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        <p>{{ $job_details->employment_status }}</p>
                                    </div>
                                </div>

                                <!-- Job Location -->
                                <div class="py-4 col-12 py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h4 class="text-primary">Job Loacation</h4>
                                    </div>
                                    <div class="jobdetails_content_text">
                                        <p>{{ $job_details->job_location }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details Summary Section -->
                <div class="col-md-3">
                    <div class="jobdetails_summary">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 mb-4 summary_title">
                                    <h3 class="text-primary text-center">Job Overview</h3>
                                </div>
                                <div class="summary_body">
                                    <p class="mb-2 border-bottom-dotted">Vacency: {{ $job_details->vacancy_count }}</p>
                                    <p class="mb-2">Published: {{ $job_details->published_date }}</p>
                                    <p class="mb-2">Location: {{ $job_details->job_location }}</p>
                                    <p class="mb-2">Minimum Salary: Tk. {{ $job_details->minimum_salary }} (Monthly)</p>
                                </div>
                                <div class="col-12 mt-5">
                                    <a href="{{ route('apply_job', $job_details->id)}}" class="btn btn-lg btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
