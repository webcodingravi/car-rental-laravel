<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('home');


Route::get('/cars', [FrontController::class, 'cars'])->name('cars');
Route::get('/cars-detail', [FrontController::class, 'CarDetail'])->name('CarDetail');

Route::get('/my-bookings', [FrontController::class, 'MyBookings'])->name('MyBookings');


//User login/Register
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// list cars permession
Route::get('/list-cars', [AuthController::class, 'listCars'])->name('listCars');


// owner dashboard
Route::group(['prefix' => 'owner'], function () {
    Route::get('/dashboard', [OwnerController::class, 'Dashboard'])->name('OwnerDashboard');

    Route::get('/add-car', [OwnerController::class, 'AddCar'])->name('OwnerAddCar');
    Route::get('/edit-car', [OwnerController::class, 'EditCar'])->name('OwnerEditCar');
    Route::get('/manage-cars', [OwnerController::class, 'ManageCars'])->name('OwnerManageCars');
    Route::get('/manage-bookings', [OwnerController::class, 'ManageBookings'])->name('OwnerManageBookings');
});