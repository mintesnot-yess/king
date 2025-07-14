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
                        <h3 class="card-title">Create Testimonial</h3>
                    </div>

                    <!-- Add id for JS validation -->
                    <form id="form" action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body row">
                            <!-- name -->
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name" required />
                                <div class="invalid-feedback" id="nameError">Please enter a client name.</div>
                            </div>

                            <!-- text (TinyMCE) -->
                            <div class="col-md-12 mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea name="text" class="form-control" id="editor" rows="5" required></textarea>
                                <div class="invalid-feedback" id="textError">Please enter a text.</div>
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

                        <!-- Submit Button -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <!-- Load TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/rtyoru7f38ggmeur38qexjy0u6h395vxbigucmtgka4u2xpa/tinymce/6/tinymce.min.js "
        referrerpolicy="origin"></script>

    <!-- Initialize TinyMCE -->
    <script>
        tinymce.init({
            selector: '#editor',
            height: 300,
            menubar: false,
            plugins: 'lists link image code',
            toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignright | bullist numlist | link | code',
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save(); // Keep textarea in sync
                });
            }
        });
    </script>

    <!-- Client-Side Validation + Image Preview Script -->
    <script>
        document.getElementById('nameError').style.display = 'none';
        document.getElementById('textError').style.display = 'none';
        document.getElementById('imageError').style.display = 'none';
        document.getElementById('form').addEventListener('submit', function(e) {
            let isValid = true;

            // Reset errors


            const titleInput = document.getElementById('title');
            const descriptionTextarea = document.getElementById('editor');
            const imageInput = document.getElementById('inputGroupFile02');

            const title = titleInput.value.trim();
            const description = tinymce.get(descriptionTextarea.id).getContent().trim();

            // Validate Title
            if (!title) {
                document.getElementById('nameError').style.display = 'block';
                titleInput.focus();
                isValid = false;
            }

            // Validate Description (TinyMCE)
            if (!description) {
                document.getElementById('textError').style.display = 'block';
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
