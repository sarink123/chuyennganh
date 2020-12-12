-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2020 at 03:53 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlhh`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
CREATE TABLE IF NOT EXISTS `distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã nhà cung cấp ',
  `distributor_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL COMMENT 'địa chỉ',
  `phone` varchar(12) NOT NULL COMMENT 'số điện thoại',
  PRIMARY KEY (`id`),
  UNIQUE KEY `distributor_name` (`distributor_name`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `distributor_name`, `email`, `address`, `phone`) VALUES
(1, 'Công Ty TNHH Thương Mại Dịch Vụ Tam Xuân', '', '25/11 Lê Duy Nhuận, Phường 12, Quận Tân Bình Tp. Hồ Chí Minh', '0902847978'),
(36, 'CÔNG TY TNHH SUNG IL VIỆT NAM', 'lehoangoanhvn@yahoo.com', '29 Trần Hữu Trang, Phường 11, Quận Phú Nhuận, Tp. Hồ Chí Minh', ' 0903710750'),
(42, 'Công ty tnhh abc', 'nhutlyquang@gmail.com', '180 Cao Lỗ Quận 8', '02871568'),
(50, 'Công ty tnhh abcz', 'giale4545@gmail.com', '184 Cao Lỗ Quận 8', '0123456789'),
(51, 'Cty TNHH abc', 'abc@gmail.com', '123 abc', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

DROP TABLE IF EXISTS `export`;
CREATE TABLE IF NOT EXISTS `export` (
  `id_ex` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã phiếu xuất',
  `user_id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `retailer_id` int(11) NOT NULL,
  `retailer_name` varchar(50) NOT NULL COMMENT 'tên cửa hàng',
  `address_ex` varchar(100) NOT NULL COMMENT 'địa chỉ cửa hàng',
  `phone_ex` varchar(12) NOT NULL COMMENT 'số điện thoại cửa hàng',
  `createdate` datetime DEFAULT NULL COMMENT 'ngày lập phiếu',
  `updatedate` datetime DEFAULT NULL COMMENT 'ngày cập nhật',
  PRIMARY KEY (`id_ex`),
  KEY `export_fk_retailer` (`retailer_id`),
  KEY `export_fk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`id_ex`, `user_id`, `retailer_id`, `retailer_name`, `address_ex`, `phone_ex`, `createdate`, `updatedate`) VALUES
(111, 15, 1, 'Cửa hàng Sang', '258/8 Nguyễn Công Trứ Q1', '0123456789', '2020-12-04 22:42:24', '2020-12-04 22:42:24'),
(112, 15, 1, 'Cửa hàng Sang', '258/8 Nguyễn Công Trứ Q1', '0123456789', '2020-12-04 23:42:19', '2020-12-04 23:42:19'),
(113, 15, 1, 'Cửa hàng Sang', '258/8 Nguyễn Công Trứ Q1', '0123456789', '2020-12-05 00:30:33', '2020-12-05 00:30:33'),
(114, 12, 3, 'Cửa hàng Son', '184 Cao Lỗ Quận 8', '0903710750', '2020-12-06 14:41:29', '2020-12-06 14:41:29'),
(115, 12, 1, 'Cửa hàng Sang', '258/8 Nguyễn Công Trứ Q1', '0123456789', '2020-12-06 15:08:55', '2020-12-06 15:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `exportdetails`
--

DROP TABLE IF EXISTS `exportdetails`;
CREATE TABLE IF NOT EXISTS `exportdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'stt',
  `export_id` int(11) NOT NULL COMMENT 'mã phiếu xuất',
  `good_id` int(11) NOT NULL COMMENT 'mã hàng xuất',
  `good_name` varchar(50) NOT NULL COMMENT 'tên hàng',
  `amount` int(11) NOT NULL COMMENT 'số lượng',
  `price` int(11) NOT NULL COMMENT 'đơn giá',
  `type` varchar(20) NOT NULL COMMENT 'loại',
  `unit` varchar(20) NOT NULL COMMENT 'đơn vị tính',
  PRIMARY KEY (`id`),
  KEY `details_fk_export` (`export_id`),
  KEY `exdetails_fk_goods` (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exportdetails`
--

INSERT INTO `exportdetails` (`id`, `export_id`, `good_id`, `good_name`, `amount`, `price`, `type`, `unit`) VALUES
(1, 113, 123, 'Vải Kaki Thun', 100, 40000, 'Kaki', 'Mét'),
(2, 114, 123, 'Vải Kaki Thun', 100, 40000, 'Kaki', 'Mét'),
(3, 114, 124, 'Vải Jean Thun', 100, 50000, 'Kaki', 'Mét');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id_goods` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã hàng',
  `name` varchar(50) NOT NULL COMMENT 'ten hang',
  `amount` int(11) NOT NULL COMMENT 'số lượng',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT 'giá',
  `distributor_id` int(11) NOT NULL COMMENT 'mã cung cấp',
  `type` varchar(20) NOT NULL COMMENT 'loại',
  `unit` varchar(20) NOT NULL COMMENT 'đơn vị tính',
  PRIMARY KEY (`id_goods`),
  KEY `distributor_id` (`distributor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id_goods`, `name`, `amount`, `price`, `distributor_id`, `type`, `unit`) VALUES
(123, 'Vải Kaki Thun', 1000, 40000, 1, 'kk', 'Mét'),
(124, 'Vải Jean Thun', 400, 50000, 1, 'kk', 'Mét'),
(125, 'Vải Len Cừu', 750, 100000, 42, 'l', 'Mét'),
(138, 'Vải Jean Thun', 550, 50000, 36, 'j', 'Mét'),
(141, 'Vải Kaki Thun', 808, 40000, 36, 'kk', 'Mét'),
(144, 'Vải Kaki Thường', 250, 12358, 42, 'kk', 'Mét'),
(146, 'Vải Kaki Thun', 300, 20000, 42, 'kk', 'Mét'),
(147, 'Vải Len Cừu', 200, 123580, 36, 'l', 'Mét'),
(148, 'Vải Kaki Thường', 100, 20000, 36, 'kk', 'Mét'),
(149, 'Vải Jean Thun', 200, 100000, 42, 'j', 'Mét'),
(150, 'Vải Nhung', 200, 150000, 42, 'nhu', 'Mét');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

DROP TABLE IF EXISTS `import`;
CREATE TABLE IF NOT EXISTS `import` (
  `id_im` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã phiếu nhập',
  `user_id` int(11) NOT NULL COMMENT 'mã nhân viên',
  `distributor_name` varchar(50) NOT NULL COMMENT 'tên nhà cung cấp',
  `address_im` varchar(100) NOT NULL COMMENT 'địa chỉ nhà cung cấp',
  `phone_im` varchar(12) NOT NULL COMMENT 'điện thoại nhà cung cấp',
  `createdate` datetime DEFAULT NULL COMMENT 'ngày tạo',
  `updatedate` datetime DEFAULT NULL COMMENT 'ngày cập nhật',
  PRIMARY KEY (`id_im`),
  KEY `import_fk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`id_im`, `user_id`, `distributor_name`, `address_im`, `phone_im`, `createdate`, `updatedate`) VALUES
(111, 13, 'Công Ty TNHH Thương Mại Dịch Vụ Tam Xuân', '25/11 Lê Duy Nhuận, Phường 12, Quận Tân Bình Tp. Hồ Chí Minh', '0902847978', '2020-11-30 00:00:00', '2020-11-30 00:00:00'),
(112, 12, 'Công ty tnhh abc', '180 Cao Lỗ Quận 8', '02871568', '2020-12-03 13:41:01', NULL),
(113, 15, 'CÔNG TY TNHH SUNG IL VIỆT NAM', '29 Trần Hữu Trang, Phường 11, Quận Phú Nhuận, Tp. Hồ Chí Minh', ' 0903710750', '2020-12-04 18:23:16', '2020-12-04 18:23:16'),
(114, 15, 'Công ty tnhh abc', '180 Cao Lỗ Quận 8', '02871568', '2020-12-04 19:20:42', '2020-12-04 19:20:42'),
(115, 15, 'CÔNG TY TNHH SUNG IL VIỆT NAM', '29 Trần Hữu Trang, Phường 11, Quận Phú Nhuận, Tp. Hồ Chí Minh', ' 0903710750', '2020-12-04 20:42:11', '2020-12-04 20:42:11'),
(117, 15, 'Công ty tnhh abc', '180 Cao Lỗ Quận 8', '02871568', '2020-12-04 21:34:31', '2020-12-04 21:34:31'),
(119, 15, 'Cty TNHH abc', '123 abc', '0123456789', '2020-12-05 11:04:32', '2020-12-05 11:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `importdetails`
--

DROP TABLE IF EXISTS `importdetails`;
CREATE TABLE IF NOT EXISTS `importdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `import_id` int(10) NOT NULL COMMENT 'mã phiếu nhập',
  `good_id` int(11) NOT NULL COMMENT 'mã hàng',
  `goods_name` varchar(50) NOT NULL COMMENT 'tên hàng ',
  `amount` int(11) NOT NULL COMMENT 'số lượng',
  `price` int(11) NOT NULL COMMENT 'đơn giá',
  `type` varchar(100) NOT NULL COMMENT 'loại ',
  `unit` varchar(20) NOT NULL COMMENT 'đơn vị tính',
  PRIMARY KEY (`id`),
  KEY `details_fk_import` (`import_id`),
  KEY `details_fk_goods` (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `importdetails`
--

INSERT INTO `importdetails` (`id`, `import_id`, `good_id`, `goods_name`, `amount`, `price`, `type`, `unit`) VALUES
(1, 111, 123, 'Vải Kaki Thun', 100, 40000, 'Kaki', 'Mét'),
(10, 112, 125, 'Vải Len Cừu', 200, 100000, 'Len', 'Mét'),
(38, 113, 138, 'Vải Jean Thun', 100, 40000, 'Jean', 'Mét'),
(39, 113, 141, 'Vải Kaki Thun', 400, 40000, 'Kaki', 'Mét'),
(44, 113, 138, 'Vải Jean Thun', 100, 50000, 'Jean', 'Mét'),
(45, 114, 125, 'Vải Len Cừu', 100, 100000, 'Len', 'Mét'),
(46, 114, 144, 'Vải Kaki Thường', 100, 12358, 'Kaki', 'Mét'),
(47, 114, 125, 'Vải Len Cừu', 50, 100000, 'Len', 'Mét'),
(48, 114, 146, 'Vải Kaki Thun', 100, 20000, 'Kaki', 'Mét'),
(50, 115, 138, 'Vải Jean Thun', 50, 50000, 'Jean', 'Mét'),
(51, 115, 141, 'Vải Kaki Thun', 8, 40000, 'Kaki', 'Mét'),
(52, 115, 147, 'Vải Len Cừu', 100, 123580, 'Len', 'Mét'),
(53, 115, 148, 'Vải Kaki Thường', 50, 20000, 'Kaki', 'Mét'),
(54, 117, 149, 'Vải Jean Thun', 100, 100000, 'Jean', 'Mét'),
(55, 117, 146, 'Vải Kaki Thun', 100, 20000, 'Kaki', 'Mét'),
(56, 117, 150, 'Vải Nhung', 100, 150000, 'Nhung', 'Mét'),
(57, 117, 144, 'Vải Kaki Thường', 50, 12358, 'Kaki', 'Mét');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

DROP TABLE IF EXISTS `retailer`;
CREATE TABLE IF NOT EXISTS `retailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã cửa hàng',
  `name` varchar(50) NOT NULL COMMENT 'tên cửa hàng',
  `email` varchar(50) DEFAULT NULL COMMENT 'email',
  `address` varchar(100) NOT NULL COMMENT 'địa chỉ',
  `phone` varchar(12) NOT NULL COMMENT 'số điện thoại',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Cửa hàng Sang', 'giale4545@gmail.com', '258/8 Nguyễn Công Trứ Q1', '0123456789'),
(3, 'Cửa hàng Son', 'kimson0999@gmail.com', '184 Cao Lỗ Quận 8', '0903710750');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `type_id` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'mã loại',
  `type_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'tên loại',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
('j', 'Jean'),
('kk', 'Kaki'),
('l', 'Len'),
('nhu', 'Nhung'),
('th', 'Thun'),
('va', 'Voan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã nhân viên',
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(50) NOT NULL COMMENT 'password ',
  `email` varchar(50) NOT NULL COMMENT 'email đăng ký',
  `fullname` varchar(50) NOT NULL COMMENT 'họ tên nhân viên',
  `birthday` date DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `admin` int(2) NOT NULL,
  `createdate` datetime NOT NULL COMMENT 'ngày tạo ',
  `updatedate` datetime DEFAULT NULL COMMENT 'ngày cập nhật',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `birthday`, `phone`, `address`, `admin`, `createdate`, `updatedate`) VALUES
(12, 'ling123', 'cdbf94df7070bf5c228cf0d9358b47b8', 'giale4545@gmail.com   ', 'Ling', '1999-05-15', 123456987, '123 abc', 1, '2020-11-11 18:55:48', '2020-12-06 20:11:18'),
(13, 'son123', '392b346df950a3e9307acae491f194d0', 'kimson0999@gmail.com ', 'Sơn', '1999-04-28', NULL, '', 0, '2020-11-15 19:17:46', '2020-12-06 20:18:41'),
(14, 'anh123', 'ab34337cc98d7fed1c333e95997b0221', 'anhcute@gmail.com ', 'Ngoc Anh', '1999-06-01', NULL, '', 0, '2020-11-24 15:41:49', '2020-12-06 20:17:03'),
(15, 'nhut123', 'cdbf94df7070bf5c228cf0d9358b47b8', 'nhutlyquang@gmail.com  ', 'Nhut', '1999-10-25', NULL, '180 Cao Lỗ Quận 8', 0, '2020-11-30 23:20:39', '2020-12-06 20:17:35');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_fk_retailer` FOREIGN KEY (`retailer_id`) REFERENCES `retailer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `export_fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `exportdetails`
--
ALTER TABLE `exportdetails`
  ADD CONSTRAINT `details_fk_export` FOREIGN KEY (`export_id`) REFERENCES `export` (`id_ex`) ON DELETE CASCADE,
  ADD CONSTRAINT `exdetails_fk_goods` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id_goods`);

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_fk_distributor` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`id`);

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `importdetails`
--
ALTER TABLE `importdetails`
  ADD CONSTRAINT `details_fk_goods` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id_goods`),
  ADD CONSTRAINT `details_fk_import` FOREIGN KEY (`import_id`) REFERENCES `import` (`id_im`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
