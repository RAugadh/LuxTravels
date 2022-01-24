@extends('layouts.main-nav')


@section('content')


    <div>
        <header class="container-md row p-5 mx-auto mt-5 justify-content-center align-items-center">
            <div class="hero-image col-md-8 col-lg-6 mt-5">
                <img src="{{ asset('assets/images') }}/banner.jpg" alt="" />
            </div>
            <div class="hero-text col-md-8 col-lg-6">
                <h1>Travel with Comfort</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius tempora
                    possimus necessitatibus ipsum! Aut provident earum, dolorem veritatis
                    amet quibusdam.
                </p>
                <button class="btn-lg primary-btn">
                    <a href="{{ route('register') }}" class="text-decoration-none lightfont p-3 px-4">Book Now</a>
                </button>
            </div>
        </header>
        <section id="tourPlans" class="mt-5">
            <div class="container py-4 mt-3">
                <h1 class="h1 text-center htitle">Tour Highlights</h1>
                @foreach ($tours as $tour)
                    @if ($tour->highlight == 1)
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
                                            @endif
                                        @endisset
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endif
                @endforeach
            </div>
            <div class="mt-5 text-center">
                <a href="{{ route('register') }}" class="btn primary-btn">Register for More</a>
            </div>
    </div>
    </section>
    <footer id="about" class="container mt-5 p-5 text-center">
        <h1 class="h1 text-center htitle">About Us</h1>
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fas fa-envelope"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-white" href="#">Augadh</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script>
        var nav = document.querySelector("nav");

        window.addEventListener("scroll", function() {
            if (window.pageYOffset > 100) {
                nav.classList.add("dark-nav");
            } else {
                nav.classList.remove("dark-nav");
            }
        });
    </script>
@endsection
