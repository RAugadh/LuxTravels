@extends('layouts.main-nav')
@section('title')
    {{ __('Register') }}
@endsection

@section('content')


    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card login-frm-bg mb-3 mt-3">
                <div class="card-header fw-bold mb-2 text-center text-uppercase">@yield('title')</div>
                <div class="card-body">

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="inputEmail" class="form-label">{{ __('Email address') }}</label>
                            <input type="email" class="form-control " id="inputEmail" name="email"
                                placeholder="{{ __('Enter email address') }}" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control " id="inputName" name="name"
                                placeholder="{{ __('Enter name') }}" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control  id=" inputPassword" name="password"
                                placeholder="{{ __('Enter password') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputConfirmPassword" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control " id="inputConfirmPassword"
                                name="password_confirmation" placeholder="{{ __('Confirm password') }}" required>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-outline-light btn-lg px-5 m-3">{{ __('Register') }}</button>
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
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a class="link-a" href="{{ route('login') }}">{{ __('Existing user? Login') }}</a>
                </div>
            </div>


        </div>
    </div>
@endsection
