@extends('admin.layouts.layout')

@section('title', 'Edit user | Kings Admin')
@section('content')

<main class="app-main">


    <div style="max-width: 700px ;margin:20px auto" class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                </div>

                <!-- Add id for JS validation -->
                <form id="userForm" action="{{ route('users.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body row">
                        <!-- User name -->
                        <div class="col-md-12 mb-3">
                            <label for="User name" class="form-label">User name</label>
                            <input type="text" name="name" class="form-control" id="User name"
                                placeholder="Enter User name" value="{{ old('name',$user->name ) }}" />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Email cannot be changed" value="{{ old('email', $user->email) }}"
                                disabled />

                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Role -->
                        <div class="col-md-12 mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role">
                                <option value="admin" {{ old('role',$user->role)=='admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="super_admin" {{ old('role',$user->role)=='super_admin' ? 'selected' : ''
                                    }}>Super
                                    Admin</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password cannot be changed" disabled />
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="card-footer d-flex  gap-2">
                            <a href="{{route('profile.index')}}" class="btn btn-secondary">Cancel</a>
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
