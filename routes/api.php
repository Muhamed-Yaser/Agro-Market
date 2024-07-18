<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\AllProductController;
use App\Http\Controllers\Api\UserLocationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\LoginCustomerController;
use App\Http\Controllers\Auth\LogoutCutstomerController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredCustomerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//auth
Route::prefix('api')->group(function () {

    Route::post('/customer/register', [RegisteredCustomerController::class, 'register']);

    Route::post('/customer/login', [LoginCustomerController::class, 'login']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

    //other protected routes
    Route::middleware('auth:sanctum')->prefix('customer')->group(function () {

        //logout
        Route::post('/logout', [LogoutCutstomerController::class, 'logout']);
        //profile
        Route::get('/Custprofile', [ProfileController::class, 'show']);
        Route::post('/CustprofileUpdate', [ProfileController::class, 'update']);

        //cart
        Route::post('/cart/add', [CartController::class, 'addToCart']);
        Route::get('/cart', [CartController::class, 'getCart']);
        Route::post('/cart/update/{id?}', [CartController::class, 'updateCartItem']);
        Route::post('/cart/delete/{id?}', [CartController::class, 'deleteFromCart']);

        //fav to cart
        Route::post('/wishlist/add-to-cart', [WishlistController::class, 'addAllToCart']);

        //whishlist
        Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist']);
        Route::get('/wishlist', [WishlistController::class, 'getWishlist']);
        Route::post('/wishlist/item/{id}', [WishlistController::class, 'removeWishlistItem']);
    });

    Route::get('/customer/about', [AboutController::class, 'about']);
    Route::get('/customer/product/{id}', [AllProductController::class, 'getProduct']);
    Route::get('/customer/allProducts', [AllProductController::class, 'getAllProducts']);

    //location
    Route::post('/customer/location', [UserLocationController::class, 'store']);
});
