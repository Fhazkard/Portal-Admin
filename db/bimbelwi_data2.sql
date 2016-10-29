-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2016 at 01:51 PM
-- Server version: 10.0.27-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bimbelwi_data2`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `idadministrator` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `current_login` date NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`idadministrator`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`idadministrator`, `username`, `nama`, `password`, `current_login`, `last_login`) VALUES
(1, 'admin', 'Adminnn', '21232f297a57a5a743894a0e4a801fc3', '2016-10-24', '2016-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `idguru` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`idguru`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `username`, `nama`, `alamat`, `password`, `status`, `foto`) VALUES
('G004', 'userguru', 'Namaguru', 'Alamat', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif', 'foto/ss.jpeg'),
('G005', 'test', 'Sdfs', 'Sdfs', '4e55831e3a1585ef273394be01618028', 'Aktif', 'foto/1361800340.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idkelas` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `namaperiode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `nama`, `namaperiode`, `status`) VALUES
('K001', 'Bimbel Kelas 1', 'Ganjil, 2016-2017', 'aktif'),
('K002', 'Bimbel Kelas 2', 'Ganjil, 2016-2017', 'aktif'),
('K003', 'Bimbel Kelas 3', 'Ganjil, 2016-2017', 'aktif'),
('K004', 'Bimbel Kelas 4', 'Ganjil, 2016-2017', 'aktif'),
('K005', 'Bimbel Kelas 5', 'Ganjil, 2016-2017', 'aktif'),
('K006', 'Bimbel Kelas 6', 'Ganjil, 2016-2017', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_guru`
--

CREATE TABLE IF NOT EXISTS `kelas_guru` (
  `idkelas_guru` varchar(15) NOT NULL DEFAULT '',
  `namakelas` varchar(255) NOT NULL,
  `namaguru` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idkelas_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_guru`
--

INSERT INTO `kelas_guru` (`idkelas_guru`, `namakelas`, `namaguru`, `status`) VALUES
('KG001', 'Bimbel Kelas 1, Ganjil, 2016-2017', 'Rahmi Ayunda', 'aktif'),
('KG002', 'Bimbel Kelas 2, Ganjil, 2016-2017', 'Rahmi Ayunda', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE IF NOT EXISTS `kelas_siswa` (
  `idkelas_siswa` varchar(15) NOT NULL,
  `namasiswa` varchar(255) NOT NULL,
  `namakelas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idkelas_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`idkelas_siswa`, `namasiswa`, `namakelas`, `status`) VALUES
('KS001', 'User2', 'Bimbel Kelas 1, Ganjil, 2016-2017', 'aktif'),
('KS002', 'User', 'Bimbel Kelas 1, Ganjil, 2016-2017', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) NOT NULL,
  `kategori` int(2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `oleh` int(2) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materikategori`
--

CREATE TABLE IF NOT EXISTS `materikategori` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `materikategori`
--

INSERT INTO `materikategori` (`id`, `nama`, `status`) VALUES
(4, 'Bimbel Kelas 1', 'aktif'),
(5, 'Bimbel Kelas 2', 'aktif'),
(6, 'Bimbel Kelas 3', 'aktif'),
(7, 'Bimbel Kelas 4', 'aktif'),
(8, 'Bimbel Kelas 5', 'aktif'),
(9, 'Bimbel Kelas 6', 'aktif'),
(10, 'Bahasa Inggris', 'aktif'),
(11, 'Bahasa Mandarin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `idperiode` varchar(15) NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idperiode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`idperiode`, `tahun`, `semester`, `status`) VALUES
('P001', '2016-2017', 'Ganjil', 'Aktif'),
('P002', '2016-2017', 'Ganjil', 'Tidak_aktif');

-- --------------------------------------------------------

--
-- Table structure for table `perkembangn`
--

CREATE TABLE IF NOT EXISTS `perkembangn` (
  `idperkembangan` varchar(15) NOT NULL,
  `siswa` varchar(255) NOT NULL,
  `minggu` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `perkembangan` text NOT NULL,
  PRIMARY KEY (`idperkembangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkembangn`
--

INSERT INTO `perkembangn` (`idperkembangan`, `siswa`, `minggu`, `keterangan`, `perkembangan`) VALUES
('NP001', 'User2 ', '2', 'test', 'Test\r\n'),
('NP002', 'User ', '3', 'fgdfg', 'Fdgdfg'),
('NP003', 'User ', '3', 'sdsd', 'Dsvsv'),
('NP004', 'User2', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `idsiswa` varchar(15) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idsiswa`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `username`, `nama`, `sekolah`, `alamat`, `password`, `status`) VALUES
('S003', 'usersiswa', 'User', 'Contoh', 'Batam', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif'),
('S004', 'usersiswa2', 'User2', 'Batam', 'Batam', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif'),
('S005', 'cntoh', 'Cntoh', 'Cntoh', 'Cntoh', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif'),
('S006', 'baqogsqn', '1', '1', '1', '32cc5886dc1fa8c106a02056292c4654', 'Tidak_aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_data`
--

CREATE TABLE IF NOT EXISTS `tabel_data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ukuran` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `tgl_upload` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `publikasi` enum('ya','tidak') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tabel_data`
--

INSERT INTO `tabel_data` (`id`, `nama_file`, `ukuran`, `tgl_upload`, `judul`, `keterangan`, `publikasi`) VALUES
(27, '2-1161599903.docx', '533568', '2016-08-23', '', 'Sfrf', 'tidak'),
(30, 'bahasa-inggris-957198942.ppt', '1946624', '2016-08-23', 'WETERTRE', 'FFSFS', 'ya'),
(31, '17-68-1-pb-8848759615.pdf', '322300', '2016-09-03', 'Ips', '', 'ya'),
(32, 'bimbelwisdom-7968357796.rtf', '388', '2016-10-14', 'Test Bimbel Wisdom', '', 'ya');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
