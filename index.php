<?php
// index.php

// 1. Import file koneksi dan semua class yang dibutuhkan
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

// 2. Siapkan array penampung untuk masing-masing kelompok kategori
$daftarKaryawanTetap   = [];
$daftarKaryawanKontrak = [];
$daftarKaryawanMagang  = [];

// 3. Ambil data dari database tabel_karyawan
$query  = "SELECT * FROM tabel_karyawan";
$result = $koneksi->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        // Polimorfisme: Instansiasi objek secara dinamis berdasarkan jenis_karyawan di database
        switch ($row['jenis_karyawan']) {
            case 'Tetap':
                $objekKaryawan = new KaryawanTetap(
                    $row['id_karyawan'],
                    $row['nama_karyawan'],
                    $row['departemen'],
                    $row['hari_kerja_masuk'],
                    $row['gaji_dasar_per_hari'],
                    $row['tunjangan_kesehatan'],
                    $row['opsi_saham_id']
                );
                // Masukkan ke kelompok karyawan tetap
                $daftarKaryawanTetap[] = $objekKaryawan;
                break;

            case 'Kontrak':
                $objekKaryawan = new KaryawanKontrak(
                    $row['id_karyawan'],
                    $row['nama_karyawan'],
                    $row['departemen'],
                    $row['hari_kerja_masuk'],
                    $row['gaji_dasar_per_hari'],
                    $row['durasi_kontrak_bulan'],
                    $row['agensi_penyalur']
                );
                // Masukkan ke kelompok karyawan kontrak
                $daftarKaryawanKontrak[] = $objekKaryawan;
                break;

            case 'Magang':
                $objekKaryawan = new KaryawanMagang(
                    $row['id_karyawan'],
                    $row['nama_karyawan'],
                    $row['departemen'],
                    $row['hari_kerja_masuk'],
                    $row['gaji_dasar_per_hari'],
                    $row['uang_saku_bulanan'], // Tetap dikirim ke constructor sesuai struktur kelas
                    $row['sertifikat_kampus_merdeka']
                );
                // Masukkan ke kelompok karyawan magang
                $daftarKaryawanMagang[] = $objekKaryawan;
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penggajian & Informasi Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .category-header { border-left: 5px solid; padding-left: 15px; margin-bottom: 20px; margin-top: 40px; }
        .text-tetap { color: #0d6efd; border-color: #0d6efd; }
        .text-kontrak { color: #fd7e14; border-color: #fd7e14; }
        .text-magang { color: #198754; border-color: #198754; }
        .card-slip { border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s; }
        .card-slip:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Daftar Slip Gaji & Informasi Karyawan</h1>
        <p class="text-muted">Data dinamis dari database terintegrasi dengan konsep Object-Oriented Programming (OOP)</p>
    </div>

    <h3 class="category-header text-tetapfw-bold">Kategori: Karyawan Tetap</h3>
    <div class="row g-4">
        <?php if (empty($daftarKaryawanTetap)): ?>
            <div class="col-12"><div class="alert alert-secondary">Tidak ada data karyawan tetap.</div></div>
        <?php else: ?>
            <?php foreach ($daftarKaryawanTetap as $k): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-slip border-top border-primary border-4 h-100">
                        <div class="card-body">
                            <span class="badge bg-primary float-end">Tetap</span>
                            <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($k->getNamaKaryawan()); ?></h5>
                            <h6 class="card-subtitle mb-3 text-muted"><?= htmlspecialchars($k->getIdKaryawan()); ?> — <?= htmlspecialchars($k->getDepartemen()); ?></h6>
                            
                            <hr>
                            <p class="mb-1 text-secondary"><strong>Spesifikasi Jabatan:</strong></p>
                            <table class="table table-sm table-borderless text-small mb-3" style="font-size: 0.9rem;">
                                <tr><td>ID Opsi Saham (ESOP)</td><td>: <?= htmlspecialchars($k->getOpsiSahamId()); ?></td></tr>
                                <tr><td>Tunjangan Kesehatan</td><td>: Rp <?= number_format($k->getTunjanganKesehatan(), 0, ',', '.'); ?></td></tr>
                                <tr><td>Kehadiran Bulan Ini</td><td>: <?= $k->getHariKerjaMasuk(); ?> Hari</td></tr>
                            </table>
                            
                            <div class="bg-light p-3 rounded text-center">
                                <small class="text-muted d-block">Gaji Bersih (Harian + Tunjangan)</small>
                                <span class="fs-4 fw-bold text-primary">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


    <h3 class="category-header text-kontrak fw-bold">Kategori: Karyawan Kontrak</h3>
    <div class="row g-4">
        <?php if (empty($daftarKaryawanKontrak)): ?>
            <div class="col-12"><div class="alert alert-secondary">Tidak ada data karyawan kontrak.</div></div>
        <?php else: ?>
            <?php foreach ($daftarKaryawanKontrak as $k): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-slip border-top border-warning border-4 h-100">
                        <div class="card-body">
                            <span class="badge bg-warning text-dark float-end">Kontrak</span>
                            <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($k->getNamaKaryawan()); ?></h5>
                            <h6 class="card-subtitle mb-3 text-muted"><?= htmlspecialchars($k->getIdKaryawan()); ?> — <?= htmlspecialchars($k->getDepartemen()); ?></h6>
                            
                            <hr>
                            <p class="mb-1 text-secondary"><strong>Spesifikasi Jabatan:</strong></p>
                            <table class="table table-sm table-borderless text-small mb-3" style="font-size: 0.9rem;">
                                <tr><td>Agensi Penyalur</td><td>: <?= htmlspecialchars($k->getAgensiPenyalur()); ?></td></tr>
                                <tr><td>Durasi Kontrak</td><td>: <?= htmlspecialchars($k->getDurasiKontrakBulan()); ?> Bulan</td></tr>
                                <tr><td>Kehadiran Bulan Ini</td><td>: <?= $k->getHariKerjaMasuk(); ?> Hari</td></tr>
                            </table>
                            
                            <div class="bg-light p-3 rounded text-center">
                                <small class="text-muted d-block">Gaji Bersih (Murni Harian)</small>
                                <span class="fs-4 fw-bold text-warning text-dark">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


    <h3 class="category-header text-magang fw-bold">Kategori: Karyawan Magang</h3>
    <div class="row g-4">
        <?php if (empty($daftarKaryawanMagang)): ?>
            <div class="col-12"><div class="alert alert-secondary">Tidak ada data karyawan magang.</div></div>
        <?php else: ?>
            <?php foreach ($daftarKaryawanMagang as $k): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-slip border-top border-success border-4 h-100">
                        <div class="card-body">
                            <span class="badge bg-success float-end">Magang</span>
                            <h5 class="card-title fw-bold text-dark"><?= htmlspecialchars($k->getNamaKaryawan()); ?></h5>
                            <h6 class="card-subtitle mb-3 text-muted"><?= htmlspecialchars($k->getIdKaryawan()); ?> — <?= htmlspecialchars($k->getDepartemen()); ?></h6>
                            
                            <hr>
                            <p class="mb-1 text-secondary"><strong>Spesifikasi Jabatan:</strong></p>
                            <table class="table table-sm table-borderless text-small mb-3" style="font-size: 0.9rem;">
                                <tr><td>Program/Sertifikat</td><td>: <?= htmlspecialchars($k->getSertifikatKampusMerdeka()); ?></td></tr>
                                <tr><td>Kehadiran Bulan Ini</td><td>: <?= $k->getHariKerjaMasuk(); ?> Hari</td></tr>
                                <tr><td>Info Potongan</td><td>: <span class="text-danger">Potongan Orientasi 20%</span></td></tr>
                            </table>
                            
                            <div class="bg-light p-3 rounded text-center">
                                <small class="text-muted d-block">Total Uang Saku (Plafon - 20%)</small>
                                <span class="fs-4 fw-bold text-success">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>