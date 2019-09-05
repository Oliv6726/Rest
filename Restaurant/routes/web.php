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
/**
 * User routes
 */
Route::get('/', 'HomeController@index')->name('index');

/**
 * Login & Register routes
 */

Auth::routes();

/**
 * Admin routes
 */
Route::get('/admin', 'AdminController@index')->name('admin');


/**
 * Category routes
 */
Route::get('/admin/category/create', 'CategoryController@create');
Route::post('/admin/category/create', 'CategoryController@add')->name('add_cat');
Route::get('/admin/category/list', 'CategoryController@list');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit');
Route::post('/admin/category/edit/{id}', 'CategoryController@update')->name('update_cat');