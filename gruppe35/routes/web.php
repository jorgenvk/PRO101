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


Route::get('bedrift/ny', 'BedriftController@pageNyBedrift');

Route::get('bedrift/list', 'BedriftController@listBedrifter');

// ::::::: BEDRIFT URLer :::::::
Route::get('bedrift/legg-til', 'BedriftController@pageLeggTilBedrift');
Route::post('bedrift/lagre', 'BedriftController@postNyBedrift');
