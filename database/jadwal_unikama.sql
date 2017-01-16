-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 02:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jadwal_unikama`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE IF NOT EXISTS `approve` (
`id_pesan` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `id_ruang` varchar(10) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `id_ruang` varchar(10) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
('r123 ', 'Aula Sarwakirti'),
('r124 ', 'Aula Multikultural'),
('r145 ', 'Ruang J2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
`kd_jadwal` int(10) NOT NULL,
  `nidn` varchar(20) NOT NULL DEFAULT '0',
  `nama_staff` varchar(100) NOT NULL DEFAULT '0',
  `hari` varchar(10) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `ruang` varchar(50) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `nidn`, `nama_staff`, `hari`, `tgl_awal`, `tgl_akhir`, `ruang`, `status`) VALUES
(1, '123456', 'Khafidzun Fadli, S.Kom', 'Selasa', '2016-11-02', '2016-11-02', 'Ruang J2', 'Di Terima'),
(2, '123456', 'Khafidzun Fadli, S.Kom', 'Rabu', '2016-11-02', '2016-11-02', 'Ruang J2', 'Di Terima'),
(3, '123456', 'Khafidzun Fadli, S.Kom', 'Kamis', '2016-11-02', '2016-11-02', 'Aula Sarwakirti', 'Di Terima'),
(4, '123456', 'Khafidzun Fadli, S.Kom', 'Senin', '2016-11-02', '2016-11-02', 'Aula Multikultural', 'Di Terima'),
(5, '245245', 'Sunan Gunung Jati', 'Sabtu', '2016-11-04', '2016-11-04', 'Aula Multikultural', 'Di Terima'),
(6, '130403020039', 'RA. Naila Amani Maulida Haq, S.S', 'Kamis', '2016-11-08', '2016-11-08', 'Aula Multikultural', 'Di Tolak'),
(7, '130403020039', 'RA. Naila Amani Maulida Haq, S.S', 'Kamis', '2016-11-11', '2016-11-11', 'Ruang J2', 'Pending'),
(9, '130403020039', 'RA. Naila Amani Maulida Haq, S.S', 'Rabu', '2016-11-09', '2016-11-09', 'Aula Sarwakirti', 'Pending'),
(10, '245245', 'Sunan Gunung Jati', 'Sabtu', '2016-11-12', '2016-11-12', 'Aula Multikultural', 'Pending'),
(11, '123456', 'Khafidzun Fadli, S.Kom', 'Kamis', '2016-11-10', '2016-11-10', 'Aula Multikultural', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `nidn` varchar(20) NOT NULL,
  `nama_staff` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `alamat_staff` varchar(100) NOT NULL,
  `status_staff` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`nidn`, `nama_staff`, `fakultas`, `prodi`, `alamat_staff`, `status_staff`) VALUES
('1111', 'Nanang, S.Kom', 'BAU', 'BAU', 'Ada deh. Kepo amat jadi orang', 'Tetap'),
('123456', 'Khafidzun Fadli, S.Kom', 'Sains dan Teknologi', 'Sistem Informasi', 'Jl. Mergan No. 48 Malang - Jawa Timur', 'Tidak Tetap'),
('130403020039', 'RA. Naila Amani Maulida Haq, S.S', 'Humaniora', 'Bahasa dan Sastra Inggris', 'Kangean Bukan Kangen', 'Tetap'),
('130403020040', 'Gilang Ramadhan, S.Pet', 'Pertanian', 'Peternakan', 'Bengkulu', 'Tetap'),
('2120202020', 'Fathur Rohim, M.Kom', 'Sains dan Teknologi', 'Sistem Informasi', 'Perumahan Araya', 'Tetap'),
('245245', 'Sunan Gunung Jati', 'Humaniora', 'Sastra Inggris', 'Mau Tau aja apa mau tau banget?', 'Tidak Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `nidn` varchar(20) NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `role` enum('admin','member','approve') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nidn`, `username`, `password`, `email`, `nama_staff`, `role`) VALUES
(1, '2120202020', 'admin', 'misunikama', 'admin@unikama.ac.id', 'Fathur Rohim, M.Kom', 'admin'),
(3, '123456', 'member', 'member', 'member@unikama.ac.id', 'Khafidzun Fadli, S.Kom', 'member'),
(4, '1111', 'approve', 'approve', 'approve@unikama.ac.id', 'Nanang, S.Kom', 'approve'),
(8, '245245', 'sunan', 'sunan', 'sunan@unikama.ac.id', 'Sunan Gunung Jati', 'member'),
(9, '130403020039', 'naila', 'naila', 'naila@unikama.ac.id', 'RA. Naila Amani Maulida Haq, S.S', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
 ADD PRIMARY KEY (`id_pesan`), ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
 ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
 ADD PRIMARY KEY (`kd_jadwal`), ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
 ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`), ADD KEY `nidn` (`nidn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
MODIFY `kd_jadwal` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
