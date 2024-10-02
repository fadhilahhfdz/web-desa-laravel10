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

class ApbKontenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apbKonten = ApbKonten::all();

        return view('admin.konten.apb-desa.apb-konten.index', compact('apbKonten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.apb-desa.apb-konten.create');
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

            ApbKonten::create($request->all());

            return redirect('/admin/apb-desa/apb-konten')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/apb-desa/apb-konten/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $apbKonten = ApbKonten::findOrFail($id);
        $dropdownApbKonten = ApbKonten::all();
        $dropdownProfil = ProfilDesa::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();

        return view('user.konten.apb-konten', compact('waktuLayanan', 'dropdownProfil', 'informasiDesa', 'dropdownPelayanan', 'dropdownPpid', 'apbKonten', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apbKonten = ApbKonten::findOrFail($id);

        return view('admin.konten.apb-desa.apb-konten.edit', compact('apbKonten'));
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

            $apbKonten = ApbKonten::findOrFail($id);

            $apbKonten->update($request->all());

            return redirect('/admin/apb-desa/apb-konten')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/apb-desa/apb-konten/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $apbKonten = ApbKonten::findOrFail($id);
        $apbKonten->delete();

        return redirect('/admin/apb-desa/apb-konten')->with('sukses', 'Data berhasil dihapus');
    }
}
