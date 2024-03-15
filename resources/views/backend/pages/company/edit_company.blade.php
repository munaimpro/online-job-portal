@extends('backend.layout.app')

@section('page-content')


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
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
                <div class="company-inner card mt-5">
                    <h1 class="text-center pt-4 pb-4 border-bottom">Company Details Update</h1>
                    <form action="{{route('company-profile.update',$com_details->id)}}" method="POST" enctype="multipart/form-data"
                        class="row g-3 p-4">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="1">
                        <div class="col-md-6">
                            <label for="published_date" class="form-label">company_name</label>
                            <input name="company_name" placeholder="company_name" type="text" class="form-control" value="{{$com_details->company_name}}" id="company_name">
                            @error('company_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="company_email" class="form-label">company_email</label>
                            <input name="company_email" placeholder="company_email" type="text" class="form-control" value="{{$com_details->company_email}}"
                                id="company_email">
                            @error('company_email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="company_contact" class="form-label">company_contact</label>
                            <input name="company_contact" value="{{$com_details->company_contact}}" placeholder="company_contact" type="text"
                                class="form-control" id="company_contact">
                            @error('company_contact')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="company_address" class="form-label">company_address</label>
                            <input name="company_address" placeholder="company_address" type="text" class="form-control" value="{{$com_details->company_address}}"
                                id="company_address">
                            @error('company_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button id="liveToastBtn" type="submit" class="btn btn-primary">Update Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
