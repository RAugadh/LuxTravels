@extends('layouts.main-nav')

@section('title')
    {{ __('Password Confirmation') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card login-frm-bg mb-3 mt-5">
                <div class="card-header text-center">@yield('title')</div>
                <div class="card-body">

                    <form action="{{ route('password.confirm') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">{{ __('Enter Password') }}</label>
                            <input type="password" class="form-control form-control-lg" id="inputPassword" name="password"
                                placeholder="{{ __('Enter password') }}" required>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Confirm Password') }}</button>
                        </div>
                    </form>
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
                        <div class="alert alert-success">{{ __('Your password has been updated.') }}</div>
                    @endif

                </div>
                <div class="card-footer text-center">
                    <a class="link-a" href="{{ route('home') }}">{{ __('Return to home page') }}</a>
                </div>
            </div>


        </div>
    </div>
@endsection
