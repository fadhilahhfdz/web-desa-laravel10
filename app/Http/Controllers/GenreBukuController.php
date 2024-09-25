<?php

namespace App\Http\Controllers;

use App\Models\GenreBuku;
use Illuminate\Http\Request;

class GenreBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genreBuku = GenreBuku::all();

        return view('admin.konten.perpustakaan.genre.index', compact('genreBuku'));
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
                'nama' => 'required|string|max:255',
            ]);

            GenreBuku::create($request->all());

            return redirect('/admin/perpustakaan/genre')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/perpustakaan/genre/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GenreBuku $genreBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genreBuku = GenreBuku::findOrFail($id);

        return view('admin.konten.perpustakaan.genre.edit', compact('genreBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            $genreBuku = GenreBuku::findOrFail($id);

            $genreBuku->update($request->all());

            return redirect('/admin/perpustakaan/genre')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/perpustakaan/genre/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genreBuku = GenreBuku::findOrFail($id);
        $genreBuku->delete();

        return redirect('/admin/perpustakaan/genre')->with('sukses', 'Data berhasil dihapus');
    }
}
