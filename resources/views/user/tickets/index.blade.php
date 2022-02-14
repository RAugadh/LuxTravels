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
                        @if ($ticket->user_id == Auth::user()->id)
                            <tr class="row">
                                <td class="col-9 ">
                                    <div class="card  mx-4 p-4 @if ($ticket->cancelled != 1) login-frm-bg @else bg-danger text-decoration-line-through @endif">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <time class="text-center my-auto ">
                                                    <h1 class="mx-auto mt-5">
                                                        {{ Carbon\Carbon::parse($ticket->boarding_date)->format('d') }}
                                                    </h1>
                                                    <h4 class="mx-auto mt-3">
                                                        {{ Carbon\Carbon::parse($ticket->boarding_date)->format('M Y') }}
                                                    </h4>
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
                                                                    <span
                                                                        class="badge bg-success rounded-pill">Approved</span>
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

                                </td>
                                <td class="col-2">
                                    <div class="center pt-5">
                                        @if ($ticket->cancelled != 1)
                                            <div class="d-flex">
                                                <a href="{{ url('/tickets/print', $ticket->id) }}"
                                                    class="btn btn-primary mt-4 px-4 mx-auto">
                                                    <i class="bi bi-printer">{{ ' ' . 'Print' }}</i></a>
                                            </div>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-danger mt-5 px-3 mx-auto"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ticketCancel{{ $ticket->id }}">
                                                    <i class="bi bi-x-octagon">Cancel</i>
                                                </button>
                                                <div class="modal fade" id="ticketCancel{{ $ticket->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="ticketCancelLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-danger" id="ticketCancelLabel">
                                                                    Confirmation</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you Sure you want to cancel Ticket ID
                                                                #{{ $ticket->id }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick=" event.preventDefault(); document.getElementById('cancel-tickets-form-{{ $ticket->id }}').submit()">
                                                                    {{ __('Yes, Cancel') }}</button>

                                                                <form id="cancel-tickets-form-{{ $ticket->id }}"
                                                                    action="{{ url('tickets/cancel', $ticket->id) }}"
                                                                    method="POST" style="display: none">
                                                                    @csrf
                                                                    <input type="hidden" name="cancelled" value="1">
                                                                    <input type="hidden" name="cancelled_by"
                                                                        value="{{ Auth::user()->name }}">
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="d-flex pt-5">
                                                <h3 class="text-danger mt-5 px-3 mx-auto"> Canceled</h3>
                                            </div>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endif
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
