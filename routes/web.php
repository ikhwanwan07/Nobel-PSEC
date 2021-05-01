<?php

use App\Http\Controllers\Pengajar\PengajarController;
use Illuminate\Routing\Router;
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
// Route::get('/tester', function () {
//     return view('layouts.master1');
// });
//admin
Route::get('index','Admin\AdminController@index');
Route::get('siswa','Admin\AdminController@siswa');

Route::post('siswa','Admin\AdminController@createSiswa')->name('create-siswa');
Route::get('siswa/{id}','Admin\AdminController@editSiswa')->name('edit-siswa');
Route::put('siswa/{id}','Admin\AdminController@updateSiswa')->name('update-siswa');
Route::delete('siswa/{id}','Admin\AdminController@deleteSiswa')->name('delete-siswa');
Route::get('guru','Admin\AdminController@pengajar');
Route::post('guru','Admin\AdminController@createGuru')->name('create-guru');
Route::get('guru/{id}','Admin\AdminController@editGuru')->name('edit-guru');
Route::put('guru/{id}','Admin\AdminController@updateGuru')->name('update-guru');
Route::delete('guru/{id}','Admin\AdminController@deleteGuru')->name('delete-guru');
Route::get('user ','Admin\AdminController@user');
Route::delete('user/{id} ','Admin\AdminController@deleteUser')->name('delete-user');
Route::get('dashboard ','Admin\AdminController@dashboard');
Route::get('pembayaran-admin','Admin\AdminController@pembayaran');
//pengajar
Route::resource('pengajar', 'Pengajar\MateriController');
Route::resource('soal', 'Pengajar\SoalController');
Route::resource('subMateri', 'Pengajar\SubMateriController');
Route::resource('pembayaran','Pengajar\PembayaranController');
Route::resource('quiz','Pengajar\QuizController');
Route::resource('dataMateri','Pengajar\DataMateriController');
Route::resource('nilai','Pengajar\NilaiController');
Route::get('dashboard-guru','Pengajar\PengajarController@dashboard');
Route::get('quiz','Pengajar\PengajarController@quiz');
Route::get('materi','Pengajar\PengajarController@materi')->name('materi');
Route::get('soal','Pengajar\PengajarController@soal')->name('soalIndex');
Route::get('nilai','Pengajar\PengajarController@nilai');
Route::get('kelas','Pengajar\PengajarController@kelas');
Route::get('jawaban-siswa','Pengajar\PengajarController@jawaban');
//Siswa
Route::resource('jawaban-siswa', 'Siswa\JawabanController');
Route::get('dashboard-siswa','Siswa\SiswaController@dashboard');
Route::get('pembayaran-siswa','Siswa\SiswaController@pembayaranSiswa');
Route::get('jawaban','Siswa\SiswaController@jawaban');
Route::get('materi-siswa','Siswa\SiswaController@materi');
Route::get('materi-siswa/{id}','Siswa\SiswaController@showMateri')->name('showMateri');
Route::get('sub-materi-siswa/{id}','Siswa\SiswaController@showSubMateri')->name('showSubMateri');
Route::get('soal-siswa','Siswa\SiswaController@soal');
Route::get('soal-siswa/{id}','Siswa\SiswaController@showSoal')->name('showSoal');
Route::get('view-materi','Siswa\SiswaController@viewMateri');
Route::get('profile','Siswa\SiswaController@profile');
Route::get('quiz-siswa','Siswa\SiswaController@quiz');
Route::get('nilai-siswa','Siswa\SiswaController@nilai');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
