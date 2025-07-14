@extends('frontend.layouts.layout')
@section('title', 'Contact')

@section('content')
    @include('frontend.components.preload');


    <div class="page-header parallaxie">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Contact us</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-1.html">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">contact us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Contact Us Stat -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">contact details</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Happy to answer all your questions</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Conatct Info Item Start -->
                    <div class="contact-info-item wow fadeInUp">
                        <div class="contact-info-img">
                            <figure class="image-anime">
                                <img src="images/contact-info-img-1.jpg" alt="">
                            </figure>
                        </div>

                        <div class="contact-info-content">
                            <h3>our location:</h3>
                            <p>123 Main Street, Apartment 4B, Springfield, IL62704,USA.</p>
                        </div>
                    </div>
                    <!-- Conatct Info Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Conatct Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-info-img">
                            <figure class="image-anime">
                                <img src="images/contact-info-img-2.jpg" alt="">
                            </figure>
                        </div>

                        <div class="contact-info-content">
                            <h3>emails:</h3>
                            <p>info@domain.com</p>
                            <p>sales@domain.com</p>
                        </div>
                    </div>
                    <!-- Conatct Info Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Conatct Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="contact-info-img">
                            <figure class="image-anime">
                                <img src="images/contact-info-img-3.jpg" alt="">
                            </figure>
                        </div>

                        <div class="contact-info-content">
                            <h3>phones:</h3>
                            <p>Sales: +01 741 852 963</p>
                            <p>Inquiry : +02 852 963 654</p>
                        </div>
                    </div>
                    <!-- Conatct Info Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map & Contact Form Section Start -->
    <div class="google-map-form">
        <div class="google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d56481.31329163797!2d-82.30112043759952!3d27.776444959332093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sUnited%20States%20solar!5e0!3m2!1sen!2sin!4v1706008331370!5m2!1sen!2sin"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <!-- Contact Form Box Start -->
                    <div class="contact-form-box">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Contact now</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Get in touch with us</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Form Start -->
                        <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp"
                            data-wow-delay="0.5s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name ="email" class="form-control" id="email"
                                        placeholder="Email Address" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Your Phone" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="message" class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="contact-form-btn">
                                        <button type="submit" class="btn-default">submit</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Contact Form End -->
                    </div>
                    <!-- Contact Form Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map & Contact Form Section End -->

@endsection
