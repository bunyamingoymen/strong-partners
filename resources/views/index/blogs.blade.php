@extends('index.layouts.main')
@section('index_body')
    <style>
        .img-responsive {
            width: 100%;
            height: 350px;
            /* İstediğiniz sabit yüksekliği belirleyin */

            object-fit: contain;
            /* Resmi sıkıştırmadan alana sığdırır */
            background-color: #f0f0f0;
            /* Boş kalan alan için arka plan rengi (isteğe bağlı) */
        }
    </style>
    <!--== Page Title Start ==-->
    <div class="transition-none">
        <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/title-bg/title-bg-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center white-color">
                            <h1 class="raleway-font font-300">{{ lang_db('Blog', 1) }}</h1>
                            <div class="breadcrumb mt-20">
                                <!-- Breadcrumb Start -->
                                <ul>
                                    <li><a href="{{ route('index.index') }}">{{ lang_db('Home', 1) }}</a></li>
                                    <li>{{ lang_db('Blog', 1) }}</li>
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

    <!--== Blog Classic Post Start ==-->
    <section class="grey-bg">
        <div class="container">
            <div class="row blog-style-01">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-30">
                        <div class="post">
                            <div class="post-img"> <img class="img-responsive" src="{{ url($blog->image) }}"
                                    alt="" /> </div>
                            <div class="post-info all-padding-40">
                                <h3><a href="blog-grid.html">{{ lang_db($blog->title, -1) }}</a></h3>
                                <h6>{{ $blog->created_at->format('F d, Y') }}</h6>
                                <hr>
                                <a class="readmore" href="#"><span>{{ lang_db('Read More') }}</span></a>
                            </div>
                        </div>
                    </div>
                    <!--== Post End ==-->
                @endforeach

            </div>

            <div class="row mt-100">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="pagination text-uppercase dark-color">
                            <ul>
                                @if ($blogs->currentPage() > 1)
                                    <li><a href="{{ $blogs->url($blogs->currentPage() - 1) }}"><i
                                                class="icofont icofont-long-arrow-left mr-5 xs-display-none"></i> Prev</a>
                                    </li>
                                @endif

                                @if ($blogs->currentPage() > 3)
                                    <li><a href="{{ $blogs->url(1) }}">1</a></li>
                                    <li><a href="#">...</a></li>
                                @endif

                                @for ($i = max(1, $blogs->currentPage() - 2); $i <= min($blogs->lastPage(), $blogs->currentPage() + 2); $i++)
                                    <li class="{{ $i == $blogs->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($blogs->currentPage() < $blogs->lastPage() - 2)
                                    <li><a href="#">...</a></li>
                                    <li><a href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a></li>
                                @endif

                                @if ($blogs->currentPage() < $blogs->lastPage())
                                    <li><a href="{{ $blogs->url($blogs->currentPage() + 1) }}">Next <i
                                                class="icofont icofont-long-arrow-right ml-5 xs-display-none"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!--== Blog Classic Post End ==-->
@endsection
