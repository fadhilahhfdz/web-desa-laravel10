<?php

namespace App\Http\Controllers;

use App\Models\InformasiPpid;
use Illuminate\Http\Request;

class InformasiPpidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasiPpid = InformasiPpid::all();

        return view('admin.konten.ppid.informasi-ppid.index', compact('informasiPpid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konten.ppid.informasi-ppid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'daftar_informasi' => 'required|in:Informasi Berkala,Informasi Setiap Saat,Informasi Serta Merta,Informasi Dikecualikan',
                'konten' => 'required',
            ]);

            InformasiPpid::create($request->all());

            return redirect('/admin/ppid/informasi-ppid')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/ppid/informasi-ppid/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InformasiPpid $informasiPpid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $informasiPpid = informasiPpid::findOrFail($id);

        return view('admin.konten.ppid.informasi-ppid.edit', compact('informasiPpid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'daftar_informasi' => 'required|in:Informasi Berkala,Informasi Setiap Saat,Informasi Serta Merta,Informasi Dikecualikan',
                'konten' => 'required',
            ]);

            $informasiPpid = InformasiPpid::findOrFail($id);

            $informasiPpid->update($request->all());

            return redirect('/admin/ppid/informasi-ppid')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/ppid/informasi-ppid/edit/{$id}")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $informasiPpid = InformasiPpid::findOrFail($id);
        $informasiPpid->delete();

        return redirect('/admin/ppid/informasi-ppid')->with('sukses', 'Data berhasil dihapus');
    }
}
