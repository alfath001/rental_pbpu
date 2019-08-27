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

// Route::get('/admin', function () {
//     return view('admin');
// });

// Route::get('/view', function () {
//     return view('view-admin');
// });

Route::get('/view', ['uses'=>'KendaraanController@viewKendaraan']);

Route::get('/admin', ['uses'=>'KendaraanController@admin']);
Route::post('admin', ['as'=>'admin','uses'=>'KendaraanController@adminPost']);
