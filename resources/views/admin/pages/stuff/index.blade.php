@extends('admin.layouts.layout')

@section('title', 'Stuff | Kings Admin')
@section('content')

    <main class="app-main">


        @include('admin.partials.bordercrumb')

        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">

                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-header  ">

                                {{-- add --}}
                                <div class="card-tools">
                                    <a href="{{ route('stuff.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i> Create New </a>

                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body overflow-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>User Name</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>image</th>



                                            <th style="width: 120px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($stuffList as $index => $item)
                                            <tr class="align-middle">
                                                <td>{{ $index + 1 }}.</td>
                                                <td>
                                                    <a href="{{ route('stuff.show', $item->id) }}">{{ $item->name }}</a>
                                                </td>
                                                <td>
                                                    <p
                                                        style="width: 250px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">

                                                        {{ $item->position }}
                                                    </p>

                                                </td>
                                                <td>
                                                    <p style="">

                                                        {{ $item->phone }}
                                                    </p>
                                                </td>
                                                <td>

                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image"
                                                            width="60" class="img-thumbnail">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown text-center">
                                                        <button class="btn btn-sm btn-light   p-0" type="button"
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
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('stuff.edit', $item->id) }}">
                                                                    <i class="fas fa-edit me-2"></i> Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('stuff.destroy', $item->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure?');">
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
                                                <td colspan="5" class="text-center">No item found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>

                    <!-- /.col -->

                    <!-- /.col -->
                </div>
            </div>
        </div>
    </main>
    @include('admin.components.alert')
@endsection
