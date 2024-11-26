@php
    $social_medias = getCachedKeyValue(['key' => 'social_media', 'delete' => true, 'first' => false]) ?? null;
@endphp
<footer class="footer">
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
