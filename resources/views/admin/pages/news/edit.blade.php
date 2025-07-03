@extends('admin.layouts.layout')

@section('title', 'Edit News | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div style="max-width: 90% ;margin:20px auto" class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Edit News</h3>
                </div>

                <!-- Add id for JS validation -->
                <form id="newsForm" action="{{ route('news.update', $news->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body row">
                        <!-- Title -->
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title"
                                value="{{ old('title', $news->title) }}" />
                            <div class="invalid-feedback" id="titleError">Please enter a title.</div>
                        </div>

                        <!-- Description (TinyMCE) -->
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="editor"
                                rows="5">{!! old('description', $news->description) !!}</textarea>
                            <div class="invalid-feedback" id="descriptionError">Please enter a description.</div>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="inputGroupFile02" class="form-label">Upload New Image (Optional)</label>
                            <input type="file" name="image" class="form-control" id="inputGroupFile02">
                            <div class="invalid-feedback" id="imageError">Please select a valid image (jpg, png, gif).
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div class="col-md-6 mb-3 d-flex align-items-center justify-content-center">
                            <div id="imagePreview"
                                style="width: 100%; max-width: 300px; min-height: 150px; border: 1px solid #ccc; border-radius: 5px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                @if ($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image"
                                    style="max-width:100%; max-height:150px; border-radius:5px;">
                                @else
                                <span style="color: #888;">No Image</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('news.show', $news->id) }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update News</button>
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
        toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignright | bullist numlist | link  | code',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save(); // Keep textarea in sync
            });
        }
    });
</script>

<!-- Client-Side Validation + Image Preview Script -->
<script>
    document.getElementById('titleError').style.display = 'none';
    document.getElementById('descriptionError').style.display = 'none';
    document.getElementById('imageError').style.display = 'none';
    document.getElementById('newsForm').addEventListener('submit', function (e) {
        let isValid = true;

        // Reset errors


        const titleInput = document.getElementById('title');
        const descriptionTextarea = document.getElementById('editor');
        const imageInput = document.getElementById('inputGroupFile02');

        const title = titleInput.value.trim();
        const description = tinymce.get(descriptionTextarea.id).getContent().trim();

        // Validate Title
        if (!title) {
            document.getElementById('titleError').style.display = 'block';
            titleInput.focus();
            isValid = false;
        }

        // Validate Description (TinyMCE)
        if (!description) {
            document.getElementById('descriptionError').style.display = 'block';
            isValid = false;
        }

        // Validate Image (if selected)
        if (imageInput.files.length > 0) {
            const file = imageInput.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (!allowedTypes.includes(file.type)) {
                document.getElementById('imageError').textContent = 'Invalid image type. Only JPG, PNG, GIF, SVG allowed.';
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
    document.getElementById('inputGroupFile02').addEventListener('change', function () {
        const file = this.files[0];
        const preview = document.getElementById('imagePreview');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" style="max-width:100%; max-height:150px; border-radius:5px;">`;
            };

            reader.readAsDataURL(file);
        } else if (!file) {
            // Restore original image if no new file is selected
            preview.innerHTML = `
                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" style="max-width:100%; max-height:150px; border-radius:5px;">
                @else
                    <span style="color: #888;">No Image</span>
                @endif
            `;
        }
    });
</script>

@endsection