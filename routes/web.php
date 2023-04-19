<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);

Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addProduct']);


Route::middleware(['auth'])->group(function(){
Route::get('cart',[CartController::class, 'viewcart']);
Route::get('checkout',[CheckoutController::class, 'index']);
Route::post('place-order',[CheckoutController::class, 'placeorder']);



});

 Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class,  'index']);
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category',[App\Http\Controllers\Admin\CategoryController::class, 'add'] );
    Route::post('insert-category',[App\Http\Controllers\Admin\CategoryController::class, 'insert'] );
    Route::get('edit-prod/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'] );
    Route::put('update-category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'] );
    Route::get('delete-category/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'] );

    Route::get('products',[App\Http\Controllers\Admin\ProductController::class, 'index'] );
    Route::get('add-products',[App\Http\Controllers\Admin\ProductController::class, 'add'] );
    Route::post('insert-product',[App\Http\Controllers\Admin\ProductController::class, 'insert'] );

    Route::get('users', [App\Http\Controllers\Admin\FrontendController::class,  'users']);
    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class,  'index']);









 });
