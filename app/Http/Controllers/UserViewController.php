<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\FotoDesa;
use App\Models\InformasiDesa;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\SubInformasiDesa;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserViewController extends Controller
{
    public function index() {
        $berita = Berita::all();
        $totalLakiLaki = Penduduk::sum('laki_laki');
        $totalPerempuan = Penduduk::sum('perempuan');
        $totalJiwa = $totalLakiLaki + $totalPerempuan;
        $penduduk = Penduduk::all();
        $perangkatDesa = PerangkatDesa::all();
        $subInformasiDesa = SubInformasiDesa::all();
        $informasiDesa = InformasiDesa::all();
        $fotoDesa = FotoDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        return view('user.index', compact('berita', 'totalLakiLaki', 'totalPerempuan', 'penduduk', 'perangkatDesa', 'subInformasiDesa', 'informasiDesa', 'fotoDesa', 'waktuLayanan', 'totalJiwa'));
    }
}
