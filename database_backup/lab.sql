-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 06:02 PM
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
(96, '—Pngtree—muscle santa cool body_5590575.png', 60),
(97, '—Pngtree—instagram icon logo_3560507.png', 60),
(98, '0a1f820e29719c7b67e9d5aa44241155.jpg', 60),
(138, 'images.jpg', 83),
(139, 'download-4.jpg', 83),
(140, 'download-3.jpg', 83),
(141, 'download-2.jpg', 83),
(142, 'download-1.jpg', 83),
(143, 'images.jpg', 84),
(144, 'download-4.jpg', 84),
(145, 'download-3.jpg', 84),
(146, 'download-2.jpg', 84),
(147, 'download-1.jpg', 84),
(148, 'images.jpg', 85),
(149, 'download-4.jpg', 85),
(150, 'download-3.jpg', 85),
(151, 'download-2.jpg', 85),
(152, 'download-1.jpg', 85);

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
  `Status` varchar(50) DEFAULT NULL,
  `ReBuild` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `ProductCode`, `ProductaddUserName`, `ProductDetail`, `ProductIdType`, `ProductDate`, `Status`, `ReBuild`) VALUES
(60, 'elecrtic fuse', '8598705630', '3', 'asdasdasdasd', 75, '2020-12-06 01:48am', '2', 1),
(83, 'elecrtic fuse', '7569386465', '12', 'testing', 74, '01-01-2021 01:17pm', '0', 0),
(84, 'bulb', '5850888844', '3', 'testing', 75, '01-01-2021 03:14pm', '0', 0),
(85, 'elecrtic fuse', '9011523521', '20', 'testing', 80, '01-01-2021 04:05pm', '0', 0);

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
(79, 'abc2a', 'asdasdas', 3, '2020-12-10 02:22am'),
(80, 'car fuse', 'testing', 20, '01-01-2021 04:04pm');

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
  `image` varchar(250) NOT NULL,
  `superAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `name`, `email`, `password`, `role`, `status`, `image`, `superAdmin`) VALUES
(3, 'Muhammad Amin Hussaini', 'aminasghar125@gmail.com', 'demo125', 'Admin', 'Accepted', '3pp.jpg', 1),
(12, 'Aizaz', 'twinmark01@gmail.com', 'demo123', 'Admin', 'Accepted', '12processed.jpeg', NULL),
(13, 'Irfan', 'irfanhaiderkhan12@yahoo.com', 'demo123', 'CPRI', 'Accepted', '13pp+.jpg', NULL),
(17, 'Ehtizan', 'aminasghar52@gmail.com', 'duck', 'SRS', 'Accepted', '170a1f820e29719c7b67e9d5aa44241155.jpg', NULL),
(19, 'shariq', 'shariq.shaikh109@gmail.com', 'demo', 'SRS', 'Accepted', 'processed.jpeg', NULL),
(20, 'Amin', 'aminasghar5@gmail.com', 'demo12', 'Admin', 'Accepted', 'pp.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sendfortest`
--

CREATE TABLE `sendfortest` (
  `sft_id` int(11) NOT NULL,
  `sendbyuser` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `Datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sendfortest`
--

INSERT INTO `sendfortest` (`sft_id`, `sendbyuser`, `productid`, `Datetime`) VALUES
(51, 3, 60, '01-01-2021 03:07pm'),
(52, 20, 85, '2021-01-01 04:06pm');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `TestingId` int(11) NOT NULL,
  `TestingType` int(255) NOT NULL,
  `ProductId` int(255) NOT NULL,
  `TestingCode` varchar(10) NOT NULL,
  `TestingUser` int(50) DEFAULT NULL,
  `TestingDate` varchar(50) DEFAULT NULL,
  `EndDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`TestingId`, `TestingType`, `ProductId`, `TestingCode`, `TestingUser`, `TestingDate`, `EndDate`) VALUES
(39, 9, 60, '8779483095', 13, '01-01-2021 03:09pm', '01-01-2021 03:09pm');

-- --------------------------------------------------------

--
-- Table structure for table `testingremark`
--

CREATE TABLE `testingremark` (
  `RemarkId` int(11) NOT NULL,
  `Remark` text NOT NULL,
  `RemarkParent` int(11) NOT NULL,
  `RemarkUser` int(11) DEFAULT NULL,
  `RemarkDate` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testingremark`
--

INSERT INTO `testingremark` (`RemarkId`, `Remark`, `RemarkParent`, `RemarkUser`, `RemarkDate`, `Status`) VALUES
(44, 'need some improvement', 60, 13, '01-01-2021 03:07pm', 0),
(45, 'approved', 60, 13, '01-01-2021 03:09pm', 1);

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
(8, 'level-1', 'this is low testing', 3, '2020-12-11 04:52pm'),
(9, 'level-2', 'this is medium testing', 3, '2020-12-11 06:42pm'),
(10, 'level-3', 'this is hard testing', 13, '11-12-2020 06:12pm');

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
-- Indexes for table `testingremark`
--
ALTER TABLE `testingremark`
  ADD PRIMARY KEY (`RemarkId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sendfortest`
--
ALTER TABLE `sendfortest`
  MODIFY `sft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `TestingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `testingremark`
--
ALTER TABLE `testingremark`
  MODIFY `RemarkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `testingtypes`
--
ALTER TABLE `testingtypes`
  MODIFY `TestingTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
