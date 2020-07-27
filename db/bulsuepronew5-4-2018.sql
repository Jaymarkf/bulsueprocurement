-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 06:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulsuepronew`
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
(579, 'Elizabeth.Sunga', '2018-04-21 19:14:05', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(580, 'Elizabeth.Sunga', '2018-04-21 19:15:58', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(581, 'Elizabeth.Sunga', '2018-04-21 19:16:00', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(582, 'Elizabeth.Sunga', '2018-04-21 19:24:26', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(583, 'Elizabeth.Sunga', '2018-04-21 19:24:35', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(584, 'Elizabeth.Sunga', '2018-04-21 19:24:37', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(585, 'Elizabeth.Sunga', '2018-04-21 19:25:31', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(586, 'Elizabeth.Sunga', '2018-04-21 19:25:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(587, 'Elizabeth.Sunga', '2018-04-21 19:27:02', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(588, 'Elizabeth.Sunga', '2018-04-21 19:28:23', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(589, 'Elizabeth.Sunga', '2018-04-21 19:30:30', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(590, 'Elizabeth.Sunga', '2018-04-21 19:37:25', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(591, 'Elizabeth.Sunga', '2018-04-21 19:49:56', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(592, 'Elizabeth.Sunga', '2018-04-21 20:07:06', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(593, 'Elizabeth.Sunga', '2018-04-21 20:09:18', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(594, 'Elizabeth.Sunga', '2018-04-21 20:28:49', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(595, 'Elizabeth.Sunga', '2018-04-21 20:41:01', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(596, 'Elizabeth.Sunga', '2018-04-21 20:53:48', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(597, 'Elizabeth.Sunga', '2018-04-21 20:53:50', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(598, 'Elizabeth.Sunga', '2018-04-21 20:53:51', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(599, 'Elizabeth.Sunga', '2018-04-21 20:55:08', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(600, 'Elizabeth.Sunga', '2018-04-21 20:55:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(601, 'Elizabeth.Sunga', '2018-04-21 20:55:11', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(602, 'Elizabeth.Sunga', '2018-04-21 20:56:45', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(603, 'Elizabeth.Sunga', '2018-04-21 21:13:26', 'Add User .'),
(604, 'Elizabeth.Sunga', '2018-04-21 21:14:18', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(605, 'Elizabeth.Sunga', '2018-04-21 21:15:46', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(606, 'Elizabeth.Sunga', '2018-04-21 21:16:12', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(607, 'Elizabeth.Sunga', '2018-04-21 21:17:13', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(608, 'Elizabeth.Sunga', '2018-04-21 21:17:21', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(609, 'Elizabeth.Sunga', '2018-04-21 21:18:12', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(610, 'Elizabeth.Sunga', '2018-04-21 21:26:02', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(611, 'Elizabeth.Sunga', '2018-04-21 21:26:05', 'Add User .'),
(612, 'Elizabeth.Sunga', '2018-04-21 21:26:21', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(613, 'Elizabeth.Sunga', '2018-04-22 11:37:23', 'Add User .'),
(614, 'Elizabeth.Sunga', '2018-04-22 12:13:47', 'Add User .'),
(615, 'Elizabeth.Sunga', '2018-04-22 12:18:49', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(616, 'Elizabeth.Sunga', '2018-04-22 12:18:53', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(617, 'Elizabeth.Sunga', '2018-04-22 12:19:30', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(618, 'Elizabeth.Sunga', '2018-04-22 12:20:57', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(619, 'Elizabeth.Sunga', '2018-04-22 12:21:19', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(620, 'Elizabeth.Sunga', '2018-04-22 12:24:49', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(621, 'Elizabeth.Sunga', '2018-04-22 12:25:27', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(622, 'Elizabeth.Sunga', '2018-04-22 12:25:52', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(623, 'Elizabeth.Sunga', '2018-04-22 12:27:07', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(624, 'Elizabeth.Sunga', '2018-04-22 12:27:08', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(625, 'Elizabeth.Sunga', '2018-04-22 12:27:28', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(626, 'Elizabeth.Sunga', '2018-04-22 12:29:20', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(627, 'Elizabeth.Sunga', '2018-04-22 12:30:59', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(628, 'Elizabeth.Sunga', '2018-04-22 16:52:43', 'Add User .'),
(629, 'Elizabeth.Sunga', '2018-04-23 00:09:49', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(630, 'Elizabeth.Sunga', '2018-04-23 00:09:51', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(631, 'Elizabeth.Sunga', '2018-04-23 00:09:55', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(632, 'Elizabeth.Sunga', '2018-04-23 00:10:49', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(633, 'Elizabeth.Sunga', '2018-04-23 00:10:50', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(634, 'Elizabeth.Sunga', '2018-04-23 00:10:51', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(635, 'Elizabeth.Sunga', '2018-04-23 00:10:52', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(636, 'Elizabeth.Sunga', '2018-04-23 00:23:12', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(637, 'Elizabeth.Sunga', '2018-04-23 00:23:28', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(638, 'Elizabeth.Sunga', '2018-04-23 00:23:30', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(639, 'Elizabeth.Sunga', '2018-04-23 00:23:40', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(640, 'Elizabeth.Sunga', '2018-04-23 00:28:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(641, 'Elizabeth.Sunga', '2018-04-23 00:28:44', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(642, 'Elizabeth.Sunga', '2018-04-23 00:28:45', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(643, 'Elizabeth.Sunga', '2018-04-23 00:28:46', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(644, 'Elizabeth.Sunga', '2018-04-23 00:29:01', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(645, 'Elizabeth.Sunga', '2018-04-23 00:29:02', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(646, 'Elizabeth.Sunga', '2018-04-23 00:30:13', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(647, 'Elizabeth.Sunga', '2018-04-23 00:30:25', 'Add User .'),
(648, 'Elizabeth.Sunga', '2018-04-23 00:34:55', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(649, 'Elizabeth.Sunga', '2018-04-23 00:36:47', 'Add User .'),
(650, 'Elizabeth.Sunga', '2018-04-23 00:43:21', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(651, 'Elizabeth.Sunga', '2018-04-23 00:45:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(652, 'Elizabeth.Sunga', '2018-04-23 00:47:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(653, 'Elizabeth.Sunga', '2018-04-23 00:49:18', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(654, 'Elizabeth.Sunga', '2018-04-23 00:49:19', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(655, 'Elizabeth.Sunga', '2018-04-23 00:49:20', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(656, 'Elizabeth.Sunga', '2018-04-23 00:49:21', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(657, 'Elizabeth.Sunga', '2018-04-23 00:52:09', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(658, 'Elizabeth.Sunga', '2018-04-23 00:52:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(659, 'Elizabeth.Sunga', '2018-04-23 00:52:11', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(660, 'Elizabeth.Sunga', '2018-04-23 00:58:42', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(661, 'Elizabeth.Sunga', '2018-04-23 00:59:33', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(662, 'Elizabeth.Sunga', '2018-04-23 00:59:45', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(663, 'Elizabeth.Sunga', '2018-04-23 01:00:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(664, 'Elizabeth.Sunga', '2018-04-23 01:07:01', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(665, 'Elizabeth.Sunga', '2018-04-23 01:07:34', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(666, 'Elizabeth.Sunga', '2018-04-23 01:08:04', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(667, 'Elizabeth.Sunga', '2018-04-23 01:09:22', 'Add User .'),
(668, 'Elizabeth.Sunga', '2018-04-23 01:11:12', 'Add User .'),
(669, 'Elizabeth.Sunga', '2018-04-23 01:13:57', 'Add User .'),
(670, 'Elizabeth.Sunga', '2018-04-23 01:16:44', 'Add User .'),
(671, 'Elizabeth.Sunga', '2018-04-23 01:17:04', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(672, 'Elizabeth.Sunga', '2018-04-23 01:19:03', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(673, 'Elizabeth.Sunga', '2018-04-23 01:19:32', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(674, 'Elizabeth.Sunga', '2018-04-23 20:30:16', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(675, 'Elizabeth.Sunga', '2018-04-23 21:18:07', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(676, 'Elizabeth.Sunga', '2018-04-28 23:34:58', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(677, 'Elizabeth.Sunga', '2018-04-28 23:51:31', 'Add User .'),
(678, 'Elizabeth.Sunga', '2018-04-28 23:52:29', 'Add User .'),
(679, 'Elizabeth.Sunga', '2018-04-30 09:35:37', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(680, 'Elizabeth.Sunga', '2018-04-30 09:40:55', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(681, 'Elizabeth.Sunga', '2018-04-30 09:42:01', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(682, 'Elizabeth.Sunga', '2018-04-30 09:43:10', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(683, 'Elizabeth.Sunga', '2018-04-30 09:43:47', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(684, 'Elizabeth.Sunga', '2018-04-30 09:44:31', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(685, 'Elizabeth.Sunga', '2018-04-30 09:46:08', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(686, 'Elizabeth.Sunga', '2018-04-30 09:47:25', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(687, 'Elizabeth.Sunga', '2018-04-30 09:52:47', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(688, 'Elizabeth.Sunga', '2018-04-30 10:01:22', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(689, 'Elizabeth.Sunga', '2018-04-30 10:01:29', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(690, 'Elizabeth.Sunga', '2018-04-30 10:20:33', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(691, 'Elizabeth.Sunga', '2018-04-30 10:21:42', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(692, 'Elizabeth.Sunga', '2018-04-30 10:24:36', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(693, 'Elizabeth.Sunga', '2018-04-30 10:30:03', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(694, 'Elizabeth.Sunga', '2018-04-30 10:30:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(695, 'Elizabeth.Sunga', '2018-04-30 10:30:44', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(696, 'Elizabeth.Sunga', '2018-04-30 10:34:12', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(697, 'Elizabeth.Sunga', '2018-04-30 10:34:20', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(698, 'Elizabeth.Sunga', '2018-04-30 10:35:39', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(699, 'Elizabeth.Sunga', '2018-04-30 10:35:40', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(700, 'Elizabeth.Sunga', '2018-04-30 10:35:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(701, 'Elizabeth.Sunga', '2018-04-30 13:02:32', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(702, 'Elizabeth.Sunga', '2018-04-30 13:04:23', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(703, 'Elizabeth.Sunga', '2018-04-30 13:07:03', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(704, 'Elizabeth.Sunga', '2018-04-30 13:08:44', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(705, 'Elizabeth.Sunga', '2018-04-30 13:11:08', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(706, 'Elizabeth.Sunga', '2018-04-30 13:12:44', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(707, 'Elizabeth.Sunga', '2018-04-30 13:13:39', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(708, 'Elizabeth.Sunga', '2018-04-30 13:13:48', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(709, 'Elizabeth.Sunga', '2018-04-30 13:14:14', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(710, 'Elizabeth.Sunga', '2018-04-30 13:16:20', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(711, 'Elizabeth.Sunga', '2018-04-30 13:16:54', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(712, 'Elizabeth.Sunga', '2018-04-30 13:17:35', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(713, 'Elizabeth.Sunga', '2018-04-30 13:17:41', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(714, 'Elizabeth.Sunga', '2018-04-30 13:18:34', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(715, 'Elizabeth.Sunga', '2018-04-30 13:20:34', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(716, 'Elizabeth.Sunga', '2018-04-30 13:20:44', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(717, 'Elizabeth.Sunga', '2018-04-30 13:21:00', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(718, 'Elizabeth.Sunga', '2018-04-30 13:22:42', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(719, 'Elizabeth.Sunga', '2018-04-30 13:23:00', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(720, 'Elizabeth.Sunga', '2018-04-30 13:24:36', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(721, 'Elizabeth.Sunga', '2018-04-30 13:24:52', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(722, 'Elizabeth.Sunga', '2018-04-30 19:15:53', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(723, 'Elizabeth.Sunga', '2018-04-30 19:16:09', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(724, 'Elizabeth.Sunga', '2018-04-30 19:44:52', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(725, 'Elizabeth.Sunga', '2018-04-30 19:45:29', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(726, 'Elizabeth.Sunga', '2018-04-30 19:45:40', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(727, 'Elizabeth.Sunga', '2018-04-30 20:24:41', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(728, 'Elizabeth.Sunga', '2018-04-30 20:25:14', 'Add User .'),
(729, 'Elizabeth.Sunga', '2018-04-30 20:25:29', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(730, 'Elizabeth.Sunga', '2018-04-30 22:23:55', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(731, 'Elizabeth.Sunga', '2018-04-30 22:24:06', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(732, 'Elizabeth.Sunga', '2018-05-01 01:34:58', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(733, 'Elizabeth.Sunga', '2018-05-01 09:16:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(734, 'Elizabeth.Sunga', '2018-05-03 21:00:09', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(735, 'Elizabeth.Sunga', '2018-05-03 21:41:18', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(736, 'Elizabeth.Sunga', '2018-05-03 23:06:43', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(737, 'Elizabeth.Sunga', '2018-05-03 23:06:53', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(738, 'Elizabeth.Sunga', '2018-05-03 23:46:36', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(739, 'Elizabeth.Sunga', '2018-05-03 23:56:56', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists'),
(740, 'Elizabeth.Sunga', '2018-05-03 23:59:21', 'Deleted item id Elizabeth.Sunga in PPMP Cart lists');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branchID` int(11) NOT NULL,
  `branch` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchID`, `branch`) VALUES
(1, 'Hagonoy Campus'),
(2, 'Meneses Campus'),
(3, 'Bustos Campus'),
(4, 'Sarmiento Campus'),
(5, 'Main Office'),
(6, 'Budget Office'),
(7, 'Procurement Unit'),
(8, 'College of Architecture and Fine Arts'),
(9, 'College of Arts and Letters'),
(10, 'College of Business Administration'),
(11, 'College of Criminal Justice Education'),
(12, 'College of Education'),
(13, 'College of Engineering'),
(14, 'College of Home Economics'),
(15, 'College of Industrial Technology'),
(16, 'College of Information and Communications Technology'),
(17, 'College of Law'),
(18, 'College of Nursing'),
(19, 'College of Physical Education, Recreation and Sports'),
(20, 'College of Science'),
(21, 'College of Social Science and Philosophy'),
(22, 'Graduate School');

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
(41, 'REPAIR & MAINTENANCE (FMO)');

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
(1, 1, 'Canon 810 Black', 'Cartridge', '1022.32'),
(2, 1, 'Canon 811 Tri-Color', 'Cartridge', '774.00'),
(3, 1, 'Hewlett Packard 85 A', 'Cartridge', '3200.00'),
(4, 2, 'Gestetner Toner, 1900', 'Cartridge', '3800.00'),
(5, 3, 'Ballpen (Black)', 'Piece', '8.00'),
(6, 3, 'Ballpen (Blue)', 'Piece', '8.00'),
(7, 3, 'Ballpen (Red)', 'Piece', '8.00'),
(8, 5, 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Piece', '200.00'),
(9, 5, 'Clear Folder Legal Size', 'Piece', '30.00'),
(10, 5, 'Clearbook Legal Size', 'Piece', '60.00'),
(11, 15, 'Cutter Knife, heavy duty', 'Piece', '30.00'),
(12, 5, 'Data Folder, made with chipboard, taglia lock', 'Piece', '270.00'),
(13, 14, 'Epson110', '', '5000.00');

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
(97, 8, '2017', 'Calumpit Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OTHER SUPPLIES & MATERIALS', '2018-02-25 18:01:11', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridge', '1022.32', 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 10, '10223.20', ''),
(98, 8, '2017', 'Calumpit Campus', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'ACCOUNTABLE FORMS', '2018-02-25 18:01:36', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridge', '3200.00', 0, 4, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 9, '28800.00', ''),
(109, 8, '2018', 'Calumpit Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'ACCOUNTABLE FORMS', '2018-03-23 16:34:35', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridge', '1022.32', 7, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 15, '15334.80', ''),
(110, 8, '2018', 'Calumpit Campus', 'Income', 'Completed', 'No', 'Approved', 'Approved', 'MACHINERY & EQUIPMENT CAPITAL OUTLAY (P15,000 and UP)', '2018-03-23 16:38:07', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridge', '3200.00', 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, '9600.00', ''),
(111, 8, '2018', 'Calumpit Campus', 'Fiduciary Fund', 'Completed', 'No', 'Approved', 'Approved', 'TRAINING EXPENSES', '2018-03-26 11:17:35', 'INK/TONER FOR PRINTERS', 'Canon 811 Tri-Color', 'Cartridge', '774.00', 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15, '11610.00', ''),
(112, 10, '2018', 'Baliuag Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'PRINTING AND PUBLICATION EXPENSES', '2018-03-26 23:49:29', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridge', '3800.00', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, '19000.00', ''),
(113, 10, '2018', 'Baliuag Campus', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2018-03-26 23:50:10', 'COMMON OTHER SUPPLIES & MATERIALS', 'Clear Folder Legal Size', 'Piece', '30.00', 10, 0, 10, 0, 10, 0, 10, 0, 10, 0, 10, 0, 60, '1800.00', ''),
(114, 10, '2018', 'Baliuag Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2018-03-26 23:53:24', 'COMMON OTHER SUPPLIES & MATERIALS', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Piece', '200.00', 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 10, '2000.00', ''),
(115, 10, '2018', 'Baliuag Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OTHER SUPPLIES AND MATERIALS EXPENSES', '2018-03-26 23:56:22', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', '30.00', 20, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 40, '1200.00', ''),
(122, 14, '2018', 'Malolos Campus', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'WATER EXPENSES', '2018-04-21 16:15:50', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridge', '1022.32', 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 10, '10223.20', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppmp_consolidated`
--

