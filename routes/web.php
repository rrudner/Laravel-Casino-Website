<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'generateView'])->name('home');

Route::get('/login', [LoginController::class, 'generateView'])->name('login');

Route::get('/register', [RegisterController::class, 'generateView'])->name('register');

Route::get('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/register/save', [RegisterController::class, 'save'])->name('register.save');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
