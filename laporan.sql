-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 05. Desember 2013 jam 14:41
-- Versi Server: 5.1.33
-- Versi PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laporan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `capaian_kinerja`
--

CREATE TABLE IF NOT EXISTS `capaian_kinerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `program` varchar(255) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `jenis_indikator` varchar(255) DEFAULT NULL,
  `indikator` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `realisasi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `capaian_kinerja`
--

INSERT INTO `capaian_kinerja` (`id`, `kode`, `program`, `kegiatan`, `jenis_indikator`, `indikator`, `target`, `realisasi`, `keterangan`, `tahun`, `user_id`) VALUES
(2, 'A-01', 'Program A', '', 'Ip', '', '', '', '', 2013, 1),
(3, 'A-03', 'Program B', '', NULL, '', '', '', '', 2013, 1),
(4, 'A-02', 'Tes A', '', NULL, '', '', '', '', 2013, 1),
(5, 'B-01', 'Program B', '', NULL, '', '', '', '', 2012, 1),
(6, 'C-01', 'Program C', '', NULL, '', '', '', '', 2013, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_kerja`
--

CREATE TABLE IF NOT EXISTS `kegiatan_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `yang_menghadiri` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kegiatan_kerja`
--

INSERT INTO `kegiatan_kerja` (`id`, `tanggal`, `kegiatan`, `tempat`, `waktu`, `yang_menghadiri`, `user_id`) VALUES
(1, '2013-12-01', 'Kegiatan A', 'Serang', '00:00:00', 'adfa', 1),
(2, '2013-12-11', 'Tes', '', '', '', 1),
(3, '2013-12-04', 'Tes Edison', 'Cikampek', '12:00', 'Gubernur', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran_lalin`
--

CREATE TABLE IF NOT EXISTS `pelanggaran_lalin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_penindakan` date NOT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `pelanggaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pelanggaran_lalin`
--

INSERT INTO `pelanggaran_lalin` (`id`, `tanggal_penindakan`, `tanggal_sidang`, `nomor`, `pelanggaran`, `keterangan`) VALUES
(1, '2013-12-11', '2013-12-19', 'B 001 D', 'Tidak membawa STNK', 'Sudah diurus'),
(2, '2013-12-18', '2013-12-20', 'B 001 D', 'Tidak membawa STNK', 'Sudah diurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
--

CREATE TABLE IF NOT EXISTS `realisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(255) NOT NULL,
  `pagu_anggaran` decimal(20,2) DEFAULT NULL,
  `pagu_kontrak` decimal(20,2) DEFAULT NULL,
  `pelaksana_kontrak` varchar(255) DEFAULT NULL,
  `lokasi_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_pelaksanaan` date DEFAULT NULL,
  `realisasi_anggaran` decimal(20,2) DEFAULT NULL,
  `output_fisik` varchar(255) DEFAULT NULL,
  `output_nonfisik` varchar(255) DEFAULT NULL,
  `capaian` decimal(5,2) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `realisasi`
--

INSERT INTO `realisasi` (`id`, `kegiatan`, `pagu_anggaran`, `pagu_kontrak`, `pelaksana_kontrak`, `lokasi_kegiatan`, `waktu_pelaksanaan`, `realisasi_anggaran`, `output_fisik`, `output_nonfisik`, `capaian`, `keterangan`, `tahun`) VALUES
(1, 'Kegiatan A', 12000000.00, 13000000.00, '', '', '2013-12-05', 12000000.00, '', '', 100.00, '', 2013),
(2, 'KEgiatan B', 0.00, 0.00, '', '', '0000-00-00', 0.00, '', '', 0.00, '', 2012);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Bidang'),
(3, 'Seksi Pengedalian dan Operasional'),
(4, 'Sub Bagian Program dan Evaluasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `status`, `last_login`, `create_time`, `update_time`, `create_user_id`, `update_user_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2013-12-02 14:18:43', NULL, '2013-12-05 06:38:01', NULL, 1),
(2, 'sekretariat', '5b491f702c8ec3b957a3b01aa406b829', 1, 1, NULL, '2013-12-04 20:09:05', '2013-12-05 06:31:52', 1, 1),
(3, 'edison8301', '5b491f702c8ec3b957a3b01aa406b829', 2, 1, NULL, '2013-12-04 20:09:51', '2013-12-05 07:27:52', 1, 1),
(4, 'keuangan', 'a4151d4b2856ec63368a7c784b1f0a6e', 1, 1, NULL, '2013-12-04 20:10:02', NULL, 1, NULL),
(5, 'program', 'a9c449d4fa44e9e5a41c574ae55ce4d9', 1, 1, NULL, '2013-12-04 20:10:14', NULL, 1, NULL),
(6, 'postel', '2b9afa616f6820d810268b6f72068ae8', 1, 1, NULL, '2013-12-04 20:10:29', NULL, 1, NULL),
(7, 'desiminasi', '83e2b3494c1585eda4a7ced1633e6c7a', 1, 1, NULL, '2013-12-04 20:10:41', NULL, 1, NULL),
(8, 'telematika', '0d403864f892648d2ec29f3b038d638a', 1, 1, NULL, '2013-12-04 20:10:53', NULL, 1, NULL),
(9, 'pengendalian', '8c3813aa2df29c6562c2f1589a01d830', 1, 1, NULL, '2013-12-04 20:12:28', NULL, 1, NULL),
(10, 'edison8302', '5b491f702c8ec3b957a3b01aa406b829', 2, 1, NULL, '2013-12-05 11:34:51', '2013-12-05 11:38:03', 1, 1);
