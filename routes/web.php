<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/profil/pimpinan', [PublicController::class, 'pimpinan'])->name('profil.pimpinan');
Route::get('/profil/visi-misi', [PublicController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/struktur-organisasi', [PublicController::class, 'struktur'])->name('profil.struktur');
Route::get('/profil/rencana-strategis', [PublicController::class, 'renstra'])->name('profil.renstra');
Route::get('/profil/rencana-operasional', [PublicController::class, 'renop'])->name('profil.renop');
Route::get('/profil/pedoman-kerja-sama', [PublicController::class, 'pedomanKerjasama'])->name('profil.pedoman-kerjasama');
Route::get('/profil/daftar-kerja-sama', [PublicController::class, 'daftarKerjasama'])->name('profil.daftar-kerjasama');
Route::get('/profil/upload-ia', [PublicController::class, 'uploadIa'])->name('profil.upload-ia');
Route::get('/profil/sumber-daya-manusia', [PublicController::class, 'sumberDayaManusia'])->name('profil.sdm');
// Program Studi
Route::get('/program-studi/{slug}', [ProdiController::class, 'show'])->name('prodi.show');

// Berita & Pengumuman
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Kontak
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');


