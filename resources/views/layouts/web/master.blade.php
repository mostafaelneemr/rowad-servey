@php use App\Enums\DefaultStatus; @endphp
<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    @include('layouts.web.style')

    <style>
        #logowid {
            width: 100%;
        }

        /* Ahmed Edits */
        header{
          background: white !important;
        }

        .header-default .header__wrapper .header-left .logo a img{
          padding: 0 !important
        }

        /* Make header relative (not absolute) by default */
        .br_header {
          position: relative;
          background: white !important;
          transition: all 0.3s ease;
          width: 100%;
          z-index: 999;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .mainmenu-wrapper .page_nav ul.mainmenu li.lavel-1>a {
          color: #000 !important
        }


        .facebook-icon{
          color: #3b5998 !important
        }
        .linked-icon{
          color: #0077b5 !important
        }
        .youtube-icon{
          color: #ff0000 !important
        }

      #languageSwitcher {
        /* Base Styles */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding: 8px 32px 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        background-color: white;
        color: #334155;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);

        /* Dropdown Arrow */
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px;

        /* Focus/Hover States */
        &:hover {
          border-color: #94a3b8;
          box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        &:focus {
          outline: none;
          border-color: #6366f1;
          box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        /* Right-to-Left Support for Arabic */
        option[value="ar"] {
          direction: rtl;
          text-align: right;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
      }

      .manu-hamber.light-version{
        color: #f1ac5b !important
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
    <header class="new-header br_header header-default position-from--top header-transparent  haeder-fixed-width headroom--sticky header-mega-menu clearfix"
        style="padding-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="header__wrapper mr--0 gap-3">
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

                        <div class="social-share d-none d-lg-block  social--transparent ">
                            <a  class="whatsapp-icon" href="{{setting('whatsapp_number')->value ?? ''}}"><i class="fab fa-whatsapp" style="font-size: xx-large"></i></a>
                            <a  class="facebook-icon" href="{{setting('facebook')->value ?? ''}}"><i class="fab fa-facebook" style="font-size: xx-large"></i></a>
                            <a class="linked-icon" href="{{setting('linkedin')->value ?? ''}}"><i class="fab fa-linkedin" style="font-size: xx-large"></i></a>
                            <a class="youtube-icon" href="{{setting('youtube')->value ?? ''}}"><i class="fab fa-youtube" style="font-size: xx-large"></i></a>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <!-- Start Popup Search Wrap -->
                            <a href="{{ setting('file_pdf') && setting('file_pdf')->value ? asset('storage/' . setting('file_pdf')->value) : '#' }}"
                              target="_blank" class="show-catalog btn btn-md d-none d-lg-block text-white"
                               style="background-color:#06063c ;color: #0a0a0a;font-weight: 500">
                                {{ __('Show Catalog') }}
                            </a>

                            <div class="manu-hamber popup-mobile-click d-block d-lg-none light-version d-block d-xl-none pl_md--10 pl_sm--10">
                                <div>
                                    <i></i>
                                </div>
                            </div>

                            <div class="language-switcher">
                                <select id="languageSwitcher" onchange="changeLanguage(this.value)" style="font-weight: bold">
                                    <option value="en" style="font-weight: bold" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="ar" style="font-weight: bold" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
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
