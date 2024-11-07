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
        // dd($row);
        // Mapping kolom Excel ke kolom di database melalui model Arsip
        return new Arsip([

            'nomor_arsip' => $row[0],
            'kode_pelaksana' => $row[1]
        ]);
    }
}
