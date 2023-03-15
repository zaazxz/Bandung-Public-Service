<?php

use App\Models\Laporan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LaporanController;
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

// Landing Page
Route::get('/', function () {
    return view('main.index', [
        'title' => 'Halaman Utama',
        'data' => Laporan::all()
    ]);
});

// Only view
Route::get('/dashboard', [ViewController::class, 'dashboard']);

Route::get('/about', function () {
    return view('main.about.about', [
        'title' => 'Tentang Kami'
    ]);
});

Route::group(['middleware' => ['auth:masyarakat']], function () {

    // Konfigurasi (Masyarakat)
    Route::get('konfigurasi/masyarakat', [MasyarakatController::class, 'index']);
    Route::resource('konfigurasi/masyarakat', MasyarakatController::class);

});

// Laporan
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/detail', [LaporanController::class, 'detail']);
Route::resource('/laporan', LaporanController::class);
