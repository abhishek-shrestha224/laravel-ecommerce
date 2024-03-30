@if (Session::has('err'))
    <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
        {{ Session::get('err') }}
    </div>
@endif
@if (Session::has('sucess'))
    <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        {{ Session::get('sucess') }}
    </div>
@endif
