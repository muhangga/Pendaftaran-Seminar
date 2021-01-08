-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 06:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktek_lapang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`, `akses`) VALUES
(1, 'Muhammad Angga', 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'angga', 'angga', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal` varchar(244) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `id_user`, `email`, `nama`, `instansi`, `alamat`, `jenis_kelamin`, `no_hp`, `tanggal`, `status`) VALUES
(55, 33, 'anggayasdoe11@gmail.com', 'Muhammad Angga', 'Universitas Pakuan', 'Jln Pakuan', 'Laki-laki', '086471771313', '08/01/2021 06:16:20', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sertifikat`
--

CREATE TABLE `tbl_sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sertifikat`
--

INSERT INTO `tbl_sertifikat` (`id_sertifikat`, `id_user`, `nama`, `instansi`, `status`) VALUES
(20, 33, 'Muhammad Angga', 'Universitas Pakuan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `akses`) VALUES
(33, 'Muhammad Angga', 'user', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
