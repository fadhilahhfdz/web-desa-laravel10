<?php

namespace App\Http\Controllers;

use App\Models\LayananDesa;
use Illuminate\Http\Request;

class LayananDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananDesa = LayananDesa::all();

        return view('admin.layanan-desa.index', compact('layananDesa'));
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
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required'
            ]);

            if (LayananDesa::count() >= 3) {
                return redirect('/admin/layanan-desa')->with('error', 'Anda hanya dapat menambahkan 3 data');
            }

            LayananDesa::create($request->all());

            return redirect('/admin/layanan-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/layanan-desa')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LayananDesa $layananDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layananDesa = LayananDesa::findOrFail($id);

        return view('admin.layanan-desa.edit', compact('layananDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required'
            ]);

            $layananDesa = LayananDesa::findOrFail($id);

            $layananDesa->update($request->all());

            return redirect('/admin/layanan-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/layanan-desa/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $layananDesa = LayananDesa::findOrFail($id);
        $layananDesa->delete();

        return redirect('/admin/layanan-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
