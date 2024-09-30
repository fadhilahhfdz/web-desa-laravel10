<?php

use App\Http\Controllers\ApbDesaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DesaAntikorupsiController;
use App\Http\Controllers\DukuhController;
use App\Http\Controllers\FotoDesaController;
use App\Http\Controllers\GenreBukuController;
use App\Http\Controllers\InformasiDesaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KomentarBeritaController;
use App\Http\Controllers\KomentarBukuController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\ProdukHukumController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\SubInformasiDesaController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\WaktuLayananController;
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

// View Index
Route::get('/', [UserViewController::class, 'index']);

// Auth
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function() {
    return Auth::check() ? redirect('/admin/dashboard') : view('admin.auth.login');
})->middleware('guest')->name('login');

// Admin
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.auth.dashboard');
    });

    // Dashboard
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);

    // Berita
    Route::get('/admin/berita', [BeritaController::class, 'index']);
    Route::get('/admin/berita/create', [BeritaController::class, 'create']);
    Route::post('/admin/berita/create', [BeritaController::class, 'store']);
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit']);
    Route::put('/admin/berita/edit/{id}', [BeritaController::class, 'update']);
    Route::get('/admin/berita/delete/{id}', [BeritaController::class, 'destroy']);

    // Kategori Berita
    Route::get('/admin/berita/kategori', [KategoriBeritaController::class, 'index']);
    Route::post('/admin/berita/kategori/create', [KategoriBeritaController::class, 'store']);
    Route::get('/admin/berita/kategori/edit/{id}', [KategoriBeritaController::class, 'edit']);
    Route::put('/admin/berita/kategori/edit/{id}', [KategoriBeritaController::class, 'update']);
    Route::get('/admin/berita/kategori/delete/{id}', [KategoriBeritaController::class, 'destroy']);

    // Komentar Berita
    Route::get('/admin/berita/komentar', [KomentarBeritaController::class, 'index']);

    // Dukuh
    Route::get('/admin/penduduk/dukuh', [DukuhController::class, 'index']);
    Route::post('/admin/penduduk/dukuh/create', [DukuhController::class, 'store']);
    Route::get('/admin/penduduk/dukuh/edit/{id}', [DukuhController::class, 'edit']);
    Route::put('/admin/penduduk/dukuh/edit/{id}', [DukuhController::class, 'update']);
    Route::get('/admin/penduduk/dukuh/delete/{id}', [DukuhController::class, 'destroy']);

    // Penduduk
    Route::get('/admin/penduduk', [PendudukController::class, 'index']);
    Route::get('/admin/penduduk/create', [PendudukController::class, 'create']);
    Route::post('/admin/penduduk/create', [PendudukController::class, 'store']);
    Route::get('/admin/penduduk/edit/{id}', [PendudukController::class, 'edit']);
    Route::put('/admin/penduduk/edit/{id}', [PendudukController::class, 'update']);
    Route::get('/admin/penduduk/delete/{id}', [PendudukController::class, 'destroy']);

    // Perangkat Desa
    Route::get('/admin/perangkat-desa', [PerangkatDesaController::class, 'index']);
    Route::post('/admin/perangkat-desa/create', [PerangkatDesaController::class, 'store']);
    Route::get('/admin/perangkat-desa/edit/{id}', [PerangkatDesaController::class, 'edit']);
    Route::put('/admin/perangkat-desa/edit/{id}', [PerangkatDesaController::class, 'update']);
    Route::get('/admin/perangkat-desa/delete/{id}', [PerangkatDesaController::class, 'destroy']);

    // Sub Informasi Desa
    Route::get('/admin/sub-informasi-desa', [SubInformasiDesaController::class, 'index']);
    Route::post('/admin/sub-informasi-desa/create', [SubInformasiDesaController::class, 'store']);
    Route::get('/admin/sub-informasi-desa/edit/{id}', [SubInformasiDesaController::class, 'edit']);
    Route::put('/admin/sub-informasi-desa/edit/{id}', [SubInformasiDesaController::class, 'update']);
    Route::get('/admin/sub-informasi-desa/delete/{id}', [SubInformasiDesaController::class, 'destroy']);

    // Informasi Desa
    Route::get('/admin/informasi-desa', [InformasiDesaController::class, 'index']);
    Route::post('/admin/informasi-desa/create', [InformasiDesaController::class, 'store']);
    Route::get('/admin/informasi-desa/edit/{id}', [InformasiDesaController::class, 'edit']);
    Route::put('/admin/informasi-desa/edit/{id}', [InformasiDesaController::class, 'update']);
    Route::get('/admin/informasi-desa/delete/{id}', [InformasiDesaController::class, 'destroy']);

    // Hero Picture
    Route::get('/admin/informasi-desa/foto', [FotoDesaController::class, 'index']);
    Route::post('/admin/informasi-desa/foto/create', [FotoDesaController::class, 'store']);
    Route::get('/admin/informasi-desa/foto/edit/{id}', [FotoDesaController::class, 'edit']);
    Route::put('/admin/informasi-desa/foto/edit/{id}', [FotoDesaController::class, 'update']);
    Route::get('/admin/informasi-desa/foto/delete/{id}', [FotoDesaController::class, 'destroy']);

    // Waktu Layanan Desa
    Route::get('/admin/waktu-layanan-desa', [WaktuLayananController::class, 'index']);
    Route::post('/admin/waktu-layanan-desa/create', [WaktuLayananController::class, 'store']);
    Route::get('/admin/waktu-layanan-desa/edit/{id}', [WaktuLayananController::class, 'edit']);
    Route::put('/admin/waktu-layanan-desa/edit/{id}', [WaktuLayananController::class, 'update']);
    Route::get('/admin/waktu-layanan-desa/delete/{id}', [WaktuLayananController::class, 'destroy']);

    // APB Desa
    Route::get('/admin/apb-desa', [ApbDesaController::class, 'index']);
    Route::get('/admin/apb-desa/create', [ApbDesaController::class, 'create']);
    Route::post('/admin/apb-desa/create', [ApbDesaController::class, 'store']);
    Route::get('/admin/apb-desa/edit/{id}', [ApbDesaController::class, 'edit']);
    Route::put('/admin/apb-desa/edit/{id}', [ApbDesaController::class, 'update']);
    Route::get('/admin/apb-desa/delete/{id}', [ApbDesaController::class, 'destroy']);

    // Profil Desa
    Route::get('/admin/profil-desa', [ProfilDesaController::class, 'index']);
    Route::get('/admin/profil-desa/create', [ProfilDesaController::class, 'create']);
    Route::post('/admin/profil-desa/create', [ProfilDesaController::class, 'store']);
    Route::get('/admin/profil-desa/edit/{id}', [ProfilDesaController::class, 'edit']);
    Route::put('/admin/profil-desa/edit/{id}', [ProfilDesaController::class, 'update']);
    Route::get('/admin/profil-desa/delete/{id}', [ProfilDesaController::class, 'destroy']);

    // Pelayanan Desa
    Route::get('/admin/pelayanan', [PelayananController::class, 'index']);
    Route::get('/admin/pelayanan/create', [PelayananController::class, 'create']);
    Route::post('/admin/pelayanan/create', [PelayananController::class, 'store']);
    Route::get('/admin/pelayanan/edit/{id}', [PelayananController::class, 'edit']);
    Route::put('/admin/pelayanan/edit/{id}', [PelayananController::class, 'update']);
    Route::get('/admin/pelayanan/delete/{id}', [PelayananController::class, 'destroy']);
    
    // PPID Desa
    Route::get('/admin/ppid', [PpidController::class, 'index']);
    Route::get('/admin/ppid/create', [PpidController::class, 'create']);
    Route::post('/admin/ppid/create', [PpidController::class, 'store']);
    Route::get('/admin/ppid/edit/{id}', [PpidController::class, 'edit']);
    Route::put('/admin/ppid/edit/{id}', [PpidController::class, 'update']);
    Route::get('/admin/ppid/delete/{id}', [PpidController::class, 'destroy']);

    // Produk Hukum
    Route::get('/admin/produk-hukum', [ProdukHukumController::class, 'index']);
    Route::get('/admin/produk-hukum/create', [ProdukHukumController::class, 'create']);
    Route::post('/admin/produk-hukum/create', [ProdukHukumController::class, 'store']);
    Route::get('/admin/produk-hukum/edit/{id}', [ProdukHukumController::class, 'edit']);
    Route::put('/admin/produk-hukum/edit/{id}', [ProdukHukumController::class, 'update']);
    Route::get('/admin/produk-hukum/delete/{id}', [ProdukHukumController::class, 'destroy']);

    // Desa Antikorupsi
    Route::get('/admin/desa-antikorupsi', [DesaAntikorupsiController::class, 'index']);
    Route::get('/admin/desa-antikorupsi/create', [DesaAntikorupsiController::class, 'create']);
    Route::post('/admin/desa-antikorupsi/create', [DesaAntikorupsiController::class, 'store']);
    Route::get('/admin/desa-antikorupsi/edit/{id}', [DesaAntikorupsiController::class, 'edit']);
    Route::put('/admin/desa-antikorupsi/edit/{id}', [DesaAntikorupsiController::class, 'update']);
    Route::get('/admin/desa-antikorupsi/delete/{id}', [DesaAntikorupsiController::class, 'destroy']);

    // Genre Buku
    Route::get('/admin/perpustakaan/genre', [GenreBukuController::class, 'index']);
    Route::post('/admin/perpustakaan/genre/create', [GenreBukuController::class, 'store']);
    Route::get('/admin/perpustakaan/genre/edit/{id}', [GenreBukuController::class, 'edit']);
    Route::put('/admin/perpustakaan/genre/edit/{id}', [GenreBukuController::class, 'update']);
    Route::get('/admin/perpustakaan/genre/delete/{id}', [GenreBukuController::class, 'destroy']);

    // Buku
    Route::get('/admin/perpustakaan/buku', [PerpustakaanController::class, 'index']);
    Route::get('/admin/perpustakaan/buku/create', [PerpustakaanController::class, 'create']);
    Route::post('/admin/perpustakaan/buku/create', [PerpustakaanController::class, 'store']);
    Route::get('/admin/perpustakaan/buku/edit/{id}', [PerpustakaanController::class, 'edit']);
    Route::put('/admin/perpustakaan/buku/edit/{id}', [PerpustakaanController::class, 'update']);
    Route::get('/admin/perpustakaan/buku/delete/{id}', [PerpustakaanController::class, 'destroy']);
});

