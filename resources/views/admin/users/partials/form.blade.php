@csrf
<div class="my-3 mx-5">
    <label for="inputEmail" class="form-label">{{ __('Email address') }}</label>
    <input type="email" class="form-control " id="inputEmail" name="email"
        placeholder="{{ __('Enter email address') }}"
        value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset" required>
</div>
<div class="mb-3 mx-5">
    <label for="inputName" class="form-label">{{ __('Name') }}</label>
    <input type="text" class="form-control " id="inputName" name="name" placeholder="{{ __('Enter name') }}"
        value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset" required>
</div>
@isset($create)
    <div class="mb-3 mx-5">
        <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
        <input type="password" class="form-control " id="inputPassword" name="password"
            placeholder="{{ __('Enter password') }}" required>
    </div>
    <div class="mb-3 mx-5">
        <label for="inputConfirmPassword" class="form-label">{{ __('Confirm Password') }}</label>
        <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation"
            placeholder="{{ __('Confirm password') }}" required>
    </div>
@endisset

<div class="mb-3 mx-3  mt-4" data-toggle="buttons-radio">

    @foreach ($roles as $role)
        <div id="tab" class="form-check form-check-inline btn-group mt-2 mx-2">
            <label class=" form-check-label btn btn-large btn-danger p-2" data-toggle="tab" for="{{ $role->name }}">
                <input class="form-check-checkbox" type="radio" name="role[]" value="{{ $role->id }}"
                    id="{{ $role->name }}" @isset($user) @if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
                {{ $role->name }}</label>

        </div>
    @endforeach

</div>
<div class="text-center">
    <button type="submit" class="btn btn-outline-light btn-lg px-5 m-3">
        @isset($create)
            Create User
        @endisset
        @isset($edit)
            Update
        @endisset
    </button>
</div>
