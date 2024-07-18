<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductContoller;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\RegisteredSellerController;

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

    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified','role:seller'])->name('dashboard.dashboard');

//seller
Route::middleware('guest')->prefix('seller')->group(function () {

    Route::get('/register/seller', [RegisteredSellerController::class, 'create'])->name('registerSeller');
    Route::post('/register/seller', [RegisteredSellerController::class, 'store']);

    // Route::get('login', [AuthenticatedSessionController::class, 'create'])
    // ->name('login');

    // Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // Route::get('login', [RegisteredSellerController::class, 'showLoginForm'])->name('login');
    // Route::post('login', [RegisteredSellerController::class, 'login'])->name('seller.login.submit');
});

Route::middleware(['auth', 'verified', 'role:seller'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//Products
    Route::resource('/dashboard/products', ProductContoller::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);
});


require __DIR__ . '/auth.php';
