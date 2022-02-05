@extends('admin.sidebar')

@section('admindash')
    <div class="px-5 py-3  overflow-hidden">
        @include('partials.alerts')
        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Tour Packages </h3>
            <a class=" float-end btn btn-success" href="{{ route('admin.tours.create') }}" role="button">Create</a>
        </div>
        {{-- <input class="form-control me-2" id="myInput" type="text" placeholder="Search.."> --}}
        <div class="bg-transparent darkfont shadow-sm py-3 mb-5 bg-white rounded">
            <table id="tableCrud" class="table display table-borderless table-striped mt-3 py-2 text-center"
                style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($tours) && $tours->count())
                        @foreach ($tours as $tour)
                            <tr>
                                <td>
                                    <div class="container">
                                        <article
                                            class=" my-3
                                        postcard dark blue text-white">
                                            <a class="postcard__img_link" href="#">
                                                <img class="postcard__img"
                                                    src="{{ asset('uploads/tours') }}/{{ $tour->image }}"
                                                    alt="Image Title" />
                                            </a>

                                            <div class="postcard__text">
                                                <h1 class="postcard__title blue float-start"> {{ $tour->name }}</h1>

                                                <div class="postcard__subtitle small">
                                                    <i class="fas fa-calendar-alt mr-2"></i>{{ $tour->sub }}
                                                </div>
                                                <div class="postcard__bar"></div>
                                                <div class="postcard__preview-txt">
                                                    {{ $tour->description }}
                                                    <h4 class="mt-3">Rs {{ $tour->price }}</h4>
                                                </div>
                                                <ul class="postcard__tagbox">
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
                                                <div class="">
                                                    <a href="{{ route('admin.tours.edit', $tour->id) }}" role="button"
                                                        class="mt-2 float-end w-25 btn btn-primary"><i
                                                            class="bi bi-pen">{{ __(' Edit') }}</i>
                                                    </a>
                                                    <button type="button" class=" mx-2 mt-2 float-end w-25 btn btn-danger"
                                                        onclick=" event.preventDefault(); document.getElementById('delete-tour-form-{{ $tour->id }}').submit()">
                                                        <i class="bi bi-trash">{{ __(' Delete') }}</i></button>
                                                </div>
                                                <form id="delete-tour-form-{{ $tour->id }}"
                                                    action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST"
                                                    style="display: none">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
                                            </div>
                                        </article>
                                    </div>
                                </td>
                            </tr>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
