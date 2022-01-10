<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ __('LuxTravels') }}</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('assets/css') }}/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css') }}/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    {{-- Custom CSS --}}
    <link href="{{ asset('assets/css') }}/styles.css" rel="stylesheet">

</head>

<body class="bg-light">
    <nav class=" navbar navbar-expand-lg navbar-dark dark-nav sticky-top">
        <div class="container-fluid mt-2">
            {{-- OffCanvas Trigger --}}
            <button class=" navbar-toggler mx-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class=" navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            {{--  --}}
            <a href="{{ url('/') }}" class="nav-brand">
                <img src="{{ asset('assets/images') }}/logo.svg" alt="navLogo" width="50%" />
            </a>


            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item">
                    <p class="my-3">{{ __('Greetings, ') }}{{ Auth::user()->name }}</p>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js') }}/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js') }}/datatables.min.js"></script>
    <script src="{{ asset('assets/js') }}/script.js"></script>
</body>

</html>
