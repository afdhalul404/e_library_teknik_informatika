<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KpController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SkripsiController;
use App\Models\Buku;
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

// ADMIN
// dosen
Route::get('/admin/dosen', [DosenController::class, 'index']);
Route::post('/admin/dosen', [DosenController::class, 'store'])->name('dosen.save');
Route::put('/admin/dosen/update/{id}', [DosenController::class, 'update']);
Route::delete('/admin/dosen/delete/{id}', [DosenController::class, 'destroy']);
Route::get('/admin/dosen/search', [DosenController::class, 'search']);

//skripsi
Route::get('/admin/skripsi', [SkripsiController::class, 'index']);
Route::post('/admin/skripsi', [SkripsiController::class, 'store']);
Route::get('/admin/skripsi/detail_{id}', [SkripsiController::class, 'show']);
Route::put('/admin/skripsi/update/{id}', [SkripsiController::class, 'update']);
Route::delete('/admin/skripsi/delete/{id}', [SkripsiController::class, 'destroy']);
Route::get('/admin/skripsi/search', [SkripsiController::class, 'search']);

//kp
Route::get('/admin/kerja_praktek', [KpController::class, 'index']);
Route::post('/admin/kerja_praktek', [KpController::class, 'store']);
Route::get('/admin/kerja_praktek/detail_{id}', [KpController::class, 'show']);
Route::put('/admin/kerja_praktek/update/{id}', [KpController::class, 'update']);
Route::delete('/admin/kerja_praktek/delete/{id}', [KpController::class, 'destroy']);
Route::get('/admin/kerja_praktek/search', [KpController::class, 'search']);

//buku
Route::get('/admin/buku', [BukuController::class, 'index']);
Route::post('/admin/buku', [BukuController::class, 'store']);
Route::get('/admin/buku/detail_{id}', [BukuController::class, 'show']);
Route::put('/admin/buku/update/{id}', [BukuController::class, 'update']);
Route::delete('/admin/buku/delete/{id}', [BukuController::class, 'destroy']);
Route::get('/admin/buku/search', [BukuController::class, 'search']);



// USER
Route::get('/', [PublicController::class, 'getCountTable']);

//buku
Route::get('/buku/', [PublicController::class, 'indexBuku']);
Route::get('/buku/detail/{id}', [PublicController::class, 'showBuku']);

//skripsi
Route::get('/skripsi', [PublicController::class, 'indexSkripsi']);
Route::get('/skripsi/detail/{id}', [PublicController::class, 'showSkripsi']);

//kp
Route::get('/kp', [PublicController::class, 'indexKp']);
Route::get('/kp/detail/{id}', [PublicController::class, 'showKp']);

//Pencarian
Route::get('search/', [PublicController::class, 'search']);
Route::get('{category}/search', [PublicController::class, 'searchCategory'])
->name('search.category');


Route::view('/register', 'login.daftar');
Route::view('/login', 'login.login');


