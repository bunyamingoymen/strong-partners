@extends('index.layouts.main')
@section('index_body')
    <!--== Hero Slider Start ==-->
    <section class="remove-padding relative view-height-100vh white-bg" id="home">
        <div class="parallax-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 display-table view-height-100vh">
                    <div class="v-align-middle text-center">
                        <div class="white-color text-center">
                            <h4 class="font-700 font-40px line-height-40">One Page Parallax</h4>
                            <p class="mt-30">
                                <a class="btn btn-lg btn-light btn-circle">{{ lang_db('About Us') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <video autoplay="" muted="" loop="" controls="" class="html5-video">
            <source src="{{ $backgrouds->first()->optional_5 ?? '' }}" type="video/mp4">
        </video>
    </section>
    <!--== Hero Slider End ==-->

    <!--== About Start ==-->
    <section class="gray-bg" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">We Are Becki</h2>
                        <h1 class="raleway-font">About Company</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-md-7 col-xs-12">
                    <img class="img-responsive" src="assets/images/responsive-screen.png" alt="">
                </div>
                <div class="col-md-5 mt-30 col-xs-12">
                    <div class="skillbar-wrap skillbar-style-01">
                        <div class="skillbar" data-percent="70">
                            <span class="skillbar-title text-uppercase">HTML5 Expertise</span>
                            <p class="skillbar-bar gradient-bg-two"></p>
                            <span class="skill-bar-percent">70%</span>
                        </div>
                        <!-- End Skill Bar -->

                        <div class="skillbar" data-percent="66">
                            <span class="skillbar-title text-uppercase">jQuery Expertise</span>
                            <p class="skillbar-bar gradient-bg-two"></p>
                            <span class="skill-bar-percent">66%</span>
                        </div>
                        <!-- End Skill Bar -->

                        <div class="skillbar" data-percent="85">
                            <span class="skillbar-title text-uppercase">WordPress Expertise</span>
                            <p class="skillbar-bar gradient-bg-two"></p>
                            <span class="skill-bar-percent">85%</span>
                        </div>
                        <!-- End Skill Bar -->

                        <div class="skillbar" data-percent="30">
                            <span class="skillbar-title text-uppercase">PHP Expertise</span>
                            <p class="skillbar-bar gradient-bg-two"></p>
                            <span class="skill-bar-percent">30%</span>
                        </div>
                        <!-- End Skill Bar -->

                        <div class="skillbar" data-percent="99">
                            <span class="skillbar-title text-uppercase">User Interface Expertise</span>
                            <p class="skillbar-bar gradient-bg-two"></p>
                            <span class="skill-bar-percent">99%</span>
                        </div>
                        <!-- End Skill Bar -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== About End ==-->

    <!--=== What We Do Start ======-->
    <section class="white-bg lg-section xs-pb-100 xs-pt-100" id="feature">
        <div class="col-md-6 col-sm-6 bg-flex bg-flex-right">
            <div class="bg-flex-holder bg-flex-cover" style="background-image: url(assets/images/bg-right-img.jpg);"></div>
        </div>
        <div class="container">
            <div class="col-md-5 col-sm-6">
                <div class="section-title mb-50">
                    <h2 class="raleway-font secondary-color mt-0 font-20px">What We Do</h2>
                    <h1 class="raleway-font mt-0 font-50px font-300">We Are Digital</h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                    semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                    elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                <p class="mt-30 mb-0"><a class="btn btn-lg btn-gradient-secondary btn-circle">Read more</a></p>
            </div>
        </div>
    </section>
    <!--=== What We Do End ======-->

    <!--=== About Us Start ======-->
    <section class="white-bg lg-section xs-pt-100 xs-pb-100">
        <div class="col-md-6 col-sm-6 bg-flex bg-flex-left">
            <div class="bg-flex-holder bg-flex-cover" style="background-image: url(assets/images/bg-left-img.jpg);">
            </div>
        </div>
        <div class="container">
            <div class="col-md-5 col-sm-6 col-md-offset-7 col-sm-offset-6">
                <div class="section-title mb-50">
                    <h2 class="raleway-font secondary-color mt-0 font-20px">About Us</h2>
                    <h1 class="raleway-font mt-0 font-50px font-300">We Are Partners</h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                    semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                    elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                <p class="mt-30 mb-0"><a class="btn btn-lg btn-gradient-primary btn-circle">Read more</a></p>
            </div>
        </div>
    </section>
    <!--=== About Us End ======-->

    <!--== Our Process Start ==-->
    <section class="gradient-bg-two pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb-50 white-color text-center">
                        <h1 class="raleway-font mt-0 font-50px font-300">Our Process</h1>
                    </div>
                </div>
            </div>
            <div class="row our-process-style-02">
                <div class="col-md-3 col-sm-6 col-xs-12 line xs-mb-30 sm-mb-30">
                    <div class="icon-wrap white-bg">
                        <div class="icon">
                            <i class="icon-tools secondary-color font-30px"></i>
                        </div>
                    </div>
                    <div class="text-center white-color">
                        <h4 class="font-500">Design</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit. Proin ut tempor
                            nisl sit amet tincidunt orci.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 line xs-mb-30 sm-mb-30">
                    <div class="icon-wrap white-bg">
                        <div class="icon">
                            <i class="icon-globe secondary-color font-30px"></i>
                        </div>
                    </div>
                    <div class="text-center white-color">
                        <h4 class="font-500">Development</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit. Proin ut tempor
                            nisl sit amet tincidunt orci.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 line xs-mb-30">
                    <div class="icon-wrap white-bg">
                        <div class="icon">
                            <i class="icon-mobile secondary-color font-30px"></i>
                        </div>
                    </div>
                    <div class="text-center white-color">
                        <h4 class="font-500">Testing</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit. Proin ut tempor
                            nisl sit amet tincidunt orci.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 line xs-mb-30">
                    <div class="icon-wrap white-bg">
                        <div class="icon">
                            <i class="icon-browser secondary-color font-30px"></i>
                        </div>
                    </div>
                    <div class="text-center white-color">
                        <h4 class="font-500">Live</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit. Proin ut tempor
                            nisl sit amet tincidunt orci.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Our Process End ==-->

    <!--== Who We Are Start ==-->
    <section class="white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-23 text-left sm-mt-0">
                    <div class="section-title mb-50">
                        <h2 class="raleway-font secondary-color mt-0">Becki is creative one page template</h2>
                        <h1 class="raleway-font mt-0 font-50px font-300">Our Awesome <span
                                class="type-it secondary-color"><i class="ti-placeholder"
                                    style="display:inline-block;line-height:0;visibility:hidden;overflow:hidden;">.</i><span
                                    style="display:inline;position:relative;font:inherit;color:inherit;"
                                    class="ti-container">desig</span><span
                                    style="display: inline; position: relative; font: inherit; color: inherit; opacity: 0.0106235;"
                                    class="ti-cursor">|</span></span></h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                    <p class="mt-30 mb-0"><a class="btn btn-lg btn-gradient-secondary btn-circle">Read more</a>
                    </p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="responsive-screen mt-0">
                        <img src="assets/images/laptop.png" class="img-responsive" alt="laptop">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Who We Are End ==-->

    <!--== Team Start ==-->
    <section class="grey-bg" id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">Meet Ninjas</h2>
                        <h1 class="raleway-font">Our Creative Team</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>

            <div class="row mt-50">
                <div class="col-md-3 col-sm-6 col-xs-12 sm-mb-30 xs-mb-30">
                    <div class="team-member">
                        <div class="team-thumb">
                            <div class="thumb-overlay"></div>
                            <img src="assets/images/team/team-1.jpg" alt="">
                            <div class="member-info text-center gradient-bg-two">
                                <h3>Tom Bills</h3>
                                <span class="title">Web Designer</span>
                                <ul class="social-link list-inline">
                                    <li><a href="#" class="facebook"><i
                                                class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i
                                                class="icofont icofont-social-twitter"></i></a></li>
                                    <li><a href="#" class="pinterest"><i
                                                class="icofont icofont-social-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== Member End ==-->
                <div class="col-md-3 col-sm-6 col-xs-12 sm-mb-30 xs-mb-30">
                    <div class="team-member">
                        <div class="team-thumb">
                            <div class="thumb-overlay"></div>
                            <img src="assets/images/team/team-2.jpg" alt="">
                            <div class="member-info text-center gradient-bg">
                                <h3>Sara Adams</h3>
                                <span class="title">CEO of Becki Agency</span>
                                <ul class="social-link list-inline">
                                    <li><a href="#" class="facebook"><i
                                                class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i
                                                class="icofont icofont-social-twitter"></i></a></li>
                                    <li><a href="#" class="pinterest"><i
                                                class="icofont icofont-social-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== Member End ==-->
                <div class="col-md-3 col-sm-6 col-xs-12 sm-mb-30 xs-mb-30">
                    <div class="team-member">
                        <div class="team-thumb">
                            <div class="thumb-overlay"></div>
                            <img src="assets/images/team/team-3.jpg" alt="">
                            <div class="member-info text-center gradient-bg-two">
                                <h3>Enzo William</h3>
                                <span class="title">Photographer</span>
                                <ul class="social-link list-inline">
                                    <li><a href="#" class="facebook"><i
                                                class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i
                                                class="icofont icofont-social-twitter"></i></a></li>
                                    <li><a href="#" class="pinterest"><i
                                                class="icofont icofont-social-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="team-member">
                        <div class="team-thumb">
                            <div class="thumb-overlay"></div>
                            <img src="assets/images/team/team-1.jpg" alt="">
                            <div class="member-info text-center gradient-bg-two">
                                <h3>Tom Bills</h3>
                                <span class="title">Web Designer</span>
                                <ul class="social-link list-inline">
                                    <li><a href="#" class="facebook"><i
                                                class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i
                                                class="icofont icofont-social-twitter"></i></a></li>
                                    <li><a href="#" class="pinterest"><i
                                                class="icofont icofont-social-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== Member End ==-->
            </div>
        </div>
    </section>
    <!--== Team End ==-->

    <!--== Services Start ==-->
    <section class="white-bg" id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">What We Offer</h2>
                        <h1 class="raleway-font">Our Services</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>

            <div class="row mt-50">
                <div class="col-md-4 col-sm-4 col-xs-12 mb-30 feature-box text-center">
                    <div class="gradient-bg-icon-two mb-20">
                        <i class="icon-tools font-30px white-color"></i>
                    </div>
                    <h5 class="mt-10">Branding</h5>
                    <p class="font-400">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                        consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 mb-30 feature-box text-center">
                    <div class="gradient-bg-icon-two mb-20">
                        <i class="icon-linegraph font-30px white-color"></i>
                    </div>
                    <h5 class="mt-10">Marketing</h5>
                    <p class="font-400">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                        consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 mb-30 feature-box text-center">
                    <div class="gradient-bg-icon-two mb-20">
                        <i class="icon-globe font-30px white-color"></i>
                    </div>
                    <h5 class="mt-10">Development</h5>
                    <p class="font-400">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                        consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 xs-mb-30 feature-box text-center">
                    <div class="gradient-bg-icon-two mb-20">
                        <i class="icon-tools font-30px white-color"></i>
                    </div>
                    <h5 class="mt-10">Web Design</h5>
                    <p class="font-400">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                        consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 xs-mb-30 feature-box text-center">
                    <div class="gradient-bg-icon-two mb-20">
                        <i class="icon-beaker font-30px white-color"></i>
                    </div>
                    <h5 class="mt-10">Social Media</h5>
                    <p class="font-400">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                        consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 feature-box text-center">
                    <div class="gradient-bg-icon-two mb-20">
                        <i class="icon-layers font-30px white-color"></i>
                    </div>
                    <h5 class="mt-10">Research</h5>
                    <p class="font-400">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                        consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                </div>
            </div>

        </div>
    </section>
    <!--== Services End ==-->

    <!--== About Company Start ==-->
    <section class="gradient-bg-two xs-pb-60">
        <div class="col-md-6 col-sm-6 bg-flex bg-flex-left">
            <div class="bg-flex-holder bg-flex-cover" style="background-image: url(assets/images/bg-left-img-2.jpg);">
                <div class="video-box_overlay">
                    <div class="center-layout">
                        <div class="v-align-middle"> <a class="popup-youtube"
                                href="https://www.youtube.com/watch?v=sU3FkzUKHXU">
                                <div class="play-button"><i class="tr-icon ion-android-arrow-dropright"></i></div>
                            </a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-6 col-sm-6 col-md-offset-6 col-sm-offset-6">
                <div class="col-inner spacer white-color text-center">
                    <h2 class="raleway-font mt-0 font-20px xs-font-17px">Our Amazing Story</h2>
                    <h1 class="raleway-font mt-0 font-50px font-300 xs-font-27px">Watch Our Video</h1>
                    <p>Objectively innovate empowered manufactured products whereas parallel platforms.<br>
                        Holisticly predominate extensible testing procedures for reliable supply chains. </p>
                    <p><a href="#." class="btn btn-md btn-circle btn-light-outline mt-30">Meet The Team</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--== About Company End ==-->

    <!--== Portfolio Start ==-->
    <section class="grey-bg" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">Show Your Project Gallery</h2>
                        <h1 class="raleway-font">Our Awesome Portfolio</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-50">
                <div class="col-md-12">
                    <div id="portfolio-gallery" class="cbp">
                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/10.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Old Book</h3>
                                                <p>Branding, Mockup</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/11.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Fashion Shop</h3>
                                                <p>Branding, UI/UX</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/12.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Sydney Design</h3>
                                                <p>Design, Stationery</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/13.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Brown Bag</h3>
                                                <p>Branding, UI/UX</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/14.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Hungry Beast</h3>
                                                <p>Design, Branding</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/15.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Flyer</h3>
                                                <p>Branding, Stationery</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/16.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Material</h3>

                                                <p>Design, UI/UX</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="cbp-item col-md-3 col-sm-6 with-spacing">
                            <div class="portfolio-item border-white-15">
                                <a href="#">
                                    <img src="assets/images/portfolio/grid/17.jpg" alt="">
                                    <div class="portfolio-info gradient-bg-two">
                                        <div class="centrize">
                                            <div class="v-center white-color">
                                                <h3>Fode</h3>
                                                <p>Branding, UI/UX</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--== Portfolio End ==-->

    <!--== Video Start ==-->
    <section class="parallax-bg fixed-bg" data-parallax-bg-image="assets/images/background/parallax-bg-2.jpg"
        data-parallax-speed="0.5" data-parallax-direction="up">
        <div class="gradient-overlay-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center parallax-content height-400px">
                    <div class="center-layout">
                        <div class="v-align-middle">
                            <h1 class="font-400 white-color raleway-font xs-font-40px">We Make Themes That Solve
                                Problems. Sometimes We Tell Stories.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Video End ==-->

    <!--== Pricing Table Start ==-->
    <section class="grey-bg transition-none" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title mb-50">
                        <h2 class="raleway-font secondary-color">Select Your Plan</h2>
                        <h1 class="raleway-font">Our Pricing Table</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-md-4 pricing-table col-sm-4 xs-mb-30">
                    <div class="pricing-box pricing-box-gradient-two text-center white-color">
                        <h3 class="mb-0 raleway-font">Basic Plan</h3>
                        <h4>An affordable option for end-to-end hiring at small companies.</h4>
                        <h2 class="font-60px sm-font-50px"><sup>$</sup><span>9.99</span></h2>
                        <ul class="list-style-02">
                            <li>Mobile-Optimized Website</li>
                            <li>Powerful Website Metrics</li>
                            <li>Free Custom Domain</li>
                            <li>24/7 Customer Support</li>
                            <li>Fully Integrated E-Commerce</li>
                            <li>Sell Unlimited Products &amp; Accept Donations</li>
                            <li class="not-available">No CMS items</li>
                            <li class="not-available">No site search</li>
                            <li class="not-available">No CMS API access</li>
                            <li class="not-available">No content editors</li>
                        </ul>
                        <div class="pricing-box-bottom"> <a class="btn btn-dark btn-md btn-default btn-circle">Get
                                Started</a> </div>
                    </div>
                </div>

                <div class="col-md-4 pricing-table col-sm-4 xs-mb-30">
                    <div class="pricing-box pricing-box-gradient text-center white-color">
                        <h3 class="mb-0 raleway-font">Standard Plan</h3>
                        <h4>An affordable option for end-to-end hiring at small companies.</h4>
                        <h2 class="font-60px sm-font-50px"><sup>$</sup><span>16.99</span></h2>
                        <div class="pricicng-feature">
                            <ul class="list-style-02">
                                <li>Mobile-Optimized Website</li>
                                <li>Powerful Website Metrics</li>
                                <li>Free Custom Domain</li>
                                <li>24/7 Customer Support</li>
                                <li>Fully Integrated E-Commerce</li>
                                <li>Sell Unlimited Products &amp; Accept Donations</li>
                                <li>No CMS items</li>
                                <li>No site search</li>
                                <li class="not-available">No CMS API access</li>
                                <li class="not-available">No content editors</li>
                            </ul>
                        </div>
                        <div class="pricing-box-bottom"> <a class="btn btn-dark btn-md btn-default btn-circle">Get
                                Started</a> </div>
                    </div>
                </div>

                <div class="col-md-4 pricing-table col-sm-4">
                    <div class="pricing-box pricing-box-gradient-two text-center white-color">
                        <h3 class="mb-0 raleway-font">Extended Plan</h3>
                        <h4>An affordable option for end-to-end hiring at small companies.</h4>
                        <h2 class="font-60px sm-font-50px"><sup>$</sup><span>24.99</span></h2>
                        <ul class="list-style-02">
                            <li>Mobile-Optimized Website</li>
                            <li>Powerful Website Metrics</li>
                            <li>Free Custom Domain</li>
                            <li>24/7 Customer Support</li>
                            <li>Fully Integrated E-Commerce</li>
                            <li>Sell Unlimited Products &amp; Accept Donations</li>
                            <li>No CMS items</li>
                            <li>No site search</li>
                            <li>No CMS API access</li>
                            <li>No content editors</li>
                        </ul>
                        <div class="pricing-box-bottom"> <a class="btn btn-dark btn-md btn-default btn-circle">Get
                                Started</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Pricing Table End ==-->

    <!--== Testimonails Start ==-->
    <section class="white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title mb-50">
                        <h2 class="raleway-font secondary-color">What Our Client Says</h2>
                        <h1 class="raleway-font">Our Testimonials</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>
            <div class="row">
                <div class="slick testimonial gradient-bullet-two">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--== Slide ==-->
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <img class="img-responsive img-circle text-center" src="assets/images/team/avatar-1.jpg"
                                    alt="avatar-1" />
                                <h4 class="font-600 mb-0 raleway-font">Anne McAdams</h4>
                                <span class="secondary-color font-14px">CEO / Founder</span>
                                <div class="clearfix mb-20"></div>
                                <i class="icofont icofont-quote-left font-50px secondary-color mt-20"></i>
                                <p class="mt-20 line-height-26 font-14px">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Donec sodales nec nulla ac aliquet. Duis vel nunc eget.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--== Slide ==-->
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <img class="img-responsive img-circle text-center" src="assets/images/team/avatar-2.jpg"
                                    alt="avatar-2" />
                                <h4 class="font-600 mb-0 raleway-font">Jared Kane</h4>
                                <span class="secondary-color font-14px">CEO / Founder</span>
                                <div class="clearfix mb-20"></div>
                                <i class="icofont icofont-quote-left font-50px secondary-color mt-20"></i>
                                <p class="mt-20 line-height-26 font-14px">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Donec sodales nec nulla ac aliquet. Duis vel nunc eget.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--== Slide ==-->
                        <div class="testimonial-item">
                            <div class="testimonial-content"> <img class="img-responsive img-circle"
                                    src="assets/images/team/avatar-3.jpg" alt="avatar-1" />
                                <h4 class="font-600 mb-0 raleway-font">Nani Wale</h4>
                                <span class="secondary-color font-14px">CEO / Founder</span>
                                <div class="clearfix mb-20"></div>
                                <i class="icofont icofont-quote-left font-50px secondary-color mt-20"></i>
                                <p class="mt-20 line-height-26 font-14px">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Donec sodales nec nulla ac aliquet. Duis vel nunc eget.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!--== Slide ==-->
                        <div class="testimonial-item">
                            <div class="testimonial-content"> <img class="img-responsive img-circle"
                                    src="assets/images/team/avatar-4.jpg" alt="avatar-1" />
                                <h4 class="font-600 mb-0 raleway-font">John Doe</h4>
                                <span class="secondary-color font-14px">CEO / Founder</span>
                                <div class="clearfix mb-20"></div>
                                <i class="icofont icofont-quote-left font-50px secondary-color mt-20"></i>
                                <p class="mt-20 line-height-26 font-14px">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Donec sodales nec nulla ac aliquet. Duis vel nunc eget.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--== Testimonails End ==-->

    <!--== Clients Start ==-->
    <div class="grey-bg pb-120 pt-120">
        <div class="container">
            <div class="row">
                <div class="client-slider slick">
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/1.png"
                            alt="01" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/2.png"
                            alt="02" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/3.png"
                            alt="03" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/4.png"
                            alt="04" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/5.png"
                            alt="05" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/6.png"
                            alt="06" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/7.png"
                            alt="07" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/8.png"
                            alt="08" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/9.png"
                            alt="09" /> </div>
                    <div class="client-logo"> <img class="img-responsive" src="assets/images/clients/10.png"
                            alt="10" /> </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Clients End ==-->

    <!--== Blogs Start ==-->
    <section class="gradient-bg xs-pb-60" id="blog">
        <div class="col-md-6 col-sm-6 bg-flex bg-flex-right">
            <div class="bg-flex-holder bg-flex-cover" style="background-image: url(assets/images/blog-img.jpg);">
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-6 col-sm-6">
                <div class="col-inner spacer white-color text-center">
                    <h2 class="raleway-font mt-0 font-20px xs-font-17px">Read Our News</h2>
                    <h1 class="raleway-font mt-0 font-50px font-300 xs-font-27px">Latest Blog Post</h1>
                    <p>Objectively innovate empowered manufactured products whereas parallel platforms.<br>
                        Holisticly predominate extensible testing procedures for reliable supply chains. </p>
                    <p><a href="#." class="btn btn-md btn-circle btn-light-outline mt-30">See Blog
                            Details</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--== Blogs End ==-->

    <!--== Contact Start ==-->
    <section class="white-bg transition-none" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">Just Keep In Touch</h2>
                        <h1 class="raleway-font">Contact Us Now</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam semper ex ac velit varius
                        semper. Mauris at dolor nec ante ultricies aliquam ac vitae diam. Quisque sodales vehicula
                        elementum. Phasellus tempus tellus vitae ullamcorper hendrerit.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-50">
                <div id="map-style-3" class="wide"></div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-70">
                <div class="col-md-6 col-sm-6 col-xs-12 xs-mb-50">
                    <div class="row mt-20">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="section-title">
                                <h2 class="raleway-font secondary-color">Postal Address</h2>
                                <p class="mt-30">PO Box 16122 Toronto Eaton Centre, 220 The PATH Toronto, ON M5B
                                    2H1, Canada</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="section-title">
                                <h2 class="raleway-font secondary-color">Office Numbers</h2>
                                <p class="mb-0 mt-30">Landline : +44 1234 567 9</p>
                                <p class="mb-0">Mobile : +44 1234 567 9</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="section-title">
                                <h2 class="raleway-font secondary-color">Our Email</h2>
                                <p class="mb-0 mt-30">Order : order@yourwebsite.com</p>
                                <p class="mb-0">Request : request@yourwebsite.com</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="section-title">
                                <h2 class="raleway-font secondary-color">Fast Support</h2>
                                <p class="mb-0 mt-30">Support : support@yourwebsite.com</p>
                                <p class="mb-0">Career : career@yourwebsite.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-12 social-icons-style-06">
                            <ul class="md-icon left-icon">
                                <li><a class="icon facebook" href="#."><i
                                            class="icofont icofont-social-facebook"></i></a></li>
                                <li><a class="icon twitter" href="#."><i
                                            class="icofont icofont-social-twitter"></i></a></li>
                                <li><a class="icon behance" href="#."><i
                                            class="icofont icofont-social-behance"></i></a></li>
                                <li><a class="icon linkedin" href="#."><i
                                            class="icofont icofont-social-linkedin"></i></a></li>
                                <li><a class="icon youtube" href="#."><i
                                            class="icofont icofont-social-youtube"></i></a></li>
                                <li><a class="icon instagram" href="#."><i
                                            class="icofont icofont-social-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form name="contact-form" id="contact-form" action="php/contact.php" method="POST"
                        class="contact-form-style-01">
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="sr-only" for="name">Name</label>
                                    <input type="text" name="name" class="md-input" id="name"
                                        placeholder="Name *" required data-error="Your Name is Required">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="email" name="email" class="md-input" id="email"
                                        placeholder="Email *" required data-error="Please Enter Valid Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="sr-only" for="subject">Subject</label>
                                    <input type="text" name="subject" class="md-input" id="subject"
                                        placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="sr-only" for="message">Project Details</label>
                                    <textarea name="message" class="md-textarea" id="message" rows="7" placeholder="Project Details" required
                                        data-error="Please, Leave us a message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">

                                <select name="orderby" class="orderby">
                                    <option value="" selected="selected">$500 - $1000</option>
                                    <option value="">$1000 - $2000</option>
                                    <option value="">$2000 - $5000</option>
                                </select> <input type="hidden" name="paged" value="1">
                                <input type="hidden" name="min_price" value="20"><input type="hidden"
                                    name="max_price" value="290">

                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="text-left mt-20">
                                    <button type="submit" name="submit"
                                        class="btn btn-outline btn-md btn-circle btn-animate remove-margin"><span>Send
                                            Message <i class="ion-android-arrow-forward"></i></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--== Contact End ==-->
@endsection
