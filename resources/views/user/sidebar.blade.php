@extends('layouts.dashnav')

@section('title')
    {{ __('User') }}
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
                        <a href="{{ url('dashboard') }}" class=" nav-link mx-auto border-0">
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
                        <a href="{{ url('book') }}" class=" nav-link  mx-auto border-0">
                            <span>
                                <i class="bi bi-ticket-detailed me-2"></i>
                            </span>
                            <span>Book Travel Package</span>
                        </a>
                    </li>
                    <li class="d-grid mx-1 mb-3 {{ request()->is('tickets') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('tickets') }}" class=" mx-auto nav-link border-0">
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
                    <li class="d-grid mx-1 mb-5 {{ request()->is('profile') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('profile') }}" class=" mx-auto nav-link border-0">
                            <span>
                                <i class="bi bi-person-bounding-box me-2"></i>
                            </span>
                            <span>Update Profile</span>
                        </a>
                    </li>
                    <li class="d-grid mx-1 mt-4 {{ request()->is('chat') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('chat') }}" class=" mx-auto nav-link border-0">
                            <span>
                                <i class="bi bi-headset me-2"></i>
                            </span>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <form class="d-grid mx-1 mt-4 " action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-danger nav-link mx-1 border-0">
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
    <div class="mainContent">
        @yield('userdash')
    </div>
@endsection
