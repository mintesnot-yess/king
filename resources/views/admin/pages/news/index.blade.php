@extends('admin.layouts.layout')

@section('title', 'News | Kings Admin')
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

                            <h3 class="card-title">News</h3>
                            {{-- add --}}
                            <div class="card-tools">
                                <a href="{{route('news.create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus me-2"></i> Create New </a>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th style="width: 120px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($newsList as $index => $news)
                                    <tr class="align-middle">
                                        <td>{{ $index + 1 }}.</td>
                                        <td>
                                            <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                                        </td>
                                        <td>
                                            <p
                                                style="width: 250px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">

                                                {{ Str::limit(strip_tags($news->description), 50) }}
                                            </p>
                                        </td>
                                        <td>

                                            @if ($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="Image" width="60"
                                                class="img-thumbnail">
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
                                                            href="{{ route('news.edit', $news->id) }}">
                                                            <i class="fas fa-edit me-2"></i> Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('news.destroy', $news->id) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?');">
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
                                        <td colspan="5" class="text-center">No news found.</td>
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

@endsection