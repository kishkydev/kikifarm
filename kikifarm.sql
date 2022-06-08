-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 06:50 PM
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
-- Database: `kikifarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$xnO5/KVEdS4lwxt69WRBOeSsuCAM0ujyGacolptG4xV9YHQpUJWGe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `basket_code` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `done` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `basket_code`, `added_by`, `product_id`, `done`) VALUES
(35, 'fac4080681', 34, 23, 'no'),
(36, 'fac7191473', 34, 24, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(5, '', '', '', '', ''),
(6, '', '', '', '', ''),
(7, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `following` varchar(255) NOT NULL,
  `following_id` int(11) NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `being_followed` varchar(255) NOT NULL,
  `being_followed_id` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `product_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `following`, `following_id`, `status`, `being_followed`, `being_followed_id`, `time`, `product_id`) VALUES
(44, 'facebook', 34, 'unread', 'fatherhero', 33, 1653064518, '22,23,25'),
(45, 'facebook', 34, 'unread', 'outtabox', 35, 1653064530, '24');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pix` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `pix`) VALUES
(2, 17, 'uploads/thumbs/Rechargeable-Bluetooth-Public-Address-System---15-Inches--7902316.jpg'),
(3, 17, 'uploads/thumbs/photo-1588872657578-7efd1f1555ed.jpg'),
(4, 17, 'uploads/thumbs/nFPRJmwcs43DHUgb4UKJW7QUONef4SQFF1UCiy3H.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `lg`
--

CREATE TABLE `lg` (
  `lg_id` int(11) NOT NULL,
  `lg_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lg`
--

INSERT INTO `lg` (`lg_id`, `lg_name`) VALUES
(1, 'Abeokuta North'),
(2, 'Abeokuta South'),
(3, 'Ado-Odo/Ota'),
(4, 'Ewekoro'),
(5, 'Ifo'),
(6, 'Ijebu East'),
(7, 'Ijebu North'),
(8, 'Ijebu North East'),
(9, 'Ijebu Ode'),
(10, 'Ikenne'),
(11, 'Imeko-Afon'),
(12, 'Ipokia'),
(13, 'Obafemi-Owode'),
(14, 'Odeda'),
(15, 'Odogbolu'),
(16, 'Ogun Waterside'),
(17, 'Remo North'),
(18, 'Shagamu'),
(19, 'Yewa North'),
(20, 'Yewa South');

-- --------------------------------------------------------

--
-- Table structure for table `local_governments`
--

CREATE TABLE `local_governments` (
  `lg_id` int(11) NOT NULL,
  `state_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='Local governments in Nigeria.';

--
-- Dumping data for table `local_governments`
--

