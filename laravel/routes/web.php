<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::resource('laptops', LaptopController::class);
Route::get('laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
