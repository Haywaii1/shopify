<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ElectronicsController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use App\Models\Electronics;
use App\Models\Clothes;


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
Route::get('/electronics', [ElectronicsController::class, 'electronics'])->name('electronics');
Route::get('/laptops/{id}', [ElectronicsController::class, 'laptops'])->name('laptops');
Route::get('/tshirt/{id}', [ClothesController::class, 'tshirt'])->name('tshirt');
Route::get('/clothes', [ClothesController::class, 'clothes'])->name('clothes');
Route::get('/fashion', [ProductController::class, 'fashion'])->name('fashion');
Route::get('/jewellery', [ProductController::class, 'jewellery'])->name('jewellery')->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register.user')->middleware('guest');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user')->middleware('guest');
Route::get('/verify-email-page', [AuthController::class, 'verifyEmailPage'])->name('verify.email.page');
Route::get('/email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');


// For multiple route
// Route::get('/product/{slug}', 'ProductController@show')->name('product.show');


Route::get('/jumkas/{id}', [ProductController::class, 'jumkas'])->name('jumkas');

Route::get('/necklaces/{id}', [ProductController::class, 'necklaces'])->name('necklaces');
Route::get('/kagans/{id}', [ProductController::class, 'kagans'])->name('kagans');
Route::get('/shirt/{id}', [ProductController::class, 'shirt'])->name('shirt');
Route::get('/gown/{id}', [ProductController::class, 'gown'])->name('gown');
Route::get('/laptop/{id}', [ProductController::class, 'laptop'])->name('laptop');


Route::get('/products', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

// Cart routes
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::get('cart', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth');
Route::get('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'processOrder'])->name('checkout.process')->middleware('auth');



Route::get('/products', [ProductController::class, 'jumkas']);  // Route to fetch all products
Route::get('/products/{id}', [ProductController::class, 'show']);  // Route to fetch a single product
Route::get('/category/{categoryId}/products', [ProductController::class, 'indexByCategory']);  // Fetch products by category




Auth::routes();

Route::get('/', [App\Http\Controllers\HomePageController::class, 'welcome'])->name('welcome');
