<?php

use App\Http\Controllers\PetugasController;



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});

//View Admin
Route::get('Admintype', function () {
    return view('admin/type');
});

Route::get('AdminLokasi', function () {
    return view('admin/lokasi');
});

// Route::get('/lokasi', function () {
//     return view('admin/lokasi');
// });

Route::post('/login', 'PetugasController@lokasisend');

Route::get('/lokasi', 'PetugasController@lokasi');
Route::post('/lokasi-send', 'PetugasController@lokasisend');