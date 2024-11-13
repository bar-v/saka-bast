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
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_arsip')->nullable();
            $table->string('kode_pelaksana')->nullable();
            $table->string('kode_klasifikasi')->nullable();
            $table->string('kode_satker')->nullable();
            $table->string('nama_unit_pengolah')->nullable();
            $table->string('uraian_informasi_arsip')->nullable();
            $table->string('tahun_awal')->nullable();
            $table->string('tahun_akhir')->nullable();
            $table->string('tingkat_perkembangan')->nullable();
            $table->string('media_simpan')->nullable();
            $table->string('jumlah_berkas')->nullable();
            $table->string('kondisi_fisik')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('ruang')->nullable();
            $table->integer('lemari')->nullable();
            $table->integer('boks')->nullable();
            $table->string('jenis_arsip')->nullable();
            $table->string('alih_media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
