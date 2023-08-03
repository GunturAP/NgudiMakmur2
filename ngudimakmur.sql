-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2023 pada 05.24
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
-- Database: `ngudimakmur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_alamat`
--

CREATE TABLE `customer_alamat` (
  `email` varchar(128) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `id_kota` varchar(128) NOT NULL,
  `kota_kab` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `detail_lainnya` varchar(128) NOT NULL,
  `no_telepon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer_alamat`
--

INSERT INTO `customer_alamat` (`email`, `nama_penerima`, `id_kota`, `kota_kab`, `kecamatan`, `detail_lainnya`, `no_telepon`) VALUES
('prasetyanilam23@gmail.com', 'Ridwan', '222', 'Kabupaten Lamongan', 'Selorejo', 'Trowulan', '8228193711'),
('suis.sutejo@gmail.com', 'Suis', '133', 'Kabupaten Gresik', 'Klakah', 'Arjosari', '82255285700');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penjual`
--

CREATE TABLE `data_penjual` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_penjual` varchar(128) NOT NULL,
  `kelompok_tani` varchar(128) NOT NULL,
  `id_kota` varchar(128) NOT NULL,
  `kota_kab` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `detail_lainnya` varchar(128) NOT NULL,
  `no_telepon` varchar(18) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penjual`
--

INSERT INTO `data_penjual` (`id`, `email`, `nik`, `nama_penjual`, `kelompok_tani`, `id_kota`, `kota_kab`, `kecamatan`, `detail_lainnya`, `no_telepon`, `foto`) VALUES
(23, 'gunturadiprasetyo6@gmail.com', '35052123000001', 'Guntur', 'Ngudi Makmur II', '255', ' Kabupaten Malang ', 'Kalipare', 'Arjosari', '', '23-Mufid-_Ktp.jpg'),
(30, 'prasetyanilam23@gmail.com', '3505216010530002', 'Ridwan', 'Seroja 2', '178', ' Kabupaten Kediri ', 'Kalipare', 'Desa Amplegading Rt02 Rw 03', '8225512111', '30-Ridwan-_Ktp.jpg'),
(22, 'rachmadagung082@gmail.com', '35052301291', 'Rachmad', 'Ngudi Makmur II', '74', ' Kabupaten Blitar ', 'Selorejo ', 'Boro , rt, 23 rw 39', '82437666443', '22-Rachmad-_Ktp.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(128) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `email_pembeli` varchar(1128) NOT NULL,
  `star` int(11) NOT NULL,
  `komentar` varchar(256) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `id_pesanan`, `id_penjual`, `id_produk`, `email_pembeli`, `star`, `komentar`, `foto`) VALUES
(10, '22-1644884949', 21, 20, 'rachmadagung082@gmail.com', 5, 'Produk Unggul, pengiriman cepat, pelayyanan bagus', ''),
(11, '23-1644900621', 22, 21, 'gunturadiprasetyo6@gmail.com', 5, 'Pelayanan Bagus', ''),
(12, '30-1689518785', 23, 19, 'prasetyanilam23@gmail.com', 5, 'Bagus Bersih Murah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grafik`
--

CREATE TABLE `grafik` (
  `id` int(11) NOT NULL,
  `varietas_kedelai` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `tipe` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grafik`
--

INSERT INTO `grafik` (`id`, `varietas_kedelai`, `stok`, `tgl`, `bln`, `tahun`, `tipe`) VALUES
(532, 'KEDELAI ANJASMORO KONSUMSI', 123, 1, 8, 2023, 'supply'),
(533, 'KEDELAI DENA KONSUMSI', 120, 1, 8, 2023, 'supply'),
(534, 'KEDELAI GROBOGAN BIBIT', 139, 1, 8, 2023, 'supply'),
(535, 'TESTING AJA KONSUMSI', 110, 1, 8, 2023, 'supply'),
(536, 'KEDELAI ANJASMORO KONSUMSI', 0, 1, 8, 2023, 'demand'),
(537, 'KEDELAI DENA KONSUMSI', 0, 1, 8, 2023, 'demand'),
(538, 'KEDELAI GROBOGAN BIBIT', 0, 1, 8, 2023, 'demand'),
(539, 'TESTING AJA KONSUMSI', 0, 1, 8, 2023, 'demand'),
(540, 'KEDELAI ANJASMORO KONSUMSI', 123, 2, 8, 2023, 'supply'),
(541, 'KEDELAI DENA KONSUMSI', 120, 2, 8, 2023, 'supply'),
(542, 'KEDELAI GROBOGAN BIBIT', 139, 2, 8, 2023, 'supply'),
(543, 'TESTING AJA KONSUMSI', 110, 2, 8, 2023, 'supply'),
(544, 'KEDELAI ANJASMORO KONSUMSI', 0, 2, 8, 2023, 'demand'),
(545, 'KEDELAI DENA KONSUMSI', 0, 2, 8, 2023, 'demand'),
(546, 'KEDELAI GROBOGAN BIBIT', 0, 2, 8, 2023, 'demand'),
(547, 'TESTING AJA KONSUMSI', 0, 2, 8, 2023, 'demand'),
(548, 'KEDELAI ANJASMORO KONSUMSI', 123, 3, 8, 2023, 'supply'),
(549, 'KEDELAI DENA KONSUMSI', 120, 3, 8, 2023, 'supply'),
(550, 'KEDELAI GROBOGAN BIBIT', 139, 3, 8, 2023, 'supply'),
(551, 'TESTING AJA KONSUMSI', 110, 3, 8, 2023, 'supply'),
(552, 'KEDELAI ANJASMORO KONSUMSI', 0, 3, 8, 2023, 'demand'),
(553, 'KEDELAI DENA KONSUMSI', 0, 3, 8, 2023, 'demand'),
(554, 'KEDELAI GROBOGAN BIBIT', 0, 3, 8, 2023, 'demand'),
(555, 'TESTING AJA KONSUMSI', 0, 3, 8, 2023, 'demand');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grafik_selisih`
--

CREATE TABLE `grafik_selisih` (
  `id` int(11) NOT NULL,
  `varietas_kedelai` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grafik_selisih`
--

INSERT INTO `grafik_selisih` (`id`, `varietas_kedelai`, `stok`, `tgl`, `bln`) VALUES
(1, 'KEDELAI ANJASMORO BIBIT', 130, 1, 3),
(2, 'KEDELAI ANJASMORO KONSUMSI', 160, 1, 3),
(3, 'KEDELAI DENA KONSUMSI', 80, 1, 3),
(4, 'KEDELAI GROBOGAN BIBIT', 90, 1, 3),
(5, 'KEDELAI GROBOGAN KONSUMSI', 110, 1, 3),
(6, 'KEDELAI ANJASMORO BIBIT', 164, 2, 3),
(7, 'KEDELAI ANJASMORO KONSUMSI', 167, 2, 3),
(8, 'KEDELAI DENA KONSUMSI', 47, 2, 3),
(9, 'KEDELAI GROBOGAN BIBIT', 110, 2, 3),
(10, 'KEDELAI GROBOGAN KONSUMSI', 103, 2, 3),
(11, 'KEDELAI ANJASMORO BIBIT', 157, 3, 3),
(12, 'KEDELAI ANJASMORO KONSUMSI', 203, 3, 3),
(13, 'KEDELAI DENA KONSUMSI', 68, 3, 3),
(14, 'KEDELAI GROBOGAN BIBIT', 92, 3, 3),
(15, 'KEDELAI GROBOGAN KONSUMSI', 95, 3, 3),
(16, 'KEDELAI ANJASMORO BIBIT', 134, 4, 3),
(17, 'KEDELAI ANJASMORO KONSUMSI', 209, 4, 3),
(18, 'KEDELAI DENA KONSUMSI', 105, 4, 3),
(19, 'KEDELAI GROBOGAN BIBIT', 69, 4, 3),
(20, 'KEDELAI GROBOGAN KONSUMSI', 128, 4, 3),
(21, 'KEDELAI ANJASMORO BIBIT', 177, 5, 3),
(22, 'KEDELAI ANJASMORO KONSUMSI', 187, 5, 3),
(23, 'KEDELAI DENA KONSUMSI', 96, 5, 3),
(24, 'KEDELAI GROBOGAN BIBIT', 116, 5, 3),
(25, 'KEDELAI GROBOGAN KONSUMSI', 117, 5, 3),
(26, 'KEDELAI ANJASMORO BIBIT', 189, 6, 3),
(27, 'KEDELAI ANJASMORO KONSUMSI', 215, 6, 3),
(28, 'KEDELAI DENA KONSUMSI', 68, 6, 3),
(29, 'KEDELAI GROBOGAN BIBIT', 115, 6, 3),
(30, 'KEDELAI GROBOGAN KONSUMSI', 87, 6, 3),
(31, 'KEDELAI ANJASMORO BIBIT', 155, 7, 3),
(32, 'KEDELAI ANJASMORO KONSUMSI', 192, 7, 3),
(33, 'KEDELAI DENA KONSUMSI', 65, 7, 3),
(34, 'KEDELAI GROBOGAN BIBIT', 120, 7, 3),
(35, 'KEDELAI GROBOGAN KONSUMSI', 75, 7, 3),
(36, 'KEDELAI ANJASMORO BIBIT', 146, 8, 3),
(37, 'KEDELAI ANJASMORO KONSUMSI', 195, 8, 3),
(38, 'KEDELAI DENA KONSUMSI', 93, 8, 3),
(39, 'KEDELAI GROBOGAN BIBIT', 98, 8, 3),
(40, 'KEDELAI GROBOGAN KONSUMSI', 88, 8, 3),
(41, 'KEDELAI ANJASMORO BIBIT', 125, 9, 3),
(42, 'KEDELAI ANJASMORO KONSUMSI', 178, 9, 3),
(43, 'KEDELAI DENA KONSUMSI', 66, 9, 3),
(44, 'KEDELAI GROBOGAN BIBIT', 86, 9, 3),
(45, 'KEDELAI GROBOGAN KONSUMSI', 88, 9, 3),
(46, 'KEDELAI ANJASMORO BIBIT', 186, 10, 3),
(47, 'KEDELAI ANJASMORO KONSUMSI', 178, 10, 3),
(48, 'KEDELAI DENA KONSUMSI', 96, 10, 3),
(49, 'KEDELAI GROBOGAN BIBIT', 83, 10, 3),
(50, 'KEDELAI GROBOGAN KONSUMSI', 98, 10, 3),
(51, 'KEDELAI ANJASMORO BIBIT', 123, 11, 3),
(52, 'KEDELAI ANJASMORO KONSUMSI', 185, 11, 3),
(53, 'KEDELAI DENA KONSUMSI', 78, 11, 3),
(54, 'KEDELAI GROBOGAN BIBIT', 125, 11, 3),
(55, 'KEDELAI GROBOGAN KONSUMSI', 140, 11, 3),
(56, 'KEDELAI ANJASMORO BIBIT', 180, 12, 3),
(57, 'KEDELAI ANJASMORO KONSUMSI', 200, 12, 3),
(58, 'KEDELAI DENA KONSUMSI', 100, 12, 3),
(59, 'KEDELAI GROBOGAN BIBIT', 100, 12, 3),
(60, 'KEDELAI GROBOGAN KONSUMSI', 90, 12, 3),
(61, 'KEDELAI ANJASMORO BIBIT', 200, 13, 3),
(62, 'KEDELAI ANJASMORO KONSUMSI', 235, 13, 3),
(63, 'KEDELAI DENA KONSUMSI', 120, 13, 3),
(64, 'KEDELAI GROBOGAN BIBIT', 140, 13, 3),
(65, 'KEDELAI GROBOGAN KONSUMSI', 160, 13, 3),
(66, 'KEDELAI ANJASMORO BIBIT', 198, 14, 3),
(67, 'KEDELAI ANJASMORO KONSUMSI', 232, 14, 3),
(68, 'KEDELAI DENA KONSUMSI', 120, 14, 3),
(69, 'KEDELAI GROBOGAN BIBIT', 140, 14, 3),
(70, 'KEDELAI GROBOGAN KONSUMSI', 160, 14, 3),
(71, 'KEDELAI ANJASMORO BIBIT', 198, 15, 3),
(72, 'KEDELAI ANJASMORO KONSUMSI', 235, 15, 3),
(73, 'KEDELAI DENA KONSUMSI', 120, 15, 3),
(74, 'KEDELAI GROBOGAN BIBIT', 140, 15, 3),
(75, 'KEDELAI GROBOGAN KONSUMSI', 160, 15, 3),
(76, 'KEDELAI ANJASMORO BIBIT', 0, 16, 3),
(77, 'KEDELAI ANJASMORO KONSUMSI', 130, 16, 3),
(78, 'KEDELAI DENA KONSUMSI', 120, 16, 3),
(79, 'KEDELAI GROBOGAN BIBIT', 140, 16, 3),
(80, 'KEDELAI GROBOGAN KONSUMSI', 0, 16, 3),
(81, 'KEDELAI ANJASMORO KONSUMSI', 127, 16, 7),
(82, 'KEDELAI DENA KONSUMSI', 120, 16, 7),
(83, 'KEDELAI GROBOGAN BIBIT', 139, 16, 7),
(84, 'TESTING AJA BIBIT', 1200, 16, 7),
(85, 'KEDELAI ANJASMORO KONSUMSI', 0, 1, 7),
(86, 'KEDELAI DENA KONSUMSI', 0, 1, 7),
(87, 'KEDELAI GROBOGAN BIBIT', 0, 1, 7),
(88, 'TESTING AJA BIBIT', 0, 1, 7),
(89, 'TESTING AJA KONSUMSI', 0, 1, 7),
(90, 'KEDELAI ANJASMORO KONSUMSI', 0, 2, 7),
(91, 'KEDELAI DENA KONSUMSI', 0, 2, 7),
(92, 'KEDELAI GROBOGAN BIBIT', 0, 2, 7),
(93, 'TESTING AJA BIBIT', 0, 2, 7),
(94, 'TESTING AJA KONSUMSI', 0, 2, 7),
(95, 'KEDELAI ANJASMORO KONSUMSI', 122, 3, 7),
(96, 'KEDELAI DENA KONSUMSI', 120, 3, 7),
(97, 'KEDELAI GROBOGAN BIBIT', 140, 3, 7),
(98, 'TESTING AJA BIBIT', 0, 3, 7),
(99, 'TESTING AJA KONSUMSI', 0, 3, 7),
(100, 'KEDELAI ANJASMORO KONSUMSI', 0, 4, 7),
(101, 'KEDELAI DENA KONSUMSI', 0, 4, 7),
(102, 'KEDELAI GROBOGAN BIBIT', 0, 4, 7),
(103, 'TESTING AJA BIBIT', 0, 4, 7),
(104, 'TESTING AJA KONSUMSI', 0, 4, 7),
(105, 'KEDELAI ANJASMORO KONSUMSI', 127, 5, 7),
(106, 'KEDELAI DENA KONSUMSI', 120, 5, 7),
(107, 'KEDELAI GROBOGAN BIBIT', 139, 5, 7),
(108, 'TESTING AJA BIBIT', 0, 5, 7),
(109, 'TESTING AJA KONSUMSI', 0, 5, 7),
(110, 'KEDELAI ANJASMORO KONSUMSI', 127, 6, 7),
(111, 'KEDELAI DENA KONSUMSI', 120, 6, 7),
(112, 'KEDELAI GROBOGAN BIBIT', 139, 6, 7),
(113, 'TESTING AJA BIBIT', 0, 6, 7),
(114, 'TESTING AJA KONSUMSI', 0, 6, 7),
(115, 'KEDELAI ANJASMORO KONSUMSI', 127, 7, 7),
(116, 'KEDELAI DENA KONSUMSI', 120, 7, 7),
(117, 'KEDELAI GROBOGAN BIBIT', 139, 7, 7),
(118, 'TESTING AJA BIBIT', 0, 7, 7),
(119, 'TESTING AJA KONSUMSI', 0, 7, 7),
(120, 'KEDELAI ANJASMORO KONSUMSI', 127, 8, 7),
(121, 'KEDELAI DENA KONSUMSI', 120, 8, 7),
(122, 'KEDELAI GROBOGAN BIBIT', 139, 8, 7),
(123, 'TESTING AJA BIBIT', 0, 8, 7),
(124, 'TESTING AJA KONSUMSI', 0, 8, 7),
(125, 'KEDELAI ANJASMORO KONSUMSI', 127, 9, 7),
(126, 'KEDELAI DENA KONSUMSI', 120, 9, 7),
(127, 'KEDELAI GROBOGAN BIBIT', 139, 9, 7),
(128, 'TESTING AJA BIBIT', 0, 9, 7),
(129, 'TESTING AJA KONSUMSI', 0, 9, 7),
(130, 'KEDELAI ANJASMORO KONSUMSI', 127, 10, 7),
(131, 'KEDELAI DENA KONSUMSI', 120, 10, 7),
(132, 'KEDELAI GROBOGAN BIBIT', 139, 10, 7),
(133, 'TESTING AJA BIBIT', 0, 10, 7),
(134, 'TESTING AJA KONSUMSI', 0, 10, 7),
(135, 'KEDELAI ANJASMORO KONSUMSI', 0, 11, 7),
(136, 'KEDELAI DENA KONSUMSI', 0, 11, 7),
(137, 'KEDELAI GROBOGAN BIBIT', 0, 11, 7),
(138, 'TESTING AJA BIBIT', 0, 11, 7),
(139, 'TESTING AJA KONSUMSI', 0, 11, 7),
(140, 'KEDELAI ANJASMORO KONSUMSI', 127, 12, 7),
(141, 'KEDELAI DENA KONSUMSI', 120, 12, 7),
(142, 'KEDELAI GROBOGAN BIBIT', 139, 12, 7),
(143, 'TESTING AJA BIBIT', 0, 12, 7),
(144, 'TESTING AJA KONSUMSI', 0, 12, 7),
(145, 'KEDELAI ANJASMORO KONSUMSI', 127, 13, 7),
(146, 'KEDELAI DENA KONSUMSI', 120, 13, 7),
(147, 'KEDELAI GROBOGAN BIBIT', 139, 13, 7),
(148, 'TESTING AJA BIBIT', 0, 13, 7),
(149, 'TESTING AJA KONSUMSI', 0, 13, 7),
(150, 'KEDELAI ANJASMORO KONSUMSI', 0, 14, 7),
(151, 'KEDELAI DENA KONSUMSI', 0, 14, 7),
(152, 'KEDELAI GROBOGAN BIBIT', 0, 14, 7),
(153, 'TESTING AJA BIBIT', 0, 14, 7),
(154, 'TESTING AJA KONSUMSI', 0, 14, 7),
(155, 'KEDELAI ANJASMORO KONSUMSI', 0, 15, 7),
(156, 'KEDELAI DENA KONSUMSI', 0, 15, 7),
(157, 'KEDELAI GROBOGAN BIBIT', 0, 15, 7),
(158, 'TESTING AJA BIBIT', 0, 15, 7),
(159, 'TESTING AJA KONSUMSI', 0, 15, 7),
(160, 'KEDELAI ANJASMORO KONSUMSI', 123, 25, 7),
(161, 'KEDELAI DENA KONSUMSI', 120, 25, 7),
(162, 'KEDELAI GROBOGAN BIBIT', 139, 25, 7),
(163, 'TESTING AJA BIBIT', 35, 25, 7),
(164, 'TESTING AJA KONSUMSI', 52, 25, 7),
(165, 'KEDELAI ANJASMORO KONSUMSI', 123, 29, 7),
(166, 'KEDELAI DENA KONSUMSI', 120, 29, 7),
(167, 'KEDELAI GROBOGAN BIBIT', 139, 29, 7),
(168, 'TESTING AJA BIBIT', 110, 29, 7),
(169, 'TESTING AJA KONSUMSI', 110, 29, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_bank`
--

CREATE TABLE `informasi_bank` (
  `email` varchar(128) NOT NULL,
  `nama_bank` varchar(128) NOT NULL,
  `nama_rekening` varchar(128) NOT NULL,
  `no_rekening` varchar(128) NOT NULL,
  `logo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi_bank`
--

INSERT INTO `informasi_bank` (`email`, `nama_bank`, `nama_rekening`, `no_rekening`, `logo`) VALUES
('gunturadiprasetyo6@gmail.com', 'MANDIRI', 'Mufid', '23230129012191', 'MANDIRI.png'),
('prasetyanilam23@gmail.com', 'BCA', 'Ridwan', '23230129012191', 'BCA.png'),
('rachmadagung082@gmail.com', 'MANDIRI', 'Rachmad Agung', '212318414012', 'MANDIRI.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedelai`
--

CREATE TABLE `kedelai` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama_petani` varchar(128) NOT NULL,
  `jenis_kedelai` varchar(128) NOT NULL,
  `varietas_kedelai` varchar(256) NOT NULL,
  `grade` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto_kedelai` varchar(256) NOT NULL,
  `info_lain` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kedelai`
--

INSERT INTO `kedelai` (`id`, `email`, `nama_petani`, `jenis_kedelai`, `varietas_kedelai`, `grade`, `harga`, `stok`, `foto_kedelai`, `info_lain`, `date_created`) VALUES
(19, 'gunturadiprasetyo6@gmail.com', 'Guntur Adi Prasetyo', 'Konsumsi', 'Kedelai Anjasmoro', 'Sedang', 10000, 123, 'a:2:{i:0;s:36:\"21-Kedelai_Anjasmoro-Konsumsi-0.jpeg\";i:1;s:37:\"21-Kedelai_Anjasmoro-Konsumsi-01.jpeg\";}', 'Produk ini merupakan produk unggulan dari kelompok tani ngudi makmur', 0),
(20, 'gunturadiprasetyo6@gmail.com', 'Guntur Adi Prasetyo', 'Bibit', 'Kedelai Grobogan', 'Sedang', 15000, 139, 'a:2:{i:0;s:31:\"21-Kedelai_Grobogan-Bibit-0.jpg\";i:1;s:32:\"21-Kedelai_Grobogan-Bibit-01.jpg\";}', 'Kedelai grobogan kedelai lokal dari keklompok tani ngudi makmuir 2\r\ndengan warna coklat', 0),
(24, 'rachmadagung082@gmail.com', 'Rachmad', 'Konsumsi', 'KEDELAI DENA', 'Sedang', 12000, 120, 'a:1:{i:0;s:30:\"22-KEDELAI_DENA-Konsumsi-0.png\";}', 'fsh', 0),
(27, 'gunturadiprasetyo6@gmail.com', 'Guntur', 'Konsumsi', 'TESTING AJA', 'Sedang', 12000, 110, 'a:1:{i:0;s:26:\"23-TESTING_AJA-Bibit-0.jpg\";}', 'dv', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(128) NOT NULL,
  `email_pembeli` varchar(128) NOT NULL,
  `email_penjual` varchar(128) NOT NULL,
  `id_kedelai` varchar(128) NOT NULL,
  `nama_kedelai` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal_pesanan` int(11) NOT NULL,
  `subtotal_pengiriman` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jasa_pengiriman` varchar(128) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `alamat_penerima` varchar(256) NOT NULL,
  `no_telepon` varchar(19) NOT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `tgl` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_resi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `email_pembeli`, `email_penjual`, `id_kedelai`, `nama_kedelai`, `jumlah`, `subtotal_pesanan`, `subtotal_pengiriman`, `total_harga`, `jasa_pengiriman`, `nama_penerima`, `alamat_penerima`, `no_telepon`, `status`, `foto`, `tgl`, `bln`, `thn`, `date_created`, `no_resi`) VALUES
('1', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1211, 10293500, 8000, 10301500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 1, 2019, 1546300800, 'OKE-981021213'),
('10', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1293, 10990500, 8000, 10998500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 10, 2019, 1569888000, 'OKE-981021213'),
('11', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1243, 10565500, 8000, 10573500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 11, 2019, 1572566400, 'OKE-981021213'),
('12', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1319, 11211500, 8000, 11219500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 12, 2019, 1575158400, 'OKE-981021213'),
('13', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1022, 8687000, 8000, 8695000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 1, 2020, 1577836800, 'OKE-981021213'),
('14', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 985, 8372500, 8000, 8380500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 2, 2020, 1580515200, 'OKE-981021213'),
('15', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1034, 8789000, 8000, 8797000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 3, 2020, 1583020800, 'OKE-981021213'),
('16', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 818, 6953000, 8000, 6961000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 4, 2020, 1585699200, 'OKE-981021213'),
('17', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 920, 7820000, 8000, 7828000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 5, 2020, 1588291200, 'OKE-981021213'),
('18', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1186, 10081000, 8000, 10089000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 6, 2020, 1590969600, 'OKE-981021213'),
('19', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 977, 8304500, 8000, 8312500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 7, 2020, 1593561600, 'OKE-981021213'),
('2', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1222, 10387000, 8000, 10395000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 2, 2019, 1548979200, 'OKE-981021213'),
('20', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1097, 9324500, 8000, 9332500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 8, 2020, 1596240000, 'OKE-981021213'),
('21', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1100, 9350000, 8000, 9358000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 9, 2020, 1598918400, 'OKE-981021213'),
('22', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1502, 12767000, 8000, 12775000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 10, 2020, 1601510400, 'OKE-981021213'),
('23', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1571, 13353500, 8000, 13361500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 11, 2020, 1604188800, 'OKE-981021213'),
('24', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1261, 10718500, 8000, 10726500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 12, 2020, 1606780800, 'OKE-981021213'),
('25', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1603, 13625500, 8000, 13633500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 1, 2021, 1609459200, 'OKE-981021213'),
('26', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1322, 11237000, 8000, 11245000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 2, 2021, 1612137600, 'OKE-981021213'),
('27', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1349, 11466500, 8000, 11474500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 3, 2021, 1614556800, 'OKE-981021213'),
('28', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1006, 8551000, 8000, 8559000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 4, 2021, 1617235200, 'OKE-981021213'),
('29', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 979, 8321500, 8000, 8329500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 5, 2021, 1619827200, 'OKE-981021213'),
('29-1685769886', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 3, 30000, 42000, 72000, 'jne', 'Suis', 'Kabupaten Gresik , Klakah , Arjosari', '82255285700', 2, '29-16857698861.png', 3, 6, 2023, 1685769886, 'OKE-981021213f'),
('29-1686725102', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '20', 'Kedelai Grobogan Bibit', 1, 15000, 14000, 29000, 'jne', 'Suis', 'Kabupaten Gresik , Klakah , Arjosari', '82255285700', 4, '29-1686725102.jpg', 14, 6, 2023, 1686725102, 'OKE-981021213'),
('29-1688370999', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 3, 30000, 18000, 48000, 'tiki', 'Suis', 'Kabupaten Gresik , Klakah , Arjosari', '82255285700', 6, '29-1688370999.jpg', 3, 7, 2023, 1688370999, ''),
('29-1690269005', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '26', 'TESTING AJA Bibit', 20, 24000, 280000, 304000, 'jne', 'Suis', 'Kabupaten Gresik , Klakah , Arjosari', '82255285700', 4, '29-1690269005.jpg', 25, 7, 2023, 1690269005, 'JNE-12312412'),
('3', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 991, 8423500, 8000, 8431500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 3, 2019, 1551398400, 'OKE-981021213'),
('30', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1051, 8933500, 8000, 8941500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 6, 2021, 1622505600, 'OKE-981021213'),
('30-1688393229', 'prasetyanilam23@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 2, 20000, 28000, 48000, 'jne', 'Ridwan', 'Kabupaten Lamongan , Selorejo , Trowulan', '8228193711', 2, '30-1688393229.jpg', 3, 7, 2023, 1688393229, ''),
('30-1689518785', 'prasetyanilam23@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 2, 20000, 28000, 48000, 'jne', 'Ridwan', 'Kabupaten Lamongan , Selorejo , Trowulan', '8228193711', 5, '30-1689518785.jpg', 16, 7, 2023, 1689518785, 'OKE-981021213f'),
('30-1689568102', 'prasetyanilam23@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 2, 20000, 28000, 48000, 'jne', 'Ridwan', 'Kabupaten Lamongan , Selorejo , Trowulan', '8228193711', 4, '30-1689568102.jpg', 17, 7, 2023, 1689568102, 'OKE-981021213f'),
('31', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1147, 9749500, 8000, 9757500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 7, 2021, 1625097600, 'OKE-981021213'),
('32', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 834, 7089000, 8000, 7097000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 8, 2021, 1627776000, 'OKE-981021213'),
('33', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1005, 8542500, 8000, 8550500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 9, 2021, 1630454400, 'OKE-981021213'),
('34', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1479, 12571500, 8000, 12579500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 10, 2021, 1633046400, 'OKE-981021213'),
('35', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1243, 10565500, 8000, 10573500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 11, 2021, 1635724800, 'OKE-981021213'),
('36', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 951, 8083500, 8000, 8091500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 12, 2021, 1638316800, 'OKE-981021213'),
('37', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1274, 10829000, 8000, 10837000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 1, 2022, 1640995200, 'OKE-981021213'),
('38', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1063, 9035500, 8000, 9043500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 2, 2022, 1643673600, 'OKE-981021213'),
('39', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1142, 9707000, 8000, 9715000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 3, 2022, 1646092800, 'OKE-981021213'),
('4', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1138, 9673000, 8000, 9681000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 4, 2019, 1554076800, 'OKE-981021213'),
('40', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1038, 8823000, 8000, 8831000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 4, 2022, 1648771200, 'OKE-981021213'),
('41', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 878, 7463000, 8000, 7471000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 5, 2022, 1651363200, 'OKE-981021213'),
('42', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 971, 8253500, 8000, 8261500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 6, 2022, 1654041600, 'OKE-981021213'),
('43', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1160, 9860000, 8000, 9868000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 7, 2022, 1656633600, 'OKE-981021213'),
('44', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1005, 8542500, 8000, 8550500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 8, 2022, 1659312000, 'OKE-981021213'),
('45', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 966, 8211000, 8000, 8219000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 9, 2022, 1661990400, 'OKE-981021213'),
('46', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 934, 7939000, 8000, 7947000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 10, 2022, 1664582400, 'OKE-981021213'),
('47', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 957, 8134500, 8000, 8142500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 11, 2022, 1667260800, 'OKE-981021213'),
('48', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1213, 10310500, 8000, 10318500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 12, 2022, 1669852800, 'OKE-981021213'),
('5', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1059, 9001500, 8000, 9009500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 5, 2019, 1556668800, 'OKE-981021213'),
('6', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1037, 8814500, 8000, 8822500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 6, 2019, 1559347200, 'OKE-981021213'),
('7', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1088, 9248000, 8000, 9256000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 7, 2019, 1561939200, 'OKE-981021213'),
('8', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1114, 9469000, 8000, 9477000, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 8, 2019, 1564617600, 'OKE-981021213'),
('9', 'suis.sutejo@gmail.com', 'gunturadiprasetyo6@gmail.com', '19', 'Kedelai Anjasmoro Konsumsi', 1005, 8542500, 8000, 8550500, 'JNE', 'Ridwan', '', '8822131319', 5, '', 1, 9, 2019, 1567296000, 'OKE-981021213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pesanan`
--

INSERT INTO `status_pesanan` (`id`, `status`) VALUES
(1, 'Menunggu Pembayaran'),
(2, 'Menunggu Diproses Penjual'),
(3, 'Sedang di Proses'),
(4, 'Dalam Pengiriman'),
(5, 'Pesanan Selesai'),
(6, 'Pesanan DI Tolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_ajuan`
--

CREATE TABLE `temp_ajuan` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temp_ajuan`
--

INSERT INTO `temp_ajuan` (`id`, `email`, `date`) VALUES
(14, 'prasetyanilam23@gmail.com', '1688360537');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telephone` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_telephone`, `password`, `role_id`, `is_active`, `date_created`, `foto`) VALUES
(20, 'Super Admin', '1918069@scholar.itn.ac.id', '-', '$2y$10$eXnYLyIE2w3f0zTOkOz7C.zkExEVF0zveNcVzvAvnQWQdGmutRvia', 1, 1, '2022-02-11 14:10:01', 'default.jpg'),
(22, 'Rachmad', 'rachmadagung082@gmail.com', '', '$2y$10$NZqpITCV.j6/Bqqrm9Wjwe599mF3dyKiy5WypWkvnGliK30TbSACW', 2, 1, '2022-02-15 07:24:42', '22-Rachmad.png'),
(23, 'Guntur', 'gunturadiprasetyo6@gmail.com', '', '$2y$10$RVwlEDku6.4ArQD7QnkilO2tRwSRQ3wa4RuAGWlUrv0dAdte8Tseu', 2, 1, '2022-02-15 11:34:13', 'default.jpg'),
(26, 'GAPOKTAN NGUDI MAKMUR II', 'taningudimakmur2@gmail.com', '-', '$2y$10$Z1J.ziY2LLynMmMh.RN.NOCjbKk8rp7GeRN9wKOWxOSdndYLP/6lK', 1, 1, '2022-03-12 13:01:07', 'default.jpg'),
(29, 'Suisno', 'suis.sutejo@gmail.com', '-', '$2y$10$oWrIHg.Ydbxkg5IuW4ImnuWykqODQDC/.QEByksB.0cW6.QrnVbdi', 3, 1, '2023-06-03 12:23:24', 'default.jpg'),
(30, 'Ridwan', 'prasetyanilam23@gmail.com', '-', '$2y$10$yq/ozAPNoRCKMNxfxK2XgOcMG6DLqPcPQmyfRSXVx/czj7tfoKuI6', 3, 1, '2023-07-03 12:00:39', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(21, 'nilamprasetya@gmail.com', 'eHnrUCAL1Qc4Uhe2J5Drqb5oHS4a7CvSvhI95tZA1uY=', 1685769054);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer_alamat`
--
ALTER TABLE `customer_alamat`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `data_penjual`
--
ALTER TABLE `data_penjual`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grafik`
--
ALTER TABLE `grafik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grafik_selisih`
--
ALTER TABLE `grafik_selisih`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi_bank`
--
ALTER TABLE `informasi_bank`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `kedelai`
--
ALTER TABLE `kedelai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp_ajuan`
--
ALTER TABLE `temp_ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `grafik`
--
ALTER TABLE `grafik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT untuk tabel `grafik_selisih`
--
ALTER TABLE `grafik_selisih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT untuk tabel `kedelai`
--
ALTER TABLE `kedelai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `temp_ajuan`
--
ALTER TABLE `temp_ajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
