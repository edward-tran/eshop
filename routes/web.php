<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Homepage\CartController;
use App\Http\Controllers\HomePage\CheckoutController;
use App\Http\Controllers\HomePage\HomePageController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [HomePageController::class, 'index']);
Route::get('/category', [HomePageController::class, 'showCategory']);
Route::get('/category/{slug}', [HomePageController::class, 'showProduct']);
Route::get('/category/{category_slug}/{product_slug}', [HomePageController::class, 'showProductDetail']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);
Route::get('user-detail', [HomePageController::class, 'showUserDetail']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartController::class, 'showCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
});


Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');

    //Category Route
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@add');
    Route::post('/insert-category', 'Admin\CategoryController@insert');
    Route::get('/edit-category/{id}', 'Admin\CategoryController@edit');
    Route::post('/update-category/{id}', 'Admin\CategoryController@update');
    Route::get('/delete-category/{id}', 'Admin\CategoryController@destroy');

    //Product Route
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-product', [ProductController::class, 'add']);
    Route::post('/insert-product', [ProductController::class, 'insert']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);

});