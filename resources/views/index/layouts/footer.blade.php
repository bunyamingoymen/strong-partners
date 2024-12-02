@php
    $social_medias = getCachedKeyValue(['key' => 'social_media', 'delete' => true, 'first' => false]) ?? null;
    $footer_one =
        getCachedKeyValue([
            'key' => 'show_footer',
            'optional_2' => '1',
            'first' => false,
            'orderBy' => 'optional_1',
            'orderByType' => 'ASC',
            'refreshCache' => true,
        ]) ?? null;

    $footer_two =
        getCachedKeyValue([
            'key' => 'show_footer',
            'optional_2' => '2',
            'first' => false,
            'orderBy' => 'optional_1',
            'orderByType' => 'ASC',
            'refreshCache' => true,
        ]) ?? null;

    $footer_three =
        getCachedKeyValue([
            'key' => 'show_footer',
            'optional_2' => '3',
            'first' => false,
            'orderBy' => 'optional_1',
            'orderByType' => 'ASC',
            'refreshCache' => true,
        ]) ?? null;

    $footer_four =
        getCachedKeyValue([
            'key' => 'show_footer',
            'optional_2' => '4',
            'first' => false,
            'orderBy' => 'optional_1',
            'orderByType' => 'ASC',
            'refreshCache' => true,
        ]) ?? null;
@endphp
<footer class="footer">
    @if (
        ($footer_one && $footer_one->isNotEmpty()) ||
            ($footer_two && $footer_two->isNotEmpty()) ||
            ($footer_three && $footer_three->isNotEmpty()) ||
            ($footer_four && $footer_four->isNotEmpty()))
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    @if ($footer_one)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget">
                                <ul class="footer-links">
                                    @foreach ($footer_one as $foo)
                                        <li><a
                                                href="{{ route('index.blog.detail', ['pageCode' => $foo->value]) }}">{{ lang_db($foo->optional_3) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    @if ($footer_two)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget">
                                <ul class="footer-links">
                                    @foreach ($footer_two as $foo)
                                        <li><a
                                                href="{{ route('index.blog.detail', ['pageCode' => $foo->value]) }}">{{ lang_db($foo->optional_3) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($footer_three)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget">
                                <ul class="footer-links">
                                    @foreach ($footer_three as $foo)
                                        <li><a
                                                href="{{ route('index.blog.detail', ['pageCode' => $foo->value]) }}">{{ lang_db($foo->optional_3) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($footer_four)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget">
                                <ul class="footer-links">
                                    @foreach ($footer_four as $foo)
                                        <li><a
                                                href="{{ route('index.blog.detail', ['pageCode' => $foo->value]) }}">{{ lang_db($foo->optional_3) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="copy-right text-left">© 2024 {{ env('APP_NAME') }}. All rights reserved</div>
                </div>
                @if (isset($social_medias) && $social_medias->isNotEmpty())
                    <div class="col-md-6 col-xs-12">
                        <ul class="social-media">
                            @foreach ($social_medias as $media)
                                @if ($media->value == '' || is_null($media->value))
                                    @continue;
                                @endif
                                <li>
                                    <a href="{{ $media->value ?? '#' }}" class="">
                                        <i class="{{ $media->optional_4 ?? '' }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
</footer>
