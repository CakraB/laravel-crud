<?php

use Illuminate\Support\Facades\App;
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
    return view('welcome');
});

Route::post('upload/store','ImageController@store');
Route::get('/upload/{id}/edit','ImageController@edit');
Route::post('/upload/{id}/update','ImageController@update');
Route::get('/upload/{id}/delete','ImageController@destroy');
Route::get('/upload','ImageController@view');

// function untuk localization (billingual)
//Route redirect sehingga saat menggunakan route upload akan diarahin ke route view menggunakna Bahasa Indonesia
// Route::redirect('/upload', 'id/upload');

// Route group untuk mendefinisikan route yang menggunakan localization
// Route::group(['prefix'=>'{lang}','where' => ['lang' => '[a-zA-Z]{2}'],], function () {
//     Route::get('/upload','ImageController@view');
// });
