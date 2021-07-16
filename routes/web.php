<?php

use FontLib\Table\Type\name;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('barang', 'BarangController');
    Route::resource('penjualan', 'PenjualanController');
    Route::resource('pegawai', 'PegawaiController');
    Route::get('/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'PenjualanController@cetakPenjualanPertanggal')->name('cetak-data-pertanggal');
    Route::get('/barang/search', 'BarangController@search')->name('barang.search');
    Route::get('/penjualan/search', 'PenjualanController@search')->name('penjualan.search');
    Route::get('/laporan', function () {
        return view('laporan');
    });
    route::get('/laporan/barang', 'LaporanController@barang');
    route::get('/laporan/penjualan', 'LaporanController@penjualan');
    route::get('/cetak-data-pertanggal', 'LaporanController@cetakPenjualanPertanggall');
});
