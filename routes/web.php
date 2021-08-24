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

Route::get('/', 'HomeController@homeNews')->name('home_news');
Route::get('noticia/{news_id}', 'NewsController@show')->name('news')->middleware('auth');

Route::get('misnoticias', 'NewsController@index')->name('my_news')->middleware('auth');
Route::get('misnoticias/nueva', 'NewsController@create')->name('create_news')->middleware('auth');
Route::post('misnoticias/guardar', 'NewsController@store')->name('save_news')->middleware('auth');
Route::get('misnoticias/editar/{news_id}', 'NewsController@edit')->name('edit_news')->middleware('auth');
Route::post('misnoticias/actualizar', 'NewsController@update')->name('update_news')->middleware('auth');
Route::get('misnoticias/delete/{news_id}', 'NewsController@destroy')->name('delete_news')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
