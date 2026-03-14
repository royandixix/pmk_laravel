<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama / welcome
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Visi Misi
Volt::route('/visi-misi', 'user.visimisi.index')->name('visimisi');
Volt::route('/lokasi', 'user.lokasi.index')->name('lokasi');

// Halaman Daftar Bidang Pengurus (Main Page)
Volt::route('/pengurus', 'user.pengurus.index')->name('user.pengurus.index');

// Halaman Detail Bidang (User)
Route::prefix('pengurus')->name('user.pengurus.')->group(function () {
    Volt::route('/kerohanian', 'user.pengurus.kerohanian.index')->name('kerohanian');
    Volt::route('/kaderisasi', 'user.pengurus.kaderisasi.index')->name('kaderisasi');
    Volt::route('/humas', 'user.pengurus.humas.index')->name('humas');
    Volt::route('/study-club', 'user.pengurus.study-clup.index')->name('studyclub');
    Volt::route('/minat-bakat', 'user.pengurus.minat-bakat.index')->name('minatbakat');
    Volt::route('/kesda', 'user.pengurus.kesda.index')->name('kesda');
});

/**
 * BAGIAN YANG KURANG: Route untuk Kegiatan
 */
Route::prefix('kegiatan')->name('user.kegiatan.')->group(function () {
    // Halaman list semua kegiatan (jika ada)
    Volt::route('/', 'user.kegiatan.index')->name('index');
    
    // Halaman detail masing-masing kegiatan
    Volt::route('/ldk', 'user.kegiatan.ldk.index')->name('ldk');
    Volt::route('/maper', 'user.kegiatan.maper.index')->name('maper');
    Volt::route('/paska', 'user.kegiatan.paska.index')->name('paska');
    Volt::route('/platda', 'user.kegiatan.platda.index')->name('platda');
});

// Group route admin (harus login + verified)
Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('dashboard', 'admin.dashboard')->name('dashboard');

    Route::prefix('admin/anggota')->name('anggota.')->group(function () {
        Volt::route('/', 'admin.anggota.index')->name('index');
        Volt::route('/tambah', 'admin.anggota.create')->name('create');
        Volt::route('/edit/{anggota}', 'admin.anggota.edit')->name('edit');
        Volt::route('/ulang-tahun', 'admin.anggota.ulang_tahun')->name('ulang-tahun');
    });
});

require __DIR__.'/settings.php';