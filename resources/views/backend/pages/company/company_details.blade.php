@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Company Details</h1>
        <div class="float-end">
            <a href="company-profile/create" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add New</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($com_details as $details)
                        @php $i++ @endphp
                        <tr>
                        <td>{{ $i }}</td>
                        <td>{{$details->company_name}}</td>
                        <td>{{$details->company_email}}</td>
                        <td>{{$details->company_contact}}</td>
                        <td>{{$details->company_address}}</td>
                        <td class="d-flex gap-1">

                            <div class="view-btn mx-1">
                                {{-- view button --}}
                                <a href="{{ route('company-profile.show', $details->id) }}" class="btn btn-primary btn-sm">View</a>
                            </div>

                            <div class="edit-btn mx-1">
                                {{-- edit button --}}
                                <a href="{{ route('company-profile.edit', $details->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>

                            <div class="delete-btn mx-1">
                                {{-- delete success message --}}
                                @if (session('delete'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                            
                                {{-- delete button --}}
                                <form action="{{ route('company-profile.destroy', $details->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
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