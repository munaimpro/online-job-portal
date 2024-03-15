@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Create Job -->
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="company-inner card my-5">
                <h1 class="text-center pt-4 pb-4 border-bottom">Update Category</h1>
                @if (Session::has('successMessage'))
                    <div class="col-md-6 m-auto alert alert-success" role="alert">
                        {{ Session::get('successMessage') }}
                    </div>
                @endif

                @if (Session::has('errorMessage'))
                    <div class="col-md-6 m-auto alert alert-danger" role="alert">
                        {{ Session::get('errorMessage') }}
                    </div>
                @endif
                <form action="{{ route('category.update', ['id' => $categories->id]) }}" method="POST" class="row g-3 p-4">
                    @csrf
                    @method('put')

                    <div class="col-md-12 mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input name="category_name" value="{{ $categories->category_name }}" type="text" class="form-control" id="category_name">
                        @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                      <button id="liveToastBtn" type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection