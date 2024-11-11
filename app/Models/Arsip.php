<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = "arsip";
    protected $primaryKey = "id";
    protected $fillable = [
        'nomor_arsip', 'kode_pelaksana', 'kode_klasifikasi', 'kode_satker', 'nama_unit_pengolah',
    ];
}
