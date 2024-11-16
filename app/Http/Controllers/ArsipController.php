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
        return view('Manajemen', compact('arsip'));
    }

    public function importArsipExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataArsip', $namaFile);
        Excel::import(new ArsipImport, public_path('/DataArsip/' . $namaFile));
        return redirect('/Manajemen');
    }

    public function create()
    {
        return view('create-Manajemen');
    }

    public function store(Request $request)
    {
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

        return redirect('Manajemen')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('edit-Manajemen', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->update($request->all());

        return redirect('Manajemen')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->delete();
        
        return redirect('Manajemen')->with('success', 'Data berhasil dihapus');
    }
}