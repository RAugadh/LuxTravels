@extends('user.sidebar')

@section('userdash')
    <div class="px-5 py-3  overflow-hidden">
        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Tour Packages </h3>
        </div>
        <div class="darkfont shadow-sm py-3 mb-5 bg-white rounded">
            <table id="tableCrud" class="table table-borderless table-striped mt-3 py-2" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                        <tr>
                            <td>
                                <div class="container">
                                    <article class="my-3 postcard dark blue">

                                        <a class="postcard__img_link" href="#">
                                            <img class="postcard__img"
                                                src="{{ asset('uploads/tours') }}/{{ $tour->image }}"
                                                alt="Image Title" />
                                        </a>

                                        <div class="postcard__text lightfont w-75">
                                            <h1 class="postcard__title blue ms-2"> {{ $tour->name }}</h1>

                                            <div class="postcard__subtitle small">
                                                <i class="fas fa-calendar-alt ms-2"></i>{{ $tour->sub }}
                                            </div>
                                            <div class="postcard__bar ms-2"></div>
                                            <div class="postcard__preview-txt ms-2">
                                                {{ $tour->description }}
                                            </div>
                                            <h4 class="mt-3 ms-2">Starting only at Rs {{ $tour->price }}</h4>

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
                                                <a href="{{ url('book/ticket', $tour->id) }}" role="button"
                                                    class="mt-2 float-right px-5 py-2 btn btn-primary"><i
                                                        class="bi bi-ticket">{{ __(' Book') }}</i>
                                                </a>
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
