@php
    $home_logo_white = getCachedKeyValue(['key' => 'logos', 'value' => 'Home Logo White', 'first' => true]) ?? null;
    $home_logo_dark = getCachedKeyValue(['key' => 'logos', 'value' => 'Home Logo Dark', 'first' => true]) ?? null;
@endphp
<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full">
    <!--== Start Top Search ==-->
    <div class="fullscreen-search-overlay" id="search-overlay"> <a href="#" class="fullscreen-close"
            id="fullscreen-close-button"><i class="icofont icofont-close"></i></a>
        <div id="fullscreen-search-wrapper">
            <form method="get" id="fullscreen-searchform">
                <input type="text" value="" placeholder="Type and hit Enter..." id="fullscreen-search-input"
                    class="search-bar-top">
                <i class="fullscreen-search-icon icofont icofont-search">
                    <input value="" type="submit">
                </i>
            </form>
        </div>
    </div>
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
                <li><a class="page-scroll" href="{{ route('index.products') }}">{{ lang_db('Products', 1) }}</a></li>
                <li><a class="page-scroll" href="{{ route('index.blogs') }}">{{ lang_db('Blog', 1) }}</a></li>
                <li><a class="page-scroll"
                        href="{{ route('index.blog.detail', ['pageCode' => 'about']) }}">{{ lang_db('About', 1) }}</a>
                </li>
                <li><a class="page-scroll" href="{{ route('index.contact') }}">{{ lang_db('Contact', 1) }}</a></li>
            </ul>
        </div>
        <!--== /.navbar-collapse ==-->
    </div>

</nav>
