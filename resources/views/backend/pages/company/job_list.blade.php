@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Job List</h1>
        <div class="float-end">
            <a href="company/create" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>

    <!-- Company List Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th scope="col">Designation</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Vacancy</th>
                        <th scope="col">Publish Date</th>
                        <th scope="col">Employee Status</th>
                        <th scope="col">Publish Date</th>

                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($jobsLists as $jobList)
                     <tr>
                        <th scope="row">{{$jobList->designation}}</th>
                        <td>{{$jobList->application_deadline}}</td>
                        <td>{{$jobList->vacancy_count}}</td>
                        <td>{{$jobList->application_deadline}}</td>
                        <td>{{$jobList->employment_status}}</td>
                        <td>{{$jobList->published_date}}</td>
                   
                        <td class="d-flex gap-1">
                        <form action="{{route('applicants_list')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="text" name="job_id" value="{{$jobList->id}}" hidden>
                                <input type="text" name="company_id" value="{{$jobList->company_id}}" hidden>
                            <div class="view-btn mx-1">
                               {{-- view button --}}
                            <button type="submit" class="btn btn-primary btn-sm">Applicants List</a>
                            </div>
                        </form>
                            <div class="view-btn mx-1">
                               {{-- view button --}}
                            <a href="{{ route('company/single_job', $jobList->id) }}" class="btn btn-primary btn-sm">View</a>
                           </div>

                             <div class="edit-btn mx-1">
                             {{-- edit button --}}
                            <a href="{{ route('company.edit', $jobList->id) }}" class="btn btn-primary btn-sm">Edit</a>

                           </div>

                          <div class="delete-btn mx-1">
                            {{-- delete button --}}
                            <form action="{{ route('company.destroy', $jobList->id) }}" method="POST">
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