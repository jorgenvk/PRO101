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

<<<<<<< HEAD

Route::get('bedrift/ny', 'BedriftController@pageNyBedrift');

Route::get('bedrift/list', 'BedriftController@listBedrifter');
=======
// ::::::: BEDRIFT URLer :::::::
Route::get('bedrift/legg-til', 'BedriftController@pageLeggTilBedrift');
Route::post('bedrift/lagre', 'BedriftController@postNyBedrift');
>>>>>>> 26ce403e0f27b9fd993a13b1a681d6c1eae2ae0e
