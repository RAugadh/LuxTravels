@extends('layouts.dashnav')

@section('title')
    {{ __('Admin') }}
@endsection

@section('content')
    <div class="offcanvas offcanvas-start sidebar-nav bgdrake lightfont" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Admin Panel</h5>
        </div>
        <div class="offcanvas-body">
            <nav class=" navbar-dark">
                <ul class="navbar-nav">
                    <li class="d-grid mx-1 mb-4 {{ request()->is('dashboard') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('dashboard') }}" class=" nav-link mx-auto">
                            <span>
                                <i class="bi bi-speedometer2 me-2"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class=" fw-bold">
                            Users
                        </div>
                    </li>
                    <li class="d-grid mx-1 {{ request()->is('admin/users') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('admin/users') }}" class=" nav-link mx-auto">
                            <span>
                                <i class="bi bi-people-fill me-2"></i>
                            </span>
                            <span>User Management</span>
                        </a>
                    </li>

                    <li>
                        <div class=" fw-bold my-3 mt-5">
                            Booking
                        </div>
                    </li>
                    <li class="d-grid mx-1 mb-3 {{ request()->is('admin/tickets') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('admin/tickets') }}" class=" nav-link  mx-auto">
                            <span>
                                <i class="bi bi-ticket-detailed me-2"></i>
                            </span>
                            <span>Ticket Management</span>
                        </a>
                    </li>
                    <li class="d-grid mx-1 {{ request()->is('admin/tours') ? 'btn-primary' : 'nav-btn' }}">
                        <a href="{{ url('admin/tours') }}" class=" mx-auto nav-link">
                            <span>
                                <i class="bi bi-box-seam me-2"></i>
                            </span>
                            <span>Package Management</span>
                        </a>
                    </li>
                    <li>
                        <div class=" fw-bold my-3 mt-5">
                            Profile
                        </div>
                    </li>
                    <li class="d-grid mx-1 mb-3">
                        <a href="" class=" mx-auto nav-link">
                            <span>
                                <i class="bi bi-person-bounding-box me-2"></i>
                            </span>
                            <span>Update Profile</span>
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
    </div> --}}
    <div class="mainContent">
        @yield('admindash')
    </div>
@endsection
