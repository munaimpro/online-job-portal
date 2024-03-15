@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category List</h1>
        <div class="float-end">
            <a href="" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>

    <!-- Company List Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>Sl</th>
                            <th>Job Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @foreach ($jobscategories as $jobscategoryitem)
                    @php $i++; @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $jobscategoryitem->category_name }}</td>
                            <td><a href="/category/{{ $jobscategoryitem->id }}/edit" class="btn btn-primary">Edit</a> <a href="{{ route('category.delete', ['id' => $jobscategoryitem->id]) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection