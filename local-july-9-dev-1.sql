-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 07:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.16

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `descriptionShort`, `cityId`, `categoryId`, `createdDateTime`, `updatedDateTime`, `mobile`, `password`, `status`) VALUES
(1, 'KMS Hospital', '24x7 services', 2, 1, '2023-07-01 17:31:03', '2023-07-08 22:46:53', '1231231231', '123', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_contact`
--

INSERT INTO `business_contact` (`id`, `businessId`, `contactTypeId`, `contact`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, '1', '0000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(2, 1, '2', '656565', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(3, 1, '3', 'bbbbb', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_detail`
--

INSERT INTO `business_detail` (`id`, `businessId`, `descriptionLong`, `logo`, `banner`, `addressLine1`, `addressLine2`, `pincode`, `createdDateTime`, `updateDateTime`, `status`) VALUES
(1, 1, 'The hospital is the third in the government sector, after the Rajiv Gandhi Government General Hospital and the Government Royapettah Hospital, to have a full-fledged emergency department, which includes triage area, resuscitation bay and colour-coded zones, per the Tamil Nadu Accident and Emergency Care Initiative (TAEI) guidelines.', 'png', 'webp', 'No 149, Poonamallee High Road', 'Kilpauk, Chennai ', 600010, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_image`
--

INSERT INTO `business_image` (`id`, `businessId`, `image`, `caption`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(2, 1, 'jpeg', 'Enterance 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(3, 1, 'webp', 'Enterance - 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(4, 1, 'jpeg', 'Main Block', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_tag`
--

CREATE TABLE `business_tag` (
  `id` bigint(254) NOT NULL,
  `businessId` bigint(254) NOT NULL,
  `tagId` bigint(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_tag`
--

INSERT INTO `business_tag` (`id`, `businessId`, `tagId`, `status`) VALUES
(1, 1, 1, 'Active'),
(2, 1, 2, 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_timing`
--

INSERT INTO `business_timing` (`id`, `businessId`, `dayNumber`, `fromTime`, `toTime`, `isFullday`, `isHoliday`, `status`) VALUES
(1, 1, 1, '05:30:00', '11:59:00', 0, 0, 'Active'),
(2, 1, 1, '16:30:00', '20:00:00', 0, 0, 'Active'),
(3, 1, 2, '11:01:00', '11:01:00', 1, 0, 'Active'),
(4, 1, 3, '11:01:00', '11:01:00', 1, 0, 'Active'),
(5, 1, 4, '11:01:00', '11:01:00', 1, 0, 'Active'),
(6, 1, 5, '11:02:00', '11:02:00', 0, 1, 'Active'),
(7, 1, 6, '11:02:00', '11:02:00', 1, 0, 'Active'),
(8, 1, 7, '11:02:00', '23:02:00', 1, 0, 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `isBooking`, `isGallery`, `isProduct`, `isRide`, `isFeedback`, `contactCount`, `status`) VALUES
(1, 'Hospital', 'png', '1', '0', '1', '0', '1', 10, 'Active'),
(2, 'Temple', 'png', '0', '1', '0', '0', '0', 3, 'Active'),
(3, 'Ambulance', 'png', '0', '0', '0', '1', '1', 5, 'Active'),
(4, 'Automobile', 'png', '0', '1', '1', '0', '1', 5, 'Active'),
(5, 'College', 'png', '0', '5', '1', '0', '1', 10, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) NOT NULL,
  `stateId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`id`, `name`, `image`, `status`) VALUES
(1, 'Whatsapp', 'webp', 'Active'),
(2, 'Telegram', 'png', 'Active'),
(3, 'FB', 'webp', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventCategoryId`, `cityId`, `eventDate`, `title`, `description`, `image`, `address`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, 3, '2023-07-08', 'nmhgfds', 'ggggggggggggg', 'jpg', 'mhghghgh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `image`, `status`) VALUES
(1, 'Medical Camp', 'webp', 'Active'),
(2, 'Political Meets', 'png', 'Active'),
(3, 'Entertainment show', 'png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `cityId`, `postCategoryId`, `title`, `description`, `createdDateTime`, `updatedDateTime`, `image`, `status`) VALUES
(8, 2, 1, 'Benefits of raasam', 'asdfasdfasdf\r\nasdfasdf\r\nasdfasdf\r\nasdfasdf\r\nasdfasdf', '2023-07-06 10:54:08', '2023-07-06 10:54:08', 'jpg', 'active'),
(9, 1, 4, 'Movie Releases This Week', 'asdfasd fasd fasddf asdf\r\nasd fasdf asdf\r\nasdfa sdfsd\r\n', '2023-07-06 10:55:03', '2023-07-06 10:55:03', 'jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `image`, `status`) VALUES
(1, 'Health', 'png', 'Active'),
(4, 'Cinema', 'png', 'Active'),
(5, 'Hotel', 'jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) NOT NULL,
  `countryId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `categoryId`, `name`, `status`) VALUES
(1, 1, 'Veternary', 'Active'),
(2, 1, 'ENT', 'Active'),
(3, 2, 'Sivan kovil', 'Active'),
(4, 2, 'Vishnu kovil', 'Active'),
(5, 5, 'Arts and Science', 'Active'),
(6, 5, 'Engineering', 'Active'),
(7, 5, 'Nursing', 'Active'),
(8, 4, 'Car Spares', 'Active'),
(9, 4, 'Mutli Brand Car Service Center', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `youtubeLink` varchar(253) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(450) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `youtubeLink`, `title`, `description`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 'fxffx', 'fxx', 'xvxdd', '2023-07-05 14:10:36', '2023-07-05 14:10:36', 'Active');

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
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_product`
--
ALTER TABLE `business_product`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_tag`
--
ALTER TABLE `business_tag`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_timing`
--
ALTER TABLE `business_timing`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
