<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TempatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('tampilan','template.template');

// Route untuk tempat
Route::get('tempat', [TempatController::class, 'index'])
->name('tempat.index');
Route::post('tempat', [TempatController::class, 'store'])
->name('tempat.store');
Route::get('tempat/{param}', [TempatController::class, 'detail'])
->name('tempat.detail');
Route::put('tempat/{param}', [TempatController::class, 'update'])
->name('tempat.update');
Route::delete('tempat/{param}', [TempatController::class, 'destroy'])
->name('tempat.destroy');

Route::get('barang', [BarangController::class, 'index'])
->name('barang.index');
Route::post('barang', [BarangController::class, 'store'])
->name('barang.store');
Route::get('barang/{param}', [BarangController::class, 'detail'])
->name('barang.detail');
Route::put('barang/{param}', [BarangController::class, 'update'])
->name('barang.update');
Route::delete('barang/{param}', [BarangController::class, 'destroy'])
->name('barang.destroy');

Route::fallback(function(){
    return "halaman tidak ditemukan";
});



