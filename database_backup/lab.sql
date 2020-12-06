-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 05:20 AM
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

--
-- Dumping data for table `multiimages`
--

INSERT INTO `multiimages` (`id`, `file_name`, `parentId`) VALUES
(88, '—Pngtree—muscle santa cool body_5590575.png', 56),
(89, '—Pngtree—instagram icon logo_3560507.png', 56),
(90, '0a1f820e29719c7b67e9d5aa44241155.jpg', 56),
(91, 'images.jpg', 57),
(92, 'download-4.jpg', 57),
(93, 'download-3.jpg', 57),
(94, 'download-2.jpg', 57),
(95, 'download-1.jpg', 57),
(96, '—Pngtree—muscle santa cool body_5590575.png', 60),
(97, '—Pngtree—instagram icon logo_3560507.png', 60),
(98, '0a1f820e29719c7b67e9d5aa44241155.jpg', 60),
(99, '—Pngtree—muscle santa cool body_5590575.png', 61),
(100, '—Pngtree—instagram icon logo_3560507.png', 61),
(101, '0a1f820e29719c7b67e9d5aa44241155.jpg', 61),
(108, '—Pngtree—muscle santa cool body_5590575.png', 65),
(109, '—Pngtree—instagram icon logo_3560507.png', 65),
(110, 'pp.jpg', 66),
(111, 'pp+.jpg', 66),
(112, '—Pngtree—muscle santa cool body_5590575.png', 67),
(113, '—Pngtree—instagram icon logo_3560507.png', 67),
(114, '0a1f820e29719c7b67e9d5aa44241155.jpg', 67),
(115, '—Pngtree—muscle santa cool body_5590575.png', 68),
(116, '—Pngtree—instagram icon logo_3560507.png', 68),
(117, '0a1f820e29719c7b67e9d5aa44241155.jpg', 68),
(118, 'images.jpg', 68),
(119, 'download-4.jpg', 68),
(120, 'download-3.jpg', 68),
(121, 'download-2.jpg', 68),
(122, 'download-1.jpg', 68),
(123, '—Pngtree—muscle santa cool body_5590575.png', 69);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductCode` varchar(10) NOT NULL,
  `ProductaddUserName` varchar(50) NOT NULL,
  `ProductDetail` varchar(1000) NOT NULL,
  `ProductIdType` int(11) NOT NULL,
  `ProductDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `ProductCode`, `ProductaddUserName`, `ProductDetail`, `ProductIdType`, `ProductDate`) VALUES
(56, 'elecrtic fuse-1', '2693787045', '3', 'changes', 74, '2020-12-06 07:08am'),
(57, 'elecrtic fuse', '4596545442', '3', 'asdasdasd', 76, '2020-12-06 01:40am'),
(60, 'elecrtic fuse', '8598705630', '3', 'asdasdasdasd', 75, '2020-12-06 01:48am'),
(61, 'amin', 'asdasdeqwe', '3', 'asdasdsadasd', 75, '2020-12-06 01:52am'),
(65, 'elecrtic fuse', '8472303117', '3', 'asdasda', 75, '2020-12-06 02:10am'),
(66, 'amin', '2963983742', '3', 'sdfsdfsdf', 76, '2020-12-06 02:39am'),
(67, 'elecrtic fuse', '3582799570', '3', 'asdasdas', 76, '2020-12-06 02:55am'),
(68, 'motor fuse', '9841179899', '3', 'asdsadasd', 74, '2020-12-06 05:51am'),
(69, 'asdasda', '8178347652', '3', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting i', 75, '2020-12-06 05:54am');

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
(74, 'fuse', 'asdasdasd', 3, '2020-12-06 12:16am'),
(75, 'bulb', 'asdasdas', 3, '2020-12-06 12:18am'),
(76, 'testing', 'asdasd', 3, '2020-12-06 12:21am');

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
(3, 'Muhammad Amin Hussaini', 'aminasghar125@gmail.com', 'demo125', 'Admin', 'Accepted', '3pp.jpg'),
(4, 'Ali', 'aminasghar5@gmail.com', 'demo', 'SRS', 'Accepted', '20151104_113813.jpg'),
(12, 'Aizaz', 'twinmark01@gmail.com', 'demo23', 'Admin', 'Pending', 'slider.jpg'),
(13, 'Irfan', 'irfanhaiderkhan12@yahoo.com', 'demo123', 'CPRI', 'Accepted', '13pp+.jpg'),
(17, 'Ehtizan', 'aminasghar52@gmail.com', 'duck', 'SRS', 'Pending', 'pp1.jpg'),
(19, 'shariq', 'shariq.shaikh109@gmail.com', 'demo', 'SRS', 'Accepted', 'processed.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `testingtypes`
--

CREATE TABLE `testingtypes` (
  `TestingTypeID` int(11) NOT NULL,
  `TestingTypeName` varchar(50) NOT NULL,
  `TestingTypeDescription` varchar(1000) NOT NULL,
  `TestingCateAddUser` int(11) NOT NULL,
  `TestingCateDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testingtypes`
--

INSERT INTO `testingtypes` (`TestingTypeID`, `TestingTypeName`, `TestingTypeDescription`, `TestingCateAddUser`, `TestingCateDate`) VALUES
(2, 'level-2', 'this testing is medium', 13, '2020-12-06 08:36am'),
(3, 'level-4', 'this is very hard testing', 13, '2020-12-06 08:37am');

-- --------------------------------------------------------

--
-- Table structure for table `uploading`
--

CREATE TABLE `uploading` (
  `id` int(11) NOT NULL,
  `FileName` varchar(250) NOT NULL,
  `ParentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploading`
--

INSERT INTO `uploading` (`id`, `FileName`, `ParentID`) VALUES
(1, 'images.jpg', 1),
(2, 'download-4.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multiimages`
--
ALTER TABLE `multiimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `ProductIdType` (`ProductIdType`);

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
  ADD PRIMARY KEY (`TestingTypeID`);

--
-- Indexes for table `uploading`
--
ALTER TABLE `uploading`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testingtypes`
--
ALTER TABLE `testingtypes`
  MODIFY `TestingTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploading`
--
ALTER TABLE `uploading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `multiimages`
--
ALTER TABLE `multiimages`
  ADD CONSTRAINT `multiimages_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `product` (`ProductId`),
  ADD CONSTRAINT `multiimages_ibfk_2` FOREIGN KEY (`parentId`) REFERENCES `product` (`ProductId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
