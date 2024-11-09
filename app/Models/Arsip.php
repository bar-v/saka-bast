<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = "arsip";
    // protected $primaryKey = "id";
    protected $fillable = [
        'nomor_arsip',
        'kode_pelaksana'

    ]; // Tambahkan nama kolom lain yang diizinkan sesuai database
}
