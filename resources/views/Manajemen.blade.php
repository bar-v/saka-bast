<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<x-app-layout>
=======
<head>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
>>>>>>> 584556217b83baf75a318202bba63c33747f7964
    <style>
        /* Gaya tambahan untuk header */
        .header-bg {
            background-color: #2C2F33; /* Warna gelap atau warna lain yang sesuai */
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

<<<<<<< HEAD
        .tombol1,
        .tombol2,
        .tombol3 {
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

        .tombol3 {
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

        .tombol3:active {
            transform: scale(0.96);
        }

        .tombol3::before,
        .tombol3::after {
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
=======
>>>>>>> 584556217b83baf75a318202bba63c33747f7964
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
<<<<<<< HEAD

        <div class="tombol1">
            <a href=""><button>Import</button></a>

        </div>
        <div class="tombol2">
            <a href=""><button type="button">Edit</button></a>
        </div>
        <div class="tombol3">
            <a href="{{ route('arsipexport') }}"><button type="button">Export</button></a>
        </div>
        
=======
        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">File Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="fileUpload">Choose File</label>
                                <input type="file" class="form-control" id="fileUpload">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Enter a description" maxlength="100">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Import dengan pemanggilan modal -->
        <button type="button" class="btn btn-success tombol1" data-toggle="modal" data-target="#importModal">Import</button>

        <!-- Tombol Edit -->
        <button type="button" class="btn btn-primary tombol2">Edit</button>

>>>>>>> 584556217b83baf75a318202bba63c33747f7964
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
                    <tr>
                        <th>NO ARSIP</th>
                        <th>KODE PELAKSANA</th>
                        <th>KODE KLASIFIKASI</th>
                        <th>KODE SATKER</th>
                        <th>NAMA UNIT PENGOLAH</th>
                    </tr>
                    @foreach ($arsip as $item)
                        <tr>
                            <td>{{ $item->nomor_arsip }}</td>
                            <td>{{ $item->kode_pelaksana }}</td>
                            <td>{{ $item->kode_klasifikasi }}</td>
                            <td>{{ $item->kode_satker }}</td>
                            <td>{{ $item->nama_unit_pengolah }}</td>
                        </tr>
                    @endforeach
<<<<<<< HEAD
=======
                </tbody>
>>>>>>> 584556217b83baf75a318202bba63c33747f7964
            </table>
        </div>
    </div>

</x-app-layout>
