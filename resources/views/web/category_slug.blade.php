@extends('layouts.web.master')

@section('title') Category-{{$category->title_en}} @endsection

@section('meta_title'){{ $category->title }}@stop

@section('meta_description'){{ $category->description }}@stop

@section('meta_keywords'){{ $category->slug }}@stop

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
    <meta property="og:title" content="{{ $category->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('category.slug', $category->slug) }}" />
    <meta property="og:description" content="{{ $category->description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('style')

@endsection
@section('content')


    <div class="breadcaump-area pt--130 pb--50 bg_color--1 breadcaump-title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcaump-inner text-center">
                        <h1 class="heading heading-h1">{{$category->title_en}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcaump Area -->

    <!-- Page Conttent -->
    <main class="page-content">
        <!-- Start Shop Minimal Area -->
        <div class="brook-shop-minimal ptb--150 bg_color--1">
            <div class="container-fluid">
                <div class="row pl--15">
                    <div class="col-lg-8 col-xl-8">
                        <!-- Start Shop Minimal Product -->
                        <div class="shop-minimal-product">

                            <div class="row row--25">
                                <!-- Start Single Product -->
                                @forelse($category->products as $product)

                                <div class="col-lg-6 col-xl-4 col-md-6 col-sm-6 col-12">
                                    <div class="product mt--30">
                                        <div class="product-thumbnail">
                                            <div class="thumbnail">
                                                <div class="product-main-image">
                                                    <img src="{{asset($product->image)}}" alt="Multipurpose">
                                                </div>
                                                <div class="product-hover-image">
                                                    <img src="{{asset($product->image)}}" alt="Multipurpose">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="heading heading-h5"><a href="{{route('product.slug',$product->slug)}}">{{ lang() == 'ar' ? $product->title_ar : $product->title_en }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                @empty

                                    {{__('no Product')}}
                                @endforelse


                            </div>
                        </div>
                        <!-- End Shop Minimal Product -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Minimal Area -->

    </main>

@endsection

