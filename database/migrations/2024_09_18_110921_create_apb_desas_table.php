<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apb_desas', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['Pelaksanaan', 'Pendapatan', 'Pembelanjaan']);
            $table->enum('nama', ['Pendapatan Desa', 'Belanja Desa', 'Pembiayaan Desa', 'Hasil Usaha Desa', 'Hasil Aset Desa', 'Lain-lain Pendapatan Asli Desa', 'Dana Desa', 'Bagi Hasil Pajak Dan Retribusi', 'Alokasi Dana Desa', 'Bantuan Keuangan Provinsi', 'Bantuan Keuangan Kabupaten/Kota', 'Bunga Bank', 'Bidang Penyelenggaraan Pemerintah Desa', 'Bidang Pelaksanaan Pembangunan Desa', 'Bidang Pembinaan Kemasyarakatan Desa', 'Bidang Penanggulangan Bencana Darurat Dan Mendesak Desa']);
            $table->bigInteger('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apb_desas');
    }
};
