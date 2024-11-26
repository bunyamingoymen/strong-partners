@extends('index.layouts.main')
@section('index_body')
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

    <!--== Blog Details Start ==-->
    <section class="white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 xs-mb-50">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-50">
                            <div class="post">
                                <div class="blog-grid-slider slick">
                                    <div class="item"><img class="img-responsive" src="assets/images/post/post-02.jpg"
                                            alt="" /></div>
                                    <div class="item"><img class="img-responsive" src="assets/images/post/post-03.jpg"
                                            alt="" /></div>
                                    <div class="item"><img class="img-responsive" src="assets/images/post/post-04.jpg"
                                            alt="" /></div>
                                </div>
                                <div class="post-info all-padding-40 bordered">
                                    <h3 class="font-20px text-uppercase"><a href="blog-grid.html">8 Colorful Toys Designed
                                            to Spark the Imagination</a></h3>
                                    <h6>Post on April 19, 2014</h6>
                                    <hr>
                                    <p class="font-16px">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book.</p>


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
