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
        $arsips = Arsip::all();
        return view('Manajemen', compact('arsips'));
    }

    public function importExcelData(Request $request)
    {

        //Validasi file xlsx, xls dan csv
        $request->validate([
            'import_file' => 'required|mimes:xlsx, xls, csv',
            'file'

        ]);

        // Proses import file dengan Laravel Excel
        Excel::import(new ArsipImport, $request->file('import_file'));

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('status', 'Data Imported Successfully.');
    }

    // public function 
}
