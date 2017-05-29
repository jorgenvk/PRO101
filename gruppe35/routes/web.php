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

Route::get('/', 'Controller@forside');

Route::get('arrangement/list', 'ArrangementController@listalle');
Route::get('arrangement/show/{id}', 'ArrangementController@show')->where('id', '[0-9]+');

Route::get('bedrift/list', 'BedriftController@sort');
Route::get('bedrift/list/{kategori}/{filter}', 'BedriftController@sort');
Route::post('bedrift/search', 'BedriftController@search');
Route::get('bedrift/show/{id}', 'BedriftController@show');
Route::get('bedrift/avstand/{bedrift}/{adresse}', 'BedriftController@avstand');
Route::get('bedrift/rating/{bedrift}/{adresse}', 'BedriftController@rating');

Route::post('kommentarer/{bedrift_id}', 'KommentarController@lagre');
Route::post('bilder/upload', 'BildeController@upload');

Route::get('omoss', 'Controller@omoss');

Auth::routes();

// Routes beskyttet for admin
Route::group(['middleware' => 'auth'], function () {
Route::get('/admin', 'Controller@admin');
Route::get('arrangement/ny', 'ArrangementController@pageNyttArrangement');
Route::get('arrangement/admin', 'ArrangementController@admin');
Route::get('arrangement/edit/{id}', 'ArrangementController@edit')->where('id', '[0-9]+');
Route::post('arrangement/update/{id}', 'ArrangementController@update')->where('id', '[0-9]+');
Route::get('arrangement/delete/{id}', 'ArrangementController@delete')->where('id', '[0-9]+');
Route::post('arrangement/lagre', 'ArrangementController@lagre');
Route::get('bedrift/legg-til', 'BedriftController@pageLeggTilBedrift');
Route::post('bedrift/lagre', 'BedriftController@postNyBedrift');
Route::get('bedrift/edit/{id}', 'BedriftController@edit');
Route::post('bedrift/update/{id}', 'BedriftController@update');
Route::get('bedrift/admin', 'BedriftController@admin');
Route::get('bedrift/ny', 'BedriftController@pageNyBedrift');
Route::get('bedrift/delete/{id}', 'BedriftController@delete');
});
