-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 07:51 PM
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
(96, '—Pngtree—muscle santa cool body_5590575.png', 60),
(97, '—Pngtree—instagram icon logo_3560507.png', 60),
(98, '0a1f820e29719c7b67e9d5aa44241155.jpg', 60),
(99, '—Pngtree—muscle santa cool body_5590575.png', 61),
(100, '—Pngtree—instagram icon logo_3560507.png', 61),
(101, '0a1f820e29719c7b67e9d5aa44241155.jpg', 61),
(108, '—Pngtree—muscle santa cool body_5590575.png', 65),
(109, '—Pngtree—instagram icon logo_3560507.png', 65),
(115, '—Pngtree—muscle santa cool body_5590575.png', 68),
(116, '—Pngtree—instagram icon logo_3560507.png', 68),
(117, '0a1f820e29719c7b67e9d5aa44241155.jpg', 68),
(118, 'images.jpg', 68),
(119, 'download-4.jpg', 68),
(120, 'download-3.jpg', 68),
(121, 'download-2.jpg', 68),
(122, 'download-1.jpg', 68),
(123, '—Pngtree—muscle santa cool body_5590575.png', 69),
(124, '—Pngtree—muscle santa cool body_5590575.png', 70),
(125, '—Pngtree—instagram icon logo_3560507.png', 70),
(126, '0a1f820e29719c7b67e9d5aa44241155.jpg', 70),
(127, 'images.jpg', 70),
(128, 'download-4.jpg', 70),
(129, 'download-3.jpg', 70),
(130, 'download-2.jpg', 70),
(131, 'download-1.jpg', 70);

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
  `ProductDate` varchar(50) NOT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `ProductCode`, `ProductaddUserName`, `ProductDetail`, `ProductIdType`, `ProductDate`, `Status`) VALUES
(56, 'elecrtic fuse-1', '2693787045', '3', 'changes', 74, '2020-12-06 07:08am', '0'),
(60, 'elecrtic fuse', '8598705630', '3', 'asdasdasdasd', 75, '2020-12-06 01:48am', NULL),
(61, 'amin', 'asdasdeqwe', '3', 'asdasdsadasd', 75, '2020-12-06 01:52am', NULL),
(65, 'elecrtic fuse', '8472303117', '3', 'asdasda', 75, '2020-12-06 02:10am', NULL),
(68, 'motor fuse', '9841179899', '3', 'asdsadasd', 74, '2020-12-06 05:51am', NULL),
(69, 'asdasda', '8178347652', '3', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting i', 75, '2020-12-06 05:54am', NULL),
(70, 'elecrtic fuse', '5267679422', '3', 'demo', 75, '2020-12-10 02:14am', NULL);

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
(79, 'abc2a', 'asdasdas', 3, '2020-12-10 02:22am');

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
-- Table structure for table `sendfortest`
--

CREATE TABLE `sendfortest` (
  `sft_id` int(11) NOT NULL,
  `sendbyuser` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `Datetime` varchar(50) NOT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sendfortest`
--

INSERT INTO `sendfortest` (`sft_id`, `sendbyuser`, `productid`, `Datetime`, `status`) VALUES
(1, 3, 56, '2020-12-09 12:11am', 0),
(2, 3, 57, '2020-12-09 12:11am', 0),
(3, 3, 57, '2020-12-09 12:14am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `TestingId` int(11) NOT NULL,
  `TestingType` int(255) NOT NULL,
  `ProductId` int(255) NOT NULL,
  `TestingCode` int(10) DEFAULT NULL,
  `TestingUser` int(50) DEFAULT NULL,
  `TestingDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`TestingId`, `TestingType`, `ProductId`, `TestingCode`, `TestingUser`, `TestingDate`) VALUES
(3, 5, 56, 2147483647, 3, '2020-12-10 02:01am');

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
(4, 'level-1', 'this is low testing', 3, '2020-12-09 03:39am'),
(5, 'level-2', 'this is medium testing', 3, '2020-12-10 12:33am'),
(6, 'testing', 'asdasd', 3, '2020-12-10 02:00am');

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
-- Indexes for table `sendfortest`
--
ALTER TABLE `sendfortest`
  ADD PRIMARY KEY (`sft_id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`TestingId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sendfortest`
--
ALTER TABLE `sendfortest`
  MODIFY `sft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `TestingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testingtypes`
--
ALTER TABLE `testingtypes`
  MODIFY `TestingTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
