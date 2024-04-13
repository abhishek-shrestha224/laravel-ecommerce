@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Category</h1>
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
        <form class="container-fluid" id="category-form" method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Name"
                                    value="{{ $category->name }}">
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
                                    placeholder="Slug" value="{{ $category->slug }}">
                                @error('slug')
                                    <p class="text-accent text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Status</label>
                                <select class="form-control" id="status" name="status" placeholder="Slug">
                                    <option {{ $category['status'] == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $category['status'] == 0 ? 'selected' : '' }} value="2">Inactive</option>
                                </select>
                                @error('status')
                                    <p class="text-accent text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit">Create</button>
                <a class="btn btn-outline-dark ml-3" href="{{ url()->previous() }}">Cancel</a>
            </div>
        </form>
        <!-- /.card -->
    </section>
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
