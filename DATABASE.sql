-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 06:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ariniaprilia_d1a240085`
--
CREATE DATABASE IF NOT EXISTS `db_ariniaprilia_d1a240085` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_ariniaprilia_d1a240085`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(2) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `about`) VALUES
(1, 'Halo! Namaku Arini Aprilia, biasanya dipanggil Arin atau Alin. Aku suka banget warna ungu dan pink karena menurutku warna itu manis dan bikin nyaman. Untuk urusan makanan, aku pecinta berat mie goreng, dimsum, wonton chili oil, mochi full coklat, dan tentu aja nasi padang! Kalau minuman, favoritku air putih dingin sama matcha yang rasanya calming banget.\r\nAku punya beberapa hobi yang aku nikmati di waktu luang, seperti membaca novel, dengerin musik, dan nulis karangan. Rasanya seru bisa ngungkapin isi pikiran lewat tulisan.\r\nAku milih program studi Sistem Informasi di Fakultas Ilmu Komputer Universitas Subang karena aku pengin belajar teknologi tapi tetap ada hubungannya sama bisnis dan manajemen. Buat aku, sistem informasi itu kayak jembatan antara dunia IT dan dunia nyata—dan itu yang bikin aku tertarik banget buat ngedalamin bidang ini.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(5) NOT NULL,
  `nama_artikel` text NOT NULL,
  `isi_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `nama_artikel`, `isi_artikel`) VALUES
(3, 'Tips Coding Pemula', 'Mulailah belajar coding dengan bahasa sederhana seperti Python. Pahami dasar seperti variabel, if-else, dan looping.\r\nLakukan latihan rutin, jangan takut menghadapi error, dan manfaatkan sumber belajar online. Kunci utamanya: konsisten dan sabar.'),
(4, 'Materi Pembahasan Dasar Pemrograman', 'Dasar pemrograman membahas konsep-konsep utama yang menjadi fondasi dalam membuat program. Materi yang dipelajari antara lain:\r\n- Variabel dan Tipe Data: Untuk menyimpan dan mengelola nilai.\r\n- Operator: Digunakan dalam perhitungan dan logika.\r\n- Percabangan (If/Else): Mengatur alur program berdasarkan kondisi.\r\n- Perulangan (Looping): Mengulang kode secara efisien.\r\n- Fungsi: Kode yang bisa dipanggil berulang kali.\r\n- Algoritma dan Logika Dasar: Cara berpikir terstruktur untuk menyelesaikan masalah.'),
(5, 'Dasar Pemrograman', 'Dasar pemrograman adalah langkah awal untuk memahami cara kerja program komputer. Materi utamanya meliputi variabel, tipe data, percabangan, perulangan, fungsi, dan logika algoritma. Dengan memahami dasar ini, kita dapat membuat program sederhana dan membangun fondasi untuk belajar pemrograman lebih lanjut.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(5) NOT NULL,
  `judul` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul`, `foto`) VALUES
(11, 'my selfie\'s', '6.jpg'),
(12, 'coconut', '5.jpg'),
(13, 'ootd', '4.jpg'),
(14, 'beach ', '3.jpg'),
(15, 'me w/friend\'s', '2.jpg'),
(16, 'me in campus', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`) VALUES
('', ''),
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
