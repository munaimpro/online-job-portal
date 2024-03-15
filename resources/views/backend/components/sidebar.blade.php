@php
     $role=Auth()->user()->role;
@endphp

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Job Pulse</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- User Sidebar -->
            @if (Auth()->check() && $role == 0)
            <!-- Nav Item - Job Applied -->
            <li class="nav-item">
                <a class="nav-link" href="user/jobs_application">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Jobs Applied</span>
                </a>
            </li>

            <!-- Nav Item - Job Circulars -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Job Circulars</span>
                </a>
            </li>

            <!-- Nav Item - Profile -->
            <li class="nav-item">
                <a class="nav-link" href="/profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            @endif

            <!-- Admin Sidebar -->
            @if (Auth()->check() && $role == 1)
            <!-- Nav Item - Job Category -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/job_category_list">
                    <i class="fas fa-fw fa-tag"></i>
                    <span>Job Category</span>
                </a>
            </li>

            <!-- Nav Item - Company List -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/company_list">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Company List</span>
                </a>
            </li>

            <!-- Nav Item - User List -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/user_list">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User List</span>
                </a>
            </li>

            <!-- Nav Item - Settings -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#adminSettings"
                    aria-expanded="true" aria-controls="adminSettings">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="adminSettings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Settings</h6>
                        <a class="collapse-item" href="/profile">Profile</a>
                        <a class="collapse-item" href="/settings">Website</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Plugin -->
            <li class="nav-item">
                <a class="nav-link" href="/plugins">
                    <i class="fas fa-puzzle-piece"></i>
                    <span>Plugin</span>
                </a>
            </li>
            @endif

            <!-- Company Sidebar -->
            @if (Auth()->check() && $role == 2)
                @php
                    $plugin = App\Http\Controllers\PluginController::fetchAllPlugin();
                @endphp
                @if($plugin)
                @foreach ($plugin as $pluginData)
                    @if ($pluginData->plugin == 'employee' && $pluginData->status == 1)
                    <!-- Nav Item - Company Employee -->
                    <li class="nav-item">
                        <a class="nav-link" href="/company-employee">
                            <i class="fas fa-fw fa-user-tie"></i>
                            <span>Employee</span>
                        </a>
                    </li>
                    @endif
                @endforeach
            @endif

            <!-- Nav Item - Company Info -->
            <li class="nav-item">
                <a class="nav-link" href="/company-profile">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Company Information</span>
                </a>
            </li>

            <!-- Nav Item - Job -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#companyJob"
                    aria-expanded="true" aria-controls="companyJob">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Job</span>
                </a>
                <div id="companyJob" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Job</h6>
                        <a class="collapse-item" href="/company/create">Create New Job</a>
                        <a class="collapse-item" href="/job-list">All Job</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Plugin -->
            <li class="nav-item">
                <a class="nav-link" href="/plugins">
                    <i class="fas fa-puzzle-piece"></i>
                    <span>Plugin</span>
                </a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">