-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 03:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulsuepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` varchar(25) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(187, 'Ricardo ', '2018-01-04 21:53:06', 'Add User Ricardo.'),
(188, 'Cris ', '2018-01-04 23:14:31', 'Add User Cris.'),
(189, 'Cris ', '2018-01-04 23:14:54', 'Add User Cris.'),
(190, 'Ricardo ', '2018-01-05 00:53:28', 'Add User Ricardo.'),
(191, 'Ricardo ', '2018-01-05 00:54:25', 'Add User Ricardo.'),
(192, 'Ricardo ', '2018-01-06 08:34:22', 'Add User Ricardo.'),
(193, 'Ricardo ', '2018-01-06 08:35:39', 'Add User Ricardo.'),
(194, 'Ricardo ', '2018-01-06 08:35:53', 'Add User Ricardo.'),
(195, 'Ricardo ', '2018-01-06 08:38:36', 'Add User Ricardo.'),
(196, 'Ricardo ', '2018-01-06 08:44:35', 'Add User Ricardo.'),
(197, 'Ricardo ', '2018-01-06 08:53:42', 'Add User Ricardo.'),
(198, 'Ricardo ', '2018-01-06 09:08:18', 'Add User Ricardo.'),
(199, 'Cris ', '2018-01-06 10:43:55', 'Add User Cris.'),
(200, 'Cris ', '2018-01-06 10:48:24', 'Add User Cris.'),
(201, 'Cris ', '2018-01-06 10:51:49', 'Add User Cris.'),
(202, 'Cris ', '2018-01-06 10:53:11', 'Add User Cris.'),
(203, 'Cris ', '2018-01-06 10:53:24', 'Add User Cris.'),
(204, 'Cris ', '2018-01-06 16:40:50', 'Add User Cris.'),
(205, 'Cris ', '2018-01-06 16:42:23', 'Add User Cris.'),
(206, 'Cris ', '2018-01-06 16:42:53', 'Add User Cris.'),
(207, 'Cris ', '2018-01-06 16:43:03', 'Add User Cris.'),
(208, 'Cris ', '2018-01-06 17:12:20', 'Add User Cris.'),
(209, 'Cris ', '2018-01-06 17:42:52', 'Add User Cris.'),
(210, 'Cris ', '2018-01-06 17:44:49', 'Add User Cris.'),
(211, 'Cris ', '2018-01-06 17:55:52', 'Add User Cris.'),
(212, 'Ricardo ', '2018-01-07 01:26:19', 'Add User Ricardo.'),
(213, 'Cris ', '2018-01-07 01:37:23', 'Add User Cris.'),
(214, 'Mabuhay.Pilipinas', '2018-01-07 11:16:21', 'Newly registered user Mabuhay Pilipinas'),
(215, 'Isda.Mapula', '2018-01-07 11:18:53', 'Newly registered user Isda Mapula'),
(216, 'Rommel.Pabustan', '2018-01-07 11:21:38', 'Add User Isa.Kapal'),
(217, 'Rommel.Pabustan', '2018-01-07 11:24:08', 'Add User das.asd'),
(218, 'Peke.Tama', '2018-01-07 13:05:44', 'Newly registered user Peke Tama'),
(219, 'as.sa', '2018-01-07 13:12:15', 'Newly registered user as sa'),
(220, 'Rommel.Pabustan', '2018-01-07 14:05:55', 'Add User Bulsu.Malolos'),
(221, 'Tasa.Moto', '2018-01-07 15:05:31', 'Newly registered user Tasa Moto'),
(222, 'Ricardo ', '2018-01-07 19:46:27', 'Add User Ricardo.'),
(223, 'Ricardo ', '2018-01-07 19:46:40', 'Add User Ricardo.'),
(224, 'Ricardo ', '2018-01-07 19:46:54', 'Add User Ricardo.'),
(225, 'Ricardo ', '2018-01-07 20:50:53', 'Update item details C810B Canon 810 Black Mar 1 MA'),
(226, 'Ricardo ', '2018-01-07 20:50:55', 'Update item details C810B Canon 810 Black Mar 1 MA'),
(227, 'Ricardo ', '2018-01-07 20:51:09', 'Update item details C810B Canon 810 Black Mar 1 MA'),
(228, 'Ricardo ', '2018-01-07 20:53:20', 'Update item details C810B Canon 810 Black Mar 1 MA'),
(229, 'Ricardo ', '2018-01-07 20:53:26', 'Update item details C810B Canon 810 Black Mar 10 M'),
(230, 'Ricardo ', '2018-01-07 20:53:38', 'Update item details C810B Canon 810 Black Aug 10 M'),
(231, 'Ricardo ', '2018-01-07 20:54:10', 'Update item details C810B Canon 810 Black Jan 100 '),
(232, 'Ricardo ', '2018-01-07 20:54:42', 'Update item details C810B Canon 810 Black Jan 100 '),
(233, 'Ricardo ', '2018-01-07 20:54:54', 'Update item details GT1900 Gestetner Toner, 1900 A'),
(234, 'Ricardo ', '2018-01-07 21:04:36', 'Update item details   Jan 100 MACHINERY'),
(235, 'Ricardo ', '2018-01-07 21:04:50', 'Update item details   Jan 10 ACCOUNTABLE'),
(236, 'Ricardo ', '2018-01-07 21:05:13', 'Update item details   Aug 100 ACCOUNTABLE'),
(237, 'Ricardo ', '2018-01-07 21:06:57', 'Update item details   Jan 100 OTHER'),
(238, 'Ricardo ', '2018-01-07 21:07:29', 'Update item details   Jan 100 OTHER'),
(239, 'Ricardo ', '2018-01-07 21:08:10', 'Update item details   Jan 100 OTHER'),
(240, 'Ricardo ', '2018-01-07 21:09:17', 'Update item details   Jan 100 OTHER'),
(241, 'Ricardo ', '2018-01-07 21:09:34', 'Update item details   Mar 10 LAND'),
(242, 'Ricardo ', '2018-01-07 21:10:08', 'Update item details   Feb 100 LAND'),
(243, 'Ricardo ', '2018-01-07 21:10:19', 'Update item details   Feb 100 LAND'),
(244, 'Ricardo ', '2018-01-07 21:11:02', 'Update item details   Aug 10 OTHER'),
(245, 'Ricardo ', '2018-01-07 21:16:51', 'Update item details   Feb 10 LAND'),
(246, 'Ricardo.Enriquez', '2018-01-07 21:18:05', 'Deleted  user Ricardo.Enriquez'),
(247, 'Ricardo.Enriquez', '2018-01-07 21:18:06', 'Deleted  user Ricardo.Enriquez'),
(248, 'Ricardo.Enriquez', '2018-01-07 21:18:07', 'Deleted  user Ricardo.Enriquez'),
(249, 'Ricardo.Enriquez', '2018-01-07 21:18:08', 'Deleted  user Ricardo.Enriquez'),
(250, 'Ricardo.Enriquez', '2018-01-07 21:18:09', 'Deleted  user Ricardo.Enriquez'),
(251, 'Ricardo.Enriquez', '2018-01-07 21:18:12', 'Deleted  user Ricardo.Enriquez'),
(252, 'Ricardo.Enriquez', '2018-01-07 21:21:54', 'Deleted  user Ricardo.Enriquez'),
(253, 'Ricardo.Enriquez', '2018-01-07 21:21:56', 'Deleted  user Ricardo.Enriquez'),
(254, 'Ricardo.Enriquez', '2018-01-07 21:21:57', 'Deleted  user Ricardo.Enriquez'),
(255, 'Ricardo.Enriquez', '2018-01-07 21:22:05', 'Deleted  user Ricardo.Enriquez'),
(256, 'Ricardo.Enriquez', '2018-01-07 21:22:43', 'Deleted  user Ricardo.Enriquez'),
(257, 'Ricardo.Enriquez', '2018-01-07 21:24:05', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(258, 'Ricardo.Enriquez', '2018-01-07 21:24:25', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(259, 'Ricardo.Enriquez', '2018-01-07 21:24:26', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(260, 'Ricardo.Enriquez', '2018-01-07 21:24:27', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(261, 'Ricardo.Enriquez', '2018-01-07 21:24:29', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(262, 'Ricardo.Enriquez', '2018-01-07 21:26:45', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(263, 'Ricardo.Enriquez', '2018-01-07 21:26:47', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(264, 'Ricardo ', '2018-01-07 21:27:17', 'Update item details   Feb 10 LAND'),
(265, 'Ricardo ', '2018-01-07 21:27:23', 'Update item details   May 10 LAND'),
(266, 'Ricardo ', '2018-01-07 21:27:36', 'Update item details   May 10 LAND'),
(267, 'Ricardo ', '2018-01-07 21:28:45', 'Update item details   May 10 LAND'),
(268, 'Ricardo ', '2018-01-07 21:28:52', 'Update item details   May 10 LAND'),
(269, 'Ricardo ', '2018-01-07 21:30:21', 'Update item details   May 10 LAND'),
(270, 'Ricardo ', '2018-01-07 21:30:27', 'Update item details   May 100 LAND'),
(271, 'Ricardo ', '2018-01-07 21:30:39', 'Update item details   May 10 OTHER'),
(272, 'Ricardo.Enriquez', '2018-01-07 21:35:47', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(273, 'Ricardo.Enriquez', '2018-01-07 21:35:56', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(274, 'Ricardo.Enriquez', '2018-01-07 21:37:50', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(275, 'Ricardo.Enriquez', '2018-01-07 21:38:42', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(276, 'Ricardo.Enriquez', '2018-01-07 21:39:12', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(277, 'Ricardo.Enriquez', '2018-01-07 21:40:02', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(278, 'Ricardo.Enriquez', '2018-01-07 21:40:03', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(279, 'Ricardo.Enriquez', '2018-01-07 21:40:03', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(280, 'Ricardo.Enriquez', '2018-01-07 21:40:03', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(281, 'Ricardo.Enriquez', '2018-01-07 21:40:03', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(282, 'Ricardo.Enriquez', '2018-01-07 21:40:03', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(283, 'Ricardo.Enriquez', '2018-01-07 21:40:04', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(284, 'Ricardo.Enriquez', '2018-01-07 21:40:04', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(285, 'Ricardo.Enriquez', '2018-01-07 21:40:04', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(286, 'Ricardo ', '2018-01-07 21:41:08', 'Add User Ricardo.'),
(287, 'Ricardo ', '2018-01-07 21:41:16', 'Update item details   Nov 10 MACHINERY'),
(288, 'Ricardo.Enriquez', '2018-01-07 21:41:20', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(289, 'Ricardo ', '2018-01-07 21:41:29', 'Update item details   Aug 1 BUILDING'),
(290, 'Ricardo ', '2018-01-07 21:41:48', 'Add User Ricardo.'),
(291, 'Ricardo.Enriquez', '2018-01-07 21:48:55', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(292, 'Ricardo.Enriquez', '2018-01-07 21:49:01', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(293, 'Ricardo.Enriquez', '2018-01-07 21:49:02', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(294, 'Ricardo.Enriquez', '2018-01-07 21:49:03', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(295, 'Ricardo.Enriquez', '2018-01-07 21:49:04', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(296, 'Ricardo.Enriquez', '2018-01-07 21:49:05', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(297, 'Ricardo.Enriquez', '2018-01-07 21:49:07', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(298, 'Ricardo.Enriquez', '2018-01-07 21:49:09', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(299, 'Ricardo ', '2018-01-07 21:49:26', 'Add User Ricardo.'),
(300, 'Ricardo ', '2018-01-07 22:57:59', 'Update item details   Dec 1 MACHINERY'),
(301, 'Ricardo ', '2018-01-07 23:00:14', 'Add User Ricardo.'),
(302, 'Ricardo ', '2018-01-07 23:20:43', 'Add User Ricardo.'),
(303, 'Ricardo ', '2018-01-07 23:21:50', 'Add User Ricardo.'),
(304, 'Ricardo ', '2018-01-07 23:29:20', 'Add User Ricardo.'),
(305, 'Ricardo ', '2018-01-08 09:06:48', 'Add User Ricardo.'),
(306, 'Ricardo ', '2018-01-08 09:09:46', 'Add User Ricardo.'),
(307, 'Ricardo ', '2018-01-08 09:12:21', 'Add User Ricardo.'),
(308, 'Ricardo ', '2018-01-09 16:21:34', 'Add User Ricardo.'),
(309, 'Ricardo ', '2018-01-11 21:20:57', 'Add User Ricardo.'),
(310, 'Ricardo ', '2018-01-11 21:25:38', 'Update item details   Jun 15 ACCOUNTABLE'),
(311, 'Ricardo ', '2018-01-11 21:25:49', 'Update item details   Jun 1 ACCOUNTABLE'),
(312, 'Ricardo ', '2018-01-11 21:26:13', 'Add User Ricardo.'),
(313, 'Ricardo ', '2018-01-11 21:27:18', 'Update item details   Oct 10 MACHINERY'),
(314, 'Ricardo ', '2018-01-11 21:27:28', 'Update item details   Oct 1 MACHINERY'),
(315, 'Ricardo ', '2018-01-11 22:01:53', 'Update item details   Oct 1 MACHINERY'),
(316, 'Rommel ', '2018-01-11 23:30:43', 'Update item details   Jun 1 ACCOUNTABLE'),
(317, 'Rommel.Pabustan', '2018-01-11 23:45:12', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(318, 'Ricardo ', '2018-01-13 15:09:03', 'Add User Ricardo.'),
(319, 'Cris ', '2018-01-13 15:10:15', 'Add User Cris.'),
(320, 'Rommel ', '2018-01-13 17:16:36', 'Update item details   Jun 1 ACCOUNTABLE'),
(321, 'Rommel ', '2018-01-13 23:46:24', 'Update item details   Jul 1 MAINTENANCE'),
(322, 'Rommel ', '2018-01-13 23:48:49', 'Update item details   Jul 1 MAINTENANCE'),
(323, 'Rommel ', '2018-01-13 23:52:52', 'Update item details   Jun 1 ACCOUNTABLE'),
(324, 'Rommel ', '2018-01-13 23:52:57', 'Update item details   Jun 1 ACCOUNTABLE'),
(325, 'Rommel ', '2018-01-13 23:52:59', 'Update item details   Jun 1 ACCOUNTABLE'),
(326, 'Rommel ', '2018-01-13 23:52:59', 'Update item details   Jun 1 ACCOUNTABLE'),
(327, 'Rommel ', '2018-01-13 23:53:00', 'Update item details   Jun 1 ACCOUNTABLE'),
(328, 'Rommel ', '2018-01-13 23:53:01', 'Update item details   Jun 1 ACCOUNTABLE'),
(329, 'Rommel ', '2018-01-13 23:53:44', 'Update item details   Jun 1 ACCOUNTABLE'),
(330, 'Rommel ', '2018-01-13 23:53:46', 'Update item details   Jun 1 ACCOUNTABLE'),
(331, 'Rommel ', '2018-01-13 23:54:08', 'Update item details   Jun 1 ACCOUNTABLE'),
(332, 'Rommel ', '2018-01-13 23:54:10', 'Update item details   Jun 1 ACCOUNTABLE'),
(333, 'Rommel ', '2018-01-13 23:54:40', 'Update item details   Jun 1 ACCOUNTABLE'),
(334, 'Rommel ', '2018-01-13 23:54:41', 'Update item details   Jun 1 ACCOUNTABLE'),
(335, 'Rommel ', '2018-01-13 23:54:42', 'Update item details   Jun 1 ACCOUNTABLE'),
(336, 'Rommel ', '2018-01-13 23:54:53', 'Update item details   Jun 1 ACCOUNTABLE'),
(337, 'Rommel ', '2018-01-13 23:54:54', 'Update item details   Jun 1 ACCOUNTABLE'),
(338, 'Rommel ', '2018-01-13 23:54:55', 'Update item details   Jun 1 ACCOUNTABLE'),
(339, 'Rommel ', '2018-01-13 23:54:56', 'Update item details   Jun 1 ACCOUNTABLE'),
(340, 'Rommel ', '2018-01-13 23:54:56', 'Update item details   Jun 1 ACCOUNTABLE'),
(341, 'Rommel ', '2018-01-13 23:54:57', 'Update item details   Jun 1 ACCOUNTABLE'),
(342, 'Rommel ', '2018-01-13 23:55:19', 'Update item details   Jul 1 MAINTENANCE'),
(343, 'Rommel ', '2018-01-13 23:55:40', 'Update item details   Jun 1 ACCOUNTABLE'),
(344, 'Rommel ', '2018-01-13 23:55:48', 'Update item details   Jul 1 MAINTENANCE'),
(345, 'Rommel ', '2018-01-13 23:56:28', 'Update item details   Jul 1 MAINTENANCE'),
(346, 'Rommel.Pabustan', '2018-01-13 23:56:38', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(347, 'Rommel.Pabustan', '2018-01-13 23:58:12', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(348, 'Rommel.Pabustan', '2018-01-13 23:58:21', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(349, 'Ricardo.Enriquez', '2018-01-14 00:02:56', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(350, 'po.op', '2018-01-14 00:41:15', 'Newly registered user po op'),
(351, 'Ricardo ', '2018-01-14 01:18:52', 'Add User Ricardo.'),
(352, 'Ricardo ', '2018-01-14 01:21:56', 'Update item details   Nov 1 BUILDING'),
(353, 'Ricardo ', '2018-01-14 11:19:09', 'Add User Ricardo.'),
(354, 'Ricardo ', '2018-01-14 11:19:16', 'Add User Ricardo.'),
(355, 'Rommel ', '2018-01-14 12:58:50', 'Update item details   Aug 10 OTHER'),
(356, 'Ricardo ', '2018-01-14 13:56:14', 'Add User Ricardo.'),
(357, 'Cris ', '2018-01-15 22:36:34', 'Add User Cris.'),
(358, 'Cris ', '2018-01-15 22:57:01', 'Add User Cris.'),
(359, 'Cris ', '2018-01-15 22:58:28', 'Add User Cris.'),
(360, 'Cris ', '2018-01-15 23:38:13', 'Add User Cris.'),
(361, 'Cris ', '2018-01-18 22:13:35', 'Add User Cris.'),
(362, 'Cris ', '2018-01-18 22:30:14', 'Add User Cris.'),
(363, 'Cris.Busan', '2018-01-18 22:30:42', 'Deleted item id Cris.Busan in PPMP Cart lists'),
(364, 'Cris ', '2018-01-18 22:31:09', 'Add User Cris.'),
(365, 'Cris ', '2018-01-18 22:42:50', 'Add User Cris.'),
(366, 'Cris.Busan', '2018-01-18 22:48:22', 'Deleted item id Cris.Busan in PPMP Cart lists'),
(367, 'Cris ', '2018-01-18 23:23:10', 'Add User Cris.'),
(368, 'Ricardo ', '2018-01-22 21:02:49', 'Add User Ricardo.'),
(369, 'Ricardo ', '2018-01-22 21:13:18', 'Add User Ricardo.'),
(370, 'Ricardo ', '2018-01-22 21:21:55', 'Add User Ricardo.'),
(371, ' ', '2018-01-22 21:52:18', 'Add User .'),
(372, 'Cris ', '2018-01-22 21:53:29', 'Add User Cris.'),
(373, 'Cris ', '2018-01-22 21:54:55', 'Add User Cris.'),
(374, 'Ricardo ', '2018-01-22 21:59:38', 'Add User Ricardo.'),
(375, 'Ricardo ', '2018-01-22 22:03:30', 'Add User Ricardo.'),
(376, 'Ricardo ', '2018-01-22 22:05:13', 'Add User Ricardo.'),
(377, 'Ricardo ', '2018-01-22 22:11:09', 'Add User Ricardo.'),
(378, 'Ricardo.Enriquez', '2018-01-22 22:31:26', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(379, 'Ricardo ', '2018-01-23 21:57:20', 'Add User Ricardo.'),
(380, 'Ricardo.Enriquez', '2018-01-23 21:57:30', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(381, 'Ricardo ', '2018-01-23 21:57:43', 'Add User Ricardo.'),
(382, 'Ricardo ', '2018-01-23 22:12:06', 'Add User Ricardo.'),
(383, 'Ricardo ', '2018-01-23 22:42:21', 'Update item details  '),
(384, 'Ricardo ', '2018-01-23 22:42:47', 'Update item details  '),
(385, 'Ricardo ', '2018-01-23 22:46:13', 'Update item details  '),
(386, 'Ricardo ', '2018-01-23 22:46:33', 'Update item details  '),
(387, 'Ricardo.Enriquez', '2018-01-23 22:46:44', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(388, 'Ricardo ', '2018-01-23 22:46:52', 'Update item details  '),
(389, 'Ricardo ', '2018-01-23 23:12:50', 'Add User Ricardo.'),
(390, 'Ricardo ', '2018-01-23 23:38:38', 'Add User Ricardo.'),
(391, 'Ricardo.Enriquez', '2018-01-24 00:30:32', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(392, 'Ricardo.Enriquez', '2018-01-24 00:30:36', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(393, 'Ricardo ', '2018-01-24 00:32:01', 'Add User Ricardo.'),
(394, 'Ricardo ', '2018-01-24 00:32:09', 'Add User Ricardo.'),
(395, 'Ricardo ', '2018-01-24 00:34:28', 'Update item details  '),
(396, 'Cris.Busan', '2018-01-24 01:15:34', 'Deleted item id Cris.Busan in PPMP Cart lists'),
(397, 'Cris.Busan', '2018-01-24 01:15:35', 'Deleted item id Cris.Busan in PPMP Cart lists'),
(398, 'Cris ', '2018-01-25 21:51:44', 'Add User Cris.'),
(399, 'Cris ', '2018-01-25 21:52:04', 'Update item details  '),
(400, 'Cris ', '2018-01-25 21:52:24', 'Update item details  '),
(401, 'Cris ', '2018-01-25 21:55:18', 'Add User Cris.'),
(402, 'Rommel ', '2018-01-25 22:08:29', 'Update item details  '),
(403, 'Rommel ', '2018-01-25 22:08:38', 'Update item details  '),
(404, 'Rommel ', '2018-01-25 22:08:49', 'Update item details  '),
(405, 'Rommel ', '2018-01-25 22:14:23', 'Update item details  '),
(406, 'Rommel.Pabustan', '2018-01-25 22:14:36', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(407, 'Cris ', '2018-01-25 22:15:10', 'Add User Cris.'),
(408, 'Cris ', '2018-01-25 22:15:23', 'Update item details  '),
(409, 'Rommel ', '2018-01-25 22:15:42', 'Update item details  '),
(410, 'Cris ', '2018-01-25 22:17:09', 'Add User Cris.'),
(411, 'Cris ', '2018-01-25 22:17:28', 'Add User Cris.'),
(412, 'Cris ', '2018-01-25 22:17:37', 'Update item details  '),
(413, 'Cris ', '2018-01-25 22:17:46', 'Update item details  '),
(414, 'Cris ', '2018-01-25 22:17:52', 'Update item details  '),
(415, 'Cris ', '2018-01-25 22:17:58', 'Update item details  '),
(416, 'Cris ', '2018-01-25 22:18:15', 'Update item details  '),
(417, 'Cris ', '2018-01-25 22:18:42', 'Update item details  '),
(418, 'Cris Busan', '2018-01-25 22:20:11', 'Update item details  '),
(419, 'Cris Busan', '2018-01-25 22:21:02', 'Update item details GT1900 Gestetner Toner, 1900'),
(420, 'Cris Busan', '2018-01-25 22:21:10', 'Update item details GT1900 Gestetner Toner, 1900'),
(421, 'Cris Busan', '2018-01-25 22:21:39', 'Update item details GT1900 Gestetner Toner, 1900'),
(422, 'Cris ', '2018-01-25 22:21:48', 'Update item details  '),
(423, 'Cris ', '2018-01-25 22:21:59', 'Update item details  '),
(424, 'Cris ', '2018-01-25 22:22:24', 'Update item details  '),
(425, 'Cris.Busan', '2018-01-25 22:24:05', 'Update item details BPBlk Ballpen (Black)'),
(426, 'Cris.Busan', '2018-01-25 22:25:42', 'Update item details GT1900 Gestetner Toner, 1900'),
(427, 'Cris.Busan', '2018-01-25 22:25:49', 'Update item details GT1900 Gestetner Toner, 1900'),
(428, 'Rommel ', '2018-01-25 22:26:05', 'Update item details  '),
(429, 'Rommel ', '2018-01-25 22:26:12', 'Update item details  '),
(430, 'Rommel Pabustan', '2018-01-25 22:26:38', 'Update item details  '),
(431, 'Rommel Pabustan', '2018-01-25 22:26:58', 'Update item details GT1900 Gestetner Toner, 1900'),
(432, 'Rommel Pabustan', '2018-01-25 22:27:03', 'Update item details BPBlk Ballpen (Black)'),
(433, 'Rommel Pabustan', '2018-01-25 22:29:23', 'Update item details GT1900 Gestetner Toner, 1900 B'),
(434, 'Cris ', '2018-01-25 22:30:18', 'Add User Cris.'),
(435, 'Cris Busan', '2018-01-25 22:30:26', 'Update item details BPR Ballpen (Red)'),
(436, 'Cris Busan', '2018-01-25 22:30:31', 'Update item details BPR Ballpen (Red)'),
(437, 'Cris.Busan', '2018-01-25 22:30:43', 'Update item details BPBlk Ballpen (Black)'),
(438, 'Rommel Pabustan', '2018-01-25 22:36:46', 'Update item details GT1900 Gestetner Toner, 1900 B'),
(439, 'asdf.asdf', '2018-01-27 07:29:01', 'Newly registered user asdf asdf'),
(440, 'rr.ew', '2018-01-27 07:29:39', 'Newly registered user rr ew'),
(441, 'Rommel.Pabustan', '2018-01-28 08:48:01', 'Deleted  user rr.ew'),
(442, 'Rommel.Pabustan', '2018-01-28 08:48:01', 'Deleted  user asdf.asdf'),
(443, 'Ricardo ', '2018-01-28 09:50:48', 'Add User Ricardo.'),
(444, 'Ricardo.Enriquez', '2018-01-28 09:51:35', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(445, 'Ricardo ', '2018-01-28 09:51:48', 'Add User Ricardo.'),
(446, 'Ricardo ', '2018-01-28 09:51:59', 'Add User Ricardo.'),
(447, 'Ricardo.Enriquez', '2018-01-28 09:52:37', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(448, 'Ricardo Enriquez', '2018-01-28 09:53:26', 'Update item details BPBlk Ballpen (Black)'),
(449, 'Ricardo Enriquez', '2018-01-28 10:01:05', 'Update item details BPBlk Ballpen (Black)'),
(450, 'Ricardo.Enriquez', '2018-01-28 10:01:46', 'Update item details BPBlk Ballpen (Black)'),
(451, 'Ricardo.Enriquez', '2018-01-28 10:05:22', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(452, 'Rommel.Pabustan', '2018-01-28 11:01:52', 'Add User EPS110.Epson110'),
(453, 'Ricardo ', '2018-02-25 16:42:23', 'Add User Ricardo.'),
(454, 'Ricardo ', '2018-02-25 16:47:33', 'Add User Ricardo.'),
(455, 'Ricardo Enriquez', '2018-02-25 17:17:56', 'Update item details  Ballpen (Black)'),
(456, 'Ricardo Enriquez', '2018-02-25 17:22:13', 'Update item details  Ballpen (Black)'),
(457, 'Ricardo Enriquez', '2018-02-25 17:22:23', 'Update item details  Ballpen (Black)'),
(458, 'Ricardo Enriquez', '2018-02-25 17:22:35', 'Update item details  Ballpen (Black)'),
(459, 'Ricardo Enriquez', '2018-02-25 17:25:02', 'Update item details  Ballpen (Black)'),
(460, 'Ricardo Enriquez', '2018-02-25 17:25:11', 'Update item details  Ballpen (Black)'),
(461, 'Ricardo Enriquez', '2018-02-25 17:25:43', 'Update item details  Gestetner Toner, 1900'),
(462, 'Ricardo Enriquez', '2018-02-25 17:25:53', 'Update item details  Gestetner Toner, 1900'),
(463, 'Ricardo Enriquez', '2018-02-25 17:39:28', 'Update item details  Ballpen (Black)'),
(464, 'Ricardo Enriquez', '2018-02-25 17:39:41', 'Update item details  Ballpen (Black)'),
(465, 'Ricardo Enriquez', '2018-02-25 17:39:51', 'Update item details  Ballpen (Black)'),
(466, 'Ricardo Enriquez', '2018-02-25 17:40:18', 'Update item details  Gestetner Toner, 1900'),
(467, 'Ricardo Enriquez', '2018-02-25 17:40:26', 'Update item details  Gestetner Toner, 1900'),
(468, 'Ricardo Enriquez', '2018-02-25 17:40:35', 'Update item details  Gestetner Toner, 1900'),
(469, 'Ricardo.Enriquez', '2018-02-25 17:47:51', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(470, 'Ricardo.Enriquez', '2018-02-25 17:47:53', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(471, 'Ricardo ', '2018-02-25 17:53:32', 'Add User Ricardo.'),
(472, 'Ricardo ', '2018-02-25 18:01:11', 'Add User Ricardo.'),
(473, 'Ricardo ', '2018-02-25 18:01:36', 'Add User Ricardo.'),
(474, 'Ricardo Enriquez', '2018-02-25 18:02:52', 'Update item details  Canon 810 Black'),
(475, 'Rommel.Pabustan', '2018-02-25 19:01:32', 'Add User Admin.Admin'),
(476, 'Rommel.Pabustan', '2018-02-26 22:18:42', 'Add User .rere'),
(477, 'Rommel.Pabustan', '2018-02-26 22:20:36', 'Add User .rere'),
(478, 'Rommel.Pabustan', '2018-02-26 22:20:58', 'Add User rere'),
(479, 'Rommel.Pabustan', '2018-02-26 22:21:01', 'Add User rere'),
(480, 'Rommel.Pabustan', '2018-02-26 22:21:09', 'Deleted  user '),
(481, 'Rommel.Pabustan', '2018-02-26 22:21:40', 'Add User Epson110'),
(482, 'Rommel.Pabustan', '2018-02-26 22:22:03', 'Add User Epson110'),
(483, 'Rommel.Pabustan', '2018-02-26 22:22:07', 'Add User Epson110'),
(484, 'Rommel.Pabustan', '2018-02-26 22:22:15', 'Add User Epson110'),
(485, 'Rommel.Pabustan', '2018-02-26 22:27:12', 'Update item Epson110'),
(486, 'Ricardo ', '2018-03-06 14:50:10', 'Add User Ricardo.'),
(487, 'Ricardo Enriquez', '2018-03-06 14:52:46', 'Update item details  Canon 810 Black'),
(488, 'Ricardo Enriquez', '2018-03-06 15:08:24', 'Update item details  Canon 810 Black'),
(489, 'Juan.Dela Cruz', '2018-03-08 23:10:30', 'Newly registered user Juan Dela Cruz'),
(490, 'Ricardo ', '2018-03-10 21:54:24', 'Add User Ricardo.'),
(491, 'Ricardo ', '2018-03-10 21:55:08', 'Add User Ricardo.'),
(492, 'Ricardo Enriquez', '2018-03-10 21:55:23', 'Update item details  Ballpen (Blue)'),
(493, 'Ricardo ', '2018-03-10 22:03:42', 'Add User Ricardo.'),
(494, 'Ricardo Enriquez', '2018-03-10 22:22:09', 'Update item details  Canon 811 Tri-Color'),
(495, 'Ricardo Enriquez', '2018-03-10 22:22:17', 'Update item details  Canon 811 Tri-Color'),
(496, 'Ricardo Enriquez', '2018-03-10 22:26:54', 'Update item details  Canon 811 Tri-Color'),
(497, 'Ricardo Enriquez', '2018-03-10 22:27:54', 'Update item details  Canon 811 Tri-Color'),
(498, 'Ricardo Enriquez', '2018-03-10 22:28:16', 'Update item details  Canon 811 Tri-Color'),
(499, 'Ricardo Enriquez', '2018-03-10 22:37:22', 'Update item details  Canon 811 Tri-Color'),
(500, 'Ricardo Enriquez', '2018-03-10 22:37:37', 'Update item details  Canon 811 Tri-Color'),
(501, 'Ricardo.Enriquez', '2018-03-10 22:39:47', 'Deleted item id Ricardo.Enriquez in PPMP Cart list'),
(502, 'Admin Admin', '2018-03-10 23:03:13', 'Update item details  Ballpen (Blue)'),
(503, 'Admin Admin', '2018-03-10 23:03:56', 'Update item details  Canon 811 Tri-Color'),
(504, 'Admin Admin', '2018-03-10 23:45:08', 'Update item details  Canon 811 Tri-Color'),
(505, 'Ricardo ', '2018-03-11 00:06:49', 'Add User Ricardo.'),
(506, 'Cris ', '2018-03-11 01:19:38', 'Add User Cris.'),
(507, 'Cris ', '2018-03-11 01:19:53', 'Add User Cris.'),
(508, 'Juan ', '2018-03-11 13:13:03', 'Add User Juan.'),
(509, 'Juan ', '2018-03-11 13:13:25', 'Add User Juan.'),
(510, 'Juan ', '2018-03-11 13:13:58', 'Add User Juan.'),
(511, 'Ricardo.Enriquez', '2018-03-11 21:59:34', 'Newly registered user Ricardo Enriquez'),
(512, 'Ricardo.Enriquez', '2018-03-11 22:00:55', 'Newly registered user Ricardo Enriquez'),
(513, 'Ricardo.Enriquez', '2018-03-11 22:01:39', 'Newly registered user Ricardo Enriquez'),
(514, 'Ricardo.Enriquez', '2018-03-11 22:03:30', 'Newly registered user Ricardo Enriquez'),
(515, 'Ricardo.Enriquez', '2018-03-11 22:05:37', 'Newly registered user Ricardo Enriquez'),
(516, 'Ricardo.Enriquez', '2018-03-11 22:07:30', 'Newly registered user Ricardo Enriquez'),
(517, 'Alden.Aldub', '2018-03-11 22:08:42', 'Newly registered user Alden Aldub'),
(518, 'Ricardo.Suarez', '2018-03-11 22:14:53', 'Newly registered user Ricardo Suarez'),
(519, 'Rommel.Pabustan', '2018-03-12 00:14:52', 'Add User .'),
(520, 'Ricardo Enriquez', '2018-03-18 15:56:23', 'Update item details  Canon 811 Tri-Color'),
(521, 'Ricardo Enriquez', '2018-03-18 15:56:54', 'Update item details  Canon 811 Tri-Color'),
(522, 'Ricardo Enriquez', '2018-03-18 15:57:01', 'Update item details  Canon 811 Tri-Color'),
(523, 'Ricardo ', '2018-03-23 16:34:35', 'Add User Ricardo.'),
(524, 'Ricardo ', '2018-03-23 16:38:07', 'Add User Ricardo.'),
(525, 'Rommel.Pabustan', '2018-03-25 12:48:05', 'Add User asa'),
(526, 'Rommel.Pabustan', '2018-03-25 12:49:20', 'Add User asa'),
(527, 'Rommel.Pabustan', '2018-03-25 12:50:07', 'Add User ito na'),
(528, 'Rommel.Pabustan', '2018-03-25 12:52:28', 'Deleted  user '),
(529, 'Rommel.Pabustan', '2018-03-25 12:52:45', 'Deleted  user '),
(530, 'Rommel.Pabustan', '2018-03-25 12:55:58', 'Add User aasa'),
(531, 'Rommel.Pabustan', '2018-03-25 12:56:10', 'Deleted  user '),
(532, 'Ricardo ', '2018-03-26 11:17:35', 'Add User Ricardo.'),
(533, 'Cristo ', '2018-03-26 23:49:29', 'Add User Cristo.'),
(534, 'Cristo ', '2018-03-26 23:50:10', 'Add User Cristo.'),
(535, 'Cristo ', '2018-03-26 23:53:24', 'Add User Cristo.'),
(536, 'Cristo ', '2018-03-26 23:56:22', 'Add User Cristo.'),
(537, 'Juan ', '2018-03-29 21:52:07', 'Add User Juan.'),
(538, 'Juan Dela Cruz', '2018-03-29 21:52:24', 'Update item details  Canon 810 Black'),
(539, 'Juan.Dela Cruz', '2018-03-29 21:52:59', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(540, 'Juan ', '2018-03-29 21:54:41', 'Add User Juan.'),
(541, 'Nenita Chico', '2018-03-29 22:10:17', 'Update item details  Cutter Knife, heavy duty'),
(542, 'Nenita Chico', '2018-03-29 22:10:31', 'Update item details  Cutter Knife, heavy duty'),
(543, 'Nenita Chico', '2018-03-29 22:12:35', 'Update item details  Cutter Knife, heavy duty'),
(544, 'Nenita.Chico', '2018-03-29 22:14:38', 'Deleted item id Nenita.Chico in PPMP Cart lists'),
(545, 'Juan ', '2018-03-29 22:16:39', 'Add User Juan.'),
(546, 'Nenita.Chico', '2018-03-29 22:17:37', 'Deleted item id Nenita.Chico in PPMP Cart lists'),
(547, 'Juan ', '2018-03-29 22:40:40', 'Add User Juan.'),
(548, 'Juan Dela Cruz', '2018-03-29 22:40:50', 'Update item details  Canon 810 Black'),
(549, 'Juan.Dela Cruz', '2018-03-29 22:40:54', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(550, 'Juan ', '2018-03-29 22:41:34', 'Add User Juan.'),
(551, 'Juan Dela Cruz', '2018-03-29 22:43:59', 'Update item details  Canon 811 Tri-Color'),
(552, 'Juan Dela Cruz', '2018-03-29 23:03:01', 'Update item details  Canon 811 Tri-Color'),
(553, 'Juan ', '2018-04-15 15:05:22', 'Add User Juan.'),
(554, 'John.Peter', '2018-06-17 12:58:25', 'Deleted item id John.Peter in PPMP Cart lists'),
(555, 'John.Peter', '2018-06-17 13:00:16', 'Deleted item id John.Peter in PPMP Cart lists'),
(556, 'John.Peter', '2018-06-17 13:23:55', 'Deleted item id John.Peter in PPMP Cart lists'),
(557, 'John.Peter', '2018-06-17 13:23:59', 'Deleted item id John.Peter in PPMP Cart lists'),
(558, 'John.Peter', '2018-06-17 13:27:47', 'Add User .'),
(559, 'John.Peter', '2018-06-17 13:32:14', 'Deleted item id John.Peter in PPMP Cart lists'),
(560, 'John.Peter', '2018-06-17 13:37:32', 'Deleted item id John.Peter in PPMP Cart lists'),
(561, 'John.Peter', '2018-06-17 13:37:59', 'Deleted item id John.Peter in PPMP Cart lists'),
(562, 'Rommel.Pabustan', '2018-06-17 13:42:18', 'Add User .'),
(563, 'Rommel.Pabustan', '2018-06-17 13:44:23', 'Deleted  user '),
(564, 'Rommel.Pabustan', '2018-06-17 13:46:59', 'Add User .'),
(565, 'Rommel.Pabustan', '2018-06-17 13:48:03', 'Add User .'),
(566, 'Juan.Dela Cruz', '2018-06-17 13:55:38', 'Add User .'),
(567, 'Juan.Dela Cruz', '2018-06-17 13:59:47', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(568, 'Rommel.Pabustan', '2018-06-17 14:04:05', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(569, 'Rommel.Pabustan', '2018-06-17 14:16:07', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(570, 'Rommel.Pabustan', '2018-06-17 14:17:08', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(571, 'Rommel.Pabustan', '2018-06-17 14:17:56', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(572, 'Rommel.Pabustan', '2018-06-17 14:34:41', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(573, 'Rommel.Pabustan', '2018-06-19 19:31:03', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(574, 'Rommel.Pabustan', '2018-06-19 19:31:11', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(575, 'Rommel.Pabustan', '2018-06-19 20:19:22', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(576, 'Rommel.Pabustan', '2018-06-23 16:22:41', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(577, 'Rommel.Pabustan', '2018-06-23 16:22:54', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(578, 'Rommel.Pabustan', '2018-06-23 17:11:43', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(579, 'John.Peter', '2018-06-23 17:12:12', 'Deleted item id John.Peter in PPMP Cart lists'),
(580, 'Rommel.Pabustan', '2018-06-23 17:40:27', 'Add User .'),
(581, 'Rommel.Pabustan', '2018-06-23 18:41:42', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(582, 'Rommel.Pabustan', '2018-06-23 18:49:18', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(583, 'Rommel.Pabustan', '2018-06-23 20:27:54', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(584, 'Rommel.Pabustan', '2018-06-23 20:32:14', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(585, 'Rommel.Pabustan', '2018-06-23 20:35:00', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(586, 'Rommel.Pabustan', '2018-06-23 21:47:19', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(587, 'Rommel.Pabustan', '2018-06-23 22:17:10', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(588, 'Rommel.Pabustan', '2018-06-23 22:22:37', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(589, 'Rommel.Pabustan', '2018-06-23 22:23:32', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(590, 'Rommel.Pabustan', '2018-06-23 22:23:54', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(591, 'Rommel.Pabustan', '2018-06-23 22:25:11', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(592, 'Rommel.Pabustan', '2018-06-23 22:28:11', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(593, 'Rommel.Pabustan', '2018-06-23 22:47:45', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(594, 'Rommel.Pabustan', '2018-06-23 22:49:01', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(595, 'Rommel.Pabustan', '2018-06-23 22:57:10', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(596, 'Rommel.Pabustan', '2018-06-23 22:58:52', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(597, 'Rommel.Pabustan', '2018-06-23 22:59:35', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(598, 'Rommel.Pabustan', '2018-06-23 23:02:03', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(599, 'Rommel.Pabustan', '2018-06-23 23:04:04', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(600, 'Rommel.Pabustan', '2018-06-23 23:14:44', 'Add User .'),
(601, 'Rommel.Pabustan', '2018-06-23 23:16:46', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(602, 'Rommel.Pabustan', '2018-06-23 23:23:37', 'Add User .'),
(603, 'Rommel.Pabustan', '2018-06-23 23:32:38', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(604, 'Rommel.Pabustan', '2018-06-23 23:37:45', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(605, 'Rommel.Pabustan', '2018-06-23 23:37:49', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(606, 'Rommel.Pabustan', '2018-06-23 23:41:05', 'Add User .'),
(607, 'Rommel.Pabustan', '2018-06-23 23:44:43', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(608, 'Rommel.Pabustan', '2018-06-23 23:47:03', 'Add User .'),
(609, 'Rommel.Pabustan', '2018-06-23 23:51:43', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(610, 'Rommel.Pabustan', '2018-06-23 23:51:48', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(611, 'Rommel.Pabustan', '2018-06-23 23:53:54', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(612, 'Rommel.Pabustan', '2018-06-23 23:53:58', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(613, 'Rommel.Pabustan', '2018-06-23 23:54:24', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(614, 'Rommel.Pabustan', '2018-06-23 23:54:28', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(615, 'Rommel.Pabustan', '2018-06-23 23:55:12', 'Add User .'),
(616, 'Rommel.Pabustan', '2018-06-23 23:55:54', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(617, 'Rommel.Pabustan', '2018-06-23 23:59:41', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(618, 'Rommel.Pabustan', '2018-07-11 12:14:00', 'Add User .'),
(619, 'Rommel.Pabustan', '2018-07-11 12:27:44', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(620, 'John.Peter', '2018-07-19 12:34:04', 'Deleted item id John.Peter in PPMP Cart lists'),
(621, 'Rommel.Pabustan', '2018-09-17 12:18:06', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(622, 'Rommel.Pabustan', '2018-09-17 13:13:48', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(623, 'Rommel.Pabustan', '2018-09-17 13:50:16', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(624, 'Rommel.Pabustan', '2018-11-02 14:48:03', 'Add User Juan.Dela Cruz'),
(625, 'Rommel.Pabustan', '2018-11-02 15:04:49', 'Add User '),
(626, 'Rommel.Pabustan', '2018-11-02 15:07:15', 'Add User '),
(627, 'Rommel.Pabustan', '2018-11-02 15:09:44', 'Add User '),
(628, 'Rommel.Pabustan', '2018-11-02 15:11:56', 'Add User '),
(629, 'Rommel.Pabustan', '2018-11-02 15:14:31', 'Add User '),
(630, 'Rommel.Pabustan', '2018-11-02 15:35:10', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(631, 'Rommel.Pabustan', '2018-11-02 15:36:16', 'Deleted  user '),
(632, 'Rommel.Pabustan', '2018-11-02 15:36:57', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(633, 'Rommel.Pabustan', '2018-11-02 15:37:22', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(634, 'Rommel.Pabustan', '2018-11-02 15:37:48', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(635, 'Rommel.Pabustan', '2018-11-02 16:00:30', 'Add User .'),
(636, 'Rommel.Pabustan', '2018-11-02 16:40:23', 'Deleted item id Rommel.Pabustan in PPMP Cart lists'),
(637, 'Elizabeth.Sunga', '2018-11-02 18:01:23', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(638, 'Elizabeth.Sunga', '2018-11-02 18:01:50', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(639, 'Elizabeth.Sunga', '2018-11-03 22:07:25', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(640, 'Juan.Dela Cruz', '2018-12-26 12:53:04', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(641, 'Juan.Dela Cruz', '2018-12-26 12:53:26', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(642, 'Elizabeth.Sunga', '2018-12-26 13:32:25', 'Add User '),
(643, 'Ricardo ', '2018-12-26 13:35:43', 'Add User Ricardo.'),
(644, 'Ricardo ', '2018-12-26 13:36:29', 'Add User Ricardo.'),
(645, 'Ricardo ', '2018-12-26 13:37:31', 'Add User Ricardo.'),
(646, 'Ricardo.Enriquez', '2018-12-26 13:43:48', 'Add User .'),
(647, 'Juan.Dela Cruz', '2018-12-27 10:05:50', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(648, 'Elizabeth.Sunga', '2018-12-27 10:40:30', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(649, 'Elizabeth.Sunga', '2018-12-27 10:42:17', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(650, 'Elizabeth.Sunga', '2018-12-27 10:42:37', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(651, 'Elizabeth.Sunga', '2018-12-27 10:50:47', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(652, 'Elizabeth.Sunga', '2018-12-27 10:55:33', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(653, 'Elizabeth.Sunga', '2018-12-27 10:55:46', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(654, 'Elizabeth.Sunga', '2018-12-27 10:56:32', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(655, 'Elizabeth.Sunga', '2018-12-27 10:56:34', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(656, 'Elizabeth.Sunga', '2018-12-27 10:56:56', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(657, 'Elizabeth.Sunga', '2018-12-27 10:56:58', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(658, 'Elizabeth.Sunga', '2018-12-27 10:57:00', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(659, 'Elizabeth.Sunga', '2018-12-27 10:57:02', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(660, 'Elizabeth.Sunga', '2018-12-27 10:57:09', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(661, 'Elizabeth.Sunga', '2018-12-27 10:57:41', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(662, 'Elizabeth.Sunga', '2018-12-27 10:59:49', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(663, 'Elizabeth.Sunga', '2018-12-27 11:03:25', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(664, 'Elizabeth.Sunga', '2018-12-27 11:04:17', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(665, 'Elizabeth.Sunga', '2018-12-27 11:05:14', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(666, 'Elizabeth.Sunga', '2018-12-27 11:07:52', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(667, 'Elizabeth.Sunga', '2018-12-27 23:49:57', 'Add User .'),
(668, 'Elizabeth.Sunga', '2018-12-28 00:15:41', 'Add User .'),
(669, 'Elizabeth.Sunga', '2018-12-28 00:18:05', 'Add User .'),
(670, 'Elizabeth.Sunga', '2018-12-28 00:57:11', 'Add User .'),
(671, 'Elizabeth.Sunga', '2018-12-28 01:03:37', 'Add User .'),
(672, 'Elizabeth.Sunga', '2018-12-28 01:07:10', 'Add User .'),
(673, 'Elizabeth.Sunga', '2018-12-28 17:41:55', 'Add User .'),
(674, 'Elizabeth.Sunga', '2018-12-28 23:33:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(675, 'Elizabeth.Sunga', '2018-12-28 23:46:56', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(676, 'Elizabeth.Sunga', '2018-12-28 23:48:01', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(677, 'Elizabeth.Sunga', '2018-12-30 02:15:08', 'Add User .'),
(678, 'Elizabeth.Sunga', '2018-12-30 02:16:55', 'Add new BACreso by . for 2018'),
(679, 'Elizabeth.Sunga', '2018-12-30 02:18:54', 'Add new BACreso by .'),
(680, 'Elizabeth.Sunga', '2018-12-30 02:19:13', 'Add new BACreso by .'),
(681, 'Elizabeth.Sunga', '2018-12-30 02:56:47', 'Add new BACreso by  '),
(682, 'Elizabeth.Sunga', '2018-12-30 03:52:10', 'Add new BACreso by  '),
(683, 'Elizabeth.Sunga', '2018-12-30 03:52:24', 'Add new BACreso by  '),
(684, 'Elizabeth.Sunga', '2018-12-30 03:56:59', 'Add new BACreso by  '),
(685, 'Elizabeth.Sunga', '2018-12-30 03:57:22', 'Add new BACreso by  '),
(686, 'Elizabeth.Sunga', '2018-12-30 04:02:52', 'Add new BACreso by  '),
(687, 'Elizabeth.Sunga', '2018-12-30 04:03:25', 'Add new BACreso by  '),
(688, 'Elizabeth.Sunga', '2018-12-30 04:03:52', 'Add new BACreso by  '),
(689, 'Elizabeth.Sunga', '2018-12-30 04:04:07', 'Add new BACreso by  '),
(690, 'Elizabeth.Sunga', '2018-12-30 04:06:46', 'Add new BACreso by  '),
(691, 'Elizabeth.Sunga', '2018-12-30 04:12:17', 'Add new BACreso by  '),
(692, 'Elizabeth.Sunga', '2018-12-30 04:12:35', 'Add new BACreso by  '),
(693, 'Elizabeth.Sunga', '2018-12-30 12:41:49', 'Add new BACreso by  '),
(694, 'Elizabeth.Sunga', '2018-12-30 12:41:52', 'Add new BACreso by  '),
(695, 'Elizabeth.Sunga', '2018-12-30 12:41:54', 'Add new BACreso by  '),
(696, 'Elizabeth.Sunga', '2018-12-30 12:44:13', 'Add new BACreso by  '),
(697, 'Elizabeth.Sunga', '2018-12-30 14:55:49', 'Add new BACreso by  '),
(698, 'Elizabeth.Sunga', '2018-12-30 14:56:33', 'Add new BACreso by  '),
(699, 'Elizabeth.Sunga', '2018-12-30 14:57:05', 'Add new BACreso by  '),
(700, 'Elizabeth.Sunga', '2018-12-30 15:01:10', 'Add new BACreso by  '),
(701, 'Elizabeth.Sunga', '2018-12-30 15:01:10', 'Add new BACreso by  '),
(702, 'Elizabeth.Sunga', '2018-12-30 15:01:25', 'Add new BACreso by  '),
(703, 'Elizabeth.Sunga', '2018-12-30 15:14:38', 'Add new BACreso by  '),
(704, 'Elizabeth.Sunga', '2018-12-31 12:45:19', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(705, 'Elizabeth.Sunga', '2018-12-31 12:47:08', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(706, 'Elizabeth.Sunga', '2018-12-31 14:20:51', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(707, 'Elizabeth.Sunga', '2018-12-31 20:02:41', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(708, 'Elizabeth.Sunga', '2018-12-31 21:47:02', 'Add new BACreso by  '),
(709, 'Elizabeth.Sunga', '2018-12-31 21:48:42', 'Add new BACreso by  '),
(710, 'Elizabeth.Sunga', '2018-12-31 21:49:26', 'Add new BACreso by  '),
(711, 'Elizabeth.Sunga', '2018-12-31 21:49:43', 'Add new BACreso by  '),
(712, 'Elizabeth.Sunga', '2018-12-31 22:13:42', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(713, 'Elizabeth.Sunga', '2018-12-31 22:58:45', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(714, 'Elizabeth.Sunga', '2019-01-01 21:01:22', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(715, 'Elizabeth.Sunga', '2019-01-01 21:07:17', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(716, 'Elizabeth.Sunga', '2019-02-10 14:26:50', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(717, 'Elizabeth.Sunga', '2019-02-25 02:52:28', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(718, 'Elizabeth.Sunga', '2019-02-25 04:03:18', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(719, 'Elizabeth.Sunga', '2019-02-25 04:07:06', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(720, 'Elizabeth.Sunga', '2019-02-25 12:12:12', 'Add new BACreso by  '),
(721, 'Elizabeth.Sunga', '2019-02-25 12:23:46', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(722, 'Elizabeth.Sunga', '2019-02-25 13:26:38', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(723, 'Elizabeth.Sunga', '2019-03-03 21:02:08', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(724, 'Elizabeth.Sunga', '2019-03-03 21:29:54', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(725, 'Elizabeth.Sunga', '2019-03-03 22:30:26', 'Add new BACreso by  '),
(726, 'Elizabeth.Sunga', '2019-03-03 22:39:04', 'Add new BACreso by  '),
(727, 'Elizabeth.Sunga', '2019-03-03 22:43:31', 'Add new BACreso by  '),
(728, 'Elizabeth.Sunga', '2019-03-03 22:58:40', 'Add new BACreso by  '),
(729, 'Elizabeth.Sunga', '2019-03-03 22:59:47', 'Add new BACreso by  '),
(730, 'Elizabeth.Sunga', '2019-03-03 23:04:26', 'Add new BACreso by  '),
(731, 'Elizabeth.Sunga', '2019-03-03 23:11:57', 'Add new BACreso by  '),
(732, 'Elizabeth.Sunga', '2019-03-03 23:14:02', 'Add new BACreso by  '),
(733, 'Elizabeth.Sunga', '2019-03-03 23:21:07', 'Add new BACreso by  '),
(734, 'Elizabeth.Sunga', '2019-03-07 01:08:17', 'Add new BACreso by  '),
(735, 'Elizabeth.Sunga', '2019-03-07 01:13:45', 'Add new BACreso by  '),
(736, 'Elizabeth.Sunga', '2019-03-07 01:15:00', 'Add new BACreso by  '),
(737, 'Elizabeth.Sunga', '2019-03-07 01:18:52', 'Add new BACreso by  '),
(738, 'Elizabeth.Sunga', '2019-03-07 01:22:20', 'Add new BACreso by  '),
(739, 'Elizabeth.Sunga', '2019-03-07 01:24:52', 'Add new BACreso by  '),
(740, 'Elizabeth.Sunga', '2019-03-07 01:26:06', 'Add new BACreso by  '),
(741, 'Elizabeth.Sunga', '2019-03-07 01:26:10', 'Add new BACreso by  '),
(742, 'Elizabeth.Sunga', '2019-03-07 01:26:13', 'Add new BACreso by  '),
(743, 'Elizabeth.Sunga', '2019-03-07 01:28:57', 'Add new BACreso by  '),
(744, 'Elizabeth.Sunga', '2019-03-07 01:43:04', 'Add new BACreso by  '),
(745, 'Elizabeth.Sunga', '2019-03-07 01:45:25', 'Add new BACreso by  '),
(746, 'Elizabeth.Sunga', '2019-03-07 01:48:05', 'Created New Inspection and Acceptance Report by  '),
(747, 'Elizabeth.Sunga', '2019-03-07 03:44:44', 'Created New Inspection and Acceptance Report by  '),
(748, 'Elizabeth.Sunga', '2019-03-07 03:45:11', 'Created New Inspection and Acceptance Report by  '),
(749, 'Elizabeth.Sunga', '2019-03-09 06:32:13', 'Created New Inspection and Acceptance Report by  '),
(750, 'Elizabeth.Sunga', '2019-03-09 06:37:29', 'Created New Inspection and Acceptance Report by  '),
(751, 'Elizabeth.Sunga', '2019-03-09 06:38:30', 'Created New Inspection and Acceptance Report by  '),
(752, 'Elizabeth.Sunga', '2019-03-09 06:38:37', 'Created New Inspection and Acceptance Report by  '),
(753, ' ', '2019-03-09 06:40:36', 'Created New Inspection and Acceptance Report by  '),
(754, 'Elizabeth.Sunga', '2019-03-09 06:50:11', 'Created New Inspection and Acceptance Report by  '),
(755, 'Elizabeth.Sunga', '2019-03-09 06:52:48', 'Created New Inspection and Acceptance Report by  '),
(756, 'Elizabeth.Sunga', '2019-03-09 08:46:19', 'Add new BACreso by  '),
(757, 'Elizabeth.Sunga', '2019-03-09 09:23:09', 'Add new BACreso by  '),
(758, 'Elizabeth.Sunga', '2019-03-09 09:23:52', 'Add new BACreso by  '),
(759, 'Elizabeth.Sunga', '2019-03-09 09:26:00', 'Add new BACreso by  '),
(760, 'Elizabeth.Sunga', '2019-03-09 09:33:58', 'Add new BACreso by  '),
(761, 'Elizabeth.Sunga', '2019-03-09 09:34:10', 'Add new BACreso by  '),
(762, 'Elizabeth.Sunga', '2019-03-09 09:40:29', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(763, 'Elizabeth.Sunga', '2019-03-09 10:20:12', 'Add User .'),
(764, 'Elizabeth.Sunga', '2019-03-09 10:21:38', 'Add User .'),
(765, 'Elizabeth.Sunga', '2019-03-10 17:25:12', 'Add User .'),
(766, 'Elizabeth.Sunga', '2019-03-10 17:50:47', 'Add User '),
(767, 'Elizabeth.Sunga', '2019-03-10 17:57:48', 'Add User .'),
(768, 'Elizabeth.Sunga', '2019-03-10 17:59:17', 'Add new BACreso by  '),
(769, 'Elizabeth.Sunga', '2019-03-10 18:00:24', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(770, 'Elizabeth.Sunga', '2019-03-10 19:50:01', 'Add new BACreso by Elizabeth Sunga'),
(771, 'Elizabeth.Sunga', '2019-03-10 19:50:59', 'Add new BACreso by  '),
(772, 'Elizabeth.Sunga', '2019-03-10 19:51:00', 'Add new BACreso by  '),
(773, 'Elizabeth.Sunga', '2019-03-10 19:57:02', 'Add User .'),
(774, 'Elizabeth.Sunga', '2019-03-10 19:57:57', 'Add new BACreso by  '),
(775, 'Elizabeth.Sunga', '2019-03-10 20:01:44', 'Add new BACreso by  '),
(776, 'Elizabeth.Sunga', '2019-03-10 20:03:58', 'Add new BACreso by  '),
(777, 'Elizabeth.Sunga', '2019-03-10 20:53:31', 'Add new BACreso by Elizabeth Sunga'),
(778, 'Elizabeth.Sunga', '2019-03-10 20:56:41', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(779, 'Elizabeth.Sunga', '2019-03-10 21:50:02', 'Add new BACreso by Elizabeth Sunga'),
(780, 'Elizabeth.Sunga', '2019-03-10 21:55:07', 'Add new BACreso by Elizabeth Sunga'),
(781, 'Elizabeth.Sunga', '2019-03-10 21:57:07', 'Add new BACreso by Elizabeth Sunga'),
(782, 'Juan.Dela Cruz', '2019-03-10 22:18:42', 'Deleted item id Juan.Dela Cruz in PPMP Cart lists'),
(783, 'Elizabeth.Sunga', '2019-03-10 23:04:50', 'Add new BACreso by Elizabeth Sunga'),
(784, 'Elizabeth.Sunga', '2019-03-10 23:25:50', 'Add new BACreso by Elizabeth Sunga'),
(785, 'Juan.Dela Cruz', '2019-03-12 02:47:52', 'Add User .'),
(786, 'Rommel.Pabustan', '2019-03-12 14:53:29', 'Add User '),
(787, 'Juan ', '2019-03-12 14:58:15', 'Add User Juan.'),
(788, 'Rommel.Pabustan', '2019-03-12 15:01:32', 'Add User Projectors'),
(789, 'Rommel.Pabustan', '2019-03-12 15:03:43', 'Add User .LCD'),
(790, 'Juan ', '2019-03-12 15:06:36', 'Add User Juan.'),
(791, 'Juan.Reyes', '2019-03-12 15:06:52', 'Deleted item id Juan.Reyes in PPMP Cart lists'),
(792, 'Juan ', '2019-03-12 15:07:58', 'Add User Juan.'),
(793, 'Rommel.Pabustan', '2019-03-12 15:24:25', 'Add User '),
(794, 'Jane ', '2019-03-12 15:26:08', 'Add User Jane.'),
(795, 'Jane ', '2019-03-12 15:26:42', 'Add User Jane.'),
(796, 'Jane ', '2019-03-12 15:28:17', 'Add User Jane.'),
(797, 'Jane ', '2019-03-12 15:28:37', 'Add User Jane.'),
(798, 'Elizabeth.Sunga', '2019-03-13 23:43:58', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(799, 'Elizabeth.Sunga', '2019-03-14 07:29:33', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(800, 'Jane.Doe', '2019-03-14 07:32:39', 'Add User .'),
(801, 'Elizabeth.Sunga', '2019-03-14 07:37:33', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(802, 'Elizabeth.Sunga', '2019-03-14 07:45:12', 'Add User .'),
(803, 'Elizabeth.Sunga', '2019-03-14 07:47:33', 'Add User .'),
(804, 'Elizabeth.Sunga', '2019-03-14 07:48:40', 'Add User .'),
(805, 'Elizabeth.Sunga', '2019-03-14 07:49:22', 'Add new BACreso by Elizabeth Sunga'),
(806, 'Elizabeth.Sunga', '2019-03-14 17:55:52', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(807, 'Elizabeth.Sunga', '2019-03-14 18:02:29', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(808, 'Elizabeth.Sunga', '2019-03-14 18:11:33', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(809, 'Elizabeth.Sunga', '2019-03-14 18:21:29', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(810, 'Elizabeth.Sunga', '2019-03-14 18:29:14', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(811, 'Elizabeth.Sunga', '2019-03-14 18:29:36', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(812, 'Elizabeth.Sunga', '2019-03-14 18:31:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(813, 'Elizabeth.Sunga', '2019-03-14 18:32:47', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists');
INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(814, 'Elizabeth.Sunga', '2019-03-14 18:42:51', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(815, 'Elizabeth.Sunga', '2019-03-14 18:47:12', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(816, 'Elizabeth.Sunga', '2019-03-14 18:47:57', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(817, 'Elizabeth.Sunga', '2019-03-14 18:48:01', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(818, 'Elizabeth.Sunga', '2019-03-14 18:54:24', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(819, 'Elizabeth.Sunga', '2019-03-14 18:54:25', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(820, 'Elizabeth.Sunga', '2019-03-14 18:54:26', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(821, 'Elizabeth.Sunga', '2019-03-14 18:54:32', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(822, 'Elizabeth.Sunga', '2019-03-14 19:08:35', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(823, 'Elizabeth.Sunga', '2019-03-14 19:08:35', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(824, 'Elizabeth.Sunga', '2019-03-14 19:08:38', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(825, 'Elizabeth.Sunga', '2019-03-14 19:09:09', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(826, 'Elizabeth.Sunga', '2019-03-14 19:09:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(827, 'Elizabeth.Sunga', '2019-03-15 01:13:26', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(828, 'Elizabeth.Sunga', '2019-03-15 01:19:16', 'Add User .'),
(829, 'Elizabeth.Sunga', '2019-03-15 01:22:16', 'Add new BACreso by  '),
(830, 'Rommel.Pabustan', '2019-03-15 01:30:16', 'Add User Chairs'),
(831, 'Rommel.Pabustan', '2019-03-15 01:31:23', 'Add User .executive chair'),
(832, 'Rommel.Pabustan', '2019-03-19 11:05:11', 'Add User '),
(833, 'bong ', '2019-03-19 11:09:23', 'Add User bong.'),
(834, 'bong ', '2019-03-19 11:10:46', 'Add User bong.'),
(835, 'Rommel.Pabustan', '2019-03-19 11:15:12', 'Add User '),
(836, 'juana ', '2019-03-19 11:16:47', 'Add User juana.'),
(837, 'juana ', '2019-03-19 11:17:05', 'Add User juana.'),
(838, 'juana sanchez', '2019-03-19 11:21:02', 'Update item details  Gestetner Toner, 1900'),
(839, 'juana sanchez', '2019-03-19 11:22:00', 'Update item details  Gestetner Toner, 1900'),
(840, 'juana.sanchez', '2019-03-19 11:22:07', 'Deleted item id juana.sanchez in PPMP Cart lists'),
(841, 'juana sanchez', '2019-03-19 11:35:07', 'Update item details  Canon 810 Black'),
(842, 'juana sanchez', '2019-03-19 11:40:53', 'Update item details  Canon 810 Black'),
(843, 'juana sanchez', '2019-03-19 11:42:55', 'Update item details  Canon 810 Black'),
(844, 'juana sanchez', '2019-03-19 11:43:18', 'Update item details  Canon 810 Black'),
(845, 'juana sanchez', '2019-03-19 11:44:10', 'Update item details  Canon 810 Black'),
(846, 'juana ', '2019-03-19 11:46:36', 'Add User juana.'),
(847, 'Nenita Chico', '2019-03-19 11:57:20', 'Update item details  Ballpen (Red)'),
(848, 'Nenita Chico', '2019-03-19 11:57:51', 'Update item details  Ballpen (Red)'),
(849, 'Nenita Chico', '2019-03-19 11:58:16', 'Update item details  Ballpen (Red)'),
(850, 'Nenita Chico', '2019-03-19 11:58:23', 'Update item details  Ballpen (Red)'),
(851, 'bong Revilla', '2019-03-19 13:34:22', 'Update item details  Gestetner Toner, 1900'),
(852, 'bong.Revilla', '2019-03-19 13:35:12', 'Deleted item id bong.Revilla in PPMP Cart lists'),
(853, 'bong ', '2019-03-19 13:35:48', 'Add User bong.'),
(854, 'Rommel.Pabustan', '2019-03-19 13:44:44', 'Add User '),
(855, 'john ', '2019-03-19 13:46:27', 'Add User john.'),
(856, 'john ', '2019-03-19 13:46:54', 'Add User john.'),
(857, 'john ', '2019-03-19 13:47:44', 'Add User john.'),
(858, 'john doe', '2019-03-19 13:48:00', 'Update item details  Canon 811 Tri-Color'),
(859, 'Rommel.Pabustan', '2019-03-19 14:06:00', 'Add User '),
(860, 'jaime ', '2019-03-19 14:07:53', 'Add User jaime.'),
(861, 'jaime.santos', '2019-03-19 14:09:14', 'Deleted item id jaime.santos in PPMP Cart lists'),
(862, 'Rommel.Pabustan', '2019-03-19 14:10:21', 'Add User fire extinguisher'),
(863, 'Rommel.Pabustan', '2019-03-19 14:10:22', 'Add User fire extinguisher'),
(864, 'Rommel.Pabustan', '2019-03-19 14:10:22', 'Add User fire extinguisher'),
(865, 'Rommel.Pabustan', '2019-03-19 14:11:34', 'Add User .gasolina'),
(866, 'Rommel.Pabustan', '2019-03-19 14:12:45', 'Update item gasolina'),
(867, 'jaime ', '2019-03-19 14:18:43', 'Add User jaime.'),
(868, 'Ricardo ', '2019-03-19 22:36:11', 'Add User Ricardo.'),
(869, 'Ricardo ', '2019-03-19 22:36:34', 'Add User Ricardo.'),
(870, 'Elizabeth.Sunga', '2019-03-20 04:02:59', 'Add User '),
(871, 'juan ', '2019-03-20 04:05:42', 'Add User juan.'),
(872, 'juan ', '2019-03-20 04:06:10', 'Add User juan.'),
(873, 'Elizabeth.Sunga', '2019-03-20 04:06:48', 'Add User '),
(874, 'juana ', '2019-03-20 04:14:52', 'Add User juana.'),
(875, 'Nenita Chico', '2019-03-20 04:19:23', 'Update item details  Canon 810 Black'),
(876, 'Nenita Chico', '2019-03-20 04:20:47', 'Update item details  Hewlett Packard 85 A'),
(877, 'juan delaCruz', '2019-03-20 04:22:22', 'Update item details  Canon 810 Black'),
(878, 'juan delaCruz', '2019-03-20 04:22:35', 'Update item details  Hewlett Packard 85 A'),
(879, 'juana ', '2019-03-20 04:25:17', 'Add User juana.'),
(880, 'Nenita Chico', '2019-03-20 04:26:18', 'Update item details  Canon 811 Tri-Color'),
(881, 'juana.Cruz', '2019-03-20 04:26:56', 'Deleted item id juana.Cruz in PPMP Cart lists'),
(882, 'juana ', '2019-03-20 04:27:28', 'Add User juana.'),
(883, 'juana Cruz', '2019-03-20 04:27:46', 'Update item details  Hewlett Packard 85 A'),
(884, 'Rommel.Pabustan', '2019-03-20 12:34:05', 'Add User '),
(885, 'Rommel.Pabustan', '2019-03-20 12:37:19', 'Add User monoblock'),
(886, 'Rommel.Pabustan', '2019-03-20 12:38:15', 'Add User .with arm rest'),
(887, 'roel ', '2019-03-20 12:40:38', 'Add User roel.'),
(888, 'roel lazaano', '2019-03-20 12:41:15', 'Update item details  with arm rest'),
(889, 'Elizabeth.Sunga', '2019-03-20 14:09:12', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(890, 'Rommel.Pabustan', '2019-03-20 14:35:23', 'Add User '),
(891, 'alvin ', '2019-03-20 14:36:41', 'Add User alvin.'),
(892, 'roel ', '2019-03-20 14:41:51', 'Add User roel.'),
(893, 'roel ', '2019-03-20 14:42:14', 'Add User roel.'),
(894, 'alvin ', '2019-03-20 14:42:53', 'Add User alvin.'),
(895, 'alvin ', '2019-03-20 14:43:07', 'Add User alvin.'),
(896, 'roel.lazaano', '2019-03-20 21:51:28', 'Deleted item id roel.lazaano in PPMP Cart lists'),
(897, 'alvin.ramos', '2019-03-20 22:22:17', 'Deleted item id alvin.ramos in PPMP Cart lists'),
(898, 'alvin.ramos', '2019-03-20 22:24:24', 'Deleted item id alvin.ramos in PPMP Cart lists'),
(899, 'roel.lazaano', '2019-03-20 22:33:15', 'Add User .'),
(900, 'Elizabeth.Sunga', '2019-03-20 22:37:10', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(901, 'Elizabeth.Sunga', '2019-03-20 22:37:18', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(902, 'Elizabeth.Sunga', '2019-03-20 22:38:42', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(903, 'roel.lazaano', '2019-03-20 22:42:27', 'Deleted item id roel.lazaano in PPMP Cart lists'),
(904, 'roel.lazaano', '2019-03-20 23:13:08', 'Deleted item id roel.lazaano in PPMP Cart lists'),
(905, 'Elizabeth.Sunga', '2019-03-20 23:15:11', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(906, 'Elizabeth.Sunga', '2019-03-20 23:15:17', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(907, 'Elizabeth.Sunga', '2019-03-20 23:15:22', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(908, 'Elizabeth.Sunga', '2019-03-21 00:37:21', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(909, 'roel.lazaano', '2019-03-21 10:57:33', 'Add User .'),
(910, 'Elizabeth.Sunga', '2019-03-21 11:22:08', 'Add User .'),
(911, 'Elizabeth.Sunga', '2019-03-21 11:22:45', 'Add User .'),
(912, 'Elizabeth.Sunga', '2019-03-21 11:23:59', 'Add User .'),
(913, 'Elizabeth.Sunga', '2019-03-21 11:33:55', 'Add new BACreso by Elizabeth Sunga'),
(914, 'Elizabeth.Sunga', '2019-03-21 11:35:17', 'Add User .'),
(915, 'Elizabeth.Sunga', '2019-03-21 11:36:32', 'Add new BACreso by  '),
(916, 'Elizabeth.Sunga', '2019-03-21 11:37:00', 'Add new BACreso by  '),
(917, 'Elizabeth.Sunga', '2019-03-21 11:37:01', 'Add new BACreso by  '),
(918, 'Elizabeth.Sunga', '2019-03-21 11:37:27', 'Add new BACreso by  '),
(919, 'Elizabeth.Sunga', '2019-03-21 11:37:28', 'Add new BACreso by  '),
(920, 'Elizabeth.Sunga', '2019-03-21 11:37:28', 'Add new BACreso by  '),
(921, 'Elizabeth.Sunga', '2019-03-21 11:37:29', 'Add new BACreso by  '),
(922, 'Elizabeth.Sunga', '2019-03-21 11:37:30', 'Add new BACreso by  '),
(923, 'Elizabeth.Sunga', '2019-03-21 11:37:30', 'Add new BACreso by  '),
(924, 'roel ', '2019-03-22 08:45:27', 'Add User roel.'),
(925, 'roel ', '2019-03-22 08:45:51', 'Add User roel.'),
(926, 'roel ', '2019-03-22 08:46:06', 'Add User roel.'),
(927, 'roel ', '2019-03-22 08:46:22', 'Add User roel.'),
(928, 'roel ', '2019-03-22 08:46:37', 'Add User roel.'),
(929, 'roel ', '2019-03-22 08:46:58', 'Add User roel.'),
(930, 'roel ', '2019-03-22 08:47:11', 'Add User roel.'),
(931, 'roel ', '2019-03-22 08:47:26', 'Add User roel.'),
(932, 'roel ', '2019-03-22 08:47:43', 'Add User roel.'),
(933, 'alvin ', '2019-03-22 08:52:04', 'Add User alvin.'),
(934, 'alvin ', '2019-03-22 08:52:22', 'Add User alvin.'),
(935, 'alvin ', '2019-03-22 08:52:39', 'Add User alvin.'),
(936, 'alvin ', '2019-03-22 08:53:00', 'Add User alvin.'),
(937, 'alvin ', '2019-03-22 08:53:24', 'Add User alvin.'),
(938, 'alvin ', '2019-03-22 08:53:47', 'Add User alvin.'),
(939, 'alvin ', '2019-03-22 08:54:06', 'Add User alvin.'),
(940, 'roel.lazaano', '2019-03-22 08:56:52', 'Deleted item id roel.lazaano in PPMP Cart lists'),
(941, 'roel.lazaano', '2019-03-22 08:56:55', 'Deleted item id roel.lazaano in PPMP Cart lists'),
(942, 'roel.lazaano', '2019-03-22 08:58:26', 'Add User .'),
(943, 'alvin.ramos', '2019-03-22 08:59:24', 'Add User .'),
(944, 'roel ', '2019-03-22 09:24:38', 'Add User roel.'),
(945, 'roel ', '2019-03-22 09:24:54', 'Add User roel.'),
(946, 'roel ', '2019-03-22 09:25:09', 'Add User roel.'),
(947, 'roel ', '2019-03-22 09:25:23', 'Add User roel.'),
(948, 'roel ', '2019-03-22 09:25:38', 'Add User roel.'),
(949, 'roel ', '2019-03-22 09:25:50', 'Add User roel.'),
(950, 'roel ', '2019-03-22 09:26:04', 'Add User roel.'),
(951, 'alvin ', '2019-03-22 09:26:53', 'Add User alvin.'),
(952, 'alvin ', '2019-03-22 09:27:11', 'Add User alvin.'),
(953, 'alvin ', '2019-03-22 09:27:24', 'Add User alvin.'),
(954, 'alvin ', '2019-03-22 09:27:41', 'Add User alvin.'),
(955, 'alvin ', '2019-03-22 09:28:00', 'Add User alvin.'),
(956, 'alvin ', '2019-03-22 09:28:15', 'Add User alvin.'),
(957, 'alvin ', '2019-03-22 09:28:31', 'Add User alvin.'),
(958, 'roel.lazaano', '2019-03-22 09:31:46', 'Add User .'),
(959, 'alvin.ramos', '2019-03-22 09:32:35', 'Add User .'),
(960, 'Rommel.Pabustan', '2019-04-04 09:24:43', 'Add User '),
(961, 'ria ', '2019-04-04 09:26:38', 'Add User ria.'),
(962, 'ria ', '2019-04-04 09:27:15', 'Add User ria.'),
(963, 'ria pelonia', '2019-04-04 09:30:18', 'Update item details  Clear Folder Legal Size'),
(964, 'Elizabeth.Sunga', '2019-04-04 09:34:32', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(965, 'Elizabeth.Sunga', '2019-04-04 09:38:38', 'Reset the consolidated ppmp year Elizabeth.Sunga'),
(966, 'ria.pelonia', '2019-04-04 09:40:46', 'Add User .'),
(967, 'Elizabeth.Sunga', '2019-04-04 09:50:38', 'Add User .'),
(968, 'Elizabeth.Sunga', '2019-04-04 09:51:34', 'Add User .'),
(969, 'Elizabeth.Sunga', '2019-04-04 09:54:00', 'Add User .'),
(970, 'Elizabeth.Sunga', '2019-04-04 09:54:29', 'Add User .'),
(971, 'Elizabeth.Sunga', '2019-04-04 09:55:45', 'Add new BACreso by Elizabeth Sunga'),
(972, 'Elizabeth.Sunga', '2019-04-04 10:24:48', 'Add User .'),
(973, 'Elizabeth.Sunga', '2019-04-04 10:25:22', 'Add User .'),
(974, 'Elizabeth.Sunga', '2019-04-04 10:25:23', 'Add User .'),
(975, 'Elizabeth.Sunga', '2019-04-04 10:46:32', 'Add User .'),
(976, 'Elizabeth.Sunga', '2019-04-04 10:56:53', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(977, 'Elizabeth.Sunga', '2019-04-04 10:56:54', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(978, 'Elizabeth.Sunga', '2019-04-04 10:56:55', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(979, 'Elizabeth.Sunga', '2019-04-04 10:56:57', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(980, 'Elizabeth.Sunga', '2019-04-04 10:57:00', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(981, 'Elizabeth.Sunga', '2019-04-04 10:57:03', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(982, 'Elizabeth.Sunga', '2019-04-04 10:57:05', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(983, 'Elizabeth.Sunga', '2019-04-04 10:57:07', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(984, 'Elizabeth.Sunga', '2019-04-04 10:57:09', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(985, 'Elizabeth.Sunga', '2019-04-04 11:01:05', 'Add User .'),
(986, 'Elizabeth.Sunga', '2019-04-09 00:30:31', 'Add new BACreso by Elizabeth Sunga'),
(987, 'Rommel.Pabustan', '2019-04-16 11:01:54', 'Add User '),
(988, 'noemi ', '2019-04-16 11:14:07', 'Add User noemi.'),
(989, 'noemi ', '2019-04-16 11:25:56', 'Add User noemi.'),
(990, 'noemi ', '2019-04-16 11:28:19', 'Add User noemi.'),
(991, 'noemi ', '2019-04-16 11:28:48', 'Add User noemi.'),
(992, 'noemi ', '2019-04-16 11:33:31', 'Add User noemi.'),
(993, 'Nenita Chico', '2019-04-16 11:40:19', 'Update item details  executive chair'),
(994, 'noemi reyes', '2019-04-16 12:08:32', 'Update item details  Hewlett Packard 85 A'),
(995, 'Rommel.Pabustan', '2019-04-16 12:10:41', 'Add User '),
(996, 'keno ', '2019-04-16 12:12:12', 'Add User keno.'),
(997, 'keno ', '2019-04-16 12:12:47', 'Add User keno.'),
(998, 'keno.piad', '2019-04-16 12:13:07', 'Deleted item id keno.piad in PPMP Cart lists'),
(999, 'keno ', '2019-04-16 12:15:24', 'Add User keno.'),
(1000, 'keno ', '2019-04-16 12:15:47', 'Add User keno.'),
(1001, 'keno ', '2019-04-16 12:16:48', 'Add User keno.'),
(1002, 'keno ', '2019-04-16 12:17:03', 'Add User keno.'),
(1003, 'keno ', '2019-04-16 12:17:12', 'Add User keno.'),
(1004, 'keno ', '2019-04-16 12:17:33', 'Add User keno.'),
(1005, 'keno ', '2019-04-16 12:17:46', 'Add User keno.'),
(1006, 'keno ', '2019-04-16 12:17:55', 'Add User keno.'),
(1007, 'keno ', '2019-04-16 12:18:05', 'Add User keno.'),
(1008, 'keno ', '2019-04-16 12:18:16', 'Add User keno.'),
(1009, 'keno ', '2019-04-16 12:18:45', 'Add User keno.'),
(1010, 'keno ', '2019-04-16 12:19:01', 'Add User keno.'),
(1011, 'keno ', '2019-04-16 12:19:14', 'Add User keno.'),
(1012, 'keno ', '2019-04-16 12:19:41', 'Add User keno.'),
(1013, 'keno ', '2019-04-16 12:20:11', 'Add User keno.'),
(1014, 'keno ', '2019-04-16 12:20:23', 'Add User keno.'),
(1015, 'keno ', '2019-04-16 12:20:34', 'Add User keno.'),
(1016, 'keno.piad', '2019-04-16 12:37:44', 'Add User .'),
(1017, 'Elizabeth.Sunga', '2019-04-16 12:47:49', 'Add User .'),
(1018, 'Elizabeth.Sunga', '2019-04-16 12:48:30', 'Add User .'),
(1019, 'Elizabeth.Sunga', '2019-04-16 12:53:58', 'Add User .'),
(1020, 'Elizabeth.Sunga', '2019-04-16 12:57:26', 'Add new BACreso by Elizabeth Sunga'),
(1021, 'Elizabeth.Sunga', '2019-04-16 12:59:55', 'Add User .'),
(1022, 'Elizabeth.Sunga', '2019-04-16 13:00:25', 'Add User .'),
(1023, 'Elizabeth.Sunga', '2019-04-16 13:00:59', 'Add User .'),
(1024, 'Elizabeth.Sunga', '2019-04-16 13:02:34', 'Add new BACreso by  '),
(1025, 'Elizabeth.Sunga', '2019-04-16 13:02:42', 'Add new BACreso by  '),
(1026, 'Elizabeth.Sunga', '2019-04-16 13:03:04', 'Add new BACreso by  '),
(1027, 'Elizabeth.Sunga', '2019-04-16 13:03:49', 'Add new BACreso by  '),
(1028, 'Elizabeth.Sunga', '2019-04-16 13:04:20', 'Add new BACreso by Elizabeth Sunga'),
(1029, 'Rommel.Pabustan', '2019-04-21 17:32:19', 'Add User '),
(1030, 'Raul ', '2019-04-21 18:09:37', 'Add User Raul.'),
(1031, 'Nenita.Chico', '2019-04-21 18:24:24', 'Deleted item id Nenita.Chico in PPMP Cart lists'),
(1032, 'Raul ', '2019-04-21 18:25:42', 'Add User Raul.'),
(1033, 'Rommel.Pabustan', '2019-04-21 21:44:29', 'Add User '),
(1034, 'Janine ', '2019-04-21 21:47:57', 'Add User Janine.'),
(1035, 'Janine ', '2019-04-21 21:49:06', 'Add User Janine.'),
(1036, 'Janine ', '2019-04-21 22:04:30', 'Add User Janine.'),
(1037, 'Janine.Roxas', '2019-04-21 22:44:08', 'Deleted item id Janine.Roxas in PPMP Cart lists'),
(1038, 'Janine.Roxas', '2019-04-21 22:51:37', 'Deleted item id Janine.Roxas in PPMP Cart lists'),
(1039, 'Janine.Roxas', '2019-04-21 22:55:13', 'Deleted item id Janine.Roxas in PPMP Cart lists'),
(1040, 'Elizabeth.Sunga', '2019-04-21 23:06:59', 'Add User .'),
(1041, 'Elizabeth.Sunga', '2019-04-21 23:11:08', 'Add new BACreso by  '),
(1042, 'Elizabeth.Sunga', '2019-04-21 23:11:15', 'Add new BACreso by  '),
(1043, 'Elizabeth.Sunga', '2019-04-21 23:11:20', 'Add new BACreso by  '),
(1044, 'Elizabeth.Sunga', '2019-04-21 23:11:32', 'Add new BACreso by  '),
(1045, 'Elizabeth.Sunga', '2019-04-21 23:11:36', 'Add new BACreso by  '),
(1046, 'Elizabeth.Sunga', '2019-04-21 23:11:36', 'Add new BACreso by  '),
(1047, 'Elizabeth.Sunga', '2019-04-21 23:11:37', 'Add new BACreso by  '),
(1048, 'Elizabeth.Sunga', '2019-04-21 23:11:37', 'Add new BACreso by  '),
(1049, 'Elizabeth.Sunga', '2019-04-21 23:11:37', 'Add new BACreso by  '),
(1050, 'Elizabeth.Sunga', '2019-04-21 23:11:38', 'Add new BACreso by  '),
(1051, 'Elizabeth.Sunga', '2019-04-21 23:11:38', 'Add new BACreso by  '),
(1052, 'Elizabeth.Sunga', '2019-04-21 23:11:38', 'Add new BACreso by  '),
(1053, 'Elizabeth.Sunga', '2019-04-21 23:11:39', 'Add new BACreso by  '),
(1054, 'Elizabeth.Sunga', '2019-04-21 23:11:39', 'Add new BACreso by  '),
(1055, 'Elizabeth.Sunga', '2019-04-21 23:11:39', 'Add new BACreso by  '),
(1056, 'Elizabeth.Sunga', '2019-04-21 23:11:39', 'Add new BACreso by  '),
(1057, 'Elizabeth.Sunga', '2019-04-21 23:11:40', 'Add new BACreso by  '),
(1058, 'Elizabeth.Sunga', '2019-04-21 23:11:40', 'Add new BACreso by  '),
(1059, 'Elizabeth.Sunga', '2019-04-21 23:11:45', 'Add new BACreso by  '),
(1060, 'Elizabeth.Sunga', '2019-04-21 23:12:10', 'Add new BACreso by Elizabeth Sunga'),
(1061, 'Elizabeth.Sunga', '2019-04-21 23:12:52', 'Add new BACreso by  '),
(1062, 'Elizabeth.Sunga', '2019-04-21 23:13:16', 'Add new BACreso by  '),
(1063, 'Elizabeth.Sunga', '2019-04-21 23:13:20', 'Add new BACreso by  '),
(1064, 'Janine.Roxas', '2019-04-21 23:16:44', 'Deleted item id Janine.Roxas in PPMP Cart lists'),
(1065, 'Elizabeth.Sunga', '2019-04-21 23:28:25', 'Add new BACreso by  '),
(1066, 'Elizabeth.Sunga', '2019-04-21 23:28:29', 'Add new BACreso by  '),
(1067, 'Elizabeth.Sunga', '2019-04-21 23:28:30', 'Add new BACreso by  '),
(1068, 'Elizabeth.Sunga', '2019-04-21 23:28:30', 'Add new BACreso by  '),
(1069, 'Elizabeth.Sunga', '2019-04-21 23:29:02', 'Add new BACreso by  '),
(1070, 'Elizabeth.Sunga', '2019-04-21 23:29:49', 'Add new BACreso by  '),
(1071, 'Janine.Roxas', '2019-04-21 23:49:22', 'Deleted item id Janine.Roxas in PPMP Cart lists'),
(1072, 'Elizabeth.Sunga', '2019-05-06 03:02:17', 'Add User '),
(1073, 'Elizabeth.Sunga', '2019-05-06 03:38:55', 'Add User '),
(1074, 'Elizabeth', '2019-05-06 04:32:05', 'Add User '),
(1075, 'COES', '2019-05-06 04:43:17', 'Deleted item id COES in PPMP Cart lists'),
(1076, ' ', '2019-05-06 04:43:56', 'Add User .'),
(1077, ' ', '2019-05-06 04:57:07', 'Add User .'),
(1078, 'COES', '2019-05-06 05:02:33', 'Add User .'),
(1079, 'COES', '2019-05-06 05:23:04', 'Deleted item id COES in PPMP Cart lists'),
(1080, 'COES', '2019-05-06 05:24:30', 'Deleted item id COES in PPMP Cart lists'),
(1081, 'Bago', '2019-05-06 08:58:46', 'Deleted item id Bago in PPMP Cart lists'),
(1082, 'Bago', '2019-05-06 09:04:14', 'Deleted item id Bago in PPMP Cart lists'),
(1083, ' ', '2019-05-06 09:06:43', 'Add User .'),
(1084, 'Bago', '2019-05-06 09:20:26', 'Deleted item id Bago in PPMP Cart lists'),
(1085, 'Bago', '2019-05-06 09:23:21', 'Deleted item id Bago in PPMP Cart lists'),
(1086, 'Bago', '2019-05-06 09:26:41', 'Add User .'),
(1087, 'Bago', '2019-05-06 09:27:03', 'Deleted item id Bago in PPMP Cart lists'),
(1088, 'Elizabeth', '2019-05-06 09:58:15', 'Reset the consolidated ppmp year Elizabeth'),
(1089, 'Elizabeth', '2019-05-06 09:58:32', 'Reset the consolidated ppmp year Elizabeth'),
(1090, 'Elizabeth', '2019-05-06 11:54:11', 'Add User '),
(1091, 'MOAdministrator', '2019-05-06 12:39:19', 'Add User '),
(1092, 'MOAdministrator', '2019-05-06 12:50:57', 'Add User '),
(1093, 'MOAdministrator', '2019-05-06 13:13:09', 'Add User '),
(1094, 'MOAdministrator', '2019-05-06 13:25:40', 'Add User '),
(1095, ' ', '2019-05-06 14:15:23', 'Add User .'),
(1096, ' ', '2019-05-06 16:57:40', 'Add User .'),
(1097, 'Elizabeth', '2019-05-06 16:59:54', 'Reset the consolidated ppmp year Elizabeth'),
(1098, 'Elizabeth', '2019-05-06 17:04:11', 'Deleted item id Elizabeth in PPMP Cart lists'),
(1099, 'Elizabeth', '2019-05-06 17:05:30', 'Reset the consolidated ppmp year Elizabeth'),
(1100, 'Elizabeth', '2019-05-06 17:10:37', 'Add User ssdad'),
(1101, 'Elizabeth', '2019-05-06 17:37:05', 'Add User dugong'),
(1102, 'Elizabeth', '2019-05-06 17:47:18', 'Add User chairs'),
(1103, 'Elizabeth', '2019-05-06 18:13:26', 'Add User Chairs'),
(1104, 'Elizabeth', '2019-05-06 18:13:46', 'Deleted  user '),
(1105, 'Elizabeth', '2019-05-06 18:13:47', 'Deleted  user '),
(1106, 'Elizabeth', '2019-05-06 18:13:47', 'Deleted  user '),
(1107, 'Elizabeth', '2019-05-06 18:14:01', 'Add User Pusa'),
(1108, 'Elizabeth', '2019-05-06 18:15:19', 'Add User ASO'),
(1109, 'Elizabeth', '2019-05-06 18:15:35', 'Add User APROCAPOLCO'),
(1110, 'Elizabeth', '2019-05-06 18:18:55', 'Deleted  user '),
(1111, 'Elizabeth', '2019-05-06 18:18:55', 'Deleted  user '),
(1112, 'Elizabeth', '2019-05-06 18:24:35', 'Update item gasolina'),
(1113, 'Elizabeth', '2019-05-06 18:24:55', 'Update item executive chair'),
(1114, 'Elizabeth', '2019-05-06 19:04:40', 'Add User '),
(1115, 'Elizabeth', '2019-05-06 19:06:15', 'Add User '),
(1116, 'Kulapo', '2019-05-06 22:09:32', 'Add User '),
(1117, 'Kulapo', '2019-05-06 22:21:48', 'Update item with arm rest'),
(1118, 'Kulapo', '2019-05-06 22:22:04', 'Update item with arm rest'),
(1119, 'Kulapo', '2019-05-06 22:22:18', 'Update item with arm rest'),
(1120, 'Kulapo', '2019-05-06 22:23:11', 'Update item with arm rest'),
(1121, ' ', '2019-05-06 22:51:35', 'Add User .'),
(1122, ' ', '2019-05-06 22:51:58', 'Add User .'),
(1123, 'Elizabeth', '2019-05-06 22:53:44', 'Add User '),
(1124, 'Elizabeth', '2019-05-06 22:59:12', 'Reset the consolidated ppmp year Elizabeth'),
(1125, 'Elizabeth', '2019-05-06 22:59:18', 'Reset the consolidated ppmp year Elizabeth'),
(1126, 'Kulapo', '2019-05-06 23:20:09', 'Deleted item id Kulapo in PPMP Cart lists'),
(1127, 'Kulapo', '2019-05-06 23:26:23', 'Deleted item id Kulapo in PPMP Cart lists'),
(1128, 'Kulapo', '2019-05-06 23:33:51', 'Deleted item id Kulapo in PPMP Cart lists'),
(1129, 'Kulapo', '2019-05-06 23:35:43', 'Deleted item id Kulapo in PPMP Cart lists'),
(1130, 'Kulapo', '2019-05-06 23:37:49', 'Deleted item id Kulapo in PPMP Cart lists'),
(1131, 'Kulapo', '2019-05-06 23:38:15', 'Deleted item id Kulapo in PPMP Cart lists'),
(1132, 'Kulapo', '2019-05-06 23:40:11', 'Deleted item id Kulapo in PPMP Cart lists'),
(1133, 'Kulapo', '2019-05-06 23:42:02', 'Deleted item id Kulapo in PPMP Cart lists'),
(1134, 'Kulapo', '2019-05-06 23:45:00', 'Deleted item id Kulapo in PPMP Cart lists'),
(1135, 'Kulapo', '2019-05-06 23:48:27', 'Deleted item id Kulapo in PPMP Cart lists'),
(1136, 'Kulapo', '2019-05-06 23:49:12', 'Deleted item id Kulapo in PPMP Cart lists'),
(1137, 'Kulapo', '2019-05-06 23:55:56', 'Deleted item id Kulapo in PPMP Cart lists'),
(1138, 'Kulapo', '2019-05-06 23:56:11', 'Deleted item id Kulapo in PPMP Cart lists'),
(1139, 'Kulapo', '2019-05-07 00:00:29', 'Deleted item id Kulapo in PPMP Cart lists'),
(1140, 'Kulapo', '2019-05-07 10:38:00', 'Deleted item id Kulapo in PPMP Cart lists'),
(1141, 'Kulapo', '2019-05-07 10:45:36', 'Deleted item id Kulapo in PPMP Cart lists'),
(1142, 'Kulapo', '2019-05-07 10:56:59', 'Deleted item id Kulapo in PPMP Cart lists'),
(1143, 'Kulapo', '2019-05-07 10:57:32', 'Add User .'),
(1144, 'Kulapo', '2019-05-07 11:04:12', 'Deleted item id Kulapo in PPMP Cart lists'),
(1145, 'Kulapo', '2019-05-07 11:07:14', 'Deleted item id Kulapo in PPMP Cart lists'),
(1146, 'Kulapo', '2019-05-07 11:10:32', 'Deleted item id Kulapo in PPMP Cart lists'),
(1147, 'Kulapo', '2019-05-07 11:16:58', 'Deleted item id Kulapo in PPMP Cart lists'),
(1148, 'Kulapo', '2019-05-07 11:17:16', 'Deleted item id Kulapo in PPMP Cart lists'),
(1149, 'Elizabeth', '2019-05-12 02:49:02', 'Add new BACreso by  '),
(1150, 'Elizabeth', '2019-05-12 02:49:27', 'Add new BACreso by  '),
(1151, 'Elizabeth', '2019-05-12 02:52:18', 'Add new BACreso by  '),
(1152, 'Elizabeth', '2019-05-12 03:21:54', 'Add new BACreso by  '),
(1153, 'Elizabeth', '2019-05-12 04:51:59', 'Deleted item id Elizabeth in PPMP Cart lists'),
(1154, 'Elizabeth', '2019-05-12 05:02:08', 'Add User .'),
(1155, 'Kulapo', '2019-05-12 14:10:59', 'Deleted item id Kulapo in PPMP Cart lists'),
(1156, 'Kulapo', '2019-05-12 14:11:06', 'Deleted item id Kulapo in PPMP Cart lists'),
(1157, 'Kulapo', '2019-05-12 15:11:12', 'Deleted item id Kulapo in PPMP Cart lists'),
(1158, 'Elizabeth', '2019-05-12 15:27:03', 'Add new BACreso by  '),
(1159, 'Elizabeth', '2019-05-12 15:27:56', 'Add new BACreso by  '),
(1160, 'Elizabeth', '2019-05-12 15:28:11', 'Add new BACreso by  '),
(1161, 'Elizabeth', '2019-05-12 15:34:14', 'Add new BACreso by  '),
(1162, 'Elizabeth', '2019-05-12 23:35:42', 'Reset the consolidated ppmp year Elizabeth'),
(1163, 'Elizabeth', '2019-05-15 00:10:37', 'Add User '),
(1164, 'Elizabeth', '2019-05-15 00:15:03', 'Deleted  user COE_Admin'),
(1165, 'Elizabeth', '2019-05-15 00:22:17', 'Add User '),
(1166, 'Elizabeth', '2019-05-15 00:22:36', 'Deleted  user admin'),
(1167, 'Elizabeth', '2019-05-15 00:46:17', 'Add User '),
(1168, 'Elizabeth', '2019-05-15 00:46:33', 'Deleted  user uibgg'),
(1169, 'Elizabeth', '2019-05-15 00:46:57', 'Add User '),
(1170, ' ', '2019-05-15 01:31:08', 'Add User .'),
(1171, ' ', '2019-05-15 01:31:50', 'Update item details  Canon 811 Tri-Color'),
(1172, ' ', '2019-05-15 01:32:32', 'Add User .'),
(1173, ' ', '2019-05-15 01:35:14', 'Update item details  Ballpen (Red)'),
(1174, ' ', '2019-05-15 01:35:25', 'Update item details  Canon 811 Tri-Color'),
(1175, 'Kulapo', '2019-05-15 01:37:46', 'Deleted item id Kulapo in PPMP Cart lists'),
(1176, 'Kulapo', '2019-05-15 01:38:28', 'Deleted item id Kulapo in PPMP Cart lists'),
(1177, 'Kulapo', '2019-05-15 11:43:02', 'Deleted item id Kulapo in PPMP Cart lists'),
(1178, 'Kulapo', '2019-05-15 11:52:42', 'Deleted item id Kulapo in PPMP Cart lists'),
(1179, 'Kulapo', '2019-05-15 11:55:34', 'Deleted item id Kulapo in PPMP Cart lists'),
(1180, 'Kulapo', '2019-05-15 12:02:26', 'Deleted item id Kulapo in PPMP Cart lists'),
(1181, 'Kulapo', '2019-05-15 12:23:45', 'Deleted item id Kulapo in PPMP Cart lists'),
(1182, 'Kulapo', '2019-05-15 12:23:47', 'Deleted item id Kulapo in PPMP Cart lists'),
(1183, 'Kulapo', '2019-05-15 12:24:50', 'Deleted item id Kulapo in PPMP Cart lists'),
(1184, 'Kulapo', '2019-05-15 20:48:54', 'Deleted item id Kulapo in PPMP Cart lists'),
(1185, 'Kulapo', '2019-05-15 20:49:02', 'Deleted item id Kulapo in PPMP Cart lists'),
(1186, 'Kulapo', '2019-05-15 21:12:04', 'Deleted item id Kulapo in PPMP Cart lists'),
(1187, 'Elizabeth', '2019-05-16 22:14:19', 'Reset the consolidated ppmp year Elizabeth'),
(1188, 'Elizabeth', '2019-05-16 22:14:30', 'Reset the consolidated ppmp year Elizabeth'),
(1189, 'Kulapo', '2019-05-17 00:12:58', 'Deleted item id Kulapo in PPMP Cart lists'),
(1190, 'Kulapo', '2019-05-17 00:19:44', 'Deleted item id Kulapo in PPMP Cart lists'),
(1191, 'Elizabeth', '2019-05-19 03:01:07', 'Reset the consolidated ppmp year Elizabeth'),
(1192, 'Elizabeth', '2019-05-19 03:01:47', 'Reset the consolidated ppmp year Elizabeth'),
(1193, 'Elizabeth', '2019-05-19 03:03:23', 'Reset the consolidated ppmp year Elizabeth'),
(1194, 'Elizabeth', '2019-05-19 03:03:28', 'Reset the consolidated ppmp year Elizabeth'),
(1195, 'Elizabeth', '2019-05-19 03:03:34', 'Reset the consolidated ppmp year Elizabeth'),
(1196, 'Elizabeth', '2019-05-19 03:15:03', 'Reset the consolidated ppmp year Elizabeth'),
(1197, 'Elizabeth', '2019-05-19 03:18:21', 'Reset the consolidated ppmp year Elizabeth'),
(1198, 'Elizabeth', '2019-05-19 03:18:33', 'Reset the consolidated ppmp year Elizabeth'),
(1199, 'Elizabeth', '2019-05-19 03:19:15', 'Reset the consolidated ppmp year Elizabeth'),
(1200, 'Elizabeth', '2019-05-19 03:19:18', 'Reset the consolidated ppmp year Elizabeth'),
(1201, 'Elizabeth', '2019-05-19 03:22:54', 'Reset the consolidated ppmp year Elizabeth'),
(1202, 'Elizabeth', '2019-05-19 03:23:24', 'Reset the consolidated ppmp year Elizabeth'),
(1203, 'Elizabeth', '2019-05-19 03:27:10', 'Reset the consolidated ppmp year Elizabeth'),
(1204, 'Elizabeth', '2019-05-19 03:36:37', 'Deleted item id Elizabeth in PPMP Cart lists'),
(1205, 'Elizabeth', '2019-05-19 03:36:47', 'Deleted item id Elizabeth in PPMP Cart lists'),
(1206, 'Elizabeth', '2019-05-19 03:37:39', 'Add new BACreso by  ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bac_resolution`
--

