@extends('admin.layouts.layout')

@section('title', 'Kings Admin')

@section('content')

<main class="app-main">

    {{-- border crumb --}}
    @include('admin.partials.bordercrumb')
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{$newsCount}}</h3>
                            <p>News</p>
                        </div>
                        <i class="bi bi-newspaper small-box-icon" style="font-size:2.5rem;"></i>
                        <a href="/admin/news"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 1-->
                </div>
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 2-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{$testimonialCount}}</h3>
                            <p>Clients Testimonial </p>
                        </div>
                        <i class="bi bi-chat-quote small-box-icon" style="font-size:2.5rem;"></i>
                        <a href="{{route('testimonial.index')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 2-->
                </div>

                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{$sliderCount}}</h3>
                            <p>Sliders</p>
                        </div>
                        <i class="bi bi-layers small-box-icon" style="font-size:2.5rem;"></i>
                        <a href="{{route('slider.index')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 3-->
                </div>

                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 4-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{$brandCount}}</h3>
                            <p>Logos</p>
                        </div>
                        <i class="bi bi-award small-box-icon" style="font-size:2.5rem;"></i>
                        <a href="{{route('brand.index')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 4-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <div class="mb-4"></div>
            <!--begin::Row-->
            <div class="row">

                @if ($latestNews->count() > 0)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center ">
                            <h3 class="card-title">News</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body overflow-auto">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($latestNews as $index => $news)
                                    <tr class="align-middle text-nowrap">
                                        <td>
                                            <a href="{{ route('news.show', $news->id) }}">{{ Str::limit($news->title,30)
                                                }}</a>
                                        </td>
                                        <td>
                                            <p
                                                style="width: 250px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">

                                                {{ Str::limit(strip_tags($news->description), 50) }}
                                            </p>
                                        </td>
                                        <td>

                                            @if ($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="Image"
                                                style="width: 50px; height: 50px; object-fit: cover;"
                                                class="img-thumbnail">
                                            @else
                                            <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No news found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                @endif


                @if ($latestTestimonials->count() > 0)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center ">
                            <h3 class="card-title">Clients Testimonial</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body overflow-auto">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Text</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($latestTestimonials as $index => $testimonial)
                                    <tr class="align-middle text-nowrap">
                                        <td>
                                            <a href="{{ route('testimonial.show', $testimonial->id) }}">{{
                                                $testimonial->name
                                                }}</a>
                                        </td>
                                        <td>
                                            <p
                                                style="width: 250px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">

                                                {{ Str::limit(strip_tags($testimonial->text), 50) }}
                                            </p>
                                        </td>
                                        <td>

                                            @if ($testimonial->image)
                                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Image"
                                                style="width: 50px; height: 50px; object-fit: cover;"
                                                class="img-thumbnail">
                                            @else
                                            <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No news found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                @endif




                <!-- /.col -->

                <!-- /.col -->
            </div>


            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>

@include('admin.components.alert')
@endsection
