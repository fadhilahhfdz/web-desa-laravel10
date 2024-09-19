<?php

namespace App\Http\Controllers;

use App\Models\ApbDesa;
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
                'judul' => 'required|string|max:255',
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
    public function show($id)
    {
        $apbDesa = ApbDesa::findOrFail($id);

        return view('user.konten.apb-desa', compact('apbDesa'));
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
                'judul' => 'required|string|max:255',
                'konten' => 'required',
            ]);

            $apbDesa = ApbDesa::findOrFail($id);

            $apbDesa->update($request->all());

            return redirect('/admin/apb-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/apb-desa/edit/{$id}')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
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
