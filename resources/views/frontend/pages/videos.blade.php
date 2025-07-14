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
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our video</h1>

                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Video Gallery Start -->
    <div class="page-video-gallery">
        <div class="container">
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-gallery-image wow fadeInUp" data-cursor-text="Play">
                            <a href="{{ $video->file_path }}" class="popup-video">
                                <figure>
                                    <img src="{{ $video->thumbnail }}" alt="Video Thumbnail" class="img-fluid rounded">
                                </figure>
                            </a>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
    <!-- Page Video Gallery End -->

@endsection
