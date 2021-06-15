<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
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

//Route::get('/', [HomeController::class, 'generateView'])->name('home')->middleware('roleUnallowed:null');
Route::get('/', [GameController::class, 'generateView'])->name('home')->middleware('roleUnallowed:null');
Route::get('/win{amount}', [GameController::class, 'gameWin'])->name('gameWin')->middleware('roleAllowed:user');
Route::get('/lose{amount}', [GameController::class, 'gameLose'])->name('gameLose')->middleware('roleAllowed:user');
Route::get('/win', [GameController::class, 'gameWin0'])->name('gameWin0')->middleware('roleAllowed:user');
Route::get('/lose', [GameController::class, 'gameLose0'])->name('gameLose0')->middleware('roleAllowed:user');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout')->middleware('roleUnallowed:null');

Route::get('/account', [AccountController::class, 'generateView'])->name('account')->middleware('roleUnallowed:null');
Route::get('/account/save', [AccountController::class, 'editAccount'])->name('account.save')->middleware('roleUnallowed:null');


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
Route::get('/admin/users/delete{userId}', [AdminController::class, 'deleteUser'])->name('adminUsersDelete')->middleware('roleAllowed:admin');
Route::get('/admin/users/edit{userId}', [AdminController::class, 'generateViewEditUser'])->name('adminUsersEdit')->middleware('roleAllowed:admin');
Route::get('/admin/users/edit/save', [AdminController::class, 'editUser'])->name('adminUsersEdit.save')->middleware('roleAllowed:admin');

Route::get('/admin/games', [AdminController::class, 'generateViewGames'])->name('adminGames')->middleware('roleAllowed:admin');
Route::get('/admin/games/delete{userId}', [AdminController::class, 'deleteGame'])->name('adminGamesDelete')->middleware('roleAllowed:admin');

Route::get('/admin/roles', [AdminController::class, 'generateViewRoles'])->name('adminRoles')->middleware('roleAllowed:admin');
Route::get('/admin/roles/delete{roleId}', [AdminController::class, 'deleteRole'])->name('adminRolesDelete')->middleware('roleAllowed:admin');
Route::get('/admin/roles/add', [AdminController::class, 'addRole'])->name('adminRolesAdd')->middleware('roleAllowed:admin');
