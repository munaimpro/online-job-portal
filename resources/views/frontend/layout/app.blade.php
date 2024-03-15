<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    @php
        $siteInformationData = App\Models\SiteInformation::first();
    @endphp
    <title>{{ $siteInformationData->title }}</title>
</head>

<body>
    <header id="header" class="text-white pb-1 bg-primary">
        <!-- Navigation Section -->
        <section id="topbar">
            <nav class="navbar navbar-expand-lg shadow-sm">
                <div class="container">
                    @php
                        $siteInformationData = App\Models\SiteInformation::first();
                        $siteMenuData = App\Models\SiteMenu::first();
                    @endphp
                    <a class="navbar-brand" href="{{ url($siteMenuData->navigation_menu_link) }}"><img src="{{ asset($siteInformationData->logo) }}" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @php
                                $siteMenuData = App\Models\SiteMenu::orderBy('id', 'asc')->get();
                            @endphp
                            @foreach ($siteMenuData as $siteMenu)
                                <li class="nav-item">
                                    <a class="nav-link active text-uppercase text-white text-shadow-white" aria-current="page" href="{{ $siteMenu->navigation_menu_link }}">{{ $siteMenu->navigation_menu_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex">
                            @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="btn btn-light text-uppercase text-shadow-white">Dashboard</a>
                                    @else
                                    <a href="{{ route('login') }}"><button class="btn btn-light text-uppercase ">SIGN IN</button></a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="signup">Create Account</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </section>
    </header>

    <main>

        @yield('frontend_content')


    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Axios JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>
    <!-- Custom JS -->
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
</body>

</html>
