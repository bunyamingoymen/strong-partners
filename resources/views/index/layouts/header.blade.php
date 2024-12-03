@php
    $home_logo_white = getCachedKeyValue(['key' => 'logos', 'value' => 'Home Logo White', 'first' => true]) ?? null;
    $home_logo_dark = getCachedKeyValue(['key' => 'logos', 'value' => 'Home Logo Dark', 'first' => true]) ?? null;

    $headers = App\Models\Main\Menu::where('delete', 0)->where('active', 1)->where('type', 'header')->get();
@endphp
<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full">
    <!--== End Top Search ==-->
    <div class="container">

        <!--== Start Header Navigation ==-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i
                    class="tr-icon ion-android-menu"></i> </button>
            <div class="logo"> <a href="{{ route('index.index') }}"> <img class="logo logo-display"
                        src="{{ !is_null($home_logo_white) && $home_logo_white->optional_5 ? asset($home_logo_white->optional_5) : '' }}"
                        alt=""> <img class="logo logo-scrolled"
                        src="{{ !is_null($home_logo_dark) && $home_logo_dark->optional_5 ? asset($home_logo_dark->optional_5) : '' }}"
                        alt=""> </a> </div>
        </div>
        <!--== End Header Navigation ==-->

        <!--== Collect the nav links, forms, and other content for toggling ==-->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-center" data-in="fadeIn" data-out="fadeOut">
                <li><a class="page-scroll" href="{{ route('index.index') }}">{{ lang_db('Home', 1) }}</a></li>
                @foreach ($headers as $header)
                    <li>
                        <a class="page-scroll" href="{{ url($header->path) }}">{{ lang_db($header->title, -1) }}</a>
                    </li>
                @endforeach
                <li><a href="{{ route('user.login') }}" class="">Giriş Yap</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
        <!--== /.navbar-collapse ==-->
    </div>

</nav>
