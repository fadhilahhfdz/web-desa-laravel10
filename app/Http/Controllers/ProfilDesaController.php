<?php

namespace App\Http\Controllers;

use App\Models\ApbKonten;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProfilDesa;
use App\Models\RkpDes;
use App\Models\RpjmDes;
use App\Models\Sosmed;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profilDesa = ProfilDesa::all();

        return view('admin.konten.profil-desa.index', compact('profilDesa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.profil-desa.create');
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

            ProfilDesa::create($request->all());

            return redirect('/admin/profil-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/profil-desa/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $decryptId = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Id tidak valid');
        }

        $profilDesa = ProfilDesa::findOrFail($decryptId);
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
        $sosmed = Sosmed::all();

        return view('user.konten.profil-desa', compact('profilDesa', 'waktuLayanan', 'dropdownProfil', 'informasiDesa', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes', 'sosmed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profilDesa = ProfilDesa::find($id);

        return view('admin.konten.profil-desa.edit', compact('profilDesa'));
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

            $profilDesa = ProfilDesa::find($id);
    
            $profilDesa->update($request->all());
    
            return redirect('/admin/profil-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/profil-desa/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profilDesa = ProfilDesa::findOrFail($id);
        $profilDesa->delete();

        return redirect('/admin/profil-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
