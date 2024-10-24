@extends('admin.layouts.main')
@section('admin_index_body')
    @php
        $count = 1;
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12" style="display: inline-block;">
                        <a class="btn btn-primary mb-3" style="float: right;" href="#" onclick="addNewMeta()">
                            <i class="mdi mdi-plus-circle-outline"></i> {{ lang_db('New') }}
                        </a>
                    </div>
                    <form action="{{ route('admin_page', ['params' => 'settings/meta']) }}" method="POST">
                        @csrf
                        <div id="metaTagsDivId">
                            @foreach ($meta as $item)
                                <div class="col-lg-8 mt-3">
                                    <label for="">{{ lang_db('Meta Tag') }}</label>
                                    <input type="hidden" id="code_{{ $count }}" class="meta_codes" name="codes[]"
                                        value="{{ $item->code ?? '' }}" required readonly>

                                    <input type="hidden" id="key_{{ $count }}" class="meta_keys" name="keys[]"
                                        value="{{ $item->key ?? '' }}" required readonly>

                                    <input type="text" id="value_{{ $count }}" name="values[]"
                                        class="form-control meta_values" value="{{ $item->value ?? '' }}">
                                </div>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            {{ lang_db('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addNewMeta() {
            var html = `
                <div class="col-lg-8 mt-3">
                    <label for="">{{ lang_db('Meta Tag') }}</label>
                    <input type="hidden" id="code_{{ $count }}" class="meta_codes" name="codes[]" value="-1" required readonly>
                    <input type="hidden" id="key_{{ $count }}" class="meta_keys" name="keys[]" value="meta" required readonly>
                    <input type="text" id="value_{{ $count }}" name="values[]" class="form-control meta_values" value="">
                </div>`


            @php $count++; @endphp

            var data = getOldValue();

            document.getElementById('metaTagsDivId').innerHTML += html;

            setOldValue(data);
        }

        function getOldValue() {
            var meta_codes = document.getElementsByClassName('meta_codes');
            var meta_keys = document.getElementsByClassName('meta_keys');
            var meta_values = document.getElementsByClassName('meta_values');

            var meta_codes_values = [];
            var meta_keys_values = [];
            var meta_values_values = [];

            for (let i = 0; i < meta_codes.length; i++) {
                if (meta_codes[i]) meta_codes_values.push(meta_codes[i].value);
                if (meta_keys[i]) meta_keys_values.push(meta_keys[i].value);
                if (meta_values[i]) meta_values_values.push(meta_values[i].value);
            }

            return [meta_codes_values, meta_keys_values, meta_values_values];
        }

        function setOldValue(data) {
            if (data.length < 3) return false;
            var meta_codes = document.getElementsByClassName('meta_codes');
            var meta_keys = document.getElementsByClassName('meta_keys');
            var meta_values = document.getElementsByClassName('meta_values');

            var meta_codes_values = data[0];
            var meta_keys_values = data[1];
            var meta_values_values = data[2];

            for (let i = 0; i < meta_codes_values.length; i++) {
                if (meta_codes[i] && meta_codes_values[i]) meta_codes[i].value = meta_codes_values[i];
                if (meta_keys[i] && meta_keys_values[i]) meta_keys[i].value = meta_keys_values[i]
                if (meta_values[i] && meta_values_values[i]) meta_values[i].value = meta_values_values[i]
            }

            return true;

        }
    </script>
@endsection
