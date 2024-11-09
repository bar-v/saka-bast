<?php

namespace App\Http\Controllers;

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

    // public function 
}
