<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(15);
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
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();
        $recent = Berita::latest()->paginate(5);
        
        return view('user.berita', compact('berita', 'kategori', 'recent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
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

    public function berita()
    {
        $berita = Berita::all();
        $totalLakiLaki = Penduduk::all()->where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Penduduk::all()->where('jenis_kelamin', 'Perempuan')->count();
        $penduduk = Penduduk::all();
        $perangkatDesa = PerangkatDesa::all();

        return view('user.index', compact('berita', 'totalLakiLaki', 'totalPerempuan', 'penduduk', 'perangkatDesa'));
    }

    public function berita_all() {
        $berita = Berita::latest()->paginate(5);
        $kategori = KategoriBerita::all();

        return view('user.berita_all', compact('berita', 'kategori'));
    }

    public function berita_by_kategori($id) {
        $kategori = KategoriBerita::find($id);

        $berita = Berita::where('id_kategori', $id)->latest()->paginate(5);

        $all = KategoriBerita::all();

        return view('user.by-kategori', compact('berita', 'kategori', 'all'));
    }
}
