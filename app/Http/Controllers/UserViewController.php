<?php

namespace App\Http\Controllers;

use App\Models\ApbDesa;
use App\Models\Berita;
use App\Models\FotoDesa;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\Ppid;
use App\Models\ProfilDesa;
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

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();

        // APB DESA
        $apbDesa = ApbDesa::all();
        $apbPendapatan = $apbDesa->where('jenis', 'Pendapatan');
        $apbBelanja = $apbDesa->where('jenis', 'Belanja');
        $totalApbPendapatan = $apbDesa->where('jenis', 'Pendapatan')->sum('nominal');
        $totalApbBelanja = $apbDesa->where('jenis', 'Belanja')->sum('nominal');

        return view('user.index', compact('berita', 'totalLakiLaki', 'totalPerempuan', 'penduduk', 'perangkatDesa', 'subInformasiDesa', 'informasiDesa', 'fotoDesa', 'waktuLayanan', 'totalJiwa', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'apbDesa', 'totalApbPendapatan', 'totalApbBelanja', 'apbPendapatan', 'apbBelanja'));
    }

    public function fallback() {
        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();

        return view('user.404', compact('informasiDesa', 'waktuLayanan', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid'));
    }
}
