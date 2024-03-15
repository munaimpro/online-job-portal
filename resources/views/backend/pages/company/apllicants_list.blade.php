@extends('backend.layout.app')

@section('page-content')
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total Apllications</h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

        <div class="table-responsive mb-4">
            <table id="nameTable" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                      <tr class="table-active">
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">DoB</th>
                        <th scope="col">Company Review</th>
                        <th scope="col">Action</th>
                      </tr>
                </thead>
                <tbody>
                @foreach ($applicantsLists as $details)
                     <tr>
                        <td>{{ $details->first_name }} {{ $details->last_name }}</td>
                        <td>{{$details->address}}</td>
                        <td>{{$details->dob}}</td>
                        <td>
                        @if($details->status==1)
                                {{ 'Pending' }}
                            @elseif($details->status==2)
                                {{ 'Viewed By Company' }}
                            @elseif($details->status==3)
                                {{ 'You are Selected' }}
                            @elseif($details->status==4)
                                {{ 'You are rejected' }}
                            @endif
                        </td>

                        <td class="d-flex gap-1">

                             <div class="edit-btn">
                             {{-- edit button --}}
                            <a href="{{ route('company/applicant_details', $details->id) }}" class="btn btn-primary btn-sm">See Details</a>
                           </div>

                          <div class="delete-btn">
                            {{-- delete success message --}}
                            @if (session('delete'))
                            <div class="alert alert-success" role="alert">
                                {{ session('delete') }}
                            </div>

                            @endif
                            
                            {{-- delete button --}}
                            <!-- <form action="{{ route('company/applicant_delete', $details->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form> -->

                          </div>
                        </td>
                      </tr>
                     @endforeach
                </tbody>
            </table>
            <!-- end table -->
        </div>
        <!-- end table responsive -->
        
    </div> <!-- container-fluid -->
@endsection
@section('modal_scripts')  

<script>
    $(document).ready(function() {
        new DataTable('#nameTable'); 
    });
</script>

@endsection