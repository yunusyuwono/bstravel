-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2024 pada 09.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bstravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `idbayar` int(11) NOT NULL,
  `idjampaket` varchar(20) NOT NULL,
  `bayarke` int(11) DEFAULT NULL,
  `nominal` int(20) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `rektu` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`idbayar`, `idjampaket`, `bayarke`, `nominal`, `bukti`, `rektu`, `status`, `entri`) VALUES
(1, '1', 1, 3000000, 'WhatsApp Image 2023-12-23 at 13.24.06_c35f7b70.jpg', '11212', 'Terkirim', '2024-01-24 02:59:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `idjamaah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `otp` int(5) NOT NULL,
  `token` varchar(100) NOT NULL,
  `tgldaftar` date DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tmplahir` varchar(50) DEFAULT NULL,
  `ktpsim` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kabkota` varchar(50) DEFAULT NULL,
  `pos` int(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ahliwaris` varchar(100) DEFAULT NULL,
  `hubwaris` varchar(50) DEFAULT NULL,
  `perlengkapan` varchar(20) DEFAULT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`idjamaah`, `nama`, `jk`, `hp`, `email`, `password`, `otp`, `token`, `tgldaftar`, `tgllahir`, `tmplahir`, `ktpsim`, `pekerjaan`, `alamat`, `kabkota`, `pos`, `foto`, `ahliwaris`, `hubwaris`, `perlengkapan`, `entri`) VALUES
(17, 'asdfghijklaswaswaddfee', 'Laki-laki', '082183925322', 'thirasandra95@gmail.com', '202cb962ac59075b964b07152d234b70', 40882, '6051e9bdf8241b9e6b9b240539446334', NULL, '1994-10-07', 'Bengkulu', '1709030210940001', 'Karyawan Swasta', 'Seguring Hill No. 1158', 'KOTA BENGKULU', 38112, 'Yunus-red.jpg', 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '2024-01-25 08:51:50'),
(18, 'iopupooi', 'Laki-laki', '0183081231823', 'thirasandra95@gmail.com', '202cb962ac59075b964b07152d234b70', 40882, '6051e9bdf8241b9e6b9b240539446334', NULL, '1994-10-07', 'Bengkulu', '1208308120380183', 'Karyawan Swasta', 'Seguring Hill No. 1158', 'KOTA BENGKULU', 38112, '17054737069287281381998475856585.jpg', 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '2024-01-17 12:24:15'),
(19, 'Yunus Yuwono', 'Laki-laki', '+6282183925322', 'joewono02@gmail.com', '', 0, '', NULL, '1994-10-02', 'Bengkulu', '1709030210940001', 'Karyawan Swasta', 'Perumahan Seguring Hill No. 1158', 'Kota Bengkulu', 38116, NULL, 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '2024-01-17 18:38:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jampaket`
--

CREATE TABLE `jampaket` (
  `idjampaket` int(11) NOT NULL,
  `idjamaah` varchar(20) NOT NULL,
  `idpaket` varchar(20) NOT NULL,
  `tgldaftar` date NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jampaket`
--

INSERT INTO `jampaket` (`idjampaket`, `idjamaah`, `idpaket`, `tgldaftar`, `entri`, `status`) VALUES
(1, '082183925322', '1', '2024-01-24', '2024-01-24 01:25:55', 'Terdaftar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `idpaket` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `brgkt` varchar(20) NOT NULL,
  `hari` int(11) NOT NULL,
  `biaya` varchar(12) NOT NULL,
  `desk` text NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`idpaket`, `nama`, `program`, `brgkt`, `hari`, `biaya`, `desk`, `entri`) VALUES
(1, 'Umroh Bersama BST Bengkulu 10 Hari', 'Umroh', '2024-03', 10, '45000000', 'Umroh Bersama BST Bengkulu 10 Hari. Hotel bintang 5', '2024-01-18 15:36:02'),
(2, 'Umroh Bersama BST Bengkulu 10 Hari + Turki 3 Hari', 'Umroh', '2024-01', 13, '62000000', 'Umroh Bersama BST Bengkulu 10 Hari + Turki 3 Hari', '2024-01-23 09:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat`
--

CREATE TABLE `syarat` (
  `idsyarat` int(11) NOT NULL,
  `idjamaah` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`idsyarat`, `idjamaah`, `jenis`, `gambar`) VALUES
(1, '082183925322', 'bukunikah', 'WIN_20230916_15_27_08_Pro (2).jpg'),
(2, '082183925322', 'ktp', 'WIN_20230916_15_15_39_Pro.jpg'),
(3, '082183925322', 'kk', 'WIN_20230916_15_27_09_Pro.jpg'),
(4, '082183925322', 'aktaijazah', 'WIN_20230916_15_27_08_Pro.jpg'),
(5, '082183925322', 'bpjs', 'WIN_20221212_07_32_30_Pro.jpg'),
(6, '082183925322', 'vaksin1', 'WIN_20240119_15_06_18_Pro.jpg'),
(7, '082183925322', 'vaksin2', 'WIN_20230916_15_15_58_Pro.jpg'),
(8, '082183925322', 'vaksin3', 'WIN_20230916_15_27_15_Pro.jpg'),
(9, '082183925322', 'paspor', 'WIN_20230916_15_27_09_Pro.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`idbayar`);

--
-- Indeks untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`idjamaah`);

--
-- Indeks untuk tabel `jampaket`
--
ALTER TABLE `jampaket`
  ADD PRIMARY KEY (`idjampaket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`idpaket`);

--
-- Indeks untuk tabel `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`idsyarat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `idjamaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jampaket`
--
ALTER TABLE `jampaket`
  MODIFY `idjampaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `idpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `syarat`
--
ALTER TABLE `syarat`
  MODIFY `idsyarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
