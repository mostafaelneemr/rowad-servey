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
                                    <p>{{setting('email')->value ?? ''}}</p>
                                </div>

                                <div class="address mt--60 mb--60 wow move-up">
                                    <h3 class="heading">Message us</h3>
                                    <p><a href="#">{{setting('email')->value ?? ''}}</a></p>
                                    <p><a href="#">{{setting('mobile')->value ?? ''}}</a></p>
                                </div>

                                <ul class="social-icon icon-size-medium text-dark text-start tooltip-layout move-up wow">
                                    <li class="facebook"><a href="{{setting('facebook')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Facebook">
                                            <i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="linkedin"><a href="{{setting('linkedin')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Linkedin">
                                            <i class="fab fa-linkedin"></i></a></li>
                                    <li class="youtube"><a href="{{setting('youtube')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Youtube">
                                            <i class="fab fa-youtube"></i></a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                        <!-- Start COntact Form -->
                        <div class="col-xl-8 offset-xl-1 col-lg-9 col-12 mt_md--40 mt_sm--40">
                            <div class="contact-form">
                                <div id="form-alert-message"></div>
                                @if(session()->has('notify'))
                                    <div class="alert alert-{{ session('notify')['type'] }}" >
                                        {{ session('notify')['message'] }}
                                    </div>
                                @endif
                                <form name="contact-form" action="{{route('sendmail')}}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <span class="form-icon far fa-user"></span>
                                                <input type="text" name="name" placeholder="{{__('Name *')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <span class="form-icon far fa-envelope"></span>
                                                <input type="email" name="email" placeholder="{{__('Email *')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <span class="form-icon fas fa-mobile-alt"></span>
                                                <input type="text" name="telephone" placeholder="{{__('Phone number')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <span class="form-icon fas fa-mobile-alt"></span>
                                                <input type="text" name="whatsapp_number" placeholder="{{__('whats\'app number')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <textarea placeholder="{{__('Your message')}}" name="message"></textarea>
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
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>

    <script>
        @if(session()->has('notify'))
        let type = "{{ session('notify')['type'] }}";
        let message = "{{ session('notify')['message'] }}";

        if (type === 'success') {
            toastr.success(message);
        } else if (type === 'error') {
            toastr.error(message);
        }
        @endif
    </script>

@endsection
