@extends('layouts.dashcommon')

@section('title')
    {{ __('Home') }}
@endsection

@section('content')
    <div class="offcanvas offcanvas-start sidebar-nav bgdrake lightfont" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">User Dashboard</h5>
        </div>
        <div class="offcanvas-body">
            <nav class=" navbar-dark">
                <ul class="navbar-nav">
                    <li class="d-grid mx-1 {{ request()->is('dashboard') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('/dashboard') }}" class=" nav-link mx-auto">
                            <span>
                                <i class="bi bi-speedometer2 me-2"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class=" fw-bold my-3 mt-5">
                            Booking
                        </div>
                    </li>
                    <li class="d-grid mx-1 mb-3 {{ request()->is('book') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ route('user.book') }}" class=" nav-link  mx-auto">
                            <span>
                                <i class="bi bi-ticket-detailed me-2"></i>
                            </span>
                            <span>Book Travel Package</span>
                        </a>
                    </li>
                    <li class="d-grid mx-1 mb-3 {{ request()->is('tickets') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ route('user.ticket') }}" class=" mx-auto nav-link">
                            <span>
                                <i class="bi bi-ticket-fill me-2"></i>
                            </span>
                            <span>Booked Tickets</span>
                        </a>
                    </li>

                    <li>
                        <div class=" fw-bold my-3 mt-3">
                            Profile
                        </div>
                    </li>
                    <li class="d-grid mx-1 mb-5 {{ request()->is('profile/edit') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ route('profile.edit') }}" class=" mx-auto nav-link ">
                            <span>
                                <i class="bi bi-person-bounding-box me-2"></i>
                            </span>
                            <span>Update Profile</span>
                        </a>
                    </li>
                    <li class="d-grid mx-1 mt-4 {{ request()->is('contact') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ route('user.contact') }}" class=" mx-auto nav-link">
                            <span>
                                <i class="bi bi-headset me-2"></i>
                            </span>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <form class="d-grid mx-1 mt-4 " action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-danger nav-link mx-1">
                                <span>
                                    <i class="bi bi-box-arrow-left me-2"></i>
                                </span>
                                <span>Log Out</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>

        </div>
    </div>
    <div class="container">
        @yield('userdash')
    </div>
    {{-- <div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">
                <p class="my-3">{{ __('Greetings, ') }}{{ Auth::user()->name }}</p>
                <a href="{{ route('profile.edit') }}" class="d-block">{{ __('Edit profile')}}</a>
                <a href="{{ route('password.edit') }}" class="d-block">{{ __('Edit password')}}</a>
                <a href="{{ route('two-factor-authentication.toggle') }}" class="d-block mb-3">{{ __('Toggle two factor authentication')}}</a>
            </div>
            <div class="card-footer text-center">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
                </form>

            </div>
        </div>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
    </div>
</div> --}}
@endsection
