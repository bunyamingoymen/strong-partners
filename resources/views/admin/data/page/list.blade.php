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
                    <div class="col-lg-12" style="display: inline-block;">
                        <a class="btn btn-primary mb-3" style="float: right;"
                            href="{{ route('admin_page', ['params' => 'page/edit']) }}">
                            <i class="mdi mdi-plus-circle-outline"></i> Yeni
                        </a>
                    </div>

                    <div class="ag-theme-quartz mt-2 mb-2" style="height: 500px;" id="myGrid"></div>

                    <div id="paginate"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ route('assetFile', ['folder' => 'admin/libs/jquery', 'filename' => 'jquery.min.js']) }}"></script>

    <script src="{{ route('assetFile', ['folder' => 'admin/js', 'filename' => 'pageTable.js']) }}"></script>

    <!-- Sayfa Değiştirme Scripti-->
    <script>
        function changePage(page) {
            var pageData = {
                page: page,
                type: {{ $type }}
            }
            if (showingCount && showingCount != 10) {
                pageData.showingCount = showingCount;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: `{{ route('admin_page', ['params' => $params]) }}`,
                data: pageData,
                success: function(response) {
                    var id = page <= 1 ? 1 : (page - 1) * showingCount + 1;
                    rowData = [];
                    var categories = response.categories;
                    var page_count = response.page_count;
                    for (let i = 0; i < categories.length; i++) {
                        var rowItem = {
                            id: id++,
                            code: sendData(categories[i].code),
                            name: sendData(categories[i].name),
                            description: sendData(categories[i].description),
                        }

                        rowData.push(rowItem);
                    }

                    getOtherData(page_count, page);

                }
            });

        }
    </script>

    <!--Ag-gird Komutları-->
    <script>
        var columnDefs = [{
                headerName: "#",
                field: "id",
                maxWidth: 75,
            },
            {
                headerName: "{{ lang_db('Title') }}",
                field: "name",
            },

            {
                headerName: "{{ lang_db('Actions') }}",
                field: "action",
                cellRenderer: function(params) {
                    var html = `<div class="row" style="justify-content: center;">`

                    html += `<div class="mr-2 ml-2">
                                    <a class="btn btn-warning btn-sm" href="#?code=${params.data.code}" data-toggle="tooltip" data-placement="right" title="{{ lang_db('Update') }}"><i class="fas fa-edit"></i></a>
                                </div>`

                    html += `<div class="mr-2 ml-2">
                                    <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="deleteCategory(${params.data.code}, '${params.data.name}')" data-toggle="tooltip" data-placement="right" title="{{ lang_db('Delete') }}"><i class="fas fa-trash-alt"></i></a>
                                </div>`

                    html += `</div>`;

                    return html;
                },
                filter: false,
                cellEditorPopup: true,
                cellEditor: 'agSelectCellEditor',
                maxWidth: 125,
                minWidth: 125,
            },

        ]
        gridOptionsData(columnDefs);
        changePage(1);
    </script>
@endsection
