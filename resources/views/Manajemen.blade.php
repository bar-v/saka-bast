<!DOCTYPE html>
<html lang="en">

<head>

    <!--link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- ini untuk halaman -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!--Icon Links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        /* Gaya tambahan untuk header */
        .header-bg {
            background-color: #2C2F33;
            /* Warna gelap */
            padding: 20px;
            color: white;
            text-align: center;
        }

        /* Gaya untuk tombol dan tampilan */
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

    <!-- ini untuk halaman -->
    {{-- <script>
        $(document).ready(function() {
            $('table').DataTable({
                // "pageLength": 25, // jumlah baris per halaman
                "lengthChange": false // Menonaktifkan opsi perubahan jumlah baris per halaman
            });
        });
    </script> --}}


</head>

<x-app-layout>

    <!-- tombol dan pencarian -->
    <div class="ibu">
        <!-- Modal -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Upload File Excel</h5>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>


        @if (auth()->user()->hasRole('admin'))
            <!-- Tombol Import modal -->
            <button type="button" class="btn btn-success tombol1" data-toggle="modal"
                data-target="#importModal">Import</button>
            {{-- tombol create --}}
            <a href="{{ route('create-Manajemen') }}"><button type="button"
                    class="btn btn-primary tombol2">Create</button></a>

            <a href="{{ route('export-Manajemen') }}">
                <button type="button" class="btn btn-danger tombol3">Export</button>
            </a>
        @endif
    </div>

    <!-- Kotak putih blakang tabel -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="background-box shadow-lg">
            <table id="myTable">
                <form method="GET" action="{{ route('Manajemen') }}">
                    <label for="per_page">Jumlah baris per halaman:</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
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
                        @if (auth()->user()->hasRole('admin'))
                            <th>EDIT/HAPUS</th>
                        @endif
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
                            @if (auth()->user()->hasRole('admin'))
                                <td>
                                    <a href="{{ url('edit-Manajemen', $item->id) }}" class="btn-action btn-edit"
                                        title="Edit">
                                        <i class="bi bi-pencil-square"
                                            style="background: none; border: none; padding: 0; color: rgb(34, 0, 255);"></i>
                                    </a>|
                                    <form action="{{ route('delete-Manajemen', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Hapus"
                                            onclick="return confirm('Are you sure you want to delete this item?')"
                                            style="background: none; border: none; padding: 0; color: red;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $arsip->appends(['per_page' => request('per_page')])->links() }}
        </div>
    </div>

</x-app-layout>
