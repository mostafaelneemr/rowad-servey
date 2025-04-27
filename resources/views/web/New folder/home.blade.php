@extends('web.index')

@section('style')
    <style>
        .single-hero-item {
            position: relative;
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .single-hero-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /*background-color: rgba(5, 0, 0, 0); !* Black overlay with full opacity *!*/
            z-index: 1;
        }

        .single-hero-item .container {
            position: relative;
            z-index: 2;
        }

        .hero-left-image img {
            max-width: 100%;
            height: auto;
        }

        .hero-text {
            /*color: #fff;*/
            text-align: left;
        }

        .hero-text p {
            font-size: 18px;
            margin-bottom: 30px;
            color: whitesmoke;
        }

        .hero-text .btn {
            padding: 10px 20px;
            font-size: 16px;
        }

        .single-hero-item.set-bg::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: inherit;
            background-size: cover;
            background-position: center;
            opacity: 0.5; /* Adjust as needed */
            z-index: 0;
        }

        .single-hero-item.set-bg {
            position: relative;
            /*background: none !important; !* disable direct background since it's handled above *!*/
            overflow: hidden;
        }

        /* Frame for content */
        .border-frame {
            position: relative;
            z-index: 1;
            border: 3px solid #fff;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.8); /* transparent frame background */
            border-radius: 15px;
            color: #fff;
        }

        /* Text styles */
        .hero-text h3 {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 20px;
            color: whitesmoke;
        }
    </style>
@endsection

