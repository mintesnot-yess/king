@extends('admin.layouts.layout')

@section('title', 'View Slider | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    {{-- <h3 class="card-title">{{ $slider->title }}</h3> --}}
                </div>

                <div class="card-body">

                    <!-- Image -->
                    @if ($brand->image)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $brand->image) }}" alt="brand Image"
                            class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                    </div>
                    @endif


                    <!-- Metadata -->
                    <div class="text-muted small">
                        <p>Published on: {{ $brand->created_at->format('M d, Y') }}</p>
                        @if ($brand->updated_at != $brand->created_at)
                        <p>Last updated: {{ $brand->updated_at->format('M d, Y') }}</p>
                        @endif
                    </div>

                </div>

                <div class="card-footer d-flex  gap-2">

                    {{-- <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a> --}}

                    <form action="{{ route('brand.destroy', $brand->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger  d-flex align-items-center  ">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection