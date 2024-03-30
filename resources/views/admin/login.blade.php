@extends('layouts.layout')

@section('title')
    <title>ShopEase :: Administrative Panel</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
@endsection

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary mt-8">
            <div class="card-header text-center">
                <h4 class="text-4xl font-bold" href="#">Administrative Panel</h4>
            </div>
            <div class="card-body mt-12">
                <form class="mx-auto max-w-md" action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf
                    <h5 class="login-box-msg mb-4 w-full text-center text-2xl font-bold">Please Login to Continue</h5>
                    <div class="input-group group relative z-0 mb-5 w-full">
                        <input
                            class="form-control peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            id="email" type="email" name="email" placeholder="">
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500"
                            for="email">Email address</label>
                        <div class="w-full">
                            @error('email')
                                <p class="text-accent text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="input-group group relative z-0 mb-5 w-full">
                        <input
                            class="form-control peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            type="password" name="password" email="password" value="{{ old('email') }}" placeholder="">
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500"
                            for="password">Password</label>
                        <div class="w-full">
                            @error('password')
                                <p class="text-accent text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-8">
                                                     <div class="icheck-primary">
                                                         <input id="remember" type="checkbox">
                                                         <label for="remember">
                                                      Remember Me
                                                         </label>
                                                     </div>
                                                       </div> -->
                        <!-- /.col -->
                        <div class="flex items-center gap-4">
                            <button
                                class="btn btn-primary btn-block text-light border-accent hover:bg-accent text-md dark:border-accent dark:text-accent dark:hover:bg-accent dark:focus:ring-accent mb-2 me-2 rounded-lg border px-5 py-2.5 text-center font-medium hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:hover:text-white"
                                type="submit">Login</button>
                            <p class="h-full">
                                <a class="text-md dark:text-accent font-medium hover:underline"
                                    href="forgot-password.html">I forgot my password</a>
                            </p>
                        </div>

                        <!-- /.col -->
                    </div>
                    @include('inc.message')
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin-assets/js/adminlte.min.js"></script>
@endsection
