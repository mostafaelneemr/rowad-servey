@extends('layouts.web.master')

@section('title')
    Category-{{$category->title_en}}
@endsection

@section('meta_title')
    {{ $category->title }}
@stop

@section('meta_description')
    {{ $category->description }}
@stop

@section('meta_keywords')
    {{ $category->slug }}
@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $category->title }}">
    <meta itemprop="description" content="{{ $category->description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $category->title }}">
    <meta name="twitter:description" content="{{ $category->description }}">
    <meta name="twitter:creator" content="@author_handle">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $category->title }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ route('category.slug', $category->slug) }}"/>
    <meta property="og:description" content="{{ $category->description }}"/>
    <meta property="og:site_name" content="{{ env('APP_NAME') }}"/>
@endsection


@section('content')

    <!-- End Breadcaump Area -->

    <!-- Page Conttent -->
    <div class="bk-portfolio-with-caption-area ptb--200 ptb-md--150 ptb-sm--150 bg_color--5 poss_relative">
        <div class="container">

            <div class="row portfolio-grid-metro6">

                <!-- Start Single Product -->
                @forelse($category->products as $product)

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 portfolio-33-33 cat--{{$product->category_id}}">
                        <div class="portfolio with-caption" style="overflow: hidden; height: 100%; border-radius: 15px">
                            <div class="thumb video-with-thumb">
                                <a href="{{url('product/' . $product->slug)}}">
                                    <img src="{{asset($product->image)}}"
                                         style="width: 100%; height: 250px; object-fit: contain;padding: 10px"
                                         alt="product images">
                                </a>
                            </div>
                            <div class="caption-bottom text-start">
                                <div class="info">
                                    <h5 class="heading heading-h5"><a
                                            href="{{route('product.slug' , $product->slug)}}">{{$product->title_en}}</a></h5>
                                    <p class="bk_pra">{{ $product->image_desc_en }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                    {{__('no Product')}}
                @endforelse


            </div>
        </div>
        <!-- End Shop Minimal Product -->
    </div>

@endsection

