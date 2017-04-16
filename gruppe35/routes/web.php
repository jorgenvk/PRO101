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

Route::get('/', 'BedriftController@listBedrifter');


Route::get('bedrift/ny', 'BedriftController@pageNyBedrift');

Route::get('bedrift/list', 'BedriftController@listBedrifter');

Route::get('bedrift/list/{filter}', 'BedriftController@sort');

Route::get('bedrift/admin', 'BedriftController@admin');

Route::get('bedrift/delete/{id}', 'BedriftController@delete');



// ::::::: BEDRIFT URLer :::::::
Route::get('bedrift/legg-til', 'BedriftController@pageLeggTilBedrift');
Route::post('bedrift/lagre', 'BedriftController@postNyBedrift');

// ::::::: TEST/midlertidige URLer :::::::
Route::get('bilder', function () {
    return view('bilder');
});
Route::post('bilder/upload', 'BildeController@upload');

Route::get('rating/{id}', 'BedriftController@rating');