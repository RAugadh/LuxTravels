@extends('layouts.dashnav')

@section('content')
    <div class="float-start mt-3 ms-2">
        <a class="btn btn-primary" href="{{ url('admin/tickets') }}"> Go Back</a>
    </div>
    <div class="col-8 mx-auto pb-2">
        <div class="card m-2 p-2 create-frm">
            <div class="p-2 card-header text-center">
                <h5>Ticket Details</h5>
            </div>
            <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="mb-3 mx-3">
                    <div class="row m-1">
                        <div class="col-6">
                            <label for="inputName" class="form-label mx-2">User Name</label>
                            <input type="text" class="form-control form-control-lg" id="inputName" name="userName"
                                placeholder="{{ __('User Booking') }}" value="{{ old('name') }}{{ $user->name }}"
                                readonly disabled>
                        </div>
                        <div class="col-6">
                            <label for="inputName" class="form-label mx-2">Tour Selected</label>
                            <input type="text" class="form-control form-control-lg " id="inputName" name="tourName"
                                placeholder="{{ __('User Booking') }}" value="{{ old('name') }}{{ $tour->name }}"
                                readonly disabled>

                        </div>
                        <div class="col-6 mt-2">
                            <label for="inputDate" class="form-label mx-2">Tour Selected</label>
                            <input type="text" class="form-control form-control-lg " id="inputDate" name="boarding_date"
                                value="{{ old('name') }}{{ $ticket->boarding_date }}" readonly disabled>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="inputPassengers" class="form-label mx-2">Number of Passnger(s)</label>
                            <input type="text" class="form-control form-control-lg " id="inputPassengers" name="passengers"
                                value="{{ old('name') }}{{ $ticket->passengers }}" readonly disabled>
                        </div>
                        <div class=" mt-2">
                            <label for="inputBoarding" class="form-label mx-2">Boarding Location</label>
                            <input type="text" class="form-control " id="inputBoarding" name="boarding_at"
                                value="{{ old('name') }}{{ $ticket->boarding_at }}" readonly disabled>
                        </div>
                        <span class="m-2"></span>
                        <div class="pt-2 text-center">
                            <h5>Additional Details</h5>

                        </div>

                        <div class=" mt-2">
                            <label for="inputDiet" class="form-label mx-2">Dietary Requirements (Optional)</label>

                            <input type="text" class="form-control " id="inputDiet" name="diet"
                                placeholder="{{ __('None') }}" value="{{ old('diet') }}{{ $ticket->diet }}"
                                readonly disabled>
                            <label class="float-end form-check-label btn btn-large btn-danger p-2 me-3 mt-3"
                                data-toggle="tab" for="inputCancelled">
                                <input type="hidden" name="cancelled" value="0">
                                <input class="form-check-checkbox" type="checkbox" name="cancelled"
                                    value="{{ old('cancelled') ?? 1 }}"
                                    @isset($ticket) @if ($ticket->cancelled == 1) checked @endif
                                @endisset id="inputCancelled">
                            Cancelled</label>
                    </div>
                    <span class="m-2 mt-1"></span>
                    <div class="row">
                        <div class="col-6">
                            <label for="inputPrice" class="form-label mx-2">Final Price</label>
                            <input type="text" class="form-control form-control-lg" id="inputPrice" name="total_price"
                                placeholder="{{ __('Total Price') }}"
                                value="{{ old('total_price') }}{{ $ticket->total_price }}" required>
                        </div>
                        <input type="hidden" name="approved_by" value="{{ Auth::user()->name }}">
                        <div class="text-center mt-2 mb-2 col-6 pt-3">
                            @if ($ticket->cancelled != 1)
                                <label class=" form-check-label btn btn-large btn-warning p-2 me-3 mt-2"
                                    data-toggle="tab" for="inputApproved">
                                    <input type="hidden" name="approved" value="0">
                                    <input class="form-check-checkbox" type="checkbox" name="approved"
                                        value="{{ old('approved') ?? 1 }}"
                                        @isset($ticket) @if ($ticket->approved == 1) checked @endif
                                    @endisset id="inputApproved">
                                Approval</label>
                        @endif

                        <button type="submit" class="btn btn-success mt-2 btn-lg px-5 ">
                            Update
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
</div>
<script>
    document.body.classList.remove("bg-light");
    document.body.classList.add("bg-content");
</script>
@endsection
