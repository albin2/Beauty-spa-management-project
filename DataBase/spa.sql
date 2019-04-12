-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 07:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `uid` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`uid`, `fname`, `lname`, `post`, `contact`, `address`, `district`, `state`, `pincode`, `landmark`, `created_at`, `updated_at`) VALUES
('14', 'Arun', 'scdas', 'chemperi', '9744483906', 'alll', '355', '15', '670632', 'zafdas', '2019-04-12 14:27:48', '2019-04-12 08:57:48'),
('43', 'ALBIN', 'CHACKO', 'koo', '8606597597', 'alll', '378', '16', '670632', 'ko', '2019-04-12 10:42:16', '2019-04-12 05:12:16'),
('49', 'Arun', 'Siomon', 'koo', '8606597597', 'fcdaszf', '377', '16', '670632', 'zafdas', '2019-04-10 13:38:35', '2019-04-10 13:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `time` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emplid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `uid`, `bdate`, `time`, `packid`, `servid`, `emplid`, `usname`, `duration`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(39, 43, '2019-04-02', '08:30 AM', '9', 'U cut', '46', 'Timin', 'David', '450', 0, '2019-04-01 16:59:10', '2019-04-01 17:02:05'),
(40, 43, '2019-04-02', '03:00 PM', '9', 'U cut', '46', 'Timin', 'David', '450', 3, '2019-04-01 16:59:51', '2019-04-01 17:02:07'),
(41, 43, '2019-04-02', '11:30 AM', '9', 'U cut', '46', 'Timin', 'David', '450', 3, '2019-04-01 17:00:26', '2019-04-01 17:02:09'),
(42, 43, '2019-04-02', '10:0 AM', '9', 'U cut', '46', 'Timin', 'David', '450', 3, '2019-04-01 17:01:19', '2019-04-01 17:02:11'),
(43, 43, '2019-04-02', '01:30 PM', '8', 'military cut', '46', 'Timin', 'David', '104', 3, '2019-04-01 17:01:54', '2019-04-01 17:02:13'),
(44, 43, '2019-04-02', '03:00 PM', '8', 'military cut', '47', 'Timin', 'ALBIN', '104', 3, '2019-04-01 17:02:49', '2019-04-01 17:02:59'),
(45, 43, '2019-04-25', '03:00 PM', '9', 'U cut', '46', 'Timin', 'David', '450', 3, '2019-04-04 22:39:12', '2019-04-10 09:51:37'),
(46, 43, '2019-04-12', '11:30 AM', '8', 'military cut', '46', 'Timin', 'David', '104', 3, '2019-04-10 09:50:22', '2019-04-10 09:50:22'),
(47, 43, '2019-04-11', '08:30 AM', '8', 'military cut', '46', 'Timin', 'David', '104', 3, '2019-04-10 10:31:10', '2019-04-10 10:31:10'),
(48, 43, '2019-04-11', '10:0 AM', '8', 'military cut', '46', 'Timin', 'David', '104', 3, '2019-04-10 10:33:31', '2019-04-10 10:33:31'),
(49, 43, '2019-04-11', '01:30 PM', '8', 'military cut', '46', 'Timin', 'David', '104', 3, '2019-04-10 10:43:09', '2019-04-10 10:43:09'),
(50, 49, '2019-04-11', '11:30 AM', '9', 'U cut', '46', 'ALBIN', 'David', '450', 3, '2019-04-10 11:00:33', '2019-04-10 11:05:29'),
(51, 49, '2019-04-11', '03:00 PM', '9', 'U cut', '46', 'ALBIN', 'David', '450', 3, '2019-04-10 11:01:08', '2019-04-10 11:01:08'),
(52, 49, '2019-04-12', '10:0 AM', '9', 'U cut', '46', 'ALBIN', 'David', '450', 0, '2019-04-10 11:06:25', '2019-04-10 11:06:31'),
(53, 49, '2019-04-11', '04:30 PM', '9', 'U cut', '46', 'ALBIN', 'David', '450', 3, '2019-04-10 11:15:00', '2019-04-10 11:15:00'),
(54, 49, '2019-04-15', '04:30 PM', '9', 'U cut', '46', 'ALBIN', 'David', '450', 0, '2019-04-10 12:30:54', '2019-04-10 12:31:05'),
(55, 14, '2019-04-13', '08:30 AM', '9', 'U cut', '50', 'albin', 'Akhil', '450', 0, '2019-04-12 07:31:48', '2019-04-12 08:17:15'),
(56, 14, '2019-04-15', '0', '8', 'military cut', '50', 'albin', 'Akhil', '104', 0, '2019-04-12 08:16:37', '2019-04-12 11:43:58'),
(57, 14, '2019-04-17', '03:00 PM', '9', 'U cut', '50', 'albin', 'Akhil', '450', 0, '2019-04-12 08:43:10', '2019-04-12 11:44:00'),
(58, 14, '2019-04-15', '0', '9', 'U cut', '50', 'albin', 'Akhil', '450', 0, '2019-04-12 09:06:17', '2019-04-12 11:44:02'),
(59, 14, '2019-04-13', '01:30 PM', '8', 'military cut', '50', 'albin', 'Akhil', '104', 0, '2019-04-12 09:50:51', '2019-04-12 11:44:04'),
(60, 14, '2019-04-13', '01:30 PM', '8', 'military cut', '50', 'albin', 'Akhil', '104', 0, '2019-04-12 09:51:00', '2019-04-12 11:44:06'),
(61, 14, '2019-04-16', '04:30 PM', '8', 'military cut', '50', 'albin', 'Akhil', '104', 1, '2019-04-12 11:43:53', '2019-04-12 11:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(10) UNSIGNED NOT NULL,
  `satus` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `totalamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `satus`, `userid`, `totalamount`, `created_at`, `updated_at`) VALUES
(9, 1, 49, '1102', '2019-04-10 13:36:41', '2019-04-10 13:38:35'),
(10, 2, 43, '752', '2019-04-11 21:12:03', '2019-04-12 05:43:20'),
(11, 2, 14, '1178', '2019-04-12 07:56:14', '2019-04-12 08:08:18'),
(12, 2, 14, '176', '2019-04-12 08:54:44', '2019-04-12 08:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `cartid` int(11) NOT NULL,
  `ptoductid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`cartid`, `ptoductid`, `count`, `created_at`, `updated_at`) VALUES
(9, 4, 1, '2019-04-10 13:37:02', '2019-04-10 13:37:02'),
(9, 14, 1, '2019-04-10 13:36:41', '2019-04-10 13:36:41'),
(9, 15, 1, '2019-04-10 13:38:07', '2019-04-10 13:38:07'),
(10, 4, 1, '2019-04-12 04:36:27', '2019-04-12 04:36:27'),
(11, 4, 1, '2019-04-12 07:56:56', '2019-04-12 07:56:56'),
(11, 12, 1, '2019-04-12 04:00:34', '2019-04-12 07:56:36'),
(11, 14, 1, '2019-04-12 07:57:05', '2019-04-12 07:57:05'),
(12, 12, 1, '2019-04-12 08:54:44', '2019-04-12 08:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `did` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`did`, `d_name`, `sid`, `status`) VALUES
(5, 'Kasaragod', 13, 1),
(4, 'Kannur', 13, 1),
(3, 'Idukki', 13, 1),
(2, 'Ernakulam', 13, 1),
(1, 'Alappuzha', 13, 1),
(6, 'Kollam', 13, 1),
(7, 'Kottayam', 13, 1),
(8, 'Kozhikode', 13, 1),
(9, 'Malappuram', 13, 1),
(10, 'Palakkad', 13, 1),
(11, 'Pathanamthitta', 13, 1),
(12, 'Thiruvananthapuram', 13, 1),
(13, 'Thrissur', 13, 1),
(14, 'Wayanad', 13, 1),
(15, 'Bagalkot', 12, 1),
(16, 'Bangalore', 12, 1),
(17, 'Bangalore Rural', 12, 1),
(18, 'Belgaum', 12, 1),
(19, 'Bellary', 12, 1),
(20, 'Bidar', 12, 1),
(21, 'Bijapur', 12, 1),
(22, 'Chamarajanagar', 12, 1),
(23, 'Chikkaballapura', 12, 1),
(24, 'Chikmagalur', 12, 1),
(25, 'Chitradurga', 12, 1),
(26, 'Dakshina Kannada', 12, 1),
(27, 'Davanagere', 12, 1),
(28, 'Dharwad', 12, 1),
(29, 'Gadag', 12, 1),
(30, 'Gulbarga', 12, 1),
(31, 'Hassan', 12, 1),
(32, 'Haveri', 12, 1),
(33, 'Kodagu', 12, 1),
(34, 'Kolar', 12, 1),
(35, 'Koppal', 12, 1),
(36, 'Mandya', 12, 1),
(37, 'Mysore', 12, 1),
(38, 'Raichur', 12, 1),
(39, 'Ramanagara', 12, 1),
(40, 'Shimoga', 12, 1),
(41, 'Tumkur', 12, 1),
(42, 'Udupi', 12, 1),
(43, 'Uttara Kannada', 12, 1),
(44, 'Yadgir', 12, 1),
(45, 'Anantapur', 1, 1),
(46, 'Chittoor', 1, 1),
(47, 'East Godavari', 1, 1),
(48, 'Guntur', 1, 1),
(49, 'Krishna', 1, 1),
(50, 'Kurnool', 1, 1),
(51, 'Prakasam', 1, 1),
(52, 'Sri Potti Sriramulu Nellore', 1, 1),
(53, 'Srikakulam', 1, 1),
(54, 'Visakhapatnam', 1, 1),
(55, 'Vizianagaram', 1, 1),
(56, 'West Godavari', 1, 1),
(57, 'YSR (Kadapa)', 1, 1),
(58, 'Anjaw', 2, 1),
(59, 'Changlang', 2, 1),
(60, 'Dibang Valley', 2, 1),
(61, 'East Kameng', 2, 1),
(62, 'East Siang', 2, 1),
(63, 'Kurung Kumey', 2, 1),
(64, 'Lohit', 2, 1),
(65, 'Longding', 2, 1),
(66, 'Lower Dibang Valley', 2, 1),
(67, 'Lower Subansiri', 2, 1),
(68, 'Papum Pare', 2, 1),
(69, 'Tawang', 2, 1),
(70, 'Tirap', 2, 1),
(71, 'Upper Siang', 2, 1),
(72, 'Upper Subansiri', 2, 1),
(73, 'West Kameng', 2, 1),
(74, 'West Siang', 2, 1),
(75, 'Baksa', 3, 1),
(76, 'Barpeta', 3, 1),
(77, 'Bongaigaon', 3, 1),
(78, 'Cachar', 3, 1),
(79, 'Chirang', 3, 1),
(80, 'Darrang', 3, 1),
(81, 'Dhemaji', 3, 1),
(82, 'Dhubri', 3, 1),
(83, 'Dibrugarh', 3, 1),
(84, 'Dima Hasao', 3, 1),
(85, 'Goalpara', 3, 1),
(86, 'Golaghat', 3, 1),
(87, 'Hailakandi', 3, 1),
(88, 'Jorhat', 3, 1),
(89, 'Kamrup', 3, 1),
(90, 'Kamrup Metropolitan', 3, 1),
(91, 'Karbi Anglong', 3, 1),
(92, 'Karimganj', 3, 1),
(93, 'Kokrajhar', 3, 1),
(94, 'Lakhimpur', 3, 1),
(95, 'Morigaon', 3, 1),
(96, 'Nagaon', 3, 1),
(97, 'Nalbari', 3, 1),
(98, 'Sivasagar', 3, 1),
(99, 'Sonitpur', 3, 1),
(100, 'Tinsukia', 3, 1),
(101, 'Udalguri', 3, 1),
(102, 'Biswanath', 3, 1),
(103, 'Charaideo', 3, 1),
(104, 'Hojai', 3, 1),
(105, 'Majuli', 3, 1),
(106, 'South Salamara-Mankachar', 3, 1),
(107, 'West Karbi Anglong', 3, 1),
(108, 'Araria', 4, 1),
(109, 'Arwal', 4, 1),
(110, 'Aurangabad', 4, 1),
(111, 'Banka', 4, 1),
(112, 'Begusarai', 4, 1),
(113, 'Bhagalpur', 4, 1),
(114, 'Bhojpur', 4, 1),
(115, 'Buxar', 4, 1),
(116, 'Darbhanga', 4, 1),
(117, 'East Champaran', 4, 1),
(118, 'Gaya', 4, 1),
(119, 'Gopalganj', 4, 1),
(120, 'Jamui', 4, 1),
(121, 'Jehanabad', 4, 1),
(122, 'Kaimur', 4, 1),
(123, 'Katihar', 4, 1),
(124, 'Khagaria', 4, 1),
(125, 'Kishanganj', 4, 1),
(126, 'Lakhisarai', 4, 1),
(127, 'Madhepura', 4, 1),
(128, 'Madhubani', 4, 1),
(129, 'Munger', 4, 1),
(130, 'Muzaffarpur', 4, 1),
(131, 'Nalanda', 4, 1),
(132, 'Nawada', 4, 1),
(133, 'Patna', 4, 1),
(134, 'Purnia', 4, 1),
(135, 'Rohtas', 4, 1),
(136, 'Saharsa', 4, 1),
(137, 'Samastipur', 4, 1),
(138, 'Saran', 4, 1),
(139, 'Sheikhpura', 4, 1),
(140, 'Sheohar', 4, 1),
(141, 'Sitamarhi', 4, 1),
(142, 'Siwan', 4, 1),
(143, 'Supaul', 4, 1),
(144, 'Vaishali', 4, 1),
(145, 'West Champaran', 4, 1),
(146, 'Balod', 5, 1),
(147, 'Baloda Bazar', 5, 1),
(148, 'Balrampur', 5, 1),
(149, 'Bastar', 5, 1),
(150, 'Bemetara', 5, 1),
(151, 'Bijapur', 5, 1),
(152, 'Bilaspur', 5, 1),
(153, 'Dantewada', 5, 1),
(154, 'Dhamtari', 5, 1),
(155, 'Durg', 5, 1),
(156, 'Gariaband', 5, 1),
(157, 'Janjgir Champa', 5, 1),
(158, 'Jashpur', 5, 1),
(159, 'Kabirdham', 5, 1),
(160, 'Kanker', 5, 1),
(161, 'Kondagaon', 5, 1),
(162, 'Korba', 5, 1),
(163, 'Koriya', 5, 1),
(164, 'Mahasamund', 5, 1),
(165, 'Mungeli', 5, 1),
(166, 'Narayanpur', 5, 1),
(167, 'Raigarh', 5, 1),
(168, 'Raipur', 5, 1),
(169, 'Rajnandgaon', 5, 1),
(170, 'Sukma', 5, 1),
(171, 'Surajpur', 5, 1),
(172, 'Surguja', 5, 1),
(173, 'North Goa', 6, 1),
(174, 'South Goa', 6, 1),
(175, 'Ahmedabad', 7, 1),
(176, 'Amreli', 7, 1),
(177, 'Anand', 7, 1),
(178, 'Aravalli', 7, 1),
(179, 'Banaskantha', 7, 1),
(180, 'Botad', 7, 1),
(181, 'Bharuch', 7, 1),
(182, 'Bhavnagar', 7, 1),
(183, 'Chhota Udaipur', 7, 1),
(184, 'Dahod', 7, 1),
(185, 'Devbhoomi Dwarka', 7, 1),
(186, 'Gandhinagar', 7, 1),
(187, 'Gir Somnath', 7, 1),
(188, 'Jamnagar', 7, 1),
(189, 'Junagadh', 7, 1),
(190, 'Kheda', 7, 1),
(191, 'Kutch', 7, 1),
(192, 'Mahisagar', 7, 1),
(193, 'Mahesana', 7, 1),
(194, 'Morbi', 7, 1),
(195, 'Narmada', 7, 1),
(196, 'Navsari', 7, 1),
(197, 'Panchmahal', 7, 1),
(198, 'Patan', 7, 1),
(199, 'Porbandar', 7, 1),
(200, 'Rajkot', 7, 1),
(201, 'Sabarkantha', 7, 1),
(202, 'Surat', 7, 1),
(203, 'Surendranagar', 7, 1),
(204, 'Tapi', 7, 1),
(205, 'The Dangs', 7, 1),
(206, 'Vadodara', 7, 1),
(207, 'Valsad', 7, 1),
(208, 'Ambala', 8, 1),
(209, 'Bhiwani', 8, 1),
(210, 'Faridabad', 8, 1),
(211, 'Fatehabad', 8, 1),
(212, 'Gurgaon', 8, 1),
(213, 'Hisar', 8, 1),
(214, 'Jhajjar', 8, 1),
(215, 'Jind', 8, 1),
(216, 'Kaithal', 8, 1),
(217, 'Karnal', 8, 1),
(218, 'Kurukshetra', 8, 1),
(219, 'Mahendragarh', 8, 1),
(220, 'Mewat', 8, 1),
(221, 'Palwal', 8, 1),
(222, 'Panchkula', 8, 1),
(223, 'Panipat', 8, 1),
(224, 'Rewari', 8, 1),
(225, 'Rohtak', 8, 1),
(226, 'Sirsa', 8, 1),
(227, 'Sonipat', 8, 1),
(228, 'Yamunanagar', 8, 1),
(229, 'Charkhi Dadri', 8, 1),
(230, 'Bilaspur', 9, 1),
(231, 'Chamba', 9, 1),
(232, 'Hamirpur', 9, 1),
(233, 'Kangra', 9, 1),
(234, 'Kinnaur', 9, 1),
(235, 'Kullu', 9, 1),
(236, 'Lahaul and Spiti', 9, 1),
(237, 'Mandi', 9, 1),
(238, 'Shimla', 9, 1),
(239, 'Sirmaur', 9, 1),
(240, 'Solan', 9, 1),
(241, 'Una', 9, 1),
(242, 'Anantnag', 10, 1),
(243, 'Badgam', 10, 1),
(244, 'Bandipora', 10, 1),
(245, 'Baramulla', 10, 1),
(246, 'Doda', 10, 1),
(247, 'Ganderbal', 10, 1),
(248, 'Jammu', 10, 1),
(249, 'Kargil', 10, 1),
(250, 'Kathua', 10, 1),
(251, 'Kishtwar', 10, 1),
(252, 'Kulgam', 10, 1),
(253, 'Kupwara', 10, 1),
(254, 'Leh', 10, 1),
(255, 'Poonch', 10, 1),
(256, 'Pulwama', 10, 1),
(257, 'Rajouri', 10, 1),
(258, 'Ramban', 10, 1),
(259, 'Reasi', 10, 1),
(260, 'Samba', 10, 1),
(261, 'Shopian', 10, 1),
(262, 'Srinagar', 10, 1),
(263, 'Udhampur', 10, 1),
(264, 'Bokaro', 11, 1),
(265, 'Chatra', 11, 1),
(266, 'Deoghar', 11, 1),
(267, 'Dhanbad', 11, 1),
(268, 'Dumka', 11, 1),
(269, 'East Singhbhum', 11, 1),
(270, 'Garhwa', 11, 1),
(271, 'Giridih', 11, 1),
(272, 'Godda', 11, 1),
(273, 'Gumla', 11, 1),
(274, 'Hazaribagh', 11, 1),
(275, 'Jamtara', 11, 1),
(276, 'Khunti', 11, 1),
(277, 'Koderma', 11, 1),
(278, 'Latehar', 11, 1),
(279, 'Lohardaga', 11, 1),
(280, 'Pakur', 11, 1),
(281, 'Palamu', 11, 1),
(282, 'Ramgarh', 11, 1),
(283, 'Ranchi', 11, 1),
(284, 'Sahibganj', 11, 1),
(285, 'Saraikela Kharsawan', 11, 1),
(286, 'Simdega', 11, 1),
(287, 'West Singhbhum', 11, 1),
(288, 'Agar Malwa', 14, 1),
(289, 'Alirajpur', 14, 1),
(290, 'Anuppur', 14, 1),
(291, 'Ashoknagar', 14, 1),
(292, 'Balaghat', 14, 1),
(293, 'Barwani', 14, 1),
(294, 'Betul', 14, 1),
(295, 'Bhind', 14, 1),
(296, 'Bhopal', 14, 1),
(297, 'Burhanpur', 14, 1),
(298, 'Chhatarpur', 14, 1),
(299, 'Chhindwara', 14, 1),
(300, 'Damoh', 14, 1),
(301, 'Datia', 14, 1),
(302, 'Dewas', 14, 1),
(303, 'Dhar', 14, 1),
(304, 'Dindori', 14, 1),
(305, 'East Nimar', 14, 1),
(306, 'Guna', 14, 1),
(307, 'Gwalior', 14, 1),
(308, 'Harda', 14, 1),
(309, 'Hoshangabad', 14, 1),
(310, 'Indore', 14, 1),
(311, 'Jabalpur', 14, 1),
(312, 'Jhabua', 14, 1),
(313, 'Katni', 14, 1),
(314, 'Mandla', 14, 1),
(315, 'Mandsaur', 14, 1),
(316, 'Morena', 14, 1),
(317, 'Narsinghpur', 14, 1),
(318, 'Neemuch', 14, 1),
(319, 'Panna', 14, 1),
(320, 'Raisen', 14, 1),
(321, 'Rajgarh', 14, 1),
(322, 'Ratlam', 14, 1),
(323, 'Rewa', 14, 1),
(324, 'Sagar', 14, 1),
(325, 'Satna', 14, 1),
(326, 'Sehore', 14, 1),
(327, 'Seoni', 14, 1),
(328, 'Shahdol', 14, 1),
(329, 'Shajapur', 14, 1),
(330, 'Sheopur', 14, 1),
(331, 'Shivpuri', 14, 1),
(332, 'Sidhi', 14, 1),
(333, 'Singrauli', 14, 1),
(334, 'Tikamgarh', 14, 1),
(335, 'Ujjain', 14, 1),
(336, 'Umaria', 14, 1),
(337, 'Vidisha', 14, 1),
(338, 'West Nimar', 14, 1),
(339, 'Ahmednagar', 15, 1),
(340, 'Akola', 15, 1),
(341, 'Amravati', 15, 1),
(342, 'Aurangabad', 15, 1),
(343, 'Beed', 15, 1),
(344, 'Bhandara', 15, 1),
(345, 'Buldhana', 15, 1),
(346, 'Chandrapur', 15, 1),
(347, 'Dhule', 15, 1),
(348, 'Gadchiroli', 15, 1),
(349, 'Gondia', 15, 1),
(350, 'Hingoli', 15, 1),
(351, 'Jalgaon', 15, 1),
(352, 'Jalna', 15, 1),
(353, 'Kolhapur', 15, 1),
(354, 'Latur', 15, 1),
(355, 'Mumbai City', 15, 1),
(356, 'Mumbai Suburban', 15, 1),
(357, 'Nagpur', 15, 1),
(358, 'Nanded', 15, 1),
(359, 'Nandurbar', 15, 1),
(360, 'Nashik', 15, 1),
(361, 'Osmanabad', 15, 1),
(362, 'Parbhani', 15, 1),
(363, 'Pune', 15, 1),
(364, 'Raigad', 15, 1),
(365, 'Ratnagiri', 15, 1),
(366, 'Sangli', 15, 1),
(367, 'Satara', 15, 1),
(368, 'Sindhudurg', 15, 1),
(369, 'Solapur', 15, 1),
(370, 'Thane', 15, 1),
(371, 'Wardha', 15, 1),
(372, 'Washim', 15, 1),
(373, 'Yavatmal', 15, 1),
(374, 'Palghar', 15, 1),
(375, 'Bishnupur', 16, 1),
(376, 'Chandel', 16, 1),
(377, 'Churachandpur', 16, 1),
(378, 'Imphal East', 16, 1),
(379, 'Imphal West', 16, 1),
(380, 'Senapati', 16, 1),
(381, 'Tamenglong', 16, 1),
(382, 'Thoubal', 16, 1),
(383, 'Ukhrul', 16, 1),
(384, 'Jiribam', 16, 1),
(385, 'Kangpokpi', 16, 1),
(386, 'Kakching district', 16, 1),
(387, 'Tengnoupal', 16, 1),
(388, 'Kamjong', 16, 1),
(389, 'Noney', 16, 1),
(390, 'Pherzawl', 16, 1),
(391, 'East Garo Hills', 17, 1),
(392, 'West Garo Hills', 17, 1),
(393, 'North Garo Hills', 17, 1),
(394, 'South Garo Hills', 17, 1),
(395, 'South West Garo Hills', 17, 1),
(396, 'East Jaintia Hills', 17, 1),
(397, 'West Jaintia Hills', 17, 1),
(398, 'East Khasi Hills', 17, 1),
(399, 'South West Khasi Hills', 17, 1),
(400, 'West Khasi Hills', 17, 1),
(401, 'Ri-Bhoi', 17, 1),
(402, 'Aizawl', 18, 1),
(403, 'Champhai', 18, 1),
(404, 'Kolasib', 18, 1),
(405, 'Lawngtlai', 18, 1),
(406, 'Lunglei', 18, 1),
(407, 'Mamit', 18, 1),
(408, 'Saiha', 18, 1),
(409, 'Serchhip', 18, 1),
(410, 'Dimapur', 19, 1),
(411, 'Kiphire', 19, 1),
(412, 'Kohima', 19, 1),
(413, 'Longleng', 19, 1),
(414, 'Mokokchung', 19, 1),
(415, 'Mon', 19, 1),
(416, 'Peren', 19, 1),
(417, 'Phek', 19, 1),
(418, 'Tuensang', 19, 1),
(419, 'Wokha', 19, 1),
(420, 'Zunheboto', 19, 1),
(421, 'Angul', 20, 1),
(422, 'Balangir', 20, 1),
(423, 'Baleshwar', 20, 1),
(424, 'Bargarh', 20, 1),
(425, 'Bhadrak', 20, 1),
(426, 'Boudh', 20, 1),
(427, 'Cuttack', 20, 1),
(428, 'Debagarh', 20, 1),
(429, 'Dhenkanal', 20, 1),
(430, 'Gajapati', 20, 1),
(431, 'Ganjam', 20, 1),
(432, 'Jagatsinghpur', 20, 1),
(433, 'Jajpur', 20, 1),
(434, 'Jharsuguda', 20, 1),
(435, 'Kalahandi', 20, 1),
(436, 'Kandhamal', 20, 1),
(437, 'Kendrapara', 20, 1),
(438, 'Kendujhar', 20, 1),
(439, 'Khordha', 20, 1),
(440, 'Koraput', 20, 1),
(441, 'Malkangiri', 20, 1),
(442, 'Mayurbhanj', 20, 1),
(443, 'Nabarangapur', 20, 1),
(444, 'Nayagarh', 20, 1),
(445, 'Nuapada', 20, 1),
(446, 'Puri', 20, 1),
(447, 'Rayagada', 20, 1),
(448, 'Sambalpur', 20, 1),
(449, 'Subarnapur', 20, 1),
(450, 'Sundergarh', 20, 1),
(451, 'Amritsar', 21, 1),
(452, 'Barnala', 21, 1),
(453, 'Bathinda', 21, 1),
(454, 'Fazilka', 21, 1),
(455, 'Faridkot', 21, 1),
(456, 'Fatehgarh Sahib', 21, 1),
(457, 'Firozpur', 21, 1),
(458, 'Gurdaspur', 21, 1),
(459, 'Hoshiarpur', 21, 1),
(460, 'Jalandhar', 21, 1),
(461, 'Kapurthala', 21, 1),
(462, 'Ludhiana', 21, 1),
(463, 'Mansa', 21, 1),
(464, 'Moga', 21, 1),
(465, 'Mohali', 21, 1),
(466, 'Muktsar', 21, 1),
(467, 'Pathankot', 21, 1),
(468, 'Patiala', 21, 1),
(469, 'Rupnagar', 21, 1),
(470, 'Sangrur', 21, 1),
(471, 'Shahid Bhagat Singh Nagar', 21, 1),
(472, 'Tarn Taran', 21, 1),
(473, 'Ajmer', 22, 1),
(474, 'Alwar', 22, 1),
(475, 'Banswara', 22, 1),
(476, 'Baran', 22, 1),
(477, 'Barmer', 22, 1),
(478, 'Bharatpur', 22, 1),
(479, 'Bhilwara', 22, 1),
(480, 'Bikaner', 22, 1),
(481, 'Bundi', 22, 1),
(482, 'Chittaurgarh', 22, 1),
(483, 'Churu', 22, 1),
(484, 'Dausa', 22, 1),
(485, 'Dhaulpur', 22, 1),
(486, 'Dungarpur', 22, 1),
(487, 'Ganganagar', 22, 1),
(488, 'Hanumangarh', 22, 1),
(489, 'Jaipur', 22, 1),
(490, 'Jaisalmer', 22, 1),
(491, 'Jalor', 22, 1),
(492, 'Jhalawar', 22, 1),
(493, 'Jhunjhunun', 22, 1),
(494, 'Jodhpur', 22, 1),
(495, 'Karauli', 22, 1),
(496, 'Kota', 22, 1),
(497, 'Nagaur', 22, 1),
(498, 'Pali', 22, 1),
(499, 'Pratapgarh', 22, 1),
(500, 'Rajsamand', 22, 1),
(501, 'Sawai Madhopur', 22, 1),
(502, 'Sikar', 22, 1),
(503, 'Sirohi', 22, 1),
(504, 'Tonk', 22, 1),
(505, 'Udaipur', 22, 1),
(506, 'East Sikkim', 23, 1),
(507, 'North Sikkim', 23, 1),
(508, 'South Sikkim', 23, 1),
(509, 'West Sikkim', 23, 1),
(510, 'Ariyalur', 24, 1),
(511, 'Chennai', 24, 1),
(512, 'Coimbatore', 24, 1),
(513, 'Cuddalore', 24, 1),
(514, 'Dharmapuri', 24, 1),
(515, 'Dindigul', 24, 1),
(516, 'Erode', 24, 1),
(517, 'Kanchipuram', 24, 1),
(518, 'Kanyakumari', 24, 1),
(519, 'Karur', 24, 1),
(520, 'Krishnagiri', 24, 1),
(521, 'Madurai', 24, 1),
(522, 'Nagapattinam', 24, 1),
(523, 'Namakkal', 24, 1),
(524, 'Perambalur', 24, 1),
(525, 'Pudukkottai', 24, 1),
(526, 'Ramanathapuram', 24, 1),
(527, 'Salem', 24, 1),
(528, 'Sivaganga', 24, 1),
(529, 'Thanjavur', 24, 1),
(530, 'The Nilgiris', 24, 1),
(531, 'Theni', 24, 1),
(532, 'Thiruvallur', 24, 1),
(533, 'Thiruvarur', 24, 1),
(534, 'Thoothukudi', 24, 1),
(535, 'Tiruchirappalli', 24, 1),
(536, 'Tirunelveli', 24, 1),
(537, 'Tirupur', 24, 1),
(538, 'Tiruvannamalai', 24, 1),
(539, 'Vellore', 24, 1),
(540, 'Viluppuram', 24, 1),
(541, 'Virudhunagar', 24, 1),
(542, 'Dhalai', 26, 1),
(543, 'Gomati', 26, 1),
(544, 'Khowai', 26, 1),
(545, 'North Tripura', 26, 1),
(546, 'Sepahijala', 26, 1),
(547, 'South Tripura', 26, 1),
(548, 'Unakoti', 26, 1),
(549, 'West Tripura', 26, 1),
(550, 'Agra', 27, 1),
(551, 'Aligarh', 27, 1),
(552, 'Allahabad', 27, 1),
(553, 'Ambedkar Nagar', 27, 1),
(554, 'Amethi', 27, 1),
(555, 'Amroha', 27, 1),
(556, 'Auraiya', 27, 1),
(557, 'Azamgarh', 27, 1),
(558, 'Baghpat', 27, 1),
(559, 'Bahraich', 27, 1),
(560, 'Ballia', 27, 1),
(561, 'Balrampur', 27, 1),
(562, 'Banda', 27, 1),
(563, 'Barabanki', 27, 1),
(564, 'Bareilly', 27, 1),
(565, 'Basti', 27, 1),
(566, 'Bijnor', 27, 1),
(567, 'Budaun', 27, 1),
(568, 'Bulandshahr', 27, 1),
(569, 'Chandauli', 27, 1),
(570, 'Chitrakoot', 27, 1),
(571, 'Deoria', 27, 1),
(572, 'Etah', 27, 1),
(573, 'Etawah', 27, 1),
(574, 'Faizabad', 27, 1),
(575, 'Farrukhabad', 27, 1),
(576, 'Fatehpur', 27, 1),
(577, 'Firozabad', 27, 1),
(578, 'Gautam Buddha Nagar', 27, 1),
(579, 'Ghaziabad', 27, 1),
(580, 'Ghazipur', 27, 1),
(581, 'Gonda', 27, 1),
(582, 'Gorakhpur', 27, 1),
(583, 'Hamirpur', 27, 1),
(584, 'Hardoi', 27, 1),
(585, 'Hathras (Mahamaya Nagar)', 27, 1),
(586, 'Jalaun', 27, 1),
(587, 'Jaunpur', 27, 1),
(588, 'Jhansi', 27, 1),
(589, 'Jyotiba Phule Nagar', 27, 1),
(590, 'Kannauj', 27, 1),
(591, 'Kanpur Dehat (Ramabai Nagar)', 27, 1),
(592, 'Kanpur Nagar', 27, 1),
(593, 'Kanshiram Nagar', 27, 1),
(594, 'Kaushambi', 27, 1),
(595, 'Kheri', 27, 1),
(596, 'Kushinagar', 27, 1),
(597, 'Lalitpur', 27, 1),
(598, 'Lucknow', 27, 1),
(599, 'Maharajganj', 27, 1),
(600, 'Mahoba', 27, 1),
(601, 'Mainpuri', 27, 1),
(602, 'Mathura', 27, 1),
(603, 'Mau', 27, 1),
(604, 'Meerut', 27, 1),
(605, 'Mirzapur', 27, 1),
(606, 'Moradabad', 27, 1),
(607, 'Muzaffarnagar', 27, 1),
(608, 'Panchsheel Nagar district (Hapur)', 27, 1),
(609, 'Pilibhit', 27, 1),
(610, 'Pratapgarh', 27, 1),
(611, 'Raebareli', 27, 1),
(612, 'Rampur', 27, 1),
(613, 'Saharanpur', 27, 1),
(614, 'Sant Kabir Nagar', 27, 1),
(615, 'Sant Ravidas Nagar', 27, 1),
(616, 'Shahjahanpur', 27, 1),
(617, 'Shamli', 27, 1),
(618, 'Shravasti', 27, 1),
(619, 'Siddharthnagar', 27, 1),
(620, 'Sitapur', 27, 1),
(621, 'Sonbhadra', 27, 1),
(622, 'Sultanpur', 27, 1),
(623, 'Unnao', 27, 1),
(624, 'Varanasi', 27, 1),
(625, 'Almora', 28, 1),
(626, 'Bageshwar', 28, 1),
(627, 'Chamoli', 28, 1),
(628, 'Champawat', 28, 1),
(629, 'Dehradun', 28, 1),
(630, 'Haridwar', 28, 1),
(631, 'Nainital', 28, 1),
(632, 'Pauri Garhwal', 28, 1),
(633, 'Pithoragarh', 28, 1),
(634, 'Rudraprayag', 28, 1),
(635, 'Tehri Garhwal', 28, 1),
(636, 'Udham Singh Nagar', 28, 1),
(637, 'Uttarkashi', 28, 1),
(638, 'Bankura', 29, 1),
(639, 'Bardhaman', 29, 1),
(640, 'Birbhum', 29, 1),
(641, 'Cooch Behar', 29, 1),
(642, 'Dakshin Dinajpur', 29, 1),
(643, 'Darjeeling', 29, 1),
(644, 'Hooghly', 29, 1),
(645, 'Howrah', 29, 1),
(646, 'Jalpaiguri', 29, 1),
(647, 'Kolkata', 29, 1),
(648, 'Malda', 29, 1),
(649, 'Murshidabad', 29, 1),
(650, 'Nadia', 29, 1),
(651, 'North 24 Parganas', 29, 1),
(652, 'Paschim Medinipur', 29, 1),
(653, 'Purba Medinipur', 29, 1),
(654, 'Purulia', 29, 1),
(655, 'South 24 Parganas', 29, 1),
(656, 'Uttar Dinajpur', 29, 1),
(657, 'Alipurduar', 29, 1),
(658, 'Burdwan', 29, 1),
(659, 'Jhargram', 29, 1),
(660, 'Kalimpong', 29, 1),
(661, 'West Burdwan', 29, 1),
(662, 'Adilabad', 25, 1),
(663, 'Bhadradri Kothagudem', 25, 1),
(664, 'Hyderabad', 25, 1),
(665, 'Jagtial', 25, 1),
(666, 'Jangaon', 25, 1),
(667, 'Jayashankar Bhupalpally', 25, 1),
(668, 'Jogulamba Gadwal', 25, 1),
(669, 'Kamareddy', 25, 1),
(670, 'Karimnagar', 25, 1),
(671, 'Khammam', 25, 1),
(672, 'Kumuram Bheem', 25, 1),
(673, 'Mahabubabad', 25, 1),
(674, 'Mahabubnagar', 25, 1),
(675, 'Mancherial', 25, 1),
(676, 'Medak', 25, 1),
(677, 'Medchal', 25, 1),
(678, 'Mulugu', 25, 1),
(679, 'Nagarkurnool', 25, 1),
(680, 'Nalgonda', 25, 1),
(681, 'Narayanpet', 25, 1),
(682, 'Nirmal', 25, 1),
(683, 'Nizamabad', 25, 1),
(684, 'Peddapalli', 25, 1),
(685, 'Rajanna Sircilla', 25, 1),
(686, 'Rangareddy', 25, 1),
(687, 'Sangareddy', 25, 1),
(688, 'Siddipet', 25, 1),
(689, 'Suryapet', 25, 1),
(690, 'Vikarabad', 25, 1),
(691, 'Wanaparthy', 25, 1),
(692, 'Warangal (Rural)', 25, 1),
(693, 'Warangal (Urban)', 25, 1),
(694, 'Yadadri Bhuvanagiri', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `empleave`
--

CREATE TABLE `empleave` (
  `id` int(10) UNSIGNED NOT NULL,
  `leavedate` date NOT NULL,
  `reson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empleave`
--

INSERT INTO `empleave` (`id`, `leavedate`, `reson`, `empid`, `status`, `created_at`, `updated_at`) VALUES
(1, '2019-04-13', 'lkxmklsa', '50', 1, '2019-04-12 07:24:46', '2019-04-12 07:32:35'),
(2, '2019-04-15', 'no reson', '50', 2, '2019-04-12 07:28:48', '2019-04-12 07:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `employedetails`
--

CREATE TABLE `employedetails` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employedetails`
--

INSERT INTO `employedetails` (`id`, `fname`, `lname`, `dob`, `city`, `qualification`, `bio`, `experience`, `gender`, `number`, `image`, `Role`, `created_at`, `updated_at`) VALUES
(46, 'David', 'Siomon', '1992-10-12', 'kochi', 'diploma in haircut', 'qwertyuiopasdfghjklzxcvbnmqwertyuiasdfghjkzxcvbnm', '0', 'volvo', '8606597597', 'images/emp/employee/t15xNXsbVruvZECW7FPEi4pXyCXjwtl2c1Jpajx0.jpeg', '3', '2019-04-01 16:55:10', '2019-04-01 16:55:10'),
(50, 'Akhil', 'jose', '2019-04-02', 'kannur', 'diploma in o', 'gud in attitude', '0', 'volvo', '8606597597', 'images/emp/employee/OOwbwS3sblTSVQsxNgnUFAkye1lQmS9cbYilL7QH.jpeg', '3', '2019-04-12 07:21:52', '2019-04-12 07:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `feed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feed`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'lk;kuykrt', '49', '2019-04-10 10:46:57', '2019-04-10 10:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_21_095028_create_usertype_table', 1),
(4, '2018_09_21_095720_create_role_table', 1),
(5, '2018_09_21_100218_create_regist_table', 1),
(6, '2018_09_27_171737_create_sessions_table', 1),
(7, '2018_10_14_091618_create_employedetails_table', 1),
(8, '2018_10_14_102023_create_service_table', 1),
(9, '2018_10_14_133508_create_packages_table', 1),
(10, '2018_11_18_030123_create_empleave_table', 1),
(11, '2018_11_19_012925_create_feedback_table', 1),
(12, '2018_11_19_143852_create_booking_table', 1),
(13, '2019_03_13_034211_productcategeory_table', 2),
(14, '2019_03_13_055318_products_table', 3),
(15, '2019_03_28_151143_create_cart_table', 4),
(16, '2019_03_28_151258_create_cartitems_table', 4),
(17, '2019_03_28_152151_create_cart_table', 5),
(18, '2019_03_28_152227_create_cartitems_table', 5),
(19, '2019_04_08_024247_create__address', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `servename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packdecr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packfor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benafits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `created_at`, `updated_at`, `servename`, `packname`, `packdecr`, `packfor`, `benafits`, `timed`, `price`, `image`, `status`) VALUES
(8, '2019-04-01 15:17:04', '2019-04-04 00:25:40', '3', 'military cut', 'it is an awesome hair cutting  , these package for mans and kids.', 'volvo', 'awesome look,', '50', '104', 'images/emp/pack/nvahmL2hJR5B66WNEVSKcYp2Petmry3CXLEgnuXj.jpeg', 1),
(9, '2019-04-01 15:18:41', '2019-04-04 00:25:43', '3', 'U cut', 'this service for ladies', 'saab', 'it is awesome one.', '75', '450', 'images/emp/pack/xzqtX5B2YvDSXkfMfwJ9IdTTSDnfJ0RAmRg5FFeM.jpeg', 1),
(10, '2019-04-01 15:20:34', '2019-04-10 23:20:55', '5', 'olinor', 'good for skin and it gives awesome experience.', 'volvo', 'good for skin problems', '80', '1900', 'images/emp/pack/0WxLjmmBHUpamKWy9NXU1CbEdlJ7Chsnhb47k06h.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('albinthomas9995@gmail.com', '$2y$10$MmvJg0w/2/sq/5k1RWVb3eu8UAKyfN8Onh/BRy7mbatbH9TwQ4P8m', '2019-03-18 16:21:50'),
('albinthomasi@mca.ajce.in', '$2y$10$AC760MOh6bOctoE9utbb3uEDwQ42hwLR/tt2eNNIucgE1RWMmzrHi', '2019-03-21 15:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `payid` int(11) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `cardholder` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`payid`, `cardnumber`, `cardholder`, `amount`, `cartid`, `userid`, `status`, `created_at`, `updated_at`) VALUES
(4, '1111 1111 1111 1111', 'albin', 426, 10, 43, 1, '2019-04-12 01:59:26', '2019-04-12 01:59:26'),
(5, '1111 1111 1111 1111', 'albin', 426, 10, 43, 1, '2019-04-12 01:59:59', '2019-04-12 01:59:59'),
(6, '1111 1111 1111 1111', 'albin', 426, 10, 43, 1, '2019-04-12 02:00:52', '2019-04-12 02:00:52'),
(7, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:01:10', '2019-04-12 04:01:10'),
(8, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:04:32', '2019-04-12 04:04:32'),
(9, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:05:09', '2019-04-12 04:05:09'),
(10, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:07:57', '2019-04-12 04:07:57'),
(11, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:08:26', '2019-04-12 04:08:26'),
(12, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:09:30', '2019-04-12 04:09:30'),
(13, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:10:17', '2019-04-12 04:10:17'),
(14, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:19:39', '2019-04-12 04:19:39'),
(15, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:30:45', '2019-04-12 04:30:45'),
(16, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:32:51', '2019-04-12 04:32:51'),
(17, '1233 3333 3333 3333', 'albin', 528, 11, 43, 1, '2019-04-12 04:34:49', '2019-04-12 04:34:49'),
(18, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:37:00', '2019-04-12 04:37:00'),
(19, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:39:59', '2019-04-12 04:39:59'),
(20, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:40:04', '2019-04-12 04:40:04'),
(21, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:40:47', '2019-04-12 04:40:47'),
(22, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:45:37', '2019-04-12 04:45:37'),
(23, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:52:17', '2019-04-12 04:52:17'),
(24, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:52:42', '2019-04-12 04:52:42'),
(25, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:53:13', '2019-04-12 04:53:13'),
(26, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:53:50', '2019-04-12 04:53:50'),
(27, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:55:05', '2019-04-12 04:55:05'),
(28, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 04:56:09', '2019-04-12 04:56:09'),
(29, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 05:02:08', '2019-04-12 05:02:08'),
(30, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 05:03:04', '2019-04-12 05:03:04'),
(31, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 05:03:57', '2019-04-12 05:03:57'),
(32, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 05:06:45', '2019-04-12 05:06:45'),
(33, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 05:08:01', '2019-04-12 05:08:01'),
(34, '1111 1111 1111 1111', 'zklxj', 752, 10, 43, 1, '2019-04-12 05:10:48', '2019-04-12 05:10:48'),
(35, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:13:21', '2019-04-12 05:13:21'),
(36, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:22:34', '2019-04-12 05:22:34'),
(37, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:23:22', '2019-04-12 05:23:22'),
(38, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:25:23', '2019-04-12 05:25:23'),
(39, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:34:03', '2019-04-12 05:34:03'),
(40, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:34:31', '2019-04-12 05:34:31'),
(41, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:35:20', '2019-04-12 05:35:20'),
(42, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:35:49', '2019-04-12 05:35:49'),
(43, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:36:17', '2019-04-12 05:36:17'),
(44, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:36:36', '2019-04-12 05:36:36'),
(45, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:38:21', '2019-04-12 05:38:21'),
(46, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:39:18', '2019-04-12 05:39:18'),
(47, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:40:35', '2019-04-12 05:40:35'),
(48, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:41:34', '2019-04-12 05:41:34'),
(49, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:43:08', '2019-04-12 05:43:08'),
(50, '1312 3465 4645 6464', 'albin', 752, 10, 43, 1, '2019-04-12 05:43:19', '2019-04-12 05:43:19'),
(51, '1111 1111 1111 1111', 'albin', 1178, 11, 14, 1, '2019-04-12 07:58:14', '2019-04-12 07:58:14'),
(52, '1111 1111 1111 1111', 'albin', 1178, 11, 14, 1, '2019-04-12 08:01:31', '2019-04-12 08:01:31'),
(53, '1111 1111 1111 1111', 'albin', 1178, 11, 14, 1, '2019-04-12 08:02:16', '2019-04-12 08:02:16'),
(54, '1111 1111 1111 1111', 'albin', 1178, 11, 14, 1, '2019-04-12 08:08:18', '2019-04-12 08:08:18'),
(55, '1212 3', 'albin', 176, 12, 14, 1, '2019-04-12 08:58:57', '2019-04-12 08:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `productcategeory`
--

CREATE TABLE `productcategeory` (
  `id` int(10) UNSIGNED NOT NULL,
  `categeory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcategeory`
--

INSERT INTO `productcategeory` (`id`, `categeory`, `created_at`, `updated_at`) VALUES
(1, 'ljfisdhjsdk', '2019-03-13 05:28:41', '2019-03-13 05:28:41'),
(2, 'oil', '2019-03-24 13:11:35', '2019-03-24 13:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categeory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proddecr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `categeory`, `productname`, `proddecr`, `stock`, `price`, `image`, `status`) VALUES
(4, '2019-04-01 15:24:31', '2019-04-12 08:08:18', '1', 'face cream', 'awesome one ,it can use females and kids', '14', '752', 'images/emp/product/IUoow8Z4gsi9MtuTUXqzxJgBvbgBswzdusiDvhtT.png', 1),
(12, '2019-04-01 15:23:03', '2019-04-12 08:58:57', '2', 'hairosii', 'awsome hair oil for womans and kids  use it regularly you can feel the chabges it', '45', '176', 'images/emp/product/Camc2r47IiMhgUdFd2HLPXi5tC3k1ElrXE6XeG6e.png', 1),
(14, '2019-04-03 07:58:07', '2019-04-12 08:08:18', '2', 'goosam', 'ahksjhcs 100', '46', '250', 'images/emp/product/CtXlRLyshnKqOu0zOLx5rGszma9yYTchht7XwLSV.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regist`
--

CREATE TABLE `regist` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proimg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regist`
--

INSERT INTO `regist` (`user_id`, `fname`, `lname`, `contact`, `proimg`, `created_at`, `updated_at`, `gender`, `color`, `height`, `weight`) VALUES
(14, 'albin', 'thomas', '8606597597', 'images/22/m9dmJanLzzuls9hJIv11UJj1V5DqFj1RCtnXqxph.png', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'asdfghjk', 'asdfghjk', '849859459', 'public/images/emp/35/aa2BwlpKcr9gXpBFhWIgB1PGa2VSMzIcQAZbV444.jpeg', '2019-03-25 18:40:58', '2019-03-25 18:40:58', NULL, NULL, NULL, NULL),
(41, 'ALBIN', 'CHACKO', '8606597597', 'images/emp/41/qYCTElaPvyF9TxKLyvAQguk3QJSWQYHhSwk0Rylp.jpeg', '2019-03-26 01:27:10', '2019-03-26 07:21:55', NULL, NULL, '15', '123'),
(43, 'Timin', 'kurian', '94000587002', 'images/emp/43/ltglrmWuuLxpMj9q4cIADHyFARj2pEv1NPnWLSPK.jpeg', '2019-03-26 01:32:33', '2019-04-01 14:54:49', 'Male', NULL, '25', '198'),
(49, 'ALBIN', 'Siomon', '9495181026', 'images/emp/49/6lDCFWyROB4G0GniKmoSsnAdvRdSplpAl4VMd2cu.png', '2019-04-07 09:50:21', '2019-04-07 09:50:21', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `servname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serDisc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `servname`, `serDisc`, `created_at`, `updated_at`) VALUES
(3, 'Hair cut', 'The hair cut  service for all', '2019-04-01 15:04:20', '2019-04-01 15:04:20'),
(5, 'oil massage', 'This service for men and women.', '2019-04-01 15:11:15', '2019-04-01 15:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `sid` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`sid`, `s_name`, `status`) VALUES
(1, 'Andhra Pradesh', '1'),
(2, 'Arunachal Pradesh', '1'),
(3, 'Assam', '1'),
(4, 'Bihar', '1'),
(5, 'Chhattisgarh', '1'),
(6, 'Goa', '1'),
(7, 'Gujarat', '1'),
(8, 'Haryana', '1'),
(9, 'Himachal Pradesh', '1'),
(10, 'Jammu and Kashmir', '1'),
(11, 'Jharkhand', '1'),
(12, 'Karnataka', '1'),
(13, 'Kerala', '1'),
(14, 'Madhya Pradesh', '1'),
(15, 'Maharashtra', '1'),
(16, 'Manipur', '1'),
(17, 'Meghalaya', '1'),
(18, 'Mizoram', '1'),
(19, 'Nagaland', '1'),
(20, 'Odisha', '1'),
(21, 'Punjab', '1'),
(22, 'Rajasthan', '1'),
(23, 'Sikkim', '1'),
(24, 'Tamil Nadu', '1'),
(25, 'Telangana', '1'),
(26, 'Tripura', '1'),
(27, 'Uttar Pradesh', '1'),
(28, 'Uttarakhand', '1'),
(29, 'West Bengal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `status`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(5, 3, 1, 'admin@gmail.com', '$2y$10$BX60bkRs5JpNgiK0jrP3g.rIfASLh68brkXZUpHfMUTPxxMA/n6ku', 'EcgguDfBBm8eOwsE3KeRKnUosqsmapODEGtzO3IHNWvB26723NWKLbRJejLh', '2019-03-15 09:20:30', '2019-03-15 09:20:30', '0000-00-00 00:00:00'),
(14, 1, 1, 'albin1@gmail.com', '$2y$10$wADZ7Nod6dZcTqCZ6FGhkeRIY0FK94azgUGyQVECsiYh1gV2buti2', 'SZetmt2KpqGeNpIBfFMuBUyn1dsqMHT0Zn1WuRlCG5BItParCBFGFiOEAeIp', '2019-03-20 02:57:23', '2019-04-11 00:06:46', '0000-00-00 00:00:00'),
(46, 2, 1, 'albinthomas@mca.ajce.in', '$2y$10$rOUd.2tyQDx9uS54YqxvLeC3EVX7jBorFj5tyObldtAIaWX7BkO7q', NULL, '2019-04-01 16:55:09', '2019-04-11 01:01:28', '2019-04-10 18:30:00'),
(49, 1, 1, 'albinthomasi@mca.ajce.in', '$2y$10$khX95.1CzcokEpQjSPpbmuP5jDRFLDdlpPpBTF5jBrNa67/KIuX.e', 'mm5mnsZySFtVzMh3EWP2EuNdxUnVsAmLv98qPIeanGd6jwqRZ5XKwE4bz7e5', '2019-04-07 09:49:44', '2019-04-07 09:49:44', NULL),
(50, 2, 1, 'albinthomas9995@gmail.com', '$2y$10$kLg0z4WgJB/VX9RzKoftme/7IDewV8PWsQrmeNuX4Mry7q65ogq.y', 'ae0nPoL7GsLeX06VHKCXghf0EVeqCBlcVg9oNzCXbY9dmnrZsJleG0u8ya3t', '2019-04-12 07:21:51', '2019-04-12 07:21:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `usertype` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`cartid`,`ptoductid`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `empleave`
--
ALTER TABLE `empleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employedetails`
--
ALTER TABLE `employedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employedetails_id_index` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `productcategeory`
--
ALTER TABLE `productcategeory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `regist_user_id_index` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;
--
-- AUTO_INCREMENT for table `empleave`
--
ALTER TABLE `empleave`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `productcategeory`
--
ALTER TABLE `productcategeory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `reset` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-04-10 20:44:04' ON COMPLETION NOT PRESERVE ENABLE DO update booking 
set status=3 
where updated_at < date_sub(now(),interval 1 MINUTE) 
  and (status=1 or status=2)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
