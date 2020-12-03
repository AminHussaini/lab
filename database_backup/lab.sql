-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 08:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `multiimages`
--

CREATE TABLE `multiimages` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductCode` int(10) NOT NULL,
  `ProductaddUserName` varchar(50) NOT NULL,
  `ProductDetail` varchar(250) NOT NULL,
  `ProductIdType` int(11) NOT NULL,
  `ProductDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `ProductTypeId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductDescription` varchar(250) NOT NULL,
  `ProductCateAddUser` int(50) NOT NULL,
  `ProductCateDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`ProductTypeId`, `ProductName`, `ProductDescription`, `ProductCateAddUser`, `ProductCateDate`) VALUES
(39, 'wqeqweqwe122q', 'asdasdasdga', 3, '2020-12-03 09:52pm'),
(40, 'Bulbasda', 'asdasdad', 3, '2020-12-03 04:16pm'),
(41, 'Fuse', 'In electronics and electrical engineering, a fuse is an electrical safety device that operates to provide overcurrent protection of an electrical ', 4, '2020-12-03 09:57pm'),
(42, 'Bulb', 'electric lamp: such as. a : one in which a filament gives off light', 4, '2020-12-03 10:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `name`, `email`, `password`, `role`, `status`, `image`) VALUES
(3, 'Muhammad Amin Hussaini', 'aminasghar125@gmail.com', 'demo12', 'Admin', 'Accepted', 'pp.jpg'),
(4, 'Ali', 'aminasghar5@gmail.com', 'demo', 'SRS', 'Accepted', '20151104_113813.jpg'),
(12, 'Aizaz', 'twinmark01@gmail.com', 'demo23', 'Admin', 'Pending', 'slider.jpg'),
(13, 'Irfan', 'irfanhaiderkhan12@yahoo.com', 'demo123', 'CPRI', 'Pending', 'pp.jpg'),
(17, 'Ehtizan', 'aminasghar52@gmail.com', 'duck', 'SRS', 'Pending', 'pp1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testingtypes`
--

CREATE TABLE `testingtypes` (
  `TestingTypeId` int(11) NOT NULL,
  `TestingName` varchar(100) NOT NULL,
  `TestingTypeDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multiimages`
--
ALTER TABLE `multiimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ProductTypeId`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `testingtypes`
--
ALTER TABLE `testingtypes`
  ADD PRIMARY KEY (`TestingTypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testingtypes`
--
ALTER TABLE `testingtypes`
  MODIFY `TestingTypeId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
