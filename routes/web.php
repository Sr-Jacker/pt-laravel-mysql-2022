<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CustomersController;
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
Route::get('/', function () {
    return view('productos');
});

//Rutas para productos

Route::get('/productos',[ProductController::class,'index'])->name('productos');

Route::post('/productos',[ProductController::class,'store'])->name('productos');

Route::get('/productos/{id}',[ProductController::class,'show'])->name('productos-show');

Route::patch('/productos/{id}',[ProductController::class,'update'])->name('productos-update');

Route::delete('/productos/{id}',[ProductController::class,'destroy'])->name('productos-destroy');


//Rutas para ciudades

Route::get('/cities',[CitiesController::class,'index'])->name('cities');

Route::post('/cities',[CitiesController::class,'store'])->name('cities');

Route::get('/cities/{id}',[CitiesController::class,'show'])->name('cities-show');

Route::patch('/cities/{id}',[CitiesController::class,'update'])->name('cities-update');

Route::delete('/cities/{id}',[CitiesController::class,'destroy'])->name('cities-destroy');


//Rutas para clientes

Route::get('/customers',[CustomersController::class,'index'])->name('customers');

Route::post('/customers',[CustomersController::class,'store'])->name('customers');

Route::get('/customers/{id}',[CustomersController::class,'show'])->name('customers-show');

Route::patch('/customers/{id}',[CustomersController::class,'update'])->name('customers-update');

Route::delete('/customers/{id}',[CustomersController::class,'destroy'])->name('customers-destroy');

