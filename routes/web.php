<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;

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
use App\Repositories\UserRepository;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/orders', function () {
    return view('orders.showorders');
});

Auth::routes();
//Users
//all users
Route::get('/users',[UserController::class,'index'])->name('users.index')->can('isAdmin');
//show user create form
Route::get('/users/create',[UserController::class,'create'])->name('users.create')->middleware('can:create,App\User');
Route::post('/users',[UserController::class,'store'])->name('users.store');
//show edit form
Route::get('users/{user}/edit',[UserController::class,'edit'])->can('isAdmin');
//update user
Route::put('/users/{user}',[UserController::class,'update']);
//end of users route






//client
// show create form

Route::get('/clients',[ClientController::class,'index'])->name('clients.index');
Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');

//crete client
Route::post('/clients',[ClientController::class,'store'])->name('clients.store');
//edit client
Route::get('clients/{client}/edit',[ClientController::class,'edit'])->name('clients.edit');
//update client
Route::put('/clients/{client}',[ClientController::class,'update'])->name('clients.update');
//end client


//product routes
Route::get('/products',[ProductController::class,'index'])->name('products.index')->can('isAdmin');
//create product
Route::get('/products/create',[ProductController::class,'create'])->name('products.create')->can('isAdmin');
//store product
Route::post('/products',[ProductController::class,'store'])->name('products.store')->can('isAdmin');
//show eeit form
Route::get('products/{product}/edit',[ProductController::class,'edit'])->can('isAdmin');
//update product
Route::put('/products/{product}',[ProductController::class,'update'])->can('isAdmin');
//endproduct



//order routes
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/create',[OrderController::class,'create'])->name('orders.create');
Route::post('/orders',[OrderController::class,'store'])->name('orders.store');
Route::get('orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');
//update order
Route::put('/orders/{order}',[OrderController::class,'update'])->name('orders.update');

Route::get('/orders/{order}/cancel', [OrderController::class,'cancel'])->name('orders.cancel');











Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
