@extends('index.layouts.main')
@section('index_body')
    @if ($backgroudSettings_type == 'video')
        <!--== Hero Slider Start ==-->
        <section class="remove-padding relative view-height-100vh white-bg" id="home">
            <div class="parallax-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 display-table view-height-100vh">
                        <div class="v-align-middle text-center">
                            <div class="white-color text-center">
                                <h4 class="font-700 font-40px line-height-40">
                                    {{ isset($site_title) ? lang_db($site_title->value, -1) : '' }}</h4>
                                <p class="mt-30">
                                    <a class="btn btn-lg btn-light btn-circle">{{ lang_db('About Us', 1) }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <video autoplay="" muted="" loop="" controls="" class="html5-video">
                <source src="{{ $backgrouds->first()->optional_5 ?? '' }}" type="video/mp4">
                <source src="{{ $backgrouds->first()->optional_5 ?? '' }}" type="video/mov">
                {{ lang_db('Your browser does not support the video tag') }}
            </video>
        </section>
        <!--== Hero Slider End ==-->
    @elseif ($backgroudSettings_type == 'slider')
        <!--== Hero Slider Start ==-->
        <section class="remove-padding transition-none" id="home">
            <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                data-alias="classic4export" data-source="gallery"
                style="margin:0px auto;background-color:#000000;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
                <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                    <ul> <!-- SLIDE  -->
                        @foreach ($backgrouds as $item_background)
                            <li data-index="rs-{{ $item_background->code }}" data-transition="slidingoverlayhorizontal"
                                data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"
                                data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0"
                                data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3=""
                                data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                                data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="{{ asset($item_background->optional_5) }}" alt=""
                                    data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                    data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="hero-text-wrap">

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption NotGeneric-Title tp-resizeme"
                                        id="slide-{{ $item_background->code }}-layer-2"
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','middle','middle']"
                                        data-voffset="['-10','-10','-10','-10']" data-fontsize="['56','56','56','30']"
                                        data-lineheight="['66','66','66','40']" data-width="none" data-height="none"
                                        data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                        data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                        data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                                        data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]"
                                        data-paddingleft="[0,0,0,0]"
                                        style="font-family: 'Montserrat', sans-serif;font-weight:700;">
                                        {{ isset($site_title) ? lang_db($site_title->value, -1) : '' }}
                                    </div>

                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption NotGeneric-SubTitle tp-resizeme"
                                        id="slide-{{ $item_background->code }}-layer-4"
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','50']"
                                        data-y="['middle','middle','middle','middle']"
                                        data-voffset="['150','150','150','120']" data-width="none" data-height="none"
                                        data-whitespace="['normal','nowrap','nowrap','nowrap']" data-type="button"
                                        data-basealign="slide" data-responsive_offset="on"
                                        data-frames='[{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                        data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                        <a class="btn btn-lg btn-light btn-circle">{{ lang_db('About Us', 1) }}</a>
                                    </div>

                                </div>

                            </li>
                        @endforeach

                    </ul>
                    <div class="tp-bannertimer" style="height: 3px; background-color: rgba(255, 255, 255, 0.25);"></div>
                </div>
            </div>
        </section>
        <!--== Hero Slider End ==-->
    @elseif ($backgroudSettings_type == 'picture')
        <!--== Hero Image Start ==-->
        <section class="parallax-bg fixed-bg view-height-100vh lg-section"
            data-parallax-bg-image="{{ $backgrouds->first()->optional_5 ?? '' }}" data-parallax-speed="0.5"
            data-parallax-direction="up" id="home">
            <div class="hero-text-wrap xxl-screen transparent-bg">
                <div class="hero-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 centerize-col">
                                <div class="all-padding-50 text-center white-color">
                                    <h2>{{ isset($site_title) ? lang_db($site_title->value, -1) : '' }}</h2>
                                    <p class="mt-30">
                                        <a class="btn btn-lg btn-light btn-circle">{{ lang_db('About Us', 1) }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== Hero Image End ==-->
    @endif

    <!--== About Start ==-->
    <section class="gray-bg" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">{{ lang_db('Who We Are', 1) }}</h2>
                        <h1 class="raleway-font">{{ isset($site_title) ? lang_db($site_title->value, -1) : '' }}</h1>
                    </div>
                    <p>
                        {{ isset($site_description) ? lang_db($site_description->value, -1) : '' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--== About End ==-->
    @if (isset($home_show))
        <!--=== What We Do Start ======-->
        <section class="white-bg lg-section xs-pb-100 xs-pt-100" id="feature">
            <div class="col-md-6 col-sm-6 bg-flex bg-flex-right">
                <div class="bg-flex-holder bg-flex-cover" style="background-image: url({{ asset($home_show->image) }});">
                </div>
            </div>
            <div class="container">
                <div class="col-md-5 col-sm-6">
                    <div class="section-title mb-50">
                        <h2 class="raleway-font secondary-color mt-0 font-20px">{{ lang_db($home_show->sub_title) }}</h2>
                        <h1 class="raleway-font mt-0 font-50px font-300">{{ lang_db($home_show->title) }}</h1>
                    </div>
                    <p>{!! lang_db($home_show->description) !!}</p>
                </div>
            </div>
        </section>
        <!--=== What We Do End ======-->
    @endif

    @if (isset($home_show_2))
        <!--=== About Us Start ======-->
        <section class="grey-bg lg-section xs-pt-100 xs-pb-100">
            <div class="col-md-6 col-sm-6 bg-flex bg-flex-left">
                <div class="bg-flex-holder bg-flex-cover"
                    style="background-image: url({{ asset($home_show_2->image) }});">
                </div>
            </div>
            <div class="container">
                <div class="col-md-5 col-sm-6 col-md-offset-7 col-sm-offset-6">
                    <div class="section-title mb-50">
                        <h2 class="raleway-font secondary-color mt-0 font-20px">{{ lang_db($home_show_2->sub_title) }}
                        </h2>
                        <h1 class="raleway-font mt-0 font-50px font-300">{{ lang_db($home_show_2->title) }}</h1>
                    </div>
                    <p>{!! lang_db($home_show_2->description) !!}</p>
                </div>
            </div>
        </section>
        <!--=== About Us End ======-->
    @endif

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

    @if (false)
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
    @endif

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

    @if (false)
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
                                    <img class="img-responsive img-circle text-center"
                                        src="assets/images/team/avatar-1.jpg" alt="avatar-1" />
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
                                    <img class="img-responsive img-circle text-center"
                                        src="assets/images/team/avatar-2.jpg" alt="avatar-2" />
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
    @endif

    <!--== Clients Start ==-->
    <div class="grey-bg pb-120 pt-120">
        <div class="container">
            <div class="row">
                <div class="client-slider slick">
                    @foreach ($supplier as $item_supplier)
                        <div class="client-logo"> <img class="img-responsive" src="{{ $item_supplier->image ?? '' }}"
                                alt="{{ $item_supplier->title ?? '' }}" /> </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!--== Clients End ==-->

    @if (false)
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
    @endif

    <!--== Contact Start ==-->
    <section class="white-bg transition-none" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font secondary-color">Just Keep In Touch</h2>
                        <h1 class="raleway-font">Contact Us Now</h1>
                    </div>
                    <p></p>
                </div>
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
