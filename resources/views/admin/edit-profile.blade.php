@extends('admin.sidebar')

@section('title')
    {{ __('Profile') }}
@endsection

@section('admindash')
    @include('partials.alerts')
    <form action="{{ url('admin/profile/update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-5 p-3">
                <div class="card login-frm-bg mb-2 mt-5 w-50 mx-auto">
                    <div class="card-body">
                        <div class="profile-header-container">
                            <div class="profile-header-img">
                                <img class="img-thumbnail rounded-circle" id="previewImg" onlick="getFilePathFromDialog();"
                                    src="@if (Auth::user()->photo !== null) {{ asset('uploads/profile') }}/{{ Auth::user()->photo }} @else{{ asset('assets/images/profile.jpg') }} @endif" />
                                <!-- badge -->
                                <div class="rank-label-container">
                                    <span class="label label-default rank-label">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="my-2">
                    <div class="input-group custom-file-button  m-auto w-75">
                        <label class="input-group-text" for="inputGroupFile">Choose Image</label>
                        <input type="file" accept='image/jpeg , image/jpg, image/gif, image/png' class="form-control"
                            id="inputGroupFile" name="photo" onchange="previewFile(this);">
                    </div>
                </div>
                <span class="mx-5"></span>
                <div class="mt-5 mb-3 text-center">
                    <h5>Looking to change Password?</h5>
                    <a class=" btn btn-sm btn-info mx-3" href="{{ url('admin/password/edit') }}">Change Password</a>
                </div>
            </div>
            <div class="col-7 p-5 mt-5">
                <div class="mx-4">
                    <label for="inputName" class="form-label mx-2">Name</label>
                    <input type="text" class="form-control form-control-lg" id="inputName" name="name"
                        placeholder="{{ __('User Name') }}" value="{{ old('name') }}{{ Auth::user()->name }}">
                </div>
                <div class="mx-4 my-5 ">
                    <label for="inputEmail" class="form-label mx-2">Email</label>
                    <input type="text" class="form-control form-control-lg" id="inputEmail" name="email"
                        placeholder="{{ __('User Email') }}" value="{{ old('email') }}{{ Auth::user()->email }}">
                </div>
                <span class="m-5"></span>
                <div class="text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-lg btn-primary mb-3">{{ __('Update Profile') }}</button>
                </div>

            </div>
    </form>
    </div>
    <script>
        document.body.classList.remove("bg-light");
        document.body.classList.add("bg-content");

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
