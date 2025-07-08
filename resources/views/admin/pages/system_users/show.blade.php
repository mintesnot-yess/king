@extends('admin.layouts.layout')

@section('title', 'Profile | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid d-flex flex-wrap justify-content-center gap-4">

            <div class="card card-outline card-primary shadow-sm mb-4" style="width: 20rem;">
                <div class="card-header text-center py-4">
                    <h2 class="card-title mb-0 font-weight-bold">{{ $user->name }}</h2>
                    <p class="text-muted mb-0">{{ ucfirst($user->role) }}</p>
                </div>

                <div class="card-body p-4">

                    <!-- Image or Initial -->
                    <div class="text-center mb-4">
                        <div class="rounded-circle shadow-sm bg-primary d-inline-flex align-items-center justify-content-center"
                            style="width: 120px; height: 120px; font-size: 48px; color: #fff; object-fit: cover;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="text-center mb-3">
                        <span class="lead">{{ $user->email }}</span>
                    </div>

                    <!-- Metadata -->
                    <div class="text-center text-muted small mt-3 border-top pt-3">
                        <p class="mb-1">Joined on: {{ $user->created_at->format('M d, Y') }}</p>
                        @if ($user->updated_at != $user->created_at)
                        <p class="mb-0">Last updated: {{ $user->updated_at->format('M d, Y') }}</p>
                        @endif
                    </div>

                </div>

                <!-- Card Footer -->
                <div class="card-footer text-center bg-white border-top-0 pb-4 d-flex justify-content-center gap-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>

                    @if ($user->role !== 'super_admin')
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>



        </div>
    </div>
</main>

@endsection
