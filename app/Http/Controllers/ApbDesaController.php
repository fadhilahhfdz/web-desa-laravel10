<?php

namespace App\Http\Controllers;

use App\Models\ApbDesa;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProdukHukum;
use App\Models\ProfilDesa;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class ApbDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apbDesa = ApbDesa::all();

        return view('admin.konten.apb-desa.index', compact('apbDesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.apb-desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'jenis' => 'required|in:Pendapatan,Belanja',
                'kategori' => 'required|string',
                'nominal' => 'required|numeric|min:0',
                'konten' => 'required',
            ]);

            ApbDesa::create($request->all());

            return redirect('/admin/apb-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/apb-desa/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $apbDesa = ApbDesa::all();
        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();
        
        $dropdownProfil = ProfilDesa::all();
        $dropdownPpid = Ppid::all();
        $dropdownPelayanan = Pelayanan::all();

        return view('user.konten.apb-desa', compact('informasiDesa','waktuLayanan','dropdownProfil','dropdownPelayanan','dropdownPpid', 'apbDesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apbDesa = ApbDesa::findOrFail($id);

        return view('admin.konten.apb-desa.edit', compact('apbDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'jenis' => 'required|in:Pendapatan,Belanja',
                'kategori' => 'required|string',
                'nominal' => 'required|numeric|min:0',
                'konten' => 'required',
            ]);

            $apbDesa = ApbDesa::findOrFail($id);

            $apbDesa->update($request->all());

            return redirect('/admin/apb-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/apb-desa/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $apbDesa = ApbDesa::findOrFail($id);
        $apbDesa->delete();

        return redirect('/admin/apb-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
