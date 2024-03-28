<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('tes', function () {
    return view('tes');
});

Route::get('tes2', function () {
    return view('tes2');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('pelanggan/upload', [PelangganController::class, 'upload'])->name('pelanggan.upload');
    Route::post('pelanggan/upload', [PelangganController::class, 'storeUpload'])->name('pelanggan.storeUpload');
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('kategori', KategoriBarangController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('level', LevelController::class);
    Route::resource('user', UserController::class);
    Route::resource('penjualan', PenjualanController::class);

    Route::get('/penjualan/print/{penjualan_id}', [PenjualanController::class, 'print'])->name('penjualan.print');
    Route::get('/laporan/{menu}/cetak', [LaporanController::class, 'cetak']);
	Route::resource('laporan', LaporanController::class);
	Route::resource('profil', ProfilController::class);
});




