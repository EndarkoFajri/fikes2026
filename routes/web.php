<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

// Halaman Utama & Statis
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/profil/sejarah', [PublicController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [PublicController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/struktur-organisasi', [PublicController::class, 'struktur'])->name('profil.struktur');
Route::get('/profil/dosen', [PublicController::class, 'dosen'])->name('profil.dosen');

// Program Studi
Route::get('/program-studi/{slug}', [ProdiController::class, 'show'])->name('prodi.show');

// Berita & Pengumuman
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Kontak
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
