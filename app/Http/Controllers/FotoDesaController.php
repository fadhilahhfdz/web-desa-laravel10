<?php

namespace App\Http\Controllers;

use App\Models\FotoDesa;
use Illuminate\Http\Request;

class FotoDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotoDesa = FotoDesa::all();

        return view('admin.informasi-desa.foto.index', compact('fotoDesa'));
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
                'foto_desa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if (FotoDesa::count() >= 3) {
                return redirect('/admin/informasi-desa/foto')->with('error', 'Anda hanya dapat menambahkan 3 foto');
            }

            $fotoName = time() . '.' . $request->foto_desa->extension();
            $fotoPath = 'foto_desa/' . $fotoName;
            $request->foto_desa->move(public_path('foto_desa'), $fotoName);

            FotoDesa::create([
                'foto_desa' => $fotoPath
            ]);

            return redirect('/admin/informasi-desa/foto')->with('sukses', 'Foto berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/informasi-desa/foto')->with('gagal', 'Foto gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FotoDesa $fotoDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fotoDesa = FotoDesa::findOrFail($id);

        return view('admin.informasi-desa.foto.edit', compact('fotoDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'foto_desa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $fotoDesa = FotoDesa::findOrFail($id);
    
            if ($request->hasFile('foto_desa')) {
                if (file_exists(public_path($fotoDesa->foto_desa))) {
                    unlink(public_path($fotoDesa->foto_desa));
                };

                //upload foto baru
                $fotoName = time() . '.' . $request->foto_desa->extension();
                $fotoPath = 'foto_desa/' . $fotoName;
                $request->foto_desa->move(public_path('foto_desa'), $fotoName);

                //update path foto
                $fotoDesa->foto_desa = $fotoPath;
            }

            $fotoDesa->save();

            return redirect('/admin/informasi-desa/foto')->with('sukses', 'Foto berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/informasi-desa/foto/edit/{$id}')->with('gagal', 'Foto gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fotoDesa = FotoDesa::findOrFail($id);
        $fotoDesa->delete();

        return redirect('/admin/informasi-desa/foto')->with('sukses', 'Foto berhasil dihapus');
    }
}
