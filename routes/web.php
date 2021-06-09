<?php

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

Route::get('/', [HomeController::class, 'generateView'])->name('home');

Route::get('/login', [LoginController::class, 'generateView'])->name('login');

Route::get('/register', [RegisterController::class, 'generateView'])->name('register');

Route::get('/payment', [PaymentController::class, 'generateView'])->name('payment');

//

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/register/save', [RegisterController::class, 'save'])->name('register.save');

Route::get('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/payment/deposit', [PaymentController::class, 'deposit'])->name('payment.deposit');

Route::get('/payment/withdraw', [PaymentController::class, 'withdraw'])->name('payment.withdraw');
