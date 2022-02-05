@csrf
<div class="row mx-2  mt-3">
    <div class="col-5 gx-2 ">
        <div class="create-frm rounded px-2 pt-2">
            <div class="row ">
                <div class="col-12 mb-2 ">
                    <div class="py-2 w-75 m-auto">
                        <div class="my-2 d-flex">
                            <div class="m-auto">
                                <img class="img-thumbnail " id="previewImg" onlick="getFilePathFromDialog();"
                                    src="@if (@isset($tour)) {{ asset('uploads/tours') }}/{{ $tour->image }} @else{{ asset('assets/images/placeholder1.jpg') }} @endif" alt="Placeholder">

                            </div>
                        </div>
                        <div class="my-2">
                            <div class="input-group custom-file-button  m-auto w-75">
                                <label class="input-group-text" for="inputGroupFile">Choose Image</label>
                                <input type="file" accept='image/jpeg , image/jpg, image/gif, image/png'
                                    class="form-control" id="inputGroupFile" name="image"
                                    onchange="previewFile(this);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mr-3">
                    <div class=" py-2 mx-auto">
                        <div class=" fw-bold mb-2 text-center text-uppercase">Add Modules</div>
                        <div class="w-75 mx-auto">
                            <div class="mb-2 mx-3 d-flex">
                                <input type="text" class="form-control " id="inputName" name="module_1"
                                    placeholder="{{ __('Enter Module') }}"
                                    value="{{ old('module_1') }}@isset($module){{ $module->module_1 }}@endisset"
                                    required>
                            </div>
                            <div class="mb-2 mx-3 d-flex">
                                <input type="text" class="form-control " id="inputName" name="module_2"
                                    placeholder="{{ __('Enter Module') }}"
                                    value="{{ old('module_2') }}@isset($module){{ $module->module_2 }}@endisset"
                                    required>
                            </div>
                            <div class="mb-2 mx-3 d-flex">
                                <input type="text" class="form-control " id="inputName" name="module_3"
                                    placeholder="{{ __('Enter Module') }}"
                                    value="{{ old('module_3') }}@isset($module){{ $module->module_3 }}@endisset"
                                    required>
                            </div>
                            <div class="mb-2 mx-3 d-flex">
                                <input type="text" class="form-control " id="inputName" name="module_4"
                                    placeholder="{{ __('Enter Module') }}"
                                    value="{{ old('module_4') }}@isset($module){{ $module->module_4 }}@endisset"
                                    required>
                            </div>
                            <div class="mb-2 mx-3 d-flex">
                                <input type="text" class="form-control " id="inputName" name="module_5"
                                    placeholder="{{ __('Enter Module') }}"
                                    value="{{ old('module_5') }}@isset($module){{ $module->module_5 }}@endisset"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- login-frm-bg --}}
        </div>
    </div>
    <div class="col-7 gx-3 ">
        <div class="p-2 create-frm rounded mx-auto">
            <div class=" fw-bold mb-2 text-center text-uppercase">
                @isset($create)
                    Create New Tour
                @endisset
                @isset($edit)
                    Update Tour
                @endisset</div>
            <div class="w-75 mx-auto">
                <div class="mt-4 mb-3 mx-2">
                    <input type="text" class="form-control form-control-lg " id="inputName" name="name"
                        placeholder="{{ __('Tour Name') }}"
                        value="{{ old('name') }}@isset($tour){{ $tour->name }}@endisset"
                        required>
                </div>
                <div class="mb-3 mx-2">
                    <input type="text" class="form-control" id="inputName" name="sub"
                        placeholder="{{ __('Tour SubHead') }}"
                        value="{{ old('sub') }}@isset($tour){{ $tour->sub }}@endisset"
                        required>
                </div>
                <div class="mb-3 mx-2">
                    <textarea type="text" class="form-control form-control-lg" id="inputName" name="description"
                        placeholder="{{ __('Desicription') }}" rows="3" style="height:100%;"
                        required>{{ old('description') }}@isset($tour){{ $tour->description }}@endisset</textarea>
                </div>
                <div class="mb-3 mx-2 w-50">
                    <input type="number" class="form-control " id="inputPrice" name="price"
                        placeholder="{{ __('Price') }}"
                        value="{{ old('price') }}@isset($tour){{ $tour->price }}@endisset"
                        required>
                </div>
                <div class="mb-2 mx-2 row">
                    <h4 class="text-center mb-2">Boarding</h4>
                    <div class="col-4">
                        <label for="inputBoarding1" class="form-label mx-2">Primary Location</label>
                        <input type="text" class="form-control " id="inputBoarding1" name="boarding_1"
                            placeholder="{{ __(' Primary Location') }}"
                            value="{{ old('boarding_1') }}@isset($tour){{ $tour->boarding_1 }}@endisset"
                            required>
                    </div>
                    <div class="col-4">
                        <label for="inputBoarding2" class="form-label mx-2">Location 2 | Optional</label>
                        <input type="text" class="form-control " id="inputBoarding2" name="boarding_2"
                            placeholder="{{ __('Location 2') }}"
                            value="{{ old('boarding_2') }}@isset($tour){{ $tour->boarding_2 }}@endisset">
                    </div>
                    <div class="col-4">
                        <label for="inputBoarding3" class="form-label mx-2">Location 3 | Optional</label>
                        <input type="text" class="form-control " id="inputBoarding3" name="boarding_3"
                            placeholder="{{ __('Location 3') }}"
                            value="{{ old('boarding_3') }}@isset($tour){{ $tour->boarding_3 }}@endisset">
                    </div>
                </div>
                <div class="mb-1 mt-3" data-toggle="buttons-checkbox">
                    <div id="tab" class="form-check form-check-inline btn-group mt-2 mx-2">
                        <label class=" form-check-label btn btn-large btn-danger p-2" data-toggle="tab"
                            for="inputHighlight">
                            <input type="hidden" name="highlight" value="0">
                            <input class="form-check-checkbox" type="checkbox" name="highlight"
                                value="{{ old('highlight') ?? 1 }}" @isset($tour)
                                @if ($tour->highlight == '1') checked @endif @endisset id="inputHighlight"> Make
                            Highlight</label>

                    </div>
                </div>
                <div class="text-center mt-2 mb-2">
                    <button type="submit" class="btn btn-success btn-lg px-5">

                        @isset($create)
                            Create New Tour
                        @endisset
                        @isset($edit)
                            Update Tour
                        @endisset
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
