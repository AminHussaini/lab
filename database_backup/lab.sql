-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< Updated upstream
-- Generation Time: Dec 01, 2020 at 12:46 PM
=======
-- Generation Time: Dec 21, 2020 at 07:27 PM
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
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
(139, 'images.jpg', 84),
(140, 'download-4.jpg', 84),
(141, 'download-2.jpg', 84),
(142, 'download-1.jpg', 85),
(143, 'download-2.jpg', 86),
(144, 'download-1.jpg', 86),
(145, 'download-2.jpg', 87),
(148, 'download-3.jpg', 90),
(150, 'download-2.jpg', 92),
(151, '0a1f820e29719c7b67e9d5aa44241155.jpg', 93);

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
(84, 'elecrtic fuse', '4187357064', '3', 'Fuse', 74, '16-12-2020 12:14pm', '3', 1),
(85, 'fuse 2', '1235w1dsaq', '3', 'Bulb For Use', 75, '16-12-2020 12:15pm', '0', 0),
(86, 'elecrtic fuse', 'asdasd4356', '3', 'Testing', 75, '16-12-2020 12:18pm', '0', 0),
(87, 'elecrtic fuse', 'iopmasdasd', '3', 'asdasd', 75, '16-12-2020 02:43pm', '0', 0),
(90, 'elecrtic fuse', '5843582369', '3', 'asdasd', 75, '16-12-2020 03:14pm', '0', 0),
(92, 'elecrtic fuse', '1231473068', '3', 'testing', 75, '16-12-2020 03:16pm', '0', 0),
(93, 'test', '1234567891', '3', 'tet', 75, '16-12-2020 03:54pm', '0', 0);

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
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
INSERT INTO `register` (`Id`, `name`, `email`, `password`, `role`, `status`, `image`) VALUES
(3, 'Amin ', 'aminasghar125@gmail.com', 'demo', 'Admin', 'Accepted', '12986344_484850055042738_374184183_o.png'),
(4, 'Ali', 'aminasghar5@gmail.com', 'demo', 'SRS', 'Pending', '20151104_113813.jpg');
=======
INSERT INTO `register` (`Id`, `name`, `email`, `password`, `role`, `status`, `image`, `superAdmin`) VALUES
(3, 'Muhammad Amin Hussaini', 'aminasghar125@gmail.com', 'demo125', 'Admin', 'Accepted', '3pp.jpg', 1),
(4, 'Ali', 'aminasghar5@gmail.com', 'demo', 'SRS', 'Accepted', '20151104_113813.jpg', NULL),
(12, 'Aizaz', 'twinmark01@gmail.com', 'demo123', 'Admin', 'Accepted', '12download-3.jpg', NULL),
(13, 'Irfan', 'irfanhaiderkhan12@yahoo.com', 'demo123', 'CPRI', 'Accepted', '13pp+.jpg', NULL),
(17, 'Ehtizan', 'aminasghar52@gmail.com', 'duck', 'SRS', 'Accepted', '170a1f820e29719c7b67e9d5aa44241155.jpg', NULL),
(19, 'shariq', 'shariq.shaikh109@gmail.com', 'demo', 'SRS', 'Accepted', 'processed.jpeg', NULL),
(24, 'Amin', 'mahussaini9484@sbtjapan.com', 'demo', 'SRS', 'Accepted', 'default-login-1000x700.jpg', NULL),
(26, 'mirza', 'fawadkhi@gmail.com', '123', 'Admin', 'Accepted', '12986344_484850055042738_374184183_o.png', NULL),
(27, 'Amin', '126653@gmail.com', 'test', 'SRS', 'Pending', '12986344_484850055042738_374184183_o.png', 0);

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
(55, 3, 84, '16-12-2020 03:31pm'),
(56, 3, 93, '2020-12-16 03:58pm');

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
(38, 8, 84, '9170473391', 13, '17-12-2020 08:51pm', '17-12-2020 08:52pm');

-- --------------------------------------------------------

--
-- Table structure for table `testingremark`
--

CREATE TABLE `testingremark` (
  `RemarkId` int(11) NOT NULL,
  `Remark` text NOT NULL,
  `RemarkParent` int(11) NOT NULL,
  `RemarkUser` int(11) DEFAULT NULL,
  `RemarkDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testingremark`
--

INSERT INTO `testingremark` (`RemarkId`, `Remark`, `RemarkParent`, `RemarkUser`, `RemarkDate`) VALUES
(43, 'reject', 84, 13, '16-12-2020 03:30pm'),
(44, 'approved', 84, 13, '17-12-2020 08:52pm');

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
(9, 'level-3', 'asd', 3, '2020-12-11 06:42pm'),
(10, 'level-2', 'asdasd', 13, '11-12-2020 06:12pm');

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
>>>>>>> Stashed changes

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< Updated upstream
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
-- AUTO_INCREMENT for table `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sendfortest`
--
ALTER TABLE `sendfortest`
  MODIFY `sft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `TestingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `testingremark`
--
ALTER TABLE `testingremark`
  MODIFY `RemarkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
>>>>>>> Stashed changes
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
