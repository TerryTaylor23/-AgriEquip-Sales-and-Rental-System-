-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 07:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `price` int(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `image`) VALUES
(2, 'Racker', 6000, 'board-plough.jpeg'),
(4, 'Disc-plough', 8000, 'disc.jpg'),
(5, 'Plough harrow', 10000, 'disc-plough-4.jpeg'),
(6, 'Board plough', 5000, 'board-plough.jpeg'),
(7, 'potato harvester', 40000, 'potato harvester.png');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`product_id`, `quantity`) VALUES
(2, 8),
(4, 4),
(5, 0),
(6, 0),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `s/n` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(15) NOT NULL,
  `status` set('pending','on delivery','delivered') NOT NULL DEFAULT 'pending',
  `vendor` varchar(20) DEFAULT NULL,
  `code` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`s/n`, `customer_id`, `product_id`, `quantity`, `status`, `vendor`, `code`) VALUES
(43, 19991201, 4, 3, 'on delivery', '19980212', 939955),
(44, 19740712, 5, 1, 'delivered', '19980808', 560254),
(45, 19740712, 6, 2, 'delivered', '19980808', 560254),
(47, 19920711, 2, 7, 'on delivery', '19980212', 387838),
(48, 19980923, 2, 3, 'on delivery', '19980808', 446646),
(49, 19990920, 7, 1, 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nationid` int(30) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `phonenumber` int(25) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` set('user','vendor','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nationid`, `firstname`, `lastname`, `sex`, `phonenumber`, `password`, `user_type`) VALUES
(19740712, 'Laurent', 'John', 'male', 754005511, '1d533ec2e7d744e1ac9a2e874a5f269093234df3', 'user'),
(19920711, 'saumu', 'shaban', 'female', 654003344, '1d533ec2e7d744e1ac9a2e874a5f269093234df3', 'user'),
(19940412, 'amina', 'mudy', 'female', 788543211, '6e9b99384f21dc46400b5347a3eb341f6daeb334', 'user'),
(19940711, 'baraka', 'mabumba', 'male', 755443322, '7919ae519f96a6645a5640c381f954df58d2d2d2', 'user'),
(19940712, 'billy', 'glimour', 'male', 743213465, '8aefb06c426e07a0a671a1e2488b4858d694a730', 'user'),
(19980212, 'sharon', 'makuka', 'female', 685816232, '1d533ec2e7d744e1ac9a2e874a5f269093234df3', 'vendor'),
(19980808, 'mlevi', 'ally', 'male', 718181873, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'vendor'),
(19980923, 'wallece', 'kibuga', 'male', 674783238, '00fd4b4549a1094aae926ef62e9dbd3cdcc2e456', 'user'),
(19990724, 'beatrice', 'sam', 'female', 754003320, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user'),
(19990915, 'kimaro', 'temba', 'male', 768886786, '8cb2237d0679ca88db6464eac60da96345513964', 'vendor'),
(19990920, 'Gabriel', 'Taylor', 'male', 692941536, '00fd4b4549a1094aae926ef62e9dbd3cdcc2e456', 'user'),
(19990923, 'Terry', 'Taylor', 'male', 756893151, 'f37be93b674e3dcd988cba4a7cf66879468c3b35', 'admin'),
(19991201, 'Maria', 'Juma', 'female', 754213322, 'ae66c62c9cf7db0a9bd54637b28ebfe0b65402c1', 'user'),
(19991222, 'Mariam', 'mbaraka', 'female', 754213322, 'b60069c04c8aa62657c2aa75569c961afdde99ce', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`s/n`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor` (`vendor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nationid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `s/n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `TBL_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`nationid`),
  ADD CONSTRAINT `TBL_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
