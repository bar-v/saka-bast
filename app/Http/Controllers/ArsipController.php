<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Imports\ArsipImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function getData(Request $request)
    {
        $query = Arsip::query();

        // Filter pencarian
        if ($request->has('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->where('nomor_arsip', 'like', "%$search%")
                ->orWhere('nama_unit_pengolah', 'like', "%$search%")
                ->orWhere('uraian_informasi_arsip', 'like', "%$search%");
        }

        // // Kembalikan data dalam format DataTables
        // return datatables($query)
        //     ->addColumn('aksi', function ($item) {
        //         return view('partials.aksi', compact('item'))->render();
        //     })
        //     ->make(true);
    }

    public function index(Request $request)
    {
        // Ambil jumlah baris per halaman dari request atau gunakan nilai default
        $perPage = $request->input('per_page', 10); // Default 10 jika tidak ada yang dipilih

        $arsip = DB::table('arsip')
            ->when($request->has('search'), function ($query) use ($request) {
                return $query->where('kode_pelaksana', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('uraian_informasi_arsip', 'LIKE', '%' . $request->search . '%');
                // Tambahkan kolom pencarian lainnya sesuai kebutuhan
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString(); // Ini akan mempertahankan parameter URL saat pindah halaman


        // Ambil parameter pencarian dari request
        $search = $request->get('search');

        // Query data dengan filter pencarian dan pagination
        $arsip = Arsip::when($search, function ($query, $search) {
            $query->where('nomor_arsip', 'like', "%$search%")
                ->orWhere('nama_unit_pengolah', 'like', "%$search%")
                ->orWhere('uraian_informasi_arsip', 'like', "%$search%");
        })->paginate($perPage);

        // Kirim data ke view
        return view('Manajemen', compact('arsip', 'perPage', 'search'));
    }

    // Validasi dan Import
    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv'
            ]);

            $file = $request->file('file');

            // Import data dengan validasi untuk mencegah duplikasi
            Excel::import(new ArsipImport, $file);

            return back()->with('success', 'Data berhasil diimport dan diperbarui!');
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


    // Menampilkan Data dengan Array
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
    // Controller Download Template
    public function downloadTemplate()
    {
        $filepath = public_path('templates/arsip_template.xlsx');

        if (!file_exists($filepath)) {
            return back()->with('error', 'Template file tidak ditemukan');
        }

        return response()->download($filepath);
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataArsip', $namaFile);
        Excel::import(new ArsipImport, public_path('/DataArsip/' . $namaFile));
        return redirect('/Manajemen');
    }

    // Sistem CRUD - Create Record baru melalui view create-Manajemen
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
