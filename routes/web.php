<?php

use App\Http\Controllers\AuthController;
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

// Landing Page
Route::get('/', function () {
    return view('main.index', [
        'title' => 'Halaman Utama'
    ]);
});

// Login dan Register (View)
Route::get('/masuk', [AuthController::class, 'masuk'])->middleware('guest');
Route::get('/daftar', [AuthController::class, 'daftar'])->middleware('guest');

// Login dan Register (Controller)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
