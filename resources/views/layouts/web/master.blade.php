@php use App\Enums\DefaultStatus; @endphp
<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    @include('layouts.web.style')

    <style>
        #logowid {
            width: 100%;
        }

        .header-default .header__wrapper .header-left .logo a img{
          padding: 0 !important
        }

        /* .new-header{
          position:  relative !important;
        } */

        .header-default.light-logo--version .mainmenu-wrapper .page_nav ul.mainmenu li a{
          color: "black" !important
        }

    </style>
</head>

<body class="template-color-26 template-font-1">

<!-- Start Preloader  -->
<div id="page-preloader" class="page-loading clearfix">
    <div class="page-load-inner">
        <div class="preloader-wrap">
            <div class="wrap-2">
                <div class=""><img src="{{asset('website/assets/img/icons/preloader.gif')}}" alt="survey preloader">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Preloader  -->
<!-- Wrapper -->
<div id="wrapper" class="wrapper">

    <!-- Header -->
    <header class="new-header br_header header-default position-from--top header-transparent light-logo--version haeder-fixed-width headroom--sticky header-mega-menu clearfix"
        style="padding-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="header__wrapper mr--0">
                        <!-- Header Left -->
                        <div class="header-left">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{asset(setting('logo')->value ?? '')}}" id="logowid" alt="Brook Images">
                                </a>
                            </div>
                        </div>
                        <!-- Mainmenu Wrap -->
                        <div class="mainmenu-wrapper d-none d-lg-block">
                            <nav class="page_nav">
                                <ul class="mainmenu">
                                    <li class="lavel-1"><a href="{{ route('home') }}"><span>{{__('Home')}}</span></a>
                                    </li>
                                    <li class="lavel-1"><a
                                            href="{{ route('about') }}"><span>{{__('About Us')}}</span></a></li>
                                    @php
                                        $categories = \App\Models\Category::where('status',DefaultStatus::Active->value)->get();
                                    @endphp
                                    <li class="lavel-1 with--drop slide-dropdown"><a
                                            href="#"><span>{{__('Our Products')}}</span></a>
                                        <ul class="dropdown__menu">
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{ route('category.slug', $category->slug) }}">
                                                        <span>{{ lang() == 'ar' ? $category->title_ar : $category->title_en }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="lavel-1"><a href="{{ route('contact') }}"><span>{{__('Contact Us')}}</span></a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="social-share d-none d-lg-block  social--transparent text-white">
                            <a class="text-black" href="{{setting('facebook')->value ?? ''}}"><i class="fab fa-facebook" style="font-size: xx-large"></i></a>
                            <a class="text-black" href="{{setting('linkedin')->value ?? ''}}"><i class="fab fa-linkedin" style="font-size: xx-large"></i></a>
                            <a class="text-black" href="{{setting('youtube')->value ?? ''}}"><i class="fab fa-youtube" style="font-size: xx-large"></i></a>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <!-- Start Popup Search Wrap -->
                            <a href="{{ setting('file_pdf') && setting('file_pdf')->value ? asset('storage/' . setting('file_pdf')->value) : '#' }}"
                              target="_blank" class="show-catalog btn btn-md btn-primary d-none d-lg-block" >
                                {{ __('Show Catalog') }}
                            </a>

                            <div
                                class="manu-hamber popup-mobile-click d-block d-lg-none light-version d-block d-xl-none pl_md--10 pl_sm--10">
                                <div>
                                    <i></i>
                                </div>
                            </div>

                            <div class="language-switcher">
                                <select id="languageSwitcher" onchange="changeLanguage(this.value)">
                                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English
                                    </option>
                                    <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية
                                    </option>
                                </select>
                            </div>
                            <!-- End Hamberger -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--// Header -->

    <!-- Start Popup Menu -->
    <div class="popup-mobile-manu popup-mobile-visiable">
        <div class="inner">
            <div class="mobileheader">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ setting('logo')->value ?? '' }}" alt="Multipurpose">
                    </a>
                </div>
                <a class="mobile-close" href="#"></a>
            </div>
            <div class="menu-content">
                <ul class="menulist object-custom-menu">
                    <li><a href="{{ route('home') }}"><span>{{__('Home')}}</span></a></li>
                    <li class="lavel-1"><a href="{{ route('about') }}"><span>{{__('About Us')}}</span></a></li>
                    <li class="lavel-1 with--drop slide-dropdown"><a href="#"><span>{{__('Our Products')}}</span></a>
                        <ul class="dropdown__menu">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('category.slug', $category->slug) }}"><span>{{ lang() == 'ar' ? $category->title_ar : $category->title_en }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>
                    {{-- @if (\App\Models\admin\Active_section::where('name', 'blog_page')->first()->value == 1) --}}
                    {{-- <li class="lavel-1"><a href="{{ route('blogs') }}"><span>{{__('Blogs')}}</span></a></li> --}}
                    {{-- @endif --}}

                    <li class="lavel-1"><a href="{{ route('contact') }}"><span>{{__('Contact Us')}}</span></a></li>
                </ul>
            </div>

            <a href="{{ setting('file_pdf') && setting('file_pdf')->value ? asset('storage/' . setting('file_pdf')->value) : '#' }}"
                target="_blank" class="show-catalog btn btn-sm btn-primary" >
                  {{ __('Show Catalog') }}
              </a>

              <!-- In drawer -->
            <div class="social-share d-flex d-lg-none social--transparent text-white">
              <a class="text-black" href="{{setting('facebook')->value ?? ''}}"><i class="fab fa-facebook" style="font-size: xx-large"></i></a>
              <a class="text-black" href="{{setting('linkedin')->value ?? ''}}"><i class="fab fa-linkedin" style="font-size: xx-large"></i></a>
              <a class="text-black" href="{{setting('youtube')->value ?? ''}}"><i class="fab fa-youtube" style="font-size: xx-large"></i></a>
            </div>

        </div>
    </div>
    <!-- End Popup Menu -->

    <!-- Start Brook Search Popup -->
    <div class="brook-search-popup">
        <div class="inner">
            <div class="search-header">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{asset(setting('logo')->value ?? '')}}" id="logowid" alt="Brook Images">
                    </a>
                </div>
                <a href="#" class="search-close"></a>
            </div>
        </div>
    </div>
    <!-- End Brook Search Popup -->


    <!-- START REVOLUTION SLIDER -->
    <div class="slider-revoluation">
        @yield('slider')
    </div>
    <!-- END REVOLUTION SLIDER -->

    <!-- Page Conttent -->
    <main class="page-content">
        @yield('content')
    </main>
    <!--// Page Conttent -->
</div>


{{-- footer --}}
@include('layouts.web.footer')

<!--// Wrapper -->
<!-- Js Files -->
@include('layouts.web.script')

@stack('js')
</body>

</html>
