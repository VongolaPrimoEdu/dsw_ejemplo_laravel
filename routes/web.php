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

Route::get('/', "App\Http\Controllers\HomeController@index")->name("home.index");

Route::get("/about", "App\Http\Controllers\HomeController@about")->name("home.about");

// Ruta para el listado de productos
Route::get('/products',"App\Http\Controllers\ProductController@index" )->name('product.productos');

// Ruta para mostrar detalles de un producto por su ID
Route::get('/products/{id}',"App\Http\Controllers\ProductController@show" )->name('product.detalles');