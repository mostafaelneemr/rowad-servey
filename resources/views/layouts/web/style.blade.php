@php
    $seosetting = App\Models\admin\SeoSetting::first();
    $keyword = $seosetting->keyword;
    $title = $seosetting->title;
@endphp

<meta charset="utf-8">

<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="index, follow">

<title> @yield('title') </title>

<title>@yield('meta_title', $title)</title>
<meta name="description" content="@yield('meta_description', $seosetting->description)" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="keywords" content="@yield('meta_keywords', $keyword)">

<meta name="author" content="{{ $seosetting->author }}">
<meta name="sitemap_link" content="{{ $seosetting->sitemap_link }}">

@yield('meta')
{{-- <meta itemprop="image" content="{{ static_asset(\App\GeneralSetting::first()->$logo) }}"> --}}

<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:creator" content="@author_handle">
{{-- <meta name="twitter:image" content="{{ static_asset(\App\GeneralSetting::first()->$logo) }}"> --}}

<meta property="og:type" content="website" />
<meta property="og:url" content="{{ route('home') }}" />
<meta property="og:image" content="{{ setting('site_logo') }}" />
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('/logo/logo.e75e3506-_1_-_1_.ico')}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{asset('logourl.jpg')}}">


<!-- CSS
============================================ -->
<!-- Plugins -->
<!-- <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/revoulation.css">
<link rel="stylesheet" href="css/plugins.css"> -->

<!-- Style Css -->
<!-- <link rel="stylesheet" href="style.css"> -->

<!-- Custom Styles -->
<!-- <link rel="stylesheet" href="css/custom.css"> -->


<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('website/assets/css/revoulation.css')}}">
<link rel="stylesheet" href="{{asset('website/assets/css/plugins.min.css')}}">
<link rel="stylesheet" href="{{asset('website/assets/style.min.css')}}">
@yield('style')
