<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('admin/dashboard', [PageController::class, 'adminDashboard'])->name('admin.dashboard');

// use group and prefix admin

Route::group(
    ['prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::resource('brands', BrandController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    }
);
