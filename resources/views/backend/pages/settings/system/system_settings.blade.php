@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
    </div>

    {{-- System Settings --}}
    <div class="row">
        {{-- System Informatoin - title & logo --}}
        @include('backend.pages.settings.system.components.system_information')

        {{-- System menu --}}
        @include('backend.pages.settings.system.components.system_menu')
    </div>

</div>
<!-- /.container-fluid -->

@endsection