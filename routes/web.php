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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', "FilmController@index");
Route::get('/{slug_cate}/{slug_name}/{id}', "FilmDetailController@index");
Route::get('/search', "FilmController@search");
Route::get('/page-search/{keyword}', "FilmController@pageSearch");
Route::get('/genner/{name}', "FilmDetailController@generByFilm");
Route::get('/country/{name}', "FilmDetailController@countryByFilm");
