@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form class="container-fluid" id="category-form" method="POST"
            action="{{ route('sub-categories.update', $subCategory->id) }}">
            @csrf
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option
                                                    {{ $subCategory['category_id'] == $category['id'] ? 'selected' : '' }}
                                                    value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="w-full">
                                        @error('category')
                                            <p class="text-accent text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name"
                                        placeholder="Name" value="{{ $subCategory['name'] }}">
                                    <div class="w-full">
                                        @error('name')
                                            <p class="text-accent text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input class="form-control" id="slug" readonly type="text" name="slug"
                                        placeholder="Slug" value="{{ $subCategory['slug'] }}">
                                    <div class="w-full">
                                        @error('slug')
                                            <p class="text-accent text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Status</label>
                                    <select class="form-control" id="status" name="status" placeholder="Slug">
                                        <option {{ $subCategory['status'] == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $subCategory['status'] == 2 ? 'selected' : '' }} value="2">Inactive
                                        </option>
                                    </select>
                                    <div class="w-full">
                                        @error('status')
                                            <p class="text-accent text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a class="btn btn-outline-dark ml-3" href="{{ url()->previous() }}">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin-assets/js/adminlte.min.js"></script>

    <script>
        const nameField = document.getElementById('name');
        const slugField = document.getElementById('slug');

        nameField.addEventListener('input', () => {
            const name = nameField.value;
            const slug = name.trim().toLowerCase().replaceAll(" ", "-");
            // console.log(slug);
            slugField.value = slug;
        });
    </script>
@endsection
