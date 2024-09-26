<?php

namespace App\Http\Controllers;

use App\Models\GenreBuku;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Perpustakaan;
use App\Models\Ppid;
use App\Models\ProfilDesa;
use App\Models\WaktuLayanan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpustakaan = Perpustakaan::latest()->paginate(5);

        return view('admin.konten.perpustakaan.buku.index', compact('perpustakaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genreBuku = GenreBuku::all();

        return view('admin.konten.perpustakaan.buku.create', compact('genreBuku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'id_genre' => 'required',
                'status' => 'required|in:Tersedia,Tidak Tersedia',
                'konten' => 'required'
            ]);

            $namaCover = time() . '.' . $request->cover->extension();
            $pathCover = 'cover_buku/' . $namaCover;
            $request->cover->move(public_path('cover_buku'), $namaCover);

            Perpustakaan::create([
                'judul' => $request->judul,
                'publisher' => $request->publisher,
                'cover' => $pathCover,
                'id_genre' => $request->id_genre,
                'status' => $request->status,
                'konten' => $request->konten,
            ]);

            return redirect('/admin/perpustakaan/buku')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/perpustakaan/buku/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        $genreBuku = GenreBuku::all();

        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();

        return view('user.konten.perpustakaan.buku_detail', compact('perpustakaan', 'genreBuku', 'informasiDesa', 'waktuLayanan', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        $genreBuku = GenreBuku::all();

        return view('admin.konten.perpustakaan.buku.edit', compact('perpustakaan', 'genreBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|in:Tersedia,Tidak Tersedia',
                'konten' => 'required'
            ]);

            $perpustakaan = Perpustakaan::findOrFail($id);

            $perpustakaan->judul = $request->judul;
            $perpustakaan->publisher = $request->publisher;
            $perpustakaan->status = $request->status;
            $perpustakaan->konten = $request->konten;

            if ($request->hasFile('cover')) {
                if(file_exists(public_path($perpustakaan->cover))) {
                    unlink(public_path($perpustakaan->cover));
                };

                $namaCover = time() . '.' . $request->cover->extension();
                $pathCover = 'cover_buku/' . $namaCover;
                $request->cover->move(public_path('cover_buku'), $namaCover);
            
                $perpustakaan->cover = $pathCover;
            }

            $perpustakaan->save();

            return redirect('/admin/perpustakaan/buku')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect("/admin/perpustakaan/buku/edit/$id")->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->delete();

        return redirect('/admin/perpustakaan/buku')->with('sukses', 'Data berhasil dihapus');
    }

    public function buku_all() {
        $genreBuku = GenreBuku::all();
        $perpustakaan = Perpustakaan::latest()->paginate(6);

        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();

        return view('user.konten.perpustakaan.buku_all', compact('genreBuku', 'perpustakaan', 'informasiDesa', 'waktuLayanan', 'dropdownProfil', 'dropdownPelayanan', 'dropdownPpid'));
    }

    public function buku_by_genre() {

    }
}
