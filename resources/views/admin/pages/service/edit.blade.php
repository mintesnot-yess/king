@extends('admin.layouts.layout')

@section('title', 'Edit Service | Kings Admin')
@section('content')

    <main class="app-main">

        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Service</h3>
                    </div>

                    <!-- Add id for JS validation -->
                    <form id="newsForm" action="{{ route('service.update', $service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <div class="col-12 mb-3">
                                <div class="d-flex flex-wrap gap-3">
                                    <!-- title -->
                                    <div class="flex-fill" style="min-width:250px;">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter title" value="{{ old('title', $service->title) }}"
                                            required />
                                        <div class="invalid-feedback" id="titleError">Please enter a service title.</div>
                                    </div>


                                </div>
                            </div>
                            <!-- text (TinyMCE) -->
                            <div class="col-md-12 mb-3">
                                <label for="text" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="editor" rows="5" required>{!! old('text', $service->description) !!}</textarea>
                                <div class="invalid-feedback" id="textError">Please enter a description.</div>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-md-6 mb-3">
                                <label for="inputGroupFile02" class="form-label">Upload Images</label>
                                <input type="file" name="images[]" class="form-control" id="inputGroupFile02" multiple
                                    accept="image/*">

                                <div class="invalid-feedback" id="imagesError">Please select a valid image (jpg, png, gif).
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
                            <a href="{{ route('service.index', $service->id) }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <!-- Load TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/rtyoru7f38ggmeur38qexjy0u6h395vxbigucmtgka4u2xpa/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- Initialize TinyMCE -->
    <script>
        tinymce.init({
            selector: '#editor',
            height: 300,
            menubar: false,
            plugins: 'lists link image code',
            toolbar: 'undo redo | bold h1 h2 italic backcolor | alignleft aligncenter alignright | bullist numlist | link | code',
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save(); // Keep textarea in sync
                });
            }
        });
    </script>

    <script>
        document.getElementById('titleError').style.display = 'none';
        document.getElementById('textError').style.display = 'none';
        document.getElementById('imagesError').style.display = 'none';
        document.getElementById('newsForm').addEventListener('submit', function(e) {
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

        // Image preview logic for multiple images
        document.getElementById('inputGroupFile02').addEventListener('change', function() {
            const files = this.files;
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (files.length) {
                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.maxWidth = '100px';
                            img.style.maxHeight = '100px';
                            img.style.borderRadius = '5px';
                            img.style.marginRight = '5px';
                            preview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

        });
    </script>

@endsection
