-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 06:53 PM
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
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$1$OB0.9a0.$A2DsfqZL1cwPVNtpcsrc6/', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `bimbel`
--

CREATE TABLE `bimbel` (
  `bimbel_id` int(11) NOT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbel`
--

INSERT INTO `bimbel` (`bimbel_id`, `pengajar_id`, `nama`) VALUES
(2, 3, 'Bahasa Mandarin'),
(3, 2, 'Matematika'),
(4, 3, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama`) VALUES
(3, 'Playgroup'),
(4, 'TK Kecil'),
(5, 'TK Sedang'),
(6, 'TK Besar'),
(7, 'SD Kelas 1'),
(8, 'SD Kelas 2'),
(9, 'SD Kelas 3'),
(10, 'SD Kelas 4'),
(11, 'SD Kelas 5'),
(12, 'SD Kelas 6'),
(13, 'SMP Kelas 1'),
(14, 'SMP Kelas 2'),
(15, 'SMP Kelas 3'),
(16, 'SMA Kelas 1'),
(17, 'SMA Kelas 2'),
(19, 'SMA Kelas 3');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `murid_id` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `materi_id` int(11) NOT NULL,
  `sekolah_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `bimbel_id` int(11) DEFAULT NULL,
  `judul` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_terbit` date NOT NULL,
  `file_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`materi_id`, `sekolah_id`, `kelas_id`, `bimbel_id`, `judul`, `keterangan`, `tgl_terbit`, `file_location`) VALUES
(1, 1, 3, 2, 'Dasar Matematika', 'Materi untuk Playgroup', '2016-10-03', 'test'),
(2, 1, 3, 2, 'Materi Dasar Bimbel', 'Untuk Pengajar', '2016-10-03', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `murid_id` int(11) NOT NULL,
  `sekolah_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `bimbel_id` int(11) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`murid_id`, `sekolah_id`, `kelas_id`, `bimbel_id`, `nama`, `tgl_lahir`, `jk`, `alamat`, `nama_ortu`, `tlp`) VALUES
(5, 2, 4, 3, 'Dian Wahyudi', '1997-10-19', 'Laki-laki', 'Tiban 1', 'Ibu Ratna', '0812 6630 0555'),
(6, 1, 3, 2, 'Yudi', '1998-10-02', 'Laki-laki', 'Sekupang', 'Hasan', '0867 3213 1213');

-- --------------------------------------------------------

--
-- Table structure for table `naik_kelas`
--

CREATE TABLE `naik_kelas` (
  `naik_kelas_id` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `pengajar_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`pengajar_id`, `nama`, `umur`, `jk`, `alamat`, `tlp`) VALUES
(2, 'Sanda', 27, 'Laki-laki', 'Tiban 3 Batam', '0812 6630 3990'),
(3, 'Jessica', 24, 'perempuan', 'Batam Centre', '0812 3660 2440');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `sekolah_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`sekolah_id`, `nama`, `jenis`, `alamat`, `tlp`) VALUES
(1, 'Sekolah Advent', 'Nasional', 'JL. Teratai Blok V Kota Batam Kepulauan Riau 29441', '0778 - 429355'),
(2, 'Sekolah Ananda', 'Nasional', 'JL. Taman indah baloi Blok III Lubuk Baja, Kota Batam\r\n', '0778 - 455029'),
(3, 'Sekolah Avava', 'Nasional Plus', 'Komplek Nagoya Point No.01\r\n', '0778 - 430214'),
(6, 'Sekolah Basic', 'Nasional Plus', 'Kawasan Industri No. 1 Simpang Frangky, Taman Baloi\r\n', '0778 - 460817');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `bimbel`
--
ALTER TABLE `bimbel`
  ADD PRIMARY KEY (`bimbel_id`),
  ADD KEY `pengajar_id` (`pengajar_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `murid_id` (`murid_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `sekolah_id` (`sekolah_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `bimbel_id` (`bimbel_id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`murid_id`),
  ADD KEY `sekolah_id` (`sekolah_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `bimbel_id` (`bimbel_id`);

--
-- Indexes for table `naik_kelas`
--
ALTER TABLE `naik_kelas`
  ADD PRIMARY KEY (`naik_kelas_id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `start` (`start`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`pengajar_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`sekolah_id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bimbel`
--
ALTER TABLE `bimbel`
  MODIFY `bimbel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `materi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `murid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `naik_kelas`
--
ALTER TABLE `naik_kelas`
  MODIFY `naik_kelas_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `pengajar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbel`
--
ALTER TABLE `bimbel`
  ADD CONSTRAINT `fg_pengajar_id` FOREIGN KEY (`pengajar_id`) REFERENCES `pengajar` (`pengajar_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fg_murid_id` FOREIGN KEY (`murid_id`) REFERENCES `murid` (`murid_id`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fg-sekolah_id` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`sekolah_id`),
  ADD CONSTRAINT `fg_bimbel_id` FOREIGN KEY (`bimbel_id`) REFERENCES `bimbel` (`bimbel_id`),
  ADD CONSTRAINT `fg_kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`);

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `fg-bimbel_id` FOREIGN KEY (`bimbel_id`) REFERENCES `bimbel` (`bimbel_id`),
  ADD CONSTRAINT `fg-kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`),
  ADD CONSTRAINT `fg_sekolah_id` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`sekolah_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
