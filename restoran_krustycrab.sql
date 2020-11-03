-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 03, 2020 at 06:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `a_id` int(11) NOT NULL,
  `a_Username` varchar(255) NOT NULL,
  `a_pwadmin` varchar(255) DEFAULT NULL,
  `a_NamaAdmin` varchar(255) DEFAULT NULL,
  `a_TglLahir` date DEFAULT NULL,
  `a_Alamat` varchar(255) DEFAULT NULL,
  `a_Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`a_id`, `a_Username`, `a_pwadmin`, `a_NamaAdmin`, `a_TglLahir`, `a_Alamat`, `a_Foto`) VALUES
(1, 'admin', '123', 'admin', '2020-10-01', 'admin', '110705524_001-user.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailmakanan`
--

CREATE TABLE `t_detailmakanan` (
  `dm_id` int(11) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `dm_JumlahMakanan` int(11) DEFAULT NULL,
  `dm_Tanggal` date DEFAULT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailmakanan`
--

INSERT INTO `t_detailmakanan` (`dm_id`, `m_id`, `dm_JumlahMakanan`, `dm_Tanggal`, `a_id`) VALUES
(7, 1, 12, '2020-11-03', 1),
(8, 1, 13, '2020-11-04', 1),
(11, 2, 1, '2020-11-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_detailpesan`
--

CREATE TABLE `t_detailpesan` (
  `dp_id` varchar(100) NOT NULL,
  `dp_diskon` int(50) DEFAULT '0',
  `dp_totalbayar` int(50) DEFAULT NULL,
  `dp_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailpesan`
--

INSERT INTO `t_detailpesan` (`dp_id`, `dp_diskon`, `dp_totalbayar`, `dp_tanggal`) VALUES
('KK2020-11-030001', 10, 54000, '2020-11-03'),
('KK2020-11-040001', 0, 70000, '2020-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `t_makanan`
--

CREATE TABLE `t_makanan` (
  `m_id` int(50) NOT NULL,
  `a_id` int(11) DEFAULT NULL,
  `m_namamakanan` varchar(255) DEFAULT NULL,
  `m_harga` int(50) DEFAULT NULL,
  `m_descmakanan` text,
  `m_gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_makanan`
--

INSERT INTO `t_makanan` (`m_id`, `a_id`, `m_namamakanan`, `m_harga`, `m_descmakanan`, `m_gambar`) VALUES
(1, 1, 'Krabby Patty', 30000, 'Tomat segar, potongan keju, sayuran, daging sapi berkualitas', '896801177_burger.jpg'),
(2, 1, 'Hot Patty', 20000, 'Roti tebal, sosis sapi asli, keju mozarella', '2060450467_hotdog-royalty-free-image-185123377-1562609410.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_pesan`
--

CREATE TABLE `t_pesan` (
  `p_id` int(11) NOT NULL,
  `dp_id` varchar(100) NOT NULL,
  `dm_id` int(11) DEFAULT NULL,
  `u_Username` int(11) DEFAULT NULL,
  `p_banyak` int(11) DEFAULT NULL,
  `p_TotalHarga` int(11) DEFAULT NULL,
  `p_DescPesanan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pesan`
--

INSERT INTO `t_pesan` (`p_id`, `dp_id`, `dm_id`, `u_Username`, `p_banyak`, `p_TotalHarga`, `p_DescPesanan`) VALUES
(14, 'KK2020-11-030001', 7, 1, 2, 60000, 'asas'),
(15, 'KK2020-11-040001', 8, 5, 1, 30000, ''),
(16, 'KK2020-11-040001', 11, 5, 2, 40000, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `u_id` int(11) NOT NULL,
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

INSERT INTO `t_user` (`u_id`, `u_Username`, `u_pwuser`, `u_NamaUser`, `u_AlamatUser`, `u_NoHp`, `u_Foto`) VALUES
(1, 'user', '$2y$10$uT3vCbC1vwuvt1rPB0l0/u6qcd6g9MC1HdnGpL3bsYv0.5/GGz4Jm', 'user', 'user', 0, 'IMG_20200301_134758.jpg'),
(5, 'yusuf', '$2y$10$WrLIXYVRm2/lU00ggmZej.QAKUIbLyecInEfQJutOHemM8zht6/16', 'yusuf h', 'asd            ', 1212, '579968899_d1666e12f2da5278f0251677e26b6572.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `t_detailmakanan`
--
ALTER TABLE `t_detailmakanan`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `t_detailpesan`
--
ALTER TABLE `t_detailpesan`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `t_makanan`
--
ALTER TABLE `t_makanan`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `dp_id` (`dp_id`),
  ADD KEY `u_Username` (`u_Username`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_detailmakanan`
--
ALTER TABLE `t_detailmakanan`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_makanan`
--
ALTER TABLE `t_makanan`
  MODIFY `m_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pesan`
--
ALTER TABLE `t_pesan`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detailmakanan`
--
ALTER TABLE `t_detailmakanan`
  ADD CONSTRAINT `t_detailmakanan_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `t_makanan` (`m_id`),
  ADD CONSTRAINT `t_detailmakanan_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `t_admin` (`a_id`);

--
-- Constraints for table `t_makanan`
--
ALTER TABLE `t_makanan`
  ADD CONSTRAINT `t_makanan_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `t_admin` (`a_id`);

--
-- Constraints for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD CONSTRAINT `t_pesan_ibfk_1` FOREIGN KEY (`dp_id`) REFERENCES `t_detailpesan` (`dp_id`),
  ADD CONSTRAINT `t_pesan_ibfk_2` FOREIGN KEY (`u_Username`) REFERENCES `t_user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
