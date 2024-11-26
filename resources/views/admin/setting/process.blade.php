@extends('admin.layouts.main')
@section('admin_index_body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12" style="display: inline-block;">
                        <a class="btn btn-primary mb-3" style="float: right;" href="#" onclick="addNewProcess()">
                            <i class="mdi mdi-plus-circle-outline"></i> {{ lang_db('New') }}
                        </a>
                    </div>
                    <form action="{{ route('admin_page', ['params' => 'settings/process']) }}" method="POST">
                        @csrf
                        @foreach ($process_title as $pro_title)
                            <div id="process_{{ $pro_title->code }}" class="processes mb-5">
                                <input type="hidden" name="codes[]" value="{{ $pro_title->code ?? -1 }}" required readonly>
                                <input type="hidden" name="keys[]" value="{{ $pro_title->key ?? 'processes' }}" required
                                    readonly>
                                <div class="col-lg-12 row mt-3">
                                    <div class="col-lg-8">
                                        <div>
                                            <label for="">{{ lang_db('Main Title') }}</label>
                                            <input type="text" class="form-control" name="values[]" id=""
                                                value="{{ $pro_title->value ?? '' }}"
                                                placeholder="{{ lang_db('Enter Main Title') }}">
                                        </div>
                                        <div>
                                            <input type="hidden"
                                                name="optional_2[]"value="{{ $pro_title->optional_2 ?? '' }}">
                                        </div>
                                        <div class="mt-3">
                                            <textarea name="optional_1[]" cols="30" rows="10" hidden>{{ $pro_title->optional_1 ?? '' }}</textarea>
                                        </div>

                                    </div>
                                </div>
                                @foreach ($language as $item)
                                    @if ($item->optional_2 == 'main_language')
                                        @continue
                                    @endif

                                    <div class="col-xl-8 mt-3">
                                        <div class="card text-white bg-primary">
                                            <div class="card-body">
                                                <h3 class="card-title font-size-16 mt-0 text-white">{{ $item->value }}
                                                </h3>
                                                <div class="card-text">

                                                    <div class="col-lg-12">
                                                        <label for="">{{ lang_db('Main Title') }}</label>
                                                        <input type="text" class="form-control"
                                                            name="language[{{ $item->optional_1 }}][value][]"
                                                            id=""
                                                            value="{{ $pro_title->value ? lang_db($pro_title->value, $type = -1, $locale = $item->optional_1) : '' }}"
                                                            placeholder="{{ lang_db('Enter Main Title') }}">
                                                    </div>
                                                    <div class="col-lg-12 mt-3">
                                                        <textarea name="language[{{ $item->optional_1 }}][optional_1][]" id="" cols="30" rows="10"
                                                            class="form-control" hidden>{{ $pro_title->optional_1 ? lang_db($pro_title->optional_1, $type = -1, $locale = $item->optional_1) : '' }}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div id="processDivId">
                            @foreach ($processes as $pro)
                                <div id="process_{{ $pro->code }}" class="processes">
                                    <input type="hidden" name="codes[]" value="{{ $pro->code ?? -1 }}" required readonly>
                                    <input type="hidden" name="keys[]" value="{{ $pro->key ?? 'processes' }}" required
                                        readonly>
                                    <div class="col-lg-12 row mt-3">
                                        <div class="col-lg-8">
                                            <div>
                                                <label for="">{{ lang_db('Title') }}</label>
                                                <input type="text" class="form-control" name="values[]" id=""
                                                    value="{{ $pro->value ?? '' }}"
                                                    placeholder="{{ lang_db('Enter Title') }}">
                                            </div>
                                            <div>
                                                <label for="">{{ lang_db('Icon') }}</label>
                                                <input type="text" class="form-control" name="optional_2[]"
                                                    id="" value="{{ $pro->optional_2 ?? '' }}"
                                                    placeholder="{{ lang_db('Enter Icon') }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="">{{ lang_db('Description') }}</label>
                                                <textarea name="optional_1[]" id="" class="form-control" cols="30" rows="10"
                                                    placeholder="{{ lang_db('Enter Description') }}">{{ $pro->optional_1 ?? '' }}</textarea>
                                            </div>

                                        </div>
                                        <div class="col-lg-2">
                                            <div class="col-lg-3 btn btn-danger"
                                                onclick="deleteProcess('{{ $pro->code }}', '{{ $pro->value }}' )"
                                                style="height:100%; widht:100%; display: flex; justify-content: center; align-items: center;">
                                                <i class="fas fa-trash-alt fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($language as $item)
                                        @if ($item->optional_2 == 'main_language')
                                            @continue
                                        @endif

                                        <div class="col-xl-8 mt-3">
                                            <div class="card text-white bg-primary">
                                                <div class="card-body">
                                                    <h3 class="card-title font-size-16 mt-0 text-white">
                                                        {{ $item->value }}
                                                    </h3>
                                                    <div class="card-text">

                                                        <div class="col-lg-12">
                                                            <label for="">{{ lang_db('Title') }}</label>
                                                            <input type="text" class="form-control"
                                                                name="language[{{ $item->optional_1 }}][value][]"
                                                                id=""
                                                                value="{{ $pro->value ? lang_db($pro->value, $type = -1, $locale = $item->optional_1) : '' }}"
                                                                placeholder="{{ lang_db('Enter Title') }}">
                                                        </div>
                                                        <div class="col-lg-12 mt-3">
                                                            <label for="">{{ lang_db('Description') }}</label>
                                                            <textarea name="language[{{ $item->optional_1 }}][optional_1][]" id="" cols="30" rows="10"
                                                                class="form-control" placeholder="{{ lang_db('Enter Description') }}">{{ $pro->optional_1 ? lang_db($pro->optional_1, $type = -1, $locale = $item->optional_1) : '' }}</textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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

    <script>
        var addNewProcessCount = 0;

        function getOldValue() {
            let values = [];
            const inputs = document.querySelectorAll('input, textarea');

            inputs.forEach((element) => {
                values.push(element.value);
            });

            return values;
        }

        function setOldValue(data) {
            const inputs = document.querySelectorAll('input, textarea');

            inputs.forEach((element, index) => {
                if (index < data.length) {
                    element.value = data[index];
                }
            });
        }

        function addNewProcess() {
            var data = getOldValue();
            addNewProcessCount++;
            var html = `
                <div id="process_${addNewProcessCount}" class="processes">
                    <input type="hidden" name="codes[]" value="-1" required readonly>
                    <input type="hidden" name="keys[]" value="processes" required readonly>
                    <div class="col-lg-12 row mt-3">
                        <div class="col-lg-8">
                            <div>
                                <label for="">{{ lang_db('Title') }}</label>
                                <input type="text" class="form-control" name="values[]" id="" value=""
                                    placeholder="{{ lang_db('Enter Title') }}">
                            </div>
                            <div>
                                <label for="">{{ lang_db('Icon') }}</label>
                                <input type="text" class="form-control" name="values[]" id="" value=""
                                    placeholder="{{ lang_db('Enter Icon') }}">
                            </div>
                            <div class="mt-3">
                                <label for="">{{ lang_db('Description') }}</label>
                                <textarea name="optional_1[]" id="" class="form-control" cols="30" rows="10"
                                    placeholder="{{ lang_db('Enter Description') }}"></textarea>
                            </div>

                        </div>
                        <div class="col-lg-2">
                            <div class="col-lg-3 btn btn-danger"
                                onclick="cancelNewProcess('${addNewProcessCount}')"
                                style="height:100%; widht:100%; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-trash-alt fa-2x"></i>
                            </div>
                        </div>
                    </div>
                `
            @foreach ($language as $item)
                @if ($item->optional_2 == 'main_language')
                    @continue
                @endif

                html += `
                        <div class="col-xl-8 mt-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h3 class="card-title font-size-16 mt-0 text-white">{{ $item->value }}</h3>
                                    <div class="card-text">
                                        <div class="col-lg-12">
                                            <label for="">{{ lang_db('Title') }}</label>
                                            <input type="text" class="form-control" name="language[{{ $item->optional_1 }}][value][]" id="" value="" placeholder="{{ lang_db('Enter Title') }}">
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for="">{{ lang_db('Description') }}</label>
                                            <textarea name="language[{{ $item->optional_1 }}][optional_1][]" id="" cols="30" rows="10" class="form-control" placeholder="{{ lang_db('Enter Description') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
            @endforeach

            html += `</div>`

            document.getElementById('processDivId').innerHTML += html;

            setOldValue(data);
        }

        function cancelNewProcess(count) {
            document.getElementById('process_' + count).remove();
        }

        function deleteProcess(code, name) {
            Swal.fire({
                title: `{{ lang_db('Are you sure') }}`,
                text: `{{ lang_db('Do you want to delete this data') }}?(${name})`,
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `{{ lang_db('Approve') }}`,
                denyButtonText: `{{ lang_db('Cancel') }}`,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open(`{{ route('admin_page', ['params' => 'settings/process/delete']) }}?code=${code}`,
                        '_self');
                }
            })
        }
    </script>
@endsection
