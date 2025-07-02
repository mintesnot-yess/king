@extends('admin.layouts.layout')

@section('title', 'View News | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid d-flex justify-content-center">

            <div class="card card-outline card-primary shadow-sm mb-4" style="width: 20rem;">
                <div class="card-header text-center py-4">
                    <h2 class="card-title mb-0 font-weight-bold">{{ $testimonial->name }}</h2>
                    <p class="text-muted mb-0">Client</p>
                </div>

                <div class="card-body p-4">

                    <!-- Image -->
                    @if ($testimonial->image)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Testimonial Image"
                            class="rounded-circle shadow-sm" width="120" height="120" style="object-fit: cover;">
                    </div>
                    @endif

                    <!-- Quote Text -->
                    <blockquote class="blockquote text-center mb-4">
                        <p class="mb-0 lead">{!! $testimonial->text !!}</p>
                    </blockquote>

                    <!-- Metadata -->
                    <div class="text-center text-muted small mt-3 border-top pt-3">
                        <p class="mb-1">Published on: {{ $testimonial->created_at->format('M d, Y') }}</p>
                        @if ($testimonial->updated_at != $testimonial->created_at)
                        <p class="mb-0">Last updated: {{ $testimonial->updated_at->format('M d, Y') }}</p>
                        @endif
                    </div>

                </div>

                <!-- Card Footer -->
                <div class="card-footer text-center bg-white border-top-0 pb-4">
                    <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection