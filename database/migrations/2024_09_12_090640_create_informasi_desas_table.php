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
        Schema::create('informasi_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('hotline_desa');
            $table->string('email_desa')->unique();
            $table->text('deskripsi_desa');
            $table->string('thumbnail_video')->nullable();
            $table->string('link_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_desas');
    }
};
