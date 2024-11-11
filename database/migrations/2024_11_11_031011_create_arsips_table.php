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
            $table->integer('nomor_arsip'); // Nomor Arsip
            $table->string('kode_pelaksana', 100); // Kode Pelaksana
            $table->string('kode_klasifikasi');
            $table->string('kode_satker');
            $table->string('nama_unit_pengolah');
<<<<<<< HEAD:database/migrations/2024_11_11_031011_create_arsips_table.php
            //$table->timestamps();
=======
            $table->text('uraian_informasi_arsip');
            $table->year('tahun_awal');
            $table->year('tahun_akhir')->nullable();
            $table->string('tingkat_perkembangan');
            $table->string('media_simpan');
            $table->string('jumlah_berkas');
            $table->string('kondisi_fisik');
            $table->string('ukuran');
            $table->string('keterangan')->nullable();
            $table->string('ruang');
            $table->integer('lemari');
            $table->integer('boks');
            $table->string('jenis_arsip');
            $table->string('alih_media');
            $table->timestamps();
>>>>>>> 27db2db4010fafb58faa328503361cc95c70080a:database/migrations/2024_11_05_125830_create_arsip_table.php
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

