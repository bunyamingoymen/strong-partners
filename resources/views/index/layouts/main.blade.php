<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <!-- description -->
    <meta name="description" content="Becki one page html5 template for business">
    <!-- keywords -->
    <meta name="keywords"
        content="creative, fullscreen, business, photography, portfolio, one page, bootstrap responsive, start-up, ui/ux, html5, css3, studio, branding, creative design, multipurpose, parallax, personal, masonry, grid, coming soon, carousel, career">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon"
        href="{{ route('assetFile', ['folder' => 'index/assets/images', 'filename' => 'favicon.ico']) }}">

    <!-- Core Style Sheets -->
    <link rel="stylesheet"
        href="{{ route('assetFile', ['folder' => 'index/assets/css', 'filename' => 'master.css']) }}">
    <!-- Responsive Style Sheets -->
    <link rel="stylesheet"
        href="{{ route('assetFile', ['folder' => 'index/assets/css', 'filename' => 'responsive.css']) }}">
    <!-- Revolution Style Sheets -->
    <link rel="stylesheet" type="text/css"
        href="{{ route('assetFile', ['folder' => 'index/revolution/css', 'filename' => 'settings.css']) }}">
    <link rel="stylesheet" type="text/css"
        href="{{ route('assetFile', ['folder' => 'index/revolution/css', 'filename' => 'layers.css']) }}">
    <link rel="stylesheet" type="text/css"
        href="{{ route('assetFile', ['folder' => 'index/revolution/css', 'filename' => 'navigation.css']) }}">

</head>

<body>

    <!--== Loader Start ==-->
    <div id="loader-overlay">
        <div class="loader">
            <div class="spinner">
                <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle class="length" fill="none" stroke-width="8" stroke-linecap="round" cx="33"
                        cy="33" r="28"></circle>
                </svg>
                <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="8" stroke-linecap="round" cx="33" cy="33" r="28">
                    </circle>
                </svg>
                <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="8" stroke-linecap="round" cx="33" cy="33" r="28">
                    </circle>
                </svg>
                <svg viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="8" stroke-linecap="round" cx="33" cy="33" r="28">
                    </circle>
                </svg>
            </div>
        </div>
    </div>
    <!--== Loader End ==-->

    <!--== Wrapper Start ==-->
    <div class="wrapper">

        <!--== Header Start ==-->
        @include('index.layouts.header')
        <!--== Header End ==-->

        @yield('index_body')

        <!--== Footer Start ==-->
        @include('index.layouts.footer')
        <!--== Footer End ==-->

        <!--== Go to Top  ==-->
        <a href="javascript:" id="return-to-top"><i class="icofont icofont-arrow-up"></i></a>
        <!--== Go to Top End ==-->

    </div>
    <!--== Wrapper End ==-->

    <!--== Javascript Plugins ==-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJNGOwO2hJpJ9kz8e0UUPjZhEbgDJTTXE"></script>
    <script src="{{ route('assetFile', ['folder' => 'index/assets/js', 'filename' => 'jquery.min.js']) }}"></script>
    <script src="{{ route('assetFile', ['folder' => 'index/assets/js', 'filename' => 'smoothscroll.js']) }}"></script>
    <script src="{{ route('assetFile', ['folder' => 'index/assets/js', 'filename' => 'plugins.js']) }}"></script>
    <script src="{{ route('assetFile', ['folder' => 'index/assets/js', 'filename' => 'master.js']) }}"></script>

    <!-- Revolution js Files -->
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'jquery.themepunch.tools.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'jquery.themepunch.revolution.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.actions.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.carousel.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.kenburn.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.layeranimation.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.migration.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.navigation.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.parallax.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.slideanims.min.js']) }}">
    </script>
    <script
        src="{{ route('assetFile', ['folder' => 'index/revolution/js', 'filename' => 'revolution.extension.video.min.js']) }}">
    </script>
    <!--== Javascript Plugins End ==-->

</body>

</html>
