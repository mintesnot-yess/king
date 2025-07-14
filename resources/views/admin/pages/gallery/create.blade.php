@extends('admin.layouts.layout')

@section('title', 'Create Gallery | Kings Admin')
@section('content')

    <main class="app-main">
        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Create Gallery</h3>
                    </div>

                    <form id="form" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body row">
                            <div class="col-12 mb-3">
                                <div class="row">

                                    <!-- Select Gallery Type -->
                                    <div class="col-md-6 mb-3">
                                        <label for="gallery_type" class="form-label">Gallery Type</label>
                                        <select name="type" id="gallery_type" class="form-select" required>
                                            <option value="">Select Type</option>
                                            <option value="image" {{ old('gallery_type') == 'image' ? 'selected' : '' }}>
                                                Image</option>
                                            <option value="video" {{ old('gallery_type') == 'video' ? 'selected' : '' }}>
                                                Video</option>
                                        </select>
                                    </div>

                                    <!-- Video Link -->
                                    <div class="col-md-6 mb-3" id="videoInput" style="display: none;">
                                        <label for="videoLink" class="form-label">Video URL</label>
                                        <input type="url" name="videoLink" class="form-control" id="videoLink"
                                            placeholder="Enter video URL" value="{{ old('videoLink') }}">
                                        {{-- <div class="invalid-feedback">Please enter a valid video URL.</div> --}}
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-md-6 mb-3" id="imageInput" style="display: none;">
                                        <label for="inputGroupFile02" class="form-label">Upload Image</label>
                                        <input type="file" name="image" class="form-control" id="inputGroupFile02"
                                            accept="image/*">
                                        {{-- <div class="invalid-feedback">Please select a valid image (jpg, png).</div> --}}
                                        <!-- Image Preview -->
                                        <div class="col-md-6 m-3 d-flex align-items-center justify-content-center">
                                            <div id="imagePreview"
                                                style="width: 100%; max-width: 300px; min-height: 150px; border: 1px solid #ccc; border-radius: 5px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                                <span style="color: #888;">Image Preview</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Error Display -->
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-2">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript for field toggling -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('gallery_type');
            const videoInput = document.getElementById('videoInput');
            const imageInput = document.getElementById('imageInput');

            function toggleFields() {
                const value = typeSelect.value;
                if (value === 'video') {
                    videoInput.style.display = 'block';
                    imageInput.style.display = 'none';
                } else if (value === 'image') {
                    videoInput.style.display = 'none';
                    imageInput.style.display = 'block';
                } else {
                    videoInput.style.display = 'none';
                    imageInput.style.display = 'none';
                }
            }

            typeSelect.addEventListener('change', toggleFields);
            toggleFields(); // Initial run
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
