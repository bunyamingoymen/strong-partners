@extends('admin.layouts.main')
@section('admin_index_body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page', ['params' => $params]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($item))
                            <input type="hidden" name="code" value="{{ $item->code ?? -1 }}" required readonly>
                        @endif
                        <input type="hidden" name="type" value="{{ $type ?? 2 }}" required readonly>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mt-3">
                                    <label for="pageTitle">{{ lang_db('Title') }}</label>
                                    <input type="text" id="pageTitle" name="title" class="form-control"
                                        value="{{ $item->title ?? '' }}">
                                </div>
                                <div class="mt-3">
                                    <label for="pageSubTitle">{{ lang_db('Sub Title') }}</label>
                                    <input type="text" id="pageSubTitle" name="sub_title" class="form-control"
                                        value="{{ $item->sub_title ?? '' }}">
                                </div>
                                <div class="mt-3">
                                    <label for="pageDescription">{{ lang_db('Content') }}</label>
                                    <textarea id="pageDescription" class="form-editor-tinymce" name="description">{{ $item->description ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-5">
                                <div>
                                    <input type="file" class="custom-file-input" id="pageImage" name="image"
                                        accept="image/*">
                                    <label class="custom-file-label" for="pageImage">
                                        {{ lang_db('Choose file...') }}
                                    </label>
                                </div>
                                @if (isset($item) && isset($item->image))
                                    <div class="mt-5">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->url ?? '' }}"
                                            style="height: 200px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-12 row mt-5 mb-3 ml-3">
                                <div class="col-lg-12 custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="pageShowHome" name="show_home"
                                        {{ (isset($item) && $item->show_home) || !isset($item) ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                        for="pageShowHome">{{ lang_db('Show On Homepage') }}</label>
                                </div>
                                @if ($params == 'page/edit')
                                    <div class="col-lg-12 custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="productHomeType"
                                            name="home_type"
                                            {{ (isset($item) && $item->home_type) || !isset($item) ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="productHomeType">{{ lang_db('If it is shown on the homepage, the image should be on the right side (If this is not selected, it will be on the left side.)') }}</label>
                                    </div>
                                @elseif ($params = 'supplier/edit')
                                    <div class="mt-3 col-lg-4">
                                        <label
                                            for="pageOtherURLOnHomePage">{{ lang_db('URL to go to on the Home Page (If empty, it goes to its own page) (Show on Home Page button must be active)') }}</label>
                                        <input type="text" id="pageOtherURLOnHomePage" name="other_url_supplier"
                                            class="form-control" value="{{ $other_url_supplier->optional_1 ?? '' }}">
                                    </div>
                                @endif
                                <div class="mt-3 col-lg-12 custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="pageShowTitle"
                                        name="show_title_on_its_own"
                                        {{ isset($show_title_on_its_own) && $show_title_on_its_own->optional_1 ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                        for="pageShowTitle">{{ lang_db('Show title on its own page') }}</label>
                                </div>

                                <div class="mt-3 col-lg-12 custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="pageShowDate"
                                        name="show_date_on_its_own"
                                        {{ isset($show_date_on_its_own) && $show_date_on_its_own->optional_1 ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                        for="pageShowDate">{{ lang_db('Show date on its own page') }}</label>
                                </div>
                            </div>

                        </div>
                        <div>
                            @foreach ($language as $lan)
                                @if ($lan->optional_2 == 'main_language')
                                    @continue
                                @endif
                                <div class="col-lg-8 mt-5">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body">
                                            <h3 class="card-title font-size-16 mt-0 text-white">{{ $lan->value }}</h3>
                                            <div class="card-text">
                                                <div class="mt-3">
                                                    <label for="pageTitle">{{ lang_db('Title') }}</label>
                                                    <input type="text" id="pageTitle"
                                                        name="language[{{ $lan->optional_1 }}][title]" class="form-control"
                                                        value="{{ isset($item->title) ? lang_db($item->title, $type = -1, $locale = $lan->optional_1) : '' }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="pageSubTitle">{{ lang_db('Sub Title') }}</label>
                                                    <input type="text" id="pageSubTitle"
                                                        name="language[{{ $lan->optional_1 }}][sub_title]"
                                                        class="form-control"
                                                        value="{{ isset($item->sub_title) ? lang_db($item->sub_title, $type = -1, $locale = $lan->optional_1) : '' }}">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="pageDescription">{{ lang_db('Content') }}</label>
                                                    <textarea id="pageDescription" class="form-editor-tinymce" name="language[{{ $lan->optional_1 }}][description]">{{ isset($item->description) ? lang_db($item->description, $type = -1, $locale = $lan->optional_1) : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            {{ lang_db('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/jquery', 'filename' => 'jquery.min.js']) }}"></script>
@endsection
