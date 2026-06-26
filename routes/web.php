<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Halaman utama langsung diarahkan ke halaman daftar mahasiswa
Route::get('/', [MahasiswaController::class, 'index'])->name('home');

// Route otomatis untuk fungsi CRUD Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);