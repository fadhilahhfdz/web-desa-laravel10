<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentar = Komentar::latest()->paginate(10);

        return view('admin.berita.komentar.index', compact('komentar'));
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
    public function store(Request $request, $id_berita)
    {
        // try {
            $request->validate([
                'id_berita' => 'required',
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'email' => 'required|string|max:100',
                'komentar' => 'required'
            ]);

            $berita = Berita::findOrFail($id_berita);

            $berita->komentar()->create([
                'id_berita' => $id_berita,
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'komentar' => $request->input('komentar'),
            ]);

            // return redirect(`/detail-berita/{id}`)->with('sukses', 'Berhasil menambahkan komentar');
            return redirect()->back();
        // } catch (\Exception $e) {
        //     return redirect(`/detail-berita/{id}`)->with('gagal', 'gagal menambahkan komentar' . $e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komentar $komentar)
    {
        //
    }
}
