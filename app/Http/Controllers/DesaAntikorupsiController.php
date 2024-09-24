<?php

namespace App\Http\Controllers;

use App\Models\DesaAntikorupsi;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProfilDesa;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class DesaAntikorupsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaAntikorupsi = DesaAntikorupsi::all();

        return view('admin.konten.desa-antikorupsi.index', compact('desaAntikorupsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.desa-antikorupsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'konten' => 'required',
            ]);

            if (DesaAntikorupsi::count() >= 1) {
                return redirect('/admin/desa-antikorupsi')->with('error', 'Anda hanya dapat menambahkan 1 data, tetapi anda dapat mengeditnya');
            }

            DesaAntikorupsi::create($request->all());

            return redirect('/admin/desa-antikorupsi')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/desa-antikorupsi/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $desaAntikorupsi = DesaAntikorupsi::all();
        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();

        return view('user.konten.desa-antikorupsi', compact('desaAntikorupsi', 'informasiDesa', 'waktuLayanan', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $desaAntikorupsi = DesaAntikorupsi::findOrFail($id);

        return view('admin.konten.desa-antikorupsi.edit', compact('desaAntikorupsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'konten' => 'required',
            ]);

            $desaAntikorupsi = DesaAntikorupsi::findOrFail($id);

            $desaAntikorupsi->update($request->all());

            return redirect('/admin/desa-antikorupsi')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/desa-antikorupsi/edit/{$id}')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $desaAntikorupsi = DesaAntikorupsi::findOrFail($id);
        $desaAntikorupsi->delete();

        return redirect('/admin/desa-antikorupsi')->with('sukses', 'Data berhasil dihapus');
    }
}
