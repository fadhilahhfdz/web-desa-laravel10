<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriBerita::all();
        return view('admin.berita.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:100'
            ]);

            KategoriBerita::create($request->all());

            return redirect('/admin/berita/kategori')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/berita/kategori')->with('gagal', 'Data gagal disimpan' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = KategoriBerita::find($id);

        return view('admin.berita.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $kategori = KategoriBerita::find($id);

        try {
            $request->validate([
                'nama' => 'required|string|max:100'
            ]);

            $kategori->update($request->all());

            return redirect('/admin/berita/kategori')->with('sukses', 'Data berhasil diupdate');
        } catch(\Exception $e) {
            return redirect(`/admin/berita/kategori/edit/{id}`)->with('gagal', 'Data gagal diupdate' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = KategoriBerita::find($id);
        $kategori->delete();

        return redirect('/admin/berita/kategori')->with('sukses', 'Data berhasil dihapus');
    }
}
