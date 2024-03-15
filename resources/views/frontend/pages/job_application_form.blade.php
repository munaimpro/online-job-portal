@extends('frontend.layout.app')

@section('frontend_content')

        <!-- Job Details Section -->
        <section id="jobdetails">
            <div class="container bg-white my-4">
                <!-- Job Details Content Section -->
                <div class="col-md-10 m-auto border p-3">
                    <h1 class="text-center text-dark border-bottom pb-3">Application Form</h1>
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
                    <form action="{{route('job_submit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="company_id" value="{{ $job_details->company_id }}" hidden>

                        <input type="text" name="job_id" value="{{ $job_details->id }}" hidden>

                        <div class="row mt-5 mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" id="s_first_name" name="first_name" class="form-control"  placeholder="First Name" required/>
                                    <label class="form-label" for="s_first_name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" id="s_last_name" name="last_name" class="form-control" placeholder="Last Name" required/>
                                    <label class="form-label" for="s_last_name">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required/>
                            <label class="form-label" for="address">Address</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <select class="form-select" name="gender" id="floatingSelectGrid" aria-label="Floating label select example" required>
                                        <option selected>Choose an Item</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <label for="floatingSelectGrid">Gender</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" id="s_date" name="dob" class="form-control " placeholder="Select Your Birthday" required/>
                            <label class="form-label" for="s_date">Date of Birth</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" id="s_image" name="image" class="form-control " />
                            <label class="form-label" for="s_image">Image</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" id="s_sig" name="signature" class="form-control " />
                            <label class="form-label" for="s_sig">Signature</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" id="s_cv" name="cv" class="form-control "/>
                            <label class="form-label" for="s_cv">Upload Your CV</label>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form_check" />
                            <label class="form-check-label" for="form_check">
                            Agree to terms and agreement
                            </label>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success w-100 border-radius-0" type="submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Axios JS CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>
<!-- Custom JS -->
<script src="js/custom.js"></script>
</body>
</html>