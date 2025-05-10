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

        /* Ahmed Edits */
        /* Hero section */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://peaks-of-commercial-space-f.vercel.app/hero_bg-3.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .product-title {
            color: white;
            font-size: 3.5rem;
            font-weight: 700;
            text-align: end;
        }
        .product-subtitle {
            color: white;
            font-size: 1.2rem;
            margin-bottom: 30px;
            font-weight: 300;
            text-align: end;
        }
        .product-image {
            max-width: 100%;
            height: 350px;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.2));
        }
        .download-btn {
            background-color: #005073;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .download-btn:hover {
            background-color: #003a54;
            transform: translateY(-2px);
        }

        .blur-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Product Details section */
        /* Container */
      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
      }

      /* Product Grid */
      .product-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        align-items: center;
      }

      @media (min-width: 768px) {
        .product-grid {
          grid-template-columns: 1fr 1fr;
        }
      }

      /* Product Image Section */
      .product-image-section {
        display: flex;
        justify-content: center;
      }

      .product-card {
        width: 100%;
        max-width: 28rem;
        border-radius: 0.5rem;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.1);
        background-color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .product-card-content {
        position: relative;
        padding: 0;
      }

      .product-badge {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2.5rem;
        background-color: #2563eb;
        color: white;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
      }

      /* Carousel */
      .carousel {
        width: 100%;
        margin-top: 1.5rem;
      }

      .carousel-content {
        position: relative;
      }

      .carousel-slide {
        display: none;
      }

      .carousel-slide.active {
        display: block;
      }

      .carousel-item {
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .product-image {
        width: 100%;
        height: 16rem;
        object-fit: contain;
      }

      .carousel-navigation {
        display: flex;
        justify-content: space-between;
        padding: 0 1rem 1rem;
      }

      .carousel-prev,
      .carousel-next {
        background-color: white;
        border: 1px solid #e5e7eb;
        height: 2rem;
        width: 2rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1rem;
      }

      .carousel-prev:hover,
      .carousel-next:hover {
        background-color: #f3f4f6;
      }

      /* Product Details */

      .product-title {
        font-size: 1.25rem;
        line-height: 1.75rem;
        font-weight: 700;
      }

      @media (min-width: 768px) {
        .product-title {
          font-size: 1.5rem;
          line-height: 2rem;
        }
      }

      .product-description,
      .product-feature {
        color: #4b5563;
      }

      /* Features Heading */
      .features-heading {
        margin-top: 4rem;
        text-align: center;
      }

      .features-heading h2 {
        font-size: 1.875rem;
        line-height: 2.25rem;
        font-weight: 700;
      }

    </style>
@endsection
@section('content')


    <!-- <div class="swiper custom-slider">
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
    </div> -->

        <!-- Hero Section -->
      <section class="hero-section">
          <!-- Blur Overlay -->
        <div class="blur-overlay"></div>

          <!-- Hero Content -->
        <div class="hero-content">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-2">
                    <button class="download-btn">
                        <a href="{{asset('storage/'.$product->pdf_file)}}">{{ __('data sheet') }}</a>
                    </button>
                  </div>

                  <!-- Product Information -->
                  <div class="col-md-6">
                      <h1 class="product-title">{{lang() == 'ar' ? $product->title_ar : $product->title_ar }}</h1>
                      <p class="product-subtitle">{{ lang() == 'ar' ? $product->image_desc_ar : $product->image_desc_en }}</p>
                  </div>

                  <!-- Product Image -->
                  <div class="col-md-4 text-center mb-4 mb-md-0">
                  <img src="{{ asset($product->image) }}" alt="S900+ GNSS Receiver" class="product-image">
                  </div>
              </div>
          </div>
        </div>
      </section>

      <div class="container">
      <div class="product-grid">
        <!-- Product Image Section with Carousel -->
        <div class="product-image-section">
          <div class="product-card">
            <div class="product-card-content">
              <div class="carousel">
                <div class="carousel-content">
                  <div class="carousel-slide active">
                    <div class="carousel-item">
                      <img src="/lovable-uploads/85906dec-9757-4f95-850f-bae74c8099de.png" alt="S900+ - view 1" class="product-image" />
                    </div>
                  </div>
                  <div class="carousel-slide">
                    <div class="carousel-item">
                      <img src="/placeholder.svg" alt="S900+ - view 2" class="product-image" />
                    </div>
                  </div>
                  <div class="carousel-slide">
                    <div class="carousel-item">
                      <img src="/placeholder.svg" alt="S900+ - view 3" class="product-image" />
                    </div>
                  </div>
                </div>
                <div class="carousel-navigation">
                  <button class="carousel-prev">←</button>
                  <button class="carousel-next">→</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Product Details Section -->
          <p class="product-feature">
            {{lang() == 'ar' ?  $product->desc_ar : $product->desc_en }}
          </p>
      </div>

    <!-- <div class="container">
    <p>
        {{lang() == 'ar' ?  $product->desc_ar : $product->desc_en }}
    </p>
    </div> -->



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
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.carousel-slide');
        const prevButton = document.querySelector('.carousel-prev');
        const nextButton = document.querySelector('.carousel-next');
        let currentSlideIndex = 0;
        
        // Function to update slides
        function updateSlides() {
          slides.forEach((slide, index) => {
            slide.classList.remove('active');
            if (index === currentSlideIndex) {
              slide.classList.add('active');
            }
          });
        }
        
        // Set up next button
        nextButton.addEventListener('click', function() {
          currentSlideIndex = (currentSlideIndex + 1) % slides.length;
          updateSlides();
        });
        
        // Set up previous button
        prevButton.addEventListener('click', function() {
          currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
          updateSlides();
        });
      });
    </script>


@endsection

