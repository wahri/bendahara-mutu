-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 09 Mar 2021 pada 21.01
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
(5627, '12345', '12345678', 'Wahyu Nuzul Bahri', 10, 'TKJ 2', 2020, NULL, 375000, 1);

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
(63133, '12345', 2200000, 150000, NULL, NULL, 2, 'Uang PPDB 2020', 0);

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
('Uang PPDB 2020', '2', 2200000, '10');

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
('TR-20210123000118', '12345', 150000, '2021-01-22 17:01:19');

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
(107, 'TR-20210123000118', 150000, NULL, 'Uang PPDB 2020', 63133, 2);

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
(1, 'admin', '$2y$10$byJuy41JCn/ZfL4.B3ducuhW2OxpeOV5sqgn84q69FR5U.dH2fEMK', 'default.png', '2021-03-07 09:13:35', 1, 1),
(3, 'wahyu', '$2y$10$gkL6DjSyskk7rkdg.QVK6uSVNFcl5AxBWPLZLKHfJ0ywWVydz/5hG', 'default.png', '2021-03-07 03:20:30', 1, 3),
(4, 'kepsek', '$2y$10$4vQrFvgRSgUqnN.eiGHpzuYka6syAyanbAvtx/NicyEdlUjYeCfPi', 'default.png', '2021-01-17 20:48:12', 1, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5628;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63134;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pengeluaran`
--
ALTER TABLE `transaksi_pengeluaran`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
