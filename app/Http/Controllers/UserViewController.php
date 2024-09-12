<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\FotoDesa;
use App\Models\InformasiDesa;
use App\Models\LayananDesa;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index() {
        $berita = Berita::all();
        $totalLakiLaki = Penduduk::all()->where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Penduduk::all()->where('jenis_kelamin', 'Perempuan')->count();
        $penduduk = Penduduk::all();
        $perangkatDesa = PerangkatDesa::all();
        $layananDesa = LayananDesa::all();
        $informasiDesa = InformasiDesa::all();
        $fotoDesa = FotoDesa::all();

        return view('user.index', compact('berita', 'totalLakiLaki', 'totalPerempuan', 'penduduk', 'perangkatDesa', 'layananDesa', 'informasiDesa', 'fotoDesa'));
    }
}
