-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2018 at 04:20 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlysanpham`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `MaChiTietDonDatHang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  PRIMARY KEY (`MaChiTietDonDatHang`),
  KEY `MaSanPham` (`MaSanPham`),
  KEY `MaDonHangDaDat` (`MaDonDatHang`),
  KEY `MaDonDatHang` (`MaDonDatHang`),
  KEY `MaDonDatHang_2` (`MaDonDatHang`),
  KEY `MaDonDatHang_3` (`MaDonDatHang`),
  KEY `MaSanPham_2` (`MaSanPham`),
  KEY `MaDonDatHang_4` (`MaDonDatHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE IF NOT EXISTS `dondathang` (
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime NOT NULL,
  `TongThanhTien` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`MaDonDatHang`),
  KEY `MaTaiKhoan` (`MaTaiKhoan`),
  KEY `MaTaiKhoan_2` (`MaTaiKhoan`),
  KEY `MaTinhTrang` (`MaTinhTrang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

DROP TABLE IF EXISTS `hangsanxuat`;
CREATE TABLE IF NOT EXISTS `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'APPLE', '', 0),
(2, 'SAMSUNG', '', 0),
(3, 'NOKIA', '', 0),
(4, 'HUAWEI', '', 0),
(5, 'OPPO', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hangsxcualoaisp`
--

DROP TABLE IF EXISTS `hangsxcualoaisp`;
CREATE TABLE IF NOT EXISTS `hangsxcualoaisp` (
  `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `MaHangSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`MaLoaiSanPham`,`MaHangSanXuat`),
  KEY `MaLoaiSanPham` (`MaLoaiSanPham`),
  KEY `MaHangSanXuat` (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangsxcualoaisp`
--

INSERT INTO `hangsxcualoaisp` (`MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaLoaiSanPham`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(3, 'Phone', 0),
(4, 'Tablet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

DROP TABLE IF EXISTS `loaitaikhoan`;
CREATE TABLE IF NOT EXISTS `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'Admin'),
(2, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `GiaSanPham` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `SoLuongBan` int(11) NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`MaSanPham`),
  KEY `MaLoaiSanPham` (`MaLoaiSanPham`),
  KEY `FK_HANGSANXUAT` (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuotXem`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(17, 'iPhone Xs Max 64GB', 'iphoneXsmax.png', 30990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.5 inchs, 1242 x 2688 Pixels\r\nCamera trước :7.0 MP\r\nCamera sau :Dual Camera 12.0 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Apple A12 Bionic, 6, Đang cập nhật\r\nGPU :Apple GPU 4 nhân\r\nDung lượng pin :Lâu hơn iPhone X 1,5h\r\nHệ điều hành :iOS 12\r\nThẻ SIM :eSIM và NanoSIM, 1 Sim', 0, 3, 1),
(18, 'iPhone Xs 64GB', 'iphoneXs.png', 29990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.8 inchs, 1125 x 2436 Pixels\r\nCamera trước :7.0 MP\r\nCamera sau :Dual Camera 12.0 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Apple A12 Bionic, 6, Đang cập nhật\r\nGPU :Apple GPU 4 nhân\r\nDung lượng pin :Lâu hơn iPhone X 30\'\r\nHệ điều hành :iOS 12\r\nThẻ SIM :eSIM và NanoSIM, 1 Sim', 0, 3, 1),
(19, 'iPhone XR 64GB', 'iphonexr.png', 22990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.1 inchs, 828 x 1792 Pixels\r\nCamera trước :7.0 MP\r\nCamera sau :12.0 MP\r\nRAM :3 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Apple A12 Bionic, 6, Đang cập nhật\r\nGPU :Apple GPU 4 nhân\r\nDung lượng pin :Lâu hơn iPhone 8 Plus 1,5h\r\nHệ điều hành :iOS 12\r\nThẻ SIM :eSIM và NanoSIM, 1 Sim', 0, 3, 1),
(20, 'iPhone X 64GB', 'iphonex.png', 26990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :2436 x 1125 pixel\r\nCamera trước :7.0 MP\r\nCamera sau :Dual 12.0 MP\r\nRAM :3 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Apple A11 Bionic, 6\r\nGPU :Apple GPU (three-core graphics)\r\nDung lượng pin :2716 mAh\r\nHệ điều hành :iOS 11\r\nThẻ SIM :Nano Sim, 1 Sim, hỗ trợ 4G', 0, 3, 1),
(21, 'iPhone 8 Plus 64GB', 'iphone8plus.png', 19990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1920 x 1080 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :Dual 12.0 MP\r\nRAM :3 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Apple A11 Bionic, 6\r\nGPU :Apple GPU (three-core graphics)\r\nDung lượng pin :2675 mAh\r\nHệ điều hành :iOS 11\r\nThẻ SIM :Nano Sim, 1 Sim', 0, 3, 1),
(22, 'iPhone 8 64GB', 'iphone8.png', 17990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1334 x 750 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :12.0 MP\r\nRAM :2 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Apple A11 Bionic\r\nGPU :Apple GPU three-core graphics\r\nThẻ SIM :Nano Sim, 1 Sim, hỗ trợ 4G', 0, 3, 1),
(23, 'iPhone 7 Plus 32GB', 'iphone7plus.png', 15990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1920 x 1080 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :Dual 12.0 MP\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :A10, 4 Nhân, 2.3 GHz\r\nDung lượng pin :11.1 Wh (2900 mAh)\r\nThẻ SIM :Nano Sim, 1 Sim, hỗ trợ 4G', 0, 3, 1),
(24, 'iPhone 7 32GB', 'iphone7.png', 11990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1334 x 750 pixels\r\nCamera sau :12.0 MP\r\nRAM :2 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Apple A10, 4 Nhân, 2.3 GHz\r\nGPU :PowerVR Series7XT Plus\r\nDung lượng pin :7.45 Wh (1960 mAh)\r\nThẻ SIM :Nano Sim, 1 Sim, hỗ trợ 4G', 0, 3, 1),
(25, 'iPhone 6 Plus 32GB', 'iphone6plus.png', 9990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1080 x 1920 pixels\r\nCamera trước :5.0 MP\r\nCamera sau :12.0 MP\r\nRAM :2 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Apple A9, 2 Nhân, 1.8 GHz\r\nGPU :PowerVR GT7600\r\nDung lượng pin :2750mAh\r\nThẻ SIM :Nano Sim, 1 Sim', 0, 3, 1),
(26, 'iPhone 6 32GB', 'iphone6.png', 6990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1334 x 750 pixels\r\nCamera trước :1.2 MP\r\nCamera sau :8.0 MP\r\nRAM :1GB\r\nBộ nhớ trong :32 GB\r\nCPU :Apple A8, 2 Nhân, 1.4 GHz\r\nGPU :PowerVR GX6450\r\nDung lượng pin :1810mAh\r\nThẻ SIM :Nano Sim, 1 Sim, hỗ trợ 4G', 0, 3, 1),
(27, 'Samsung Galaxy J6+', 'galaxya6plus.jpg', 4690000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.0 inchs, 720 × 1480 Pixels\r\nCamera trước :8.0 MP\r\nCamera sau :Camera kép 12MP+5MP\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Qualcomm Snapdragon 425, 4, 1.4 GHz\r\nGPU :Adreno 308\r\nDung lượng pin :3300 mAh\r\nHệ điều hành :Android 8.1\r\nThẻ SIM :Nano SIM, 2 Sim', 0, 3, 2),
(28, 'Samsung Galaxy A7', 'galaxya7.jpg', 7690000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.0 inchs, 1080 x 2220 Pixels\r\nCamera trước :24MP\r\nCamera sau :24 MP+8 MP+5 MP (3 camera)\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 7885 8 nhân 64-bit, 8, 2.2 GHz Cortex-A73 & 1.6 GHz Cortex-A53\r\nGPU :Mali™ G71\r\nDung lượng pin :3300 mAh\r\nHệ điều hành :Android 8\r\nThẻ SIM :Nano SIM, 2 Sim', 0, 3, 2),
(29, 'Samsung Galaxy A8', 'galaxya8.jpg', 7990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình:Super AMOLED, 5.6\", Full HD+\r\nHệ điều hành:Android 7.1 (Nougat)\r\nCamera sau:16 MP\r\nCamera trước:16 MP và 8 MP (2 camera)\r\nCPU:Exynos 7885 8 nhân 64-bit\r\nRAM:4 GB\r\nBộ nhớ trong:32 GB\r\nThẻ nhớ:MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM: 2 Nano SIM, Hỗ trợ 4G', 0, 3, 2),
(30, 'Samsung Galaxy A8 Star', 'galaxya8star.jpg', 13990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.3\", Full HD+ (1080 x 2220 Pixels)\r\nCamera trước :24 MP\r\nCamera sau :24 MP và 16 MP (2 camera)\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Qualcomm Snapdragon 660, 8 nhân, 4 nhân 2.2 GHz & 4 nhân 1.8 GHz\r\nGPU :Adreno 512\r\nDung lượng pin :3700 mAh\r\nHệ điều hành :Android 8.0 (Oreo)\r\nThẻ SIM :Nano Sim, 2 Sim, hỗ trợ 4G', 0, 3, 2),
(31, 'Samsung Galaxy Note 8', 'galaxynote8.jpg', 19990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :2960 x 1440 pixels\r\nCamera trước :8.0 MP\r\nCamera sau :Dual 12.0 MP\r\nRAM :6 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 8895, 8 Nhân, 4 nhân 2.3 GHz và 4 nhân 1.7 GHz\r\nGPU :Mali™ G71\r\nDung lượng pin :3300 mAh\r\nThẻ SIM :2 Sim, hỗ trợ 4G', 0, 3, 2),
(32, 'Samsung Galaxy Note 9 128GB', 'galaxynote9.jpg', 22990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.4\", 2K+ (1440 x 2960 Pixels)\r\nCamera trước :8 MP\r\nCamera sau :2 camera 12 MP\r\nRAM :6 GB\r\nBộ nhớ trong :128 GB\r\nCPU :Exynos 9810 8 nhân 64 bit, 8 nhân, 2.7 GHz + 1.7 GHz\r\nGPU :Mali-G72 MP18\r\nDung lượng pin :4000 mAh\r\nHệ điều hành :Android 8.1 (Oreo)\r\nThẻ SIM :Nano Sim, 2 Sim, hỗ trợ 4G', 0, 3, 2),
(33, 'Samsung Galaxy Note FE', 'galaxynotefe.jpg', 12990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :2K (1440 x 2560 pixels)\r\nCamera trước :5.0 MP\r\nCamera sau :12.0 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 8890 8 nhân 64-bit, 4 nhân 2.6 GHz và 4 nhân 1.6 GHz, 4 nhân 2.6 GHz và 4 nhân 1.6 GHz\r\nGPU :Mali-T880 MP12\r\nDung lượng pin :3200 mAh\r\nHệ điều hành :Android 7.0\r\nThẻ SIM :Nano Sim, 2 Sim, hỗ trợ 4', 0, 3, 2),
(34, 'Samsung Galaxy S8', 'galaxys8.jpg', 15990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :2K+ (1440 x 2960 Pixels)\r\nCamera trước :8.0 MP\r\nCamera sau :12.0 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 8895, 8 Nhân, 4 nhân 2.3GHz + 4 nhân 1.7GHz\r\nGPU :Mali™ G71\r\nDung lượng pin :3000 mAh\r\nThẻ SIM :Dual SIM, Nano-SIM, hỗ trợ 4G', 0, 3, 2),
(35, 'Samsung Galaxy S8 Plus', 'galaxys8plus.jpg', 17990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :2960 x 1440 pixels\r\nCamera trước :8.0 MP\r\nCamera sau :Dual 12.0 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 8895, 8 Nhân, 4 nhân 2.3 GHz và 4 nhân 1.7 GHz\r\nGPU :Mali™ G71\r\nDung lượng pin :3500 mAh\r\nThẻ SIM :Nano Sim, 2 Khe, hỗ trợ 4G', 0, 3, 2),
(36, 'Samsung Galaxy S9', 'galaxys9.jpg', 19990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.8\", 2K (1440 x 2960 Pixels)\r\nCamera trước :8 MP\r\nCamera sau :12 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 9810 8 nhân 64 bit, 4 nhân 2.8 GHz & 4 nhân 1.7 GHz, 4 nhân 2.8 GHz & 4 nhân 1.7 GHz\r\nGPU :Mali-G72 MP18\r\nDung lượng pin :3000 mAh\r\nHệ điều hành :Android 8.0\r\nThẻ SIM :Nano Sim, 2 Sim (Sim 2 chung khe thẻ nhớ), hỗ trợ 4G', 0, 3, 2),
(37, 'Samsung Galaxy S9+', 'galaxys9plus.jpg', 23490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.2\", 2K (1440 x 2960 Pixels)\r\nCamera trước :8 MP\r\nCamera sau :2 camera 12 MP\r\nRAM :6 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Exynos 9810 8 nhân 64 bit, 4 nhân 2.8 GHz & 4 nhân 1.7 GHz, 4 nhân 2.8 GHz & 4 nhân 1.7 GHz\r\nGPU :Mali-G72 MP18\r\nDung lượng pin :3500 mAh\r\nHệ điều hành :Android 8.0\r\nThẻ SIM :Nano Sim, 2 Sim (Sim 2 chung khe thẻ nhớ), hỗ trợ 4G', 0, 3, 2),
(38, 'Nokia 2.1', 'nokia2.1.jpg', 1990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.5\", 720 x 1280 pixels\r\nCamera trước :5 MP\r\nCamera sau :8 MP\r\nRAM :1 GB\r\nBộ nhớ trong :8 GB\r\nCPU :Qualcomm Snapdragon 425 , 4 nhân, 1.4GHz\r\nGPU :Adreno 308\r\nDung lượng pin :4000 mAh\r\nHệ điều hành :Android Oreo Go\r\nThẻ SIM :Nano, 2 Sim, hỗ trợ 4G', 0, 3, 3),
(39, 'Nokia 2', 'nokia2.jpg', 1790000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.0”, 720 x 1280 pixels\r\nCamera trước :5 MP\r\nCamera sau :8 MP\r\nRAM :1 GB\r\nBộ nhớ trong :8 GB\r\nCPU :Qualcomm Snapdragon 212, 4 Nhân, 1.3 GHz\r\nGPU :Adreno 304\r\nDung lượng pin :4100 mAh\r\nHệ điều hành :Android™ 7.1.1 Nougat\r\nThẻ SIM :1 Micro SIM, 1 Sim thường, 2 Sim', 0, 3, 3),
(40, 'Nokia 3.1 16GB', 'nokia3.1.jpg', 2890000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.2\", 720 x 1440 pixels\r\nCamera trước :8 MP\r\nCamera sau :13 MP\r\nRAM :2 GB\r\nBộ nhớ trong :16 GB\r\nCPU :MediaTek MT6755, 8 nhân, 4 nhân 2GHz & 4 nhân 1.5GHz\r\nGPU :Mali-T860MP2\r\nDung lượng pin :2990 mAh\r\nHệ điều hành :Android 8.1 (Oreo)\r\nThẻ SIM :Nano, 2 Sim, hỗ trợ 4G', 0, 3, 3),
(41, 'Nokia 5.1 Plus', 'nokia5.1plus.jpg', 4790000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.8 inchs, 720 x 1520 Pixels\r\nCamera trước :8.0 MP\r\nCamera sau :13.0 + 5.0 MP(Dual Camera)\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :MediaTek Helio P60, 8, 2.0 GHz\r\nGPU :Mali-G72 MP3\r\nDung lượng pin :3060 mAh\r\nHệ điều hành :Android 8.1\r\nThẻ SIM :Nano SIM, 2 Sim', 0, 3, 3),
(42, 'Nokia 6', 'nokia6.jpg', 2999000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :1080 x 1920 pixels\r\nCamera trước :8.0 MP (f2.0)\r\nCamera sau :16.0 MP (f2.0)\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Qualcomm Snapdragon 430, 8 Nhân\r\nDung lượng pin :3000mAh\r\nThẻ SIM :2 SIM Nano (SIM 2 chung khe thẻ nhớ)', 0, 3, 3),
(43, 'Nokia 6.1 Plus', 'nokia6.1plus.jpg', 6590000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.8\", FullView, 1080 x 2280 pixels\r\nCamera trước :16 MP\r\nCamera sau :16 MP + 5 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Qualcom Snapdragon 636, 8 nhân, 1.8 GHz\r\nGPU :Adreno 509\r\nDung lượng pin :3060 mAh, có sạc nhanh\r\nHệ điều hành :Android 8.1 (Oreo)\r\nThẻ SIM :Nano, 2 Sim, hỗ trợ 4G', 0, 3, 3),
(44, 'Nokia 6.1', 'nokia6.1.jpg', 4190000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.5\", 1080 x 1920 pixels\r\nCamera trước :8 MP\r\nCamera sau :16 MP\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Qualcomm Snapdragon 630, 8 nhân, 2.2 Ghz\r\nGPU :Adreno 508\r\nDung lượng pin :3000 mAh\r\nHệ điều hành :Android 8.0 (Oreo)\r\nThẻ SIM :Nano SIM, 2 (SIM 2 chung khe thẻ nhớ)', 0, 3, 3),
(45, 'Nokia 3310', 'nokia3310.jpg', 1059000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :2,4’’ QVGA , 320 x 240 pixels\r\nCamera sau :2 MP\r\nRAM :Không\r\nBộ nhớ trong :Không\r\nCPU :Không, Không, Không\r\nGPU :Không\r\nDung lượng pin :1200 mAh\r\nHệ điều hành :Không\r\nThẻ SIM :Micro, 2 Sim', 0, 3, 3),
(46, 'Nokia 8110 4G', 'nokia8110.jpg', 1280000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :320 x 240 Pixels\r\nCamera trước :Không\r\nCamera sau :2 MP\r\nRAM :512MB\r\nCPU :Qualcomm Snapdragon 205 Mobile Platform, 2 nhân, 1.1 Ghz\r\nGPU :Không\r\nDung lượng pin :1500 mAh\r\nHệ điều hành :KaiOS\r\nThẻ SIM :Micro SIM (SIM1) và Nano SIM (SIM2), 2 Sim, hỗ trợ 4G', 0, 3, 3),
(47, 'Nokia 7 Plus', 'nokia7plus.jpg', 7240000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6\'\', 1080 x 2160 Pixels\r\nCamera trước :16 MP\r\nCamera sau :12 MP và 13 MP (2 camera)\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Qualcomm Snapdragon 660, 8 nhân, 4 nhân 2.2 GHz Kryo 260 & 4 nhân 1.8 GHz Kryo 260\r\nGPU :Adreno 512\r\nDung lượng pin :3800 mAh\r\nHệ điều hành :Android 8.0 (Oreo)\r\nThẻ SIM :Nano SIM, 2 (SIM 2 chung khe thẻ nhớ)', 0, 3, 3),
(48, 'OPPO A7', 'a7.jpg', 5990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình:IPS LCD, 6.2\", HD+\r\nHệ điều hành:ColorOS 5.2 (Android 8.1)\r\nCamera sau:13 MP và 2 MP (2 camera)\r\nCamera trước:16 MP\r\nCPU:Qualcomm Snapdragon 450 8 nhân 64-bit\r\nRAM:4 GB\r\nBộ nhớ trong:64 GB\r\nThẻ nhớ:MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM: 2 Nano SIM, Hỗ trợ 4G', 0, 3, 5),
(49, 'Oppo A3s 16GB', 'a3s.jpg', 3690000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.2\", 720 x 1520 pixels\r\nCamera trước :8 MP\r\nCamera sau :13 MP + 2 MP\r\nRAM :2 GB\r\nBộ nhớ trong :16 GB\r\nCPU :Qualcomm Snapdragon 450, 8 nhân, 1.8 GHz\r\nGPU :Adreno 506\r\nDung lượng pin :4230 mAh\r\nHệ điều hành :Android 8.1 Oreo\r\nThẻ SIM :Nano, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(50, 'Oppo A71 32GB', 'a71.jpg', 3290000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.2 inch, 720 x 1280 pixels\r\nCamera trước :13 MP\r\nCamera sau :5 MP\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Qualcomm Snapdragon 450, 8 nhân, 1.8 Ghz\r\nGPU :Adreno 506\r\nDung lượng pin :3000 mAh\r\nHệ điều hành :Android 7.1\r\nThẻ SIM :Nano sim, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(51, 'Oppo A71K', 'a71k.jpg', 2990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.2\", 720 x 1280 pixels\r\nCamera trước :5 MP\r\nCamera sau :13 MP\r\nRAM :2 GB\r\nBộ nhớ trong :16 GB\r\nCPU :Qualcomm Snapdragon 450, 8 nhân, 1.8 Ghz\r\nGPU :Adreno 506\r\nDung lượng pin :3000 mAh\r\nHệ điều hành :Andoid 7.1\r\nThẻ SIM :Nano sim, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(52, 'Oppo A83 ', 'a83.jpg', 3490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.7\", 720x1440 pixels\r\nCamera trước :8 MP\r\nCamera sau :13 MP\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Mediatek MT6763T Helio P23, 8 nhân, 2.5 Ghz\r\nGPU :Mali-G71 MP2\r\nDung lượng pin :3180 mAh\r\nHệ điều hành :Andoid 7.1\r\nThẻ SIM :Nano sim, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(53, 'OPPO F5 Youth', 'f5youth.jpg', 4490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6\", 1080 x 2160 Pixels\r\nCamera trước :16 MP\r\nCamera sau :13 MP\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nCPU :Mediatek MT6763T Helio P23, 8 nhân, 2.5 Ghz\r\nGPU :Mali-G71 MP2\r\nDung lượng pin :3200 mAh\r\nHệ điều hành :Andoid 7.1\r\nThẻ SIM :Nano sim, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(54, 'OPPO F7', 'f7.jpg', 6990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.23 inch, 1080 x 2280 pixels\r\nCamera trước :25 MP\r\nCamera sau :16 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Mediatek Helio P60, 8 nhân, 2.0 Ghz\r\nGPU :Mali-G72 MP3\r\nDung lượng pin :3400 mAh\r\nHệ điều hành :Andoid 8.1 (ColorOS 5.0)\r\nThẻ SIM :Nano sim, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(55, 'OPPO F7 Youth', 'f7youth.jpg', 4990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.0\", 2160 x 1080 Pixels\r\nCamera trước :8 MP\r\nCamera sau :13 MP\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :Mediatek Helio P60, 8 nhân, 2.0 Ghz\r\nGPU :Mali-G72 MP3\r\nDung lượng pin :3410 mAh\r\nHệ điều hành :Andoid 8.1 (ColorOS 5.0)\r\nThẻ SIM :Nano sim (1 khe cắm thẻ nhớ riêng), 2 Sim, hỗ trợ 4G', 0, 3, 5),
(56, 'OPPO F9', 'f9.jpg', 7690000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.3 inch, 1080 x 2340 pixels\r\nCamera trước :25 MP\r\nCamera sau :16 MP và 2 MP (2 camera)\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :MediaTek Helio P60 , 8 nhân, 2.0 Ghz\r\nGPU :Mali-G72 MP3\r\nDung lượng pin :3500 mAh\r\nHệ điều hành :ColorOS 5.2 (Android 8.1)\r\nThẻ SIM :Nano sim, 2 Sim', 0, 3, 5),
(57, 'Oppo F9 6GB', 'f9ram6.jpg', 8490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.3 inch, 1080 x 2340 pixels\r\nCamera trước :25 MP\r\nCamera sau :16 MP và 2 MP (2 camera)\r\nRAM :6 GB\r\nBộ nhớ trong :64 GB\r\nCPU :MediaTek Helio P60 , 8 nhân, 2.0 Ghz\r\nGPU :Mali-G72 MP3\r\nDung lượng pin :3500 mAh\r\nHệ điều hành :ColorOS 5.2 (Android 8.1)\r\nThẻ SIM :Nano sim, 2 Sim', 0, 3, 5),
(58, 'OPPO Find X', 'findX.jpg', 20990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.42 inch (màn hình cong tràn siêu cực), 2340 x 1080 pixels\r\nCamera trước :25 MP\r\nCamera sau :20MP và 16MP (2 Camera)\r\nRAM :8 GB\r\nBộ nhớ trong :256 GB\r\nCPU :Qualcomm Snapdragon 845, 8 nhân, 2.8 Ghz\r\nGPU :Adreno 630\r\nDung lượng pin :3730 mAh\r\nHệ điều hành :Android 8.1 (ColorOS 5.1)\r\nThẻ SIM :Nano sim, 2 Sim, hỗ trợ 4G', 0, 3, 5),
(59, 'Huawei P20 Pro', 'P20pro.jpg', 16990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.1 inches, 2240 x 1080 pixels\r\nCamera trước :24 MP, Nhận diện khuôn mặt\r\nCamera sau :3 Camera: 40Mp + 20Mp + 8Mp ( Ống kính Leica)\r\nRAM :6GB\r\nBộ nhớ trong :128GB\r\nCPU :HUAWEI Kirin 970, Octa-core + i7 co-processor, 4xCortex A73 2.36 GHz + 4xCortex A53 1.8 GHz\r\nGPU :Mali-G72 MP12\r\nDung lượng pin :4000 mAh battery\r\nHệ điều hành :Android™ 8.1 + EMUI 8.1\r\nThẻ SIM :Nano Sim, 2 Sim', 0, 3, 4),
(60, 'Huawei Mate 20', 'mate20.jpg', 13990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.5 inchs, 1080 x 2220 Pixels\r\nCamera trước :24MP\r\nCamera sau :12Mp + 16 Mp +8Mp ( 3 Camera)\r\nRAM :6 GB\r\nBộ nhớ trong :128 GB\r\nCPU :HUAWEI Kirin 980, 8, 2xCortex A76 2.6 GHz + 2xCortex A76 1.92 GHz + 4xCortex A55 1.8 GHz\r\nGPU :Mali-G76\r\nDung lượng pin :4000mAh\r\nHệ điều hành :Android 9\r\nThẻ SIM :Nano SIM, 2 Sim', 0, 3, 4),
(61, 'Huawei Mate 20 Pro', 'mate20pro.jpg', 18990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.39 inchs, 1440 x 3120 pixels\r\nCamera trước :24MP\r\nCamera sau :40Mp + 20Mp + 8Mp ( 3 Camera)\r\nRAM :6 GB\r\nBộ nhớ trong :128 GB\r\nCPU :HUAWEI Kirin 980, 8, 2xCortex A76 2.6 GHz + 2xCortex A76 1.92 GHz + 4xCortex A55 1.8 GHz\r\nGPU :Mali-G76\r\nDung lượng pin :4200mAh\r\nHệ điều hành :Android 9\r\nThẻ SIM :Nano SIM, 2 Sim', 0, 3, 4),
(62, 'Huawei Nova 3', 'nova3.jpg', 8490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.3 inches, 2340x1080 pixels\r\nCamera trước :24M+2M\r\nCamera sau :16M+24M\r\nRAM :6GB\r\nBộ nhớ trong :128GB\r\nCPU :HUAWEI Kirin 970, Octa-core, 4*Cortex A73 2.36GHz + 4*Cortex A53 1.8GHz\r\nGPU :Mali-G72\r\nDung lượng pin :3750 mAh battery\r\nHệ điều hành :Android™ 8.1 + EMUI 8.2\r\nThẻ SIM :Nano Sim, 2 Sim', 0, 3, 4),
(63, 'Huawei Nova 3e', 'nova3e.jpg', 4490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.84\", Full View, 2280 x 1080\r\nCamera trước :16Mp, face ID\r\nCamera sau :16Mp + 2Mp\r\nRAM :4GB\r\nBộ nhớ trong :64Gb\r\nCPU :Kirin 659, Octa-Core, 4xCortex-A53 2.36 GHz + 4xCortex-A53 1.7 GHz\r\nGPU :Mali-T830 MP2\r\nDung lượng pin :3000mAh (Typical)\r\nHệ điều hành :Android™ 8.0 + EMUI 8.0\r\nThẻ SIM :Nano Sim, 2 Sim', 0, 3, 4),
(64, 'Huawei Nova 3i', 'nova3i.jpg', 6490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.3 inches, 2340x1080 pixels\r\nCamera trước :Camera kép 24Mp + 2Mp\r\nCamera sau :16 MP và 2 MP (2 camera)\r\nRAM :4GB\r\nBộ nhớ trong :128GB\r\nCPU :HUAWEI Kirin 710, Octa-core, 4*Cortex A73 2.2GHz + 4*Cortex A53 1.7GHz\r\nGPU :Mali-G51 MP4\r\nDung lượng pin :3340 mAh battery\r\nHệ điều hành :Android™ 8.1 + EMUI 8.2\r\nThẻ SIM :Nano Sim, 2 Sim', 0, 3, 4),
(65, 'Huawei Y3 ', 'Y3.jpg', 1790000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :480 x 854 pixels\r\nCamera trước :2.0 MP\r\nCamera sau :8.0 MP\r\nRAM :1 GB\r\nBộ nhớ trong :8 GB\r\nCPU :Mediatek MT6580M, 4 Nhân, 1.3 GHz\r\nGPU :Mali-400MP2\r\nDung lượng pin :2200 mAh\r\nThẻ SIM :2 Sim', 0, 3, 4),
(66, 'Huawei Y6 Prime', 'Y6prime.jpg', 2990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.7 inches, 1440 x 720 pixels\r\nRAM :2GB\r\nBộ nhớ trong :16GB\r\nCPU :Qualcomm MSM8917, Quad-core, Cortex-A53 4x1.4GHz\r\nGPU :Đang cập nhật\r\nDung lượng pin :3000 mAh battery\r\nHệ điều hành :Android™ 8.0 + EMUI 8.0\r\nThẻ SIM :Nano Sim, 2 Sim', 0, 3, 4),
(67, 'Huawei Y7 Pro', 'Y7pro.jpg', 3490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :5.99\" , Hiển thị Tràn màn hình FullView™, 1440 x 720 pixels\r\nCamera sau :13 Mp + 2 Mp, AF\r\nRAM :3GB\r\nBộ nhớ trong :32Gb\r\nCPU :Qualcomm MSM8937, Octa-Core, 4xCortex A53 1.4GHz+4xCortex A53 1.1GHz\r\nGPU :Adreno™ 505\r\nDung lượng pin :3000 mAh battery\r\nHệ điều hành :Android™ 8.0 + EMUI 8.0\r\nThẻ SIM :Nano Sim, 2 Sim', 0, 3, 4),
(68, 'Huawei Y9', 'Y9.jpg', 5490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :6.5 inchs, 1080 x 2340 Pixels\r\nCamera trước :16 MP và 2 MP (2 camera)\r\nCamera sau :13 MP và 2 MP (2 camera)\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nCPU :HUAWEI Kirin 710, 8, 4xCortex A73 2.2GHz + 4xCortex A53 1.7GHz\r\nGPU :Mali-G51 MP4\r\nDung lượng pin :4000 mAh\r\nHệ điều hành :Android 8.1\r\nThẻ SIM :Nano SIM, 2 Sim', 0, 3, 4),
(69, 'iPad Pro 12.9 WI-FI 4G 256GB', 'iPadPro12.9Wifi4G.png', 27990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :12.9 inch, 2732 x 2048 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :12.0 MP\r\nCPU :Apple A10X Fusion\r\nGPU :Power VR\r\nRAM :4 GB\r\nBộ nhớ trong :256 GB\r\nKết nối :Hỗ trợ 3G: Có, 4G LTE: Có, Wi-Fi: Wi-Fi (802.11a/b/g/n/ac), Bluetooth: Bluetooth 4.2', 0, 4, 1),
(70, 'iPad Pro 12.9 WI-FI 256GB', 'iPadPro12.9Wifi.png', 22990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :12.9 inch, 2732 x 2048 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :12.0 MP\r\nCPU :Apple A10X Fusion\r\nGPU :Power VR\r\nRAM :4 GB\r\nBộ nhớ trong :256 GB\r\nKết nối : Wi-Fi: Wi-Fi (802.11a/b/g/n/ac), Bluetooth: Bluetooth 4.2', 0, 4, 1),
(71, 'iPad Pro 10.5 WI-FI 4G 64GB', 'iPadPro10.5Wifi4G.png', 19990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :10.5 inch, 1668 x 2224 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :12.0 MP\r\nCPU :Apple A10X Fusion\r\nGPU :Power VR\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nKết nối :Hỗ trợ 3G: Có, 4G LTE: Có, Wi-Fi: Wi-Fi (802.11a/b/g/n/ac), Bluetooth: Bluetooth 4.2', 0, 4, 1),
(72, 'iPad Pro 10.5 WI-FI 64GB', 'iPadPro10.5Wifi.png', 16990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :10.5 inch, 1668 x 2224 pixels\r\nCamera trước :7.0 MP\r\nCamera sau :12.0 MP\r\nCPU :Apple A10X Fusion\r\nGPU :Power VR\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nKết nối :Hỗ trợ 3G: Không, 4G LTE: Không, Wi-Fi: Wi-Fi (802.11a/b/g/n/ac), Bluetooth: Bluetooth 4.2', 0, 4, 1),
(73, 'iPad 2018 WiFi+4G 32GB', 'iPad2018wifi4G.png', 9990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :9.7 inches, 1536 x 2048 pixels\r\nCamera trước :1.2 MP\r\nCamera sau :8.0 MP\r\nCPU :A10 Fusion\r\nGPU :PowerVR Series7XT Plus\r\nBộ nhớ trong :32GB\r\nKết nối :Hỗ trợ 3G: HSDPA 800 / 850 / 900 / 1700(AWS) / 1900 / 2100, 4G LTE: LTE band, Wi-Fi: Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot, Bluetooth: 4.2, A2DP, EDR, LE\r\nThời gian sử dụng :Up to 9 hours\r\nHệ điều hành :iOS11', 0, 4, 1),
(74, 'iPad 2018 WiFi', 'iPad2018wifi.png', 8990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :9.7 inches, 1536 x 2048 pixels\r\nCamera trước :1.2 MP\r\nCamera sau :8.0 MP\r\nCPU :A10 Fusion\r\nGPU :PowerVR Series7XT Plus\r\nBộ nhớ trong :32GB\r\nKết nối :Hỗ trợ 3G: No, 4G LTE: No, Wi-Fi: Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot, Bluetooth: 4.2, A2DP, EDR, LE\r\nThời gian sử dụng :Up to 9 hours\r\nHệ điều hành :iOS11', 0, 4, 1),
(75, 'Samsung Galaxy Tab S4 10.5 inch S-Pen', 'tabS4.jpg', 17990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :10.5 inchs, 2560 x 1600 pixels\r\nCamera trước :8.0 MP\r\nCamera sau :13.0 MP\r\nCPU :Qualcomm MSM 8998\r\nGPU :Adreno 540\r\nRAM :4 GB\r\nBộ nhớ trong :64 GB\r\nKết nối :Hỗ trợ 3G: Có, 4G LTE: Có, Wi-Fi: 802.11a, Bluetooth: v5.0\r\nThời gian sử dụng :Đang cập nhật\r\nHệ điều hành :Android 8', 0, 4, 2),
(76, 'Samsung Galaxy Tab E', 'tabE.jpg', 3990000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :9.6 inch, 1280 x 800 Pixels\r\nCamera trước :2.0 MP\r\nCamera sau :5.0 MP\r\nCPU :Spreadtrum 4 nhân\r\nGPU :Mali-400\r\nRAM :1.5 GB\r\nBộ nhớ trong :8 GB\r\nKết nối :Hỗ trợ 3G: Có 3G (tốc độ Download 21Mbps/42 Mbps; Upload 5.76 Mbps), 4G LTE: Không, Wi-Fi: 802.11 b/g/n 2.4GHz, Bluetooth: 4.0\r\nThời gian sử dụng :7 giờ', 0, 4, 2),
(77, 'Samsung Galaxy Tab A 10.5', 'tabA10.5.jpg', 9490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :10.5 inchs, 1920 x 1200 pixels\r\nCamera trước :5.0 MP\r\nCamera sau :8.0 MP\r\nCPU :Đang cập nhật\r\nGPU :Adreno 506\r\nRAM :3 GB\r\nBộ nhớ trong :32 GB\r\nKết nối :Hỗ trợ 3G: Có, 4G LTE: Có, Wi-Fi: 802.11a, Bluetooth: v4.1\r\nThời gian sử dụng :Đang cập nhật\r\nHệ điều hành :Android 8', 0, 4, 2),
(78, 'Samsung Galaxy Tab A 8.0', 'tabA8.0.jpg', 5490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :8.0 inch, 1280 x 800 pixels\r\nCamera trước :5.0 MP\r\nCamera sau :8.0 MP\r\nCPU :Qualcomm Snapdragon 425\r\nRAM :2 GB\r\nBộ nhớ trong :16 GB', 0, 4, 2),
(79, 'Samsung Galaxy Tab A 7\" 2016', 'tabA7.jpg', 3290000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :7 inch, 1280 x 800 Pixels\r\nCamera trước :2.0 MP\r\nCamera sau :5.0 MP\r\nCPU :CPU 4 nhân\r\nRAM :1.5 GB\r\nBộ nhớ trong :8 GB\r\nKết nối :Hỗ trợ 3G: 850/ 900/ 1900/ 2100 MHz, 4G LTE: 4G LTE, Wi-Fi: 802.11 b/g/n 2.4GHz, Bluetooth: Bluetooth v4.0\r\nThời gian sử dụng :6 giờ', 0, 4, 2),
(80, 'Samsung Galaxy Tab A6 10.1 / Spen', 'tabA6.jpg', 7490000, '2018-12-01 00:00:00', 50, 0, 0, 'Màn hình :10.1 inch, 1920 x 1200 pixels\r\nCamera trước :2.0 MP\r\nCamera sau :8.0 MP\r\nCPU :Exynos 7870\r\nGPU :Mali-T830\r\nRAM :3 GB\r\nBộ nhớ trong :16 GB\r\nKết nối :Hỗ trợ 3G: HSDPA, 42 Mbps, 4G LTE: 4G LTE, Wi-Fi: Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot, Bluetooth: LE, 4.2\r\nThời gian sử dụng :8 ', 0, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  PRIMARY KEY (`MaTaiKhoan`),
  KEY `MaLoaiTaiKhoan` (`MaLoaiTaiKhoan`),
  KEY `MaLoaiTaiKhoan_2` (`MaLoaiTaiKhoan`),
  KEY `MaLoaiTaiKhoan_3` (`MaLoaiTaiKhoan`),
  KEY `MaLoaiTaiKhoan_4` (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `NgaySinh`, `MatKhau`, `TenHienThi`, `DiaChi`, `DienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`) VALUES
(1, 'admin', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'TP.HCM', '19000909', 'example@gmail.com', 0, 1),
(2, 'hctrung', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Chính Trung', 'TP.HCM', '0966933111', 'hctrung1@gmail.com', 0, 2),
(5, 'lvtrong', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Lê Văn Trọng', 'HCM', '0972430111', 'lvtrong1@gmail.com', 0, 2),
(20, 'tronglee', '2005-01-01', 'c6330ca473aab1aa19daf6d1b4994839', '', 'An Giang', '', '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tinhthanh`
--

DROP TABLE IF EXISTS `tinhthanh`;
CREATE TABLE IF NOT EXISTS `tinhthanh` (
  `MaTinhThanh` int(11) NOT NULL AUTO_INCREMENT,
  `TenTinhThanh` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaTinhThanh`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhthanh`
--

INSERT INTO `tinhthanh` (`MaTinhThanh`, `TenTinhThanh`) VALUES
(1, 'An Giang'),
(2, 'Bà Rịa - Vũng Tàu'),
(3, 'Bắc Giang'),
(4, 'Bắc Kạn'),
(5, 'Bạc Liêu'),
(6, 'Bắc Ninh'),
(7, 'Bến Tre'),
(8, 'Bình Định'),
(9, 'Bình Dương'),
(10, 'Bình Phước'),
(11, 'Bình Thuận'),
(12, 'Cà Mau'),
(13, 'Cao Bằng'),
(14, 'Đắk Lắk'),
(15, 'Đắk Nông'),
(16, 'Điện Biên'),
(17, 'Đồng Nai\r\n'),
(18, 'Đồng Tháp'),
(19, 'Gia Lai'),
(20, 'Hà Giang'),
(21, 'Hà Nam'),
(22, 'Hà Tĩnh'),
(23, 'Hải Dương'),
(24, 'Hậu Giang'),
(25, 'Hòa Bình'),
(26, 'Hưng Yên'),
(27, 'Khánh Hòa'),
(28, 'Kiên Giang\r\n'),
(29, 'Kon Tum'),
(30, 'Lai Châu'),
(31, 'Lâm Đồng'),
(32, 'Lạng Sơn'),
(33, 'Lào Cai'),
(34, 'Long An'),
(35, 'Nam Định'),
(36, 'Nghệ An'),
(37, 'Ninh Bình'),
(38, 'Ninh Thuận'),
(39, 'Phú Thọ'),
(40, 'Quảng Bình'),
(41, 'Quảng Nam'),
(42, 'Quảng Ngãi'),
(43, 'Quảng Ninh'),
(44, 'Quảng Trị'),
(45, 'Sóc Trăng'),
(46, 'Sơn La'),
(47, 'Tây Ninh'),
(48, 'Thái Bình'),
(49, 'Thái Nguyên'),
(50, 'Thanh Hóa'),
(51, 'Thừa Thiên Huế'),
(52, 'Tiền Giang'),
(53, 'Trà Vinh'),
(54, 'Tuyên Quang'),
(55, 'Vĩnh Long'),
(56, 'Vĩnh Phúc'),
(57, 'Yên Bái'),
(58, 'Phú Yên'),
(59, 'Cần Thơ'),
(60, 'Đà Nẵng'),
(61, 'Hải Phòng'),
(62, 'Hà Nội\r\n'),
(63, 'TP Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

DROP TABLE IF EXISTS `tinhtrang`;
CREATE TABLE IF NOT EXISTS `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaTinhTrang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Chưa tiếp nhận'),
(2, 'Đã tiếp nhận'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_MADONDATHANG` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`),
  ADD CONSTRAINT `FK_MASANPHAM` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK_MATAIKHOAN` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `FK_MATINHTRANG` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`);

--
-- Constraints for table `hangsxcualoaisp`
--
ALTER TABLE `hangsxcualoaisp`
  ADD CONSTRAINT `FK_HANGSX` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`),
  ADD CONSTRAINT `FK_LOAISP` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_HANGSANXUAT` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`),
  ADD CONSTRAINT `FK_LOAISANPHAM` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_LOAITK` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
