@extends('layouts.layout')

@section('title')
    <title>ShopEase :: Administrative Panel</title>
    <link rel="stylesheet" href="/styles/main.css">
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
                <form class="mx-auto max-w-md" action="dashboard.html" method="POST">
                    <h5 class="login-box-msg w-full text-center text-2xl font-bold mb-4">Please Login to Continue</h5>
                    <div class="input-group group relative z-0 mb-5 w-full">
                        <input
                            class="form-control peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            type="email" placeholder="">
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500"
                            for="floating_email">Email address</label>
                    </div>
                    <div class="input-group group relative z-0 mb-5 w-full">
                        <input
                            class="form-control peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            type="password" placeholder="">
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 rtl:peer-focus:translate-x-1/4 dark:text-gray-400 peer-focus:dark:text-blue-500"
                            for="floating_password">Password</label>

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
                        <div class="flex gap-4 items-center">
                            <button class="btn btn-primary btn-block text-light hover:text-white border border-accent hover:bg-accent focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 dark:border-accent dark:text-accent dark:hover:text-white dark:hover:bg-accent dark:focus:ring-accent" type="submit">Login</button>
                            <p class="h-full">
                                <a href="forgot-password.html" class="font-medium text-md dark:text-accent hover:underline">I forgot my password</a>
                            </p>
                        </div>

                        <!-- /.col -->
                    </div>
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
