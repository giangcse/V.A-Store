-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 11:59 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `taikhoankhachhang`
--

CREATE TABLE `taikhoankhachhang` (
  `IDKH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TaiKhoan` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `MatKhau` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `taikhoankhachhang`
--

INSERT INTO `taikhoankhachhang` (`IDKH`, `TaiKhoan`, `MatKhau`) VALUES
('1', 'dilam', 'f502e82c25bba5a06cf68ffa87ecd02371c1a975'),
('2', 'khoitran', 'cae1b52d0ab8b788a944a94be70dedffa876bd61'),
('3', 'duyho', '00fb8183479aed9947aebded28b36c57de7eb16b'),
('4', 'khamnguyen', '5f79460e4f906c045759e7bb5580b62aceb2cc85'),
('5', 'tuongtran', 'e03a3b0df7ef2aa513131811010f32f66cfa8e06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taikhoankhachhang`
--
ALTER TABLE `taikhoankhachhang`
  ADD PRIMARY KEY (`IDKH`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `taikhoankhachhang`
--
ALTER TABLE `taikhoankhachhang`
  ADD CONSTRAINT `taikhoankhachhang_ibfk_1` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
