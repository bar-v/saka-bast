<?php

namespace App\Imports;

use App\Models\Arsip;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ArsipImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * Tentukan aturan validasi.
     */
    public function rules(): array
    {
        return [
            'nomor_arsip' => 'required',
            'kode_pelaksana' => 'required',
            'kode_klasifikasi' => 'required',
            'nama_unit_pengolah' => 'required',
            'uraian_informasi_arsip' => 'required',
            'tahun_awal' => 'required|integer',
            'tingkat_perkembangan' => 'required',
            'media_simpan' => 'required',
            'jumlah_berkas' => 'required|integer',
            'kondisi_fisik' => 'required',
            'ukuran' => 'required',
            'keterangan' => 'required',
            'ruang' => 'required',
            'lemari' => 'required',
            'boks' => 'required',
            'jenis_arsip' => 'required',
            'alih_media' => 'required',
        ];
    }

    /**
     * Simpan data ke dalam model Arsip.
     */
    public function model(array $row)
    {
        return new Arsip([
            'nomor_arsip' => $row['nomor_arsip'],
            'kode_pelaksana' => $row['kode_pelaksana'],
            'kode_klasifikasi' => $row['kode_klasifikasi'],
            'nama_unit_pengolah' => $row['nama_unit_pengolah'],
            'uraian_informasi_arsip' => $row['uraian_informasi_arsip'],
            'tahun_awal' => $row['tahun_awal'],
            'tahun_akhir' => $row['tahun_akhir'] ?? null,
            'tingkat_perkembangan' => $row['tingkat_perkembangan'],
            'media_simpan' => $row['media_simpan'],
            'jumlah_berkas' => $row['jumlah_berkas'],
            'kondisi_fisik' => $row['kondisi_fisik'],
            'ukuran' => $row['ukuran'],
            'keterangan' => $row['keterangan'],
            'ruang' => $row['ruang'],
            'lemari' => $row['lemari'],
            'boks' => $row['boks'],
            'jenis_arsip' => $row['jenis_arsip'],
            'alih_media' => $row['alih_media'],
        ]);
    }
}
