@extends('index.layouts.main')
@section('index_body')
    @php
        if ($page->type == 1) {
            $title = 'Blog';
        } elseif ($page->type == 2) {
            $title = 'Page';
        } else {
            $title = 'Supplier';
        }
    @endphp
    <!--== Page Title Start ==-->
    <div class="transition-none">
        <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/title-bg/title-bg-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center white-color">
                            <h1 class="raleway-font font-300">{{ lang_db($title, 1) }}</h1>
                            <div class="breadcrumb mt-20">
                                <!-- Breadcrumb Start -->
                                <ul>
                                    <li><a href="{{ route('index.index') }}">{{ lang_db('Home', 1) }}</a></li>
                                    <li>{{ lang_db($title, 1) }}</li>
                                </ul>
                                <!-- Breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!--== Page Title End ==-->

    <!--== Blog Details Start ==-->
    <section class="white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 xs-mb-50">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-50">
                            <div class="post">
                                @if (file_exists($page->image))
                                    <div class="blog-grid-slider slick">
                                        <div class="item"><img class="img-responsive"
                                                src="{{ $page->image ? asset($page->image) : '' }}" alt="" /></div>
                                        <div class="item"><img class="img-responsive"
                                                src="{{ $page->image ? asset($page->image) : '' }}" alt="" /></div>
                                    </div>
                                @endif
                                <div class="post-info all-padding-40 bordered">
                                    <h3 class="font-20px text-uppercase">{{ $page->title ? lang_db($page->title) : '' }}
                                    </h3>
                                    <h6>{{ $page->created_at ? $page->created_at->format('F d, Y') : '' }}</h6>
                                    <hr>
                                    <p class="font-16px">{!! $page->description ? lang_db($page->description) : '' !!}</p>
                                </div>
                            </div>
                        </div>
                        <!--== Post End ==-->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--== Blog Details End ==-->
@endsection
