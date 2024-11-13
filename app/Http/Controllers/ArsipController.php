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
        return view('Manajemen', compact('arsip'));
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:2048'
            ]);

            $file = $request->file('file');

            // Import data
            Excel::import(new ArsipImport, $file);

            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = [];

            foreach ($failures as $failure) {
                $errors[] = "Baris {$failure->row()}: {$failure->errors()[0]}";
            }

            return back()->with('error', implode("<br>", $errors));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function preview(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:2048'
            ]);

            $file = $request->file('file');
            $data = Excel::toArray([], $file);

            // Pastikan array data tidak kosong
            if (empty($data) || !isset($data[0]) || empty($data[0])) {
                return back()->with('error', 'File kosong atau format tidak sesuai');
            }

            $allData = $data[0];
            $headers = array_shift($allData); // Ambil baris pertama sebagai header
            $content = array_values($allData); // Sisa data

            return view('arsip.preview', [
                'headers' => $headers,
                'data' => $content
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal preview file: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        $filepath = public_path('templates/arsip_template.xlsx');

        if (!file_exists($filepath)) {
            return back()->with('error', 'Template file tidak ditemukan');
        }

        return response()->download($filepath);
    }
}
