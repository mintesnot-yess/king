@extends('admin.layouts.layout')

@section('title', 'View Service | Kings Admin')
@section('content')

    <main class="app-main">

        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid d-flex justify-content-center">

                <div class="card card-outline card-primary shadow-sm mb-4" style="width: 20rem;">
                    <div class="card-header text-center py-4">
                        <h2 class="card-title mb-0 font-weight-bold">{{ $service->title }}</h2>
                        <p class="text-muted mb-0">service</p>
                    </div>

                    <div class="card-body p-4">

                        @php
                            $images = [];
                            if ($service->images) {
                                $decoded = json_decode($service->images, true);
                                $images = is_array($decoded) ? $decoded : [$service->images];
                            }
                        @endphp
                        @if (count($images) > 0)
                            <div style="position: relative; display: inline-block;">
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/' . trim($image)) }}" alt="Image" width="80"
                                        height="80" class="img-thumbnail me-1 mb-1" style="object-fit: cover;">
                                @endforeach


                            </div>
                        @else
                            <span class="text-muted">No Image</span>
                        @endif

                        <!-- Quote Text -->
                        <blockquote class="blockquote text-center mb-4">
                            <p class="mb-0 lead">{!! $service->description !!}</p>
                        </blockquote>

                        <!-- Metadata -->
                        <div class="text-center text-muted small mt-3 border-top pt-3">
                            <p class="mb-1">Published on: {{ $service->created_at->format('M d, Y') }}</p>
                            @if ($service->updated_at != $service->created_at)
                                <p class="mb-0">Last updated: {{ $service->updated_at->format('M d, Y') }}</p>
                            @endif
                        </div>

                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer text-center bg-white border-top-0 pb-4">
                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </main>
    @include('admin.components.alert')
@endsection
