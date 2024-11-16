<?php

namespace App\Imports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Facades\DB;

class ArsipImport implements ToModel, WithStartRow, WithValidation, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Validasi jika record sudah ada berdasarkan field unik
        $existingRecord = DB::table('arsip')
            ->where('nomor_arsip', $row['nomor_arsip'])
            ->where('kode_pelaksana', $row['kode_pelaksana'])
            ->where('kode_klasifikasi', $row['kode_klasifikasi'])
            ->where('kode_satker', $row['kode_satker'])
            ->where('nama_unit_pengolah', $row['nama_unit_pengolah'])
            ->where('uraian_informasi_arsip', $row['uraian_informasi_arsip'])
            ->where('tahun_awal', $row['tahun_awal'])
            ->where('tahun_akhir', $row['tahun_akhir'])
            ->where('tingkat_pengembangan', $row['tingkat_pengembangan'])
            ->where('media_simpan', $row['media_simpan'])
            ->where('jumlah_berkas', $row['jumlah_berkas'])
            ->where('kondisi_fisik', $row['kondisi_fisik'])
            ->where('ukuran', $row['ukuran'])
            ->where('keterangan', $row['keterangan'])
            ->where('ruang', $row['ruang'])
            ->where('lemari', $row['lemari'])
            ->where('boks', $row['boks'])
            ->where('jenis_arsip', $row['jenis_arsip'])
            ->where('alih_media', $row['alih_media'])
            ->first();


        if (!$existingRecord) {
            // Insert record baru jika belum ada
            return new Arsip([
                'nomor_arsip'            => trim($row[0] ?? ''),
                'kode_pelaksana'         => trim($row[1] ?? ''),
                'kode_klasifikasi'       => trim($row[2] ?? ''),
                'kode_satker'            => trim($row[3] ?? ''),
                'nama_unit_pengolah'     => trim($row[4] ?? ''),
                'uraian_informasi_arsip' => trim($row[5] ?? ''),
                'tahun_awal'             => !empty($row[6]) ? trim($row[6]) : null,
                'tahun_akhir'            => !empty($row[7]) ? trim($row[7]) : null,
                'tingkat_perkembangan'   => trim($row[8] ?? ''),
                'media_simpan'           => trim($row[9] ?? ''),
                'jumlah_berkas'          => trim($row[10] ?? ''),
                'kondisi_fisik'          => trim($row[11] ?? ''),
                'ukuran'                 => trim($row[12] ?? ''),
                'keterangan'             => trim($row[13] ?? ''),
                'ruang'                  => trim($row[14] ?? ''),
                'lemari'                 => trim($row[15] ?? ''),
                'boks'                   => trim($row[16] ?? ''),
                'jenis_arsip'            => trim($row[17] ?? ''),
                'alih_media'             => trim($row[18] ?? ''),

            ]);
        }

        return null;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '0' => ['nullable', 'integer'],
            '1' => ['nullable', 'string'],
            '2' => ['nullable', 'string'],
            '3' => ['nullable', 'string'],
            '4' => ['nullable', 'string'],
            '5' => ['nullable', 'string '],
            '6' => ['nullable', 'numeric', 'digits:4'],
            '7' => ['nullable', 'numeric', 'digits:4'],
            '8' => ['nullable', 'string'],
            '9' => ['nullable', 'string'],
            '10' => ['nullable', 'string'],
            '11' => ['nullable', 'string'],
            '12' => ['nullable', 'string'],
            '13' => ['nullable', 'string'],
            '14' => ['nullable', 'string'],
            '15' => ['nullable', 'integer'],
            '16' => ['nullable', 'integer'],
            '17' => ['nullable', 'string'],
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            '0.required' => 'Kolom Nomor Arsip pada baris :row wajib diisi',
            '1.required' => 'Kolom Kode Pelaksana pada baris :row wajib diisi',
            '2.required' => 'Kolom Kode Klasifikasi pada baris :row wajib diisi',
            '3.required' => 'Kolom Kode Satker pada baris :row wajib diisi',
            '4.required' => 'Kolom Nama Unit Pengolah pada baris :row wajib diisi',
            '5.required' => 'Kolom Uraian Informasi Arsip pada baris :row wajib diisi',
            '6.numeric' => 'Kolom Tahun Awal pada baris :row harus berupa angka',
            '6.digits' => 'Kolom Tahun Awal pada baris :row harus 4 digit',
            '7.numeric' => 'Kolom Tahun Akhir pada baris :row harus berupa angka',
            '7.digits' => 'Kolom Tahun Akhir pada baris :row harus 4 digit'
        ];
    }
}
