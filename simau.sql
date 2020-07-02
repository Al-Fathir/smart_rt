-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 09.43
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simau`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username_admin`, `nama_admin`, `password_admin`) VALUES
(1, 'rifqihakim95', 'Rifqi Hakim', 'a3661bbce904a226406323aa9a46b4b2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_assets`
--

CREATE TABLE `tbl_assets` (
  `id_assets` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `nama_assets` varchar(100) NOT NULL,
  `nama_operasional` varchar(1) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `no_urut_assets` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_assets`
--

INSERT INTO `tbl_assets` (`id_assets`, `id_ruangan`, `id_fasilitas`, `nama_assets`, `nama_operasional`, `tgl_pembelian`, `no_urut_assets`) VALUES
(29, 4, 3, 'Laptop', 'O', '2020-02-05', 1),
(30, 4, 2, 'Kursi', 'S', '2020-02-04', 2),
(31, 4, 3, 'PC', 'S', '2020-02-02', 5),
(32, 4, 3, 'Handphone', 'S', '2020-04-05', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fasilitas`
--

CREATE TABLE `tbl_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `jns_fasilitas` varchar(1) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `kd_nama_fasilitas` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_fasilitas`
--

INSERT INTO `tbl_fasilitas` (`id_fasilitas`, `jns_fasilitas`, `nama_fasilitas`, `kd_nama_fasilitas`) VALUES
(2, 'S', 'Meuble', 'M'),
(3, 'S', 'Elektronik', 'E'),
(4, 'S', 'Mesin', 'N'),
(5, 'P', 'Gedung', 'G'),
(6, 'P', 'Tanah', 'T'),
(7, 'P', 'Kendaraan', 'K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kondisi`
--

CREATE TABLE `tbl_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `id_assets` int(11) NOT NULL,
  `nama_kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `no_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `no_lokasi`, `nama_lokasi`) VALUES
(2, 1, 'Balikpapan'),
(3, 2, 'Samarinda'),
(4, 3, 'Sangatta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_tempat`, `nama_ruangan`) VALUES
(4, 14, '207');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `kd_tempat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `id_lokasi`, `nama_tempat`, `kd_tempat`) VALUES
(14, 2, 'White Campus', 'A'),
(15, 2, 'Cheng Ho', 'B'),
(16, 3, 'PSDKU', 'D');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_assets`
--
ALTER TABLE `tbl_assets`
  ADD PRIMARY KEY (`id_assets`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indeks untuk tabel `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  ADD PRIMARY KEY (`id_kondisi`),
  ADD KEY `id_assets` (`id_assets`) USING BTREE;

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_assets`
--
ALTER TABLE `tbl_assets`
  MODIFY `id_assets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_assets`
--
ALTER TABLE `tbl_assets`
  ADD CONSTRAINT `tbl_assets_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_assets_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `tbl_fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kondisi`
--
ALTER TABLE `tbl_kondisi`
  ADD CONSTRAINT `tbl_kondisi_ibfk_1` FOREIGN KEY (`id_assets`) REFERENCES `tbl_assets` (`id_assets`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD CONSTRAINT `tbl_ruangan_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tbl_tempat` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD CONSTRAINT `tbl_tempat_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