CREATE TABLE `tbl_bac_resolution` (
  `bacresID` int(11) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `Date_Created` date NOT NULL,
  `companyA` varchar(500) NOT NULL,
  `companyB` varchar(500) NOT NULL,
  `companyC` varchar(500) NOT NULL,
  `itemDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bac_resolution`
--

INSERT INTO `tbl_bac_resolution` (`bacresID`, `Year`, `Date_Created`, `companyA`, `companyB`, `companyC`, `itemDescription`) VALUES
(1, '2020', '2019-04-16', 'company a', 'company b', 'company c', 'Ballpen (Red)'),
(2, '2020', '2019-04-16', 'company x', 'company y', 'company z', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box'),
(3, '2020', '2019-04-21', 'a company', 'a company', 'a company', 'Canon 810 Black');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branchID` int(11) NOT NULL,
  `branch` varchar(300) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchID`, `branch`, `level`) VALUES
(1, 'Hagonoy Campus', 'user'),
(2, 'Meneses Campus', 'user'),
(3, 'Bustos Campus', 'user'),
(4, 'Sarmiento Campus', 'user'),
(5, 'Main Office', 'user'),
(6, 'Budget Office', 'administrator'),
(7, 'Procurement Unit', 'administrator'),
(8, 'College of Architecture and Fine Arts', 'user'),
(9, 'College of Arts and Letters', 'user'),
(10, 'College of Business Administration', 'user'),
(11, 'College of Criminal Justice Education', 'user'),
(12, 'College of Education', 'user'),
(13, 'College of Engineering', 'user'),
(14, 'College of Home Economics', 'user'),
(15, 'College of Industrial Technology', 'user'),
(16, 'College of Information and Communications Technology', 'user'),
(17, 'College of Law', 'user'),
(18, 'College of Nursing', 'user'),
(19, 'College of Physical Education, Recreation and Sports', 'user'),
(20, 'College of Science', 'user'),
(21, 'College of Social Science and Philosophy', 'user'),
(22, 'Graduate School', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fund`
--

CREATE TABLE `tbl_fund` (
  `fund_id` int(11) NOT NULL,
  `fund_description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fund`
--

INSERT INTO `tbl_fund` (`fund_id`, `fund_description`) VALUES
(1, 'GAA'),
(2, 'Income'),
(3, 'Fiduciary Fund');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iar`
--

CREATE TABLE `tbl_iar` (
  `iar_ID` int(11) NOT NULL,
  `iar_No` int(150) NOT NULL,
  `iar_Date` date NOT NULL,
  `invoice_No` int(150) NOT NULL,
  `inv_Date` date NOT NULL,
  `Year` int(11) NOT NULL,
  `supplier` varchar(350) NOT NULL,
  `POno` varchar(25) NOT NULL,
  `po_Date` date NOT NULL,
  `rod` varchar(350) NOT NULL,
  `rcc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_iar`
--

INSERT INTO `tbl_iar` (`iar_ID`, `iar_No`, `iar_Date`, `invoice_No`, `inv_Date`, `Year`, `supplier`, `POno`, `po_Date`, `rod`, `rcc`) VALUES
(1, 5678, '2019-05-19', 0, '0000-00-00', 2020, 'Supplier kong Ewan', '0001', '2019-05-12', 'Askalan', 'Eskorta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iar_items`
--

CREATE TABLE `tbl_iar_items` (
  `iar_itemsID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `POno` varchar(20) NOT NULL,
  `SPno` varchar(20) NOT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(350) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_iar_items`
--

INSERT INTO `tbl_iar_items` (`iar_itemsID`, `Year`, `POno`, `SPno`, `Unit`, `ItemDescription`, `Quantity`) VALUES
(1, 2020, '0001', '', 'Pieces', 'Ballpen (Black)', 19),
(2, 2020, '0001', '', 'Cartridges', 'Canon 810 Black', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_category`
--

CREATE TABLE `tbl_item_category` (
  `itemcategoryID` int(11) NOT NULL,
  `ItemCatDesc` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_category`
--

INSERT INTO `tbl_item_category` (`itemcategoryID`, `ItemCatDesc`) VALUES
(1, 'INK/TONER FOR PRINTERS'),
(2, 'INK/TONER FOR PHOTOCOPYING MACHINE'),
(3, 'COMMON OFFICE SUPPLIES'),
(4, 'PAPER'),
(5, 'COMMON OTHER SUPPLIES & MATERIALS'),
(6, 'DIPLOMA HOLDER'),
(7, 'STAMPING MACHINE'),
(8, 'PLAQUES, TROPHIES & LEI'),
(9, 'FLAGS & FLAGPOLE'),
(10, 'FURNITURE & FIXTURES (LESS THAN P15,000)'),
(11, 'FILING CABINET'),
(12, 'MONOBLOCK CHAIRS'),
(13, 'OFFICE EQUIPMENT (LESS THAN P15,000)'),
(14, 'PRINTER'),
(15, 'APPLIANCES  (LESS THAN P15,000)'),
(16, 'MACHINERY & EQUIPMENT (LESS THAN P15,000)'),
(17, 'ICT EQUIPMENT & PERIPHERALS  (LESS THAN P15,000)'),
(18, 'JANITORIAL SUPPLIES'),
(19, 'OFFICE EQUIPMENT (P15,000 and UP)'),
(20, 'ICT EQUIPMENT (P15,000 and UP)'),
(21, 'MEDICAL EQUIPMENT (P15,000 and UP)'),
(22, 'SPORTS EQUIPMENT (P15,000 and UP)'),
(23, 'MUSICAL INSTRUMENTS/SOUND SYSTEM (P15,000 and UP)'),
(24, 'TECHNICAL & SCIENTIFIC EQUIPMENT (P15,000 and UP)'),
(25, 'OTHER MACHINERY & EQUIPMENT (P15,000 and UP)'),
(26, 'LABORATORY EQUIPMENT (P15,000 and UP)'),
(27, 'PHYSICS LABORATORY EQUIPMENT (P15,000 and UP)'),
(28, 'CRIMINOLOGY LABORATORY EQUIPMENT (P15,000 and UP)'),
(29, 'AUTOMOTIVE DEPARTMENT (P15,000 and UP)'),
(30, 'BIOLOGY (P15,000 and UP)'),
(31, 'FOOD SCIENCE (P15,000 and UP)'),
(32, 'ENVIRONMENTAL SCIENCE (P15,000 and UP)'),
(33, 'CHEMISTRY (P15,000 and UP)'),
(34, 'BAKING (P15,000 and UP)'),
(35, 'FURNITURES AND FIXTURES (P15,000 and UP)'),
(36, 'TEXTBOOKS & INSTRUCTIONAL MATERIALS'),
(37, 'SUBSCRIPTION EXPENSES'),
(38, 'OTHER MOOE (EVENTS & ACTIVITIES)'),
(39, 'REPRESENTATION EXPENSES'),
(40, 'CONSTRUCTION (PMO)'),
(41, 'REPAIR & MAINTENANCE (FMO)'),
(42, 'ProjectorsNew'),
(45, 'FIRE EXTINGUISHER'),
(47, 'monoblock'),
(48, 'DUGONG'),
(51, 'Pusa'),
(52, 'ASO'),
(53, 'APROCAPOLCO'),
(54, 'APROS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_details`
--

CREATE TABLE `tbl_item_details` (
  `itemdetailID` int(11) NOT NULL,
  `itemcategoryID` int(11) NOT NULL,
  `itemdetailDesc` varchar(350) NOT NULL,
  `UnitOfMeasurement` varchar(20) NOT NULL,
  `PriceCatalogue` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_details`
--

INSERT INTO `tbl_item_details` (`itemdetailID`, `itemcategoryID`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`) VALUES
(1, 1, 'Canon 810 Black', 'Cartridges', '1022.32'),
(2, 1, 'Canon 811 Tri-Color', 'Cartridges', '774.00'),
(3, 1, 'Hewlett Packard 85 A', 'Cartridges', '3200.00'),
(4, 2, 'Gestetner Toner, 1900', 'Cartridges', '3800.00'),
(5, 3, 'Ballpen (Black)', 'Pieces', '8.00'),
(6, 3, 'Ballpen (Blue)', 'Pieces', '8.00'),
(7, 3, 'Ballpen (Red)', 'Pieces', '8.00'),
(8, 5, 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Pieces', '200.00'),
(9, 5, 'Clear Folder Legal Size', 'Pieces', '30.00'),
(10, 5, 'Clearbook Legal Size', 'Piece', '60.00'),
(11, 15, 'Cutter Knife, heavy duty', 'Piece', '30.00'),
(12, 5, 'Data Folder, made with chipboard, taglia lock', 'Piece', '270.00'),
(13, 14, 'Epson110', 'Unit', '5000.00'),
(14, 42, 'LCD', 'Unit', '25000.00'),
(15, 3, 'executive chair', 'Pieces', '35000.00'),
(16, 11, 'gasolina', 'Liters', '3500.00'),
(17, 47, 'with arm rest', 'Pieces', '1350.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po`
--

CREATE TABLE `tbl_po` (
  `poID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `EntityName` varchar(300) NOT NULL,
  `supplier` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `TIN` varchar(50) NOT NULL,
  `POno` varchar(150) NOT NULL,
  `PO_Date` date NOT NULL,
  `MOP` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po`
--

INSERT INTO `tbl_po` (`poID`, `Year`, `EntityName`, `supplier`, `address`, `email`, `contact_no`, `TIN`, `POno`, `PO_Date`, `MOP`) VALUES
(5, 0, '', '', '', '', '', '', '0000', '0000-00-00', ''),
(6, 2020, '', 'Supplier kong Ewan', 'Ewan kung Ewan', 'ewan@gmail.com', '09871234567', '1234567890', '0001', '2019-05-12', 'Check and Carry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_items`
--

CREATE TABLE `tbl_po_items` (
  `poID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `POno` varchar(20) NOT NULL,
  `StockPropertyNo` varchar(20) NOT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_items`
--

INSERT INTO `tbl_po_items` (`poID`, `Year`, `POno`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`) VALUES
(3, 2020, '0001', '', 'Pieces', 'Ballpen (Black)', 19, 8, 152),
(4, 2020, '0001', '', 'Cartridges', 'Canon 810 Black', 15, 1022, 15335);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppmp`
--

CREATE TABLE `tbl_ppmp` (
  `ppmpID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Year` varchar(6) NOT NULL,
  `EndUserUnit` varchar(300) NOT NULL,
  `SourceOfFund` varchar(300) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Priority` varchar(3) NOT NULL,
  `BO_PPMP_Status` varchar(15) NOT NULL,
  `PU_PPMP_Status` varchar(15) NOT NULL,
  `purpose` varchar(300) NOT NULL,
  `date_requested` datetime NOT NULL,
  `ItemCatDesc` varchar(350) NOT NULL,
  `itemdetailDesc` varchar(350) NOT NULL,
  `UnitOfMeasurement` varchar(20) NOT NULL,
  `PriceCatalogue` decimal(11,2) NOT NULL,
  `Jan` int(11) NOT NULL,
  `Feb` int(11) NOT NULL,
  `Mar` int(11) NOT NULL,
  `Apr` int(11) NOT NULL,
  `May` int(11) NOT NULL,
  `Jun` int(11) NOT NULL,
  `Jul` int(11) NOT NULL,
  `Aug` int(11) NOT NULL,
  `Sep` int(11) NOT NULL,
  `Oct` int(11) NOT NULL,
  `Nov` int(11) NOT NULL,
  `Dec` int(11) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `TotalAmount` decimal(11,2) NOT NULL,
  `Remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppmp`
--

INSERT INTO `tbl_ppmp` (`ppmpID`, `user_id`, `Year`, `EndUserUnit`, `SourceOfFund`, `Status`, `Priority`, `BO_PPMP_Status`, `PU_PPMP_Status`, `purpose`, `date_requested`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`, `TotalQty`, `TotalAmount`, `Remarks`) VALUES
(2, 14, '2020', 'College of Information and Communications Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'TRAINING EXPENSES', '2019-04-16 11:25:56', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', '3200.00', 2, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, '38400.00', 'hi mam'),
(3, 14, '2020', 'College of Information and Communications Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'TRAINING EXPENSES', '2019-04-16 11:28:19', 'COMMON OFFICE SUPPLIES', 'Ballpen (Black)', 'Pieces', '8.00', 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, '56.00', ''),
(4, 14, '2020', 'College of Information and Communications Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'TRAINING EXPENSES', '2019-04-16 11:28:48', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', '30.00', 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, '240.00', ''),
(5, 14, '2020', 'College of Information and Communications Technology', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'TRAINING EXPENSES', '2019-04-16 11:33:31', 'Chairs', 'executive chair', 'Pieces', '35000.00', 10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 100, 10, 123, '4305000.00', ''),
(34, 15, '2019', 'College of Industrial Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'PRINTING AND PUBLICATION EXPENSES', '2019-05-06 16:57:40', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', '30.00', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, '150.00', ''),
(35, 3, '2020', 'College of Nursing', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'OTHER PROFESSIONAL SERVICES', '2019-05-06 22:51:35', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', '1022.32', 5, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 15, '15334.80', ''),
(36, 3, '2020', 'College of Nursing', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'PRINTING AND PUBLICATION EXPENSES', '2019-05-06 22:51:58', 'COMMON OFFICE SUPPLIES', 'Ballpen (Black)', 'Pieces', '8.00', 0, 0, 0, 6, 0, 0, 0, 6, 0, 0, 0, 0, 12, '96.00', ''),
(37, 3, '2019', 'College of Nursing', 'GAA', 'Requested', 'No', 'Approved', '', 'AUDITINGS', '2019-05-15 01:31:08', 'INK/TONER FOR PRINTERS', 'Canon 811 Tri-Color', 'Cartridges', '774.00', 2, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 7, '5418.00', ''),
(38, 3, '2019', 'College of Nursing', 'GAA', 'Requested', 'No', 'Approved', '', 'OTHER PROFESSIONAL SERVICES', '2019-05-15 01:32:32', 'COMMON OFFICE SUPPLIES', 'Ballpen (Red)', 'Pieces', '8.00', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, '80.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppmp_consolidated`
--

CREATE TABLE `tbl_ppmp_consolidated` (
  `consolidatedID` int(11) NOT NULL,
  `Year` varchar(6) NOT NULL,
  `ItemCatDesc` varchar(350) NOT NULL,
  `itemdetailDesc` varchar(350) NOT NULL,
  `UnitOfMeasurement` varchar(20) NOT NULL,
  `PriceCatalogue` decimal(11,2) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `TotalAmount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppmp_consolidated`
--

INSERT INTO `tbl_ppmp_consolidated` (`consolidatedID`, `Year`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `TotalQty`, `TotalAmount`) VALUES
(39, '2019', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', '30.00', 5, '150.00'),
(115, '2020', 'COMMON OFFICE SUPPLIES', 'Ballpen (Black)', 'Pieces', '8.00', 19, '152.00'),
(116, '2020', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', '1022.32', 15, '15334.80'),
(117, '2020', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', '30.00', 8, '240.00'),
(118, '2020', 'Chairs', 'executive chair', 'Pieces', '35000.00', 123, '4305000.00'),
(119, '2020', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', '3200.00', 12, '38400.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr`
--

CREATE TABLE `tbl_pr` (
  `prID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `EntityName` varchar(300) NOT NULL,
  `FundCluster` varchar(300) NOT NULL,
  `OfficeSection` varchar(300) NOT NULL,
  `PRno` varchar(20) NOT NULL,
  `ResponsibilityCenter` varchar(300) NOT NULL,
  `PR_Date` date NOT NULL,
  `GrandTotal` int(11) NOT NULL,
  `Purpose` text NOT NULL,
  `RequestedBy` varchar(300) NOT NULL,
  `RequestingSignature` longblob NOT NULL,
  `RequestingDesignation` varchar(300) NOT NULL,
  `ApprovedBy` varchar(300) NOT NULL,
  `ApprovingSignature` longblob NOT NULL,
  `ApprovingDesignation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr`
--

INSERT INTO `tbl_pr` (`prID`, `Year`, `EntityName`, `FundCluster`, `OfficeSection`, `PRno`, `ResponsibilityCenter`, `PR_Date`, `GrandTotal`, `Purpose`, `RequestedBy`, `RequestingSignature`, `RequestingDesignation`, `ApprovedBy`, `ApprovingSignature`, `ApprovingDesignation`) VALUES
(27, 2020, 'College of Industrial Technology', '', '', '0001', '', '2019-04-16', 0, '', 'keno piad', '', '', '', '', ''),
(28, 2019, 'College of Education', '', '', '0002', '', '2019-05-06', 0, '', 'COES', '', '', '', '', ''),
(29, 2019, 'Bustos Campus', '', '', '0003', '', '2019-05-06', 0, '', 'Bago', '', '', '', '', ''),
(30, 2020, 'College of Nursing', '', '', '0004', '', '2019-05-07', 0, '', 'Kulapo', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr_items`
--

CREATE TABLE `tbl_pr_items` (
  `prID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `PRno` varchar(20) NOT NULL,
  `StockPropertyNo` varchar(20) NOT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr_items`
--

INSERT INTO `tbl_pr_items` (`prID`, `Year`, `PRno`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`) VALUES
(1, 2020, '0001', '', 'Cartridges', 'Canon 811 Tri-Color', 32, 774, 24768),
(2, 2020, '0001', '', 'Pieces', 'Ballpen (Red)', 23, 8, 184),
(3, 2020, '0001', '', 'Piece', 'Data Folder, made with chipboard, taglia lock', 9, 270, 2430),
(4, 2020, '0001', '', 'Piece', 'Clearbook Legal Size', 2, 60, 120),
(5, 2020, '0001', '', 'Cartridges', 'Gestetner Toner, 1900', 3, 3800, 11400),
(6, 2020, '0001', '', 'Pieces', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 3, 200, 600),
(7, 2019, '0002', '', 'Cartridges', 'Canon 810 Black', 10, 1022, 10223),
(8, 2019, '0002', '', 'Pieces', 'Ballpen (Blue)', 0, 8, 0),
(9, 2019, '0003', '', 'Piece', 'Clearbook Legal Size', 9, 60, 540),
(14, 2020, '0004', '', 'Cartridges', 'Canon 810 Black', 15, 1022, 15335),
(15, 2020, '0004', '', 'Pieces', 'Ballpen (Black)', 12, 8, 96);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purpose`
--

CREATE TABLE `tbl_purpose` (
  `purposeID` int(11) NOT NULL,
  `purpose` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purpose`
--

INSERT INTO `tbl_purpose` (`purposeID`, `purpose`) VALUES
(1, 'TRAVELLING EXPENSES-LOCAL'),
(2, 'TRAVELLING EXPENSES-FOREIGN'),
(3, 'TRAINING EXPENSES'),
(4, 'SCHOLARSHIP GRANTS/EXPENSES'),
(6, 'OFFICE SUPPLIES EXPENSES'),
(7, 'ACCOUNTABLE FORMS EXPENSES'),
(8, 'FUEL, OIL AND LUBRICANTS EXPENSES'),
(9, 'TEXTBOOKS AND INSTRUCTIONAL MATERIALS EXPENSES'),
(10, 'OTHER SUPPLIES AND MATERIALS EXPENSES'),
(11, 'WATER EXPENSES'),
(12, 'ELECTRICITY EXPENSES'),
(13, 'POSTAGE AND COURIER SERVICES'),
(14, 'TELEPHONE EXPENSES-MOBILE'),
(15, 'TELEPHONE EXPENSES-LANDLINE'),
(16, 'AWARDS/REWARDS EXPENSES'),
(17, 'SURVEY EXPENSES'),
(18, 'EXTRAORDINARY AND MISCELLANEOUS EXPENSES'),
(19, 'AUDITING SERVICES'),
(20, 'OTHER PROFESSIONAL SERVICES'),
(21, 'JANITORIAL SERVICES'),
(22, 'SECURITY SERVICES'),
(23, 'OTHER GENERAL SERVICES'),
(24, 'REPAIRS & MAINTENANCE-BUILDINGS'),
(25, 'REPAIRS & MAINTENANCE-MACHINERY'),
(26, 'REPAIRS & MAINTENANCE-FURNITURE & FIXTURES'),
(27, 'REPAIRS & MAINTENANCE-TRANSPORTATION EQUIPMENT'),
(28, 'REPAIRS & MAINTENANCE-OTHER PROPERTY, PLANT & EQUIPMENT'),
(29, 'TAXES, DUTIES AND LICENSES'),
(30, 'FIDELITY BOND PREMIUMS'),
(31, 'INSURANCE EXPENSES'),
(32, 'ADVERTISING EXPENSES'),
(33, 'PRINTING AND PUBLICATION EXPENSES'),
(34, 'REPRESENTATION EXPENSES'),
(35, 'RENTS-MOTOR VEHICLES'),
(36, 'MEMBERSHIP DUES & CONTRIBUTIONS TO ORGANIZATIONS'),
(37, 'SUBSCRIPTION EXPENSES'),
(38, 'ssdad'),
(39, 'AUDITING FIRMS'),
(40, 'AUDITINGS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `quotation_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Year` varchar(4) NOT NULL,
  `Company` varchar(300) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Contact_Person` varchar(300) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `TIN` varchar(30) NOT NULL,
  `Brand_Model` varchar(300) NOT NULL,
  `itemDescription` varchar(500) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `unitOfMeasurement` varchar(100) NOT NULL,
  `unitPrice` varchar(50) NOT NULL,
  `ABC_Total_Price` int(11) NOT NULL,
  `extPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`quotation_id`, `date`, `Year`, `Company`, `Address`, `Contact_Person`, `Contact_No`, `email`, `TIN`, `Brand_Model`, `itemDescription`, `Quantity`, `unitOfMeasurement`, `unitPrice`, `ABC_Total_Price`, `extPrice`) VALUES
(1, '2020-05-01', '2020', 'company a', 'Address Company A', 'Employee Company A', '234567', 'aimram314@yahoo.com', '244', 'panda', 'Ballpen (Red)', 23, 'Pieces', '10', 0, 230),
(2, '2020-05-01', '2020', 'company b', 'Employee Company B', 'Employee Company B', '234', 'bulsugsstudents@gmail.com', '244', 'lotus', 'Ballpen (Red)', 23, 'Pieces', '11', 0, 253),
(3, '2020-05-01', '2020', 'company c', 'Employee Company C', 'Employee Company C', '567', 'vicz17@yahoo.com', '244', 'XB', 'Ballpen (Black)', 23, 'Pieces', '6', 0, 144),
(4, '2020-05-01', '2020', 'company x', 'Employee Company X', 'Employee Company X', '222', 'vicz17@yahoo.com', '244', 'panda', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 3, 'Pieces', '96', 0, 30),
(5, '2020-05-01', '2020', 'company y', 'Employee Company Y', 'Employee Company Y', '234567', 'aimram314@yahoo.com', '244', 'lotus', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 3, 'Pieces', '1', 0, 33),
(6, '2020-05-01', '2020', 'company z', 'Employee Company Z', 'Employee Company Z', '234567', 'melrose_212@yahoo.com', '244', 'XB', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 3, 'Pieces', '0.50', 0, 3),
(7, '2020-05-01', '2020', 'a company', 'SAN JOSE (POB.)', 'rommel', '09424899887', 'rommel_pabustan@yahoo.com', '123-123-45', 'hp', 'Canon 810 Black', 32, 'Cartridges', '200', 0, 6400);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `branch` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `registered_date` date NOT NULL,
  `approved` varchar(3) NOT NULL,
  `Remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Year`, `branch`, `username`, `password`, `level`, `registered_date`, `approved`, `Remarks`) VALUES
(3, 2020, 'College of Nursing', 'Kulapo', 'user', 'user', '2017-12-26', 'yes', 'Default'),
(28, 2020, 'Procurement Unit', 'Elizabeth', 'admin', 'administrator', '2019-05-06', 'yes', 'Registered by Admin'),
(29, 2019, 'Budget Office', 'NenitaBO', 'admin', 'administrator', '2019-05-06', 'yes', 'Registered by Admin'),
(30, 2019, 'Graduate School', 'Pobre', ')5Q2#Srb', 'user', '2019-05-15', 'yes', 'Registered by Admin'),
(31, 2019, 'College of Architecture and Fine Arts', 'mamaland', 'sO7Z@9h,', 'user', '2019-05-15', 'yes', 'Registered by Admin'),
(32, 2019, 'Budget Office', 'momoland', '4JQ-2i+y', 'administrator', '2019-05-16', 'yes', 'Registered by Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `login_date` varchar(50) NOT NULL,
  `logout_date` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(0, 'Rommel.Pabustan', '2018-06-17 12:16:24', '2019-05-19 02:58:46', 3),
(507, 'John.Peter', '2018-03-26 23:23:42', '2018-08-25 22:53:33', 8),
(508, 'Elizabeth.Sunga', '2018-03-26 23:40:57', '2019-05-06 22:49:25', 12),
(509, 'Cristo.Hesus', '2018-03-26 23:48:47', '', 10),
(510, 'Elizabeth.Sunga', '2018-03-26 23:59:25', '2019-05-06 22:49:25', 12),
(511, 'Elizabeth.Sunga', '2018-03-29 21:33:36', '2019-05-06 22:49:25', 12),
(512, 'Elizabeth.Sunga', '2018-03-29 23:01:46', '2019-05-06 22:49:25', 12),
(513, 'Rommel.Pabustan', '2018-03-29 23:19:50', '2019-05-19 02:58:46', 3),
(514, 'Rommel.Pabustan', '2018-04-02 18:48:21', '2019-05-19 02:58:46', 3),
(515, 'Elizabeth.Sunga', '2018-04-04 22:13:32', '2019-05-06 22:49:25', 12),
(516, 'Elizabeth.Sunga', '2018-04-12 22:02:10', '2019-05-06 22:49:25', 12),
(517, 'Elizabeth.Sunga', '2018-04-14 20:56:39', '2019-05-06 22:49:25', 12),
(518, 'Rommel.Pabustan', '2018-04-14 21:00:30', '2019-05-19 02:58:46', 3),
(519, 'Elizabeth.Sunga', '2018-04-14 21:02:21', '2019-05-06 22:49:25', 12),
(520, 'Elizabeth.Sunga', '2018-04-15 12:03:30', '2019-05-06 22:49:25', 12),
(521, 'Elizabeth.Sunga', '2018-04-15 14:06:21', '2019-05-06 22:49:25', 12),
(522, 'Elizabeth.Sunga', '2018-04-15 15:06:16', '2019-05-06 22:49:25', 12),
(523, 'Elizabeth.Sunga', '2018-04-15 23:15:22', '2019-05-06 22:49:25', 12),
(524, 'Elizabeth.Sunga', '2018-04-15 23:49:47', '2019-05-06 22:49:25', 12),
(525, 'Elizabeth.Sunga', '2018-04-16 09:20:49', '2019-05-06 22:49:25', 12),
(526, 'Elizabeth.Sunga', '2018-04-16 09:40:13', '2019-05-06 22:49:25', 12),
(527, 'Elizabeth.Sunga', '2018-04-16 12:29:47', '2019-05-06 22:49:25', 12),
(528, 'Elizabeth.Sunga', '2018-04-17 19:35:27', '2019-05-06 22:49:25', 12),
(529, 'Elizabeth.Sunga', '2018-04-18 23:41:08', '2019-05-06 22:49:25', 12),
(530, 'Elizabeth.Sunga', '2018-04-20 20:22:49', '2019-05-06 22:49:25', 12),
(531, 'Elizabeth.Sunga', '2018-04-21 12:25:18', '2019-05-06 22:49:25', 12),
(532, 'Elizabeth.Sunga', '2018-04-21 12:26:36', '2019-05-06 22:49:25', 12),
(533, 'John.Peter', '2018-06-17 12:27:14', '2018-08-25 22:53:33', 8),
(534, 'Rommel.Pabustan', '2018-06-17 13:38:19', '2019-05-19 02:58:46', 3),
(535, 'Rommel.Pabustan', '2018-06-17 14:00:44', '2019-05-19 02:58:46', 3),
(536, 'Rommel.Pabustan', '2018-06-19 19:20:48', '2019-05-19 02:58:46', 3),
(537, 'John.Peter', '2018-06-23 10:52:55', '2018-08-25 22:53:33', 8),
(538, 'John.Peter', '2018-06-23 11:01:19', '2018-08-25 22:53:33', 8),
(539, 'Rommel.Pabustan', '2018-06-23 11:18:49', '2019-05-19 02:58:46', 3),
(540, 'John.Peter', '2018-06-23 17:11:57', '2018-08-25 22:53:33', 8),
(541, 'Rommel.Pabustan', '2018-06-23 17:12:32', '2019-05-19 02:58:46', 3),
(542, 'Rommel.Pabustan', '2018-07-11 12:09:32', '2019-05-19 02:58:46', 3),
(543, 'John.Peter', '2018-07-19 12:33:27', '2018-08-25 22:53:33', 8),
(544, 'Rommel.Pabustan', '2018-07-19 12:34:54', '2019-05-19 02:58:46', 3),
(545, 'John.Peter', '2018-08-25 22:45:53', '2018-08-25 22:53:33', 8),
(546, 'Rommel.Pabustan', '2018-08-25 22:53:56', '2019-05-19 02:58:46', 3),
(547, 'Rommel.Pabustan', '2018-09-17 12:15:19', '2019-05-19 02:58:46', 3),
(548, 'Rommel.Pabustan', '2018-11-02 14:43:17', '2019-05-19 02:58:46', 3),
(549, 'Rommel.Pabustan', '2018-11-02 14:54:07', '2019-05-19 02:58:46', 3),
(550, 'Rommel.Pabustan', '2018-11-02 15:23:01', '2019-05-19 02:58:46', 3),
(551, 'Rommel.Pabustan', '2018-11-02 15:28:31', '2019-05-19 02:58:46', 3),
(552, 'Elizabeth.Sunga', '2018-11-02 17:20:54', '2019-05-06 22:49:25', 12),
(553, 'Elizabeth.Sunga', '2018-11-02 17:23:58', '2019-05-06 22:49:25', 12),
(554, 'Elizabeth.Sunga', '2018-11-03 21:58:27', '2019-05-06 22:49:25', 12),
(555, 'Rommel.Pabustan', '2018-11-08 20:44:41', '2019-05-19 02:58:46', 3),
(556, 'Rommel.Pabustan', '2018-12-20 12:06:52', '2019-05-19 02:58:46', 3),
(557, 'Elizabeth.Sunga', '2018-12-26 13:31:18', '2019-05-06 22:49:25', 12),
(558, 'Elizabeth.Sunga', '2018-12-26 13:45:11', '2019-05-06 22:49:25', 12),
(559, 'Elizabeth.Sunga', '2018-12-27 10:11:20', '2019-05-06 22:49:25', 12),
(560, 'Elizabeth.Sunga', '2018-12-27 18:42:32', '2019-05-06 22:49:25', 12),
(561, 'Elizabeth.Sunga', '2018-12-27 20:16:09', '2019-05-06 22:49:25', 12),
(562, 'Elizabeth.Sunga', '2018-12-27 20:27:08', '2019-05-06 22:49:25', 12),
(563, 'Elizabeth.Sunga', '2018-12-27 22:34:18', '2019-05-06 22:49:25', 12),
(564, 'Elizabeth.Sunga', '2018-12-28 16:14:29', '2019-05-06 22:49:25', 12),
(565, 'Elizabeth.Sunga', '2018-12-28 17:28:07', '2019-05-06 22:49:25', 12),
(566, 'Elizabeth.Sunga', '2018-12-28 23:20:45', '2019-05-06 22:49:25', 12),
(567, 'Elizabeth.Sunga', '2018-12-29 23:07:19', '2019-05-06 22:49:25', 12),
(568, 'Elizabeth.Sunga', '2018-12-30 00:32:30', '2019-05-06 22:49:25', 12),
(569, 'Elizabeth.Sunga', '2018-12-30 04:09:26', '2019-05-06 22:49:25', 12),
(570, 'Elizabeth.Sunga', '2018-12-30 12:39:57', '2019-05-06 22:49:25', 12),
(571, 'Elizabeth.Sunga', '2018-12-30 12:40:32', '2019-05-06 22:49:25', 12),
(572, 'Elizabeth.Sunga', '2018-12-30 13:20:17', '2019-05-06 22:49:25', 12),
(573, 'Elizabeth.Sunga', '2018-12-30 14:45:47', '2019-05-06 22:49:25', 12),
(574, 'Elizabeth.Sunga', '2018-12-30 17:38:11', '2019-05-06 22:49:25', 12),
(575, 'Elizabeth.Sunga', '2018-12-31 00:12:40', '2019-05-06 22:49:25', 12),
(576, 'Elizabeth.Sunga', '2018-12-31 12:21:08', '2019-05-06 22:49:25', 12),
(577, 'Elizabeth.Sunga', '2018-12-31 14:09:23', '2019-05-06 22:49:25', 12),
(578, 'Elizabeth.Sunga', '2018-12-31 19:54:44', '2019-05-06 22:49:25', 12),
(579, 'Elizabeth.Sunga', '2018-12-31 19:55:06', '2019-05-06 22:49:25', 12),
(580, 'Elizabeth.Sunga', '2018-12-31 21:38:16', '2019-05-06 22:49:25', 12),
(581, 'Elizabeth.Sunga', '2019-01-01 20:59:39', '2019-05-06 22:49:25', 12),
(582, 'Elizabeth.Sunga', '2019-01-01 23:51:02', '2019-05-06 22:49:25', 12),
(583, 'Elizabeth.Sunga', '2019-01-02 00:35:37', '2019-05-06 22:49:25', 12),
(584, 'Elizabeth.Sunga', '2019-01-02 12:10:10', '2019-05-06 22:49:25', 12),
(585, 'Elizabeth.Sunga', '2019-02-10 14:18:59', '2019-05-06 22:49:25', 12),
(586, 'Elizabeth.Sunga', '2019-02-10 14:20:12', '2019-05-06 22:49:25', 12),
(587, 'Elizabeth.Sunga', '2019-02-10 14:20:33', '2019-05-06 22:49:25', 12),
(588, 'Elizabeth.Sunga', '2019-02-12 20:46:19', '2019-05-06 22:49:25', 12),
(589, 'Elizabeth.Sunga', '2019-02-12 20:48:26', '2019-05-06 22:49:25', 12),
(590, 'Elizabeth.Sunga', '2019-02-15 22:57:15', '2019-05-06 22:49:25', 12),
(591, 'Elizabeth.Sunga', '2019-02-25 01:59:08', '2019-05-06 22:49:25', 12),
(592, 'Elizabeth.Sunga', '2019-02-25 11:49:20', '2019-05-06 22:49:25', 12),
(593, 'Elizabeth.Sunga', '2019-03-03 01:04:58', '2019-05-06 22:49:25', 12),
(594, 'Elizabeth.Sunga', '2019-03-03 18:36:24', '2019-05-06 22:49:25', 12),
(595, 'Elizabeth.Sunga', '2019-03-07 01:06:17', '2019-05-06 22:49:25', 12),
(596, 'Elizabeth.Sunga', '2019-03-07 02:24:14', '2019-05-06 22:49:25', 12),
(597, 'Elizabeth.Sunga', '2019-03-07 03:42:27', '2019-05-06 22:49:25', 12),
(598, 'Elizabeth.Sunga', '2019-03-09 06:28:43', '2019-05-06 22:49:25', 12),
(599, 'Elizabeth.Sunga', '2019-03-09 09:22:15', '2019-05-06 22:49:25', 12),
(600, 'Elizabeth.Sunga', '2019-03-09 10:41:25', '2019-05-06 22:49:25', 12),
(601, 'Elizabeth.Sunga', '2019-03-10 17:13:27', '2019-05-06 22:49:25', 12),
(602, 'Elizabeth.Sunga', '2019-03-10 18:27:28', '2019-05-06 22:49:25', 12),
(603, 'Elizabeth.Sunga', '2019-03-10 22:05:09', '2019-05-06 22:49:25', 12),
(604, 'Elizabeth.Sunga', '2019-03-10 22:35:54', '2019-05-06 22:49:25', 12),
(605, 'Elizabeth.Sunga', '2019-03-11 03:20:08', '2019-05-06 22:49:25', 12),
(606, 'Rommel.Pabustan', '2019-03-12 14:10:46', '2019-05-19 02:58:46', 3),
(607, 'Rommel.Pabustan', '2019-03-12 14:48:12', '2019-05-19 02:58:46', 3),
(608, 'Elizabeth.Sunga', '2019-03-12 15:19:19', '2019-05-06 22:49:25', 12),
(609, 'Rommel.Pabustan', '2019-03-12 15:23:42', '2019-05-19 02:58:46', 3),
(610, 'Nenita.Chico', '2019-03-12 15:27:30', '2019-05-06 16:59:17', 13),
(611, 'Elizabeth.Sunga', '2019-03-12 15:30:21', '2019-05-06 22:49:25', 12),
(612, 'Rommel.Pabustan', '2019-03-12 15:30:57', '2019-05-19 02:58:46', 3),
(613, 'Jane.Doe', '2019-03-12 15:31:54', '2019-03-15 01:32:51', 18),
(614, 'Elizabeth.Sunga', '2019-03-12 15:33:49', '2019-05-06 22:49:25', 12),
(615, 'Elizabeth.Sunga', '2019-03-13 21:32:04', '2019-05-06 22:49:25', 12),
(616, 'Elizabeth.Sunga', '2019-03-13 21:37:43', '2019-05-06 22:49:25', 12),
(617, 'Elizabeth.Sunga', '2019-03-13 21:49:19', '2019-05-06 22:49:25', 12),
(618, 'Elizabeth.Sunga', '2019-03-13 23:32:52', '2019-05-06 22:49:25', 12),
(619, 'Elizabeth.Sunga', '2019-03-14 07:27:43', '2019-05-06 22:49:25', 12),
(620, 'Elizabeth.Sunga', '2019-03-14 07:29:06', '2019-05-06 22:49:25', 12),
(621, 'Jane.Doe', '2019-03-14 07:31:26', '2019-03-15 01:32:51', 18),
(622, 'Elizabeth.Sunga', '2019-03-14 07:41:30', '2019-05-06 22:49:25', 12),
(623, 'Elizabeth.Sunga', '2019-03-14 08:14:34', '2019-05-06 22:49:25', 12),
(624, 'Elizabeth.Sunga', '2019-03-14 17:49:47', '2019-05-06 22:49:25', 12),
(625, 'Elizabeth.Sunga', '2019-03-15 01:08:12', '2019-05-06 22:49:25', 12),
(626, 'Jane.Doe', '2019-03-15 01:25:24', '2019-03-15 01:32:51', 18),
(627, 'Rommel.Pabustan', '2019-03-15 01:28:34', '2019-05-19 02:58:46', 3),
(628, 'Nenita.Chico', '2019-03-15 01:29:13', '2019-05-06 16:59:17', 13),
(629, 'Nenita.Chico', '2019-03-15 01:29:14', '2019-05-06 16:59:17', 13),
(630, 'Jane.Doe', '2019-03-15 01:32:22', '2019-03-15 01:32:51', 18),
(631, 'Rommel.Pabustan', '2019-03-19 11:03:17', '2019-05-19 02:58:46', 3),
(632, 'Nenita.Chico', '2019-03-19 11:03:49', '2019-05-06 16:59:17', 13),
(633, 'Nenita.Chico', '2019-03-19 11:20:08', '2019-05-06 16:59:17', 13),
(634, 'juana.sanchez', '2019-03-19 11:20:41', '2019-05-06 05:24:38', 20),
(635, 'Elizabeth.Sunga', '2019-03-19 13:22:07', '2019-05-06 22:49:25', 12),
(636, 'Rommel.Pabustan', '2019-03-19 13:22:51', '2019-05-19 02:58:46', 3),
(637, 'juana.sanchez', '2019-03-19 13:23:21', '2019-05-06 05:24:38', 20),
(638, 'Elizabeth.Sunga', '2019-03-19 13:28:38', '2019-05-06 22:49:25', 12),
(639, 'bong.revilla', '2019-03-19 13:30:57', '2019-05-06 18:22:38', 19),
(640, 'Elizabeth.Sunga', '2019-03-19 13:32:05', '2019-05-06 22:49:25', 12),
(641, 'Nenita.chico', '2019-03-19 13:37:06', '2019-05-06 16:59:17', 13),
(642, 'bong.revilla', '2019-03-19 13:40:01', '2019-05-06 18:22:38', 19),
(643, 'Nenita.chico', '2019-03-19 13:41:11', '2019-05-06 16:59:17', 13),
(644, 'Elizabeth.Sunga', '2019-03-19 13:41:41', '2019-05-06 22:49:25', 12),
(645, 'bong.revilla', '2019-03-19 13:42:19', '2019-05-06 18:22:38', 19),
(646, 'Rommel.Pabustan', '2019-03-19 13:43:31', '2019-05-19 02:58:46', 3),
(647, 'Nenita.chico', '2019-03-19 13:48:41', '2019-05-06 16:59:17', 13),
(648, 'Rommel.Pabustan', '2019-03-19 14:04:25', '2019-05-19 02:58:46', 3),
(649, 'Nenita.chico', '2019-03-19 14:08:43', '2019-05-06 16:59:17', 13),
(650, 'Elizabeth.sunga', '2019-03-19 14:20:25', '2019-05-06 22:49:25', 12),
(651, 'Elizabeth.Sunga', '2019-03-19 14:23:57', '2019-05-06 22:49:25', 12),
(652, 'Elizabeth.Sunga', '2019-03-19 22:33:28', '2019-05-06 22:49:25', 12),
(653, 'Rommel.Pabustan', '2019-03-20 03:30:00', '2019-05-19 02:58:46', 3),
(654, 'Elizabeth.Sunga', '2019-03-20 03:37:51', '2019-05-06 22:49:25', 12),
(655, 'Rommel.Pabustan', '2019-03-20 03:58:50', '2019-05-19 02:58:46', 3),
(656, 'Elizabeth.Sunga', '2019-03-20 03:59:07', '2019-05-06 22:49:25', 12),
(657, 'juan.delaCruz', '2019-03-20 04:12:54', '2019-03-20 04:58:33', 23),
(658, 'juana.Cruz', '2019-03-20 04:14:24', '2019-03-20 04:30:14', 24),
(659, 'juan.delaCruz', '2019-03-20 04:15:32', '2019-03-20 04:58:33', 23),
(660, 'Elizabeth.Sunga', '2019-03-20 04:16:11', '2019-05-06 22:49:25', 12),
(661, 'Nenita.chico', '2019-03-20 04:17:25', '2019-05-06 16:59:17', 13),
(662, 'juan.delaCruz', '2019-03-20 04:18:19', '2019-03-20 04:58:33', 23),
(663, 'juana.Cruz', '2019-03-20 04:24:57', '2019-03-20 04:30:14', 24),
(664, 'Nenita.chico', '2019-03-20 04:25:57', '2019-05-06 16:59:17', 13),
(665, 'Elizabeth.Sunga', '2019-03-20 04:29:22', '2019-05-06 22:49:25', 12),
(666, 'juan.delaCruz', '2019-03-20 04:30:36', '2019-03-20 04:58:33', 23),
(667, 'Nenita.chico', '2019-03-20 04:31:50', '2019-05-06 16:59:17', 13),
(668, 'Elizabeth.Sunga', '2019-03-20 04:32:58', '2019-05-06 22:49:25', 12),
(669, 'Rommel.Pabustan', '2019-03-20 04:38:38', '2019-05-19 02:58:46', 3),
(670, 'Elizabeth.Sunga', '2019-03-20 04:39:34', '2019-05-06 22:49:25', 12),
(671, 'juan.delaCruz', '2019-03-20 04:56:51', '2019-03-20 04:58:33', 23),
(672, 'Elizabeth.Sunga', '2019-03-20 12:31:12', '2019-05-06 22:49:25', 12),
(673, 'Rommel.Pabustan', '2019-03-20 12:32:58', '2019-05-19 02:58:46', 3),
(674, 'Nenita.Chico', '2019-03-20 12:42:26', '2019-05-06 16:59:17', 13),
(675, 'Elizabeth.Sunga', '2019-03-20 12:45:55', '2019-05-06 22:49:25', 12),
(676, 'roel.lazaano', '2019-03-20 12:49:02', '2019-03-22 09:32:00', 25),
(677, 'Elizabeth.Sunga', '2019-03-20 14:08:59', '2019-05-06 22:49:25', 12),
(678, 'Rommel.Pabustan', '2019-03-20 14:20:15', '2019-05-19 02:58:46', 3),
(679, 'Nenita.chico', '2019-03-20 14:38:19', '2019-05-06 16:59:17', 13),
(680, 'alvin.ramos', '2019-03-20 14:38:51', '2019-03-22 09:33:10', 26),
(681, 'Elizabeth.Sunga', '2019-03-20 14:39:14', '2019-05-06 22:49:25', 12),
(682, 'roel.lazaano', '2019-03-20 14:41:35', '2019-03-22 09:32:00', 25),
(683, 'alvin.ramos', '2019-03-20 14:42:37', '2019-03-22 09:33:10', 26),
(684, 'Nenita.chico', '2019-03-20 14:43:25', '2019-05-06 16:59:17', 13),
(685, 'alvin.ramos', '2019-03-20 14:43:58', '2019-03-22 09:33:10', 26),
(686, 'roel.lazaano', '2019-03-20 14:44:15', '2019-03-22 09:32:00', 25),
(687, 'Nenita.chico', '2019-03-20 14:44:32', '2019-05-06 16:59:17', 13),
(688, 'Elizabeth.Sunga', '2019-03-20 14:45:10', '2019-05-06 22:49:25', 12),
(689, 'roel.lazaano', '2019-03-20 21:23:45', '2019-03-22 09:32:00', 25),
(690, 'Elizabeth.Sunga', '2019-03-20 22:18:42', '2019-05-06 22:49:25', 12),
(691, 'Elizabeth.Sunga', '2019-03-20 22:19:29', '2019-05-06 22:49:25', 12),
(692, 'Elizabeth.Sunga', '2019-03-20 22:21:11', '2019-05-06 22:49:25', 12),
(693, 'alvin.ramos', '2019-03-20 22:21:52', '2019-03-22 09:33:10', 26),
(694, 'roel.lazaano', '2019-03-20 22:32:00', '2019-03-22 09:32:00', 25),
(695, 'Elizabeth.Sunga', '2019-03-20 22:34:08', '2019-05-06 22:49:25', 12),
(696, 'Elizabeth.Sunga', '2019-03-20 23:05:04', '2019-05-06 22:49:25', 12),
(697, 'roel.lazaano', '2019-03-20 23:12:42', '2019-03-22 09:32:00', 25),
(698, 'Elizabeth.Sunga', '2019-03-20 23:17:57', '2019-05-06 22:49:25', 12),
(699, 'Elizabeth.Sunga', '2019-03-21 00:36:56', '2019-05-06 22:49:25', 12),
(700, 'Elizabeth.Sunga', '2019-03-21 10:54:47', '2019-05-06 22:49:25', 12),
(701, 'roel.lazaano', '2019-03-21 10:56:19', '2019-03-22 09:32:00', 25),
(702, 'Elizabeth.Sunga', '2019-03-22 08:35:11', '2019-05-06 22:49:25', 12),
(703, 'roel.lazaano', '2019-03-22 08:45:04', '2019-03-22 09:32:00', 25),
(704, 'Elizabeth.Sunga', '2019-03-22 08:48:43', '2019-05-06 22:49:25', 12),
(705, 'alvin.ramos', '2019-03-22 08:49:05', '2019-03-22 09:33:10', 26),
(706, 'Nenita.Chico', '2019-03-22 08:54:32', '2019-05-06 16:59:17', 13),
(707, 'Elizabeth.Sunga', '2019-03-22 08:55:11', '2019-05-06 22:49:25', 12),
(708, 'roel.lazaano', '2019-03-22 08:56:23', '2019-03-22 09:32:00', 25),
(709, 'alvin.ramos', '2019-03-22 08:58:52', '2019-03-22 09:33:10', 26),
(710, 'Elizabeth.Sunga', '2019-03-22 09:00:00', '2019-05-06 22:49:25', 12),
(711, 'Elizabeth.Sunga', '2019-03-22 09:06:30', '2019-05-06 22:49:25', 12),
(712, 'roel.lazaano', '2019-03-22 09:24:19', '2019-03-22 09:32:00', 25),
(713, 'alvin.ramos', '2019-03-22 09:26:35', '2019-03-22 09:33:10', 26),
(714, 'Nenita.Chico', '2019-03-22 09:29:01', '2019-05-06 16:59:17', 13),
(715, 'Elizabeth.Sunga', '2019-03-22 09:30:16', '2019-05-06 22:49:25', 12),
(716, 'roel.lazaano', '2019-03-22 09:31:20', '2019-03-22 09:32:00', 25),
(717, 'alvin.ramos', '2019-03-22 09:32:06', '2019-03-22 09:33:10', 26),
(718, 'Elizabeth.Sunga', '2019-03-22 09:33:19', '2019-05-06 22:49:25', 12),
(719, 'Rommel.Pabustan', '2019-04-04 09:22:08', '2019-05-19 02:58:46', 3),
(720, 'Nenita.chico', '2019-04-04 09:28:42', '2019-05-06 16:59:17', 13),
(721, 'Elizabeth.sungA', '2019-04-04 09:31:42', '2019-05-06 22:49:25', 12),
(722, 'ria.pelonia', '2019-04-04 09:33:36', '', 27),
(723, 'Elizabeth.Sunga', '2019-04-09 00:29:40', '2019-05-06 22:49:25', 12),
(724, 'Rommel.Pabustan', '2019-04-16 10:59:28', '2019-05-19 02:58:46', 3),
(725, 'Nenita.Chico', '2019-04-16 11:15:41', '2019-05-06 16:59:17', 13),
(726, 'Rommel.Pabustan', '2019-04-16 11:19:15', '2019-05-19 02:58:46', 3),
(727, 'noemi.reyes', '2019-04-16 11:19:34', '2019-04-16 12:10:52', 14),
(728, 'Nenita.Chico', '2019-04-16 11:36:26', '2019-05-06 16:59:17', 13),
(729, 'Elizabeth.Sunga', '2019-04-16 11:56:17', '2019-05-06 22:49:25', 12),
(730, 'noemi.reyes', '2019-04-16 11:57:55', '2019-04-16 12:10:52', 14),
(731, 'Nenita.Chico', '2019-04-16 11:58:50', '2019-05-06 16:59:17', 13),
(732, 'noemi.reyes', '2019-04-16 12:08:18', '2019-04-16 12:10:52', 14),
(733, 'Elizabeth.Sunga', '2019-04-16 12:09:04', '2019-05-06 22:49:25', 12),
(734, 'Rommel.Pabustan', '2019-04-16 12:10:03', '2019-05-19 02:58:46', 3),
(735, 'Nenita.Chico', '2019-04-16 12:13:53', '2019-05-06 16:59:17', 13),
(736, 'keno.piad', '2019-04-16 12:14:42', '2019-05-06 16:58:04', 15),
(737, 'Elizabeth.Sunga', '2019-04-16 12:29:06', '2019-05-06 22:49:25', 12),
(738, 'Rommel.Pabustan', '2019-04-21 17:28:23', '2019-05-19 02:58:46', 3),
(739, 'Rommel.Pabustan', '2019-04-21 17:33:07', '2019-05-19 02:58:46', 3),
(740, 'Elizabeth.Sunga', '2019-04-21 18:07:54', '2019-05-06 22:49:25', 12),
(741, 'Elizabeth.Sunga', '2019-04-21 18:20:10', '2019-05-06 22:49:25', 12),
(742, 'Raul.Dela Rosa', '2019-04-21 18:21:00', '2019-04-22 00:08:32', 16),
(743, 'Nenita.Chico', '2019-04-21 18:21:37', '2019-05-06 16:59:17', 13),
(744, 'Raul.Dela Rosa', '2019-04-21 21:42:52', '2019-04-22 00:08:32', 16),
(745, 'Rommel.Pabustan', '2019-04-21 21:43:34', '2019-05-19 02:58:46', 3),
(746, 'Elizabeth.Sunga', '2019-04-21 21:52:49', '2019-05-06 22:49:25', 12),
(747, 'Nenita.Chico', '2019-04-21 21:53:34', '2019-05-06 16:59:17', 13),
(748, 'Elizabeth.Sunga', '2019-04-21 21:59:06', '2019-05-06 22:49:25', 12),
(749, 'Janine.Roxas', '2019-04-21 22:04:06', '2019-04-21 23:51:04', 17),
(750, 'Nenita.Chico', '2019-04-21 22:05:07', '2019-05-06 16:59:17', 13),
(751, 'Janine.Roxas', '2019-04-21 22:12:09', '2019-04-21 23:51:04', 17),
(752, 'Janine.Roxas', '2019-04-21 22:33:11', '2019-04-21 23:51:04', 17),
(753, 'Elizabeth.Sunga', '2019-04-21 22:39:05', '2019-05-06 22:49:25', 12),
(754, 'Nenita.Chico', '2019-04-21 22:45:00', '2019-05-06 16:59:17', 13),
(755, 'Janine.Roxas', '2019-04-21 22:45:24', '2019-04-21 23:51:04', 17),
(756, 'Elizabeth.Sunga', '2019-04-21 22:45:46', '2019-05-06 22:49:25', 12),
(757, 'Janine.Roxas', '2019-04-21 22:46:06', '2019-04-21 23:51:04', 17),
(758, 'Elizabeth.Sunga', '2019-04-21 23:51:18', '2019-05-06 22:49:25', 12),
(759, 'Raul.Dela Rosa', '2019-04-21 23:51:53', '2019-04-22 00:08:32', 16),
(760, 'Raul.Dela Rosa', '2019-04-22 00:01:44', '2019-04-22 00:08:32', 16),
(761, 'Elizabeth.Sunga', '2019-05-06 01:38:59', '2019-05-06 22:49:25', 12),
(762, 'Elizabeth.Sunga', '2019-05-06 01:54:39', '2019-05-06 22:49:25', 12),
(763, 'keno.piad', '2019-05-06 02:15:12', '2019-05-06 16:58:04', 15),
(764, 'Elizabeth.Sunga', '2019-05-06 02:45:06', '2019-05-06 22:49:25', 12),
(765, 'Nenita', '2019-05-06 03:47:31', '2019-05-06 16:59:17', 13),
(766, 'Keno', '2019-05-06 04:01:10', '2019-05-06 16:58:04', 15),
(767, 'Elizabeth', '2019-05-06 04:26:23', '2019-05-06 22:49:25', 12),
(768, 'Nenita', '2019-05-06 09:08:30', '2019-05-06 16:59:17', 13),
(769, 'Nenita', '2019-05-06 09:44:42', '2019-05-06 16:59:17', 13),
(770, 'Elizabeth', '2019-05-06 09:45:24', '2019-05-06 22:49:25', 12),
(771, 'Elizabeth', '2019-05-06 10:10:46', '2019-05-06 22:49:25', 12),
(772, 'Nenita', '2019-05-06 11:40:04', '2019-05-06 16:59:17', 13),
(773, 'Bago', '2019-05-06 11:43:41', '2019-05-06 18:22:38', 19),
(774, 'Elizabeth', '2019-05-06 11:44:44', '2019-05-06 22:49:25', 12),
(775, 'Bago', '2019-05-06 13:27:22', '2019-05-06 18:22:38', 19),
(776, 'Nenita', '2019-05-06 13:41:34', '2019-05-06 16:59:17', 13),
(777, 'Bago', '2019-05-06 14:15:07', '2019-05-06 18:22:38', 19),
(778, 'Nenita', '2019-05-06 14:15:51', '2019-05-06 16:59:17', 13),
(779, 'Elizabeth', '2019-05-06 16:50:56', '2019-05-06 22:49:25', 12),
(780, 'Keno', '2019-05-06 16:53:50', '2019-05-06 16:58:04', 15),
(781, 'Nenita', '2019-05-06 16:58:33', '2019-05-06 16:59:17', 13),
(782, 'Elizabeth', '2019-05-06 16:59:30', '2019-05-06 22:49:25', 12),
(783, 'Bago', '2019-05-06 17:17:08', '2019-05-06 18:22:38', 19),
(784, 'Elizabeth', '2019-05-06 17:24:26', '2019-05-06 22:49:25', 12),
(785, 'Bago', '2019-05-06 18:20:55', '2019-05-06 18:22:38', 19),
(786, 'Elizabeth', '2019-05-06 18:23:13', '2019-05-06 22:49:25', 12),
(787, 'Kulapo', '2019-05-06 22:50:56', '2019-05-19 02:58:46', 3),
(788, 'Elizabeth', '2019-05-06 22:53:20', '2019-05-14 23:43:12', 28),
(789, 'NenitaBO', '2019-05-06 22:54:46', '2019-05-16 22:10:14', 29),
(790, 'Kulapo', '2019-05-06 22:56:50', '2019-05-19 02:58:46', 3),
(791, 'Elizabeth', '2019-05-06 22:58:02', '2019-05-14 23:43:12', 28),
(792, 'Kulapo', '2019-05-06 23:00:12', '2019-05-19 02:58:46', 3),
(793, 'Kulapo', '2019-05-07 10:37:46', '2019-05-19 02:58:46', 3),
(794, 'Elizabeth', '2019-05-09 00:58:46', '2019-05-14 23:43:12', 28),
(795, 'Elizabeth', '2019-05-12 01:36:12', '2019-05-14 23:43:12', 28),
(796, 'Elizabeth', '2019-05-12 13:31:58', '2019-05-14 23:43:12', 28),
(797, 'Elizabeth', '2019-05-12 13:32:50', '2019-05-14 23:43:12', 28),
(798, 'Elizabeth', '2019-05-12 13:33:08', '2019-05-14 23:43:12', 28),
(799, 'Elizabeth', '2019-05-12 13:33:19', '2019-05-14 23:43:12', 28),
(800, 'Elizabeth', '2019-05-12 13:33:31', '2019-05-14 23:43:12', 28),
(801, 'Elizabeth', '2019-05-12 13:33:38', '2019-05-14 23:43:12', 28),
(802, 'Elizabeth', '2019-05-12 13:35:10', '2019-05-14 23:43:12', 28),
(803, 'Elizabeth', '2019-05-12 13:35:52', '2019-05-14 23:43:12', 28),
(804, 'Elizabeth', '2019-05-12 13:36:19', '2019-05-14 23:43:12', 28),
(805, 'Elizabeth', '2019-05-12 13:40:32', '2019-05-14 23:43:12', 28),
(806, 'Elizabeth', '2019-05-12 13:44:47', '2019-05-14 23:43:12', 28),
(807, 'Elizabeth', '2019-05-12 13:49:39', '2019-05-14 23:43:12', 28),
(808, 'Elizabeth', '2019-05-12 13:50:26', '2019-05-14 23:43:12', 28),
(809, 'Elizabeth', '2019-05-12 13:50:34', '2019-05-14 23:43:12', 28),
(810, 'Elizabeth', '2019-05-12 13:51:13', '2019-05-14 23:43:12', 28),
(811, 'Elizabeth', '2019-05-12 13:51:25', '2019-05-14 23:43:12', 28),
(812, 'Elizabeth', '2019-05-12 13:51:31', '2019-05-14 23:43:12', 28),
(813, 'Elizabeth', '2019-05-12 13:52:35', '2019-05-14 23:43:12', 28),
(814, 'Elizabeth', '2019-05-12 13:53:11', '2019-05-14 23:43:12', 28),
(815, 'Elizabeth', '2019-05-12 13:56:24', '2019-05-14 23:43:12', 28),
(816, 'Elizabeth', '2019-05-12 14:04:22', '2019-05-14 23:43:12', 28),
(817, 'Elizabeth', '2019-05-12 14:04:48', '2019-05-14 23:43:12', 28),
(818, 'Elizabeth', '2019-05-12 14:05:43', '2019-05-14 23:43:12', 28),
(819, 'NenitaBO', '2019-05-12 14:06:28', '2019-05-16 22:10:14', 29),
(820, 'Kulapo', '2019-05-12 14:07:32', '2019-05-19 02:58:46', 3),
(821, 'NenitaBO', '2019-05-12 15:14:40', '2019-05-16 22:10:14', 29),
(822, 'Elizabeth', '2019-05-12 15:21:36', '2019-05-14 23:43:12', 28),
(823, 'Elizabeth', '2019-05-12 15:46:16', '2019-05-14 23:43:12', 28),
(824, 'Elizabeth', '2019-05-12 22:49:09', '2019-05-14 23:43:12', 28),
(825, 'Elizabeth', '2019-05-12 22:52:29', '2019-05-14 23:43:12', 28),
(826, 'Elizabeth', '2019-05-12 22:52:41', '2019-05-14 23:43:12', 28),
(827, 'Elizabeth', '2019-05-12 22:53:51', '2019-05-14 23:43:12', 28),
(828, 'Kulapo', '2019-05-12 22:55:25', '2019-05-19 02:58:46', 3),
(829, 'Kulapo', '2019-05-12 22:57:08', '2019-05-19 02:58:46', 3),
(830, 'Kulapo', '2019-05-12 22:57:39', '2019-05-19 02:58:46', 3),
(831, 'NenitaBO', '2019-05-12 23:06:55', '2019-05-16 22:10:14', 29),
(832, 'Kulapo', '2019-05-12 23:07:53', '2019-05-19 02:58:46', 3),
(833, 'Kulapo', '2019-05-12 23:09:47', '2019-05-19 02:58:46', 3),
(834, 'Kulapo', '2019-05-12 23:11:07', '2019-05-19 02:58:46', 3),
(835, 'NenitaBO', '2019-05-12 23:11:49', '2019-05-16 22:10:14', 29),
(836, 'Kulapo', '2019-05-12 23:13:04', '2019-05-19 02:58:46', 3),
(837, 'NenitaBO', '2019-05-12 23:13:19', '2019-05-16 22:10:14', 29),
(838, 'Elizabeth', '2019-05-12 23:13:34', '2019-05-14 23:43:12', 28),
(839, 'Kulapo', '2019-05-12 23:16:11', '2019-05-19 02:58:46', 3),
(840, 'Kulapo', '2019-05-12 23:16:45', '2019-05-19 02:58:46', 3),
(841, 'Elizabeth', '2019-05-12 23:18:11', '2019-05-14 23:43:12', 28),
(842, 'Kulapo', '2019-05-12 23:19:22', '2019-05-19 02:58:46', 3),
(843, 'NenitaBO', '2019-05-12 23:19:47', '2019-05-16 22:10:14', 29),
(844, 'Elizabeth', '2019-05-12 23:22:46', '2019-05-14 23:43:12', 28),
(845, 'Kulapo', '2019-05-12 23:23:26', '2019-05-19 02:58:46', 3),
(846, 'NenitaBO', '2019-05-12 23:23:43', '2019-05-16 22:10:14', 29),
(847, 'Elizabeth', '2019-05-12 23:33:44', '2019-05-14 23:43:12', 28),
(848, 'Elizabeth', '2019-05-14 22:54:01', '2019-05-14 23:43:12', 28),
(849, 'Elizabeth', '2019-05-14 22:55:48', '2019-05-14 23:43:12', 28),
(850, 'Elizabeth', '2019-05-14 22:57:55', '2019-05-14 23:43:12', 28),
(851, 'Elizabeth', '2019-05-14 22:58:32', '2019-05-14 23:43:12', 28),
(852, 'Elizabeth', '2019-05-14 22:58:49', '2019-05-14 23:43:12', 28),
(853, 'Elizabeth', '2019-05-14 22:59:57', '2019-05-14 23:43:12', 28),
(854, 'Kulapo', '2019-05-14 23:00:14', '2019-05-19 02:58:46', 3),
(855, 'NenitaBO', '2019-05-14 23:01:05', '2019-05-16 22:10:14', 29),
(856, 'Elizabeth', '2019-05-14 23:02:13', '2019-05-14 23:43:12', 28),
(857, 'Elizabeth', '2019-05-14 23:40:47', '2019-05-14 23:43:12', 28),
(858, 'Elizabeth', '2019-05-14 23:43:03', '2019-05-14 23:43:12', 28),
(859, 'Elizabeth', '2019-05-14 23:49:11', '', 28),
(860, 'Elizabeth', '2019-05-14 23:53:58', '', 28),
(861, 'Elizabeth', '2019-05-14 23:55:20', '', 28),
(862, 'Elizabeth', '2019-05-14 23:57:38', '', 28),
(863, 'Elizabeth', '2019-05-15 00:04:07', '', 28),
(864, 'Kulapo', '2019-05-15 00:59:01', '2019-05-19 02:58:46', 3),
(865, 'NenitaBO', '2019-05-15 01:33:17', '2019-05-16 22:10:14', 29),
(866, 'Kulapo', '2019-05-15 01:37:22', '2019-05-19 02:58:46', 3),
(867, 'Kulapo', '2019-05-15 11:24:37', '2019-05-19 02:58:46', 3),
(868, 'Kulapo', '2019-05-15 14:33:43', '2019-05-19 02:58:46', 3),
(869, 'Kulapo', '2019-05-15 14:37:41', '2019-05-19 02:58:46', 3),
(870, 'Elizabeth', '2019-05-15 14:39:44', '', 28),
(871, 'Kulapo', '2019-05-15 20:48:14', '2019-05-19 02:58:46', 3),
(872, 'NenitaBO', '2019-05-15 20:49:40', '2019-05-16 22:10:14', 29),
(873, 'Elizabeth', '2019-05-15 20:50:17', '', 28),
(874, 'kulapo', '2019-05-15 21:03:41', '2019-05-19 02:58:46', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `tbl_bac_resolution`
--
ALTER TABLE `tbl_bac_resolution`
  ADD PRIMARY KEY (`bacresID`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `tbl_fund`
--
ALTER TABLE `tbl_fund`
  ADD PRIMARY KEY (`fund_id`);

--
-- Indexes for table `tbl_iar`
--
ALTER TABLE `tbl_iar`
  ADD PRIMARY KEY (`iar_ID`);

--
-- Indexes for table `tbl_iar_items`
--
ALTER TABLE `tbl_iar_items`
  ADD PRIMARY KEY (`iar_itemsID`);

--
-- Indexes for table `tbl_item_category`
--
ALTER TABLE `tbl_item_category`
  ADD PRIMARY KEY (`itemcategoryID`);

--
-- Indexes for table `tbl_item_details`
--
ALTER TABLE `tbl_item_details`
  ADD PRIMARY KEY (`itemdetailID`);

--
-- Indexes for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD PRIMARY KEY (`poID`);

--
-- Indexes for table `tbl_po_items`
--
ALTER TABLE `tbl_po_items`
  ADD PRIMARY KEY (`poID`);

--
-- Indexes for table `tbl_ppmp`
--
ALTER TABLE `tbl_ppmp`
  ADD PRIMARY KEY (`ppmpID`);

--
-- Indexes for table `tbl_ppmp_consolidated`
--
ALTER TABLE `tbl_ppmp_consolidated`
  ADD PRIMARY KEY (`consolidatedID`);

--
-- Indexes for table `tbl_pr`
--
ALTER TABLE `tbl_pr`
  ADD PRIMARY KEY (`prID`);

--
-- Indexes for table `tbl_pr_items`
--
ALTER TABLE `tbl_pr_items`
  ADD PRIMARY KEY (`prID`);

--
-- Indexes for table `tbl_purpose`
--
ALTER TABLE `tbl_purpose`
  ADD PRIMARY KEY (`purposeID`);

--
-- Indexes for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`quotation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1207;

--
-- AUTO_INCREMENT for table `tbl_bac_resolution`
--
ALTER TABLE `tbl_bac_resolution`
  MODIFY `bacresID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_fund`
--
ALTER TABLE `tbl_fund`
  MODIFY `fund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_iar`
--
ALTER TABLE `tbl_iar`
  MODIFY `iar_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_iar_items`
--
ALTER TABLE `tbl_iar_items`
  MODIFY `iar_itemsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_item_category`
--
ALTER TABLE `tbl_item_category`
  MODIFY `itemcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_item_details`
--
ALTER TABLE `tbl_item_details`
  MODIFY `itemdetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_po`
--
ALTER TABLE `tbl_po`
  MODIFY `poID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_po_items`
--
ALTER TABLE `tbl_po_items`
  MODIFY `poID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ppmp`
--
ALTER TABLE `tbl_ppmp`
  MODIFY `ppmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_ppmp_consolidated`
--
ALTER TABLE `tbl_ppmp_consolidated`
  MODIFY `consolidatedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tbl_pr`
--
ALTER TABLE `tbl_pr`
  MODIFY `prID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_pr_items`
--
ALTER TABLE `tbl_pr_items`
  MODIFY `prID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_purpose`
--
ALTER TABLE `tbl_purpose`
  MODIFY `purposeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=875;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
