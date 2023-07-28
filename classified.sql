-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 08:48 PM
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
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `descriptionShort` longtext NOT NULL,
  `cityId` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `mobile` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `userId` bigint(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `descriptionShort`, `cityId`, `categoryId`, `createdDateTime`, `updatedDateTime`, `mobile`, `password`, `status`, `userId`) VALUES
(1, 'KIMS Hospital and Pharmacy', '24x7 services Available', 1, 1, '2023-07-01 17:31:03', '2023-07-27 01:49:19', '78967', '123', '', 1),
(2, 'ABC hospital ', '24/7 emergency ', 2, 1, '2023-07-04 22:24:23', '2023-07-20 06:07:22', '123456789', '125', 'Deactive', 1),
(3, 'Shri Nakoda ', 'dress', 2, 4, '2023-07-05 12:06:51', '2023-07-18 12:33:54', '0431 45267002', '123', 'Active', 1),
(4, 'Pantaloons', ' menswear, womenswear, happy kids wear and elegant accents for your home too', 2, 4, '2023-07-05 12:29:47', '2023-07-15 06:55:26', '0431 276 1770', '123', 'Active', 1),
(5, 'Pothys ', 'kids dress and saree', 2, 4, '2023-07-05 13:11:22', '2023-07-05 13:20:06', '0431 2703002', '123', 'Active', 1),
(6, 'Sarathas', 'kids dress and saree and bed cover,', 2, 4, '2023-07-05 13:23:44', '2023-07-05 13:23:44', '0431 2007 3004', '123', 'Active', 1),
(7, 'The Chennai Silks', 'kids dress and saree and bed cover,', 2, 4, '2023-07-05 14:09:13', '2023-07-06 12:07:47', '123', '123', 'Active', 1),
(8, 'Pathanjali Silks', 'kids dress and saree and bed cover,pattu sarees', 2, 4, '2023-07-05 14:16:50', '2023-07-18 13:39:31', '9994099639', '123', 'Active', 1),
(9, 'Shankar IAS academy', ' IAS Academy', 2, 5, '2023-07-05 16:07:33', '2023-07-05 16:07:41', '9876543210', '123', 'Active', 1),
(10, 'National College (Autonomous)', 'Postgraduate/Undergraduate ', 2, 6, '2023-07-05 16:20:24', '2023-07-05 17:11:41', '0431 248 2995', '123', 'Active', 1),
(11, 'S R V Matriculation Higher Secondary School', 'LKG to +2', 2, 6, '2023-07-05 17:15:26', '2023-07-05 17:15:26', '0431 267 0680', '123', 'Active', 1),
(12, 'T.I.M.E. Kids Preschool', 'Per school', 2, 6, '2023-07-05 17:29:44', '2023-07-05 17:29:44', ' 0431 241 1526', '123', 'Active', 1),
(13, 'BYJU\'S Tuition Centre ', ' Tuition Centre', 2, 6, '2023-07-05 17:41:40', '2023-07-05 17:41:40', '9123456780', '123', 'Active', 1),
(14, 'Hotel Kannappa', 'Biriyaniand chicken BBQ', 2, 7, '2023-07-06 11:18:20', '2023-07-06 11:18:49', '0431 276 5807', '123', 'Active', 1),
(15, 'Adyar Ananda Bhavan', 'Pure veg restaurant', 2, 7, '2023-07-06 12:02:05', '2023-07-06 12:02:05', '0431 402 1177', '123', 'Active', 1),
(16, 'Dindigul Thalapakatti Restaurent', 'Dindigul Spl Biriyani ', 2, 7, '2023-07-06 12:38:22', '2023-07-06 12:44:35', '088700 07380', '123', 'Active', 1),
(17, 'Shri Sangeethas Restaurant', 'Pure veg restaurant', 2, 7, '2023-07-06 14:45:23', '2023-07-06 14:45:23', '0431- 4200405', '123', 'Active', 1),
(18, 'Sri Varys  Astrology Research institute', ' Astrology Research institute', 2, 8, '2023-07-06 15:32:47', '2023-07-18 12:59:11', '092453 40338', '123', 'Active', 1),
(19, 'Vasantha Bhavan', 'Pure veg restaurant', 2, 7, '2023-07-08 13:28:57', '2023-07-08 13:28:57', '098402 54116', '123', 'Active', 1),
(20, 'Sri Agasthiyar Naadi Astrology Centre', 'Naadi Astrology Centre', 2, 8, '2023-07-08 13:56:36', '2023-07-08 13:56:36', '0431 277 1868', '123', 'Active', 1),
(21, 'Veddameethra Jyothida Aaraichi maiyam ', 'Jyothida Maiyam', 2, 8, '2023-07-08 14:03:13', '2023-07-15 07:26:24', '9876543221', '123', 'Active', 1),
(22, 'Sri Agasthiya Bramma Sukshma Nadi Jyothishalayam in Trichy', 'Nadi Jyothishalayam', 2, 8, '2023-07-08 14:20:17', '2023-07-20 10:49:19', ' 96293 70045', '123', 'Active', 1),
(23, 'Naturals Salon & Spa ', 'Bridel Makeup ,Haircut& Spa', 2, 9, '2023-07-08 15:31:04', '2023-07-20 10:51:39', '90211 16015', '123', 'Active', 1),
(24, 'Child Jesus Collage of Nursing', '24x7 services', 2, 6, '2023-07-10 11:15:43', '2023-07-10 11:32:45', '7890567840', '123', 'Active', 1),
(25, 'Apollo Hospital', 'cttf6jiukh86', 2, 1, '2023-07-11 17:12:49', '2023-07-11 17:23:20', '9894698786', '123', 'Active', 1),
(26, 'Theco Silks', 'kids dress and saree', 2, 4, '2023-07-15 07:34:21', '2023-07-20 10:46:39', '98946 27873', 'portal@2023', 'Active', 1),
(27, 'Prabhu Diabetes Multi Speciality Centre', 'Prabhu Diabetes Multi Speciality Centre', 2, 1, '2023-07-15 08:41:22', '2023-07-20 10:44:52', '7947264401', 'portal@2023', 'Active', 1),
(28, 'Apollo Speciality Hospitals', 'Apollo Speciality Hospitals', 2, 1, '2023-07-15 09:32:38', '2023-07-15 09:32:38', '0431 660 7777', 'portal@2023', 'Active', 1),
(29, 'Atlas Hospitals', 'Atlas Hospitals', 2, 1, '2023-07-15 09:47:44', '2023-07-20 10:43:29', '7942771276', 'portal@2023', 'Active', 1),
(30, 'Athma Hospitals and Research', 'Athma Hospitals and Research', 2, 1, '2023-07-15 09:53:12', '2023-07-15 09:53:12', '0431 255 5666', 'portal@2023', 'Active', 1),
(31, 'Neuro One Hospital', 'Neuro One Hospital', 2, 1, '2023-07-15 10:15:16', '2023-07-15 10:15:16', '0431 222 1222', 'portal@2023', 'Active', 1),
(32, 'Rock fort Ganapathi Temple ', 'Tiruchirappalli Rockfort, locally known as Malaikottai, is a historic fortification and temple complex built on an ancient rock. It is located in the city of Tiruchirappalli, on the banks of river Kaveri, Tamil Nadu, India. It is constructed on an 83 metres (272 ft) high rock.There are two Hindu temples inside, the Ucchi Pillayar Temple, Rockfort and the Thayumanaswami Temple, Rockfort. Rockfort is the most prominent landmark of the city', 2, 2, '2023-07-15 11:52:15', '2023-07-15 11:52:15', '0431-2704621', 'portal@2023', 'Active', 1),
(33, 'Samayapuram Mariamman Temple', 'Samayapuram Mariamman Temple', 2, 2, '2023-07-15 12:07:24', '2023-07-15 12:07:24', '0431 267 0460', 'portal@2023', 'Active', 1),
(34, 'Tiruvanaikovil Arulmigu Jambukeswarar Akilandeswari Temple', 'Tiruvanaikovil Arulmigu Jambukeswarar Akilandeswari Temple', 2, 2, '2023-07-15 12:18:24', '2023-07-20 10:29:49', '0431-2713466', 'portal@2023', 'Active', 1),
(35, 'Srirangam', 'Srirangam', 2, 2, '2023-07-17 06:17:57', '2023-07-17 06:17:57', '+91 431 2432246', 'portal@2023', 'Active', 1),
(36, 'Silverline Speciality Hospital', 'Silverline Speciality Hospital', 2, 1, '2023-07-17 07:38:35', '2023-07-17 07:38:35', '096773 36097', 'portal@2023', 'Active', 1),
(37, 'Arc Fertility Hospitals Trichy', 'Arc Fertility Hospitals Trichy', 2, 1, '2023-07-17 08:09:39', '2023-07-17 08:09:39', '078119 99999', 'portal@2023', 'Active', 1),
(38, 'SMS Hospital', 'SMS Hospital', 2, 1, '2023-07-17 09:23:38', '2023-07-17 09:23:38', '0431 276 0480', 'portal@2023', 'Active', 1),
(39, 'Nalam Hospital', 'Nalam Hospital', 2, 1, '2023-07-17 09:54:12', '2023-07-17 09:54:12', '0431 233 2695', 'portal@2023', 'Active', 1),
(40, 'ABC Hospital', 'ABC Hospital', 2, 1, '2023-07-17 10:12:34', '2023-07-17 10:12:34', '0431 407 7111', 'portal@2023', 'Active', 1),
(41, 'Sundaram Hospital', 'Sundaram Hospital', 2, 1, '2023-07-17 11:04:05', '2023-07-17 11:04:05', '0431 402 4444', 'portal@2023', 'Active', 1),
(42, 'Lalitha Nursing Home', 'Lalitha Nursing Home', 2, 1, '2023-07-18 05:59:51', '2023-07-18 05:59:51', '0431 274 0788', 'portal@2023', 'Active', 1),
(43, 'GVN Hospital', 'GVN Hospital', 2, 1, '2023-07-18 06:12:57', '2023-07-18 06:12:57', '0431 270 0712', 'portal@2023', 'Active', 1),
(44, 'GVN Riverside Hospital', 'GVN Riverside Hospital', 2, 1, '2023-07-18 06:42:54', '2023-07-18 06:42:54', '0431 270 5979', 'portal@2023', 'Active', 1),
(45, 'Frontline Hospital', 'Frontline Hospital', 2, 1, '2023-07-18 06:59:18', '2023-07-18 06:59:18', '0431 271 6666', 'portal@2023', 'Active', 1),
(46, 'A G Eye Care Hospital', 'A G Eye Care Hospital', 2, 1, '2023-07-18 07:14:18', '2023-07-18 07:14:18', '0431 279 2901', 'portal@2023', 'Active', 1),
(47, 'Janet Nursing Home', 'Janet Nursing Home', 2, 1, '2023-07-18 07:21:06', '2023-07-18 07:21:16', ' 0431 279 2543', 'portal@2023', 'Active', 1),
(48, 'Gastro Care Hospital', 'Gastro Care Hospital', 2, 1, '2023-07-18 07:29:05', '2023-07-18 07:29:05', '0431 404 5222', 'portal@2023', 'Active', 1),
(49, 'Deepan Hospital', 'Deepan Hospital', 2, 1, '2023-07-18 07:36:23', '2023-07-18 07:36:23', ' 0431 279 2449', 'portal@2023', 'Active', 1),
(50, 'Csi Mission General Hospital', 'Csi Mission General Hospital', 2, 1, '2023-07-18 07:43:15', '2023-07-18 07:43:15', ' 0431 276 0672', 'portal@2023', 'Active', 1),
(51, 'Shyamala Nursing Home', 'Shyamala Nursing Home', 2, 1, '2023-07-18 07:50:48', '2023-07-20 10:20:16', ' 98424 12845', 'portal@2023', 'Active', 1),
(52, 'Our Lady of Lourdes Church', 'Our Lady of Lourdes Church', 2, 2, '2023-07-18 10:20:05', '2023-07-18 10:20:05', ' 0431 270 0320', 'portal@2023', 'Active', 1),
(53, 'CSI St John\'s Cathedral', 'CSI St John\'s Cathedral', 2, 2, '2023-07-18 10:34:58', '2023-07-18 10:34:58', ' 0431 246 2984', 'portal@2023', 'Active', 1),
(54, 'Trichy City AG Church', 'Trichy City AG Church', 2, 2, '2023-07-18 10:45:07', '2023-07-18 10:45:07', ' 0431 248 1014', 'portal@2023', 'Active', 1),
(55, 'St. Joseph\'s Church, Ponmalai', 'St. Joseph\'s Church, Ponmalai', 2, 2, '2023-07-18 10:53:39', '2023-07-18 10:53:39', '0431- 2491148', 'portal@2023', 'Active', 1),
(56, 'NATHARSHA PALLIVASAL', 'Natharsha Pallivasal', 2, 2, '2023-07-18 11:12:19', '2023-07-20 09:29:15', '00000', 'portal@2023', 'Active', 1),
(57, 'Junction Jamia Masjid', 'Junction Jamia Masjid', 2, 2, '2023-07-18 11:20:43', '2023-07-20 10:22:09', ' 99944 47133', 'portal@2023', 'Active', 1),
(58, 'Masjid Ahle Hadhees', 'Masjid Ahle Hadhees', 2, 2, '2023-07-18 11:27:57', '2023-07-18 11:27:57', ' 094435 30039', 'portal@2023', 'Active', 1),
(59, 'Kallanai Dam', 'Ancient Dam built by Karikala of Chola Dynasty', 2, 12, '2023-07-19 06:09:31', '2023-07-20 09:27:54', '0000', '$unday2027', 'Active', 1),
(60, ' Butterfly  Park', 'Large park featuring a glass butterfly house, landscaped gardens, a fountain & an eatery.', 2, 12, '2023-07-19 06:46:52', '2023-07-19 06:46:52', ' 0431 290 4921', '$unday2027', 'Active', 1),
(61, 'Tiruchirappalli Rail Museum and Heritage Center', 'The Railway Heritage Centre is a railway museum–cum–heritage Centre for rail exhibits at Tiruchirappalli', 2, 12, '2023-07-19 07:05:45', '2023-07-19 07:05:45', '097150 22675', '$unday2027', 'Active', 1),
(62, 'Marina Beach', 'This expansive beach is Chennai\'s most famous tourist attraction, though the undercurrent is too strong for all but the strongest swimmers.', 5, 12, '2023-07-19 07:20:37', '2023-07-20 09:21:01', '000', '$unday2027', 'Active', 1),
(63, 'Arignar Anna Zoological Park', 'The Park was the first public zoo in India. Vandalur Zoo is originally created in 1855 near Park Town, Chennai City', 5, 12, '2023-07-19 09:10:05', '2023-07-20 06:21:47', ' 00', '$unday2027', 'Active', 1),
(64, 'Government Museum Chennai', 'This place is known for preserving some of the best ancient', 5, 12, '2023-07-19 10:24:38', '2023-07-19 10:24:46', '044 2819 3778', '$unday2027', 'Active', 1),
(65, 'VOC park and zoo', 'The park and zoo is a preferred picnic spot for locals who get their kids to have a wonderful time .', 6, 12, '2023-07-19 10:45:03', '2023-07-20 06:10:27', '  093530 04005', '$unday2027', 'Active', 1),
(66, 'Monkey waterfalls', 'It is a famous tourist attraction with a water falls within reach from road and is a safe place except in monsoon time', 6, 12, '2023-07-19 10:58:48', '2023-07-20 06:05:43', 'oo', '$unday2027', 'Active', 1),
(67, 'Paravasam Ulagam', 'Water Theme Park', 23, 12, '2023-07-19 11:45:03', '2023-07-19 11:45:34', '082200 10017', '$unday2027', 'Active', 1),
(68, 'Mettur Dam', 'Dam', 23, 12, '2023-07-19 11:55:53', '2023-07-19 11:55:53', '00', '$unday2027', 'Active', 1),
(69, 'Universal Pastry Shop', 'Cakes Are Muffins That Believed in Miracles...', 2, 13, '2023-07-20 06:42:40', '2023-07-20 06:42:40', '9384131169', 'Sunday2027', 'Active', 1),
(70, 'The King Phoenix IT Solutions and IT Training', 'IT Solutions and IT Training', 2, 6, '2023-07-26 22:03:34', '2023-07-26 22:03:34', '01231231231', '123123', 'Active', 17);

