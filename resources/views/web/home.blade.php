@extends('layouts.web.master')

@section('title')
    Rowad Survey
@endsection

@php
    $title = App\Models\admin\SeoSetting::find(1)->title;
    $description = App\Models\admin\SeoSetting::find(1)->description;

    $meta_title_proj = App\Models\admin\SeoSetting::find(1)->project_meta_title;
    $meta_description_proj = App\Models\admin\SeoSetting::find(1)->project_meta_description;

    $meta_title_brand = App\Models\admin\SeoSetting::find(1)->brands_meta_title;
    $meta_description_brand = App\Models\admin\SeoSetting::find(1)->brands_meta_description;

    $meta_title_blog = App\Models\admin\SeoSetting::find(1)->blog_meta_title;
    $meta_description_blog = App\Models\admin\SeoSetting::find(1)->blog_meta_description;
@endphp

@section('meta_title')
    {{ $title }}
@stop
@section('meta_description')
    {{ $description }}
@stop
@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title_proj }}">
    <meta itemprop="name" content="{{ $meta_title_blog }}">
    <meta itemprop="name" content="{{ $meta_title_brand }}">
    <meta itemprop="description" content="{{ $meta_description_proj }}">
    <meta itemprop="description" content="{{ $meta_description_blog }}">
    <meta itemprop="description" content="{{ $meta_description_brand }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title_proj }}">
    <meta name="twitter:title" content="{{ $meta_title_blog }}">
    <meta name="twitter:title" content="{{ $meta_title_brand }}">
    <meta name="twitter:description" content="{{ $meta_description_proj }}">
    <meta name="twitter:description" content="{{ $meta_description_blog }}">
    <meta name="twitter:description" content="{{ $meta_description_brand }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title_proj }}"/>
    <meta property="og:title" content="{{ $meta_title_blog }}"/>
    <meta property="og:title" content="{{ $meta_title_brand }}"/>
    <meta property="og:description" content="{{ $meta_description_proj }}"/>
    <meta property="og:description" content="{{ $meta_description_blog }}"/>
    <meta property="og:description" content="{{ $meta_description_brand }}"/>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

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
    <div class="swiper custom-slider">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide" style="background-image: url('{{ asset($slider->image) }}');">
                    <div class="slide-content">
                        <div class="product-details">
                            <h2>{{lang() == 'ar' ? $slider->title_ar : $slider->title_ar }}</h2>
                            <p>{{ lang() == 'ar' ? $slider->sub_title_ar : $slider->sub_title_en }}</p>
                            <a href="#" style="background-color: #06063c ">{{ lang() == 'ar' ? $slider->button_ar : $slider->button_en }}</a>
                        </div>
                        <div class="product-image d-none d-lg-block">
                            <img src="{{ asset($slider->thumbnail) }}" alt="Product">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="brook-video-area videobg bg_color--1 pb--30 pt--30 pb_md--80 pb_sm--60 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="video-with-thumb text-center move-up wow">
                        <div class="thumb">
                            <img src="{{ asset(setting('video_image')->value ?? '') }}" alt="video images">
                        </div>
                        <!-- Start Single Popup -->
                        <div class="video-btn position--center">
                            <a class="play__btn" href="{{ setting('video_link')->value ?? '' }}">
                                <div class="video-icon second-icon post-read-more" style="background-color: red"></div>
                            </a>
                        </div>
                        <!-- End Single Popup -->
                    </div>
                </div>
                <div class="col-lg-5 mt_sm--30 mt_md--30">
                    <div class="video-content move-up wow">
                        <h3 class="heading heading-h3">{{ lang() == 'ar' ? (setting('title_video_ar')->value ?? '') : (setting('title_video_en')->value ?? '') }}
                       <span style="color: #06063c" >STONEX</span>
                        </h3>
                        <div class="bkseparator--25"></div>
                        <p class="bk_pra">{{ lang() == 'ar' ? (setting('desc_video_ar')->value ?? '') : (setting('desc_video_en')->value ?? '') }}</p>
                        <div class="bkseparator--40"></div>
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


    <div class="bk-portfolio-with-caption-area pb--150 pb-md--80 pb-sm--80 bg_color--5 poss_relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brook-section-title text-center">
                        <h3 class="heading heading-h3">{{__('Our Products')}}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="messonry-button text-center mb--70">
                        <button data-filter="*" class="is-checked">
                            <span class="filter-text text-black">{{__('All')}}</span>
                        </button>
                        @foreach ($categories as $category)
                            <button data-filter=".cat--{{ $category->id  }}">
                                <span class="filter-text text-black">{{ lang() == 'ar' ? $category->title_ar : $category->title_en }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row portfolio-grid-metro6">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 portfolio-33-33 cat--{{$product->category_id}}">
                        <div class="portfolio with-caption" style="overflow: hidden; height: 100%; border-radius: 15px">
                            <div class="thumb video-with-thumb">
                                <a href="{{url('product/' . $product->slug)}}">
                                    <img src="{{asset($product->image)}}"
                                         style="width: 100%; height: 250px; object-fit: contain;padding: 10px" alt="product images">
                                </a>
                            </div>
                            <div class="caption-bottom text-start">
                                <div class="info">
                                    <h5 class="heading heading-h5"><a
                                            href="{{url('product/' . $product->slug)}}">{{$product->title_en}}</a></h5>
                                    <p class="bk_pra">{{ $product->image_desc_en }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>


    <div class="brook-icon-boxes-area basic-thine-line pb--80 pb_md--80 pb_sm--80">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="row bg_color--1 pt--100 space_dec--110 poss_relative basic-thick-line-theme-4">
                        <!-- Start Single Icon Boxes -->

                        <div class="brook-section-title text-center mb-3">
                            <h3 class="heading heading-h6 theme-color">{{__('Our Services')}}</h3>
                        </div>

                        @foreach($services as $service)

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow move-up">
                            <div class="icon-box text-center no-border">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="{{$service->icon}}"></i>
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
    <!-- End Icon Boxes -->

    <!-- Start Testimonial Area -->
    <div class="brook-testimonial-area ptb--80 ptb-md--80 ptb-sm--60 bg_color--6 slick-arrow-hover">
        <div class="text-center">

            <h5>{{__('customer reviews')}}</h5>
            <h3>{{__('What do our clients say about us?')}}</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb--30">

                    <div class="brook-element-carousel slick-arrow-center slick-dots-bottom wow move-up"
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

                            <div class="testimonial testimonial_style--1 rounded" >
                                <div class="content">
                                    <p class="bk_pra">{{lang() == 'ar' ? $testimonial->text_ar : $testimonial->text_en}}</p>
                                    <div class="testimonial-info">
                                        <div class="clint-info">
                                            <h6>{{lang() == 'ar' ? $testimonial->name_ar : $testimonial->name_en}}</h6>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <span class="fa fa-quote-right"></span>
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

    <!-- Start Contact Area -->
    <div class="bk-contact-area section-pb-xl bg_color--1 mt-5">
        <div class="container">
            <div class="row">
                <!-- Start Address -->
                <div class="col-xl-3 col-lg-3 col-12">
                    <div class="address-inner">
                        <div class="address wow move-up">
                            <h3 class="heading">{{ __('Visit our Location') }}</h3>

                            @for ($i = 1; $i <= 4; $i++)
                                @php
                                    $address = setting('address_' . $i)->value ?? null;
                                    $phone = setting('phone_' . $i)->value ?? null;
                                @endphp

                                @if ($address || $phone)
                                    <div class="studio-entry">
                                        <span>{{ $address }}</span> @if($phone) - @endif <span>{{ $phone }}</span>
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <div class="address mt--60 mb--60 wow move-up">
                            <h3 class="heading">{{__('Message us')}}</h3>
                            <p><a href="mailto:{{setting('email')->value ?? '#'}}">{{setting('email')->value ?? ''}}</a></p>
                        </div>

                        <ul class="social-icon icon-size-medium text-dark text-center tooltip-layout move-up wow">
                            <li class="facebook">
                                <a href="{{setting('facebook')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="linkedin">
                                <a href="{{setting('linkedin')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Linkedin"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li class="youtube">
                                <a href="{{setting('youtube')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- Start COntact Form -->
                <div class="col-xl-8 offset-xl-1 col-lg-9 col-12 mt_md--40 mt_sm--40">
                    <div class="contact-form">
                        <div id="form-alert-message"></div>
                        @if(session()->has('notify'))
                            <div class="alert alert-{{ session('notify')['type'] }}" >
                                {{ session('notify')['message'] }}
                            </div>
                        @endif
                        <form name="contact-form" action="{{route('sendmail')}}" method="POST">
                            @csrf
                            <div class="row gy-3">

                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <span class="form-icon far fa-user"></span>
                                        <input type="text" name="name" class="rounded" placeholder="{{__('Name *')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <span class="form-icon fas fa-mobile-alt"></span>
                                        <input type="text" name="telephone" class="rounded" placeholder="{{__('Phone number')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <span class="form-icon far fa-envelope"></span>
                                        <input type="email" name="email" class="rounded" placeholder="{{__('Email *')}}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <span class="form-icon fas fa-mobile-alt"></span>
                                        <input type="text" name="whatsapp_number" class="rounded" placeholder="{{__('whats\'app number')}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <textarea placeholder="{{__('Your message')}}" name="message" class="rounded" ></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-action">

                                        <div class="form-submit">
                                            <input type="submit" class="fs-5" value="{{__('Send message')}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    @include('web.call')


@endsection


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper('.custom-slider', {
            loop: true,
            autoplay: {
                delay: 20000, // كل 20 ثانية يقلب
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <!-- JavaScript for filtering -->
    <script>
        $(document).ready(function() {
            // Initialize Isotope
            console.log("ok")
            var $grid = $('.portfolio-grid-metro6').isotope({
                itemSelector: '.portfolio-33-33',
                layoutMode: 'fitRows'
            });
            console.log($grid);
            // Category filter button click event
            $('.messonry-button button').on('click', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });

                // Change is-checked class on buttons
                $('.messonry-button button').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.counter-item h3');
            counters.forEach(counter => {
                new counterUp.CounterUp({
                    target: counter,
                    duration: 2000, // وقت العد مثلا 2 ثانية
                    delay: 10,
                }).start();
            });
        });
    </script>

@endpush
