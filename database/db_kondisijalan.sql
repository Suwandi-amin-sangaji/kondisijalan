-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 13, 2022 at 03:43 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kondisijalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_baik`
--

CREATE TABLE `tb_baik` (
  `id_baik` int(5) NOT NULL,
  `id_jalan` int(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berat`
--

CREATE TABLE `tb_berat` (
  `id_berat` int(5) NOT NULL,
  `id_jalan` int(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berat`
--

INSERT INTO `tb_berat` (`id_berat`, `id_jalan`, `keterangan`, `lat`, `lon`) VALUES
(20, 65, 'Jumlah Lubang 3, Ukuran Lubang 3, dan Bekas Roda 3', '-0.9016158221207092', '131.31695869354246');

-- --------------------------------------------------------

--
-- Table structure for table `tb_centroid`
--

CREATE TABLE `tb_centroid` (
  `id_centroid` int(5) NOT NULL,
  `cluster` varchar(50) NOT NULL,
  `jum_lubang` varchar(50) NOT NULL,
  `uk_lubang` varchar(50) NOT NULL,
  `bekas_roda` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_centroid`
--

INSERT INTO `tb_centroid` (`id_centroid`, `cluster`, `jum_lubang`, `uk_lubang`, `bekas_roda`, `ket`) VALUES
(1, 'C1', '4', '1', '3', 'Berat'),
(2, 'C2', '1', '1', '1', 'Baik'),
(3, 'C3', '2', '2', '1', 'Sedang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_centroida`
--

CREATE TABLE `tb_centroida` (
  `id_centroida` int(5) NOT NULL,
  `cluster` varchar(50) NOT NULL,
  `jum_lubang` varchar(50) NOT NULL,
  `uk_lubang` varchar(50) NOT NULL,
  `bekas_roda` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_centroida`
--

INSERT INTO `tb_centroida` (`id_centroida`, `cluster`, `jum_lubang`, `uk_lubang`, `bekas_roda`, `ket`) VALUES
(1, 'C1', '3.33', '1', '2.33', 'Berat'),
(2, 'C2', '1.06', '1.03', '1.49', 'Baik'),
(3, 'C3', '2.25', '2', '1.17', 'Sedang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_centroidp`
--

CREATE TABLE `tb_centroidp` (
  `id_centroidp` int(5) NOT NULL,
  `cluster` varchar(50) NOT NULL,
  `jum_lubang` varchar(50) NOT NULL,
  `uk_lubang` varchar(50) NOT NULL,
  `bekas_roda` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_centroidp`
--

INSERT INTO `tb_centroidp` (`id_centroidp`, `cluster`, `jum_lubang`, `uk_lubang`, `bekas_roda`, `ket`) VALUES
(1, 'C1', '3', '3', '3', 'Berat'),
(2, 'C2', 'NAN', 'NAN', 'NAN', 'Baik'),
(3, 'C3', '3', '2', '1', 'Sedang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jalan`
--

CREATE TABLE `tb_jalan` (
  `id_jalan` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jalan`
--

INSERT INTO `tb_jalan` (`id_jalan`, `nama`, `ket`) VALUES
(4, 'Jl. Diponegoro 0m-200m', '-'),
(6, 'Jl. Sapta Taruna 0m-200m', '-'),
(7, 'Jl. Samratulangi 0m-97m', '-'),
(8, 'Jl. G. Isuzu 0m-200m', '-'),
(9, 'Jl. F. Kalasuat 0m-200m', '-'),
(11, 'Jl. G. Tidar 0m-200m', '-'),
(12, 'Jl. Pramuka 0m-200m', '-'),
(16, 'Jl .Kembang Sepatu 0m-200m', '-'),
(17, 'Jl. Tulip 0m-200m', '-'),
(18, 'Jl. Yos Sudarso 0m-200m', '-'),
(19, 'Jl. Arteri 0m-200m', '-'),
(20, 'Jl. Handayani 0m-200m', '-'),
(21, 'Jl. Bangau 0m-200m', '-'),
(22, 'Jl. Jendral Sudirman 0m-200m ', '-'),
(23, 'Jl. Selat Madura 0m-200m', '-'),
(24, 'Jl. Sungai Mamberamo 0m-200m', '-'),
(25, 'Jl. Sungai Maruni 0m-200m', '-'),
(26, 'Jl. Danau Maninjau 0m-200m', '-'),
(27, 'Jl. Trikora 0m-103m', '-'),
(28, 'Jl. Bukit Zaitun 0m-200m', '-'),
(29, 'Jl. G. Karakatau 0m-200m', '-'),
(30, 'Jl. Mangga 0m-152m', '-'),
(31, 'Jl. Melati Raya 0m-101m', '-'),
(32, 'Jl. Selat Bali 0m-111m', '-'),
(33, 'Jl. Victory 0m-122m', '-'),
(34, 'Jl. Puncak Rafidin 0m-200m', '-'),
(35, 'Jl. D. Pattimura 0m-200m', '-'),
(36, 'Jl. RA Kartini 0m-200m', '-'),
(37, 'Jl. Lumba-Lumba 0m-186m', '-'),
(39, 'Jl. Udang 0m-200m', '-'),
(40, 'Jl. Unta 0m-200m', '-'),
(41, 'Jl. Vihara Boswesen 0m-200m', '-'),
(42, 'Jl. Tenggiri Raya 0m-200m', '-'),
(43, 'Jl. Selat Lombok 0m-200m', '-'),
(44, 'Jl. Selat Sunda 0m-200m', '-'),
(45, 'Jl. Srikandi 0m-200m', '-'),
(46, 'Jl. P. Waigeo 0m-200m', '-'),
(47, 'Jl. Selat Malaka 0m-200m', '-'),
(49, 'Jl. Cendrawasih 0m-200m', '-'),
(50, 'Jl. Bunga Kamboja 0m-086', '-'),
(51, 'Jl. Danau Tigi 0m-200m', '-'),
(53, 'Jl. Kasuari 0-150m', '-'),
(54, 'Jl. Baru belakang gor 0m-90m', '-'),
(55, 'Jl. Jakarta Selatan 0m-150m', '-'),
(56, 'Jl. Bandung Raya 0m-200m', '-'),
(57, 'Jl. Madura Barat 0m-100m', '-'),
(61, 'Jl. I. Cakalang 0m-133m', '-'),
(62, 'Jl. G. Rinjani 0m-200m', '-'),
(64, 'Jln G. Afrak', '-'),
(65, 'Jl. Malibela 0m-128m', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerusakan`
--

CREATE TABLE `tb_kerusakan` (
  `id_kerusakan` int(5) NOT NULL,
  `id_jalan` int(5) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jum_lubang` varchar(50) NOT NULL,
  `uk_lubang` varchar(50) NOT NULL,
  `bekas_roda` varchar(50) NOT NULL,
  `cluster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerusakan`
--

INSERT INTO `tb_kerusakan` (`id_kerusakan`, `id_jalan`, `foto`, `jum_lubang`, `uk_lubang`, `bekas_roda`, `cluster`) VALUES
(60, 64, '393-ilustrasi-jalan-rusak.jpeg', '3', '2', '2', 'C3'),
(62, 65, 'lt5a954d70cd9dd.jpeg', '3', '3', '2', 'C1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `level`, `foto`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'avatar-2.jpg', 'Admin', 'Admin', '12345'),
(3, 'Pemantau', 'avatar-4.jpg', 'Pemantau', 'Pemantau', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sedang`
--

CREATE TABLE `tb_sedang` (
  `id_sedang` int(5) NOT NULL,
  `id_jalan` int(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sedang`
--

INSERT INTO `tb_sedang` (`id_sedang`, `id_jalan`, `keterangan`, `lat`, `lon`) VALUES
(14, 64, 'Jumlah Lubang 3, Ukuran Lubang 2, dan Bekas Roda 1', '-0.8834219238851184', '131.2684643545532');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_baik`
--
ALTER TABLE `tb_baik`
  ADD PRIMARY KEY (`id_baik`),
  ADD KEY `id_jalan` (`id_jalan`);

--
-- Indexes for table `tb_berat`
--
ALTER TABLE `tb_berat`
  ADD PRIMARY KEY (`id_berat`),
  ADD KEY `id_jalan` (`id_jalan`);

--
-- Indexes for table `tb_centroid`
--
ALTER TABLE `tb_centroid`
  ADD PRIMARY KEY (`id_centroid`);

--
-- Indexes for table `tb_centroida`
--
ALTER TABLE `tb_centroida`
  ADD PRIMARY KEY (`id_centroida`);

--
-- Indexes for table `tb_centroidp`
--
ALTER TABLE `tb_centroidp`
  ADD PRIMARY KEY (`id_centroidp`);

--
-- Indexes for table `tb_jalan`
--
ALTER TABLE `tb_jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indexes for table `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`),
  ADD KEY `id_jalan` (`id_jalan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_sedang`
--
ALTER TABLE `tb_sedang`
  ADD PRIMARY KEY (`id_sedang`),
  ADD KEY `id_jalan` (`id_jalan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_baik`
--
ALTER TABLE `tb_baik`
  MODIFY `id_baik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_berat`
--
ALTER TABLE `tb_berat`
  MODIFY `id_berat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_centroid`
--
ALTER TABLE `tb_centroid`
  MODIFY `id_centroid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_centroida`
--
ALTER TABLE `tb_centroida`
  MODIFY `id_centroida` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_centroidp`
--
ALTER TABLE `tb_centroidp`
  MODIFY `id_centroidp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jalan`
--
ALTER TABLE `tb_jalan`
  MODIFY `id_jalan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  MODIFY `id_kerusakan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sedang`
--
ALTER TABLE `tb_sedang`
  MODIFY `id_sedang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
