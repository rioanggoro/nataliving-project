<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Artisan;

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully.';
});
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

// Blog Routes
Route::get('/blog', [HomeController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{slug}', [HomeController::class, 'blogShow'])->name('blog.show');

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
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


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
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('/products', AdminProductController::class);
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/blogs', BlogController::class);
        
        // Route untuk upload gambar Trix Editor
        Route::post('/upload-trix-image', [BlogController::class, 'uploadTrixImage'])->name('trix.upload');
    });
});
