<?php
// KaryawanKontrak.php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti tambahan (Terenkapsulasi secara private)
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Constructor Kelas Anak
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $durasiKontrakBulan, $agensiPenyalur) {
        // Mengirimkan atribut global ke constructor class induk (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        
        // Inisialisasi properti spesifik kelas anak
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    // Implementasi metode hitungGajiBersih()
    // METHOD OVERRIDING: Menghitung gaji berdasarkan kehadiran murni
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    // Implementasi metode tampilkanProfilKaryawan()
    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN KONTRAK ===<br>";
        echo "ID Karyawan      : " . $this->id_karyawan . "<br>";
        echo "Nama Karyawan    : " . $this->nama_karyawan . "<br>";
        echo "Departemen       : " . $this->departemen . "<br>";
        echo "Agensi Penyalur  : " . $this->agensiPenyalur . "<br>";
        echo "Durasi Kontrak   : " . $this->durasiKontrakBulan . " Bulan<br>";
        echo "Gaji Bersih      : Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br><br>";
    }

    // Getter khusus properti anak
    public function getDurasiKontrakBulan() { return $this->durasiKontrakBulan; }
    public function getAgensiPenyalur() { return $this->agensiPenyalur; }
}
?>