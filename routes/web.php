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

use App\Http\Controllers\data;
use App\Http\Controllers\MahasiswaController;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/service', function () {
    return view('service');
});

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/data', 'MahasiswaController@index');

