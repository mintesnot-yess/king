@extends('admin.layouts.layout')

@section('title', 'Edit News | Kings Admin')
@section('content')

    <main class="app-main">

        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Stuff</h3>
                    </div>

                    <!-- Add id for JS validation -->
                    <form id="form" action="{{ route('stuff.update', $stuff->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <!-- name -->
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name" value="{{ old('name', $stuff->name) }}" />
                            </div>
                            <!-- position -->
                            <div class="col-md-12 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" name="position" class="form-control" id="position"
                                    placeholder="Enter position" required value="{{ old('position', $stuff->position) }}" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Enter phone number" required value="{{ old('phone', $stuff->phone) }}" />
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
                                    @if ($stuff->image)
                                        <img src="{{ asset('storage/' . $stuff->image) }}" alt="Current Image"
                                            style="max-width:100%; max-height:150px; border-radius:5px;">
                                    @else
                                        <span style="color: #888;">No Image</span>
                                    @endif
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
                        <div class="card-footer d-flex  gap-2">
                            <a href="{{ route('stuff.show', $stuff->id) }}" class="btn btn-secondary">Cancel</a>
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
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save(); // Keep textarea in sync
                });
            }
        });
    </script>

    <!-- Client-Side Validation + Image Preview Script -->
    <script>
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
            } else if (!file) {
                // Restore original image if no new file is selected
                preview.innerHTML = `
                @if ($stuff->image)
                    <img src="{{ asset('storage/' . $stuff->image) }}" alt="Current Image" style="max-width:100%; max-height:150px; border-radius:5px;">
                @else
                    <span style="color: #888;">No Image</span>
                @endif
            `;
            }
        });
    </script>

@endsection
