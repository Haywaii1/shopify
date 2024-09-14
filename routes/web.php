<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


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

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/electronics', [ProductController::class, 'electronics'])->name('electronics')->middleware('auth');
Route::get('/fashion', [ProductController::class, 'fashion'])->name('fashion')->middleware('auth');
Route::get('/jewellery', [ProductController::class, 'jewellery'])->name('jewellery')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register.user')->middleware('guest');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user')->middleware('guest');
Route::get('/verify-email-page', [AuthController::class, 'verifyEmailPage'])->name('verify.email.page');
Route::get('/email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');





Auth::routes();

Route::get('/', [App\Http\Controllers\HomePageController::class, 'welcome'])->name('welcome');
