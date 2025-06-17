<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LkipController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\InfoBalaiController;
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\DasarHukumController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\TugasFungsiController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\StrukturOrganisasiPpidController;

// ========================
// Routes untuk User/Public
// ========================

Route::view('/', 'loadingpage')->name('loadingpage');
Route::view('/home', 'home')->name('home');
Route::view('/organisasi', 'organisasi')->name('organisasi');
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');
Route::view('/informasi', 'informasi')->name('informasi');
Route::get('/galeri/foto', [FotoController::class, 'tampilGaleri']);
Route::view('galeri/video', 'galeri.video')->name('Dokumentasi');
Route::view('/ppid', 'ppid')->name('ppid');
Route::get('/visi-misi', [App\Http\Controllers\VisiMisiController::class, 'index'])->name('visi-misi');
Route::view('/dasarhukum', 'dasarhukum')->name('dasarhukum');
Route::view('/strukturorganisasi', 'strukturorganisasi')->name('strukturorganisasi');
Route::get('/tugas-fungsi', [TugasFungsiController::class, 'indexUser'])->name('ppid');


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

// Route admin visi misi
Route::get('/admin/visi-misi', [VisiMisiController::class, 'index'])->name('admin.visi_misi.index');
Route::post('/admin/visi-misi', [VisiMisiController::class, 'store'])->name('admin.visi_misi.store');
Route::get('/admin/visi-misi/{id}/edit', [VisiMisiController::class, 'edit'])->name('admin.visi_misi.edit');
Route::put('/admin/visi-misi/{id}', [VisiMisiController::class, 'update'])->name('admin.visi_misi.update');
Route::delete('/admin/visi-misi/{id}', [VisiMisiController::class, 'destroy'])->name('admin.visi_misi.destroy');

// Route admin dasar hukum
Route::get('admin/dasarhukum', [DasarHukumController::class, 'index']);
Route::post('admin/dasarhukum/upload', [DasarHukumController::class, 'upload']);
Route::post('admin/dasarhukum/update/{id}', [DasarHukumController::class, 'update']);
Route::delete('admin/dasarhukum/delete/{id}', [DasarHukumController::class, 'destroy']);

// Route admin tugas fungsi
Route::get('/admin/tugasfungsi', [TugasFungsiController::class, 'index'])->name('tugasfungsi.index');
Route::post('/admin/tugasfungsi', [TugasFungsiController::class, 'store'])->name('tugasfungsi.store');
Route::delete('/admin/tugasfungsi/{id}', [TugasFungsiController::class, 'destroy'])->name('tugasfungsi.destroy');
Route::get('/admin/tugasfungsi/create', [TugasFungsiController::class, 'create'])->name('tugasfungsi.create');

// Route admin struktur organisasi ppid

Route::get('admin/strukturorganisasippid', [StrukturOrganisasiPpidController::class, 'index']);
Route::post('admin/strukturorganisasippid/upload', [StrukturOrganisasiPpidController::class, 'upload']);
Route::get('admin/strukturorganisasippid/edit/{id}', [StrukturOrganisasiPpidController::class, 'edit']);
Route::post('admin/strukturorganisasippid/update/{id}', [StrukturOrganisasiPpidController::class, 'update']);
Route::delete('admin/strukturorganisasippid/delete/{id}', [StrukturOrganisasiPpidController::class, 'destroy']);


// Halaman publik
Route::get('/informasi-balai', [InfoBalaiController::class, 'informasi']);
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Admin (tanpa prefix dan tanpa modal)

Route::get('/admin/balai', [InfoBalaiController::class, 'index']);
Route::get('/admin/balai/create', [InfoBalaiController::class, 'create']);
Route::post('/admin/balai', [InfoBalaiController::class, 'store']);
Route::get('/admin/balai/{id}/edit', [InfoBalaiController::class, 'edit']);
Route::put('/admin/balai/{id}', [InfoBalaiController::class, 'update']);
Route::delete('/admin/balai/{id}', [InfoBalaiController::class, 'destroy']);
Route::get('/informasi', [InfoBalaiController::class, 'informasi']);
Route::get('/informasi/{id}', [InfoBalaiController::class, 'show'])->name('informasi.show');

// Publik
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Admin
Route::get('/admin/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/admin/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('admin/berita/{id}/update', [BeritaController::class, 'update'])->name('admin.berita.update');



Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

// admin foto

Route::get('/foto-admin', [FotoController::class, 'index'])->name('foto.index');
Route::get('/foto-admin/create', [FotoController::class, 'create'])->name('foto.create');
Route::post('/foto-admin', [FotoController::class, 'store'])->name('foto.store');
Route::get('/admin/foto/{id}/edit', [FotoController::class, 'edit'])->name('admin.foto.edit');
Route::put('/admin/foto/{id}', [FotoController::class, 'update'])->name('admin.foto.update');
Route::delete('/foto-admin/{id}', [FotoController::class, 'destroy'])->name('foto.destroy');

// admin album

Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');
Route::post('/album', [AlbumController::class, 'store'])->name('album.store');
Route::get('/album/{album}/edit', [AlbumController::class, 'edit'])->name('album.edit');
Route::put('/album/{album}', [AlbumController::class, 'update'])->name('album.update');
Route::delete('/album/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');

// admin video

Route::get('/galeri/video', [VideoController::class, 'showVideoGallery'])->name('galeri.video');
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
