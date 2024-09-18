<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware('role:admin');

Route::get('customer/dashboard', [CustomerController::class, 'index'])->middleware('role:customer');
