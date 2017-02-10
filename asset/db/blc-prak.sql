-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2017 at 06:28 PM
-- Server version: 10.1.21-MariaDB-1~xenial
-- PHP Version: 7.1.1-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blc-prak`
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

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `nama_pembimbing`, `no_pembimbing`, `tahun_ajaran`, `kurikulum`, `thn_prakerin`, `logo_sekolah`) VALUES
(1, 'SMK Muhammadiyah 1 Klaten Utara', 'Happy S.Kom', '081111111112', '2016/2017', 'KTSP', '2017', 'logo_1486368726_fadilajuni@gmail.com.png'),
(2, 'SMK Hasan Kafrawi Mayong Jepara', 'Mualim S.T', '082222222222', '2016/2017', 'KTSP', '2017', 'hk_1486374254_aji19kamaludin@gmail.com.png'),
(3, 'SMK NU Ma\'rif Kudus', 'Eko Julianto M.Kom', '083333333333', '2016/2017', 'K13/KTSP', '2017', 'logo_1486368618_aji19kamaludin@gmail.com.png'),
(4, 'SMK Negeri 1 Banjit Lampung', 'Subuh Kurniawan M.Eng', '084444444444', '2016/2017', 'K13 Baru', '2017', ''),
(5, 'SMK Negeri 2 Karanganyar', 'Tika', '084445556666', '2016/2017', 'KTSP', '2017', '20312071_1486438636_fadilajuni@gmail.com.png'),
(6, 'SMK Muhammadiyah 2 Pekan Baru', 'P Widodo Songo', '089085608402', '2016/2017', 'K13/KTSP', '2017', 'Screenshot from 2017-02-07 18-20-33_1486466444_alvin@gmail.com.png');

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
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
