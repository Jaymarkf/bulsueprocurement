-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `bulsuepr_database`;
CREATE DATABASE `bulsuepr_database` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bulsuepr_database`;

DROP TABLE IF EXISTS `consolidated_notification`;
CREATE TABLE `consolidated_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `consolidated_notification`;
INSERT INTO `consolidated_notification` (`id`, `college`, `item`, `status`) VALUES
(13,	'College of Architecture and Fine Arts',	'Canon 810 Black',	'1');

DROP TABLE IF EXISTS `equipment_code`;
CREATE TABLE `equipment_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `equipment_code`;
INSERT INTO `equipment_code` (`id`, `code`, `description`) VALUES
(11,	'1-06-05-070',	'COMMUNICATION EQUIPMENT'),
(12,	'1-06-05-110',	'MEDICAL EQUIPMENT'),
(13,	'1-06-05-010',	'MACHINERY'),
(14,	'1-06-05-120',	'PRINTING EQUIPMENT'),
(15,	'1-06-05-030',	'ICT-EQUIPMENT'),
(16,	'1-06-05-130',	'SPORTS EQUIPMENT'),
(17,	'1-06-06-010',	'MOTOR VEHICLES'),
(18,	'1-06-99-990',	'OTHER PROPERTY, PLANT & EQUIPMENT'),
(19,	'1-06-05-100',	'MILITARY, POLICE & SECURITY EQUIPMENT'),
(20,	'1-06-05-990',	'OTHER MACHINERY & EQUIPMENT'),
(21,	'1-06-05-020',	'OFFICE EQUIPMENT'),
(22,	'1-08-01-020',	'COMPUTER SOFTWARE'),
(23,	'1-06-05-140',	'TECHNICAL & SCIENTIFIC EQUIPMENT'),
(24,	'1-06-07-010',	'FURNITURES & FIXTURES');

DROP TABLE IF EXISTS `tbl_activity_log`;
CREATE TABLE `tbl_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppmp_ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_activity_log`;
INSERT INTO `tbl_activity_log` (`id`, `ppmp_ID`, `user_id`, `activity`, `date_time`) VALUES
(15,	63,	6,	'Remarks Changed from <span class=\"badge badge-warning\">aaaa</span> to <span class=\"badge badge-warning\">game</span>;',	'2020-10-31 12:33:00');

DROP TABLE IF EXISTS `tbl_bac_reso`;
CREATE TABLE `tbl_bac_reso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `c_id_array` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_bac_reso`;

DROP TABLE IF EXISTS `tbl_bac_resolution`;
CREATE TABLE `tbl_bac_resolution` (
  `bacresID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` varchar(4) NOT NULL,
  `Date_Created` date NOT NULL,
  `companyA` varchar(500) NOT NULL,
  `companyB` varchar(500) NOT NULL,
  `companyC` varchar(500) NOT NULL,
  `itemDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`bacresID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_bac_resolution`;

DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE `tbl_branch` (
  `branchID` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(300) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`branchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_branch`;
INSERT INTO `tbl_branch` (`branchID`, `branch`, `level`) VALUES
(1,	'Hagonoy Campus',	'user'),
(2,	'Meneses Campus',	'user'),
(3,	'Bustos Campus',	'user'),
(4,	'Sarmiento Campus',	'user'),
(5,	'Main Office',	'user'),
(6,	'Budget Office',	'administrator'),
(7,	'Procurement Unit',	'administrator'),
(8,	'College of Architecture and Fine Arts',	'user'),
(9,	'College of Arts and Letters',	'user'),
(10,	'College of Business Administration',	'user'),
(11,	'College of Criminal Justice Education',	'user'),
(12,	'College of Education',	'user'),
(13,	'College of Engineering',	'user'),
(14,	'College of Home Economics',	'user'),
(15,	'College of Industrial Technology',	'user'),
(16,	'College of Information and Communications Technology',	'user'),
(17,	'College of Law',	'user'),
(18,	'College of Nursing',	'user'),
(19,	'College of Physical Education, Recreation and Sports',	'user'),
(20,	'College of Science',	'user'),
(21,	'College of Social Science and Philosophy',	'user'),
(22,	'Graduate School',	'user'),
(23,	'Supplier',	'supplier');

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_company`;
INSERT INTO `tbl_company` (`id`, `name`, `address`, `tin`, `email`, `contact`) VALUES
(18,	'FACEBOOK',	'AMERICA',	'TIN-123',	'facebook@facebook.com',	'0945'),
(19,	'GOOGLE',	'CANADA',	'TIN-1234',	'google@google.com',	'0999'),
(20,	'GITHUB',	'AUSTRALLIA',	'TIN-1111',	'GITHUB@GITHUB.com',	'09000'),
(21,	'YOUTUBE',	'MANILA',	'TIN101',	'email@email.com',	'CON'),
(22,	'bulsu',	'BULACAN',	'TIN101',	'bulsu@bulsu.com',	'1444');

DROP TABLE IF EXISTS `tbl_fund`;
CREATE TABLE `tbl_fund` (
  `fund_id` int(11) NOT NULL AUTO_INCREMENT,
  `fund_description` varchar(25) NOT NULL,
  PRIMARY KEY (`fund_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_fund`;
INSERT INTO `tbl_fund` (`fund_id`, `fund_description`) VALUES
(1,	'GAA'),
(2,	'Income'),
(3,	'Fiduciary Fund');

DROP TABLE IF EXISTS `tbl_generate_bac_report`;
CREATE TABLE `tbl_generate_bac_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `item_details_id_array` varchar(22) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_generated` datetime NOT NULL,
  `abc_input` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_generate_bac_report`;
INSERT INTO `tbl_generate_bac_report` (`id`, `company_id`, `item_details_id_array`, `total_price`, `date_generated`, `abc_input`) VALUES
(200,	18,	'27,28,29',	3028,	'2020-10-16 12:11:20',	25555),
(201,	19,	'30,31,32',	383,	'2020-10-16 12:11:20',	25555),
(202,	20,	'33,34,35,36',	45159,	'2020-10-16 12:11:20',	25555);

DROP TABLE IF EXISTS `tbl_iar`;
CREATE TABLE `tbl_iar` (
  `iar_ID` int(11) NOT NULL AUTO_INCREMENT,
  `iar_No` int(150) NOT NULL,
  `iar_Date` date NOT NULL,
  `invoice_No` int(150) NOT NULL,
  `inv_Date` date NOT NULL,
  `Year` int(11) NOT NULL,
  `supplier` varchar(350) NOT NULL,
  `POno` varchar(25) NOT NULL,
  `po_Date` date NOT NULL,
  `rod` varchar(350) NOT NULL,
  `rcc` varchar(25) NOT NULL,
  PRIMARY KEY (`iar_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_iar`;

DROP TABLE IF EXISTS `tbl_iar_items`;
CREATE TABLE `tbl_iar_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poID` int(11) NOT NULL,
  `iar_no` varchar(255) NOT NULL,
  `iar_date` datetime NOT NULL,
  `requisition_office` varchar(255) NOT NULL,
  `responsibility_code_center` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_iar_items`;
INSERT INTO `tbl_iar_items` (`id`, `poID`, `iar_no`, `iar_date`, `requisition_office`, `responsibility_code_center`) VALUES
(5,	6,	'try',	'2020-10-16 00:00:00',	'Hagonoy Campus',	'test');

DROP TABLE IF EXISTS `tbl_ics`;
CREATE TABLE `tbl_ics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ics_num` varchar(20) NOT NULL,
  `iar_id` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
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
  `transfer_item_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_ics`;
INSERT INTO `tbl_ics` (`id`, `ics_num`, `iar_id`, `date_acquired`, `item_desc`, `quantity`, `unit`, `unit_cost`, `total`, `received_from`, `purchase_order_num`, `received_by`, `college`, `position`, `date_issued`, `delivered_by`, `fundcluster_code`, `transfer_item_id`) VALUES
(72,	'1974,9,222',	5,	'1975-01-08',	'31',	9,	'Cartridges',	7,	63,	'3',	'11,424,2003',	'34',	'College of Physical Education, Recreation and Sports',	'PROFESSOR VI',	'1983-12-13',	'Ad laborum Voluptat',	'2,2013,7,222',	NULL),
(74,	'2020,10,102',	5,	'2020-10-20',	'31',	9,	'Cartridges',	7,	63,	'1',	'10,101,2020',	'35',	'College of Architecture and Fine Arts',	'PROFESSOR IV',	'2020-10-20',	'ABC Company',	'2,2020,10,101',	'9');

DROP TABLE IF EXISTS `tbl_item_category`;
CREATE TABLE `tbl_item_category` (
  `itemcategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemCatDesc` varchar(350) NOT NULL,
  PRIMARY KEY (`itemcategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_item_category`;
INSERT INTO `tbl_item_category` (`itemcategoryID`, `ItemCatDesc`) VALUES
(1,	'INK/TONER FOR PRINTERS'),
(2,	'INK/TONER FOR PHOTOCOPYING MACHINE'),
(3,	'COMMON OFFICE SUPPLIES'),
(4,	'PAPER'),
(5,	'COMMON OTHER SUPPLIES & MATERIALS'),
(6,	'DIPLOMA HOLDER'),
(7,	'STAMPING MACHINE'),
(8,	'PLAQUES, TROPHIES & LEI'),
(9,	'FLAGS & FLAGPOLE'),
(10,	'FURNITURE & FIXTURES (LESS THAN P15,000)'),
(11,	'FILING CABINET'),
(12,	'MONOBLOCK CHAIRS'),
(13,	'OFFICE EQUIPMENT (LESS THAN P15,000)'),
(14,	'PRINTER'),
(15,	'APPLIANCES  (LESS THAN P15,000)'),
(16,	'MACHINERY & EQUIPMENT (LESS THAN P15,000)'),
(17,	'ICT EQUIPMENT & PERIPHERALS  (LESS THAN P15,000)'),
(18,	'JANITORIAL SUPPLIES'),
(19,	'OFFICE EQUIPMENT (P15,000 and UP)'),
(20,	'ICT EQUIPMENT (P15,000 and UP)'),
(21,	'MEDICAL EQUIPMENT (P15,000 and UP)'),
(22,	'SPORTS EQUIPMENT (P15,000 and UP)'),
(23,	'MUSICAL INSTRUMENTS/SOUND SYSTEM (P15,000 and UP)'),
(24,	'TECHNICAL & SCIENTIFIC EQUIPMENT (P15,000 and UP)'),
(25,	'OTHER MACHINERY & EQUIPMENT (P15,000 and UP)'),
(26,	'LABORATORY EQUIPMENT (P15,000 and UP)'),
(27,	'PHYSICS LABORATORY EQUIPMENT (P15,000 and UP)'),
(28,	'CRIMINOLOGY LABORATORY EQUIPMENT (P15,000 and UP)'),
(29,	'AUTOMOTIVE DEPARTMENT (P15,000 and UP)'),
(30,	'BIOLOGY (P15,000 and UP)'),
(31,	'FOOD SCIENCE (P15,000 and UP)'),
(32,	'ENVIRONMENTAL SCIENCE (P15,000 and UP)'),
(33,	'CHEMISTRY (P15,000 and UP)'),
(34,	'BAKING (P15,000 and UP)'),
(35,	'FURNITURES AND FIXTURES (P15,000 and UP)'),
(36,	'TEXTBOOKS & INSTRUCTIONAL MATERIALS'),
(37,	'SUBSCRIPTION EXPENSES'),
(38,	'OTHER MOOE (EVENTS & ACTIVITIES)'),
(39,	'REPRESENTATION EXPENSES'),
(40,	'CONSTRUCTION (PMO)'),
(41,	'REPAIR & MAINTENANCE (FMO)'),
(42,	'ProjectorsNew'),
(45,	'FIRE EXTINGUISHER'),
(47,	'monoblock'),
(48,	'DUGONG'),
(51,	'Pusa'),
(52,	'IPAD');

DROP TABLE IF EXISTS `tbl_item_details`;
CREATE TABLE `tbl_item_details` (
  `itemdetailID` int(11) NOT NULL AUTO_INCREMENT,
  `itemcategoryID` int(11) NOT NULL,
  `itemdetailDesc` varchar(350) NOT NULL,
  `UnitOfMeasurement` varchar(20) NOT NULL,
  `PriceCatalogue` decimal(11,2) NOT NULL,
  PRIMARY KEY (`itemdetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_item_details`;
INSERT INTO `tbl_item_details` (`itemdetailID`, `itemcategoryID`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`) VALUES
(1,	1,	'Canon 810 Black',	'Cartridges',	1022.32),
(2,	1,	'Canon 811 Tri-Color',	'Cartridges',	774.00),
(3,	1,	'Hewlett Packard 85 A',	'Cartridges',	3200.00),
(4,	2,	'Gestetner Toner, 1900',	'Cartridges',	3800.00),
(5,	3,	'Ballpen (Black)',	'Pieces',	8.00),
(6,	3,	'Ballpen (Blue)',	'Pieces',	8.00),
(7,	3,	'Ballpen (Red)',	'Pieces',	8.00),
(8,	5,	'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box',	'Pieces',	200.00),
(9,	5,	'Clear Folder Legal Size',	'Pieces',	30.00),
(10,	5,	'Clearbook Legal Size',	'Piece',	60.00),
(11,	15,	'Cutter Knife, heavy duty',	'Piece',	30.00),
(12,	5,	'Data Folder, made with chipboard, taglia lock',	'Piece',	270.00),
(13,	14,	'Epson110',	'Unit',	5000.00),
(14,	42,	'LCD',	'Unit',	25000.00),
(15,	3,	'executive chair',	'Pieces',	35000.00),
(16,	11,	'gasolina',	'Liters',	3500.00),
(17,	47,	'with arm rest',	'Pieces',	1350.00),
(18,	12,	'yantok',	'unit',	20000.00);

DROP TABLE IF EXISTS `tbl_par`;
CREATE TABLE `tbl_par` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_par`;
INSERT INTO `tbl_par` (`id`, `ics_num`, `iar_id`, `e_code`, `date_acquired`, `received_from`, `purchase_order_num`, `received_by_ids`, `date_issued`, `delivered_by`, `fundcluster_code`) VALUES
(17,	'2013,1,111',	5,	'20',	'1994-10-01',	'3',	'3,1,2004',	'33,35',	'1998-08-11',	'Culpa ea et nobis la',	'1,2007,4,111');

DROP TABLE IF EXISTS `tbl_par_items`;
CREATE TABLE `tbl_par_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `par_id` int(11) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unit_cost` int(100) NOT NULL,
  `total_cost` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_par_items`;
INSERT INTO `tbl_par_items` (`id`, `par_id`, `item_description`, `quantity`, `unit`, `unit_cost`, `total_cost`) VALUES
(47,	17,	'Ballpen (Red)',	9,	'Pieces',	15000,	135000);

DROP TABLE IF EXISTS `tbl_po`;
CREATE TABLE `tbl_po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bac_id` int(11) NOT NULL,
  `date_generate` datetime DEFAULT NULL,
  `date_term` varchar(255) DEFAULT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_po`;
INSERT INTO `tbl_po` (`id`, `bac_id`, `date_generate`, `date_term`, `mode_of_payment`, `company_id`) VALUES
(6,	201,	'2020-10-16 00:00:00',	'2021',	'Check and Carry',	19);

DROP TABLE IF EXISTS `tbl_po_items`;
CREATE TABLE `tbl_po_items` (
  `poID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) NOT NULL,
  `POno` varchar(20) NOT NULL,
  `StockPropertyNo` varchar(20) DEFAULT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  PRIMARY KEY (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_po_items`;

DROP TABLE IF EXISTS `tbl_ppmp`;
CREATE TABLE `tbl_ppmp` (
  `ppmpID` int(11) NOT NULL AUTO_INCREMENT,
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
  `EstimatedBudget` int(11) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `TotalAmount` decimal(11,2) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `pr_approved` varchar(500) NOT NULL,
  PRIMARY KEY (`ppmpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_ppmp`;
INSERT INTO `tbl_ppmp` (`ppmpID`, `user_id`, `Year`, `EndUserUnit`, `SourceOfFund`, `Status`, `Priority`, `BO_PPMP_Status`, `PU_PPMP_Status`, `purpose`, `date_requested`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`, `EstimatedBudget`, `TotalQty`, `TotalAmount`, `Remarks`, `pr_approved`) VALUES
(55,	13,	'2021',	'Hagonoy Campus',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-22 18:47:38',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	0,	0,	0,	0,	0,	0,	0,	0,	5,	0,	0,	0,	25000,	5,	5111.60,	'',	'approved'),
(56,	15,	'2021',	'College of Engineering',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-22 18:50:21',	'INK/TONER FOR PRINTERS',	'Canon 811 Tri-Color',	'Cartridges',	774.00,	0,	0,	0,	0,	0,	0,	0,	0,	3,	0,	0,	0,	25000,	3,	2322.00,	'',	'approved'),
(57,	14,	'2021',	'College of Business Administration',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-22 18:51:39',	'COMMON OFFICE SUPPLIES',	'Ballpen (Red)',	'Pieces',	8.00,	0,	0,	0,	0,	0,	0,	0,	0,	5,	0,	0,	0,	140000,	5,	40.00,	'',	'approved'),
(58,	14,	'2021',	'College of Business Administration',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'JANITORIAL SERVICES',	'2020-09-22 18:51:56',	'COMMON OFFICE SUPPLIES',	'Ballpen (Blue)',	'Pieces',	8.00,	0,	0,	0,	0,	0,	0,	0,	0,	4,	0,	0,	0,	101100,	4,	32.00,	'',	'approved'),
(59,	11,	'2021',	'College of Law',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-22 18:54:05',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	0,	0,	0,	0,	0,	0,	0,	0,	5,	0,	0,	0,	255555,	5,	5111.60,	'',	'approved'),
(60,	11,	'2021',	'College of Law',	'Income',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-22 18:54:23',	'COMMON OFFICE SUPPLIES',	'Ballpen (Blue)',	'Pieces',	8.00,	0,	0,	0,	0,	0,	2,	0,	0,	4,	0,	0,	0,	222222,	6,	48.00,	'',	'approved'),
(61,	7,	'2021',	'College of Arts and Letters',	'Income',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-22 18:57:00',	'COMMON OFFICE SUPPLIES',	'Ballpen (Red)',	'Pieces',	8.00,	0,	0,	0,	0,	0,	0,	0,	0,	5,	0,	0,	0,	255555,	5,	40.00,	'',	'approved'),
(62,	7,	'2021',	'College of Arts and Letters',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'FUEL, OIL AND LUBRICANTS EXPENSES',	'2020-09-22 18:57:13',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	0,	0,	0,	0,	0,	0,	0,	0,	2,	0,	0,	0,	25555,	2,	50000.00,	'',	'approved'),
(63,	6,	'2021',	'College of Architecture and Fine Arts',	'GAA',	'Pending',	'No',	'',	'',	'AUDITINGS',	'2020-10-28 20:33:25',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	1,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	11111,	1,	1022.32,	'<span class=\"badge badge-warning\">game</span>',	'pending'),
(65,	6,	'2021',	'College of Architecture and Fine Arts',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'ADVERTISING EXPENSES',	'2020-10-30 00:55:43',	'INK/TONER FOR PRINTERS',	'Hewlett Packard 85 A',	'Cartridges',	3200.00,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	0,	4444,	0,	0.00,	'<span class=\"badge badge-warning\">ew</span>',	'pending');

DROP TABLE IF EXISTS `tbl_ppmp_consolidated`;
CREATE TABLE `tbl_ppmp_consolidated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consolidate_id` int(11) DEFAULT NULL,
  `Year` varchar(6) DEFAULT NULL,
  `ItemCatDesc` varchar(350) DEFAULT NULL,
  `itemdetailDesc` varchar(350) DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) DEFAULT NULL,
  `PriceCatalogue` decimal(11,2) DEFAULT NULL,
  `TotalQty` int(11) DEFAULT NULL,
  `TotalAmount` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_ppmp_consolidated`;
INSERT INTO `tbl_ppmp_consolidated` (`id`, `consolidate_id`, `Year`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `TotalQty`, `TotalAmount`) VALUES
(560,	55,	'2021',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	NULL,	5111.60),
(561,	56,	'2021',	'INK/TONER FOR PRINTERS',	'Canon 811 Tri-Color',	'Cartridges',	774.00,	NULL,	2322.00),
(562,	57,	'2021',	'COMMON OFFICE SUPPLIES',	'Ballpen (Red)',	'Pieces',	8.00,	NULL,	40.00),
(563,	58,	'2021',	'COMMON OFFICE SUPPLIES',	'Ballpen (Blue)',	'Pieces',	8.00,	NULL,	32.00),
(564,	59,	'2021',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	NULL,	5111.60),
(565,	60,	'2021',	'COMMON OFFICE SUPPLIES',	'Ballpen (Blue)',	'Pieces',	8.00,	NULL,	48.00),
(566,	61,	'2021',	'COMMON OFFICE SUPPLIES',	'Ballpen (Red)',	'Pieces',	8.00,	NULL,	40.00),
(567,	62,	'2021',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	NULL,	50000.00);

DROP TABLE IF EXISTS `tbl_pr`;
CREATE TABLE `tbl_pr` (
  `prID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `Year` int(11) DEFAULT NULL,
  `EntityName` varchar(300) DEFAULT NULL,
  `FundCluster` varchar(300) DEFAULT NULL,
  `OfficeSection` varchar(300) NOT NULL,
  `PRno` varchar(20) DEFAULT NULL,
  `ResponsibilityCenter` varchar(300) DEFAULT NULL,
  `PR_Date` date DEFAULT NULL,
  `GrandTotal` int(11) DEFAULT NULL,
  `Purpose` varchar(255) DEFAULT NULL,
  `RequestedBy` varchar(300) DEFAULT NULL,
  `RequestingSignature` longblob DEFAULT NULL,
  `RequestingDesignation` varchar(300) DEFAULT NULL,
  `ApprovedBy` varchar(300) DEFAULT NULL,
  `ApprovingSignature` longblob DEFAULT NULL,
  `ApprovingDesignation` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`prID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_pr`;
INSERT INTO `tbl_pr` (`prID`, `user_id`, `Year`, `EntityName`, `FundCluster`, `OfficeSection`, `PRno`, `ResponsibilityCenter`, `PR_Date`, `GrandTotal`, `Purpose`, `RequestedBy`, `RequestingSignature`, `RequestingDesignation`, `ApprovedBy`, `ApprovingSignature`, `ApprovingDesignation`) VALUES
(28,	13,	2021,	'Hagonoy Campus',	'GAA',	'',	'0001',	NULL,	'2020-09-22',	NULL,	NULL,	'ako',	NULL,	NULL,	'',	NULL,	NULL),
(29,	15,	2021,	'College of Engineering',	'GAA',	'',	'0002',	NULL,	'2020-09-22',	NULL,	NULL,	'coe',	NULL,	NULL,	'',	NULL,	NULL),
(30,	14,	2021,	'College of Business Administration',	'GAA',	'',	'0003',	NULL,	'2020-09-22',	NULL,	NULL,	'mrcba',	NULL,	NULL,	'',	NULL,	NULL),
(31,	11,	2021,	'College of Law',	'Income',	'',	'0004',	NULL,	'2020-09-22',	NULL,	NULL,	'mrLaw',	NULL,	NULL,	'',	NULL,	NULL),
(32,	7,	2021,	'College of Arts and Letters',	'GAA',	'',	'0005',	NULL,	'2020-09-22',	NULL,	NULL,	'john',	NULL,	NULL,	'',	NULL,	NULL);

DROP TABLE IF EXISTS `tbl_pr_items`;
CREATE TABLE `tbl_pr_items` (
  `prID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `PRno` varchar(20) NOT NULL,
  `pr_num_merge` varchar(20) DEFAULT NULL,
  `FundCluster` varchar(20) DEFAULT NULL,
  `StockPropertyNo` varchar(20) DEFAULT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  `EstimatedBudget` int(11) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`prID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_pr_items`;
INSERT INTO `tbl_pr_items` (`prID`, `user_id`, `Year`, `PRno`, `pr_num_merge`, `FundCluster`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`, `EstimatedBudget`, `Purpose`, `order`) VALUES
(34,	13,	2021,	'0001',	'42CEC5CE',	'GAA',	'',	'Cartridges',	'Canon 810 Black',	5,	1022,	5112,	25000,	'OFFICE SUPPLIES EXPENSES',	NULL),
(35,	15,	2021,	'0002',	'677485A5',	'GAA',	'',	'Cartridges',	'Canon 811 Tri-Color',	3,	774,	2322,	25000,	'OFFICE SUPPLIES EXPENSES',	NULL),
(36,	14,	2021,	'0003',	'317E1E00',	'GAA',	'',	'Pieces',	'Ballpen (Red)',	4,	8,	32,	140000,	'OFFICE SUPPLIES EXPENSES',	NULL),
(37,	14,	2021,	'0003',	'8D8C437B',	'GAA',	'',	'Pieces',	'Ballpen (Blue)',	4,	8,	32,	101100,	'JANITORIAL SERVICES',	NULL),
(38,	11,	2021,	'0004',	'42CEC5CE',	'Income',	'',	'Cartridges',	'Canon 810 Black',	4,	1022,	32,	255555,	'OFFICE SUPPLIES EXPENSES',	NULL),
(39,	11,	2021,	'0004',	'8D8C437B',	'Income',	'',	'Pieces',	'Ballpen (Blue)',	4,	8,	32,	222222,	'OFFICE SUPPLIES EXPENSES',	NULL),
(40,	7,	2021,	'0005',	'317E1E00',	'GAA',	'',	'Pieces',	'Ballpen (Red)',	5,	8,	50000,	255555,	'OFFICE SUPPLIES EXPENSES',	NULL),
(41,	7,	2021,	'0005',	'D48D9783',	'GAA',	'',	'Unit',	'LCD',	2,	25000,	50000,	25555,	'FUEL, OIL AND LUBRICANTS EXPENSES',	NULL);

DROP TABLE IF EXISTS `tbl_purpose`;
CREATE TABLE `tbl_purpose` (
  `purposeID` int(11) NOT NULL AUTO_INCREMENT,
  `purpose` varchar(300) NOT NULL,
  PRIMARY KEY (`purposeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_purpose`;
INSERT INTO `tbl_purpose` (`purposeID`, `purpose`) VALUES
(1,	'TRAVELLING EXPENSES-LOCAL'),
(2,	'TRAVELLING EXPENSES-FOREIGN'),
(3,	'TRAINING EXPENSES'),
(4,	'SCHOLARSHIP GRANTS/EXPENSES'),
(6,	'OFFICE SUPPLIES EXPENSES'),
(7,	'ACCOUNTABLE FORMS EXPENSES'),
(8,	'FUEL, OIL AND LUBRICANTS EXPENSES'),
(9,	'TEXTBOOKS AND INSTRUCTIONAL MATERIALS EXPENSES'),
(10,	'OTHER SUPPLIES AND MATERIALS EXPENSES'),
(11,	'WATER EXPENSES'),
(12,	'ELECTRICITY EXPENSES'),
(13,	'POSTAGE AND COURIER SERVICES'),
(14,	'TELEPHONE EXPENSES-MOBILE'),
(15,	'TELEPHONE EXPENSES-LANDLINE'),
(16,	'AWARDS/REWARDS EXPENSES'),
(17,	'SURVEY EXPENSES'),
(18,	'EXTRAORDINARY AND MISCELLANEOUS EXPENSES'),
(19,	'AUDITING SERVICES'),
(20,	'OTHER PROFESSIONAL SERVICES'),
(21,	'JANITORIAL SERVICES'),
(22,	'SECURITY SERVICES'),
(23,	'OTHER GENERAL SERVICES'),
(24,	'REPAIRS & MAINTENANCE-BUILDINGS'),
(25,	'REPAIRS & MAINTENANCE-MACHINERY'),
(26,	'REPAIRS & MAINTENANCE-FURNITURE & FIXTURES'),
(27,	'REPAIRS & MAINTENANCE-TRANSPORTATION EQUIPMENT'),
(28,	'REPAIRS & MAINTENANCE-OTHER PROPERTY, PLANT & EQUIPMENT'),
(29,	'TAXES, DUTIES AND LICENSES'),
(30,	'FIDELITY BOND PREMIUMS'),
(31,	'INSURANCE EXPENSES'),
(32,	'ADVERTISING EXPENSES'),
(33,	'PRINTING AND PUBLICATION EXPENSES'),
(34,	'REPRESENTATION EXPENSES'),
(35,	'RENTS-MOTOR VEHICLES'),
(36,	'MEMBERSHIP DUES & CONTRIBUTIONS TO ORGANIZATIONS'),
(37,	'SUBSCRIPTION EXPENSES'),
(38,	'ssdad'),
(39,	'AUDITING FIRMS'),
(40,	'AUDITINGS');

DROP TABLE IF EXISTS `tbl_quotation`;
CREATE TABLE `tbl_quotation` (
  `quotation_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `extPrice` int(11) NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_quotation`;
INSERT INTO `tbl_quotation` (`quotation_id`, `Q_date`, `Year`, `Company`, `Address`, `Contact_Person`, `Contact_No`, `email`, `TIN`, `Brand_Model`, `itemDescription`, `Quantity`, `unitOfMeasurement`, `unitPrice`, `ABC_Total_Price`, `extPrice`) VALUES
(1,	'2019-07-27',	'2020',	'abc comapany',	'SAN NICOLAS',	'Juan Dela Cruz',	'09485687898',	'admin@etourism.com.au',	'1234567',	'acer',	'LCD',	36,	'Unit',	'30000',	0,	1080000),
(2,	'2019-07-27',	'2020',	'goodwill',	'SAN NICOLAS',	'Juan Dela Cruz',	'09485687898',	'rpabustan@team.i4u.com.au',	'1234567',	'HBM',	'LCD',	36,	'Unit',	'1000',	0,	36000),
(3,	'2019-07-27',	'2020',	'xyz',	'SANTA INES',	'John Doe',	'09485687898',	'carolyn@annecyproperties.com.au',	'1234567',	'Sony',	'LCD',	36,	'Unit',	'1500',	0,	54000),
(4,	'2019-07-27',	'2020',	'abc comapany',	'SAN NICOLAS',	'Juan Dela Cruz',	'09485687898',	'admin@etourism.com.au',	'1234567',	'Casio',	'Canon 810 Black',	48,	'Cartridges',	'1500',	0,	72000),
(5,	'2019-07-27',	'2020',	'goodwill',	'SAN NICOLAS',	'Juan Dela Cruz',	'09485687898',	'rpabustan@team.i4u.com.au',	'1234567',	'Sony',	'Canon 810 Black',	48,	'Cartridges',	'30000',	0,	1440000),
(6,	'2019-07-27',	'2020',	'xyz',	'SANTA ANA',	'John Doe',	'09485687898',	'carolyn@annecyproperties.com.au',	'1234567',	'HBM',	'Canon 810 Black',	48,	'Cartridges',	'1000',	0,	48000),
(7,	'2019-07-27',	'2020',	'goodwill',	'SAN NICOLAS',	'Juan Dela Cruz',	'09485687898',	'admin@etourism.com.au',	'1234567',	'Casio',	'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box',	28,	'Pieces',	'1000',	0,	28000),
(8,	'2019-07-27',	'2020',	'abc comapany',	'SAN NICOLAS',	'Juan Dela Cruz',	'09485687898',	'admin@etourism.com.au',	'1234567',	'acer',	'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box',	28,	'Pieces',	'100',	0,	2800),
(9,	'2019-07-27',	'2020',	'xyz',	'CONCEPCION',	'John Doe',	'09485687898',	'admin@etourism.com.au',	'1234567',	'acer',	'Calculator, Compact, Electronic, 12 digits cap, 1 unit in individual box',	28,	'Pieces',	'30000',	0,	840000),
(10,	'2019-07-29',	'2020',	'goodwill',	'BAGUMBAYAN',	'Juan Dela Cruz',	'09485687898',	'carolyn@annecyproperties.com.au',	'1234567',	'acer',	'Canon 811 Tri-Color',	15,	'Cartridges',	'1500',	0,	22500),
(11,	'2019-07-29',	'2020',	'abc comapany',	'BAMBANG',	'Jane Cruz',	'09485687898',	'admin@etourism.com.au',	'1234567',	'HBM',	'Canon 811 Tri-Color',	15,	'Cartridges',	'100',	0,	1500),
(12,	'2019-07-29',	'2020',	'abc comapany',	'SANTA INES',	'Efty Zannakis',	'09485687898',	'admin@etourism.com.au',	'1234567',	'Sony',	'Canon 811 Tri-Color',	15,	'Cartridges',	'30000',	0,	450000);

DROP TABLE IF EXISTS `tbl_rfq`;
CREATE TABLE `tbl_rfq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `quotation_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `purchase_request_no` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `TIN` varchar(255) NOT NULL,
  `ABC` varchar(255) DEFAULT NULL,
  `philgeps` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_rfq`;
INSERT INTO `tbl_rfq` (`id`, `id_company`, `company_name`, `quotation_no`, `address`, `purchase_request_no`, `contact_no`, `purpose`, `TIN`, `ABC`, `philgeps`, `email`, `date_created`) VALUES
(27,	18,	'FACEBOOK',	'QUO101',	'AMERICA',	'317E1E00',	'0945',	'PURPOSE2322',	'TIN-123',	'd',	'PHILGEPS101',	'facebook@facebook.com',	'2020-09-22 19:03:19'),
(28,	18,	'FACEBOOK',	'QUO101',	'AMERICA',	'42CEC5CE',	'0945',	'PURPOSE2322',	'TIN-123',	'2222',	'PHILGEPS101',	'facebook@facebook.com',	'2020-09-22 19:03:56'),
(29,	18,	'FACEBOOK',	'QUO101',	'AMERICA',	'677485A5',	'0945',	'PURPOSE2322',	'TIN-123',	'2222',	'PHILGEPS101',	'facebook@facebook.com',	'2020-09-22 19:04:42'),
(30,	19,	'GOOGLE',	'QUO101',	'CANADA',	'317E1E00',	'0999',	'PURPOSE2322',	'TIN-1234',	'2222',	'PHILGEPS101',	'google@google.com',	'2020-09-22 19:05:09'),
(31,	19,	'GOOGLE',	'QUO103',	'CANADA',	'42CEC5CE',	'0999',	'PURPOSE2322',	'TIN-1234',	'2525',	'PHILGEPS103',	'google@google.com',	'2020-09-22 19:05:39'),
(32,	19,	'GOOGLE',	'QUO101',	'CANADA',	'677485A5',	'0999',	'PURPOSE2322',	'TIN-1234',	'6262',	'101011',	'google@google.com',	'2020-09-22 19:06:13'),
(33,	20,	'GITHUB',	'QUO101',	'AUSTRALLIA',	'317E1E00',	'09000',	'PURPOSE2322',	'TIN-1111',	'4214',	'101011',	'GITHUB@GITHUB.com',	'2020-09-22 19:06:40'),
(34,	20,	'GITHUB',	'QUO101',	'AUSTRALLIA',	'42CEC5CE',	'09000',	'PURPOSE2322',	'TIN-1111',	'51251',	'PHILGEPS101',	'GITHUB@GITHUB.com',	'2020-09-22 19:07:06'),
(35,	20,	'GITHUB',	'626',	'AUSTRALLIA',	'677485A5',	'09000',	'PURPOSE2322',	'TIN-1111',	'6262',	'PHILGEPS103',	'GITHUB@GITHUB.com',	'2020-09-22 19:07:25'),
(36,	20,	'GITHUB',	'QUO101',	'AUSTRALLIA',	'8D8C437B',	'09000',	'PURPOSE2322',	'TIN-1111',	'',	'PHILGEPS102',	'GITHUB@GITHUB.com',	'2020-09-24 13:34:17'),
(37,	20,	'GITHUB',	'aaa',	'AUSTRALLIA',	'42CEC5CE',	'09000',	'111',	'TIN-1111',	'',	'aaa',	'GITHUB@GITHUB.com',	'2020-10-27 23:49:39');

DROP TABLE IF EXISTS `tbl_rfq_item_details`;
CREATE TABLE `tbl_rfq_item_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfq_item_id` int(11) NOT NULL,
  `item_no` varchar(255) NOT NULL,
  `item_and_specification` varchar(255) NOT NULL,
  `quantity_and_unit` int(11) NOT NULL,
  `brand_and_model_offered` varchar(255) NOT NULL,
  `unit_price` int(50) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `approved_item_price` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_rfq_item_details`;
INSERT INTO `tbl_rfq_item_details` (`id`, `rfq_item_id`, `item_no`, `item_and_specification`, `quantity_and_unit`, `brand_and_model_offered`, `unit_price`, `total_price`, `approved_by`, `approved_item_price`, `date_created`) VALUES
(27,	27,	'BAC',	'Ballpen (Red)',	9,	'asdfasf',	3000,	'27000',	'approved',	NULL,	NULL),
(28,	28,	'item101',	'Canon 810 Black',	9,	'CD-RKING',	25,	'225',	'approved',	NULL,	NULL),
(29,	29,	'BAC',	'Canon 811 Tri-Color',	3,	'hahah',	3,	'9',	'approved',	NULL,	NULL),
(30,	30,	'item101',	'Ballpen (Red)',	9,	'CD-RKING',	15000,	'135000',	'approved',	NULL,	NULL),
(31,	31,	'ITem101',	'Canon 810 Black',	9,	'jio',	7,	'63',	'approved',	NULL,	NULL),
(32,	32,	'hk',	'Canon 811 Tri-Color',	9,	'BANND',	4000,	'27000',	'approved',	NULL,	NULL),
(33,	33,	'hk',	'Ballpen (Red)',	9,	'BANND',	45000,	'405000',	'approved',	NULL,	NULL),
(34,	34,	'item103',	'Canon 810 Black',	9,	'asdfasf',	66,	'594',	'approved',	NULL,	NULL),
(35,	35,	'ITem101',	'Canon 811 Tri-Color',	3,	'SAMSUNG',	88,	'264',	'approved',	NULL,	NULL),
(36,	36,	'ITem101',	'Ballpen (Blue)',	8,	'SAMSUNG',	5,	'40',	'approved',	NULL,	NULL),
(37,	37,	'111',	'Canon 810 Black',	9,	'BBB',	24,	'216',	NULL,	NULL,	NULL),
(38,	37,	'123123',	'Canon 210',	9,	'BA',	11,	'424',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `tbl_supplier_employee`;
CREATE TABLE `tbl_supplier_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(22) NOT NULL,
  `middle_name` varchar(22) NOT NULL,
  `last_name` varchar(22) NOT NULL,
  `college` varchar(22) NOT NULL,
  `position` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_supplier_employee`;
INSERT INTO `tbl_supplier_employee` (`id`, `first_name`, `middle_name`, `last_name`, `college`, `position`) VALUES
(4,	'Jayson',	'P.',	'Pakistano',	'1',	'22'),
(6,	'Ivana',	'm.',	'Ivana',	'12',	'15'),
(9,	'Angel',	'F',	'Locsin',	'20',	'37'),
(10,	'Juan',	'F.',	'Pedro',	'12',	'29'),
(33,	'Katherine',	'B.',	'Bernardo',	'8',	'26'),
(34,	'James',	'J.',	'Smith',	'19',	'31'),
(35,	'Rommel',	'B.',	'Pabustan',	'8',	'29');

DROP TABLE IF EXISTS `tbl_supplier_position`;
CREATE TABLE `tbl_supplier_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_supplier_position`;
INSERT INTO `tbl_supplier_position` (`id`, `name`) VALUES
(15,	'INSTRUCTOR I'),
(22,	'PROFESSOR III'),
(24,	'INSTRUCTOR II'),
(25,	'INSTRUCTOR III'),
(26,	'UNIVERSITY PROFESSOR'),
(27,	'PROFESSOR I'),
(28,	'PROFESSOR II'),
(29,	'PROFESSOR IV'),
(30,	'PROFESSOR V'),
(31,	'PROFESSOR VI'),
(32,	'ASSISTANT PROFESSOR I'),
(33,	'ASSISTANT PROFESSOR II'),
(34,	'ASSISTANT PROFESSOR III'),
(35,	'ASSISTANT PROFESSOR IV'),
(36,	'ASSISTANT PROFESSOR V'),
(37,	'ASSOCIATE PROFESSOR I'),
(38,	'ASSOCIATE PROFESSOR II'),
(39,	'ASSOCIATE PROFESSOR III'),
(40,	'ASSOCIATE PROFESSOR IV'),
(41,	'ASSOCIATE PROFESSOR IV'),
(42,	'ASSOCIATE PROFESSOR VI');

DROP TABLE IF EXISTS `tbl_supply_office_employee`;
CREATE TABLE `tbl_supply_office_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_supply_office_employee`;
INSERT INTO `tbl_supply_office_employee` (`id`, `first_name`, `middle_name`, `last_name`, `position`) VALUES
(1,	'MATILDE',	'ENRIQUEZ',	'PAULINO',	15),
(2,	'JOHN',	'LOPEZ',	'SALAZAR',	2),
(3,	'GLAIZA',	'REYES',	'SANTOS',	14);

DROP TABLE IF EXISTS `tbl_supply_office_employee_position`;
CREATE TABLE `tbl_supply_office_employee_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_supply_office_employee_position`;
INSERT INTO `tbl_supply_office_employee_position` (`id`, `name`) VALUES
(2,	'ADMINISTRATIVE OFFICER I'),
(3,	'ADMINISTRATIVE OFFICER II'),
(4,	'ADMINISTRATIVE OFFICER III'),
(5,	'ADMINSTRATIVE OFFICER IV'),
(6,	'ADMINISTRATIVE ASSISTANT I'),
(7,	'ADMINISTRATIVE ASSISTANT II'),
(8,	'ADMINISTRATIVE ASSISTANT III'),
(9,	'ADMINISTRATIVE ASSISTANT IV'),
(10,	'ADMINISTRATIVE AIDE I'),
(11,	'ADMINISTRATIVE AIDE II'),
(12,	'ADMINISTRATIVE AIDE III'),
(13,	'ADMINISTRATIVE AIDE IV'),
(14,	'EMPLOYEE BY JOB ORDER'),
(15,	'SUPERVISING ADMINISTRATIVE OFFICER'),
(21,	'STAFF');

DROP TABLE IF EXISTS `transfer_item`;
CREATE TABLE `transfer_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `total_cost` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `transfer_item`;
INSERT INTO `transfer_item` (`id`, `issued_by`, `issued_to`, `reason_for_transfer`, `from_fundcluster`, `to_fundcluster`, `ptr_no`, `ptr_date`, `ics_no`, `date_acquired`, `item_desc`, `college`, `quantity`, `unit`, `unit_cost`, `total_cost`) VALUES
(9,	4,	9,	'idol',	'Fiduciary Fund',	'Income',	'2',	'2020-10-24',	'2020-10-102',	'2020-10-20',	'Canon 810 Black',	'College of Architecture and Fine Arts',	9,	'Cartridges',	7,	63);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `Remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `users`;
INSERT INTO `users` (`user_id`, `Year`, `branch`, `username`, `first_name`, `last_name`, `position`, `password`, `level`, `registered_date`, `approved`, `Remarks`) VALUES
(1,	2020,	'Main Office',	'SuperAdmin',	'',	'',	'',	'adminimda',	'default',	'2017-12-26',	'yes',	'Default'),
(2,	2021,	'Procurement Unit',	'Elizabeth',	'',	'',	'',	'a',	'administrator',	'2019-05-06',	'yes',	'Registered by Admin'),
(3,	2021,	'Budget Office',	'NenitaBO',	'',	'',	'',	'admin',	'administrator',	'2019-05-06',	'yes',	'Registered by Admin'),
(4,	2020,	'College of Information and Communications Technology',	'deandean',	'dean',	'pagdanganan',	'teacher 2',	'Oe@-B17n',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(5,	2020,	'Bustos Campus',	'rommel',	'rommel',	'pabustan',	'professor',	'12345',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(6,	2021,	'College of Architecture and Fine Arts',	'juan',	'juan',	'delacruz',	'professor IV',	'12345',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(7,	2021,	'College of Arts and Letters',	'john',	'john',	'luna',	'admin office',	'qwerty',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(11,	2021,	'College of Law',	'mrLaw',	'jason',	'makapal',	'admin office',	'12345',	'user',	'2020-08-22',	'yes',	'Registered by Admin'),
(12,	2021,	'College of Nursing',	'nurse',	'angel',	'locsin',	'artista',	'12345678',	'user',	'2020-08-22',	'yes',	'Registered by Admin'),
(13,	2021,	'Hagonoy Campus',	'ako',	'',	'',	'',	'ako',	'user',	'2020-08-23',	'yes',	'Registered by Admin'),
(14,	2021,	'College of Business Administration',	'mrcba',	'',	'',	'',	'12345',	'user',	'2020-09-04',	'yes',	'Registered by Admin'),
(15,	2021,	'College of Engineering',	'coe',	'',	'',	'',	'12345',	'user',	'2020-09-04',	'yes',	'Registered by Admin'),
(16,	2020,	'Supplier',	'Jaymark',	'',	'',	'',	'a',	'supplier',	'2020-10-05',	'yes',	'Registered by Admin'),
(18,	2020,	'Supplier',	'supplier_admin',	'sasdfasdf',	'asdfasdf',	'supplier',	'12345',	'supplier',	'2020-10-20',	'yes',	'Registered by Admin');

-- 2020-11-05 10:07:03
