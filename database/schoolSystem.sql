-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.epizy.com
-- Generation Time: May 10, 2024 at 03:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32107730_schoolSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `image`, `date_time`) VALUES
(1, 'aqibnoor@gmail.com', '$2y$10$5RDvuDESdq/58uO05Vg.1ekQ2SvdWWkCrcP2dwDM7BfI2XhIFqqkm', '137191805_295210593_456043133039450_1691553805872160106_n.jpg', '2022-07-04 07:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `image`, `status`) VALUES
(9, '523616157_408555296_371290595405259_2989098516904512139_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `a_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `answer`, `ans_id`) VALUES
(1, 'asd', 2),
(2, 'qwe', 2),
(3, 'add', 2),
(4, 'sdasdas', 1),
(5, 'asdasd', 1),
(6, 'sdfsdf', 1),
(7, 'machine', 3),
(8, 'hammad', 3),
(9, 'ali', 3),
(10, 'Photoshop', 4),
(11, 'Word', 4),
(12, 'PP', 4),
(13, 'Paint', 4),
(14, 'soft ware', 5),
(15, 'hardware', 5),
(16, 'appitaction', 5),
(17, 'CIT', 6),
(18, 'DIT', 6),
(19, 'GD', 6),
(20, 'Electronic Machine', 7),
(21, 'Calculator', 7),
(22, 'Adobe Cloud Creative', 8),
(23, ' Adobe Creative Cloud', 8),
(24, 'Adobe Cumulative Cloud', 8),
(25, 'Adobe Cloud Cumulative', 8),
(26, 'Lines', 9),
(27, 'Curves\n', 9),
(28, 'Both A and B', 9),
(29, 'None of the above', 9),
(30, '1985\n', 10),
(31, '1986', 10),
(32, '1987', 10),
(33, '1988', 10),
(34, 'Points', 11),
(35, 'Paths', 11),
(36, 'Areas', 11),
(37, 'Lines', 11),
(38, '2', 12),
(39, '3', 12),
(40, '4', 12),
(41, '5', 12),
(42, 'Inline', 13),
(43, 'Outline', 13),
(44, 'Boundline', 13),
(45, 'Inboundline', 13),
(46, 'Shift + I', 14),
(47, 'Ctrl + Shift + I', 14),
(48, 'Ctrl + I', 14),
(49, 'Alt + Shift + I', 14),
(50, 'Color', 15),
(51, 'Fill', 15),
(52, 'Stroke', 15),
(53, 'Paint', 15),
(54, 'Ctrl + P', 16),
(55, 'Ctrl + D', 16),
(56, 'Ctrl + K', 16),
(57, 'Ctrl + B', 16),
(58, 'Monitor uses RGB, and the printer uses CMYK.', 17),
(59, 'Monitor uses RGB, and the printer uses RGB', 17),
(60, 'Monitor uses CYMK, and the printer uses RGB.', 17),
(61, ' Monitor uses CYMK, and the printer uses Grayscale.', 17),
(62, 'Allows the selection of individual shapes', 18),
(63, 'Allows the selection of individual lines.', 18),
(64, 'Allows the selection of individual letters', 18),
(65, 'Allows the selection of individual points.\n', 18),
(66, 'True', 19),
(67, 'False', 19),
(68, 'True', 20),
(69, 'False', 20),
(70, 'Scale', 21),
(71, 'Rotate', 21),
(72, 'Reflect', 21),
(73, 'Invert', 21),
(74, 'True', 22),
(75, 'False', 22),
(76, '72', 23),
(77, '100', 23),
(78, '300', 23),
(79, 'True', 24),
(80, 'False', 24),
(81, '8x10\n', 25),
(82, '8.5 x 10', 25),
(83, '8.5 x 11', 25),
(84, '8.5 x 14\n', 25),
(85, 'Green', 26),
(86, 'Violet', 26),
(87, 'Blue', 26),
(88, 'Magenta', 26),
(89, 'Texture', 27),
(90, 'Temperature', 27),
(91, 'Template', 27),
(92, 'tonality', 27),
(93, 'foreground', 28),
(94, 'form', 28),
(95, 'proportion', 28),
(96, 'background', 28),
(97, 'illusion', 29),
(98, 'closure', 29),
(99, 'line', 29),
(100, 'value', 29),
(101, 'unity', 30),
(102, 'design', 30),
(103, 'insignia', 30),
(104, 'motif', 30),
(105, 'variety', 31),
(106, 'space', 31),
(107, 'balance', 31),
(108, 'value', 31),
(109, 'branding', 32),
(110, 'balance', 32),
(111, 'line', 32),
(112, 'tint', 32),
(113, 'Ctrl + R', 33),
(114, 'Ctrl + Shift + R', 33),
(115, ' Alt + R', 33),
(116, 'R', 33),
(117, 'HighText Machine Language', 34),
(118, 'HyperText and links Markup Language\n', 34),
(119, 'HyperText Markup Language\n', 34),
(120, 'None of these\n', 34),
(121, 'Head, Title, HTML, body', 35),
(122, 'HTML, Body, Title, Head', 35),
(123, 'HTML, Body, Head, Title,', 35),
(124, 'HTML, Head, Title, Body\n', 35),
(125, '&lt;pre&gt;\n', 36),
(126, '&lt;a&gt;\n', 36),
(127, '&lt;b&gt;\n', 36),
(128, '&lt;br&gt;\n', 36),
(129, '&lt;ul&gt;\n', 37),
(130, '&lt;ol&gt;\n', 37),
(131, '&lt;li&gt;\n', 37),
(132, '&lt;i&gt;', 37),
(133, '/', 38),
(134, '!', 38),
(135, '.', 38),
(136, ';', 38),
(137, '&lt;img href = &quot;jtp.png&quot; /&gt;\n', 39),
(138, '&lt;img url = &quot;jtp.png&quot; /&gt;\n', 39),
(139, '&lt;img link = &quot;jtp.png&quot; /&gt;\n', 39),
(140, '&lt;img src = &quot;jtp.png&quot; /&gt;\n', 39),
(141, 'a format tag.\n', 40),
(142, 'an empty tag.\n', 40),
(143, 'All of the above\n', 40),
(144, 'None of the above\n', 40),
(145, '&lt;a href = &quot;mailto: xy@y&quot;&gt;\n', 41),
(146, '&lt;a href = &quot;xy@y&quot;&gt;\n', 41),
(147, '&lt;mail xy@y&lt;/mail&gt;\n', 41),
(148, 'None of the above\n', 41),
(149, '&lt;body background = &quot;img.png&quot;&gt;', 42),
(150, '&lt;body background = &quot;img.png&quot;&gt;', 42),
(151, '&lt;bg-image = &quot;img.png&quot;&gt;\n', 42),
(152, 'None of the above\n', 42),
(153, '.ht\n', 43),
(154, '.html\n', 43),
(155, '.hml\n', 43),
(156, 'None of the above\n', 43),
(157, '&lt;style src = example.css&gt;\n', 44),
(158, '&lt;style src = &quot;example.css&quot; &gt;\n', 44),
(159, '&lt;stylesheet&gt; example.css &lt;/stylesheet&gt;\n', 44),
(160, '&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;example.css&quot;&gt;\n', 44),
(161, 'bgcolor', 45),
(162, 'color', 45),
(163, 'background-color\n', 45),
(164, 'All of the above\n', 45),
(165, 'style', 46),
(166, 'styles', 46),
(167, 'class', 46),
(168, 'None of the above\n', 46),
(169, '&lt;style&gt;\n', 47),
(170, 'style', 47),
(171, '&lt;link&gt;\n', 47),
(172, '&lt;script&gt;\n', 47),
(173, 'background-attachment\n', 48),
(174, 'background-image\n', 48),
(175, 'background-color\n', 48),
(176, 'None of the above\n', 48),
(177, 'p {background-color : yellow;}\n', 49),
(178, 'p {background-color : #yellow;}\n', 49),
(179, 'all {background-color : yellow;}\n', 49),
(180, 'all p {background-color : #yellow;}\n', 49),
(181, 'padding-left\n', 50),
(182, 'padding-right\n', 50),
(183, 'padding\n', 50),
(184, 'All of the above\n', 50),
(185, 'Yes', 51),
(186, 'No', 51),
(187, 'Can not say\n', 51),
(188, 'May be\n', 51),
(189, 'opacity\n', 52),
(190, 'filter\n', 52),
(191, 'visibility', 52),
(192, 'overlay', 52),
(193, 'vertical-align: subscript\n', 53),
(194, 'vertical-align: super\n', 53),
(195, 'vertical-align: sub\n', 53),
(196, 'None of the above\n', 53),
(197, 'text-style : capital;\n', 54),
(198, 'transform : capitalize;\n', 54),
(199, 'text-transform : capital;\n', 54),
(200, 'text-transform : capitalize;\n', 54),
(201, 'div p\n', 55),
(202, 'p', 55),
(203, 'div#p\n', 55),
(204, 'div ~ p\n', 55),
(205, 'border', 56),
(206, 'outline', 56),
(207, 'padding\n', 56),
(208, 'line\n', 56),
(209, 'text-shadow\n', 57),
(210, 'text-stroke\n', 57),
(211, 'text-overflow\n', 57),
(212, 'text-decoration\n', 57),
(213, 'Object-Oriented\n', 59),
(214, 'Object-Based\n', 59),
(215, 'Assembly-language\n', 59),
(216, 'High-level\n', 59),
(217, 'Alternative to if-else\n', 60),
(218, 'Switch statement\n', 60),
(219, 'If-then-else statement\n', 60),
(220, 'immediate if\n', 60),
(221, 'Conditional block\n', 61),
(222, 'block that combines a number of statements into a single compound statement\n', 61),
(223, 'both conditional block and a single statement\n', 61),
(224, 'block that contains a single statement\n', 61),
(225, 'Keywords\n', 62),
(226, 'Data types\n', 62),
(227, 'Declaration statements\n', 62),
(228, 'Prototypes\n', 62),
(229, '9', 63),
(230, '0', 63),
(231, '8', 63),
(232, 'Undefined\n', 63),
(233, 'Preprocessor\n', 64),
(234, 'Triggering Event\n', 64),
(235, 'RMI', 64),
(236, 'Function/Method\n', 64),
(237, 'James Gosling\n', 65),
(238, 'Mark Jukervich\n', 65),
(239, 'Dennis Ritchie\n', 65),
(240, 'Mark Otto and Jacob Thornton\n', 65),
(241, 'True', 66),
(242, 'False', 66),
(243, 'May be\n', 66),
(244, '.container-fixed\n', 67),
(245, '.container-fluid\n', 67),
(246, '.container\n', 67),
(247, 'All of the above\n', 67),
(248, '&lt;nav class=&quot;navigationbar navbar&quot;&gt;\n', 68),
(249, '&lt;nav class=&quot;navbar navbar-default&quot;&gt;\n', 68),
(250, '&lt;nav class=&quot;nav navbar&quot;&gt;\n', 68),
(251, '&lt;nav class=&quot;navbar default&quot;&gt;\n', 68),
(252, '&lt;ul class=&quot;navigation nav-tabs&quot;&gt;\n', 69),
(253, '&lt;ul class=&quot;nav tab&quot;&gt;\n', 69),
(254, '&lt;ul class=&quot;nav nav-tabs&quot;&gt;\n', 69),
(255, '&lt;ul class=&quot;navigation tabs&quot;&gt;\n', 69),
(256, 'slideshow', 70),
(257, 'scrollspy', 70),
(258, 'carousel', 70),
(259, 'None of the above\n', 70),
(260, '.btn-xl\n', 71),
(261, '.btn-lrg\n', 71),
(262, '.btn-large\n', 71),
(263, '.btn-lg\n', 71),
(264, '.img-circle\n', 72),
(265, '.image-circle\n', 72),
(266, '.image-rounded\n', 72),
(267, '.img-rounded\n', 72),
(268, '.label\n', 73),
(269, '.badge\n', 73),
(270, '.flag\n', 73),
(271, '.popover\n', 73),
(272, '.text-capitalize\n', 74),
(273, '.text-upper\n', 74),
(274, '.uppercase\n', 74),
(275, '.text-uppercase\n', 74),
(276, 'cit', 75),
(277, 'asd', 75),
(278, 'dfg', 75),
(279, 'asd', 76),
(280, 'qwe', 76),
(281, 'xczxc', 76),
(282, 'asd', 77),
(283, 'xzcc', 77),
(284, 'qwee', 77),
(285, 'asd', 79),
(286, 'qwe', 79),
(287, 'asd', 79),
(288, 'asd', 78),
(289, 'qwewqe', 78),
(290, 'sadasd', 78),
(291, 'zxcxzc', 82),
(292, 'asdsad', 82),
(293, 'asdsad', 82),
(294, 'zxczc', 81),
(295, 'asdsa', 81),
(296, 'fggfhfh', 81),
(297, 'zxxzc', 80),
(298, 'fghfgh', 80),
(299, 'ertret', 80),
(300, 'dots', 83),
(301, 'fonts', 83),
(302, 'points', 83),
(303, 'pixels', 83),
(304, 'gradient tool', 84),
(305, 'pen tool', 84),
(306, 'eraser tool', 84),
(307, 'select tool', 84),
(308, '.psd', 85),
(309, '.jpg', 85),
(310, '.doc', 85),
(311, '.fla\n', 85),
(312, 'Photoshop', 86),
(313, 'Dreamweaver', 86),
(314, 'InDesign', 86),
(315, 'paint', 86),
(316, 'red, white, and blue', 87),
(317, 'green, red, and yellow â€“orange\n', 87),
(318, 'red, blue, and yellow\n', 87),
(319, 'green, orange, and purple', 87),
(320, 'design', 88),
(321, 'logo', 88),
(322, 'pictogram', 88),
(323, 'illustration', 88),
(324, 'logo', 89),
(325, 'slogan', 89),
(326, 'design', 89),
(327, 'poster', 89),
(328, 'typography', 90),
(329, 'symbol', 90),
(330, 'tessellation', 90),
(331, 'unity', 90),
(332, '10000\n', 91),
(333, '1024', 91),
(334, '1000000', 91),
(335, '1000', 91),
(336, 'art', 92),
(337, 'creativity', 92),
(338, 'design', 92),
(339, 'movie', 92),
(340, 'pamphlet', 93),
(341, 'booklet', 93),
(342, 'posters', 93),
(343, 'slide', 93),
(344, 'line', 94),
(345, 'shape', 94),
(346, 'mass', 94),
(347, 'space', 94),
(348, 'illustration', 95),
(349, 'design', 95),
(350, 'space', 95),
(351, 'value', 95),
(352, 'foreground', 96),
(353, 'background', 96),
(354, 'contact', 96),
(355, 'depth of field', 96),
(356, 'A', 97),
(357, 'B', 97),
(358, 'J', 97),
(359, 'D', 97),
(360, '4', 99),
(361, '5', 99),
(362, '6', 99);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `date`, `status`) VALUES
(5, 'Aqib Noor', '0345228565', 'dfffdssdfsdf', '13-01-2023', '1'),
(6, 'Shamawoon', '03162841878', 'Fine', '16-01-2023', '1'),
(7, 'Hafeez', '03152845789', 'Bet institute in our town', '19-01-2023', '1'),
(8, 'Areef', '0312454687', 'Good initiatve by faculties', '24-01-2023', '1'),
(9, 'Shadab', '0315248795', 'I want to learn IOT', '25-01-2023', '1'),
(10, '5646164', '6+859+68797', 'jkojiosdhihd', '11-01-2024', '1'),
(11, 'Server_1', '03412275518', 'i want to contact with you', '13-01-2024', '1');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `image`, `heading`) VALUES
(17, '527984378_WhatsApp Image 2024-01-18 at 11.28.24 AM.jpeg', 'Students group photo - batch 2024'),
(18, '667417574_WhatsApp Image 2024-01-18 at 8.49.43 AM.jpeg', 'Computer Skills celebrating 5th year of excellence'),
(19, '657609550_WhatsApp Image 2024-01-18 at 12.04.07 PM.jpeg', 'Computer Skills management');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `message`, `date`, `status`) VALUES
(1, 'shamawoon2000@gmail.com', 'I am so glad to see that kind of website ', '20-10-2022', '1'),
(2, 'shamawoon2000@gmail.com', 'Best Institute', '16-01-2023', '1'),
(3, '4436', '9+7496', '11-01-2024', '1'),
(4, 'aqib.noor@trukkr.pk', 'hi', '13-01-2024', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `user_id`, `student_name`, `email`, `date`, `month`, `fees`) VALUES
(1, '10', 'Muhammad Taha', 'taha727694@gmail.com', '2022-09-13', 'September', '1500'),
(2, '10', 'Muhammad Taha', 'taha727694@gmail.com', '2022-10-15', 'October', '1500'),
(3, '2', 'Wasif Ahmed', 'wasif.ahmed.796@icloud.com', '2022-09-14', 'September', '1500'),
(4, '2', 'Wasif Ahmed', 'wasif.ahmed.796@icloud.com', '2022-10-12', 'October', '1500'),
(5, '3', 'Bilal Bin Shoaib', 'bilalbinshoaib123@gmail.con', '2022-10-19', 'October', '2000'),
(6, '4', 'Muhammad Faraz Noushad', 'mf88113492gmail.com', '2022-09-14', 'September', '1500'),
(7, '4', 'Muhammad Faraz Noushad', 'mf88113492gmail.com', '2022-10-16', 'October', '1500'),
(8, '5', 'Sumaira', 'sumaira021@gmail.com', '2022-09-13', 'September', '1000'),
(9, '7', 'Faiz Ahmed', 'faizahmed@gmail.com', '2022-10-13', 'October', '1000'),
(10, '8', 'Maryam Rustam Ali', 'maryam021@gmail.com', '2022-08-22', 'August', '800'),
(11, '8', 'Maryam Rustam Ali', 'maryam021@gmail.com', '2022-10-17', 'September', '800'),
(12, '9', 'Muhammad Samii', 'sami021@gmail.com', '2022-08-25', 'August', '1500'),
(13, '9', 'Muhammad Samii', 'sami021@gmail.com', '2022-09-15', 'September', '1500'),
(14, '9', 'Muhammad Samii', 'sami021@gmail.com', '2022-10-01', 'October', '1500'),
(15, '11', 'Rabeeka Sheikh', 'rabeekasheikh282@gmail.com', '2022-08-04', 'September', '1500'),
(16, '11', 'Rabeeka Sheikh', 'rabeekasheikh282@gmail.com', '2022-09-08', 'August', '1500'),
(17, '11', 'Rabeeka Sheikh', 'rabeekasheikh282@gmail.com', '2022-10-18', 'October', '1500'),
(18, '12', 'Anas Shahid', 'anas021@gmail.com', '2022-08-24', 'July', '800'),
(19, '12', 'Anas Shahid', 'anas021@gmail.com', '2022-09-22', 'August', '800'),
(20, '14', 'Yazdan Mumtaz', 'yazdan)021@gmail.com', '2022-10-01', 'October', '1000'),
(21, '76', 'Usman Essa', 'usman021gmail.com', '2022-11-02', 'November', '1000'),
(22, '87', 'Alaina', 'alaina@gmail.com', '2022-09-02', 'September', '2000'),
(23, '87', 'Alaina', 'alaina@gmail.com', '2022-10-03', 'October', '2000'),
(24, '87', 'Alaina', 'alaina@gmail.com', '2022-11-14', 'November', '2000'),
(25, '87', 'Alaina', 'alaina@gmail.com', '2022-12-07', 'December', '2000'),
(26, '87', 'Alaina', 'alaina@gmail.com', '2023-01-09', 'January', '2000'),
(27, '22', 'Saim Ali', 'saim021@gmail.com', '2023-09-13', 'September', '1500'),
(28, '111', 'aqib', 'aqibnoor723332@gmail.com', '2024-01-12', 'January', '1500'),
(29, '112', 'AREEF KHAN', 'areefk1324@gmail.com', '2024-01-01', 'January', '2000'),
(30, '113', 'Afifa babar', 'afifa333@gmail.com', '2024-01-03', 'March', '2000'),
(31, '113', 'Afifa babar', 'afifa333@gmail.com', '2024-01-03', 'April', '2000'),
(32, '115', 'Haroon Rasheed', 'haroon12@gamil.com', '2023-10-27', 'October', '1200'),
(33, '115', 'Haroon Rasheed', 'haroon12@gamil.com', '2023-11-29', 'November', '1200'),
(34, '115', 'Haroon Rasheed', 'haroon12@gamil.com', '2023-12-29', 'December', '1200'),
(35, '116', 'Md Hunain', 'mdhunain@gmail.com', '2023-12-11', 'December', '1200'),
(36, '117', 'Maaz', 'maaz@gmail.com', '2023-11-07', 'November', '1050'),
(37, '117', 'Maaz', 'maaz@gmail.com', '2023-12-12', 'December', '1050'),
(38, '118', 'Muhammad Samee', 'samee12@gmail.com', '2023-11-07', 'November', '1050'),
(39, '118', 'Muhammad Samee', 'samee12@gmail.com', '2023-12-15', 'December', '1050'),
(40, '119', 'Hussain Shafi', 'hussain95@gmail.com', '2023-11-10', 'November', '1050'),
(41, '119', 'Hussain Shafi', 'hussain95@gmail.com', '2023-12-11', 'December', '1050'),
(42, '121', 'Muhammad Abrar', 'abrariqbal12@gmail.com', '2023-12-20', 'December', '1000'),
(43, '121', 'Muhammad Abrar', 'abrariqbal12@gmail.com', '2024-01-21', 'January', '1000'),
(44, '126', 'Md saad', 'mdsaad@gmail.com', '2023-08-08', 'August', '1200'),
(45, '126', 'Md saad', 'mdsaad@gmail.com', '2023-09-06', 'September', '1200'),
(46, '126', 'Md saad', 'mdsaad@gmail.com', '2023-10-09', 'October', '1200'),
(47, '126', 'Md saad', 'mdsaad@gmail.com', '2023-11-07', 'November', '1200'),
(48, '126', 'Md saad', 'mdsaad@gmail.com', '2023-12-08', 'December', '1200'),
(49, '126', 'Md saad', 'mdsaad@gmail.com', '2024-01-08', 'January', '1200'),
(50, '122', 'Naila obaid', 'nailaobaid@gmail.com', '2023-08-08', 'August', '1200'),
(51, '122', 'Naila obaid', 'nailaobaid@gmail.com', '2023-09-06', 'September', '1200'),
(52, '122', 'Naila obaid', 'nailaobaid@gmail.com', '2023-11-09', 'October', '1200'),
(53, '122', 'Naila obaid', 'nailaobaid@gmail.com', '2023-11-07', 'November', '1200'),
(54, '122', 'Naila obaid', 'nailaobaid@gmail.com', '2023-12-08', 'December', '1200'),
(55, '122', 'Naila obaid', 'nailaobaid@gmail.com', '2024-01-08', 'January', '1200'),
(56, '135', 'Muhammad sarim', 'Zsarim415@gmail.com', '2024-02-06', 'February', '2000'),
(57, '134', 'Murtaza', 'murtaza22546@gmail.com', '2024-02-06', 'February', '2000'),
(58, '138', 'Ayesha', 'ayesha12@gmail.com', '2023-10-16', 'October', '1500'),
(59, '138', 'Ayesha', 'ayesha12@gmail.com', '2023-11-08', 'November', '1500'),
(60, '138', 'Ayesha', 'ayesha12@gmail.com', '2023-11-15', 'November', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `image`, `heading`, `text`, `button`) VALUES
(7, '463703474_hero.jpg', 'Welcome to Computer Skill', 'Code is like humor. When you have to explain it, itâ€™s bad. â€“ Cory House', 'http://schoolsystem.42web.io/index.php#course'),
(8, '893436319_eng.jpg', 'Welcome to Computer Skill', 'English has very many words', 'http://schoolsystem.42web.io/index.php#course'),
(9, '591541995_Untitled design (2).png', 'Welcome to Computer Skill', '\"Design is thinking made visual\" â€“ Saul Bass', 'http://schoolsystem.42web.io/index.php#course');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `total_question` varchar(255) NOT NULL,
  `attemp` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `user_id`, `reg_no`, `std_name`, `email`, `course`, `total_question`, `attemp`, `score`, `percentage`, `year`, `date`, `grade`, `status`) VALUES
