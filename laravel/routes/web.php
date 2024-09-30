<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\AuthenticatedSessionController;
>>>>>>> Stashed changes

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
<<<<<<< Updated upstream
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
=======
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream

// Route resource dẫn đến các trang quản lý laptop
Route::resource('laptops', LaptopController::class);
=======
// Route resource dẫn đến các trang quản lý laptop
Route::resource('laptops', LaptopController::class);

// Route đăng nhập
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
>>>>>>> Stashed changes
