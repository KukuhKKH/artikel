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
    return view('soon');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:Admin,Writer']], function() {
    Route::get('/', 'PageController@home')->name('dashboard');

    Route::get('/artikel/sampah', 'Artikel\ArtikelController@sampah')->name('artikel.sampah');
    Route::post('/artikel/puilhkan/{id}', 'Artikel\ArtikelController@restore')->name('artikel.restore');
    Route::Resource('/artikel', 'Artikel\ArtikelController');

    Route::get('/kategori/sampah', 'Artikel\KategoriController@sampah')->name('kategori.sampah');
    Route::post('/kategori/puilhkan/{id}', 'Artikel\KategoriController@restore')->name('kategori.restore');
    Route::Resource('/kategori', 'Artikel\KategoriController')->except(['show']);
});
