@extends('layouts.web.master')

@php
    $meta_title = App\Models\admin\SeoSetting::find(1)->blog_meta_title;
    $meta_description = App\Models\admin\SeoSetting::find(1)->blog_meta_description;
@endphp

@section('title') Blogs - Atech @endsection
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
        .blogbg{
            background-color: #F0F4F9;
        }
        .blogflex{
            /* display: flex; */
            min-height: 220px;
        }
        .post-read-more{
            background-color: #222933 !important
        } 
    </style>

@endsection

@section('content')

    <!-- Start Blog Grid Area -->
    <div class="bk-blog-grid-area pt--70 pb--100 pt_md--5 pt_sm--5 pb_md--80 pb_sm--80 bg_color--5 blogbg">
        <div class="container">

            <div class="row">

                <!-- Start Single Blog -->
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 move-up wow mt--100">
                    <div class="blog-grid blog-grid--modern blog-standard blog-yellow-color blogflex">
                        <div class="post-thumb">
                            <a href="{{url('blog/' . $blog->slug)}}">
                                <img src="{{ $blog->thumbnail }}" alt="Multipurpose template">
                            </a>
                        </div>
                        <div class="post-content text-center">
                            <div class="post-inner">
                                <div class="post-meta mb--10">
                                    <div class="post-date">{{ date('d-m-Y', strtotime($blog->created_at)) }}</div>
                                    <div class="post-category"><a href="#">Life Style</a></div>
                                </div>
                                <h5 class="heading heading-h5 line-height-1-39"><a href="{{url('blog/' . $blog->slug)}}">{{ $blog->title }}</a></h5>
                                <a href="{{url('blog/' . $blog->slug)}}" class="post-read-more"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End Single Blog -->

            </div>

            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="brook-pagination-wrapper text-center pt--80">
                        <ul class="brook-pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- End Blog Grid Area -->

@endsection
