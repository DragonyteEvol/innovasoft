<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', 'App\Http\Controllers\RootController@root');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	/* Favorite */

	Route::get('/create/favorite','App\Http\Controllers\FavoriteController@showFormCrateFavorite')->name('createFavorite');

	Route::post('/insert/favorite','App\Http\Controllers\FavoriteController@insertFavorite')->name('insertFavorite');

	Route::get('/alter/favorite/{id}','App\Http\Controllers\FavoriteController@showFormAlterFavorite')->name('alterFavorite');

	Route::put('/update/favorite/{id}','App\Http\Controllers\FavoriteController@editFavorite')->name('editFavorite');

	Route::delete('/drop/favorite/{id}','App\Http\Controllers\FavoriteController@dropFavorite')->name('dropFavorite');


	/* Categorie */

	Route::get('/create/categorie','App\Http\Controllers\CategorieController@showFormCreateCategorie')->name('createCategorie');

	Route::post('/insert/categorie','App\Http\Controllers\CategorieController@insertCategorie')->name('insertCategorie');

	Route::get('/alter/categorie/{id}','App\Http\Controllers\CategorieController@showFormAlterCategorie')->name('alterCategorie');

	Route::put('/update/categorie/{id}','App\Http\Controllers\CategorieController@editCategorie')->name('editCategorie');

	Route::delete('/drop/categorie/{id}','App\Http\Controllers\CategorieController@dropCategorie')->name('dropCategorie');



});
