<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\LoginController::class, 'welcome']);
Route::post('/cek_penyakit', [App\Http\Controllers\LoginController::class, 'cekPenyakit']);
Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->middleware('guest')->name('log');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->middleware('guest')->name('login');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth');
Route::middleware('auth')->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);

    Route::prefix('gejala')->group(function () {
      Route::get('/', [App\Http\Controllers\GejalaController::class, 'index']);
      Route::get('/tambah', [App\Http\Controllers\GejalaController::class, 'create']);
      Route::post('/tambah', [App\Http\Controllers\GejalaController::class, 'store']);
      Route::get('/edit/{id}', [App\Http\Controllers\GejalaController::class, 'edit']);
      Route::put('/edit/{id}', [App\Http\Controllers\GejalaController::class, 'update']);
      Route::delete('/hapus/{id}', [App\Http\Controllers\GejalaController::class, 'destroy']);
    });

    Route::prefix('penyakit')->group(function () {
      Route::get('/', [App\Http\Controllers\PenyakitController::class, 'index']);
      Route::get('/tambah', [App\Http\Controllers\PenyakitController::class, 'create']);
      Route::post('/tambah', [App\Http\Controllers\PenyakitController::class, 'store']);
      Route::get('/edit/{id}', [App\Http\Controllers\PenyakitController::class, 'edit']);
      Route::put('/edit/{id}', [App\Http\Controllers\PenyakitController::class, 'update']);
      Route::delete('/hapus/{id}', [App\Http\Controllers\PenyakitController::class, 'destroy']);
    });

    Route::prefix('relasi')->group(function () {
      Route::get('/', [App\Http\Controllers\RelasiController::class, 'index']);
      Route::get('/tambah', [App\Http\Controllers\RelasiController::class, 'create']);
      Route::post('/tambah', [App\Http\Controllers\RelasiController::class, 'store']);
      Route::get('/edit/{id}', [App\Http\Controllers\RelasiController::class, 'edit']);
      Route::put('/edit/{id}', [App\Http\Controllers\RelasiController::class, 'update']);
      Route::delete('/hapus/{id}', [App\Http\Controllers\RelasiController::class, 'destroy']);
    });
  });
});

