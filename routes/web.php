<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_dashboard;
use App\Http\Controllers\c_produk;
use App\Http\Controllers\c_pembelian;
use App\Http\Controllers\c_pengantaran;
use App\Http\Controllers\c_konsumen;
use App\Http\Controllers\c_laporan;
use App\Http\Controllers\c_mainUser;
use App\Http\Controllers\c_menuMakanan;
use App\Http\Controllers\c_keranjangBelanja;
use App\Http\Controllers\c_regLogProses;
use App\Http\Controllers\c_cekLevel;
use App\Http\Controllers\c_cekPemesanan;

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
Route::get('/cekLevel', [c_cekLevel::class, 'index'])->name('cekLevel');

// Registrasi & login user admin
Route::get('/daftar', [c_regLogProses::class, 'daftar'])->name('daftarUser');
Route::get('/masuk', [c_regLogProses::class, 'masuk'])->name('masukUser');
Route::get('/lupaPassword', [c_regLogProses::class, 'lupaPassword'])->name('lupaPassword');

//admin Route
Route::group(['middleware'=>'admin'], function(){
    Route::get('/dashboard', [c_dashboard::class, 'index'])->name('dashboard');
    //produk
    Route::get('/tambahProduk', [c_produk::class, 'tambahProduk'])->name('tambahProduk');
        Route::Post('/tambahProduk/prosesProduk', [c_produk::class, 'prosesProduk'])->name('proses');
    Route::get('/listProduk', [c_produk::class, 'listProduk'])->name('listProduk');
    Route::get('/editProduk',[c_produk::class, 'editProduk'])->name('editProduk');
        Route::POST('/prosesEditProduk',[c_produk::class,'prosesEditProduk'])->name('prosesEditProduk');
    //pembelian
    Route::get('/listPembelian', [c_pembelian::class, 'listPembelian'])->name('listPembelian');
    //pengantaran
    Route::get('/tambahPengantaran', [c_pengantaran::class, 'tambahPengantaran'])->name('tambahPengantaran');
    Route::get('/listPengantaran', [c_pengantaran::class, 'listPengantaran'])->name('listPengantaran');
    //konsumen
    Route::get('listKonsumen', [c_konsumen::class, 'listKonsumen'])->name('listKonsumen');
    Route::get('blacklistKonsumen', [c_konsumen::class, 'blacklistKonsumen'])->name('blacklistKonsumen');
    //laporan
    Route::get('/laporanPembelian', [c_laporan::class, 'laporanPembelian'])->name('laporanPembelian');
});


//General User Route
Route::get('/', [c_mainUser::class, 'index'])->name('mainUser');
Route::get('/kontak', [c_mainUser::class, 'kontak'])->name('kontak');
Route::get('/Menu',[c_menuMakanan::class,'index'])->name('menuMakanan');

Route::group(['middleware'=>'pembeli'], function(){
    Route::post('/prosesPickProduk',[c_menuMakanan::class,'prosesPickProduk'])->name('prosesPickProduk');
    Route::get('/keranjangBelanja',[c_keranjangBelanja::class,'index'])->name('keranjangBelanja');
    Route::post('keranjangBelanja/checkout',[c_keranjangBelanja::class,'simpanKeranjang'])->name('simpanKeranjang');
});

Auth::routes();

Route::get('/cekPemesanan',[c_cekPemesanan::class,'cekPemesanan'])->name('cekPemesanan');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
