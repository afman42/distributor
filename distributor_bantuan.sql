-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 04:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distributor_bantuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita_acara`
--

CREATE TABLE `tb_berita_acara` (
  `id_berita_acara` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `berita` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `id_jenis_bencana` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_donasi`
--

CREATE TABLE `tb_detail_donasi` (
  `id_detail` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_donatur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_donasi`
--

INSERT INTO `tb_detail_donasi` (`id_detail`, `id_donasi`, `nama_barang`, `jumlah`, `keterangan`, `id_donatur`) VALUES
(1, 1, 'Indomie ', 1, 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_donasi`
--

CREATE TABLE `tb_donasi` (
  `id_donasi` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_donasi`
--

INSERT INTO `tb_donasi` (`id_donasi`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'uploads/gambar.jpg', 'Awowkwkw', '2020-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donatur`
--

CREATE TABLE `tb_donatur` (
  `id_donatur` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_donatur` enum('individual','organisasi','instansi','perusahaan') NOT NULL,
  `nama_gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_donatur`
--

INSERT INTO `tb_donatur` (`id_donatur`, `email`, `nohp`, `nama`, `alamat`, `jenis_donatur`, `nama_gedung`) VALUES
(1, 'aku@example.com', '08123456', 'arman', 'Jln Sui Raya Dalam', 'individual', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_bencana`
--

CREATE TABLE `tb_jenis_bencana` (
  `id_jenis_bencana` int(11) NOT NULL,
  `nama_bencana` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  ADD PRIMARY KEY (`id_berita_acara`);

--
-- Indexes for table `tb_detail_donasi`
--
ALTER TABLE `tb_detail_donasi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tb_donatur`
--
ALTER TABLE `tb_donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `tb_jenis_bencana`
--
ALTER TABLE `tb_jenis_bencana`
  ADD PRIMARY KEY (`id_jenis_bencana`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita_acara`
--
ALTER TABLE `tb_berita_acara`
  MODIFY `id_berita_acara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_donasi`
--
ALTER TABLE `tb_detail_donasi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_donatur`
--
ALTER TABLE `tb_donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenis_bencana`
--
ALTER TABLE `tb_jenis_bencana`
  MODIFY `id_jenis_bencana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
