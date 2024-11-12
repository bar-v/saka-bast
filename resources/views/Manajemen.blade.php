<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Gaya tambahan untuk header */
        .header-bg {
            background-color: #2C2F33;
            /* Warna gelap atau warna lain yang sesuai */
            padding: 20px;
            color: white;
            text-align: center;
        }

        /* Gaya untuk tombol dan tampilan lainnya tetap sama */
        .ibu {
            padding-top: 2%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            margin-left: 20px;
            padding-right: 20px;
        }

        .pencari {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .pencari label {
            color: white;
        }

        .background-box {
            width: 100%;
            max-width: 95%;
            height: 90vh;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: auto;
            margin: 20px auto;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ccc;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<x-app-layout>

    <!-- Baris tombol dan pencarian -->
    <div class="ibu">
        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">File Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('importarsip') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
                            <button type="submit">Import</button>
                        </form>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Import dengan pemanggilan modal -->
        <button type="button" class="btn btn-success tombol1" data-toggle="modal"
            data-target="#importModal">Import</button>

        <!-- Tombol Edit -->
        <button type="button" class="btn btn-primary tombol2">Edit</button>

        <!-- Pencarian berada di ujung kanan dengan teks label putih -->
        <div class="pencari">
            <label for="search" class="mr-2">Search:</label>
            <input type="text" id="search" placeholder="Masukkan yang dicari...">
        </div>
    </div>

    <!-- Kotak putih sebagai latar belakang tabel -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="background-box">
            <table>
                <thead>
                    <tr>
                        <th>NO ARSIP</th>
                        <th>KODE PELAKSANA</th>
                        <th>KODE KLASIFIKASI</th>
                        <th>KODE SATKER</th>
                        <th>NAMA UNIT PENGOLAH</th>
                        <th>URAIAN INFORMASI ARSIP</th>
                        <th>TAHUN AWAL</th>
                        <th>TAHUN AKHIR</th>
                        <th>TINGKAT PERKEMBANGAN ARSIP</th>
                        <th>MEDIA SIMPAN</th>
                        <th>JUMLAH BERKAS</th>
                        <th>KONDISI FISIK</th>
                        <th>UKURAN</th>
                        <th>KETERANGAN</th>
                        <th>RUANG</th>
                        <th>LEMARI</th>
                        <th>BOKS</th>
                        <th>JENIS ARSIP</th>
                        <th>ALIH MEDIA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arsip as $item)
                        <tr>
                            <td>{{ $item->nomor_arsip }}</td>
                            <td>{{ $item->kode_pelaksana }}</td>
                            <td>{{ $item->kode_klasifikasi }}</td>
                            <td>{{ $item->kode_satker }}</td>
                            <td>{{ $item->nama_unit_pengolah }}</td>
                            <td>{{ $item->uraian_informasi_arsip }}</td>
                            <td>{{ $item->tahun_awal }}</td>
                            <td>{{ $item->tahun_akhir }}</td>
                            <td>{{ $item->tingkat_perkembangan }}</td>
                            <td>{{ $item->media_simpan }}</td>
                            <td>{{ $item->jumlah_berkas }}</td>
                            <td>{{ $item->kondisi_fisik }}</td>
                            <td>{{ $item->ukuran }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->ruang }}</td>
                            <td>{{ $item->lemari }}</td>
                            <td>{{ $item->boks }}</td>
                            <td>{{ $item->jenis_arsip }}</td>
                            <td>{{ $item->alih_media }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
