<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::post('/kelas/create', [KelasController::class, 'createKelas'])->name('kelas.create');
Route::get('/kelas/createIndex', [KelasController::class, 'createIndex'])->name('kelas.createIndex');
Route::get('/kelas/detail/{id}', [KelasController::class, 'viewKelas'])->name('kelas.detail');
Route::get('/kelas/delete/{id}', [KelasController::class, 'deleteKelas'])->name('kelas.delete');

Route::post('/siswa/create', [SiswaController::class, 'createSiswa'])->name('siswa.create');
Route::get('/siswa/createIndex', [SiswaController::class, 'createIndex'])->name('siswa.createIndex');
Route::get('/siswa/detail/{id}', [SiswaController::class, 'viewSiswa'])->name('siswa.detail');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'editSiswa'])->name('siswa.edit');
Route::put('/siswa/update/{id}', [SiswaController::class, 'updateSiswa'])->name('siswa.update');
Route::get('/siswa/delete/{id}', [SiswaController::class, 'deleteSiswa'])->name('siswa.delete');

Route::post('/absensi/precreate', [AbsensiController::class, 'precreateAbsensi'])->name('absensi.precreate');
Route::post('/absensi/create/{id}', [AbsensiController::class, 'createAbsensi'])->name('absensi.create');
Route::get('/absensi/precreateIndex', [AbsensiController::class, 'precreateIndex'])->name('absensi.precreateIndex');
Route::get('/absensi/createIndex', [AbsensiController::class, 'createIndex'])->name('absensi.createIndex');
Route::get('/absensi/detail/{id}', [AbsensiController::class, 'viewAbsensi'])->name('absensi.detail');
Route::get('/absensi/delete/{id}', [AbsensiController::class, 'deleteAbsensi'])->name('absensi.delete');
