<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perangkatDesa = PerangkatDesa::all();

        return view('admin.perangkat-desa.index', compact('perangkatDesa'));
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
                'jabatan' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);
            
            // $fotoPath = $request->file('foto')->store('perangkat_desas');

            $fotoName = time() . '.' . $request->foto->extension();
            $fotoPath = 'foto_perangkat_desa/' . $fotoName;
            $request->foto->move(public_path('foto_perangkat_desa'), $fotoName);

            PerangkatDesa::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'foto' => $fotoPath,
            ]);

            return redirect('/admin/perangkat-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/perangkat-desa')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PerangkatDesa $perangkatDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perangkatDesa = PerangkatDesa::findOrFail($id);

        return view('admin.perangkat-desa.edit', compact('perangkatDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $perangkatDesa = PerangkatDesa::findOrFail($id);

            $perangkatDesa->nama = $request->nama;
            $perangkatDesa->jabatan = $request->jabatan;

            // jika ada file foto baru maka upload foto
            if ($request->hasFile('foto')) {
                //hapus foto lama jika ada
                if (file_exists(public_path($perangkatDesa->foto))) {
                    unlink(public_path($perangkatDesa->foto));
                };

                // Upload foto baru
                $fotoName = time() . '.' . $request->foto->extension();
                $fotoPath = 'foto_perangkat_desa/' . $fotoName;
                $request->foto->move(public_path('foto_perangkat_desa'), $fotoName);

                // Update path foto
                $perangkatDesa->foto = $fotoPath;
            }

            $perangkatDesa->save();

            return redirect('/admin/perangkat-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/perangkat-desa/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perangkatDesa = PerangkatDesa::findOrFail($id);
        $perangkatDesa->delete();

        return redirect('/admin/perangkat-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
