@extends('layouts.app')

@section('title')
{{ __('Login') }}
@endsection

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <div class="card login-frm-bg text-white">

            <div class="card-body p-5">
                <h2 class="fw-bold mb-2 text-center text-uppercase">Login</h2>
				<p class="text-white-50 text-center mb-5">Please enter your login and password!</p>

                <form action="{{ url('login') }}" method="POST">
                    @csrf
                    <div class="my-3">
                        <label for="inputEmail" class="form-label">{{ __('Email address') }}</label>
                        <input type="email" class="form-control form-control-lg" id="inputEmail" name="email" placeholder="{{ __('Enter email address') }}" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control form-control-lg" id="inputPassword" name="password" placeholder="{{ __('Enter password') }}" required>

                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="checkboxRemember" name="remember">
                        <label class="form-check-label" for="checkboxRemember">{{ __('Remember me') }}</label>
                        <a class="d-flex justify-content-end link-a" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-2 mt-2">
                        <button type="submit" class="btn btn-outline-light btn-lg px-5">{{ __('Login') }}</button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center">
                <a class="link-a" href="{{ route('register') }}">{{ __('New user? Register') }}</a>
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
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
    </div>
</div>
@endsection
