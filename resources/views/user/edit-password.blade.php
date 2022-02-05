@extends('user.sidebar')

@section('title')
    {{ __('Edit Password') }}
@endsection

@section('userdash')
    <div class="row justify-content-center">
        <div class="col-lg-7 mt-4">
            <div class=" bg-transparent mb-3 py-3 px-5">
                <div class="card-header text-center">
                    <h4>Change Password</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('user-password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">{{ __('Current password') }}</label>
                            <input type="password" class="form-control" id="inputCurrentPassword" name="current_password"
                                placeholder="{{ __('Enter current password') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">{{ __('New Password') }}</label>
                            <input type="password" class="form-control" id="inputPassword" name="password"
                                placeholder="{{ __('Enter new password') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputConfirmPassword"
                                class="form-label">{{ __('Confirm New Password') }}</label>
                            <input type="password" class="form-control" id="inputConfirmPassword"
                                name="password_confirmation" placeholder="{{ __('Confirm new password') }}" required>
                        </div>
                        <div class="text-center pt-5">
                            <button type="submit" class="btn btn-lg btn-primary mb-3">{{ __('Update Password') }}</button>
                        </div>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <a class=" btn btn-info" href="{{ url('/user/profile') }}">{{ __('Return to Profile') }}</a>
                </div>
            </div>

            @if ($errors->hasBag('updatePassword'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->updatePassword->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">{{ __('Your password has been updated.') }}</div>
            @endif
        </div>
    </div>
    <script>
        document.body.classList.remove("bg-light");
        document.body.classList.add("bg-content");
    </script>
@endsection
