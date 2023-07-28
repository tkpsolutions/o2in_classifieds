-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 02:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classified`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `descriptionShort` longtext NOT NULL,
  `cityId` bigint(254) NOT NULL,
  `categoryId` bigint(254) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `mobile` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `descriptionShort`, `cityId`, `categoryId`, `createdDateTime`, `updatedDateTime`, `mobile`, `password`, `status`) VALUES
(1, 'KMS Hospital', '24x7 services', 2, 1, '2023-07-01 17:31:03', '2023-07-01 17:31:03', '1231231231', '123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_contact`
--

CREATE TABLE `business_contact` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `contactTypeId` varchar(254) NOT NULL,
  `contact` varchar(254) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_contact`
--

INSERT INTO `business_contact` (`id`, `businessId`, `contactTypeId`, `contact`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, '1', '568952223', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_detail`
--

CREATE TABLE `business_detail` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `descriptionLong` longtext NOT NULL,
  `logo` varchar(254) NOT NULL,
  `banner` varchar(254) NOT NULL,
  `addressLine1` varchar(254) NOT NULL,
  `addressLine2` varchar(254) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_detail`
--

INSERT INTO `business_detail` (`id`, `businessId`, `descriptionLong`, `logo`, `banner`, `addressLine1`, `addressLine2`, `pincode`, `createdDateTime`, `updateDateTime`, `status`) VALUES
(1, 1, 'hjvhgv', 'png', 'png', 'fdgf', 'gfx', 620001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_feedback`
--

CREATE TABLE `business_feedback` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `userId` bigint(254) NOT NULL,
  `starCount` bigint(254) NOT NULL,
  `message` longtext NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_image`
--

CREATE TABLE `business_image` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `caption` varchar(254) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_image`
--

