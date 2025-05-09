@extends('layouts.web.master')

@php
    $meta_title = App\Models\SeoSetting::find(1)->project_meta_title;
    $meta_description = App\Models\SeoSetting::find(1)->project_meta_description;
@endphp

@section('title') Projects - Atech @endsection
@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('style')
    <style>
        .projectbg{
            background-image: url('{{asset('sbg.jpg')}}');
        }
    </style>
@endsection

@section('content')

    <!-- Start projects Caption  our works-->
    <div class="bk-portfolio-with-caption-area projectbg pt--50 pt_md--80 pt_sm--60 pb--25 pb_md--30 pb_sm--20 bg_color--1 poss_relative bk-masonary-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brook-section-title text-center mb--60 mt--80">
                        <h3 class="heading heading-h3 text-white">{{ setting('title_projects') }}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-grid-metro6 mesonry-list">

                        <div class="resizer"></div>

                        <!-- Start Single Portfolio -->

                        @foreach($items as $item)
                        <div class="portfolio-33-33 cat--{{$item->category}}">
                            <div class="portfolio with-caption">
                                <div class="thumb video-with-thumb">
                                    <a href="{{url('project/' . $item->slug)}}">
                                        <img src="{{asset($item->image)}}" alt="portfolio images">
                                    </a>

                                </div>
                                <div class="caption-bottom text-center">
                                    <div class="info">
                                        <h5 class="heading heading-h5"><a href="{{url('project/' . $item->slug)}}">{{ $item->title }}</a></h5>
                                        <p class="bk_pra">{{ $item->type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- End Single Portfolio -->

                    </div>
                </div>
            </div>
         </div>
      </div>
    <!-- End projects Caption -->

@endsection
