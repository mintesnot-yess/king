@extends('admin.layouts.layout')

@section('title', 'Gallery | Kings Admin')
@section('content')

    <main class="app-main">


        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header  ">
                                <h3 class="card-title">Gallery List</h3>
                                <div class="card-tools">
                                    <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i> Create New
                                    </a>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body overflow-auto">
                                <table class="table table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">#</th>
                                            <th>Preview</th>
                                            <th>Type</th>
                                            <th style="width: 120px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gallery as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}.</td>
                                                <td>
                                                    @if ($item->type === 'image')
                                                        <img src="{{ asset('storage/' . $item->file_path) }}" alt="Image"
                                                            width="100" class="img-thumbnail" style="cursor: pointer"
                                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                                            data-image="{{ asset('storage/' . $item->file_path) }}">
                                                    @elseif ($item->type === 'video')
                                                        <a href="{{ $item->file_path }}" target="_blank"
                                                            class="btn btn-sm btn-outline-primary">
                                                            View Video
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>{{ ucfirst($item->type) }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-light p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 text-secondary" viewBox="0 0 20 20"
                                                                fill="currentColor" style="width: 1.2rem; height: 1.2rem;">
                                                                <path
                                                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                                            <li>
                                                                <form action="{{ route('gallery.destroy', $item->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item d-flex align-items-center text-danger">
                                                                        <i class="fas fa-trash me-2"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No items found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal for image preview -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow">
                    <div class="modal-body p-0">
                        <img id="previewImage" src="" class="img-fluid w-100" style="border-radius: 6px;"
                            alt="Full Image Preview">
                    </div>
                </div>
            </div>
        </div>


    </main>
    <script>
        const imageModal = document.getElementById('imageModal');
        const previewImage = document.getElementById('previewImage');

        imageModal.addEventListener('show.bs.modal', function(event) {
            const trigger = event.relatedTarget;
            const imageUrl = trigger.getAttribute('data-image');
            previewImage.src = imageUrl;
        });
    </script>

    @include('admin.components.alert')
@endsection
