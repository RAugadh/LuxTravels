@extends('layouts.app')

@section('nav')

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
                        <h6 class="mx-3">{{ __('Greetings,') }} &nbsp{{ Auth::user()->name }} </h6>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </body>


@endsection
