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

Route::get('/','IndexController@index')->name('index.index');
Route::get('/post/{slag}','IndexController@show')->name('index.show');

Route::get('/przygoda','AdventureConstroller@index')->name('adventure.index');
Route::get('/przygoda/{slag}','AdventureConstroller@show')->name('adventure.show');

Route::post('commets/setcommets','CommentController@store');
Route::get('commets/getcommets','CommentController@index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');