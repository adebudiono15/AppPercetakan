<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LogistikController;
use App\Http\Controllers\LogistikKeluarController;
use App\Http\Controllers\LogistikMasukController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::post('/save-barang', [BarangController::class, 'store'])->name('save-barang');
Route::delete('barang/{id}', [BarangController::class, 'delete'])->name('hapus-barang');
Route::get('{id}/edit-barang', [BarangController::class, 'edit'])->name('edit-barang');
Route::patch('barang/update/{id}', [BarangController::class, 'update'])->name('update-barang');
// Kategori
Route::get('/kategori', [KategoriController::class,'index'])->name('kategori');
Route::post('/save-kategori', [KategoriController::class, 'store'])->name('save-kategori');
Route::delete('kategori/{id}', [KategoriController::class, 'delete'])->name('hapus-kategori');
Route::get('{id}/edit-kategori', [KategoriController::class, 'edit'])->name('edit-kategori');
Route::patch('kategori/update/{id}', [KategoriController::class, 'update'])->name('update-kategori');
// customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::post('/save-customer', [CustomerController::class, 'store'])->name('save-customer');
Route::delete('customer/{id}', [CustomerController::class, 'delete'])->name('hapus-customer');
Route::get('{id}/edit-customer', [CustomerController::class, 'edit'])->name('edit-customer');
Route::patch('customer/update/{id}', [CustomerController::class, 'update'])->name('update-customer');
Route::get('{id}/detail-customer', [CustomerController::class, 'detail'])->name('detail-customer');
// supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/save-supplier', [SupplierController::class, 'store'])->name('save-supplier');
Route::delete('supplier/{id}', [SupplierController::class, 'delete'])->name('hapus-supplier');
Route::get('{id}/edit-supplier', [SupplierController::class, 'edit'])->name('edit-supplier');
Route::patch('supplier/update/{id}', [SupplierController::class, 'update'])->name('update-supplier');
Route::get('{id}/detail-supplier', [SupplierController::class, 'detail'])->name('detail-supplier');
// logistik
Route::get('/logistik', [LogistikController::class, 'index'])->name('logistik');
Route::post('/save-logistik', [LogistikController::class, 'store'])->name('save-logistik');
Route::delete('logistik/{id}', [LogistikController::class, 'delete'])->name('hapus-logistik');
Route::get('{id}/edit-logistik', [LogistikController::class, 'edit'])->name('edit-logistik');
Route::patch('logistik/update/{id}', [LogistikController::class, 'update'])->name('update-logistik');
// logistik masuk
Route::get('/logistik-masuk', [LogistikMasukController::class, 'index'])->name('logistik-masuk');
Route::post('/save-logistik-masuk', [LogistikMasukController::class, 'store'])->name('save-logistik-masuk');
Route::delete('logistik-masuk/{id}', [LogistikMasukController::class, 'delete'])->name('hapus-logistik-masuk');
Route::get('logistikmasuk/ajax/{id}', [LogistikMasukController::class, 'get_logistik_masuk']);
Route::get('{id}/detail-logmasuk', [LogistikMasukController::class, 'detaillogmasuk']);
// Route::get('{id}/edit-logistik-masuk', [LogistikMasukController::class, 'edit'])->name('edit-logistik-masuk');
// Route::patch('logistik-masuk/update/{id}', [LogistikMasukController::class, 'update'])->name('update-logistik-masuk');

// logistik keluar
Route::get('/logistik-keluar', [LogistikKeluarController::class, 'index'])->name('logistik-keluar');
Route::post('/save-logistik-keluar', [LogistikKeluarController::class, 'store'])->name('save-logistik-keluar');
Route::delete('logistik-keluar/{id}', [LogistikKeluarController::class, 'delete'])->name('hapus-logistik-keluar');
Route::get('logistikkeluar/ajax/{id}', [LogistikKeluarController::class, 'get_logistik_keluar']);
Route::get('{id}/detail-logkeluar', [LogistikKeluarController::class, 'detaillogkeluar']);
// PO
Route::get('/po', [PoController::class, 'index'])->name('po');
Route::post('/save-po', [PoController::class, 'store'])->name('save-po');
Route::get('barang/ajax/{id}', [PoController::class, 'get_barang']);
Route::get('{id}/detail-po', [PoController::class, 'detailpo']);
Route::delete('po/{id}', [PoController::class, 'delete'])->name('hapus-po');
Route::get('/cek-status', [PoController::class, 'status'])->name('cek-status');
Route::get('{id}/update1-po', [PoController::class, 'update1']);
Route::get('{id}/update2-po', [PoController::class, 'update2']);
Route::get('{id}/update3-po', [PoController::class, 'update3']);
Route::get('{id}/update4-po', [PoController::class, 'update4']);
Route::get('{id}/update5-po', [PoController::class, 'update5']);
Route::get('{id}/update6-po', [PoController::class, 'update6']);
Route::get('{id}/update7-po', [PoController::class, 'update7']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
