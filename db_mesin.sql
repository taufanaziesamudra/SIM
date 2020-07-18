-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 08:58 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mesin`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` varchar(10) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
('BSI-DV001', 'Maintenance'),
('BSI-DV002', 'Produksi'),
('BSI-DV003', 'Moldshop'),
('BSI-DV010', 'Machining');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(3) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` varchar(10) NOT NULL,
  `nama_mesin` varchar(50) NOT NULL,
  `merk_mesin` varchar(20) NOT NULL,
  `kapasitas` varchar(10) NOT NULL,
  `id_divisi` varchar(10) NOT NULL,
  `tahun_pembuatan` int(4) NOT NULL,
  `periode_pakai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `nama_mesin`, `merk_mesin`, `kapasitas`, `id_divisi`, `tahun_pembuatan`, `periode_pakai`) VALUES
('BSI-MC001', 'MAC NO 1', 'Mitsubishi', '100T', 'BSI-DV003', 1990, 2017),
('BSI-MC002', 'MAC NO 2', 'LG', '500T', 'BSI-DV003', 2017, 2017),
('BSI-MC003', 'MAC NO 3', 'Toshiba', '200 T', 'BSI-DV003', 1998, 1999),
('BSI-MC004', 'MAC NO 4', 'Leak Tester', '100 Kg', 'BSI-DV004', 2016, 2016),
('BSI-MC010', 'MAC NO 5', 'Mesin Las', '70 Kg', 'BSI-DV001', 2016, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_jadwal` varchar(10) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `id_divisi` varchar(10) NOT NULL,
  `id_mesin` varchar(10) NOT NULL,
  `id_teknisi` varchar(10) NOT NULL,
  `point_chek` varchar(30) NOT NULL,
  `tgl_jadwal` varchar(10) NOT NULL,
  `status` enum('Open','Closed','Waiting') NOT NULL DEFAULT 'Open',
  `id_vendor` varchar(10) NOT NULL,
  `id_sparepart` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `time_start` time NOT NULL,
  `time_finish` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_jadwal`, `tgl`, `id_divisi`, `id_mesin`, `id_teknisi`, `point_chek`, `tgl_jadwal`, `status`, `id_vendor`, `id_sparepart`, `quantity`, `time_start`, `time_finish`) VALUES
('BSI-SC001', '2017-09-30', 'BSI-DV003', 'BSI-MC005', 'BSI-US001', 'Filter Pelumas', '2017-10-07', 'Closed', 'BSI-V00002', 'BSI-SP0003', '100', '11:11:11', '11:11:11'),
('BSI-SC002', '2017-09-28', 'BSI-DV003', 'BSI-MC001', 'BSI-US001', 'Pembersih Stainer', '2017-09-28', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-SC003', '2017-09-29', 'BSI-DV002', 'BSI-MC002', 'BSI-US001', 'Pembersih Stainer', '2017-09-29', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-SC004', '2017-10-13', 'BSI-DV003', 'BSI-MC003', 'BSI-US001', 'Oil Coller', '2017-10-16', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-SC005', '2017-10-28', 'BSI-DV001', 'BSI-MC005', 'BSI-US001', 'Filter Oil', '2017-10-05', 'Open', '', '', '', '00:00:00', '00:00:00'),
('BSI-SC006', '2017-10-30', 'BSI-DV001', 'BSI-MC010', 'BSI-US001', 'Filter Pelumas', '2017-10-31', 'Closed', 'BSI-V00002', 'BSI-SP0003', '21', '03:43:44', '21:21:21'),
('BSI-SC007', '2017-09-28', 'BSI-DV003', 'BSI-MC002', '', 'Pembersih Stainer', '2017-10-19', 'Open', 'BSI-V00002', 'BSI-SP0004', '11', '10:40:39', '22:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` varchar(10) NOT NULL,
  `tgl_buat` varchar(10) NOT NULL,
  `id_mesin` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_teknisi` varchar(10) NOT NULL,
  `status` enum('Open','Closed','Waiting') NOT NULL DEFAULT 'Open',
  `id_vendor` varchar(10) NOT NULL,
  `id_sparepart` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `time_start` time NOT NULL,
  `time_finish` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `tgl_buat`, `id_mesin`, `id_user`, `judul`, `keterangan`, `id_teknisi`, `status`, `id_vendor`, `id_sparepart`, `quantity`, `time_start`, `time_finish`) VALUES
('BSI-TC001', '2017-09-28', 'BSI-MC001', 'BSI-US001', 'Mesin Mati', 'Mesin Tiba tiba mati', 'BSI-US001', 'Closed', 'BSI-V00002', 'BSI-SP0003', '12', '00:00:00', '00:00:00'),
('BSI-TC0010', '2017-10-06', 'BSI-MC004', 'BSI-US001', 'kkkkkkkkk', 'lllllllllllllll', '', 'Open', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC002', '2017-09-29', 'BSI-MC002', 'BSI-US001', 'Mesin Macet', 'Mesin Tiba tiba macet dan kelu', 'BSI-US001', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC003', '2017-09-29', 'BSI-MC001', 'BSI-US003', 'Temperatur Over', 'Part Kosong', 'BSI-US001', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC004', '2017-09-29', 'BSI-MC002', 'BSI-US003', 'Kipas tidak berfungsi', 'Kipas Tidak jalan atau macet', 'BSI-US001', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC005', '2017-10-13', 'BSI-MC004', 'BSI-US001', 'Mesin Meledak', 'Tidak Beroperasi', 'BSI-US001', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC006', '2017-10-13', 'BSI-MC002', 'BSI-US003', 'Sensor Mati', 'Error', 'BSI-US002', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC007', '2017-10-13', 'BSI-MC004', 'BSI-US003', 'Cylinder Error', 'Ga jalan', 'BSI-US001', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC008', '2017-10-15', 'BSI-MC004', 'BSI-US003', 'Bearing Macet', 'Tidak Beroperasi', 'BSI-US001', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC009', '2017-10-15', 'BSI-MC001', 'BSI-US003', 'Error', 'Tidak Beroperasi', 'BSI-US002', 'Closed', '', '', '', '00:00:00', '00:00:00'),
('BSI-TC010', '2017-10-11', 'BSI-MC001', 'BSI-US001', 'sadasdadsa', 'asddasdsadasd', '', 'Open', 'BSI-V00002', 'BSI-SP0003', '212', '12:21:21', '03:23:23'),
('BSI-TC011', '2017-10-01', 'BSI-MC003', 'BSI-US001', 'bbbbbbbbbbbbbbbbb', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'BSI-US001', 'Waiting', 'BSI-V00002', 'BSI-SP0003', '2222', '11:11:11', '22:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` varchar(10) NOT NULL,
  `nm_sparepart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `nm_sparepart`) VALUES
('BSI-SP0003', 'sparepart3'),
('BSI-SP0004', 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` varchar(10) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('BSI-ST001', 'Open'),
('BSI-ST002', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(10) NOT NULL,
  `nama_teknisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama_teknisi`) VALUES
('BSI-TK001', 'Samin'),
('BSI-TK010', 'Tohirin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(9) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_divisi` varchar(10) NOT NULL,
  `level` enum('admin','user','teknisi') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `id_divisi`, `level`) VALUES
('BSI-US001', 'Administrator', 'admin', 'BSI-DV001', 'admin'),
('BSI-US002', 'Yanto', 'teknisi', 'BSI-DV001', 'teknisi'),
('BSI-US010', 'User', 'user', 'BSI-DV003', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` varchar(10) NOT NULL,
  `nm_vendor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nm_vendor`) VALUES
('BSI-V00002', 'ddddddddddddddd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
