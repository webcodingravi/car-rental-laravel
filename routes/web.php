<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'home'])->name('home');


Route::get('/cars',[FrontController::class,'cars'])->name('cars');
Route::get('/cars-detail',[FrontController::class,'CarDetail'])->name('CarDetail');

Route::get('/my-bookings',[FrontController::class,'MyBookings'])->name('MyBookings');


// owner dashboard
Route::group(['prefix' => 'owner'],function() {
Route::get('/dashboard',[OwnerController::class,'Dashboard'])->name('OwnerDashboard');
});
