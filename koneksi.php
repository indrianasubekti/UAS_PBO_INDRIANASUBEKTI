<?php
// koneksi.php
// Konfigurasi koneksi database MySQL menggunakan MySQLi

$host     = "localhost";
$username = "root";
$password = "";
$database = "DB_UAS_PBO_TI1C_INDRIANASUBEKTI"; // Silakan sesuaikan dengan nama database Anda

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa status keberhasilan koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Mengatur charset ke utf8 agar mendukung berbagai format karakter data
$koneksi->set_charset("utf8");
?>