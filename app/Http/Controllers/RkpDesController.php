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

class RkpDesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rkpDes = RkpDes::all();

        return view('admin.konten.rkpdes.index', compact('rkpDes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.rkpdes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:225',
                'konten' => 'required',
            ]);

            RkpDes::create($request->all());

            return redirect('/admin/rkpdes')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/rkpdes/create')->with('gagal', 'Data gagal disimpan' . $e->getMessage());
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

        $rkpDes = RkpDes::findOrFail($decryptId);
        $dropdownRkpDes = RkpDes::all();
        $dropdownProfil = ProfilDesa::all();
        $waktuLayanan = WaktuLayanan::all();
        $informasiDesa = InformasiDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownApbKonten = ApbKonten::all();
        $sosmed = Sosmed::all();

        return view('user.konten.rkpdes', compact('waktuLayanan', 'dropdownProfil', 'informasiDesa', 'dropdownPelayanan', 'dropdownPpid', 'dropdownApbKonten', 'rkpDes', 'dropdownRkpDes', 'dropdownRpjmDes', 'dropdownApbKonten', 'sosmed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rkpDes = RkpDes::findOrFail($id);

        return view('admin.konten.rkpdes.edit', compact('rkpDes'));
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

            $rkpDes = RkpDes::find($id);

            $rkpDes->update($request->all());

            return redirect('/admin/rkpdes')->with('Sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/rkpdes/edit/{$id}')->with('gagal', 'Data gagal diupdate' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rkpDes = RkpDes::findOrFail($id);
        $rkpDes->delete();

        return redirect('/admin/rkpdes')->with('Sukses', 'Data berhasil dihapus');
    }
}
