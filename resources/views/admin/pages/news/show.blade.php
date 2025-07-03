@extends('admin.layouts.layout')

@section('title', 'View News | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $news->title }}</h3>
                </div>

                <div class="card-body">

                    <!-- Image -->
                    @if ($news->image)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="News Image"
                            class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                    </div>
                    @endif

                    <!-- Description -->
                    <div class="mb-3">
                        {!! $news->description !!}
                    </div>

                    <!-- Metadata -->
                    <div class="text-muted small">
                        <p>Published on: {{ $news->created_at->format('M d, Y') }}</p>
                        @if ($news->updated_at != $news->created_at)
                        <p>Last updated: {{ $news->updated_at->format('M d, Y') }}</p>
                        @endif
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between">

                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </div>
</main>


@include('admin.partials.footer')
@endsection
