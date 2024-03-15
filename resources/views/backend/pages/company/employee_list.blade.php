@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Company Employees</h1>
        <div class="float-end">
            <a href="/company-employee/create" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add New</a>
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
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                               $i= 0;
                        @endphp
                         @foreach ($empl_list as $employeeList)
                         @php
                             $i++;
                         @endphp
                         <tr>
                            <th scope="row">
                                {{$i}}
                            </th>
                            <th scope="row">{{$employeeList->name}}</th>
                            <th scope="row">
                                @if ($employeeList->company_role == 1)
                                    {{ 'Manager' }}
                                @else
                                    {{ 'Editor' }}
                                @endif
                            </th>
                            <td>{{$employeeList->contact}}</td>
                            <td>{{$employeeList->address}}</td>
                            <td>{{$employeeList->joining_date}}</td>
                            <td class="d-flex gap-1">
    
                                 <div class="edit-btn ">
                                 {{-- edit button --}}
                                 <a href="{{ route('company-employee.edit', $employeeList->id) }}" class="btn btn-primary btn-sm">Edit</a>
    
                               </div>
    
                              <div class="delete-btn">
                                <form action="{{ route('company-employee.destroy', $employeeList->id) }}" method="POST">
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