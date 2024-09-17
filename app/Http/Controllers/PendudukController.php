<?php

namespace App\Http\Controllers;

use App\Models\Dukuh;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Penduduk::all();

        return view('admin.penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dukuh = Dukuh::all();

        return view('admin.penduduk.create', compact('dukuh'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'laki_laki' => 'required|integer|min:0',
                'perempuan' => 'required|integer|min:0',
            ]);

            Penduduk::create($request->all());

            return redirect('/admin/penduduk')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/penduduk/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $dukuh = Dukuh::all();

        return view('admin.penduduk.edit', compact('penduduk', 'dukuh'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);

        try {
            $request->validate([
                'laki_laki' => 'required|integer|min:0',
                'perempuan' => 'required|integer|min:0',
            ]);

            $penduduk->update($request->all());

            return redirect('/admin/penduduk')->with('sukses', 'Data berhasil diupdate');
        } catch(\Exception $e) {
            return redirect('/admin/penduduk/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect('/admin/penduduk')->with('sukses', 'Berhasil menghapus data');
    }
}
