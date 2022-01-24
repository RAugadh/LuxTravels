@extends('admin.sidebar')

@section('admindash')
    <div class="px-5 py-3  overflow-hidden">

        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Tour Packages </h3>
            <a class=" float-end btn btn-success" href="{{ route('admin.tours.create') }}" role="button">Create</a>
        </div>
        <input id="myInput" type="text" placeholder="Search..">
        <div id="myDIV">
            @foreach ($tours as $tour)
                <article class="my-5 postcard dark blue">

                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="{{ asset('uploads/tours') }}/{{ $tour->image }}"
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
                            <h4 class="mt-3">Starting only at Rs {{ $tour->price }}</h4>
                        </div>
                        <ul class="postcard__tagbox">
                            @foreach ($modules as $module)
                                @isset($tour)
                                    @if ($module->tour_id == $tour->id)
                                        <li class="tag__item">
                                            <i class="fas fa-tag mr-2"></i>{{ $module->module_1 }}
                                        </li>

                                        <li class="tag__item">
                                            <i class="fas fa-clock mr-2"></i>{{ $module->module_2 }}
                                        </li>
                                        <li class="tag__item play red">
                                            <i class="fas fa-play mr-2"></i> {{ $module->module_3 }}
                                        </li>
                                        <li class="tag__item play red">
                                            <i class="fas fa-play mr-2"></i>{{ $module->module_4 }}
                                        </li>
                                        <li class="tag__item play red">
                                            <i class="fas fa-play mr-2"></i>{{ $module->module_5 }}
                                        </li>
                                    @endif @endisset
                                @endforeach
                            </ul>
                            <div class="">
                                <a href="" role="button" class="mt-2 float-end w-25 btn btn-primary"><i
                                        class="bi bi-pen">{{ __(' Edit') }}</i>
                                </a>
                                <button type="button" class=" mx-2 mt-2 float-end w-25 btn btn-danger"
                                    onclick=" event.preventDefault(); document.getElementById('delete-tour-form-{{ $tour->id }}').submit()">
                                    <i class="bi bi-trash">{{ __(' Delete') }}</i></button>
                            </div>
                            <form id="delete-tour-form-{{ $tour->id }}"
                                action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" style="display: none">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>

        @endsection
