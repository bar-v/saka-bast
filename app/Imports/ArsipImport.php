<?php

namespace App\Imports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Collection;

class ArsipImport implements ToCollection, WithStartRow, WithValidation, SkipsEmptyRows
{
    /**
     * Handle data dari Excel sebagai koleksi.
     *
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        $dataBatch = [];
        $batchSize = 1000; // Ukuran batch

        foreach ($rows as $row) {
            $dataBatch[] = [
                'nomor_arsip'            => is_numeric($row[0]) ? (int)$row[0] : null,
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
                'boks'                   => trim($row[16] ?? ''),
                'jenis_arsip'            => trim($row[17] ?? ''),
                'alih_media'             => trim($row[18] ?? ''),
            ];

            // Jika mencapai ukuran batch, proses batch
            if (count($dataBatch) >= $batchSize) {
                $this->upsertBatch($dataBatch);
                $dataBatch = []; // Reset batch setelah eksekusi
            }
        }

        // Proses sisa data batch yang belum diproses
        if (!empty($dataBatch)) {
            $this->upsertBatch($dataBatch);
        }
    }

    /**
     * Fungsi untuk melakukan upsert pada batch data.
     *
     * @param array $dataBatch
     * @return void
     */
    private function upsertBatch(array $dataBatch)
    {
        Arsip::upsert(
            $dataBatch,
            ['nomor_arsip'], // Kolom unik untuk mendeteksi duplikat
            [
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
                'alih_media',
            ]
        );
    }

    /**
     * Baris awal data (melewati header).
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Lewati header Excel
    }


    /**
     * Aturan validasi untuk setiap kolom.
     *
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
     * Pesan kustom untuk validasi (opsional).
     *
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
