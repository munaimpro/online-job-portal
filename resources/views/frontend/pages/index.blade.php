@extends('frontend.layout.app')

@section('frontend_content')
    <!-- Banner Sectoin -->
    <section id="page-banner">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('assets/img/banner/banner_2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h1 class="fw-bolder display-1">Find Your Dream Job Today</h1>
                  <h4 class="fw-bolder">Explore thousands of job opportunities tailored to your skills and interests on our intuitive platform</h4>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/banner/banner_1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bolder display-1">Streamline Your Job Search</h1>
                    <h4 class="fw-bolder">Effortlessly search, apply, and track your job applications all in one place, saving you time and energy</h4>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('assets/img/banner/banner_3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bolder display-1">Connect with Top Employers</h1>
                    <h4 class="fw-bolder">Gain access to exclusive job postings from leading companies, and make meaningful connections that propel your career forward</h4>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <!-- Category Section -->
    <section id="categoryList" class="overflow-hidden space-top">
        <div class="container bg-white">
            <div class="section-title text-center">
                <h1 class="fw-bolder">Explore By Category</h1>
            </div>
            <div class="row p-4 justify-content-center">
            @foreach ($category as $categoryItem)
                <div class="col-lg-3 rounded p-4 m-1 border categoryItem">
                    <a href="{{ route('alljobs-by-category', $categoryItem->category_id)}}" target="_blank" class="text-decoration-none">
                        <h4 class="mb-2">{{ $categoryItem->category_name }}</h4>
                        <p>{{ $categoryItem->total_jobs }} Job</p>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>


    <!-- Job Section -->
    <section id="jobList" class="overflow-hidden space-top">
        <div class="container joblist-inner">
            <div class="section-title text-center">
                <h1 class="fw-bolder mb-5">Job Listing</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
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
                                <div class="job-cnt">

                                    <a href="{{ route('apply_job', $Jobs->id)}}" class="btn btn-md btn-primary ap-btn">Apply Now</a>

                                    <a href="{{ route('job-details', $Jobs->id)}}" class="btn btn-md btn-primary mt-3">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="section-button text-center mt-2">
                <a href="" class="btn btn-lg btn-primary">Brows More Job</a>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
    <section class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Company</h5>
                    <ul class="list-unstyled">
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">About Us</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Contact Us</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Our Services</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Privacy Policy</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Terms &amp; Condition</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">About Us</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Contact Us</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Our Services</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Privacy Policy</a></li>
                        <li><a class="btn btn-link text-white-50 text-decoration-none" href="#">Terms &amp; Condition</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Contact</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email" spellcheck="false" data-ms-editor="true">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright py-5 border-top">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0 text-center">
                        © <a class="text-white-50 text-decoration-none" href="{{ url('/') }}">Job Pulse</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
