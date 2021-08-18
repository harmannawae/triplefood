-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 06:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triplefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `pmode`, `products`, `amount_paid`) VALUES
(1, '0002', 'cod', 'ไข่เจียวหน้าผักชี(1), ยำไข่เค็ม(1), ผัดเผ็ด(1), ยำมะม่วงปลากรอบ(1)', '145'),
(2, '0002', 'cod', 'ยำมะม่วงปลากรอบ(1), ยำมะม่วง(1), ยำปูไข่ดอง(1)', '360'),
(3, '0001', 'cod', 'ยำมะม่วงปลากรอบ(1), ยำมะม่วง(1), ยำปูไข่ดอง(1)', '360'),
(4, '0002', 'cod', 'ยำมะม่วง(1), ยำไข่เค็ม(1), ไข่เจียวหน้าผักชี(1)', '120'),
(5, '0003', 'cod', 'ยำไข่เค็ม(1), ไข่เจียวหน้าผักชี(1), ยำขนมจีน(1)', '150'),
(6, '0001', 'cod', 'ผัดเผ็ด(1)', '25'),
(7, '0001', 'cod', 'ผัดเผ็ด(1), ไข่เจียวหน้าผักชี(1), ยำมะม่วง(1)', '95');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`, `product_code`) VALUES
(2, 'ยำไข่เค็ม', '50', 'image/002.jpg', 'p1001'),
(3, 'ไข่เจียวหน้าผักชี', '20', 'image/003.jpg', 'p1002'),
(4, 'ผัดเผ็ด', '25', 'image/004.jpg', 'p1003'),
(6, 'ยำไข่ปูมะม่วงสับ', '220', 'image/011.jpg', 'p1011'),
(7, 'ยำกุ้งสะดุ้ง', '200', 'image/012.jpg', 'p1012'),
(8, 'ยำขนมจีน', '80', 'image/013.jpg', 'p1013'),
(9, 'ยำมะม่วงปลากรอบ', '50', 'image/014.jpg', 'p1014'),
(10, 'ยำมะม่วงปลากรอบ', '60', 'image/015.jpg', 'p1015'),
(11, 'ยำปูม้า', '120', 'image/016.jpg', 'p1015'),
(12, 'ยำปูไข่ดอง', '250', 'image/017.jpg', 'p1017'),
(13, 'ยำปูม้าจำโบ', '180', 'image/018.jpg', 'p1018'),
(16, 'ยำม่าม่า', '50', 'image/019.jpg', 'p2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(50) NOT NULL,
  `userlevel` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `address`, `salary`, `birthday`, `image`, `userlevel`) VALUES
(1, 'admin', '123', 'sassuvanee kana', '163  ม.6 ต.สะเอะ อ.กรงปินัง จ.ยะลา ', '500000', '2020-10-05', 'user/001.jpg', 'Manager'),
(2, '0002', '0002', 'areefeen  uma', '58ม.6 ต.โกตาบารู จ.ยะลา', '7000', '2020-09-03', 'user/002.jpg', 'member'),
(3, '0003', '0003', 'dulmanah hama', '88  อ.รือเสาะ จ.นราธิวาส\r\n95140', '50000', '2020-09-04', '', 'member'),
(4, '0004', '0004', 'sunhagee hama', '85 ม.6 ต.บ่อ9 จ.ปัตตานี', '5000', '2020-09-13', '', 'member'),
(5, '0005', '0005', 'areefeen uma', '65 ต.เมืองสตูล อ.เมืองสตูล จ.สตูล', '520000', '2020-09-11', '', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
