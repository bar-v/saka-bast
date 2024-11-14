<?php

namespace App\Http\Controllers;

use create;
use App\Models\Arsip;
use App\Imports\ArsipImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::all();
        // dd($arsip);
        return view('Manajemen', compact('arsip'));
    }

    public function importArsipExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataArsip', $namaFile);
        //Validasi file xlsx, xls dan csv
        Excel::import(new ArsipImport, public_path('/DataArsip/' . $namaFile));
        return redirect('/Manajemen');
        // Redirect kembali dengan pesan sukses


        // Proses import file dengan Laravel Excel
        // Excel::import(new ArsipImport, $request->file('import_file'));
        // $request->validate([
        //     'import_file' => 'required|mimes:xlsx, xls, csv',
        //     'file'
        // ]);
    }

    public function create()
    {
        return view('create-Manajemen');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        Arsip::create([
        'nomor_arsip' => $request->nomor_arsip,
        'kode_pelaksana' => $request->kode_pelaksana,
        'kode_klasifikasi' => $request->kode_klasifikasi,
        'kode_satker' => $request->kode_satker,
        'nama_unit_pengolah' => $request->nama_unit_pengolah,
        'uraian_informasi_arsip' => $request->uraian_informasi_arsip,
        'tahun_awal' => $request->tahun_awal,
        'tahun_akhir' => $request->tahun_akhir, 
        'tingkat_perkembangan' => $request->tingkat_perkembangan,
        'media_simpan' => $request->media_simpan,
        'jumlah_berkas' => $request->jumlah_berkas,
        'kondisi_fisik' => $request->kondisi_fisik,
        'ukuran' => $request->ukuran,
        'keterangan' => $request->keterangan,
        'ruang' => $request->ruang,
        'lemari' => $request->lemari,
        'boks' => $request->boks,
        'jenis_arsip' => $request->jenis_arsip,
        'alih_media' => $request->alih_media
        ]);

        return redirect('Manajemen');
    }
    // public function

}
