<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
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

Route::get('/home', [PagesController::class, 'home']);
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/my-products', 'MyProductsController@index')->name('my_products');
Route::get('/view-all-products', 'ViewAllProductsController@index')->name('view_all_products');
Route::post('/add-product', 'ProductController@store')->name('add_product');
