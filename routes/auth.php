<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredSellerController;
use App\Http\Controllers\Auth\RegisteredCustomerController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\Auth\AuthController;
use App\Http\Controllers\Front\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// //seller
Route::middleware('guest')->prefix('seller')->group(function () {

//     Route::get('/register/seller', [RegisteredSellerController::class, 'create'])->name('registerSeller');
//     Route::post('/register/seller', [RegisteredSellerController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
//     Route::get('login', [RegisteredSellerController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [RegisteredSellerController::class, 'login'])->name('seller.login.submit');

//     Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//         ->name('password.request');

//     Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//         ->name('password.email');

//     Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//         ->name('password.reset');

//     Route::post('reset-password', [NewPasswordController::class, 'store'])
//         ->name('password.store');
});


// //customer
Route::middleware('guest')->prefix('customer')->group(function () {

//     Route::get('/register/customer', [AuthController::class, 'create'])->name('registerCustomer');
//     Route::post('/register/customer', [AuthController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

//     Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [AuthController::class, 'login'])->name('customer.login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
