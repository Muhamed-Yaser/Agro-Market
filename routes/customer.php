<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\Auth\AuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return redirect()->route('customer.login.submit');
// });
//customer
Route::middleware('guest')->prefix('customer')->group(function () {

    Route::get('/register/customer', [AuthController::class, 'create'])->name('registerCustomer');
    Route::post('/register/customer', [AuthController::class, 'store']);

    // Route::get('login', [AuthenticatedSessionController::class, 'create'])
    // ->name('login');

    // Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    // Route::post('login', [AuthController::class, 'login'])->name('customer.login.submit');
});

Route::middleware(['auth', 'verified' , 'role:seller'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('homePage');

    Route::get('/home', [ProductController::class, 'index'])->name('products');
    Route::get('/allProducts', [CartController::class, 'allProductsAndCart'])->name('Allproducts');
    Route::get('/customer/about', [AboutController::class, 'about'])->name('about');


    Route::get('/favProducts', [ProductController::class, 'favProducts'])->name('favProducts');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');



    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::get('/cart', [CartController::class, 'showCart'])->name('show.cart');
    Route::post('/cart/update', [CartController::class, 'updateCartItem'])->name('cart.update');
    Route::post('/cart/delete', [CartController::class, 'deleteFromCart'])->name('cart.delete');

    Route::post('/logoutCustomer', [AuthController::class , 'logoutCustomer'])->name('logoutCustomer');
});


require __DIR__ . '/auth.php';
