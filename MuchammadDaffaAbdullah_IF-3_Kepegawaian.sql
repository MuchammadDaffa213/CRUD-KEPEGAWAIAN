-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 12:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--
CREATE DATABASE IF NOT EXISTS `kepegawaian` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kepegawaian`;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gaji` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `deskripsi`, `gaji`) VALUES
(1, 'Direktur', 'Membuat visi misi bersama untuk perusahaan', 12000000),
(2, 'Manager', 'Menerjemahkan visi misi kedalam rencana aksi', 8000000),
(3, 'Kepala Operasional', 'Mengawasi jalannya operasional', 5500000),
(4, 'Pelaksana', 'Melaksanakan tugas sesuai arahan kepala', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

DROP TABLE IF EXISTS `kontrak`;
CREATE TABLE `kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `nama_kontrak` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`id_kontrak`, `nama_kontrak`, `tgl_mulai`, `durasi`) VALUES
(1, 'Kontrak 3 bulan', '2024-04-01', 90),
(2, 'Kontrak 40 hari', '2024-05-01', 40),
(3, 'Kontrak 50 hari', '2024-05-02', 50),
(5, 'WebDev Evaluasi - Ageng', '2024-05-05', 90);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(14) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_kontrak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_telpon`, `id_jabatan`, `id_kontrak`) VALUES
(10, 'abdul', 'majalaya', '0818828475', 2, 2),
(11, 'reza', 'purwakarta', '08181282381', 2, 1);

--
-- Triggers `pegawai`
--
DROP TRIGGER IF EXISTS `trigger_hapus_data`;
DELIMITER $$
CREATE TRIGGER `trigger_hapus_data` AFTER DELETE ON `pegawai` FOR EACH ROW BEGIN
	INSERT INTO pegawai_log (keterangan, waktu, nama, alamat, no_telpon) VALUES('Hapus Data', now(), old.nama, old.alamat, old.no_telpon) ; 
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_tambah_pegawai`;
DELIMITER $$
CREATE TRIGGER `trigger_tambah_pegawai` AFTER INSERT ON `pegawai` FOR EACH ROW BEGIN
	INSERT INTO pegawai_log (keterangan, waktu, nama, alamat, no_telpon) VALUES ('tambah', now() , new.nama, new.alamat, new.no_telpon);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_update_pegawai`;
DELIMITER $$
CREATE TRIGGER `trigger_update_pegawai` AFTER UPDATE ON `pegawai` FOR EACH ROW BEGIN INSERT INTO pegawai_log (keterangan, waktu, nama, alamat, no_telpon) VALUES ('Edit Data', now() , new.nama, new.alamat, new.no_telpon); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_log`
--

DROP TABLE IF EXISTS `pegawai_log`;
CREATE TABLE `pegawai_log` (
  `id_log` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `waktu` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'dapa', '444'),
(2, 'aldi', '1234'),
(3, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD UNIQUE KEY `nama_kontrak` (`nama_kontrak`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_jabatan` (`id_jabatan`),
  ADD KEY `fk_kontrak` (`id_kontrak`);

--
-- Indexes for table `pegawai_log`
--
ALTER TABLE `pegawai_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai_log`
--
ALTER TABLE `pegawai_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `fk_kontrak` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
