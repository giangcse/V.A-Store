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
-- Table structure for table `taikhoannhanvien`
--

CREATE TABLE `taikhoannhanvien` (
  `MSNV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TaiKhoan` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `MatKhau` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `taikhoannhanvien`
--

INSERT INTO `taikhoannhanvien` (`MSNV`, `TaiKhoan`, `MatKhau`) VALUES
('0', 'giangphan', 'a940d8b1b4dbed2f777656fd0d965759d99c8ea9'),
('1', 'dilam', '3e6c06b1a28a035e21aa0a736ef80afadc43122c'),
('2', 'khoitran', '3e6c06b1a28a035e21aa0a736ef80afadc43122c'),
('3', 'duyho', '3e6c06b1a28a035e21aa0a736ef80afadc43122c'),
('4', 'khamnguyen', '3e6c06b1a28a035e21aa0a736ef80afadc43122c'),
('5', 'khangnguyen', '3e6c06b1a28a035e21aa0a736ef80afadc43122c'),
('6', 'thuatnguyen', '3e6c06b1a28a035e21aa0a736ef80afadc43122c'),
('7', 'tuongtran', '03930dd4621c7ebbefc5eb4f48a6c9ee5f09261a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taikhoannhanvien`
--
ALTER TABLE `taikhoannhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `taikhoannhanvien`
--
ALTER TABLE `taikhoannhanvien`
  ADD CONSTRAINT `taikhoannhanvien_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
