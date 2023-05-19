<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/new', 'ProductController@create')->name('products.create');
Route::post('/products/store', 'ProductController@store')->name('products.store');
Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::put('/products/update/{id}', 'ProductController@update')->name('products.update');
Route::delete('/products/delete/{id}', 'ProductController@delete')->name('products.delete');
