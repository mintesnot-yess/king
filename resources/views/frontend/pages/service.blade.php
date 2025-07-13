@extends('frontend.layouts.layout')

@section('title', 'Service')

@section('content')
    @include('frontend.components.preload');

    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Our services</h1>

                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Services Start -->
    <div class="page-services">
        <div class="container">
            <div class="row">


                @foreach ($services as $item)
                    <div class="col-lg-4 col-md-6">
                        <!-- Page Service Item Start -->
                        <div class="page-service-item wow fadeInUp">
                            <div class="page-service-image">
                                <a href="{{ route('service.detail', $item->id) }}" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="images/service-img-1.jpg" alt="">
                                    </figure>
                                </a>
                            </div>
                            <div class="page-service-content">
                                <h3>{{ $item->title }}</h3>
                            </div>
                        </div>
                        <!-- Page Service Item End -->
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Page Services End -->


@endsection
