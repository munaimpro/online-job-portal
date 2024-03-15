@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Applied Jobs</h1>
    </div>

    <!-- Company List Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>Sl</th>
                            <th>Organization Name</th>
                            <th>Post</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($job_details as $job)
                        @php $i++; @endphp
                            <tr>
                                <td>
                                   {{ $i }}
                                </td>
                                <td>
                                   {{ $job->organization_name }}
                                </td>
                                <td>
                                  {{ $job->designation }}
                                </td>
                                <td>
                               
                                    @if($job->status==1)
                                        {{ 'Pending' }}
                                    @elseif($job->status==2)
                                        {{ 'Viewed By Company' }}
                                    @elseif($job->status==3)
                                        {{ 'You are Selected' }}
                                    @elseif($job->status==4)
                                        {{ 'You are rejected' }}
                                    @endif
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