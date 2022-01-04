<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ __('LuxTravels') }}</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('assets/css') }}/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link href="{{ asset('assets/css') }}/styles.css" rel="stylesheet">
</head>
<body class="bg-flip">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-lg container-fluid mt-2">
            <a href="#" class="nav-brand">
                <img src="./assets/images/logo.svg" alt="navLogo" width="50%" />
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link btn" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="#tourPlans">Tours</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link btn" href="#about">About</a>
                    </li>
                    @if (Route::has('login'))
                    <li class=" d-flex hidden nav-item me-lg-5">
                        @auth
                            <a href="{{ url('/home') }}" class="nav-link btn nav-btn-login">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link btn nav-btn-login">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link btn nav-btn-login mx-2">Register</a>
                            @endif
                        @endauth
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>
</body>
</html>
