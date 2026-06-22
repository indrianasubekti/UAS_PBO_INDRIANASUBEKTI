-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_indrianasubekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KTR-001', 'Andi Wijaya', 'IT Support', 22, '200000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KTR-002', 'Siti Rahma', 'Human Resources', 20, '180000.00', 'Kontrak', 6, 'PT Talent Scout', NULL, NULL, NULL, NULL),
('KTR-003', 'Budi Santoso', 'Finance', 21, '220000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KTR-004', 'Citra Lestari', 'Marketing', 22, '190000.00', 'Kontrak', 6, 'PT Global Solusi', NULL, NULL, NULL, NULL),
('KTR-005', 'Dedi Kurniawan', 'Operations', 23, '175000.00', 'Kontrak', 24, 'PT Talent Scout', NULL, NULL, NULL, NULL),
('KTR-006', 'Eka Putri', 'Customer Service', 20, '160000.00', 'Kontrak', 12, 'PT Global Solusi', NULL, NULL, NULL, NULL),
('KTR-007', 'Fahmi Idris', 'Procurement', 22, '210000.00', 'Kontrak', 6, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('MGN-001', 'Larasati Putri', 'Marketing', 22, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', 'MSIB-BATCH5-MKT'),
('MGN-002', 'Muhammad Rafli', 'Engineering', 20, '90000.00', 'Magang', NULL, NULL, NULL, NULL, '2500000.00', 'MSIB-BATCH5-ENG'),
('MGN-003', 'Nadia Vega', 'Design', 21, '85000.00', 'Magang', NULL, NULL, NULL, NULL, '2200000.00', 'MSIB-BATCH5-DSN'),
('MGN-004', 'Oki Setiana', 'Human Resources', 22, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', 'Mandiri-Univ-HR'),
('MGN-005', 'Putra Perkasa', 'Finance', 19, '85000.00', 'Magang', NULL, NULL, NULL, NULL, '2200000.00', 'MSIB-BATCH5-FIN'),
('MGN-006', 'Qori Sandioriva', 'Public Relations', 22, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', 'Mandiri-Univ-PR'),
('MGN-007', 'Rizky Billar', 'Content Creator', 20, '85000.00', 'Magang', NULL, NULL, NULL, NULL, '2100000.00', 'MSIB-BATCH5-CC'),
('TTP-001', 'Rian Hidayat', 'Engineering', 22, '400000.00', 'Tetap', NULL, NULL, '1500000.00', 'ESOP-ENG-01', NULL, NULL),
('TTP-002', 'Dewi Sartika', 'Legal', 21, '450000.00', 'Tetap', NULL, NULL, '2000000.00', 'ESOP-LGL-02', NULL, NULL),
('TTP-003', 'Hendra Wijaya', 'Product Management', 22, '500000.00', 'Tetap', NULL, NULL, '2500000.00', 'ESOP-PRD-03', NULL, NULL),
('TTP-004', 'Gita Permata', 'Data Science', 20, '480000.00', 'Tetap', NULL, NULL, '2000000.00', 'ESOP-DTA-04', NULL, NULL),
('TTP-005', 'Irfan Bachdim', 'Sales', 23, '350000.00', 'Tetap', NULL, NULL, '1500000.00', 'ESOP-SAL-05', NULL, NULL),
('TTP-006', 'Julia Perez', 'Quality Assurance', 22, '380000.00', 'Tetap', NULL, NULL, '1800000.00', 'ESOP-QA-06', NULL, NULL),
('TTP-007', 'Kevin Sanjaya', 'Security', 21, '300000.00', 'Tetap', NULL, NULL, '1200000.00', 'ESOP-SEC-07', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
