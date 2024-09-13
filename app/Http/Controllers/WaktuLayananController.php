<?php

namespace App\Http\Controllers;

use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class WaktuLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waktuLayanan = WaktuLayanan::all();

        return view('admin.waktu-layanan-desa.index', compact('waktuLayanan'));
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
    public function store(Request $request)
    {
        try {
            $request->validate([
                'hari' => 'required|string|max:255',
                'jam_buka' => 'required|date_format:H:i',
                'jam_tutup' => 'required|date_format:H:i',
            ]);

            WaktuLayanan::create($request->all());

            return redirect('/admin/waktu-layanan-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/waktu-layanan-desa')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WaktuLayanan $waktuLayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $waktuLayanan = WaktuLayanan::findOrFail($id);

        return view('admin.waktu-layanan-desa.edit', compact('waktuLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'hari' => 'required|string|max:255',
                'jam_buka' => 'required|date_format:H:i',
                'jam_tutup' => 'required|date_format:H:i',
            ]);

            $waktuLayanan = WaktuLayanan::findOrFail($id);

            $waktuLayanan->update($request->all());

            return redirect('/admin/waktu-layanan-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/waktu-layanan-desa/edit/{$id}')->with('gagal', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $waktuLayanan = WaktuLayanan::findOrFail($id);
        $waktuLayanan->delete();

        return redirect('/admin/waktu-layanan-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
