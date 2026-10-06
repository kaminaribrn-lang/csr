<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();


Route::get('/', [WebController::class, 'home2'])->name('home2');
Route::get('/home2', [WebController::class, 'home2'])->name('home2');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('registrasi-perusahaan', RegistrasiPerusahaanController::class);

Route::get('dashboard', function () { return view('dashboard'); })->middleware(['checkRole:superadmin,perusahaan']);
Route::resource('perusahaan', PerusahaanController::class)->middleware('checkRole:superadmin');
Route::resource('registrasi', RegistrasiController::class)->middleware('checkRole:superadmin');
Route::resource('kegiatan', KegiatanController::class);
Route::resource('bidang-csr', BidangCsrController::class)->middleware('checkRole:superadmin,perusahaan');
Route::resource('program-unggulan-bupati', \App\Http\Controllers\ProgramUnggulanBupatiController::class)->middleware('checkRole:superadmin');
Route::resource('resume', ResumeController::class)->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume/export/{jenis}/excel', [ResumeController::class, 'exportExcel'])->middleware(['checkRole:superadmin,perusahaan'])->name('resume.export.excel');
Route::get('resume/export/{jenis}/pdf', [ResumeController::class, 'exportPdf'])->middleware(['checkRole:superadmin,perusahaan'])->name('resume.export.pdf');
Route::get('resume-keg', [ResumeController::class, 'kegiatan'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume-per', [ResumeController::class, 'perusahaan'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume-bid', [ResumeController::class, 'bidang'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume-prioritas', [ResumeController::class, 'programPrioritas'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('pengaturan', [PengaturanController::class, 'index'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('pengaturan/{slug}', [PengaturanController::class, 'pengaturan'])->middleware(['checkRole:superadmin,perusahaan']);
Route::any('pengaturan/{jenis}/update', [PengaturanController::class, 'ubah'])->name('pengaturanUpdate')->middleware(['checkRole:superadmin,perusahaan']);

Route::get('/kegiatan/{id}/aksi', [AksiController::class, 'list']);
Route::post('/aksi/store', [AksiController::class, 'store']);
Route::delete('/aksi/{id}', [AksiController::class, 'destroy']);
Route::patch('/aksi/{id}/verify', [AksiController::class, 'verify']);
Route::get('/verifikasi-laporan', [AksiController::class, 'verificationPage'])->middleware('checkRole:superadmin')->name('aksi.verifikasi');
Route::get('/kegiatan/{id}/recalculate', [KegiatanController::class, 'recalculate']);


Route::get('/berita/data', [BeritaController::class, 'data']);
Route::get('/berita/edit/{id}', [BeritaController::class, 'edit']); // JSON
Route::post('/berita/store', [BeritaController::class, 'store']);
Route::post('/berita/update/{id}', [BeritaController::class, 'update']);
Route::delete('/berita/{id}', [BeritaController::class, 'destroy']);

// halaman admin
Route::get('/berita/admin', [BeritaController::class, 'index']);

// Frontend news page
Route::get('/beritas', [WebController::class, 'beritas']);

Route::get('/news/{slug}', [BeritaController::class, 'show'])->name('berita.view');

Route::get('/bidang-detail/{id}', [WebController::class, 'getDetail'])->name('bidang.detail');