-- --------------------------------------------------------

--
-- Table structure for table `business_contact`
--

CREATE TABLE `business_contact` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
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
(9, 12, '1', '0431 241 1526', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(10, 14, '1', '0431 276 5807', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(11, 15, '1', '0431 402 1177', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(12, 17, '1', '0431- 4200405', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(13, 19, '1', '098402 54116', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(14, 18, '1', '092453 40338', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(15, 20, '1', '0431 277 1868', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(16, 21, '1', '9876543221', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(17, 22, '1', ' 096293 70045', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active'),
(18, 24, '1', '0431 23456', '2023-07-10 11:27:20', '2023-07-10 11:27:20', 'Active'),
(19, 1, '2', 'aa@mail.com', '2023-07-10 11:57:52', '2023-07-10 11:57:52', 'active'),
(20, 25, '1', '9087925025', '2023-07-11 17:21:21', '2023-07-11 17:21:21', 'Active'),
(21, 25, '1', '1234567891', '2023-07-11 17:21:39', '2023-07-11 17:21:39', 'Active'),
(22, 25, '2', 'apollo', '2023-07-11 17:22:24', '2023-07-11 17:22:24', 'Active'),
(24, 4, '3', '0431 276 1770', '2023-07-15 07:07:19', '2023-07-15 07:07:19', 'Active'),
(26, 28, '3', '0431 660 7777', '2023-07-15 09:39:46', '2023-07-15 09:39:46', 'Active'),
(28, 30, '3', '0431 255 5666', '2023-07-15 10:05:03', '2023-07-15 10:05:03', 'Active'),
(29, 31, '3', '0431 222 1222', '2023-07-15 10:18:10', '2023-07-15 10:18:10', 'Active'),
(30, 32, '3', '0431-2704621', '2023-07-15 12:02:00', '2023-07-15 12:02:00', 'Active'),
(31, 33, '3', '0431 267 0460', '2023-07-15 12:12:19', '2023-07-15 12:12:19', 'Active'),
(34, 35, '3', ' +91 431 2432246', '2023-07-17 06:22:05', '2023-07-17 06:22:05', 'Active'),
(35, 36, '3', '096773 36097', '2023-07-17 07:46:18', '2023-07-17 07:46:18', 'Active'),
(36, 37, '3', '078119 99999', '2023-07-17 08:22:58', '2023-07-17 08:22:58', 'Active'),
(37, 38, '3', '0431 276 0480', '2023-07-17 09:47:32', '2023-07-17 09:47:32', 'Active'),
(38, 39, '3', '0431 233 2695', '2023-07-17 10:08:56', '2023-07-17 10:08:56', 'Active'),
(39, 40, '3', '0431 407 7111', '2023-07-17 10:28:49', '2023-07-17 10:28:49', 'Active'),
(40, 41, '3', '0431 402 4444', '2023-07-18 05:55:23', '2023-07-18 05:55:23', 'Active'),
(41, 42, '3', '0431 274 0788', '2023-07-18 06:05:35', '2023-07-18 06:05:35', 'Active'),
(44, 46, '3', '0431 279 2901', '2023-07-18 07:17:43', '2023-07-18 07:17:43', 'Active'),
(46, 49, '3', '620017', '2023-07-18 07:40:05', '2023-07-18 07:40:05', 'Active'),
(49, 53, '3', '0431 246 2984', '2023-07-18 10:41:54', '2023-07-18 10:41:54', 'Active'),
(50, 54, '3', ' 0431 248 1014', '2023-07-18 10:50:00', '2023-07-18 10:50:00', 'Active'),
(53, 58, '3', ' 094435 30039', '2023-07-18 11:31:27', '2023-07-18 11:31:27', 'Active'),
(54, 8, '3', '9994099639', '2023-07-18 13:39:54', '2023-07-18 13:39:54', 'Active'),
(65, 65, '3', '00', '2023-07-20 06:00:51', '2023-07-20 06:00:51', 'Active'),
(66, 61, '3', '00', '2023-07-20 06:05:58', '2023-07-20 06:05:58', 'Active'),
(68, 66, '3', '00', '2023-07-20 06:06:53', '2023-07-20 06:06:53', 'Active'),
(69, 65, '3', '093530 04005', '2023-07-20 06:10:52', '2023-07-20 06:10:52', 'Active'),
(70, 69, '3', '9384131169', '2023-07-20 06:50:57', '2023-07-20 06:50:57', 'Active'),
(71, 62, '3', '000', '2023-07-20 09:21:19', '2023-07-20 09:21:19', 'Active'),
(72, 59, '3', '000', '2023-07-20 09:25:57', '2023-07-20 09:25:57', 'Active'),
(73, 51, '3', '98424 12845', '2023-07-20 10:20:54', '2023-07-20 10:20:54', 'Active'),
(74, 34, '3', '0431-2713466', '2023-07-20 10:30:32', '2023-07-20 10:30:32', 'Active'),
(75, 29, '3', '7942771276', '2023-07-20 10:44:16', '2023-07-20 10:44:16', 'Active'),
(76, 27, '3', '7947264401', '2023-07-20 10:45:16', '2023-07-20 10:45:16', 'Active'),
(77, 26, '3', '98946 27873', '2023-07-20 10:48:36', '2023-07-20 10:48:36', 'Active'),
(78, 23, '3', '90211 16015', '2023-07-20 10:52:02', '2023-07-20 10:52:02', 'Active'),
(79, 70, '1', '9790256734', '2023-07-26 22:23:18', '2023-07-26 22:23:18', 'Active'),
(80, 70, '2', 'info@thekingphoenix.com', '2023-07-26 22:23:29', '2023-07-26 22:23:29', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_detail`
--

CREATE TABLE `business_detail` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
  `descriptionLong` longtext NOT NULL,
  `logo` varchar(254) NOT NULL,
  `banner` varchar(254) NOT NULL,
  `addressLine1` varchar(254) NOT NULL,
  `addressLine2` varchar(254) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `lng` varchar(254) NOT NULL,
  `lat` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_detail`
--

INSERT INTO `business_detail` (`id`, `businessId`, `descriptionLong`, `logo`, `banner`, `addressLine1`, `addressLine2`, `pincode`, `createdDateTime`, `updateDateTime`, `status`, `lng`, `lat`) VALUES
(1, 1, 'Good', 'webp', 'jpg', 'KK Nagar', 'Near Axis Bank', 620001, '0000-00-00 00:00:00', '2023-07-27 01:49:19', '', '78.1177733706803', '9.915676587071728'),
(2, 4, ' menswear, womenswear, happy kids wear and elegant accents for your home too', 'jpg', 'jpeg', 'No 12, Karur Bypass Rd, Annamalai Nagar, Melachinthamani, ', 'Tiruchirappalli', 620003, '0000-00-00 00:00:00', '2023-07-15 07:28:47', 'Active', '', ''),
(3, 5, 'kids dress and saree', 'jpg', 'jpg', 'NBS Road,singarathopu,trichy', 'trichy', 620002, '2023-07-05 13:12:14', '2023-07-05 13:12:14', 'Active', '', ''),
(4, 6, 'kids dress, sarees, western wear', 'jpg', 'jpg', 'No. 45, Nsb Road, Teppakulam, Tiruchirappalli, Tamil Nadu 620002', 'No. 45, Nsb Road, Teppakulam, Tiruchirappalli, Tamil Nadu 620002', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(5, 3, 'metrial dress ,sarees ', 'jpg', 'jpg', '3 Star Plaza, 22/G3, Nandhi Koil Street, Thepakulam, Trichy, ', 'Thepakulam, Trichy, ', 620005, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(6, 7, 'silks sarees, pattu sarees, western wear', 'jpg', 'jpg', '10 -12, W Blvd Road, Tharanallur, Tiruchirappalli, Tamil Nadu 620002', 'Tiruchirappalli', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(7, 8, 'silk sarees, western wear', 'jpg', 'jpg', 'No-106, Bharathiar Salai, Melapudur, Cantonment, Turaiyur, Tamil Nadu 621001 · ', 'No-106, Bharathiar Salai, Melapudur, Cantonment, Turaiyur, Tamil Nadu 621001 · ', 620001, '2023-07-05 14:19:24', '2023-07-05 14:19:24', 'Active', '', ''),
(8, 9, 'IAS coaching', 'jpg', 'jpg', 'N.R.Towers No- A9 Salai Road Lic, Branch Building, Tiruchirapalli Rock Fort, ', 'Tiruchirappalli, Tamil Nadu', 620018, '2023-07-05 16:10:51', '2023-07-05 16:10:51', 'Active', '', ''),
(9, 10, 'Postgraduate/Undergraduate and art and science', 'jpg', 'jpg', 'Dindigul Road', ' Tiruchirappalli, Tamil Nadu ', 620001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(10, 11, 'LKG to +2', 'jpg', 'jpg', 'Samayapuram Old NH 45, Tiruchirappalli, Tamil Nadu', 'Tiruchirappalli, Tamil Nadu', 621112, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(11, 12, 'KidsPer school', 'jpg', 'jpg', ' 10/31, 2Nd Main Road, Major Saravanan Road, Raja Colony, ', 'Tiruchirappalli, Tamil Nadu ', 620001, '2023-07-05 17:31:05', '2023-07-05 17:31:05', 'Active', '', ''),
(12, 13, ' Tuition Centre', 'jpg', 'jpg', '1st Floor, Annamalai Tower, Above KFC, Annamalai Nagar, ', 'Tiruchirappalli, Tamil Nadu ', 620018, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(13, 14, 'Biriyaniand chicken BBQ', 'jpg', 'jpg', '73A, Salai Road, ', 'Trichy', 620018, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(14, 15, 'Pure veg restaurant', 'jpg', 'jpg', 'No.14, Twin Towers, Karur Bypass Road, Annamalai Nagar, ', ' Tiruchirappalli ', 620014, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(15, 16, 'Dindigul Spl Biriyani ', 'jpg', 'jpg', 'T.S 50/3, Karur Bye Pass Road, Melachinathamani, Near Chatram Bus Stand, Main Guard Gate,', ' Tiruchirappalli ', 6200014, '2023-07-06 13:14:04', '2023-07-06 13:14:04', 'Active', '', ''),
(16, 17, 'Pure veg restaurant', 'jpg', 'jpg', 'NO. 2, V.O.C, ROAD(NEAR CENTRAL BUS STAND) ', 'TRICHY', 620, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(17, 19, 'Pure veg restaurant', 'jpg', 'jpg', 'Central Bus Stand, Cantonment, ', 'Tiruchirappalli', 620001, '2023-07-08 13:31:58', '2023-07-08 13:31:58', 'Active', '', ''),
(18, 18, 'ASTROLOGY RESEARCH INSTITUTE ', 'jpg', 'jpg', '1 Puthur High Road, ', 'Tiruchirappalli,', 620017, '2023-07-08 13:40:29', '2023-07-08 13:40:29', 'Active', '', ''),
(19, 20, 'Naadi Astrology Centre', 'jpg', 'jpg', 'RM7G+CPC, Annamalaiyar Rd, Aruna Nagar, Puthur, Bharthi Nagar, ', 'Tiruchirappalli', 620017, '2023-07-08 13:58:15', '2023-07-08 13:58:15', 'Active', '', ''),
(20, 21, 'Jyothida Maiyam', 'jpg', 'jpg', 'Keela Street, Sivan Temple Nearer, Uyyakondan Thirumalai, ', 'Tiruchirappalli', 620102, '2023-07-08 14:04:53', '2023-07-08 14:04:53', 'Active', '', ''),
(21, 22, 'Nadi Jyothishalayam', 'jpg', 'jpg', 'NO:13A,1st Floor 3rd Cross Street Near Bharathi Park,(opp)Bishop Heber College, Vayalur Rd, Bharthi Nagar, ', 'Tiruchirappalli, ', 620017, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(22, 23, 'Hair cut , facial, hair smoothing ', 'jpg', 'jpg', 'Lakshmi Nagar second cross street ', 'Trichy ', 620002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', '', ''),
(24, 24, '24x7 service', 'jpeg', 'jpg', 'RM4P+FV4,Melapudur,Sangillyandapuram,Tiruchirappalli,Tamil Nadu 620001', 'RM4P+FV4,Melapudur,Sangillyandapuram,Tiruchirappalli,Tamil Nadu 620001', 620001, '2023-07-10 11:20:41', '2023-07-10 11:53:49', 'Deactive', '', ''),
(25, 25, 'ercvrbjnbi', 'png', 'jpg', 'Palpannai', 'Palpannai Road', 620006, '2023-07-11 17:17:42', '2023-07-11 17:17:42', 'Active', '', ''),
(26, 26, 'kids dress and saree', 'jpg', 'jpg', '11th Cross, Thillai Nagar, Uraiyoor, ', 'Tiruchirappalli, ', 620018, '2023-07-15 07:38:31', '2023-07-15 07:38:31', 'Active', '', ''),
(27, 27, 'Prabhu Diabetes Multi Speciality Centre', 'jpeg', 'jpeg', '25, Venkatesan Salai, Ponnagar Extension, Karumandapam, ', 'Tiruchirappalli, Tamil Nadu.', 620001, '2023-07-15 08:46:34', '2023-07-15 08:46:34', 'Active', '', ''),
(28, 28, 'Apollo Speciality Hospitals', 'jpeg', 'jpeg', 'Chennai Bypass Road Ariyamangalam Area, Old Palpannai', 'Tiruchirappalli, Tamil Nadu ', 620010, '2023-07-15 09:35:18', '2023-07-15 09:35:18', 'Active', '', ''),
(29, 29, 'Atlas Hospitals\r\n', 'jpeg', 'jpeg', '34/1 Vn Nagar, Karur Bye Pass Road, Townhall, (Near Chathiram Bus Stand)', 'Tiruchirappalli, Tamil Nadu ', 620002, '2023-07-15 09:57:12', '2023-07-15 09:57:12', 'Active', '', ''),
(30, 30, 'Athma Hospitals and Research', 'jpeg', 'jpeg', 'No 12B, Thillai Nagar, (Near 10th Cross East)', 'Tiruchirappalli, Tamil Nadu ', 620018, '2023-07-15 10:03:33', '2023-07-15 10:03:33', 'Active', '', ''),
(31, 31, ' Neuro One Hospital\r\n', 'jpeg', 'jpeg', 'No 55/1, Karur Bye Pass Road, Chinnakadai Street, (Near Chathiram Bus Stand)', 'Tiruchirappalli, Tamil Nadu ', 620002, '2023-07-15 10:16:35', '2023-07-15 10:16:35', 'Active', '', ''),
(32, 32, 'Tiruchirappalli Rockfort, locally known as Malaikottai, is a historic fortification and temple complex built on an ancient rock. It is located in the city of Tiruchirappalli, on the banks of river Kaveri, Tamil Nadu, India. It is constructed on an 83 metres (272 ft) high rock.There are two Hindu temples inside, the Ucchi Pillayar Temple, Rockfort and the Thayumanaswami Temple, Rockfort. Rockfort is the most prominent landmark of the city', 'jpeg', 'jpeg', 'Big Bazaar St, Melachinthamani, ', 'Tiruchirappalli, Tamil Nadu ', 620002, '2023-07-15 11:58:31', '2023-07-15 11:59:47', 'Active', '', ''),
(33, 33, 'Samayapuram Mariamman Temple\r\n', 'jpeg', 'jpeg', ' Samayapuram', 'Tiruchirappalli, Tamil Nadu ', 621112, '2023-07-15 12:10:41', '2023-07-15 12:10:41', 'Active', '', ''),
(34, 34, 'Tiruvanaikovil Arulmigu Jambukeswarar Akilandeswari Temple\r\n', 'jpeg', 'jpeg', 'VP34+674, N Car St, Srirangam, Thiruvanaikoil, ', 'Tiruchirappalli, Tamil Nadu ', 620005, '2023-07-15 12:20:30', '2023-07-15 12:20:30', 'Active', '', ''),
(35, 35, 'Srirangam', 'jpeg', 'jpeg', 'Sri Ranganathar Swamy Temple, Srirangam, ', 'Tiruchirappalli, Tamil Nadu ', 620, '2023-07-17 06:20:21', '2023-07-17 06:20:21', 'Active', '', ''),
(36, 36, 'Silverline Speciality Hospital', 'jpeg', 'jpeg', 'No 23c, 4 Th Cross Street West, Thillai Nagar', 'Tiruchirappalli, Tamil Nadu', 620018, '2023-07-17 07:44:00', '2023-07-17 07:44:00', 'Active', '', ''),
(37, 37, ' Arc Fertility Hospitals Trichy', 'jpeg', 'jpeg', '2 & 50, EVR Rd, opposite G.H, Puthur, Thillai Nagar', 'Tiruchirappalli, Tamil Nadu', 620017, '2023-07-17 08:21:27', '2023-07-17 08:21:27', 'Active', '', ''),
(38, 38, 'SMS Hospital', 'jpeg', 'jpeg', 'No-128, Jayanthi Bus Stop, 75-K, Salai Rd, near Jayanthi Bus Stop, Woraiyur,', 'Tiruchirappalli, Tamil Nadu', 620018, '2023-07-17 09:45:29', '2023-07-17 09:45:29', 'Active', '', ''),
(39, 39, 'Nalam Hospital', 'jpeg', 'jpeg', '58, Ponmalaipatti Rd, Highway Colony, Sundarraj Nagar, Subramaniyapuram, Railway Colony, ', 'Tiruchirappalli, Tamil Nadu', 620020, '2023-07-17 10:07:05', '2023-07-17 10:07:05', 'Active', '', ''),
(40, 40, 'ABC Hospital', 'jpeg', 'jpeg', '1, Annamalai Nagar Main Rd, Woraiyur, ', 'Tiruchirappalli, Tamil Nadu', 620018, '2023-07-17 10:25:37', '2023-07-17 10:25:37', 'Active', '', ''),
(41, 41, 'Sundaram Hospital', 'jpeg', 'jpeg', 'No 20, EVR Main Road, Aruna Nagar, Puthur, Thillai Nagar', 'Tiruchirappalli, Tamil Nadu', 620017, '2023-07-18 05:53:20', '2023-07-18 05:53:20', 'Active', '', ''),
(42, 42, ' Lalitha Nursing Home', 'jpeg', 'jpeg', 'No-B2, 10th Cross St, West Thillai Nagar, Tennur,', 'Tiruchirappalli, Tamil Nadu', 620018, '2023-07-18 06:03:55', '2023-07-18 06:03:55', 'Active', '', ''),
(43, 43, 'GVN Hospital', 'jpeg', 'jpeg', 'No 46, near Super Bazaar, Singarathope', 'Tiruchirappalli, Tamil Nadu', 431, '2023-07-18 06:18:31', '2023-07-18 06:18:31', 'Active', '', ''),
(44, 44, ' GVN Riverside Hospital', 'jpeg', 'jpeg', 'Thimmarayasamuthiram Trichy-Chennai, Grand Southern Trunk Rd, Thiruvanaikoil', 'Tiruchirappalli, Tamil Nadu', 620005, '2023-07-18 06:45:01', '2023-07-18 06:48:51', 'Active', '', ''),
(45, 45, 'Frontline Hospital', 'jpeg', 'jpeg', '37 & 39, near Anna Statue, Chinthamani Bazaar, Melachinthamani', 'Tiruchirappalli, Tamil Nadu', 431, '2023-07-18 07:03:20', '2023-07-18 07:03:20', 'Active', '', ''),
(46, 46, 'A G Eye Care Hospital', 'jpeg', 'jpeg', 'No.6, Officers Colony Road, Puthur, Tennur', 'Tiruchirappalli, Tamil Nadu', 620017, '2023-07-18 07:16:32', '2023-07-18 07:16:32', 'Active', '', ''),
(47, 47, 'Janet Nursing Home', 'jpeg', 'jpeg', '21B, Officers Colony Road, Opp Fish Market, Venganadapuram,Puthur, Tennur', 'Tiruchirappalli, Tamil Nadu', 431, '2023-07-18 07:24:00', '2023-07-18 07:24:00', 'Active', '', ''),
(48, 48, ' Gastro Care Hospital', 'jpeg', 'jpeg', 'C, 57, 11th Cross E Rd, Thillai Nagar East, Thillai Nagar', 'Tiruchirappalli, Tamil Nadu', 431, '2023-07-18 07:30:59', '2023-07-18 07:31:28', 'Active', '', ''),
(49, 49, 'Deepan Hospital', 'jpeg', 'jpeg', '50, Bishop Rd, opp. M.A Honda, Puthur, Tennur,', 'Tiruchirappalli, Tamil Nadu', 620017, '2023-07-18 07:38:07', '2023-07-18 07:38:07', 'Active', '', ''),
(50, 51, ' Shyamala Nursing Home', 'jpeg', 'jpeg', '15, Benwells Rd, Opp laksmi vilas bank, near Seva Sangam School,Cantonment,', 'Tiruchirappalli, Tamil Nadu', 620001, '2023-07-18 07:53:02', '2023-07-18 07:53:02', 'Active', '', ''),
(51, 52, ' Our Lady of Lourdes Church', 'jpeg', 'jpeg', ' RMGV+R34, College Rd, Annamalai Nagar,Teppakulam', 'Tiruchirappalli, Tamil Nadu 620002', 620002, '2023-07-18 10:26:26', '2023-07-18 10:26:26', 'Active', '', ''),
(52, 54, 'Trichy City AG Church', 'jpeg', 'jpg', 'No.1, New Selva Nagar, PonnagarNo.1, New Selva Nagar, Ponnagar', 'Tiruchirappalli, Tamil Nadu', 620001, '2023-07-18 10:48:29', '2023-07-18 12:38:41', 'Active', '', ''),
(53, 56, 'NATHARSHA PALLIVASAL', 'jpeg', 'jpeg', ' QP52+6R9, Anna Nagar', 'Tiruchirappalli, Tamil Nadu', 620007, '2023-07-18 11:14:22', '2023-07-18 11:14:22', 'Active', '', ''),
(54, 57, 'Junction Jamia Masjid', 'jpeg', 'jpeg', ' No.14A, Junction.sankar kabay, opp. Tiruchirappalli, Bharathiyar Salai, Sangillyandapuram', 'Tiruchirappalli, Tamil Nadu', 620001, '2023-07-18 11:23:20', '2023-07-18 11:23:20', 'Active', '', ''),
(55, 58, 'Masjid Ahle Hadhees', 'jpeg', 'jpeg', 'Warners Rd, Cantonment,', 'Tiruchirappalli, Tamil Nadu', 620001, '2023-07-18 11:29:46', '2023-07-18 11:29:46', 'Active', '', ''),
(56, 59, 'Kallanai (also known as the Grand Anicut) is an ancient dam built by Karikala of Chola dynasty in 150 CE. It is built (in running water) across the Kaveri river flowing from Tiruchirapalli District to Thanjavur district, Tamil Nadu, India. The dam is located in Thanjavur district,  15 km from Tiruchirapalli and 45 km from Tanjavur. It is the fourth oldest water-diversion or water-regulator structure in the world and the oldest in India that is still in use. Because of its spectacular architecture, it is one of the prime tourist spots in Tamil Nadu.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'jpeg', 'jpeg', 'Kallanai Dam  Tiruchirappalli', 'Tamil nadhu', 621003, '2023-07-19 06:29:47', '2023-07-19 06:29:47', 'Active', '', ''),
(57, 60, 'Butterfly park located at Trichy Sri-Rangam is Asia’s biggest park dedicated to one of the 2 top game-changers of the global food chain, the butterfly. The butterfly plays an important role in pollination which is the major step in food production. Being located at the banks of the majestic river Cauvery, this turns out to be the favourite spot of city dwellers to merge themselves with nature and to get enchanted by the ethereal fluttering of colourful butterflies.', 'jpeg', 'jpeg', ' Tropical Butterfly Conservatory Campus Srirangam Taluk rsd, Melur', 'Tiruchirappalli, Tamil Nadu', 620006, '2023-07-19 06:50:16', '2023-07-19 06:50:16', 'Active', '', ''),
(58, 61, 'The Rail Museum was inaugurated by SOUTHERN RAILWAY General Manager RAKESH MISRA on 18th Feb 2014. The Rail Museum Trichy was constructed on an area of over 9000 square feet with interior works, landscaping and a toy train track. The cost of the Rail Museum is about 1.35 crore. The museum is meant to be part of the erstwhile South Indian Railways 150th Sesquicentennial celebration. Due to fund constraints, the entire museum was opened for the public on 25.02.2015. The museum will showcase the rich heritage of the erstwhile South Indian Railway. It was near Trichy Central Bus Stand.', 'jpeg', 'jpeg', 'Bharathiar Salai, Bharathiyar Salai, Cantonment', 'Tiruchirappalli, Tamil Nadu', 620001, '2023-07-19 07:08:54', '2023-07-19 07:08:54', 'Active', '', ''),
(59, 62, 'Marina beach in Chennai along the Bay of Bengal is India’s longest and world’s second longest beach. This predominantly sandy of nearly 12 kilometers extends from Beasant Nagar in the south to Fort St. George in the north. Chennai Marina beach was renovated by Governor Mountstuart  Elphinstone Grant Duff in 1880s. All tourists traveling to Chennai never miss visiting this grand Chennai beach. Marina beach is easily accessible by buses, taxis, two and three wheelers.', 'jpeg', 'jpeg', ' Triplicane,  Marina Beach ', 'Chennai, Tamil Nadu', 600005, '2023-07-19 07:25:20', '2023-07-19 07:25:20', 'Active', '', ''),
(60, 63, 'Arignar Anna Zoological Park (abbreviated AAZP), also known as the Vandalur Zoo, is a zoological garden located in Vandalur, is in the southwestern part of Chennai, Tamil Nadu, about 31 kilometres (19 mi) from the Chennai Central and 15 kilometres (9.3 mi) from Chennai Airport. Established in 1855, it is the first public zoo in India. It is affiliated with the Central Zoo Authority of India.[8] Spread over an area of 602 hectares (1,490 acres), including a 92.45-hectare (228.4-acre) rescue and rehabilitation center, the park is the largest zoological park in India.', 'jpeg', 'jpeg', 'Arignar Anna Zoological Park Vandalur', 'Chennai, Tamil Nadu', 600048, '2023-07-19 09:15:00', '2023-07-19 09:15:00', 'Active', '', ''),
(61, 64, 'This place is known for preserving some of the best ancient (10-13th century) and modern South Indian bronzes. What’s more is that the Amaravathi Gallery houses marble sculptures depicting the life of Gautam Buddha dating as back to 2nd century. Truly a gem of a place to visit in Chennai for kids and grownups alike!\r\n\r\n', 'jpeg', 'jpeg', 'Beside Government Maternity Hospital, Pantheon Rd, Egmore', 'Chennai, Tamil Nadu', 600008, '2023-07-19 10:28:10', '2023-07-19 10:28:10', 'Active', '', ''),
(62, 65, ' VOC Park and Zoo, also known as the V.O.Chidambaranar Park and is an Amusement Park and Zoological Garden mostly visited by locals of Coimbatore for recreational purposes. The park and zoo is a preferred picnic spot for families who get their kids to have a wonderful time and introduce them to the world of animals. The park has a play area for the kids, an aquarium and a Jurassic Park where not just children but even adults can have fun. It is a perfect place to get the imagination running to build stories. The zoo houses over 500 animals belonging to about 30 species including birds, mammals and reptiles. ', 'jpeg', 'jpeg', ' 24, Park Gate Rd, ATT Colony, Gopalapuram, ', ' Coimbatore Tamilnadhu', 641018, '2023-07-19 10:50:23', '2023-07-19 10:50:23', 'Active', '', ''),
(63, 66, 'Monkey Falls are natural waterfalls located near the uphill ghat road Valparai on the Pollachi-Valparai road in the Anaimalai Hills range, in Coimbatore district.Monkey Falls is about 30 km from Pollachi. Refreshing Natural Water Falls about 6 km from Azhiyar Dam. Monkey Falls is located on road connecting Pollachi and Valparai.An interesting trek route at the Monkey Falls; a linear stretch of evergreen forests surrounded by rocky cliffs, is available and regular guided treks are conducted during favourable season. Prior request should be given to the Tamil Nadu Forest Department headquarters at Pollachi before a fortnight.\r\n', 'jpeg', 'jpeg', ' FX59+4MM, SH 78, Coimbatore', ' Coimbatore Tamilnadhu', 642101, '2023-07-19 11:06:10', '2023-07-19 11:06:10', 'Active', '', ''),
(64, 67, 'Waterpark featuring slides, rides, a lazy river & other amusements, plus a food court', 'jpg', 'jpg', 'Salem to Namakkal Highway, NH-7, KK Valasu, Mallur, ', 'Salem, ', 636203, '2023-07-19 11:50:19', '2023-07-19 11:50:19', 'Active', '', ''),
(65, 68, 'The Mettur Dam is one of the largest dams in India and also the largest in Tamil Nadu, located across the river Kaveri where it enters the plains. Built in 1934, it took 9 years to complete. Maximum height and width of the dam are 214 and 171 feet, respectively', 'jpg', 'jpg', 'Mettur, Salem District,', ' Tamil Nadu', 636401, '2023-07-19 12:03:20', '2023-07-19 12:03:20', 'Active', '', ''),
(66, 2, '24/7', 'jpg', 'jpeg', 'csi', 'trichy', 620002, '2023-07-20 06:21:07', '2023-07-20 06:21:07', 'Active', '', ''),
(67, 69, 'Fresh Cream Cakes & Dairy Products  ', 'jpeg', 'jpeg', '3/ B , Rocking Road Junction', 'Tiruchirappalli, Tamil Nadu', 620001, '2023-07-20 06:47:38', '2023-07-20 06:47:38', 'Active', '', ''),
(68, 50, 'CSI Mission Hospital is a Multi Specialty Hospital', 'jpg', 'jpg', 'Salai Road, Ramalinga Nagar, Thillai Nagar, Thennur, ', 'Tiruchirappalli,  ', 620018, '2023-07-20 09:24:22', '2023-07-20 09:24:22', 'Active', '', ''),
(69, 70, 'Application development and maintenance ', 'png', 'jpg', 'Warehouse busstop', 'Palakarai', 620001, '2023-07-26 22:10:00', '2023-07-26 22:10:00', 'Active', '78.69488880369572', '10.806150017896734');

-- --------------------------------------------------------

--
-- Table structure for table `business_feedback`
--

CREATE TABLE `business_feedback` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `starCount` bigint(20) NOT NULL,
  `message` longtext NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_feedback`
--

INSERT INTO `business_feedback` (`id`, `businessId`, `userId`, `starCount`, `message`, `createdDateTime`, `updateDateTime`, `status`) VALUES
(1, 2, 5, 5, 'Back pain', '2023-07-16 08:03:37', '2023-07-16 08:03:37', 'active'),
(2, 31, 5, 5, 'Good', '2023-07-17 09:49:03', '2023-07-17 09:49:03', 'active'),
(3, 2, 8, 5, 'Good experience ', '2023-07-18 12:43:21', '2023-07-18 12:43:21', 'active'),
(4, 35, 7, 4, 'Good', '2023-07-18 17:52:09', '2023-07-18 17:52:09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `business_image`
--

CREATE TABLE `business_image` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
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
(37, 22, 'jpg', 'h', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active'),
(38, 24, 'jpg', 'RVB648', '2023-07-10 11:28:17', '2023-07-10 11:28:17', 'active'),
(41, 25, 'png', 'df4ug8768ju7', '2023-07-11 17:24:27', '2023-07-11 17:24:27', 'active'),
(42, 25, 'png', 'logo', '2023-07-11 17:24:46', '2023-07-11 17:24:46', 'active'),
(43, 25, 'jpg', 'banner', '2023-07-11 17:24:59', '2023-07-11 17:24:59', 'active'),
(45, 4, 'jpg', 'pan', '2023-07-15 07:08:01', '2023-07-15 07:08:01', 'active'),
(46, 26, 'jpg', 'qe', '2023-07-15 07:41:19', '2023-07-15 07:41:19', 'active'),
(47, 27, 'jpeg', '123', '2023-07-15 08:51:33', '2023-07-15 08:51:33', 'active'),
(48, 28, 'jpeg', '12', '2023-07-15 09:40:07', '2023-07-15 09:40:07', 'active'),
(49, 29, 'jpeg', '12', '2023-07-15 10:01:14', '2023-07-15 10:01:14', 'active'),
(50, 30, 'jpeg', '123', '2023-07-15 10:05:23', '2023-07-15 10:05:23', 'active'),
(51, 31, 'jpeg', '11', '2023-07-15 10:18:24', '2023-07-15 10:18:24', 'active'),
(52, 32, 'jpeg', '11', '2023-07-15 12:02:23', '2023-07-15 12:02:23', 'active'),
(53, 33, 'jpeg', '11', '2023-07-15 12:12:34', '2023-07-15 12:12:34', 'active'),
(54, 34, 'jpeg', '1', '2023-07-15 12:22:38', '2023-07-15 12:22:38', 'active'),
(55, 34, 'jpeg', '2', '2023-07-15 12:22:51', '2023-07-15 12:22:51', 'active'),
(56, 35, 'jpeg', '1', '2023-07-17 06:22:22', '2023-07-17 06:22:22', 'active'),
(57, 35, 'jpeg', '2', '2023-07-17 06:22:37', '2023-07-17 06:22:37', 'active'),
(58, 36, 'jpeg', '1', '2023-07-17 07:46:37', '2023-07-17 07:46:37', 'active'),
(59, 37, 'jpeg', '1', '2023-07-17 08:23:15', '2023-07-17 08:23:15', 'active'),
(60, 38, 'jpeg', '1', '2023-07-17 09:47:51', '2023-07-17 09:47:51', 'active'),
(61, 39, 'jpeg', '1', '2023-07-17 10:09:17', '2023-07-17 10:09:17', 'active'),
(62, 40, 'jpeg', '1', '2023-07-17 10:29:30', '2023-07-17 10:29:30', 'active'),
(63, 40, 'jpeg', '1', '2023-07-17 11:00:11', '2023-07-17 11:00:11', 'active'),
(64, 41, 'jpeg', '1', '2023-07-18 05:55:49', '2023-07-18 05:55:49', 'active'),
(65, 42, 'jpeg', '1', '2023-07-18 06:05:58', '2023-07-18 06:05:58', 'active'),
(66, 43, 'jpeg', '1', '2023-07-18 06:21:19', '2023-07-18 06:21:19', 'active'),
(67, 44, 'jpeg', '1', '2023-07-18 06:54:58', '2023-07-18 06:54:58', 'active'),
(68, 45, 'jpeg', '1', '2023-07-18 07:10:32', '2023-07-18 07:10:32', 'active'),
(69, 46, 'jpeg', '1', '2023-07-18 07:17:59', '2023-07-18 07:17:59', 'active'),
(70, 47, 'jpeg', '1', '2023-07-18 07:25:24', '2023-07-18 07:25:24', 'active'),
(71, 48, 'jpeg', '1', '2023-07-18 07:33:12', '2023-07-18 07:33:12', 'active'),
(72, 49, 'jpeg', '1', '2023-07-18 07:40:19', '2023-07-18 07:40:19', 'active'),
(73, 51, 'jpeg', '1', '2023-07-18 07:55:10', '2023-07-18 07:55:10', 'active'),
(74, 52, 'jpeg', '2', '2023-07-18 10:30:16', '2023-07-18 10:30:16', 'active'),
(75, 53, 'jpeg', '2', '2023-07-18 10:42:14', '2023-07-18 10:42:14', 'active'),
(76, 54, 'jpeg', '2', '2023-07-18 10:50:23', '2023-07-18 10:50:23', 'active'),
(77, 55, 'jpeg', '2', '2023-07-18 10:58:03', '2023-07-18 10:58:03', 'active'),
(78, 56, 'jpeg', '3', '2023-07-18 11:17:15', '2023-07-18 11:17:15', 'active'),
(79, 57, 'jpeg', '3', '2023-07-18 11:25:40', '2023-07-18 11:25:40', 'active'),
(80, 58, 'jpeg', '3', '2023-07-18 11:31:42', '2023-07-18 11:31:42', 'active'),
(81, 3, 'jpg', 'kjkl', '2023-07-18 12:34:13', '2023-07-18 12:34:13', 'active'),
(82, 59, 'jpeg', '1', '2023-07-19 06:32:28', '2023-07-19 06:32:28', 'active'),
(83, 60, 'jpeg', '1', '2023-07-19 06:54:32', '2023-07-19 06:54:32', 'active'),
(84, 61, 'jpeg', '1', '2023-07-19 07:12:50', '2023-07-19 07:12:50', 'active'),
(85, 62, 'jpeg', '1', '2023-07-19 07:27:18', '2023-07-19 07:27:18', 'active'),
(86, 63, 'jpeg', '2', '2023-07-19 09:20:19', '2023-07-19 09:20:19', 'active'),
(87, 64, 'jpeg', '1', '2023-07-19 10:31:58', '2023-07-19 10:31:58', 'active'),
(88, 65, 'jpeg', '1', '2023-07-19 10:53:45', '2023-07-19 10:53:45', 'active'),
(89, 66, 'jpeg', 'Best Waterfall', '2023-07-19 11:14:07', '2023-07-19 11:14:07', 'active'),
(90, 67, 'jpg', 'theme park', '2023-07-19 11:52:48', '2023-07-19 11:52:48', 'active'),
(91, 68, 'jpg', 'mettur dem', '2023-07-19 12:05:53', '2023-07-19 12:05:53', 'active'),
(92, 69, 'jpeg', '1', '2023-07-20 06:51:14', '2023-07-20 06:51:14', 'active'),
(93, 70, 'jpg', 'new year', '2023-07-26 22:23:46', '2023-07-26 22:23:46', 'active'),
(94, 70, 'png', 'Java Course', '2023-07-26 22:23:54', '2023-07-26 22:23:54', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `business_product`
--

CREATE TABLE `business_product` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `price` double NOT NULL,
  `discountPercentage` double NOT NULL,
  `taxPercentage` double NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_product`
--

INSERT INTO `business_product` (`id`, `businessId`, `name`, `price`, `discountPercentage`, `taxPercentage`, `createdDateTime`, `updatedDateTime`, `status`, `image`) VALUES
(2, 6, 'Pattu Sarees.', 2000, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(3, 5, 'pattu sarees', 20500, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(4, 7, 'western wears', 1000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(5, 7, 'silk sarees', 1500, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(6, 8, 'western wear', 1000, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(7, 8, 'pattu sarees', 1500, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(8, 3, 'pattu sarees', 1500, 10, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(9, 9, 'IAS COACHING', 20000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(10, 10, 'Postgraduate', 35000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(11, 10, 'Undergraduate ', 25000, 5, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(12, 14, 'Chicken biriyani', 250, 5, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(13, 14, 'Mutton biriyani', 350, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(14, 15, 'South Indian Thali ', 220, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(15, 15, 'North Indian Thali ', 250, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(16, 19, 'Veg meals', 130, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(17, 21, 'Jyothida', 200, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Active', ''),
(18, 24, 'Books', 800, 30, 12, '2023-07-10 11:29:03', '2023-07-10 11:29:03', 'Active', ''),
(20, 1, 'Doss', 1200, 36, 12, '2023-07-10 20:09:05', '2023-07-10 20:09:05', 'active', ''),
(21, 1, 'Tiffin center', 100, 2, 12, '2023-07-10 20:11:37', '2023-07-10 20:11:37', 'active', ''),
(22, 25, 'Wheel chair', 1200, 3, 5, '2023-07-11 17:27:42', '2023-07-11 17:27:54', 'Active', ''),
(25, 26, 'Silks', 1000, 5, 12, '2023-07-15 07:42:04', '2023-07-15 07:42:04', 'Active', ''),
(26, 36, 'General services', 1000, 5, 12, '2023-07-17 07:52:09', '2023-07-17 07:52:09', 'Active', ''),
(27, 37, 'General Service', 1000, 5, 12, '2023-07-17 08:23:57', '2023-07-17 08:23:57', 'Active', ''),
(28, 38, 'General Service', 1000, 5, 12, '2023-07-17 09:48:33', '2023-07-17 09:48:33', 'Active', ''),
(29, 39, 'General Serivce', 1000, 5, 12, '2023-07-17 10:09:46', '2023-07-17 10:09:46', 'Active', ''),
(30, 40, 'General Service', 1000, 5, 12, '2023-07-17 11:00:49', '2023-07-17 11:00:49', 'Active', ''),
(31, 41, 'General Serivce', 1000, 5, 12, '2023-07-18 05:56:24', '2023-07-18 05:56:24', 'Active', ''),
(32, 42, 'General Serivce', 1000, 5, 12, '2023-07-18 06:06:28', '2023-07-18 06:06:28', 'Active', ''),
(33, 43, 'General Service', 1000, 5, 12, '2023-07-18 06:23:13', '2023-07-18 06:23:13', 'Active', ''),
(34, 44, 'General Service', 1000, 5, 12, '2023-07-18 06:55:27', '2023-07-18 06:55:27', 'Active', ''),
(35, 45, 'General Service', 1000, 5, 12, '2023-07-18 07:11:32', '2023-07-18 07:11:32', 'Active', ''),
(36, 46, 'General Service', 1000, 5, 10, '2023-07-18 07:18:31', '2023-07-18 07:18:31', 'Active', ''),
(37, 47, 'General Service', 1000, 5, 12, '2023-07-18 07:26:00', '2023-07-18 07:26:00', 'Active', ''),
(38, 48, 'General Service', 1000, 5, 10, '2023-07-18 07:33:57', '2023-07-18 07:33:57', 'Active', ''),
(39, 49, 'General Service', 1000, 5, 12, '2023-07-18 07:40:45', '2023-07-18 07:40:45', 'Active', ''),
(40, 50, 'General Service', 1000, 5, 12, '2023-07-18 07:48:38', '2023-07-18 07:48:38', 'Active', ''),
(41, 51, 'General Service', 1000, 5, 12, '2023-07-18 07:55:44', '2023-07-18 07:55:44', 'Active', ''),
(42, 67, 'Adults and Children (taller than 130cm)	', 750, 0, 0, '2023-07-19 11:53:37', '2023-07-19 11:53:37', 'Active', ''),
(43, 67, 'Children (90cm - 130cm)	', 600, 0, 0, '2023-07-19 11:54:26', '2023-07-19 11:54:26', 'Active', ''),
(44, 70, 'Static Website', 7500, 10, 0, '2023-07-26 22:25:50', '2023-07-26 22:25:50', 'Active', 'png'),
(45, 70, 'Dynamic Website', 15000, 10, 0, '2023-07-26 22:26:05', '2023-07-26 22:26:05', 'Active', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `business_service`
--

CREATE TABLE `business_service` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL DEFAULT 'active',
  `price` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_service`
--

INSERT INTO `business_service` (`id`, `businessId`, `name`, `status`, `price`, `tax`, `discount`) VALUES
(1, 1, 'marketting', 'active', 0, 0, 0),
(2, 2, 'Consulting', 'Active', 0, 0, 0),
(3, 2, 'booking', 'Active', 0, 0, 0),
(4, 31, 'Booking', 'Active', 0, 0, 0),
(5, 30, 'Booking', 'Active', 0, 0, 0),
(6, 29, 'Booking', 'Active', 0, 0, 0),
(7, 36, 'General service', 'Active', 0, 0, 0),
(8, 37, 'General Service', 'Active', 0, 0, 0),
(9, 38, 'General Service', 'Active', 0, 0, 0),
(10, 39, 'General Service', 'Active', 0, 0, 0),
(11, 40, 'General Serivce', 'Active', 0, 0, 0),
(12, 41, 'General Service', 'Active', 0, 0, 0),
(13, 42, 'General Service', 'Active', 0, 0, 0),
(14, 43, 'General Service', 'Active', 0, 0, 0),
(15, 44, 'General Service', 'Active', 0, 0, 0),
(16, 47, 'General Service', 'Active', 0, 0, 0),
(17, 48, 'General Service', 'Active', 0, 0, 0),
(18, 49, 'General Service', 'Active', 0, 0, 0),
(19, 50, 'General Service', 'Active', 0, 0, 0),
(20, 51, 'General Service', 'Active', 0, 0, 0),
(21, 70, 'Domain name consulting', 'Active', 500, 0, 10),
(22, 70, 'Web Design Consultancy', 'Active', 2500, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `business_tag`
--

CREATE TABLE `business_tag` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
  `tagId` bigint(20) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_tag`
--

INSERT INTO `business_tag` (`id`, `businessId`, `tagId`, `status`) VALUES
(1, 1, 1, 'Active'),
(7, 6, 9, 'Active'),
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
(26, 21, 3, 'Active'),
(27, 22, 3, 'Active'),
(29, 1, 8, 'active'),
(30, 24, 5, 'Active'),
(31, 25, 23, 'Active'),
(32, 25, 1, 'Active'),
(36, 4, 9, 'Active'),
(37, 26, 9, 'Active'),
(39, 27, 1, 'Active'),
(40, 20, 3, 'Active'),
(41, 5, 9, 'Active'),
(42, 5, 9, 'Active'),
(43, 8, 10, 'Active'),
(44, 31, 2, 'Active'),
(45, 36, 2, 'Active'),
(46, 36, 33, 'Active'),
(47, 1, 2, 'Active'),
(48, 45, 25, 'Active'),
(49, 46, 25, 'Active'),
(50, 47, 25, 'Active'),
(51, 48, 25, 'Active'),
(52, 49, 25, 'Active'),
(53, 50, 25, 'Active'),
(54, 51, 25, 'Active'),
(55, 52, 44, 'Active'),
(56, 53, 44, 'Active'),
(57, 54, 44, 'Active'),
(58, 55, 44, 'Active'),
(59, 56, 45, 'Active'),
(60, 57, 45, 'Active'),
(61, 58, 45, 'Active'),
(62, 60, 47, 'Active'),
(63, 61, 48, 'Active'),
(64, 62, 49, 'Active'),
(65, 63, 50, 'Active'),
(66, 66, 53, 'Active'),
(67, 68, 38, 'Active'),
(68, 69, 54, 'Active'),
(69, 70, 5, 'Active'),
(70, 70, 17, 'Active'),
(71, 70, 18, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_timing`
--

CREATE TABLE `business_timing` (
  `id` bigint(20) NOT NULL,
  `businessId` bigint(20) NOT NULL,
  `dayNumber` bigint(20) NOT NULL,
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
(21, 22, 7, '09:00:00', '09:00:00', 1, 0, 'Active'),
(23, 1, 1, '11:12:00', '00:01:00', 0, 0, 'active'),
(24, 24, 7, '15:03:00', '16:01:00', 1, 0, 'Active'),
(25, 1, 1, '09:30:00', '18:30:00', 0, 0, 'active'),
(28, 25, 1, '07:30:00', '17:30:00', 1, 1, 'Active'),
(30, 1, 1, '11:30:00', '15:33:00', 0, 0, 'active'),
(31, 1, 1, '23:30:00', '11:30:00', 1, 1, 'active'),
(32, 4, 7, '10:00:00', '21:30:00', 1, 0, 'Active'),
(33, 26, 7, '09:00:00', '09:00:00', 1, 0, 'Active'),
(34, 27, 7, '23:59:00', '23:59:00', 1, 0, 'Active'),
(35, 28, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(36, 29, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(37, 30, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(38, 31, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(39, 32, 7, '05:00:00', '09:00:00', 1, 0, 'Active'),
(40, 33, 7, '05:00:00', '09:00:00', 1, 0, 'Active'),
(41, 34, 7, '06:01:00', '05:09:00', 1, 0, 'Active'),
(42, 5, 1, '10:30:00', '10:38:00', 1, 0, 'Active'),
(43, 5, 2, '10:30:00', '10:30:00', 1, 0, 'Active'),
(44, 35, 7, '09:01:00', '04:09:00', 1, 0, 'Active'),
(45, 36, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(46, 37, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(47, 38, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(48, 39, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(49, 40, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(50, 41, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(51, 42, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(52, 43, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(53, 44, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(54, 45, 7, '23:07:00', '23:07:00', 1, 1, 'Active'),
(55, 46, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(56, 47, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(57, 48, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(58, 49, 7, '23:59:00', '23:59:00', 1, 0, 'Active'),
(59, 50, 7, '23:59:00', '23:59:00', 1, 0, 'Active'),
(60, 51, 7, '23:07:00', '23:07:00', 1, 0, 'Active'),
(61, 52, 7, '09:00:00', '08:00:00', 0, 1, 'Active'),
(62, 53, 7, '07:00:00', '07:00:00', 1, 0, 'Active'),
(63, 54, 7, '07:00:00', '07:00:00', 1, 0, 'Active'),
(64, 55, 7, '07:09:00', '06:09:00', 0, 0, 'Active'),
(65, 56, 7, '05:00:00', '07:00:00', 0, 0, 'Active'),
(66, 57, 7, '05:00:00', '07:00:00', 0, 0, 'Active'),
(67, 58, 7, '05:00:00', '07:00:00', 0, 0, 'Active'),
(68, 59, 7, '10:00:00', '06:00:00', 1, 0, 'Active'),
(69, 60, 6, '09:00:00', '07:00:00', 1, 0, 'Active'),
(70, 61, 7, '09:30:00', '08:00:00', 1, 0, 'Active'),
(71, 62, 7, '12:00:00', '12:00:00', 0, 0, 'Active'),
(72, 63, 7, '09:00:00', '05:00:00', 1, 0, 'Active'),
(73, 64, 7, '09:00:00', '05:30:00', 1, 0, 'Active'),
(74, 65, 4, '10:00:00', '07:30:00', 1, 1, 'Active'),
(75, 66, 7, '07:00:00', '05:00:00', 1, 0, 'Active'),
(76, 67, 7, '10:00:00', '06:00:00', 1, 0, 'Active'),
(77, 69, 6, '10:00:00', '11:00:00', 1, 1, 'Active'),
(78, 70, 1, '11:00:00', '19:00:00', 0, 0, 'Active'),
(79, 70, 2, '11:00:00', '19:00:00', 0, 0, 'Active'),
(80, 70, 6, '12:00:00', '00:00:00', 0, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `business_token`
--

CREATE TABLE `business_token` (
  `id` int(11) NOT NULL,
  `businessId` int(11) NOT NULL,
  `businessServiceId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `tokenDate` date NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `duration` double NOT NULL,
  `userId` int(11) NOT NULL,
  `bookedDateTime` datetime NOT NULL,
  `walletId` int(11) NOT NULL,
  `bookingRemarks` varchar(253) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_token`
--

INSERT INTO `business_token` (`id`, `businessId`, `businessServiceId`, `cityId`, `tokenDate`, `fromTime`, `toTime`, `duration`, `userId`, `bookedDateTime`, `walletId`, `bookingRemarks`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 1, 1, 1, '2023-06-01', '17:10:45', '17:10:45', 4, 1, '2023-06-01 17:10:45', 1, 'testing', '2023-06-01 17:10:45', '2023-06-01 17:10:45', 'active'),
(2, 1, 1, 1, '2023-07-13', '18:06:00', '06:16:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-12 18:06:10', '2023-07-12 18:06:10', 'open'),
(3, 22, 1, 2, '2023-07-16', '17:06:00', '05:16:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-15 11:37:13', '2023-07-15 11:37:13', 'open'),
(4, 2, 2, 2, '2023-07-17', '10:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(5, 2, 2, 2, '2023-07-17', '10:30:00', '16:00:00', 30, 5, '2023-07-16 07:55:25', 1, 'Ok', '2023-07-16 07:29:50', '2023-07-16 07:55:25', 'Booked'),
(6, 2, 2, 2, '2023-07-17', '11:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(7, 2, 2, 2, '2023-07-17', '11:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(8, 2, 2, 2, '2023-07-17', '12:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(9, 2, 2, 2, '2023-07-17', '12:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(10, 2, 2, 2, '2023-07-17', '13:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(11, 2, 2, 2, '2023-07-17', '13:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(12, 2, 2, 2, '2023-07-17', '14:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(13, 2, 2, 2, '2023-07-17', '14:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(14, 2, 2, 2, '2023-07-17', '15:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(15, 2, 2, 2, '2023-07-17', '15:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(16, 2, 2, 2, '2023-07-18', '10:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(17, 2, 2, 2, '2023-07-18', '10:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(18, 2, 2, 2, '2023-07-18', '11:00:00', '16:00:00', 30, 5, '2023-07-16 07:57:33', 2, 'Back pain', '2023-07-16 07:29:50', '2023-07-16 07:57:33', 'Booked'),
(19, 2, 2, 2, '2023-07-18', '11:30:00', '16:00:00', 30, 5, '2023-07-17 11:47:37', 6, 'General check up', '2023-07-16 07:29:50', '2023-07-17 11:47:37', 'Booked'),
(20, 2, 2, 2, '2023-07-18', '12:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(21, 2, 2, 2, '2023-07-18', '12:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(22, 2, 2, 2, '2023-07-18', '13:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(23, 2, 2, 2, '2023-07-18', '13:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(24, 2, 2, 2, '2023-07-18', '14:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(25, 2, 2, 2, '2023-07-18', '14:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(26, 2, 2, 2, '2023-07-18', '15:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(27, 2, 2, 2, '2023-07-18', '15:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(28, 2, 2, 2, '2023-07-19', '10:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(29, 2, 2, 2, '2023-07-19', '10:30:00', '16:00:00', 30, 5, '2023-07-17 12:23:25', 7, 'General check up', '2023-07-16 07:29:50', '2023-07-17 12:23:25', 'Booked'),
(30, 2, 2, 2, '2023-07-19', '11:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(31, 2, 2, 2, '2023-07-19', '11:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(32, 2, 2, 2, '2023-07-19', '12:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(33, 2, 2, 2, '2023-07-19', '12:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(34, 2, 2, 2, '2023-07-19', '13:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(35, 2, 2, 2, '2023-07-19', '13:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(36, 2, 2, 2, '2023-07-19', '14:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(37, 2, 2, 2, '2023-07-19', '14:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(38, 2, 2, 2, '2023-07-19', '15:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(39, 2, 2, 2, '2023-07-19', '15:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(40, 2, 2, 2, '2023-07-20', '10:00:00', '16:00:00', 30, 8, '2023-07-19 13:29:14', 11, 'Sugumar ', '2023-07-16 07:29:50', '2023-07-19 13:29:14', 'Booked'),
(41, 2, 2, 2, '2023-07-20', '10:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(42, 2, 2, 2, '2023-07-20', '11:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(43, 2, 2, 2, '2023-07-20', '11:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(44, 2, 2, 2, '2023-07-20', '12:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(45, 2, 2, 2, '2023-07-20', '12:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(46, 2, 2, 2, '2023-07-20', '13:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(47, 2, 2, 2, '2023-07-20', '13:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(48, 2, 2, 2, '2023-07-20', '14:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(49, 2, 2, 2, '2023-07-20', '14:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(50, 2, 2, 2, '2023-07-20', '15:00:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(51, 2, 2, 2, '2023-07-20', '15:30:00', '16:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:29:50', '2023-07-16 07:29:50', 'open'),
(52, 20, 2, 2, '2023-12-07', '11:00:00', '11:10:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 07:48:49', '2023-07-16 07:48:49', 'open'),
(53, 2, 3, 2, '2023-07-24', '06:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(54, 2, 3, 2, '2023-07-24', '06:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(55, 2, 3, 2, '2023-07-24', '06:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(56, 2, 3, 2, '2023-07-24', '06:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(57, 2, 3, 2, '2023-07-24', '07:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(58, 2, 3, 2, '2023-07-24', '07:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(59, 2, 3, 2, '2023-07-24', '07:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(60, 2, 3, 2, '2023-07-24', '07:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(61, 2, 3, 2, '2023-07-24', '08:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(62, 2, 3, 2, '2023-07-24', '08:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(63, 2, 3, 2, '2023-07-24', '08:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(64, 2, 3, 2, '2023-07-24', '08:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(65, 2, 3, 2, '2023-07-24', '09:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(66, 2, 3, 2, '2023-07-24', '09:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(67, 2, 3, 2, '2023-07-24', '09:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(68, 2, 3, 2, '2023-07-24', '09:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(69, 2, 3, 2, '2023-07-24', '10:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(70, 2, 3, 2, '2023-07-24', '10:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(71, 2, 3, 2, '2023-07-24', '10:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(72, 2, 3, 2, '2023-07-24', '10:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(73, 2, 3, 2, '2023-07-24', '11:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(74, 2, 3, 2, '2023-07-24', '11:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(75, 2, 3, 2, '2023-07-24', '11:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(76, 2, 3, 2, '2023-07-24', '11:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(77, 2, 3, 2, '2023-07-24', '12:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(78, 2, 3, 2, '2023-07-24', '12:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(79, 2, 3, 2, '2023-07-24', '12:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(80, 2, 3, 2, '2023-07-24', '12:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(81, 2, 3, 2, '2023-07-24', '13:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(82, 2, 3, 2, '2023-07-24', '13:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(83, 2, 3, 2, '2023-07-24', '13:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(84, 2, 3, 2, '2023-07-24', '13:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(85, 2, 3, 2, '2023-07-24', '14:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(86, 2, 3, 2, '2023-07-24', '14:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(87, 2, 3, 2, '2023-07-24', '14:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(88, 2, 3, 2, '2023-07-24', '14:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(89, 2, 3, 2, '2023-07-24', '15:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(90, 2, 3, 2, '2023-07-24', '15:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(91, 2, 3, 2, '2023-07-24', '15:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(92, 2, 3, 2, '2023-07-24', '15:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(93, 2, 3, 2, '2023-07-24', '16:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(94, 2, 3, 2, '2023-07-24', '16:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(95, 2, 3, 2, '2023-07-24', '16:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(96, 2, 3, 2, '2023-07-24', '16:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(97, 2, 3, 2, '2023-07-24', '17:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(98, 2, 3, 2, '2023-07-24', '17:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(99, 2, 3, 2, '2023-07-24', '17:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(100, 2, 3, 2, '2023-07-24', '17:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(101, 2, 3, 2, '2023-07-25', '06:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(102, 2, 3, 2, '2023-07-25', '06:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(103, 2, 3, 2, '2023-07-25', '06:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(104, 2, 3, 2, '2023-07-25', '06:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(105, 2, 3, 2, '2023-07-25', '07:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(106, 2, 3, 2, '2023-07-25', '07:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(107, 2, 3, 2, '2023-07-25', '07:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(108, 2, 3, 2, '2023-07-25', '07:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(109, 2, 3, 2, '2023-07-25', '08:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(110, 2, 3, 2, '2023-07-25', '08:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(111, 2, 3, 2, '2023-07-25', '08:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(112, 2, 3, 2, '2023-07-25', '08:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(113, 2, 3, 2, '2023-07-25', '09:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(114, 2, 3, 2, '2023-07-25', '09:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(115, 2, 3, 2, '2023-07-25', '09:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(116, 2, 3, 2, '2023-07-25', '09:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(117, 2, 3, 2, '2023-07-25', '10:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(118, 2, 3, 2, '2023-07-25', '10:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(119, 2, 3, 2, '2023-07-25', '10:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(120, 2, 3, 2, '2023-07-25', '10:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(121, 2, 3, 2, '2023-07-25', '11:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(122, 2, 3, 2, '2023-07-25', '11:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(123, 2, 3, 2, '2023-07-25', '11:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(124, 2, 3, 2, '2023-07-25', '11:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(125, 2, 3, 2, '2023-07-25', '12:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(126, 2, 3, 2, '2023-07-25', '12:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(127, 2, 3, 2, '2023-07-25', '12:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(128, 2, 3, 2, '2023-07-25', '12:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(129, 2, 3, 2, '2023-07-25', '13:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(130, 2, 3, 2, '2023-07-25', '13:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(131, 2, 3, 2, '2023-07-25', '13:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(132, 2, 3, 2, '2023-07-25', '13:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(133, 2, 3, 2, '2023-07-25', '14:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(134, 2, 3, 2, '2023-07-25', '14:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(135, 2, 3, 2, '2023-07-25', '14:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(136, 2, 3, 2, '2023-07-25', '14:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(137, 2, 3, 2, '2023-07-25', '15:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(138, 2, 3, 2, '2023-07-25', '15:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(139, 2, 3, 2, '2023-07-25', '15:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(140, 2, 3, 2, '2023-07-25', '15:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(141, 2, 3, 2, '2023-07-25', '16:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(142, 2, 3, 2, '2023-07-25', '16:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(143, 2, 3, 2, '2023-07-25', '16:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(144, 2, 3, 2, '2023-07-25', '16:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(145, 2, 3, 2, '2023-07-25', '17:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(146, 2, 3, 2, '2023-07-25', '17:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(147, 2, 3, 2, '2023-07-25', '17:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(148, 2, 3, 2, '2023-07-25', '17:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(149, 2, 3, 2, '2023-07-26', '06:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(150, 2, 3, 2, '2023-07-26', '06:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(151, 2, 3, 2, '2023-07-26', '06:30:00', '18:00:00', 15, 5, '2023-07-18 15:57:35', 10, 'Stomake pain ', '2023-07-16 18:02:31', '2023-07-18 15:57:35', 'Booked'),
(152, 2, 3, 2, '2023-07-26', '06:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(153, 2, 3, 2, '2023-07-26', '07:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(154, 2, 3, 2, '2023-07-26', '07:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(155, 2, 3, 2, '2023-07-26', '07:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(156, 2, 3, 2, '2023-07-26', '07:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(157, 2, 3, 2, '2023-07-26', '08:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(158, 2, 3, 2, '2023-07-26', '08:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(159, 2, 3, 2, '2023-07-26', '08:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(160, 2, 3, 2, '2023-07-26', '08:45:00', '18:00:00', 15, 5, '2023-07-20 04:37:02', 12, 'General check up\r\n', '2023-07-16 18:02:31', '2023-07-20 04:37:02', 'Booked'),
(161, 2, 3, 2, '2023-07-26', '09:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(162, 2, 3, 2, '2023-07-26', '09:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(163, 2, 3, 2, '2023-07-26', '09:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(164, 2, 3, 2, '2023-07-26', '09:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(165, 2, 3, 2, '2023-07-26', '10:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(166, 2, 3, 2, '2023-07-26', '10:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(167, 2, 3, 2, '2023-07-26', '10:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(168, 2, 3, 2, '2023-07-26', '10:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(169, 2, 3, 2, '2023-07-26', '11:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(170, 2, 3, 2, '2023-07-26', '11:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(171, 2, 3, 2, '2023-07-26', '11:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(172, 2, 3, 2, '2023-07-26', '11:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(173, 2, 3, 2, '2023-07-26', '12:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(174, 2, 3, 2, '2023-07-26', '12:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(175, 2, 3, 2, '2023-07-26', '12:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(176, 2, 3, 2, '2023-07-26', '12:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(177, 2, 3, 2, '2023-07-26', '13:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(178, 2, 3, 2, '2023-07-26', '13:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(179, 2, 3, 2, '2023-07-26', '13:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(180, 2, 3, 2, '2023-07-26', '13:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(181, 2, 3, 2, '2023-07-26', '14:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(182, 2, 3, 2, '2023-07-26', '14:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(183, 2, 3, 2, '2023-07-26', '14:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(184, 2, 3, 2, '2023-07-26', '14:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(185, 2, 3, 2, '2023-07-26', '15:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(186, 2, 3, 2, '2023-07-26', '15:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(187, 2, 3, 2, '2023-07-26', '15:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(188, 2, 3, 2, '2023-07-26', '15:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(189, 2, 3, 2, '2023-07-26', '16:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(190, 2, 3, 2, '2023-07-26', '16:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(191, 2, 3, 2, '2023-07-26', '16:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(192, 2, 3, 2, '2023-07-26', '16:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(193, 2, 3, 2, '2023-07-26', '17:00:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(194, 2, 3, 2, '2023-07-26', '17:15:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(195, 2, 3, 2, '2023-07-26', '17:30:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(196, 2, 3, 2, '2023-07-26', '17:45:00', '18:00:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-16 18:02:31', '2023-07-16 18:02:31', 'open'),
(197, 1, 3, 2, '0000-00-00', '11:00:00', '11:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 06:23:20', '2023-07-17 06:23:20', 'open'),
(198, 2, 2, 2, '2023-07-22', '10:00:00', '10:15:00', 15, 5, '2023-07-17 13:47:14', 8, 'Stomak pain', '2023-07-17 06:26:51', '2023-07-17 13:47:14', 'Booked'),
(199, 31, 4, 2, '2023-07-18', '11:00:00', '11:15:00', 15, 11, '2023-07-17 06:32:15', 3, 'Ent', '2023-07-17 06:31:23', '2023-07-17 06:32:15', 'Booked'),
(200, 30, 3, 2, '2023-07-22', '09:00:00', '09:15:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 06:46:15', '2023-07-17 06:46:15', 'open'),
(201, 30, 3, 2, '2023-07-18', '09:00:00', '09:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 06:48:17', '2023-07-17 06:48:17', 'open'),
(202, 30, 4, 2, '2023-07-19', '08:30:00', '08:50:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 06:49:39', '2023-07-17 06:49:39', 'open'),
(203, 31, 4, 2, '2023-07-20', '11:30:00', '12:00:00', 30, 11, '2023-07-17 06:52:24', 4, 'Ent', '2023-07-17 06:51:47', '2023-07-17 06:52:24', 'Booked'),
(204, 30, 4, 2, '2023-07-25', '09:00:00', '09:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 06:57:27', '2023-07-17 06:57:27', 'open'),
(205, 30, 4, 2, '2023-07-29', '10:30:00', '10:45:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 06:57:57', '2023-07-17 06:57:57', 'open'),
(206, 30, 5, 2, '2023-07-17', '11:30:00', '12:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:10:48', '2023-07-17 07:10:48', 'open'),
(207, 30, 5, 2, '2023-07-18', '11:30:00', '12:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:10:48', '2023-07-17 07:10:48', 'open'),
(208, 30, 5, 2, '2023-07-19', '11:30:00', '12:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:10:48', '2023-07-17 07:10:48', 'open'),
(209, 30, 5, 2, '2023-07-20', '11:30:00', '12:00:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:10:48', '2023-07-17 07:10:48', 'open'),
(210, 30, 2, 2, '2023-07-19', '10:00:00', '10:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:11:47', '2023-07-17 07:11:47', 'open'),
(211, 30, 4, 2, '2023-07-29', '08:00:00', '08:15:00', 15, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:14:38', '2023-07-17 07:14:38', 'open'),
(212, 29, 4, 2, '2023-07-18', '09:00:00', '09:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 07:22:25', '2023-07-17 07:22:25', 'open'),
(213, 36, 7, 2, '2023-07-18', '02:00:00', '02:20:00', 20, 15, '2023-07-17 08:07:09', 5, 'M', '2023-07-17 07:57:33', '2023-07-17 08:07:09', 'Booked'),
(214, 37, 5, 2, '2023-07-20', '05:00:00', '05:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 08:25:05', '2023-07-17 08:25:05', 'open'),
(215, 38, 5, 2, '2023-07-21', '11:00:00', '11:30:00', 30, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 09:49:43', '2023-07-17 09:49:43', 'open'),
(216, 39, 4, 2, '2023-07-21', '09:00:00', '09:10:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 10:10:40', '2023-07-17 10:10:40', 'open'),
(217, 40, 5, 2, '2023-07-22', '05:00:00', '05:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-17 11:01:53', '2023-07-17 11:01:53', 'open'),
(218, 41, 5, 2, '2023-07-19', '03:00:00', '03:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 05:57:24', '2023-07-18 05:57:24', 'open'),
(219, 42, 6, 2, '2022-07-23', '05:00:00', '05:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 06:08:11', '2023-07-18 06:08:11', 'open'),
(220, 43, 4, 2, '2023-07-21', '23:00:00', '11:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 06:24:25', '2023-07-18 06:24:25', 'open'),
(221, 44, 4, 2, '2023-07-19', '02:00:00', '02:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 06:56:44', '2023-07-18 06:56:44', 'open'),
(222, 45, 6, 2, '2023-07-23', '03:00:00', '03:10:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:12:34', '2023-07-18 07:12:34', 'open'),
(223, 46, 4, 2, '2023-07-20', '04:00:00', '04:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:19:07', '2023-07-18 07:19:07', 'open'),
(224, 47, 5, 2, '2023-07-24', '02:00:00', '02:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:26:56', '2023-07-18 07:26:56', 'open'),
(225, 48, 4, 2, '2023-07-20', '03:00:00', '03:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:35:13', '2023-07-18 07:35:13', 'open'),
(226, 49, 4, 2, '2023-07-25', '05:00:00', '05:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:41:46', '2023-07-18 07:41:46', 'open'),
(227, 50, 4, 2, '2023-07-26', '05:00:00', '05:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:49:38', '2023-07-18 07:49:38', 'open'),
(228, 51, 4, 2, '2023-07-25', '04:00:00', '04:20:00', 20, 0, '0000-00-00 00:00:00', 0, '', '2023-07-18 07:56:48', '2023-07-18 07:56:48', 'open'),
(229, 70, 21, 2, '2023-08-01', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(230, 70, 21, 2, '2023-08-01', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(231, 70, 21, 2, '2023-08-01', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(232, 70, 21, 2, '2023-08-02', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(233, 70, 21, 2, '2023-08-02', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(234, 70, 21, 2, '2023-08-02', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(235, 70, 21, 2, '2023-08-03', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(236, 70, 21, 2, '2023-08-03', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(237, 70, 21, 2, '2023-08-03', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(238, 70, 21, 2, '2023-08-04', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(239, 70, 21, 2, '2023-08-04', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(240, 70, 21, 2, '2023-08-04', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(241, 70, 21, 2, '2023-08-05', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(242, 70, 21, 2, '2023-08-05', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(243, 70, 21, 2, '2023-08-05', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(244, 70, 21, 2, '2023-08-06', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(245, 70, 21, 2, '2023-08-06', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(246, 70, 21, 2, '2023-08-06', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(247, 70, 21, 2, '2023-08-07', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(248, 70, 21, 2, '2023-08-07', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(249, 70, 21, 2, '2023-08-07', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(250, 70, 21, 2, '2023-08-08', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(251, 70, 21, 2, '2023-08-08', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(252, 70, 21, 2, '2023-08-08', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(253, 70, 21, 2, '2023-08-09', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(254, 70, 21, 2, '2023-08-09', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(255, 70, 21, 2, '2023-08-09', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(256, 70, 21, 2, '2023-08-10', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(257, 70, 21, 2, '2023-08-10', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(258, 70, 21, 2, '2023-08-10', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(259, 70, 21, 2, '2023-08-11', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(260, 70, 21, 2, '2023-08-11', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(261, 70, 21, 2, '2023-08-11', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(262, 70, 21, 2, '2023-08-12', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(263, 70, 21, 2, '2023-08-12', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(264, 70, 21, 2, '2023-08-12', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(265, 70, 21, 2, '2023-08-13', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(266, 70, 21, 2, '2023-08-13', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(267, 70, 21, 2, '2023-08-13', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(268, 70, 21, 2, '2023-08-14', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(269, 70, 21, 2, '2023-08-14', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(270, 70, 21, 2, '2023-08-14', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(271, 70, 21, 2, '2023-08-15', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(272, 70, 21, 2, '2023-08-15', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(273, 70, 21, 2, '2023-08-15', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(274, 70, 21, 2, '2023-08-16', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(275, 70, 21, 2, '2023-08-16', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(276, 70, 21, 2, '2023-08-16', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(277, 70, 21, 2, '2023-08-17', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(278, 70, 21, 2, '2023-08-17', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(279, 70, 21, 2, '2023-08-17', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(280, 70, 21, 2, '2023-08-18', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(281, 70, 21, 2, '2023-08-18', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(282, 70, 21, 2, '2023-08-18', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(283, 70, 21, 2, '2023-08-19', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(284, 70, 21, 2, '2023-08-19', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(285, 70, 21, 2, '2023-08-19', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(286, 70, 21, 2, '2023-08-20', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(287, 70, 21, 2, '2023-08-20', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(288, 70, 21, 2, '2023-08-20', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(289, 70, 21, 2, '2023-08-21', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(290, 70, 21, 2, '2023-08-21', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(291, 70, 21, 2, '2023-08-21', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(292, 70, 21, 2, '2023-08-22', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(293, 70, 21, 2, '2023-08-22', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(294, 70, 21, 2, '2023-08-22', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(295, 70, 21, 2, '2023-08-23', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(296, 70, 21, 2, '2023-08-23', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(297, 70, 21, 2, '2023-08-23', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(298, 70, 21, 2, '2023-08-24', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(299, 70, 21, 2, '2023-08-24', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(300, 70, 21, 2, '2023-08-24', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(301, 70, 21, 2, '2023-08-25', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(302, 70, 21, 2, '2023-08-25', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(303, 70, 21, 2, '2023-08-25', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(304, 70, 21, 2, '2023-08-26', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(305, 70, 21, 2, '2023-08-26', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(306, 70, 21, 2, '2023-08-26', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(307, 70, 21, 2, '2023-08-27', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(308, 70, 21, 2, '2023-08-27', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(309, 70, 21, 2, '2023-08-27', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(310, 70, 21, 2, '2023-08-28', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(311, 70, 21, 2, '2023-08-28', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(312, 70, 21, 2, '2023-08-28', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(313, 70, 21, 2, '2023-08-29', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(314, 70, 21, 2, '2023-08-29', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(315, 70, 21, 2, '2023-08-29', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(316, 70, 21, 2, '2023-08-30', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(317, 70, 21, 2, '2023-08-30', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(318, 70, 21, 2, '2023-08-30', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(319, 70, 21, 2, '2023-08-31', '11:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(320, 70, 21, 2, '2023-08-31', '12:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(321, 70, 21, 2, '2023-08-31', '13:00:00', '14:00:00', 60, 0, '0000-00-00 00:00:00', 0, '', '2023-07-26 22:46:00', '2023-07-26 22:46:00', 'open'),
(376, 2, 2, 2, '2023-07-29', '08:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(377, 2, 2, 2, '2023-07-29', '08:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(378, 2, 2, 2, '2023-07-29', '08:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(379, 2, 2, 2, '2023-07-29', '08:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(380, 2, 2, 2, '2023-07-29', '08:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(381, 2, 2, 2, '2023-07-29', '08:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(382, 2, 2, 2, '2023-07-29', '09:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(383, 2, 2, 2, '2023-07-29', '09:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(384, 2, 2, 2, '2023-07-29', '09:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(385, 2, 2, 2, '2023-07-29', '09:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(386, 2, 2, 2, '2023-07-29', '09:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(387, 2, 2, 2, '2023-07-29', '09:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(388, 2, 2, 2, '2023-07-29', '10:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(389, 2, 2, 2, '2023-07-29', '10:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(390, 2, 2, 2, '2023-07-29', '10:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(391, 2, 2, 2, '2023-07-29', '10:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(392, 2, 2, 2, '2023-07-29', '10:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(393, 2, 2, 2, '2023-07-29', '10:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(394, 2, 2, 2, '2023-07-30', '08:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(395, 2, 2, 2, '2023-07-30', '08:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(396, 2, 2, 2, '2023-07-30', '08:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(397, 2, 2, 2, '2023-07-30', '08:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(398, 2, 2, 2, '2023-07-30', '08:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(399, 2, 2, 2, '2023-07-30', '08:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(400, 2, 2, 2, '2023-07-30', '09:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open');
INSERT INTO `business_token` (`id`, `businessId`, `businessServiceId`, `cityId`, `tokenDate`, `fromTime`, `toTime`, `duration`, `userId`, `bookedDateTime`, `walletId`, `bookingRemarks`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(401, 2, 2, 2, '2023-07-30', '09:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(402, 2, 2, 2, '2023-07-30', '09:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(403, 2, 2, 2, '2023-07-30', '09:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(404, 2, 2, 2, '2023-07-30', '09:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(405, 2, 2, 2, '2023-07-30', '09:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(406, 2, 2, 2, '2023-07-30', '10:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(407, 2, 2, 2, '2023-07-30', '10:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(408, 2, 2, 2, '2023-07-30', '10:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(409, 2, 2, 2, '2023-07-30', '10:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(410, 2, 2, 2, '2023-07-30', '10:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(411, 2, 2, 2, '2023-07-30', '10:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(412, 2, 2, 2, '2023-07-31', '08:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(413, 2, 2, 2, '2023-07-31', '08:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(414, 2, 2, 2, '2023-07-31', '08:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(415, 2, 2, 2, '2023-07-31', '08:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(416, 2, 2, 2, '2023-07-31', '08:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(417, 2, 2, 2, '2023-07-31', '08:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(418, 2, 2, 2, '2023-07-31', '09:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(419, 2, 2, 2, '2023-07-31', '09:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(420, 2, 2, 2, '2023-07-31', '09:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(421, 2, 2, 2, '2023-07-31', '09:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(422, 2, 2, 2, '2023-07-31', '09:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(423, 2, 2, 2, '2023-07-31', '09:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(424, 2, 2, 2, '2023-07-31', '10:00:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(425, 2, 2, 2, '2023-07-31', '10:10:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(426, 2, 2, 2, '2023-07-31', '10:20:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(427, 2, 2, 2, '2023-07-31', '10:30:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(428, 2, 2, 2, '2023-07-31', '10:40:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open'),
(429, 2, 2, 2, '2023-07-31', '10:50:00', '11:00:00', 10, 0, '0000-00-00 00:00:00', 0, '', '2023-07-29 00:05:26', '2023-07-29 00:05:26', 'open');

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
  `contactCount` bigint(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `isBooking`, `isGallery`, `isProduct`, `isRide`, `isFeedback`, `contactCount`, `status`) VALUES
(1, 'Hospital', 'png', '0', '0', '1', '0', '1', 10, 'Active'),
(2, 'Temple', 'png', '1', '1', '1', '0', 'ctrmbjuy ', 3, 'Active'),
(3, 'Tea shop', 'png', '0', '0', '3', '0', '1', 2, 'Active'),
(4, 'Textiles', 'png', '1', '1', '0', '0', '0', 987654321, 'Active'),
(5, 'Academy', 'jpg', '0', '0', '0', '0', 'Good academy', 123, 'Active'),
(6, 'Education', 'png', '0', '0', '0', '0', '0', 8765900, 'Active'),
(7, 'Restaurants', 'jpg', '0', '0', '0', '0', '0', 612345789, 'Active'),
(8, ' Astrology', 'jpg', '5', '0', '0', '0', '0', 5, 'Active'),
(9, 'Beauty care', 'jpg', '0', '0', '0', '0', '0', 0, 'Active'),
(10, 'Ayurveda', 'jpg', '1', '1', '1', '2', '1', 6, 'Active'),
(11, 'Institution', 'png', '2', '5', '5', '1', 'ewgfrhliuokjuyhtgfcvbun', 8, 'Active'),
(12, 'Tourist ', 'jpeg', '1', '1', '1', '1', '1', 1, 'Active'),
(13, 'Pastry Shops', 'jpeg', '0', '0', '0', '0', '0', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) NOT NULL,
  `stateId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `lng` varchar(254) NOT NULL,
  `lat` varchar(254) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `stateId`, `name`, `image`, `lng`, `lat`, `status`) VALUES
(1, 1, 'Madurai', 'jpg', '9.913742532805472', '78.11351838936287', 'Active'),
(2, 1, 'Trichy', 'jpeg', '10.78309306341308', '78.68212610299977', 'Active'),
(3, 1, 'Ariyalur', 'jpeg', '11.137105703062208', '79.07659078248831', 'Active'),
(4, 1, 'Chengalpattu', 'jpg', '12.679000815889857', '79.98649022407788', 'Active'),
(5, 1, 'Chennai', 'jpg', '13.068182562950634', '80.20157448440622', 'Active'),
(6, 1, 'coimbatore', '', '10.98430038571109', '76.89032547356518', 'active'),
(7, 1, 'Cuddalore', '', '11.747997230441747', '79.76906964895744', 'active'),
(8, 1, 'Dharmapuri', '', '12.119231916938926', '78.15431623706729', 'active'),
(9, 1, 'Dindigul', '', '10.36229460541355', '77.97048778608516', 'active'),
(10, 1, 'Erode', '', '11.334159786527893', '77.71573504492571', 'active'),
(11, 1, 'Kallakurichi', '', '11.737575382328332', '78.96448519550556', 'active'),
(12, 1, 'Kancheepuram', '', '12.819459897034829', '79.69620347090265', 'active'),
(13, 1, 'Karur', '', '10.957396523547697', '78.07087453659571', 'active'),
(14, 1, 'Kirshnagiri', '', '12.526146715975873', ' 78.21826189982265', 'active'),
(15, 1, 'Mayiladuthurai', '', '11.101391114523786', ' 79.65411347038635', 'active'),
(16, 1, 'Nagapattinam', '', '10.784132264223276', '79.83664739959761', 'active'),
(17, 1, 'Kanyakumari', '', '8.082662853493654', '77.5508485469994', 'active'),
(18, 1, 'Namakkal', '', '11.215858731308295', '78.16568364454564', 'active'),
(19, 1, 'Perambalur', '', '11.234336302198654', '78.8832600386263', 'active'),
(20, 1, 'Pudukkottai', '', '10.383075272980431', '78.80266092305288', 'active'),
(21, 1, 'Ramanathapuram', '', '9.361899082977178', '78.83910304870047', 'active'),
(22, 1, 'Ranipet', '', '12.946531254097396', '79.3136917097936', 'active'),
(23, 1, 'Selam', '', '11.656749571098677', '78.14344181904977', 'active'),
(24, 1, 'Sivagangai', '', '9.840794912841542', '78.48231336959977', 'active'),
(25, 1, 'Tenkasi', '', '8.954986302706237', '77.3151647166049', 'active'),
(26, 1, 'Thanjavur', '', '10.779454120968538', '79.12011451109727', 'active'),
(27, 1, 'Theni', '', '10.007172403576858', '77.46370596043441', 'active'),
(28, 1, 'Thiruvallur', '', '13.121548059652282', '79.91229373361271', 'active'),
(29, 1, 'Thiruvarur', '', '10.76465341345643', '79.63259101037988', 'active'),
(30, 1, 'Thoothukudi', '', '8.755228179164769', '78.12403952433763', 'active'),
(31, 1, 'Tirunelveli', '', '8.695082107243621', ' 77.75727872883567', 'active'),
(32, 1, 'Tirupattur', '', '12.49111221559561', '78.56522164892593', 'active'),
(33, 1, 'Tiruppur', '', '11.097790361641698', '77.34114836730743', 'active'),
(34, 1, 'Tiruvannamalai', '', '12.22139301115875', '79.07337127219428', 'active'),
(35, 1, 'Nilgiris', '', '11.505362319831569', '76.54840684573621', 'active'),
(36, 1, 'Vellore', '', '12.910004702689157', '79.12417363979696', 'active'),
(37, 1, 'Viluppuram', '', '11.936528811331913', ' 79.48508779303413', 'active'),
(38, 1, 'Virudhunagar', '', '9.564629492409734', '77.9520053822435', 'active');

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
(7, 'msg_sms_sender_id', 'OTWOIN', 'active'),
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
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`id`, `name`, `image`, `status`) VALUES
(1, 'Whatsapp', 'webp', 'Active'),
(2, 'Email', 'png', 'Active'),
(3, 'Telephone', 'png', 'Active'),
(4, 'Tollfree Number', 'jpeg', 'Active');

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
  `id` bigint(20) NOT NULL,
  `eventCategoryId` bigint(20) NOT NULL,
  `cityId` bigint(20) NOT NULL,
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
(3, 3, 2, '2023-07-08', 'School porgram', '<p>School Programasdf asdf</p><p>asdfasdf <strong>asdf</strong></p>', 'jpg', 'Vasanth Illam, 13/4, Vinayagar St, 2nd Cross, IOB Nagar, Karumandapam, Tiruchirappalli, Tamil Naduu', '0000-00-00 00:00:00', '2023-07-27 00:04:36', 'Active'),
(4, 4, 2, '2023-07-26', 'galacxy', 'super', 'jpg', '90/2, main road,trichy017', '2023-07-10 12:32:45', '2023-07-10 12:32:45', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `image`, `status`) VALUES
(3, 'Wedding / Marriages / Family Functions', 'jpg', 'Active'),
(4, 'photostudio', 'jpg', 'Active'),
(5, 'Sports Day', 'jpg', 'Active');

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
-- Table structure for table `host_video`
--

CREATE TABLE `host_video` (
  `id` bigint(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` longtext NOT NULL,
  `video` varchar(254) NOT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `host_video`
--

INSERT INTO `host_video` (`id`, `title`, `description`, `video`, `createdDateTime`, `updatedDateTime`, `status`) VALUES
(1, 'testing', '<p>testing <strong>asdf </strong>asd asdfa</p>', 'mp4', '2023-07-27 00:28:31', '2023-07-27 00:28:31', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) NOT NULL,
  `cityId` bigint(20) NOT NULL,
  `postCategoryId` bigint(20) NOT NULL,
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
(1, 3, 2, 'Best Automobile', '<p>Best Automobile <strong>Automobile </strong>for cars and bikesasdf</p><p>asdf</p><p>asdf</p>', '2023-07-06 08:41:36', '2023-07-27 00:00:55', 'png', 'active'),
(4, 2, 2, 'vettaiyaadu vilaiyaadu  ', 'The actor’s cop drama, “Vettaiyaadu Vilaiyaadu,” directed by renowned filmmaker Gautham Vasudev Menon, is set for a re-release. The film is scheduled to hit the big screens again on June 23, 2023, with ticket prices fixed at Rs. 99 in a few places. The bookings have also opened in several locations.\r\n\r\n\r\n\r\nபிரபல இயக்குனர் கௌதம் வாசுதேவ் மேனன் இயக்கத்தில் இவர் நடித்த \'வேட்டையாடு விளையாடு\' படம் ரீ-ரிலீசுக்கு தயாராக உள்ளது . இப்படம் மீண்டும் ஜூன் 23, 2023 அன்று பெரிய திரைக்கு வரவுள்ளது, ஒரு சில இடங்களில் டிக்கெட் விலை ரூ .99 ஆக நிர்ணயிக்கப்பட்டுள்ளது. இதற்கான முன்பதிவும் பல இடங்களில் தொடங்கியுள்ளது.', '2023-07-06 18:29:34', '2023-07-06 18:29:34', 'jpg', 'active'),
(6, 2, 2, 'Kallanai dem', 'Kallanai also known as the Grand Anicut is an ancient dam built by Karikala of Chola dynasty in 150 CE. It is built (in running water) across the Kaveri river flowing from Tiruchirapalli District to Thanjavur district, Tamil Nadu, India.The Kaveri river splits into two at a point 20 miles (32 km) west of Kallanai. The two rivers form the island of Srirangam before joining at Kallanai. \r\nThe northern channel is called the Kollidam (Coleroon); the other retains the name Kaveri, and empties into the Bay of Bengal at Poompuhar. On the seaward face of its delta are the seaports of Nagapattinam and Karaikal.The purpose of the Kallanai was to divert the waters of the Kaveri across the fertile delta region for irrigation via canal.\r\n\r\n', '2023-07-11 11:06:06', '2023-07-11 11:06:10', 'jpeg', 'active'),
(7, 2, 2, 'Rock Fort', 'Tiruchirappalli Rockfort, locally known as Malaikottai, is a historic fortification and temple complex built on an ancient rock. It is located in the city of Tiruchirappalli, on the banks of river Kaveri, Tamil Nadu, India. It is constructed on an 83 metres (272 ft) high rock. There are two Hindu temples inside, the Ucchi Pillayar Temple, Rockfort and the Thayumanaswami Temple, Rockfort. Rockfort is the most prominent landmark of the city.', '2023-07-11 11:09:43', '2023-07-11 11:09:59', 'jpg', 'active'),
(8, 2, 2, 'Srirangam', 'Sri Ranganathaswamy Temple\r\nSrirangam is famous for its Sri Ranganathaswamy Temple, a major pilgrimage destination for Hindus especially Sri Vaishnavas and the largest temple complex in India.\r\nThe southern gopuram of the temple, called the Rajagopuram, is 239.5 feet tall and, as of 2016, is the tallest in Asia. There is a gopuram fully made of gold, which is protected by an electrical fence. Clothes such as silk sarees, dhoti and towels, which are used for religious purposes are auctioned here. \r\n', '2023-07-11 11:25:16', '2023-07-11 11:25:26', 'jpg', 'active'),
(9, 2, 6, 'Our Lady of Lourdes Church', 'The foundation was laid during 1895 and the construction completed by 1903 when it was thrown open to public. The images of St. Ignatius, St. Francis Xavier, Sacred Heart of Jesus, St. Peter, and St. John de Britto on the middle of the spire is the most notable feature of the church.Our Lady of Lourdes Church is located opposite to Main Guard gate in Trichy, a major City in the South Indian state of Tamil Nadu. The church is located in the premises of St. Joseph\'s College Higher Secondary School, Trichy. The church is decked out in Gallo-Catholic design, from neo-Gothic spires to anguished scenes of crucifixion and martyrdom painted inside. In a note of cross-religious pollination, icons of Virgin Mary are garlanded in flower necklaces.', '2023-07-11 11:37:52', '2023-07-18 10:41:50', 'jpg', 'active'),
(10, 2, 7, 'Government Museum,Chennai', 'This place is known for preserving some of the best ancient (10-13th century) and modern South Indian bronzes. What’s more is that the Amaravathi Gallery houses marble sculptures depicting the life of Gautam Buddha dating as back to 2nd century. Truly a gem of a place to visit in Chennai for kids and grownups alike!', '2023-07-11 16:08:19', '2023-07-26 23:51:12', 'jpg', 'active'),
(11, 1, 2, 'Royapuram Fishing Harbour', 'A fishing harbour might not sound too appealing, but watching the fishermen bring freshly caught fish makes for a sight to behold. Also, remember to click photos of the stunning dock and backwaters while here. Thinking what fun activities you can indulge in here? Maybe learn how to catch a fish or simply distinguish between the different varieties of fish! Come here early morning to see the catch being unloaded and then being auctioned to restaurateurs from around the city.', '2023-07-11 16:14:20', '2023-07-17 13:42:02', 'jpg', 'active'),
(12, 4, 2, ' Madras War Cemetery', 'Pay your respects at the tranquil Madras War Cemetery, which houses an memorial stone in honour of the 1000 people who sacrificed their lives in the Great War and the remains of almost 855 martyrs from the Second World War. its Locationin Mount Poonamalle High Road, Nandambakkam \r\nTimings: 10:30 am to 5:30 pm (till 6:00 pm on Monday) ', '2023-07-11 16:18:43', '2023-07-17 13:42:31', 'jpg', 'active'),
(13, 6, 7, 'Marina Beach', 'Beaches in Chennai along the Bay of Bengal coast, it happens to be the longest beach in India and one of the longest in the world. Got enough time to pay a visit to this amazing place during the morning or evening? We suggest that you should not miss out on experiencing the enthralling view of the sun setting or rising from the beach.  Among the best places to visit in Chennai with friends, it is perfect to build sand castles or play games like beach volleyball.', '2023-07-11 16:22:14', '2023-07-18 11:01:30', 'jpg', 'active'),
(14, 2, 2, 'Maaveeran', 'Maaveeran is a mystery story with action-comedy elements that centres on an encounter between a big-shark politician and the art director of a news channel. However, he was naturally so polite and gentle that he couldn\'t defend himself in a typical scenario.\r\n', '2023-07-11 16:46:22', '2023-07-11 16:46:43', 'jpg', 'active'),
(15, 1, 2, 'MEENAKSHI AMMAN TEMPLE', 'THE MEENAKSHI AMMAN TEMPLE IS the heart of the ancient city of Madurai in Tamil Nadu, India. A religious and mythological symbol dating back 2,500 years, the temple’s 14 towers are each covered in thousands of colorful stone figures depicting animals, gods and demons. \r\n\r\nThis sacred site draws in upwards of one million visitors each year for the 10-day Chithirai Festival to celebrate the marriage of Meenakshi (the Hindu Goddess Parvati) to Sundareswara (the Hindu God Shiva) — a divine marriage believed by Hindus to be the “biggest event on Earth.” \r\nThe Meenakshi Amman Temple remains standing today, the tallest tower reaching 170 feet high. The historic temple was even nominated for the New Seven Wonders of the World. \r\n\r\n\r\n', '2023-07-12 12:59:39', '2023-07-12 13:00:37', 'jpg', 'active'),
(16, 1, 2, 'Gandhi Memorial Museum', 'Gandhi Memorial Museum, established in 1959, is a memorial museum for Mahatma Gandhi located in the city of Madurai in Tamil Nadu, India. Known as Gandhi Museum, it is now one of the five Gandhi Sanghralayas (Gandhi Museums) in the country. It includes a part of the blood-stained garment worn by Gandhi when he was assassinated by Nathuram Godse.\r\nYears after the assassination of Mahatma Gandhi, in 1948 an appeal was made to the citizens of India nationwide to build memorials for him. With the help of contributions from poor and rich citizens of India, a trust was established for this cause, the Mahatma Gandhi National Memorial Trust. This museum was inaugurated by the former Prime Minister Jawaharlal Nehru on 15 April 1959. Gandhi Memorial Museum in Madurai comes under the Peace Museums Worldwide selected by the United Nations Organisation (UNO). The palace of Rani Mangammal was renovated and converted into the museum. It is near the Madurai Collector Office.', '2023-07-12 13:01:56', '2023-07-12 13:02:32', 'jpg', 'active'),
(17, 1, 2, 'Keezhadi', 'Keezhadi (Tamil: கீழடி, romanized: kīḻaṭi) is a village near the village of Silaiman, on the border between Madurai and Sivagangai districts, in Tamil Nadu, India. The Keezhadi excavation site is located in this area: excavations carried out by the Archaeological Survey of India (ASI) and the Tamil Nadu Archaeology Department (TNAD) have revealed a Sangam era settlement dated to the 6th century BCE by radiocarbon dating.[1] Claims that the results show that there was writing at that time have been challenged. It is not clear whether the potsherds containing inscriptions were found in the same archaeological layer as the 6th century samples, and University of Calcutta archaeologist Bishnupriya Basak said that \"This unfortunately is not clear from the report and is very crucial\", adding that the issues of \"layer, period and absolute dates\" needed clarity. Dravidian University archaeologist E. Harsha Vardhan said that a single report was not enough to \"state scientifically that the Tamil-Brahmi script belongs to the sixth century BC\".[2]\r\n The museum has been established at a cost of ₹18.42 crore across 31,000 square feet of land. Built in a traditional Chettinad style, the architecture displays artefacts and antiquities excavated from the site since 2017 in the present-day Sivaganga district by the Tamil Nadu State Department of Archaeology.\r\n', '2023-07-12 13:03:34', '2023-07-12 13:04:04', 'jpg', 'active'),
(18, 1, 2, 'MEENAKSHI AMMAN TEMPLE', 'THE MEENAKSHI AMMAN TEMPLE IS the heart of the ancient city of Madurai in Tamil Nadu, India. A religious and mythological symbol dating back 2,500 years, the temple’s 14 towers are each covered in thousands of colorful stone figures depicting animals, gods and demons. \r\n\r\nThis sacred site draws in upwards of one million visitors each year for the 10-day Chithirai Festival to celebrate the marriage of Meenakshi (the Hindu Goddess Parvati) to Sundareswara (the Hindu God Shiva) — a divine marriage believed by Hindus to be the “biggest event on Earth.” \r\nThe Meenakshi Amman Temple remains standing today, the tallest tower reaching 170 feet high. The historic temple was even nominated for the New Seven Wonders of the World. \r\n', '2023-07-12 13:08:44', '2023-07-12 13:11:23', 'jpg', 'active'),
(19, 1, 2, 'MEENAKSHI AMMAN TEMPLE', 'THE MEENAKSHI AMMAN TEMPLE IS the heart of the ancient city of Madurai in Tamil Nadu, India. A religious and mythological symbol dating back 2,500 years, the temple’s 14 towers are each covered in thousands of colorful stone figures depicting animals, gods and demons. \r\n\r\nThis sacred site draws in upwards of one million visitors each year for the 10-day Chithirai Festival to celebrate the marriage of Meenakshi (the Hindu Goddess Parvati) to Sundareswara (the Hindu God Shiva) — a divine marriage believed by Hindus to be the “biggest event on Earth.” \r\nThe Meenakshi Amman Temple remains standing today, the tallest tower reaching 170 feet high. The historic temple was even nominated for the New Seven Wonders of the World. \r\n\r\n', '2023-07-12 13:12:37', '2023-07-12 13:12:40', 'jpg', 'active'),
(20, 1, 2, 'Thirumalai Nayakkar Mahal', 'The Nayaks of Madurai ruled this Kingdom from 1545 until the 1740s and Thirumalai Nayak (1623-1659) was one of their greatest kings notable for various buildings in and around Madurai. During the 17th centuries the Madurai Kingdom had Portuguese, Dutch and other Europeans as traders, missionaries and visiting travellers.', '2023-07-17 08:15:34', '2023-07-17 08:15:40', 'jpg', 'active'),
(21, 17, 2, 'Thiruvalluvar Statue', 'This gigantic statue adjacent to Vivekananda Rock Memorial is a popular attraction among history lovers and architecture buffs. It is dedicated to Thiruvalluvar, a prominent Tamil poet and philosopher. The 133-foot-tall statue stands proudly on a 38-foot-tall pedestal and can be seen from afar. The pedestal’s height represents the 38 chapters of virtue in his literary masterpiece Tirukkual, while the statue’s height signifies the 133 chapters in the same book. The place holds great cultural significance and is a popular tourist destination in Kanyakumari\r\n', '2023-07-17 11:53:21', '2023-07-17 11:54:04', 'jpg', 'active'),
(22, 17, 2, 'Our Lady of Ransom Church', 'This beautiful church dedicated to Mother Mary, located near the beach with lashing waves of the ocean behind it, is one of the best places to visit in Kanyakumari. The church has brilliant Gothic architecture, with eye-catching carvings on the walls and ceilings. The most intriguing aspect of the holy place is that it houses a saree-clad idol of Mother Mary, which is unusual in a church. If you go in the evening, you will be astounded by how beautiful the place looks when it is lit up.', '2023-07-18 10:51:07', '2023-07-18 10:51:11', 'jpg', 'active'),
(23, 17, 7, 'Kanyakumari Beach', 'If you enjoy visiting beaches, Kanyakumari Beach will captivate you. The beach is a confluence of three major water bodies – the Bay of Bengal, the Indian Ocean and the Arabian Sea. The beach is amazing because the water from these three water bodies does not mix, so you can see three different shades of water here. Although the beach is not suitable for water activities, you can spend some serene time here admiring the sunrise, sunset, and the waves splashing against the rocks.', '2023-07-18 11:04:57', '2023-07-18 11:05:01', 'jpg', 'active'),
(24, 17, 7, 'Thirparappu Falls', 'Thirparappu waterfall, which cascades from a height of 50-feet, is one of the most spectacular places to visit in Kanyakumari. This man-made waterfall is actually a collection of streams that cascade into a pool below. Apart from soaking in the beauty of the falls, you can take a refreshing dip in the pool, enjoy a picnic in the natural environs, take a boat ride in the area, and click beautiful photos. Devotees visiting the falls can also seek blessings at the small Shiva Temple at the entrance.\r\n', '2023-07-18 11:06:36', '2023-07-18 11:09:43', 'jpg', 'active'),
(25, 17, 7, 'Padmanabhapuram Palace', 'Padmanabhapuram Palace, popular as Asia’s largest wooden palace, exhibits the brilliant craftsmanship of the local carpenters. It was constructed in the 16th century by Iravi Varma Kulasekhara Perumal of the Travancore dynasty and is nothing less than an architectural marvel. From murals, beautiful furniture and floor carvings to eye-catching antiques and unique artefacts, everything about the palace is exceptional. The palace’s various sections, like Mantrasala, Thaikottaram, Nataksala, Central Mansion and Thekeekottaram, are worth exploring.', '2023-07-18 11:15:21', '2023-07-18 11:15:25', 'jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL,
  `status` varchar(254) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `image`, `status`) VALUES
(2, 'Top 51', 'jpeg', 'Active'),
(3, 'Pure veg restaurant', 'webp', 'Active'),
(4, 'Education', 'jpg', 'Active'),
(5, 'Restaurent', 'jpg', 'Active'),
(6, 'Church', 'jpg', 'Active'),
(7, 'Top 5 Tourist places', 'jpeg', 'Active'),
(8, 'Temples', 'jpeg', 'Active');

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
  `id` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `categoryId`, `name`, `status`) VALUES
(1, 1, 'Diabetics', 'Active'),
(2, 1, 'ENT', 'Active'),
(3, 8, 'Astrologer ', 'Active'),
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
(20, 8, 'Astrologer ', 'Active'),
(21, 10, 'Skin Care', 'Active'),
(22, 7, 'Non-veg   restaurants', 'Active'),
(23, 1, 'Diabetic', 'Active'),
(24, 3, 'Naganathar', 'Active'),
(25, 1, 'General service', 'Active'),
(29, 2, 'Rock fort Ganapathi Temple ', 'Active'),
(30, 2, 'Samayapuram Mariamman Temple', 'Active'),
(31, 2, 'Tiruvanaikovil Arulmigu Jambukeswarar Akilandeswari Temple', 'Active'),
(32, 2, 'Srirangam', 'Active'),
(44, 2, 'Church', 'Active'),
(45, 2, 'Pallivasal', 'Active'),
(46, 12, 'Kallanai Dam', 'Active'),
(47, 12, 'Butterfly Park', 'Active'),
(48, 12, 'Trichy Railway Museum', 'Active'),
(49, 12, 'Marina Beach', 'Active'),
(50, 12, 'Arignar Anna Zoological Park', 'Active'),
(51, 12, 'Government Museum Chennai', 'Active'),
(52, 12, 'VOC park and zoo', 'Active'),
(53, 12, 'Monkey Fall', 'Active'),
(54, 13, 'Universal Pastry Shop', 'Active'),
(55, 2, 'General service', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(254) NOT NULL,
  `genderId` bigint(20) NOT NULL,
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
(1, 'admin', 0, '12312312322', '123123123', 'admin@gmail.com', '2023-06-01 17:10:45', '', '', 'admin', 1, 'Sunday2027', 'active'),
(2, 'Ramasamy', 0, '123123123', '', 'ram@gmail.com', '2023-06-01 17:10:45', '66A, Thambaram, Chennai.', '600098', 'customer', 2, '123', 'active'),
(3, 'Priya', 0, '9688622860', '9966558669', 'priya1@mail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '1234', 'active'),
(4, 'Kanish Kumar', 0, '9364444477', '9364444477', 'kumar.kanish@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '123456789', 'active'),
(5, 'arockia doss', 0, '9566435212', '9566435212', 'blessi24109@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '1975', 'active'),
(6, 'Vinitha', 0, '6374359820', '6374359820', 'vinibalu1996@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, 'minion', 'active'),
(7, 'Ashok raj', 0, '9790256734', '9790256734', 'kingphoenixsolutions@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '123', 'active'),
(8, 'Sugumar', 0, '9842570515', '9842570515uyy', 'redsugumar1990@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, 'sugumar', 'active'),
(9, 'Vinitha', 0, '8525886262', '8525886262', 'vinibalu1996@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, 'vinu123', 'active'),
(10, 'Vinitha', 0, '897654321', '8525886262', 'vinibalu1996@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, 'vinu123', 'active'),
(11, 'Suganya Rajendran', 0, '9384131169', '', 'suganya.ar12@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '1234567', 'active'),
(12, 'Vinitha', 0, '9876543210', '9876543210', 'vinibalu1996@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '123456', 'active'),
(13, 'Vini', 0, '6374359850', '', 'vinibalu1996@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '8989', 'active'),
(14, 'Vini Balu', 0, '9994099630', '', '', '0000-00-00 00:00:00', '', '', 'customer', 0, '123456789', 'active'),
(15, 'Pavithra.S', 0, '8940258004', '8940258004', 'pavithrasubramani312@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, '1234', 'active'),
(16, 'H Balachandar ', 0, '7305166370', '7305166370', 'hbchandars@gmail.com', '0000-00-00 00:00:00', '', '', 'customer', 0, 'Saranbala@20', 'active'),
(17, 'Ashok', 1, '1234564567890', '', 'ashok@mail.com', '2023-06-01 17:10:45', '', '', 'agent', 1, 'Sunday2027', 'active');

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
(2, 'https://www.youtube.com/watch?v=PKAaEVdYFfA', 'Tom & Jerry | The Tastiest Food in Tom & Jerry ', '<p>Tom &amp; <strong>Jerry </strong>| The <strong><em>Tastiest </em></strong>Food in Tom &amp; Jerry - New</p>', '2023-07-06 08:30:40', '2023-07-27 00:18:09', 'Active'),
(3, 'https://www.facebook.com/reel/992761234948068?s=chYV2B&fs=e&mibextid=6AJuK9', 'Non-veg idil shop', 'Non-veg idil ', '2023-07-06 15:29:20', '2023-07-06 15:29:20', 'active'),
(4, 'https://www.facebook.com/reel/1272667673663281?s=chYV2B&fs=e&mibextid=6AJuK9', 'Food', 'Tea shop', '2023-07-06 18:22:08', '2023-07-06 18:22:08', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `deposit` double NOT NULL,
  `used` varchar(254) NOT NULL,
  `refund` double NOT NULL,
  `gift` varchar(254) NOT NULL,
  `actionDateTime` datetime NOT NULL,
  `reference` varchar(254) NOT NULL,
  `remarks` varchar(254) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `userId`, `deposit`, `used`, `refund`, `gift`, `actionDateTime`, `reference`, `remarks`, `status`) VALUES
(1, 5, 0, '10', 0, '0', '2023-07-16 07:55:25', 'For booking token ref Id : 5', 'Booking Confirmation', 'active'),
(2, 5, 0, '10', 0, '0', '2023-07-16 07:57:33', 'For booking token ref Id : 18', 'Booking Confirmation', 'active'),
(3, 11, 0, '10', 0, '0', '2023-07-17 06:32:15', 'For booking token ref Id : 199', 'Booking Confirmation', 'active'),
(4, 11, 0, '10', 0, '0', '2023-07-17 06:52:24', 'For booking token ref Id : 203', 'Booking Confirmation', 'active'),
(5, 15, 0, '10', 0, '0', '2023-07-17 08:07:09', 'For booking token ref Id : 213', 'Booking Confirmation', 'active'),
(6, 5, 0, '10', 0, '0', '2023-07-17 11:47:37', 'For booking token ref Id : 19', 'Booking Confirmation', 'active'),
(7, 5, 0, '10', 0, '0', '2023-07-17 12:23:25', 'For booking token ref Id : 29', 'Booking Confirmation', 'active'),
(8, 5, 0, '10', 0, '0', '2023-07-17 13:47:14', 'For booking token ref Id : 198', 'Booking Confirmation', 'active'),
(9, 5, 0, '10', 0, '0', '2023-07-18 15:57:15', 'For booking token ref Id : 151', 'Booking Confirmation', 'active'),
(10, 5, 0, '10', 0, '0', '2023-07-18 15:57:35', 'For booking token ref Id : 151', 'Booking Confirmation', 'active'),
(11, 8, 0, '10', 0, '0', '2023-07-19 13:29:14', 'For booking token ref Id : 40', 'Booking Confirmation', 'active'),
(12, 5, 0, '10', 0, '0', '2023-07-20 04:37:02', 'For booking token ref Id : 160', 'Booking Confirmation', 'active');

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
-- Indexes for table `business_service`
--
ALTER TABLE `business_service`
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
-- Indexes for table `business_token`
--
ALTER TABLE `business_token`
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
-- Indexes for table `config`
--
ALTER TABLE `config`
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
-- Indexes for table `host_video`
--
ALTER TABLE `host_video`
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
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `business_contact`
--
ALTER TABLE `business_contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `business_detail`
--
ALTER TABLE `business_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `business_feedback`
--
ALTER TABLE `business_feedback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business_image`
--
ALTER TABLE `business_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `business_product`
--
ALTER TABLE `business_product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `business_service`
--
ALTER TABLE `business_service`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `business_tag`
--
ALTER TABLE `business_tag`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `business_timing`
--
ALTER TABLE `business_timing`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `business_token`
--
ALTER TABLE `business_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `host_video`
--
ALTER TABLE `host_video`
  MODIFY `id` bigint(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
