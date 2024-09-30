<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route dẫn đến trang quản trị, sử dụng middleware 'auth' để đảm bảo chỉ có admin đã đăng nhập mới truy cập được
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Route dẫn đến trang người dùng, sử dụng middleware 'auth' để đảm bảo chỉ có người dùng đã đăng nhập mới truy cập được
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'dashboard'])->name('user.dashboard');
});

// Route dẫn đến trang bán hàng cho khách, không yêu cầu middleware
Route::get('/guest', [GuestController::class, 'shop'])->name('guest.shop');


// Route resource dẫn đến các trang quản lý laptop
Route::resource('laptops', LaptopController::class);