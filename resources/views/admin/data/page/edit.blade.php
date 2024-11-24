@extends('admin.layouts.main')
@section('admin_index_body')
    @php
        if ($type == 1) {
            $params = 'blog';
        } elseif ($type == 2) {
            $params = 'page';
        } elseif ($type == 3) {
            $params = 'supplier';
        }
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page', ['params' => $params . '/edit']) }}" method="POST"
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
@endsection
