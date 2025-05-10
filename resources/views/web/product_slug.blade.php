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

    /* Second section*/
    .slider-container{
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .product-info{
      font-weight: 500;
      line-height: 28px;
      font-size: 18px;
    }

    .mySlides {
      display:none;
      width: 300px;
      height: 300px;
      object-fit: contain;
    }

    .circle-button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #ffffff;
        color: black;
        border: 1px solid #ccc;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.2em;
        outline: none;
    }

    .circle-button:hover {
       background-color: #eee;
    }





    </style>
@endsection
@section('content')

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

        <!-- Second section -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="product-info">
                        {{lang() == 'ar' ?  $product->desc_ar : $product->desc_en }}
                    </p>
                </div>

                <div class="col-md-5">
                    <div class="slider-container">
                        <button class="circle-button" onclick="plusDivs(-1)">&#10094;</button>
                        @foreach($product->galleries as $image)
                            <img class="mySlides" src="{{asset($image->image)}}" alt="product">
                        @endforeach
                        <button class="circle-button" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                </div>
            </div>
        </div>
         
    @push('js')
    <script>
      var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          x[slideIndex-1].style.display = "block";
        }
    </script>

@endpush



@endsection

