-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2016 at 08:20 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_bwb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kode_admin` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(5) NOT NULL,
  `kode_sekolah` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `total_murid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `les`
--

CREATE TABLE `les` (
  `kode_les` varchar(5) NOT NULL,
  `kode_pengajar` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kuota_murid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `kode_login` varchar(20) NOT NULL,
  `kode_murid` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_materi` varchar(5) NOT NULL,
  `kode_admin` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `lokasi_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `kode_murid` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `kode_les` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` int(2) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `naik_kelas`
--

CREATE TABLE `naik_kelas` (
  `kode_naik` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `kode_pengajar` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` int(2) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `kode_sekolah` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `kelas_fk0` (`kode_sekolah`);

--
-- Indexes for table `les`
--
ALTER TABLE `les`
  ADD PRIMARY KEY (`kode_les`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `les_fk0` (`kode_pengajar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kode_login`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `login_fk0` (`kode_murid`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`),
  ADD KEY `materi_fk0` (`kode_admin`),
  ADD KEY `materi_fk1` (`kode_kelas`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`kode_murid`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `murid_fk0` (`kode_kelas`),
  ADD KEY `murid_fk1` (`kode_les`);

--
-- Indexes for table `naik_kelas`
--
ALTER TABLE `naik_kelas`
  ADD PRIMARY KEY (`kode_naik`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `start` (`start`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`kode_pengajar`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`kode_sekolah`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_fk0` FOREIGN KEY (`kode_sekolah`) REFERENCES `sekolah` (`kode_sekolah`);

--
-- Constraints for table `les`
--
ALTER TABLE `les`
  ADD CONSTRAINT `les_fk0` FOREIGN KEY (`kode_pengajar`) REFERENCES `pengajar` (`kode_pengajar`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_fk0` FOREIGN KEY (`kode_murid`) REFERENCES `murid` (`kode_murid`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_fk0` FOREIGN KEY (`kode_admin`) REFERENCES `admin` (`kode_admin`),
  ADD CONSTRAINT `materi_fk1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_fk0` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `murid_fk1` FOREIGN KEY (`kode_les`) REFERENCES `les` (`kode_les`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
