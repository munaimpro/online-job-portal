@extends('backend.layout.app')

@section('page-content')

<section>
    <div class="container">
        <div class="row card">
            <div class="col-lg-12">
                <div class="cmn-header pt-5 d-flex justify-content-between">
                    <h4 class="pb-3 border-bottom ">Company Details</h4>
                    <h4 class="pb-3 border-bottom "><a href="{{ route('company-profile.index') }}">Back</a></h4>
                </div>
                <div class="job-details">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="border p-3"><strong>Company Name:</strong> {{$com_details->company_name}}</p>
                            <p class="border p-3"><strong>Company Email:</strong> {{$com_details->company_email}}</p>
                        </div>
                        <div class="col-lg-6">
                            <p class="border p-3"><strong>Contact:</strong> {{$com_details->company_contact}}</p>
                            <p class="border p-3"><strong>Deadline:</strong> {{$com_details->company_address}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

