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


Route::get('/', function (){ return view('login');})->middleware('guest');
Route::post('/login-proses', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');
Route::get('/dashboard', 'AdminController@dashboard')->middleware('admin');

// Route::get('/dashboard', function (){ return view('/admin/dashboard');})->middleware('admin');

//View Admin

//Admin-Barang
Route::get('/admin-barang', 'AdminController@barang')->middleware('admin');

//Admin-Jabatan
Route::get('/admin-jabatan', 'AdminController@jabatan')->middleware('admin');
Route::get('/tambah-jabatan', 'AdminController@tambahjabatan')->middleware('admin');
Route::post('/jabatan-form', 'AdminController@storejabatan')->middleware('admin');
Route::get('/edit-jabatan{id}', 'AdminController@editjabatan')->middleware('admin');
Route::post('/update-jabatan-form{id}', 'AdminController@updatejabatan')->middleware('admin');
Route::get('/hapus-jabatan{id}', 'AdminController@destroyjabatan')->middleware('admin');

//Admin-Lokasi
Route::get('/admin-lokasi', 'AdminController@lokasi')->middleware('admin');
Route::get('/tambah-lokasi', 'AdminController@tambahlokasi')->middleware('admin');
Route::post('/lokasi-form', 'AdminController@storelokasi')->middleware('admin');
Route::get('/lokasi-form', 'AdminController@storelokasi')->middleware('admin');
Route::get('/edit-lokasi{id}', 'AdminController@editlokasi')->middleware('admin');
Route::post('/update-lokasi-form{id}', 'AdminController@updatelokasi')->middleware('admin');
Route::get('/hapus-lokasi{id}', 'AdminController@destroylokasi')->middleware('admin');

//Admin-Role
Route::get('/admin-role', 'AdminController@role')->middleware('admin');
Route::get('/tambah-role', 'AdminController@tambahrole')->middleware('admin');
Route::post('/role-form', 'AdminController@storerole')->middleware('admin');
Route::get('/edit-role{id}', 'AdminController@editrole')->middleware('admin');
Route::post('/update-role-form{id}', 'AdminController@updaterole')->middleware('admin');
Route::get('/hapus-role{id}', 'AdminController@destroyrole')->middleware('admin');

//Admin-Satuan
Route::get('/admin-satuan', 'AdminController@satuan')->middleware('admin');
Route::get('/tambah-satuan', 'AdminController@tambahsatuan')->middleware('admin');
Route::post('/satuan-form', 'AdminController@storesatuan')->middleware('admin');
Route::get('/edit-satuan{id}', 'AdminController@editsatuan')->middleware('admin');
Route::post('/update-satuan-form{id}', 'AdminController@updatesatuan')->middleware('admin');
Route::get('/hapus-satuan{id}', 'AdminController@destroysatuan')->middleware('admin');

//Admin-Merk
Route::get('/admin-merek', 'AdminController@merek')->middleware('admin');
Route::get('/tambah-merek', 'AdminController@tambahmerek')->middleware('admin');
Route::post('/merek-form', 'AdminController@storemerek')->middleware('admin');
Route::get('/edit-merek{id}', 'AdminController@editmerek')->middleware('admin');
Route::post('/update-merek-form{id}', 'AdminController@updatemerek')->middleware('admin');
Route::get('/hapus-merek{id}', 'AdminController@destroymerek')->middleware('admin');

//Admin-Type
Route::get('/admin-type', 'AdminController@type')->middleware('admin');
Route::get('/tambah-type', 'AdminController@tambahtype')->middleware('admin');
Route::post('/type-form', 'AdminController@storetype')->middleware('admin');
Route::get('/edit-type{id}', 'AdminController@edittype')->middleware('admin');
Route::post('/update-type-form{id}', 'AdminController@updatetype')->middleware('admin');
Route::get('/hapus-type{id}', 'AdminController@destroytype')->middleware('admin');

//Admin-User
Route::get('/admin-user', 'AdminController@user')->middleware('admin');
Route::get('/tambah-user', 'AdminController@tambahuser')->middleware('admin');
Route::post('/user-form', 'AdminController@storeuser')->middleware('admin');
Route::get('/edit-user{id}', 'AdminController@edituser')->middleware('admin');
Route::post('/update-user-form{id}', 'AdminController@updateuser')->middleware('admin');
Route::get('/hapus-user{id}', 'AdminController@destroyuser')->middleware('admin');




Route::get('/lokasi', function () {
    return view('admin/lokasi');
});

// ----------------------------------------------------------------------------------------------------
// Petugas --------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------


// Menampilkan halaman lokasi
Route::get('/petugas-lokasi', 'PetugasController@lokasi')->middleware('petugas');

// Modal alert halaman lokasi
Route::get('/alert-lokasi', 'PetugasController@alertLokasi')->middleware('petugas');

// Menampilkan halaman barang
Route::get('/petugas-barang/{idlokasi}', 'PetugasController@barang')->middleware('petugas');

// Mencetak semua barang
Route::get('/cetak-barang-all/{idlokasi}', 'PetugasController@cetakBarang')->name('cetak-barang')->middleware('petugas');

// Mencetak barang hari ini
Route::get('/cetak-barang-today/{idlokasi}', 'PetugasController@cetakBarangToday')->name('cetak-barang')->middleware('petugas');

// Modal preview gambar barang
Route::post('/priveiew-barang', 'PetugasController@previewBarang')->middleware('petugas');

// Menampilkan halaman input barang
Route::get('/petugas-barang-input/{idlokasi}', 'PetugasController@inputBarang')->middleware('petugas');

// Modal preview gambar type
Route::post('/priveiew-type', 'PetugasController@previewType')->middleware('petugas');

// Fungsi add merek Edit
Route::post('/add-merek-edit', 'PetugasController@tambahMerekEdit')->middleware('petugas');

// Fungsi add merek
Route::post('/add-merek', 'PetugasController@tambahMerek')->middleware('petugas');

// Form input barang yang di hide
Route::post('/add-form-input', 'PetugasController@addFormInput')->middleware('petugas');

// Fungsi save barang
Route::post('/petugas-barang-input', 'PetugasController@saveBarang')->middleware('petugas');

// Menampilkan halaman edit barang
Route::get('/petugas-barang-edit{noRegister}/{kodeLokasi}', 'PetugasController@barangEdit')->middleware('petugas');

// Fungsi update barang
Route::post('/petugas-barang-edit', 'PetugasController@barangUpdate')->middleware('petugas');

// ----------------------------------------------------------------------------------------------------
// Petugas End-----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------