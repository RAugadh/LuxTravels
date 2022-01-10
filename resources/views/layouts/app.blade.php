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

<body class="bg-flip overflow-hidden">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-lg container-fluid mt-2">
            <a href="{{ url('/') }}" class="nav-brand">
                <img src="{{ asset('assets/images') }}/logo.svg" alt="navLogo" width="50%" />
            </a>
            @if (Route::current()->uri() == '/')
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    @else
                        <ul class="navbar-nav ms-auto text-center">

            @endif

            @if (Route::has('login'))
                <li class=" d-flex hidden nav-item me-lg-5">
                    @auth
                        <form method="get" action="{{ url('/dashboard') }}">
                            <button type="submit" class="nav-link btn btn-primary mx-1">Dashboard</button>
                        </form>
                    @else
                        <form method="get" action="{{ route('login') }}">
                            <button type="submit" class="nav-link btn btn-primary mx-1">Log in</button>
                        </form>

                        @if (Route::has('register'))
                            <form method="get" action="{{ route('register') }}">
                                <button type="submit" class="nav-link btn btn-primary mx-1">Register</button>
                            </form>
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
