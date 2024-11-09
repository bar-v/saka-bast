<?php

namespace App\Imports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ArsipImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        $cleanValue = function ($value) {
            return $value === '-' ? '' : $value;
        };

        // dd($row);
        // Mapping kolom Excel ke kolom di database melalui model Arsip
        return new Arsip([
            'nomor_arsip' => $cleanValue($row[0]),
            'kode_pelaksana' => $cleanValue($row[1]),
            'kode_klasifikasi' => $cleanValue($row[2]),
            'kode_satker' => $cleanValue($row[3]),
            'nama_unit_pengolah' => $cleanValue($row[4]),
            'uraian_informasi_arsip' => $cleanValue($row[5]),
            'tahun_awal' => $cleanValue($row[6]),
            'tahun_akhir' => $cleanValue($row[7]),
            'tingkat_perkembangan' => $cleanValue($row[8]),
            'media_simpan' => $cleanValue($row[9]),
            'jumlah_berkas' => $cleanValue($row[10]),
            'kondisi_fisik' => $cleanValue($row[11]),
            'ukuran' => $cleanValue($row[12]),
            'keterangan' => $cleanValue($row[13]),
            'ruang' => $cleanValue($row[14]),
            'lemari' => $cleanValue($row[15]),
            'boks' => $cleanValue($row[16]),
            'jenis_arsip' => $cleanValue($row[17]),
            'alih_media' => $cleanValue($row[18]),
        ]);
    }
}
