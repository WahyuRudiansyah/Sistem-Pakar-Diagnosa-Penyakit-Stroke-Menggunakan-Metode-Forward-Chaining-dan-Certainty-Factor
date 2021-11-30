-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 04:49 AM
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
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kd_pengetahuan` int(10) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_gejala` varchar(225) NOT NULL,
  `nilai_cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kd_pengetahuan`, `kd_penyakit`, `kd_gejala`, `nilai_cf`) VALUES
(1, 'P2', 'G4', 0.8),
(2, 'P2', 'G7', 0.8),
(3, 'P2', 'G8', 0.8),
(4, 'P2', 'G10', 0.8),
(5, 'P2', 'G11', 0.8),
(6, 'P2', 'G12', 0.8),
(7, 'P3', 'G1', 1),
(8, 'P3', 'G2', 1),
(9, 'P3', 'G3 ', 1),
(10, 'P3', 'G4', 0.8),
(11, 'P3', 'G5', 1),
(12, 'P3', 'G6', 0.8),
(13, 'P3', 'G7', 0.8),
(14, 'P3', 'G8', 0.8),
(15, 'P3', 'G9', 0.8),
(16, 'P3', 'G12', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `dataadmin`
--

CREATE TABLE `dataadmin` (
  `kd_admin` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
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
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datagejala`
--

INSERT INTO `datagejala` (`kd_gejala`, `nama_gejala`) VALUES
('G1', 'Nyeri atau Sakit Kepala Hebat Tiba-tiba'),
('G10', 'Disatria atau melemahnya otot yang digunakan untuk bicara sehingga bicara lambat/tidak jelas'),
('G11', 'Lupa Mendadak'),
('G12', 'Kesulitan Menelan, Membaca dan Menulis'),
('G2', 'Muntah Nyemprot'),
('G3 ', 'Pandangan Kabur'),
('G4', 'Pelo atau Gangguan Berbicara'),
('G5', 'Penurunan Kesadaran'),
('G6', 'Kejang'),
('G7', 'Perot atau Mencong pada bagian mulut'),
('G8', 'Anggota Gerak pada Tubuh Melemah'),
('G9', 'Leher Kaku');

-- --------------------------------------------------------

--
-- Table structure for table `datapasien`
--

CREATE TABLE `datapasien` (
  `kd_pasien` int(10) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(5) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapasien`
--

INSERT INTO `datapasien` (`kd_pasien`, `nama_pasien`, `jenis_kelamin`, `usia`, `email`, `alamat`) VALUES
(1, 'Agus', 'Laki-laki', 45, 'agus@gmail.com', 'Cikarang'),
(2, 'Faith', 'Perempuan', 35, 'wahyurudiyansah@ymail.com', 'Bekasi'),
(3, 'Virza', '1', 40, 'Virza@gmail.com', 'Cikarang'),
(4, 'Zahra', '2', 55, 'zahra@gmail.com', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `datapenyakit`
--

CREATE TABLE `datapenyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `saran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapenyakit`
--

INSERT INTO `datapenyakit` (`kd_penyakit`, `nama_penyakit`, `keterangan`, `saran`) VALUES
('P1', 'Tidak Terindikasi Stroke', 'Berdasarkan gejala yang anda alami dan pilih pada halaman sebelumnya, anda tidak terindikasi mengalami Stroke.  ', 'Tetap jaga kesehatan dan menjaga pola hidup sehat, rajin berolahraga, kurangi makan-makanan tidak sehat, dan hindari merokok.'),
('P2', 'Stroke Iskemik', 'Stroke Iskemik terjadi ketika aliran darah ke otak terjadi penyumbatan oleh darah yang beku', 'Apabila terjadi serangan Stroke tiba-tiba (akut), maka pasien harus cepat di antar ke RS yang memiliki praktek Dr. Spesialis Saraf dan fasilitas lengkap untuk pasien mendapatkan tindakan lanjutan seperti pemeriksaan dengan alat CT Scan.'),
('P3', 'Stroke Hemoragik', 'Stroke Hemoragik terjadi ketika pecahnya pembuluh darah sehingga berdarah ke dalam otak. Pecahnya pembuluh darah karena lemahnya dinding pembuluh darah', 'Apabila terjadi serangan Stroke tiba-tiba (akut), maka pasien harus cepat di antar ke RS yang memiliki praktek Dr. Spesialis Saraf dan fasilitas lengkap untuk pasien mendapatkan tindakan lanjutan seperti pemeriksaan dengan alat CT Scan.');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_konsultasi`
--

CREATE TABLE `hasil_konsultasi` (
  `kd_hasil` int(11) NOT NULL,
  `kd_konsultasi` int(11) NOT NULL,
  `kd_pasien` int(11) NOT NULL,
  `kd_penyakit` varchar(50) NOT NULL,
  `nilai_akurasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `kd_kondisi` int(10) NOT NULL,
  `kondisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`kd_kondisi`, `kondisi`) VALUES
(1, 'Tidak'),
(2, 'Sedikit Yakin'),
(3, 'Cukup Yakin'),
(4, 'Yakin'),
(5, 'Sangat Yakin');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `kd_konsultasi` int(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `penyakit` text NOT NULL,
  `gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  ADD PRIMARY KEY (`kd_hasil`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`kd_kondisi`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`kd_konsultasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `kd_pengetahuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `datapasien`
--
ALTER TABLE `datapasien`
  MODIFY `kd_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil_konsultasi`
--
ALTER TABLE `hasil_konsultasi`
  MODIFY `kd_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `kd_kondisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `kd_konsultasi` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
