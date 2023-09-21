<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyProductsController;
use App\Http\Controllers\ViewAllProductsController;
use App\Http\Controllers\CartController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [PagesController::class, 'home']);
Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['web']], function () {

    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/my-products', [MyProductsController::class, 'index'])->name('my-products');
    Route::get('/edit-product/{product_id}', [MyProductsController::class, 'edit'])->name('edit_product');
    Route::post('/update-product/{product_id}', [MyProductsController::class, 'update'])->name('update_product');
    Route::get('/delete-product/{product_id}', [MyProductsController::class, 'delete'])->name('delete_product');
    Route::get('/view_all_products', [ViewAllProductsController::class, 'index'])->name('view_all_products');
    Route::post('/add_to_cart', [CartController::class, 'addProductToCart'])->name('add_to_cart');

    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
    Route::post('/remove-from-cart/{cart_item_id}', [CartController::class, 'removeProductFromCart'])->name('remove-from-cart');
    Route::get('/get_cart_item_count', [CartController::class, 'getCartItemCount'])->name('get_cart_item_count');

});