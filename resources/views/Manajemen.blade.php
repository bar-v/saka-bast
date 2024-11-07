<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Arsip</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            margin: 20px 0;
            text-align: right;
        }

        .button-container button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        .edit-btn,
        .delete-btn {
            padding: 5px 10px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #008CBA;
        }

        .edit-btn:hover {
            background-color: #007bb5;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>

    <h1>Manajemen Arsip</h1>

    <table id="arsipTable" class="display">
        <thead>
            <tr>
                <th>No Arsip</th>
                <th>Kode Pelaksana</th>
                <th>Kode Klasifikasi</th>
                <th>Kode Satker</th>
                <th>Nama Unit Pengolah</th>
                <th>Uraian Informasi Arsip</th>
                <th>Tahun Awal</th>
                <th>Tahun Akhir</th>
                <th>Tingkat Perkembangan Arsip</th>
                <th>Media Simpan</th>
                <th>Jumlah Berkas</th>
                <th>Kondisi Fisik</th>
                <th>Ukuran</th>
                <th>Keterangan</th>
                <th>Ruang</th>
                <th>Lemari</th>
                <th>Boks</th>
                <th>Jenis Arsip</th>
                <th>Alih Media</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>001</td>
                <td>PL001</td>
                <td>KL001</td>
                <td>ST001</td>
                <td>Unit A</td>
                <td>Dokumen Keuangan 2020</td>
                <td>2020</td>
                <td>2021</td>
                <td>Lengkap</td>
                <td>Kertas</td>
                <td>5</td>
                <td>Baik</td>
                <td>21 cm</td>
                <td>--</td>
                <td>Ruang 1</td>
                <td>Lemari 1</td>
                <td>Boks 1</td>
                <td>Umum</td>
                <td>Ya</td>
                <td>
                    <button class="edit-btn" onclick="editRow(this)">Edit</button>
                    <button class="delete-btn" onclick="deleteRow(this)">Hapus</button>
                </td>
            </tr>

        </tbody>
    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#arsipTable').DataTable();
        });


        // function importFile() {
        //     var fileInput = document.getElementById('fileInput');
        //     fileInput.click();
        //     fileInput.onchange = function() {
        //         var file = fileInput.files[0];
        //         if (file) {
        //             alert("File " + file.name + " dipilih.");

        //         }
        //     };
        // }


        function editRow(button) {
            var row = button.closest('tr');
            var cells = row.getElementsByTagName('td');
            for (var i = 0; i < cells.length - 1; i++) {
                cells[i].contentEditable = true;
            }
            button.innerHTML = "Save";
            button.onclick = function() {
                for (var i = 0; i < cells.length - 1; i++) {
                    cells[i].contentEditable = false;
                }
                button.innerHTML = "Edit";
                button.onclick = function() {
                    editRow(button);
                };
            };
        }


        function deleteRow(button) {
            var row = button.closest('tr');
            row.remove();
        }
    </script>

</body>

</html>
