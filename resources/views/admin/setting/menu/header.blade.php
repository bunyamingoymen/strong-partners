@extends('admin.layouts.main')
@section('admin_index_body')
    <style>
        .selected_menu {
            justify-content: space-between;
        }

        .selected_menu_active {
            background-color: #E3F2D0 !important;
            color: #71C078 !important;
        }

        .selected_menu_passive {
            background-color: #F8D7DB !important;
            color: #FC5661 !important;
        }
    </style>
    <!-- nestable2 css -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_page', ['params' => 'settings/menu/header']) }}" method="POST"
                        id="changeMenuFormID">
                        @csrf

                        @if (isset($selected_menu))
                            <!--Code-->
                            <div hidden>
                                <input type="text" name="code" id="code" value="{{ $selected_menu->code }}">
                            </div>
                        @endif

                        <div hidden>
                            <input type="hidden" name="type" id="type" value="header">
                        </div>

                        <div class="col-lg-12 mt-2">
                            <label for="top_category">{{ lang_db('Select Top Menu') }}: </label>
                            <select name="top_category" id="top_category" class="form-control">
                                <option value="0">{{ lang_db('Top Menu') }}</option>
                                @foreach ($menu->where('top_category', 0) as $item)
                                    @if (isset($selected_menu) && $item->code == $selected_menu->code)
                                        @continue;
                                    @endif
                                    <option value="{{ $item->code }}"
                                        {{ isset($selected_menu) && $selected_menu->top_category == $item->code ? 'selected' : '' }}>
                                        {{ lang_db($item->title) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!--Menü Sıra-->
                        <div class="col-lg-12 mt-2">
                            <label for="row">{{ lang_db('Menu Row') }}: </label>
                            <input type="number" class="form-control" id="row" name="row"
                                value={{ $selected_menu->row ?? '' }}>
                        </div>

                        <div class="col-lg-12 mt-2" hidden>
                            <label for="column">{{ lang_db('Menu Column') }}: </label>
                            <input type="number" class="form-control" id="column" name="column"
                                value={{ $selected_menu->column ?? '0' }}>
                        </div>

                        <!--Menü Adı-->
                        <div class="col-lg-12 mt-2">
                            <label for="title">{{ lang_db('Title') }}: </label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $selected_menu->title ?? '' }}">
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
                                                <label
                                                    for="title_lan_{{ $item->optional_1 }}">{{ lang_db('Title') }}</label>
                                                <input type="text" class="form-control"
                                                    name="language[{{ $item->optional_1 }}][title]"
                                                    id="title_lan_{{ $item->optional_1 }}"
                                                    value="{{ isset($selected_menu) && $selected_menu->title ? lang_db($selected_menu->title, $type = -1, $locale = $item->optional_1) : '' }}"
                                                    placeholder="Enter Title">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="col-lg-12 mt-2">
                            <label for="path">{{ lang_db('URL') }}: </label>
                            <select name="path" id="path" class="form-control" onchange="changePathType()">
                                <option value="#">{{ lang_db('No URL') }}</option>
                                <option value="contact">{{ lang_db('Contact') }}</option>
                                <option value="blogs">{{ lang_db('Blogs') }}</option>
                                <option value="products">{{ lang_db('Products') }}</option>
                                <option value="specific_page">{{ lang_db('A specific Page') }}</option>
                                <option value="specific_blog">{{ lang_db('A specific Blog') }}</option>
                                <option value="specific_supplier">{{ lang_db('A specific Supplier') }}</option>
                                <option value="manuel_input">{{ lang_db('Manuel Input') }}</option>
                            </select>
                        </div>

                        <!--Bağlantı Tipi-->
                        <div class="col-lg-12 mt-2" id="specific_section" hidden>
                            <div id="specific_section_page" hidden>
                                <label for="">Bağlantı Sayfası: </label>
                                <select name="specific_selectbox_page" id="specific_selectbox_page" class="form-control">
                                    @foreach ($pages as $page)
                                        <option value="/p/{{ $page->short_name }}">{{ lang_db($page->title) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="specific_section_blog" hidden>
                                <label for="">Bağlantı Sayfası: </label>
                                <select name="specific_selectbox_blog" id="specific_selectbox_blog" class="form-control">
                                    @foreach ($blogs as $blog)
                                        <option value="/p/{{ $blog->short_name }}">{{ lang_db($blog->title) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="specific_section_supplier" hidden>
                                <label for="">Bağlantı Sayfası: </label>
                                <select name="specific_selectbox_supplier" id="specific_selectbox_supplier"
                                    class="form-control">
                                    @foreach ($suppliers as $supplier)
                                        <option value="/p/{{ $supplier->short_name }}">{{ lang_db($supplier->title) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--Bağlantı Adresi-->
                        <div class="col-lg-12 mt-2" id="manuel_url" hidden>
                            <label for="manuel_input">{{ lang_db('Manuel Input') }}: </label>
                            <input type="text" class="form-control" id="manuel_input" name="manuel_input"
                                value={{ $selected_menu->path ?? '' }}>
                        </div>


                        <!--Durumu-->
                        <div class="row input mb-3">
                            <div class="row col-lg-12" style="align-items: center;">
                                <div>
                                    <label for="active" class="mr-3">Durum:</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="active" name="active" data-switch="bool"
                                        {{ isset($selected_menu) && $selected_menu->active == 1 ? 'checked' : '' }}
                                        {{ !isset($selected_menu) ? 'checked' : '' }}>
                                    <label for="active" data-on-label="Aktif" data-off-label="Pasif"></label>
                                </div>
                            </div>
                        </div>

                        <!--Buton-->
                        <div style="float: right;">
                            <button class="btn btn-primary" type="button" onclick="submitChangeMenuForm()">
                                <i class="mdi mdi-content-save"></i>
                                {{ lang_db('Save') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--Menü Listeleme-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 dd home-module-custom-nestable">
                        <ol class="col-lg-12 dd-list">
                            @foreach ($menu->where('top_category', 0) as $item)
                                <li value="{{ $item->row }}" class="dd-item home-module-custom-nestable-item"
                                    data-id="{{ $item->code }}">
                                    <div
                                        class="row dd-handle ml-2 mt-2 selected_menu {{ $item->active == 1 ? 'selected_menu_active' : 'selected_menu_passive' }}">
                                        <div>
                                            {{ $item->title }}
                                        </div>
                                        <div>
                                            <a href="{{ route('admin_page', ['params' => 'settings/menu/header']) }}?code={{ $item->code }}"
                                                data-toggle="tooltip" data-placement="right" title="Güncelle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin_page', ['params' => 'settings/menu/header/delete']) }}?code={{ $item->code }}"
                                                data-toggle="tooltip" data-placement="left" title="Sil">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                        </div>
                                    </div>
                                    @if (count($menu->where('top_category', $item->code)))
                                        <ol class="dd-list">
                                            @foreach ($menu->where('top_category', $item->code) as $item_alt)
                                                <li value="{{ $item_alt->row }}" class="dd-item"
                                                    data-id="{{ $item_alt->code }}">
                                                    <div
                                                        class="row dd-handle ml-2 mt-2 selected_menu {{ $item_alt->active == 1 ? 'selected_menu_active' : 'selected_menu_passive' }}">
                                                        <div>
                                                            {{ $item_alt->title }}
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('admin_page', ['params' => 'settings/menu/header']) }}?code={{ $item_alt->code }}"
                                                                data-toggle="tooltip" data-placement="right"
                                                                title="{{ lang_db('Edit') }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin_page', ['params' => 'settings/menu/header/delete']) }}?code={{ $item_alt->code }}"
                                                                data-toggle="tooltip" data-placement="left"
                                                                title="{{ lang_db('Delete') }}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitChangeMenuForm() {
            var title = document.getElementById('title').value;

            if (title == "") {
                Swal.fire({
                    icon: 'error',
                    title: "{{ lang_db('Error!') }}",
                    text: "{{ lang_db('Please fill in the required fields') }}",
                })
            } else {
                document.getElementById('changeMenuFormID').submit();
            }
        }

        function changePathType() {
            const path_type = document.getElementById('path').value;
            if (path_type === 'specific_page' || path_type === 'specific_blog' || path_type === 'specific_supplier') {
                document.getElementById('specific_section').hidden = false;
                document.getElementById('manuel_url').hidden = true;
                if (path_type === 'specific_page') {
                    alert('specific_page');
                    document.getElementById('specific_section_page').hidden = false;
                    document.getElementById('specific_section_blog').hidden = true;
                    document.getElementById('specific_section_supplier').hidden = true;
                } else if (path_type === 'specific_blog') {
                    alert('specific_blog');
                    document.getElementById('specific_section_page').hidden = true;
                    document.getElementById('specific_section_blog').hidden = false;
                    document.getElementById('specific_section_supplier').hidden = true;
                } else {
                    alert('specific_supplier');
                    document.getElementById('specific_section_page').hidden = true;
                    document.getElementById('specific_section_blog').hidden = true;
                    document.getElementById('specific_section_supplier').hidden = false;
                }
            } else if (path_type === 'manuel_input') {
                document.getElementById('specific_section').hidden = true;
                document.getElementById('manuel_url').hidden = false;
            } else {
                document.getElementById('specific_section').hidden = true;
                document.getElementById('manuel_url').hidden = true;
            }
        }
    </script>
@endsection
