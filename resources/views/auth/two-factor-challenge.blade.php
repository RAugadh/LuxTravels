@extends('layouts.app')

@section('title')
    {{ __('Two Factor Authentication Challenge') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card login-frm-bg mb-3">
                <div class="card-header text-center">{{ __('Authentication Code') }}</div>
                <div class="card-body">

                    <form action="{{ route('two-factor.login') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="inputCode" class="form-label">{{ __('Enter authentication code') }}</label>
                            <input type="text" class="form-control form-control-lg" id="inputCode" name="code"
                                placeholder="{{ __('Enter authentication code') }}" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Submit') }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card login-frm-bg mb-3">
                <div class="card-header text-center">{{ __('Recovery Code') }}</div>
                <div class="card-body">

                    <form action="{{ route('two-factor.login') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="inputRecoveryCode" class="form-label">{{ __('Enter recovery code') }}</label>
                            <input type="text" class="form-control form-control-lg" id="inputRecoveryCode"
                                name="recovery_code" placeholder="{{ __('Enter recovery code') }}" required>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Submit') }}</button>
                        </div>
                    </form>

                    <form action="{{ route('two-factor-recovery-codes.send') }}" method="POST">
                        @csrf
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Email recovery codes') }}</button>
                        </div>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <a class="link-a" href="{{ route('login') }}">{{ __('Return to login') }}</a>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
    </div>
@endsection
