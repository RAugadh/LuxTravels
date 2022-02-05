@extends('user.sidebar')

@section('userdash')
    <div class="p-3 overflow-hidden">
        @include('partials.alerts')

        <div class=" clearfix darkfont mb-3 pt-3">
            <h3 class=" float-start">Ticket History</h3>
        </div>
        <div class="bg-transparent darkfont shadow-sm px-5 py-3 mx-4 mb-5 bg-white rounded">
            <table id="tableCrud" class="table display table-borderless mx-3 table-striped mt-3 py-2 " style="width:100%">
                <thead>
                    <tr class="row">
                        <th class="col-9"></th>
                        <th class="col-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr class="row">
                            <td class="col-9 ">
                                <div class="card  mx-4 p-4 @if ($ticket->cancelled != 1) login-frm-bg @else bg-danger text-decoration-line-through @endif">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <time class="text-center my-auto ">
                                                <h1 class="mx-auto mt-5">
                                                    {{ Carbon\Carbon::parse($ticket->boarding_date)->format('d') }}</h1>
                                                <h4 class="mx-auto mt-3">
                                                    {{ Carbon\Carbon::parse($ticket->boarding_date)->format('M Y') }}</h4>
                                                <h5 class="lightfont mt-5"> Tour Date</h5>
                                            </time>
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body border-start border-light ">
                                                <h4 class="card-title mb-3 fw-bold">
                                                    @foreach ($tours as $tour)
                                                        @if ($tour->id == $ticket->tour_id)
                                                            {{ $tour->name }}
                                                        @endif
                                                    @endforeach
                                                </h4>
                                                <div class="card-text">
                                                    <p class="lightfont">
                                                        {{ 'Booked On :' . ' ' . Carbon\Carbon::parse($ticket->created_at)->format('d M Y') }}
                                                    </p>
                                                    <p class="lightfont">
                                                        {{ 'Number of Passenger :' . ' ' . $ticket->passengers }}
                                                    </p>
                                                    <p class="lightfont">
                                                        {{ 'Boarding From :' . ' ' . $ticket->boarding_at }}
                                                    </p>
                                                    <div class="">
                                                        @if ($ticket->cancelled != 1)
                                                            @if ($ticket->approved == 1)
                                                                <span class="badge bg-success rounded-pill">Approved</span>
                                                            @else
                                                                <span class="badge bg-danger rounded-pill">Waiting
                                                                    Approval</span>
                                                            @endif


                                                        @endif

                                                        <p class="lightfont float-end">
                                                            {{ 'Ticket ID :' . ' ' . $ticket->id }}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
        </div>
        </td>
        <td class="col-2">
            <div class="center pt-5">
                @if ($ticket->cancelled != 1)
                    <div class="d-flex">
                        <a href="{{ url('/user/tickets/print', $ticket->id) }}" class="btn btn-primary mt-4 px-4 mx-auto">
                            <i class="bi bi-printer">{{ ' ' . 'Print' }}</i></a>
                    </div>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger mt-5 px-3 mx-auto"
                            onclick=" event.preventDefault(); document.getElementById('cancel-tickets-form-{{ $ticket->id }}').submit()">
                            <i class="bi bi-x-octagon">{{ __(' Cancel') }}</i></button>

                        <form id="cancel-tickets-form-{{ $ticket->id }}"
                            action="{{ url('user/tickets/cancel', $ticket->id) }}" method="POST" style="display: none">
                            @csrf
                            <input type="hidden" name="cancelled" value="1">
                            <input type="hidden" name="cancelled_by" value="Admin">
                        </form>
                    </div>
                @else
                    <div class="d-flex pt-5">
                        <h3 class="text-danger mt-5 px-3 mx-auto"> Canceled</h3>
                    </div>
                @endif

            </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
    <script>
        document.body.classList.remove("bg-light");
        document.body.classList.add("bg-transparent");
    </script>
@endsection


{{-- <div class="t-card cnf-card">
    <section class="t-date">
        <time>
            <span>{{ Carbon\Carbon::parse($ticket->boarding_date)->format('d') }}</span>
            <span>{{ Carbon\Carbon::parse($ticket->boarding_date)->format('M Y') }}</span>
        </time>
    </section>
    <section class="card-cont">
        <small>dj khaled</small>
        <h3 class="p-1">
            @foreach ($tours as $tour)
                @if ($tour->id == $ticket->tour_id)
                    {{ $tour->name }}
                @endif
            @endforeach
        </h3>
        <div class="even-date">
            <i class="fa fa-calendar"></i>
            <time>
                <span>{{ 'Booked On :' . ' ' . Carbon\Carbon::parse($ticket->created_at)->format('d M Y') }}</span>
                <span>{{ 'Number of Passenger :' . ' ' . $ticket->passengers }}</span>
            </time>
        </div>
        <div class="even-info">
            <i class="fa fa-map-marker"></i>
            <p class=" me-5">


            </p>

        </div>
    </section>
</div> --}}
