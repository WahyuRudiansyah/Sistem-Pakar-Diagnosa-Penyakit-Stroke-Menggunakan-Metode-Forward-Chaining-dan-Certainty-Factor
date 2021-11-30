-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 11:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispakta`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `kd_artikel` int(10) NOT NULL,
  `kd_admin` varchar(20) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `ringkasan` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kd_pengetahuan` varchar(10) NOT NULL,
  `kd_penyakit` int(10) NOT NULL,
  `kd_gejala` int(10) NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dataadmin`
--

CREATE TABLE `dataadmin` (
  `kd_admin` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataadmin`
--

INSERT INTO `dataadmin` (`kd_admin`, `username`, `password`, `nama`) VALUES
('A1', 'wahyurudi', 'wahyurudi123', 'Wahyu Rudiansyah');

-- --------------------------------------------------------

--
-- Table structure for table `datagejala`
--

CREATE TABLE `datagejala` (
  `kd_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datagejala`
--

INSERT INTO `datagejala` (`kd_gejala`, `nama_gejala`) VALUES
('G1', 'Sakit Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `datapasien`
--

CREATE TABLE `datapasien` (
  `kd_pasien` int(10) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `usia` int(5) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datapenyakit`
--

CREATE TABLE `datapenyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(20) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `saran` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `kd_kondisi` int(10) NOT NULL,
  `ket_kondisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`kd_artikel`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kd_pengetahuan`);

--
-- Indexes for table `dataadmin`
--
ALTER TABLE `dataadmin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `datagejala`
--
ALTER TABLE `datagejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `datapasien`
--
ALTER TABLE `datapasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `datapenyakit`
--
ALTER TABLE `datapenyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`kd_kondisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapasien`
--
ALTER TABLE `datapasien`
  MODIFY `kd_pasien` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
