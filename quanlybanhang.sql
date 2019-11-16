-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 09:35 AM
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
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonHH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MSHH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonHH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES
('0', 'GM1', 1, 87989000),
('1', 'PC4', 2, 98098000),
('2', 'GM3', 2, 129778000);

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MSKH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `MSNV` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `TrangThai`) VALUES
('0', '1', '0', '2019-11-02 21:18:14', 'cancelled'),
('1', '1', '0', '2019-11-06 07:32:15', 'processed'),
('2', '5', '0', '2019-11-16 15:30:59', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenHH` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `Hinh` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `MoTaHH` varchar(1000) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES
('GE1', 'Chuá»™t gaming khÃ´ng dÃ¢y Logitech G903 (Äen)', 2999000, 127, 'GE', '1511979489000_img_909541_1.jpg', 'TÃªn sáº£n pháº©m: Chuá»™t mÃ¡y tÃ­nh Logitech Gaming G903 (Äen)\r\n\r\n- Káº¿t ná»‘i 2 cháº¿ Ä‘á»™ khÃ´ng dÃ¢y vÃ  cÃ³ dÃ¢y.- Sá»­ dá»¥ng Cáº£m biáº¿n quang há»c cao cáº¥p Pixart PMW3366.-DPI tuá»³ chá»‰nh tá»« 200 - 12,000 DPI.-11 nÃºt báº¥m tuá»³ chá»‰nh báº±ng pháº§n má»m Logitech Gaming Software.-Led RGB tuá»³ chá»‰nh 16,8 triá»‡u mÃ u.-Thiáº¿t káº¿ Ä‘á»‘i xá»©ng, cÃ³ phá»¥ kiá»‡n thay Ä‘á»•i phÃ­m chá»©c nÄƒng 2 bÃªn.-Káº¿t há»£p sáº¡c trá»±c tiáº¿p khi di trÃªn bá» máº·t bÃ n di chuá»™t Logitech PowerPlay.-Bá»• sung táº¡ Ä‘i kÃ¨m Ä‘iá»u chá»‰nh khá»‘i lÆ°á»£ng.-Bá»™ nhá»› trong tÃ­ch há»£p, lÆ°u giá»¯ má»i thiáº¿t láº­p trÃªn chuá»™t.'),
('GE2', 'Chuá»™t gaming khÃ´ng dÃ¢y CORSAIR Corsair Dark Core RGB SE - CH-9315111-AP (Äen)', 2580000, 127, 'GE', '1_40_89.jpg', 'TÃªn sáº£n pháº©m: Chuá»™t mÃ¡y tÃ­nh Corsair Dark Core RGB SE (Äen)\r\n\r\n- ThÆ°Æ¡ng hiá»‡u: Cosair - Chuáº©n káº¿t ná»‘i: Wireless - Ná»•i báº­t: RGB Led, NÃºt báº¥m omron, thiáº¿t káº¿ gaming DPI lÃªn Ä‘áº¿n 16000 - TÃ­ch há»£p sáº¡c khÃ´ng dÃ¢y QI'),
('GE3', 'BaÌ€n phiÌm cÆ¡ ASUS ROG Strix Flare (Fullsize/Cherry MX Blue)', 3799000, 127, 'GE', '1_26_90.jpg', 'TÃªn sáº£n pháº©m: BÃ n phÃ­m Asus ROG Strix Flare (Xanh dÆ°Æ¡ng)\r\n\r\n- BaÌ€n phiÌm cÆ¡\r\n- Káº¿t ná»‘i USB 2.0\r\n- KiÃªÌ‰u switch Cherry MX Blue'),
('GE4', 'BÃ n phÃ­m cÆ¡ Steelseries Apex Pro (Full size/OmniPoint Switch)', 4990000, 127, 'GE', '1571213465.5613744_Steelseries-Apex-Pro-1.jpg', 'TÃªn sáº£n pháº©m: BÃ n phÃ­m cÆ¡ Steelseries Apex Pro (Full size/OmniPoint Switch)\r\n\r\n- BaÌ€n phiÌm cÆ¡\r\n- Káº¿t ná»‘i: USB\r\n- Switch: OmniPoint\r\n- PhÃ­m chá»©c nÄƒng: CoÌ'),
('GM1', 'Laptop Acer Predator Triton 500 PT515-51-763U (NH.Q4WSV.003) (15\" FHD/i7-9750H/32GB/512GB SSD/RTX 20', 79990000, 126, 'GM', 'Laptop_Acer_Predator_Triton_500_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Acer Predator Triton 500 PT515-51-763U (NH.Q4WSV.003) (i7-9750H) (Äen)\r\n\r\n- CPU: Intel Core i7-9750H (2.6 GHz - 4.5 GHz/12MB/6 nhÃ¢n, 12 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 15.6\" IPS (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 32GB DDR4 2666MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 32GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630/ NVIDIA GeForce RTX 2080 8GB\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home 64-bit\r\n- Pin: 4 cell 84 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 2.1 kg'),
('GM2', 'Laptop ASUS ROG Zephyrus S GX531GW-ES006T (15.6\" FHD/i7-8750H/16GB/512GB SSD/RTX 2070/Win10/2.1 kg)', 61990000, 127, 'GM', '1566545514.488006_Asus_ROG_Zephyrus_GX531GW_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Asus GX531GW-ES006T (i7-8750H) (Äen)\r\n\r\n- CPU: Intel Core i7-8750H ( 2.2 GHz - 4.1 GHz / 9MB / 6 nhÃ¢n, 12 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 15.6\" ( 1920 x 1080 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 16GB (8GB + 8GB Onboard) DDR4 2666MHz\r\n- Äá»“ há»a: Intel UHD Graphics 630 / NVIDIA GeForce RTX 2070 8GB GDDR6\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 4 cell 60 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 2.1 kg'),
('GM3', 'Laptop MSI Prestige P65 Creator 8RF-488VN (15.6\" FHD/i7-8750H/16GB/GTX 1070/Win10/1.9 kg)', 58990000, 125, 'GM', 'laptop_msi_p65_8rf-488vn_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop MSI P65 8RF-488VN (i7-8750H) (Tráº¯ng)\r\n\r\n- CPU: Intel Core i7-8750H ( 2.2 GHz - 4.1 GHz / 9MB / 6 nhÃ¢n, 12 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 15.6\" IPS ( 1920 x 1080 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 2 x 8GB DDR4 2666MHz\r\n- Äá»“ há»a: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1070 8GB GDDR5\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 4 cell 82 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 1.9 kg'),
('GM4', 'Laptop Lenovo Legion Y740-15IRHG (81UH003JVN) (15\" FHD/i7-9750H/16GB/1TB SSD/RTX 2060/Win10/2.2 kg)', 48490000, 127, 'GM', '1569404878.0558794_Lenovo_Legion_Y740_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Lenovo Legion Y740-15IRHg-81UH003JVN (i7-9750H)\r\n\r\n- CPU: Intel Core i7-9750H (2.6 GHz - 4.5 GHz/12MB/6 nhÃ¢n, 12 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 15.6\" IPS (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 2 x 8GB DDR4 2666MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 32GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630/ NVIDIA GeForce RTX 2060 6GB\r\n- LÆ°u trá»¯: 1TB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home 64-bit\r\n- Pin: 3 cell 57 Wh Pin rá»i, Khá»‘i lÆ°á»£ng: 2.2 kg'),
('GM5', 'Laptop Dell G5 5590-4F4Y41 (15\" FHD/i7-9750H/8GB/256GB SSD/GTX 1650/Win10/2.7 kg)', 34490000, 127, 'GM', '1565843121.528632_Dell_Inspiron_G5_5590_Black_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Dell Inspiron G5 5590 (5590-4F4Y41) (i7-9750H)\r\n\r\n- CPU: Intel Core i7 9750H (2.6 GHz - 4.5 GHz/12MB/6 nhÃ¢n, 12 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 15.6\" IPS (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 2 x 4GB DDR4 2666MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 32GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630/ NVIDIA GeForce GTX 1650 4GB\r\n- LÆ°u trá»¯: 256GB SSD M.2 NVMe / 1TB HDD 5400RPM\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 4 cell 60 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 2.7 kg'),
('MD1', 'Laptop Apple Macbook Pro 2018 15\" MR942 (15\"/Core i7/16GB/Radeon Pro 560/macOS/1.8 kg) SKU: 1808319', 59800000, 127, 'MD', 'macbook_pro_2017_touchbar_spacegray_1_2.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop MacBook Pro 2018 15\" MR942 (XÃ¡m)\r\n\r\n- CPU: Core i7 ( 2.6 GHz\r\n- MÃ n hÃ¬nh: 15\" ( 2880 x 1800 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 16GB\r\n- Äá»“ há»a: Intel UHD Graphics 630 / AMD Radeon Pro 560 4GB\r\n- LÆ°u trá»¯: 512GB SSD\r\n- Há»‡ Ä‘iá»u hÃ nh: macOS\r\n- Pin: Pin liá»n , khá»‘i lÆ°á»£ng: 1.8 kg'),
('MD2', 'Laptop Acer Swift 7 SF714-52T-7134 (NX.H98SV.002) (14\" FHD/i7-8500Y/16GB/512GB SSD/UHD 615/Win10/0.8', 49990000, 127, 'MD', '1570084002.552043_Acer_Swift_7_SF714-52-52T_Black_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Acer Swift 7 SF714-52T-7134 (NX.H98SV.002) (i7-8500Y)\r\n\r\n- CPU: Intel Core i7-8500Y (1.5 GHz - 4.2 GHz/4MB/2 nhÃ¢n, 4 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 14\" IPS (1920 x 1080), caÌ‰m Æ°Ìng\r\n- RAM: 16GB Onboard LPDDR3 1600MHz , KhÃ´ng nÃ¢ng cáº¥p Ä‘Æ°á»£c)\r\n- Äá»“ há»a: Intel UHD Graphics 615\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 3 cell 32 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 0.8 kg'),
('MD3', 'Laptop HP EliteBook 1030 G3 (5DK17PA) (13\"/i7-8550U/8GB/UHD 620/Win10/1.2 kg)', 46990000, 127, 'MD', '1_45_66.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop HP EliteBook 1030 G3 (5DK17PA) (Báº¡c)\r\n\r\n- CPU: Intel Core i7-8550U ( 1.8 GHz - 4.0 GHz / 8MB / 4 nhÃ¢n, 8 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 13\" ( 3000 x 2000 ) , caÌ‰m Æ°Ìng\r\n- RAM: 8GB Onboard LPDDR3\r\n- Äá»“ há»a: Intel UHD Graphics 620 / Shared memory\r\n- LÆ°u trá»¯: 256GB SSD M.2 NVMe\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Pro 64-bit\r\n- Pin: 4 cell 50 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 1.2 kg'),
('MD4', 'Laptop LG Gram 17Z990-V.AH75A5 (17\" QHD/i7-8565U/8GB/512GB SSD/UHD 620/Win10/1.3 kg)', 39990000, 127, 'MD', '1570696269.111742_LG_17Z990-V.AH75A5_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop LG 17Z990-V.AH75A5 (i7-8565U)\r\n\r\n- CPU: Intel Core i7-8565U (1.8 GHz - 4.6 GHz/8MB/4 nhÃ¢n, 8 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 17\" IPS (2560 x 1600), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB Onboard DDR4 2400MHz (1 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 16GB)\r\n- Äá»“ há»a: Intel UHD Graphics 620\r\n- LÆ°u trá»¯: 512GB SSD M.2 SATA /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home 64-bit\r\n- Pin: 4 cell 72 WhKhá»‘i lÆ°á»£ng: 1.3 kg'),
('OF1', 'Laptop Dell Inspiron 7591-KJ2G41 (15\" FHD/i7-9750H/8GB/256GB SSD/GTX 1050/Win10/1.8 kg)', 29990000, 127, 'OF', '1566625130.154246_Dell_Inspiron_15_7591_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Dell Inspirion 15 7591- KJ2G41 (i7-9750H)\r\n\r\n- CPU: Intel Core i7-9750H (2.6 GHz - 4.5 GHz/12MB/6 nhÃ¢n, 12 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 15.6\" (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB DDR4 2666MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 32GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630/ NVIDIA GeForce GTX 1050 3GB\r\n- LÆ°u trá»¯: 256GB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 3 cell 56 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 1.8 kg'),
('OF2', 'Laptop ASUS ZenBook 14 UX433FA-A6076T (14\" FHD/i7-8565U/8GB/512GB SSD/UHD 620/Win10/1.2 kg) SKU: 190', 25490000, 127, 'OF', '1566190401.5831254_Asus_Zenbook_UX433_Numpad_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Asus Zenbook UX433FA-A6076T (i7-8565U) (Xanh)\r\n\r\n- CPU: Intel Core i7-8565U ( 1.8 GHz - 4.6 GHz / 8MB / 4 nhÃ¢n, 8 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 14\" ( 1920 x 1080 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB Onboard LPDDR3\r\n- Äá»“ há»a: Intel UHD Graphics 620\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home 64-bit\r\n- Pin: 3 cell 50 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 1.2 kg'),
('OF3', 'MÃ´ táº£  TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Lenovo Thinkpad L390-20NRS00500 (i7-8565U)', 25390000, 127, 'OF', 'c7306248583128ae018d85fe7cdd2b5b_lenovo thinkpad l390_1.jpg', '\r\nMÃ´ táº£\r\n\r\nTÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Lenovo Thinkpad L390-20NRS00500 (i7-8565U) (Äen)\r\n\r\n- CPU: Intel Core i7-8565U ( 1.8 GHz - 4.6 GHz / 8MB / 4 nhÃ¢n, 8 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 13.3\" IPS ( 1920 x 1080 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB DDR4 2666MHz\r\n- Äá»“ há»a: Intel UHD Graphics 620\r\n- LÆ°u trá»¯: 256GB SSD M.2\r\n- Há»‡ Ä‘iá»u hÃ nh: Free DOS\r\n- Pin: 3 cell 45 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 1.5 kg\r\nLaptop Lenovo ThinkPad L390-20NRS00500 (13\" FHD/i7-8565U/8GB/256GB SSD/UHD 620/Free DOS/1.5 kg)'),
('OF4', 'Laptop HP ENVY 13-aq0026TU (6ZF38PA) (13\" FHD/i5-8265U/8GB/256GB SSD/UHD 620/Win10/1.2 kg)', 21990000, 127, 'OF', '684518a7c9d1b16371fc3d52a2d159d9_hp envy 13-aq0000tu_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop HP Envy 13-aq0026TU (6ZF38PA) (i5-8265U) (VÃ ng)\r\n\r\n- CPU: Intel Core i5-8265U (1.6 GHz - 3.9 GHz/6MB/4 nhÃ¢n, 8 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 13.3\" IPS (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 8GB Onboard DDR4 2400MHz , KhÃ´ng nÃ¢ng cáº¥p Ä‘Æ°á»£c)\r\n- Äá»“ há»a: Intel UHD Graphics 620 Shared memory\r\n- LÆ°u trá»¯: 256GB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home 64-bit\r\n- Pin: 4 cell 53 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 1.2 kg'),
('PC1', 'Apple iMac MRR02 (27\"/Core i5/8GB/2TB HDD/Radeon Pro 580X/Mac OS)', 52800000, 127, 'PC', '1b76a9a0490493acba7c354d5f128246_imac_2019_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh Ä‘á»ƒ bÃ n/ PC iMac MRR02 (2019)\r\n\r\n- CPU: ( 3.70 GHz - 4.60 GHz / 9MB / 6 nhÃ¢n, 6 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 27\" Retina ( 5120 x 2880 )\r\n- RAM: 1 x 8GB DDR4 2666MHz Radeon Pro 575X 4GB\r\n- LÆ°u trá»¯: 1TB Fusion Drive\r\n- KÃ¨m Keyboard + Magic Mouse 2'),
('PC2', 'MSI Trident X Plus 9SE 256XVN (i7-9700K/16GB/256GB SSD/1TB HDD/RTX 2080/Free DOS)', 61990000, 127, 'PC', 'd19fdaa5d39bb6859c42ec63782a71f4_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh Ä‘á»ƒ bÃ n/ PC MSI Trident X Plus 9SE-256XVN RGB\r\n\r\n- CPU: Intel Core i7-9700K ( 3.60 GHz - 4.90 GHz / 12MB / 8 nhÃ¢n, 8 luá»“ng ) \r\n- RAM: 2 x 8GB DDR4 2666MHz \r\n- Äá»“ há»a: Intel UHD Graphics 630 / GeForce RTX 2080 11GB \r\n- LÆ°u trá»¯: 256GB SSD / 1TB HDD 7200RPM'),
('PC3', 'ASUS ROG Strix GL10CS VN004T (i5-9400/8GB/1TB HDD/GTX 1660Ti/Win10)', 19950000, 127, 'PC', '1569396307.0769732_Asus_ROG_Strix_GL10_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh Ä‘á»ƒ bÃ n/ PC Asus ROG Strix GL10CS (i5 9400/8GB/1TB/GTX1660Ti 6GB/Win10) (GL10CS-VN004T)\r\n\r\n- CPU: Intel Core i5-9400 (2.90 GHz up to 4.10 GHz/9MB/6 nhÃ¢n, 6 luÃ´Ì€ng)\r\n- RAM: 1 x 8GB DDR4 2666MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 32GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630 / GeForce GTX 1660TI 6GB\r\n- LÆ°u trá»¯: 1TB HDD 7200RPM'),
('PC4', 'Dell Precision 5820 Tower 70177846 (Xeon W-2104/16GB/1TB HDD/Quadro P620/Win10)', 44590000, 125, 'PC', '1568707326.2262836_Dell_Precision_Tower_5820_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh Ä‘á»ƒ bÃ n/ PC Dell Precision Tower 5820 (Xeon W-2104/16GB/1TB/P620/Win10) (70177846)\r\n\r\n- CPU: Intel Xeon W-2104 (3.2GHz, 4C, 8.25M Cache) \r\n- Ram: 2 x 8GB DDR4 2666MHz (8 khe, há»— trá»£ tá»‘i Ä‘a 256GB) \r\n- Äá»“ há»a: Quadro P620 2GB \r\n- LÆ°u trá»¯: 1TB HDD 7200 RPM'),
('PC5', 'PC Intel NUC Kit NUC7i3BNHXF Baby Canyon NUC7i3BNHXF (i3-7100U/4GB/1TB HDD/Iris 620)', 13530000, 115, 'PC', '1_47_6.jpg', ''),
('WS1', 'Laptop Acer Nitro 5 AN515-54-59SF (NH.Q5ASV.013) (15\" FHD/i5-9300H/8GB/512GB SSD/GTX 1050/Win10/2.3 ', 21990000, 127, 'WS', '1565764223.3360925_Acer_Nitro_5_AN515-54_2019_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Acer Nitro 5 AN515-54-59SF (NH.Q5ASV.013) (i5-9300H)\r\n\r\n- CPU: Intel Core i5 9300H (2.4 GHz - 4.1 GHz/8MB/4 nhÃ¢n, 8 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 15.6\" IPS (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB DDR4 2400MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 32GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630/ NVIDIA GeForce GTX 1050 3GB\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home 64-bit\r\n- Pin: 4 cell 55 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 2.3 kg'),
('WS2', 'Laptop ASUS TUF Gaming FX505GD-BQ012T (15.6\" FHD/i5-8300H/8GB/1TB HDD/GTX 1050/Win10/2.2 kg)', 21490000, 127, 'WS', '1566531958.1521301_Asus_TUF_Gaming_FX505GD-GE_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Asus TUF Gaming FX505GD-BQ012T (i5-8300H) (XÃ¡m)\r\n\r\n- CPU: Intel Core i5-8300H ( 2.3 GHz - 4.0 GHz / 8MB / 4 nhÃ¢n, 8 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 15.6\" IPS ( 1920 x 1080 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB DDR4 2666MHz\r\n- Äá»“ há»a: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1050 4GB GDDR5\r\n- LÆ°u trá»¯: 1TB HDD 5400RPM\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 3 cell 48 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 2.2 kg'),
('WS3', 'Laptop Lenovo Ideapad L340-15IRH (81LK007JVN) (15\" FHD/i7-9750H/8GB/1TB HDD/GTX 1050/Free DOS/2.2 kg', 20500000, 127, 'WS', '3c6ff7da4869fdf8303c08be6883759d_lenovo ideapad l340-15irh_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop Lenovo Ideapad L340-15IRH 81LK007JVN (I7-9750H) (Äen)\r\n\r\n- CPU: Intel Core i7 9750H ( 2.6 GHz - 4.5 GHz / 12MB / 6 nhÃ¢n, 12 luÃ´Ì€ng )\r\n- MÃ n hÃ¬nh: 15.6\" ( 1920 x 1080 ) , khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 8GB DDR4 2666MHz\r\n- Äá»“ há»a: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1050 3GB GDDR5\r\n- LÆ°u trá»¯: 1TB HDD 5400RPM\r\n- Há»‡ Ä‘iá»u hÃ nh: Free DOS\r\n- Pin: 3 cell 45 Wh Pin liá»n , khá»‘i lÆ°á»£ng: 2.2 kg'),
('WS4', 'Laptop MSI GL65 9SDK-054VN (15\" FHD/i5-9300H/8GB/512GB SSD/GTX 1660Ti/Win10/2.3 kg)', 29990000, 127, 'WS', '1567061107.1963878_MSI_GL65_1.jpg', 'TÃªn sáº£n pháº©m: MÃ¡y tÃ­nh xÃ¡ch tay/ Laptop MSI GL65 9SD-054VN (I5-9300H)\r\n\r\n- CPU: Intel Core i5 9300H (2.4 GHz - 4.1 GHz/8MB/4 nhÃ¢n, 8 luÃ´Ì€ng)\r\n- MÃ n hÃ¬nh: 15.6\" IPS (1920 x 1080), khÃ´ng caÌ‰m Æ°Ìng\r\n- RAM: 1 x 8GB DDR4 2666MHz (2 Khe cáº¯m, Há»— trá»£ tá»‘i Ä‘a 64GB)\r\n- Äá»“ há»a: Intel UHD Graphics 630/ NVIDIA GeForce GTX 1660Ti 6GB\r\n- LÆ°u trá»¯: 512GB SSD M.2 NVMe /\r\n- Há»‡ Ä‘iá»u hÃ nh: Windows 10 Home SL 64-bit\r\n- Pin: 6 cell 51 Wh Pin liá»n, Khá»‘i lÆ°á»£ng: 2.3 kg');

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

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
('0', 'Phan Thanh Giáº£ng', 'quanly', 'Tam BÃ¬nh, VÄ©nh Long', '0868442808'),
('1', 'LÃ¢m VÄƒn Di', 'banhang', 'ChÃ¢u ThÃ nh, KiÃªn Giang', '0845000408'),
('2', 'Tráº§n VÄƒn Khá»Ÿi', 'kythuat', 'Giá»“ng Riá»ng, KiÃªn Giang', '0392959702'),
('3', 'Há»“ KhÃ¡nh Duy', 'kythuat', 'Long Má»¹, Háº­u Giang', '0929262646'),
('4', 'Nguyá»…n ÄÃ¬nh KhÃ¢m', 'tuvan', 'Long Má»¹, Háº­u Giang', '0356879141'),
('5', 'Nguyá»…n PhÃºc Báº£o Khang', 'banhang', 'Mang ThÃ­t, VÄ©nh Long', '0939664344'),
('6', 'Nguyá»…n Minh Thuáº­t', 'banhang', 'VÅ©ng LiÃªm, VÄ©nh Long', '0929090507'),
('7', 'Tráº§n VÄ©nh TÆ°á»ng', 'kythuat', 'Ã” MÃ´n, Cáº§n ThÆ¡', '0907047617');

-- --------------------------------------------------------

--
-- Table structure for table `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenNhom` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('GE', 'Gaming Gear'),
('GM', 'Gaming'),
('MD', 'Multimedia'),
('OF', 'Office'),
('PC', 'PC'),
('WS', 'Workstation');

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
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonHH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`,`MSNV`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaNhom` (`MaNhom`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Indexes for table `taikhoankhachhang`
--
ALTER TABLE `taikhoankhachhang`
  ADD PRIMARY KEY (`IDKH`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`);

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
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_3` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdathang_ibfk_4` FOREIGN KEY (`SoDonHH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `taikhoankhachhang`
--
ALTER TABLE `taikhoankhachhang`
  ADD CONSTRAINT `taikhoankhachhang_ibfk_1` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taikhoannhanvien`
--
ALTER TABLE `taikhoannhanvien`
  ADD CONSTRAINT `taikhoannhanvien_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
