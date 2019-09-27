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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/hardwares', 'HardwaresController@index')->name('hardwares');
Route::post('/hardwareData', 'HardwaresController@hardwareData' )->name('hardwareData');
Route::post('/hardwareDataDetail', 'HardwaresController@hardwareDataDetail' )->name('hardwareDataDetail');
Route::post('/detailHardwareData', 'HardwaresController@detailHardwareData' )->name('detailHardwareData');
Route::post('/addHardware', 'HardwaresController@addHardware' )->name('addHardware');
Route::post('/editHardware/{id}', 'HardwaresController@editHardware')->name('editHardware');

Route::delete('/deleteHardware/{id}', 'HardwaresController@deleteHardware');
