-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2013 at 12:56 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipa`
--
CREATE DATABASE IF NOT EXISTS `sipa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sipa`;

-- --------------------------------------------------------

--
-- Table structure for table `ibm`
--

CREATE TABLE IF NOT EXISTS `ibm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_kendaraan` varchar(255) DEFAULT NULL,
  `jenis_kendaraan_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_berlaku_awal` date DEFAULT NULL,
  `tanggal_berlaku_akhir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ibm`
--

INSERT INTO `ibm` (`id`, `nomor`, `nama`, `alamat`, `nomor_kendaraan`, `jenis_kendaraan_id`, `tanggal`, `tanggal_berlaku_awal`, `tanggal_berlaku_akhir`) VALUES
(1, 'KB.234', 'Thomas', 'Serang', 'A 234 DS', 1, '0000-00-00', '2013-11-19', '2013-11-30'),
(2, '012333', 'Aeng', 'Tesss', '12123121', 2, '2013-12-01', '2013-12-31', '2004-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `iua`
--

CREATE TABLE IF NOT EXISTS `iua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat_pemilik` text,
  `jenis_usaha_id` int(11) DEFAULT NULL,
  `tgl_ditetapkan` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `iua`
--

INSERT INTO `iua` (`id`, `nomor`, `tahun`, `nama_perusahaan`, `nama_pemilik`, `alamat_pemilik`, `jenis_usaha_id`, `tgl_ditetapkan`) VALUES
(2, '1111', 2013, 'Aled', 'aeng', 'Jl. Merdeka No. 7 Bandung', 1, '2013-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `iua_detail`
--

CREATE TABLE IF NOT EXISTS `iua_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iua_id` int(11) NOT NULL,
  `nomor_kendaraan` varchar(255) DEFAULT NULL,
  `jenis_kendaraan_id` int(11) DEFAULT NULL,
  `merek_id` int(11) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `tahun_pembuatan` year(4) DEFAULT NULL,
  `da_barang` int(11) DEFAULT NULL,
  `da_orang` int(11) DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iua_id` (`iua_id`),
  KEY `iua_id_2` (`iua_id`),
  KEY `iua_id_3` (`iua_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `iua_detail`
--

INSERT INTO `iua_detail` (`id`, `iua_id`, `nomor_kendaraan`, `jenis_kendaraan_id`, `merek_id`, `tipe`, `tahun_pembuatan`, `da_barang`, `da_orang`, `jenis_usaha`) VALUES
(2, 2, '111', 1, 1, 'te', 2012, 3000, 0, 'tes'),
(3, 2, '222', 1, 1, 'ce', 2013, 45, 54, 'bisnis'),
(4, 2, '43234', 1, 2, 'teee23', 2014, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE IF NOT EXISTS `jenis_kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id`, `nama`) VALUES
(1, 'BIS KECIL'),
(2, 'BOX'),
(5, 'PICK UP BOX'),
(4, 'L. TRUCK');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_usaha`
--

CREATE TABLE IF NOT EXISTS `jenis_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_usaha`
--

INSERT INTO `jenis_usaha` (`id`, `nama`) VALUES
(1, 'Angutan Orang'),
(2, 'Angkutan Barang');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE IF NOT EXISTS `merek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id`, `nama`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(3, 'Mitsubishi'),
(4, 'Isuzu');

-- --------------------------------------------------------

--
-- Table structure for table `print_setting`
--

CREATE TABLE IF NOT EXISTS `print_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dokumen` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `elemen` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `y` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `print_setting`
--

INSERT INTO `print_setting` (`id`, `dokumen`, `keterangan`, `elemen`, `x`, `y`) VALUES
(1, 'ibm', '', 'nomor', '400', 80),
(2, 'ibm', '', 'nama', '300', 200),
(3, 'ibm', '', 'alamat', '300', 230),
(4, 'ibm', '', 'no_kendaraan', '300', 260),
(5, 'ibm', '', 'jenis_kendaraan', '300', 290),
(6, 'ibm', '', 'tanggal_berlaku', '200', 450),
(7, 'ibm', '', 'tanggal_dokumen', '800', 600),
(8, 'iua', '', 'nomor', '400', 80),
(9, 'iua', '', 'nama_perusahaan', '300', 350),
(10, 'iua', '', 'nama', '300', 380),
(11, 'iua', '', 'alamat', '300', 410),
(12, 'iua', '', 'jenis_usaha', '300', 440),
(13, 'iua', '', 'tanggal_dokumen', '600', 550),
(14, 'daf_ken', '', 'no_urut', '200', 100),
(15, 'daf_ken', '', 'no_kendaraan', '220', 100),
(16, 'daf_ken', '', 'jenis_kendaraan', '280', 100),
(17, 'daf_ken', '', 'merek', '360', 100),
(18, 'daf_ken', '', 'thn_pembuatan', '460', 100),
(19, 'daf_ken', '', 'da_barang', '500', 100),
(20, 'daf_ken', '', 'da_orang', '560', 100),
(21, 'daf_ken', '', 'jenis_usaha', '600', 100),
(22, 'daf_ken', '', 'tanggal_dokumen', '600', 500);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `status`, `last_login`, `create_time`, `update_time`, `create_user_id`, `update_user_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iua_detail`
--
ALTER TABLE `iua_detail`
  ADD CONSTRAINT `iua_detail_ibfk_1` FOREIGN KEY (`iua_id`) REFERENCES `iua` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
