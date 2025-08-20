<?php

use App\Http\Controllers\TempatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('tampilan','template.template');

// Route untuk tempat
Route::get('tempat', [TempatController::class, 'index'])->name('tempat.index');
Route::post('tempat', [TempatController::class, 'store'])->name('tempat.store');
