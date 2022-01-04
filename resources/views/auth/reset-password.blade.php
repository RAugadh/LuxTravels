@extends('layouts.app')

@section('title')
{{ __('Reset Password') }}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card login-frm-bg mb-3 mt-5">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}" >
                    <input type="hidden" name="email" value="{{ request()->get('email') }}" required>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control form-control-lg" id="inputPassword" name="password" placeholder="{{ __('Enter password') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label form-control-lg">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" placeholder="{{ __('Confirm password') }}" required>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Reset Password') }}</button>
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
