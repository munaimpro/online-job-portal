@extends('backend.layout.app')

@section('page-content')
<!-- Begin Page Content -->

@if(Auth()->user()->role == 1)
    {{-- Admin Section --}}
    @include('backend.pages.dashboard.components.admin_section');
@endif

@if(Auth()->user()->role == 2)
    {{-- Company Section --}}
    @include('backend.pages.dashboard.components.company_section');
@endif

@if(Auth()->user()->role == 0)
    {{-- User Section --}}
    @include('backend.pages.dashboard.components.user_section');
@endif

<!-- /.container-fluid -->
@endsection