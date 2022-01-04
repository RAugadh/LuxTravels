@extends('layouts.app')

@section('title')
{{ __('Forgot Password') }}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card login-frm-bg mb-3 mt-5">
            <div class="card-header fw-bold mb-2 text-center text-uppercase">@yield('title')</div>
            <div class="card-body">

                <form action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        {{ __('Enter your email addresss to send a password reset link.') }}
                    </div>
                    <div class="my-3">
                        <input type="email" class="form-control form-control-lg" id="inputEmail" name="email" placeholder="{{ __('Enter email address') }}" value="{{ old('email') }}" required>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </form>

            </div>

            <div class="card-footer text-center">
                <a class="link-a" href="{{ route('login') }}">{{ __('Return to login') }}</a>
            </div>
        </div>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('status'))
            <div class="alert alert-success">{{ __('A new password reset link has been sent to your email address.') }}</div>
        @endif
    </div>
</div>
@endsection
