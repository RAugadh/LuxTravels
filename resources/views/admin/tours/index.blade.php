@extends('admin.sidebar')

@section('admindash')
    <div class="px-5 py-3  overflow-hidden">

        <div class=" clearfix darkfont mb-3">
            <h3 class=" float-start">Tour Packages </h3>
            <a class=" float-end btn btn-success" href="{{ route('admin.tours.create') }}" role="button">Create</a>
        </div>
        <article class="my-5 postcard dark blue">

            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="{{ asset('assets/images') }}/aarti.jpg" alt="Image Title" />
            </a>

            <div class="postcard__text">
                <h1 class="postcard__title blue float-start"><a href="#"> The Spiritual Journey</a></h1>

                <div class="postcard__subtitle small">
                    <i class="fas fa-calendar-alt mr-2"></i>Pilgrimage.
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">
                    Starting with a sacred bath in Triveni Sangam in Prayagraj ,
                    Visting Ram temple in Ayodhya and finally in the evening enjoy
                    boat ride to see the beautifully lit Banaras Ghat. Experience the
                    spiritual Ganga Aarti.
                    <h4 class="mt-3">Starting only at Rs 19999</h4>
                </div>
                <ul class="postcard__tagbox">
                    <li class="tag__item">
                        <i class="fas fa-tag mr-2"></i>Prayagraj
                    </li>
                    <li class="tag__item">
                        <i class="fas fa-clock mr-2"></i>Ayodhya
                    </li>
                    <li class="tag__item play red">
                        <a href="#"><i class="fas fa-play mr-2"></i> Kashi</a>
                    </li>
                    <li class="tag__item play red">
                        <a href="#"><i class="fas fa-play mr-2"></i>All Accommodations</a>
                    </li>
                </ul>
                <a href="" role="button" class="mt-2 float-end w-25 btn btn-primary"><i
                        class="bi bi-pen">{{ __(' Edit') }}</i>
                </a>
            </div>
        </article>

    @endsection
