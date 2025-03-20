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


Route::get('/', [WebController::class, 'welcome'])->name('welcome');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::resource('registrasi-perusahaan', RegistrasiPerusahaanController::class);

Route::get('dashboard', function () { return view('dashboard'); })->middleware(['checkRole:superadmin,perusahaan']);
Route::resource('perusahaan', PerusahaanController::class)->middleware('checkRole:superadmin');
Route::resource('registrasi', RegistrasiController::class)->middleware('checkRole:superadmin');
Route::resource('kegiatan', KegiatanController::class)->middleware('checkRole:superadmin,perusahaan');
Route::resource('bidang-csr', BidangCsrController::class)->middleware('checkRole:superadmin,perusahaan');
Route::resource('resume', ResumeController::class)->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume-keg', [PengaturanController::class, 'kegiatan'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume-per', [PengaturanController::class, 'perusahaan'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('resume-bid', [PengaturanController::class, 'bidang'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('pengaturan', [PengaturanController::class, 'index'])->middleware(['checkRole:superadmin,perusahaan']);
Route::get('pengaturan/{slug}', [PengaturanController::class, 'pengaturan'])->middleware(['checkRole:superadmin,perusahaan']);
Route::any('pengaturan/{jenis}/update', [PengaturanController::class, 'ubah'])->name('pengaturanUpdate')->middleware(['checkRole:superadmin,perusahaan']);