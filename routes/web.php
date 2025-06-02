<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LkipController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\LaporanKeuanganController;

// ========================
// Routes untuk User/Public
// ========================

Route::view('/', 'loadingpage')->name('loadingpage');
Route::view('/home', 'home')->name('home');
Route::view('/organisasi', 'organisasi')->name('organisasi');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
Route::view('/ppid', 'ppid')->name('ppid');
Route::view('/informasi', 'informasi')->name('informasi');
Route::view('/foto&video', 'foto&video')->name('Dokumentasi');

// ========================
// Routes untuk Admin Panel
// ========================

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/organisasi', [StrukturController::class, 'index'])->name('admin.organisasi');
Route::post('/admin/organisasi', [StrukturController::class, 'upload'])->name('admin.organisasi.upload');

// ========================
// Routes untuk Kebijakan
// ========================

Route::get('/admin/kebijakan', [KebijakanController::class, 'index'])->name('admin.kebijakan');
Route::post('/admin/kebijakan', [KebijakanController::class, 'upload'])->name('admin.kebijakan.upload');
Route::delete('/admin/kebijakan/{id}', [KebijakanController::class, 'delete'])->name('admin.kebijakan.delete');

// ========================
// Routes untuk Renstra
// ========================

Route::get('/admin/renstra', [RenstraController::class, 'index'])->name('admin.renstra');
Route::post('/admin/renstra', [RenstraController::class, 'upload'])->name('admin.renstra.upload');
Route::get('/admin/renstra/edit/{id}', [RenstraController::class, 'edit'])->name('admin.renstra.edit');
Route::post('/admin/renstra/update/{id}', [RenstraController::class, 'update'])->name('admin.renstra.update');
Route::delete('/admin/renstra/{id}', [RenstraController::class, 'delete'])->name('admin.renstra.delete');

// ========================
// Routes untuk LKIP
// ========================

Route::get('/admin/lkip', [LkipController::class, 'index'])->name('admin.lkip');
Route::post('/admin/lkip', [LkipController::class, 'upload'])->name('admin.lkip.upload');
Route::get('/admin/lkip/edit/{id}', [LkipController::class, 'edit'])->name('admin.lkip.edit');
Route::post('/admin/lkip/update/{id}', [LkipController::class, 'update'])->name('admin.lkip.update');
Route::delete('/admin/lkip/{id}', [LkipController::class, 'delete'])->name('admin.lkip.delete');

// ========================
// Routes untuk Laporan Keuangan
// ========================

Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'showLaporanKeuangan'])->name('laporan.keuangan');
Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('admin.laporan_keuangan');
Route::post('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'upload'])->name('admin.laporan_keuangan.upload');
Route::get('/admin/laporan-keuangan/edit/{id}', [LaporanKeuanganController::class, 'edit'])->name('admin.laporan_keuangan.edit');
Route::post('/admin/laporan-keuangan/update/{id}', [LaporanKeuanganController::class, 'update'])->name('admin.laporan_keuangan.update');
Route::delete('/admin/laporan-keuangan/{id}', [LaporanKeuanganController::class, 'delete'])->name('admin.laporan_keuangan.delete');

// ========================
// Routes untuk Galeri
// ========================

