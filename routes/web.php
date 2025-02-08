<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('cek-login');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'checkrole:Admin'], function () {});
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Jenis Barang
    Route::get('/jenis-barang', [JenisBarangController::class, 'index'])->name('jenis-barang.index');
    Route::post('/jenis-barang', [JenisBarangController::class, 'store'])->name('jenis-barang.store');
    Route::put('/jenis-barang/{id}', [JenisBarangController::class, 'update'])->name('jenis-barang.update');
    Route::delete('/jenis-barang/{id}', [JenisBarangController::class, 'destroy'])->name('jenis-barang.destroy');

    // Daftar Pengguna
    Route::get('/daftar-pengguna', [UserController::class, 'index'])->name('daftar-pengguna.index');
    Route::post('/daftar-pengguna', [UserController::class, 'store'])->name('daftar-pengguna.store');
    Route::put('/daftar-pengguna/{id}', [UserController::class, 'update'])->name('daftar-pengguna.update');
    Route::delete('/daftar-pengguna/{id}', [UserController::class, 'destroy'])->name('daftar-pengguna.destroy');

    // Barang Inventaris
    Route::get('/daftar-barang', [BarangController::class, 'index'])->name('daftar-barang.index');
    Route::post('/daftar-barang', [BarangController::class, 'store'])->name('daftar-barang.store');
    Route::put('/daftar-barang/{id}', [BarangController::class, 'update'])->name('daftar-barang.update');
    Route::delete('/daftar-barang/{id}', [BarangController::class, 'destroy'])->name('daftar-barang.destroy');

    // Peminjaman Barang
    Route::get('/peminjaman-barang', [PeminjamanController::class, 'index'])->name('peminjaman-barang.index');
    Route::get('/peminjaman-barang/{id}', [PeminjamanController::class, 'show'])->name('peminjaman-barang.show');
    Route::post('/peminjaman-barang', [PeminjamanController::class, 'store'])->name('peminjaman-barang.store');
    Route::put('/peminjaman-barang/{id}', [PeminjamanController::class, 'update'])->name('peminjaman-barang.update');
    Route::delete('/peminjaman-barang/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman-barang.destroy');

    // Pengembalian Barang
    Route::get('/pengembalian-barang', [PengembalianController::class, 'index'])->name('pengembalian-barang.index');
    Route::post('/pengembalian-barang', [PengembalianController::class, 'store'])->name('pengembalian-barang.store');
    Route::put('/pengembalian-barang/{id}', [PengembalianController::class, 'update'])->name('pengembalian-barang.update');
    Route::delete('/pengembalian-barang/{id}', [PengembalianController::class, 'destroy'])->name('pengembalian-barang.destroy');

    // Barang Belum Kembali
    Route::get('/barang-belum-kembali', [PeminjamanController::class, 'barangBelumKembali'])->name('barang-belum-kembali.index');

    // Daftar Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Daftar Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});
