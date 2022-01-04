{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endauth
    </div>
@endif --}}
@extends('layouts.app')

@section('title')
{{ __('Home') }}
@endsection

@section('content')
<header
      class="
        container-md
        row
        p-5
        mx-auto
        mt-5
        justify-content-center
        align-items-center
      "
    >
      <div class="hero-image col-md-8 col-lg-6 mt-5">
        <img src="./assets/images/banner.jpg" alt="" />
      </div>
      <div class="hero-text col-md-8 col-lg-6">
        <h1>Travel with Comfort</h1>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius tempora
          possimus necessitatibus ipsum! Aut provident earum, dolorem veritatis
          amet quibusdam.
        </p>
        <a href="#tourPlans" class="btn-lg primary-btn p-3 px-4"
          >See Tour Plans</a
        >
      </div>
    </header>
    @endsection
