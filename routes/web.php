<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        // Categories Route
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/{category}', [CategoryController::class, 'update'])->name('categories.update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        // Subcategories Route
        Route::group(['prefix' => 'sub-categories'], function () {
            Route::get('/', [SubCategoryController::class, 'index'])->name('sub-categories.index');
            Route::get('/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');
            Route::post('/', [SubCategoryController::class, 'store'])->name('sub-categories.store');
            Route::get('/{category}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
            Route::post('/{category}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
            Route::delete('/{category}', [SubCategoryController::class, 'destroy'])->name('sub-categories.destroy');
        });
    });
});
