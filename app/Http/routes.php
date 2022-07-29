<?php

use App\Http\Controllers\PetugasController;
use App\Http\Controllers\Login;
use App\Providers\RouteServiceProvider;

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

//Admin-Barang
Route::get('/admin-barang', 'AdminController@barang');

//Admin-Jabatan
Route::get('/admin-jabatan', 'AdminController@jabatan');
Route::get('/tambah-jabatan', 'AdminController@tambahjabatan');
Route::post('/jabatan-form', 'AdminController@storejabatan');
Route::get('/edit-jabatan{id}', 'AdminController@editjabatan');
Route::post('/update-jabatan-form{id}', 'AdminController@updatejabatan');
Route::get('/hapus-jabatan{id}', 'AdminController@destroyjabatan');

//Admin-Lokasi
Route::get('/admin-lokasi', 'AdminController@lokasi');
Route::get('/tambah-lokasi', 'AdminController@tambahlokasi');
Route::post('/lokasi-form', 'AdminController@storelokasi');
Route::get('/lokasi-form', 'AdminController@storelokasi');
Route::get('/edit-lokasi{id}', 'AdminController@editlokasi');
Route::post('/update-lokasi-form{id}', 'AdminController@updatelokasi');
Route::get('/hapus-lokasi{id}', 'AdminController@destroylokasi');

//Admin-Role
Route::get('/admin-role', 'AdminController@role');
Route::get('/tambah-role', 'AdminController@tambahrole');
Route::post('/role-form', 'AdminController@storerole');
Route::get('/edit-role{id}', 'AdminController@editrole');
Route::post('/update-role-form{id}', 'AdminController@updaterole');
Route::get('/hapus-role{id}', 'AdminController@destroyrole');

//Admin-Satuan
Route::get('/admin-satuan', 'AdminController@satuan');
Route::get('/tambah-satuan', 'AdminController@tambahsatuan');
Route::post('/satuan-form', 'AdminController@storesatuan');
Route::get('/edit-satuan{id}', 'AdminController@editsatuan');
Route::post('/update-satuan-form{id}', 'AdminController@updatesatuan');
Route::get('/hapus-satuan{id}', 'AdminController@destroysatuan');

//Admin-Type
Route::get('/admin-type', 'AdminController@type');
Route::get('/tambah-type', 'AdminController@tambahtype');
Route::post('/type-form', 'AdminController@storetype');
Route::get('/edit-type{id}', 'AdminController@edittype');
Route::post('/update-type-form{id}', 'AdminController@updatetype');
Route::get('/hapus-type{id}', 'AdminController@destroytype');

//Admin-User
Route::get('/admin-user', 'AdminController@user');
Route::get('/tambah-user', 'AdminController@tambahuser');
Route::post('/user-form', 'AdminController@storeuser');
Route::get('/edit-user{id}', 'AdminController@edituser');
Route::post('/update-user-form{id}', 'AdminController@updateuser');
Route::get('/hapus-user{id}', 'AdminController@destroyuser');




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
