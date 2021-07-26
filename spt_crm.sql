-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 05:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spt_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_city`
--

CREATE TABLE `tb_city` (
  `ID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `CityName` varchar(80) NOT NULL,
  `Type` varchar(70) NOT NULL,
  `PostalCode` varchar(12) NOT NULL,
  `ProvinceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_city`
--

INSERT INTO `tb_city` (`ID`, `CityID`, `CityName`, `Type`, `PostalCode`, `ProvinceID`) VALUES
(1, 1, 'Aceh Barat', 'Kabupaten', '23681', 21),
(2, 2, 'Aceh Barat Daya', 'Kabupaten', '23764', 21),
(3, 3, 'Aceh Besar', 'Kabupaten', '23951', 21),
(4, 4, 'Aceh Jaya', 'Kabupaten', '23654', 21),
(5, 5, 'Aceh Selatan', 'Kabupaten', '23719', 21),
(6, 6, 'Aceh Singkil', 'Kabupaten', '24785', 21),
(7, 7, 'Aceh Tamiang', 'Kabupaten', '24476', 21),
(8, 8, 'Aceh Tengah', 'Kabupaten', '24511', 21),
(9, 9, 'Aceh Tenggara', 'Kabupaten', '24611', 21),
(10, 10, 'Aceh Timur', 'Kabupaten', '24454', 21),
(11, 11, 'Aceh Utara', 'Kabupaten', '24382', 21),
(12, 12, 'Agam', 'Kabupaten', '26411', 32),
(13, 13, 'Alor', 'Kabupaten', '85811', 23),
(14, 14, 'Ambon', 'Kota', '97222', 19),
(15, 15, 'Asahan', 'Kabupaten', '21214', 34),
(16, 16, 'Asmat', 'Kabupaten', '99777', 24),
(17, 17, 'Badung', 'Kabupaten', '80351', 1),
(18, 18, 'Balangan', 'Kabupaten', '71611', 13),
(19, 19, 'Balikpapan', 'Kota', '76111', 15),
(20, 20, 'Banda Aceh', 'Kota', '23238', 21),
(21, 21, 'Bandar Lampung', 'Kota', '35139', 18),
(22, 22, 'Bandung', 'Kabupaten', '40311', 9),
(23, 23, 'Bandung', 'Kota', '40111', 9),
(24, 24, 'Bandung Barat', 'Kabupaten', '40721', 9),
(25, 25, 'Banggai', 'Kabupaten', '94711', 29),
(26, 26, 'Banggai Kepulauan', 'Kabupaten', '94881', 29),
(27, 27, 'Bangka', 'Kabupaten', '33212', 2),
(28, 28, 'Bangka Barat', 'Kabupaten', '33315', 2),
(29, 29, 'Bangka Selatan', 'Kabupaten', '33719', 2),
(30, 30, 'Bangka Tengah', 'Kabupaten', '33613', 2),
(31, 31, 'Bangkalan', 'Kabupaten', '69118', 11),
(32, 32, 'Bangli', 'Kabupaten', '80619', 1),
(33, 33, 'Banjar', 'Kabupaten', '70619', 13),
(34, 34, 'Banjar', 'Kota', '46311', 9),
(35, 35, 'Banjarbaru', 'Kota', '70712', 13),
(36, 36, 'Banjarmasin', 'Kota', '70117', 13),
(37, 37, 'Banjarnegara', 'Kabupaten', '53419', 10),
(38, 38, 'Bantaeng', 'Kabupaten', '92411', 28),
(39, 39, 'Bantul', 'Kabupaten', '55715', 5),
(40, 40, 'Banyuasin', 'Kabupaten', '30911', 33),
(41, 41, 'Banyumas', 'Kabupaten', '53114', 10),
(42, 42, 'Banyuwangi', 'Kabupaten', '68416', 11),
(43, 43, 'Barito Kuala', 'Kabupaten', '70511', 13),
(44, 44, 'Barito Selatan', 'Kabupaten', '73711', 14),
(45, 45, 'Barito Timur', 'Kabupaten', '73671', 14),
(46, 46, 'Barito Utara', 'Kabupaten', '73881', 14),
(47, 47, 'Barru', 'Kabupaten', '90719', 28),
(48, 48, 'Batam', 'Kota', '29413', 17),
(49, 49, 'Batang', 'Kabupaten', '51211', 10),
(50, 50, 'Batang Hari', 'Kabupaten', '36613', 8),
(51, 51, 'Batu', 'Kota', '65311', 11),
(52, 52, 'Batu Bara', 'Kabupaten', '21655', 34),
(53, 53, 'Bau-Bau', 'Kota', '93719', 30),
(54, 54, 'Bekasi', 'Kabupaten', '17837', 9),
(55, 55, 'Bekasi', 'Kota', '17121', 9),
(56, 56, 'Belitung', 'Kabupaten', '33419', 2),
(57, 57, 'Belitung Timur', 'Kabupaten', '33519', 2),
(58, 58, 'Belu', 'Kabupaten', '85711', 23),
(59, 59, 'Bener Meriah', 'Kabupaten', '24581', 21),
(60, 60, 'Bengkalis', 'Kabupaten', '28719', 26),
(61, 61, 'Bengkayang', 'Kabupaten', '79213', 12),
(62, 62, 'Bengkulu', 'Kota', '38229', 4),
(63, 63, 'Bengkulu Selatan', 'Kabupaten', '38519', 4),
(64, 64, 'Bengkulu Tengah', 'Kabupaten', '38319', 4),
(65, 65, 'Bengkulu Utara', 'Kabupaten', '38619', 4),
(66, 66, 'Berau', 'Kabupaten', '77311', 15),
(67, 67, 'Biak Numfor', 'Kabupaten', '98119', 24),
(68, 68, 'Bima', 'Kabupaten', '84171', 22),
(69, 69, 'Bima', 'Kota', '84139', 22),
(70, 70, 'Binjai', 'Kota', '20712', 34),
(71, 71, 'Bintan', 'Kabupaten', '29135', 17),
(72, 72, 'Bireuen', 'Kabupaten', '24219', 21),
(73, 73, 'Bitung', 'Kota', '95512', 31),
(74, 74, 'Blitar', 'Kabupaten', '66171', 11),
(75, 75, 'Blitar', 'Kota', '66124', 11),
(76, 76, 'Blora', 'Kabupaten', '58219', 10),
(77, 77, 'Boalemo', 'Kabupaten', '96319', 7),
(78, 78, 'Bogor', 'Kabupaten', '16911', 9),
(79, 79, 'Bogor', 'Kota', '16119', 9),
(80, 80, 'Bojonegoro', 'Kabupaten', '62119', 11),
(81, 81, 'Bolaang Mongondow (Bolmong)', 'Kabupaten', '95755', 31),
(82, 82, 'Bolaang Mongondow Selatan', 'Kabupaten', '95774', 31),
(83, 83, 'Bolaang Mongondow Timur', 'Kabupaten', '95783', 31),
(84, 84, 'Bolaang Mongondow Utara', 'Kabupaten', '95765', 31),
(85, 85, 'Bombana', 'Kabupaten', '93771', 30),
(86, 86, 'Bondowoso', 'Kabupaten', '68219', 11),
(87, 87, 'Bone', 'Kabupaten', '92713', 28),
(88, 88, 'Bone Bolango', 'Kabupaten', '96511', 7),
(89, 89, 'Bontang', 'Kota', '75313', 15),
(90, 90, 'Boven Digoel', 'Kabupaten', '99662', 24),
(91, 91, 'Boyolali', 'Kabupaten', '57312', 10),
(92, 92, 'Brebes', 'Kabupaten', '52212', 10),
(93, 93, 'Bukittinggi', 'Kota', '26115', 32),
(94, 94, 'Buleleng', 'Kabupaten', '81111', 1),
(95, 95, 'Bulukumba', 'Kabupaten', '92511', 28),
(96, 96, 'Bulungan (Bulongan)', 'Kabupaten', '77211', 16),
(97, 97, 'Bungo', 'Kabupaten', '37216', 8),
(98, 98, 'Buol', 'Kabupaten', '94564', 29),
(99, 99, 'Buru', 'Kabupaten', '97371', 19),
(100, 100, 'Buru Selatan', 'Kabupaten', '97351', 19),
(101, 101, 'Buton', 'Kabupaten', '93754', 30),
(102, 102, 'Buton Utara', 'Kabupaten', '93745', 30),
(103, 103, 'Ciamis', 'Kabupaten', '46211', 9),
(104, 104, 'Cianjur', 'Kabupaten', '43217', 9),
(105, 105, 'Cilacap', 'Kabupaten', '53211', 10),
(106, 106, 'Cilegon', 'Kota', '42417', 3),
(107, 107, 'Cimahi', 'Kota', '40512', 9),
(108, 108, 'Cirebon', 'Kabupaten', '45611', 9),
(109, 109, 'Cirebon', 'Kota', '45116', 9),
(110, 110, 'Dairi', 'Kabupaten', '22211', 34),
(111, 111, 'Deiyai (Deliyai)', 'Kabupaten', '98784', 24),
(112, 112, 'Deli Serdang', 'Kabupaten', '20511', 34),
(113, 113, 'Demak', 'Kabupaten', '59519', 10),
(114, 114, 'Denpasar', 'Kota', '80227', 1),
(115, 115, 'Depok', 'Kota', '16416', 9),
(116, 116, 'Dharmasraya', 'Kabupaten', '27612', 32),
(117, 117, 'Dogiyai', 'Kabupaten', '98866', 24),
(118, 118, 'Dompu', 'Kabupaten', '84217', 22),
(119, 119, 'Donggala', 'Kabupaten', '94341', 29),
(120, 120, 'Dumai', 'Kota', '28811', 26),
(121, 121, 'Empat Lawang', 'Kabupaten', '31811', 33),
(122, 122, 'Ende', 'Kabupaten', '86351', 23),
(123, 123, 'Enrekang', 'Kabupaten', '91719', 28),
(124, 124, 'Fakfak', 'Kabupaten', '98651', 25),
(125, 125, 'Flores Timur', 'Kabupaten', '86213', 23),
(126, 126, 'Garut', 'Kabupaten', '44126', 9),
(127, 127, 'Gayo Lues', 'Kabupaten', '24653', 21),
(128, 128, 'Gianyar', 'Kabupaten', '80519', 1),
(129, 129, 'Gorontalo', 'Kabupaten', '96218', 7),
(130, 130, 'Gorontalo', 'Kota', '96115', 7),
(131, 131, 'Gorontalo Utara', 'Kabupaten', '96611', 7),
(132, 132, 'Gowa', 'Kabupaten', '92111', 28),
(133, 133, 'Gresik', 'Kabupaten', '61115', 11),
(134, 134, 'Grobogan', 'Kabupaten', '58111', 10),
(135, 135, 'Gunung Kidul', 'Kabupaten', '55812', 5),
(136, 136, 'Gunung Mas', 'Kabupaten', '74511', 14),
(137, 137, 'Gunungsitoli', 'Kota', '22813', 34),
(138, 138, 'Halmahera Barat', 'Kabupaten', '97757', 20),
(139, 139, 'Halmahera Selatan', 'Kabupaten', '97911', 20),
(140, 140, 'Halmahera Tengah', 'Kabupaten', '97853', 20),
(141, 141, 'Halmahera Timur', 'Kabupaten', '97862', 20),
(142, 142, 'Halmahera Utara', 'Kabupaten', '97762', 20),
(143, 143, 'Hulu Sungai Selatan', 'Kabupaten', '71212', 13),
(144, 144, 'Hulu Sungai Tengah', 'Kabupaten', '71313', 13),
(145, 145, 'Hulu Sungai Utara', 'Kabupaten', '71419', 13),
(146, 146, 'Humbang Hasundutan', 'Kabupaten', '22457', 34),
(147, 147, 'Indragiri Hilir', 'Kabupaten', '29212', 26),
(148, 148, 'Indragiri Hulu', 'Kabupaten', '29319', 26),
(149, 149, 'Indramayu', 'Kabupaten', '45214', 9),
(150, 150, 'Intan Jaya', 'Kabupaten', '98771', 24),
(151, 151, 'Jakarta Barat', 'Kota', '11220', 6),
(152, 152, 'Jakarta Pusat', 'Kota', '10540', 6),
(153, 153, 'Jakarta Selatan', 'Kota', '12230', 6),
(154, 154, 'Jakarta Timur', 'Kota', '13330', 6),
(155, 155, 'Jakarta Utara', 'Kota', '14140', 6),
(156, 156, 'Jambi', 'Kota', '36111', 8),
(157, 157, 'Jayapura', 'Kabupaten', '99352', 24),
(158, 158, 'Jayapura', 'Kota', '99114', 24),
(159, 159, 'Jayawijaya', 'Kabupaten', '99511', 24),
(160, 160, 'Jember', 'Kabupaten', '68113', 11),
(161, 161, 'Jembrana', 'Kabupaten', '82251', 1),
(162, 162, 'Jeneponto', 'Kabupaten', '92319', 28),
(163, 163, 'Jepara', 'Kabupaten', '59419', 10),
(164, 164, 'Jombang', 'Kabupaten', '61415', 11),
(165, 165, 'Kaimana', 'Kabupaten', '98671', 25),
(166, 166, 'Kampar', 'Kabupaten', '28411', 26),
(167, 167, 'Kapuas', 'Kabupaten', '73583', 14),
(168, 168, 'Kapuas Hulu', 'Kabupaten', '78719', 12),
(169, 169, 'Karanganyar', 'Kabupaten', '57718', 10),
(170, 170, 'Karangasem', 'Kabupaten', '80819', 1),
(171, 171, 'Karawang', 'Kabupaten', '41311', 9),
(172, 172, 'Karimun', 'Kabupaten', '29611', 17),
(173, 173, 'Karo', 'Kabupaten', '22119', 34),
(174, 174, 'Katingan', 'Kabupaten', '74411', 14),
(175, 175, 'Kaur', 'Kabupaten', '38911', 4),
(176, 176, 'Kayong Utara', 'Kabupaten', '78852', 12),
(177, 177, 'Kebumen', 'Kabupaten', '54319', 10),
(178, 178, 'Kediri', 'Kabupaten', '64184', 11),
(179, 179, 'Kediri', 'Kota', '64125', 11),
(180, 180, 'Keerom', 'Kabupaten', '99461', 24),
(181, 181, 'Kendal', 'Kabupaten', '51314', 10),
(182, 182, 'Kendari', 'Kota', '93126', 30),
(183, 183, 'Kepahiang', 'Kabupaten', '39319', 4),
(184, 184, 'Kepulauan Anambas', 'Kabupaten', '29991', 17),
(185, 185, 'Kepulauan Aru', 'Kabupaten', '97681', 19),
(186, 186, 'Kepulauan Mentawai', 'Kabupaten', '25771', 32),
(187, 187, 'Kepulauan Meranti', 'Kabupaten', '28791', 26),
(188, 188, 'Kepulauan Sangihe', 'Kabupaten', '95819', 31),
(189, 189, 'Kepulauan Seribu', 'Kabupaten', '14550', 6),
(190, 190, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 'Kabupaten', '95862', 31),
(191, 191, 'Kepulauan Sula', 'Kabupaten', '97995', 20),
(192, 192, 'Kepulauan Talaud', 'Kabupaten', '95885', 31),
(193, 193, 'Kepulauan Yapen (Yapen Waropen)', 'Kabupaten', '98211', 24),
(194, 194, 'Kerinci', 'Kabupaten', '37167', 8),
(195, 195, 'Ketapang', 'Kabupaten', '78874', 12),
(196, 196, 'Klaten', 'Kabupaten', '57411', 10),
(197, 197, 'Klungkung', 'Kabupaten', '80719', 1),
(198, 198, 'Kolaka', 'Kabupaten', '93511', 30),
(199, 199, 'Kolaka Utara', 'Kabupaten', '93911', 30),
(200, 200, 'Konawe', 'Kabupaten', '93411', 30),
(201, 201, 'Konawe Selatan', 'Kabupaten', '93811', 30),
(202, 202, 'Konawe Utara', 'Kabupaten', '93311', 30),
(203, 203, 'Kotabaru', 'Kabupaten', '72119', 13),
(204, 204, 'Kotamobagu', 'Kota', '95711', 31),
(205, 205, 'Kotawaringin Barat', 'Kabupaten', '74119', 14),
(206, 206, 'Kotawaringin Timur', 'Kabupaten', '74364', 14),
(207, 207, 'Kuantan Singingi', 'Kabupaten', '29519', 26),
(208, 208, 'Kubu Raya', 'Kabupaten', '78311', 12),
(209, 209, 'Kudus', 'Kabupaten', '59311', 10),
(210, 210, 'Kulon Progo', 'Kabupaten', '55611', 5),
(211, 211, 'Kuningan', 'Kabupaten', '45511', 9),
(212, 212, 'Kupang', 'Kabupaten', '85362', 23),
(213, 213, 'Kupang', 'Kota', '85119', 23),
(214, 214, 'Kutai Barat', 'Kabupaten', '75711', 15),
(215, 215, 'Kutai Kartanegara', 'Kabupaten', '75511', 15),
(216, 216, 'Kutai Timur', 'Kabupaten', '75611', 15),
(217, 217, 'Labuhan Batu', 'Kabupaten', '21412', 34),
(218, 218, 'Labuhan Batu Selatan', 'Kabupaten', '21511', 34),
(219, 219, 'Labuhan Batu Utara', 'Kabupaten', '21711', 34),
(220, 220, 'Lahat', 'Kabupaten', '31419', 33),
(221, 221, 'Lamandau', 'Kabupaten', '74611', 14),
(222, 222, 'Lamongan', 'Kabupaten', '64125', 11),
(223, 223, 'Lampung Barat', 'Kabupaten', '34814', 18),
(224, 224, 'Lampung Selatan', 'Kabupaten', '35511', 18),
(225, 225, 'Lampung Tengah', 'Kabupaten', '34212', 18),
(226, 226, 'Lampung Timur', 'Kabupaten', '34319', 18),
(227, 227, 'Lampung Utara', 'Kabupaten', '34516', 18),
(228, 228, 'Landak', 'Kabupaten', '78319', 12),
(229, 229, 'Langkat', 'Kabupaten', '20811', 34),
(230, 230, 'Langsa', 'Kota', '24412', 21),
(231, 231, 'Lanny Jaya', 'Kabupaten', '99531', 24),
(232, 232, 'Lebak', 'Kabupaten', '42319', 3),
(233, 233, 'Lebong', 'Kabupaten', '39264', 4),
(234, 234, 'Lembata', 'Kabupaten', '86611', 23),
(235, 235, 'Lhokseumawe', 'Kota', '24352', 21),
(236, 236, 'Lima Puluh Koto/Kota', 'Kabupaten', '26671', 32),
(237, 237, 'Lingga', 'Kabupaten', '29811', 17),
(238, 238, 'Lombok Barat', 'Kabupaten', '83311', 22),
(239, 239, 'Lombok Tengah', 'Kabupaten', '83511', 22),
(240, 240, 'Lombok Timur', 'Kabupaten', '83612', 22),
(241, 241, 'Lombok Utara', 'Kabupaten', '83711', 22),
(242, 242, 'Lubuk Linggau', 'Kota', '31614', 33),
(243, 243, 'Lumajang', 'Kabupaten', '67319', 11),
(244, 244, 'Luwu', 'Kabupaten', '91994', 28),
(245, 245, 'Luwu Timur', 'Kabupaten', '92981', 28),
(246, 246, 'Luwu Utara', 'Kabupaten', '92911', 28),
(247, 247, 'Madiun', 'Kabupaten', '63153', 11),
(248, 248, 'Madiun', 'Kota', '63122', 11),
(249, 249, 'Magelang', 'Kabupaten', '56519', 10),
(250, 250, 'Magelang', 'Kota', '56133', 10),
(251, 251, 'Magetan', 'Kabupaten', '63314', 11),
(252, 252, 'Majalengka', 'Kabupaten', '45412', 9),
(253, 253, 'Majene', 'Kabupaten', '91411', 27),
(254, 254, 'Makassar', 'Kota', '90111', 28),
(255, 255, 'Malang', 'Kabupaten', '65163', 11),
(256, 256, 'Malang', 'Kota', '65112', 11),
(257, 257, 'Malinau', 'Kabupaten', '77511', 16),
(258, 258, 'Maluku Barat Daya', 'Kabupaten', '97451', 19),
(259, 259, 'Maluku Tengah', 'Kabupaten', '97513', 19),
(260, 260, 'Maluku Tenggara', 'Kabupaten', '97651', 19),
(261, 261, 'Maluku Tenggara Barat', 'Kabupaten', '97465', 19),
(262, 262, 'Mamasa', 'Kabupaten', '91362', 27),
(263, 263, 'Mamberamo Raya', 'Kabupaten', '99381', 24),
(264, 264, 'Mamberamo Tengah', 'Kabupaten', '99553', 24),
(265, 265, 'Mamuju', 'Kabupaten', '91519', 27),
(266, 266, 'Mamuju Utara', 'Kabupaten', '91571', 27),
(267, 267, 'Manado', 'Kota', '95247', 31),
(268, 268, 'Mandailing Natal', 'Kabupaten', '22916', 34),
(269, 269, 'Manggarai', 'Kabupaten', '86551', 23),
(270, 270, 'Manggarai Barat', 'Kabupaten', '86711', 23),
(271, 271, 'Manggarai Timur', 'Kabupaten', '86811', 23),
(272, 272, 'Manokwari', 'Kabupaten', '98311', 25),
(273, 273, 'Manokwari Selatan', 'Kabupaten', '98355', 25),
(274, 274, 'Mappi', 'Kabupaten', '99853', 24),
(275, 275, 'Maros', 'Kabupaten', '90511', 28),
(276, 276, 'Mataram', 'Kota', '83131', 22),
(277, 277, 'Maybrat', 'Kabupaten', '98051', 25),
(278, 278, 'Medan', 'Kota', '20228', 34),
(279, 279, 'Melawi', 'Kabupaten', '78619', 12),
(280, 280, 'Merangin', 'Kabupaten', '37319', 8),
(281, 281, 'Merauke', 'Kabupaten', '99613', 24),
(282, 282, 'Mesuji', 'Kabupaten', '34911', 18),
(283, 283, 'Metro', 'Kota', '34111', 18),
(284, 284, 'Mimika', 'Kabupaten', '99962', 24),
(285, 285, 'Minahasa', 'Kabupaten', '95614', 31),
(286, 286, 'Minahasa Selatan', 'Kabupaten', '95914', 31),
(287, 287, 'Minahasa Tenggara', 'Kabupaten', '95995', 31),
(288, 288, 'Minahasa Utara', 'Kabupaten', '95316', 31),
(289, 289, 'Mojokerto', 'Kabupaten', '61382', 11),
(290, 290, 'Mojokerto', 'Kota', '61316', 11),
(291, 291, 'Morowali', 'Kabupaten', '94911', 29),
(292, 292, 'Muara Enim', 'Kabupaten', '31315', 33),
(293, 293, 'Muaro Jambi', 'Kabupaten', '36311', 8),
(294, 294, 'Muko Muko', 'Kabupaten', '38715', 4),
(295, 295, 'Muna', 'Kabupaten', '93611', 30),
(296, 296, 'Murung Raya', 'Kabupaten', '73911', 14),
(297, 297, 'Musi Banyuasin', 'Kabupaten', '30719', 33),
(298, 298, 'Musi Rawas', 'Kabupaten', '31661', 33),
(299, 299, 'Nabire', 'Kabupaten', '98816', 24),
(300, 300, 'Nagan Raya', 'Kabupaten', '23674', 21),
(301, 301, 'Nagekeo', 'Kabupaten', '86911', 23),
(302, 302, 'Natuna', 'Kabupaten', '29711', 17),
(303, 303, 'Nduga', 'Kabupaten', '99541', 24),
(304, 304, 'Ngada', 'Kabupaten', '86413', 23),
(305, 305, 'Nganjuk', 'Kabupaten', '64414', 11),
(306, 306, 'Ngawi', 'Kabupaten', '63219', 11),
(307, 307, 'Nias', 'Kabupaten', '22876', 34),
(308, 308, 'Nias Barat', 'Kabupaten', '22895', 34),
(309, 309, 'Nias Selatan', 'Kabupaten', '22865', 34),
(310, 310, 'Nias Utara', 'Kabupaten', '22856', 34),
(311, 311, 'Nunukan', 'Kabupaten', '77421', 16),
(312, 312, 'Ogan Ilir', 'Kabupaten', '30811', 33),
(313, 313, 'Ogan Komering Ilir', 'Kabupaten', '30618', 33),
(314, 314, 'Ogan Komering Ulu', 'Kabupaten', '32112', 33),
(315, 315, 'Ogan Komering Ulu Selatan', 'Kabupaten', '32211', 33),
(316, 316, 'Ogan Komering Ulu Timur', 'Kabupaten', '32312', 33),
(317, 317, 'Pacitan', 'Kabupaten', '63512', 11),
(318, 318, 'Padang', 'Kota', '25112', 32),
(319, 319, 'Padang Lawas', 'Kabupaten', '22763', 34),
(320, 320, 'Padang Lawas Utara', 'Kabupaten', '22753', 34),
(321, 321, 'Padang Panjang', 'Kota', '27122', 32),
(322, 322, 'Padang Pariaman', 'Kabupaten', '25583', 32),
(323, 323, 'Padang Sidempuan', 'Kota', '22727', 34),
(324, 324, 'Pagar Alam', 'Kota', '31512', 33),
(325, 325, 'Pakpak Bharat', 'Kabupaten', '22272', 34),
(326, 326, 'Palangka Raya', 'Kota', '73112', 14),
(327, 327, 'Palembang', 'Kota', '30111', 33),
(328, 328, 'Palopo', 'Kota', '91911', 28),
(329, 329, 'Palu', 'Kota', '94111', 29),
(330, 330, 'Pamekasan', 'Kabupaten', '69319', 11),
(331, 331, 'Pandeglang', 'Kabupaten', '42212', 3),
(332, 332, 'Pangandaran', 'Kabupaten', '46511', 9),
(333, 333, 'Pangkajene Kepulauan', 'Kabupaten', '90611', 28),
(334, 334, 'Pangkal Pinang', 'Kota', '33115', 2),
(335, 335, 'Paniai', 'Kabupaten', '98765', 24),
(336, 336, 'Parepare', 'Kota', '91123', 28),
(337, 337, 'Pariaman', 'Kota', '25511', 32),
(338, 338, 'Parigi Moutong', 'Kabupaten', '94411', 29),
(339, 339, 'Pasaman', 'Kabupaten', '26318', 32),
(340, 340, 'Pasaman Barat', 'Kabupaten', '26511', 32),
(341, 341, 'Paser', 'Kabupaten', '76211', 15),
(342, 342, 'Pasuruan', 'Kabupaten', '67153', 11),
(343, 343, 'Pasuruan', 'Kota', '67118', 11),
(344, 344, 'Pati', 'Kabupaten', '59114', 10),
(345, 345, 'Payakumbuh', 'Kota', '26213', 32),
(346, 346, 'Pegunungan Arfak', 'Kabupaten', '98354', 25),
(347, 347, 'Pegunungan Bintang', 'Kabupaten', '99573', 24),
(348, 348, 'Pekalongan', 'Kabupaten', '51161', 10),
(349, 349, 'Pekalongan', 'Kota', '51122', 10),
(350, 350, 'Pekanbaru', 'Kota', '28112', 26),
(351, 351, 'Pelalawan', 'Kabupaten', '28311', 26),
(352, 352, 'Pemalang', 'Kabupaten', '52319', 10),
(353, 353, 'Pematang Siantar', 'Kota', '21126', 34),
(354, 354, 'Penajam Paser Utara', 'Kabupaten', '76311', 15),
(355, 355, 'Pesawaran', 'Kabupaten', '35312', 18),
(356, 356, 'Pesisir Barat', 'Kabupaten', '35974', 18),
(357, 357, 'Pesisir Selatan', 'Kabupaten', '25611', 32),
(358, 358, 'Pidie', 'Kabupaten', '24116', 21),
(359, 359, 'Pidie Jaya', 'Kabupaten', '24186', 21),
(360, 360, 'Pinrang', 'Kabupaten', '91251', 28),
(361, 361, 'Pohuwato', 'Kabupaten', '96419', 7),
(362, 362, 'Polewali Mandar', 'Kabupaten', '91311', 27),
(363, 363, 'Ponorogo', 'Kabupaten', '63411', 11),
(364, 364, 'Pontianak', 'Kabupaten', '78971', 12),
(365, 365, 'Pontianak', 'Kota', '78112', 12),
(366, 366, 'Poso', 'Kabupaten', '94615', 29),
(367, 367, 'Prabumulih', 'Kota', '31121', 33),
(368, 368, 'Pringsewu', 'Kabupaten', '35719', 18),
(369, 369, 'Probolinggo', 'Kabupaten', '67282', 11),
(370, 370, 'Probolinggo', 'Kota', '67215', 11),
(371, 371, 'Pulang Pisau', 'Kabupaten', '74811', 14),
(372, 372, 'Pulau Morotai', 'Kabupaten', '97771', 20),
(373, 373, 'Puncak', 'Kabupaten', '98981', 24),
(374, 374, 'Puncak Jaya', 'Kabupaten', '98979', 24),
(375, 375, 'Purbalingga', 'Kabupaten', '53312', 10),
(376, 376, 'Purwakarta', 'Kabupaten', '41119', 9),
(377, 377, 'Purworejo', 'Kabupaten', '54111', 10),
(378, 378, 'Raja Ampat', 'Kabupaten', '98489', 25),
(379, 379, 'Rejang Lebong', 'Kabupaten', '39112', 4),
(380, 380, 'Rembang', 'Kabupaten', '59219', 10),
(381, 381, 'Rokan Hilir', 'Kabupaten', '28992', 26),
(382, 382, 'Rokan Hulu', 'Kabupaten', '28511', 26),
(383, 383, 'Rote Ndao', 'Kabupaten', '85982', 23),
(384, 384, 'Sabang', 'Kota', '23512', 21),
(385, 385, 'Sabu Raijua', 'Kabupaten', '85391', 23),
(386, 386, 'Salatiga', 'Kota', '50711', 10),
(387, 387, 'Samarinda', 'Kota', '75133', 15),
(388, 388, 'Sambas', 'Kabupaten', '79453', 12),
(389, 389, 'Samosir', 'Kabupaten', '22392', 34),
(390, 390, 'Sampang', 'Kabupaten', '69219', 11),
(391, 391, 'Sanggau', 'Kabupaten', '78557', 12),
(392, 392, 'Sarmi', 'Kabupaten', '99373', 24),
(393, 393, 'Sarolangun', 'Kabupaten', '37419', 8),
(394, 394, 'Sawah Lunto', 'Kota', '27416', 32),
(395, 395, 'Sekadau', 'Kabupaten', '79583', 12),
(396, 396, 'Selayar (Kepulauan Selayar)', 'Kabupaten', '92812', 28),
(397, 397, 'Seluma', 'Kabupaten', '38811', 4),
(398, 398, 'Semarang', 'Kabupaten', '50511', 10),
(399, 399, 'Semarang', 'Kota', '50135', 10),
(400, 400, 'Seram Bagian Barat', 'Kabupaten', '97561', 19),
(401, 401, 'Seram Bagian Timur', 'Kabupaten', '97581', 19),
(402, 402, 'Serang', 'Kabupaten', '42182', 3),
(403, 403, 'Serang', 'Kota', '42111', 3),
(404, 404, 'Serdang Bedagai', 'Kabupaten', '20915', 34),
(405, 405, 'Seruyan', 'Kabupaten', '74211', 14),
(406, 406, 'Siak', 'Kabupaten', '28623', 26),
(407, 407, 'Sibolga', 'Kota', '22522', 34),
(408, 408, 'Sidenreng Rappang/Rapang', 'Kabupaten', '91613', 28),
(409, 409, 'Sidoarjo', 'Kabupaten', '61219', 11),
(410, 410, 'Sigi', 'Kabupaten', '94364', 29),
(411, 411, 'Sijunjung (Sawah Lunto Sijunjung)', 'Kabupaten', '27511', 32),
(412, 412, 'Sikka', 'Kabupaten', '86121', 23),
(413, 413, 'Simalungun', 'Kabupaten', '21162', 34),
(414, 414, 'Simeulue', 'Kabupaten', '23891', 21),
(415, 415, 'Singkawang', 'Kota', '79117', 12),
(416, 416, 'Sinjai', 'Kabupaten', '92615', 28),
(417, 417, 'Sintang', 'Kabupaten', '78619', 12),
(418, 418, 'Situbondo', 'Kabupaten', '68316', 11),
(419, 419, 'Sleman', 'Kabupaten', '55513', 5),
(420, 420, 'Solok', 'Kabupaten', '27365', 32),
(421, 421, 'Solok', 'Kota', '27315', 32),
(422, 422, 'Solok Selatan', 'Kabupaten', '27779', 32),
(423, 423, 'Soppeng', 'Kabupaten', '90812', 28),
(424, 424, 'Sorong', 'Kabupaten', '98431', 25),
(425, 425, 'Sorong', 'Kota', '98411', 25),
(426, 426, 'Sorong Selatan', 'Kabupaten', '98454', 25),
(427, 427, 'Sragen', 'Kabupaten', '57211', 10),
(428, 428, 'Subang', 'Kabupaten', '41215', 9),
(429, 429, 'Subulussalam', 'Kota', '24882', 21),
(430, 430, 'Sukabumi', 'Kabupaten', '43311', 9),
(431, 431, 'Sukabumi', 'Kota', '43114', 9),
(432, 432, 'Sukamara', 'Kabupaten', '74712', 14),
(433, 433, 'Sukoharjo', 'Kabupaten', '57514', 10),
(434, 434, 'Sumba Barat', 'Kabupaten', '87219', 23),
(435, 435, 'Sumba Barat Daya', 'Kabupaten', '87453', 23),
(436, 436, 'Sumba Tengah', 'Kabupaten', '87358', 23),
(437, 437, 'Sumba Timur', 'Kabupaten', '87112', 23),
(438, 438, 'Sumbawa', 'Kabupaten', '84315', 22),
(439, 439, 'Sumbawa Barat', 'Kabupaten', '84419', 22),
(440, 440, 'Sumedang', 'Kabupaten', '45326', 9),
(441, 441, 'Sumenep', 'Kabupaten', '69413', 11),
(442, 442, 'Sungaipenuh', 'Kota', '37113', 8),
(443, 443, 'Supiori', 'Kabupaten', '98164', 24),
(444, 444, 'Surabaya', 'Kota', '60119', 11),
(445, 445, 'Surakarta (Solo)', 'Kota', '57113', 10),
(446, 446, 'Tabalong', 'Kabupaten', '71513', 13),
(447, 447, 'Tabanan', 'Kabupaten', '82119', 1),
(448, 448, 'Takalar', 'Kabupaten', '92212', 28),
(449, 449, 'Tambrauw', 'Kabupaten', '98475', 25),
(450, 450, 'Tana Tidung', 'Kabupaten', '77611', 16),
(451, 451, 'Tana Toraja', 'Kabupaten', '91819', 28),
(452, 452, 'Tanah Bumbu', 'Kabupaten', '72211', 13),
(453, 453, 'Tanah Datar', 'Kabupaten', '27211', 32),
(454, 454, 'Tanah Laut', 'Kabupaten', '70811', 13),
(455, 455, 'Tangerang', 'Kabupaten', '15914', 3),
(456, 456, 'Tangerang', 'Kota', '15111', 3),
(457, 457, 'Tangerang Selatan', 'Kota', '15332', 3),
(458, 458, 'Tanggamus', 'Kabupaten', '35619', 18),
(459, 459, 'Tanjung Balai', 'Kota', '21321', 34),
(460, 460, 'Tanjung Jabung Barat', 'Kabupaten', '36513', 8),
(461, 461, 'Tanjung Jabung Timur', 'Kabupaten', '36719', 8),
(462, 462, 'Tanjung Pinang', 'Kota', '29111', 17),
(463, 463, 'Tapanuli Selatan', 'Kabupaten', '22742', 34),
(464, 464, 'Tapanuli Tengah', 'Kabupaten', '22611', 34),
(465, 465, 'Tapanuli Utara', 'Kabupaten', '22414', 34),
(466, 466, 'Tapin', 'Kabupaten', '71119', 13),
(467, 467, 'Tarakan', 'Kota', '77114', 16),
(468, 468, 'Tasikmalaya', 'Kabupaten', '46411', 9),
(469, 469, 'Tasikmalaya', 'Kota', '46116', 9),
(470, 470, 'Tebing Tinggi', 'Kota', '20632', 34),
(471, 471, 'Tebo', 'Kabupaten', '37519', 8),
(472, 472, 'Tegal', 'Kabupaten', '52419', 10),
(473, 473, 'Tegal', 'Kota', '52114', 10),
(474, 474, 'Teluk Bintuni', 'Kabupaten', '98551', 25),
(475, 475, 'Teluk Wondama', 'Kabupaten', '98591', 25),
(476, 476, 'Temanggung', 'Kabupaten', '56212', 10),
(477, 477, 'Ternate', 'Kota', '97714', 20),
(478, 478, 'Tidore Kepulauan', 'Kota', '97815', 20),
(479, 479, 'Timor Tengah Selatan', 'Kabupaten', '85562', 23),
(480, 480, 'Timor Tengah Utara', 'Kabupaten', '85612', 23),
(481, 481, 'Toba Samosir', 'Kabupaten', '22316', 34),
(482, 482, 'Tojo Una-Una', 'Kabupaten', '94683', 29),
(483, 483, 'Toli-Toli', 'Kabupaten', '94542', 29),
(484, 484, 'Tolikara', 'Kabupaten', '99411', 24),
(485, 485, 'Tomohon', 'Kota', '95416', 31),
(486, 486, 'Toraja Utara', 'Kabupaten', '91831', 28),
(487, 487, 'Trenggalek', 'Kabupaten', '66312', 11),
(488, 488, 'Tual', 'Kota', '97612', 19),
(489, 489, 'Tuban', 'Kabupaten', '62319', 11),
(490, 490, 'Tulang Bawang', 'Kabupaten', '34613', 18),
(491, 491, 'Tulang Bawang Barat', 'Kabupaten', '34419', 18),
(492, 492, 'Tulungagung', 'Kabupaten', '66212', 11),
(493, 493, 'Wajo', 'Kabupaten', '90911', 28),
(494, 494, 'Wakatobi', 'Kabupaten', '93791', 30),
(495, 495, 'Waropen', 'Kabupaten', '98269', 24),
(496, 496, 'Way Kanan', 'Kabupaten', '34711', 18),
(497, 497, 'Wonogiri', 'Kabupaten', '57619', 10),
(498, 498, 'Wonosobo', 'Kabupaten', '56311', 10),
(499, 499, 'Yahukimo', 'Kabupaten', '99041', 24),
(500, 500, 'Yalimo', 'Kabupaten', '99481', 24),
(501, 501, 'Yogyakarta', 'Kota', '55111', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_include`
--

CREATE TABLE `tb_include` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(200) DEFAULT NULL,
  `PhoneNumber` varchar(13) DEFAULT NULL,
  `CompanyEmail` varchar(90) DEFAULT NULL,
  `CompanyAddress` text DEFAULT NULL,
  `tentang` text NOT NULL,
  `Logo` longblob DEFAULT NULL,
  `LogoIcon` longblob DEFAULT NULL,
  `UrlTwitter` varchar(255) DEFAULT NULL,
  `UrlFacebook` varchar(255) DEFAULT NULL,
  `UrlInstagram` varchar(255) DEFAULT NULL,
  `BankName` varchar(50) DEFAULT NULL,
  `AtasNama` varchar(90) DEFAULT NULL,
  `Wallet` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_include`
--

INSERT INTO `tb_include` (`id`, `CompanyName`, `PhoneNumber`, `CompanyEmail`, `CompanyAddress`, `tentang`, `Logo`, `LogoIcon`, `UrlTwitter`, `UrlFacebook`, `UrlInstagram`, `BankName`, `AtasNama`, `Wallet`) VALUES
(1, 'Toko Cahaya', '083825287989', 'mirwansyah1933@gmail.com', 'Jl. RA Kartini, RT 04 / RW 01, Blok Pon, No. 45, Kabupaten Cirebon, Jawa Barat, 45188', 'Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet Semper at elit team advisors.', NULL, NULL, NULL, NULL, NULL, 'BNI', 'Mohammad Irwansyah Somantri', '32616612');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `orders_id` int(11) NOT NULL,
  `invoices_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `voucher_kode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_alamat` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_kota` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_kodepos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_notelp` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `orders_totalharga` bigint(20) NOT NULL DEFAULT 0,
  `tipe_pembayaran` enum('transfer','cod') COLLATE latin1_general_ci DEFAULT NULL,
  `orders_date` datetime DEFAULT NULL,
  `orders_duedate` datetime DEFAULT NULL,
  `bukti_nama_pengirim` text COLLATE latin1_general_ci DEFAULT NULL,
  `bukti_transaksi` text COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `status` enum('paid','unpaid','canceled','expired') COLLATE latin1_general_ci NOT NULL DEFAULT 'unpaid',
  `status_pengiriman` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Belum dikirim | 1 = Sudah dikirim | 2 = Sudah diterima'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`orders_id`, `invoices_id`, `users_id`, `voucher_kode`, `orders_nama`, `orders_alamat`, `orders_kota`, `orders_kodepos`, `orders_notelp`, `orders_totalharga`, `tipe_pembayaran`, `orders_date`, `orders_duedate`, `bukti_nama_pengirim`, `bukti_transaksi`, `tgl_transaksi`, `status`, `status_pengiriman`) VALUES
(1, 'INV20210700001', 22, NULL, 'Mohammad Irwansyah Somantri', 'Ciledug', 'Cirebon', '45111', '6283825287989', 13400, 'transfer', '2021-07-22 00:43:08', '2021-07-23 05:43:08', 'asdasda', 'WhatsApp Image 2021-07-21 at 15.46.33.jpeg', '2021-07-22 05:15:28', 'paid', 1),
(6, 'INV20210700002', 22, NULL, 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 32900, 'cod', '2021-07-23 15:01:51', '2021-07-24 15:01:51', NULL, NULL, NULL, 'unpaid', 0),
(7, 'INV20210700003', 22, NULL, 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 6500, 'cod', '2021-07-23 15:31:00', '2021-07-24 15:31:00', NULL, NULL, NULL, 'unpaid', 0),
(8, 'INV20210700004', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'cod', '2021-07-23 15:34:10', '2021-07-24 15:34:10', NULL, NULL, NULL, 'unpaid', 0),
(9, 'INV20210700005', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'cod', '2021-07-23 15:35:38', '2021-07-24 15:35:38', NULL, NULL, NULL, 'paid', 0),
(10, 'INV20210700006', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'cod', '2021-07-23 15:55:47', '2021-07-24 15:55:47', NULL, NULL, NULL, 'paid', 1),
(11, 'INV20210700007', 22, 'NTP8APR8PBV7D6M', 'M Teguh A', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188', '083825287989', 0, 'transfer', '2021-07-23 16:12:17', '2021-07-24 16:12:17', NULL, NULL, NULL, 'paid', 1),
(12, 'INV20210700008', 23, NULL, 'anjay nyobain', 'Kuningan', NULL, '45516', '08952548456', 6500, 'transfer', '2021-07-23 17:30:32', '2021-07-24 17:30:32', NULL, NULL, NULL, 'unpaid', 0),
(13, 'INV20210700009', 23, NULL, 'anjay nyobain', 'Kuningan', NULL, '45516', '08952548456', 6500, 'transfer', '2021-07-23 17:33:23', '2021-07-24 17:33:23', 'yyy', 'beras.jpg', '2021-07-23 17:44:21', 'unpaid', 0),
(14, 'INV20210700010', 24, NULL, 'User ', 'Jl raya Siliwangi, Blok A 5 ', NULL, '45554', '087111222333', 13200, 'transfer', '2021-07-24 13:03:57', '2021-07-25 13:03:57', 'User', 'IMG-20210722-WA0006.jpg', '2021-07-24 13:04:44', 'paid', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders_detail`
--

CREATE TABLE `tb_orders_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `kuantitas` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_orders_detail`
--

INSERT INTO `tb_orders_detail` (`orders_detail_id`, `orders_id`, `produk_id`, `kuantitas`) VALUES
(1, 1, 4, 2),
(2, 6, 4, 2),
(3, 6, 6, 1),
(4, 6, 6, 2),
(5, 7, 6, 1),
(6, 8, 6, 1),
(7, 9, 6, 1),
(8, 10, 6, 1),
(9, 11, 6, 2),
(10, 12, 6, 1),
(11, 13, 6, 1),
(12, 14, 4, 0),
(13, 14, 4, 1),
(14, 14, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `produk_harga` bigint(20) NOT NULL DEFAULT 0,
  `produk_stok` tinyint(4) NOT NULL DEFAULT 0,
  `produk_image` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `date_entry` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_image`, `date_entry`, `users_id`) VALUES
(4, 'Beras', 6700, 100, 'kissingFace.png', '2021-07-22 00:21:00', NULL),
(6, 'Telur', 6500, 89, 'overingFace.png', '2021-07-22 16:31:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_province`
--

CREATE TABLE `tb_province` (
  `ID` int(11) NOT NULL,
  `ProvinceID` int(11) NOT NULL,
  `ProvinceName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_province`
--

INSERT INTO `tb_province` (`ID`, `ProvinceID`, `ProvinceName`) VALUES
(1, 1, 'Bali'),
(2, 2, 'Bangka Belitung'),
(3, 3, 'Banten'),
(4, 4, 'Bengkulu'),
(5, 5, 'DI Yogyakarta'),
(6, 6, 'DKI Jakarta'),
(7, 7, 'Gorontalo'),
(8, 8, 'Jambi'),
(9, 9, 'Jawa Barat'),
(10, 10, 'Jawa Tengah'),
(11, 11, 'Jawa Timur'),
(12, 12, 'Kalimantan Barat'),
(13, 13, 'Kalimantan Selatan'),
(14, 14, 'Kalimantan Tengah'),
(15, 15, 'Kalimantan Timur'),
(16, 16, 'Kalimantan Utara'),
(17, 17, 'Kepulauan Riau'),
(18, 18, 'Lampung'),
(19, 19, 'Maluku'),
(20, 20, 'Maluku Utara'),
(21, 21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 22, 'Nusa Tenggara Barat (NTB)'),
(23, 23, 'Nusa Tenggara Timur (NTT)'),
(24, 24, 'Papua'),
(25, 25, 'Papua Barat'),
(26, 26, 'Riau'),
(27, 27, 'Sulawesi Barat'),
(28, 28, 'Sulawesi Selatan'),
(29, 29, 'Sulawesi Tengah'),
(30, 30, 'Sulawesi Tenggara'),
(31, 31, 'Sulawesi Utara'),
(32, 32, 'Sumatera Barat'),
(33, 33, 'Sumatera Selatan'),
(34, 34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `users_id` int(11) NOT NULL,
  `users_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `points` bigint(20) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0 = Admin | 1 = Pemilik | 2 = User',
  `nomortelp` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE latin1_general_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`users_id`, `users_nama`, `points`, `image`, `email`, `password`, `role_id`, `nomortelp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `city_id`, `kode_pos`) VALUES
(1, 'Mohammad Irwansyah Somantri', 0, '', 'mirwansyah1933@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 0, '083825287989', 'Cirebon', '2011-06-21', 'Ciledug Kulon', NULL, '45188'),
(18, 'asdas', 0, NULL, 'qweqw@asdas.asdas', '78c2e21e96e6c96c77768637a3ab09fef24fe513', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'asdasdq', 0, NULL, '12312@asda.123', 'd2c40242ce1bd9a59d204347868d086698e85138', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'M Teguh A', 0, 'HuggingFace.png', 'mohammadirwansyah1933@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 2, '083825287989', 'Cirebon', '2001-06-17', 'Jl. RA Kartini, RT 04, RW 01, Ciledug Kulon, Kab. Cirebon, Jawa Barat, Indonesia', NULL, '45188'),
(23, 'anjay nyobain', 0, '', 'coba@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 2, '08952548456', 'Kuningan', '1999-11-25', 'Kuningan', NULL, '45516'),
(24, 'User ', 300, 'IMG-20210718-WA0023.jpg', 'user@gmail.com', '60bddb16409a2baf76936619afecf778dabe68de', 2, '087111222333', 'Kuningan', '1996-07-17', 'Jl raya Siliwangi, Blok A 5 ', NULL, '45554');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users_voucher`
--

CREATE TABLE `tb_users_voucher` (
  `users_voucher_id` int(11) NOT NULL,
  `voucher_kode` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `redeem_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_users_voucher`
--

INSERT INTO `tb_users_voucher` (`users_voucher_id`, `voucher_kode`, `users_id`, `redeem_date`) VALUES
(3, 'NTP8APR8PBV7D6M', 22, '2021-07-23 18:22:13'),
(4, 'YBN4RCZKS61X60E', 22, '2021-07-23 18:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `voucher_id` int(11) NOT NULL,
  `voucher_nama` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `voucher_kode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `voucher_nominal` bigint(20) NOT NULL DEFAULT 0,
  `voucher_harga` bigint(20) NOT NULL DEFAULT 0,
  `voucher_expired` datetime NOT NULL,
  `date_entry` datetime NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_voucher`
--

INSERT INTO `tb_voucher` (`voucher_id`, `voucher_nama`, `voucher_kode`, `voucher_nominal`, `voucher_harga`, `voucher_expired`, `date_entry`, `users_id`) VALUES
(4, 'Voucher 25.000', 'YBN4RCZKS61X60E', 25000, 30000, '2021-07-31 00:00:00', '2021-07-21 23:28:09', 1),
(5, 'Voucher 50.000', 'NTP8APR8PBV7D6M', 50000, 60000, '2021-07-24 00:00:00', '2021-07-22 00:04:57', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_city`
--
ALTER TABLE `tb_city`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CityID` (`CityID`),
  ADD KEY `ProvinceID` (`ProvinceID`);

--
-- Indexes for table `tb_include`
--
ALTER TABLE `tb_include`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD UNIQUE KEY `invoices_id` (`invoices_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `voucher_kode` (`voucher_kode`);

--
-- Indexes for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  ADD PRIMARY KEY (`orders_detail_id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_province`
--
ALTER TABLE `tb_province`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ProvinceID` (`ProvinceID`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tb_users_voucher`
--
ALTER TABLE `tb_users_voucher`
  ADD PRIMARY KEY (`users_voucher_id`),
  ADD KEY `voucher_kode` (`voucher_kode`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`voucher_id`),
  ADD UNIQUE KEY `voucher_kode` (`voucher_kode`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_city`
--
ALTER TABLE `tb_city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `tb_include`
--
ALTER TABLE `tb_include`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_province`
--
ALTER TABLE `tb_province`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_users_voucher`
--
ALTER TABLE `tb_users_voucher`
  MODIFY `users_voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_city`
--
ALTER TABLE `tb_city`
  ADD CONSTRAINT `tb_city_ibfk_1` FOREIGN KEY (`ProvinceID`) REFERENCES `tb_province` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_orders_ibfk_2` FOREIGN KEY (`voucher_kode`) REFERENCES `tb_voucher` (`voucher_kode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  ADD CONSTRAINT `tb_orders_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `tb_orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_orders_detail_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`produk_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `tb_city` (`CityID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_users_voucher`
--
ALTER TABLE `tb_users_voucher`
  ADD CONSTRAINT `tb_users_voucher_ibfk_1` FOREIGN KEY (`voucher_kode`) REFERENCES `tb_voucher` (`voucher_kode`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_users_voucher_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD CONSTRAINT `tb_voucher_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tb_users` (`users_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
