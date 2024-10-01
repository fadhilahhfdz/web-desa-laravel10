<?php

namespace App\Http\Controllers;

use App\Models\ApbKonten;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProdukHukum;
use App\Models\ProfilDesa;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class ProdukHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkHukum = ProdukHukum::all();

        return view('admin.konten.produk-hukum.index', compact('produkHukum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.produk-hukum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'konten' => 'required'
            ]);

            if (ProdukHukum::count() >= 1) {
                return redirect('/admin/produk-hukum')->with('error', 'Anda hanya dapat menambahkan 1 data, tetapi anda dapat mengeditnya');
            }

            ProdukHukum::create($request->all());

            return redirect('/admin/produk-hukum')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/produk-hukum/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $produkHukum = ProdukHukum::all();

        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();

        return view('user.konten.produk-hukum', compact('produkHukum', 'informasiDesa', 'waktuLayanan', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produkHukum = ProdukHukum::findOrFail($id);

        return view('admin.konten.produk-hukum.edit', compact('produkHukum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'konten' => 'required'
            ]);

            $produkHukum = ProdukHukum::findOrFail($id);

            $produkHukum->update($request->all());

            return redirect('/admin/produk-hukum')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/produk-hukum/edit/{$id}')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produkHukum = ProdukHukum::findOrFail($id);
        $produkHukum->delete();

        return redirect('/admin/produk-hukum')->with('sukses', 'Data berhasil dihapus');
    }
}
