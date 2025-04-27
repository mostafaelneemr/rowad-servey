@extends('layouts.web.master')

@section('title')
    Services - Atech
@endsection

@section('style')

    <style>
        .activeinner{
            height:300px;
        }
    
        .activeserv{
            color: #4d5e75; font-size: 40px;
        }

        .projectbg{
            background-image: url('{{asset('sbg.jpg')}}');
        }
    </style>

    <style>
        .icon-box .inner:hover{background-color: #222933;color: #fff};
    </style>

    <style>
        .icon-box .inner:hover .content h5.heading {color:#fff};
    </style>

    <style>
        .icon-box .inner:hover .services-icon i{color:#fff};
    </style>

@endsection

@section('content')

    <!-- Start Activities Boxes -->
    <div class="brook-icon-boxes-area poss_relative wavify-activation ptb--80 ptb-md--80 ptb-sm--60 bg_color--5 projectbg">
        {{-- <div class="wavify-wrapper">
            <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify-item"
                data-wavify-height="140" data-wavify-background="rgb(196,220,250)" data-wavify-amplitude="80"
                data-wavify-bones="4">
                <path d="M 0 141.71042689406383 C 237.875 148.50471572578806 237.875 148.50471572578806 475.75 145.107571309926 C 713.625 141.71042689406383 713.625 141.71042689406383 951.5 165.82491752026056 C 1189.375 189.9394081464571 1189.375 189.9394081464571 1427.25 193.5786122514483 C 1665.125 197.21781635643944 1665.125 197.21781635643944 1903 165.82491752026056 L 1903 7389 L 0 7389 Z"
                    fill="rgba(255,226,217,0.5)"></path>
            </svg>

            <svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify-item"
                data-wavify-height="140" data-wavify-background="#C4DCFA" data-wavify-amplitude="80"
                data-wavify-bones="3">
                <path d="M 0 147.22020568980648 C 317.16666666666663 183.65559797623268 317.16666666666663 183.65559797623268 634.3333333333333 165.43790183301957 C 951.4999999999999 147.22020568980648 951.4999999999999 147.22020568980648 1268.6666666666665 200.09089320557024 C 1585.833333333333 252.96158072133412 1585.833333333333 252.96158072133412 1903 183.26276877337258 L 1903 7389 L 0 7389 Z"
                    fill="#f5f5f5"></path>
            </svg>
        </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brook-section-title text-center mt-5">
                        <h1 class="heading heading-h3 text-white">Our Activities</h1>
                    </div>
                </div>
            </div>
            
            <div class="row mt--25">
                @foreach($activities as $active)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                    <div class="icon-box text-center mt--30 ">
                        <div class="inner mh-100 d-inline-block activeinner">
                            <div class="services-icon mb-3 activeserv">
                                @if ($active->fontawsome)
                                    <i class="{{ $active->fontawsome->name }}"></i>
                                @else
                                    <!-- Handle the case where there's no related FontAwesome model -->
                                    <i class="default-icon-class"></i>
                                @endif
                            </div> 
                            <div class="content">
                                <h5 class="heading heading-h5">{{ $active->title }}</h5>
                                <p class="bk_pra">{!! $active->desc !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Icon Boxes -->
                @endforeach
  
            </div>
        </div>
    </div>
    <!-- End Icon Boxes -->

@endsection

@section('script')
@endsection