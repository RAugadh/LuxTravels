@extends('layouts.main-nav')

@section('title')
    {{ __('Email Verification') }}
@endsection

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-5">
            <div class="card login-frm-bg mb-3">
                <div class="card-header text-center">@yield('title')</div>
                <div class="card-body">

                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            {{ __('Your account is not verified, please check your email for a verification link. If you did not receive the email, you may request a new verification link.') }}
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit"
                                class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Resend Verification Link') }}</button>
                        </div>
                    </form>

                </div>

                {{-- Since user is already logged in, route user to logout --}}
                <div class="card-footer text-center">

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Return to main page') }}</button>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
@endsection
