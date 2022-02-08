@extends('admin.sidebar')

@section('admindash')
    <div class="p-3 overflow-hidden">
        @include('partials.alerts')

        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Booked Tickets </h3>
        </div>
        <div class="bg-transparent darkfont shadow-sm py-3 mb-5 bg-white rounded">
            <table id="ticketCrud" class="table display table-borderless table-striped mt-3 py-2 text-center"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Tour Booked</th>
                        <th>Boarding Location</th>
                        <th>Boarding Date </th>
                        <th>Approval</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)


                        <tr>
                            <td>{{ $ticket->id }} </td>
                            <td>
                                @if ($ticket->cancelled != 1)
                                    <p class="text-success">Active</p>
                                @else
                                    <p class="text-danger">Cancelled</p>
                                @endif
                            </td>
                            <td>
                                @foreach ($users as $user)
                                    @if ($user->id == $ticket->user_id)
                                        {{ $user->name }}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                @foreach ($tours as $tour)
                                    @if ($tour->id == $ticket->tour_id)
                                        {{ $tour->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $ticket->boarding_at }}</td>
                            <td>{{ $ticket->boarding_date }}</td>
                            <td>
                                @if ($ticket->approved == 1)
                                    <p class="text-success">{{ $ticket->approved_by }}</p>
                                @else
                                    @if ($ticket->cancelled != 1)
                                        <p class="text-danger">Waiting Review</p>
                                    @else
                                        <p class="text-danger">Cancelled</p>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" role="button"
                                    class="btn btn-primary"><i class="bi bi-clipboard-check">{{ __(' Review') }}</i>
                                </a>

                                <button type="button" class="btn btn-danger"
                                    onclick=" event.preventDefault(); document.getElementById('cancel-tickets-form-{{ $ticket->id }}').submit()">
                                    <i class="bi bi-x-octagon">{{ __(' Cancel') }}</i></button>

                                <form id="cancel-tickets-form-{{ $ticket->id }}"
                                    action="{{ url('admin/tickets/cancel', $ticket->id) }}" method="POST"
                                    style="display: none">
                                    @csrf
                                    <input type="hidden" name="cancelled" value="1">
                                    <input type="hidden" name="cancelled_by" value="Admin">
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>

    </div>
    <script>

    </script>
@endsection
