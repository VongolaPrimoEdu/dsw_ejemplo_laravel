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

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
Route::post('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');

Route::get('/admin/product/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
Route::put('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
Route::delete('/admin/product/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name('admin.product.destroy');