@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Company List</h1>
    </div>

    <!-- Company List Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>Sl</th>
                            <th>Company Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i = 0; @endphp
                    @foreach ($companylist as $companylistitem)
                    @php $i++; @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $companylistitem->company_name }}</td>
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