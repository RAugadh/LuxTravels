@extends('layouts.main-nav')


@section('content')
    <div>
        <header class="container-md row p-5 mx-auto mt-5 mb-5 justify-content-center align-items-center">
            <div class="hero-image col-md-8 col-lg-6 mt-5">
                <img src="{{ asset('assets/images') }}/banner.jpg" alt="" />
            </div>
            <div class="hero-text col-md-8 col-lg-6">
                <h1>Travel with Comfort</h1>
                <p>
                    We are dedicated to ensuring a superior user experience on our platform and a critical component of that
                    is customer service. We provide customer support at all stages of our customer's journey – before,
                    during and after.
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
                                <div class="postcard__preview-txt w-75">
                                    {{ $tour->description }}
                                </div>
                                <h4 class="mt-3">Starting only at Rs {{ $tour->price }}</h4>

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
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/augadh/"
                    role="button"><i class="bi bi-linkedin"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/RAugadh/LuxTravels"
                    role="button"><i class="bi bi-github"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="mailto:ankit.kumar060@gmail.com" role="button"><i
                        class="bi bi-envelope"></i></a>
            </section>
            <!-- Section: Social media -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>LuxTravels
                            </h6>
                            <p>
                                We are dedicated to ensuring a superior user experience on our platform and a critical
                                component of that
                                is customer service. We provide customer support at all stages of our customer's journey –
                                before,
                                during and after.
                            </p>
                            <p>
                                Special thanks to <br>
                                Ranjith Chinnasamy (IBM , Mentor)
                                Hariboopalakrishnan B (Edunet , Trainer)
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Special Thanks
                            </h6>
                            <p>
                                <a href="https://skillsbuild.org" class="text-reset">IBM SkillsBuild</a>
                            </p>
                            <p>
                                <a href="https://www.edunetfoundation.org" class="text-reset">Edunet Foundation</a>
                            </p>
                            <p>
                                <a href="https://dgt.gov.in" class="text-reset">DGT India</a>
                            </p>
                            <p>
                                <a href="https://bharatskills.gov.in" class="text-reset">Bharat Skills</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Laravel</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Bootstrap 5</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">XAMPP</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contact
                            </h6>
                            <p><i class="bi bi-house me-3"></i> New Delhi, 110001, India</p>
                            <p><i class="bi bi-telephone me-3"></i> + 011 234 567 88</p>
                            <p><i class="bi bi-printer me-3"></i> + 011 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright:
            <a class="text-white" href="https://github.com/RAugadh/LuxTravels">Augadh</a>
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
