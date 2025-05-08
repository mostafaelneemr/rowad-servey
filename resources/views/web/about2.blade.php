@extends('layouts.web.master')

@section('style')

<style>

    .counter-item {
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 40px 20px;
        transition: all 0.3s ease;
        background: #fff;
    }

    .counter-item:hover {
        background-color: #0D0D1D;
        color: #fff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border-color: #000;
        transform: translateY(-5px);
    }

    .counter-item:hover h2{
        color: #fff !important;
    }

    .icon-box.no-border .inner{
        padding: 20px !important;
        border-radius: 10px !important
    }


</style>

@endsection

@section('content')

    <div class="brook-whatdo-area ptb--150 ptb-md--80 ptb-sm--60 bg_color--1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img class="w-100" src="../../img/Construction/about-1.jpg" alt="about images">
                    </div>
                </div>
                <div class="col-lg-6 mt_sm--40 mt_md--40">
                    <div class="bk-title--default text-start">
                        <h5 class="heading heading-h5 theme-color wow move-up">What we do</h5>
                        <div class="bkseparator--30"></div>
                        <h3 class="heading heading-h3 wow move-up">Fresh ideas & unique designs</h3>
                    </div>
                    <div class="row">

                        <!-- Start Single -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="what-do mt--30">
                                <div class="content">
                                    <h5 class="heading heading-h5 wow move-up">Original ideas</h5>
                                    <div class="bkseparator--20"></div>
                                    <p class="bk_pra wow move-up">We work with clients from all over the world.
                                        We had worked with and serving over 2000 customers and 1000 global
                                        companies across 13 countries in the world.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single -->

                        <!-- Start Single -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="what-do mt--30">
                                <div class="content">
                                    <h5 class="heading heading-h5 wow move-up">Graphic designs</h5>
                                    <div class="bkseparator--20"></div>
                                    <p class="bk_pra wow move-up">Our quality of service assessment involves
                                        controlling and managing resources by setting priorities for specific
                                        types of clients and projects on the system.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single -->

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="counterup-area py-20 bg_color--5 py-5">
        <div class="container">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">{{__('Statistics Reflecting Our Excellence')}}</h2>
            </div>
            <div class="row text-center">
                @foreach($statistics as $sta)
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <div class="counter-item border rounded-lg transition-all duration-300 hover:shadow-lg hover:border-black">
                            <h2 class="text-5xl font-extrabold text-black mb-3">{{$sta->number}}</h2>
                            <p class="text-gray-600 text-lg">{{ lang() == 'ar' ? $sta->title_ar : $sta->title_en }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="brook-icon-boxes-area basic-thine-line ptb--80 ptb_md--80 ptb_sm--80">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="row bg_color--1 pt--100 space_dec--110 poss_relative basic-thick-line-theme-4">
                        <!-- Start Single Icon Boxes -->

                        <div class="brook-section-title text-center mb-3">
                            <h3 class="heading heading-h6 theme-color">{{__('Our Services')}}</h3>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow move-up">
                            <div class="icon-box text-center no-border">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="ion-ios-cart-outline"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="heading heading-h5">{{__('Sale and rent')}}</h5>
                                        <p class="bk_pra">{{__('We offer a variety of the latest GPS, Total Station, Levels, and Laser Scanners.')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Icon Boxes -->

                        <!-- Start Single Icon Boxes -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_mobile--70 wow move-up">
                            <div class="icon-box text-center no-border">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="ion-ios-cog-outline"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="heading heading-h5">{{__('Maintenance and technical support')}}</h5>
                                        <p class="bk_pra">{{__('A specialized team to maintain the equipment and ensure its readiness at work sites, while providing original spare parts.')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Icon Boxes -->

                        <!-- Start Single Icon Boxes -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--70 mt_sm--70 wow move-up">
                            <div class="icon-box text-center no-border">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="ion-ios-browsers-outline"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="heading heading-h5">{{__('Technical training and qualification')}}</h5>
                                        <p class="bk_pra">{{__('Practical training courses on the use of surveying equipment and software, with certificates of attendance.')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Icon Boxes -->

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--70 mt_sm--70 wow move-up">
                            <div class="icon-box text-center no-border">
                                <div class="inner">
                                    <div class="icon">
                                        <i class="ion-ios-filing-outline"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="heading heading-h5">{{__('Calibration and inspection of devices')}}</h5>
                                        <p class="bk_pra">{{__('Periodic calibration with certified certificates to ensure accuracy of work in surveying projects.')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Testimonial Area -->
    <div class="brook-testimonial-area ptb--80 ptb-md--80 ptb-sm--60 bg_color--6 slick-arrow-hover">
        <div class="text-center">

            <h5>{{__('customer reviews')}}</h5>
            <h3>{{__('What do our clients say about us?')}}</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb--30">

                    <div class="brook-element-carousel slick-arrow-center slick-dots-bottom wow move-up"
                         data-slick-options='{
                                    "spaceBetween": 15,
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "infinite": true,
                                    "dots": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fas fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fas fa-angle-right" }
                                }'
                         data-slick-responsive='[
                                    {"breakpoint":770, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":577, "settings": {"slidesToShow": 1}},
                                    {"breakpoint":481, "settings": {"slidesToShow": 1}}
                                ]'>

                        <!-- Start Single Testimonial -->
                        @foreach($testimonials as $testimonial)

                            <div class="testimonial testimonial_style--1 rounded" >
                                <div class="content">
                                    <p class="bk_pra">{{lang() == 'ar' ? $testimonial->text_ar : $testimonial->text_en}}</p>
                                    <div class="testimonial-info">
                                        <div class="clint-info">
                                            <h6>{{lang() == 'ar' ? $testimonial->name_ar : $testimonial->name_en}}</h6>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <span class="fa fa-quote-right"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Single Testimonial -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Area -->


@endsection




