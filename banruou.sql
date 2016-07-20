-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2014 at 02:45 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banruou`
--
CREATE DATABASE IF NOT EXISTS `banruou` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `banruou`;

-- --------------------------------------------------------

--
-- Table structure for table `capdo`
--

CREATE TABLE IF NOT EXISTS `capdo` (
  `MaCapDo` int(5) NOT NULL AUTO_INCREMENT,
  `Tencapdo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaCapDo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `capdo`
--

INSERT INTO `capdo` (`MaCapDo`, `Tencapdo`) VALUES
(1, 'admin'),
(2, 'thuong');

-- --------------------------------------------------------

--
-- Table structure for table `chitietddh`
--

CREATE TABLE IF NOT EXISTS `chitietddh` (
  `MaDDH` int(5) NOT NULL,
  `MaSP` int(5) NOT NULL,
  `Soluong` int(15) NOT NULL,
  `Dongia` int(15) NOT NULL,
  PRIMARY KEY (`MaDDH`,`MaSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietddh`
--

INSERT INTO `chitietddh` (`MaDDH`, `MaSP`, `Soluong`, `Dongia`) VALUES
(7, 31, 1, 265000),
(7, 41, 2, 465000),
(7, 46, 1, 2600000),
(9, 41, 1, 465000),
(11, 52, 1, 145000),
(12, 51, 2, 176000),
(13, 52, 1, 145000),
(14, 52, 1, 145000),
(15, 55, 1, 13950000),
(16, 54, 1, 950000),
(16, 55, 1, 13950000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsp`
--

CREATE TABLE IF NOT EXISTS `danhmucsp` (
  `MaDanhMuc` int(5) NOT NULL AUTO_INCREMENT,
  `TenDanhMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  PRIMARY KEY (`MaDanhMuc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `danhmucsp`
--

INSERT INTO `danhmucsp` (`MaDanhMuc`, `TenDanhMuc`, `trangthai`) VALUES
(1, 'RÆ°á»£u vang', 1),
(2, 'RÆ°á»£u ngoáº¡i', 1),
(3, 'RÆ°á»£u pha cháº¿', 1),
(4, 'RÆ°á»£u chÃ¢u Ã', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE IF NOT EXISTS `dondathang` (
  `MaDDH` int(5) NOT NULL AUTO_INCREMENT,
  `MaTK` int(5) NOT NULL,
  `MaHTTT` int(5) NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  `Ngaydat` date NOT NULL,
  PRIMARY KEY (`MaDDH`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`MaDDH`, `MaTK`, `MaHTTT`, `trangthai`, `Ngaydat`) VALUES
(7, 1, 1, 1, '2014-03-11'),
(9, 2, 1, 2, '2014-03-12'),
(11, 9, 1, 1, '2014-03-22'),
(12, 9, 1, 1, '2014-03-22'),
(13, 2, 1, 1, '2014-04-14'),
(14, 2, 1, 2, '2014-05-16'),
(15, 2, 1, 2, '2014-05-16'),
(16, 2, 1, 1, '2014-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucthanhtoan`
--

CREATE TABLE IF NOT EXISTS `hinhthucthanhtoan` (
  `MaHTTT` int(5) NOT NULL AUTO_INCREMENT,
  `TenHTTT` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHTTT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hinhthucthanhtoan`
--

INSERT INTO `hinhthucthanhtoan` (`MaHTTT`, `TenHTTT`) VALUES
(1, 'Trá»±c tiáº¿p');

-- --------------------------------------------------------

--
-- Table structure for table `hoidap`
--

CREATE TABLE IF NOT EXISTS `hoidap` (
  `MaCH` int(11) NOT NULL AUTO_INCREMENT,
  `MaTK` int(11) NOT NULL,
  `Tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `Traloi` text COLLATE utf8_unicode_ci NOT NULL,
  `Ngaytao` date NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  PRIMARY KEY (`MaCH`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hoidap`
--

INSERT INTO `hoidap` (`MaCH`, `MaTK`, `Tieude`, `Noidung`, `Traloi`, `Ngaytao`, `trangthai`) VALUES
(1, 1, 'a', 'b', '<p>&aacute; báº¿ cáº¿ Ä‘áº¿ áº¿</p>', '2014-03-09', 1),
(2, 1, 'b', 'c', '<p>áº¥d</p>', '2014-03-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE IF NOT EXISTS `lienhe` (
  `MaLH` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` date NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`MaLH`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`MaLH`, `hoten`, `sdt`, `diachi`, `email`, `noidung`, `ngaytao`, `trangthai`) VALUES
(1, 'admin', '132343', 'viet nam', 'admin@admin.com', 'abc', '2014-03-09', 1),
(2, 'hung', '123', 'fsdf', 'Ã¡dw', 'Ã¡d', '2014-03-09', 1),
(3, 'admin', '132343', 'viet nam', 'admin@admin.com', 'aaaaaaa', '2014-03-12', 1),
(4, 'admin', '132343', 'viet nam', 'admin@admin.com', 'dd', '2014-03-12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE IF NOT EXISTS `loaisp` (
  `MaLSP` int(5) NOT NULL AUTO_INCREMENT,
  `MaDanhMuc` int(5) NOT NULL,
  `TenLSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  PRIMARY KEY (`MaLSP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MaLSP`, `MaDanhMuc`, `TenLSP`, `trangthai`) VALUES
(1, 1, 'RÆ°á»£u vang PhÃ¡p', 1),
(2, 1, 'RÆ°á»£u vang Chi LÃª', 1),
(3, 1, 'RÆ°á»£u vang Ãšc', 1),
(4, 2, 'RÆ°á»£u Chivas', 1),
(5, 2, 'RÆ°á»£u Champagne', 1),
(6, 2, 'RÆ°á»£u Jonhnnie Walker', 1),
(7, 2, 'RÆ°á»£u Cognac', 1),
(8, 3, 'RÆ°á»£u pha cháº¿', 1),
(9, 4, 'RÆ°á»£u HÃ n Quá»‘c', 1),
(10, 4, 'RÆ°á»£u Nháº­t Báº£n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `MaNCC` int(5) NOT NULL AUTO_INCREMENT,
  `TenNCC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Dienthoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  PRIMARY KEY (`MaNCC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `Diachi`, `Dienthoai`, `Email`, `trangthai`) VALUES
(6, 'Äá»“ng XuÃ¢n', '4B BÃ¹i Thá»‹ XuÃ¢n, P. 2, Tp. ÄÃ  Láº¡t, LÃ¢m Äá»“ng', '(063 ) 3824883 ', 'dongxuan@gmail.com', 1),
(7, 'SÃ i GÃ²n - Äá»“ng XuÃ¢n', 'Km 9, ThÄƒng Long Ná»™i BÃ i, Quang Minh, MÃª Linh, HÃ  Ná»™i ', '(04 ) 38840392', 'saigondongxuan@gmail.com', 1),
(8, 'Tanaka', 'LÃ´ BI.03b-05 ÄÆ°á»ng 6, Khu Cháº¿ Xuáº¥t TÃ¢n Thuáº­n, P. TÃ¢n Thuáº­n ÄÃ´ng, Q. 7, Tp. Há»“ ChÃ­ Minh (TPHCM) ', '(08 ) 37701085 ', 'tanakaco@hcm.fpt.vn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSP` int(5) NOT NULL AUTO_INCREMENT,
  `MaNCC` int(11) NOT NULL,
  `MaLSP` int(5) NOT NULL,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mota` text COLLATE utf8_unicode_ci NOT NULL,
  `Dongia` int(15) NOT NULL,
  `Hinhanh` text COLLATE utf8_unicode_ci NOT NULL,
  `Soluong` int(15) NOT NULL,
  `Noibat` int(11) NOT NULL,
  `Ngaytao` date NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  PRIMARY KEY (`MaSP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaNCC`, `MaLSP`, `TenSP`, `Mota`, `Dongia`, `Hinhanh`, `Soluong`, `Noibat`, `Ngaytao`, `trangthai`) VALUES
(9, 6, 2, 'Vang Chile Errazuric 2012', '<p>+ Xuáº¥t sá»© : Chile</p>\r\n<p>+ Dung T&iacute;ch : 750ml</p>', 430000, 'upload/Vang Chile Errazuric 2012.jpg', 100, 0, '2014-03-10', 1),
(10, 6, 1, 'Chateau Haut Selve Graves', '<p>Chateau Haut Selve Graves</p>\r\n<p>Loáº¡i Vang: Vang Äá»</p>\r\n<p>Dung t&iacute;ch: 750ml</p>\r\n<p>Th&agrave;nh pháº§n: Merlot v&agrave; Carbernet Sauvignon</p>', 513000, 'upload/chateau-haut-selve-rouge.jpg', 40, 0, '2014-03-10', 1),
(11, 7, 3, 'RÆ°á»£u vang Jacob Creek Shiraz Cabernet Johann', '<p>Jacob Creek Shiraz Cabernet Johann</p>\r\n<p>Th&ocirc;ng tin sáº£n pháº©m:</p>\r\n<p>&bull; Xuáº¥t xá»©: &Uacute;c</p>\r\n<p>&bull; Dung t&iacute;ch: 750ml</p>\r\n<p>&bull; Äá»™ cá»“n: 13,5&deg;</p>', 1780000, 'upload/Jacob Creek Shiraz Cabernet Johann.jpg', 15, 1, '2014-03-10', 1),
(12, 7, 6, 'Johnnie Walker King George V', '<p>Johnnie Walker King George V</p>', 9450000, 'upload/Johnnie Walker King George V.jpg', 100, 1, '2014-03-10', 1),
(13, 8, 7, 'Hennessy XO', '<p>Hennessy XO</p>\r\n<p>Dung t&iacute;ch:750ml</p>\r\n<p>Äá»™ cá»“n: 40%</p>\r\n<p>Xuáº¥t xá»©: Ph&aacute;p</p>', 3950000, 'upload/Hennessy XO.jpg', 100, 1, '2014-03-10', 1),
(14, 8, 8, 'RÆ°á»£u Martini Rosso ', '<p>- 30ml rÆ°á»£u Gin</p>\r\n<p>- 30ml Rosso Martini ( rÆ°á»£u vermouth ngá»t )</p>\r\n<p>- 30ml Campari</p>\r\n<p>- Soda</p>\r\n<p>- Ä&aacute; vi&ecirc;n</p>', 300000, 'upload/Martini Rosso.jpg', 20, 0, '2014-03-10', 1),
(15, 6, 9, 'RÆ°á»£u JaJaYeonYeon', '<p>- Loáº¡i rÆ°á»£u: RÆ°á»£u tr&aacute;i c&acirc;y</p>\r\n<p>- Ná»“ng Ä‘á»™ cá»“n: 12%</p>\r\n<p>- Thá»ƒ t&iacute;ch thá»±c: 500ml.</p>\r\n<p>- Th&agrave;nh pháº§n 100% tr&aacute;i d&acirc;u rá»«ng H&agrave;n Quá»‘c</p>', 215000, 'upload/JaJaYeonYeon.jpg', 15, 0, '2014-03-11', 1),
(16, 6, 10, 'HAKUSHIKA KEISHUKU GOLD', '<p>HAKUSHIKA KEISHUKU GOLD Dung t&iacute;ch: 1,8l</p>', 1980000, 'upload/HAKUSHIKA KEISHUKU GOLD.jpg', 20, 0, '2014-03-11', 2),
(17, 7, 1, 'RÆ°á»£u vang PhÃ¡p Pierres Brunes Merlot', '<p><strong><strong>RÆ°á»£u vang Ph&aacute;p Pierres Brunes Merlot<br /></strong></strong></p>\r\n<h1><span style="line-height: 20px; font-size: small; color: #191919;">Thá»ƒ t&iacute;ch: 750ml</span></h1>\r\n<h1><span style="line-height: 20px; font-size: 13px', 207000, 'upload/Pierres Brunes Merlot.JPG', 40, 0, '2014-03-11', 2),
(18, 6, 1, 'Domaine De Sainte Marthe Blend', '<p><span style="font-size: 16px;"><span style="font-size: 16px;">Dung t&iacute;ch: 750ml<br /> Äá»™ cá»“n: 14%</span></span></p>', 446000, 'upload/Domaine De Sainte Marthe Blend.jpg', 40, 0, '2014-03-11', 2),
(19, 6, 1, 'Domaine De Sainte Marthe Syrah', '<p><span style="font-size: 16px;"><span style="line-height: 17.98611068725586px; background-color: #ededed; font-size: 16px;">Dung t&iacute;ch: 750ml<br /> Äá»™ cá»“n:</span><span style="line-height: 17.98611068725586px; background-color: #ededed; font-s', 276000, 'upload/Domaine De Sainte Marthe Syrah.jpg', 50, 0, '2014-03-11', 1),
(20, 6, 1, 'Domaine De Sainte Marthe Carbernet', '<p><span style="font-size: 16px;">Dung t&iacute;ch: 750ml<br /> Äá»™ cá»“n: 12,5%</span></p>', 228000, 'upload/Domaine De Sainte Marthe Carbernet.jpg', 40, 0, '2014-03-11', 1),
(21, 6, 1, 'Marquis De Chasse White Bordeaux', '<p><span style="font-size: 16px;">Dung t&iacute;ch: 175ml<br /> Äá»™ cá»“n: 12,5%<br /> Loáº¡i Vang: Vang tráº¯ng</span></p>', 295000, 'upload/Marquis De Chasse White Bordeaux.jpg', 15, 0, '2014-03-11', 2),
(22, 7, 1, 'Grand Sud Merlot', '<p><span style="font-size: 16px;">Vang Ä‘á»<br /> Dung t&iacute;ch: 750ml<br /> Äá»™ cá»“n: 12,5%</span></p>', 150000, 'upload/Grand Sud Merlot.jpg', 50, 0, '2014-03-11', 2),
(23, 6, 1, 'ChÃ¢teaux plantes des vignes 2009 ', '<p><span style="font-family: arial; font-size: 16px; line-height: normal;">Dung t&iacute;ch: 750ml<br /> Äá»™ cá»“n: 13,5%</span></p>', 300000, 'upload/chateaux plantes des vignes 2009.jpg', 20, 0, '2014-03-11', 2),
(24, 6, 1, 'Chateaux Du Tertre', '<p><span style="font-size: 16px;">Thá»ƒ t&iacute;ch: 750ml</span><br /> <span style="font-size: 16px;">Ná»“ng Ä‘á»™: 12,5%</span></p>', 374000, 'upload/Chateaux Du Tertre.JPG', 50, 0, '2014-03-11', 2),
(25, 7, 2, 'Casa Vicho Gran Resever ', '<p><span style="font-size: 16px;">Dung t&iacute;ch: 750ml<br /> Äá»™ cá»“n: 13,5%</span></p>', 890000, 'upload/Casa Vicho Gran Resever.jpg', 20, 1, '2014-03-11', 1),
(26, 7, 2, 'Casa Vicho Premium selection', '<p><span style="font-size: 16px;">Äá»™ cá»“n: 13,5%<br /> Dung t&iacute;ch: 750ml</span></p>', 950000, 'upload/Casa Vicho Premium selection.jpg', 15, 0, '2014-03-11', 1),
(27, 7, 2, 'CAYAO Icon Wine', '<p><span style="line-height: normal;"><span style="font-size: 14px;">Dung t&iacute;ch: 750ml<br /> Loáº¡i nho: Cabernet sauvignon 45%+Carm&eacute;n&egrave;re39%+Malbec 12%+Syrah 4%<br /> Äá»™ cá»“n: 14%</span></span></p>', 3150000, 'upload/CAYAO Icon Wine.jpg', 20, 1, '2014-03-11', 1),
(28, 7, 2, 'Ovation Ravanal Syrah', '<p><span style="font-size: 14px;"><span style="font-size: 14px; line-height: 14px; color: #222222;">Ná»“ng Ä‘á»™: 15,8%<br /> Nho:&nbsp;</span><span style="font-size: 14px; line-height: 14px; color: #222222;">Syrah</span>&lt;br style="color: #222222; font', 4950000, 'upload/Ovation Ravanal Syrah.jpg', 30, 1, '2014-03-11', 1),
(29, 6, 3, 'RÆ°á»£u vang Eileen hardy Shiraz', '<p><span style="line-height: normal; font-size: 16px;"><span style="font-size: 13px; font-family: tahoma;"><span style="font-size: small; line-height: normal;">Ná»“ng Ä‘á»™: 13.9%<br /> </span><span style="line-height: normal; font-size: 13px;">Thá»i gia', 6350000, 'upload/Eileen hardy Shiraz.jpg', 20, 1, '2014-03-11', 1),
(30, 6, 3, 'RÆ°á»£u vang George Wyndham Semillon Sauvignon Blanc', '<p><span style="line-height: normal; font-size: 13px; font-family: tahoma;"><span style="line-height: normal; font-size: 13px;">Th&ocirc;ng tin sáº£n pháº©m:</span><br style="font-size: 13px; line-height: normal;" /> <span style="line-height: normal; font', 650000, 'upload/George Wyndham Semillon Sauvignon Blanc.jpg', 20, 0, '2014-03-11', 2),
(31, 6, 3, 'RÆ°á»£u vang Varietal Range Sauvingon Blanc', '<p><span style="line-height: normal; font-size: 13px; font-family: tahoma;"><span style="font-family: tahoma; font-size: small; line-height: normal;"><span style="text-decoration: underline;">Phá»¥ tr&aacute;ch sáº£n xuáº¥t:</span> Paul Lapsley&nbsp;</spa', 265000, 'upload/Varietal Range Sauvingon Blanc.jpg', 28, 0, '2014-03-11', 1),
(32, 6, 4, 'RÆ°á»£u ngoáº¡i Chivas Regal 25 Year Old', '<p><span style="font-family: tahoma; font-size: 13px;">Chivas 25 year<br style="font-size: 13px; line-height: normal;" /> </span> <span style="font-family: tahoma; font-size: 13px;"><br style="font-size: 13px; line-height: normal;" /> <span style="line-he', 5850000, 'upload/Chivas Regal 25 Year Old.jpg', 5, 1, '2014-03-11', 1),
(33, 6, 4, 'RÆ°á»£u ngoáº¡i Chivas Regal Scotch Whisky 12 Year Old', '<ul>\r\n<li><span style="font-size: 16px; font-family: tahoma;">Chá»§ng loáº¡i:&nbsp;<span style="font-size: 16px; color: #224444;">RÆ°á»£u Whisky</span></span></li>\r\n<li><span style="font-size: 16px; font-family: tahoma;">Xuáº¥t xá»©:&nbsp;<span style="fon', 550000, 'upload/Chivas Regal Scotch Whisky 12 Year Old.jpg', 50, 1, '2014-03-11', 1),
(34, 6, 4, 'RÆ°á»£u ngoáº¡i Chivas Regal 18 Year Old', '<ul>\r\n<li><span style="font-size: 16px;"><span style="font-size: 16px; font-family: tahoma;">&raquo; Chá»§ng loáº¡i:&nbsp;<span style="font-size: 16px; color: #224444;">RÆ°á»£u Whisky</span></span></span></li>\r\n<li><span style="font-size: 16px; font-famil', 1250000, 'upload/Chivas Regal 18 Year Old.jpg', 20, 1, '2014-03-11', 1),
(35, 6, 4, 'RÆ°á»£u ngoáº¡i chivas regal royal salute 21 year old', '<p><span style="font-family: tahoma; font-size: 16px;"><span style="line-height: normal; font-size: 16px;">- Chá»§ng loáº¡i:&nbsp;</span><span style="line-height: normal; font-size: 16px;">RÆ°á»£u Whisky<br /> </span></span></p>\r\n<ul style="margin-bottom:', 2250000, 'upload/chivas regal royal salute 21 year old.jpg', 15, 1, '2014-03-11', 1),
(36, 6, 4, 'RÆ°á»£u ngoáº¡i Chivas 38', '<p><span style="font-family: tahoma; line-height: normal; font-size: 16px;"><span style="line-height: normal; font-size: 13px;">Xuáº¥t xá»©: Scotlen</span><br style="font-size: 13px; line-height: normal;" /> <span style="line-height: normal; font-size: 13', 15100000, 'upload/Chivas 38.jpg', 5, 1, '2014-03-11', 1),
(37, 7, 5, 'Nicolas Feuillatte Brut RÃ©serve ParticuliÃ¨re', '<p><span style="color: #333333; font-size: 15.5556px; line-height: 17.9861px; text-align: justify;"><span style="color: #333333; font-size: 15.5556px; line-height: 17.9861px; text-align: justify;">Xuáº¥t xÆ°:Ph&aacute;p<br /> Dung t&iacute;ch: 750ml<br />', 495000, 'upload/Nicolas Feuillatte Brut Reserve Particuliere.jpg', 40, 0, '2014-03-11', 2),
(38, 7, 5, 'Champagne Louis Roederer Cristal', '<p><strong><span style="color: #333333; font-family: verdana,geneva,sans-serif; font-size: 13px; line-height: 20px; background-color: transparent; outline: 0px none; vertical-align: baseline;">Nh&agrave; sáº£n xuáº¥t:</span><span style="color: #333333; fo', 4390000, 'upload/Champagne Louis Roederer Crista.jpg', 40, 0, '2014-03-11', 2),
(39, 7, 5, 'Louis Roederer Brut Premier Champagne', '<p><strong><span style="font-family: verdana, geneva, sans-serif; font-size: 13px; line-height: 20px; background-color: transparent; outline: 0px; vertical-align: baseline;">Äá»™ cá»“n:&nbsp;</span><span style="font-family: verdana, geneva, sans-serif; f', 995000, 'upload/Louis Roederer Brut Premier Champagne.jpg', 20, 1, '2014-03-11', 1),
(40, 7, 5, 'Jacques Picard Champagne', '<p><strong><span style="font-size: 16px;">Dung t&iacute;ch: 375ml<br /> Xuáº¥t xá»©: Ph&aacute;p</span></strong></p>', 355000, 'upload/Jacques Picard Champagne.jpg', 50, 0, '2014-03-11', 2),
(41, 6, 6, 'RÆ°á»£u ngoáº¡i Johnnie Walker Black Label', '<p><span style="font-weight: bold; line-height: normal; font-family: tahoma; font-size: 13px;"><span style="font-family: tahoma; font-size: small; line-height: normal;">Xuáº¥t xá»©: Scotland</span><br style="font-family: tahoma; font-size: 13px; line-heig', 465000, 'upload/Johnnie Walker Black Label.jpg', 26, 0, '2014-03-11', 1),
(42, 6, 6, 'RÆ°á»£u ngoáº¡i Johnnie Walker Red Label', '<p><span style="font-weight: bold; line-height: normal; font-family: tahoma; font-size: 13px;"><span style="font-family: tahoma; font-size: small; font-weight: bold; line-height: normal;">Dung t&iacute;ch: 750 ml</span><br style="font-family: tahoma; font', 290000, 'upload/Johnnie Walker Red Label.jpg', 50, 0, '2014-03-11', 2),
(43, 6, 6, 'RÆ°á»£u ngoáº¡i Johnnie Walker Blue Label 750ml', '<p><span style="font-weight: bold; line-height: normal; font-size: 13px; font-family: tahoma;">Johnnie Walker Blue Label 750ml</span></p>', 2750000, 'upload/Johnnie Walker Blue Label 750ml.jpg', 14, 1, '2014-03-11', 1),
(44, 6, 6, 'RÆ°á»£u ngoáº¡i Johnnie Walker Platinum 2012', '<p><span style="font-weight: bold; line-height: normal; font-family: arial; font-size: 16px;"><span style="font-size: 13px; font-family: tahoma;">RÆ°á»£u Johnnie Walker Platinum 2012<br /> <span style="line-height: normal; font-size: 13px;">L&agrave; d&og', 1450000, 'upload/Johnnie Walker Platinum 2012.jpg', 15, 1, '2014-03-11', 1),
(45, 6, 7, 'BARON OTARD VSOP Share', '<p><span style="font-size: 13px; font-family: tahoma;"><strong>BARON OTARD VSOP</strong></span></p>', 880000, 'upload/BARON OTARD VSOP.jpg', 28, 0, '2014-03-11', 1),
(46, 7, 7, 'Cognac Remy Martin X.O', '<p><span style="font-weight: bold; line-height: normal; font-size: 16px;"><span style="font-size: 13px; font-family: tahoma;"><span style="line-height: normal; font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Xuáº¥t xá»©: Ph&aacute;p</span><br sty', 2600000, 'upload/Cognac Remy Martin X.O.jpg', 18, 1, '2014-03-11', 1),
(47, 8, 8, 'Galliano', '<p><strong><span style="font-size: 14px;">Galliano<br /> Dung t&iacute;ch: 750ml<br /> Xuáº¥t xá»©: Italia<br /> Ná»“ng Ä‘á»™: 43%</span></strong></p>', 380000, 'upload/Galliano.jpg', 30, 0, '2014-03-11', 2),
(48, 6, 8, 'SirÃ´ sÃ´cÃ´la Teisseire 70cl', '<div class="box_product_content"><strong style="font-family: arial; font-size: 13px; line-height: normal;">Sir&ocirc; s&ocirc;c&ocirc;la Teisseire 70cl</strong><span style="font-family: arial; font-size: 13px; line-height: normal;">&nbsp;(Sirup Teisseire ', 190000, 'upload/Teisseire 70cl.jpg', 40, 0, '2014-03-11', 2),
(49, 8, 8, 'RÆ°á»£u Jack Daniels ', '<p><span style="font-weight: bold; line-height: normal; font-family: arial; font-size: 16px;">RÆ°á»£u Jack Daniels </span></p>', 450000, 'upload/Jack Daniels.jpg', 40, 0, '2014-03-11', 2),
(50, 8, 9, 'RÆ°á»£u HÃ n Quá»‘c Bok Bun Ja Joo - PhÃºc Bá»“n Tá»­(quáº£ MÃ¢m XÃ´i)', '<p><span style="font-weight: bold; line-height: normal; font-family: arial; font-size: 16px;">RÆ°á»£u H&agrave;n Quá»‘c Bok Bun Ja Joo - Ph&uacute;c Bá»“n Tá»­(quáº£ M&acirc;m X&ocirc;i)<br /> Dung T&iacute;ch: 375ml<br /> Äá»™ Cá»“n: 15%<br /> Kiá»ƒu d&', 180000, 'upload/Bok Bun Ja Joo.jpg', 30, 0, '2014-03-11', 1),
(51, 8, 9, 'RÆ°á»£u BekSeJu', '<p><span style="font-size: 18px;"><strong>RÆ°á»£u BekSeJu</strong></span></p>', 176000, 'upload/BekSeJu.jpg', 48, 0, '2014-03-11', 1),
(52, 8, 9, 'RÆ°á»£u vang hoa cÃºc HÃ n quá»‘c', '<p><span style="font-family: arial; font-size: 16px; font-weight: bold; line-height: normal;">RÆ°á»£u vang hoa c&uacute;c H&agrave;n quá»‘c</span></p>', 145000, 'upload/hoa cuc vang han quoc.jpg', 27, 0, '2014-03-11', 1),
(53, 6, 10, 'Sake Hakushika Kasen - 720ml', '<p><strong><span style="font-size: 14px;">Dung t&iacute;ch: 720ml<br /> Ná»“ng Ä‘á»™: 15%<br /> Qui c&aacute;ch: 6c/th&ugrave;ng</span></strong></p>', 409000, 'upload/Sake Hakushika Kasen - 720ml.JPG', 40, 0, '2014-03-11', 2),
(54, 6, 10, 'Sushin Yamane - Komeno Kiwam', '<p><strong><span style="font-size: 14px;">Sushin Yamane - Komeno Kiwam<br /> Dung t&iacute;ch: 1,8l<br /> Quy c&aacute;ch: 06c/th&ugrave;ng</span></strong></p>', 950000, 'upload/Sushin Yamane - Komeno Kiwam.jpg', 17, 1, '2014-03-11', 1),
(55, 6, 7, 'Hennessy V.S.O.P 70cl', '<p>-&nbsp;Hennessy VSOP l&agrave; sá»± pha trá»™n ho&agrave;n háº£o cá»§a hÆ¡n 60 loáº¡i rÆ°á»£u cáº¥t (eau-de-vie), ch&uacute;ng Ä‘Æ°á»£c lá»±a chá»n tá»« 4 v&ugrave;ng trá»“ng nho tá»‘t nháº¥t cá»§a v&ugrave;ng Cognac.</p>\r\n<p>-&nbsp;Hennessy l&agrave; Hennessy l&agrave; biá»ƒu tÆ°á»£ng cá»§a sá»± váº¹n to&agrave;n v&agrave; tinh táº¿. Táº¥t cáº£ nhá»¯ng Ä‘iá»u Ä‘&oacute; Ä‘Æ°á»£c thá»ƒ hiá»‡n bá»Ÿi m&agrave;u v&agrave;ng n&acirc;u, sá»± phá»‘i há»£p cá»§a vá»‹ cay nháº¹ v&agrave; gá»— sá»“i Ä‘i c&ugrave;ng vá»›i hÆ°Æ¡ng vá»‹ máº­t ong v&agrave; cam tháº£o. N&oacute; Ä‘&atilde; táº¡o ra hÆ°Æ¡ng vá»‹ Ä‘áº·c biá»‡t cho loáº¡i rÆ°á»£u n&agrave;y.</p>', 13950000, 'upload/Hennessy V.S.O.P 70cl.jpg', 98, 1, '2014-03-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTK` int(5) NOT NULL AUTO_INCREMENT,
  `MaCapDo` int(5) NOT NULL,
  `Tendangnhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gioitinh` tinyint(1) NOT NULL,
  `Sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(5) NOT NULL DEFAULT '2',
  `Ngaytao` date NOT NULL,
  PRIMARY KEY (`MaTK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `MaCapDo`, `Tendangnhap`, `Matkhau`, `Hoten`, `Gioitinh`, `Sdt`, `Diachi`, `Email`, `trangthai`, `Ngaytao`) VALUES
(1, 1, 'admin', '123456', 'admin', 0, '132343', 'viet nam', 'admin@admin.com', 1, '2014-03-05'),
(2, 2, 'hung', '123', 'hungnm', 1, '123', 'dia chi', 'mail', 1, '2014-03-10'),
(5, 2, 'nam', '123', 'ca', 0, '123', 'vn', 'mail@', 1, '2014-03-11'),
(6, 2, 'nguyen', '123', 'csa', 1, '125', 'vn', 'fsd@mail', 2, '2014-03-10'),
(7, 2, 'duong', '123', 'duong', 1, '1235842', 'viet nam', 'duong@mail.com', 1, '2014-03-11'),
(8, 2, 'tk1', '123', 'nd1', 1, '0123', 'viet nam', 'nd1@mail.com', 1, '2014-03-14'),
(9, 1, 'son', '123', 'son', 1, '168495', 'viet nam', 'son@mail.com', 1, '2014-03-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
