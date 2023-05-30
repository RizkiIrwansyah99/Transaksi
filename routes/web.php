<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DaftarTransaksi;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransaksiController;
use GuzzleHttp\Promise\Create;
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

// Route::get('/', function () {
//     return view('/transaksi.index');
// });

// Barang kelola
Route::get('/index-barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/tambah-barang', [BarangController::class, 'create'])->name('tambah.barang');
Route::post('/simpan-barang', [BarangController::class, 'store'])->name('simpan.barang');
Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->name('edit.barang');
Route::put('/update-barang/{id}', [BarangController::class, 'update'])->name('update.barang');
Route::get('/detail-barang/{id}', [BarangController::class, 'show'])->name('detail.barang');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('delete.barang');


// Customer kelola
Route::get('/index-customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/tambah-customer', [CustomerController::class, 'create'])->name('tambah.customer');
Route::post('/simpan-customer', [CustomerController::class, 'store'])->name('simpan.customer');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit.customer');
Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->name('update.customer');
Route::get('/detail-customer/{id}', [CustomerController::class, 'show'])->name('detail.customer');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('delete.customer');


// Kelola sales
Route::get('/index-sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/tambah-sales', [SalesController::class, 'create'])->name('tambah.sales');
Route::post('/simpan-sales', [SalesController::class, 'store'])->name('simpan.sales');
Route::get('/edit-sales/{id}', [SalesController::class, 'edit'])->name('edit.sales');
Route::put('/update-sales/{id}', [SalesController::class, 'update'])->name('update.sales');
Route::get('/detail-sales/{id}', [SalesController::class, 'show'])->name('detail.sales');
Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('delete.sales');

// Transaksi
Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/tambah-transaksi', [TransaksiController::class, 'create'])->name('tambah.transaksi');
Route::post('/simpan-transaksi', [TransaksiController::class, 'store'])->name('simpan.transaksi');
Route::get('/edit-transaksi/{id}', [TransaksiController::class, 'edit'])->name('edit.transaksi');
Route::put('/update-transaksi/{id}', [TransaksiController::class, 'update'])->name('update.transaksi');
Route::get('/detail-transaksi/{id}', [TransaksiController::class, 'show'])->name('detail.transaksi');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('delete.transaksi');
