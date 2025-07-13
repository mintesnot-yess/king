@extends('frontend.layouts.layout')

@section('title', 'King Steel Security Door Manufacturing')

@section('content')
    @include('frontend.components.preload');


    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">{{ $service->title }}</h1>

                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Page Project Single Start -->
    <div class="page-project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Project Sidebar Start -->
                    <div class="project-single-sidebar">
                        <!-- Project Detail List Start -->
                        <div class="project-detail-list wow fadeInUp">
                            <div class="project-detail-title">
                                <h3>About Service</h3>
                            </div>
                            <!-- Project Detail Item Start -->

                            {{-- <div class="project-detail-item">
                                <div class="icon-box">
                                    <i class="fa-regular fa-circle-check"></i>
                                </div>
                                <div class="project-detail-content">
                                    <h3> Category </h3>
                                    <p>{{ $service->category->title }}</p>
                                </div>
                            </div> --}}

                        </div>

                        <!-- Sidebar CTA Box Start -->
                        <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Sidebar CTA Content Start -->
                            <div class="sidebar-cta-title">
                                <h2>contact info</h2>
                            </div>
                            <!-- Sidebar CTA Content End -->

                            <!-- Sidebar CTA Contact Start -->
                            <div class="sidebar-cta-contact">
                                <!-- Sidebar CTA Contact Item Start -->
                                <div class="sidebar-cta-contact-item">
                                    <div class="icon-box">
                                        <img src="images/icon-location.svg" alt="">
                                    </div>
                                    <div class="cta-contact-item-content">
                                        <p>Germany - 785, 15th Street Office 478 Berlin</p>
                                    </div>
                                </div>
                                <!-- Sidebar CTA Contact Item Start -->

                                <!-- Sidebar CTA Contact Item Start -->
                                <div class="sidebar-cta-contact-item">
                                    <div class="icon-box">
                                        <img src="images/icon-phone.svg" alt="">
                                    </div>
                                    <div class="cta-contact-item-content">
                                        <p>+123 456 789</p>
                                    </div>
                                </div>
                                <!-- Sidebar CTA Contact Item Start -->

                                <!-- Sidebar CTA Contact Item Start -->
                                <div class="sidebar-cta-contact-item">
                                    <div class="icon-box">
                                        <img src="images/icon-mail.svg" alt="">
                                    </div>
                                    <div class="cta-contact-item-content">
                                        <p>info@domain.com</p>
                                    </div>
                                </div>
                                <!-- Sidebar CTA Contact Item Start -->
                            </div>
                            <!-- Sidebar CTA Contact End -->
                        </div>
                        <!-- Sidebar CTA Box End -->
                    </div>
                    <!-- Project Sidebar End -->
                </div>

                <div class="col-lg-8">
                    <!-- Project Single Content Start -->
                    <div class="project-single-content">
                        <!-- Project Single Image Start -->
                        <div class="project-single-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset('storage/' . trim($images[0])) }}">
                            </figure>
                        </div>
                        <!-- Project Single Image End -->

                        <!-- Project Entry Start -->
                        <div class="project-entry">
                            <!-- Project Information Start -->
                            <div class="project-info">
                                <h2 class="text-anime-style-3">Project information</h2>
                                {!! $service->description !!}
                            </div>
                            <!-- Project Information End -->


                            <!-- Project Design Highlight End -->

                            <!-- Project Gallery Images Start -->
                            <div class="project-gallery gallery-items">
                                <h2 class="text-anime-style-3">Project gallery</h2>

                                <div class="project-gallery-images">
                                    <!-- Project Gallery img Start -->
                                    @foreach ($images as $image)
                                        <div class="project-gallery-img wow fadeInUp" data-cursor-text="View">
                                            <a href="{{ asset('storage/' . trim($image)) }}">
                                                <figure class="image-anime reveal">
                                                    <img src="{{ asset('storage/' . trim($image)) }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- Project Gallery img End -->
                                    @endforeach

                                </div>
                            </div>
                            <!-- Project Gallery Images End -->
                        </div>
                        <!-- Project Entry End -->
                    </div>
                    <!-- Project Single Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Project Single End -->

@endsection
