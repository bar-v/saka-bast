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
            //$table->timestamps();
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

