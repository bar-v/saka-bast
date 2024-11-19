<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #34495E;
            --accent-color: #3498DB;
        }

        body {
            background-color: #f5f6fa;
        }

        .header-bg {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 25px;
            color: white;
            border-bottom: 4px solid var(--accent-color);
            margin-bottom: 30px;
        }

        .form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .form-section h4 {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent-color);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.25);
            border-color: var(--accent-color);
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 8px;
        }

        .submit-btn {
            background: var(--accent-color);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .floating-submit {
            position: sticky;
            bottom: 20px;
            text-align: center;
            padding: 20px;
            background: rgba(255,255,255,0.9);
            border-radius: 10px;
            box-shadow: 0 -4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<x-app-layout>
    <div class="header-bg">
        <h2 class="text-center mb-0"><i class="fas fa-archive me-2"></i>Form Arsip Data</h2>
    </div>

    <div class="container form-container">
        <form action="{{ route('simpan-Manajemen') }}" method="post">
            {{ csrf_field() }}
            <!-- Informasi Umum -->
            <div class="form-section">
                <h4><i class="fas fa-info-circle me-2"></i>Informasi Umum</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Nomor Arsip</label>
                        <input type="text" class="form-control" id="nomor_arsip" name="nomor_arsip" placeholder="Masukkan nomor arsip">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kode Pelaksana</label>
                        <input type="text" class="form-control" id="kode_pelaksana" name="kode_pelaksana" placeholder="Masukkan kode pelaksana">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kode Klasifikasi</label>
                        <input type="text" class="form-control" id="kode_klasifikasi" name="kode_klasifikasi" placeholder="Masukkan kode klasifikasi">
                    </div>
                </div>
            </div>

            <!-- Informasi Unit -->
            <div class="form-section">
                <h4><i class="fas fa-building me-2"></i>Informasi Unit</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Kode Satker</label>
                        <input type="text" class="form-control" id="kode_satker" name="kode_satker" placeholder="Masukkan kode satker">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Unit Pengolah</label>
                        <textarea class="form-control" id="nama_unit_pengolah" name="nama_unit_pengolah" rows="2" placeholder="Masukkan nama unit pengolah"></textarea>
                    </div>
                </div>
            </div>

            <!-- Detail Arsip -->
            <div class="form-section">
                <h4><i class="fas fa-file-alt me-2"></i>Detail Arsip</h4>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Uraian Informasi Arsip</label>
                        <textarea class="form-control" id="uraian_informasi_arsip" name="uraian_informasi_arsip" rows="3" placeholder="Masukkan uraian informasi arsip"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tingkat Perkembangan</label>
                        <select class="form-control" id= "tingkat_perkembangan" name="tingkat_perkembangan">
                            <option value="">Pilih tingkat perkembangan</option>
                            <option value="asli">Asli</option>
                            <option value="tembusan">Tembusan</option>
                            <option value="salinan">Salinan</option>
                            <option value="pertinggal">Pertinggal</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jenis Arsip</label>
                        <select class="form-control" id= "jenis_arsip" name="jenis_arsip">
                            <option value="">Pilih jenis arsip</option>
                            <option value="tekstual">Tekstual</option>
                            <option value="audio_visual">Audio Visual</option>
                            <option value="kartografi">Kartografi</option>
                            <option value="elektronik">Elektronik</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun Awal</label>
                        <input type="year" class="form-control" id="tahun_awal" name="tahun_awal">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tahun Akhir</label>
                        <input type="year" class="form-control" id="tahun_akhir" name="tahun_akhir">
                    </div>
                </div>
            </div>

            <!-- Karakteristik Fisik -->
            <div class="form-section">
                <h4><i class="fas fa-box me-2"></i>Karakteristik Fisik</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Media Simpan</label>
                        <input type="text" class="form-control" id= "media_simpan" name="media_simpan" placeholder="Masukkan media simpan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jumlah Berkas</label>
                        <input type="text" class="form-control" id= "jumlah_berkas" name="jumlah_berkas" placeholder="Masukkan jumlah berkas">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kondisi Fisik</label>
                        <select class="form-control" id= "kondisi_fisik" name="kondisi_fisik">
                            <option value="">Pilih kondisi</option>
                            <option value="baik">Baik</option>
                            <option value="rusak_ringan">Rusak Ringan</option>
                            <option value="rusak_berat">Rusak Berat</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ukuran Kertas</label>
                        <select class="form-control" id= "ukuran" name="ukuran">
                            <option value="">Pilih ukuran kertas</option>
                            <option value="A4">A4</option>
                            <option value="A3">A3</option>
                            <option value="F4">F4</option>
                            <option value="Letter">Letter</option>
                            <option value="Legal">Legal</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Keterangan Tambahan -->
            <div class="form-section">
                <h4><i class="fas fa-clipboard me-2"></i>Keterangan Tambahan</h4>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" id= "keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan tambahan"></textarea>
                    </div>
                </div>
            </div>

            <!-- Lokasi -->
            <div class="form-section">
                <h4><i class="fas fa-map-marker-alt me-2"></i>Lokasi Penyimpanan</h4>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Ruang</label>
                        <input type="text" class="form-control" id= "ruang" name="ruang" placeholder="Nomor/Nama Ruang">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Lemari</label>
                        <input type="text" class="form-control" id= "lemari" name="lemari" placeholder="Nomor Lemari">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Boks</label>
                        <input type="text" class="form-control" id= "boks" name="boks" placeholder="Nomor Boks">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Alih Media</label>
                        <select class="form-control" id= "alih_media" name="alih_media">
                            <option value="">Pilih status</option>
                            <option value="sudah">Sudah</option>
                            <option value="belum">Belum</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="floating-submit">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save me-2"></i>Simpan Data Arsip
                </button>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</x-app-layout>