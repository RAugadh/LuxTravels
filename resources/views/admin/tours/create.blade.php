@extends('layouts.dashnav')

@section('title')
    {{ __('Admin') }}
@endsection

@section('content')
    <div class=" row  g-2 p-3">
        <div class="col-6">
            <a class="btn btn-primary" href="{{ url('admin/tours') }}"> Go Back</a>
            <div class="row">
                <div class="col-12">


                    <img class="img-thumbnail" id="previewImg" src="https://fakeimg.pl/400x400" alt="Placeholder">
                    <p>
                        <input type="file" name="photo" onchange="previewFile(this);" required>
                    </p>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1>Modules</h1>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h1>Detailed Form</h1>
        </div>
    </div>
    <script>
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
