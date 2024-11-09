<!DOCTYPE html>
<html lang="en">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Arsip') }}
        </h2>
    </x-slot> 
    <br>

    <style>
        .ibu {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
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

        .tombol1, .tombol2 {
            flex-basis: 130px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
            color: white;
        }

        .tombol1 {
            background-color: green;
            cursor: pointer;
            border-radius: 10px;
            padding: 5px;
        }

        .tombol2 {
            background-color: blue;
            cursor: pointer;
            border-radius: 10px;
            padding: 5px;
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
            margin: 20px auto; /* Centering the box horizontally */
            z-index: 10; /* Ensure it appears above other content */
            position: relative;
        }

        /* Gaya tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
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
            <button type="button">Import</button>
        </div>
        <div class="tombol2">
            <button type="button">Edit</button>
        </div>
        <!-- Pencarian berada di ujung kanan dengan teks label putih -->
        <div class="pencari">
            <label for="search" class="mr-2">Search:</label>
            <input type="text" id="search" placeholder="Masukkan yang dicari...">
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
                    <!-- Baris tabel untuk data (bisa ditambahkan lebih banyak sesuai kebutuhan) -->
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
                    <!-- Tambahkan baris lain jika diperlukan -->
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
