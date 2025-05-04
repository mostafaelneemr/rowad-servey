@extends('layouts.web.master')

@section('content')
<!-- Wrapper -->
<div id="wrapper" class="wrapper">
    <!-- End Toolbar -->

    <!-- Page Conttent -->
    <main class="page-content">
        <div class="page-template-comming-soon bg_color--3">
            <div class="site">
                <div class="row">
                    <div class="col-lg-4 col-xl-6 bg_image--58 order-2 order-lg-1 d-none d-md-block fullscreen">

                    </div>
                    <div class="col-lg-8 col-xl-6 fullscreen order-1 order-lg-2 d-flex align-items-center">
                        <div class="maintanence-wrapper comming-soon-wrapper plr--95">
                            <div class="inner">

                                <div class="content mt--95 mt_lg--30 mt_md--30 mt_sm--30">
                                    <h3 class="heading heading-h3 text-white">Something awesome is in the works.</h3>
                                    <div class="box-timer countdown-style-1 bg-solid-grey mt--95 mt_lg--30 mt_md--30 mt_sm--30">
                                        <div class="countbox timer-grid">
                                            <div data-countdown="2025/05/11"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Networks -->
                <div class="maintenance-social-networks">
                    <div class="inner">
                        <a href="#"><span class="social-text">Facebook</span></a>
                        <a href="#"><span class="social-text">Twitter</span></a>
                        <a href="#"><span class="social-text">Instagram</span></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--// Page Conttent -->
</div>


@endsection








{{--@section('title') About-US - Atech @endsection--}}

{{--@section('style')--}}
{{--    <style>--}}
{{--        .testimabout{--}}
{{--            background-image: url('{{asset('test.jpg')}}');--}}
{{--            background-repeat: no-repeat; --}}
{{--            background-size: cover; --}}
{{--            background-position: center center;--}}
{{--        }--}}

