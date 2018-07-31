<?php

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

Route::get('/', 'HomeController@index');
Route::get('/pro', 'ProductController@index')->name('product.index');
Route::get('/show/{product}', 'ProductController@show')->name('product.show');
Route::get('/add/product', 'ProductController@create')->name('add.product')->middleware('auth');
Route::post('/add/product', 'ProductController@store')->name('create.product');
Route::post('/product/search', 'ProductController@search')->name('product.search');
/*--------------------BEGIN-ADMIN-------------------------*/
    Route::get('/admin', 'AdminController@isAdmin')->name('admin.index');
    Route::get('/admin/login/page', 'AdminController@loginAdmin')->name('admin.login');
    Route::get('/admin/add/product/page', 'AdminController@create')->name('admin.createPage');
/*--------------------END-ADMIN-------------------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

