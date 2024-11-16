<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    public $timestamp = false;

    use HasFactory;

    protected $table = "arsip";
    protected $primaryKey = "id";
    protected $fillable = [
        'nomor_arsip',
        'kode_pelaksana',
        'kode_klasifikasi',
        'kode_satker',
        'nama_unit_pengolah',
        'uraian_informasi_arsip',
        'tahun_awal',
        'tahun_akhir',
        'tingkat_perkembangan',
        'media_simpan',
        'jumlah_berkas',
        'kondisi_fisik',
        'ukuran',
        'keterangan',
        'ruang',
        'lemari',
        'boks',
        'jenis_arsip',
        'alih_media'
    ];

    // Mutator - sebelum disimpan ke database
    public function setTahunAkhirAttribute($value)
    {
        $this->attributes['tahun_akhir'] = ($value === '-' || empty($value)) ? null : $value;
    }

    // Accessor - ketika mengambil data
    public function getTahunAkhirAttribute($value)
    {
        return $value ?? '-';
    }
}

