@extends('admin.layouts.main')
@section('admin_index_body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page', ['params' => 'settings/galleryDescription']) }}" method="POST">
                        @csrf

                        <div class="col-lg-8">
                            <label for="">{{ lang_db('Site Title') }}</label>
                            <input type="hidden" name="codes[]" value="{{ $gallery_title[0]->code ?? -1 }}" required
                                readonly>
                            <input type="hidden" name="keys[]" value="{{ $gallery_title[0]->key ?? 'gallery_title' }}"
                                required readonly>
                            <input type="text" class="form-control" name="values[]" id="gallery_title"
                                value="{{ $gallery_title[0]->value ?? '' }}" placeholder="Enter Title">
                        </div>
                        <div class="col-lg-8 mt-3">
                            <label for="">{{ lang_db('Introduction') }}</label>
                            <input type="hidden" name="keys[]" value="gallery_description" required readonly>
                            <input type="hidden" name="codes[]" value="{{ $gallery_description[0]->code ?? -1 }}" required
                                readonly>
                            <textarea name="values[]" id=gallery_description"" cols="30" rows="10" class="form-control"
                                placeholder="Enter Introduction">{{ $gallery_description[0]->value ?? '' }}</textarea>
                        </div>

                        @foreach ($language as $item)
                            @if ($item->optional_2 == 'main_language')
                                @continue
                            @endif

                            <div class="col-xl-8 mt-5">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h3 class="card-title font-size-16 mt-0 text-white">{{ $item->value }}</h3>
                                        <div class="card-text">

                                            <div class="col-lg-12">
                                                <label for="">{{ lang_db('Site Title') }}</label>
                                                <input type="text" class="form-control"
                                                    name="language[{{ $item->optional_1 }}][value][]" id="gallery_title"
                                                    value="{{ isset($gallery_title) && isset($gallery_title[0]) && $gallery_title[0]->value ? lang_db($gallery_title[0]->value, $type = -1, $locale = $item->optional_1) : '' }}"
                                                    placeholder="Enter Title">
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <label for="">{{ lang_db('Introduction') }}</label>
                                                <textarea name="language[{{ $item->optional_1 }}][value][]" id=gallery_description"" cols="30" rows="10"
                                                    class="form-control" placeholder="Enter Introduction">{{ isset($gallery_description) && isset($gallery_description[0]) && $gallery_description[0]->value ? lang_db($gallery_description[0]->value, $type = -1, $locale = $item->optional_1) : '' }}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            {{ lang_db('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
