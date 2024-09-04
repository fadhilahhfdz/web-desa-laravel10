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
        return view('admin.kategori.index', compact('kategori'));
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

            return redirect('/admin/kategori')->with('sukses'. 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/kategori')->with('gagal', 'Data gagal disimpan' . $e->getMessage());
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

        return view('admin.kategori.edit', compact('kategori'));
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

            return redirect('/admin/kategori')->with('sukses', 'Data berhasil diubah');
        } catch(\Exception $e) {
            return redirect(`/admin/kategori/edit/{id}`)->with('gagal', 'Data gagal diubah' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = KategoriBerita::find($id);
        $kategori->delete();

        return redirect('/admin/kategori')->with('sukses', 'Data berhasil dihapus');
    }
}
