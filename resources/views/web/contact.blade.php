@extends('layouts.web.master')

@section('title')
    Contact
@endsection

@section('style')
    <style>
        .bgContact {
            background-color: #222933
        }

        .bgButton {
            background-color: #505e71 !important;
            border: 1px solid #222933 !important;
        }

        /* Add this */
        .content-after-navbar {
            padding-top: 80px;
        }

        @media (max-width: 768px) {
            .content-after-navbar {
                padding-top: 60px;
            }
        }
    </style>
@endsection

@section('content')

    <!-- Start Contact Area -->
    <div class="content-after-navbar">
        <div class="contact-us-area bgContact">
            {{--        <div class="contauner-fluid">--}}
            {{--            --}}{{-- @include('system.message') --}}
            {{--            <div class="row">--}}

            {{--                <div class="col-lg-6 col-md-6 col-12 pl--270 pt--160 pb--160 pl_lg--50 pl_md--50 pt_md--80 pb_md--80 pl_sm--50 pr_sm--50 pt_sm--80 pb_sm--80" >--}}
            {{--                    <div class="contact-address-wrapper">--}}
            {{--                        <div class="classic-address text-start">--}}
            {{--                            <h4 class="heading heading-h4 text-white">{{ setting('location_title') }}</h4>--}}
            {{--                            <div class="desc mt--15">--}}
            {{--                                <p class="bk_pra line-height-2-22 text-white">{{ setting('address') }}</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="classic-address text-start mt--30 ">--}}
            {{--                            <h4 class="heading heading-h4 text-white">{{ setting('message_title') }}</h4>--}}
            {{--                            <div class="desc mt--15 mb--80">--}}
            {{--                                <p class="bk_pra line-height-1-87">--}}
            {{--                                    <a class="text-white" href="mailto:{{ setting('email') }}">{{ setting('email') }}</a> <br>--}}

            {{--                                    @if (App\Models\setting::where('name' , 'second_email')->first()->value != Null)--}}
            {{--                                        <a class="text-white" href="mailto:{{ setting('second_email') }}">{{ setting('second_email') }}</a> <br>--}}
            {{--                                    @endif--}}

            {{--                                    <a class="text-white" href="https://wa.me/{{ setting('phone') }}">{{ setting('phone') }}</a><br>--}}

            {{--                                    @if (App\Models\setting::where('name' , 'second_phone')->first()->value != Null)--}}
            {{--                                        <a class="text-white" href="#">{{ setting('second_phone') }}</a><br>--}}
            {{--                                    @endif--}}
            {{--                                </p>--}}
            {{--                            </div>--}}
            {{--                            <div class="social-share social--transparent">--}}
            {{--                                <a class="text-white" href="{{ setting('facebook') }}"><i class="fab fa-facebook"></i></a>--}}
            {{--                                <a class="text-white" href="{{ setting('twitter') }}"><i class="fab fa-twitter"></i></a>--}}
            {{--                                <a class="text-white" href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>--}}
            {{--                                <a class="text-white" href="{{ setting('linked') }}" target="_blank"><i class="fab fa-linkedin"></i></a>--}}
            {{--                                <a class="text-white" href="{{ setting('dribbble') }}"><i class="fab fa-dribbble"></i></a>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <div class="col-lg-6 col-md-6 col-12  pt--160 pb--160 pl--60 pr--200 pr_lg--50 pr_md--50 pr_sm--50 pb_md--80 pt_md--80 pl_sm--50 pt_sm--80 pb_sm--80">--}}
            {{--                    <div class="contact-form-inner">--}}
            {{--                        <div class="brook-title mb--40">--}}
            {{--                            <h1 class="heading heading-h4 text-white">{{ setting('contact_title') }}</h1>--}}
            {{--                        </div>--}}

            {{--                        @if(Session::has('status'))--}}
            {{--                            <div class="alert alert-success">--}}
            {{--                                {{Session('status')}}--}}
            {{--                            </div>--}}
            {{--                        @endif--}}

            {{--                        @if(Session::has('errors'))--}}
            {{--                            <div class="alert alert-danger">--}}
            {{--                                {{Session('errors')}}--}}
            {{--                            </div>--}}
            {{--                        @endif--}}

            {{--                        <div class="contact-form">--}}
            {{--                            <form name="contactForm" action="{{route('sendmail')}}" method="POST">--}}
            {{--                                @csrf--}}
            {{--                                <div class="row">--}}
            {{--                                    <div class="col-lg-12">--}}
            {{--                                        <input name="name" id="name" type="text" placeholder="Name *" required>--}}
            {{--                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror--}}
            {{--                                    </div>--}}

            {{--                                    <div class="col-lg-12 mt--30">--}}
            {{--                                        <input name="email" id="email" type="email" placeholder="Email *" required>--}}
            {{--                                        @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror--}}
            {{--                                    </div>--}}

            {{--                                    <div class="col-lg-12 mt--30">--}}
            {{--                                        <input type="text" id="phone" name="phone" placeholder="Phone number" required>--}}
            {{--                                        @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror--}}
            {{--                                    </div>--}}

            {{--                                    <div class="col-lg-12 mt--30">--}}
            {{--                                        <textarea name="message" id="message" placeholder="Your message"></textarea>--}}
            {{--                                    </div>--}}

            {{--                                    <div class="col-lg-12 mt--30">--}}
            {{--                                        <input type="submit" value="Send Message" class="btn bgButton btn-primary" />--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </form>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--            </div>--}}
            {{--        </div>--}}
            <!-- End Contact Area -->


            <div class="bk-contact-area section-pb-xl bg_color--1 mt-5">
                <div class="container">
                    <div class="row">
                        <!-- Start Address -->
                        <div class="col-xl-3 col-lg-3 col-12">
                            <div class="address-inner">
                                <div class="address wow move-up">
                                    <h3 class="heading">Visit our studio at</h3>
                                    <p>2005 Stokes Isle Apt. 896, Shop Plaza 10010, USA</p>
                                </div>

                                <div class="address mt--60 mb--60 wow move-up">
                                    <h3 class="heading">Message us</h3>
                                    <p><a href="#">info@yourdomain.com</a></p>
                                    <p><a href="#">(+68) 120034509</a></p>
                                </div>

                                <ul class="social-icon icon-size-medium text-dark text-start tooltip-layout move-up wow">
                                    <li class="facebook"><a href="#" class="link hint--bounce hint--top hint--theme"
                                                            aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter"><a href="#" class="link hint--bounce hint--top hint--theme"
                                                           aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="instagram"><a href="#" class="link hint--bounce hint--top hint--theme"
                                                             aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="dribbble"><a href="#" class="link hint--bounce hint--top hint--theme"
                                                            aria-label="Dribbble"><i class="fab fa-dribbble"></i></a>
                                    </li>
                                    <li class="pinterest"><a href="#" class="link hint--bounce hint--top hint--theme"
                                                             aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!-- Start COntact Form -->
                        <div class="col-xl-8 offset-xl-1 col-lg-9 col-12 mt_md--40 mt_sm--40">
                            <div class="contact-form">
                                <form class="form-style--1 wow move-up" action="#">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <span class="form-icon far fa-user"></span>
                                                <input type="text" placeholder="{{__('Name *')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <span class="form-icon far fa-envelope"></span>
                                                <input type="text" placeholder="{{__('Email *')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <span class="form-icon fas fa-mobile-alt"></span>
                                                <input type="text" placeholder="{{__('Phone number')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <span class="form-icon fas fa-mobile-alt"></span>
                                                <input type="text" placeholder="{{__('whats\'app number')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <textarea placeholder="{{__('Your message')}}"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-action">
                                                <div class="form-description">
                                                    I’m available for commissions and collaborations, and i’m <br>
                                                    excited to hear from you about new projects
                                                </div>
                                                <div class="form-submit">
                                                    <input type="submit" value="{{__('Send message')}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Area -->

        </div><!-- Footer -->
        <footer
            class="page-footer bg_color--5 pl--150 pr--150 pl_lg--30 pr_lg--30 pl_md--30 pr_md--30 pl_sm--5 pr_sm--5">
            <!-- Start Footer Top Area -->
            <div class="bk-footer-inner pt--150 pb--30 pt_sm--100">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget text-var--2">
                                <div class="logo">
                                    <a href="index.html">

                                        <h4>Rowad Surveying Co</h4>
                                    </a>
                                </div>
                                <div class="footer-inner">
                                    <div class="social-share social--transparent text-white">
                                        <a class="text-black" href="#"><i class="fab fa-facebook"
                                                                          style="font-size: xx-large"></i></a>
                                        <a class="text-black" href="#"><i class="fab fa-linkedin"
                                                                          style="font-size: xx-large"></i></a>
                                        <a class="text-black" href="#"><i class="fab fa-youtube"
                                                                          style="font-size: xx-large"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt_mobile--40">
                            <div class="footer-widget text-var--2 menu--about">
                                <h2 class="widgettitle text-black">Home</h2>
                                <div class="footer-menu">
                                    <ul class="ft-menu-list bk-hover">
                                        <li><a class="text-black" href="about-us-01.html">About</a></li>
                                        <li><a class="text-black" href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt_mobile--40">
                            <div class="footer-widget text-var--2 menu--about">
                                <h2 class="widgettitle text-black">Our Product</h2>
                                <div class="footer-menu">
                                    <ul class="ft-menu-list bk-hover">
                                        <li><a class="text-black" href="about-us-01.html">About Us</a></li>
                                        <li><a class="text-black" href="team.html">Team</a></li>
                                        <li><a class="text-black" href="career.html">Career</a></li>
                                        <li><a class="text-black" href="services-classic.html">Services</a></li>
                                        <li><a class="text-black" href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                            <div class="footer-widget text-var--2 menu--contact">
                                <h2 class="widgettitle text-black">Contact</h2>
                                <div class="footer-address">
                                    <div class="bk-hover">
                                        <p class="text-black">2005 Stokes Isle Apt. 896, <br> Vacaville 10010, USA</p>
                                        <p><a class="text-black" href="#">info@yourdomain.com</a></p>
                                        <p><a class="text-black" href="#">(+68) 120034509</a></p>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Start Footer Top Area -->

            <!-- Start Copyright Area -->
            <div class="copyright ptb--50 text-var-2">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="copyright-right text-md-end text-center">
                                <p class="text-black">© 2019 Brook. <a href="https://hasthemes.com/">All Rights
                                        Reserved.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
    </div>
@endsection

@section('script')
@endsection