CREATE TABLE `tbl_ppmp_consolidated` (
  `consolidatedID` int(11) NOT NULL,
  `Requested` varchar(53) NOT NULL,
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

INSERT INTO `tbl_ppmp_consolidated` (`consolidatedID`, `Requested`, `Year`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `TotalQty`, `TotalAmount`) VALUES
(155, 'Yes', '2018', 'COMMON OTHER SUPPLIES & MATERIALS', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Piece', '200.00', 10, '2000.00'),
(156, 'Yes', '2018', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridge', '1022.32', 25, '25558.00'),
(157, 'Yes', '2018', 'INK/TONER FOR PRINTERS', 'Canon 811 Tri-Color', 'Cartridge', '774.00', 15, '11610.00'),
(158, 'Yes', '2018', 'COMMON OTHER SUPPLIES & MATERIALS', 'Clear Folder Legal Size', 'Piece', '30.00', 60, '1800.00'),
(159, 'Yes', '2018', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', '30.00', 40, '1200.00'),
(160, 'Yes', '2018', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridge', '3800.00', 5, '19000.00'),
(161, 'Yes', '2018', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridge', '3200.00', 3, '9600.00');

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
(5, 2018, '', '', '', '0000', '', '0000-00-00', 0, '', '', '', '', '', '', ''),
(6, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0001', '', '2018-04-23', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', ''),
(7, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0002', '', '2018-04-23', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', ''),
(8, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0003', '', '2018-04-23', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', ''),
(9, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0004', '', '2018-04-24', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', ''),
(10, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0005', '', '2018-04-28', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', ''),
(11, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0006', '', '2018-04-28', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', ''),
(12, 2018, 'Procurement Unit', 'Budget Office', 'Budget Office', '0007', '', '2018-04-30', 0, '', 'Elizabeth Sunga', '', '', 'CECILIA N. GASCON, Ph. D.', '', '');

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
  `UnitCost` decimal(11,2) NOT NULL,
  `TotalCost` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr_items`
--

INSERT INTO `tbl_pr_items` (`prID`, `Year`, `PRno`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`) VALUES
(38, 2018, '0001', '', 'Piece', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 10, '200.00', '2000.00'),
(39, 2018, '0001', '', 'Cartridge', 'Canon 810 Black', 25, '1022.32', '25558.00'),
(40, 2018, '0002', '', 'Piece', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 10, '200.00', '2000.00'),
(41, 2018, '0003', '', 'Piece', 'Canon 810 Black', 10, '200.00', '2000.00'),
(42, 2018, '0004', '', 'Piece', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 10, '200.00', '2000.00'),
(43, 2018, '0005', '', 'Piece', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 10, '200.00', '2000.00'),
(44, 2018, '0006', '', 'Piece', 'Canon 810 Black', 10, '200.00', '2000.00'),
(63, 2018, '0007', '', 'Cartridge', 'Canon 810 Black', 25, '1022.32', '25558.00'),
(64, 2018, '0007', '', 'Cartridge', 'Gestetner Toner, 1900', 5, '3800.00', '19000.00');

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
(37, 'SUBSCRIPTION EXPENSES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `quotation_id` int(11) NOT NULL,
  `Company` varchar(300) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Contact_Person` varchar(300) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `Ref_No` varchar(50) NOT NULL,
  `itemDescription` varchar(500) NOT NULL,
  `unitOfMeasurement` varchar(100) NOT NULL,
  `unitPrice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`quotation_id`, `Company`, `Address`, `Contact_Person`, `Contact_No`, `email`, `Ref_No`, `itemDescription`, `unitOfMeasurement`, `unitPrice`) VALUES
(1, 'Magnifico', 'San Juan De Letran Roxas Blvd', 'Arnel Cristo', '(0927)944-44-44', 'asahan@gmail.com', '0001', 'Canon 810 Black', 'Cartridge', '1022.32');

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
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL,
  `registered_date` date NOT NULL,
  `approved` varchar(3) NOT NULL,
  `Remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Year`, `branch`, `username`, `password`, `firstname`, `lastname`, `email`, `status`, `registered_date`, `approved`, `Remarks`) VALUES
(3, 2018, 'Main Office', 'Rommel.Pabustan', 'adminRP', 'Rommel', 'Pabustan', 'bsuepro.admin@bulsu.edu.ph', 'default', '2017-12-26', 'yes', 'Default'),
(8, 2018, 'Calumpit Campus', 'John.Peter', 'holy', 'John', 'Peter', 'johnpeter@bulsu.edu.ph', 'normal', '2017-12-26', 'yes', 'Registered by Admin'),
(10, 2018, 'Baliuag Campus', 'Cristo.Hesus', 'amen', 'Cristo', 'Hesus', 'cristohesus@bulsu.edu.ph', 'normal', '2017-12-26', 'yes', 'Registered by Admin'),
(12, 2018, 'Procurement Unit', 'Elizabeth.Sunga', 'esadmin', 'Elizabeth', 'Sunga', 'elizabethsunga@bulsu.edu.ph', 'administrator', '2017-12-26', 'yes', 'Registered by User'),
(13, 2018, 'Budget Office', 'Nenita.Chico', '12345', 'Nenita', 'Chico', 'nenitachico@bulsu.edu.ph', 'administrator', '2018-02-25', 'yes', 'Registered by Admin'),
(14, 2018, 'Malolos Campus', 'Juan.Dela Cruz', '12345', 'Juan', 'Dela Cruz', 'jdelacruz@bulsu.edu.ph', 'normal', '2018-03-08', 'yes', 'Registered by User');

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
(507, 'John.Peter', '2018-03-26 23:23:42', '2018-03-26 23:37:38', 8),
(508, 'Elizabeth.Sunga', '2018-03-26 23:40:57', '2018-05-04 00:13:35', 12),
(509, 'Cristo.Hesus', '2018-03-26 23:48:47', '', 10),
(510, 'Elizabeth.Sunga', '2018-03-26 23:59:25', '2018-05-04 00:13:35', 12),
(511, 'Elizabeth.Sunga', '2018-03-29 21:33:36', '2018-05-04 00:13:35', 12),
(512, 'Elizabeth.Sunga', '2018-03-29 23:01:46', '2018-05-04 00:13:35', 12),
(513, 'Rommel.Pabustan', '2018-03-29 23:19:50', '2018-04-14 21:01:21', 3),
(514, 'Rommel.Pabustan', '2018-04-02 18:48:21', '2018-04-14 21:01:21', 3),
(515, 'Elizabeth.Sunga', '2018-04-04 22:13:32', '2018-05-04 00:13:35', 12),
(516, 'Elizabeth.Sunga', '2018-04-12 22:02:10', '2018-05-04 00:13:35', 12),
(517, 'Elizabeth.Sunga', '2018-04-14 20:56:39', '2018-05-04 00:13:35', 12),
(518, 'Rommel.Pabustan', '2018-04-14 21:00:30', '2018-04-14 21:01:21', 3),
(519, 'Elizabeth.Sunga', '2018-04-14 21:02:21', '2018-05-04 00:13:35', 12),
(520, 'Elizabeth.Sunga', '2018-04-15 12:03:30', '2018-05-04 00:13:35', 12),
(521, 'Elizabeth.Sunga', '2018-04-15 14:06:21', '2018-05-04 00:13:35', 12),
(522, 'Elizabeth.Sunga', '2018-04-15 15:06:16', '2018-05-04 00:13:35', 12),
(523, 'Elizabeth.Sunga', '2018-04-15 23:15:22', '2018-05-04 00:13:35', 12),
(524, 'Elizabeth.Sunga', '2018-04-15 23:49:47', '2018-05-04 00:13:35', 12),
(525, 'Elizabeth.Sunga', '2018-04-16 09:20:49', '2018-05-04 00:13:35', 12),
(526, 'Elizabeth.Sunga', '2018-04-16 09:40:13', '2018-05-04 00:13:35', 12),
(527, 'Elizabeth.Sunga', '2018-04-16 12:29:47', '2018-05-04 00:13:35', 12),
(528, 'Elizabeth.Sunga', '2018-04-17 19:35:27', '2018-05-04 00:13:35', 12),
(529, 'Elizabeth.Sunga', '2018-04-18 23:41:08', '2018-05-04 00:13:35', 12),
(530, 'Elizabeth.Sunga', '2018-04-20 20:22:49', '2018-05-04 00:13:35', 12),
(531, 'Elizabeth.Sunga', '2018-04-21 12:25:18', '2018-05-04 00:13:35', 12),
(532, 'Elizabeth.Sunga', '2018-04-21 12:26:36', '2018-05-04 00:13:35', 12),
(533, 'Elizabeth.Sunga', '2018-04-21 16:18:11', '2018-05-04 00:13:35', 12),
(534, 'Elizabeth.Sunga', '2018-04-22 11:36:47', '2018-05-04 00:13:35', 12),
(535, 'Elizabeth.Sunga', '2018-04-22 13:30:31', '2018-05-04 00:13:35', 12),
(536, 'Elizabeth.Sunga', '2018-04-22 13:32:05', '2018-05-04 00:13:35', 12),
(537, 'Elizabeth.Sunga', '2018-04-22 13:34:21', '2018-05-04 00:13:35', 12),
(538, 'Elizabeth.Sunga', '2018-04-22 13:45:09', '2018-05-04 00:13:35', 12),
(539, 'Elizabeth.Sunga', '2018-04-22 14:24:17', '2018-05-04 00:13:35', 12),
(540, 'Elizabeth.Sunga', '2018-04-22 14:44:30', '2018-05-04 00:13:35', 12),
(541, 'Elizabeth.Sunga', '2018-04-22 22:22:29', '2018-05-04 00:13:35', 12),
(542, 'Elizabeth.Sunga', '2018-04-23 20:29:59', '2018-05-04 00:13:35', 12),
(543, 'Elizabeth.Sunga', '2018-04-25 15:03:41', '2018-05-04 00:13:35', 12),
(544, 'Elizabeth.Sunga', '2018-04-28 23:32:07', '2018-05-04 00:13:35', 12),
(545, 'Elizabeth.Sunga', '2018-04-30 09:12:32', '2018-05-04 00:13:35', 12),
(546, 'Elizabeth.Sunga', '2018-04-30 19:15:14', '2018-05-04 00:13:35', 12),
(547, 'Elizabeth.Sunga', '2018-05-01 09:16:20', '2018-05-04 00:13:35', 12),
(548, 'Elizabeth.Sunga', '2018-05-02 11:11:35', '2018-05-04 00:13:35', 12),
(549, 'Elizabeth.Sunga', '2018-05-02 21:45:02', '2018-05-04 00:13:35', 12),
(550, 'Elizabeth.Sunga', '2018-05-03 20:28:02', '2018-05-04 00:13:35', 12),
(551, 'Elizabeth.Sunga', '2018-05-03 21:15:51', '2018-05-04 00:13:35', 12),
(552, 'Elizabeth.Sunga', '2018-05-03 22:13:13', '2018-05-04 00:13:35', 12),
(553, 'Elizabeth.Sunga', '2018-05-04 00:02:24', '2018-05-04 00:13:35', 12),
(554, 'Elizabeth.Sunga', '2018-05-04 00:12:26', '2018-05-04 00:13:35', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

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
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=741;
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
-- AUTO_INCREMENT for table `tbl_item_category`
--
ALTER TABLE `tbl_item_category`
  MODIFY `itemcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_item_details`
--
ALTER TABLE `tbl_item_details`
  MODIFY `itemdetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_ppmp`
--
ALTER TABLE `tbl_ppmp`
  MODIFY `ppmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `tbl_ppmp_consolidated`
--
ALTER TABLE `tbl_ppmp_consolidated`
  MODIFY `consolidatedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `tbl_pr`
--
ALTER TABLE `tbl_pr`
  MODIFY `prID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_pr_items`
--
ALTER TABLE `tbl_pr_items`
  MODIFY `prID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_purpose`
--
ALTER TABLE `tbl_purpose`
  MODIFY `purposeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
