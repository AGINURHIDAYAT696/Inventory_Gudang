<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import controller yang digunakan
use App\Http\Controllers\Api\JenisController;
use App\Http\Controllers\Api\SatuanController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\BarangMasukController;
use App\Http\Controllers\Api\BarangKeluarController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendefinisikan semua rute API untuk aplikasi Gudang_Inventory.
| Semua rute ini akan memiliki prefix "/api" secara otomatis.
| Contoh akses: http://localhost:8000/api/barang
|
*/

// Jenis Barang
Route::apiResource('jenis', JenisController::class);

// Satuan Barang
Route::apiResource('satuan', SatuanController::class);

// Barang
Route::apiResource('barang', BarangController::class);

// Barang Masuk
Route::apiResource('barang-masuk', BarangMasukController::class);

// Barang Keluar
Route::apiResource('barang-keluar', BarangKeluarController::class);

//frontend
Route::get('/', function () {
    return redirect('/barang');
});

Route::get('/barang', function () {
    $barang = App\Models\Barang::with(['jenis_relation', 'satuan_relation'])->get();
    return view('barang.index', compact('barang'));
});

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');