INSERT INTO `business_image` (`id`, `businessId`, `image`, `caption`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, 'png', '7676', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `business_product`
--

CREATE TABLE `business_product` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `price` double NOT NULL,
  `discountPercentage` double NOT NULL,
  `taxPercentage` double NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_product`
--

INSERT INTO `business_product` (`id`, `businessId`, `name`, `price`, `discountPercentage`, `taxPercentage`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, 'mobile case', 100, 10, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_tag`
--

CREATE TABLE `business_tag` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `tagId` bigint(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_tag`
--

INSERT INTO `business_tag` (`id`, `businessId`, `tagId`, `status`) VALUES
(1, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_timing`
--

CREATE TABLE `business_timing` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `dayNumber` bigint(254) NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `isFullday` tinyint(1) NOT NULL,
  `isHoliday` tinyint(1) NOT NULL,
  `status` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_timing`
--

INSERT INTO `business_timing` (`id`, `businessId`, `dayNumber`, `fromTime`, `toTime`, `isFullday`, `isHoliday`, `status`) VALUES
(1, 1, 1, '05:30:00', '11:59:00', 0, 0, 'Active'),
(2, 1, 1, '16:30:00', '20:00:00', 0, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `isBooking` varchar(254) NOT NULL,
  `isGallery` varchar(254) NOT NULL,
  `isProduct` varchar(254) NOT NULL,
  `isRide` varchar(254) NOT NULL,
  `isFeedback` varchar(254) NOT NULL,
  `contactCount` bigint(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `isBooking`, `isGallery`, `isProduct`, `isRide`, `isFeedback`, `contactCount`, `status`) VALUES
(1, 'Hospital', 'png', '1', '0', '1', '0', '1', 10, 'Active'),
(2, 'Temple', 'png', '0', '1', '0', '0', '0', 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) NOT NULL,
  `stateId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `stateId`, `name`, `status`) VALUES
(1, 1, 'Madurai', 'active'),
(2, 1, 'Trichy', 'active'),
(3, 2, 'Eranakulam', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `value` longtext NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`, `status`) VALUES
(1, 'website_title', 'Real Win', 'active'),
(2, 'website_description', 'Real Win', 'active'),
(3, 'website_keyword', 'Real Win', 'active'),
(4, 'website_logo', 'png', 'active'),
(5, 'website_favicon', 'png', 'active'),
(6, 'website_image_allowed_extensions', 'png,jpg,jpeg,bmp', 'active'),
(7, 'msg_sms_sender_id', '', 'active'),
(8, 'msg_sms_username', '', 'active'),
(9, 'msg_sms_password', '', 'active'),
(10, 'msg_sms_route', '', 'active'),
(11, 'msg_mail_host', '', 'active'),
(12, 'msg_mail_port', '', 'active'),
(13, 'msg_mail_username', '', 'active'),
(14, 'msg_mail_password', '', 'active'),
(15, 'msg_mail_reply_to', '', 'active'),
(16, 'msg_mail_sent_from', '', 'active'),
(17, 'handlingPerCbm', '10', 'active'),
(18, 'pickingPerCbm', '20', 'active'),
(19, 'assemblyPerHourWeekDay', '30', 'active'),
(20, 'assemblyPerHourWeekEnd', '25', 'active'),
(21, 'disAssemblyPerHourWeekDay', '40', 'active'),
(22, 'disAssemblyPerHourWeekEnd', '25', 'active'),
(23, 'documentationChargePerBooking', '5', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE `contact_type` (
  `id` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`id`, `name`, `image`, `status`) VALUES
(1, 'Whatsapp', 'jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'India', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(254) NOT NULL,
  `eventCategoryId` bigint(254) NOT NULL,
  `cityId` bigint(254) NOT NULL,
  `eventDate` date NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(254) NOT NULL,
  `address` varchar(254) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventCategoryId`, `cityId`, `eventDate`, `title`, `description`, `image`, `address`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, 1, '2023-07-08', 'nmhgfds', 'ggggggggggggg', 'jpg', 'mhghghgh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `image`, `status`) VALUES
(1, 'm,hghf', 'jpg', 'Active'),
(2, 'gfhgd', 'jpg', 'Active'),
(3, 'mndjkbdsj', 'jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `status`) VALUES
(1, 'Male', 'Active'),
(2, 'Female', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(254) NOT NULL,
  `cityId` bigint(254) NOT NULL,
  `postCategoryId` bigint(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` longtext NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `cityId`, `postCategoryId`, `title`, `description`, `createdDateTime`, `updatedDateTime`, `image`, `status`) VALUES
(1, 2, 1, 'dfgdf', 'dgdf', '2023-07-05 14:12:03', '2023-07-05 14:12:03', 'jpg', 'active'),
(2, 3, 1, 'post title3', 'pppost desc3', '2023-07-05 14:13:18', '2023-07-05 14:13:18', 'png', 'active'),
(3, 2, 1, 'hjw', 'post', '2023-07-05 15:22:21', '2023-07-05 15:22:21', 'jpg', 'active'),
(4, 1, 1, 'hafkh', 'hwj', '2023-07-05 15:23:14', '2023-07-05 15:23:14', 'jpg', 'active'),
(6, 1, 1, 'hvhvhvhg', ' nvbvbg', '2023-07-05 16:38:27', '2023-07-05 16:38:27', '', 'active'),
(7, 1, 1, 'nmbjhbjh', 'hjhvjv', '2023-07-05 16:39:02', '2023-07-05 16:39:02', 'jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `image`, `status`) VALUES
(1, 'veg', 'jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) NOT NULL,
  `countryId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `countryId`, `name`, `status`) VALUES
(1, 1, 'Tamilnadu', 'active'),
(2, 1, 'Kerala', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` bigint(254) NOT NULL,
  `categoryId` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `categoryId`, `name`, `status`) VALUES
(1, 1, 'Veternary', 'Active'),
(2, 1, 'ENT', 'Active'),
(3, 2, 'Sivan kovil', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `genderId` bigint(254) NOT NULL,
  `mobile` varchar(254) NOT NULL,
  `whatsappNo` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `createDateTime` datetime NOT NULL,
  `address` longtext NOT NULL,
  `pincode` varchar(254) NOT NULL,
  `role` varchar(254) NOT NULL COMMENT 'Admin,Customer',
  `cityId` bigint(20) NOT NULL,
  `password` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `genderId`, `mobile`, `whatsappNo`, `email`, `createDateTime`, `address`, `pincode`, `role`, `cityId`, `password`, `status`) VALUES
(1, 'admin', 0, '', '', 'admin@gmail.com', '2023-06-01 17:10:45', '', '', 'admin', 1, '123', 'active'),
(2, 'Ramasamy', 0, '123123123', '', 'ram@gmail.com', '2023-06-01 17:10:45', '66A, Thambaram, Chennai.', '600098', 'customer', 2, '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `youtubeLink` varchar(253) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` varchar(450) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `youtubeLink`, `title`, `description`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 'fxffx', 'fxx', 'xvx', '2023-07-05 14:10:36', '2023-07-05 14:10:36', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_contact`
--
ALTER TABLE `business_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_detail`
--
ALTER TABLE `business_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_feedback`
--
ALTER TABLE `business_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_image`
--
ALTER TABLE `business_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_product`
--
ALTER TABLE `business_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_tag`
--
ALTER TABLE `business_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_timing`
--
ALTER TABLE `business_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title_UNIQUE` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_contact`
--
ALTER TABLE `business_contact`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_detail`
--
ALTER TABLE `business_detail`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_feedback`
--
ALTER TABLE `business_feedback`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_image`
--
ALTER TABLE `business_image`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_product`
--
ALTER TABLE `business_product`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_tag`
--
ALTER TABLE `business_tag`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_timing`
--
ALTER TABLE `business_timing`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
