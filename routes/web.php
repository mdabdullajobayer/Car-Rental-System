<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\CustomerController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::resource('cars', CarController::class);
    Route::resource('customers', AdminCustomerController::class);
    Route::resource('rentals', RentalController::class);
});

Route::prefix('customer')->middleware('role:customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index']);
});
