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
                <a href="#tourPlans" class="btn-lg primary-btn p-3 px-4">See Tour Plans</a>
            </div>
        </header>
    </div>
@endsection
