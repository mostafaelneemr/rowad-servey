<!-- Footer -->
<footer class="page-footer bg_color--5 pl--150 pr--150 pl_lg--30 pr_lg--30 pl_md--30 pr_md--30 pl_sm--5 pr_sm--5">
    <!-- Start Footer Top Area -->
    <div class="bk-footer-inner pt--50 pb--30 pt_sm--100">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget text-var--2" style="margin-top: -60px">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset(setting('logo')->value ?? '')}}" alt="{{__('Rowad Survey Co')}}">
                            </a>
                        </div>
                        <div class="footer-inner">
                            <div class="social-share social--transparent text-white">
                                <a class="text-black" href="{{setting('facebook')->value ?? ''}}"><i class="fab fa-facebook" style="font-size: xx-large"></i></a>
                                <a class="text-black" href="{{setting('linkedin')->value ?? ''}}"><i class="fab fa-linkedin" style="font-size: xx-large"></i></a>
                                <a class="text-black" href="{{setting('youtube')->value ?? ''}}"><i class="fab fa-youtube" style="font-size: xx-large"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt_mobile--40">
                    <div class="footer-widget text-var--2 menu--about">
                        <h2 class="widgettitle text-black">{{__('Home')}}</h2>
                        <div class="footer-menu">
                            <ul class="ft-menu-list bk-hover">
                                <li><a class="text-black" href="{{route('about')}}">{{__('About Us')}}</a></li>
                                <li><a class="text-black" href="{{route('contact')}}">{{__('Contact Us')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt_mobile--40">
                    <div class="footer-widget text-var--2 menu--about">
                        <h2 class="widgettitle text-black">{{__('Our Products')}}</h2>
                        <div class="footer-menu">
                            <ul class="ft-menu-list bk-hover">
                                @foreach($categories as $category)
                                    <li><a class="text-black"
                                           href="{{route('category.slug',$category->id)}}">{{lang() == 'ar' ? $category->title_ar : $category->title_en}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                    <div class="footer-widget text-var--2 menu--contact">
                        <h2 class="widgettitle text-black">{{__('Contact Us')}}</h2>
                        <div class="footer-address">
                            <div class="bk-hover">
                                <p class="text-black">{{__('Address:')}} {{setting('address')->value ?? ''}}</p>
                                <p><a class="text-black" href="mailto:{{ setting('email')->value }}">{{__('Email:')}} {{setting('email')->value ?? ''}}</a></p>
                                <p><a class="text-black" href="">{{__('Mobile Number')}} {{setting('mobile')->value ?? ''}}</a></p>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Start Footer Top Area -->

    <!-- Start Copyright Area -->
    <div class="copyright text-var-2">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright-right text-md-end text-center">
                        <p class="text-black">© 2025 All Rights Reserved
                            <u><strong><a class="text-dark" href="https://elnemr.info/">Mostafa Elnemr </a></strong></u></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
</footer>
<!--// Footer -->