{{--        .testimonialhei{--}}
{{--            height:350px;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <style>--}}
{{--        .testimonial_style--1:hover{--}}
{{--            background-color: #222933 !important--}}
{{--        }--}}
{{--        #quote{--}}
{{--            color: #222933;--}}
{{--        }--}}

{{--    </style>--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <!-- Start Story Area -->--}}
{{--    @if (App\Models\admin\Active_section::where('name', 'about_section')->first()->value == '1')--}}
{{--        <div class="brook-story-area ptb--120 ptb-md--80 ptb-sm--60  bg_color--9">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 col-xl-6 col-sm-12 col-12 pl--380 pr--80 pl_lp--80 pl_lg--50 pr_lg--20 pl_md--50 pr_md--20 pl_sm--30 pr_sm--20 mt-5">--}}
{{--                    <div class="architecture-story wow move-up">--}}
{{--                        <h6 class="heading heading-h6 body-color text-white">{{ setting('head_about') }}</h6>--}}
{{--                        <div class="bkseparator--25"></div>--}}
{{--                    --}}
{{--                        <h2 class="heading heading-h2 line-height-1-25 text-white">{{ setting('title_about') }}</h2>--}}
{{--                    --}}
{{--                        <div class="bkseparator--45"></div>--}}
{{--                    --}}
{{--                        <h5 class="heading heading-h5 line-height-1-62 text-white">{{ setting('sub_title_about') }}--}}
{{--                        </h5>--}}
{{--                        <div class="bkseparator--20"></div>--}}
{{--                        <p class="bk_pra text-white">{{ setting('desc_about') }}</p>--}}
{{--                        <div class="bkseparator--55"></div>--}}
{{--                        --}}{{-- <div class="signeture-image">--}}
{{--                            <img src="img/icons/singneture.png" alt="Multipurpose">--}}
{{--                        </div> --}}
{{--                    --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-xl-6 col-sm-12 col-12 mt_md--40 mt_sm--40 mt-5">--}}
{{--                    <div class="architecture-story">--}}
{{--                        <div class="thumb wow move-up">--}}
{{--                            <img src="{{ setting('image_about_section') }}" alt="Multipurpose">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <!-- End Story Area -->--}}


{{--    <!-- Start Testimonial Area -->--}}
{{--    @if (App\Models\admin\Active_section::where('name', 'testimonial_section')->first()->value == '1')--}}
{{--        <div class="brook-testimonial-area testimabout ptb--100 ptb-md--80 ptb-sm--60" >--}}
{{--          <div class="container">--}}
{{--            <div class="row">--}}
{{--              <!-- Start Single Testimonial -->--}}
{{--                @foreach($testimonials as $testimonial)--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow move-up mt--60">--}}
{{--                  <div class="testimonial testimonial_style--1 d-inline-block testimonialhei">--}}
{{--                    <div class="content">--}}
{{--                            <p class="bk_pra">{!! $testimonial->desc !!}</p>--}}
{{--                          <div class="testimonial-info">--}}
{{--                                <div class="post-thumbnail">--}}
{{--                                    <img src="{{ $testimonial->image }}" alt="testimonial image">--}}
{{--                                </div>--}}
{{--                                <div class="clint-info">--}}
{{--                                    <h6>{{ $testimonial->name }}</h6>--}}
{{--                                    <span>{{ $testimonial->title }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="testimonial-quote">--}}
{{--                                <span class="fa fa-quote-right" id="quote"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                @endforeach--}}
{{--              <!-- End Single Testimonial -->--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <!-- End Testimonial Area -->--}}


{{--        <!-- Start Team Area -->--}}
{{--    @if (App\Models\admin\Active_section::where('name', 'team_section')->first()->value == '1')--}}
{{--        <div class="brook-team-area bg_color--1 pb--150 pt--120 pt_md--80 pt_sm--80  pb_md--80 pb_sm--80">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <!-- Start Single Team -->--}}
{{--                    @foreach ($teams as $team)--}}
{{--                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">--}}
{{--                        <div class="team team_style--1">--}}
{{--                            <!-- Image Wrap -->--}}
{{--                            <div class="image-wrap">--}}
{{--                                <div class="thumb">--}}
{{--                                    <img src="{{ asset($team->image) }}" alt="Team images">--}}
{{--                                    <div class="overlay"></div>--}}
{{--                                    <div class="shape">--}}
{{--                                        <img class="shape-01" src="{{asset('website/assets/img/team/shape/team-shape-1.png')}}" alt="shape image">--}}
{{--                                        <img class="shape-02" src="{{asset('website/assets/img/team/shape/team-shape-2.png')}}" alt="shape image">--}}
{{--                                        <img class="shape-03" src="{{asset('website/assets/img/team/shape/team-shape-3.png')}}" alt="shape image">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Social Network -->--}}
{{--                                <div class="social-networks">--}}
{{--                                    <div class="inner">--}}
{{--                                        <a class="hint--bounce hint--top hint--primary" href="{{ $team->link_one }}" target="_blank" aria-label="Facebook">--}}
{{--                                            <i class="fab fa-facebook"></i>--}}
{{--                                        </a>--}}

{{--                                        <a class="hint--bounce hint--top hint--primary" href="{{ $team->link_two }}" target="_blank" aria-label="Twitter">--}}
{{--                                            <i class="fab fa-twitter"></i>--}}
{{--                                        </a>--}}

{{--                                        <a class="hint--bounce hint--top hint--primary" href="{{ $team->link_three }}" target="_blank" aria-label="Instagram">--}}
{{--                                            <i class="fab fa-instagram"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <!-- Team Info -->--}}
{{--                            <div class="info">--}}
{{--                                <h6 class="name">{{ $team->name }}</h6>--}}
{{--                                <span class="position">{{ $team->title }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                    <!-- End Single Team -->--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--        <!-- End Team Area -->--}}
{{--  --}}

{{--    <!-- Start Counterup Area -->--}}
{{--    @if (App\Models\admin\Active_section::where('name', 'client_section')->first()->value == '1')--}}
{{--        <div class="brook-counterup-area poss_relative wavify-activation ptb--80 ptb-md--80 ptb-sm--60 bg_color--1">--}}

{{--            <div class="wavify-wrapper">--}}
{{--                <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify-item"--}}
{{--                    data-wavify-height="140" data-wavify-background="rgb(196,220,250)" data-wavify-amplitude="80"--}}
{{--                    data-wavify-bones="4">--}}
{{--                    <path d="M 0 141.71042689406383 C 237.875 148.50471572578806 237.875 148.50471572578806 475.75 145.107571309926 C 713.625 141.71042689406383 713.625 141.71042689406383 951.5 165.82491752026056 C 1189.375 189.9394081464571 1189.375 189.9394081464571 1427.25 193.5786122514483 C 1665.125 197.21781635643944 1665.125 197.21781635643944 1903 165.82491752026056 L 1903 7389 L 0 7389 Z"--}}
{{--                        fill="rgba(255,226,217,0.5)"></path>--}}
{{--                </svg>--}}

{{--                <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify-item"--}}
{{--                    data-wavify-height="140" data-wavify-background="#C4DCFA" data-wavify-amplitude="80"--}}
{{--                    data-wavify-bones="3">--}}
{{--                    <path d="M 0 147.22020568980648 C 317.16666666666663 183.65559797623268 317.16666666666663 183.65559797623268 634.3333333333333 165.43790183301957 C 951.4999999999999 147.22020568980648 951.4999999999999 147.22020568980648 1268.6666666666665 200.09089320557024 C 1585.833333333333 252.96158072133412 1585.833333333333 252.96158072133412 1903 183.26276877337258 L 1903 7389 L 0 7389 Z"--}}
{{--                        fill="#f5f5f5"></path>--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--            <div class="container">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-lg-12 col-md-12">--}}
{{--                        <div class="bk-title--default text-start brook-section-title-business">--}}
{{--                            <h5>{{ setting('title_brand') }}</h5>--}}
{{--                            <h3 class="fw-200">{{ setting('header_brand') }}</h3>--}}
{{--                            <div class="separator"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <!-- Start Single Counter -->--}}
{{--                    @foreach($clients as $client)--}}
{{--                    <div class="col-lg-2 col-md-4 col-sm-6 col-6">--}}
{{--                        <div class="brook-counter text-center">--}}
{{--                            <div class="icon">--}}
{{--                                <img src="{{asset($client->image)}}" alt="Client Image">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                    <!-- End Single Counter -->--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <!-- End Counterup Area -->--}}

{{--@endsection--}}

{{--@section('script')--}}
{{--@endsection--}}
