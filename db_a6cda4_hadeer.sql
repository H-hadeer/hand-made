-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql5044.site4now.net
-- Generation Time: Jan 24, 2021 at 01:20 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a6cda4_hadeer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat.no` int NOT NULL,
  `catname` varchar(100) NOT NULL,
  `productprice` float NOT NULL,
  `deptcat` int NOT NULL,
  `catdetalies` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat.no`, `catname`, `productprice`, `deptcat`, `catdetalies`) VALUES
(1, 'corishiah', 220, 0, ''),
(2, 'triko', 60, 0, ''),
(3, 'design', 660, 0, ''),
(4, 'tarat', 790, 0, ''),
(5, 'tatriz', 60, 0, ''),
(6, 'wooden work', 112, 0, ''),
(7, 'tatriz', 440, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `depid` int NOT NULL,
  `depname` varchar(120) NOT NULL,
  `depdet` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`depid`, `depname`, `depdet`) VALUES
(1, 'coroshiah', 'Cervical pillow for airplane car office nap pillow'),
(2, 'tarat', 'Cervical pillow for airplane car office nap pillow,Cervical pillow for airplane car office nap pillow');

-- --------------------------------------------------------

--
-- Table structure for table `intersting`
--

CREATE TABLE `intersting` (
  `userID` int NOT NULL,
  `adddata` datetime DEFAULT NULL,
  `cat.no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderno` int NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderno`, `total`, `status`, `userid`) VALUES
(1, 2600, 'Pending', 13),
(2, 2600, 'Pending', 13),
(3, 2600, 'Pending', 13);

-- --------------------------------------------------------

--
-- Table structure for table `ordertemp`
--

CREATE TABLE `ordertemp` (
  `prono` int NOT NULL,
  `qty` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordertemp`
--

INSERT INTO `ordertemp` (`prono`, `qty`, `userid`) VALUES
(2, 3, 1),
(3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prono` int NOT NULL,
  `proname` text NOT NULL,
  `proprice` int NOT NULL,
  `prodetalies` varchar(600) NOT NULL,
  `saleprice` varchar(200) NOT NULL,
  `makerno` int NOT NULL,
  `catno` int NOT NULL,
  `deptid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prono`, `proname`, `proprice`, `prodetalies`, `saleprice`, `makerno`, `catno`, `deptid`) VALUES
(1, 'corishih', 1000, 'Made of high quality yarn with love and friendliness', '.01', 1, 1, 0),
(2, 'triko', 1200, 'Made of high quality yarn with love and friendliness', '.12', 2, 2, 0),
(3, 'triko', 1209, 'Made of high quality yarn with love and friendliness', '.03', 5, 3, 0),
(4, 'triko', 1300, 'Made of high quality yarn with love and friendliness', '.03', 7, 2, 0),
(5, 'triko', 1600, 'Made of high quality yarn with love and friendliness', '.03', 8, 3, 0),
(6, 'triko', 18, 'Made of high quality yarn with love and friendliness', '.06', 9, 3, 0),
(7, 'triko', 1200, 'Made of high quality yarn with love and friendlinessMade of high quality yarn with love and friendliness', '.03', 8, 3, 0),
(8, 'triko', 1400, 'Made of high quality yarn with love and friendliness', '.14', 11, 6, 0),
(9, 'corishih', 1009, 'Made of high quality yarn with love and friendliness', '.02', 1, 1, 0),
(10, 'wood', 6000, 'wood wood wood wood wood wood ', '.06', 6, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `prono` int NOT NULL,
  `orderno` int NOT NULL,
  `qty` int DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`prono`, `orderno`, `qty`, `price`, `total`) VALUES
(4, 3, 2, 1300.00, 2600.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `name` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `phone`, `password`, `address`) VALUES
(11, 'reem', 'reem@gmail.com', '01012346782', 'Aa/123', 'kafr elshikh'),
(13, 'ee', 'reem22@gmail.com', '0120336664', 'Aa123/', 'kkkk'),
(14, 'dodo', 'hadeerelsayed147@gmail.com', '01012346789', 'Aa123+', 'mmm'),
(17, 'kk', 'reemcc@gmail.com', '1014478899', 'Aa123--', 'd'),
(21, 'nadin', 'reemoo@gmail.com', '1230214666', 'Aa1234/', 'كفر الشيخ'),
(23, 'dora', 'hadeer@gmail.com', '0102222222', 'Aa12346/', 'كفر الشيخ');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vieworders`
-- (See below for the actual view)
--
CREATE TABLE `vieworders` (
`prono` int
,`proname` text
,`proprice` int
,`qty` int
,`total` bigint
,`userid` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viweconformation`
-- (See below for the actual view)
--
CREATE TABLE `viweconformation` (
`orderno` int
,`orderdate` timestamp
,`status` varchar(15)
,`userid` int
,`prono` int
,`proname` text
,`qty` int
,`price` double(10,2)
,`total` double(10,2)
,`catname` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `vieworders`
--
DROP TABLE IF EXISTS `vieworders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`a6cda4_hadeer`@`%` SQL SECURITY DEFINER VIEW `vieworders`  AS  select `products`.`prono` AS `prono`,`products`.`proname` AS `proname`,`products`.`proprice` AS `proprice`,`ordertemp`.`qty` AS `qty`,(`products`.`proprice` * `ordertemp`.`qty`) AS `total`,`ordertemp`.`userid` AS `userid` from (`ordertemp` join `products` on((`ordertemp`.`prono` = `products`.`prono`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viweconformation`
--
DROP TABLE IF EXISTS `viweconformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`a6cda4_hadeer`@`%` SQL SECURITY DEFINER VIEW `viweconformation`  AS  select `orders`.`orderno` AS `orderno`,`orders`.`orderdate` AS `orderdate`,`orders`.`status` AS `status`,`orders`.`userid` AS `userid`,`products`.`prono` AS `prono`,`products`.`proname` AS `proname`,`sales`.`qty` AS `qty`,`sales`.`price` AS `price`,`sales`.`total` AS `total`,`categories`.`catname` AS `catname` from (((`products` join `categories` on((`categories`.`cat.no` = `products`.`catno`))) join `sales` on((`products`.`prono` = `sales`.`prono`))) join `orders` on((`sales`.`orderno` = `orders`.`orderno`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat.no`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`depid`);

--
-- Indexes for table `intersting`
--
ALTER TABLE `intersting`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderno`) USING BTREE,
  ADD KEY `userorderFK` (`userid`);

--
-- Indexes for table `ordertemp`
--
ALTER TABLE `ordertemp`
  ADD PRIMARY KEY (`prono`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prono`,`makerno`,`catno`) USING BTREE,
  ADD KEY `catproductFK` (`catno`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`prono`,`orderno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat.no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `depid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intersting`
--
ALTER TABLE `intersting`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prono` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userorderFK` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `catproductFK` FOREIGN KEY (`catno`) REFERENCES `categories` (`cat.no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
