<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Starter Page | Apaxy - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ route('assetFile', ['folder' => 'admin/images', 'filename' => 'favicon.ico']) }}">

    <!-- Bootstrap Css -->
    <link href="{{ route('assetFile', ['folder' => 'admin/css', 'filename' => 'bootstrap.min.css']) }}" rel="stylesheet"
        type="text/css" />

    <!-- Icons Css -->
    <link href="{{ route('assetFile', ['folder' => 'admin/css', 'filename' => 'icons.min.css']) }}" rel="stylesheet"
        type="text/css" />

    <!-- alertifyjs Css -->
    <link
        href="{{ route('assetFile', ['folder' => 'admin/libs/alertifyjs/build/css', 'filename' => 'alertify.min.css']) }}"
        rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ route('assetFile', ['folder' => 'admin/css', 'filename' => 'app.min.css']) }}" rel="stylesheet"
        type="text/css" />

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layouts.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">{{ $title }}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apaxy</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter Page</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div>
                        @yield('admin_index_body')
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            @include('admin.layouts.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/jquery', 'filename' => 'jquery.min.js']) }}"></script>

    <script
        src="{{ route('assetFile', ['folder' => 'admin/libs/bootstrap/js', 'filename' => 'bootstrap.bundle.min.js']) }}">
    </script>

    <script src="{{ route('assetFile', ['folder' => 'admin/libs/metismenu', 'filename' => 'metisMenu.min.js']) }}"></script>
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/simplebar', 'filename' => 'simplebar.min.js']) }}"></script>
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/node-waves', 'filename' => 'waves.min.js']) }}"></script>

    <!-- alertifyjs js -->
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/alertifyjs/build', 'filename' => 'alertify.min.js']) }}">
    </script>

    <script src="{{ route('assetFile', ['folder' => 'admin/js', 'filename' => 'app.js']) }}"></script>

    <!--Uyarı Mesajları-->
    <script>
        $(document).ready(function() {

            @if (session('success'))
                alertify.success("{{ lang_db(session('success')) }}");
            @endif

            @if (session('error'))
                alertify.error("{{ lang_db(session('error')) }}");
            @endif

            @if (session('warning'))
                alertify.warning("{{ lang_db(session('warning')) }}");
            @endif
        });
    </script>

</body>

</html>
