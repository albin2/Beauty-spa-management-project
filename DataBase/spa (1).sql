-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 08:42 AM
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
('14', 'Arun', 'scdas', 'chemperi', '9744483906', 'alll', '355', '15', '670632', 'zafdas', '2019-04-29 02:12:41', '2019-04-28 20:42:41'),
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
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(52, 'Alyssa', 'jose', '1990-01-10', 'kolkata', 'Versailles Academy – Facials Technician', 'Alyssa began her career in the beauty industry in 2011 by attending a six month 600 hour program at Joe Blasco Professional School of Makeup artistry. There she became proficient in makeup for TV and photography. She found her true passion to be for skincare and soon thereafter attended Empire Beauty School to obtain her license in Esthetics. While having an eye for beauty, Alyssa has always had a drive to understand the structure and function of the skin. For that reason, after beginning her career as an Esthetician she quickly enrolled in Manchester Community College’s nursing program and has since received her nursing license. Alyssa is now working as our registered nurse at the Skin and Body Spa. Alyssa places an emphasis on results driven treatments, sanitation and remains up to date on current treatments and protocols. She intends to continue to educate herself in order to bring more results oriented treatments to the Skin and Body Spa', '7', 'saab', '8113097597', 'images/emp/employee/SB1mW5KlY2ySJnILwwnq5dscpvlQlyu5yOtRyQwT.jpeg', '7', '2019-04-28 23:46:56', '2019-04-28 23:46:56'),
(53, 'Michele', 'Rose', '1989-12-11', 'chenni', 'Graduated in Advance Esthetics', 'Michele graduated from The Laird Institute of Spa Therapy in May of 2011 with an Advanced Esthetic Certificate. In the fall of 2011 she received a nail license and an instructing license and has been teaching both since then! Michele enjoys learning the science behind skin care and seeing real results in the skin with the proper treatment. She has a commitment to continuing her education in her field and likes to attend classes regularly to learn new techniques and industry bests. When Michele is not taking clients at the spa, she enjoys being outdoors with her husband and 2 boys.', '5', 'saab', '8606597597', 'images/emp/employee/Fg5rpqViG4MS3HILtKcGC3vVkvHu2jLtxvP6YD2A.jpeg', '9', '2019-04-28 23:53:07', '2019-04-28 23:53:07'),
(54, 'Dawn', 'THOMAS', '1992-12-10', 'KOCHI', 'graduated', 'Dawn graduated from Seacoast Career School in 2011. Coming from the legal field Dawn found massage therapy much more fulfilling. She specializes in deep tissue, trigger point and sports massage. Dawn was the runner up for Best Massage Therapist in the Nashua Telegraph Best of Contest 2018', '1', 'volvo', '8113097597', 'images/emp/employee/6aLcdeob9ZjIBEnRzg2OQzKpcNdNKHqkDKXHqrUk.jpeg', '6', '2019-04-28 23:56:25', '2019-04-28 23:56:25'),
(55, 'Arun', 'Thomas', '1990-05-11', 'idukki', 'Graduate', 'As a 2001 Graduate of New Hampshire Technical College, arun brings over 12 years experience to The Skin & Body Spa. She is nationally certified in massage and bodywork by The NCBTMB. Gail loves to take the time to customize each client’s massage by using techniques including neuromuscular, myofacial release and Lomi Lomi (Hawaiian massage). Gail is passionate about healing the whole person. As a certified Reiki Master, she offers the calm and healing effects of Reiki along with massage to help her clients. During her leisure time, Gail is enjoying many outdoor activities; most likely with her two grandchildren.', '0', 'volvo', '9745089590', 'images/emp/employee/KqMN4TL3Cj3WX1tJAc39y9bB64caoIVPIBK7Mxgh.jpeg', '7', '2019-04-29 00:02:46', '2019-04-29 00:02:46');

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
  `packdecr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `packfor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benafits` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `created_at`, `updated_at`, `servename`, `packname`, `packdecr`, `packfor`, `benafits`, `timed`, `price`, `image`, `status`) VALUES
(11, '2019-04-28 21:37:47', '2019-04-28 21:37:47', '6', 'Swedish Massage', 'A light to medium pressure massage that promotes relaxation, soothes and revitalizes by increasing circulation and reducing tension.', 'MALE AND FEMALE', 'This style of massage is great for stress-related conditions and chronic pain.', '80', '855', 'images/emp/pack/nAcOCj2a5gDHCLUdJb7rEQhBVWK5dvUm25gGzL0w.jpeg', 1),
(12, '2019-04-28 21:44:16', '2019-04-28 21:57:05', '6', 'Deep Tissue Massage', 'A medium to deep pressure massage to relieve pain and restore tissue to a healthy state. This technique focuses on the deepest layer of muscles and releases chronic muscle tension. Administered as a full body or localized area treatment depending on client need. Recommended for chronic pain or injury. Excellent before or after workout.', 'MALE AND FEMALE', 'This technique focuses on the deepest layer of muscles and releases chronic muscle tension.', '70', '1200', 'images/emp/pack/SM1ZPEqiBmJsJKg2slfXMjAvOWfL1S5tp1f7zVNv.jpeg', 1),
(13, '2019-04-28 21:51:36', '2019-04-28 21:51:36', '6', 'Reflexology Massage', 'Deeply relaxing, therapeutic pressure techniques are applied to specific wellness related reflex points on the feet to release blocked energy, relieve stress, and boost circulation especially for those suffering from plantar fasciitis, ankle injuries, or everyday work or play.', 'MALE AND FEMALE', 'Release blocked energy, relieve stress, and boost circulation especially for those suffering from plantar fasciitis, ankle injuries etc.', '50', '763', 'images/emp/pack/Z4LjlGdNVvc1wYEmYzSOnfXUNSmn0cFBW6bYN4hj.jpeg', 1),
(14, '2019-04-28 22:10:09', '2019-04-28 22:10:09', '7', 'Brightening Facial', 'An organic facial that will stimulate, detoxify, firm and hydrate your skin through exfoliation and hydration treatments. This indulgent, aromatic facial experience gently brightens your skin. A delicious puree of yams and pumpkins accelerate the exfoliating process to peel away dead skin cells, reducing pigmentation, fine lines and sun damage. The natural enzyme content increases collagen production leaving skin firm, radiant with increased elasticity.\r\n\r\nRecommended for all skin types, Irritated and Pigmented Skin', 'Female', 'Reducing pigmentation, fine lines and sun damage.', '75', '620', 'images/emp/pack/r43enMCc7txukzNxNpQ6rV5aL4hD1NHXez0ZG37f.jpeg', 1),
(15, '2019-04-28 22:13:52', '2019-04-28 22:13:52', '7', 'Signature Calming Facial', 'This organic botanical treatment leaves the skin calm and hydrated. It provides high antioxidant protection and strengthens your blood vessels. Rosehip extract, honey and maize flour gently exfoliate and remove waste build up, nourish and moisturize the skin and provide high quantities of Vitamin C and antioxidants.\r\n\r\nRecommended for all skin types, Sensitive Skin and Rosacea', 'MALE AND FEMALE', 'protection and strengthens your blood vessels,exfoliate and remove waste build up', '65', '930', 'images/emp/pack/AKS8qEMVsBubq24KhBzGAQSLRLc3tJHjLfmR4aT1.jpeg', 1),
(16, '2019-04-28 22:16:40', '2019-04-28 22:16:40', '7', 'Anti-Aging Luxury Lift', 'This organic skin treatment erases the signs of aging with an antioxidant-rich formulated firming skin facial for mature skin types.  Nutrient acai berries, blueberries, seabuckthorn, hydrating hyaluronic acid and elasticity-promoting Homeostatine in this treatment will leave skin soft, radiant and free of fine lines.\r\n\r\nRecommended for mature, dry, fatigued skin needing cell renewal and collagen production', 'Male', 'This treatment will leave skin soft, radiant and free of fine lines.', '65', '820', 'images/emp/pack/HM9oQze2hiEAIJUWILb1Bc4k22OgCL4c8Dcl8jZI.jpeg', 1),
(17, '2019-04-28 22:20:45', '2019-04-28 22:20:45', '8', 'Essential', 'Essential Treatment Includes…\r\n\r\nA full body cleansing and exfoliation from our exquisite marriage of customized Organic Sugar Scrub and Essential Oils.\r\nLymphatic Dry Brushing\r\nYour experience concludes with a therapeutic Vichy Shower Therapy and hydrating application of organic body lotion.', 'MALE AND FEMALE', 'good for skin', '50', '800', 'images/emp/pack/wi3dZbkhXFiQvznxtpNf1bu8f1cKKD5TAhuVxC2Q.jpeg', 1),
(18, '2019-04-28 22:25:01', '2019-04-28 22:25:01', '9', 'Bridal  Special Occasion', 'Using MAC evening makeup: includes primer, liquid, powder foundation, concealer, blush, eye shadow, eye liner, mascara, lip liner and color.', 'Female', 'Attractive', '85', '2500', 'images/emp/pack/JOnRkEY7BmQJym2cKksdKWjCNnawjTfVfCOs5uKG.jpeg', 1),
(19, '2019-04-28 22:27:46', '2019-04-28 22:27:46', '9', 'Touch Up and Day Makeup', 'Using MAC evening makeup: includes primer, liquid, powder foundation, concealer, blush, eye shadow, eye liner, mascara, lipliner and color.', 'MALE AND FEMALE', 'good', '60', '620', 'images/emp/pack/aUhh5z1blK61Bs9Zb6mx3zCucmxKpJtat65mohNh.jpeg', 1),
(20, '2019-04-28 22:30:42', '2019-04-28 22:30:42', '9', 'Tinting', 'With tinting you no longer need shaping and face framing of your eyebrows with pencil and fillers. This is a great enhancer to add an illusion of length and enjoy being mascara-free. Typically lasts for 4-6 weeks.', 'MALE AND FEMALE', 'good package', '50', '290', 'images/emp/pack/4t7FNbUnHvgVizWTAJkrUT3vmVjdnAZxh0p7DLuF.jpeg', 1),
(21, '2019-04-28 22:33:11', '2019-04-28 22:33:11', '10', 'Teen Organic Facial and Education', 'Facials for teens address adolescent skin issues like breakouts due to active lifestyles, diet and hormonal activity. Education on proper skincare can help prevent problems before they become major issues. Eminence organic facial products offer many delicious and fun scents that appeal to youth. Hollywood stars using Eminence products inspire our youth to look their best with Organic Skincare.\r\n\r\nStart with our Organic Facial for Teens as a great introduction to optimal skincare.', 'MALE AND FEMALE', 'Expert Skin Analysis\r\nDeep Cleansing\r\nExfoliation\r\nExtraction\r\nCustomized masque\r\nEducation on proper home care\r\n​', '90', '1900', 'images/emp/pack/36mzq1i9ONMlT5V8Y2yPXPOqQT3LXa0fYDiZEQmQ.jpeg', 1);

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
(55, '1212 3', 'albin', 176, 12, 14, 1, '2019-04-12 08:58:57', '2019-04-12 08:58:57'),
(56, '1211 2211 2211 2211', 'ntgb', 3760, 13, 14, 1, '2019-04-24 22:15:56', '2019-04-24 22:15:56'),
(57, '1111 1111 1111 1111', 'sd', 104, 8, 14, 1, '2019-04-24 23:57:28', '2019-04-24 23:57:28'),
(58, '1213 2321 3132 1331', 'faffaffab', 104, 8, 14, 1, '2019-04-25 00:25:50', '2019-04-25 00:25:50'),
(59, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:00:25', '2019-04-25 02:00:25'),
(60, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:03:52', '2019-04-25 02:03:52'),
(61, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:42:12', '2019-04-25 02:42:12'),
(62, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:50:43', '2019-04-25 02:50:43'),
(63, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:51:51', '2019-04-25 02:51:51'),
(64, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:52:26', '2019-04-25 02:52:26'),
(65, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:53:28', '2019-04-25 02:53:28'),
(66, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:53:33', '2019-04-25 02:53:33'),
(67, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:54:04', '2019-04-25 02:54:04'),
(68, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:54:13', '2019-04-25 02:54:13'),
(69, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:54:46', '2019-04-25 02:54:46'),
(70, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:55:35', '2019-04-25 02:55:35'),
(71, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:58:07', '2019-04-25 02:58:07'),
(72, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:58:45', '2019-04-25 02:58:45'),
(73, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:58:49', '2019-04-25 02:58:49'),
(74, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:58:58', '2019-04-25 02:58:58'),
(75, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 02:59:47', '2019-04-25 02:59:47'),
(76, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:00:12', '2019-04-25 03:00:12'),
(77, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:00:41', '2019-04-25 03:00:41'),
(78, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:01:01', '2019-04-25 03:01:01'),
(79, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:01:24', '2019-04-25 03:01:24'),
(80, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:01:36', '2019-04-25 03:01:36'),
(81, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:01:51', '2019-04-25 03:01:51'),
(82, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:02:02', '2019-04-25 03:02:02'),
(83, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:02:22', '2019-04-25 03:02:22'),
(84, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:02:38', '2019-04-25 03:02:38'),
(85, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:02:57', '2019-04-25 03:02:57'),
(86, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:04:20', '2019-04-25 03:04:20'),
(87, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:05:14', '2019-04-25 03:05:14'),
(88, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:05:31', '2019-04-25 03:05:31'),
(89, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 03:06:08', '2019-04-25 03:06:08'),
(90, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-25 04:42:29', '2019-04-25 04:42:29'),
(91, '1111 1111 1111 1111', 'albin', 411, 15, 14, 1, '2019-04-28 20:33:31', '2019-04-28 20:33:31'),
(92, '1111 1111 1111 1111', 'albin', 685, 15, 14, 1, '2019-04-28 20:34:22', '2019-04-28 20:34:22'),
(93, '1111 1111 1111 1111', 'albin', 685, 15, 14, 1, '2019-04-28 20:34:37', '2019-04-28 20:34:37'),
(94, '1111 1111 1111 1111', 'albin', 926, 15, 14, 1, '2019-04-28 20:35:41', '2019-04-28 20:35:41'),
(95, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-28 20:37:08', '2019-04-28 20:37:08'),
(96, '1111 1111 1111 1111', 'ntgb', 926, 15, 14, 1, '2019-04-28 20:39:48', '2019-04-28 20:39:48'),
(97, '1111 1111 1111 1111', 'albin', 926, 15, 14, 1, '2019-04-28 20:42:55', '2019-04-28 20:42:55'),
(98, '1111 1111 1111 1111', 'albin', 926, 15, 14, 1, '2019-04-28 20:44:30', '2019-04-28 20:44:30'),
(99, '1111 1111 1111 1111', 'albin', 450, 9, 14, 1, '2019-04-28 21:02:55', '2019-04-28 21:02:55'),
(100, '1111 1111 1111 1111', 'albin', 104, 8, 14, 1, '2019-04-28 21:04:44', '2019-04-28 21:04:44'),
(101, '1111 1111 1111 1111', 'albin', 450, 9, 14, 1, '2019-04-28 21:06:31', '2019-04-28 21:06:31');

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
(3, 'Compact Powder', '2019-04-28 22:41:35', '2019-04-28 22:41:35'),
(4, 'Face Wash', '2019-04-28 22:41:59', '2019-04-28 22:41:59'),
(5, 'Body Care', '2019-04-28 22:42:20', '2019-04-28 22:42:20'),
(6, 'Curl Enhancers', '2019-04-28 22:42:31', '2019-04-28 22:42:31'),
(7, 'Hair Stylers', '2019-04-28 22:42:46', '2019-04-28 22:42:46'),
(8, 'Facial Kit', '2019-04-28 22:43:01', '2019-04-28 22:43:01'),
(9, 'Face Creams', '2019-04-28 22:43:15', '2019-04-28 22:43:15'),
(10, 'Manicure Kits', '2019-04-28 22:43:26', '2019-04-28 22:43:26');

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
  `proddecr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `profor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aplarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `categeory`, `productname`, `proddecr`, `stock`, `price`, `image`, `status`, `profor`, `aplarea`, `quantity`) VALUES
(17, '2019-04-28 22:49:01', '2019-04-28 22:58:09', '3', 'Perfect Radiance Compact', 'Forms a protective layer over the skin to keep away UVA and UVB rays.\r\nEnriched with vitamins\r\nBlends effortlessly\r\nContains skin brightening pearls\r\nGoodness of multi minerals\r\nContains Vitamin B3 proven to visibily lighten skin tone', '70', '199', 'images/emp/product/ZhjwNIOFu4S6AUnQbIEKPTDhzA8hQ1bBraep6lrZ.jpeg', 1, 'female', 'face', '10'),
(18, '2019-04-28 22:56:19', '2019-04-28 22:59:09', '3', 'Wet and Dry Compact', '3-in-1 Skin Care product\r\nLong Lasting\r\nHas dual benefits of being used as a wet and dry compact\r\nEnriched with SPF 17\r\nContains Hyaluronic acid and Vitamin B5\r\nIt restores a natural glow\r\nActs as a fairness agent', '25', '400', 'images/emp/product/Kbr4yUlswR69JoakrTnkrLchqfDoLqeCPljALUrz.jpeg', 1, 'female', 'face', '20'),
(19, '2019-04-28 23:07:00', '2019-04-28 23:07:00', '4', 'Neem And Tea Tree Face Wash', 'Neem is nature\'s personal answer for antibacterial skin care, washing away the factors that lead to acne and pimples. Rose petal extract and neem strike the perfect balance in aroma magic face wash neem and tea tree. All-natural organic skin care ingredients create the antibacterial properties of this facewash, while essential oils lend themselves to a therapeutic treatment. This facewash not only acts as a treatment for acne, but as a relaxing and healing indulgence for the skin. The neem in aroma magic face wash neem and tea tree is what makes this more than just a great facewash, but also an excellent acne treatment.', '40', '279', 'images/emp/product/Pcl323fGCNiX127nUjZu3xgcrGxhMgGKVZKOsoMq.jpeg', 1, 'MALE AND FEMALE', 'face', '200'),
(20, '2019-04-28 23:10:37', '2019-04-28 23:10:37', '4', 'PY Face and Beard Wash', 'Put on your game face with Nivea Men Deep Impact Face and Beard Wash. The intense black carbon thoroughly cleanses your skin and beard hair leaving you ready to take on the day. Put your best face forward to make a Real deep impact.', '60', '125', 'images/emp/product/FPhp2K6MKSwHqHGspcXMDPyOnDxyzkCzo9I8c7Aq.jpeg', 1, 'male', 'face', '20'),
(21, '2019-04-28 23:12:27', '2019-04-28 23:13:04', '4', 'ARTISTRY Essentials Gel', 'Enriched with Cucumber, this Gel Cleanser is a sulfate-free, soap-free 2-in-1 formula that effectively cleanses and tones skin in 1 step. This light foaming cleanser is a water based oil-free gel that deeply cleanses skin and removes make-up, impurities, clogging dirt and excess oil to help produce a fresher, cleaner-looking complexion. Description In our attempt to adapt as per the changing skin care needs, we have modified our Essentials range. The new and improved range is here to cater to all skin types and that too within 3 minutes. This new unisex range is enriched with Botanical ingredients in every formula. These ingredients add a special touch to each product in the range. The hero ingredient of this range is the Acerola Cherry Extract. It has been specially acquired from our own Nutrilite farms and is present in both the daily care products – Gel Cleanser and Light Lotion. This 2-in-1 Gel Cleanser-cum-Toner is enriched with Cucumber, which is well-known for its cooling and soothing effects. It provides a potent anti-oxidant protection to the skin. It is also enriched with Acerola Cherry which acts as an anti-oxidant and is one of the richest known source of Vitamin C.', '15', '220', 'images/emp/product/HWi82MBJYIp15lEb055HbeYgMf1VuP09mQn6QRyA.jpeg', 1, 'MALE AND FEMALE', 'face', '10'),
(22, '2019-04-28 23:17:01', '2019-04-28 23:17:01', '5', 'Lakme Perfect Radiance', 'Inspired by the illuminate trend, Lakme ’s Perfect Radiance range is now elevated to a new level of luxury and efficacy. The high-resolution clarity of a crystal is now captured in the New Lakme Absolute Perfect Radiance range.\r\n\r\nIf you wish for skin that has a flawless and illuminating glow, then this Lakme Absolute Perfect Radiance Skin Lightening Day Crème is formulated just for you. This Skin Lightening Day crème with precious micro-crystals and skin lightening vitamins gives you a fair, illuminated look. Moisture rich yet so ultra light this crème melts into your skin with a silky feel. This formulation gently polishes your skin to reveal that illuminated look. This Day Crème replenishes and moisturizes your skin giving it an instant fairer glow. Its advanced skin lightening formula is infused with vitamins, to give you a radiant, flawless skin. Its smooth, rich texture suits all skin types and is perfect to add to your cosmetic kit. Its sunscreens with SPF 30 protect your skin from sun damage. Along with luminous, glowing skin, the day cream gives you an even skin surface. It prevents dark spots, blemishes and breakouts giving you the perfect, radiant look. Look younger and glow every day with the Lakme Perfect Radiance Fairness Day Creme- buy it now!', '29', '860', 'images/emp/product/zDajfH5cCvIi73EiDNy8fhL4bJIIb9pab279pl6H.jpeg', 1, 'female', 'Body', '200'),
(23, '2019-04-28 23:22:00', '2019-04-28 23:22:00', '9', 'Papaya Fruit Facial Kit', 'Papaya, often referred to as the fruit of the angels is a rich source of an enzyme called papain and vitamin A, which together help in breaking down inactive proteins and thereby sloughing off dead skin cells. It also hydrates the skin and maintains its oil balance. In combination with other fruit and vegetable extracts like watermelon, peach, orange and cucumber, this papaya-enriched facial kit helps achieve a blemish-free, radiant complexion.', '25', '650', 'images/emp/product/jdvAzGdciiuchxn8RlPQcSCk9S7NnArD8SywL3cr.jpeg', 1, 'female', 'face', '150'),
(24, '2019-04-28 23:25:01', '2019-04-28 23:25:01', '8', 'Diamond Facial Kit,', 'Make your skin look clean and beautiful with this Diamond facial kit for women from VLCC.\r\n\r\nKey Ingredients being Vitamin E, jojoba, Real diamond bhasma\r\n\r\nDiamond Wash-off Mask; Usage: Step 1: Comfrey Cleanser Toner - Apply it on the face and neck, massage in upward and outward small circular strokes for 2-3 minutes and wipe off with moist cotton. Pay special attention to the corners of your nose, hairline, chin and neck. Step 2: Indian Barberry Face Scrub - Apply evenly on moist face and neck. Leave it on for 2-3 minutes. Then massage gently in upward and outward circular strokes for 3-4 minutes and rinse off.\r\nStep 3: Saffron Massage Gel - Apply on clean skin and massage gently in upward and outward circular strokes with wet finger tips for 8-10 minutes. Wipe off with moist cotton. Step 4: Singdha Face Cream - Take the cream on your finger tips and apply all over the face and neck. Massage with light circular upward strokes for 10-15 minutes. Step 5: Insta Glow Face Pack -\r\nApply the mask in a thin even layer all over the face and neck avoiding the eye area. Place two wet cotton wool pads over the eyes and relax for 20 minutes. Rinse off with splashes of cold water and pat dry. Step 6: Oil Free Moisturizing Gel - Take the gel on your finger tips and gently massage it all over your face and neck.\r\nSuitable For: All Skin Types; Ideal Usage: All Day;', '16', '850', 'images/emp/product/unSDkRHj2EmQ5L9TvYh5qlTXpp2JcNhLWFLtLmHn.jpeg', 1, 'female', 'face', '20'),
(25, '2019-04-28 23:27:16', '2019-04-28 23:27:16', '9', 'NIVEA Creme', 'The unmatched moisturiser for every skin type, for children as well as for adults and during all seasons.atched moisturiser for every skin type, for children as well as for adults and during all seasons. NIVEA Creme builds a protective layer that guards the skin from harmful external influences like heat, cold, humidity and pollution. It not only cares for the skin, but also prevents loss of moisture by retaining it within the skin. As a result, the skin remains naturally beautiful and well cared for. NIVEA Creme is an everyday, multi-purpose moisturising cream for oily skin which protects and gives relief from damaged skin, leaving it healthy. It can be used in countless ways. It is a popular day cream and night cream. You can even use it on your lips when they get chapped in the cold weather. The dermatologically tested NIVEA Creme is safe on the skin. Using it will help you protect and soothe the dry skin over your body, especially areas such as elbows, heels, cuticles and any body parts that need extra hydration. You can use this soft and gentle moisturising cream on your sensitive skin and the delicate skin of babies as well. Apply regularly to get soft, supple and hydrated skin.', '15', '220', 'images/emp/product/QXkvZAbqxTEV9C0ONMx0n6tY3JAQgr2FMMvasH4o.jpeg', 1, 'male', 'Body', '100'),
(26, '2019-04-28 23:29:04', '2019-04-28 23:29:04', '9', 'Oriflame', 'Oriflame Essentials Fairness Multi-Benefit Face Cream.Oriflame Essentials Fairness Multi-Benefit Face Cream.Oriflame Essentials Fairness Multi-Benefit Face Cream', '25', '630', 'images/emp/product/o37NSc8WM1O9XBmY1jyBYXcV7WDP0lPzpLI7xTqV.jpeg', 1, 'MALE AND FEMALE', 'face', '20');

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
(14, 'albin', 'thomas', '8606597597', 'images/22/m9dmJanLzzuls9hJIv11UJj1V5DqFj1RCtnXqxph.png', NULL, '2019-04-26 07:18:32', 'Male', NULL, '120', '150'),
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
  `serDisc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `servname`, `serDisc`, `created_at`, `updated_at`) VALUES
