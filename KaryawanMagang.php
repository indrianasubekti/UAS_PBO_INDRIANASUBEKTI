<?php
// KaryawanMagang.php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti tambahan (Terenkapsulasi secara private)
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    // Constructor Kelas Anak
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        // Mengirimkan atribut global ke constructor class induk (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        
        // Inisialisasi properti spesifik kelas anak
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // Implementasi metode hitungGajiBersih()
    // METHOD OVERRIDING: Logika Baru dengan Potongan 20% (Dikalikan 0.80)
    public function hitungGajiBersih() {
        $plafonHarianTotal = $this->hariKerjaMasuk * $this->gajiDasarPerHari;
        return $plafonHarianTotal * 0.80;
    }

    // Implementasi metode tampilkanProfilKaryawan()
    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN MAGANG ===<br>";
        echo "ID Karyawan         : " . $this->id_karyawan . "<br>";
        echo "Nama Karyawan       : " . $this->nama_karyawan . "<br>";
        echo "Departemen          : " . $this->departemen . "<br>";
        echo "Sertifikat/Program  : " . $this->sertifikatKampusMerdeka . "<br>";
        echo "Info                : Dikenakan potongan OJT/Pelatihan sebesar 20%.<br>"; // Sesuai logika baru
        echo "Total Pendapatan    : Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br><br>";
    }

    // Getter khusus properti anak
    public function getUangSakuBulanan() { return $this->uangSakuBulanan; }
    public function getSertifikatKampusMerdeka() { return $this->sertifikatKampusMerdeka; }
}
?>