<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BeritaController::class, 'berita']);

// Auth
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function() {
    return Auth::check() ? redirect('/dashboard') : view('admin.auth.login');
})->middleware('guest')->name('login');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.auth.dashboard');
    });

    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::get('/admin/berita/create', [BeritaController::class, 'create']);
    Route::post('/admin/berita/create', [BeritaController::class, 'store']);
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::put('/admin/berita/edit/{id}', [BeritaController::class, 'update']);
    Route::get('/admin/berita/delete/{id}', [BeritaController::class, 'destroy']);

    Route::get('/admin/kategori', [KategoriBeritaController::class, 'index']);
    Route::post('/admin/kategori/create', [KategoriBeritaController::class, 'store']);
    Route::get('/admin/kategori/edit/{id}', [KategoriBeritaController::class, 'edit']);
    Route::put('/admin/kategori/edit/{id}', [KategoriBeritaController::class, 'update']);
    Route::get('/admin/kategori/delete/{id}', [KategoriBeritaController::class, 'destroy']);
});

    Route::get('/berita', [BeritaController::class, 'berita_all']);
    Route::get('/detail-berita/{id}', [BeritaController::class, 'show']);
    Route::get('/berita-by-kategori/{id}', [BeritaController::class, 'berita_by_kategori']);

Route::fallback(function () {
    return '404 Not Found';
});