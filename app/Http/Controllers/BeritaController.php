<?php

namespace App\Http\Controllers;

use App\Models\ApbKonten;
use App\Models\Berita;
use App\Models\InformasiDesa;
use App\Models\KategoriBerita;
use App\Models\Pelayanan;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\Ppid;
use App\Models\ProfilDesa;
use App\Models\RkpDes;
use App\Models\RpjmDes;
use App\Models\Sosmed;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::orderBy('updated_at', 'desc')->get();
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('admin.berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'judul' => 'required|max:100',
                'author' => 'required|string|max:100',
                'konten' => 'required',
            ]);

            Berita::create($request->all());

            return redirect('/admin/berita')->with('sukses', 'Berita berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/berita/create')->with('gagal', 'Berita gagal disimpan' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Id tidak valid');
        }

        $berita = Berita::findOrFail($decryptId);
        $kategori = KategoriBerita::all();
        $recent = Berita::latest()->paginate(5);
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
        $sosmed = Sosmed::all();
        
        return view('user.konten.berita.berita', compact('berita', 'kategori', 'recent', 'waktuLayanan', 'informasiDesa', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes', 'sosmed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        try {
            $request->validate([
                'judul' => 'required|max:100',
                'author' => 'required|string|max:100',
                'konten' => 'required',
            ]);

            $berita->update($request->all());

            return redirect('/admin/berita')->with('sukses', 'Berita berhasil diupdate');
        } catch(\Exception $e) {
            return redirect(`/admin/berita/edit/{id}`)->with('gagal', 'Berita gagal diupdate' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect('/admin/berita')->with('sukses', 'Berhasil menghapus data');
    }

    public function berita_all() {
        $berita = Berita::latest()->paginate(5);
        $kategori = KategoriBerita::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
        $sosmed = Sosmed::all();

        return view('user.konten.berita.berita_all', compact('berita', 'kategori', 'waktuLayanan', 'informasiDesa', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes', 'sosmed'));
    }

    public function berita_by_kategori($id) {
        try {
            $decryptId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Id tidak valid');
        }

        $kategori = KategoriBerita::findOrFail($decryptId);
        $berita = Berita::where('id_kategori', $decryptId)->latest()->paginate(5);
        $all = KategoriBerita::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
        $sosmed = Sosmed::all();

        return view('user.konten.berita.by-kategori', compact('berita', 'kategori', 'all', 'waktuLayanan', 'informasiDesa', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes', 'sosmed'));
    }

    public function search(Request $request) {
        $searchQuery = $request->input('s');
        $hasil = Berita::where('judul', 'LIKE', "%{$searchQuery}%")
                            ->orWhere('author', 'LIKE', "%{$searchQuery}%")
                            ->orWhere('konten', 'LIKE', "%{$searchQuery}%")
                            ->orWhereHas('kategori', function($query) use ($searchQuery) {
                                $query->where('nama', 'LIKE', "%{$searchQuery}%");
                            })
                            ->latest()->paginate(5);

        $kategoriAll = KategoriBerita::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
        $sosmed = Sosmed::all();
        
        return view('user.konten.berita.cari_berita', compact('hasil', 'kategoriAll', 'waktuLayanan', 'informasiDesa', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes', 'sosmed'));
    }
}
