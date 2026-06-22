<?php
// KaryawanTetap.php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan (Terenkapsulasi secara private)
    private $tunjanganKesehatan;
    private $opsiSahamId;

    // Constructor Kelas Anak
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $tunjanganKesehatan, $opsiSahamId) {
        // Mengirimkan atribut global ke constructor class induk (Karyawan)
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        
        // Inisialisasi properti spesifik kelas anak
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    // Implementasi metode hitungGajiBersih()
    // METHOD OVERRIDING: Akumulasi harian + Tunjangan Kesehatan
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    // Implementasi metode tampilkanProfilKaryawan()
    public function tampilkanProfilKaryawan() {
        echo "=== PROFIL KARYAWAN TETAP ===<br>";
        echo "ID Karyawan         : " . $this->id_karyawan . "<br>";
        echo "Nama Karyawan       : " . $this->nama_karyawan . "<br>";
        echo "Departemen          : " . $this->departemen . "<br>";
        echo "ID Opsi Saham (ESOP): " . $this->opsiSahamId . "<br>";
        echo "Tunjangan Kesehatan : Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.') . "<br>";
        echo "Gaji Bersih Total   : Rp " . number_format($this->hitungGajiBersih(), 0, ',', '.') . "<br><br>";
    }

    // Getter khusus properti anak
    public function getTunjanganKesehatan() { return $this->tunjanganKesehatan; }
    public function getOpsiSahamId() { return $this->opsiSahamId; }
}
?>