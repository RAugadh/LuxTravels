@extends('layouts.app')
@section('nav')
    <div class=" pt-5 d-flex d-print-none">
        <a href="{{ url('/tickets') }}" class="btn btn-secondary float-start ms-5">Go Back</a>
        <button onclick="window.print()" class="btn btn-primary  mx-auto">Print Ticket</button>
    </div>
    <div class="container p-5 d-print-block" id="outprint">

        <div class="p-5 m-3 border border-2 border-dark row">
            <div class="text-dark col-5 my-4">
                <h5 class="mb-4">
                    {{ 'Ticket ID : ' . ' ' . $ticket->id }} ||
                    {{ 'User ID : ' . ' ' . $ticket->user_id }}
                </h5>
                <h3 class="mt-2 text-uppercase">
                    {{ $tour->name }}
                </h3>
                <h5 class="mt-5">
                    {{ 'Number of Passengers : ' . ' ' . $ticket->passengers }}
                </h5>
                <h5 class="mt-3">
                    {{ 'Boarding From : ' . ' ' . $ticket->boarding_at }}
                </h5>
                <h5 class="mt-3">
                    {{ 'Date of Boarding : ' . ' ' . $ticket->boarding_date }}
                </h5>
            </div>
            <div class="col-4 text-dark my-4 mx-auto">
                <ul class="list-group list-group-flush ">
                    <h4 class="text-uppercase">Key Highlights</h4>
                    <li class="list-group-item">
                        <h6><i class="bi bi-arrow-return-right"></i>{{ $module->module_1 }}</h6>
                    </li>
                    <li class="list-group-item">
                        <h6><i class="bi bi-arrow-return-right"></i>{{ $module->module_2 }}</h6>
                    </li>
                    <li class="list-group-item">
                        <h6><i class="bi bi-arrow-return-right"></i>{{ $module->module_3 }}</h6>
                    </li>
                    <li class="list-group-item">
                        <h6><i class="bi bi-arrow-return-right"></i>{{ $module->module_4 }}</h6>
                    </li>
                    <li class="list-group-item">
                        <h6><i class="bi bi-arrow-return-right"></i>{{ $module->module_5 }}</h6>
                    </li>
                </ul>
            </div>
            <div class="col-3 my-auto text-dark">
                @if ($ticket->approved == 1)
                    <img class=" img-fluid mb-5" src="{{ asset('assets/images/approved.png') }}" alt="approved">
                    <h6 class="float-end mt-5">Approver: {{ ' ' . $ticket->approved_by }}</h6>
                @else
                    <img class=" img-fluid" src="{{ asset('assets/images/pending.png') }}" alt="pending">
                @endif

            </div>

        </div>
    </div>

    <script>
    </script>
@endsection
