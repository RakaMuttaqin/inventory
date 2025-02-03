<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('cek-login');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'checkrole:Admin'], function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('admin.dashboard');
    });
});
