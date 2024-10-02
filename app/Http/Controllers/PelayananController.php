<?php

namespace App\Http\Controllers;

use App\Models\ApbKonten;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProfilDesa;
use App\Models\RkpDes;
use App\Models\RpjmDes;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelayanan = Pelayanan::all();

        return view('admin.konten.pelayanan.index', compact('pelayanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.pelayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'konten' => 'required',
            ]);

            Pelayanan::create($request->all());

            return redirect('/admin/pelayanan')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/pelayanan/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelayanan = Pelayanan::findOrFail($id);
        $dropdownPelayanan = Pelayanan::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();

        return view('user.konten.pelayanan', compact('pelayanan', 'dropdownPelayanan', 'dropdownProfil', 'waktuLayanan', 'informasiDesa', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelayanan = Pelayanan::findOrFail($id);

        return view('admin.konten.pelayanan.edit', compact('pelayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'konten' => 'required',
            ]);

            $pelayanan = Pelayanan::findOrFail($id);

            $pelayanan->update($request->all());

            return redirect('/admin/pelayanan')->with('suskses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/pelayanan/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelayanan = Pelayanan::findOrFail($id);
        $pelayanan->delete();

        return redirect('/admin/pelayanan')->with('sukses', 'Data berhasil dihapus');
    }
}
