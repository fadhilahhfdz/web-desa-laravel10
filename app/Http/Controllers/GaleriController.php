<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProfilDesa;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();

        return view('admin.konten.galeri.index', compact('galeri'));
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
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'caption' => 'required|string|max:255',
            ]);

            $fotoName = time() . '.' . $request->foto->extension();
            $fotoPath = 'foto_galeri/' . $fotoName;
            $request->foto->move(public_path('foto_galeri'), $fotoName);

            Galeri::create([
                'foto' => $fotoPath,
                'caption' => $request->caption
            ]);

            return redirect('/admin/galeri')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/galeri')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $galeri = Galeri::latest()->paginate(9);
        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();
        
        $dropdownProfil = ProfilDesa::all();
        $dropdownPpid = Ppid::all();
        $dropdownPelayanan = Pelayanan::all();

        return view('user.konten.galeri', compact('informasiDesa','waktuLayanan','dropdownProfil','dropdownPelayanan','dropdownPpid', 'galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.konten.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'caption' => 'required|string|max:255',
            ]);

            $galeri = Galeri::findOrFail($id);

            $galeri->caption = $request->caption;

            // jika ada file foto baru maka upload foto
            if ($request->hasFile('foto')) {
                //hapus foto lama jika ada
                if (file_exists(public_path($galeri->foto))) {
                    unlink(public_path($galeri->foto));
                };

                // Upload foto baru
                $fotoName = time() . '.' . $request->foto->extension();
                $fotoPath = 'foto_galeri/' . $fotoName;
                $request->foto->move(public_path('foto_galeri'), $fotoName);

                // Update path foto
                $galeri->foto = $fotoPath;
            }

            $galeri->save();

            return redirect('/admin/galeri')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/galeri/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect('/admin/galeri')->with('sukses', 'Data berhasil dihapus');
    }
}
