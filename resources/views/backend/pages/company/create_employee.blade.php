@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Create Job -->
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="company-inner card my-5">
                <h1 class="text-center pt-4 pb-4 border-bottom">Create Employee</h1>
                <form action="{{route('company-employee.store')}}" method="POST" enctype="multipart/form-data" class="row g-3 p-4">
                    @csrf
                    {{-- company_id --}}
                    <input value="{{ $companyId->id }}" name="company_id" type="hidden" class="form-control" id="company_id">

                    <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Staff Name</label>
                    <input name="name" placeholder="name" type="text" class="form-control" id="name">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">email</label>
                    <input name="email" placeholder="email" type="email" class="form-control" id="email">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="contact" class="form-label">Phone No.</label>
                    <input name="contact" placeholder="contact" type="contact" class="form-control" id="contact">
                    @error('contact')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input name="address" placeholder="address" type="address" class="form-control" id="address">
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" placeholder="password" type="password" class="form-control" id="password">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">Company_role</label>
                        <select name="company_role" id="inputState" class="form-control">
                            <option value="" selected>Choose...</option>
                            <option value="1">Manager</option>
                            <option value="2">Editor</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="inputState" class="form-control">
                            <option value="" selected>Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="joining_date" class="form-label">joining_date</label>
                      <input name="joining_date" placeholder="joining_date" type="date" class="form-control" id="joining_date">
                      @error('joining_date')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <button id="liveToastBtn" type="submit" class="btn btn-primary">Create Employee</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection