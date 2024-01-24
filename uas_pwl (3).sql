-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 03:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `databarang`
--

CREATE TABLE `databarang` (
  `nobarang` int(30) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `jenisbarang` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `databarang`
--

INSERT INTO `databarang` (`nobarang`, `namabarang`, `jenisbarang`, `supplier`, `stok`, `harga`, `tanggalmasuk`, `gambar`) VALUES
(12567, 'Radeon RX 7900 XTX ', 'GPU', 'Advanced Micro Devices, Inc.', 13, 1100, '2024-01-17', 'gambarproduk/Radeon™-RX-7900-XTX-24G-11.png'),
(35679, 'Ryzen 9 7950x3d ', 'CPU', 'Advanced Micro Devices, Inc.', 23, 617, '2023-12-14', 'gambarproduk/RYZEN 9.png'),
(35780, 'WD Black SN750 2TB', 'SSD', 'Western Digital Corporation', 25, 98, '2023-12-08', 'gambarproduk/wd black.jpeg'),
(45678, 'ASROCK B550M STEEL LEGEND', 'MOBO', 'ASRock Inc', 34, 234, '2024-01-10', 'gambarproduk/ASRock-B550M-Steel-Legend-2048x2048.jpg'),
(56324, 'MSI M570 HS GEN5 SSD M.2 2280 2TB PCI-Express 5.0 ', 'SSD', 'Micro-Star International Co', 57, 333, '2024-01-17', 'gambarproduk/SSD MSI.png'),
(64578, 'RTX 4090', 'GPU', 'Nvidia Corporation', 12, 1200, '2024-01-01', 'gambarproduk/GeForce-ADA-RTX4080-Back-Custom.jpg_videocardz.jpg'),
(67895, 'RAM Kingston HyperX Fury RGB (2x16)', 'RAM', 'Intel Corporation', 56, 87, '2024-01-23', 'gambarproduk/6225_hx432c16fb3ak216.jpg'),
(78903, 'intel i9 13900k', 'CPU', 'Intel Corporation', 67, 788, '2023-11-23', 'gambarproduk/intel-core-i9-13900k-1683068047.jpg'),
(87235, 'WD 6TB Purple 5400 rpm SATA III 3.5\"', 'HDD', 'Western Digital Corporation', 67, 234, '2024-01-16', 'gambarproduk/wd_wd60purx_purple_surveillance_6tb_3_5_1102931.jpg'),
(89567, 'MSI MPG B550 GAMING ', 'MOBO', 'Micro-Star International Co', 25, 89, '2024-01-17', 'gambarproduk/msi_b550gedgewifi_mpg_b550_gaming_edge_1592297256_1568694.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datadistributor`
--

CREATE TABLE `datadistributor` (
  `idtoko` int(20) NOT NULL,
  `namatoko` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notlptoko` int(50) NOT NULL,
  `jenisbarang` varchar(50) NOT NULL,
  `namabarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datadistributor`
--

INSERT INTO `datadistributor` (`idtoko`, `namatoko`, `alamat`, `notlptoko`, `jenisbarang`, `namabarang`) VALUES
(11, 'Jaya Pc', 'Blok M Squere', 56789, 'MOBO', 'ASROCK B550M STEEL LEGEND, MSI MPG B550 GAMING '),
(12, 'Raja Ram Nusantara', 'Kebayoran', 2198756, 'RAM', 'RAM Kingston HyperX Fury RGB (2x16)'),
(13, 'Yoestore', 'Mangga Dua', 2156743, 'CPU', 'Ryzen 9 7950x3d , intel i9 13900k'),
(14, 'PC Berkah', 'Blok M', 2178634, 'MOBO', 'ASROCK B550M STEEL LEGEND, MSI MPG B550 GAMING '),
(15, 'Abadi Pc', 'Ciledug', 2135678, 'MOBO', 'ASROCK B550M STEEL LEGEND, MSI MPG B550 GAMING '),
(16, 'Sentosa PC', 'Mangga Dua Mall', 219834, 'SSD', 'WD Black SN750 2TB, MSI M570 HS GEN5 SSD M.2 2280 '),
(17, 'Sentosa Komputer', 'Plamerah', 2145678, 'CPU', 'Ryzen 9 7950x3d , intel i9 13900k'),
(18, 'Gaming PC', 'Kebayoran', 2198765, 'GPU', 'Radeon RX 7900 XTX , RTX 4090'),
(19, 'Nusantara Komputer', 'Joglo', 2165748, 'CPU', 'Ryzen 9 7950x3d , intel i9 13900k'),
(20, 'NG PC', 'Tangerang', 2189347, 'MOBO', 'ASROCK B550M STEEL LEGEND, MSI MPG B550 GAMING ');

-- --------------------------------------------------------

--
-- Table structure for table `datasuppler`
--

CREATE TABLE `datasuppler` (
  `idsupplier` int(11) NOT NULL,
  `namasupplier` varchar(50) NOT NULL,
  `alamatsupplier` varchar(50) NOT NULL,
  `tlpsupplier` int(50) NOT NULL,
  `jenisbarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datasuppler`
--

INSERT INTO `datasuppler` (`idsupplier`, `namasupplier`, `alamatsupplier`, `tlpsupplier`, `jenisbarang`) VALUES
(4, 'Intel Corporation', 'Santa Clara, California, U.S.', 215771930, 'CPU'),
(6, 'Advanced Micro Devices, Inc.', 'Santa Clara, California, United States', 2147483647, 'CPU, GPU'),
(7, 'Nvidia Corporation', 'Santa Clara, California, U.S.', 2147483, 'GPU'),
(8, 'ASRock Inc', 'Taipei, Taiwan', 243454433, 'GPU, MOBO'),
(9, 'ASUSTeK Computer Inc', 'Beitou District, Taipei, Taiwan', 1500128, 'GPU, SSD, MOBO'),
(10, 'Gigabyte Technology', 'Xindian District, New Taipei City, Taiwan', 2147483647, 'GPU, RAM, SSD'),
(11, 'Micro-Star International Co', 'Zhonghe, New Taipei, Taiwan', 2147483647, 'GPU, SSD'),
(12, 'Corsair Gaming, Inc', 'Milpitas, California, U.S.', 2147483647, 'RAM, SSD'),
(13, 'Kingston Technology Corporation', 'Fountain Valley, California, United States', 4358726, 'RAM'),
(14, 'Western Digital Corporation', 'San Jose, California U.S.', 1803657854, 'SSD');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'arjuna', 'furina', 'furina@gmail.com', 'fontaine'),
(2, 'polidi', 'tentara', 'polisi@gmail.com', '12345'),
(3, 'Yuusha Yuzka Ramzani', 'LoopPlus', 'yuusha@gmail.com', 'mmkjahanam'),
(4, 'arjuna', 'galaxsky', 'arjuna@gmail.com', '12345'),
(5, 'pripayer', 'garena', 'garena@gmail.com', 'pubg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`nobarang`);

--
-- Indexes for table `datadistributor`
--
ALTER TABLE `datadistributor`
  ADD PRIMARY KEY (`idtoko`);

--
-- Indexes for table `datasuppler`
--
ALTER TABLE `datasuppler`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datadistributor`
--
ALTER TABLE `datadistributor`
  MODIFY `idtoko` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `datasuppler`
--
ALTER TABLE `datasuppler`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
