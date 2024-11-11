<!DOCTYPE html>
<html lang="en">
<style>
    body{
        background-color: white;
    }
</style>
<x-app-layout>
    <style>
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

        .tombol1,
        .tombol2 {
            flex-basis: 130px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
            color: white;
        }

        .tombol1 {
            position: relative;
            padding: 10px 22px;
            background-color: #1ed363;
            border-radius: 6px;
            color: white;
            border: none;
            font-size: 18;
            font-weight: 400;
            box-shadow: 0px 5px 10px rgb(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .tombol1:active {
            transform: scale(0.96);
        }

        .tombol1::before,
        .tombol1::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            height: 100%;
            width: 150%;
        }

        .tombol2 {
            position: relative;
            padding: 10px 22px;
            background-color: #008cff;
            border-radius: 6px;
            color: white;
            border: none;
            font-size: 18;
            font-weight: 400;
            box-shadow: 0px 5px 10px rgb(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .tombol2:active {
            transform: scale(0.96);
        }

        .tombol2::before,
        .tombol2::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            height: 100%;
            width: 150%;
        }

        button:hover {
            background-color: darkgray;
            border-radius: 10px;
            padding: 6px;
            color: black;
        }

        input[type=text] {
            border-radius: 5px;
            padding: 5px;
            width: 200px;
        }

        /* Kotak putih sebagai latar belakang */
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
            /* Centering the box horizontally */
            z-index: 10;
            /* Ensure it appears above other content */
            position: relative;
        }

        /* Gaya tabel */
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

    <!-- Baris tombol dan pencarian -->
    <div class="ibu">

        <div class="tombol1">
            <button type="submit">Import</button>

        </div>
        <div class="tombol2">
            <button type="button">Edit</button>
        </div>
        <!-- Pencarian berada di ujung kanan dengan teks label putih -->
        <div class="pencari">
            <label for="search" class="mr-2">Search:</label>
            <input type="text" id="search" placeholder="Masukkan yang dicari...">
        </div>

        <div class="input-group">

            <form action="{{ route('importarsip') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="file" required="required">
                <div class="">
                    <button type="submit">Import</button>
                </div>
            </form>
        </div>

    </div>

    <!-- Kotak putih sebagai latar belakang tabel -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="background-box">
            <!-- Tabel -->
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
                            {{-- <td>{{ $item->id }}</td> --}}
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
                    {{-- <!-- Baris tabel untuk data (bisa ditambahkan lebih banyak sesuai kebutuhan) -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- Tambahkan baris lain jika diperlukan --> --}}
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
