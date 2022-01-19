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

Route::get('/', 'RootController@root');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	/* Favorite */

	Route::get('/create/favorite','FavoriteController@showFormCrateFavorite')->name('createFavorite');

	Route::post('/insert/favorite','FavoriteController@insertFavorite')->name('insertFavorite');

	Route::get('/alter/favorite/{id}','FavoriteController@showFormAlterFavorite')->name('alterFavorite');

	Route::put('/update/favorite/{id}','FavoriteController@editFavorite')->name('editFavorite');

	Route::delete('/drop/favorite/{id}','FavoriteController@dropFavorite')->name('dropFavorite');


	/* Categorie */

	Route::get('/create/categorie','CategorieController@showFormCreateCategorie')->name('createCategorie');

	Route::post('/insert/categorie','CategorieController@insertCategorie')->name('insertCategorie');

	Route::get('/alter/categorie/{id}','CategorieController@showFormAlterCategorie')->name('alterCategorie');

	Route::put('/update/categorie/{id}','CategorieController@editCategorie')->name('editCategorie');

	Route::delete('/drop/categorie/{id}','CategorieController@dropCategorie')->name('dropCategorie');



});
