@extends('user.sidebar')

@section('userdash')
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
                        <h4 class="mt-2"> {{ 'Welcome' . ' ' . Auth::user()->name }}</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-5 pe-2">
                <ol class="list-group border bg-gradient">
                    <div class="border-end bg-content p-2">
                        <h4 class="float-start text-white ms-3">Last Booked</h4>
                        <a href="{{ url('tickets') }}" class="float-end text-info me-3">See All</a>
                    </div>
                    @if (!empty($tickets) && $tickets->count())
                        @foreach ($tickets as $ticket)
                            @if ($ticket->user_id == Auth::user()->id)
                                @if ($ticket->cancelled == 0)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">
                                                @foreach ($tours as $tour)
                                                    @if ($tour->id == $ticket->tour_id)
                                                        {{ $tour->name }}
                                                    @endif
                                                @endforeach
                                            </div>
                                            {{ 'Tour Date : ' . ' ' . $ticket->boarding_date }}<br>
                                            {{ 'Passangers : ' . ' ' . $ticket->passengers }}
                                        </div>
                                        <div class="me-2">
                                            @if ($ticket->approved == 1)
                                                <span class="badge bg-success rounded-pill">Approved</span>
                                            @else
                                                <span class="badge bg-danger rounded-pill">Not Approved</span>
                                            @endif
                                        </div>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    @else
                        <div class="alert alert-danger d-flex align-items-center m-5" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <h5>No New Active Tickets.</h5>
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
                        <h4 class="float-start text-white ms-3">Last Cancelled</h4>
                        <a href="{{ url('tickets') }}" class="float-end text-info me-3">See All</a>
                    </div>
                    @if (!empty($tickets) && $tickets->count())
                        @foreach ($tickets->take(3) as $ticket)
                            @if ($ticket->user_id == Auth::user()->id)
                                @if ($ticket->cancelled == 1)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-start border bg-gradient">
                                        <div class="ms-2 me-auto border bg-gradient">
                                            <div class="fw-bold">
                                                @foreach ($tours as $tour)
                                                    @if ($tour->id == $ticket->tour_id)
                                                        {{ $tour->name }}
                                                    @endif
                                                @endforeach
                                            </div>
                                            {{ 'Tour Date : ' . ' ' . $ticket->boarding_date }}<br>
                                            {{ 'Passangers : ' . ' ' . $ticket->passengers }}
                                        </div>
                                        <div class="me-2">
                                            <span class="badge bg-danger rounded-pill">Cancelled</span>
                                        </div>
                                    </li>

                                @endif
                            @endif
                        @endforeach
                    @else
                        <div class="alert alert-danger d-flex align-items-center m-5" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <h5>No Cancelled Tickets.</h5>
                            </div>
                        </div>
                    @endif
                </ol>
            </div>
        </div>
    </div>

    <script>
        document.body.classList.remove("bg-light");
        document.body.classList.add("bg-content-l");
    </script>
@endsection


{{-- <div class="t-card cnf-card">
    <section class="t-date">
        <time datetime="23th feb">
            <span>23</span><span>feb</span>
        </time>
    </section>
    <section class="card-cont">
        <small>dj khaled</small>
        <h3>live in sydney</h3>
        <div class="even-date">
            <i class="fa fa-calendar"></i>
            <time>
                <span>wednesday 28 december 2014</span>
                <span>08:55pm to 12:00 am</span>
            </time>
        </div>
        <div class="even-info">
            <i class="fa fa-map-marker"></i>
            <p>
                nexen square for people australia, sydney
            </p>
        </div>
    </section>
</div> --}}
{{-- <div class="t-card can-card">
    <section class="t-date">
        <time datetime="23th feb">
            <span>23</span><span>feb</span>
        </time>
    </section>
    <section class="card-cont">
        <small>dj khaled</small>
        <h3>corner obsest program</h3>
        <div class="even-date">
            <i class="fa fa-calendar"></i>
            <time>
                <span>wednesday 28 december 2014</span>
                <span>08:55pm to 12:00 am</span>
            </time>
        </div>
        <div class="even-info">
            <i class="fa fa-map-marker"></i>
            <p>
                nexen square for people australia, sydney
            </p>
        </div>
    </section>
</div> --}}
