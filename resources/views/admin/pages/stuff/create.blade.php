@extends('admin.layouts.layout')

@section('title', 'Create Testimonial | Kings Admin')
@section('content')

    <main class="app-main">
        {{-- Breadcrumb --}}

        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Create stuff</h3>
                    </div>

                    <!-- Add id for JS validation -->
                    <form id="form" action="{{ route('stuff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body row">
                            <!-- name -->
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name" required />
                                <div class="invalid-feedback" id="nameError">Please enter name.</div>
                            </div>

                            <!-- position -->
                            <div class="col-md-12 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" name="position" class="form-control" id="position"
                                    placeholder="Enter position" required />
                                <div class="invalid-feedback" id="positionError">Please enter position.</div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Enter phone number" required value="{{ old('phone') }}" />
                                <div class="invalid-feedback" id="phoneError">Please enter Phone number.</div>
                            </div>



                            <!-- Image Upload -->
                            <div class="col-md-6 mb-3">
                                <label for="inputGroupFile02" class="form-label">Upload Image</label>
                                <input type="file" name="image" class="form-control" id="inputGroupFile02" required>
                                <div class="invalid-feedback" id="imageError">Please select a valid image (jpg, png, gif).
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="col-md-6 mb-3 d-flex align-items-center justify-content-center">
                                <div id="imagePreview"
                                    style="width: 100%; max-width: 300px; min-height: 150px; border: 1px solid #ccc; border-radius: 5px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                    <span style="color: #888;">Image Preview</span>
                                </div>
                            </div>
                        </div>
                        {{-- show error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger" id="formError">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>



    <!-- Client-Side Validation + Image Preview Script -->
    <script>
        document.getElementById('nameError').style.display = 'none';
        document.getElementById('positionError').style.display = 'none';
        document.getElementById('phoneError').style.display = 'none';

        document.getElementById('imageError').style.display = 'none';
        document.getElementById('form').addEventListener('submit', function(e) {
            let isValid = true;



            const nameInput = document.getElementById('name').value.trim();
            const positionInput = document.getElementById('position').value.trim();
            const phoneInput = document.getElementById('phone').value.trim();

            const imageInput = document.getElementById('inputGroupFile02');




            // Validate name
            if (!nameInput) {
                document.getElementById('nameError').style.display = 'block';
                nameInput.focus();
                isValid = false;
            }

            // Validate Description (TinyMCE)
            if (!positionInput) {
                document.getElementById('positionError').style.display = 'block';
                isValid = false;
            }
            // Validate Description (TinyMCE)
            if (!phoneInput) {
                document.getElementById('phoneError').style.display = 'block';
                isValid = false;
            }

            // Validate Image (if selected)
            if (imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
                const maxSize = 2 * 1024 * 1024; // 2MB

                if (!allowedTypes.includes(file.type)) {
                    document.getElementById('imageError').textContent =
                        'Invalid image type. Only JPG, PNG, GIF, SVG allowed.';
                    document.getElementById('imageError').style.display = 'block';
                    isValid = false;
                }

                if (file.size > maxSize) {
                    document.getElementById('imageError').textContent = 'Image size must be less than 2MB.';
                    document.getElementById('imageError').style.display = 'block';
                    isValid = false;
                }
            }

            if (!isValid) {
                e.preventDefault(); // Stop form submission
            }
        });

        // Image preview logic
        document.getElementById('inputGroupFile02').addEventListener('change', function() {
            const file = this.files[0];
            const preview = document.getElementById('imagePreview');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img src="${e.target.result}" style="max-width:100%; max-height:150px; border-radius:5px;">`;
                };

                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '<span style="color: #888;">Invalid image</span>';
            }
        });
    </script>

@endsection
