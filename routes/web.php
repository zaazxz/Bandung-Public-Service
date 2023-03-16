<?php

use App\Models\Laporan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatController;

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

// Login dan Register (View)
Route::get('/masuk', [AuthController::class, 'masuk'])->middleware('non-auth');
Route::get('/daftar', [AuthController::class, 'daftar'])->middleware('non-auth');

// Login dan Register (Controller)
Route::post('/login', [AuthController::class, 'login'])->middleware('non-auth');
Route::post('/register', [AuthController::class, 'register'])->middleware('non-auth');
Route::post('/logout', [AuthController::class, 'logout']);

// Admin & Petugas
Route::group(['middleware' => ['auth:user,petugas']], function () {

    // Dashboard
    Route::get('/dashboard', [ViewController::class, 'dashboard']);

    // Pengaduan
    Route::get('/dashboard/pengaduan', [ViewController::class, 'pengaduanBaru']);
    Route::get('/dashboard/pengaduan/diproses', [ViewController::class, 'pengaduanDiproses']);
    Route::get('/dashboard/pengaduan/selesai', [ViewController::class, 'pengaduanSelesai']);
    Route::get('/dashboard/pengaduan/{laporan}', [ViewController::class, 'pengaduanDetail']);

});

// Admin Only
Route::group(['middleware' => ['auth:user']], function () {

    // Pengelolaan Masyarakat
    Route::get('/dashboard/masyarakat', [ViewController::class, 'masyarakat']);
    Route::post('/dashboard/masyarakat/{masyarakat}', [MasyarakatController::class, 'delete']);

    // Pengelolaan Petugas
    Route::get('/dashboard/petugas', [PetugasController::class, 'index']);
    Route::get('/dashboard/petugas/create', [PetugasController::class, 'create']);
    Route::post('/dashboard/petugas/{petugas}', [PetugasController::class, 'destroy']);
    Route::post('/dashboard/petugas', [PetugasController::class, 'store']);

    // Konfigurasi Admin
    Route::get('/dashboard/konfigurasi/user', [UserController::class, 'index']);
    Route::post('/dashboard/konfigurasi/user/{user}', [UserController::class, 'update']);

});

// Masyarakat Only
Route::group(['middleware' => ['auth:masyarakat']], function () {

    // Konfigurasi (Masyarakat)
    Route::get('konfigurasi/masyarakat', [MasyarakatController::class, 'index']);
    Route::resource('konfigurasi/masyarakat', MasyarakatController::class);
});

// Laporan
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/detail', [LaporanController::class, 'detail']);
Route::resource('/laporan', LaporanController::class);

// Without Login
Route::get('/', [ViewController::class, 'landing']);
Route::get('/about', [ViewController::class, 'about']);
