-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2023 at 01:24 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkpdemo0_classi`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` bigint NOT NULL,
  `name` varchar(254) NOT NULL,
  `descriptionShort` longtext NOT NULL,
  `cityId` bigint NOT NULL,
  `categoryId` bigint NOT NULL,
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
(1, 'KMS Hospital', '24x7 services', 2, 1, '2023-07-01 17:31:03', '2023-07-01 17:31:03', '1231231231', '123', 'Active'),
(2, 'ABC hospital ', '24/7 emergency ', 2, 1, '2023-07-04 22:24:23', '2023-07-04 22:24:23', '123456789', '125', 'Active'),
(3, 'Shri Nakoda ', 'dress', 2, 4, '2023-07-05 12:06:51', '2023-07-05 13:31:43', '0431 45267002', '123', 'Active'),
(4, 'Saraths', 'kids dress and saree and bed cover,', 2, 4, '2023-07-05 12:29:47', '2023-07-05 13:26:43', '04312703003', '123', 'Deactive'),
(5, 'Pothys ', 'kids dress and saree', 2, 4, '2023-07-05 13:11:22', '2023-07-05 13:20:06', '0431 2703002', '123', 'Active'),
(6, 'Sarathas', 'kids dress and saree and bed cover,', 2, 4, '2023-07-05 13:23:44', '2023-07-05 13:23:44', '0431 2007 3004', '123', 'Active'),
(7, 'The Chennai Silks', 'kids dress and saree and bed cover,', 2, 4, '2023-07-05 14:09:13', '2023-07-06 12:07:47', '123', '123', 'Active'),
(8, 'Pathanjali Silks', 'kids dress and saree and bed cover,pattu sarees', 2, 4, '2023-07-05 14:16:50', '2023-07-05 14:16:50', '8976', '123', 'Active'),
(9, 'Shankar IAS academy', ' IAS Academy', 2, 5, '2023-07-05 16:07:33', '2023-07-05 16:07:41', '9876543210', '123', 'Active'),
(10, 'National College (Autonomous)', 'Postgraduate/Undergraduate ', 2, 6, '2023-07-05 16:20:24', '2023-07-05 17:11:41', '0431 248 2995', '123', 'Active'),
(11, 'S R V Matriculation Higher Secondary School', 'LKG to +2', 2, 6, '2023-07-05 17:15:26', '2023-07-05 17:15:26', '0431 267 0680', '123', 'Active'),
(12, 'T.I.M.E. Kids Preschool', 'Per school', 2, 6, '2023-07-05 17:29:44', '2023-07-05 17:29:44', ' 0431 241 1526', '123', 'Active'),
(13, 'BYJU\'S Tuition Centre ', ' Tuition Centre', 2, 6, '2023-07-05 17:41:40', '2023-07-05 17:41:40', '9123456780', '123', 'Active'),
(14, 'Hotel Kannappa', 'Biriyaniand chicken BBQ', 2, 7, '2023-07-06 11:18:20', '2023-07-06 11:18:49', '0431 276 5807', '123', 'Active'),
(15, 'Adyar Ananda Bhavan', 'Pure veg restaurant', 2, 7, '2023-07-06 12:02:05', '2023-07-06 12:02:05', '0431 402 1177', '123', 'Active'),
(16, 'Dindigul Thalapakatti Restaurent', 'Dindigul Spl Biriyani ', 2, 7, '2023-07-06 12:38:22', '2023-07-06 12:44:35', '088700 07380', '123', 'Active'),
(17, 'Shri Sangeethas Restaurant', 'Pure veg restaurant', 2, 7, '2023-07-06 14:45:23', '2023-07-06 14:45:23', '0431- 4200405', '123', 'Active'),
(18, 'SRI VARYS ASTROLOGY RESEARCH INSTITUTE ', 'ASTROLOGY RESEARCH INSTITUTE ', 2, 3, '2023-07-06 15:32:47', '2023-07-06 15:32:47', '092453 40338', '123', 'Active'),
(19, 'Vasantha Bhavan', 'Pure veg restaurant', 2, 7, '2023-07-08 13:28:57', '2023-07-08 13:28:57', '098402 54116', '123', 'Active'),
(20, 'Sri Agasthiyar Naadi Astrology Centre', 'Naadi Astrology Centre', 2, 8, '2023-07-08 13:56:36', '2023-07-08 13:56:36', '0431 277 1868', '123', 'Active'),
(21, 'VEDDAMEETHRA JYOTHIDA AARAICHI MAIYAM', 'Jyothida Maiyam', 2, 8, '2023-07-08 14:03:13', '2023-07-08 14:03:16', '9876543221', '123', 'Active'),
(22, 'Sri Agasthiya Bramma Sukshma Nadi Jyothishalayam in Trichy', 'Nadi Jyothishalayam', 2, 8, '2023-07-08 14:20:17', '2023-07-08 14:20:17', ' 096293 70045', '123', 'Active'),
(23, 'Naturals Salon & Spa ', 'Bridel Makeup ,Haircut& Spa', 2, 9, '2023-07-08 15:31:04', '2023-07-08 15:39:06', '090211 16015', '123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_contact`
--

CREATE TABLE `business_contact` (
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
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
(1, 2, '1', '123456789', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(5, 4, '1', '8098386945', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(6, 9, '1', '097896 64555', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(7, 10, '1', '0431 248 2995', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(8, 1, '1', '111', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(9, 12, '1', '0431 241 1526', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(10, 14, '1', '0431 276 5807', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(11, 15, '1', '0431 402 1177', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(12, 17, '1', '0431- 4200405', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(13, 19, '1', '098402 54116', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(14, 18, '1', '092453 40338', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(15, 20, '1', '0431 277 1868', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(16, 21, '1', '9876543221', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(17, 22, '1', ' 096293 70045', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_detail`
--

CREATE TABLE `business_detail` (
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
  `descriptionLong` longtext NOT NULL,
  `logo` varchar(254) NOT NULL,
  `banner` varchar(254) NOT NULL,
  `addressLine1` varchar(254) NOT NULL,
  `addressLine2` varchar(254) NOT NULL,
  `pincode` bigint NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_detail`
--

INSERT INTO `business_detail` (`id`, `businessId`, `descriptionLong`, `logo`, `banner`, `addressLine1`, `addressLine2`, `pincode`, `createdDateTime`, `updateDateTime`, `status`) VALUES
(1, 1, 'hjvhgv', 'jpg', 'jpg', 'fdgf', 'gfx', 620001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(2, 4, 'school uniforms, Sarees, bed cover ', 'jpg', 'jpg', 'No. 45, Nsb Road, Teppakulam, Tiruchirappalli, Tamil Nadu 620002', 'No. 45, Nsb Road, Teppakulam, Tiruchirappalli, Tamil Nadu 620002', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(3, 5, 'kids dress and saree', 'jpg', 'jpg', 'NBS Road,singarathopu,trichy', 'trichy', 620002, '2023-07-05 13:12:14', '2023-07-05 13:12:14', 'Active'),
(4, 6, 'kids dress, sarees, western wear', 'jpg', 'jpg', 'No. 45, Nsb Road, Teppakulam, Tiruchirappalli, Tamil Nadu 620002', 'No. 45, Nsb Road, Teppakulam, Tiruchirappalli, Tamil Nadu 620002', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(5, 3, 'metrial dress ,sarees ', 'jpg', 'jpg', '3 Star Plaza, 22/G3, Nandhi Koil Street, Thepakulam, Trichy, ', 'Thepakulam, Trichy, ', 620005, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(6, 7, 'silks sarees, pattu sarees, western wear', 'jpg', 'jpg', '10 -12, W Blvd Road, Tharanallur, Tiruchirappalli, Tamil Nadu 620002', 'Tiruchirappalli', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(7, 8, 'silk sarees, western wear', 'jpg', 'jpg', 'No-106, Bharathiar Salai, Melapudur, Cantonment, Turaiyur, Tamil Nadu 621001 · ', 'No-106, Bharathiar Salai, Melapudur, Cantonment, Turaiyur, Tamil Nadu 621001 · ', 620001, '2023-07-05 14:19:24', '2023-07-05 14:19:24', 'Active'),
(8, 9, 'IAS coaching', 'jpg', 'jpg', 'N.R.Towers No- A9 Salai Road Lic, Branch Building, Tiruchirapalli Rock Fort, ', 'Tiruchirappalli, Tamil Nadu', 620018, '2023-07-05 16:10:51', '2023-07-05 16:10:51', 'Active'),
(9, 10, 'Postgraduate/Undergraduate and art and science', 'jpg', 'jpg', 'Dindigul Road', ' Tiruchirappalli, Tamil Nadu ', 620001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(10, 11, 'LKG to +2', 'jpg', 'jpg', 'Samayapuram Old NH 45, Tiruchirappalli, Tamil Nadu', 'Tiruchirappalli, Tamil Nadu', 621112, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(11, 12, 'KidsPer school', 'jpg', 'jpg', ' 10/31, 2Nd Main Road, Major Saravanan Road, Raja Colony, ', 'Tiruchirappalli, Tamil Nadu ', 620001, '2023-07-05 17:31:05', '2023-07-05 17:31:05', 'Active'),
(12, 13, ' Tuition Centre', 'jpg', 'jpg', '1st Floor, Annamalai Tower, Above KFC, Annamalai Nagar, ', 'Tiruchirappalli, Tamil Nadu ', 620018, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(13, 14, 'Biriyaniand chicken BBQ', 'jpg', 'jpg', '73A, Salai Road, ', 'Trichy', 620018, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(14, 15, 'Pure veg restaurant', 'jpg', 'jpg', 'No.14, Twin Towers, Karur Bypass Road, Annamalai Nagar, ', ' Tiruchirappalli ', 620014, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(15, 16, 'Dindigul Spl Biriyani ', 'jpg', 'jpg', 'T.S 50/3, Karur Bye Pass Road, Melachinathamani, Near Chatram Bus Stand, Main Guard Gate,', ' Tiruchirappalli ', 6200014, '2023-07-06 13:14:04', '2023-07-06 13:14:04', 'Active'),
(16, 17, 'Pure veg restaurant', 'jpg', 'jpg', 'NO. 2, V.O.C, ROAD(NEAR CENTRAL BUS STAND) ', 'TRICHY', 620, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(17, 19, 'Pure veg restaurant', 'jpg', 'jpg', 'Central Bus Stand, Cantonment, ', 'Tiruchirappalli', 620001, '2023-07-08 13:31:58', '2023-07-08 13:31:58', 'Active'),
(18, 18, 'ASTROLOGY RESEARCH INSTITUTE ', 'jpg', 'jpg', '1 Puthur High Road, ', 'Tiruchirappalli,', 620017, '2023-07-08 13:40:29', '2023-07-08 13:40:29', 'Active'),
(19, 20, 'Naadi Astrology Centre', 'jpg', 'jpg', 'RM7G+CPC, Annamalaiyar Rd, Aruna Nagar, Puthur, Bharthi Nagar, ', 'Tiruchirappalli', 620017, '2023-07-08 13:58:15', '2023-07-08 13:58:15', 'Active'),
(20, 21, 'Jyothida Maiyam', 'jpg', 'jpg', 'Keela Street, Sivan Temple Nearer, Uyyakondan Thirumalai, ', 'Tiruchirappalli', 620102, '2023-07-08 14:04:53', '2023-07-08 14:04:53', 'Active'),
(21, 22, 'Nadi Jyothishalayam', 'jpg', 'jpg', 'NO:13A,1st Floor 3rd Cross Street Near Bharathi Park,(opp)Bishop Heber College, Vayalur Rd, Bharthi Nagar, ', 'Tiruchirappalli, ', 620017, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(22, 23, 'Hair cut , facial, hair smoothing ', 'jpg', 'jpg', 'Lakshmi Nagar second cross street ', 'Trichy ', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(23, 0, '', '', '', '', '', 0, '2023-07-08 16:00:02', '2023-07-08 16:00:02', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_feedback`
--

CREATE TABLE `business_feedback` (
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
  `userId` bigint NOT NULL,
  `starCount` bigint NOT NULL,
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
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
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
(1, 1, 'png', '7676', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(2, 4, 'jpg', 'pothys', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(3, 4, 'jpg', 'pothys', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(4, 3, 'jpg', 'shri nakoda', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(5, 6, 'jpg', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(6, 6, 'jpg', '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(7, 5, 'jpg', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(8, 5, 'jpg', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(9, 7, 'jpg', '125', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(10, 7, 'jpg', '1267', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(11, 8, 'jpg', '09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(12, 8, 'jpg', '098', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(13, 9, 'jpg', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(14, 9, 'jpg', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(15, 10, 'jpg', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(16, 10, 'jpg', 'po', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(17, 11, 'jpg', 'logo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(18, 11, 'jpg', 'school', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(19, 12, 'jpg', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(20, 12, 'jpg', '213', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(21, 13, 'jpg', '8900', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(22, 13, 'jpg', '890', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(23, 13, 'jpg', '8901', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(24, 14, 'jpg', 'hotal', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(25, 15, 'webp', 'food', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(26, 15, 'webp', 'menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(27, 17, 'jpg', 'menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(28, 17, 'jpg', 'banar', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(29, 19, 'jpg', 'menu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(30, 19, 'jpg', 'vb', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(31, 18, 'jpg', 'Astrologer ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(32, 20, 'jpg', 'v', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(33, 20, 'jpg', 'n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(34, 21, 'jpg', 'aa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(35, 21, 'jpg', 'ww', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(36, 22, 'jpg', '64b', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(37, 22, 'jpg', 'h', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `business_product`
--

CREATE TABLE `business_product` (
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
  `name` varchar(254) NOT NULL,
  `price` double NOT NULL,
  `discountPercentage` double NOT NULL,
  `taxPercentage` double NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_product`
--

INSERT INTO `business_product` (`id`, `businessId`, `name`, `price`, `discountPercentage`, `taxPercentage`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, 'mobile case', 100, 10, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(2, 6, 'Pattu Sarees.', 2000, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(3, 5, 'pattu sarees', 20500, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(4, 7, 'western wears', 1000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(5, 7, 'silk sarees', 1500, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(6, 8, 'western wear', 1000, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(7, 8, 'pattu sarees', 1500, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(8, 3, 'pattu sarees', 1500, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(9, 9, 'IAS COACHING', 20000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(10, 10, 'Postgraduate', 35000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(11, 10, 'Undergraduate ', 25000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(12, 14, 'Chicken biriyani', 250, 5, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(13, 14, 'Mutton biriyani', 350, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(14, 15, 'South Indian Thali ', 220, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(15, 15, 'North Indian Thali ', 250, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(16, 19, 'Veg meals', 130, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(17, 21, 'Jyothida', 200, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_tag`
--

CREATE TABLE `business_tag` (
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
  `tagId` bigint NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_tag`
--

INSERT INTO `business_tag` (`id`, `businessId`, `tagId`, `status`) VALUES
(1, 1, 1, 'Active'),
(7, 6, 0, 'Active'),
(9, 7, 9, 'Active'),
(10, 3, 9, 'Active'),
(11, 5, 9, 'Active'),
(12, 8, 10, 'Active'),
(13, 5, 11, 'Active'),
(14, 4, 12, 'Active'),
(15, 9, 4, 'Active'),
(16, 10, 5, 'Active'),
(17, 11, 17, 'Active'),
(18, 12, 18, 'Active'),
(19, 14, 7, 'Active'),
(20, 15, 19, 'Active'),
(21, 16, 7, 'Active'),
(22, 17, 19, 'Active'),
(23, 19, 19, 'Active'),
(24, 18, 3, 'Active'),
(25, 20, 3, 'Active'),
(26, 21, 3, 'Active'),
(27, 22, 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_timing`
--

CREATE TABLE `business_timing` (
  `id` bigint NOT NULL,
  `businessId` bigint NOT NULL,
  `dayNumber` bigint NOT NULL,
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
(10, 4, 1, '09:00:00', '09:00:00', 1, 0, 'Active'),
(11, 4, 2, '09:00:00', '10:30:00', 1, 0, 'Active'),
(12, 11, 5, '08:30:00', '05:00:00', 1, 1, 'Active'),
(13, 12, 5, '09:00:00', '20:00:00', 1, 1, 'Active'),
(14, 13, 7, '09:30:00', '07:30:00', 1, 1, 'Active'),
(15, 15, 7, '06:00:00', '10:00:00', 1, 1, 'Active'),
(16, 17, 7, '06:00:00', '11:00:00', 1, 0, 'Active'),
(17, 19, 7, '06:00:00', '10:00:00', 1, 0, 'Active'),
(18, 18, 6, '09:00:00', '08:00:00', 1, 1, 'Active'),
(19, 20, 6, '09:00:00', '09:00:00', 1, 1, 'Active'),
(20, 21, 7, '10:00:00', '08:00:00', 1, 0, 'Active'),
(21, 22, 7, '09:00:00', '09:00:00', 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `isBooking` varchar(254) NOT NULL,
  `isGallery` varchar(254) NOT NULL,
  `isProduct` varchar(254) NOT NULL,
  `isRide` varchar(254) NOT NULL,
  `isFeedback` varchar(254) NOT NULL,
  `contactCount` bigint NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `isBooking`, `isGallery`, `isProduct`, `isRide`, `isFeedback`, `contactCount`, `status`) VALUES
(1, 'Hospital', 'png', '1', '0', '1', '0', '1', 10, 'Active'),
(2, 'Temple', 'png', '0', '1', '0', '0', '0', 3, 'Active'),
(3, 'Tea shop', 'png', '0', '0', '3', '0', '1', 2, 'Active'),
(4, 'textiles', 'png', '1', '0', '0', '0', '0', 987654321, 'Active'),
(5, 'Academy', 'jpg', '0', '0', '0', '0', '0', 123, 'Active'),
(6, 'Education', 'png', '0', '0', '0', '0', '0', 8765900, 'Active'),
(7, 'Restaurants', 'jpg', '0', '0', '0', '0', '0', 612345789, 'Active'),
(8, 'ASTROLOGY', 'jpg', '0', '0', '0', '0', '0', 0, 'Active'),
(9, 'Beauty Parlour', 'jpg', '0', '0', '0', '0', '0', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint NOT NULL,
  `stateId` bigint NOT NULL,
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
  `id` bigint NOT NULL,
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
  `id` bigint NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`id`, `name`, `image`, `status`) VALUES
(1, 'Whatsapp', 'jpg', 'Active'),
(2, 'Email', 'png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint NOT NULL,
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
  `id` bigint NOT NULL,
  `eventCategoryId` bigint NOT NULL,
  `cityId` bigint NOT NULL,
  `eventDate` date NOT NULL,
  `title` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventCategoryId`, `cityId`, `eventDate`, `title`, `description`, `image`, `address`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(3, 3, 2, '2023-07-08', 'School porgram', 'School Program', 'jpg', 'Vasanth Illam, 13/4, Vinayagar St, 2nd Cross, IOB Nagar, Karumandapam, Tiruchirappalli, Tamil Nadu', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` bigint NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `image`, `status`) VALUES
(3, 'Wedding / Marriages / Family Functions', 'jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` bigint NOT NULL,
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
  `id` bigint NOT NULL,
  `cityId` bigint NOT NULL,
  `postCategoryId` bigint NOT NULL,
  `title` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `image` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `cityId`, `postCategoryId`, `title`, `description`, `createdDateTime`, `updatedDateTime`, `image`, `status`) VALUES
(1, 3, 2, 'Best Automobile', 'Best Automobile Automobile for cars and bikes', '2023-07-06 08:41:36', '2023-07-06 08:41:36', 'png', 'active'),
(2, 2, 2, 'shri sangeethas', 'Pure veg restaurant', '2023-07-06 14:56:19', '2023-07-06 14:56:19', 'jpg', 'active'),
(4, 2, 2, 'vettaiyaadu vilaiyaadu  ', 'The actor’s cop drama, “Vettaiyaadu Vilaiyaadu,” directed by renowned filmmaker Gautham Vasudev Menon, is set for a re-release. The film is scheduled to hit the big screens again on June 23, 2023, with ticket prices fixed at Rs. 99 in a few places. The bookings have also opened in several locations.\r\n\r\n\r\n\r\nபிரபல இயக்குனர் கௌதம் வாசுதேவ் மேனன் இயக்கத்தில் இவர் நடித்த \'வேட்டையாடு விளையாடு\' படம் ரீ-ரிலீசுக்கு தயாராக உள்ளது . இப்படம் மீண்டும் ஜூன் 23, 2023 அன்று பெரிய திரைக்கு வரவுள்ளது, ஒரு சில இடங்களில் டிக்கெட் விலை ரூ .99 ஆக நிர்ணயிக்கப்பட்டுள்ளது. இதற்கான முன்பதிவும் பல இடங்களில் தொடங்கியுள்ளது.', '2023-07-06 18:29:34', '2023-07-06 18:29:34', 'jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(254) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `image`, `status`) VALUES
(2, 'Top 5', 'jpeg', 'Active'),
(3, 'Pure veg restaurant', 'webp', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint NOT NULL,
  `countryId` bigint NOT NULL,
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
  `id` bigint NOT NULL,
  `categoryId` bigint NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `categoryId`, `name`, `status`) VALUES
(1, 1, 'Veternary', 'Active'),
(2, 1, 'ENT', 'Active'),
(3, 0, 'Astrologer ', 'Active'),
(4, 5, ' Coaching Center', 'Active'),
(5, 6, 'Undergraduate /Postgraduate', 'Active'),
(7, 7, 'Biriyani, parota and chicken ', 'Active'),
(8, 4, 'Sarathas', 'Active'),
(9, 4, 'westen wear', 'Active'),
(10, 4, 'pattu sarees', 'Active'),
(11, 4, 'silk sarees', 'Active'),
(12, 4, 'men wears', 'Active'),
(17, 6, 'School', 'Active'),
(18, 6, 'Per school', 'Active'),
(19, 7, 'Pure veg restaurant', 'Active'),
(20, 0, 'Astrologer ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint NOT NULL,
  `name` varchar(254) NOT NULL,
  `genderId` bigint NOT NULL,
  `mobile` varchar(254) NOT NULL,
  `whatsappNo` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `createDateTime` datetime NOT NULL,
  `address` longtext NOT NULL,
  `pincode` varchar(254) NOT NULL,
  `role` varchar(254) NOT NULL COMMENT 'Admin,Customer',
  `cityId` bigint NOT NULL,
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
  `id` int NOT NULL,
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
(2, 'https://www.youtube.com/watch?v=PKAaEVdYFfA', 'Tom & Jerry | The Tastiest Food in Tom & Jerry ', 'Tom & Jerry | The Tastiest Food in Tom & Jerry  - New', '2023-07-06 08:30:40', '2023-07-06 08:30:40', 'Active'),
(3, 'https://www.facebook.com/reel/992761234948068?s=chYV2B&fs=e&mibextid=6AJuK9', 'Non-veg idil shop', 'Non-veg idil ', '2023-07-06 15:29:20', '2023-07-06 15:29:20', 'active'),
(4, 'https://www.facebook.com/reel/1272667673663281?s=chYV2B&fs=e&mibextid=6AJuK9', 'Food', 'Tea shop', '2023-07-06 18:22:08', '2023-07-06 18:22:08', 'active');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `business_contact`
--
ALTER TABLE `business_contact`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `business_detail`
--
ALTER TABLE `business_detail`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `business_feedback`
--
ALTER TABLE `business_feedback`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_image`
--
ALTER TABLE `business_image`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `business_product`
--
ALTER TABLE `business_product`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `business_tag`
--
ALTER TABLE `business_tag`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `business_timing`
--
ALTER TABLE `business_timing`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
