@extends('layouts.dashnav')

@section('title')
    {{ __('Book') }}
@endsection

@section('content')
    <div class="px-3 py-2"><a class="btn btn-primary" href="{{ url('/book') }}"> Go Back</a></div>
    <div class="px-3 py-2 row g-3 shadow">
        <div class="col-5">
            <div class="card m-2 p-2 bg-transparent">
                <img class="w-75 rounded mx-auto mt-2 card-img-top border border-4 border-light rounded"
                    src="@if (@isset($tour)) {{ asset('uploads/tours') }}/{{ $tour->image }} @else{{ asset('assets/images/placeholder1.jpg') }} @endif"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="p-2">
                        <h2 class=" card-title"> {{ $tour->name }}</h2>

                        <div class=" card-subtitle small">
                            <p>{{ $tour->sub }}</p>
                        </div>
                        <div class="card-text">
                            <p>{{ $tour->description }}</p>
                        </div>
                        <div>
                            <h5>Key Offerings</h5>
                            <ul class="list-group list-group-flush">
                                @isset($tour)
                                    <li class="list-group-item bg-transparent lightfont">
                                        <i class="bi bi-play mr-2"></i>{{ $module->module_1 }}
                                    </li>

                                    <li class="list-group-item bg-transparent lightfont">
                                        <i class="bi bi-play mr-2"></i>{{ $module->module_2 }}
                                    </li>
                                    <li class="list-group-item bg-transparent lightfont">
                                        <i class="bi bi-play mr-2"></i> {{ $module->module_3 }}
                                    </li>
                                    <li class="list-group-item bg-transparent lightfont">
                                        <i class="bi bi-play mr-2"></i>{{ $module->module_4 }}
                                    </li>
                                    <li class="list-group-item bg-transparent lightfont">
                                        <i class="bi bi-play mr-2"></i>{{ $module->module_5 }}
                                    </li>
                                @endisset
                            </ul>
                        </div>
                        <h4 class=" card-footer">Priced Rs {{ $tour->price }}</h4>
                        <div class="alert alert-dark" role="alert">
                            <span>Note: Any price change due to additional requests will reflect on your ticket after
                                approval</span> <br>
                            <span>Note: Payment for the trip will be made at Boarding</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card m-2 p-2 bg-transparent border-start h-100">
                <div class="p-2 card-header text-center">
                    <h5>Ticket Details</h5>
                </div>
                @include('partials.alerts')
                <form action="{{ url('book/store', [($user_id = Auth::user()->id), ($tour_id = $tour->id)]) }}"
                    method="POST">
                    @csrf
                    <div class="mb-3 mx-3">
                        <div class="row m-1">
                            <div class="col-6">
                                <label for="inputName" class="form-label mx-2">User Name</label>
                                <input type="text" class="form-control form-control-lg" id="inputName" name="userName"
                                    placeholder="{{ __('User Booking') }}"
                                    value="{{ old('name') }}{{ Auth::user()->name }}" readonly disabled>
                            </div>
                            <div class="col-6">
                                <label for="inputName" class="form-label mx-2">Tour Selected</label>
                                <input type="text" class="form-control form-control-lg " id="inputName" name="tourName"
                                    placeholder="{{ __('User Booking') }}"
                                    value="{{ old('name') }}{{ $tour->name }}" readonly disabled>

                            </div>
                            <div class="col-6 mt-3">
                                <label for="datepicker" class="form-label mx-2">Date of Boarding</label>
                                <div class="input-group date" id="datepicker">
                                    <input id="startDate" class="form-control form-control-lg" name="boarding_date"
                                        type="date" />
                                    <span id="startDateSelected"></span>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <label for="inputPassengers" class="form-label mx-2">Number of Passnger(s)</label>
                                <select type="n" name="passengers" id="inputPassengers"
                                    class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class=" mt-3">
                                <label for="inputBoarding" class="form-label mx-2">Boarding Location</label>
                                <select type="text" name="boarding_at" id="inputBoarding"
                                    class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                                    <option selected>Select boarding Location</option>
                                    <option value="{{ $tour->boarding_1 }}">{{ $tour->boarding_1 }}</option>
                                    @if ($tour->boarding_2 != null)
                                        <option value="{{ $tour->boarding_2 }}">{{ $tour->boarding_2 }}</option>
                                    @endif
                                    @if ($tour->boarding_3 != null)
                                        <option value="{{ $tour->boarding_3 }}">{{ $tour->boarding_3 }}</option>
                                    @endif

                                </select>
                            </div>
                            <span class="m-3"></span>
                            <div class="pt-3 text-center">
                                <h5>Additional Details</h5>
                            </div>
                            <div class="mt-3">
                                <label for="contractToggle" class="contract_toggle">
                                    Any Dietary needs?
                                    <div class="d-flex">
                                        <input type="checkbox" id="contractToggle">

                                        <p class="p-2 pt-3">Yes</p>
                                        <span class="toggle_bar">
                                            <span class="toggle_square"></span>
                                        </span>
                                        <p class="p-2 pt-3">No</p>
                                    </div>

                                </label>
                            </div>
                            <div class=" mt-3">
                                <label for="inputDiet" class="form-label mx-2">Dietary Requirements (Optional)
                                    <span>eg:
                                        diabetic, vegetarian, etc.</span></label>

                                <input type="text" class="form-control " id="inputDiet" name="diet"
                                    placeholder="{{ __('None') }}" value="{{ old('diet') }}">
                            </div>
                            <span class="m-5"></span>
                            <div class="row">
                                <div class=" mt-2 mb-3 text-center col-6">
                                    <div class="d-flex ms-4">
                                        <h4 class="pt-2">Final Price : &nbsp;{{ $tour->price * 1.18 }}
                                        </h4>
                                        <p class="ps-2 text-small text-start">(incl tax)</p>
                                    </div>

                                </div>
                                <div class="text-center mt-2 mb-3 col-6">
                                    <button type="submit" class="btn btn-success btn-lg px-5">
                                        Submit For aproval
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

            var checkbox = document.querySelector("#contractToggle");
            var input = document.querySelector("#inputDiet");

            var toogleInput = function(e) {
                input.disabled = !e.target.checked;
            };

            toogleInput({
                target: checkbox
            });
            checkbox.addEventListener("change", toogleInput);
        </script>
    @endsection