INSERT INTO `local_governments` (`lg_id`, `state_id`, `name`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala Ngwa North'),
(7, 1, 'Isiala Ngwa South'),
(8, 1, 'Isuikwuato'),
(9, 1, 'Obi Ngwa'),
(10, 1, 'Ohafia'),
(11, 1, 'Osisioma'),
(12, 1, 'Ugwunagbo'),
(13, 1, 'Ukwa East'),
(14, 1, 'Ukwa West'),
(15, 1, 'Umuahia North'),
(16, 1, 'Umuahia South'),
(17, 1, 'Umu Nneochi'),
(18, 2, 'Demsa'),
(19, 2, 'Fufure'),
(20, 2, 'Ganye'),
(21, 2, 'Gayuk'),
(22, 2, 'Gombi'),
(23, 2, 'Grie'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Larmurde'),
(27, 2, 'Madagali'),
(28, 2, 'Maiha'),
(29, 2, 'Mayo Belwa'),
(30, 2, 'Michika'),
(31, 2, 'Mubi North'),
(32, 2, 'Mubi South'),
(33, 2, 'Numan'),
(34, 2, 'Shelleng'),
(35, 2, 'Song'),
(36, 2, 'Toungo'),
(37, 2, 'Yola North'),
(38, 2, 'Yola South'),
(39, 3, 'Abak'),
(40, 3, 'Eastern Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Esit Eket'),
(43, 3, 'Essien Udim'),
(44, 3, 'Etim Ekpo'),
(45, 3, 'Etinan'),
(46, 3, 'Ibeno'),
(47, 3, 'Ibesikpo Asutan'),
(48, 3, 'Ibiono-Ibom'),
(49, 3, 'Ika'),
(50, 3, 'Ikono'),
(51, 3, 'Ikot Abasi'),
(52, 3, 'Ikot Ekpene'),
(53, 3, 'Ini'),
(54, 3, 'Itu'),
(55, 3, 'Mbo'),
(56, 3, 'Mkpat-Enin'),
(57, 3, 'Nsit-Atai'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oruk Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanafun'),
(67, 3, 'Uruan'),
(68, 3, 'Urue-Offong/Oruko'),
(69, 3, 'Uyo'),
(70, 4, 'Aguata'),
(71, 4, 'Anambra East'),
(72, 4, 'Anambra West'),
(73, 4, 'Anaocha'),
(74, 4, 'Awka North'),
(75, 4, 'Awka South'),
(76, 4, 'Ayamelum'),
(77, 4, 'Dunukofia'),
(78, 4, 'Ekwusigo'),
(79, 4, 'Idemili North'),
(80, 4, 'Idemili South'),
(81, 4, 'Ihiala'),
(82, 4, 'Njikoka'),
(83, 4, 'Nnewi North'),
(84, 4, 'Nnewi South'),
(85, 4, 'Ogbaru'),
(86, 4, 'Onitsha North'),
(87, 4, 'Onitsha South'),
(88, 4, 'Orumba North'),
(89, 4, 'Orumba South'),
(90, 4, 'Oyi'),
(91, 5, 'Alkaleri'),
(92, 5, 'Bauchi'),
(93, 5, 'Bogoro'),
(94, 5, 'Damban'),
(95, 5, 'Darazo'),
(96, 5, 'Dass'),
(97, 5, 'Gamawa'),
(98, 5, 'Ganjuwa'),
(99, 5, 'Giade'),
(100, 5, 'Itas/Gadau'),
(101, 5, 'Jama\'are'),
(102, 5, 'Katagum'),
(103, 5, 'Kirfi'),
(104, 5, 'Misau'),
(105, 5, 'Ningi'),
(106, 5, 'Shira'),
(107, 5, 'Tafawa Balewa'),
(108, 5, 'Toro'),
(109, 5, 'Warji'),
(110, 5, 'Zaki'),
(111, 6, 'Brass'),
(112, 6, 'Ekeremor'),
(113, 6, 'Kolokuma/Opokuma'),
(114, 6, 'Nembe'),
(115, 6, 'Ogbia'),
(116, 6, 'Sagbama'),
(117, 6, 'Southern Ijaw'),
(118, 6, 'Yenagoa'),
(119, 7, 'Agatu'),
(120, 7, 'Apa'),
(121, 7, 'Ado'),
(122, 7, 'Buruku'),
(123, 7, 'Gboko'),
(124, 7, 'Guma'),
(125, 7, 'Gwer East'),
(126, 7, 'Gwer West'),
(127, 7, 'Katsina-Ala'),
(128, 7, 'Konshisha'),
(129, 7, 'Kwande'),
(130, 7, 'Logo'),
(131, 7, 'Makurdi'),
(132, 7, 'Obi'),
(133, 7, 'Ogbadibo'),
(134, 7, 'Ohimini'),
(135, 7, 'Oju'),
(136, 7, 'Okpokwu'),
(137, 7, 'Oturkpo'),
(138, 7, 'Tarka'),
(139, 7, 'Ukum'),
(140, 7, 'Ushongo'),
(141, 7, 'Vandeikya'),
(142, 8, 'Abadam'),
(143, 8, 'Askira/Uba'),
(144, 8, 'Bama'),
(145, 8, 'Bayo'),
(146, 8, 'Biu'),
(147, 8, 'Chibok'),
(148, 8, 'Damboa'),
(149, 8, 'Dikwa'),
(150, 8, 'Gubio'),
(151, 8, 'Guzamala'),
(152, 8, 'Gwoza'),
(153, 8, 'Hawul'),
(154, 8, 'Jere'),
(155, 8, 'Kaga'),
(156, 8, 'Kala/Balge'),
(157, 8, 'Konduga'),
(158, 8, 'Kukawa'),
(159, 8, 'Kwaya Kusar'),
(160, 8, 'Mafa'),
(161, 8, 'Magumeri'),
(162, 8, 'Maiduguri'),
(163, 8, 'Marte'),
(164, 8, 'Mobbar'),
(165, 8, 'Monguno'),
(166, 8, 'Ngala'),
(167, 8, 'Nganzai'),
(168, 8, 'Shani'),
(169, 9, 'Abi'),
(170, 9, 'Akamkpa'),
(171, 9, 'Akpabuyo'),
(172, 9, 'Bakassi'),
(173, 9, 'Bekwarra'),
(174, 9, 'Biase'),
(175, 9, 'Boki'),
(176, 9, 'Calabar Municipal'),
(177, 9, 'Calabar South'),
(178, 9, 'Etung'),
(179, 9, 'Ikom'),
(180, 9, 'Obanliku'),
(181, 9, 'Obubra'),
(182, 9, 'Obudu'),
(183, 9, 'Odukpani'),
(184, 9, 'Ogoja'),
(185, 9, 'Yakuur'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele, Delta'),
(204, 10, 'Udu'),
(205, 10, 'Ughelli North'),
(206, 10, 'Ughelli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri North'),
(210, 10, 'Warri South'),
(211, 10, 'Warri South West'),
(212, 11, 'Abakaliki'),
(213, 11, 'Afikpo North'),
(214, 11, 'Afikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'Ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaozara'),
(223, 11, 'Ohaukwu'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko-Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North-East'),
(229, 12, 'Esan South-East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako Central'),
(232, 12, 'Etsako East'),
(233, 12, 'Etsako West'),
(234, 12, 'Igueben'),
(235, 12, 'Ikpoba Okha'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Oredo'),
(238, 12, 'Ovia North-East'),
(239, 12, 'Ovia South-West'),
(240, 12, 'Owan East'),
(241, 12, 'Owan West'),
(242, 12, 'Uhunmwonde'),
(243, 13, 'Ado Ekiti'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti East'),
(246, 13, 'Ekiti South-West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Gbonyin'),
(250, 13, 'Ido Osi'),
(251, 13, 'Ijero'),
(252, 13, 'Ikere'),
(253, 13, 'Ikole'),
(254, 13, 'Ilejemeje'),
(255, 13, 'Irepodun/Ifelodun'),
(256, 13, 'Ise/Orun'),
(257, 13, 'Moba'),
(258, 13, 'Oye'),
(259, 14, 'Aninri'),
(260, 14, 'Awgu'),
(261, 14, 'Enugu East'),
(262, 14, 'Enugu North'),
(263, 14, 'Enugu South'),
(264, 14, 'Ezeagu'),
(265, 14, 'Igbo Etiti'),
(266, 14, 'Igbo Eze North'),
(267, 14, 'Igbo Eze South'),
(268, 14, 'Isi Uzo'),
(269, 14, 'Nkanu East'),
(270, 14, 'Nkanu West'),
(271, 14, 'Nsukka'),
(272, 14, 'Oji River'),
(273, 14, 'Udenu'),
(274, 14, 'Udi'),
(275, 14, 'Uzo Uwani'),
(276, 15, 'Abaji'),
(277, 15, 'Bwari'),
(278, 15, 'Gwagwalada'),
(279, 15, 'Kuje'),
(280, 15, 'Kwali'),
(281, 15, 'Municipal Area Council'),
(282, 16, 'Akko'),
(283, 16, 'Balanga'),
(284, 16, 'Billiri'),
(285, 16, 'Dukku'),
(286, 16, 'Funakaye'),
(287, 16, 'Gombe'),
(288, 16, 'Kaltungo'),
(289, 16, 'Kwami'),
(290, 16, 'Nafada'),
(291, 16, 'Shongom'),
(292, 16, 'Yamaltu/Deba'),
(293, 17, 'Aboh Mbaise'),
(294, 17, 'Ahiazu Mbaise'),
(295, 17, 'Ehime Mbano'),
(296, 17, 'Ezinihitte'),
(297, 17, 'Ideato North'),
(298, 17, 'Ideato South'),
(299, 17, 'Ihitte/Uboma'),
(300, 17, 'Ikeduru'),
(301, 17, 'Isiala Mbano'),
(302, 17, 'Isu'),
(303, 17, 'Mbaitoli'),
(304, 17, 'Ngor Okpala'),
(305, 17, 'Njaba'),
(306, 17, 'Nkwerre'),
(307, 17, 'Nwangele'),
(308, 17, 'Obowo'),
(309, 17, 'Oguta'),
(310, 17, 'Ohaji/Egbema'),
(311, 17, 'Okigwe'),
(312, 17, 'Orlu'),
(313, 17, 'Orsu'),
(314, 17, 'Oru East'),
(315, 17, 'Oru West'),
(316, 17, 'Owerri Municipal'),
(317, 17, 'Owerri North'),
(318, 17, 'Owerri West'),
(319, 17, 'Unuimo'),
(320, 18, 'Auyo'),
(321, 18, 'Babura'),
(322, 18, 'Biriniwa'),
(323, 18, 'Birnin Kudu'),
(324, 18, 'Buji'),
(325, 18, 'Dutse'),
(326, 18, 'Gagarawa'),
(327, 18, 'Garki'),
(328, 18, 'Gumel'),
(329, 18, 'Guri'),
(330, 18, 'Gwaram'),
(331, 18, 'Gwiwa'),
(332, 18, 'Hadejia'),
(333, 18, 'Jahun'),
(334, 18, 'Kafin Hausa'),
(335, 18, 'Kazaure'),
(336, 18, 'Kiri Kasama'),
(337, 18, 'Kiyawa'),
(338, 18, 'Kaugama'),
(339, 18, 'Maigatari'),
(340, 18, 'Malam Madori'),
(341, 18, 'Miga'),
(342, 18, 'Ringim'),
(343, 18, 'Roni'),
(344, 18, 'Sule Tankarkar'),
(345, 18, 'Taura'),
(346, 18, 'Yankwashi'),
(347, 19, 'Birnin Gwari'),
(348, 19, 'Chikun'),
(349, 19, 'Giwa'),
(350, 19, 'Igabi'),
(351, 19, 'Ikara'),
(352, 19, 'Jaba'),
(353, 19, 'Jema\'a'),
(354, 19, 'Kachia'),
(355, 19, 'Kaduna North'),
(356, 19, 'Kaduna South'),
(357, 19, 'Kagarko'),
(358, 19, 'Kajuru'),
(359, 19, 'Kaura'),
(360, 19, 'Kauru'),
(361, 19, 'Kubau'),
(362, 19, 'Kudan'),
(363, 19, 'Lere'),
(364, 19, 'Makarfi'),
(365, 19, 'Sabon Gari'),
(366, 19, 'Sanga'),
(367, 19, 'Soba'),
(368, 19, 'Zangon Kataf'),
(369, 19, 'Zaria'),
(370, 20, 'Ajingi'),
(371, 20, 'Albasu'),
(372, 20, 'Bagwai'),
(373, 20, 'Bebeji'),
(374, 20, 'Bichi'),
(375, 20, 'Bunkure'),
(376, 20, 'Dala'),
(377, 20, 'Dambatta'),
(378, 20, 'Dawakin Kudu'),
(379, 20, 'Dawakin Tofa'),
(380, 20, 'Doguwa'),
(381, 20, 'Fagge'),
(382, 20, 'Gabasawa'),
(383, 20, 'Garko'),
(384, 20, 'Garun Mallam'),
(385, 20, 'Gaya'),
(386, 20, 'Gezawa'),
(387, 20, 'Gwale'),
(388, 20, 'Gwarzo'),
(389, 20, 'Kabo'),
(390, 20, 'Kano Municipal'),
(391, 20, 'Karaye'),
(392, 20, 'Kibiya'),
(393, 20, 'Kiru'),
(394, 20, 'Kumbotso'),
(395, 20, 'Kunchi'),
(396, 20, 'Kura'),
(397, 20, 'Madobi'),
(398, 20, 'Makoda'),
(399, 20, 'Minjibir'),
(400, 20, 'Nasarawa'),
(401, 20, 'Rano'),
(402, 20, 'Rimin Gado'),
(403, 20, 'Rogo'),
(404, 20, 'Shanono'),
(405, 20, 'Sumaila'),
(406, 20, 'Takai'),
(407, 20, 'Tarauni'),
(408, 20, 'Tofa'),
(409, 20, 'Tsanyawa'),
(410, 20, 'Tudun Wada'),
(411, 20, 'Ungogo'),
(412, 20, 'Warawa'),
(413, 20, 'Wudil'),
(414, 21, 'Bakori'),
(415, 21, 'Batagarawa'),
(416, 21, 'Batsari'),
(417, 21, 'Baure'),
(418, 21, 'Bindawa'),
(419, 21, 'Charanchi'),
(420, 21, 'Dandume'),
(421, 21, 'Danja'),
(422, 21, 'Dan Musa'),
(423, 21, 'Daura'),
(424, 21, 'Dutsi'),
(425, 21, 'Dutsin Ma'),
(426, 21, 'Faskari'),
(427, 21, 'Funtua'),
(428, 21, 'Ingawa'),
(429, 21, 'Jibia'),
(430, 21, 'Kafur'),
(431, 21, 'Kaita'),
(432, 21, 'Kankara'),
(433, 21, 'Kankia'),
(434, 21, 'Katsina'),
(435, 21, 'Kurfi'),
(436, 21, 'Kusada'),
(437, 21, 'Mai\'Adua'),
(438, 21, 'Malumfashi'),
(439, 21, 'Mani'),
(440, 21, 'Mashi'),
(441, 21, 'Matazu'),
(442, 21, 'Musawa'),
(443, 21, 'Rimi'),
(444, 21, 'Sabuwa'),
(445, 21, 'Safana'),
(446, 21, 'Sandamu'),
(447, 21, 'Zango'),
(448, 22, 'Aleiro'),
(449, 22, 'Arewa Dandi'),
(450, 22, 'Argungu'),
(451, 22, 'Augie'),
(452, 22, 'Bagudo'),
(453, 22, 'Birnin Kebbi'),
(454, 22, 'Bunza'),
(455, 22, 'Dandi'),
(456, 22, 'Fakai'),
(457, 22, 'Gwandu'),
(458, 22, 'Jega'),
(459, 22, 'Kalgo'),
(460, 22, 'Koko/Besse'),
(461, 22, 'Maiyama'),
(462, 22, 'Ngaski'),
(463, 22, 'Sakaba'),
(464, 22, 'Shanga'),
(465, 22, 'Suru'),
(466, 22, 'Wasagu/Danko'),
(467, 22, 'Yauri'),
(468, 22, 'Zuru'),
(469, 23, 'Adavi'),
(470, 23, 'Ajaokuta'),
(471, 23, 'Ankpa'),
(472, 23, 'Bassa'),
(473, 23, 'Dekina'),
(474, 23, 'Ibaji'),
(475, 23, 'Idah'),
(476, 23, 'Igalamela Odolu'),
(477, 23, 'Ijumu'),
(478, 23, 'Kabba/Bunu'),
(479, 23, 'Kogi'),
(480, 23, 'Lokoja'),
(481, 23, 'Mopa Muro'),
(482, 23, 'Ofu'),
(483, 23, 'Ogori/Magongo'),
(484, 23, 'Okehi'),
(485, 23, 'Okene'),
(486, 23, 'Olamaboro'),
(487, 23, 'Omala'),
(488, 23, 'Yagba East'),
(489, 23, 'Yagba West'),
(490, 24, 'Asa'),
(491, 24, 'Baruten'),
(492, 24, 'Edu'),
(493, 24, 'Ekiti, Kwara State'),
(494, 24, 'Ifelodun'),
(495, 24, 'Ilorin East'),
(496, 24, 'Ilorin South'),
(497, 24, 'Ilorin West'),
(498, 24, 'Irepodun'),
(499, 24, 'Isin'),
(500, 24, 'Kaiama'),
(501, 24, 'Moro'),
(502, 24, 'Offa'),
(503, 24, 'Oke Ero'),
(504, 24, 'Oyun'),
(505, 24, 'Pategi'),
(506, 25, 'Agege'),
(507, 25, 'Ajeromi-Ifelodun'),
(508, 25, 'Alimosho'),
(509, 25, 'Amuwo-Odofin'),
(510, 25, 'Apapa'),
(511, 25, 'Badagry'),
(512, 25, 'Epe'),
(513, 25, 'Eti Osa'),
(514, 25, 'Ibeju-Lekki'),
(515, 25, 'Ifako-Ijaiye'),
(516, 25, 'Ikeja'),
(517, 25, 'Ikorodu'),
(518, 25, 'Kosofe'),
(519, 25, 'Lagos Island'),
(520, 25, 'Lagos Mainland'),
(521, 25, 'Mushin'),
(522, 25, 'Ojo'),
(523, 25, 'Oshodi-Isolo'),
(524, 25, 'Shomolu'),
(525, 25, 'Surulere, Lagos State'),
(526, 26, 'Akwanga'),
(527, 26, 'Awe'),
(528, 26, 'Doma'),
(529, 26, 'Karu'),
(530, 26, 'Keana'),
(531, 26, 'Keffi'),
(532, 26, 'Kokona'),
(533, 26, 'Lafia'),
(534, 26, 'Nasarawa'),
(535, 26, 'Nasarawa Egon'),
(536, 26, 'Obi'),
(537, 26, 'Toto'),
(538, 26, 'Wamba'),
(539, 27, 'Agaie'),
(540, 27, 'Agwara'),
(541, 27, 'Bida'),
(542, 27, 'Borgu'),
(543, 27, 'Bosso'),
(544, 27, 'Chanchaga'),
(545, 27, 'Edati'),
(546, 27, 'Gbako'),
(547, 27, 'Gurara'),
(548, 27, 'Katcha'),
(549, 27, 'Kontagora'),
(550, 27, 'Lapai'),
(551, 27, 'Lavun'),
(552, 27, 'Magama'),
(553, 27, 'Mariga'),
(554, 27, 'Mashegu'),
(555, 27, 'Mokwa'),
(556, 27, 'Moya'),
(557, 27, 'Paikoro'),
(558, 27, 'Rafi'),
(559, 27, 'Rijau'),
(560, 27, 'Shiroro'),
(561, 27, 'Suleja'),
(562, 27, 'Tafa'),
(563, 27, 'Wushishi'),
(564, 28, 'Abeokuta North'),
(565, 28, 'Abeokuta South'),
(566, 28, 'Ado-Odo/Ota'),
(567, 28, 'Egbado North'),
(568, 28, 'Egbado South'),
(569, 28, 'Ewekoro'),
(570, 28, 'Ifo'),
(571, 28, 'Ijebu East'),
(572, 28, 'Ijebu North'),
(573, 28, 'Ijebu North East'),
(574, 28, 'Ijebu Ode'),
(575, 28, 'Ikenne'),
(576, 28, 'Imeko Afon'),
(577, 28, 'Ipokia'),
(578, 28, 'Obafemi Owode'),
(579, 28, 'Odeda'),
(580, 28, 'Odogbolu'),
(581, 28, 'Ogun Waterside'),
(582, 28, 'Remo North'),
(583, 28, 'Shagamu'),
(584, 29, 'Akoko North-East'),
(585, 29, 'Akoko North-West'),
(586, 29, 'Akoko South-West'),
(587, 29, 'Akoko South-East'),
(588, 29, 'Akure North'),
(589, 29, 'Akure South'),
(590, 29, 'Ese Odo'),
(591, 29, 'Idanre'),
(592, 29, 'Ifedore'),
(593, 29, 'Ilaje'),
(594, 29, 'Ile Oluji/Okeigbo'),
(595, 29, 'Irele'),
(596, 29, 'Odigbo'),
(597, 29, 'Okitipupa'),
(598, 29, 'Ondo East'),
(599, 29, 'Ondo West'),
(600, 29, 'Ose'),
(601, 29, 'Owo'),
(602, 30, 'Atakunmosa East'),
(603, 30, 'Atakunmosa West'),
(604, 30, 'Aiyedaade'),
(605, 30, 'Aiyedire'),
(606, 30, 'Boluwaduro'),
(607, 30, 'Boripe'),
(608, 30, 'Ede North'),
(609, 30, 'Ede South'),
(610, 30, 'Ife Central'),
(611, 30, 'Ife East'),
(612, 30, 'Ife North'),
(613, 30, 'Ife South'),
(614, 30, 'Egbedore'),
(615, 30, 'Ejigbo'),
(616, 30, 'Ifedayo'),
(617, 30, 'Ifelodun'),
(618, 30, 'Ila'),
(619, 30, 'Ilesa East'),
(620, 30, 'Ilesa West'),
(621, 30, 'Irepodun'),
(622, 30, 'Irewole'),
(623, 30, 'Isokan'),
(624, 30, 'Iwo'),
(625, 30, 'Obokun'),
(626, 30, 'Odo Otin'),
(627, 30, 'Ola Oluwa'),
(628, 30, 'Olorunda'),
(629, 30, 'Oriade'),
(630, 30, 'Orolu'),
(631, 30, 'Osogbo'),
(632, 31, 'Afijio'),
(633, 31, 'Akinyele'),
(634, 31, 'Atiba'),
(635, 31, 'Atisbo'),
(636, 31, 'Egbeda'),
(637, 31, 'Ibadan North'),
(638, 31, 'Ibadan North-East'),
(639, 31, 'Ibadan North-West'),
(640, 31, 'Ibadan South-East'),
(641, 31, 'Ibadan South-West'),
(642, 31, 'Ibarapa Central'),
(643, 31, 'Ibarapa East'),
(644, 31, 'Ibarapa North'),
(645, 31, 'Ido'),
(646, 31, 'Irepo'),
(647, 31, 'Iseyin'),
(648, 31, 'Itesiwaju'),
(649, 31, 'Iwajowa'),
(650, 31, 'Kajola'),
(651, 31, 'Lagelu'),
(652, 31, 'Ogbomosho North'),
(653, 31, 'Ogbomosho South'),
(654, 31, 'Ogo Oluwa'),
(655, 31, 'Olorunsogo'),
(656, 31, 'Oluyole'),
(657, 31, 'Ona Ara'),
(658, 31, 'Orelope'),
(659, 31, 'Ori Ire'),
(660, 31, 'Oyo'),
(661, 31, 'Oyo East'),
(662, 31, 'Saki East'),
(663, 31, 'Saki West'),
(664, 31, 'Surulere, Oyo State'),
(665, 32, 'Bokkos'),
(666, 32, 'Barkin Ladi'),
(667, 32, 'Bassa'),
(668, 32, 'Jos East'),
(669, 32, 'Jos North'),
(670, 32, 'Jos South'),
(671, 32, 'Kanam'),
(672, 32, 'Kanke'),
(673, 32, 'Langtang South'),
(674, 32, 'Langtang North'),
(675, 32, 'Mangu'),
(676, 32, 'Mikang'),
(677, 32, 'Pankshin'),
(678, 32, 'Qua\'an Pan'),
(679, 32, 'Riyom'),
(680, 32, 'Shendam'),
(681, 32, 'Wase'),
(682, 33, 'Abua/Odual'),
(683, 33, 'Ahoada East'),
(684, 33, 'Ahoada West'),
(685, 33, 'Akuku-Toru'),
(686, 33, 'Andoni'),
(687, 33, 'Asari-Toru'),
(688, 33, 'Bonny'),
(689, 33, 'Degema'),
(690, 33, 'Eleme'),
(691, 33, 'Emuoha'),
(692, 33, 'Etche'),
(693, 33, 'Gokana'),
(694, 33, 'Ikwerre'),
(695, 33, 'Khana'),
(696, 33, 'Obio/Akpor'),
(697, 33, 'Ogba/Egbema/Ndoni'),
(698, 33, 'Ogu/Bolo'),
(699, 33, 'Okrika'),
(700, 33, 'Omuma'),
(701, 33, 'Opobo/Nkoro'),
(702, 33, 'Oyigbo'),
(703, 33, 'Port Harcourt'),
(704, 33, 'Tai'),
(705, 34, 'Binji'),
(706, 34, 'Bodinga'),
(707, 34, 'Dange Shuni'),
(708, 34, 'Gada'),
(709, 34, 'Goronyo'),
(710, 34, 'Gudu'),
(711, 34, 'Gwadabawa'),
(712, 34, 'Illela'),
(713, 34, 'Isa'),
(714, 34, 'Kebbe'),
(715, 34, 'Kware'),
(716, 34, 'Rabah'),
(717, 34, 'Sabon Birni'),
(718, 34, 'Shagari'),
(719, 34, 'Silame'),
(720, 34, 'Sokoto North'),
(721, 34, 'Sokoto South'),
(722, 34, 'Tambuwal'),
(723, 34, 'Tangaza'),
(724, 34, 'Tureta'),
(725, 34, 'Wamako'),
(726, 34, 'Wurno'),
(727, 34, 'Yabo'),
(728, 35, 'Ardo Kola'),
(729, 35, 'Bali'),
(730, 35, 'Donga'),
(731, 35, 'Gashaka'),
(732, 35, 'Gassol'),
(733, 35, 'Ibi'),
(734, 35, 'Jalingo'),
(735, 35, 'Karim Lamido'),
(736, 35, 'Kumi'),
(737, 35, 'Lau'),
(738, 35, 'Sardauna'),
(739, 35, 'Takum'),
(740, 35, 'Ussa'),
(741, 35, 'Wukari'),
(742, 35, 'Yorro'),
(743, 35, 'Zing'),
(744, 36, 'Bade'),
(745, 36, 'Bursari'),
(746, 36, 'Damaturu'),
(747, 36, 'Fika'),
(748, 36, 'Fune'),
(749, 36, 'Geidam'),
(750, 36, 'Gujba'),
(751, 36, 'Gulani'),
(752, 36, 'Jakusko'),
(753, 36, 'Karasuwa'),
(754, 36, 'Machina'),
(755, 36, 'Nangere'),
(756, 36, 'Nguru'),
(757, 36, 'Potiskum'),
(758, 36, 'Tarmuwa'),
(759, 36, 'Yunusari'),
(760, 36, 'Yusufari'),
(761, 37, 'Anka'),
(762, 37, 'Bakura'),
(763, 37, 'Birnin Magaji/Kiyaw'),
(764, 37, 'Bukkuyum'),
(765, 37, 'Bungudu'),
(766, 37, 'Gummi'),
(767, 37, 'Gusau'),
(768, 37, 'Kaura Namoda'),
(769, 37, 'Maradun'),
(770, 37, 'Maru'),
(771, 37, 'Shinkafi'),
(772, 37, 'Talata Mafara'),
(773, 37, 'Chafe'),
(774, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `measures`
--

CREATE TABLE `measures` (
  `id` int(11) NOT NULL,
  `measure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `measures`
--

INSERT INTO `measures` (`id`, `measure`) VALUES
(1, 'Sac'),
(2, 'Kilo'),
(3, 'Kongo'),
(4, 'Paint'),
(5, 'Garawa'),
(6, 'Half Sac'),
(7, 'Bag'),
(8, 'Half Bag'),
(9, 'Crate'),
(10, 'Basket'),
(11, 'Rubber'),
(12, 'Gram'),
(13, 'Derica');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `material` text NOT NULL,
  `material_ext` varchar(10) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `date_time` int(50) NOT NULL,
  `status` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `subject`, `message`, `material`, `material_ext`, `from_id`, `to_id`, `date_time`, `status`) VALUES
(1, 'This is just a test', 'hope this message meets you well', '', '', 34, 36, 1654072169, 'yes'),
(2, 'layo dey trend', 'We are building something beautiful', '', '', 34, 36, 1654073269, 'yes'),
(5, 'Re: This is just a test', 'Yes I will come and pick it later. You can call my number', '', '', 36, 34, 1654090037, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `notify_logistic`
--

CREATE TABLE `notify_logistic` (
  `id` int(11) NOT NULL,
  `notify_code` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `logistic_owner_id` int(11) NOT NULL,
  `done` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notify_logistic`
--

INSERT INTO `notify_logistic` (`id`, `notify_code`, `added_by`, `product_id`, `logistic_owner_id`, `done`) VALUES
(52, 'fac9355532', 34, 24, 36, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `paid` enum('yes','no') NOT NULL DEFAULT 'no',
  `reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `code` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `measure` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date_available` varchar(100) NOT NULL,
  `pix1` text NOT NULL,
  `pix2` longtext NOT NULL,
  `pix3` longtext NOT NULL,
  `pix4` longtext NOT NULL,
  `time_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `general` text NOT NULL,
  `view` int(11) NOT NULL,
  `bought` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `type`, `code`, `name`, `description`, `measure`, `price`, `date_available`, `pix1`, `pix2`, `pix3`, `pix4`, `time_upload`, `general`, `view`, `bought`) VALUES
(22, 33, 1, 4679117, 'Maize', 'Sweet maize with honey', 'Sac', 3000, '2022-06-11', '62850dd706565-1652886999.jpg', '62850dd706572-1652886999.jpg', '62850dd706578-1652886999.jpg', '62850dd70657d-1652886999.jpg', '2022-05-28 16:47:42', 'Maize Sweet maize with honey', 5, 0),
(23, 33, 2, 2573668, 'Carrot', 'Sweet carrot nad beautiful', 'Half Bag', 4000, '', '62850e2c28da3-1652887084.jpg', '62850e2c28db0-1652887084.jpg', '62850e2c28db6-1652887084.jpg', '62850e2c28dbb-1652887084.jpg', '2022-05-31 11:37:40', 'Carrot Sweet carrot nad beautiful', 96, 0),
(24, 35, 1, 4679117, 'Okkro', 'Sweet maize with honey', 'Derica', 3000, '2022-09-19', '62850dd706578-1652886999.jpg', '62850dd706565-1652886999.jpg', '62850dd706578-1652886999.jpg', '62850dd70657d-1652886999.jpg', '2022-06-01 13:24:40', 'Maize Sweet maize with honey', 9, 0),
(25, 33, 2, 2573668, 'Plantain', 'Sweet carrot nad beautiful', 'Kongo', 4000, '', '62850e2c28db6-1652887084.jpg', '62850e2c28db0-1652887084.jpg', '62850e2c28db6-1652887084.jpg', '62850e2c28dbb-1652887084.jpg', '2022-05-23 11:53:52', 'Carrot Sweet carrot nad beautiful', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `name`, `review`, `rating`, `date_time`) VALUES
(3, 17, 'Debola Korede', 'I like the club', 3, '0'),
(5, 28, 'Mukua Debby', 'This ius cool', 1, '0'),
(6, 28, 'James Bond', 'The beautiful thing that is yet to come', 2, '0'),
(7, 28, 'Harr Potter', 'Yes of course', 3, '1631227801'),
(8, 28, 'Olukayode Fadairo', 'This just work amazing', 4, '1631228009'),
(9, 28, 'James Bond', 'This is a test review', 4, '1631252285'),
(10, 17, 'Adedotun', 'This is a beautiful test', 3, '10th Sep, 2021  11:34 AM'),
(11, 17, 'fatherhero', 'This is another bea', 5, '10th Sep, 2021  05:37 PM'),
(12, 17, 'Can Der', 'yes ooo', 2, '10th Sep, 2021  05:38 AM'),
(13, 26, 'fatherhero', 'lIke his shop', 4, '27th Oct, 2021  03:35 AM');

-- --------------------------------------------------------

--
-- Table structure for table `search_items`
--

CREATE TABLE `search_items` (
  `id` int(11) NOT NULL,
  `items` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search_items`
--

INSERT INTO `search_items` (`id`, `items`) VALUES
(114, 'Durum wheat'),
(115, 'Rye '),
(116, 'Barley'),
(117, 'Oats'),
(118, 'Maize'),
(119, 'Rice'),
(120, 'Sorghum'),
(121, 'Triticale'),
(122, 'Cauliflowers:'),
(123, 'Brussels sprouts'),
(124, 'White cabbage'),
(125, ' Red cabbage'),
(126, ' Savoy cabbage'),
(127, ' Celeriac'),
(128, ' Lettuce in the open: '),
(129, ' Lettuce under glass'),
(130, 'Asparagus:'),
(131, ' Tomatoes in the open'),
(132, 'Tomatoes under glass'),
(133, ' Cucumbers '),
(134, ' Cucumbers '),
(135, 'Melons '),
(136, ' Water melons '),
(137, ' Carrots'),
(138, 'Onions'),
(139, ' Green peas'),
(140, ' French beans'),
(141, ' Cultivated mushrooms'),
(142, ' Chicory'),
(143, 'Leeks'),
(144, ' Capsicum '),
(145, ' Green beans '),
(146, 'Beetroot'),
(147, 'Garlic'),
(148, ' Kohlrabi '),
(149, ' Radish '),
(150, ' Spinach'),
(151, ' Carnations -'),
(152, ' Chrysanthemums -'),
(153, ' Gladioli -'),
(154, ' Tulips'),
(155, ' Roses '),
(156, 'apples'),
(157, ' Dessert pears'),
(158, ' Peaches'),
(159, ' Apricots'),
(160, ' Cherries'),
(161, ' Cherries'),
(162, ' Plums'),
(163, ' Walnuts '),
(164, 'Unshelled'),
(165, ' Hazelnuts '),
(166, 'Unshelled'),
(167, ' Almonds'),
(168, 'Unshelled'),
(169, ' Chestnuts '),
(170, ' Dried fruit '),
(171, ' Fresh figs '),
(172, ' Strawberries'),
(173, 'Strawberries'),
(174, 'Strawberries'),
(175, 'yam flour'),
(176, 'flour'),
(177, 'Raspberries '),
(178, ' Blackcurrants'),
(179, 'Dessert grapes'),
(180, ' Grapes for wine'),
(181, 'Oranges'),
(182, 'Mandarins'),
(183, 'Lemons'),
(184, ' citrus fruit'),
(185, ' Oranges'),
(186, 'oleic acid'),
(187, ' Virgin olive '),
(188, 'oleic acid'),
(189, ' Lampante'),
(190, ' Dried peas '),
(191, ' Chick peas'),
(192, ' Dried beans '),
(193, ' Broad beans (dry) '),
(194, ' Lentils '),
(195, ' Rape seeds '),
(196, ' Sunflowers'),
(197, ' Soya '),
(198, ' Cotton (including seed) '),
(199, ' Raw tobacco'),
(200, ' Hops'),
(201, 'custard'),
(202, 'surgar'),
(203, 'purk meat'),
(204, 'Cattle'),
(205, 'Cow'),
(206, 'Pigs'),
(207, 'Sheep'),
(208, 'Goats'),
(209, 'Poultry'),
(210, 'Chickens'),
(211, 'Boiling fowl'),
(212, 'Ducks'),
(213, 'Turkeys'),
(214, 'Geese'),
(215, 'Horses'),
(216, 'Rabbits'),
(217, 'Milk'),
(218, 'Eggs'),
(219, 'Honey'),
(220, 'Fertilisers'),
(221, 'Fertilizers'),
(222, 'Feedingstuffs'),
(223, 'white flour'),
(224, 'cow meat'),
(225, 'cocoyam'),
(226, 'yam ');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `town_id` int(11) NOT NULL,
  `lg_id` int(11) NOT NULL,
  `town_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`town_id`, `lg_id`, `town_name`) VALUES
(1, 1, 'Ikereku'),
(2, 1, 'Ikija'),
(3, 1, 'Ago Oko'),
(4, 1, 'Elega'),
(5, 1, 'Ilugun/iberekodo'),
(6, 1, 'Gbagura'),
(7, 1, 'Ika'),
(8, 1, 'Lafenwa'),
(9, 1, 'Sabo'),
(10, 1, 'Oke Ago Owu'),
(11, 1, 'Totoro/sokori'),
(12, 1, 'Ita Osin / Olomore'),
(13, 1, 'Olorunda/ijale'),
(14, 1, 'Imala/idiemi'),
(15, 1, 'Isaga/ilewo Orile '),
(16, 1, 'Ibara Orile/onisasa'),
(17, 2, 'Ake'),
(18, 2, 'Keesi/emere'),
(19, 2, 'Ijemo'),
(20, 2, 'Itoko'),
(21, 2, 'Ijaiye / Idiaba'),
(22, 2, 'Erunbe/oke- Ijeun'),
(23, 2, 'Ago-egun/ijesa'),
(24, 2, 'Sapon'),
(25, 2, 'Sodeke/isale Ijeun Ii'),
(26, 2, 'Imo/isabo'),
(27, 2, 'Igbore/ago-oba'),
(28, 2, 'Ibara '),
(29, 2, 'Oke Ilewo'),
(30, 3, 'Ota'),
(31, 3, 'Sango'),
(32, 3, 'Ijoko'),
(33, 3, 'Atan'),
(34, 3, 'Iju'),
(35, 3, 'Ilogbo'),
(36, 3, 'Ado-odo'),
(37, 3, 'Ere'),
(38, 3, 'Alapoti'),
(39, 3, 'Ketu Adie Owe'),
(40, 3, 'Igbesa'),
(41, 3, 'Agbara'),
(42, 4, 'Abalabi'),
(43, 4, 'Asa/yobo'),
(44, 4, 'Arigbajo'),
(45, 4, 'Itori'),
(46, 4, 'Elere Onigbedu'),
(47, 4, 'Papalanto'),
(48, 4, 'Wasimi'),
(49, 4, 'Mosan'),
(50, 4, 'Owowo'),
(51, 4, 'Obada ? Oko'),
(52, 5, 'Ifo'),
(53, 5, 'Agbado'),
(54, 5, 'Iseri/ojodu'),
(55, 5, 'Ajuwon/akute'),
(56, 5, 'Oke-aro/ibaragun'),
(57, 5, 'Robiyan'),
(58, 5, 'Ososun'),
(59, 5, 'Sunren'),
(60, 5, 'Coker'),
(61, 5, 'Ibogun'),
(62, 6, 'Ijebu Imushin'),
(63, 6, 'Ijebu - Ife'),
(64, 6, 'Owu'),
(65, 6, 'Ikija'),
(66, 6, 'Itele'),
(67, 6, 'Ogbere'),
(68, 6, 'Imobi'),
(69, 6, 'Ajebandele'),
(70, 7, 'Atikori'),
(71, 7, 'Ojowo/japapa'),
(72, 7, 'Omen'),
(73, 7, 'Osun'),
(74, 7, 'Okeagbo'),
(75, 7, 'Oke - Sopin'),
(76, 7, 'Oru/awa/ilaporu'),
(77, 7, 'Ago - Iwoye'),
(78, 7, 'Ako - Onigbagbo Gelete'),
(79, 7, 'Mamu/etiri'),
(80, 8, 'Atan/imuku'),
(81, 8, 'Odosimadegun/odosinb'),
(82, 8, 'O'),
(83, 8, 'Imewuro/odeyo/imomo'),
(84, 8, 'Odesenlu'),
(85, 8, 'Igede/itamarun'),
(86, 8, 'Oju Ona'),
(87, 8, 'Isoyin'),
(88, 8, 'Ilese'),
(89, 8, 'Oke-eri/ogbogbo'),
(90, 8, 'Erunwon'),
(91, 9, 'Isoku/ososa'),
(92, 9, 'Odo/esa'),
(93, 9, 'Itantebo/ita Ogbin'),
(94, 9, 'Ijada/imepe I'),
(95, 9, 'Ijada/imepe Ii'),
(96, 9, 'Porogun I'),
(97, 9, 'Ijasi/idepo'),
(98, 9, 'Odo-egbo/oliworo'),
(99, 9, 'Isiwo'),
(100, 9, 'Itamapo'),
(101, 9, 'Ijebu Ode Town'),
(102, 10, 'Ikenne'),
(103, 10, 'Iperu'),
(104, 10, 'Ogere'),
(105, 10, 'Irolu'),
(106, 11, 'Imeko '),
(107, 11, 'Oke-agbede / Moriwi'),
(108, 11, 'Matale'),
(109, 11, 'Idofa'),
(110, 11, 'Iwoye/jabata'),
(111, 11, 'Ilara/aagbe'),
(112, 11, 'Afon'),
(113, 11, 'Otapele'),
(114, 11, 'Kajola Agberiodo'),
(115, 11, 'Olorunda Agboro'),
(116, 11, 'Idi - Ayin'),
(117, 12, 'Ipokia'),
(118, 12, 'Ago Sasa'),
(119, 12, 'Ijifin/idosa'),
(120, 12, 'Tube'),
(121, 12, 'Agada'),
(122, 12, 'Maun '),
(123, 12, 'Ajegunle'),
(124, 12, 'Ifonyintedo'),
(125, 12, 'Idiroko'),
(126, 12, 'Ihunbo/ilase'),
(127, 13, 'Mokoloki'),
(128, 13, 'Ofada'),
(129, 13, 'Owode'),
(130, 13, 'Ajura'),
(131, 13, 'Mololo/asipa'),
(132, 13, 'Onidundu'),
(133, 13, 'Oba'),
(134, 13, 'Egbeda'),
(135, 13, 'Kajola'),
(136, 13, 'Obafemi'),
(137, 13, 'Ajebo'),
(138, 13, 'Alapako - Oni'),
(139, 14, 'Odeda'),
(140, 14, 'Balogun Itesi'),
(141, 14, 'Olodo'),
(142, 14, 'Alagbagba'),
(143, 14, 'Ilugun'),
(144, 14, 'Osile'),
(145, 14, 'Obantoko'),
(146, 14, 'Alabata'),
(147, 14, 'Obete'),
(148, 14, 'Opeji'),
(149, 15, 'Imosan'),
(150, 15, 'Imodi'),
(151, 15, 'Okun Owa'),
(152, 15, 'Odogbolu'),
(153, 15, 'Ayepe'),
(154, 15, 'Ososa'),
(155, 15, 'Idowa'),
(156, 15, 'Ibefun'),
(157, 15, 'Ilado'),
(158, 15, 'Ogbo/moraika/ita- Epo'),
(159, 15, 'Ala/igbile'),
(160, 15, 'Jobore/ibido/ikise'),
(161, 15, 'Omu'),
(162, 15, 'Ogbo'),
(163, 16, 'Iwopin'),
(164, 16, 'Oni'),
(165, 16, 'Ibi Ade'),
(166, 16, 'Lukogbe/ilusin'),
(167, 16, 'Abigi'),
(168, 16, 'Efire'),
(169, 16, 'Ayede/lomiro'),
(170, 16, 'Ayila/itebu'),
(171, 16, 'Makun/ibokun'),
(172, 16, 'Ode ? Omi'),
(173, 17, 'Ayegbami'),
(174, 17, 'Igan Ajinla'),
(175, 17, 'Moborode/oke Ola'),
(176, 17, 'Odofin/imagbon/peteku'),
(177, 17, 'Dawa'),
(178, 17, 'Ilara'),
(179, 17, 'Akaka'),
(180, 17, 'Ipara'),
(181, 17, 'Orile - Oko'),
(182, 17, 'Ode'),
(183, 18, 'Oko/epe/itunla'),
(184, 18, 'Ayegbami/ijokun'),
(185, 18, 'Sabo'),
(186, 18, 'Isokun/oyebajo'),
(187, 18, 'Ija - Agba'),
(188, 18, 'Latawa'),
(189, 18, 'Ode - Lemo'),
(190, 18, 'Ogijo/likosi'),
(191, 18, 'Surulere'),
(192, 18, 'Isote'),
(193, 18, 'Simawa/iwelepe'),
(194, 18, 'Agbowa'),
(195, 18, 'Ibido, Itunla/alara'),
(196, 19, 'Idofi'),
(197, 19, 'Ayetoro'),
(198, 19, 'Sunwa'),
(199, 19, 'Joga/iboro'),
(200, 19, 'Imasai'),
(201, 19, 'Ebute/igbooro'),
(202, 19, 'Ohunbe'),
(203, 19, 'Igua'),
(204, 19, 'Ijoun'),
(205, 19, 'Ibese'),
(206, 20, 'Ilaro'),
(207, 20, 'Iwoye'),
(208, 20, 'Idogo'),
(209, 20, 'Oke ? Odan'),
(210, 20, 'Owode'),
(211, 20, 'Ilobi/erinja'),
(212, 20, 'Ajilete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `lg_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `lg_name` varchar(255) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_lg` text NOT NULL,
  `join_state` longtext NOT NULL,
  `pix` text NOT NULL,
  `reg_id` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `tag_line` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `video_link` text NOT NULL,
  `input_tags` text NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `shop_name`, `username`, `sname`, `oname`, `address`, `city`, `phone`, `lg_id`, `state_id`, `lg_name`, `state_name`, `password`, `join_lg`, `join_state`, `pix`, `reg_id`, `description`, `active`, `tag_line`, `website`, `email`, `video_link`, `input_tags`, `token`) VALUES
(33, 'farmer', 'Fatherhero Farms', 'fatherhero', 'Fadairo', 'Olukayode', '', '', '07066352274', 565, 28, 'Abeokuta South', 'Ogun', '$2y$10$kdCcM78kfEHafATrJK5Si.5cEAgLfK20.pDiKIibz0H0vB0Wf3sPi', 'Abeokuta South, Abeokuta South, Ado-Odo/Ota, Ijebu North East, Odeda', '', '6284a8d1bc0b0-1652861137.jpg', '65SCjOdexHAPZ8U3MukNwv0rpi1QDbFchatJnIBY4zs79XfGV2EqTWylKomgLR511316', '', 'yes', '', 'www.kikifarm.com', 'olukayodefadairo@gmail.com', '', '', ''),
(34, 'consumer', 'Facebook Me', 'facebook', 'Fadairo', 'Shina', '', '', '08037192102', 565, 28, 'Abeokuta South', 'Ogun', '$2y$10$kdCcM78kfEHafATrJK5Si.5cEAgLfK20.pDiKIibz0H0vB0Wf3sPi', 'Abeokuta South Abeokuta South, Ado-Odo/Ota, Ijebu North East, Odeda', '', '6284a8d1bc0b0-1652861137.jpg', '65SCjOdexHAPZ8U3MukNwv0rpi1QDbFchatJnIBY4zs79XfGV2EqTWylKomgLR511316', '', 'yes', '', 'www.kikifarm.com', 'shinafadairo@gmail.com', '', '', ''),
(35, 'farmer', 'Outtabox-Tech Concepts Limited ', 'outtabox', 'Fadairo', 'Femi', '', '', '08035379806', 565, 2, 'Abeokuta South', 'Adamawa', '$2y$10$kdCcM78kfEHafATrJK5Si.5cEAgLfK20.pDiKIibz0H0vB0Wf3sPi', 'Abeokuta South Abeokuta South, Ado-Odo/Ota, Ijebu North East, Odeda', '', '6284a8d1bc0b0-1652861137.jpg', '65SCjOdexHAPZ8U3MukNwv0rpi1QDbFchatJnIBY4zs79XfGV2EqTWylKomgLR511316', '', 'yes', '', 'www.kikifarm.com', 'outtabox@gmail.com', '', '', ''),
(36, 'logistic', 'Kikifarm logistic', 'kikilogistic', 'Ajayi', 'Okiki', '46, Arokoje Street, Obantoko A', 'Abeokuta', '07066352274', 510, 25, 'Apapa', 'Lagos', '$2y$10$lLosUSgSQHRKNSfOzEJkHuIrwRd.XTIqFgj5g/Zbg20An8/TcLW2C', 'Apapa ', 'Abia, Adamawa, Delta, Kano, Kebbi, Oyo, Plateau, Ogun', '', 'npELCI7XrW9i3KAONDxRyYbd5zl2MZq4BJjVmhacoF8QTGseu61PkUgtv0SfHw832588', '', 'yes', 'get to go', 'facebook.com', 'olukayodefadairo@gmail.com', '', '', ''),
(37, 'logistic', 'Adedotun logistic', 'adedotunlogistic', 'Ahmed', 'Adedotun', '46, Arokoje Street, Obantoko A', 'Abeokuta', '07066352274', 510, 25, 'Apapa', 'Lagos', '$2y$10$lLosUSgSQHRKNSfOzEJkHuIrwRd.XTIqFgj5g/Zbg20An8/TcLW2C', 'Apapa ', 'Abia, Adamawa, Delta, Kano, Kebbi, Oyo, Plateau', '', 'npELCI7XrW9i3KAONDxRyYbd5zl2MZq4BJjVmhacoF8QTGseu61PkUgtv0SfHw832588', '', 'yes', 'get to go', 'facebook.com', 'olukayodefadairo@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `user_id`, `title`, `link`) VALUES
(19, 20, 'this is now youtube link', 'https://www.youtube.com/embed/v=f8-QI8_SJSE'),
(20, 20, 'this is now youtube link', 'https://www.youtube.com/embed/v=f8-QI8_SJSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lg`
--
ALTER TABLE `lg`
  ADD PRIMARY KEY (`lg_id`);

--
-- Indexes for table `local_governments`
--
ALTER TABLE `local_governments`
  ADD PRIMARY KEY (`lg_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notify_logistic`
--
ALTER TABLE `notify_logistic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_items`
--
ALTER TABLE `search_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`town_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lg`
--
ALTER TABLE `lg`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `local_governments`
--
ALTER TABLE `local_governments`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `measures`
--
ALTER TABLE `measures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notify_logistic`
--
ALTER TABLE `notify_logistic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `search_items`
--
ALTER TABLE `search_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
