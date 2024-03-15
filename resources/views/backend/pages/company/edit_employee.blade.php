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
                    <h1 class="text-center pt-4 pb-4 border-bottom">Employee Info Update</h1>

                    <form action="{{route('company-employee.update',$emplEdit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- name --}}
                        <div class="col-12 mb-3">
                            <label for="name" class="form-label">Employee Name</label>
                            <input readonly value="{{$emplEdit->name}}" type="text" class="form-control">
                        </div>

                        {{-- company_role --}}
                        <div class="col-12 mb-3">
                            <label for="company_role" class="form-label">Company Role</label>
                            <select name="company_role" id="company_role" class="form-control">
                              <option value="2" @if($emplEdit->company_role == 2) {{ "Selected" }} @endif>Editor</option>
                              <option value="1" @if($emplEdit->company_role == 1) {{ "Selected" }} @endif>Manager</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <button id="liveToastBtn" type="submit" class="btn btn-primary">Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection