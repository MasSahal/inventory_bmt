-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 02:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `status_produk` varchar(10) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `qty_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `status_produk`, `tanggal_masuk`) VALUES
(5, 'Milk Shake', 0, 200, 'milk.png', 'Milk Shake terlezat', 'Masuk', '2020-01-17 22:26:22'),
(6, 'Burger Special', 0, 250, 'burger.png', 'Burger Special Big dilngkapi daging asli', 'Masuk', '2020-01-17 22:27:16'),
(7, 'Ice Cream', 0, 100, 'icecream.png', 'Ice Cream lembut disertai saus coklat yang memanjakan lidah', 'Masuk', '2020-01-17 22:28:53'),
(8, 'Puncake Ba', 0, 100, 'cake.png', 'Puncake dengan segala varian dan terpopuler di boyolali', 'Masuk', '2020-01-17 22:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_produk`
--

CREATE TABLE `tb_riwayat_produk` (
  `id_riwayat` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `status_produk` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat_produk`
--

INSERT INTO `tb_riwayat_produk` (`id_riwayat`, `id_produk`, `nama_produk`, `qty_produk`, `status_produk`, `tanggal`, `keterangan`) VALUES
(18, 6, 'Burger Special', 9, 'Keluar', '2020-01-17 17:43:06', 'Dibeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_riwayat_produk`
--
ALTER TABLE `tb_riwayat_produk`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_riwayat_produk`
--
ALTER TABLE `tb_riwayat_produk`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
