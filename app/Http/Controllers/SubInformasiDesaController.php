<?php

namespace App\Http\Controllers;

use App\Models\SubInformasiDesa;
use Illuminate\Http\Request;

class SubInformasiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subInformasiDesa = SubInformasiDesa::all();

        return view('admin.sub-informasi-desa.index', compact('subInformasiDesa'));
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

            if (SubInformasiDesa::count() >= 2) {
                return redirect('/admin/sub-informasi-desa')->with('error', 'Anda hanya dapat menambahkan 2 data');
            }

            SubInformasiDesa::create($request->all());

            return redirect('/admin/sub-informasi-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/sub-informasi-desa')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubInformasiDesa $subInformasiDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subInformasiDesa = SubInformasiDesa::findOrFail($id);

        return view('admin.sub-informasi-desa.edit', compact('subInformasiDesa'));
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

            $subInformasiDesa = SubInformasiDesa::findOrFail($id);

            $subInformasiDesa->update($request->all());

            return redirect('/admin/sub-informasi-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/sub-informasi-desa/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subInformasiDesa = SubInformasiDesa::findOrFail($id);
        $subInformasiDesa->delete();

        return redirect('/admin/sub-informasi-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
