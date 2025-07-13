@extends('frontend.layouts.layout')

@section('title', 'Products')

@section('content')
    @include('frontend.components.preload');


    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Products</h1>

                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Projects Start -->
    <div class="page-projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Choose Our Project Nav start -->
                    <div class="our-Project-nav wow fadeInUp">
                        <ul>
                            <li><a href="#" class="active-btn" data-filter="*">all</a></li>
                            @foreach ($categories as $category)
                                <li><a href="#" data-filter=".{{ $category->title }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Choose Our Project Nav End -->
                </div>

                <div class="col-lg-12">
                    <!-- Project Item Boxes start -->
                    <div class="row project-item-boxes align-items-center">

                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 project-item-box {{ $product->category->title }}">
                                <!-- Project Item Start -->
                                <div class="project-item wow fadeInUp">
                                    <div class="project-image">
                                        <a href="{{ route('product.detail', $product->id) }}" data-cursor-text="View">
                                            <figure class="image-anime">
                                                @php
                                                    $images = [];
                                                    if ($product->images) {
                                                        $decoded = json_decode($product->images, true);
                                                        $images = is_array($decoded) ? $decoded : [$product->images];
                                                    }
                                                @endphp



                                                <img src="{{ asset('storage/' . trim($images[0])) }}">




                                            </figure>
                                        </a>
                                    </div>


                                    <div class="project-content">
                                        <h3>
                                            <a href="{{ route('product.detail', $product->id) }}">

                                                <span class="project-category"> {{ $product->title }}</span>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                                <!-- Project Item End -->
                            </div>
                        @endforeach

                    </div>
                    <!-- Project Item Boxes End -->
                </div>
            </div>
        </div>
    </div>
    <!-- page Projects End -->


@endsection
