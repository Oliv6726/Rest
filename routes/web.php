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
 * Login, register, etc routes
 */
Route::get('admin/logout', 'AdminController@logout');
Auth::routes();

/**
 * Admin routes
 */
Route::get('/admin', 'AdminController@index')->name('admin');


/**
 * Category routes
 */
Route::get('/admin/category/create', 'CategoryController@create');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit');
Route::post('/admin/category/edit/{id}', 'CategoryController@update')->name('update_cat');
Route::post('/admin/category/create', 'CategoryController@add')->name('add_cat');
Route::get('/admin/category/delete/{id}', 'CategoryController@delete')->name('delete_cat');

/**
 * Product routes
 */
Route::get('/admin/product/create', 'ProductController@create');
Route::post('/admin/product/create', 'ProductController@add')->name('add_prod');
Route::get('/admin/product/create/delete/{id}', 'ProductController@delete')->name('delete_product');

/**
 * Staff routes
 */
Route::get('/admin/staff/list', 'StaffController@list');
Route::post('/admin/staff/list', 'StaffController@add')->name('add_staff');
Route::get('/admin/staff/edit/{id}', 'StaffController@edit');
Route::post('/admin/staff/edit/{id}', 'StaffController@update')->name('update_staff');
Route::delete('/admin/staff/list', 'StaffController@delete')->name('delete_staff');

/**
 * Ingredients route sdelete_ingredient
 */
Route::get('/admin/product/ingredients', 'IngredientController@create');
Route::post('/admin/product/ingredients', 'IngredientController@add')->name('add_ingredient');
Route::get('/admin/product/ingredients/delete/{id}', 'IngredientController@delete')->name('delete_ingredient');


/**
 * Menu routes
 */
Route::get('/admin/menu/', 'MenuController@create');
Route::post('/admin/menu', 'MenuController@add')->name('add_menu');

/**
 * Order routes
 */

 Route::get('/admin/orders', 'OrderController@index');