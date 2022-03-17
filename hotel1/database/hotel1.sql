-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2022 pada 03.09
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` char(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resepsionis`
--

CREATE TABLE `resepsionis` (
  `id_resepsionis` varchar(10) NOT NULL,
  `nama_resepsionis` char(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` varchar(10) NOT NULL,
  `nama_tamu` char(30) NOT NULL,
  `jumlah_tamu` varchar(3) NOT NULL,
  `jumlah_hari` varchar(3) NOT NULL,
  `tipe_kamar` char(100) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `tgl_check_in` date NOT NULL,
  `tgl_check_out` date NOT NULL,
  `harga` varchar(100) NOT NULL,
  `id_resepsionis` varchar(10) NOT NULL,
  `no_kamar` varchar(3) NOT NULL,
  `id_tamu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_tamu` char(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`id_resepsionis`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_resepsionis` (`id_resepsionis`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD CONSTRAINT `resepsionis_ibfk_1` FOREIGN KEY (`id_resepsionis`) REFERENCES `reservasi` (`id_resepsionis`);

--
-- Ketidakleluasaan untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD CONSTRAINT `tamu_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `reservasi` (`id_tamu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
