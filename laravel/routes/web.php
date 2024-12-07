<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Opsional)
Route::get('/', function () {
    return redirect()->route('dosens.index');
});

// Routes untuk Manajemen Data Dosen
Route::resource('dosens', DosenController::class);

// Routes untuk Manajemen Data Mahasiswa
Route::resource('mahasiswas', MahasiswaController::class);

