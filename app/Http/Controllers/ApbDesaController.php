<?php

namespace App\Http\Controllers;

use App\Models\ApbDesa;
use App\Models\ApbKonten;
use App\Models\InformasiDesa;
use App\Models\Pelayanan;
use App\Models\Ppid;
use App\Models\ProdukHukum;
use App\Models\ProfilDesa;
use App\Models\RkpDes;
use App\Models\RpjmDes;
use App\Models\WaktuLayanan;
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
                'jenis' => 'required|in:Pelaksanaan,Pendapatan,Pembelanjaan',
                'nama' => 'required|in:Pendapatan Desa,Belanja Desa,Pembiayaan Desa,Hasil Usaha Desa,Hasil Aset Desa,Lain-lain Pendapatan Asli Desa,Dana Desa,Bagi Hasil Pajak Dan Retribusi,Alokasi Dana Desa,Bantuan Keuangan Provinsi,Bantuan Keuangan Kabupaten/Kota,Bunga Bank,Bidang Penyelenggaraan Pemerintah Desa,Bidang Pelaksanaan Pembangunan Desa,Bidang Pembinaan Kemasyarakatan Desa,Bidang Penanggulangan Bencana Darurat Dan Mendesak Desa',
                'nominal' => 'required|numeric|min:0',
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
    public function show()
    {
        $apbDesa = ApbDesa::all();
        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();
        
        $dropdownProfil = ProfilDesa::all();
        $dropdownPpid = Ppid::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();

        return view('user.konten.apb-desa', compact('informasiDesa','waktuLayanan','dropdownProfil','dropdownPelayanan','dropdownPpid', 'apbDesa', 'dropdownApbKonten', 'dropdownRpjmDes', 'dropdownRkpDes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apbDesa = ApbDesa::findOrFail($id);

        $jenis = ['Pelaksanaan', 'Pendapatan', 'Pembelanjaan'];
        $apbByJenis = [
            'Pelaksanaan' => ['Pendapatan Desa', 'Belanja Desa', 'Pembiayaan Desa'],
            'Pendapatan' => ['Hasil Usaha Desa', 'Hasil Aset Desa', 'Lain-lain Pendapatan Asli Desa', 'Dana Desa', 'Bagi Hasil Pajak Dan Retribusi', 'Alokasi Dana Desa', 'Bantuan Keuangan Provinsi', 'Bantuan Keuangan Kabupaten/Kota', 'Bunga Bank'],
            'Pembelanjaan' => ['Bidang Penyelenggaraan Pemerintah Desa', 'Bidang Pelaksanaan Pembangunan Desa', 'Bidang Pembinaan Kemasyarakatan Desa', 'Bidang Penanggulangan Bencana Darurat Dan Mendesak Desa'],
        ];

        return view('admin.konten.apb-desa.edit', compact('apbDesa', 'jenis', 'apbByJenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'jenis' => 'required|in:Pelaksanaan,Pendapatan,Pembelanjaan',
                'nama' => 'required|in:Pendapatan Desa,Belanja Desa,Pembiayaan Desa,Hasil Usaha Desa,Hasil Aset Desa,Lain-lain Pendapatan Asli Desa,Dana Desa,Bagi Hasil Pajak Dan Retribusi,Alokasi Dana Desa,Bantuan Keuangan Provinsi,Bantuan Keuangan Kabupaten/Kota,Bunga Bank,Bidang Penyelenggaraan Pemerintah Desa,Bidang Pelaksanaan Pembangunan Desa,Bidang Pembinaan Kemasyarakatan Desa,Bidang Penanggulangan Bencana Darurat Dan Mendesak Desa',
                'nominal' => 'required|numeric|min:0',
            ]);

            $apbDesa = ApbDesa::findOrFail($id);

            $apbDesa->update($request->all());

            return redirect('/admin/apb-desa')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/apb-desa/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
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

    public function getNamaApb($jenis) {

        // daftar data apb
        $apbByJenis = [
            'Pelaksanaan' => ['Pendapatan Desa', 'Belanja Desa', 'Pembiayaan Desa'],
            'Pendapatan' => ['Hasil Usaha Desa', 'Hasil Aset Desa', 'Lain-lain Pendapatan Asli Desa', 'Dana Desa', 'Bagi Hasil Pajak Dan Retribusi', 'Alokasi Dana Desa', 'Bantuan Keuangan Provinsi', 'Bantuan Keuangan Kabupaten/Kota', 'Bunga Bank'],
            'Pembelanjaan' => ['Bidang Penyelenggaraan Pemerintah Desa', 'Bidang Pelaksanaan Pembangunan Desa', 'Bidang Pembinaan Kemasyarakatan Desa', 'Bidang Penanggulangan Bencana Darurat Dan Mendesak Desa'],
        ];

        // memastikan jenis apb kedalam array
        if(array_key_exists($jenis, $apbByJenis)) {
            return response()->json($apbByJenis[$jenis]);
        } else {
            return response()->json([]);
        }
    }
}
