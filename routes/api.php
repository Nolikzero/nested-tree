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

Route::post('items/{id}', 'ItemsController@update');
Route::get('categories/tree', 'CategoriesController@tree');
Route::get('categories/{category}/items', 'CategoryItemsController@index');

Route::apiResource('categories', 'CategoriesController')->except('show');
Route::apiResource('items', 'ItemsController')->except('update');


