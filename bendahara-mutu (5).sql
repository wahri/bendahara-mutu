-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 15 Apr 2021 pada 08.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bendahara-mutu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(5, 'TKJ 1'),
(6, 'TKJ 2'),
(7, 'BOGA'),
(8, 'AKUNTANSI'),
(9, 'TBSM'),
(10, 'TAB'),
(11, 'TKR 3 MITSUBISHI'),
(12, 'TKR 1'),
(13, 'TKR 2'),
(14, 'DPIB'),
(15, 'Listrik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelas` tinyint(1) DEFAULT NULL,
  `jurusan` varchar(128) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `tahun_lulus` int(4) DEFAULT NULL,
  `spp` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama`, `kelas`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `spp`, `status`) VALUES
(5627, '12345', '12345678', 'Wahyu Nuzul Bahri', 13, 'TKJ 1', 2020, 2021, 375000, 0),
(5628, '23251', '0041835302', 'AHMAD THORIQ', 12, 'DPIB', 2020, NULL, 350000, 1),
(5629, '23252', '0051518104', 'ANDREAN RAJSON', 12, 'DPIB', 2020, NULL, 350000, 1),
(5630, '23253', '0069713084', 'DAVIT RONARI', 12, 'DPIB', 2020, NULL, 350000, 1),
(5631, '23254', '0038855940', 'ERIS BATIAR', 12, 'DPIB', 2020, NULL, 350000, 1),
(5632, '23255', '0043614882', 'FARHAN', 12, 'DPIB', 2020, NULL, 350000, 1),
(5633, '23256', '0063051253', 'FIR HARTINI', 12, 'DPIB', 2020, NULL, 350000, 1),
(5634, '23257', '0052518910', 'GIOVANI PRATAMA', 13, 'DPIB', 2020, 2021, 350000, 1),
(5635, '23258', '0049209470', 'HARIS SAPUTRA', 13, 'DPIB', 2020, 2021, 350000, 1),
(5636, '23259', '0048127277', 'MARIO FAUZAN AZMI', 13, 'DPIB', 2020, 2021, 350000, 1),
(5637, '23260', '0051219632', 'MUHAMMAD FAUZAN SURURI', 13, 'DPIB', 2020, 2021, 350000, 1),
(5638, '23261', '0059591506', 'MUHAMMAD RAZIF WIDAYANTO', 13, 'DPIB', 2020, 2021, 350000, 1),
(5639, '23262', '0046203216', 'NURSYAWALIAH', 13, 'DPIB', 2020, 2021, 350000, 1),
(5640, '23263', '0043528460', 'PUTRI SALSABILA', 13, 'DPIB', 2020, 2021, 350000, 1),
(5641, '23264', '0028639508', 'YOLAN SAPUTRA', 13, 'DPIB', 2020, 2021, 350000, 1),
(5642, '23517', '0049751609', 'HAFIZ TRIONARDI', 13, 'DPIB', 2020, 2021, 350000, 1),
(5643, '23289', '0033703868', 'ABDULLAH MULHAKIM', 10, 'Listrik', 2020, NULL, 350000, 1),
(5644, '23290', '0044931563', 'ALAM NUGRAHA LAMTAMA', 10, 'Listrik', 2020, NULL, 350000, 1),
(5645, '23291', '0047106570', 'ALDO', 10, 'Listrik', 2020, NULL, 350000, 1),
(5646, '23292', '0046371099', 'ARMED ARIANSYAH ', 10, 'Listrik', 2020, NULL, 350000, 1),
(5647, '23293', '0046279600', 'BIMA PALWAGUNA SAPUTRA', 10, 'Listrik', 2020, NULL, 350000, 1),
(5648, '23295', '0044685319', 'DIMAS SEPTIAN ANANDA', 10, 'Listrik', 2020, NULL, 350000, 1),
(5649, '23296', '0032105720', 'IBRA DIKI ALQARNI', 11, 'Listrik', 2020, NULL, 350000, 1),
(5650, '23297', '0041915174', 'ILHAM SHAFARUDIN', 11, 'Listrik', 2020, NULL, 350000, 1),
(5651, '23298', '0046557156', 'JHONNEDI HERJON SIMBOLON', 11, 'Listrik', 2020, NULL, 350000, 1),
(5652, '23299', '0035110252', 'KARISMA MUHAMMAD AKBAR', 11, 'Listrik', 2020, NULL, 350000, 1),
(5653, '23300', '0038286152', 'M. ALIF MAULANA', 11, 'Listrik', 2020, NULL, 350000, 1),
(5654, '23301', '0057755437', 'MUHAMMAD REZA TRI JULIANTO', 11, 'Listrik', 2020, NULL, 350000, 1),
(5655, '23302', '0038196846', 'MARIO DWI PUTRA', 12, 'Listrik', 2020, NULL, 350000, 1),
(5656, '23303', '0045776396', 'MICHAEL DEARBORN', 12, 'Listrik', 2020, NULL, 350000, 1),
(5657, '23304', '0038695924', 'MUHAMMAD BASRIZAL NUR', 12, 'Listrik', 2020, NULL, 350000, 1),
(5658, '23305', '0052238717', 'RAHMAT FADHIL', 12, 'Listrik', 2020, NULL, 350000, 1),
(5659, '23306', '0051317285', 'MUHAMMAD HADI NAFIQ', 12, 'Listrik', 2020, NULL, 350000, 1),
(5660, '23307', '0045699532', 'MUHAMMAD ILHAM', 12, 'Listrik', 2020, NULL, 350000, 1),
(5661, '23308', '0059719812', 'MUHAMMAD JULIAN ROMERO', 12, 'Listrik', 2020, NULL, 350000, 1),
(5662, '23309', '0050093132', 'OCTAVIANUS PAKENDEK MANGULING', 12, 'Listrik', 2020, NULL, 350000, 1),
(5663, '23310', '0055539252', 'RAHMAT BUDI SETIAWAN', 12, 'Listrik', 2020, NULL, 350000, 1),
(5664, '23311', '0052517153', 'RHIDWAN ACHYAR', 12, 'Listrik', 2020, NULL, 350000, 1),
(5665, '23312', '0043866783', 'SAID EFFENDI', 12, 'Listrik', 2020, NULL, 350000, 1),
(5666, '23313', '0052274121', 'SATRIA MANDALA PUTRA', 12, 'Listrik', 2020, NULL, 350000, 1),
(5667, '23314', '0046094957', 'SIGIT FATURAHMAN', 12, 'Listrik', 2020, NULL, 350000, 1),
(5668, '23315', '0044931580', 'SYAHRUL RAMADHAN', 12, 'Listrik', 2020, NULL, 350000, 1),
(5669, '23316', '0041831626', 'TAAT SULTAN RAGA', 12, 'Listrik', 2020, NULL, 350000, 1),
(5670, '23317', '0045778725', 'VIKRAF DWI USMAN ANDEKAN', 12, 'Listrik', 2020, NULL, 350000, 1),
(5671, '23318', '0049250022', 'YUDHA NUGRAHA', 12, 'Listrik', 2020, NULL, 350000, 1),
(5672, '23319', '0058324369', 'OMAR KORADI', 12, 'Listrik', 2020, NULL, 350000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jml_dibayar` int(11) NOT NULL DEFAULT 0,
  `tahun` int(11) DEFAULT NULL,
  `bulan` tinyint(4) DEFAULT NULL,
  `kode_tagihan` tinyint(4) NOT NULL,
  `nama_tagihan` varchar(50) NOT NULL,
  `is_lunas` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nis`, `harga`, `jml_dibayar`, `tahun`, `bulan`, `kode_tagihan`, `nama_tagihan`, `is_lunas`) VALUES
(63121, '12345', 375000, 375000, 2020, 7, 1, 'SPP Juli 2021', 1),
(63122, '12345', 375000, 375000, 2020, 8, 1, 'SPP Agustus 2021', 1),
(63123, '12345', 375000, 375000, 2020, 9, 1, 'SPP September 2021', 1),
(63124, '12345', 375000, 375000, 2020, 10, 1, 'SPP Oktober 2021', 1),
(63125, '12345', 375000, 375000, 2020, 11, 1, 'SPP November 2021', 1),
(63126, '12345', 375000, 375000, 2020, 12, 1, 'SPP Desember 2021', 1),
(63127, '12345', 375000, 375000, 2021, 1, 1, 'SPP Januari 2021', 1),
(63128, '12345', 375000, 375000, 2021, 2, 1, 'SPP Februari 2021', 1),
(63129, '12345', 375000, 375000, 2021, 3, 1, 'SPP Maret 2021', 1),
(63130, '12345', 375000, 375000, 2021, 4, 1, 'SPP April 2021', 1),
(63131, '12345', 375000, 375000, 2021, 5, 1, 'SPP Mei 2021', 1),
(63132, '12345', 375000, 375000, 2021, 6, 1, 'SPP Juni 2021', 1),
(63133, '12345', 2200000, 150000, NULL, NULL, 2, 'Uang PPDB 2020', 0),
(63134, '23289', 150000, 150000, NULL, NULL, 3, 'Uang KAT 2021', 1),
(63135, '23251', 350000, 350000, 2020, 7, 1, 'SPP Juli 2021', 1),
(63136, '23251', 350000, 350000, 2020, 8, 1, 'SPP Agustus 2021', 1),
(63137, '23251', 350000, 350000, 2020, 9, 1, 'SPP September 2021', 1),
(63138, '23251', 350000, 350000, 2020, 10, 1, 'SPP Oktober 2021', 1),
(63139, '23251', 350000, 350000, 2020, 11, 1, 'SPP November 2021', 1),
(63140, '23251', 350000, 350000, 2020, 12, 1, 'SPP Desember 2021', 1),
(63141, '23251', 350000, 350000, 2021, 1, 1, 'SPP Januari 2021', 1),
(63142, '23251', 350000, 350000, 2021, 2, 1, 'SPP Februari 2021', 1),
(63143, '23251', 350000, 350000, 2021, 3, 1, 'SPP Maret 2021', 1),
(63144, '23251', 350000, 350000, 2021, 4, 1, 'SPP April 2021', 1),
(63145, '23252', 350000, 350000, 2021, 5, 1, 'SPP Mei 2021', 1),
(63146, '23252', 350000, 350000, 2021, 4, 1, 'SPP April 2021', 1),
(63147, '23252', 350000, 350000, 2021, 1, 1, 'SPP Januari 2021', 1),
(63148, '23252', 350000, 350000, 2021, 2, 1, 'SPP Februari 2021', 1),
(63149, '23252', 350000, 350000, 2020, 7, 1, 'SPP Juli 2021', 1),
(63150, '23252', 350000, 350000, 2020, 8, 1, 'SPP Agustus 2021', 1),
(63151, '23252', 350000, 350000, 2020, 9, 1, 'SPP September 2021', 1),
(63152, '23252', 350000, 350000, 2020, 10, 1, 'SPP Oktober 2021', 1),
(63153, '23252', 350000, 350000, 2020, 11, 1, 'SPP November 2021', 1),
(63154, '23252', 350000, 350000, 2020, 12, 1, 'SPP Desember 2021', 1),
(63155, '23252', 350000, 350000, 2021, 3, 1, 'SPP Maret 2021', 1),
(63156, '23291', 350000, 350000, 2020, 7, 1, 'SPP Juli 2021', 1),
(63157, '23291', 350000, 350000, 2020, 8, 1, 'SPP Agustus 2021', 1),
(63158, '23252', 350000, 350000, 2022, 6, 1, 'SPP Juni 2022', 1),
(63159, '23252', 350000, 350000, 2022, 5, 1, 'SPP Mei 2022', 1),
(63160, '23251', 350000, 350000, 2022, 1, 1, 'SPP Januari 2022', 1),
(63161, '23251', 350000, 350000, 2022, 2, 1, 'SPP Februari 2022', 1),
(63162, '23251', 350000, 350000, 2022, 3, 1, 'SPP Maret 2022', 1),
(63163, '23252', 350000, 350000, 2022, 1, 1, 'SPP Januari 2022', 1),
(63164, '23252', 350000, 350000, 2022, 2, 1, 'SPP Februari 2022', 1),
(63165, '23252', 350000, 350000, 2022, 3, 1, 'SPP Maret 2022', 1),
(63166, '23252', 350000, 350000, 2022, 4, 1, 'SPP April 2022', 1),
(63167, '23256', 350000, 350000, 2020, 7, 1, 'SPP Juli 2021', 1),
(63168, '23256', 350000, 350000, 2020, 8, 1, 'SPP Agustus 2021', 1),
(63169, '23254', 350000, 350000, 2020, 7, 1, 'SPP Juli 2021', 1),
(63170, '23254', 350000, 25000, 2020, 8, 1, 'SPP Agustus 2021', 0),
(63171, '23251', 350000, 35000, 2022, 4, 1, 'SPP April 2022', 0),
(63172, '23251', 350000, 350000, 2021, 7, 1, 'SPP Juli 2022', 1),
(63173, '23251', 350000, 350000, 2021, 8, 1, 'SPP Agustus 2022', 1),
(63174, '23251', 350000, 350000, 2021, 9, 1, 'SPP September 2022', 1),
(63175, '23251', 350000, 350000, 2021, 10, 1, 'SPP Oktober 2022', 1),
(63176, '23251', 350000, 350000, 2021, 11, 1, 'SPP November 2022', 1),
(63177, '23251', 350000, 350000, 2021, 12, 1, 'SPP Desember 2022', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan_lainnya`
--

CREATE TABLE `tagihan_lainnya` (
  `nama_tagihan` varchar(128) NOT NULL,
  `kode_tagihan` varchar(12) NOT NULL,
  `harga` int(11) NOT NULL,
  `target` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan_lainnya`
--

INSERT INTO `tagihan_lainnya` (`nama_tagihan`, `kode_tagihan`, `harga`, `target`) VALUES
('Uang PPDB 2020', '2', 2200000, '10'),
('Uang KAT 2021', '3', 150000, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `nis`, `total`, `date`) VALUES
('TR-20210122234014', '12345', 1125000, '2021-01-22 16:40:14'),
('TR-20210122234115', '12345', 1500000, '2021-01-22 16:41:15'),
('TR-20210122234656', '12345', 0, '2021-01-22 16:46:56'),
('TR-20210122234720', '12345', 375000, '2021-01-22 16:47:20'),
('TR-20210122235259', '12345', 375000, '2021-01-22 16:52:59'),
('TR-20210123000017', '12345', 1125000, '2021-01-22 17:00:19'),
('TR-20210123000118', '12345', 150000, '2021-01-22 17:01:19'),
('TR-20210406173635', '23289', 150000, '2021-04-06 10:36:36'),
('TR-20210413110150', '23251', 3500000, '2021-04-13 04:01:52'),
('TR-20210413111852', '23252', 300000, '2021-04-13 04:18:54'),
('TR-20210413112219', '23252', 200000, '2021-04-13 04:22:21'),
('TR-20210413113844', '23252', 2800000, '2021-04-13 04:38:44'),
('TR-20210413115658', '23252', 500000, '2021-04-13 04:56:59'),
('TR-20210413115711', '23252', 50000, '2021-04-13 04:57:11'),
('TR-20210413115931', '23291', 700000, '2021-04-13 04:59:31'),
('TR-20210415104730', '23252', 700000, '2021-04-15 03:47:30'),
('TR-20210415111517', '23251', 1050000, '2021-04-15 04:15:18'),
('TR-20210415111625', '23252', 1400000, '2021-04-15 04:16:26'),
('TR-20210415114012', '23256', 700000, '2021-04-15 04:40:12'),
('TR-20210415114938', '23254', 375000, '2021-04-15 04:49:38'),
('TR-20210415130552', '23251', 35000, '2021-04-15 06:05:52'),
('TR-20210415130720', '23251', 2100000, '2021-04-15 06:07:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `nama_item` varchar(50) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `kode_tagihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `kode_transaksi`, `nominal`, `discount`, `nama_item`, `id_tagihan`, `kode_tagihan`) VALUES
(95, 'TR-20210122234014', 375000, NULL, 'SPP Juli 2021', 63121, 1),
(96, 'TR-20210122234014', 375000, NULL, 'SPP Agustus 2021', 63122, 1),
(97, 'TR-20210122234014', 375000, NULL, 'SPP September 2021', 63123, 1),
(98, 'TR-20210122234115', 375000, NULL, 'SPP Oktober 2021', 63124, 1),
(99, 'TR-20210122234115', 375000, NULL, 'SPP November 2021', 63125, 1),
(100, 'TR-20210122234115', 375000, NULL, 'SPP Desember 2021', 63126, 1),
(101, 'TR-20210122234115', 375000, NULL, 'SPP Januari 2021', 63127, 1),
(102, 'TR-20210122234720', 375000, NULL, 'SPP Februari 2021', 63128, 1),
(103, 'TR-20210122235259', 375000, NULL, 'SPP Maret 2021', 63129, 1),
(104, 'TR-20210123000017', 375000, NULL, 'SPP April 2021', 63130, 1),
(105, 'TR-20210123000017', 375000, NULL, 'SPP Mei 2021', 63131, 1),
(106, 'TR-20210123000017', 375000, NULL, 'SPP Juni 2021', 63132, 1),
(107, 'TR-20210123000118', 150000, NULL, 'Uang PPDB 2020', 63133, 2),
(108, 'TR-20210406173635', 150000, NULL, 'Uang KAT 2021', 63134, 3),
(109, 'TR-20210413110150', 350000, NULL, 'SPP Juli 2021', 63135, 1),
(110, 'TR-20210413110150', 350000, NULL, 'SPP Agustus 2021', 63136, 1),
(111, 'TR-20210413110150', 350000, NULL, 'SPP September 2021', 63137, 1),
(112, 'TR-20210413110150', 350000, NULL, 'SPP Oktober 2021', 63138, 1),
(113, 'TR-20210413110150', 350000, NULL, 'SPP November 2021', 63139, 1),
(114, 'TR-20210413110150', 350000, NULL, 'SPP Desember 2021', 63140, 1),
(115, 'TR-20210413110150', 350000, NULL, 'SPP Januari 2021', 63141, 1),
(116, 'TR-20210413110150', 350000, NULL, 'SPP Februari 2021', 63142, 1),
(117, 'TR-20210413110150', 350000, NULL, 'SPP Maret 2021', 63143, 1),
(118, 'TR-20210413110150', 350000, NULL, 'SPP April 2021', 63144, 1),
(119, 'TR-20210413111852', 300000, NULL, 'SPP Mei 2021', 63145, 1),
(120, 'TR-20210413112219', 200000, NULL, 'SPP April 2021', 63146, 1),
(121, 'TR-20210413113844', 350000, NULL, 'SPP Januari 2021', 63147, 1),
(122, 'TR-20210413113844', 350000, NULL, 'SPP Februari 2021', 63148, 1),
(123, 'TR-20210413113844', 350000, NULL, 'SPP Juli 2021', 63149, 1),
(124, 'TR-20210413113844', 350000, NULL, 'SPP Agustus 2021', 63150, 1),
(125, 'TR-20210413113844', 350000, NULL, 'SPP September 2021', 63151, 1),
(126, 'TR-20210413113844', 350000, NULL, 'SPP Oktober 2021', 63152, 1),
(127, 'TR-20210413113844', 350000, NULL, 'SPP November 2021', 63153, 1),
(128, 'TR-20210413113844', 350000, NULL, 'SPP Desember 2021', 63154, 1),
(129, 'TR-20210413115658', 350000, NULL, 'SPP Maret 2021', 63155, 1),
(130, 'TR-20210413115658', 150000, NULL, 'SPP April 2021', 63146, 1),
(131, 'TR-20210413115711', 50000, NULL, 'SPP Mei 2021', 63145, 1),
(132, 'TR-20210413115931', 350000, NULL, 'SPP Juli 2021', 63156, 1),
(133, 'TR-20210413115931', 350000, NULL, 'SPP Agustus 2021', 63157, 1),
(134, 'TR-20210415104730', 350000, NULL, 'SPP Juni 2022', 63158, 1),
(135, 'TR-20210415104730', 350000, NULL, 'SPP Mei 2022', 63159, 1),
(136, 'TR-20210415111517', 350000, NULL, 'SPP Januari 2022', 63160, 1),
(137, 'TR-20210415111517', 350000, NULL, 'SPP Februari 2022', 63161, 1),
(138, 'TR-20210415111517', 350000, NULL, 'SPP Maret 2022', 63162, 1),
(139, 'TR-20210415111625', 350000, NULL, 'SPP Januari 2022', 63163, 1),
(140, 'TR-20210415111625', 350000, NULL, 'SPP Februari 2022', 63164, 1),
(141, 'TR-20210415111625', 350000, NULL, 'SPP Maret 2022', 63165, 1),
(142, 'TR-20210415111625', 350000, NULL, 'SPP April 2022', 63166, 1),
(143, 'TR-20210415114012', 350000, NULL, 'SPP Juli 2021', 63167, 1),
(144, 'TR-20210415114012', 350000, NULL, 'SPP Agustus 2021', 63168, 1),
(145, 'TR-20210415114938', 350000, NULL, 'SPP Juli 2021', 63169, 1),
(146, 'TR-20210415114938', 25000, NULL, 'SPP Agustus 2021', 63170, 1),
(147, 'TR-20210415130552', 35000, NULL, 'SPP April 2022', 63171, 1),
(148, 'TR-20210415130720', 350000, NULL, 'SPP Juli 2022', 63172, 1),
(149, 'TR-20210415130720', 350000, NULL, 'SPP Agustus 2022', 63173, 1),
(150, 'TR-20210415130720', 350000, NULL, 'SPP September 2022', 63174, 1),
(151, 'TR-20210415130720', 350000, NULL, 'SPP Oktober 2022', 63175, 1),
(152, 'TR-20210415130720', 350000, NULL, 'SPP November 2022', 63176, 1),
(153, 'TR-20210415130720', 350000, NULL, 'SPP Desember 2022', 63177, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pengeluaran`
--

CREATE TABLE `transaksi_pengeluaran` (
  `id_transaksi` int(11) NOT NULL,
  `nama_pemakai` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_pengeluaran`
--

INSERT INTO `transaksi_pengeluaran` (`id_transaksi`, `nama_pemakai`, `nominal`, `catatan`, `datetime`) VALUES
(8, 'Donni', 350000, 'Untuk keperluan labor', '2021-04-15 11:41:43'),
(9, 'Donni', 350000, 'Untuk keperluan labor', '2021-04-15 11:41:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'default.png',
  `last_login` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`, `last_login`, `active`, `level`) VALUES
(1, 'admin', '$2y$10$byJuy41JCn/ZfL4.B3ducuhW2OxpeOV5sqgn84q69FR5U.dH2fEMK', 'default.png', '2021-04-14 23:55:06', 1, 1),
(3, 'bendahara', '$2y$10$A0OduLqBv20HI/9u/SxqgeW7NdMeyjvMi1iGHjTf2sJJv/bjdXMOa', 'default.png', '2021-04-15 00:48:51', 1, 3),
(4, 'kepsek', '$2y$10$4vQrFvgRSgUqnN.eiGHpzuYka6syAyanbAvtx/NicyEdlUjYeCfPi', 'default.png', '2021-04-14 01:15:59', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_tagihan` (`id_tagihan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indeks untuk tabel `tagihan_lainnya`
--
ALTER TABLE `tagihan_lainnya`
  ADD UNIQUE KEY `kode_tagihan` (`kode_tagihan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_pengeluaran`
--
ALTER TABLE `transaksi_pengeluaran`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5673;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63178;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pengeluaran`
--
ALTER TABLE `transaksi_pengeluaran`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
