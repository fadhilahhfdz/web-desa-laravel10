<?php

namespace App\Http\Controllers;

use App\Models\Dukuh;
use Illuminate\Http\Request;

class DukuhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dukuh = Dukuh::all();

        return view('admin.dukuh.index', compact('dukuh'));
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
                'nama_dukuh' => 'required|string|max:255',
            ]);

            Dukuh::create($request->all());

            return redirect('/admin/penduduk/dukuh')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/penduduk/dukuh')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dukuh $dukuh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dukuh = Dukuh::findOrFail($id);

        return view('admin.dukuh.edit', compact('dukuh'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_dukuh' => 'required|string|max:255',
            ]);

            $dukuh = Dukuh::findOrFail($id);

            $dukuh->update($request->all());

            return redirect('/admin/penduduk/dukuh/')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/penduduk/dukuh/edit/{$id}')->with('gagal', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dukuh = Dukuh::findOrFail($id);
        $dukuh->delete();

        return redirect('/admin/penduduk/dukuh')->with('sukses', 'Data berhasil dihapus');
    }
}
