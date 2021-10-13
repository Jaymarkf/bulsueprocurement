-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2021 at 06:57 PM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulsuepr_database`
--
CREATE DATABASE IF NOT EXISTS `bulsuepr_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bulsuepr_database`;

-- --------------------------------------------------------

--
-- Table structure for table `consolidated_notification`
--

CREATE TABLE `consolidated_notification` (
  `id` int(11) NOT NULL,
  `college` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consolidated_notification`
--

INSERT INTO `consolidated_notification` (`id`, `college`, `item`, `status`) VALUES
(1, 'Graduate School', 'Canon 810 Black', '1'),
(2, 'College of Physical Education, Recreation and Sports', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '1'),
(3, 'Meneses Campus', 'LCD', '0'),
(4, 'Main Office', 'LCD', '0'),
(5, 'College of Home Economics', 'Cutter Knife, heavy duty', '0');

-- --------------------------------------------------------

--
-- Table structure for table `disposal_request`
--

CREATE TABLE `disposal_request` (
  `id` int(11) NOT NULL,
  `date_acquired` date DEFAULT NULL,
  `particulars_articles` varchar(255) DEFAULT NULL,
  `property_no` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit_cost` varchar(255) DEFAULT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `date_returned` varchar(255) DEFAULT NULL,
  `no_of_years_in_service` varchar(255) DEFAULT NULL,
  `office_college_campus` varchar(255) DEFAULT NULL,
  `name_of_employee` varchar(255) DEFAULT NULL,
  `accumulated_depreciation` varchar(255) DEFAULT NULL,
  `accumulated_impairment_losses` varchar(255) DEFAULT NULL,
  `carrying_amount` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `sale` varchar(255) DEFAULT NULL COMMENT 'disposal',
  `transfer` varchar(255) DEFAULT NULL COMMENT 'disposal',
  `destruction` varchar(255) DEFAULT NULL COMMENT 'disposal',
  `other_specify` varchar(255) DEFAULT NULL COMMENT 'disposal',
  `total` varchar(255) DEFAULT NULL COMMENT 'disposal',
  `appraised_value` varchar(255) DEFAULT NULL,
  `or_no` varchar(255) DEFAULT NULL COMMENT 'record of sales',
  `amount` varchar(255) DEFAULT NULL COMMENT 'record of sales',
  `status_damage` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposal_request`
--

INSERT INTO `disposal_request` (`id`, `date_acquired`, `particulars_articles`, `property_no`, `qty`, `unit_cost`, `total_cost`, `date_returned`, `no_of_years_in_service`, `office_college_campus`, `name_of_employee`, `accumulated_depreciation`, `accumulated_impairment_losses`, `carrying_amount`, `remarks`, `sale`, `transfer`, `destruction`, `other_specify`, `total`, `appraised_value`, `or_no`, `amount`, `status_damage`, `serial_number`) VALUES
(1, '2021-01-07', 'LCD', NULL, '2', '36000', '72000', '2021-01-07 01:44:46', NULL, 'College of Information and Communications Technology', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2021-01-07', 'LCD', NULL, '3', '36000', '108000', '2021-01-07 09:23:56', NULL, 'College of Information and Communications Technology', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2021-01-07', 'LCD', NULL, '4', '36000', '144000', '2021-01-07 12:21:08', NULL, 'Meneses Campus', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2021-01-07', 'LCD', NULL, '1', '36000', '36000', '2021-01-12 22:27:38', NULL, 'College of Information and Communications Technology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '001'),
(5, '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', NULL, '1', '200', '200', '2021-01-13 11:23:10', NULL, 'College of Information and Communications Technology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'broken', '001'),
(6, '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', NULL, '1', '200', '200', '2021-01-13 11:24:35', NULL, 'College of Information and Communications Technology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'broken', '001'),
(7, '2021-01-07', 'Gestetner Toner, 1900', NULL, '1', '26000', '26000', '2021-01-13 11:27:08', NULL, 'College of Information and Communications Technology', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'broken', '001'),
(8, '2021-01-07', 'LCD', NULL, '1', '36000', '36000', '2021-09-30 15:56:35', NULL, 'College of Information and Communications Technology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '001');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_code`
--

CREATE TABLE `equipment_code` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_code`
--

INSERT INTO `equipment_code` (`id`, `code`, `description`) VALUES
(11, '1-06-05-070', 'COMMUNICATION EQUIPMENT'),
(12, '1-06-05-110', 'MEDICAL EQUIPMENT'),
(13, '1-06-05-010', 'MACHINERY'),
(14, '1-06-05-120', 'PRINTING EQUIPMENT'),
(15, '1-06-05-030', 'ICT-EQUIPMENT'),
(16, '1-06-05-130', 'SPORTS EQUIPMENT'),
(17, '1-06-06-010', 'MOTOR VEHICLES'),
(18, '1-06-99-990', 'OTHER PROPERTY, PLANT & EQUIPMENT'),
(19, '1-06-05-100', 'MILITARY, POLICE & SECURITY EQUIPMENT'),
(20, '1-06-05-990', 'OTHER MACHINERY & EQUIPMENT'),
(21, '1-06-05-020', 'OFFICE EQUIPMENT'),
(22, '1-08-01-020', 'COMPUTER SOFTWARE'),
(23, '1-06-05-140', 'TECHNICAL & SCIENTIFIC EQUIPMENT'),
(24, '1-06-07-010', 'FURNITURES & FIXTURES');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `date_generated` date NOT NULL,
  `equipment_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `date_generated`, `equipment_code`) VALUES
(1, '2021-01-12', 15),
(2, '2021-01-12', 14);

-- --------------------------------------------------------

--
-- Table structure for table `item_owner`
--

CREATE TABLE `item_owner` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `item_idd` int(11) DEFAULT NULL,
  `serial_number` varchar(200) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(25) DEFAULT NULL,
  `par_owner_id` varchar(25) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `equipment_code_id` int(11) DEFAULT NULL,
  `date_acquired` date DEFAULT NULL,
  `disposed_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_owner`
--

INSERT INTO `item_owner` (`id`, `owner_id`, `item_idd`, `serial_number`, `item_id`, `unit_price`, `transaction_type`, `par_owner_id`, `quantity`, `equipment_code_id`, `date_acquired`, `disposed_quantity`) VALUES
(3, 2, 5, '001', 'Ballpen (Black)', '30', 'ICS', NULL, 40, NULL, '2021-01-07', NULL),
(8, 2, 10, '002', 'Clearbook Legal Size', '60', 'ICS', NULL, 70, NULL, '2021-01-07', NULL),
(9, NULL, NULL, NULL, 'LCD', '36000', 'PAR', '2', 0, 15, '2021-01-07', 3),
(10, NULL, NULL, NULL, 'LCD', '36000', 'PAR', '2', 0, 15, '2021-01-07', 2),
(11, NULL, NULL, '001', 'Gestetner Toner, 1900', '26000', 'PAR', '2', 5, 21, '2021-01-07', 1),
(12, 3, 8, '001', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', 'ICS', NULL, -2, NULL, '2021-01-07', 1),
(14, 1, 8, '001', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', 'ICS', NULL, 98, NULL, '2021-01-07', 1),
(15, NULL, NULL, '001', 'LCD', '36000', 'PAR', '1', 0, 15, '2021-01-07', 1),
(16, 2, 8, '001', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', 'ICS', NULL, 50, NULL, '2021-01-12', NULL),
(17, NULL, NULL, '001', 'executive chair', '15000', 'PAR', '1', 1, 21, '2021-01-13', 1),
(18, 2, 8, '001', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', 'ICS', NULL, 45, NULL, '2021-01-13', NULL),
(19, NULL, NULL, '001', 'LCD', '36000', 'PAR', '1', 5, 15, '2021-09-30', NULL),
(20, 2, 8, '001', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', 'ICS', NULL, 5, NULL, '2021-09-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `par_summary_report`
--

CREATE TABLE `par_summary_report` (
  `id` int(11) NOT NULL,
  `end_user` int(11) NOT NULL,
  `college` varchar(200) NOT NULL,
  `transaction_type` varchar(200) NOT NULL,
  `date_generated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_summary_report`
--

INSERT INTO `par_summary_report` (`id`, `end_user`, `college`, `transaction_type`, `date_generated`) VALUES
(6, 2, 'College of Information and Communications Technology', 'ICS', '2021-01-07'),
(7, 2, 'College of Information and Communications Technology', 'ICS', '2021-01-07'),
(8, 2, 'College of Information and Communications Technology', 'PAR', '2021-01-07'),
(9, 2, 'College of Information and Communications Technology', 'ICS', '2021-01-07'),
(12, 2, 'College of Information and Communications Technology', 'PAR', '2021-01-07'),
(13, 1, 'College of Information and Communications Technology', 'PAR', '2021-01-07'),
(16, 1, 'College of Information and Communications Technology', 'ICS', '2021-01-07'),
(18, 2, 'College of Information and Communications Technology', 'PAR', '2021-01-12'),
(19, 1, 'College of Information and Communications Technology', 'ICS', '2021-01-12'),
(22, 1, 'College of Information and Communications Technology', 'PAR', '2021-01-13'),
(23, 1, 'College of Information and Communications Technology', 'ICS', '2021-01-13'),
(24, 1, 'College of Information and Communications Technology', 'PAR', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `procurement_ppmp_history`
--

CREATE TABLE `procurement_ppmp_history` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `date_change` date NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procurement_ppmp_history`
--

INSERT INTO `procurement_ppmp_history` (`id`, `description`, `branch`, `date_change`, `user`) VALUES
(1, ', Nov Quantity was changed from 2 to 0, Dec Quantity was changed from 1 to 0, Remarks was changed from reduced the quantiy to reduced the quantities', 'College of Arts and Letters', '2021-01-19', 'Elizabeth'),
(2, ', Jan Quantity was changed from 3 to 2', 'College of Arts and Letters', '2021-01-19', 'Elizabeth'),
(3, ', Remarks was changed from reduced the quantities to reduced the quantity', 'College of Arts and Letters', '2021-01-19', 'Elizabeth'),
(4, ', Jan Quantity was changed from 2 to 3', 'College of Arts and Letters', '2021-01-20', 'Elizabeth'),
(5, ', Remarks was changed from reduced the quantity to ', 'College of Arts and Letters', '2021-01-20', 'Art'),
(6, ', Jan Quantity was changed from 4 to 5, Remarks was changed from test to ', 'College of Arts and Letters', '2021-01-20', 'Art'),
(7, ', Jan Quantity was changed from 5 to 4, Remarks was changed from asap to reduced quantity', 'College of Architecture and Fine Arts', '2021-01-20', 'Elizabeth'),
(8, ', Jan Quantity was changed from 4 to 3, Remarks was changed from reduced quantity to ', 'College of Architecture and Fine Arts', '2021-01-20', 'archi'),
(9, ', Jan Quantity was changed from 5 to 4, Remarks was changed from asap to reduced quantity', 'College of Industrial Technology', '2021-01-20', 'Elizabeth'),
(10, ', Jan Quantity was changed from 4 to 3, Remarks was changed from reduced quantity to ', 'College of Industrial Technology', '2021-01-20', 'cit'),
(11, ', Jan Quantity was changed from 4 to 3, Remarks was changed from asap to reduced quantity', 'College of Law', '2021-01-20', 'Elizabeth'),
(12, ', Jan Quantity was changed from 3 to 4, Remarks was changed from reduced quantity to ', 'College of Law', '2021-01-20', 'Atty.'),
(13, ', Feb Quantity was changed from 2 to 1, Remarks was changed from <span class=\"badge badge-warning\">reduce the quantity</span> to ', 'College of Physical Education, Recreation and Sports', '2021-09-30', 'pe'),
(14, ', Jan Quantity was changed from 4 to 3', 'College of Physical Education, Recreation and Sports', '2021-09-30', 'Elizabeth');

-- --------------------------------------------------------

--
-- Table structure for table `summary_report`
--

CREATE TABLE `summary_report` (
  `id` int(11) NOT NULL,
  `ics_no` varchar(255) DEFAULT NULL,
  `par_no` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `equipment_code` varchar(255) DEFAULT NULL COMMENT 'optional',
  `from_fundcluster` varchar(255) DEFAULT NULL,
  `fundcluster` varchar(255) DEFAULT NULL COMMENT 'to_fundcluster',
  `ptr_no` varchar(255) DEFAULT NULL,
  `ptr_date` date DEFAULT NULL,
  `date_acquired` date DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `unit_cost` varchar(255) DEFAULT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `issued_by` varchar(255) DEFAULT NULL,
  `issued_to` varchar(255) DEFAULT NULL,
  `reason_for_transfer` varchar(255) DEFAULT NULL,
  `disposed` varchar(11) DEFAULT NULL COMMENT 'if the item was disposed or not'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summary_report`
--

INSERT INTO `summary_report` (`id`, `ics_no`, `par_no`, `college`, `quantity`, `unit`, `equipment_code`, `from_fundcluster`, `fundcluster`, `ptr_no`, `ptr_date`, `date_acquired`, `item_description`, `unit_cost`, `total_cost`, `issued_by`, `issued_to`, `reason_for_transfer`, `disposed`) VALUES
(1, '2021-01-001', NULL, 'College of Information and Communications Technology', '40', 'Pieces', NULL, '1', '1', '2021-01-001', '2021-01-07', '2021-01-06', 'Ballpen (Black)', '30', '1200', '1', '2', 'test', NULL),
(2, '2021-01-002', NULL, 'College of Information and Communications Technology', '70', 'Piece', NULL, '1', '1', '2021-01-002', '2021-01-07', '2021-01-07', 'Clearbook Legal Size', '60', '4200', '1', '2', 'N/A', NULL),
(3, NULL, '2021,01,001', 'College of Information and Communications Technology', '3', 'Unit', '15', '1', '1', '001', '2021-01-07', '2021-01-07', 'LCD', '36000', '108000', '1', '2', 'N/A', NULL),
(4, NULL, '2021,01,001', 'College of Information and Communications Technology', '2', 'Unit', '15', '1', '1', '001', '2021-01-07', '2021-01-07', 'LCD', '36000', '72000', '1', '2', 'N/A', NULL),
(5, NULL, '2021,01,002', 'College of Information and Communications Technology', '6', 'Cartridges', '21', '1', '1', '002', '2021-01-07', '2021-01-07', 'Gestetner Toner, 1900', '26000', '156000', '1', '2', 'N/A', NULL),
(6, '2021-01-001', NULL, 'Meneses Campus', '100', 'Pieces', NULL, '1', '1', '2021-01-003', '2021-01-07', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', '40000', '3', '1', 'N/a', NULL),
(7, NULL, '2021,01,001', 'Meneses Campus', '2', 'Unit', '15', '1', '1', '001', '2021-01-07', '2021-01-07', 'LCD', '36000', '72000', '3', '1', 'N/A', NULL),
(8, '2021-01-001', NULL, 'Meneses Campus', '50', 'Pieces', NULL, '1', '1', '2021-01-004', '2021-01-12', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', '40000', '3', '2', 'N/A', NULL),
(9, '2021-01-001', NULL, 'Meneses Campus', '45', 'Pieces', NULL, '1', '1', '2021-01-005', '2021-01-13', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', '40000', '3', '2', 'N/A', NULL),
(10, '2021-01-001', NULL, 'Meneses Campus', '5', 'Pieces', NULL, '1', '1', '2021-09-006', '2021-09-30', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', '200', '40000', '3', '2', 'N/a', NULL),
(11, NULL, '2021,01,001', 'Meneses Campus', '3', 'Unit', '15', '1', '1', '001', '2021-09-30', '2021-01-07', 'LCD', '36000', '108000', '3', '1', 'n/a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `id` int(11) NOT NULL,
  `ppmp_ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`id`, `ppmp_ID`, `user_id`, `activity`, `date_time`) VALUES
(1, 38, 27, 'Remarks Changed from asap to <span class=\"badge badge-warning\">asap</span>;', '2021-01-12 20:58:50'),
(2, 46, 25, 'Remarks Changed from asap to <span class=\"badge badge-warning\">reduce the quantity</span>;', '2021-09-30 14:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bac_reso`
--

CREATE TABLE `tbl_bac_reso` (
  `id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `c_id_array` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, 'Graduate School', 'user'),
(23, 'Supply Office', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `name`, `address`, `tin`, `email`, `contact`) VALUES
(18, 'FACEBOOK', 'AMERICA', 'TIN-123', 'facebook@facebook.com', '0945'),
(19, 'GOOGLE', 'CANADA', 'TIN-1234', 'google@google.com', '0999'),
(20, 'GITHUB', 'AUSTRALLIA', 'TIN-1111', 'GITHUB@GITHUB.com', '09000'),
(21, 'YOUTUBE', 'MANILA', 'TIN101', 'email@email.com', 'CON'),
(22, 'bulsu', 'BULACAN', 'TIN101', 'bulsu@bulsu.com', '1444');

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
-- Table structure for table `tbl_generate_bac_report`
--

CREATE TABLE `tbl_generate_bac_report` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `item_details_id_array` varchar(22) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_generated` datetime NOT NULL,
  `abc_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_generate_bac_report`
--

INSERT INTO `tbl_generate_bac_report` (`id`, `company_id`, `item_details_id_array`, `total_price`, `date_generated`, `abc_input`) VALUES
(1, 18, '1', 120, '2021-01-06 19:30:26', 20000),
(2, 19, '2', 100, '2021-01-06 19:30:26', 20000),
(3, 20, '3,9,11,12,13,14,15,16', 30, '2021-01-06 19:30:26', 20000),
(7, 18, '1,5', 4620, '2021-01-06 20:08:59', 30000),
(8, 19, '2,4', 5100, '2021-01-06 20:08:59', 30000),
(9, 20, '3,6', 5530, '2021-01-06 20:08:59', 30000),
(10, 18, '1,5,9', 19620, '2021-01-06 20:45:05', 30000),
(11, 19, '2,4', 5100, '2021-01-06 20:45:05', 30000),
(12, 20, '3,6,8', 24530, '2021-01-06 20:45:05', 30000),
(13, 21, '7', 20000, '2021-01-06 20:45:05', 30000),
(14, 18, '1,5,9,12', 21120, '2021-01-07 11:25:44', 10000),
(15, 19, '2,4,10', 6100, '2021-01-07 11:25:44', 10000),
(16, 20, '3,6,8,11', 25030, '2021-01-07 11:25:44', 10000),
(17, 21, '7', 20000, '2021-01-07 11:25:44', 10000),
(18, 18, '1,5,9,12', 21120, '2021-01-12 21:27:48', 30000),
(19, 19, '2,4,10,15', 25100, '2021-01-12 21:27:48', 30000),
(20, 20, '3,6,8,11,14', 55030, '2021-01-12 21:27:48', 30000),
(21, 21, '7,13', 40000, '2021-01-12 21:27:48', 30000),
(22, 18, '1,5,9,12,12', 57120, '2021-09-30 15:19:37', 30000),
(23, 19, '2,4,10,15', 25100, '2021-09-30 15:19:37', 30000),
(24, 20, '3,6,8,11,14', 55030, '2021-09-30 15:19:37', 30000),
(25, 21, '7,13', 40000, '2021-09-30 15:19:37', 30000),
(26, 18, '1,5,9,12,12', 57120, '2021-09-30 15:19:46', 30000),
(27, 19, '2,4,10,15', 25100, '2021-09-30 15:19:46', 30000),
(28, 20, '3,6,8,11,14', 55030, '2021-09-30 15:19:46', 30000),
(29, 21, '7,13', 40000, '2021-09-30 15:19:46', 30000),
(30, 18, '1,5,9,12,12', 57120, '2021-10-03 10:17:36', 500000),
(31, 19, '2,4,10,15', 25100, '2021-10-03 10:17:36', 500000),
(32, 20, '3,6,8,11,14', 55030, '2021-10-03 10:17:36', 500000),
(33, 21, '7,13', 40000, '2021-10-03 10:17:36', 500000),
(34, 18, '1,5,9,12,12', 57120, '2021-10-03 10:17:36', 500000),
(35, 19, '2,4,10,15', 25100, '2021-10-03 10:17:36', 500000),
(36, 20, '3,6,8,11,14', 55030, '2021-10-03 10:17:36', 500000),
(37, 21, '7,13', 40000, '2021-10-03 10:17:36', 500000);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iar_items`
--

CREATE TABLE `tbl_iar_items` (
  `id` int(11) NOT NULL,
  `poID` int(11) NOT NULL,
  `iar_no` varchar(255) NOT NULL,
  `iar_date` datetime NOT NULL,
  `requisition_office` varchar(255) NOT NULL,
  `responsibility_code_center` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_iar_items`
--

INSERT INTO `tbl_iar_items` (`id`, `poID`, `iar_no`, `iar_date`, `requisition_office`, `responsibility_code_center`) VALUES
(1, 1, '001', '2021-01-06 00:00:00', 'College of Social Science and Philosophy', '01'),
(2, 2, '002', '2021-01-06 00:00:00', 'College of Science', '01'),
(3, 3, '001', '2021-01-07 00:00:00', 'Meneses Campus', '001'),
(4, 3, '001', '2021-09-30 00:00:00', 'College of Physical Education, Recreation and Sports', '01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ics`
--

CREATE TABLE `tbl_ics` (
  `id` int(11) NOT NULL,
  `ics_num` varchar(20) NOT NULL,
  `iar_id` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `serial_number` varchar(200) DEFAULT NULL,
  `item_desc` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unit_cost` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `received_from` varchar(50) NOT NULL,
  `purchase_order_num` varchar(20) NOT NULL,
  `received_by` varchar(50) NOT NULL,
  `college` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `date_issued` date NOT NULL,
  `delivered_by` varchar(50) NOT NULL,
  `fundcluster_code` varchar(50) NOT NULL,
  `transfer_item_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ics`
--

INSERT INTO `tbl_ics` (`id`, `ics_num`, `iar_id`, `date_acquired`, `item_id`, `serial_number`, `item_desc`, `quantity`, `unit`, `unit_cost`, `total`, `received_from`, `purchase_order_num`, `received_by`, `college`, `position`, `date_issued`, `delivered_by`, `fundcluster_code`, `transfer_item_id`) VALUES
(1, '2021,01,001', 1, '2021-01-06', '5', '001', '3', 0, 'Pieces', 30, 1200, '3', '01,001,2021', '1', 'College of Information and Communications Technology', 'INSTRUCTOR I', '2021-01-06', 'GITHUB', '1,2021,01,001', '1'),
(2, '2021,01,002', 1, '2021-01-07', '10', '002', '15', 0, 'Piece', 60, 4200, '3', '01,002,2021', '1', 'College of Information and Communications Technology', 'INSTRUCTOR I', '2021-01-07', 'GITHUB', '1,2021,01,002', '1'),
(3, '2021,01,001', 3, '2021-01-07', '8', '001', '16', 0, 'Pieces', 200, 40000, '3', '01,001,2021', '3', 'Meneses Campus', 'INSTRUCTOR I', '2021-01-07', 'GITHUB', '1,2021,01,001', '1');

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
(52, 'IPAD'),
(53, 'NEW ITEM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_details`
--

CREATE TABLE `tbl_item_details` (
  `itemdetailID` int(11) NOT NULL,
  `itemcategoryID` int(11) NOT NULL,
  `itemdetailDesc` varchar(350) NOT NULL,
  `article` varchar(200) DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) NOT NULL,
  `PriceCatalogue` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item_details`
--

INSERT INTO `tbl_item_details` (`itemdetailID`, `itemcategoryID`, `itemdetailDesc`, `article`, `UnitOfMeasurement`, `PriceCatalogue`) VALUES
(1, 1, 'Canon 810 Black', 'test', 'Cartridges', 1022.32),
(2, 1, 'Canon 811 Tri-Color', 'amazing', 'Cartridges', 774.00),
(3, 1, 'Hewlett Packard 85 A', NULL, 'Cartridges', 3200.00),
(4, 2, 'Gestetner Toner, 1900', 'SAMSUNG', 'Cartridges', 3800.00),
(5, 3, 'Ballpen (Black)', 'teeee', 'Pieces', 8.00),
(6, 3, 'Ballpen (Blue)', 'etet', 'Pieces', 8.00),
(7, 3, 'Ballpen (Red)', 'etttt', 'Pieces', 8.00),
(8, 5, 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', NULL, 'Pieces', 200.00),
(9, 5, 'Clear Folder Legal Size', NULL, 'Pieces', 30.00),
(10, 5, 'Clearbook Legal Size', NULL, 'Piece', 60.00),
(11, 15, 'Cutter Knife, heavy duty', NULL, 'Piece', 30.00),
(12, 5, 'Data Folder, made with chipboard, taglia lock', NULL, 'Piece', 270.00),
(13, 14, 'Epson110', NULL, 'Unit', 5000.00),
(14, 42, 'LCD', 'SAMSUNG/ACER/EYE-DIGITAL', 'Unit', 25000.00),
(15, 3, 'executive chair', NULL, 'Pieces', 35000.00),
(16, 11, 'gasolina', NULL, 'Liters', 3500.00),
(17, 47, 'with arm rest', NULL, 'Pieces', 1350.00),
(18, 12, 'yantok', 'narra', 'unit', 20000.00),
(20, 6, 'aba', 'wewss', 'test', 1111111.00),
(21, 6, 'item', 'materials', 'piece', 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maintenance`
--

CREATE TABLE `tbl_maintenance` (
  `id` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
  `particulars_articles` varchar(255) NOT NULL,
  `qty` int(22) NOT NULL,
  `unit_cost` int(22) NOT NULL,
  `total_cost` int(22) NOT NULL,
  `date_return` datetime NOT NULL,
  `office_college_campus` varchar(255) NOT NULL,
  `name_of_employee` int(11) NOT NULL,
  `status_damage` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_maintenance`
--

INSERT INTO `tbl_maintenance` (`id`, `date_acquired`, `particulars_articles`, `qty`, `unit_cost`, `total_cost`, `date_return`, `office_college_campus`, `name_of_employee`, `status_damage`, `serial_number`) VALUES
(1, '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 1, 200, 200, '2021-01-12 22:25:55', 'Meneses Campus', 3, 'no power', '001'),
(2, '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 1, 200, 200, '2021-01-13 10:47:33', 'Meneses Campus', 3, '', '001'),
(3, '2021-01-13', 'executive chair', 1, 15000, 15000, '2021-01-13 11:21:10', 'College of Information and Communications Technology', 1, 'for cleaning', '001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_par`
--

CREATE TABLE `tbl_par` (
  `id` int(11) NOT NULL,
  `ics_num` varchar(20) NOT NULL,
  `iar_id` int(11) NOT NULL,
  `e_code` varchar(50) NOT NULL,
  `date_acquired` date NOT NULL,
  `received_from` varchar(50) NOT NULL,
  `purchase_order_num` varchar(50) NOT NULL,
  `received_by_ids` varchar(100) NOT NULL,
  `date_issued` date NOT NULL,
  `delivered_by` varchar(50) NOT NULL,
  `fundcluster_code` varchar(50) NOT NULL,
  `property_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_par`
--

INSERT INTO `tbl_par` (`id`, `ics_num`, `iar_id`, `e_code`, `date_acquired`, `received_from`, `purchase_order_num`, `received_by_ids`, `date_issued`, `delivered_by`, `fundcluster_code`, `property_number`) VALUES
(14, '2021,01,001', 1, '15', '2021-01-07', '3', '01,001,2021', '1', '2021-01-07', 'GITHUB', '1,2021,01,001', '2021-0-003'),
(15, '2021,01,002', 1, '21', '2021-01-07', '3', '01,002,2021', '1', '2021-01-07', 'GITHUB', '1,2021,01,002', '2021-0-002'),
(16, '2021,01,001', 3, '15', '2021-01-07', '3', '01,001,2021', '3', '2021-01-07', 'GITHUB', '1,2021,01,001', '2021-0-003'),
(17, '2021,01,003', 1, '21', '2021-01-13', '3', '01,003,2021', '1', '2021-01-13', 'GITHUB', '1,2021,01,003', '2021-0-004'),
(18, '2021,02,001', 3, '15', '2021-09-30', '1', '01,002,2021', '1', '2021-09-30', 'GITHUB', '1,2021,01,001', '2021-8-005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_par_items`
--

CREATE TABLE `tbl_par_items` (
  `id` int(11) NOT NULL,
  `par_id` int(11) NOT NULL,
  `serial_number` varchar(200) NOT NULL,
  `article` varchar(200) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unit_cost` int(100) NOT NULL,
  `total_cost` int(100) NOT NULL,
  `transfer_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_par_items`
--

INSERT INTO `tbl_par_items` (`id`, `par_id`, `serial_number`, `article`, `item_description`, `quantity`, `unit`, `unit_cost`, `total_cost`, `transfer_id`) VALUES
(3, 14, '001', 'SAMSUNG/ACER/EYE-DIGITAL', 'LCD', 0, 'Unit', 36000, 0, 1),
(4, 15, '002', 'SAMSUNG', 'Gestetner Toner, 1900', 0, 'Cartridges', 26000, 0, 3),
(5, 16, '', 'SAMSUNG/ACER/EYE-DIGITAL', 'LCD', 0, 'Unit', 36000, 0, 4),
(6, 17, '001', '', 'executive chair', 2, 'Pieces', 15000, 30000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po`
--

CREATE TABLE `tbl_po` (
  `id` int(11) NOT NULL,
  `bac_id` int(11) NOT NULL,
  `date_generate` datetime DEFAULT NULL,
  `date_term` varchar(255) DEFAULT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po`
--

INSERT INTO `tbl_po` (`id`, `bac_id`, `date_generate`, `date_term`, `mode_of_payment`, `company_id`) VALUES
(1, 3, '2021-01-06 00:00:00', '2022', 'Check and Carry', 20),
(2, 3, '2021-01-06 00:00:00', '2022', 'Check and Carry', 20),
(3, 3, '2021-01-07 00:00:00', '2022', 'Check and Carry', 20),
(4, 3, '2021-01-07 00:00:00', '2022', 'Check and Carry', 20),
(5, 3, '2021-01-06 00:00:00', '2022', 'Check and Carry', 20),
(6, 3, '2021-09-30 00:00:00', '2022', 'Check and Carry', 20),
(7, 3, '2021-09-30 00:00:00', '2022', 'Check and Carry', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_items`
--

CREATE TABLE `tbl_po_items` (
  `poID` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `POno` varchar(20) NOT NULL,
  `StockPropertyNo` varchar(20) DEFAULT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `item_id` varchar(200) DEFAULT NULL,
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
  `EstimatedBudget` int(11) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `TotalAmount` decimal(11,2) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `pr_approved` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppmp`
--

INSERT INTO `tbl_ppmp` (`ppmpID`, `user_id`, `Year`, `EndUserUnit`, `SourceOfFund`, `Status`, `Priority`, `BO_PPMP_Status`, `PU_PPMP_Status`, `purpose`, `date_requested`, `item_id`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`, `EstimatedBudget`, `TotalQty`, `TotalAmount`, `Remarks`, `pr_approved`) VALUES
(10, 21, '2022', 'College of Information and Communications Technology', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'ELECTRICITY EXPENSES', '2021-01-02 14:43:43', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 0, 0, 0, 3, 0, 0, 2, 0, 0, 0, 0, 3, 12424, 8, 8178.56, 'test', 'pending'),
(11, 21, '2022', 'College of Information and Communications Technology', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 19:54:35', '4', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 3, 11400.00, '', 'approved'),
(12, 21, '2022', 'College of Information and Communications Technology', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 19:55:51', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 10000.00, 'asap', 'approved'),
(13, 21, '2022', 'College of Information and Communications Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 19:56:30', '14', 'ProjectorsNew', 'LCD', 'Unit', 25000.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30000, 2, 50000.00, 'asap', 'approved'),
(14, 21, '2022', 'College of Information and Communications Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 19:57:05', '3', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 6400.00, 'asap', 'approved'),
(15, 21, '2022', 'College of Information and Communications Technology', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 19:58:24', '17', 'monoblock', 'with arm rest', 'Pieces', 1350.00, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30000, 5, 6750.00, 'asap', 'approved'),
(16, 22, '2021', 'College of Science', 'GAA', 'Pending', 'Yes', '', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:05:22', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 10000.00, 'asap', 'pending'),
(17, 22, '2021', 'College of Science', 'GAA', 'Pending', 'Yes', '', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:06:08', '4', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 7600.00, 'asap', 'pending'),
(18, 22, '2021', 'College of Science', 'GAA', 'Pending', 'Yes', '', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:06:55', '3', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 0, 0.00, 'asap', 'pending'),
(19, 22, '2021', 'College of Science', 'GAA', 'Pending', 'Yes', '', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:07:50', '12', 'COMMON OTHER SUPPLIES & MATERIALS', 'Data Folder, made with chipboard, taglia lock', 'Piece', 270.00, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 7, 1890.00, 'asap', 'pending'),
(20, 22, '2021', 'College of Science', 'GAA', 'Pending', 'Yes', '', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:09:13', '15', 'COMMON OFFICE SUPPLIES', 'executive chair', 'Pieces', 35000.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 70000.00, 'asap', 'pending'),
(21, 22, '2022', 'College of Science', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:10:37', '3', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 6400.00, 'asap', 'approved'),
(22, 22, '2022', 'College of Science', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:11:22', '4', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 7600.00, 'asap', 'approved'),
(23, 22, '2022', 'College of Science', 'GAA', 'Completed', 'No', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:12:09', '15', 'COMMON OFFICE SUPPLIES', 'executive chair', 'Pieces', 35000.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 2, 70000.00, 'asap', 'approved'),
(24, 22, '2022', 'College of Science', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:13:27', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 7, 35000.00, 'asap', 'approved'),
(25, 22, '2022', 'College of Science', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:13:57', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 2, 2044.64, 'asap', 'approved'),
(26, 23, '2021', 'College of Social Science and Philosophy', 'GAA', 'Pending', 'Yes', '', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:15:29', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 10, 10223.20, 'asap', 'pending'),
(27, 23, '2022', 'College of Social Science and Philosophy', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:20:17', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 4, 4089.28, 'asap', 'approved'),
(28, 23, '2022', 'College of Social Science and Philosophy', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:20:54', '2', 'INK/TONER FOR PRINTERS', 'Canon 811 Tri-Color', 'Cartridges', 774.00, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 5, 3870.00, 'asap', 'approved'),
(29, 23, '2022', 'College of Social Science and Philosophy', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:21:25', '3', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 2, 6400.00, 'asap', 'approved'),
(30, 23, '2022', 'College of Social Science and Philosophy', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:21:55', '4', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 3, 11400.00, 'asap', 'approved'),
(31, 23, '2022', 'College of Social Science and Philosophy', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 20:22:31', '5', 'COMMON OFFICE SUPPLIES', 'Ballpen (Black)', 'Pieces', 8.00, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10000, 10, 80.00, 'asap', 'approved'),
(32, 24, '2022', 'Graduate School', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-03 21:20:42', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 7, 7156.24, 'asap', 'approved'),
(33, 25, '2022', 'College of Physical Education, Recreation and Sports', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-07 09:58:07', '8', 'COMMON OTHER SUPPLIES & MATERIALS', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Pieces', 200.00, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3000, 7, 1400.00, 'asap', 'approved'),
(34, 25, '2022', 'College of Physical Education, Recreation and Sports', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-07 09:58:52', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30000, 3, 15000.00, 'asap', 'approved'),
(35, 25, '2022', 'College of Physical Education, Recreation and Sports', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OTHER SUPPLIES AND MATERIALS EXPENSES', '2021-01-07 09:59:34', '12', 'COMMON OTHER SUPPLIES & MATERIALS', 'Data Folder, made with chipboard, taglia lock', 'Piece', 270.00, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3000, 5, 1350.00, 'asap', 'approved'),
(36, 26, '2022', 'Meneses Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-07 10:52:07', '14', 'ProjectorsNew', 'LCD', 'Unit', 25000.00, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100000, 4, 100000.00, 'asap', 'approved'),
(37, 26, '2022', 'Meneses Campus', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-07 10:52:50', '8', 'COMMON OTHER SUPPLIES & MATERIALS', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Pieces', 200.00, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10000, 2, 400.00, 'asap', 'approved'),
(38, 27, '2022', 'Main Office', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-12 20:57:03', '14', 'ProjectorsNew', 'LCD', 'Unit', 25000.00, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30000, 5, 125000.00, 'ok po', 'approved'),
(39, 27, '2022', 'Main Office', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-01-12 23:28:20', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 3, 3066.96, 'asap', 'pending'),
(40, 28, '2022', 'College of Home Economics', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OTHER SUPPLIES AND MATERIALS EXPENSES', '2021-01-13 11:00:26', '11', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', 30.00, 95, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 95, 2850.00, 'ok na po', 'approved'),
(41, 29, '2022', 'College of Arts and Letters', 'GAA', 'Pending', 'Yes', 'Approved', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-19 20:49:15', '3', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10000, 5, 16000.00, 'test', 'pending'),
(42, 30, '2022', 'College of Architecture and Fine Arts', 'GAA', 'Pending', 'Yes', 'Approved', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-20 12:02:37', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 3, 15000.00, 'reduced quantity', 'pending'),
(43, 31, '2022', 'College of Industrial Technology', 'GAA', 'Pending', 'Yes', 'Approved', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-20 12:24:01', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 3, 15000.00, 'reduced quantity', 'pending'),
(45, 32, '2022', 'College of Law', 'GAA', 'Pending', 'Yes', 'Approved', '', 'OFFICE SUPPLIES EXPENSES', '2021-01-20 14:35:06', '13', 'PRINTER', 'Epson110', 'Unit', 5000.00, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 4, 20000.00, 'reduced quantity', 'pending'),
(46, 25, '2022', 'College of Physical Education, Recreation and Sports', 'GAA', 'Completed', 'Yes', 'Approved', 'Approved', 'OFFICE SUPPLIES EXPENSES', '2021-09-30 14:44:11', '1', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9000, 4, 4089.28, 'reduce the quantity', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppmp_consolidated`
--

CREATE TABLE `tbl_ppmp_consolidated` (
  `id` int(11) NOT NULL,
  `consolidate_id` int(11) DEFAULT NULL,
  `Year` varchar(6) DEFAULT NULL,
  `ItemCatDesc` varchar(350) DEFAULT NULL,
  `itemdetailDesc` varchar(350) DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) DEFAULT NULL,
  `PriceCatalogue` decimal(11,2) DEFAULT NULL,
  `TotalQty` int(11) DEFAULT NULL,
  `TotalAmount` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppmp_consolidated`
--

INSERT INTO `tbl_ppmp_consolidated` (`id`, `consolidate_id`, `Year`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `TotalQty`, `TotalAmount`) VALUES
(219, 10, '2022', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, NULL, 8178.56),
(220, 11, '2022', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, NULL, 11400.00),
(221, 12, '2022', 'PRINTER', 'Epson110', 'Unit', 5000.00, NULL, 10000.00),
(222, 13, '2022', 'ProjectorsNew', 'LCD', 'Unit', 25000.00, NULL, 50000.00),
(223, 14, '2022', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, NULL, 6400.00),
(224, 15, '2022', 'monoblock', 'with arm rest', 'Pieces', 1350.00, NULL, 6750.00),
(225, 21, '2022', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, NULL, 6400.00),
(226, 22, '2022', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, NULL, 7600.00),
(227, 23, '2022', 'COMMON OFFICE SUPPLIES', 'executive chair', 'Pieces', 35000.00, NULL, 70000.00),
(228, 24, '2022', 'PRINTER', 'Epson110', 'Unit', 5000.00, NULL, 35000.00),
(229, 25, '2022', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, NULL, 2044.64),
(230, 27, '2022', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, NULL, 4089.28),
(231, 28, '2022', 'INK/TONER FOR PRINTERS', 'Canon 811 Tri-Color', 'Cartridges', 774.00, NULL, 3870.00),
(232, 29, '2022', 'INK/TONER FOR PRINTERS', 'Hewlett Packard 85 A', 'Cartridges', 3200.00, NULL, 6400.00),
(233, 30, '2022', 'INK/TONER FOR PHOTOCOPYING MACHINE', 'Gestetner Toner, 1900', 'Cartridges', 3800.00, NULL, 11400.00),
(234, 31, '2022', 'COMMON OFFICE SUPPLIES', 'Ballpen (Black)', 'Pieces', 8.00, NULL, 80.00),
(235, 32, '2022', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, NULL, 7156.24),
(236, 33, '2022', 'COMMON OTHER SUPPLIES & MATERIALS', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Pieces', 200.00, NULL, 1400.00),
(237, 34, '2022', 'PRINTER', 'Epson110', 'Unit', 5000.00, NULL, 15000.00),
(238, 35, '2022', 'COMMON OTHER SUPPLIES & MATERIALS', 'Data Folder, made with chipboard, taglia lock', 'Piece', 270.00, NULL, 1350.00),
(239, 36, '2022', 'ProjectorsNew', 'LCD', 'Unit', 25000.00, NULL, 100000.00),
(240, 37, '2022', 'COMMON OTHER SUPPLIES & MATERIALS', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Pieces', 200.00, NULL, 400.00),
(241, 38, '2022', 'ProjectorsNew', 'LCD', 'Unit', 25000.00, NULL, 125000.00),
(242, 39, '2022', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, NULL, 3066.96),
(243, 40, '2022', 'APPLIANCES  (LESS THAN P15,000)', 'Cutter Knife, heavy duty', 'Piece', 30.00, NULL, 2850.00),
(244, 46, '2022', 'INK/TONER FOR PRINTERS', 'Canon 810 Black', 'Cartridges', 1022.32, NULL, 4089.28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr`
--

CREATE TABLE `tbl_pr` (
  `prID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Year` int(11) DEFAULT NULL,
  `EntityName` varchar(300) DEFAULT NULL,
  `FundCluster` varchar(300) DEFAULT NULL,
  `OfficeSection` varchar(300) NOT NULL,
  `PRno` varchar(20) DEFAULT NULL,
  `item_id` varchar(20) DEFAULT NULL,
  `ResponsibilityCenter` varchar(300) DEFAULT NULL,
  `PR_Date` date DEFAULT NULL,
  `GrandTotal` int(11) DEFAULT NULL,
  `Purpose` varchar(255) DEFAULT NULL,
  `RequestedBy` varchar(300) DEFAULT NULL,
  `RequestingSignature` longblob,
  `RequestingDesignation` varchar(300) DEFAULT NULL,
  `ApprovedBy` varchar(300) DEFAULT NULL,
  `ApprovingSignature` longblob,
  `ApprovingDesignation` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr`
--

INSERT INTO `tbl_pr` (`prID`, `user_id`, `Year`, `EntityName`, `FundCluster`, `OfficeSection`, `PRno`, `item_id`, `ResponsibilityCenter`, `PR_Date`, `GrandTotal`, `Purpose`, `RequestedBy`, `RequestingSignature`, `RequestingDesignation`, `ApprovedBy`, `ApprovingSignature`, `ApprovingDesignation`) VALUES
(1, 0, 2022, 'College of Science', 'GAA', '', '0001', '1', NULL, '2021-01-03', NULL, NULL, 'sci', NULL, NULL, '', NULL, NULL),
(2, 0, 2022, 'College of Social Science and Philosophy', 'GAA', '', '0002', '5', NULL, '2021-01-06', NULL, NULL, 'philo', NULL, NULL, '', NULL, NULL),
(3, 0, 2022, 'College of Social Science and Philosophy', 'GAA', '', '0003', '5', NULL, '2021-01-06', NULL, NULL, 'philo', NULL, NULL, '', NULL, NULL),
(4, 0, 2022, 'College of Social Science and Philosophy', 'GAA', '', '0004', '5', NULL, '2021-01-06', NULL, NULL, 'philo', NULL, NULL, '', NULL, NULL),
(5, 0, 2022, 'College of Information and Communications Technology', 'GAA', '', '0005', '17', NULL, '2021-01-06', NULL, NULL, 'lem', NULL, NULL, '', NULL, NULL),
(6, 0, 2022, 'Meneses Campus', 'GAA', '', '0006', '8', NULL, '2021-01-07', NULL, NULL, 'men', NULL, NULL, '', NULL, NULL),
(7, 0, 2022, 'College of Physical Education, Recreation and Sports', 'GAA', '', '0007', '12', NULL, '2021-01-07', NULL, NULL, 'pe', NULL, NULL, '', NULL, NULL),
(8, 0, 2022, 'Main Office', 'GAA', '', '0008', '14', NULL, '2021-01-12', NULL, NULL, 'main', NULL, NULL, '', NULL, NULL),
(9, 0, 2022, 'College of Home Economics', 'GAA', '', '0009', '11', NULL, '2021-01-13', NULL, NULL, 'HE', NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr_items`
--

CREATE TABLE `tbl_pr_items` (
  `prID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `PRno` varchar(20) NOT NULL,
  `pr_num_merge` varchar(20) DEFAULT NULL,
  `FundCluster` varchar(20) DEFAULT NULL,
  `item_id` varchar(20) DEFAULT NULL,
  `StockPropertyNo` varchar(20) DEFAULT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  `EstimatedBudget` int(11) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `order` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr_items`
--

INSERT INTO `tbl_pr_items` (`prID`, `user_id`, `Year`, `PRno`, `pr_num_merge`, `FundCluster`, `item_id`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`, `EstimatedBudget`, `Purpose`, `order`) VALUES
(1, 22, 2022, '0001', '61F6DF72', 'GAA', '1', '', 'Cartridges', 'Hewlett Packard 85 A', 2, 3200, 2045, 9000, 'OFFICE SUPPLIES EXPENSES', NULL),
(2, 22, 2022, '0001', 'DB34E4B2', 'GAA', '1', '', 'Cartridges', 'Gestetner Toner, 1900', 2, 3800, 2045, 9000, 'OFFICE SUPPLIES EXPENSES', NULL),
(3, 22, 2022, '0001', '16C1DF82', 'GAA', '1', '', 'Pieces', 'executive chair', 2, 35000, 2045, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(4, 22, 2022, '0001', 'EFD7343B', 'GAA', '1', '', 'Unit', 'Epson110', 2, 5000, 2045, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(5, 22, 2022, '0001', '42CEC5CE', 'GAA', '1', '', 'Cartridges', 'Canon 810 Black', 2, 1022, 2045, 9000, 'OFFICE SUPPLIES EXPENSES', NULL),
(6, 23, 2022, '0002', '42CEC5CE', 'GAA', '5', '', 'Cartridges', 'Canon 810 Black', 10, 1022, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(7, 23, 2022, '0002', '677485A5', 'GAA', '5', '', 'Cartridges', 'Canon 811 Tri-Color', 10, 774, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(8, 23, 2022, '0002', '61F6DF72', 'GAA', '5', '', 'Cartridges', 'Hewlett Packard 85 A', 10, 3200, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(9, 23, 2022, '0002', 'DB34E4B2', 'GAA', '5', '', 'Cartridges', 'Gestetner Toner, 1900', 10, 3800, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(10, 23, 2022, '0002', 'EA77CCB2', 'GAA', '5', '', 'Pieces', 'Ballpen (Black)', 10, 8, 80, 10000, 'OFFICE SUPPLIES EXPENSES', NULL),
(11, 23, 2022, '0002', '42CEC5CE', 'GAA', '5', '', 'Cartridges', 'Canon 810 Black', 10, 1022, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(12, 23, 2022, '0002', '677485A5', 'GAA', '5', '', 'Cartridges', 'Canon 811 Tri-Color', 10, 774, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(13, 23, 2022, '0002', '61F6DF72', 'GAA', '5', '', 'Cartridges', 'Hewlett Packard 85 A', 10, 3200, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(14, 23, 2022, '0002', 'DB34E4B2', 'GAA', '5', '', 'Cartridges', 'Gestetner Toner, 1900', 10, 3800, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(15, 23, 2022, '0002', 'EA77CCB2', 'GAA', '5', '', 'Pieces', 'Ballpen (Black)', 10, 8, 80, 10000, 'OFFICE SUPPLIES EXPENSES', NULL),
(16, 23, 2022, '0003', '42CEC5CE', 'GAA', '5', '', 'Cartridges', 'Canon 810 Black', 10, 1022, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(17, 23, 2022, '0003', '677485A5', 'GAA', '5', '', 'Cartridges', 'Canon 811 Tri-Color', 10, 774, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(18, 23, 2022, '0003', '61F6DF72', 'GAA', '5', '', 'Cartridges', 'Hewlett Packard 85 A', 10, 3200, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(19, 23, 2022, '0003', 'DB34E4B2', 'GAA', '5', '', 'Cartridges', 'Gestetner Toner, 1900', 10, 3800, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(20, 23, 2022, '0003', 'EA77CCB2', 'GAA', '5', '', 'Pieces', 'Ballpen (Black)', 10, 8, 80, 10000, 'OFFICE SUPPLIES EXPENSES', NULL),
(21, 23, 2022, '0004', '42CEC5CE', 'GAA', '5', '', 'Cartridges', 'Canon 810 Black', 10, 1022, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(22, 23, 2022, '0004', '677485A5', 'GAA', '5', '', 'Cartridges', 'Canon 811 Tri-Color', 10, 774, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(23, 23, 2022, '0004', '61F6DF72', 'GAA', '5', '', 'Cartridges', 'Hewlett Packard 85 A', 10, 3200, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(24, 23, 2022, '0004', 'DB34E4B2', 'GAA', '5', '', 'Cartridges', 'Gestetner Toner, 1900', 10, 3800, 80, 50000, 'OFFICE SUPPLIES EXPENSES', NULL),
(25, 23, 2022, '0004', 'EA77CCB2', 'GAA', '5', '', 'Pieces', 'Ballpen (Black)', 10, 8, 80, 10000, 'OFFICE SUPPLIES EXPENSES', NULL),
(26, 21, 2022, '0005', 'DB34E4B2', 'GAA', '17', '', 'Cartridges', 'Gestetner Toner, 1900', 5, 3800, 6750, 9000, 'OFFICE SUPPLIES EXPENSES', NULL),
(27, 21, 2022, '0005', 'EFD7343B', 'GAA', '17', '', 'Unit', 'Epson110', 5, 5000, 6750, 9000, 'OFFICE SUPPLIES EXPENSES', NULL),
(28, 21, 2022, '0005', 'D48D9783', 'GAA', '17', '', 'Unit', 'LCD', 5, 25000, 6750, 30000, 'OFFICE SUPPLIES EXPENSES', NULL),
(29, 21, 2022, '0005', '61F6DF72', 'GAA', '17', '', 'Cartridges', 'Hewlett Packard 85 A', 5, 3200, 6750, 9000, 'OFFICE SUPPLIES EXPENSES', NULL),
(30, 21, 2022, '0005', 'E2A5BD1B', 'GAA', '17', '', 'Pieces', 'with arm rest', 5, 1350, 6750, 30000, 'OFFICE SUPPLIES EXPENSES', NULL),
(31, 26, 2022, '0006', 'D48D9783', 'GAA', '8', '', 'Unit', 'LCD', 2, 25000, 400, 100000, 'OFFICE SUPPLIES EXPENSES', NULL),
(32, 26, 2022, '0006', '985C7ACC', 'GAA', '8', '', 'Pieces', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 2, 200, 400, 10000, 'OFFICE SUPPLIES EXPENSES', NULL),
(33, 25, 2022, '0007', '985C7ACC', 'GAA', '12', '', 'Pieces', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 5, 200, 1350, 3000, 'OFFICE SUPPLIES EXPENSES', NULL),
(34, 25, 2022, '0007', 'EFD7343B', 'GAA', '12', '', 'Unit', 'Epson110', 5, 5000, 1350, 30000, 'OFFICE SUPPLIES EXPENSES', NULL),
(35, 25, 2022, '0007', 'F928DF30', 'GAA', '12', '', 'Piece', 'Data Folder, made with chipboard, taglia lock', 5, 270, 1350, 3000, 'OTHER SUPPLIES AND MATERIALS EXPENSES', NULL),
(36, 27, 2022, '0008', 'D48D9783', 'GAA', '14', '', 'Unit', 'LCD', 5, 25000, 125000, 30000, 'OFFICE SUPPLIES EXPENSES', NULL),
(37, 28, 2022, '0009', '93BD2896', 'GAA', '11', '', 'Piece', 'Cutter Knife, heavy duty', 95, 30, 2850, 5000, 'OTHER SUPPLIES AND MATERIALS EXPENSES', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pt_par_items`
--

CREATE TABLE `tbl_pt_par_items` (
  `id` int(11) NOT NULL,
  `par_items_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `issued_by` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `reason_for_transfer` varchar(100) NOT NULL,
  `date_transfered` date NOT NULL,
  `ptr_no` varchar(22) NOT NULL,
  `ptr_date` date NOT NULL,
  `fundcluster` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pt_par_items`
--

INSERT INTO `tbl_pt_par_items` (`id`, `par_items_id`, `item_id`, `quantity`, `issued_by`, `received_by`, `reason_for_transfer`, `date_transfered`, `ptr_no`, `ptr_date`, `fundcluster`) VALUES
(1, 3, 14, 3, 1, 2, 'N/A', '2021-01-07', '1', '2021-01-07', '1'),
(2, 3, 14, 2, 1, 2, 'N/A', '2021-01-07', '1', '2021-01-07', '1'),
(3, 4, 4, 6, 1, 2, 'N/A', '2021-01-07', '2', '2021-01-07', '1'),
(4, 5, 14, 2, 3, 1, 'N/A', '2021-01-07', '1', '2021-01-07', '1'),
(5, 5, 14, 3, 3, 1, 'n/a', '2021-09-30', '1', '2021-09-30', '1');

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
  `Q_date` date NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rfq`
--

CREATE TABLE `tbl_rfq` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `quotation_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `purchase_request_no` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `TIN` varchar(255) NOT NULL,
  `ABC` varchar(255) DEFAULT NULL,
  `philgeps` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rfq`
--

INSERT INTO `tbl_rfq` (`id`, `id_company`, `company_name`, `quotation_no`, `address`, `purchase_request_no`, `contact_no`, `purpose`, `TIN`, `ABC`, `philgeps`, `email`, `date_created`) VALUES
(1, 18, 'FACEBOOK', '1', 'AMERICA', 'EA77CCB2', '0945', 'N/A', 'TIN-123', '', '1', 'facebook@facebook.com', '2021-01-06 19:26:04'),
(2, 19, 'GOOGLE', '1', 'CANADA', 'EA77CCB2', '0999', 'N/A', 'TIN-1234', '', '1', 'google@google.com', '2021-01-06 19:27:04'),
(3, 20, 'GITHUB', '1', 'AUSTRALLIA', 'EA77CCB2', '09000', 'N/A', 'TIN-1111', '', '1', 'GITHUB@GITHUB.com', '2021-01-06 19:28:37'),
(4, 19, 'GOOGLE', '2', 'CANADA', 'D48D9783', '0999', 'N/A', 'TIN-1234', '', '2', 'google@google.com', '2021-01-06 19:57:36'),
(5, 18, 'FACEBOOK', '2', 'AMERICA', 'D48D9783', '0945', 'N/A', 'TIN-123', '', '2', 'facebook@facebook.com', '2021-01-06 19:58:58'),
(6, 20, 'GITHUB', '2', 'AUSTRALLIA', 'D48D9783', '09000', 'N/A', 'TIN-1111', '', '2', 'GITHUB@GITHUB.com', '2021-01-06 20:00:18'),
(7, 21, 'YOUTUBE', '3', 'MANILA', '16C1DF82', 'CON', 'N/A', 'TIN101', '', '3', 'email@email.com', '2021-01-06 20:40:27'),
(8, 20, 'GITHUB', '3', 'AUSTRALLIA', '16C1DF82', '09000', 'N/A', 'TIN-1111', '', '3', 'GITHUB@GITHUB.com', '2021-01-06 20:41:14'),
(9, 18, 'FACEBOOK', '3', 'AMERICA', '16C1DF82', '0945', 'N/A', 'TIN-123', '', '3', 'facebook@facebook.com', '2021-01-06 20:42:20'),
(10, 19, 'GOOGLE', '001', 'CANADA', '985C7ACC', '0999', 'N/A', 'TIN-1234', '', '001', 'google@google.com', '2021-01-07 11:19:32'),
(11, 20, 'GITHUB', '001', 'AUSTRALLIA', '985C7ACC', '09000', 'N/A', 'TIN-1111', '', '001', 'GITHUB@GITHUB.com', '2021-01-07 11:21:07'),
(12, 18, 'FACEBOOK', '001', 'AMERICA', '985C7ACC', '0945', 'N/A', 'TIN-123', '', '001', 'facebook@facebook.com', '2021-01-07 11:21:52'),
(13, 21, 'YOUTUBE', '4', 'MANILA', 'D48D9783', 'CON', 'N/A', 'TIN101', '', '4', 'email@email.com', '2021-01-12 21:23:49'),
(14, 20, 'GITHUB', '4', 'AUSTRALLIA', 'D48D9783', '09000', 'N/A', 'TIN-1111', '', '4', 'GITHUB@GITHUB.com', '2021-01-12 21:25:11'),
(15, 19, 'GOOGLE', '4', 'CANADA', 'D48D9783', '0999', 'N/A', 'TIN-1234', '', '4', 'google@google.com', '2021-01-12 21:26:06'),
(16, 21, 'YOUTUBE', '5', 'MANILA', '93BD2896', 'CON', 'N/A', 'TIN101', '', '5', 'email@email.com', '2021-01-13 11:50:34'),
(17, 20, 'GITHUB', '1', 'AUSTRALLIA', '42CEC5CE', '09000', 'N/A', 'TIN-1111', '', '1', 'GITHUB@GITHUB.com', '2021-09-30 15:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rfq_item_details`
--

CREATE TABLE `tbl_rfq_item_details` (
  `id` int(11) NOT NULL,
  `rfq_item_id` int(11) NOT NULL,
  `item_no` varchar(255) NOT NULL,
  `item_id` varchar(20) DEFAULT NULL,
  `item_and_specification` varchar(255) NOT NULL,
  `quantity_and_unit` int(11) NOT NULL,
  `brand_and_model_offered` varchar(255) NOT NULL,
  `unit_price` int(50) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `approved_item_price` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rfq_item_details`
--

INSERT INTO `tbl_rfq_item_details` (`id`, `rfq_item_id`, `item_no`, `item_id`, `item_and_specification`, `quantity_and_unit`, `brand_and_model_offered`, `unit_price`, `total_price`, `approved_by`, `approved_item_price`, `date_created`) VALUES
(1, 1, '1', '5', 'Ballpen (Black)', 40, 'lotus', 120, '4800', 'approved', NULL, NULL),
(2, 2, '1', '5', 'Ballpen (Black)', 40, 'new', 100, '4000', 'approved', NULL, NULL),
(3, 3, '1', '5', 'Ballpen (Black)', 40, 'mongol', 30, '1200', 'approved', NULL, NULL),
(4, 4, '1', '17', 'LCD', 5, 'acer', 5000, '25000', 'approved', NULL, NULL),
(5, 5, '1', '17', 'LCD', 5, 'acer', 4500, '22500', 'approved', NULL, NULL),
(6, 6, '1', '17', 'LCD', 5, 'acer', 5500, '27500', 'approved', NULL, NULL),
(7, 7, '1', '1', 'executive chair', 2, 'monobloc', 20000, '40000', 'approved', NULL, NULL),
(8, 8, '1', '1', 'executive chair', 2, 'monobloc', 19000, '38000', 'approved', NULL, NULL),
(9, 9, '1', '1', 'executive chair', 2, 'monobloc', 15000, '30000', 'approved', NULL, NULL),
(11, 10, '1', '18', 'yantok', 6, 'narra', 20000, '120000', NULL, NULL, NULL),
(12, 11, '9', '4', 'Gestetner Toner, 1900', 6, 'acer', 26000, '156000', NULL, NULL, NULL),
(13, 12, '17', '8', 'LCD', 5, 'SAMSUNG', 36000, '180000', 'approved', NULL, NULL),
(14, 14, '1', '7', 'Ballpen (Red)', 1200, 'panda', 6, '7200', NULL, NULL, NULL),
(15, 15, '1', '10', 'Clearbook Legal Size', 70, 'prem', 60, '4200', NULL, NULL, NULL),
(16, 16, '1', '8', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 200, 'cdr-king', 200, '40000', NULL, NULL, NULL),
(17, 10, '001', '8', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 7, 'brand a', 1000, '7000', 'approved', NULL, NULL),
(18, 11, '001', '8', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 7, 'brand b', 500, '3500', 'approved', NULL, NULL),
(19, 12, '001', '8', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 7, 'brand c', 1500, '10500', 'approved', NULL, NULL),
(20, 13, '1', '17', 'LCD', 12, 'hi-sense', 20000, '240000', 'approved', NULL, NULL),
(21, 14, '1', '17', 'LCD', 12, 'acer', 30000, '360000', 'approved', NULL, NULL),
(22, 15, '1', '17', 'LCD', 12, 'logitech', 19000, '228000', 'approved', NULL, NULL),
(23, 16, '1', '11', 'Cutter Knife, heavy duty', 95, 'brand a', 1000, '95000', NULL, NULL, NULL),
(24, 17, '1', '1', 'Canon 810 Black', 42, 'lotus', 20000, '840000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_employee`
--

CREATE TABLE `tbl_supplier_employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(22) NOT NULL,
  `middle_name` varchar(22) NOT NULL,
  `last_name` varchar(22) NOT NULL,
  `college` varchar(22) NOT NULL,
  `position` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier_employee`
--

INSERT INTO `tbl_supplier_employee` (`id`, `first_name`, `middle_name`, `last_name`, `college`, `position`) VALUES
(1, 'Rommel', 'S', 'Pabustan', '16', '15'),
(2, 'John', 'V', 'Doe', '16', '15'),
(3, 'Tony', 'L.', 'Reyes', '2', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_position`
--

CREATE TABLE `tbl_supplier_position` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier_position`
--

INSERT INTO `tbl_supplier_position` (`id`, `name`) VALUES
(15, 'INSTRUCTOR I'),
(22, 'PROFESSOR III'),
(24, 'INSTRUCTOR II'),
(25, 'INSTRUCTOR III'),
(26, 'UNIVERSITY PROFESSOR'),
(27, 'PROFESSOR I'),
(28, 'PROFESSOR II'),
(29, 'PROFESSOR IV'),
(30, 'PROFESSOR V'),
(31, 'PROFESSOR VI'),
(32, 'ASSISTANT PROFESSOR I'),
(33, 'ASSISTANT PROFESSOR II'),
(34, 'ASSISTANT PROFESSOR III'),
(35, 'ASSISTANT PROFESSOR IV'),
(36, 'ASSISTANT PROFESSOR V'),
(37, 'ASSOCIATE PROFESSOR I'),
(38, 'ASSOCIATE PROFESSOR II'),
(39, 'ASSOCIATE PROFESSOR III'),
(40, 'ASSOCIATE PROFESSOR IV'),
(41, 'ASSOCIATE PROFESSOR IV'),
(42, 'ASSOCIATE PROFESSOR VI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supply_office_employee`
--

CREATE TABLE `tbl_supply_office_employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supply_office_employee`
--

INSERT INTO `tbl_supply_office_employee` (`id`, `first_name`, `middle_name`, `last_name`, `position`) VALUES
(1, 'MATILDE', 'ENRIQUEZ', 'PAULINO', 15),
(2, 'JOHN', 'LOPEZ', 'SALAZAR', 2),
(3, 'GLAIZA', 'REYES', 'SANTOS', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supply_office_employee_position`
--

CREATE TABLE `tbl_supply_office_employee_position` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supply_office_employee_position`
--

INSERT INTO `tbl_supply_office_employee_position` (`id`, `name`) VALUES
(2, 'ADMINISTRATIVE OFFICER I'),
(3, 'ADMINISTRATIVE OFFICER II'),
(4, 'ADMINISTRATIVE OFFICER III'),
(5, 'ADMINSTRATIVE OFFICER IV'),
(6, 'ADMINISTRATIVE ASSISTANT I'),
(7, 'ADMINISTRATIVE ASSISTANT II'),
(8, 'ADMINISTRATIVE ASSISTANT III'),
(9, 'ADMINISTRATIVE ASSISTANT IV'),
(10, 'ADMINISTRATIVE AIDE I'),
(11, 'ADMINISTRATIVE AIDE II'),
(12, 'ADMINISTRATIVE AIDE III'),
(13, 'ADMINISTRATIVE AIDE IV'),
(14, 'EMPLOYEE BY JOB ORDER'),
(15, 'SUPERVISING ADMINISTRATIVE OFFICER'),
(21, 'STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_item`
--

CREATE TABLE `transfer_item` (
  `id` int(11) NOT NULL,
  `ics_id` int(11) NOT NULL,
  `issued_by` int(11) NOT NULL,
  `issued_to` int(11) NOT NULL,
  `reason_for_transfer` varchar(255) NOT NULL,
  `from_fundcluster` varchar(255) NOT NULL,
  `to_fundcluster` varchar(255) NOT NULL,
  `ptr_no` varchar(255) NOT NULL,
  `ptr_date` date NOT NULL,
  `ics_no` varchar(255) NOT NULL,
  `date_acquired` date NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unit_cost` int(50) NOT NULL,
  `total_cost` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_item`
--

INSERT INTO `transfer_item` (`id`, `ics_id`, `issued_by`, `issued_to`, `reason_for_transfer`, `from_fundcluster`, `to_fundcluster`, `ptr_no`, `ptr_date`, `ics_no`, `date_acquired`, `item_desc`, `college`, `quantity`, `unit`, `unit_cost`, `total_cost`) VALUES
(1, 1, 1, 2, 'test', '1', '1', '2021-01-001', '2021-01-07', '2021-01-001', '2021-01-06', 'Ballpen (Black)', 'College of Information and Communications Technology', 40, 'Pieces', 30, 1200),
(2, 2, 1, 2, 'N/A', '1', '1', '2021-01-002', '2021-01-07', '2021-01-002', '2021-01-07', 'Clearbook Legal Size', 'College of Information and Communications Technology', 70, 'Piece', 60, 4200),
(3, 3, 3, 1, 'N/a', '1', '1', '2021-01-003', '2021-01-07', '2021-01-001', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Meneses Campus', 100, 'Pieces', 200, 40000),
(4, 3, 3, 2, 'N/A', '1', '1', '2021-01-004', '2021-01-12', '2021-01-001', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Meneses Campus', 50, 'Pieces', 200, 40000),
(5, 3, 3, 2, 'N/A', '1', '1', '2021-01-005', '2021-01-13', '2021-01-001', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Meneses Campus', 45, 'Pieces', 200, 40000),
(6, 3, 3, 2, 'N/a', '1', '1', '2021-09-006', '2021-09-30', '2021-01-001', '2021-01-07', 'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box', 'Meneses Campus', 5, 'Pieces', 200, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `branch` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `registered_date` date NOT NULL,
  `approved` varchar(3) NOT NULL,
  `Remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Year`, `branch`, `username`, `first_name`, `last_name`, `position`, `password`, `level`, `registered_date`, `approved`, `Remarks`) VALUES
(1, 2020, 'Main Office', 'SuperAdmin', '', '', '', 'adminimda', 'default', '2017-12-26', 'yes', 'Default'),
(2, 2022, 'Procurement Unit', 'Elizabeth', '', '', '', 'a', 'administrator', '2019-05-06', 'yes', 'Registered by Admin'),
(3, 2022, 'Budget Office', 'NenitaBO', '', '', '', 'admin', 'administrator', '2019-05-06', 'yes', 'Registered by Admin'),
(4, 2020, 'College of Information and Communications Technology', 'deandean', 'dean', 'pagdanganan', 'teacher 2', 'Oe@-B17n', 'user', '2019-07-13', 'yes', 'Registered by Admin'),
(5, 2021, 'Bustos Campus', 'rommel', 'rommel', 'pabustan', 'professor', '12345', 'user', '2019-07-13', 'yes', 'Registered by Admin'),
(6, 2021, 'College of Architecture and Fine Arts', 'juan', 'juan', 'delacruz', 'professor IV', '12345', 'user', '2019-07-13', 'yes', 'Registered by Admin'),
(7, 2021, 'College of Arts and Letters', 'john', 'john', 'luna', 'admin office', 'qwerty', 'user', '2019-07-13', 'yes', 'Registered by Admin'),
(11, 2021, 'College of Law', 'mrLaw', 'jason', 'makapal', 'admin office', '12345', 'user', '2020-08-22', 'yes', 'Registered by Admin'),
(12, 2021, 'College of Nursing', 'nurse', 'angel', 'locsin', 'artista', '12345678', 'user', '2020-08-22', 'yes', 'Registered by Admin'),
(13, 2021, 'Hagonoy Campus', 'ako', '', '', '', 'ako', 'user', '2020-08-23', 'yes', 'Registered by Admin'),
(14, 2021, 'College of Business Administration', 'mrcba', '', '', '', '12345', 'user', '2020-09-04', 'yes', 'Registered by Admin'),
(15, 2021, 'College of Engineering', 'coe', '', '', '', '12345', 'user', '2020-09-04', 'yes', 'Registered by Admin'),
(16, 2022, 'Supply Office', 'Jaymark', '', '', '', 'a', 'administrator', '2020-10-05', 'yes', 'Registered by Admin'),
(18, 2020, 'Supply Office', 'supplier_admin', 'sasdfasdf', 'asdfasdf', 'supplier', '12345', 'administrator', '2020-10-20', 'yes', 'Registered by Admin'),
(19, 2020, 'Supply Office', 'Leah', 'Leah', 'Cruz', 'Administrative Aide IV', 'Qwertyu7$', 'administrator', '2020-12-28', 'yes', 'Registered by Admin'),
(21, 2022, 'College of Information and Communications Technology', 'lem', 'rommel', 'pabustan', 'Instructor 1', '12345', 'user', '2021-01-01', 'yes', 'Registered by Admin'),
(22, 2022, 'College of Science', 'sci', 'Patricia', 'Cruz', 'Instructor 1', 'Savior7#', 'user', '2021-01-03', 'yes', 'Registered by Admin'),
(23, 2022, 'College of Social Science and Philosophy', 'philo', 'James', 'Barrios', 'Instructor 1', 'Qwerty7$', 'user', '2021-01-03', 'yes', 'Registered by Admin'),
(24, 2022, 'Graduate School', 'grad', 'Tony', 'Lopez', 'Instructor 1', '12345', 'user', '2021-01-03', 'yes', 'Registered by Admin'),
(25, 2022, 'College of Physical Education, Recreation and Sports', 'pe', 'Michael', 'Jordan', 'INSTRUCTOR II', '12345', 'user', '2021-01-07', 'yes', 'Registered by Admin'),
(26, 2022, 'Meneses Campus', 'men', 'Tony', 'Reyes', 'INSTRUCTOR I', '12345', 'user', '2021-01-07', 'yes', 'Registered by Admin'),
(27, 2022, 'Main Office', 'main', 'Angela', 'Soriano', 'INSTRUCTOR II', '12345', 'user', '2021-01-12', 'yes', 'Registered by Admin'),
(28, 2022, 'College of Home Economics', 'HE', 'Myla', 'Valdez', 'INSTRUCTOR II', '12345', 'user', '2021-01-13', 'yes', 'Registered by Admin'),
(30, 2022, 'College of Architecture and Fine Arts', 'archi', 'Arceo', 'Jimenez', 'INSTRUCTOR II', '12345', 'user', '2021-01-20', 'yes', 'Registered by Admin'),
(31, 2022, 'College of Industrial Technology', 'cit', 'Ramon', 'Manio', 'INSTRUCTOR II', '12345', 'user', '2021-01-20', 'yes', 'Registered by Admin'),
(33, 2022, 'College of Law', 'Atty', 'eco', 'nomics', 'Instructor 1', '12345', 'user', '2021-08-28', 'yes', 'Registered by Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consolidated_notification`
--
ALTER TABLE `consolidated_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposal_request`
--
ALTER TABLE `disposal_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_code`
--
ALTER TABLE `equipment_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_owner`
--
ALTER TABLE `item_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `par_summary_report`
--
ALTER TABLE `par_summary_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_ppmp_history`
--
ALTER TABLE `procurement_ppmp_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary_report`
--
ALTER TABLE `summary_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bac_reso`
--
ALTER TABLE `tbl_bac_reso`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fund`
--
ALTER TABLE `tbl_fund`
  ADD PRIMARY KEY (`fund_id`);

--
-- Indexes for table `tbl_generate_bac_report`
--
ALTER TABLE `tbl_generate_bac_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_iar`
--
ALTER TABLE `tbl_iar`
  ADD PRIMARY KEY (`iar_ID`);

--
-- Indexes for table `tbl_iar_items`
--
ALTER TABLE `tbl_iar_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ics`
--
ALTER TABLE `tbl_ics`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_maintenance`
--
ALTER TABLE `tbl_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_par`
--
ALTER TABLE `tbl_par`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_par_items`
--
ALTER TABLE `tbl_par_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_pt_par_items`
--
ALTER TABLE `tbl_pt_par_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_rfq`
--
ALTER TABLE `tbl_rfq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rfq_item_details`
--
ALTER TABLE `tbl_rfq_item_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_employee`
--
ALTER TABLE `tbl_supplier_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier_position`
--
ALTER TABLE `tbl_supplier_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supply_office_employee`
--
ALTER TABLE `tbl_supply_office_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supply_office_employee_position`
--
ALTER TABLE `tbl_supply_office_employee_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_item`
--
ALTER TABLE `transfer_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consolidated_notification`
--
ALTER TABLE `consolidated_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disposal_request`
--
ALTER TABLE `disposal_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `equipment_code`
--
ALTER TABLE `equipment_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_owner`
--
ALTER TABLE `item_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `par_summary_report`
--
ALTER TABLE `par_summary_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `procurement_ppmp_history`
--
ALTER TABLE `procurement_ppmp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `summary_report`
--
ALTER TABLE `summary_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bac_reso`
--
ALTER TABLE `tbl_bac_reso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bac_resolution`
--
ALTER TABLE `tbl_bac_resolution`
  MODIFY `bacresID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_fund`
--
ALTER TABLE `tbl_fund`
  MODIFY `fund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_generate_bac_report`
--
ALTER TABLE `tbl_generate_bac_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_iar`
--
ALTER TABLE `tbl_iar`
  MODIFY `iar_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_iar_items`
--
ALTER TABLE `tbl_iar_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ics`
--
ALTER TABLE `tbl_ics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_item_category`
--
ALTER TABLE `tbl_item_category`
  MODIFY `itemcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_item_details`
--
ALTER TABLE `tbl_item_details`
  MODIFY `itemdetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_maintenance`
--
ALTER TABLE `tbl_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_par`
--
ALTER TABLE `tbl_par`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_par_items`
--
ALTER TABLE `tbl_par_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_po`
--
ALTER TABLE `tbl_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_po_items`
--
ALTER TABLE `tbl_po_items`
  MODIFY `poID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ppmp`
--
ALTER TABLE `tbl_ppmp`
  MODIFY `ppmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_ppmp_consolidated`
--
ALTER TABLE `tbl_ppmp_consolidated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `tbl_pr`
--
ALTER TABLE `tbl_pr`
  MODIFY `prID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pr_items`
--
ALTER TABLE `tbl_pr_items`
  MODIFY `prID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_pt_par_items`
--
ALTER TABLE `tbl_pt_par_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_purpose`
--
ALTER TABLE `tbl_purpose`
  MODIFY `purposeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rfq`
--
ALTER TABLE `tbl_rfq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_rfq_item_details`
--
ALTER TABLE `tbl_rfq_item_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_supplier_employee`
--
ALTER TABLE `tbl_supplier_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier_position`
--
ALTER TABLE `tbl_supplier_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_supply_office_employee`
--
ALTER TABLE `tbl_supply_office_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supply_office_employee_position`
--
ALTER TABLE `tbl_supply_office_employee_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transfer_item`
--
ALTER TABLE `transfer_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
