<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;

/*
|--------------------------------------------------------------------------
| Halaman Depan (Public, User Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [UserProductController::class, 'show'])->name('produk.show');
Route::get('/produk', [UserProductController::class, 'index'])->name('produk.index');

/*
|--------------------------------------------------------------------------
| Dashboard User (Login, Non-admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Dashboard Admin & Resource Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/products', AdminProductController::class);
    Route::resource('/categories', AdminCategoryController::class);
});
