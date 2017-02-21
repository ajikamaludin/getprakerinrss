-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2017 at 07:45 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev-prak-blc`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_blog`
--

CREATE TABLE `all_blog` (
  `id_my_blog` int(255) NOT NULL,
  `judul_post` varchar(300) NOT NULL,
  `tgl_post` date NOT NULL,
  `konten_post` text NOT NULL,
  `url_post` varchar(500) NOT NULL,
  `id_pengguna` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `all_laporan`
--

CREATE TABLE `all_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kata_pengantar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `all_saran_kritik`
--

CREATE TABLE `all_saran_kritik` (
  `id_saran` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `saran_kritik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_log`
--

CREATE TABLE `app_log` (
  `id_log` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `aksi` varchar(300) NOT NULL,
  `waktu_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `judul_issue` varchar(500) NOT NULL,
  `isi_issue` text NOT NULL,
  `gambar_issue` varchar(255) NOT NULL,
  `waktu_issue` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_issue` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_komentar`
--

CREATE TABLE `forum_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `gambar_komentar` varchar(255) NOT NULL,
  `waktu_komentar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_notifikasi`
--

CREATE TABLE `forum_notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `isi_notif` int(11) NOT NULL,
  `url_notif` varchar(255) NOT NULL,
  `status_notif` varchar(100) NOT NULL,
  `waktu_notif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_sekolah` int(12) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kota_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `masa_prakerin` varchar(2) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jurusan` enum('TKJ','RPL','MM','ELEKTRO','MAHASISWA TI') NOT NULL,
  `url_blog` varchar(100) NOT NULL,
  `link_fb` varchar(300) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('aktiv','selesai','keluar') NOT NULL,
  `foto_profile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL,
  `no_pembimbing` varchar(12) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `kurikulum` varchar(15) NOT NULL,
  `thn_prakerin` varchar(15) NOT NULL,
  `logo_sekolah` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_blog`
--
ALTER TABLE `all_blog`
  ADD PRIMARY KEY (`id_my_blog`);

--
-- Indexes for table `all_laporan`
--
ALTER TABLE `all_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `all_saran_kritik`
--
ALTER TABLE `all_saran_kritik`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `app_log`
--
ALTER TABLE `app_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `forum_komentar`
--
ALTER TABLE `forum_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `forum_notifikasi`
--
ALTER TABLE `forum_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`) USING HASH;

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_blog`
--
ALTER TABLE `all_blog`
  MODIFY `id_my_blog` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682;
--
-- AUTO_INCREMENT for table `all_laporan`
--
ALTER TABLE `all_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `all_saran_kritik`
--
ALTER TABLE `all_saran_kritik`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_log`
--
ALTER TABLE `app_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `forum_komentar`
--
ALTER TABLE `forum_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `forum_notifikasi`
--
ALTER TABLE `forum_notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
