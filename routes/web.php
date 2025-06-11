<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('pemasukan', PemasukanController::class)->middleware('auth');
Route::resource('pengeluaran', PengeluaranController::class)->middleware('auth');
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::get('laporan', [LaporanController::class, 'index'])->middleware('auth')->name('laporan.index');
Route::get('laporan/download', [LaporanController::class, 'downloadPDF'])->middleware('auth')->name('laporan.download');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('laporan/bulanan', [LaporanController::class, 'bulanan'])->name('laporan.bulanan');
Route::get('laporan/bulanan/{bulan}', [LaporanController::class, 'detail'])->name('laporan.bulanan.detail');
Route::get('laporan/bulanan/download/{bulan}', [LaporanController::class, 'downloadPDF'])->name('laporan.bulanan.download');
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');