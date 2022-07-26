<?php

use App\Http\Controllers\PetugasController;
use App\Http\Controllers\Login;



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
Route::get('/admin-lokasi', 'AdminController@lokasi');
Route::get('/admin-type', 'AdminController@type');
Route::get('/admin-barang', 'AdminController@barang');
Route::get('/admin-user', 'AdminController@user');
Route::get('/admin-satuan', 'AdminController@satuan');
Route::get('/admin-role', 'AdminController@role');

Route::get('/tambah-lokasi', 'AdminController@tambahlokasi');
Route::post('/lokasi-form', 'AdminController@storelokasi');
Route::get('/lokasi-form', 'AdminController@storelokasi');

Route::get('/lokasi', function () {
    return view('admin/lokasi');
});


// Route::post('/welcome', [Login::class,'authenticate']);

Route::get('/login',                     [Login::class, 'index']);
Route::post('/login',                    [Login::class, 'authentication']);

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');

// Route::group(['middleware' => ['auth', 'CekLevel:admin']], function(){
//     Route::get('/halaman-admin','LoginController@halamanadmin')->name('halaman-admin');
// });

// Route::group(['middleware' => ['auth', 'CekLevel:petugas']], function(){
//     Route::get('/halaman-petugas','LoginController@halamanpetugas')->name('halaman-petugas');
// });

//Petugas
Route::post('/login', 'PetugasController@lokasisend');

// Route::get('/admin-lokasi', 'LokasiController@tabellokasi');

Route::get('/petugas-lokasi', 'PetugasController@lokasi');
Route::get('/petugas-barang/{idlokasi}', 'PetugasController@lokasisend');
// Route::post('/petugas-barang', 'PetugasController@lokasisend');
Route::get('/petugas-barang-input/{idlokasi}', 'PetugasController@inputBarang');
Route::post('/petugas-barang-input', 'PetugasController@saveBarang');
Route::post('/priveiew-type', 'PetugasController@previewType');
Route::post('/priveiew-barang', 'PetugasController@previewBarang');
