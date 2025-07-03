@extends('admin.layouts.layout')

@section('title', 'Profile | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid d-flex flex-wrap justify-content-center gap-4">

            <div class="card card-outline card-primary shadow-sm mb-4" style="width: 20rem;">
                <div class="card-header text-center py-4">
                    <h2 class="card-title mb-0 font-weight-bold">{{ $currentUser->name }}</h2>
                    <p class="text-muted mb-0">{{ ucfirst($currentUser->role) }}</p>
                </div>

                <div class="card-body p-4">

                    <!-- Image or Initial -->
                    <div class="text-center mb-4">
                        <div class="rounded-circle shadow-sm bg-primary d-inline-flex align-items-center justify-content-center"
                            style="width: 120px; height: 120px; font-size: 48px; color: #fff; object-fit: cover;">
                            {{ strtoupper(substr($currentUser->name, 0, 1)) }}
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="text-center mb-3">
                        <span class="lead">{{ $currentUser->email }}</span>
                    </div>

                    <!-- Metadata -->
                    <div class="text-center text-muted small mt-3 border-top pt-3">
                        <p class="mb-1">Joined on: {{ $currentUser->created_at->format('M d, Y') }}</p>
                        @if ($currentUser->updated_at != $currentUser->created_at)
                        <p class="mb-0">Last updated: {{ $currentUser->updated_at->format('M d, Y') }}</p>
                        @endif
                    </div>

                </div>

                <!-- Card Footer -->
                <div class="card-footer text-center bg-white border-top-0 pb-4">
                    <a href="{{ route('profile.edit', $currentUser->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>

            @if ($currentUser->role === 'super_admin')
            <div class="row">
                <div>
                    <div class="card">
                        <div class="card-header  ">
                            <p class="card-title">Users</p>

                            <div class="card-tools">
                                <a href="{{route('users.create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i> Create New </a>

                            </div>

                        </div>
                        @if ($users->isEmpty())
                        <div class="card-body">
                            <p class="text-center text-muted">No users found.</p>
                        </div>

                        @endif

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>User name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th style="width: 120px"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($users->count() > 1) {{-- Assuming $currentUser is included in $users --}}
                                    @foreach($users as $index => $user)
                                    @if($user->id !== $currentUser->id)
                                    <tr class="align-middle">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>
                                            <p>{{ $user->email }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $user->role }}</p>
                                        </td>
                                        <td>
                                            <div class="dropdown text-center">
                                                <button class="btn btn-sm btn-light p-0" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-secondary" viewBox="0 0 20 20"
                                                        fill="currentColor" style="width: 1.2rem; height: 1.2rem;">
                                                        <path
                                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                    </svg>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center"
                                                            href="{{ route('users.edit', $user->id) }}">
                                                            <i class="fas fa-edit me-2"></i> Edit
                                                        </a>
                                                    </li>
                                                    @if ($user->role !== 'super_admin' )
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item d-flex align-items-center text-danger">
                                                            <i class="fas fa-trash me-2"></i> Delete
                                                        </button>
                                                    </form>
                                                    @endif

                                                    </li>
                                                </ul>

                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">Users not found.</td>
                                    </tr>
                                    @endif





                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
            @endif
        </div>
    </div>
</main>
@include('admin.components.alert')
@endsection
