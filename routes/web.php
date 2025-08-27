<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'home'])->name('home');


Route::get('/cars',[FrontController::class,'cars'])->name('cars');
Route::get('/cars-detail',[FrontController::class,'CarDetail'])->name('CarDetail');

Route::get('/my-bookings',[FrontController::class,'MyBookings'])->name('MyBookings');
