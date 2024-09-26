<?php

namespace App\Http\Controllers;

use App\Models\KomentarBuku;
use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class KomentarBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id_buku)
    {
        try {
            $request->validate([
                'id_buku' => 'required',
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'email' => 'required|string|max:100',
                'komentar' => 'required'
            ]);

            $perpustakaan = Perpustakaan::findOrFail($id_buku);

            $perpustakaan->komentar()->create([
                'id_buku' => $id_buku,
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'komentar' => $request->input('komentar'),
            ]);

            return redirect('/perpustakaan/buku/detail/{$id}')->with('sukses', 'Berhasil menambahkan komentar');
        } catch (\Exception $e) {
            return redirect('/perpustakaan/buku/detail/{$id}')->with('gagal', 'Gagal menambahkan komentar ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KomentarBuku $komentarBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomentarBuku $komentarBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KomentarBuku $komentarBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KomentarBuku $komentarBuku)
    {
        //
    }
}