/* -- KONTEN -- */
// Profil Desa
Route::get('/profil-desa/{id}', [ProfilDesaController::class, 'show']);
// Pelayanan
Route::get('/pelayanan/{id}', [PelayananController::class, 'show']);
// PPID
Route::get('/ppid/{id}', [PpidController::class, 'show']);
// Produk Hukum
Route::get('/produk-hukum', [ProdukHukumController::class, 'show']);
// Desa Antikorupsi
Route::get('/desa-antikorupsi', [DesaAntikorupsiController::class, 'show']);
// APB Dsa
Route::get('/apb-desa', [ApbDesaController::class, 'show']);
// Berita
Route::get('/berita', [BeritaController::class, 'berita_all']);
Route::get('/detail-berita/{id}', [BeritaController::class, 'show']);
Route::get('/berita-by-kategori/{id}', [BeritaController::class, 'berita_by_kategori']);
Route::post('/detail-berita/{id}', [KomentarBeritaController::class, 'store'])->name('komentar.store');
Route::get('/berita/cari', [BeritaController::class, 'search']);

// Buku Perpustakaan
Route::get('/perpustakaan/buku', [PerpustakaanController::class, 'buku_all']);
Route::get('/perpustakaan/buku/detail/{id}', [PerpustakaanController::class, 'show']);
Route::post('/perpustakaan/buku/detail/{id}', [KomentarBukuController::class, 'store']);
Route::get('/perpustakaan/buku/buku_by_genre/{id}', [PerpustakaanController::class, 'buku_by_genre']);
Route::get('/perpustakaan/buku/cari', [PerpustakaanController::class, 'search']);

// Fallback
Route::fallback([UserViewController::class, 'fallback']);