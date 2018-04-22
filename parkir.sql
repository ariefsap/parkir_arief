-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 06:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_book` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_mall` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `waktu_book` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_book`, `id_pengguna`, `id_mall`, `id_kendaraan`, `waktu_book`, `status`) VALUES
(1, 22, 53, 2, '19.00', 1),
(35, 22, 52, 2, '10.00', 0),
(36, 22, 54, 2, '09.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengguna`
--

CREATE TABLE `jenis_pengguna` (
  `id_jenis_pengguna` int(11) NOT NULL,
  `nama_jenis_pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`id_jenis_pengguna`, `nama_jenis_pengguna`) VALUES
(1, 'admin'),
(2, 'pengguna'),
(3, 'tukang parkir');

-- --------------------------------------------------------

--
-- Table structure for table `mall`
--

CREATE TABLE `mall` (
  `id_mall` int(11) NOT NULL,
  `nama_mall` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `slot_total` int(11) NOT NULL,
  `slot_terisi` int(11) NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `jam_buka` varchar(50) NOT NULL,
  `jam_tutup` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mall`
--

INSERT INTO `mall` (`id_mall`, `nama_mall`, `alamat`, `slot_total`, `slot_terisi`, `biaya`, `jam_buka`, `jam_tutup`, `deskripsi`, `url`) VALUES
(52, 'Hartono Mall', 'Jl. Ringroad Utara', 140, 0, '1000', '10.00', '22.00', 'Mall Baru', 'hartono.jpg'),
(53, 'Ambarukmo Plaza', 'Jl. Laksda Adisucipto No.80, Yogyakarta', 200, 0, '2000', '10.00', '23.00', 'Mall Lawas', 'amplas.jpg'),
(54, 'Jogja CIty Mall', 'Jalan Magelang KM.6 No.18, Yogyakarta', 200, 0, '2000', '09.00', '23.00', 'Mall Baru', 'jcm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_pengguna`
--

CREATE TABLE `mobil_pengguna` (
  `id_mobil` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `plat_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil_pengguna`
--

INSERT INTO `mobil_pengguna` (`id_mobil`, `id_pengguna`, `merek`, `warna`, `plat_no`) VALUES
(1, 1, 'Toyota', 'Hitam', 'R 2112 A'),
(2, 22, 'toyota avanza', 'merah', 'ab 1 boy');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_jenis_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat`, `no_hp`, `username`, `password`, `foto`, `id_jenis_pengguna`) VALUES
(1, 'anas', 'godean', '0', 'anasbayu', 'anas123', '', 1),
(22, 'boy', 'pugeran', '082225096542', 'boy', 'boy', 'fzn.jpg', 2),
(42, 'Luthfi Farhan', 'Bekasi', '085262511425', 'luthfi', 'luthfi', 'kutil.jpg', 3),
(44, 'Wahyu Septyanto', 'Jambi', '02933919211', 'Wahyu', 'wahyu', 'wahyu.jpg', 3),
(45, 'Deppi Boy', 'Seturan', '038327616122', 'boy', 'boy', 'boyy.jpg', 3),
(48, 'arief', 'jakata', '082225096541', 'arief', 'arief', '', 1),
(55, 'Redys Vita', 'Godean', '08222789361', 'redys', 'redys', 'redys.jpg', 2),
(56, 'tes', 'tes', '223456789', 'tes', 'tes', '2018_03_25_08_03_31pmsitebg.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `slot_parkir`
--

CREATE TABLE `slot_parkir` (
  `id_slot` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot_parkir`
--

INSERT INTO `slot_parkir` (`id_slot`, `status`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_mall` (`id_mall`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  ADD PRIMARY KEY (`id_jenis_pengguna`);

--
-- Indexes for table `mall`
--
ALTER TABLE `mall`
  ADD PRIMARY KEY (`id_mall`);

--
-- Indexes for table `mobil_pengguna`
--
ALTER TABLE `mobil_pengguna`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_jenis_pengguna` (`id_jenis_pengguna`);

--
-- Indexes for table `slot_parkir`
--
ALTER TABLE `slot_parkir`
  ADD PRIMARY KEY (`id_slot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  MODIFY `id_jenis_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mall`
--
ALTER TABLE `mall`
  MODIFY `id_mall` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `mobil_pengguna`
--
ALTER TABLE `mobil_pengguna`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_mall`) REFERENCES `mall` (`id_mall`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_kendaraan`) REFERENCES `mobil_pengguna` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobil_pengguna`
--
ALTER TABLE `mobil_pengguna`
  ADD CONSTRAINT `mobil_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_jenis_pengguna`) REFERENCES `jenis_pengguna` (`id_jenis_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
