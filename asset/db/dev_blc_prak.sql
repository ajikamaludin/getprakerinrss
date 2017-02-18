-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2017 at 05:13 PM
-- Server version: 10.1.21-MariaDB-1~xenial
-- PHP Version: 7.1.1-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_blc_prak`
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
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `nama_pembimbing`, `no_pembimbing`, `tahun_ajaran`, `kurikulum`, `thn_prakerin`, `logo_sekolah`) VALUES
(1, 'BLC-Telkom', 'Jl.Srigading No.7,Tonggalan, Klaten', 'Mr. X', '083083083083', '2017/2018', 'KTSP', '2017', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_blog`
--
ALTER TABLE `all_blog`
  ADD PRIMARY KEY (`id_my_blog`);

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
  MODIFY `id_my_blog` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
