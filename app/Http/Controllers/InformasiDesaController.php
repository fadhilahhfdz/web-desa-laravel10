<?php

namespace App\Http\Controllers;

use App\Models\InformasiDesa;
use Illuminate\Http\Request;

class InformasiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasiDesa = InformasiDesa::all();

        return view('admin.informasi-desa.index', compact('informasiDesa'));
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
                'nama_desa' => 'required|string|max:255',
                'hotline_desa' => 'required|string',
                'email_desa' => 'required|email|unique:users,email',
                'deskripsi_desa' => 'required',
                'thumbnail_video' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'link_video' => 'nullable|string',
            ]);

            if (InformasiDesa::count() >= 1) {
                return redirect('/admin/informasi-desa')->with('error', 'Anda hanya dapat menambahkan 1 data');
            }

            $fotoPath = null;
            if ($request->hasFile('thumbnail_video')) {
                $fotoName = time() . '.' . $request->thumbnail_video->extension();
                $fotoPath = 'thumbnail_video/' . $fotoName;
                $request->thumbnail_video->move(public_path('thumbnail_video'), $fotoName);
            }

            InformasiDesa::create([
                'nama_desa' => $request->nama_desa,
                'hotline_desa' => $request->hotline_desa,
                'email_desa' => $request->email_desa,
                'deskripsi_desa' => $request->deskripsi_desa,
                'thumbnail_video' => $fotoPath,
                'link_video' => $request->link_video,
            ]);

            return redirect('/admin/informasi-desa')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/informasi-desa')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InformasiDesa $informasiDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $informasiDesa = InformasiDesa::findOrFail($id);

        return view('admin.informasi-desa.edit', compact('informasiDesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_desa' => 'required|string|max:255',
                'hotline_desa' => 'required|string',
                'email_desa' => 'required|email|unique:users,email',
                'deskripsi_desa' => 'required',
                'thumbnail_video' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'link_video' => 'nullable|string',
            ]);

            $informasiDesa = InformasiDesa::findOrFail($id);

            $informasiDesa->nama_desa = $request->nama_desa;
            $informasiDesa->hotline_desa = $request->hotline_desa;
            $informasiDesa->email_desa = $request->email_desa;
            $informasiDesa->deskripsi_desa = $request->deskripsi_desa;
            $informasiDesa->link_video = $request->link_video;

            // jika ada file foto baru maka upload foto
            if ($request->hasFile('thumbnail_video')) {
                //hapus foto lama jika ada
                if (file_exists(public_path($informasiDesa->thumbnail_video))) {
                    unlink(public_path($informasiDesa->thumbnail_video));
                };

                // Upload foto baru
                $fotoName = time() . '.' . $request->thumbnail_video->extension();
                $fotoPath = 'thumbnail_video/' . $fotoName;
                $request->thumbnail_video->move(public_path('thumbnail_video'), $fotoName);

                // Update path foto
                $informasiDesa->thumbnail_video = $fotoPath;
            }

            $informasiDesa->save();

            return redirect('/admin/informasi-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/informasi-desa/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $informasiDesa = InformasiDesa::findOrFail($id);
        $informasiDesa->delete();

        return redirect('/admin/informasi-desa')->with('sukses', 'Data berhasil dihapus');
    }
}
