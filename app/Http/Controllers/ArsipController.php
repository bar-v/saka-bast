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

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            // Debug: Load the Excel file and dump the first few rows
            $array = Excel::toArray(new ArsipImport, $request->file('file'));
            // \Log::info('Excel data:', ['first_rows' => array_slice($array[0], 0, 3)]);

            Excel::import(new ArsipImport, $request->file('file'));

            return redirect()->back()->with('success', 'Data arsip berhasil diimport!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = collect($failures)->map(function ($failure) {
                return "Baris {$failure->row()}: {$failure->errors()[0]}";
            })->join('<br>');

            return redirect()->back()
                ->with('error', "Gagal import data:<br>{$errors}")
                ->with('debug_data', $array[0] ?? []); // Pass the data to the view for debugging
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
