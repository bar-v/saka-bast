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
            $table->string('kode_pelaksana', 20)->nullable();
            $table->string('kode_klasifikasi', 20)->nullable();
            $table->string('kode_satker', 10)->nullable();
            $table->string('nama_unit_pengolah', 80)->nullable();
            $table->text('uraian_informasi_arsip')->nullable();
            $table->year('tahun_awal')->nullable();
            $table->year('tahun_akhir')->nullable();
            $table->string('tingkat_perkembangan', 20)->nullable();
            $table->string('media_simpan', 20)->nullable();
            $table->string('jumlah_berkas', 20)->nullable();
            $table->string('kondisi_fisik', 20)->nullable();
            $table->string('ukuran', 20)->nullable();
            $table->string('keterangan', 20)->nullable();
            $table->string('ruang', 20)->nullable();
            $table->integer('lemari')->nullable();
            $table->string('boks', 10)->nullable();
            $table->string('jenis_arsip', 26)->nullable();
            $table->string('alih_media', 20)->nullable();
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
