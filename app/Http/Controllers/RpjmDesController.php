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

class RpjmDesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rpjmDes = RpjmDes::all();

        return view('admin.konten.rpjmdes.index', compact('rpjmDes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.rpjmdes.create');
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

            RpjmDes::create($request->all());

            return redirect('/admin/rpjmdes')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/rpjmdes/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
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

        $rpjmDes = RpjmDes::findOrFail($decryptId);

        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();

        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
        $sosmed = Sosmed::all();

        return view('user.konten.rpjmdes', compact('rpjmDes', 'waktuLayanan', 'informasiDesa', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes', 'sosmed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rpjmDes = RpjmDes::findOrFail($id);

        return view('admin.konten.rpjmdes.edit', compact('rpjmDes'));
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

            $rpjmDes = RpjmDes::findOrFail($id);
    
            $rpjmDes->update($request->all());
    
            return redirect('/admin/rpjmdes')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/rpjmdes/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rpjmDes = RpjmDes::findOrFail($id);
        $rpjmDes->delete();

        return redirect('/admin/rpjmdes')->with('sukses', 'Data berhasil dihapus');
    }
}
