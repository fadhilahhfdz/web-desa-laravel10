<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KomentarBeritaController;
use App\Http\Controllers\PendudukController;
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
    return Auth::check() ? redirect('/admin/dashboard') : view('admin.auth.login');
})->middleware('guest')->name('login');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.auth.dashboard');
    });

    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);

    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::get('/admin/berita/create', [BeritaController::class, 'create']);
    Route::post('/admin/berita/create', [BeritaController::class, 'store']);
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::put('/admin/berita/edit/{id}', [BeritaController::class, 'update']);
    Route::get('/admin/berita/delete/{id}', [BeritaController::class, 'destroy']);

    Route::get('/admin/berita/kategori', [KategoriBeritaController::class, 'index']);
    Route::post('/admin/berita/kategori/create', [KategoriBeritaController::class, 'store']);
    Route::get('/admin/berita/kategori/edit/{id}', [KategoriBeritaController::class, 'edit']);
    Route::put('/admin/berita/kategori/edit/{id}', [KategoriBeritaController::class, 'update']);
    Route::get('/admin/berita/kategori/delete/{id}', [KategoriBeritaController::class, 'destroy']);

    Route::get('/admin/berita/komentar', [KomentarBeritaController::class, 'index']);

    Route::get('/admin/penduduk', [PendudukController::class, 'index']);
    Route::post('/admin/penduduk/create', [PendudukController::class, 'store']);
    Route::get('/admin/penduduk/edit/{id}', [PendudukController::class, 'edit']);
    Route::put('/admin/penduduk/edit/{id}', [PendudukController::class, 'update']);
    Route::get('/admin/penduduk/delete/{id}', [PendudukController::class, 'destroy']);
});

Route::get('/berita', [BeritaController::class, 'berita_all']);
Route::get('/detail-berita/{id}', [BeritaController::class, 'show']);
Route::get('/berita-by-kategori/{id}', [BeritaController::class, 'berita_by_kategori']);

Route::post('/detail-berita/{id}', [KomentarBeritaController::class, 'store'])->name('komentar.store');

Route::get('/struktur', function () {
    return view('user.profil.struktur');
});

Route::get('/perangkat', function () {
    return view('user.profil.perangkat');
});

Route::get('/tugas', function () {
    return view('user.profil.tugas');
});

Route::get('/visi', function () {
    return view('user.profil.visi');
});

Route::get('/demografi', function () {
    return view('user.profil.demografi');
});

Route::get('/peta', function () {
    return view('user.profil.peta');
});

Route::get('/sop', function () {
    return view('user.pelayanan.sop');
});

Route::get('/layanan', function () {
    return view('user.pelayanan.layanan');
});

Route::get('/maklumat', function () {
    return view('user.pelayanan.maklumat');
});

Route::get('/survai', function () {
    return view('user.pelayanan.survai');
});

Route::get('/indeks', function () {
    return view('user.pelayanan.indeks');
});

Route::get('/survay', function () {
    return view('user.pelayanan.survay');
});

Route::get('/profil', function () {
    return view('user.ppid.profil');
});
Route::get('/stppid', function () {
    return view('user.ppid.stppid');
});
Route::get('/tugas ppid', function () {
    return view('user.ppid.tugas ppid');
});
Route::get('/visi ppid', function () {
    return view('user.ppid.visi ppid');
});
Route::get('/hukum', function () {
    return view('user.ppid.hukum');
});
Route::get('/alur', function () {
    return view('user.ppid.alur');
});
Route::get('/informasi', function () {
    return view('user.ppid.informasi');
});
Route::get('/keberatan', function () {
    return view('user.ppid.keberatan');
});
Route::get('/penyalahgunaan', function () {
    return view('user.ppid.penyalahgunaan');
});
Route::get('/sengketa', function () {
    return view('user.ppid.sengketa');
});
Route::get('/daftar-informasi/berkala', function () {
    return view('user.ppid.daftar-informasi.berkala');
});
Route::get('/daftar-informasi/setiap', function () {
    return view('user.ppid.daftar-informasi.setiap');
});
Route::get('/daftar-informasi/serta', function () {
    return view('user.ppid.daftar-informasi.serta');
});
Route::get('/daftar-informasi/dikecualikan', function () {
    return view('user.ppid.daftar-informasi.dikecualikan');
});

Route::get('/produk-hukum', function () {
    return view('user.produk');
});

Route::get('/apb', function () {
    return view('user.apb');
});

Route::get('/anti', function () {
    return view('user.anti');
});

Route::get('/katalog', function () {
    return view('user.katalog');
});

Route::fallback(function () {
    return view('user.404');
});