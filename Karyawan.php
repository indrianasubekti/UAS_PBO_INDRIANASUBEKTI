<?php
// Karyawan.php
// Abstract Class Karyawan dengan enkapsulasi dan metode abstrak

abstract class Karyawan {
    // Properti/Atribut Terenkapsulasi (protected)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    // Constructor untuk menginisialisasi properti dasar saat objek anak dibuat
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hariKerjaMasuk = $hariKerjaMasuk;
        $this->gajiDasarPerHari = $gajiDasarPerHari;
    }

    // Metode Abstrak (Tanpa Isi/Body) - WAJIB diimplementasikan oleh setiap kelas turunan
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();

    // Metode Getter (Opsional, untuk mengambil nilai properti di luar lingkungan kelas / dari objek luar)
    public function getIdKaryawan() {
        return $this->id_karyawan;
    }

    public function getNamaKaryawan() {
        return $this->nama_karyawan;
    }

    public function getDepartemen() {
        return $this->departemen;
    }

    public function getHariKerjaMasuk() {
        return $this->hariKerjaMasuk;
    }

    public function getGajiDasarPerHari() {
        return $this->gajiDasarPerHari;
    }
}
?>