<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\TugasKelompokController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('masuk');
Route::get('/', [DashboardController::class, 'index']);
Route::resource('manage', UserController::class);
Route::resource('tanda', SignController::class);
Route::resource('tugas_pribadi', SuratTugasController::class);
Route::get('/validasi/tugas_pribadi/{id}', [SuratTugasController::class, 'showValidasi'])->name('tugas_pribadi.validasi');
Route::put('/validasi/tugas_pribadi/{id}', [SuratTugasController::class, 'takenValidasi'])->name('tugas_pribadi.validate');
Route::get('/unduh/tugas_pribadi/{id}', [SuratTugasController::class, 'download'])->name('tugas_pribadi.download');
Route::resource('tugas_kelompok', TugasKelompokController::class);
Route::get('/validasi/tugas_kelompok/{id}', [TugasKelompokController::class, 'showValidasi'])->name('tugas_kelompok.validasi');
Route::put('/validasi/tugas_kelompok/{id}', [TugasKelompokController::class, 'takenValidasi'])->name('tugas_kelompok.validate');
Route::get('/unduh/tugas_kelompok/{id}', [TugasKelompokController::class, 'download'])->name('tugas_kelompok.download');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');