<?php

namespace App\Imports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class ArsipImport extends DefaultValueBinder implements ToModel, WithHeadingRow, WithCustomValueBinder
{
    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        // dd($row);

        // $cleanValue = function ($value) {
        //     return $value === '-' ? null : $value;
        // };

        return new Arsip([

            'nomor_arsip' => ($row['nomor_arsip']),
            'kode_pelaksana' => ($row['kode_pelaksana']),
            'kode_klasifikasi' => ($row['kode_klasifikasi']),
            'kode_satker' => ($row['kode_satker']),
            'nama_unit_pengolah' => ($row['nama_unit_pengolah']),
            'uraian_informasi_arsip' => ($row['uraian_informasi_arsip']),
            'tahun_awal' => ($row['tahun_awal']),
            'tahun_akhir' => ($row['tahun_akhir'] === '-' ? null : $row['tahun_akhir']),
            'tingkat_perkembangan' => ($row['tingkat_perkembangan']),
            'media_simpan' => ($row['media_simpan']),
            'jumlah_berkas' => ($row['jumlah_berkas']),
            'kondisi_fisik' => ($row['kondisi_fisik']),
            'ukuran' => ($row['ukuran']),
            'keterangan' => ($row['keterangan']),
            'ruang' => ($row['ruang']),
            'lemari' => ($row['lemari']),
            'boks' => ($row['boks']),
            'jenis_arsip' => ($row['jenis_arsip']),
            'alih_media' => ($row['alih_media']),
        ]);
    }
}
