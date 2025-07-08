@extends('admin.layouts.layout')

@section('title', 'Edit News | Kings Admin')
@section('content')

<main class="app-main">

    @include('admin.partials.bordercrumb')

    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Edit slider</h3>
                </div>

                <!-- Add id for JS validation -->
                <form id="newsForm" action="{{ route('slider.update', $slider->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body row">
                        <!-- title -->
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title"
                                value="{{ old('title', $slider->title) }}" />
                        </div>

                        <!-- text (TinyMCE) -->
                        <div class="col-md-12 mb-3">
                            <label for="text" class="form-label">Text</label>
                            <textarea name="description" class="form-control" id="editor"
                                rows="5">{!! old('text', $slider->description) !!}</textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-md-6 mb-3">
                            <label for="inputGroupFile02" class="form-label">Upload New Image </label>
                            <input type="file" name="image" class="form-control" id="inputGroupFile02">

                        </div>

                        <!-- Image Preview -->
                        <div class="col-md-6 mb-3 d-flex align-items-center justify-content-center">
                            <div id="imagePreview"
                                style="width: 100%; max-width: 300px; min-height: 150px; border: 1px solid #ccc; border-radius: 5px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                @if ($slider->image)
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Image"
                                    style="max-width:100%; max-height:150px; border-radius:5px;">
                                @else
                                <span style="color: #888;">No Image</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('slider.show', $slider->id) }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update News</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>


<!-- Client-Side Validation + Image Preview Script -->
<script>
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
                @if ($slider->image)
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Image" style="max-width:100%; max-height:150px; border-radius:5px;">
                @else
                    <span style="color: #888;">No Image</span>
                @endif
            `;
        }
    });
</script>

@endsection
