<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\Admin\AuthController;
/*
|--------------------------------------------------------------------------
| Halaman Depan (Public, User Tanpa Login)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [UserProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [UserProductController::class, 'show'])->name('shop.show');
Route::get('/company-profile', [HomeController::class, 'about'])->name('about');
Route::get('/my-store', [HomeController::class, 'myStore'])->name('my-store');
Route::get('/galery', [HomeController::class, 'galery'])->name('galery');

// Route login untuk redirect ke login admin
Route::get('/login', function () {
    return redirect()->route('admin.auth.login.index', ['auth' => 'required']);
})->name('login');

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
    // Auth Routes
    Route::get('/login', function () {
        return view('admin.auth.login.index');
    })->name('admin.auth.login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

    // Protected Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard.dashboard');
        })->name('admin.dashboard');

        Route::resource('/products', AdminProductController::class);
        Route::resource('/categories', AdminCategoryController::class);
    });
});
