@extends('layouts.web.master')

@section('style')

    <style>
        .icon-box .inner:hover {
            background-color: #222933;
            color: #fff
        }
    </style>

    <style>
        .icon-box .inner:hover .content h5.heading {
            color: #fff
        }
    </style>

    <style>
        .icon-box .inner:hover .services-icon i {
            color: #fff
        }
    </style>

    <style>
        .testimonial_style--1:hover {
            background-color: #222933 !important
        }

        #quote {
            color: #222933;
        }

        body.template-color-26 .slick-dots-bottom .slick-dots li.slick-active button {
            background-color: #222933 !important
        }
    </style>

    <style>
        .custom-slider {
            width: 100%;
            height: 100vh;
            position: relative;
        }

        .swiper-slide {
            position: relative;
            background-size: cover;
            background-position: center;
        }

        /* Blur effect for the background image */
        .swiper-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            background-size: cover;
            filter: blur(8px);
            z-index: 1;
        }

        .slide-content {
            position: absolute;
            top: 50%;
            left: 5%;
            right: 5%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            z-index: 2; /* Ensure content is above the blurred background */
        }

        .product-image {
            background: none !important; /* إزالة أي خلفية */
        }

        .product-image img {
            width: 400px;
            height: 300px;
            border-radius: 0; /* إزالة الزوايا المستديرة إذا كنت تريدها */
            box-shadow: none; /* إزالة الظل */
            border: none; /* إزالة الحدود */
            background: transparent !important; /* تأكيد عدم وجود خلفية */
            display: block; /* للتأكد من عدم وجود مسافات إضافية */
        }

        /* إذا كنت تريد تأثيرات خاصة عند التحويم */
        .product-image img:hover {
            transform: scale(1.05); /* تكبير بسيط عند التحويم */
            transition: transform 0.3s ease;
        }

        .product-details {
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent background */
            backdrop-filter: blur(10px); /* Blur effect for the content */
            padding: 30px;
            border: 2px solid rgba(252, 183, 43, 0.3); /* Transparent border */
            border-radius: 15px;
            /* max-width: 600px; */
            text-align: left;
        }

        .product-details h2 {
            font-size: 30px;
            color: #fff;
            margin-bottom: 10px;
            position: relative;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            border-bottom: 2px solid rgba(255, 255, 255, 0.3); /* Transparent border */
            padding-bottom: 10px;
        }

        .product-details p {
            font-size: 18px;
            color: #fff;
            margin: 20px 0;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            border-bottom: 2px solid rgba(255, 255, 255, 0.2); /* Transparent border */
            padding-bottom: 15px;
        }

        .product-details a {
            display: inline-block;
            background: rgba(252, 183, 43, 0.8); /* Semi-transparent button */
            color: #fff;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.3); /* Transparent border */
        }

        .product-details a:hover {
            background: rgba(224, 166, 43, 0.9);
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            width: 50px;
            height: 50px;
            background: rgba(0, 0, 0, 0.3); /* Semi-transparent background */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.3); /* Transparent border */
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px;
        }

        .counter-item {
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 40px 20px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .counter-item:hover {
            background-color: #0D0D1D;
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-color: #000;
            transform: translateY(-5px);
        }

        .counter-item:hover h2{
            color: #fff !important;
        }

        .icon-box.no-border .inner{
            padding: 20px !important;
            border-radius: 10px !important
        }

        .portfolio.with-caption:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15),
            0 6px 6px rgba(0, 0, 0, 0.1) !important;
        }


    </style>
    {{--    product--}}
    <style>
        /* Remove default button styling */
        .messonry-button button {
            border: none;
            background: none;
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Active button styling */
        .messonry-button button.is-checked {
            font-weight: bold;
            color: #007bff; /* Active color */
        }

        /* Hover effect */
        .messonry-button button:hover {
            color: #0056b3;
        }

        .portfolio.with-caption {
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .address .studio-entry {
            margin-bottom: 8px;
            font-size: 16px;
        }
    </style>

@endsection

@section('content')

    <div class="brook-whatdo-area ptb--150 ptb-md--80 ptb-sm--60 bg_color--1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img class="w-100" src="{{asset(setting('image_about')->value ?? '')}}" width="100%"
                             height="100%" alt="about images">
                    </div>
                </div>
                <div class="col-lg-6 mt_sm--40 mt_md--40">
                    <div class="bk-title--default text-start">
                        {{--                        <h5 class="heading heading-h5 theme-color wow move-up">What we do</h5>--}}
                        <div class="bkseparator--30"></div>
                        <h3 class="heading heading-h3 wow move-up">{{setting('title_about')->value ?? ''}}</h3>
                    </div>
                    <div class="row">

                        <!-- Start Single -->
                        @foreach($abouts as $about)

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="what-do mt--30">
                                <div class="content">
                                    <h5 class="heading heading-h5 wow move-up">{{lang() == 'ar' ? $about->title_ar : $about->title_en}}</h5>
                                    <div class="bkseparator--20"></div>
                                    <p class="bk_pra wow move-up">{{lang() == 'ar' ? $about->text_ar : $about->text_en}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Single -->

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="counterup-area py-20 bg_color--5 py-5">
        <div class="container">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">{{__('Statistics Reflecting Our Excellence')}}</h2>
            </div>
            <div class="row text-center">
                @foreach($statistics as $sta)
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <div class="counter-item border rounded-lg transition-all duration-300 hover:shadow-lg hover:border-black">
                            <h2 class="text-5xl font-extrabold text-black mb-3">{{$sta->number}}</h2>
                            <p class="text-gray-600 text-lg">{{ lang() == 'ar' ? $sta->title_ar : $sta->title_en }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="brook-icon-boxes-area basic-thine-line ptb--80 ptb_md--80 ptb_sm--80">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="row bg_color--1 pt--100 space_dec--110 poss_relative" style="border-top: 4px solid #ED942A;">
                        <!-- Start Single Icon Boxes -->

                        <div class="brook-section-title text-center mb-3">
                            <h3 class="heading heading-h6">{{__('Our Services')}}</h3>
                        </div>

                        @foreach($services as $service)

                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow move-up">
                                <div class="icon-box text-center no-border">
                                    <div class="inner">
                                        <div class="icon">
                                            <i class="{{$service->icon}}" style="color: #ED942A"></i>
                                        </div>
                                        <div class="content">
                                            <h5 class="heading heading-h5">{{lang() == 'ar' ? $service->title_ar : $service->title_en}}</h5>
                                            <p class="bk_pra">{{lang() == 'ar' ? $service->text_ar : $service->text_en}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Single Icon Boxes -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Testimonial Area -->
    <div class="brook-testimonial-area ptb--80 ptb-md--80 ptb-sm--60 bg_color--6 slick-arrow-hover">
        <div class="text-center">

            <h5>{{__('customer reviews')}}</h5>
            <h3>{{__('What do our clients say about us?')}}</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb--30">

                    <div class="brook-element-carousel slick-arrow-center slick-dots-bottom"
                         data-slick-options='{
                                    "spaceBetween": 15,
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "infinite": true,
                                    "dots": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fas fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fas fa-angle-right" }
                                }'
                         data-slick-responsive='[
                                    {"breakpoint":770, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":577, "settings": {"slidesToShow": 1}},
                                    {"breakpoint":481, "settings": {"slidesToShow": 1}}
                                ]'>

                        <!-- Start Single Testimonial -->
                        @foreach($testimonials as $testimonial)

                            <div class="testimonial testimonial_style--1" >
                                <div class="content">
                                    <p class="bk_pra">{{lang() == 'ar' ? $testimonial->text_ar : $testimonial->text_en}}</p>
                                    <div class="testimonial-info">
                                        <div class="clint-info">
                                            <h6>{{lang() == 'ar' ? $testimonial->name_ar : $testimonial->name_en}}</h6>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <span class="fa fa-quote-right" style="color: #ED942A"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Single Testimonial -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Area -->


@endsection




