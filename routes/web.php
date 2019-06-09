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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/profile', 'UserController@index')->name('user.profile');
Route::patch('/user/{id}/change', 'UserController@cProfile')->name('user.change');

Route::get('/berita/index', 'BeritaController@index')->name('berita.index');
Route::get('/berita/{id}/edit', 'BeritaController@edit')->name('berita.edit');
Route::patch('/berita/{id}/update', 'BeritaController@update')->name('berita.update');
Route::delete('/berita/{id}/delete', 'BeritaController@destroy')->name('berita.destroy');
Route::get('/berita/create', 'BeritaController@create')->name('berita.create');
Route::post('/berita/store', 'BeritaController@store')->name('berita.store');

Route::get('/kategori/index', 'KategoriController@index')->name('kategori.index');
Route::get('/kategori/{id}/edit', 'KategoriController@edit')->name('kategori.edit');
Route::patch('/kategori/{id}/update', 'KategoriController@update')->name('kategori.update');
Route::delete('/kategori/{id}/delete', 'KategoriController@destroy')->name('kategori.destroy');
Route::get('/kategori/create', 'KategoriController@create')->name('kategori.create');
Route::post('/kategori/store', 'KategoriController@store')->name('kategori.store');


