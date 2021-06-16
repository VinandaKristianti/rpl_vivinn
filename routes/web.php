<?php

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
    return redirect('/login');
});

//LOGIN
Route::get('/Login', 'loginController@viewLogin');

//ADMIN
Route::get('/admin_test','adminController@view');
Route::get('/listAdmin','adminController@viewAdmin');
Route::get('/listAdmin/tambah','adminController@viewInputAdmin');
Route::post('/listAdmin/simpan','adminController@tambahAdmin');
Route::get('/editAdmin/{id_admin}','adminController@findEdit');
Route::put('/updateAdmin/{id_admin}', 'adminController@editAdmin');
Route::get('/deleteAdmin/{id_admin}', 'adminController@deleteAdmin');
Route::get('/grafik','grafikController@grafik');

//USER
Route::get('/user','userController@viewDataTes');
Route::get('/biodata','userController@biodata');
Route::post('/user/biodata','bioController@inputBio');
Route::get('/daftar/{id_tes}','userController@viewDaftar')->name('viewiddaftar');
Route::get('/pembayaran','transaksiController@viewInputTrx');
Route::get('/riwayat','pendaftaranController@viewPilih');
Route::post('/bayar/berhasil','transaksiController@tambahTrx');

//TES
Route::get('/tes','tesController@viewTes');
Route::get('/tambah_tes','tesController@viewInputTes');
Route::post('/tes/tambah','tesController@tambahTes');
Route::get('/editTes/{id_tes}','tesController@findEdit');
Route::put('/editTes/{id_tes}', 'tesController@editTes');
Route::get('/deleteTes/{id_tes}', 'tesController@deleteTes');

//JADWAL
Route::get('/jadwal','jadwalController@viewJadwal');
Route::get('/tambah_jadwal','jadwalController@viewInputJadwal');
Route::post('/jadwal/tambah','jadwalController@tambahJadwal');
Route::get('/editJadwal/{id_jadwal}','jadwalController@findEdit');
Route::put('/editJadwal/{id_jadwal}', 'jadwalController@editJadwal');
Route::get('/deleteJadwal/{id_jadwal}', 'jadwalController@deleteJadwal');
Route::post('/daftar/pilih','pendaftaranController@pilihJadwal');


//verifikasi untuk admin
Route::get('/verJadwal', 'VerifController@verJadwal');
Route::get('/verBayar','VerifController@verBayar');
Route::post('/verJadwal/pilih', 'VerifController@verifikasiTenan');
Route::post('/verBayar/pilih', 'VerifController@verifBayarTenan');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
