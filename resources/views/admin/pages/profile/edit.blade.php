@extends('admin.layouts.layout')

@section('title', 'Edit user | Kings Admin')
@section('content')

<main class="app-main">


    <div style="max-width: 700px ;margin:20px auto" class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>

                <!-- Add id for JS validation -->
                <form id="userForm" action="{{ route('profile.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body row">
                        <!-- User name -->
                        <div class="col-md-12 mb-3">
                            <label for="User name" class="form-label">User name</label>
                            <input type="text" name="name" class="form-control" id="User name"
                                placeholder="Enter User name" value="{{ old('User name', $user->name) }}" />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                                value="{{ old('email', $user->email) }}" />

                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- password --}}
                        <div class="col-md-12 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter new password (leave blank to keep current)" />
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="card-footer d-flex  gap-2">
                            <a href="{{ route('profile.index', $user->id) }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update user</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</main>


<!-- Client-Side Validation + Image Preview Script -->
<script>





</script>

@endsection
