<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Apaxy - Responsive Bootstrap 4 Admin Dashboard</title>
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
    <!-- App Css-->
    <link href="{{ route('assetFile', ['folder' => 'admin/css', 'filename' => 'app.min.css']) }}" rel="stylesheet"
        type="text/css" />

    <!-- alertifyjs Css -->
    <link
        href="{{ route('assetFile', ['folder' => 'admin/libs/alertifyjs/build/css', 'filename' => 'alertify.min.css']) }}"
        rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a href="index.html" class="logo"><img
                                src="{{ route('assetFile', ['folder' => 'admin/images', 'filename' => 'logo-light.png']) }}"
                                height="24" alt="logo"></a>
                        <h5 class="font-size-16 text-white-50 mb-4"></h5>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">{{ lang_db('Sign in to continue') }}</h5>
                                <form class="form-horizontal" action="{{ route('admin_page', ['params' => 'login']) }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-4">
                                                <label for="username">{{ lang_db('Username') }}: </label>
                                                <input type="text" class="form-control" id="username"
                                                    name="username"
                                                    placeholder="{{ lang_db('Enter username or email') }}">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="password">{{ lang_db('Password') }}: </label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="{{ lang_db('Enter password') }}">
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light"
                                                    type="submit">{{ lang_db('Log In') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/jquery', 'filename' => 'jquery.min.js']) }}"></script>
    <script
        src="{{ route('assetFile', ['folder' => 'admin/libs/bootstrap/js', 'filename' => 'bootstrap.bundle.min.js']) }}">
    </script>
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/metismenu', 'filename' => 'metisMenu.min.js']) }}">
    </script>
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/simplebar', 'filename' => 'simplebar.min.js']) }}">
    </script>

    <script src="{{ route('assetFile', ['folder' => 'admin/libs/node-waves', 'filename' => 'waves.min.js']) }}"></script>

    <!-- alertifyjs js -->
    <script src="{{ route('assetFile', ['folder' => 'admin/libs/alertifyjs/build', 'filename' => 'alertify.min.js']) }}">
    </script>

    <script src="{{ route('assetFile', ['folder' => 'admin/js', 'filename' => 'app.js']) }}"></script>

    <!--Uyarı Mesajları-->
    <script>
        @if (session('success'))
            alertify.success("{{ lang_db(session('success')) }}");
        @endif

        @if (session('error'))
            alertify.error("{{ lang_db(session('error')) }}");
        @endif

        @if (session('warning'))
            alertify.warning("{{ lang_db(session('warning')) }}");
        @endif
    </script>

</body>

</html>
