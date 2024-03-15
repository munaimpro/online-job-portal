@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Create Job -->
    <div class="row">
        <div class="col-lg-10 m-auto">
            {{-- success message  with colse button--}}
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

            <div class="company-inner card my-5">
                <h1 class="text-center pt-4 pb-4 border-bottom">Add Company Profile</h1>
                <form action="{{route('company-profile.store')}}" method="POST" enctype="multipart/form-data" class="row g-3 p-4">
                    @csrf
                    <input type="hidden" name="user_id" value="1">
                    <div class="col-md-6">
                      <label for="company_name"class="form-label">Company Name</label>
                      <input name="company_name" placeholder="Company Name" type="text" class="form-control" id="company_name">
                      @error('company_name')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="company_email"class="form-label">Company Email</label>
                      <input name="company_email" placeholder="Company Email" type="email" class="form-control" id="company_email">
                      @error('company_email')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="company_contact"class="form-label">Contact</label>
                      <input name="company_contact" placeholder="Contact" type="text" class="form-control" id="company_contact">
                      @error('company_contact')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="company_address"class="form-label">Address</label>
                      <input name="company_address" placeholder="Address" type="text" class="form-control" id="company_address">
                      @error('company_address')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-12 mt-5">
                      <button id="liveToastBtn" type="submit" class="btn btn-primary">Create Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection