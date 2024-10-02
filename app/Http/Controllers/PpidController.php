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

class PpidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ppid = Ppid::all();
        
        return view('admin.konten.ppid.index', compact('ppid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.ppid.create');
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

            Ppid::create($request->all());

            return redirect('/admin/ppid')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/ppid/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ppid = Ppid::findOrFail($id);
        $dropdownPpid = Ppid::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();

        return view('user.konten.ppid', compact('ppid', 'dropdownPpid', 'dropdownProfil', 'dropdownPelayanan', 'waktuLayanan', 'informasiDesa', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppid = Ppid::findOrFail($id);

        return view('admin.konten.ppid.edit', compact('ppid'));
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

            $ppid = Ppid::findOrFail($id);

            $ppid->update($request->all());

            return redirect('/admin/ppid')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/ppid/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ppid = Ppid::findOrFail($id);
        $ppid->delete();

        return redirect('/admin/ppid')->with('sukses', 'Data berhasil dihapus');
    }
}