@section('content')

    <!-- Hero Section Begin -->

    <section class="hero-section">
    @foreach($sliders as $slider)
            <div class="hero-items owl-carousel">
                <div class="single-hero-item set-bg opacity-50" data-setbg="{{ $slider->image }}">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Left Section: Image -->
                            <div class="col-lg-6">
                                <div class="hero-left-image">
                                    <img src="{{asset('img/68060893d6bb7.png')}}" alt="Left Image">
                                </div>
                            </div>
                            <!-- Right Section: Text and Button -->
                            <div class="col-lg-6">
                                <div class="hero-text border-frame">
                                    <h3><u><strong>Your Bold Underlined Heading</strong></u></h3>
                                    <p>Your descriptive text goes here.</p>
                                    <a href="#" class="btn btn-primary">Call to Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- Hero End -->


    <!-- Class Time Section Begin -->
    {{-- <section class="classtime-section class-time-table spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Classtime Table</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="timetable-controls">
                        <ul>
                            <li class="active" data-tsfilter="all">all class</li>
                            <li data-tsfilter="crossfit">crossfit</li>
                            <li data-tsfilter="lunge">lunge ball</li>
                            <li data-tsfilter="ppsr">ppsr</li>
                            <li data-tsfilter="walls">walls</li>
                            <li data-tsfilter="candy">candy</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="classtime-table">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="workout-time">10.00</td>
                            <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                <span>10.00 - 14.00</span>
                                <h6>Crossfit lv1</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                <span>10.00 - 15.00</span>
                                <h6>Crossfit lv1</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="lunge">
                                <span>10.00 - 13.00</span>
                                <h6>Lunge Ball Bur</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="lunge">
                                <span>10.00 - 13.30</span>
                                <h6>Lunge Ball Bur</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="workout-time">14.00</td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="lunge">
                                <span>14.00 - 17.00</span>
                                <h6>Lunge Ball Bur</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                <span>14.00 - 17.00</span>
                                <h6>Crossfit lv1</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="walls">
                                <span>14.00 - 15.30</span>
                                <h6>Walls to Knees</h6>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="workout-time">16.00</td>
                            <td class="hover-bg ts-item" data-tsmeta="lunge">
                                <span>16.00 - 18.00</span>
                                <h6>Lunge Ball Bur</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="candy">
                                <span>16.00 - 19.00</span>
                                <h6>Candy</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="candy">
                                <span>16.00 - 19.00</span>
                                <h6>Candy</h6>
                            </td>
                            <td class="hover-bg ts-item" data-tsmeta="ppsr">
                                <span>16.00 - 17.00</span>
                                <h6>Ppsr</h6>
                            </td>
                            <td class="hover-bg ts-item" data-tsmeta="murph">
                                <span>16.00 - 20.00</span>
                                <h6>murph</h6>
                            </td>
                        </tr>
                        <tr>
                            <td class="workout-time">18.00</td>
                            <td class="hover-bg ts-item" data-tsmeta="walls">
                                <span>18.00 - 20.00</span>
                                <h6>Walls to Knees</h6>
                            </td>
                            <td class="hover-bg ts-item" data-tsmeta="ppsr">
                                <span>18.00 - 20.00</span>
                                <h6>ppsr</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="chelsea">
                                <span>18.00 - 22.00</span>
                                <h6>Chelsea</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="annie">
                                <span>18.00 - 22.00</span>
                                <h6>annie</h6>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="workout-time">20.00</td>
                            <td class="hover-bg ts-item" data-tsmeta="lunge">
                                <span>21.00 - 23.00</span>
                                <h6>Lunge Ball Bur</h6>
                            </td>
                            <td class="hover-bg ts-item" data-tsmeta="walls">
                                <span>20.00 - 22.00</span>
                                <h6>Walls to Knees</h6>
                            </td>
                            <td class="hover-bg ts-item" data-tsmeta="walls">
                                <span>20.30 - 23.00</span>
                                <h6>Walls to Knees</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                <span>22.00 - 23.00</span>
                                <h6>Crossfit Lv2</h6>
                            </td>
                            <td></td>
                            <td class="hover-bg ts-item" data-tsmeta="crossfit">
                                <span>21.00 - 23.00</span>
                                <h6>Crossfit Lv2</h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section> --}}
    <!-- Class Time Section End -->

    <!-- Price Plan Section Begin -->
    {{-- <section class="price-section spad set-bg" data-setbg="img/price-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>CHOOSE YOUR PRICING PLAN</h2>
                        <p>These reports started to surface when Congress was having hearings about the<br />
                            painkiller, Vioxx. A Food and Drug Administration staff member.</p>
                    </div>
                    <div class="toggle-option">
                        <ul>
                            <li>Monthly</li>
                            <li>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li>Years</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-price-plan">
                        <h4>Normal</h4>
                        <div class="price-plan">
                            <h2>55 <span>$</span></h2>
                            <p>Monthly</p>
                        </div>
                        <ul>
                            <li>Unlimited access to the gym</li>
                            <li>1 classes per week</li>
                            <li>FREE drinking package</li>
                            <li>1 Free personal training</li>
                        </ul>
                        <a href="#" class="primary-btn price-btn">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price-plan">
                        <h4>Professional</h4>
                        <div class="price-plan">
                            <h2>95 <span>$</span></h2>
                            <p>Monthly</p>
                        </div>
                        <ul>
                            <li>Unlimited access to the gym</li>
                            <li>2 classes per week</li>
                            <li>FREE drinking package</li>
                            <li>2 Free personal training</li>
                        </ul>
                        <a href="#" class="primary-btn price-btn">Get Started</a>
                        <div class="tic-text">
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price-plan">
                        <h4>Advanced</h4>
                        <div class="price-plan">
                            <h2>165 <span>$</span></h2>
                            <p>Monthly</p>
                        </div>
                        <ul>
                            <li>Unlimited access to the gym</li>
                            <li>6 classes per week</li>
                            <li>FREE drinking package</li>
                            <li>5 Free personal training</li>
                        </ul>
                        <a href="#" class="primary-btn price-btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Price Plan Section End -->

    <!-- Choseus Section Begin -->
    <section class="chooseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Why People Choose Us</h2>
                        <p>Our sport experts and latest sports equipment are the winning combination.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($items as $item)

                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="{{$item->image}}" alt="">
                        <h5>{{$item->title_en}}</h5>
                        <p>{{$item->text_en}} </p>
                    </div>
                </div>
                @endforeach()
            </div>
        </div>
    </section>
    <!-- Choseus Section End -->

{{--    @dd(setting('testimonial_image'))--}}
    <!-- Testimonial Section End -->
    <section class="testimonial-section set-bg spad" data-setbg="{{ setting('testimonial_image')->value }}">
        <div class="container">
            <div class="row">
                @foreach($testimonials as $testimonial)

                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                                @include('system.testimonial.rating',['rating' => $testimonial->rating])

                            <h4>{{ $testimonial->text_en }}</h4>
                            <div class="author-name">
                                <h5>{{ $testimonial->name_en }}</h5>
                                <span>{{ $testimonial->title_en }}</span>
                            </div>
                            <div class="author-pic">
                                <img src="{{ $testimonial->image }}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->


    <!-- Video Section Begin -->
    {{-- <section class="video-section set-bg" data-setbg="img/video-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <h2>Gym In Dowtown New York</h2>
                        <a href="https://www.youtube.com/watch?v=X_9VoqR5ojM" class="play-btn video-popup">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Video Section End -->

    <!-- Blog Section Begin -->
    {{-- <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>From Our Blog</h2>
                        <p>List of all news and events that take place related to us</p>
                    </div>
                </div>
            </div>
            <div class="row blog-gird">
                <div class="grid-sizer"></div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item large-item set-bg" data-setbg="img/blog/blog-1.jpg">
                        <a href="#" class="blog-text">
                            <div class="categories">Gym & Croosfit</div>
                            <h5>Many people sign up for affiliate programs</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item instagram-item">
                        <a href="#" class="instagram-text">
                            <div class="categories">Gym & Croosfit <i class="fa fa-instagram"></i></div>
                            <h5>Follow Our Classes Gyming on Instagram # BodyBuilding # photo</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item small-item set-bg" data-setbg="img/blog/blog-2.jpg">
                        <a href="#" class="blog-text">
                            <div class="categories">Gym & Croosfit</div>
                            <h5>Does Hydroderm Work</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item large-item xls-large set-bg" data-setbg="img/blog/blog-3.jpg">
                        <a href="#" class="blog-text">
                            <div class="categories">Gym & Croosfit</div>
                            <h5>Many people sign up for affiliate programs</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item large-item set-bg" data-setbg="img/blog/blog-4.jpg">
                        <a href="#" class="blog-text">
                            <div class="categories">Gym & Croosfit</div>
                            <h5>Many people sign up for affiliate programs</h5>
                        </a>
                        <div class="play-btn">
                            <a href="https://www.youtube.com/watch?v=X_9VoqR5ojM" class="play-in-btn video-popup">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-item small-item set-bg" data-setbg="img/blog/blog-5.jpg">
                        <a href="#" class="blog-text">
                            <div class="categories">Gym & Croosfit</div>
                            <h5>Your Antibiotic One Day To 10 Day Options</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Section End -->

    <!-- Cta Section Begin -->
    {{-- <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-text">
                        <h3>GeT Started Today</h3>
                        <p>New student special! $30 unlimited Gym for the first week anh 50% of our member!</p>
                    </div>
                    <a href="#" class="primary-btn cta-btn">book now</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Cta Section End -->

    <!-- Map Section Begin -->
    {{-- <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d188618.51311104256!2d-71.236572!3d42.381647!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1576756626784!5m2!1sen!2sbd" height="590" style="border: 0" allowfullscreen=""></iframe>
        <div class="map-contact-detalis">
            <div class="open-time">
                <h5>Weekday:</h5>
                <ul>
                    <li>Weekday: <span>06:30 - 11:00</span></li>
                    <li>Saturday: <span>07:00 - 22:00</span></li>
                    <li>Sunday: <span>09:00 - 18:00</span></li>
                </ul>
            </div>
            <div class="map-contact-form">
                <h5>Contact Us</h5>
                <form action="#">
                    <input type="text" placeholder="Name">
                    <input type="text" class="phone" placeholder="Phone">
                    <textarea placeholder="Message"></textarea>
                    <button type="submit" class="web-btn">Submit Now</button>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- Map Section End -->

@endsection

