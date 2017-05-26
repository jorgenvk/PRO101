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


Route::get('bedrift/ny', 'BedriftController@pageNyBedrift');

Route::get('bedrift/list', 'BedriftController@listBedrifter');

Route::get('bedrift/list/{filter}', 'BedriftController@sort');

Route::post('bedrift/search', 'BedriftController@search');

Route::get('bedrift/admin', 'BedriftController@admin');

Route::get('bedrift/delete/{id}', 'BedriftController@delete');

Route::get('bedrift/show/{id}', 'BedriftController@show');

Route::post('kommentarer/{bedrift_id}', 'KommentarController@lagre');

Route::get('bedrift/legg-til', 'BedriftController@pageLeggTilBedrift');
Route::post('bedrift/lagre', 'BedriftController@postNyBedrift');

Route::get('arrangement/ny', 'ArrangementController@pageNyttArrangement');
Route::post('arrangement/lagre', 'ArrangementController@lagre');

Route::post('bilder/upload', 'BildeController@upload');

Route::get('bedrift/avstand/{bedrift}/{adresse}', 'BedriftController@avstand');

Route::get('rating/{id}', 'BedriftController@rating');
Route::get('rate/{id}/{score}', 'BedriftController@rate');