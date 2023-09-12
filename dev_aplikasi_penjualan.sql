-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 11:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_aplikasi_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `idPengguna` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`idPengguna`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$KdXlImaJIqgHyVM4xFZ5IukvxmYReMDvbFrjILH3wy9MqqUZMZE1m');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `kodeProduk` int(11) NOT NULL,
  `namaProduk` varchar(150) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `diskon` int(11) NOT NULL,
  `dimensi` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`kodeProduk`, `namaProduk`, `harga`, `satuan`, `diskon`, `dimensi`, `unit`, `gambar`) VALUES
(1, 'Soklin', '1000', 'idr', 10, '13 cm * 13 cm', 'pcs', 'soklin.jpg'),
(2, 'Soklin Pewangi', '1000', 'idr', 10, '13 cm * 13 cm', 'pcs', 'soklinPewangi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kodeTransaksi` int(11) NOT NULL,
  `nomorDokumen` varchar(200) NOT NULL,
  `pengguna` varchar(150) NOT NULL,
  `totalHarga` varchar(100) NOT NULL,
  `tanggalTransaksi` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kodeTransaksi`, `nomorDokumen`, `pengguna`, `totalHarga`, `tanggalTransaksi`, `status`) VALUES
(18, '79221', 'admin', '1000', '2023-09-12', 1),
(19, '15460', 'admin', '1000', '2023-09-12', 1),
(20, '998524', 'admin', '1000', '2023-09-12', 1),
(21, '688065', 'admin', '1000', '2023-09-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `kodeTransaksiDetail` int(11) NOT NULL,
  `transaksi` int(13) NOT NULL,
  `produk` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`kodeTransaksiDetail`, `transaksi`, `produk`) VALUES
(16, 18, 2),
(17, 19, 2),
(18, 20, 2),
(19, 21, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`idPengguna`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`kodeProduk`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kodeTransaksi`);

--
-- Indexes for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD PRIMARY KEY (`kodeTransaksiDetail`),
  ADD KEY `transaksi` (`transaksi`),
  ADD KEY `produk` (`produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `idPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `kodeProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `kodeTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  MODIFY `kodeTransaksiDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi`) REFERENCES `tbl_transaksi` (`kodeTransaksi`),
  ADD CONSTRAINT `tbl_transaksi_detail_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `tbl_product` (`kodeProduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
