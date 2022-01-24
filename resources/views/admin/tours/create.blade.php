@extends('layouts.dashnav')

@section('title')
    {{ __('Admin') }}
@endsection

@section('content')
    <div class="p-2">
        <div class="m-1">
            <a class="btn btn-primary" href="{{ url('admin/tours') }}"> Go Back</a>
            <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gx-5 gt-2 my-1">
                    <div class="col-5">
                        <div class="row ">
                            <div class="col-12 mb-2 ">
                                <div class="py-2 w-75 m-auto bg-transparent">
                                    <div class="my-2 d-flex">
                                        <div class="m-auto">


                                            <img class="img-thumbnail " id="previewImg"
                                                src="{{ asset('assets/images/placeholder1.jpg') }}" alt="Placeholder">
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <div class="input-group custom-file-button  m-auto w-75">
                                            <label class="input-group-text" for="inputGroupFile">Choose Image</label>
                                            <input type="file" class="form-control" id="inputGroupFile" name="image"
                                                onchange="previewFile(this);" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mr-3">
                                <div class=" py-2 mx-auto bg-transparent">
                                    <div class=" fw-bold mb-2 text-center text-uppercase">Add Modules</div>
                                    <div class="">
                                        <div class="mb-3 mx-3 d-flex">
                                            <label for="inputName" class="form-label mx-2">Module1</label>
                                            <input type="text" class="form-control " id="inputName" name="module_1"
                                                placeholder="{{ __('Enter Module') }}" value="{{ old('module_1') }}"
                                                required>
                                        </div>
                                        <div class="mb-3 mx-3 d-flex">
                                            <label for="inputName" class="form-label mx-2">Module2</label>
                                            <input type="text" class="form-control " id="inputName" name="module_2"
                                                placeholder="{{ __('Enter Module') }}" value="{{ old('module_2') }}"
                                                required>
                                        </div>
                                        <div class="mb-3 mx-3 d-flex">
                                            <label for="inputName" class="form-label mx-2">Module3</label>
                                            <input type="text" class="form-control " id="inputName" name="module_3"
                                                placeholder="{{ __('Enter Module') }}" value="{{ old('module_3') }}"
                                                required>
                                        </div>
                                        <div class="mb-3 mx-3 d-flex">
                                            <label for="inputName" class="form-label mx-2">Module4</label>
                                            <input type="text" class="form-control " id="inputName" name="module_4"
                                                placeholder="{{ __('Enter Module') }}" value="{{ old('module_4') }}"
                                                required>
                                        </div>
                                        <div class="mb-3 mx-3 d-flex">
                                            <label for="inputName" class="form-label mx-2">Module5</label>
                                            <input type="text" class="form-control " id="inputName" name="module_5"
                                                placeholder="{{ __('Enter Module') }}" value="{{ old('module_5') }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- login-frm-bg --}}
                    </div>
                    <div class="col-7">
                        <div class="py-2 mx-auto bg-transparent">
                            <div class=" fw-bold mb-2 text-center text-uppercase">Create New User</div>
                            <div class="">
                                <div class="mb-3 mx-3">
                                    <label for="inputName" class="form-label mx-2">Tour Name</label>
                                    <input type="text" class="form-control " id="inputName" name="name"
                                        placeholder="{{ __('Tour Name') }}" value="{{ old('name') }}" required>
                                </div>
                                <div class="mb-3 mx-3">
                                    <label for="inputName" class="form-label mx-2">Tour SubHead</label>
                                    <input type="text" class="form-control " id="inputName" name="sub"
                                        placeholder="{{ __('Tour SubHead') }}" value="{{ old('sub') }}" required>
                                </div>
                                <div class="mb-3 mx-3">
                                    <label for="inputDescription" class="form-label mx-2">Description</label>
                                    <textarea type="text" class="form-control " id="inputName" name="description"
                                        placeholder="{{ __('Desicription') }}" value="{{ old('description') }}"
                                        required></textarea>
                                </div>
                                <div class="mb-3 mx-3">
                                    <label for="inputPrice" class="form-label mx-2">Price</label>
                                    <input type="text" class="form-control " id="inputPrice" name="price"
                                        placeholder="{{ __('Price') }}" value="{{ old('price') }}" required>
                                </div>
                                <div class="mb-3 mx-3  mt-4" data-toggle="buttons-checkbox">
                                    <div id="tab" class="form-check form-check-inline btn-group mt-2 mx-2">
                                        <label class=" form-check-label btn btn-large btn-danger p-2" data-toggle="tab"
                                            for="inputHighlight">
                                            <input type="hidden" name="highlight" value="0">
                                            <input class="form-check-checkbox" type="checkbox" name="highlight"
                                                value="{{ old('highlight') ?? 1 }}" @isset($tour)
                                                @if ($tour->module->highlight == '1') checked @endif @endisset id="inputHighlight"> Make
                                            Highlight</label>

                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-success btn-lg px-5 m-3">
                                        Create New Tour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


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
