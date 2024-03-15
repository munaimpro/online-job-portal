@extends('frontend.layout.app')

@section('frontend_content')
    <!-- Banner Sectoin -->
    <section id="page-banner">
        <div class="banner" style="background-image: url('{{ asset('assets/img/banner/banner_6.jpg') }}');">
            <div class="container">
                <div class="row">
                <div class="col-sm-12">
                    <h1 class="fw-bold display-4 text-shadow-black">Contact</h1>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container-fluid bg-white my-4">
            <div class="row">
                <!-- Contact Details Section -->
                <div class="col-md-6 p-3">
                    <div class="mb-4 mt-5">
                        <div class="row mb-3">
                            <div class="icon col-2 d-flex align-items-center justify-content-center fs-1">
                                <i class="fa fa-1x fa-location text-primary"></i>
                            </div>
                            <div class="col-10">
                                <p class="mb-0 mt-2">A108 Adam Street</p>
                                <p>New York, NY 535022</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="icon col-2 d-flex align-items-center justify-content-center fs-1">
                                <i class="fa fa-1x fa-envelope text-primary"></i>
                            </div>
                            <div class="col-10 mt-2">
                                <p>info@example.com</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="icon col-2 d-flex align-items-center justify-content-center fs-1">
                                <i class="fa fa-1x fa-phone text-primary"></i>
                            </div>
                            <div class="col-10 mt-2">
                                <p>+1 5589 55488 55s</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form Section -->
                <div class="col-md-6 mb-2 p-3">
                    <form action="{{route('job_submit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-5 mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" id="s_first_name" name="name" class="form-control"  placeholder="First Name" required/>
                                    <label class="form-label" for="s_first_name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" id="s_last_name" name="last_name" class="form-control" placeholder="Last Name" required/>
                                    <label class="form-label" for="s_last_name">Your Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="subject" required/>
                            <label class="form-label" for="subject">Subject</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea style="height: 150px" id="message" name="message" class="form-control" placeholder="message" required></textarea>
                            <label class="form-label" for="subject">Message</label>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-lg btn-primary w-100 border-radius-0" type="submit" >Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection