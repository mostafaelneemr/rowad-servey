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

        .address .studio-entry {
            margin-bottom: 8px;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')

    <!-- Start Contact Area -->
    <div class="content-after-navbar">
        <div class="contact-us-area bgContact">

            <div class="bk-contact-area section-pb-xl bg_color--1" style="margin-top: 100px">
                <div class="container">
                    <h1 class=" text-center mb-5">{{__('Contact Us')}}</h1>
                    <div class="row">
                        <!-- Start Address -->
                        <div class="col-xl-3 col-lg-3 col-12">
                            <div class="address-inner">
                                <div class="address wow move-up">
                                    <h3 class="heading">{{ __('Visit our Location') }}</h3>

                                    @for ($i = 1; $i <= 5; $i++)
                                        @php
                                            $address = setting('address_' . $i)->value ?? null;
                                            $phone = setting('phone_' . $i)->value ?? null;
                                        @endphp

                                        @if ($address || $phone)
                                            <div class="studio-entry">
                                                <span>{{ $address }}</span> @if($phone) - @endif <span>{{ $phone }}</span>
                                            </div>
                                        @endif
                                    @endfor
                                </div>

                                <div class="address mt--60 mb--60 wow move-up">
                                    <h3 class="heading">{{__('Message us')}}</h3>
                                    <p><a href="#">{{setting('email')->value ?? ''}}</a></p>
                                </div>

                                <ul class="social-icon icon-size-medium text-dark text-start tooltip-layout move-up wow">
                                    <li class="facebook">
                                        <a href="{{setting('facebook')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Facebook">
                                            <i class="fab fa-facebook" style="font-size: xx-large"></i></a>
                                    </li>
                                    <li class="linkedin"><a href="{{setting('linkedin')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Linkedin">
                                            <i class="fab fa-linkedin" style="font-size: xx-large"></i></a></li>
                                    <li class="youtube"><a href="{{setting('youtube')->value ?? ''}}" class="link hint--bounce hint--top hint--theme" aria-label="Youtube">
                                            <i class="fab fa-youtube" style="font-size: xx-large"></i></a>
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
                                                <div class="form-submit">
                                                    <input type="submit" class="fs-5" value="{{__('Send message')}}">
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
