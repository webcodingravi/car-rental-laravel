<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\owner\ManageBookingController;
use App\Http\Controllers\owner\OwnerController;
use Illuminate\Support\Facades\Route;




Route::get('/', [FrontController::class, 'home'])->name('home');


Route::get('/cars', [FrontController::class, 'cars'])->name('cars');

// search filter car
Route::get('/car/search', [FrontController::class, 'search_car'])->name('search_car');

Route::get('/car/{id}', [FrontController::class, 'CarDetail'])->name('CarDetail');

Route::get('/my-bookings', [FrontController::class, 'MyBookings'])->name('MyBookings');
Route::post('/bookings', [FrontController::class, 'createBooking'])->name('createBooking');

//User login/Register
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// forgot Password
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

// reset Password
Route::get('/reset/{token}', [AuthController::class, 'resetPassword']);
Route::post('/reset/{token}', [AuthController::class, 'processResetPassword'])->name('resetPassword');


// list cars permession
Route::get('/list-cars', [AuthController::class, 'listCars'])->name('listCars');


// pages
Route::get('/about-us', [FrontController::class, 'AboutUs'])->name('AboutUs');

Route::get('/terms-of-service', [FrontController::class, 'TermsOfService'])->name('TermsOfService');

Route::get('/privacy-policy', [FrontController::class, 'PrivacyPolicy'])->name('PrivacyPolicy');




// owner dashboard
Route::group(['middleware' => 'owner'], function () {
    Route::group(['prefix' => 'owner'], function () {
        Route::get('/dashboard', [OwnerController::class, 'Dashboard'])->name('OwnerDashboard');
        Route::get('/add-car', [OwnerController::class, 'AddCar'])->name('OwnerAddCar');
        Route::post('/add-car', [OwnerController::class, 'AddCarProcess'])->name('OwnerAddCarProcess');
        Route::get('/manage-cars', [OwnerController::class, 'ManageCars'])->name('OwnerManageCars');
        Route::get('/edit-car/{id}', [OwnerController::class, 'EditCar'])->name('OwnerEditCar');
        Route::put('/update-car/{id}', [OwnerController::class, 'UpdateCar'])->name('OwnerUpdateCar');
        Route::get('/delete-car/{id}', [OwnerController::class, 'deleteCar'])->name('OwnerDeleteCar');
        Route::get('/manage-bookings', [OwnerController::class, 'ManageBookings'])->name('OwnerManageBookings');
        Route::post('/profile-pic', [OwnerController::class, 'profilePic'])->name('profilePic');
        Route::post('/toggleCarAvailability', [OwnerController::class, 'toggleCarAvailability'])->name('toggleCarAvailability');
        Route::post('/change-booking-status', [OwnerController::class, 'changeBookingStatus'])->name('changeBookingStatus');
    });
});