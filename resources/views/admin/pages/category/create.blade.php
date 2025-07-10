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
                        <h3 class="card-title">Create Category</h3>
                    </div>

                    <!-- Add id for JS validation -->
                    <form id="newsForm" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body row">
                            <div class="col-12 mb-3">
                                <!-- title -->
                                <div class="flex-fill" style="min-width:250px;">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Enter title" value="{{ old('title') }}" required />
                                    <div class="invalid-feedback" id="titleError">Please enter a client title.</div>
                                </div>



                            </div>
                            <!-- text (TinyMCE) -->
                            <div class="col-md-12 mb-3">
                                <label for="text" class="form-label">Description</label>
                                <textarea name="text" class="form-control" id="editor" rows="5"></textarea>
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
                        <!--show error -->
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
        document.getElementById('titleError').style.display = 'none';

        document.getElementById('newsForm').addEventListener('submit', function(e) {
            let isValid = true;

            const titleInput = document.getElementById('title');
            const descriptionTextarea = document.getElementById('editor');



            const description = tinymce.get(descriptionTextarea.id).getContent().trim();


            // Validate Title
            if (!title) {
                document.getElementById('nameError').style.display = 'block';
                titleInput.focus();
                isValid = false;
            }





            if (!isValid) {
                e.preventDefault(); // Stop form submission
            }
        });
    </script>

@endsection
