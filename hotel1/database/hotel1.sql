-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 11:48 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel1`
--
CREATE DATABASE IF NOT EXISTS `hotel1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel1`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` char(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password`) VALUES
('1234', 'sefry', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitashotel`
--

CREATE TABLE IF NOT EXISTS `fasilitashotel` (
  `fasilitastambahan` varchar(700) NOT NULL,
  `fasilitas` varchar(700) NOT NULL,
  PRIMARY KEY (`fasilitastambahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitashotel`
--

INSERT INTO `fasilitashotel` (`fasilitastambahan`, `fasilitas`) VALUES
('Meeting Room', '2'),
('Playground', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `kamarspesial` varchar(700) NOT NULL,
  `keterangankamar` varchar(700) NOT NULL,
  PRIMARY KEY (`kamarspesial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamarspesial`, `keterangankamar`) VALUES
('Family Room/Triple Room', 'Pergi traveling bersama keluarga besar atau teman-teman? Kamu bisa pilih tipe kamar hotel family room. Dari segi ukuran kamar, tentu jauh lebih luas daripada tipe kamar hotel lainnya.  Tipe kamar hotel family room ini biasanya tersedia satu tempat dengan ukuran king size dan satu tempat tidur dengan ukuran yang lebih kecil.'),
('Presidential Suite', 'Presidential suite adalah tipe kamar hotel yang terbaik dan paling mahal. Bahkan, tidak semua hotel memiliki presidential suite.  Fasilitas yang ditawarkan pun tentu yang terbaik, mulai dari interior, pemandangan kamar, dan masih banyak lainnya.');

-- --------------------------------------------------------

--
-- Table structure for table `resepsionis`
--

CREATE TABLE IF NOT EXISTS `resepsionis` (
  `id_resepsionis` varchar(10) NOT NULL,
  `nama_resepsionis` char(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_resepsionis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resepsionis`
--

INSERT INTO `resepsionis` (`id_resepsionis`, `nama_resepsionis`, `password`) VALUES
('1234', 'sefry', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE IF NOT EXISTS `reservasi` (
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
  `id_tamu` varchar(10) NOT NULL,
  PRIMARY KEY (`id_reservasi`),
  KEY `id_resepsionis` (`id_resepsionis`),
  KEY `id_tamu` (`id_tamu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nama_tamu`, `jumlah_tamu`, `jumlah_hari`, `tipe_kamar`, `tgl_reservasi`, `tgl_check_in`, `tgl_check_out`, `harga`, `id_resepsionis`, `no_kamar`, `id_tamu`) VALUES
('1234', 'sefry', '1', '1', 'standart room', '2022-03-23', '2022-03-23', '2022-03-24', '1000000', '1234', '101', '1234'),
('2345', 'asep', '2', '2', 'standart room', '2022-03-23', '2022-03-25', '2022-03-27', '1000000', '2345', '102', '2345');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
  `id_tamu` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_tamu` char(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nik`, `alamat`, `nama_tamu`, `no_telp`) VALUES
('1234', '1234', 'batam', 'sefry', '1234'),
('2345', '2345', 'batam', 'asep', '2345');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD CONSTRAINT `resepsionis_ibfk_1` FOREIGN KEY (`id_resepsionis`) REFERENCES `reservasi` (`id_resepsionis`);

--
-- Constraints for table `tamu`
--
ALTER TABLE `tamu`
  ADD CONSTRAINT `tamu_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `reservasi` (`id_tamu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