(6, 'Massage', 'We offer deep tissue massage, Swedish massage, couples massage, prenatal massage, ashiatsu bar massage, sports massage, detox steam massage and hot stone massage. We use natural organic oils and lotions with aromatherapy as you renew, revitalize and invigorate your senses.', '2019-04-28 21:26:41', '2019-04-28 21:26:41'),
(7, 'Facials', 'Organic facials include: Anti-aging Facial, Deep Pore Cleansing  and Acne Clearing Facial, Calming Facial for Sensitive Skin. Advanced facials include: Hydrafacial, Microdermabrasion, PCA chemical peel, 24 Karat Gold, BIO-Oxygen Ageless Facial.', '2019-04-28 22:02:13', '2019-04-28 22:02:13'),
(8, 'Body Treatments', 'Organic Body Scrub with Vichy Shower Therapy, Detoxifying Organic Mud Wrap, and Detox Steam.\r\n\r\nEnjoy the much sought after Hydrotherapy of the 8 massaging water jets of the Vichy Shower.', '2019-04-28 22:02:49', '2019-04-28 22:02:49'),
(9, 'Makeup', 'We offer MAC cosmetic makeup for Special Occasions, Weddings, Evening, Touch up or Day Makeup. Enjoy the lasting beauty of Tinting of Eyebrows and Lashes. Let us show your teen how to care for their skin and enhance their natural beauty.', '2019-04-28 22:03:39', '2019-04-28 22:03:39'),
(10, 'For Teens', 'It is never too late to encourage a healthy skin routine for teens. The recommended skin habits show your teen how to help keep their skin healthy for the rest of their life.', '2019-04-28 22:04:50', '2019-04-28 22:04:50');

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
(5, 3, 1, 'admin@gmail.com', '$2y$10$BX60bkRs5JpNgiK0jrP3g.rIfASLh68brkXZUpHfMUTPxxMA/n6ku', '7upvyW97vuJN04TBiGIf4dCuCnMcz6x6Kzh7bIpMFYE4GOVdoLIQw9h3itsI', '2019-03-15 09:20:30', '2019-03-15 09:20:30', '0000-00-00 00:00:00'),
(14, 1, 1, 'albin1@gmail.com', '$2y$10$wADZ7Nod6dZcTqCZ6FGhkeRIY0FK94azgUGyQVECsiYh1gV2buti2', 'BoyNhVjZDLfuWWjiJg5aAjsyT3TAEjoEqdhggNaneZgGFSoGQaL3LaQt8vDX', '2019-03-20 02:57:23', '2019-04-11 00:06:46', '0000-00-00 00:00:00'),
(46, 2, 1, 'albinthomas@mca.ajce.in', '$2y$10$rOUd.2tyQDx9uS54YqxvLeC3EVX7jBorFj5tyObldtAIaWX7BkO7q', NULL, '2019-04-01 16:55:09', '2019-04-11 01:01:28', '2019-04-10 18:30:00'),
(49, 1, 1, 'albinthomass@mca.ajce.in', '$2y$10$khX95.1CzcokEpQjSPpbmuP5jDRFLDdlpPpBTF5jBrNa67/KIuX.e', 'mm5mnsZySFtVzMh3EWP2EuNdxUnVsAmLv98qPIeanGd6jwqRZ5XKwE4bz7e5', '2019-04-07 09:49:44', '2019-04-07 09:49:44', NULL),
(50, 2, 1, 'albinthomas@gmail.com', '$2y$10$kLg0z4WgJB/VX9RzKoftme/7IDewV8PWsQrmeNuX4Mry7q65ogq.y', 'ae0nPoL7GsLeX06VHKCXghf0EVeqCBlcVg9oNzCXbY9dmnrZsJleG0u8ya3t', '2019-04-12 07:21:51', '2019-04-12 07:21:51', NULL),
(52, 2, 1, 'Alyssa@gmail.com', '$2y$10$Ftk9zC6tvQ4KThTgZf2EyuSoLZSMiQZ2HyOiztbAdZSqszGXy3rSS', NULL, '2019-04-28 23:46:55', '2019-04-28 23:46:55', NULL),
(53, 2, 1, 'Dawn2@gmail.com', '$2y$10$abl07xw/FamFPW0EpVkvKujxKIts5KWbne842QAhxpTc3yea2AEN2', NULL, '2019-04-28 23:53:07', '2019-04-28 23:53:07', NULL),
(54, 2, 1, 'Dawn@gmail.com', '$2y$10$jTwAdKgcZseKt26mh9OSg.x8NJHulnoMUDGt4wnN8S1rZqv6dloW6', NULL, '2019-04-28 23:56:25', '2019-04-28 23:56:25', NULL),
(55, 2, 1, 'albinthomas9995@gmail.com', '$2y$10$ACzZ.sxgWj2yBy7eQLCF.uevn4kkIg6KXYBvU8IHOZWZeWRqnM/hu', 'wPNDsWcIbjzec8R3P4nTr1pihhstqufciea6O6TmNEcnVHzFDoJaC6Jz2Kyv', '2019-04-29 00:02:46', '2019-04-29 00:13:35', '2019-04-29 00:13:35');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `productcategeory`
--
ALTER TABLE `productcategeory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
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
where updated_at < date_sub(now(),interval 5 MINUTE) 
  and (status=1 or status=2)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
