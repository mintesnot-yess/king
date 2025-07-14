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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Image gallery</h1>

                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Photo Gallery Section Start -->
    <div class="page-gallery">
        <div class="container">
            <!-- gallery section start -->
            <div class="row gallery-items page-gallery-box">

                @foreach ($images as $image)
                    <div class="col-lg-4 col-6">
                        <!-- image gallery start -->
                        <div class="photo-gallery wow fadeInUp" data-cursor-text="View">
                            <a href="{{ asset('storage/' . trim($image->file_path)) }}">
                                <figure class="image-anime">
                                    <img src="{{ asset('storage/' . trim($image->file_path)) }}">
                                </figure>
                            </a>
                        </div>
                        <!-- image gallery end -->
                    </div>
                @endforeach

            </div>
            <!-- gallery section end -->
        </div>
    </div>
    <!-- Photo Gallery Section End -->

@endsection
