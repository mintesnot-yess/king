@extends('admin.layouts.layout')

@section('title', 'View Slider | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $slider->title }}</h3>
                </div>

                <div class="card-body">

                    <!-- Image -->
                    @if ($slider->image)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="slider Image"
                            class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                    </div>
                    @endif

                    <!-- Description -->
                    <div class="mb-3">
                        {!! $slider->description !!}
                    </div>

                    <!-- Metadata -->
                    <div class="text-muted small">
                        <p>Published on: {{ $slider->created_at->format('M d, Y') }}</p>
                        @if ($slider->updated_at != $slider->created_at)
                        <p>Last updated: {{ $slider->updated_at->format('M d, Y') }}</p>
                        @endif
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection