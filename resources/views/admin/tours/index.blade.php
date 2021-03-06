@extends('admin.sidebar')

@section('admindash')
    <div class="px-5 py-3  overflow-hidden">
        @include('partials.alerts')
        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Tour Packages </h3>
            <a class=" float-end btn btn-success" href="{{ route('admin.tours.create') }}" role="button">Create</a>
        </div>
        <div class="bg-transparent darkfont shadow-sm py-3 mb-5 bg-white rounded">
            @if (!empty($tours) && $tours->count())
                @foreach ($tours as $tour)
                    <div id="myDIV" class="container">
                        <article class="my-5 postcard dark blue text-white">

                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="{{ asset('uploads/tours') }}/{{ $tour->image }}"
                                    alt="Image Title" />
                            </a>

                            <div class="postcard__text w-75">
                                <h1 class="postcard__title blue float-start ms-2"> {{ $tour->name }}</h1>

                                <div class="postcard__subtitle small">
                                    <i class="fas fa-calendar-alt ms-2"></i>{{ $tour->sub }}
                                </div>
                                <div class="postcard__bar ms-2"></div>
                                <div class="postcard__preview-txt ms-2">
                                    {{ $tour->description }}
                                </div>
                                <h5 class="mt-3 ms-2">Starting only at Rs{{ $tour->price }}</h5>
                                <ul class="postcard__tagbox ms-2">
                                    @foreach ($modules as $module)
                                        @isset($tour)
                                            @if ($module->tour_id == $tour->id)
                                                <li class="tag__item">
                                                    <i class="bi bi-play mr-2"></i>{{ $module->module_1 }}
                                                </li>

                                                <li class="tag__item">
                                                    <i class="bi bi-play mr-2"></i>{{ $module->module_2 }}
                                                </li>
                                                <li class="tag__item play red">
                                                    <i class="bi bi-play mr-2"></i> {{ $module->module_3 }}
                                                </li>
                                                <li class="tag__item play red">
                                                    <i class="bi bi-play mr-2"></i>{{ $module->module_4 }}
                                                </li>
                                                <li class="tag__item play red">
                                                    <i class="bi bi-play mr-2"></i>{{ $module->module_5 }}
                                                </li>
                                            @endif
                                        @endisset
                                    @endforeach
                                </ul>
                                <div class="float-end">
                                    <a href="{{ route('admin.tours.edit', $tour->id) }}" role="button"
                                        class="mt-2 float-end btn btn-primary"><i
                                            class="bi bi-pen">{{ __(' Edit') }}</i>
                                    </a>
                                    <button type="button" class=" mx-2 mt-2 float-end btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#tourDelete{{ $tour->id }}">
                                        <i class="bi bi-trash">{{ __(' Delete') }}</i></button>
                                </div>
                                <div class="modal fade" id="tourDelete{{ $tour->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="tourDeleteLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="userDeleteLabel">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body darkfont">
                                                Are you Sure you want to delete Tour ID #{{ $tour->id }}<br>
                                                {{ $tour->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick=" event.preventDefault(); document.getElementById('delete-tour-form-{{ $tour->id }}').submit()">
                                                    <i class="bi bi-trash">{{ __(' Delete') }}</i></button>

                                                <form id="delete-tour-form-{{ $tour->id }}"
                                                    action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST"
                                                    style="display: none">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                @endforeach
            @else
                <div class="alert alert-danger d-flex align-items-center m-5" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <h5>No Tours added yet.</h5>
                    </div>
                </div>
            @endif
            {{ $tours->links() }}
        </div>
    </div>
@endsection