(1, '93', '43369', 'ali', 'ali@gmail.com', 'C.I.T', '1', '1', 1, '100', '2023', '18-01-2023', 'A+1', '0'),
(2, '93', '43369', 'ali', 'ali@gmail.com', 'C.I.T', '1', '1', 1, '100', '2023', '18-01-2023', 'A+1', '0'),
(3, '93', '43369', 'ali', 'ali@gmail.com', 'C.I.T', '1', '1', 1, '100', '2023', '18-01-2023', 'A+1', '0'),
(4, '94', '43247', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', 'Graphic Design', '19', '19', 0, '0', '2023', '31-01-2023', 'FAIL', '0'),
(5, '94', '43247', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', 'Web Designing', '7', '7', 0, '0', '2023', '31-01-2023', 'FAIL', '0'),
(6, '94', '43247', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', 'Web Designing', '7', '7', 0, '0', '2023', '31-01-2023', 'FAIL', '0'),
(7, '94', '43247', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', 'Web Designing', '7', '7', 0, '0', '2023', '1-02-2023', 'FAIL', '0'),
(8, '94', '43247', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', 'Web Designing', '7', '7', 0, '0', '2023', '1-02-2023', 'FAIL', '0'),
(9, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(10, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(11, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(12, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(13, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(14, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(15, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(16, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(17, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(18, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '1', '1', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(19, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '1', '1', 0, '0', '2023', '2-02-2023', 'FAIL', '0'),
(20, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 2, '67', '2023', '2-02-2023', 'B', '0'),
(21, '97', '61732', 'ali', 'ali@gmail.com', 'C.I.T', '3', '3', 2, '67', '2023', '2-02-2023', 'B', '0'),
(22, '94', '43247', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', 'Web Designing', '40', '40', 16, '40', '2023', '2-02-2023', 'D', '1'),
(23, '99', '81547', 'Muhammad Azhan', 'azhan@gmail.com', 'Graphic Design', '26', '26', 21, '81', '2023', '3-02-2023', 'A+1', '1'),
(24, '99', '81547', 'Muhammad Azhan', 'azhan@gmail.com', 'Graphic Design', '40', '40', 34, '85', '2023', '3-02-2023', 'A+1', '1'),
(25, '100', '35661', 'Sultan', 'sultan@gmail.com', 'Graphic Design', '38', '38', 16, '42', '2023', '3-02-2023', 'D', '1'),
(26, '101', '95677', 'Bilal', 'bilal@gmail.com', 'Web Designing', '17', '17', 15, '88', '2023', '4-02-2023', 'A+1', '1'),
(27, '', '', '', '', '', '17', '17', 12, '71', '2023', '4-02-2023', 'A', '1'),
(28, '', '', '', '', '', '17', '17', 12, '71', '2023', '4-02-2023', 'A', '1'),
(29, '', '', '', '', '', '17', '17', 12, '71', '2023', '4-02-2023', 'A', '1'),
(30, '', '', '', '', '', '17', '17', 12, '71', '2023', '4-02-2023', 'A', '1'),
(31, '87', '56047', 'Alaina', 'alaina@gmail.com', 'Web Designing', '40', '40', 38, '95', '2023', '8-02-2023', 'A+1', '1'),
(32, '', '', '', '', '', '40', '40', 28, '70', '2023', '8-02-2023', 'A', '1'),
(33, '74', '16149', 'Shadab Ansari', 'shadab021@gmail.com', 'Graphic Design', '40', '40', 28, '70', '2023', '8-02-2023', 'A', '1'),
(34, '103', '55848', 'Shamroz', 'shamroz@gmail.com', 'Web Designing', '40', '40', 24, '60', '2023', '8-02-2023', 'B', '1'),
(35, '101', '95677', 'Bilal', 'bilal@gmail.com', 'Web Designing', '40', '40', 26, '65', '2023', '13-04-2023', 'B', '1'),
(36, '103', '55848', 'Shamroz', 'shamroz@gmail.com', 'Web Designing', '40', '40', 26, '65', '2023', '13-04-2023', 'B', '1'),
(37, '6', '28330', 'Uroosa Khan', 'uroosa021@gmail.com', 'Web Designing', '40', '40', 24, '60', '2023', '13-04-2023', 'B', '1'),
(38, '87', '56047', 'Alaina', 'alaina@gmail.com', 'Web Designing', '30', '30', 20, '67', '2023', '15-07-2023', 'B', '0'),
(39, '87', '56047', 'Alaina', 'alaina@gmail.com', 'Web Designing', '9', '9', 7, '78', '2023', '30-10-2023', 'A', '1'),
(40, '87', '56047', 'Alaina', 'alaina@gmail.com', 'Web Designing', '9', '9', 7, '78', '2023', '30-10-2023', 'A', '1'),
(41, '111', '42304', 'aqib', 'aqibnoor723332@gmail.com', 'Web Designing', '40', '40', 15, '38', '2024', '13-01-2024', 'E', '1'),
(42, '112', '19082', 'AREEF KHAN', 'areefk1324@gmail.com', 'Web Designing', '16', '16', 6, '38', '2024', '25-01-2024', 'E', '0');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `ans` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `question`, `course_name`, `ans`, `status`) VALUES
(8, 'Adobe Illustrator CC stands for ____, a cloud-based version of Adobe Illustrator.', 'Graphic Design', 23, '1'),
(9, 'In vector graphics, mathematical objects are used to define ____', 'Graphic Design', 26, '1'),
(10, 'Adobe Illustrator 1st version was released in', 'Graphic Design', 32, '1'),
(11, '____ are lines that we draw when we draw. ', 'Graphic Design', 35, '1'),
(12, 'How many types of anchor points are there in the path?', 'Graphic Design', 38, '1'),
(13, 'A stroke refers to the ____ of a path', 'Graphic Design', 0, '1'),
(14, 'What is the shortcut key to disable Perspective Grid?', 'Graphic Design', 47, '1'),
(15, '____ refers to the gradient that covers the interior area of an open or closed path.', 'Graphic Design', 51, '1'),
(16, 'To open the preferences dialog box, use the shortcut key -', 'Graphic Design', 56, '1'),
(17, 'Which color mode does a computer monitor use, and which does a printer use?', 'Graphic Design', 58, '1'),
(18, 'What is the direct selection tool?', 'Graphic Design', 65, '1'),
(19, 'You can change the width and length of an artboard after you create it.', 'Graphic Design', 66, '1'),
(20, 'The swatches panel is on the left side of adobe illustrator', 'Graphic Design', 69, '1'),
(21, 'Fundamental transformation tools include all of the following except', 'Graphic Design', 70, '1'),
(22, 'Screen resolution and Print resolution are the same things.', 'Graphic Design', 75, '1'),
(23, 'The preferred print resolution is ____ DPI.', 'Graphic Design', 78, '1'),
(24, 'Photoshop is a program used to manipulate images by allowing you to make adjustments \nto colors, brightness or contrast, changes to its resolution, crop and resize, or modify its \ncontent, such as removing imperfections', 'Graphic Design', 79, '1'),
(25, 'A legal-size piece of paper is', 'Graphic Design', 84, '1'),
(26, 'A triadic partner for yellow is _________', 'Graphic Design', 85, '1'),
(27, 'Which one shows the pattern.', 'Graphic Design', 91, '1'),
(28, 'which one is the best area of a picture or design that appears to be closest to the viewer', 'Graphic Design', 93, '1'),
(29, 'Which is not a correct belief about something you see', 'Graphic Design', 97, '1'),
(30, 'Which the plan an artist uses to organize a composition', 'Graphic Design', 102, '1'),
(31, 'which of the following is similar, lightness or darkness of a color?', 'Graphic Design', 107, '1'),
(32, 'which statement satisfies the practice of establishing a memorable reputation for a product or \na company', 'Graphic Design', 109, '1'),
(33, 'What is the shortcut key to select rotate tool in Illustrator?', 'Graphic Design', 116, '1'),
(34, 'HTML stands for -', 'Web Designing', 119, '1'),
(35, 'The correct sequence of HTML tags for starting a webpage is ', 'Web Designing', 124, '1'),
(36, 'Which of the following element is responsible for making the text bold in HTML?', 'Web Designing', 127, '1'),
(37, 'How to create an unordered list (a list with the list items in bullets) in HTML?', 'Web Designing', 130, '1'),
(38, 'Which character is used to represent the closing of a tag in HTML?', 'Web Designing', 133, '1'),
(39, 'How to insert an image in HTML?', 'Web Designing', 140, '1'),
(40, '&lt;input&gt; is -', 'Web Designing', 142, '1'),
(41, 'Which of the following is the correct way to send mail in HTML?', 'Web Designing', 145, '1'),
(42, 'How to insert a background image in HTML?', 'Web Designing', 149, '1'),
(43, 'An HTML program is saved by using the ____ extension.', 'Web Designing', 154, '1'),
(44, 'Which of the following is the correct syntax for referring the external style sheet?', 'Web Designing', 160, '1'),
(45, 'The property in CSS used to change the background color of an element is -', 'Web Designing', 163, '1'),
(46, 'The HTML attribute used to define the inline styles is -', 'Web Designing', 165, '1'),
(47, 'The HTML attribute used to define the internal stylesheet is -', 'Web Designing', 169, '1'),
(48, 'Which of the following CSS property is used to set the background image of an element?', 'Web Designing', 174, '1'),
(49, 'Which of the following is the correct syntax to make the background-color of all paragraph elements to yellow?', 'Web Designing', 177, '1'),
(50, 'Which of the following property is used as the shorthand property for the padding properties?', 'Web Designing', 183, '1'),
(51, 'Are the negative values allowed in padding property?', 'Web Designing', 186, '1'),
(52, 'The CSS property used to specify the transparency of an element is -', 'Web Designing', 189, '1'),
(53, 'Which of the following is used to specify the subscript of text using CSS?\n\n', 'Web Designing', 195, '1'),
(54, 'Which of the following syntax is correct in CSS to make each word of a sentence start with a capital letter?', 'Web Designing', 200, '1'),
(55, 'Which of the following is the correct syntax to select all paragraph elements in a div element?', 'Web Designing', 201, '1'),
(56, 'The CSS property used to draw a line around the elements outside the border?\n\n', 'Web Designing', 206, '1'),
(57, 'Which of the following CSS property is used to add shadows to the text?', 'Web Designing', 209, '1'),
(59, 'Which type of JavaScript language is ___', 'Web Designing', 214, '1'),
(60, 'Which one of the following also known as Conditional Expression:', 'Web Designing', 220, '1'),
(61, ' In JavaScript, what is a block of statement?', 'Web Designing', 222, '1'),
(62, 'The &quot;function&quot; and &quot; var&quot; are known as:', 'Web Designing', 227, '1'),
(63, 'Int x=8;  \nif(x&gt;9)  \n{  \ndocument.write(9);  \n}  \nelse  \n{  \ndocument.write(x);  \n}  ', 'Web Designing', 231, '1'),
(64, ' Which one of the following is the correct way for calling the JavaScript code?', 'Web Designing', 236, '1'),
(65, 'Who developed the bootstrap?', 'Web Designing', 240, '1'),
(66, ' Is Bootstrap3 mobile-first?', 'Web Designing', 241, '1'),
(67, 'Which of the following class in Bootstrap is used to provide a responsive fixed width container?', 'Web Designing', 246, '1'),
(68, 'The correct syntax of creating a standard navigation bar is -', 'Web Designing', 249, '1'),
(69, 'Which of the following is the correct syntax of creating a standard navigation tab?', 'Web Designing', 254, '1'),
(70, 'The plugin used to create a cycle through elements as a slideshow is -', 'Web Designing', 258, '1'),
(71, 'Which of the following class in Bootstrap is used to create a large button?', 'Web Designing', 263, '1'),
(72, 'The class in Bootstrap used to provide rounded corners to the image is -', 'Web Designing', 267, '1'),
(73, 'Which of the following class in Bootstrap is used to create a label?', 'Web Designing', 268, '1'),
(74, 'Which of the following class indicates the capitalized text?', 'Web Designing', 272, '1'),
(83, 'An image file such as a .jpeg is made up of lots of smaller units calledâ€¦â€¦ ', 'Graphic Design', 303, '1'),
(84, 'â€¦â€¦â€¦â€¦â€¦â€¦â€¦is a vector drawing tool found in Photoshop. ', 'Graphic Design', 305, '1'),
(85, 'Aâ€¦â€¦â€¦â€¦â€¦â€¦.file is the most common picture file type found on the internet', 'Graphic Design', 309, '1'),
(86, 'Images and graphics on a website are usually created using â€¦â€¦â€¦â€¦â€¦â€¦â€¦', 'Graphic Design', 312, '1'),
(87, 'What are the 3 primary colors?', 'Graphic Design', 318, '1'),
(88, 'A graphical mark used to identify a company, organization, product or brand is calledâ€¦â€¦â€¦â€¦â€¦.', 'Graphic Design', 321, '1'),
(89, 'â€¦â€¦â€¦â€¦..is a short and striking or memorable phrase used in advertising', 'Graphic Design', 325, '1'),
(90, 'â€¦â€¦â€¦â€¦â€¦â€¦â€¦is the art and technique of arranging type in order to make language visible.', 'Graphic Design', 328, '1'),
(91, 'How Many Pixels in One Megapixel?', 'Graphic Design', 334, '1'),
(92, '. â€¦â€¦â€¦â€¦â€¦.is the origination of new thing', 'Graphic Design', 337, '1'),
(93, ' Brochure is aâ€¦â€¦â€¦â€¦â€¦â€¦', 'Graphic Design', 340, '1'),
(94, 'Anything with height or width is calledâ€¦â€¦â€¦â€¦.', 'Graphic Design', 345, '1'),
(95, 'Concept of a work of art is calledâ€¦â€¦â€¦â€¦â€¦.', 'Graphic Design', 349, '1'),
(96, 'Nearer view of an Image is calledâ€¦â€¦â€¦ ', 'Graphic Design', 352, '1'),
(99, 'how many parts of computers?', 'MS Office', 360, '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `paper_password` varchar(255) NOT NULL,
  `sir_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_no`, `student_name`, `email`, `password`, `paper_password`, `sir_name`, `gender`, `course`, `status`, `image`, `date_time`) VALUES
(2, '37254', 'Wasif Ahmed', 'wasif.ahmed.796@icloud.com', '$2y$10$bC21o4bgsTI/cWrq5ddptu8QuvCfNAsfRJORQE2/XUtwOyPfa70oa', '', 'shamawoon', 'Male', 'Web Designing', '0', 'avater.png', '2022-10-19'),
(3, '84583', 'Bilal Bin Shoaib', 'bilalbinshoaib123@gmail.com', '$2y$10$wJctTcSptzjhbMCKaheiWOlvaj57ivCcir7cWbtTrgM3zeej8MzDq', '', 'shamawoon', 'Male', 'Web Designing', '1', 'avater.png', '2022-10-19'),
(4, '86561', 'Muhammad Faraz Noushad', 'mf88113492gmail.com', '$2y$10$OckmUSiVytQ642l5xnLPyepIaLRRYoY6HUDe.Ms8bh8zhStpA6UWy', '', 'Aqib noor', 'Male', 'Web Designing', '1', 'avater.png', '2022-10-01'),
(5, '65335', 'Sumaira', 'sumaira021@gmail.com', '$2y$10$gOICsrIsWRtXeAmqgtRzwe567gp9FAueP8w7Ma3dggZL/ukmq7.Xi', '', 'aqib Noor', 'Female', 'C.I.T', '1', 'avater.png', '2022-09-01'),
(6, '28330', 'Uroosa Khan', 'uroosa021@gmail.com', '$2y$10$ymC78QpU1tTE617dMnXvSeAfyL/.Lv4sYo/2vzQRara4BCP.IuxPG', '', 'Shamawoon', 'female', 'Web Designing', '1', 'avater.png', '2022-10-03'),
(7, '88782', 'Faiz Ahmed', 'faizahmed@gmail.com', '$2y$10$U4dIEWcjUqs/YYwDDV0gr.YKxnRskAt6M4HXhzW24xvGfX3fGaRBG', '', 'Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-09-01'),
(8, '22693', 'Maryam Rustam Ali', 'maryam021@gmail.com', '$2y$10$qsCm.qZO8m5UK4qiDXRwnOUgMk.c5lrXvIdGdlsXNeOTDxnSYfQmi', '', 'Aqib Noor', 'Female', 'C.I.T', '1', 'avater.png', '2022-08-23'),
(10, '35268', 'Muhammad Taha', 'taha727694@gmail.com', '$2y$10$rGHUnWUgCpB0CHz3wt0oiuA/evN/lK1XM1Y8yFbbLb6WBaHOOATkW', '', 'Shamawoon', 'male', 'Web Designing', '1', 'avater.png', '2022-08-15'),
(11, '30636', 'Rabeeka Sheikh', 'rabeekasheikh282@gmail.com', '$2y$10$58WcBwpntliUkQG3wmWd6.PXF0Je4cWLVuusBF8tV2AKDVoOo6ARC', '', 'Aqib Noor', 'female', 'Web Designing', '1', 'avater.png', '2022-08-01'),
(12, '72401', 'Anas Shahid', 'anas021@gmail.com', '$2y$10$dw9ClGWgeOST0BEVPwb6su3oJkyQmFcHqyZF296RQYas052bpnqqi', '', 'Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-07-20'),
(13, '21875', 'Shahrukh', 'shahrukh021@gmail.com', '$2y$10$od9xKI27qEO60b.x8un9U.0Dg6RSPM8sm8pD.vB6YZa1m1J6yPkZa', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-06-12'),
(14, '84264', 'Yazdan Mumtaz', 'yazdan)021@gmail.com', '$2y$10$Ry8zcFRoG8izkeuPXS9Nr.lWeYv2SlpiE1m/KVAqgFv/mfD0eJ5qO', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-06-15'),
(15, '81774', 'Saba Javed', 'sabaj89252@gmail.com', '$2y$10$8en/k/qgILpt0.Gbp34dzO00xGLB04tg3ARpZ.hYZnNQBkzbnZDZS', '', 'Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-05-01'),
(16, '14474', 'Muhammad Sameer Iqbal', 'iqbalsameer078@gmail.com', '$2y$10$I.HQoeKfm/MYyEW3p66M/OyR9OlPA3x9ocg1UXmdX6bRaiiTFOZ6i', '', 'Shamawoon', 'Male', 'Graphic Design', '1', 'avater.png', '2022-06-16'),
(17, '57031', 'Muhammad Faizan', 'faizan021@gmail.com', '$2y$10$7q/ejclR16V31TrX4fUcuO3jBBJUm0K5P.0YFv5rHwxKYldKCCo1y', '', 'Aqib Noor', 'Male', 'Web Designing', '1', 'avater.png', '2022-03-01'),
(18, '76498', 'Muhammad Talha Khursheed', 'talha021@gmail.com', '$2y$10$UfdLMU.xTY11Sao0QaLwVuVifVR/eC4QbQix6yNyyChqsTSj3WKuu', '', 'Aqib noor', 'Select Gender', 'Select Course', '1', 'avater.png', '2022-01-01'),
(19, '75638', 'Muhammad Faraz Noushad', 'mf8811349@gmail.com', '$2y$10$SEcmMYT5pHdvRrtODGREn.ourDloqQgIzaa4gRSFhSVoegRyaJB.2', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-01-09'),
(20, '50644', 'Faizan Ahmed', 'faizanahmed021@gmail.com', '$2y$10$JPGLDIW8nFSYl1fvWu9/SeeGijGFzDpLtLCoOEFU28Sa0PR0HRri6', '', 'Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-01-01'),
(21, '72105', 'Rabeeka Sheikh', 'rabeekasheikh282@gmail.com', '$2y$10$ceHv36BAKuYAwew7kPKdE.UYASTJbF0oA9H3Axf9Di60IN7wLPzGC', '', 'Aqib Noor', 'Female', 'C.I.T', '0', 'avater.png', '2022-01-11'),
(22, '95367', 'Saim Ali', 'saim021@gmail.com', '$2y$10$ySVuRedHAZkBt3g0FHcLw.aUQBXyMHHdZUD24LCDiq9kCg/IS5E8S', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-10-10'),
(23, '44327', 'Nafiz Abu Huraira', 'nafiz021@gmail.com', '$2y$10$g6H1MzwAbYSKnk5xE4oCleuGlh7AiwmthEI6A7.sDwYSpikVlbH6.', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-10-14'),
(24, '11203', 'Muhammad Maaz', 'xyedmazz@gmail.com', '$2y$10$twCOF6Pz1TsEW3sjo3epNOKGUq3XU/68axirq51S234cb/MhtKe.2', '', 'Aqib Noor', 'Male', 'Web Designing', '0', 'avater.png', '2021-09-02'),
(25, '72874', 'Shah Ahmed', 'ahmed021@gmail.com', '$2y$10$azYE2h/l7RVSP2jLsJjYHua5A4Y6iQA/vB7yk8WKtAQp7Jzew.y7S', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2023-01-06'),
(26, '14800', 'Muhammad Danish', 'danish021@gmail.com', '$2y$10$Z.1lBrYnrnQbYc0ZL1Oc6OueIP1/IASscVPatRN4o.szh7BiVy8za', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-08-10'),
(27, '18890', 'Afreeqn Baber', 'afreen021@gmail.com', '$2y$10$qLJakG8v8o3a2qvuQc9iDeSqtTjAteQarMRlLiELDSvZta/dbv1qe', '', 'Aqib noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-06-06'),
(28, '67403', 'Saira Shahid', 'saira021@gmail.com', '$2y$10$6X6YPxNqw7MAGIyoekkGouXJu81zJC4CLa81AZzG30d81EF6z6KLu', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-06-01'),
(29, '36479', 'Shuja Ali', 'shujaali540@gmail.com', '$2y$10$Q6EzxvtTSuicG.EuJtHkZ.l5rZcSdX.gawWfcWEctTLMXOq/6VEEy', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-01-06'),
(30, '92145', 'MD Sohail', 'sohail021@gmail.com', '$2y$10$1BiAaq/3yLBz3nk.KdoCruTXLuPN4aldgCkJpYDhDB.98ECszZ2wG', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-04-08'),
(31, '58318', 'Shehzad Hussain', 'Shehzad021@gmail.com', '$2y$10$8UC5vWW1gIhmQkXyW5f4oOnGGBbiuoNxUsn5GNs/1ce35h1SHXHc6', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-12-30'),
(32, '90146', 'Habib ur Rhman', 'rhman021@gmail.com', '$2y$10$F.dMIm0v.3kUDse.maF..eqMkxlHt61rJsEhSBLvajeNuPDHqUUE6', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-06-02'),
(33, '50476', 'MD Hammad', 'hammad021@gmail.com', '$2y$10$.ZOWuGsZzfh8ErpLbBZUCuWuNeEW7mb/lYgtYG.FB/7FVKh3ESY6C', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-04-03'),
(34, '65572', 'Anjum Ejaz', 'anjumejaz911@gmail.com', '$2y$10$boLLnQqFvPrHZ72H2yeRfOpI3fMTYRivdM1sNQ2WCHJIgo0UZqNMm', '', 'Aqib Noor', 'Female', 'C.I.T', '0', 'avater.png', '2022-01-21'),
(35, '50477', 'Huzaifa Sultan', 'sultan021@gmail.com', '$2y$10$DTWjCcoO8BqQepvXAKS./O95ZeDZLZgojQR8WAoLV1SlI06HIRMOS', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-04-03'),
(36, '26984', 'Rimsha Kanwal', 'rimsha021@gmail.com', '$2y$10$jvWTORBl5SroPRAfUt390.ysWTv0Lgh1J8W7C697nlslAjIwhcia6', '', 'Aqib Noor', 'Female', 'C.I.T', '0', 'avater.png', '2022-08-01'),
(37, '68037', 'Muhammad Faizan', 'faizanmushtaq021@gmail.com', '$2y$10$lpX7/yDRtMg3OFIUu/Nmz.L11tRIBZwrhmnnkUSNGXEe9wM0ZdGl6', '', 'Shamawoon', 'Male', 'Graphic Design', '0', 'avater.png', '2021-02-21'),
(38, '53990', 'Naveed Shafi', 'naveed021@gmail.com', '$2y$10$q15kXutE9w6bHhk7QKiUYuHRCJkt8.MWqsHQSKJ1G2NrVWpkIpL/q', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-01-15'),
(39, '12266', 'Hafiza MD Sufiyan', 'sufi021@gmail.com', '$2y$10$/ZNKqlFaT2nKYzYEkjjqYONRNaWy77u2UeK/MBIlXVMapdO/Qpzoa', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-02-01'),
(40, '83684', 'Muhammad Nasir', 'nasir021@gmail.com', '$2y$10$Dp9aPTkZnsnYz0yRYib3fu8n0Y0pIWho9giVBLlk62iZxGMRwdpi2', '', 'Shamawoon', 'Male', 'Graphic Design', '0', 'avater.png', '2020-09-20'),
(41, '69230', 'Ebad Khan', 'ebad021@gmail.com', '$2y$10$a3JYhRhwtdRGF6YXBwKZPeG2W9BSMCOHvX/gVTUlBveqN2NRE4OLS', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-09-11'),
(42, '41819', 'Muhammad Majid ALam', 'majid021@gmail.com', '$2y$10$pN6pByeGjp0ehUU8qT4ji.YyYLa2a7sXpFyqWUYBNZ/6FA.SwzlcO', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-08-20'),
(43, '32494', 'Taha Hashim', 'hashim021@gmail.com', '$2y$10$1Mvm9xPaSNtBz2xF4BVLru3nlObZvc2v.L/b3QmvADj.PgF1C9D0.', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-04-11'),
(44, '83393', 'Hamza ', 'hamza021@gmail.com', '$2y$10$y0HMAfWQF83grvkE.9pp0.KhPJqv2y4PcHbz1dHHW0QBbACNGx/7W', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-08-01'),
(45, '11390', 'Muhammad Sufyan', 'sufyanamir810@gmail.com', '$2y$10$AE.T9BLjaJV3DeFIF84zfe0SfE6fvYLwpUoM72SltlQcpxPdq0dN.', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-08-28'),
(46, '59757', 'Huzaifa Ashfaq', 'huzaifaashfaq021@mail.com', '$2y$10$SuL3rqe6WQ8R1G0Qc2YYm.YjRAmcADjI8yOjItwQyNAMDc/Xy5kvq', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-08-20'),
(47, '36344', 'Humayon Babar', 'humayon021@gmail.com', '$2y$10$vWMuesS5.1wTt3An.xI4OuiWoAR/7tRM0g2Ob3lv3JA3Ay7ig91TG', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-08-07'),
(48, '22044', 'Wamiq', 'wamiq021@gmail.com', '$2y$10$D/SO7LBE6XY1u7Ig1li0ouicJKHAsiUNHA4sd9znzOjVoCAq3ly2S', '', 'Aqib noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-08-01'),
(49, '68849', 'Abdul Hafeez', 'hafeez021@gmail.com', '$2y$10$nIFJ9mSzYZG81gvLDuJXQO7Y80c/SAfPGGGx0RX4XPqtVmVn7Limu', '', 'Aqib Noor', 'Male', 'Web Designing', '0', 'avater.png', '2020-07-01'),
(50, '17303', 'Rashid', 'rashid021@gmail.com', '$2y$10$n6ztpbIm2zEgiolLwKvCXO9GqQK0tGmH4VwNT/jECmUCpDnI6Fdf.', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-07-01'),
(51, '73688', 'Hafiz Muhammad Taha', '09hml.2taha@gmail.com', '$2y$10$I/lGrOVupovDDXZxw0Jp7uetwGyX8KazeDtrJd0369tANp9juUwWS', '', 'Aqib noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-07-01'),
(52, '61086', 'Asad Sarfaraz', 'asad021@gmail.com', '$2y$10$YAZcTYw7ZnDCzsPJwiiKJe1qVedCUvX89Mea4O92D0u4w/Vdh28PO', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-18'),
(53, '91978', 'Muhammad Ayaz ', 'ayaz021@gmail.com', '$2y$10$Z3udv2KsgfuXeoh7lCmszem1w7hvuawlPmZAXfxPUrogBuPtyTX3G', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-06-15'),
(54, '57760', 'Muhammad Zulfiqar', 'zulfiqar021@gmail.com', '$2y$10$QZ/xp3noc5WG1bAl/1p/7u4NMSmFYxjRNw3LuLNK9V2tthP/vLSI6', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-20'),
(55, '15718', 'Aman Ullah', 'aman021@gmail.com', '$2y$10$MtSKx8aTDPu39dPHL5U81epivLHsyMVuSp0BlmWw1GrvIzRPFSyha', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-15'),
(56, '53023', 'Muhammad Faizan', 'mushtaqfaizan@gmail.com', '$2y$10$x73IGtUieAA6ZUSZMC4x.OsuolJ5a0/hksMJhiCJN5uwj2LRlsQIS', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-06'),
(57, '30802', 'musab Khan', 'musab021@gmail.com', '$2y$10$3c6g5ofjViC8vW9hStg4C.O5XbqGgn5kah9gsOC6cXcl7CeGr35dS', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-04'),
(58, '35584', 'Athar', 'athar021@gmail.com', '$2y$10$6VPwBnKCTrbHLx7dFDNjreOXJyyY8HOOT6yDub.WO4lr/jRxv.JE.', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-03'),
(59, '94128', 'MD Sameer', 'sameer@gmail.com', '$2y$10$xXkKpKCdXnNLK6GRwEpVY.rNM4/QBZmkof4J8ehwDgsol35dqgOUe', '', 'Aqib noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-06-03'),
(60, '49009', 'Syed Muhammad Munir Shahid', 'Munirssg@gmail.com', '$2y$10$fDvWdgHXMaymU9Xn6.LTYu0YMzi7ynndySjzFaw4urAC3s4Iu/pcu', '', 'Aqib Noor', 'Male', 'Web Designing', '0', 'avater.png', '2020-02-06'),
(61, '71274', 'Muhammad Shakil', 'shakil021@gmailcom', '$2y$10$8556oj3duzt/BxWAwdGNie0d1EGS1/LlOLhaqmxe0.FXbFPNVcDoS', '', 'Aqib Noor', 'Select Gender', 'Select Course', '0', 'avater.png', '2019-01-01'),
(62, '16405', 'Shabbir Hussain', '021@gmail.com', '$2y$10$IjAEIHbihL2ypJ46fVxPl.jg5hOOzY0fUyDxh5A7CMOxFO45JXQ9G', '', 'Aqib Noor', 'Male', 'Web Designing', '0', 'avater.png', '2020-01-22'),
(63, '13164', 'Muhammad Obaid', 'obaid021@gmail.com', '$2y$10$T1hf1.Ga278rd0LIte/nGeBMQGPF46ID7xd5gYKSD6i5Lk97WLxsS', '', 'Aqib Noor', 'Male', 'Graphic Design', '0', 'avater.png', '2020-03-17'),
(64, '61255', 'Hassan Ali', 'hk2206410@gmail.com', '$2y$10$6/c0xX/LoY7K7sZ0CsdrQOox85KzaN5m3f8v/u9jNDI77Dgd2OJpe', '', 'Aqib Noor', 'Male', 'Web Designing', '0', 'avater.png', '2020-03-12'),
(65, '73485', 'Shazaib Ali', 'ali021@gmail.com', '$2y$10$3u2dh9Su2Qz.xyt494TxEemWdLQkVz4RTpngedLs5U60EbJ7fEl/e', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-03-12'),
(66, '87766', 'Fiza Arzo', 'fiza021@gmail.com', '$2y$10$/MJWZ7id20KoHUxdc4PwbuTaDA6jcp1R41Kf7ZoGnTbxCbPKrIl8C', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-11-21'),
(67, '61439', 'Habiba Ziaz', 'habiba021@gmaim.com', '$2y$10$LSC5aeWffslgFyPWKHChk./lKfOBNPlqCBWmoslLoM.kB/X7ww7kW', '', 'Aqib Noor', 'Female', 'C.I.T', '0', 'avater.png', '2022-01-01'),
(68, '37715', 'Jawwad Ahmed', 'Jawwad@gmail.com', '$2y$10$5H0p6WmqqHuQjyqfywOz7OLqKBNex.ya4QPlHSylnUqiBIWGXS7l2', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2021-04-23'),
(69, '37468', 'Hammad haider Ansari', 'alipst04@gmail', '$2y$10$qRkTfKgeBAUVwyQMnIViMuVbZ1G5rsI8R2w6K4sENoX7o0MfSPK2.', '', 'Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-06-10'),
(70, '53439', 'Bisma Sheikh', 'bismashaikh348@gmail.com', '$2y$10$irv2MkaeIORIOsC759seyuJb2RaT1dB6dbylNYn62LBOOVYna2PEO', '', 'Shamawoon', 'Female', 'C.I.T', '0', 'avater.png', '2022-08-01'),
(71, '85206', 'Fariz Imtiaz', 'Fariz021@gmail.com', '$2y$10$ZV3hAI2yAg.8AKDqmzsbfedQHHgTKILreEeR0cBs6ahQc8A.l35Va', '', 'Aqib Noor', 'Male', 'Graphic Design', '0', 'avater.png', '2022-08-29'),
(72, '42448', 'Abdul Qadir', 'qadir012@gmail.com', '$2y$10$Zu4ZlAG2xu82RjoX6RZLve1mZk/p1k/bk8ChRc5..Iud7irIj0RB6', '', 'Shamwoon', 'Male', 'C.I.T', '0', 'avater.png', '2022-09-01'),
(73, '28820', 'Naveed', 'naveed210@gmail.com', '$2y$10$J1Av4D3j4zPUigkY8N8B.ukL.OOynjCsZ0DJ6Wf8nvRfICjLb4CVO', '', 'Aqib noor', 'Male', 'C.I.T', '0', 'avater.png', '2020-01-07'),
(74, '16149', 'Shadab Ansari', 'shadab021@gmail.com', '$2y$10$yIqGDmuVDtYM22wXKLg0SOGQGt7tIymAh5X82NbcAHoNyA8RldO/.', '', 'Shamawoon', 'Male', 'Graphic Design', '1', 'avater.png', '2022-09-01'),
(75, '79967', 'Muhammad Mazhar', 'mazar021@gmail.com', '$2y$10$Z37L1Y47F2eRN892MoVDMuVjNQcuRLnnFu0ZDqo26QJGJHR33SfM6', '', 'Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-01'),
(76, '59314', 'Usman Essa', 'usman021gmail.com', '$2y$10$IeZOnrGCQg9UDMmaDoih5ekTX/s4bsLB4EWS5QYHXv3oCZm8bV/xm', '', 'Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-01'),
(77, '77570', 'Muhammad Murtaza', 'm.murtaza021@gmail.com', '$2y$10$oZv3QdsYI9KMpJIC6n4p5uPP8YAFuoiFZk699OKpnQKlLp6YYxjQ2', '', 'hammad khan', 'male', 'C.I.T', '1', 'avater.png', '2022-09-01'),
(78, '34604', 'Naimatullah', 'naimatullah021@gmail.com', '$2y$10$htaLJXCtxuTnhHbSG3vY4uxM83dwH5K1Fh/ilIQiuoP2xbUKNzX/e', '', 'Sir Hammad Khan', 'Male', 'C.I.T', '1', 'avater.png', '2022-09-01'),
(79, '94263', 'Syed Shoil Mehmood', 'shoil021@gmail.com', '$2y$10$7CpIx511zK6kvVjkWRnjE.ybyoEp/srAQI0oFr437pe/Kddvkmu6a', '', 'Sir Shamawoon Mumtaz', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-01'),
(80, '99382', 'Hamza Ali', 'hamzaali021@gmail.com', '$2y$10$lnD5bjrGt9AjjxJI57LdGul/v7gN4lxDOOXWxw1PfFw7S9JZb4i5m', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2022-11-01'),
(81, '98983', 'M.mair', 'mair021@gmail', '$2y$10$nudOsbmVFANtIcsw6luiTetetUks1Myam5n/5ScmZjTlXQYhaZPCO', '', 'Sir Shamawoon Mumtaz', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-01'),
(82, '14833', 'hammd siddiqui', 'hammd _siddiqui@gmail.com', '$2y$10$Trb72QZiJlt9qgBzUAJcC.ygs2B3cMn90Yq0a/NPwWCsvsY4MhPx6', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-06'),
(83, '93409', 'Sohail Mehmood', 'sohailmehmood@gmail.com', '$2y$10$LtaSOcymZKy3./pFrNPNYOCAShiheHWCugmSvVwCIXXqSjAD/MyWu', '', 'Sir Shamawoon Mumtaz', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-01'),
(84, '96926', 'Muhammad Mair', 'muhammadmair@gmail.com', '$2y$10$htNCo368zll9qD5s7DFNQu3UgZhQfMkgrNP3N6jZCsHFX8lT0HRhK', '', 'Sir Shamawoon Mumtaz', 'Male', 'C.I.T', '0', '948728589_5472.jpg', '2022-11-01'),
(85, '50416', 'Sayed Ameen', 'syedameen@gmail.com', '$2y$10$SWcS3yYUffG4Lx.cPQ3.ueAo.NTQoCHjsWuRl8etJqwqxkRyWYqZG', '', 'Sir Shamawoon Mumtaz', 'Select Gender', 'Select Course', '1', 'avater.png', '2022-11-17'),
(86, '64455', 'Shayan Azhar', 'shayanazhar@gmail.com', '$2y$10$vEZQjDwSwfQu7eARVsXDvesPpwMZlaYhEBFN30RqT1HBG5aH1NgIK', '', 'Sir Shamawoon Mumtaz', 'Male', 'C.I.T', '1', 'avater.png', '2022-11-17'),
(87, '56047', 'Alaina', 'alaina@gmail.com', '$2y$10$PjqXfZ97OPr8inJOj85YxONo7gj21TS//nW2PqrPWuYil7gVMxz6u', '', 'Sir Shamawoon Mumtaz', 'Female', 'Web Designing', '1', 'avater.png', '2022-09-01'),
(95, '97453', 'Areef', 'areef@gmail.com', '$2y$10$72H.E1GgY7jdxq89om9Xi.H4VmVHjIh9rt651dmKWFF3pbd7XR4l2', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '0', 'avater.png', '2023-01-21'),
(96, '67422', 'Shazaib', 'sahzaib@gmail.com', '$2y$10$nPZTe5C9VmNQCUE6K4GW.u8SBhqY2DKEKZMgoBlWlulwd.JdA2ijq', '', 'Sir Shamawoon Mumtaz', 'Male', 'C.I.T', '0', 'avater.png', '2023-01-16'),
(98, '98145', 'Riaz Ud Din', 'riazuddin@gmail.com', '$2y$10$lgdSA2FynHrp5DGOio9h1uL1hJalILsWTdluyeQ1SwvryWqpZ7zKi', '', 'Sir Aqib Noor', 'Male', 'Web Designing', '0', 'avater.png', '2018-06-01'),
(100, '35661', 'Sultan', 'sultan@gmail.com', '$2y$10$nkSQ95My2rreLtf6HpXrmeZWAcgtTUsyJID1Wj/OFUuszxr8OKyma', '', 'Sir Shamawoon Mumtaz', 'Male', 'Graphic Design', '0', 'avater.png', '2023-02-24'),
(101, '95677', 'Bilal', 'bilal@gmail.com', '$2y$10$lHZQoye8ySD33XusJqZno.MrPOQnPe.uF4D6oIF7lo4MMZJWEMcp6', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '0', 'avater.png', '2023-02-24'),
(102, '88386', 'Muhammad Sami', 'sami@gmail.com', '$2y$10$aZDSu2DQ8riWCRHFNK3u0O2CPiiTqwD1MgTrel0LlldplNT4Z3k0y', '', 'Sir Shamawoon Mumtaz', 'Male', 'Graphic Design', '1', 'avater.png', '2022-08-15'),
(103, '55848', 'Shamroz', 'shamroz@gmail.com', '$2y$10$xM6WtxtR94IXCv.gCGHt8exgOQFXv1IUNYDvL9kvMQg7NmY8sK.r6', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '1', 'avater.png', '2022-08-16'),
(104, '67467', 'Muhammad Daniyal', 'daniayal@gmail.com', '$2y$10$/GXmFH0fY8Kn09s7TV.FLuGw/qmlGvpP3Tf.Sq0Cgov2MuwQFD0LC', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '1', 'avater.png', '2023-07-10'),
(105, '65451', 'Muhammad Azeem', 'azeem@gmauil.com', '$2y$10$BHnuibBLsL2Tt8tKVZ5x8eUx857AvLk9lyRlJSKDgbpTAf8iXKe76', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '1', 'avater.png', '2023-07-10'),
(106, '92257', 'Muhammad Saad Meer', 'saad@gmail.com', '$2y$10$uqqJdMoGJr6yHpmdrCzV6eBaLC4djqj.RsnvEK7Uiu0fJYYNAZGoy', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '1', 'avater.png', '2023-07-12'),
(107, '24161', 'Uzair Jawaid', 'uzair@gmail.com', '$2y$10$/UHo1h3yllcSuxt80QIdNeTgeGZeGty6UvRVq6ZeXjN.xdKWZRlCS', '', 'Sir Shamawoon Mumtaz', 'Male', 'Web Designing', '1', 'avater.png', '2023-07-12'),
(108, '20847', 'Shaiya Shamim', 'shaiya@gmail.com', '$2y$10$cwI5xX7PDGEUNoOziYwdN.tgnVaAnqx/nIsXLfnGMu/A/vYM2L7pG', '', 'Sir Shamawoon Mumtaz', 'Female', 'C.I.T', '1', 'avater.png', '2023-07-18'),
(109, '58142', 'Shamawoon Mumtaz', 'shamawoon@gmail.com', '$2y$10$/Y1Hlcd/544tqoZyEOYakOrQtXMMjRLPypssx1rLqOvC.MAUHCwLK', '', 'Sir Shamawoon Mumtaz', 'Male', 'Graphic Design', '0', 'avater.png', '2023-08-05'),
(110, '84611', 'ali', 'ali@gmail.com', '$2y$10$IGUSBihF6obLoxe/Eg9dDe8.0TS5w529MXmxYUROLaiy/Ne.frhIW', '31118', 'Sir Daniyal Ali', 'Male', 'C.I.T', '0', 'avater.png', '2023-08-23'),
(114, '32872', 'Muhammad Muzammil', 'mdmuzammil@gmail.com', '$2y$10$QwVXbAGZ39FLFMVFzohpou0OQYUguI0D.By7CXXIo8tGgh6UmBjMK', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-09-12'),
(115, '56085', 'Haroon Rasheed', 'haroon12@gamil.com', '$2y$10$JcPLneKNrHFhkMkefTp1UOqwpX1cy6Rq2.190oKAZlfoQUGi/JG7K', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-10-27'),
(116, '72637', 'Md Hunain', 'mdhunain@gmail.com', '$2y$10$hkJ4yWpkgsqmRzrXTULeeOylUZ8zOOWqy8uYHL/a9uCVOh0GL2b/i', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-12-11'),
(117, '92394', 'Maaz', 'maaz@gmail.com', '$2y$10$ySnfSdlTZLehQ0PW3IyY8uOa/xSuqlJbmgQdujLnXVc.c0k6paZ7u', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-10-30'),
(118, '20485', 'Muhammad Samee', 'samee12@gmail.com', '$2y$10$wJJ9Fbp7HjizDY.oj46UA.3gy7M2gG3AXQcuJ5rhndPza4hByA26i', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-10-30'),
(119, '49270', 'Hussain Shafi', 'hussain95@gmail.com', '$2y$10$3l3RHTqX/l2W1Ysp4lnnpOe.B.ckKpPpy4NPMieSod3acDpU5Ve2K', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-10-30'),
(120, '78735', 'Hafiz muhammad hasnain ', 'hafizhasnain@gmail.com', '$2y$10$HfyI1c13Hj8XS2dooxv6KeAjEyTbn2PWhUSkopxhRlf9XBZ8YlYkC', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2024-01-03'),
(121, '27217', 'Muhammad Abrar', 'abrariqbal12@gmail.com', '$2y$10$phz7mP1Z3hQKCiTK.FIZmu9TzeasJZDyDrKGp9F5IKAn8oo46h8t.', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-12-21'),
(122, '77951', 'Naila obaid', 'nailaobaid@gmail.com', '$2y$10$bSh5I00v4iGp1qrI2C/oaOkcQ2LMoQb.7a4oWaxE3OlyrzacbLi3W', '', 'Sir Aqib Noor', 'Female', 'C.I.T', '1', 'avater.png', '2023-08-08'),
(123, '82673', 'Nazish Naz', 'nazish031@gmail.com', '$2y$10$mSMPF2YeOB86Fxi1v9vDb.RZ6jfx3chOD/aYD6mUNCMKkKYZ3LM3e', '', 'Sir Aqib Noor', 'Female', 'C.I.T', '1', 'avater.png', '2023-08-08'),
(124, '63997', 'Razia habib', 'raziahabib@gmail.com', '$2y$10$X4tsrr/2qlo2aCt1W.l1q.av/KORLI3mnoRBZlMGsFXqFJpc4trY.', '', 'Sir Aqib Noor', 'Female', 'C.I.T', '1', 'avater.png', '2023-08-07'),
(125, '18251', 'Kalimullah Habib', 'kalimullah98@gmail.com', '$2y$10$nyVCWpEcgZFBhF8lN1K65u9KfxyznEm6GhXwecJcYJBsRlsKj/Tyy', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2023-08-07'),
(126, '69288', 'Md saad', 'mdsaad@gmail.com', '$2y$10$VwPVvvGGKQ0T0ABrN/pyEu35raif9AF8aqGUiN9YqTAM861JQ.rYS', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-08-08'),
(127, '87441', 'Abdullah habib', 'abdullah25@gmail.com', '$2y$10$5tw54Ti1/oieAZbaOnEYhOHkiQJAAvA0TEIJQRVQWILRrkpNWWhnK', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-08-07'),
(129, '34306', 'Azain Khan', 'azainkhan52@gmail.com', '$2y$10$Y8Pc7W3yjXtUlH9NaDsFu.ku1FCWfReKFAQ9RXguTdMO0Vp.L5wP.', '', 'Sir Aqib Noor', 'Male', 'MS Office', '0', 'avater.png', '2023-08-24'),
(130, '12353', 'Md ahsan sheikh', 'mdahsan@gmail.com', '$2y$10$p4eCslbMoVz2SBSjUlkzAOOdpQfn6tbQAsVqpaF3dbeYEuCfYclFy', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2023-03-13'),
(131, '14021', 'Syed Ahsan Abbas Zaidi', 'ahsanabbas@gmail.com', '$2y$10$7czNDUe8TbSOVbQVA2tepe/U57UI81OxJgsPxZibA1H/XNExaBcbG', '', 'Sir Aqib Noor', 'Male', 'MS Office', '0', 'avater.png', '2023-08-24'),
(132, '84245', 'Faizan khan', 'faizankhan@gmail.com', '$2y$10$gOti905RPrF7wFP8UiMEA.oGPQ3ZmPuym/2uPOUha7MUN4T9MIEQu', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2023-10-02'),
(133, '95091', 'Md amin', 'mdamin@gmail.com', '$2y$10$L7.ryKXZgBMfUX6mtEJiLOw/Ww0r8RgHo5VOmNpEwVReVvhkc12nm', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '0', 'avater.png', '2023-11-05'),
(134, '36136', 'Murtaza', 'murtaza22546@gmail.com', '$2y$10$1pK5x1dvIX8GUc9LRSn0V.PRPL6MReZdBSmaAltWKzCRjhn.nPgCC', '', 'Sir Aqib Noor', 'Male', 'Web Designing', '1', 'avater.png', '2024-02-06'),
(135, '36161', 'Muhammad sarim', 'Zsarim415@gmail.com', '$2y$10$c4Fy7eQNB7e3z24f.OENoeBotFY0dQ1X8Y7UwCV1IMwFthBc8AIBG', '', 'Sir Aqib Noor', 'Male', 'Web Designing', '1', 'avater.png', '2024-02-06'),
(136, '18574', 'Faraz noor ', 'Faraznoor269@gmail.com', '$2y$10$dvyJCgZjZts2PTqVT3RBquzCgs2mRNpDfRWaL2buoIzL2ip92AmQS', '', 'SIR AREEF KHAN ', 'Male', 'Graphic Design', '0', 'avater.png', '2023-10-16'),
(137, '81415', 'Hassam', 'Hassam@gmail.com', '$2y$10$s6HjqS5zb7EIKWuKM7/i3.foMqdIYnD7MfIVKVxCx92Dw6KHxtFkC', '', 'SIE AREEF KHAN', 'Male', 'Graphic Design', '0', 'avater.png', '2023-10-16'),
(139, '39620', 'AYESHA ', 'ayesha12@gmail.com', '$2y$10$mB0betpM5b3gzLiWt1PdJ.4xWjuvpkKu3dw35Gth6qcULEAjhMKym', '', 'Sir Aqib Noor', 'Female', 'Graphic Design', '0', 'avater.png', '2023-10-16'),
(140, '19642', 'AREEF KHAN ', 'areefk165@gmail.com', '$2y$10$NPV0qUeiLyAwFp9w5a8LoeQNkJfiboVUAUO6S4/sYsYFwt9DTg7YG', '', 'Sir Aqib Noor', 'Male', 'Graphic Design', '1', 'avater.png', '2023-11-15'),
(141, '41187', 'Md ibrahim', 'mdibrahim333@gmail.com', '$2y$10$EikR.1DANygNYkBpoGCm9e7P3endYa/6BUB9asd/Siynw45N4Imuy', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2023-10-31'),
(142, '92051', 'Hareem ali khan ', 'hareemalikhan@gmail.com', '$2y$10$1LRL8klkeFAEDbb9DEdwHeZo3W5bFimOu33jLwo2C.QUBEAfnbaYu', '', 'Sir Aqib Noor', 'Female', 'C.I.T', '0', 'avater.png', '2023-10-30'),
(143, '70360', 'Rimsha khan', 'Mehtabkhan9096@gmailcom', '$2y$10$wuOKe1BFeaElnkEUJEzYm.OyaJDm.bdGtRhQ4U9dneanFPwvRmU.2', '', 'Sir Aqib Noor', 'Female', 'C.I.T', '1', 'avater.png', '2023-06-19'),
(144, '33345', 'Yahya murad', 'yahyamurad@gmailcom', '$2y$10$YyGVh65SuQNyPmaF7u97KOmCwA1S6pU5qvjJOd7R37DxGJiK/s9Zq', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2024-02-13'),
(145, '89888', 'Yahya', 'yahyamurad@gmaiIl.com', '$2y$10$kSguAmA7M/XeZb4Ao/5YceOlAtll.0/hBb/qKNbcOFY8TnpoiSxbO', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2024-02-13'),
(146, '65373', 'Muntaha  abdul khalid', 'muntahakhalid@gmail.com', '$2y$10$IQiFzri6xbrQ44/Da/DmjOwcHIvs6DVO/U4UjcN6HNuZV7Bd.7rmm', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2024-02-13'),
(147, '83405', 'Hammad haider', 'hammad2950@gmail.com', '$2y$10$EHx7eIWpx0BIGL2846HC0ehVtGjzUqMvidDPHnxnozwwiH7MjVE2i', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2024-02-13'),
(148, '38492', 'Abu sufyan ', 'sufyan12@gmail.com', '$2y$10$dBIiqWeeH7mEVutjZKk0U.oxeVWISUrXepI/IuBSHhgKwPf40xn.i', '', 'Sir Aqib Noor', 'Male', 'C.I.T', '1', 'avater.png', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll`
--

CREATE TABLE `student_enroll` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_enroll`
--

INSERT INTO `student_enroll` (`id`, `name`, `email`, `contact_number`, `qualification`, `date`) VALUES
(1, 'aqib noor', 'aqibnoor@gmail.com', 2147483647, 'matric', '17-01-2023'),
(2, 'Shamawoon', 'shamawoon2000@gmail.com', 2147483647, 'ITUS', '25-01-2023'),
(3, 'Shamawoon', 'shamawoon2000@gmail.com', 2147483647, 'ITUS', '25-01-2023'),
(4, 'Shamawoon', 'shamawoon2000@gmail.com', 2147483647, 'ITUS', '25-01-2023'),
(5, 'Alaina', 'alaina@gmail.com', 2147483647, 'Inter', '29-03-2023'),
(6, 'hfvgiugfughi;h', 'fjiozhiodfh;fhbi', 441354343, 'dbjk;h;ksfhrf hi', '11-01-2024'),
(7, 'jasslkdj', '', 123183, 'Inter', '12-01-2024'),
(8, 'aqib noor', 'aqib.noor@trukkr.pk', 2147483647, '12', '17-01-2024'),
(9, 'ghufran', 'aqibnoor723332@gmail.com', 1234567, 'Master in business administration ', '17-01-2024'),
(10, 'Server_1', 'aqibnoor723332@gmail.com', 2147483647, 'Master in business administration ', '20-01-2024'),
(11, 'Bilawal Bhutto seeks PTIâ€™s support, says â€˜noâ€™ to revenge politics', 'samee12@gmail.com', 6, ' c', '30-01-2024');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sir_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `image`, `sir_name`, `description`, `whatsapp`, `facebook`) VALUES
(10, '290807290_WhatsApp Image 2024-01-14 at 8.43.05 AM.jpeg', 'Muhammad Areef Khan', 'Frontend Developer & Graphic Designer & Freelance', 'https://wa.me/message/37ZNRRYIVVM7H1', 'https://www.facebook.com/rashida.shareef.7'),
(11, '156685318_WhatsApp Image 2024-01-14 at 8.39.46 AM.jpeg', 'Aqib Noor ', 'Full Stack Developer', 'https://wa.me/qr/5VAXUQTK5WGYI1', 'https://www.facebook.com/aqib.noor.31586'),
(13, '919622369_WhatsApp Image 2024-01-14 at 8.43.04 AM.jpeg', 'Afifa Babar.', 'English learning teacher', 'https://wa.me/qr/BX7QRHWACUQWE1', 'https://www.facebook.com/profile.php?id=100075729646343'),
(14, '808452907_WhatsApp Image 2024-01-15 at 10.09.08 AM.jpeg', 'SYED HASSAM ALI ', '  graphic designer & Freelance', 'https://wa.me/message/LRTBLY4LXQJAL1', 'https://www.facebook.com/profile.php?id=100088273994604&mibextid=ZbWKwL');

-- --------------------------------------------------------

--
-- Table structure for table `ui`
--

CREATE TABLE `ui` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ui`
--

INSERT INTO `ui` (`id`, `type`, `image`, `title`, `description`) VALUES
(9, 'courseCurrent', '628964729_514902afbf2b4eff682fece8fb913d5a.jpg', 'Graphic Designing', 'No design works unless it embodies ideas held common by the people for whom the object is intended.â€ â€“ Adrian Forty. ...'),
(10, 'courseCurrent', '982296586_WhatsApp Image 2024-01-29 at 5.21.23 AM.jpeg', 'CIT (Computer Information Technology)', 'A program that prepares students for careers in information technology fields, such as computer systems and networking.'),
(11, 'courseCurrent', '829867009_WhatsApp Image 2024-01-29 at 5.29.58 AM.jpeg', 'DIT (Diploma Information Technology)', 'introduces students to computer concepts, hardware components, and basic computer operations. The course also teaches students how to use software applications to solve problems. '),
(12, 'courseCurrent', '665285332_WhatsApp Image 2024-01-29 at 5.23.14 AM.jpeg', 'MS OFFICE', 'This course covers Basic to Advanced topics of MS Word, MS Excel, MS. PowerPoint '),
(13, 'courseCurrent', '474334077_WhatsApp Image 2024-01-29 at 5.19.46 AM.jpeg', 'Web Designing', 'Web designers create the layout and design of a website or web pages. Web design is a type of visual design that involves developing and styling a separate object'),
(14, 'courseCurrent', '656081527_89593edd7c36fa187870af95da8094fa.jpg', 'Programing Language', 'Some examples of back-end programming languages include: JavaScript. PHP. Java. Python. Ruby. C#'),
(15, 'courseCurrent', '948745574_WhatsApp Image 2024-01-29 at 5.25.39 AM.jpeg', 'Amazon ', 'You can also visit the Amazon Customer Service site to find answers to common problems, use online chat, or request a phone call from the customer service chat'),
(16, 'courseCurrent', '512779601_WhatsApp Image 2024-01-29 at 5.25.20 AM.jpeg', 'Daraz', 'Daraz is a leading e-commerce marketplace in South Asia, excluding India. It covers four key areas: e-commerce, logistics, payment infrastructure, and financial services. '),
(17, 'courseCurrent', '418802487_eng.jpg', 'English Learning', 'Listen: Practice active listening');

-- --------------------------------------------------------

--
-- Table structure for table `uiheading`
--

CREATE TABLE `uiheading` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui`
--
ALTER TABLE `ui`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uiheading`
--
ALTER TABLE `uiheading`
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
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `student_enroll`
--
ALTER TABLE `student_enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ui`
--
ALTER TABLE `ui`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uiheading`
--
ALTER TABLE `uiheading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
