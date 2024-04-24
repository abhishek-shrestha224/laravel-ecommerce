@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SubCategories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-primary" href="{{ route('sub-categories.create') }}">New Sub Category</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <p>
                    {{ Session::get('msg') }}
                </p>
                <div class="card-header">
                    <a class="mb-2 me-2 rounded-lg border border-gray-800 px-5 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-800"
                        href="{{ route('categories.index') }}">
                        Reset
                    </a>
                    <form class="card-tools" action="{{ route('sub-categories.index') }}" method="GET">
                        @csrf
                        <div class="input-group input-group" style="width: 250px;">
                            <input class="form-control float-right" type="text" name="keyword" placeholder="Search">

                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table-hover text-nowrap table">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($subCategories->isNotEmpty())
                                @foreach ($subCategories as $subCategory)
                                    <tr>
                                        <td>{{ $subCategory->id }}</td>
                                        <td>{{ $subCategory->name }}</td>
                                        <td>{{ $subCategory->categoryName }}</td>
                                        <td>{{ $subCategory->slug }}</td>
                                        <td>

                                            @if ($subCategory->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('sub-categories.edit', $subCategory->id) }}">
                                                <svg class="filament-link-icon mr-1 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <form class="text-danger mr-1 h-4 w-4" href="#"
                                                action="{{ route('sub-categories.destroy', $subCategory->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button>
                                                    <svg class="filament-link-icon mr-1 h-4 w-4"
                                                        wire:loading.remove.delay="" wire:target=""
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path ath fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No Sub Category Found</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $subCategories->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
