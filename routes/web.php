<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataKelahiranController;
use App\Http\Controllers\DataKematianController;
use App\Http\Controllers\DataPendudukController;
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

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('daftar', [AuthController::class, 'daftar'])->name('auth.daftar');
Route::post('daftar', [AuthController::class, 'proses_daftar'])->name('auth.proses_daftar');
Route::post('login', [AuthController::class, 'proses_login'])->name('auth.proses_login');
Route::group([], function () {
    Route::get('/', function () {
        return redirect('login');
    });
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');
    Route::get('index', [AuthController::class, 'index'])->name('admin.index');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    Route::get('data_penduduk', [DataPendudukController::class, 'index'])->name('data_penduduk.index');
    Route::get('data_penduduk/delete/{id}', [DataPendudukController::class, 'delete'])->name('data_penduduk.delete');
    Route::get('data_penduduk/{tab}/{id}', [DataPendudukController::class, 'form'])->name('data_penduduk.form');
    Route::post('data_penduduk/{tab}/{id}', [DataPendudukController::class, 'store'])->name('data_penduduk.store');
    
    Route::get('data_kelahiran', [DataKelahiranController::class, 'index'])->name('data_kelahiran.index');
    Route::get('data_kelahiran/confirm/{type}/{id}', [DataKelahiranController::class, 'confirm'])->name('data_kelahiran.confirm');
    Route::get('data_kelahiran/print/{id}', [DataKelahiranController::class, 'print'])->name('data_kelahiran.print');
    Route::get('data_kelahiran/delete/{id}', [DataKelahiranController::class, 'delete'])->name('data_kelahiran.delete');
    Route::get('data_kelahiran/{tab}/{id}', [DataKelahiranController::class, 'form'])->name('data_kelahiran.form');
    Route::post('data_kelahiran/{tab}/{id}', [DataKelahiranController::class, 'store'])->name('data_kelahiran.store');
    
    Route::get('data_kematian', [DataKematianController::class, 'index'])->name('data_kematian.index');
    Route::get('data_kematian/confirm/{type}/{id}', [DataKematianController::class, 'confirm'])->name('data_kematian.confirm');
    Route::get('data_kematian/print/{id}', [DataKematianController::class, 'print'])->name('data_kematian.print');
    Route::get('data_kematian/delete/{id}', [DataKematianController::class, 'delete'])->name('data_kematian.delete');
    Route::get('data_kematian/{tab}/{id}', [DataKematianController::class, 'form'])->name('data_kematian.form');
    Route::post('data_kematian/{tab}/{id}', [DataKematianController::class, 'store'])->name('data_kematian.store');
    
});