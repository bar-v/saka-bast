<?php

namespace App\Imports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ArsipImport implements ToModel, WithStartRow, WithValidation, SkipsEmptyRows
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $existing = Arsip::where('nomor_arsip', $row[0])->first();

        // Jika data sudah ada, cek apakah ada perubahan
        if ($existing) {
            $hasChanges = false;

            // Array data yang akan diupdate
            $newData = [
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
                'lemari'                 => is_numeric($row[15]) ? (int)$row[15] : null,
                'boks'                   => is_numeric($row[16]) ? (int)$row[16] : null,
                'jenis_arsip'            => trim($row[17] ?? ''),
                'alih_media'             => trim($row[18] ?? ''),
            ];

            // Cek setiap kolom apakah ada perubahan
            foreach ($newData as $key => $value) {
                if ($existing->$key != $value) {
                    $hasChanges = true;
                    break;
                }
            }

            // Hanya update jika ada perubahan
            if ($hasChanges) {
                return Arsip::updateOrCreate(
                    ['nomor_arsip' => $row[0]],
                    $newData
                );
            }

            return null; // Skip jika tidak ada perubahan

        }
        // Jika data belum ada, buat baru
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
    /**
     * Baris awal data (melewati header)
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * Aturan validasi untuk setiap kolom
     * @return array
     */
    public function rules(): array
    {
        return [
            '0' => ['nullable', 'integer'], // nomor_arsip
            '1' => ['nullable', 'string'], // kode_pelaksana
            '2' => ['nullable', 'string'], // kode_klasifikasi
            '6' => ['nullable', 'digits:4'], // tahun_awal
            '7' => ['nullable', 'digits:4'], // tahun_akhir
            '15' => ['nullable', 'integer'], // lemari
            '16' => ['nullable'], // boks
        ];
    }

    /**
     * Pesan kustom untuk validasi (opsional)
     * @return array
     */
    public function customValidationMessages(): array
    {
        return [
            '6.digits' => 'Kolom Tahun Awal harus berisi 4 digit pada baris :row.',
            '7.digits' => 'Kolom Tahun Akhir harus berisi 4 digit pada baris :row.',
            '15.integer' => 'Kolom Lemari harus berupa angka pada baris :row.',
            '16.integer' => 'Kolom Boks harus berupa angka pada baris :row.',
        ];
    }
}
