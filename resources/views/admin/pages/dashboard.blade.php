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
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M4 4.75A.75.75 0 014.75 4h14.5a.75.75 0 01.75.75v14.5a.75.75 0 01-.75.75H4.75A.75.75 0 014 19.25V4.75zm1.5.75v13h13v-13h-13zm2.75 2.5a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm0 3a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm0 3a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75z" />
                        </svg>
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
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                            </path>
                        </svg>
                        <a href="{{route('testimonial.index')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 2-->
                </div>
                <!--end::Col-->
                {{-- <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>User Registrations</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                            </path>
                        </svg>
                        <a href="#"
                            class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                    <!--end::Small Box Widget 3-->
                </div> --}}
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 4-->
                    <div class="small-box text-bg-danger">

                        <div class="inner">
                            <h3>{{$sliderCount}}</h3>
                            <p>Sliders</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                            </path>
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                            </path>
                        </svg>
                        <a href="{{route('slider.index')}}"
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
                        <div class="card-body">
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
                                    <tr class="align-middle">
                                        <td>
                                            <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
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
                        <div class="card-body">
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
                                    <tr class="align-middle">
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


@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    background: '#f8f9fa',
                    iconColor: '#28a745',
                    color: '#343a40'
                });
            });
</script>
@endif
@endsection