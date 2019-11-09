-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 11:56 AM
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
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`) VALUES
('1', 'LÃ¢m VÄƒn Di', 'ChÃ¢u ThÃ nh, KiÃªn Giang', '0845000408'),
('2', 'Tráº§n VÄƒn Khá»Ÿi', 'Giá»“ng Riá»ng, KiÃªn Giang', '0392959702'),
('3', 'Há»“ KhÃ¡nh Duy', 'Long Má»¹, Háº­u Giang', '0929262646'),
('4', 'Nguyá»…n ÄÃ¬nh KhÃ¢m', 'Long Má»¹, Háº­u Giang', '0356879141'),
('5', 'Tráº§n VÄ©nh TÆ°á»ng', 'Ã” MÃ´n, Cáº§n ThÆ¡', '0907047617');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
