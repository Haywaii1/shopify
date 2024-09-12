<?php

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

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomePageController::class, 'welcome'])->name('welcome');
