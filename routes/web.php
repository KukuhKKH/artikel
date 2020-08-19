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

Route::get('/blog', 'PageController@blog')->name('blog.index');
Route::get('/blog/{slug}', 'PageController@slug')->name('blog.slug');
Route::post('/komentar', 'Artikel\ArtikelController@komentar')->name('blog.komentar');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:Admin,Writer']], function() {
    Route::get('/', 'PageController@home')->name('dashboard');

    Route::group(['namespace' => 'Artikel'], function (){
        Route::get('/artikel/sampah', 'ArtikelController@sampah')->name('artikel.sampah');
        Route::post('/artikel/puilhkan/{id}', 'ArtikelController@restore')->name('artikel.restore');
        Route::Resource('/artikel', 'ArtikelController');
    
        Route::get('/kategori/sampah', 'KategoriController@sampah')->name('kategori.sampah');
        Route::post('/kategori/puilhkan/{id}', 'KategoriController@restore')->name('kategori.restore');
        Route::Resource('/kategori', 'KategoriController')->except(['show']);
    });
});
