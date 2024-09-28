<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::resource('laptops', LaptopController::class);
Route::get('laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
