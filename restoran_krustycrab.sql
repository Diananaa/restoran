-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 04:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_krustycrab`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `a_Username` varchar(255) NOT NULL,
  `a_pwadmin` varchar(255) DEFAULT NULL,
  `a_NamaAdmin` varchar(255) DEFAULT NULL,
  `a_Jabatan` varchar(255) DEFAULT NULL,
  `a_TglLahir` date DEFAULT NULL,
  `a_Alamat` varchar(255) DEFAULT NULL,
  `a_Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_detailmakanan`
--

CREATE TABLE `t_detailmakanan` (
  `dm_id` int(11) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `a_username` varchar(255) DEFAULT NULL,
  `dm_JumlahMakanan` int(11) DEFAULT NULL,
  `dm_Tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailmakanan`
--



-- --------------------------------------------------------

--
-- Table structure for table `t_detailpesan`
--

CREATE TABLE `t_detailpesan` (
  `dp_id` int(50) NOT NULL,
  `p_id` int(50) DEFAULT NULL,
  `dp_diskon` int(50) DEFAULT NULL,
  `dp_totalbayar` int(50) DEFAULT NULL,
  `dp_tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_makanan`
--

CREATE TABLE `t_makanan` (
  `m_id` int(50) NOT NULL,
  `a_username` varchar(255) DEFAULT NULL,
  `m_namamakanan` varchar(255) DEFAULT NULL,
  `m_harga` int(50) DEFAULT NULL,
  `m_descmakanan` text DEFAULT NULL,
  `m_gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_makanan`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_pesan`
--

CREATE TABLE `t_pesan` (
  `p_id` int(11) NOT NULL,
  `dm_id` int(11) DEFAULT NULL,
  `u_Username` varchar(255) DEFAULT NULL,
  `a_Username` varchar(255) DEFAULT NULL,
  `p_banyak` int(11) DEFAULT NULL,
  `p_TotalHarga` int(11) DEFAULT NULL,
  `p_DescPesanan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `u_Username` varchar(255) NOT NULL,
  `u_pwuser` varchar(255) DEFAULT NULL,
  `u_NamaUser` varchar(255) DEFAULT NULL,
  `u_AlamatUser` varchar(255) DEFAULT NULL,
  `u_NoHp` int(15) DEFAULT NULL,
  `u_Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`a_Username`);

--
-- Indexes for table `t_detailmakanan`
--
ALTER TABLE `t_detailmakanan`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `a_username` (`a_username`);

--
-- Indexes for table `t_detailpesan`
--
ALTER TABLE `t_detailpesan`
  ADD PRIMARY KEY (`dp_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `t_makanan`
--
ALTER TABLE `t_makanan`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `a_username` (`a_username`);

--
-- Indexes for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `dm_id` (`dm_id`),
  ADD KEY `a_Username` (`a_Username`),
  ADD KEY `u_Username` (`u_Username`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`u_Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detailmakanan`
--
ALTER TABLE `t_detailmakanan`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_detailpesan`
--
ALTER TABLE `t_detailpesan`
  MODIFY `dp_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_makanan`
--
ALTER TABLE `t_makanan`
  MODIFY `m_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_pesan`
--
ALTER TABLE `t_pesan`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detailmakanan`
--
ALTER TABLE `t_detailmakanan`
  ADD CONSTRAINT `t_detailmakanan_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `t_makanan` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detailmakanan_ibfk_2` FOREIGN KEY (`a_username`) REFERENCES `t_admin` (`a_Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_detailpesan`
--
ALTER TABLE `t_detailpesan`
  ADD CONSTRAINT `t_detailpesan_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `t_pesan` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detailpesan_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `t_pesan` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_makanan`
--
ALTER TABLE `t_makanan`
  ADD CONSTRAINT `t_makanan_ibfk_1` FOREIGN KEY (`a_username`) REFERENCES `t_admin` (`a_Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD CONSTRAINT `t_pesan_ibfk_1` FOREIGN KEY (`dm_id`) REFERENCES `t_detailmakanan` (`dm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pesan_ibfk_2` FOREIGN KEY (`a_Username`) REFERENCES `t_admin` (`a_Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pesan_ibfk_3` FOREIGN KEY (`u_Username`) REFERENCES `t_user` (`u_Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pesan_ibfk_4` FOREIGN KEY (`dm_id`) REFERENCES `t_detailmakanan` (`dm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pesan_ibfk_5` FOREIGN KEY (`a_Username`) REFERENCES `t_admin` (`a_Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pesan_ibfk_6` FOREIGN KEY (`u_Username`) REFERENCES `t_user` (`u_Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
