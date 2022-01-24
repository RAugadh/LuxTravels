@extends('layouts.dashnav')

@section('title')
    {{ __('Admin') }}
@endsection

@section('content')
    <div class="p-2">
        <div class="m-1">
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
            <a class="btn btn-primary" href="{{ url('admin/tours') }}"> Go Back</a>
            <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('admin.tours.partials.form', ['edit' => true])
            </form>
        </div>
    </div>
    <script>
        document.body.classList.remove("bg-light");
        document.body.classList.add("bg-content");
        $("#inputHighlight").prop('checked', true);

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
