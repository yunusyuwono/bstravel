-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2024 pada 04.01
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
-- Struktur dari tabel `admuser`
--

CREATE TABLE `admuser` (
  `idadmus` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `us` varchar(30) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `lvl` varchar(15) NOT NULL,
  `aff` varchar(10) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admuser`
--

INSERT INTO `admuser` (`idadmus`, `nama`, `us`, `pw`, `lvl`, `aff`, `hp`, `status`, `entri`) VALUES
(1, 'Admin', 'adminbst', '5cbbf65923f824b65961c8436d24b96d', 'admin', '', '', 'aktif', '2024-02-10 05:02:23'),
(2, 'Yunus Yuwono', '082183925322', '6051e9bdf8241b9e6b9b240539446334', 'mitra', '13974', '082183925322', 'aktif', '2024-02-10 09:56:42'),
(3, 'Thira Sandra Atika', '085380371574', 'e8cdfc09dbe31bf1512fb14ba1782d19', 'mitra', '04772', '085380371574', 'aktif', '2024-02-10 13:30:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `lvl` varchar(30) NOT NULL,
  `aff` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '1', 1, 3000000, 'WhatsApp Image 2023-12-23 at 13.24.06_c35f7b70.jpg', '11212', 'Valid', '2024-01-31 08:40:40'),
(2, '1', 2, 3500000, 'desktop-wallpaper-website-background-website-login-page-background.jpg', '11212', 'Valid', '2024-01-31 08:42:00'),
(3, '1', 3, 5000000, 'bengkulupetatrp.png', '11212', 'Valid', '2024-02-09 09:59:44'),
(4, '1', 4, 4000000, 'desktop-wallpaper-website-background-website-login-page-background.jpg', '11212', 'Valid', '2024-02-12 00:45:06'),
(5, '1', 5, 3000000, 'maharani-removebg-preview.png', '11212', 'Valid', '2024-02-12 00:45:08'),
(6, '1', 6, 8000000, '', 'Tunai', 'Valid', '2024-02-12 00:41:29');

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
  `kodeaff` varchar(10) NOT NULL,
  `isof` varchar(50) NOT NULL,
  `nopaspor` varchar(30) NOT NULL,
  `doi` date NOT NULL,
  `doe` date NOT NULL,
  `relasi` varchar(40) NOT NULL,
  `ortu` varchar(70) NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`idjamaah`, `nama`, `jk`, `hp`, `email`, `password`, `otp`, `token`, `tgldaftar`, `tgllahir`, `tmplahir`, `ktpsim`, `pekerjaan`, `alamat`, `kabkota`, `pos`, `foto`, `ahliwaris`, `hubwaris`, `perlengkapan`, `kodeaff`, `isof`, `nopaspor`, `doi`, `doe`, `relasi`, `ortu`, `entri`) VALUES
(17, 'asdfghijklaswaswaddfee', 'Laki-laki', '082183925322', 'thirasandra95@gmail.com', '202cb962ac59075b964b07152d234b70', 40882, '6051e9bdf8241b9e6b9b240539446334', NULL, '1994-10-07', 'Bengkulu', '1709030210940001', 'Karyawan Swasta', 'Seguring Hill No. 1158', 'KOTA BENGKULU', 38112, 'pas foto umi_page-0001(1)(1)jpg.jpg', 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '-', 'BENGKULU', 'A1234577', '2021-07-08', '2031-07-08', '', 'A/K', '2024-02-11 16:43:19'),
(18, 'iopupooi', 'Laki-laki', '0183081231823', 'thirasandra95@gmail.com', '202cb962ac59075b964b07152d234b70', 40882, '6051e9bdf8241b9e6b9b240539446334', NULL, '1994-10-07', 'Bengkulu', '1208308120380183', 'Karyawan Swasta', 'Seguring Hill No. 1158', 'KOTA BENGKULU', 38112, '17054737069287281381998475856585.jpg', 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '', '', '', '0000-00-00', '0000-00-00', '', '', '2024-01-17 12:24:15'),
(19, 'Yunus Yuwono', 'Laki-laki', '+6282183925322', 'joewono02@gmail.com', '', 0, '', NULL, '1994-10-02', 'Bengkulu', '1709030210940001', 'Karyawan Swasta', 'Perumahan Seguring Hill No. 1158', 'Kota Bengkulu', 38116, NULL, 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '', '', '', '0000-00-00', '0000-00-00', '', '', '2024-01-17 18:38:52'),
(20, 'Yunus Yuwono', 'Laki-laki', '085279955778', 'joewono03@gmail.com', '', 0, '', NULL, '1994-10-02', 'Bengkulu', '1709030210940002', 'Karyawan Swasta', 'Perumahan Seguring Hill No. 1158', 'KOTA BENGKULU', 38116, 'Yunus-red.jpg', 'Fahim Bayanaka Mahadhir', 'Anak', 'Laki-laki', '13974', '', '', '0000-00-00', '0000-00-00', '', 'Yulwarno/Salbiyah', '2024-02-11 16:28:56');

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
  `kuota` int(11) NOT NULL,
  `entri` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`idpaket`, `nama`, `program`, `brgkt`, `hari`, `biaya`, `desk`, `kuota`, `entri`) VALUES
(1, 'Umroh Bersama BST Bengkulu 10 Hari', 'Umroh', '2024-03', 10, '45000000', 'Umroh Bersama BST Bengkulu 10 Hari. Hotel bintang 5', 0, '2024-01-18 15:36:02'),
(2, 'Umroh Bersama BST Bengkulu 10 Hari + Turki 3 Hari', 'Umroh', '2024-01', 13, '62000000', 'Umroh Bersama BST Bengkulu 10 Hari + Turki 3 Hari', 0, '2024-01-23 09:44:32'),
(3, 'Haji plus', 'Haji Khusus', '2024-07', 12, '68000000', 'Haji Plus', 50, '2024-02-06 16:31:36');

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
(1, '082183925322', 'bukunikah', 'buku nikah.jpg'),
(2, '082183925322', 'ktp', 'ktp ku.jpg'),
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
-- Indeks untuk tabel `admuser`
--
ALTER TABLE `admuser`
  ADD PRIMARY KEY (`idadmus`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

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
-- AUTO_INCREMENT untuk tabel `admuser`
--
ALTER TABLE `admuser`
  MODIFY `idadmus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `idjamaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jampaket`
--
ALTER TABLE `jampaket`
  MODIFY `idjampaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `idpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `syarat`
--
ALTER TABLE `syarat`
  MODIFY `idsyarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
