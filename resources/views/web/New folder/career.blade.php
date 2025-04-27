@extends('layouts.web.master')

@php
    $meta_title = App\Models\admin\SeoSetting::find(1)->blog_meta_title;
    $meta_description = App\Models\admin\SeoSetting::find(1)->blog_meta_description;
@endphp

@section('title') Careers - Atech @endsection
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

@section('content')

    <!-- Start Breadcaump Area -->
    <div class="breadcaump-area pt--250 pb--340 pt_md--150 pb_md--150 pt_sm--150 pb_sm--150 breadcaump-title-bar breadcaump-title-white"
        data-black-overlay="2" style="background: url('{{ asset(setting('career_image')) }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcaump-inner text-center">
                        <h1 class="heading heading-h1">{{ setting('career_text') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcaump Area -->

    <div class="brook-career-area pb--70 space_dec--100 pt_md--70 pt_sm--70">
        <div class="container">
            <div class="row">

                <!-- Start Single Career -->
                @foreach ($careers as $career)
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="career mb--30">
                        <div class="inner">

                            <div class="title">
                                <h3 class="heading heading-h3 text-color-3">{{ $career->title }}</h3>
                            </div>

                            <div class="content mt--35">
                                <h6 class="heading heading-h6">ABOUT</h6>
                                <div class="desc mt--25">
                                    <p class="bk_pra">Location: {{ $career->location }}.</p>
                                    <div class="bkseparator--25"></div>
                                    <p class="bk_pra">{{ $career->desc }}</p>
                                </div>
                            </div>

                            <div class="career-list mt--65">
                                <h6 class="heading heading-h6">REQUIREMENTS</h6>
                                <!-- Start Single List -->
                                <div class="bk-list--2 move-up wow mt--35">
                                    {{-- <div class="list-header with-ckeck"> --}}
                                        <div class="title-wrap">
                                            <h6 class="heading heading-h5">{!! $career->req !!}</h6>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                <!-- End Single List -->
                                <div class="career-btn mt--60">
                                    <a class="brook-btn bk-btn-dark btn-sd-size btn-rounded space-between" href="mailto:{{ setting('email') }}">Apply
                                        now</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach
                <!-- End Single Career -->

            </div>
        </div>
    </div>

@endsection
