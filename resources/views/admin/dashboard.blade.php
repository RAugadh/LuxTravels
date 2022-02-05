@extends('admin.sidebar')

@section('admindash')
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card login-frm-bg mb-2 mt-2 w-50 mx-auto">

                <div class="card-body">

                    <div class="profile-header-container">
                        <div class="profile-header-img">
                            <img class="img-circle" src="@if (Auth::user()->photo !== null) {{ asset('uploads/profile') }}/{{ Auth::user()->photo }} @else{{ asset('assets/images/profile.jpg') }} @endif" />
                            <!-- badge -->
                            <div class="rank-label-container">
                                <span class="label label-default rank-label">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                        <h1>Hello Admin </h1>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-lg-6">
            <div class="p-5 pe-2">
                <ol class="list-group border bg-gradient">
                    <div class="border-end bg-content p-2">
                        <h4 class="float-start text-white ms-3">New Users</h4>
                        <a href="{{ url('admin/users') }}" class="float-end text-info me-3">See All</a>
                    </div>
                    @if (!empty($users) && $users->count())
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $user->name }}</div>
                                    {{ $user->email }}
                                </div>
                                <div class="me-2">
                                    @if ($user->email_verified_at != null)
                                        <span class="badge bg-success rounded-pill">Verified</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">Not Approved</span>
                                    @endif
                                </div>
                                <div class="">
                                    @foreach ($roles as $role)
                                        @isset($user) @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                                            @if ($role->id = 2)
                                                <span class="badge bg-secondary rounded-pill">{{ $role->name }}</span>
                                            @else
                                                <span class="badge bg-warning rounded-pill">{{ $role->name }}</span>
                                            @endif
                                        @endif @endisset
                                    @endforeach
                                </div>
                            </li>

                        @endforeach
                    @else
                        <div class="alert alert-danger d-flex align-items-center m-5" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <h5>No New Users.</h5>
                            </div>
                        </div>
                    @endif

                </ol>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-5 ps-2">
                <ol class="list-group border bg-gradient">
                    <div class="border-end bg-content p-2">
                        <h4 class="float-start text-white ms-3">New Tickets</h4>
                        <a href="{{ url('admin/tickets') }}" class="float-end text-info me-3">See All</a>
                    </div>
                    @if (!empty($tickets) && $tickets->count())
                        @foreach ($tickets as $ticket)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">
                                        @foreach ($tours as $tour)
                                            @if ($tour->id == $ticket->tour_id)
                                                {{ $tour->name }}
                                            @endif
                                        @endforeach
                                    </div>
                                    @foreach ($t_users as $t_user)
                                        @if ($t_user->id == $ticket->user_id)
                                            {{ $t_user->email }}
                                        @endif
                                    @endforeach
                                </div>
                                <div class="me-2">
                                    @if ($ticket->approved == 1)
                                        <span class="badge bg-success rounded-pill">Approved</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">Not Approved</span>
                                    @endif
                                </div>
                                <div class="">
                                    @if ($ticket->cancelled != 1)
                                        <span class="badge bg-success rounded-pill">Active</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">Cancelled</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="alert alert-danger d-flex align-items-center m-5" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <h5>No New Tickets.</h5>
                            </div>
                        </div>
                    @endif
                </ol>
            </div>
        </div>
    </div>
@endsection
