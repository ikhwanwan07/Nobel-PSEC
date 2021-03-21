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
    return view('landing');
});
//admin
Route::get('index','Admin\AdminController@index');
Route::get('siswa','Admin\AdminController@siswa');

Route::post('siswa','Admin\AdminController@createSiswa')->name('create-siswa');
Route::get('guru','Admin\AdminController@pengajar');
Route::post('guru','Admin\AdminController@createGuru')->name('create-guru');
Route::get('user ','Admin\AdminController@user');
Route::get('dashboard ','Admin\AdminController@dashboard');
Route::get('pembayaran-admin','Admin\AdminController@pembayaran');
//pengajar
Route::resource('pengajar', 'Pengajar\MateriController');
Route::resource('soal', 'Pengajar\SoalController');
Route::resource('pembayaran','Pengajar\PembayaranController');
Route::get('materi','Pengajar\PengajarController@materi')->name('materi');
Route::get('soal','Pengajar\PengajarController@soal')->name('soalIndex');
Route::get('nilai','Pengajar\PengajarController@nilai');
Route::get('kelas','Pengajar\PengajarController@kelas');
Route::get('jawaban-siswa','Pengajar\PengajarController@jawaban');
//Siswa
Route::get('pembayaran-siswa','Siswa\SiswaController@pembayaranSiswa');
Route::get('jawaban','Siswa\SiswaController@jawaban');
Route::get('materi-siswa','Siswa\SiswaController@materi');
Route::get('materi-siswa/{id}','Siswa\SiswaController@showMateri')->name('showMateri');
Route::get('soal-siswa','Siswa\SiswaController@soal');
Route::get('soal-siswa/{id}','Siswa\SiswaController@showSoal')->name('showSoal');
Route::get('view-materi','Siswa\SiswaController@viewMateri');
Route::get('profile','Siswa\SiswaController@profile');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
