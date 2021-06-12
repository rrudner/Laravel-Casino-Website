<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'generateView'])->name('home')->middleware('roleUnallowed:null');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'generateView'])->name('login');
Route::get('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/register', [RegisterController::class, 'generateView'])->name('register');
Route::get('/register/save', [RegisterController::class, 'save'])->name('register.save');

Route::get('/payment', [PaymentController::class, 'generateView'])->name('payment')->middleware('roleAllowed:user');
Route::get('/payment/deposit', [PaymentController::class, 'deposit'])->name('payment.deposit')->middleware('roleAllowed:user');
Route::get('/payment/withdraw', [PaymentController::class, 'withdraw'])->name('payment.withdraw')->middleware('roleAllowed:user');

Route::get('/admin', [AdminController::class, 'generateView'])->name('admin')->middleware('roleAllowed:admin');
Route::get('/admin/payments', [AdminController::class, 'generateViewPayments'])->name('adminPayments')->middleware('roleAllowed:admin');
Route::get('/admin/payments/delete{paymentId}', [AdminController::class, 'deletePayment'])->name('adminPaymentsDelete')->middleware('roleAllowed:admin');
Route::get('/admin/users', [AdminController::class, 'generateViewUsers'])->name('adminUsers')->middleware('roleAllowed:admin');
