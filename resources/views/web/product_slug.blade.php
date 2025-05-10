@extends('layouts.web.master')

@section('title') Product-{{$product->title_en}} @endsection

@section('meta_title'){{ $product->title }}@stop

@section('meta_description'){{ $product->description }}@stop

@section('meta_keywords'){{ $product->slug }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $product->title }}">
    <meta itemprop="description" content="{{ $product->description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $product->title }}">
    <meta name="twitter:description" content="{{ $product->description }}">
    <meta name="twitter:creator" content="@author_handle">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $product->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('product.slug', $product->slug) }}" />
    <meta property="og:description" content="{{ $product->description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('style')
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
            max-width: 600px;
            text-align: left;
        }

        .product-details h2 {
            font-size: 42px;
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
    </style>
@endsection
@section('content')


    <div class="swiper custom-slider">
        <div class="swiper-wrapper">

                <div class="swiper-slide" style="background-image: url('{{ asset($product->slider_image) }}');">
                    <div class="slide-content">
                        <div class="product-details">
                            <h2>{{lang() == 'ar' ? $product->title_ar : $product->title_ar }}</h2>
                            <p>{{ lang() == 'ar' ? $product->image_desc_ar : $product->image_desc_en }}</p>
                            <a href="{{asset('storage/'.$product->pdf_file)}}">{{ __('data sheet') }}</a>
                        </div>
                        <div class="product-image">
                            <img src="{{ asset($product->image) }}" alt="Product Image">
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="container">

    <p>
        {{lang() == 'ar' ?  $product->desc_ar : $product->desc_en }}
    </p>
    </div>



    <div class="bk-portfolio-area creative-portfolio section-pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title--between wow move-up">
                        <div class="title">
                            <h3> {{__('Gallery')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-wrapper mt--40 wow move-up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="porfolio-swip-horizontal" style="overflow: hidden;">
                            <div class="swiper-wrapper">


                                <!-- End Single Portfolio -->

                                <!-- Start Single Portfolio -->
                                @foreach($product->galleries as $image)

                                <div class="portfolio portfolio_style--2 mt--30 swiper-slide">
                                    <div class="thumb">
                                        <img src="{{asset($image->image)}}" alt="Portfolio Images">
                                    </div>
                                    <div class="portfolio-overlay"></div>
                                    <div class="port-overlay-info">
{{--                                        <div class="content">--}}
{{--                                            <h3 class="port-title">Digital Marketing Basics</h3>--}}
{{--                                            <div class="category">Digital</div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Single Portfolio -->

                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

