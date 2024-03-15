@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile Settings</h1>
    </div>

    <!-- Profile Settings -->
    <div class="row">
    {{-- Profile Informatoin form --}}
        @include('backend.pages.settings.profile.components.update_profile_form')
    
    {{-- Password Update form --}}
    @include('backend.pages.settings.profile.components.update_password_form')
        
    </div>

</div>
<!-- /.container-fluid -->

@endsection