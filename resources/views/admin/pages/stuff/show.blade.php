@extends('admin.layouts.layout')

@section('title', 'View Stuff | Kings Admin')
@section('content')

    <main class="app-main">

        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid d-flex justify-content-center">

                <div class="card card-outline card-primary shadow-sm mb-4" style="width: 20rem;">
                    <div class="card-header text-center py-4">
                        <h2 class="card-title mb-0 font-weight-bold">{{ $stuff->name }}</h2>
                        <p class="text-muted mb-0">Stuff</p>
                    </div>

                    <div class="card-body p-4">

                        <!-- Image -->
                        @if ($stuff->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $stuff->image) }}" alt="stuff Image"
                                    class="rounded-circle shadow-sm" width="120" height="120"
                                    style="object-fit: cover;">
                            </div>
                        @endif

                        <!-- Quote Text -->
                        <blockquote class="blockquote text-center mb-4">
                            <p class="mb-0 lead">{!! $stuff->position !!}</p>
                            <p>{{ $stuff->phone }}</p>

                        </blockquote>

                        <!-- Metadata -->
                        <div class="text-center text-muted small mt-3 border-top pt-3">
                            <p class="mb-1">Published on: {{ $stuff->created_at->format('M d, Y') }}</p>
                            @if ($stuff->updated_at != $stuff->created_at)
                                <p class="mb-0">Last updated: {{ $stuff->updated_at->format('M d, Y') }}</p>
                            @endif
                        </div>

                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer text-center bg-white border-top-0 pb-4">
                        <a href="{{ route('stuff.edit', $stuff->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>
    @include('admin.components.alert')
@endsection
