<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('items/{id}', 'ItemsController@update')->name('items.update');
Route::get('categories/tree', 'CategoriesController@tree')->name('categories.tree');
Route::get('categories/{category}/items', 'CategoryItemsController@index')->name('category.items.index');

Route::apiResource('categories', 'CategoriesController')->except('show');
Route::apiResource('items', 'ItemsController')->except('update');


