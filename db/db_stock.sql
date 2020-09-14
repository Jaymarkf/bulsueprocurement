-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `bulsuepr_database`;
CREATE DATABASE `bulsuepr_database` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bulsuepr_database`;

DROP TABLE IF EXISTS `tbl_bac_reso`;
CREATE TABLE `tbl_bac_reso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `c_id_array` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_bac_reso` (`id`, `date_created`, `c_id_array`) VALUES
(3,	'2020-09-13 14:33:10',	'2');

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


DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE `tbl_branch` (
  `branchID` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(300) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`branchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22,	'Graduate School',	'user');

DROP TABLE IF EXISTS `tbl_fund`;
CREATE TABLE `tbl_fund` (
  `fund_id` int(11) NOT NULL AUTO_INCREMENT,
  `fund_description` varchar(25) NOT NULL,
  PRIMARY KEY (`fund_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_fund` (`fund_id`, `fund_description`) VALUES
(1,	'GAA'),
(2,	'Income'),
(3,	'Fiduciary Fund');

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

INSERT INTO `tbl_iar` (`iar_ID`, `iar_No`, `iar_Date`, `invoice_No`, `inv_Date`, `Year`, `supplier`, `POno`, `po_Date`, `rod`, `rcc`) VALUES
(1,	1,	'2019-07-27',	0,	'0000-00-00',	2020,	'goodwill',	'0001',	'2019-07-27',	'CICT',	'BC');

DROP TABLE IF EXISTS `tbl_iar_items`;
CREATE TABLE `tbl_iar_items` (
  `iar_itemsID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) NOT NULL,
  `POno` varchar(20) NOT NULL,
  `SPno` varchar(20) NOT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(350) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`iar_itemsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_iar_items` (`iar_itemsID`, `Year`, `POno`, `SPno`, `Unit`, `ItemDescription`, `Quantity`) VALUES
(1,	2020,	'0001',	'',	'Unit',	'LCD',	36),
(2,	2021,	'0002',	'',	'Pieces',	'Ballpen (Blue)',	2);

DROP TABLE IF EXISTS `tbl_item_category`;
CREATE TABLE `tbl_item_category` (
  `itemcategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemCatDesc` varchar(350) NOT NULL,
  PRIMARY KEY (`itemcategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `tbl_po`;
CREATE TABLE `tbl_po` (
  `poID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) NOT NULL,
  `EntityName` varchar(300) NOT NULL,
  `supplier` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `TIN` varchar(50) NOT NULL,
  `POno` varchar(150) NOT NULL,
  `PO_Date` date NOT NULL,
  `MOP` varchar(150) NOT NULL,
  PRIMARY KEY (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_po` (`poID`, `Year`, `EntityName`, `supplier`, `address`, `email`, `contact_no`, `TIN`, `POno`, `PO_Date`, `MOP`) VALUES
(1,	0,	'',	'',	'',	'',	'',	'',	'0000',	'2020-08-03',	''),
(5,	2021,	'',	'CD-R King',	'Malolos Robinson',	'CD-RKING@cdrking.com',	'12345',	'12345',	'0001',	'2020-08-28',	'Check and Carry'),
(6,	2021,	'',	'GOOGLE',	'AMERICA',	'GOOGLE@GOOGLE.com',	'09123123',	'TIN101',	'0002',	'2020-09-13',	'Check and Carry');

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

INSERT INTO `tbl_po_items` (`poID`, `Year`, `POno`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`) VALUES
(21,	2021,	'0001',	NULL,	'Pieces',	'Ballpen (Red)',	200,	8,	1600),
(25,	2021,	'0002',	NULL,	'Pieces',	'Ballpen (Blue)',	2,	8,	16);

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

INSERT INTO `tbl_ppmp` (`ppmpID`, `user_id`, `Year`, `EndUserUnit`, `SourceOfFund`, `Status`, `Priority`, `BO_PPMP_Status`, `PU_PPMP_Status`, `purpose`, `date_requested`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`, `EstimatedBudget`, `TotalQty`, `TotalAmount`, `Remarks`, `pr_approved`) VALUES
(36,	7,	'2021',	'College of Arts and Letters',	'Income',	'Completed',	'No',	'Approved',	'Approved',	'AUDITINGS',	'2020-08-28 15:00:10',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	2,	1,	0,	0,	0,	0,	1,	2,	0,	0,	0,	0,	999999,	6,	150000.00,	'',	''),
(37,	12,	'2021',	'College of Nursing',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'AUDITINGS',	'2020-08-28 15:04:27',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	1,	0,	0,	0,	4,	0,	0,	8,	0,	2,	0,	0,	239999,	15,	375000.00,	'',	''),
(38,	11,	'2021',	'College of Law',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-08-28 15:09:49',	'COMMON OFFICE SUPPLIES',	'Ballpen (Red)',	'Pieces',	8.00,	0,	0,	4,	0,	0,	1,	0,	200,	1,	0,	0,	0,	23000,	206,	1648.00,	'',	''),
(39,	15,	'2020',	'College of Engineering',	'Fiduciary Fund',	'Pending',	'No',	'Approved',	'',	'OTHER GENERAL SERVICES',	'2020-09-04 10:35:11',	'FILING CABINET',	'gasolina',	'Liters',	3500.00,	1,	0,	2,	0,	0,	0,	0,	4,	0,	3,	0,	5,	25000,	15,	52500.00,	'',	''),
(40,	15,	'2021',	'College of Engineering',	'Income',	'Completed',	'No',	'Approved',	'Approved',	'AUDITING FIRMS',	'2020-09-04 10:37:05',	'COMMON OTHER SUPPLIES & MATERIALS',	'Clearbook Legal Size',	'Piece',	60.00,	3,	0,	0,	0,	0,	5,	0,	5,	0,	0,	0,	0,	5000,	13,	780.00,	'',	''),
(42,	14,	'2021',	'College of Business Administration',	'GAA',	'Completed',	'No',	'Approved',	'Approved',	'OFFICE SUPPLIES EXPENSES',	'2020-09-04 10:53:50',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	2,	2,	2,	2,	1,	2,	0,	0,	1,	1,	0,	0,	9000,	13,	325000.00,	'asap',	''),
(43,	13,	'2021',	'Hagonoy Campus',	'Income',	'Completed',	'No',	'Approved',	'Approved',	'ADVERTISING EXPENSES',	'2020-09-13 14:03:16',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	0,	0,	0,	0,	0,	0,	0,	0,	4,	0,	0,	0,	2555555,	4,	4089.28,	'',	'pending'),
(44,	15,	'2021',	'College of Engineering',	'Income',	'Completed',	'No',	'Approved',	'Approved',	'ADVERTISING EXPENSES',	'2020-09-13 14:08:40',	'COMMON OFFICE SUPPLIES',	'Ballpen (Blue)',	'Pieces',	8.00,	0,	0,	0,	0,	0,	0,	0,	0,	2,	0,	0,	0,	222222,	2,	16.00,	'',	'approved');

DROP TABLE IF EXISTS `tbl_ppmp_consolidated`;
CREATE TABLE `tbl_ppmp_consolidated` (
  `consolidatedID` int(11) NOT NULL AUTO_INCREMENT,
  `Year` varchar(6) NOT NULL,
  `ItemCatDesc` varchar(350) NOT NULL,
  `itemdetailDesc` varchar(350) NOT NULL,
  `UnitOfMeasurement` varchar(20) NOT NULL,
  `PriceCatalogue` decimal(11,2) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `TotalAmount` decimal(11,2) NOT NULL,
  PRIMARY KEY (`consolidatedID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_ppmp_consolidated` (`consolidatedID`, `Year`, `ItemCatDesc`, `itemdetailDesc`, `UnitOfMeasurement`, `PriceCatalogue`, `TotalQty`, `TotalAmount`) VALUES
(27,	'2021',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	6,	150000.00),
(28,	'2021',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	15,	375000.00),
(29,	'2021',	'COMMON OFFICE SUPPLIES',	'Ballpen (Red)',	'Pieces',	8.00,	206,	1648.00),
(30,	'2021',	'ProjectorsNew',	'LCD',	'Unit',	25000.00,	13,	325000.00),
(31,	'2021',	'COMMON OTHER SUPPLIES & MATERIALS',	'Clearbook Legal Size',	'Piece',	60.00,	13,	780.00),
(32,	'2021',	'INK/TONER FOR PRINTERS',	'Canon 810 Black',	'Cartridges',	1022.32,	4,	4089.28),
(33,	'2021',	'COMMON OTHER SUPPLIES & MATERIALS',	'Clearbook Legal Size',	'Piece',	60.00,	13,	780.00),
(34,	'2021',	'COMMON OFFICE SUPPLIES',	'Ballpen (Blue)',	'Pieces',	8.00,	2,	16.00);

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
  `RequestingSignature` longblob,
  `RequestingDesignation` varchar(300) DEFAULT NULL,
  `ApprovedBy` varchar(300) DEFAULT NULL,
  `ApprovingSignature` longblob,
  `ApprovingDesignation` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`prID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pr` (`prID`, `user_id`, `Year`, `EntityName`, `FundCluster`, `OfficeSection`, `PRno`, `ResponsibilityCenter`, `PR_Date`, `GrandTotal`, `Purpose`, `RequestedBy`, `RequestingSignature`, `RequestingDesignation`, `ApprovedBy`, `ApprovingSignature`, `ApprovingDesignation`) VALUES
(12,	7,	2021,	'College of Arts and Letters',	'Income',	'',	'0001',	NULL,	'2020-08-28',	NULL,	NULL,	'john',	NULL,	NULL,	'',	NULL,	NULL),
(13,	12,	2021,	'College of Nursing',	'GAA',	'',	'0002',	NULL,	'2020-08-28',	NULL,	NULL,	'nurse',	NULL,	NULL,	'',	NULL,	NULL),
(14,	11,	2021,	'College of Law',	'GAA',	'',	'0003',	NULL,	'2020-08-28',	NULL,	NULL,	'mrLaw',	NULL,	NULL,	'',	NULL,	NULL),
(17,	11,	2021,	'College of Law',	'GAA',	'',	'0004',	NULL,	'2020-08-29',	NULL,	NULL,	'mrLaw',	NULL,	NULL,	'',	NULL,	NULL),
(18,	14,	2021,	'College of Business Administration',	'GAA',	'',	'0005',	NULL,	'2020-09-04',	NULL,	NULL,	'mrcba',	NULL,	NULL,	'',	NULL,	NULL),
(19,	15,	2021,	'College of Engineering',	'Income',	'',	'0006',	NULL,	'2020-09-13',	NULL,	NULL,	'coe',	NULL,	NULL,	'',	NULL,	NULL);

DROP TABLE IF EXISTS `tbl_pr_items`;
CREATE TABLE `tbl_pr_items` (
  `prID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `PRno` varchar(20) NOT NULL,
  `FundCluster` varchar(20) DEFAULT NULL,
  `StockPropertyNo` varchar(20) DEFAULT NULL,
  `Unit` varchar(300) NOT NULL,
  `ItemDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  `EstimatedBudget` int(11) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`prID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pr_items` (`prID`, `user_id`, `Year`, `PRno`, `FundCluster`, `StockPropertyNo`, `Unit`, `ItemDescription`, `Quantity`, `UnitCost`, `TotalCost`, `EstimatedBudget`, `Purpose`) VALUES
(14,	7,	2021,	'0001',	'Income',	'',	'Unit',	'LCD',	2,	25000,	50000,	999999,	'AUDITINGS'),
(15,	12,	2021,	'0002',	'GAA',	'',	'Unit',	'LCD',	8,	25000,	200000,	239999,	'AUDITINGS'),
(16,	11,	2021,	'0003',	'GAA',	'',	'Pieces',	'Ballpen (Red)',	200,	8,	1600,	23000,	'OFFICE SUPPLIES EXPENSES'),
(18,	11,	2021,	'0004',	'GAA',	'',	'Pieces',	'Ballpen (Red)',	200,	8,	1600,	23000,	'OFFICE SUPPLIES EXPENSES'),
(19,	14,	2021,	'0005',	'GAA',	'',	'Unit',	'LCD',	1,	25000,	25000,	9000,	'OFFICE SUPPLIES EXPENSES');

DROP TABLE IF EXISTS `tbl_purpose`;
CREATE TABLE `tbl_purpose` (
  `purposeID` int(11) NOT NULL AUTO_INCREMENT,
  `purpose` varchar(300) NOT NULL,
  PRIMARY KEY (`purposeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `company_name` varchar(255) NOT NULL,
  `quotation_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `purchase_request_no` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `TIN` varchar(255) NOT NULL,
  `ABC` varchar(255) NOT NULL,
  `philgeps` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_rfq` (`id`, `company_name`, `quotation_no`, `address`, `purchase_request_no`, `contact_no`, `purpose`, `TIN`, `ABC`, `philgeps`, `email`, `date_created`) VALUES
(2,	'EVIL-CORP',	'QUO101',	'BULACAN',	'PR101',	'09456123123',	'PURPOSE',	'TIN101',	'ABC-COMPANY',	'PHILGEPS101',	'bulsu@gmail.com',	'2020-09-13 14:24:12'),
(3,	'GOOGLE',	'QUO101',	'BULACAN',	'PR101',	'09456123123',	'PURPOSE2322',	'TIN102',	'ABC-ORG',	'PHILGEPS102',	'bulsu@gmail.com',	'2020-09-13 14:26:13'),
(4,	'FACEBOOK',	'QUO103',	'AMERICA',	'PR103',	'09412123',	'PURPOSE1111',	'TIN2222',	'ABC-ORGG',	'PHILGEPS103',	'daddydadduy@gmail.com',	'2020-09-13 14:28:00');

DROP TABLE IF EXISTS `tbl_rfq_item_details`;
CREATE TABLE `tbl_rfq_item_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfq_item_id` int(11) NOT NULL,
  `item_no` varchar(255) NOT NULL,
  `item_and_specification` varchar(255) NOT NULL,
  `quantity_and_unit` varchar(255) NOT NULL,
  `brand_and_model_offered` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `approved_item_price` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_rfq_item_details` (`id`, `rfq_item_id`, `item_no`, `item_and_specification`, `quantity_and_unit`, `brand_and_model_offered`, `unit_price`, `total_price`, `approved_by`, `approved_item_price`, `date_created`) VALUES
(2,	2,	'item101',	'ballben',	'5',	'CD-RKING',	'10',	'50',	'approved',	'',	'2020-09-13 14:33:10'),
(3,	3,	'BAC',	'ITEN',	'45',	'BANND',	'45',	'123',	NULL,	NULL,	NULL),
(4,	4,	'item103',	'ballbeen',	'45',	'SAMSUNG',	'45',	'455555',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) NOT NULL,
  `branch` varchar(300) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `registered_date` date NOT NULL,
  `approved` varchar(3) NOT NULL,
  `Remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `Year`, `branch`, `username`, `password`, `level`, `registered_date`, `approved`, `Remarks`) VALUES
(1,	2020,	'Main Office',	'SuperAdmin',	'adminimda',	'default',	'2017-12-26',	'yes',	'Default'),
(2,	2021,	'Procurement Unit',	'Elizabeth',	'12345',	'administrator',	'2019-05-06',	'yes',	'Registered by Admin'),
(3,	2021,	'Budget Office',	'NenitaBO',	'admin',	'administrator',	'2019-05-06',	'yes',	'Registered by Admin'),
(4,	2020,	'College of Information and Communications Technology',	'deandean',	'Oe@-B17n',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(5,	2020,	'Bustos Campus',	'rommel',	'12345',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(6,	2021,	'College of Architecture and Fine Arts',	'juan',	'12345',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(7,	2021,	'College of Arts and Letters',	'john',	'qwerty',	'user',	'2019-07-13',	'yes',	'Registered by Admin'),
(11,	2021,	'College of Law',	'mrLaw',	'12345',	'user',	'2020-08-22',	'yes',	'Registered by Admin'),
(12,	2021,	'College of Nursing',	'nurse',	'12345',	'user',	'2020-08-22',	'yes',	'Registered by Admin'),
(13,	2021,	'Hagonoy Campus',	'ako',	'ako',	'user',	'2020-08-23',	'yes',	'Registered by Admin'),
(14,	2021,	'College of Business Administration',	'mrcba',	'12345',	'user',	'2020-09-04',	'yes',	'Registered by Admin'),
(15,	2021,	'College of Engineering',	'coe',	'12345',	'user',	'2020-09-04',	'yes',	'Registered by Admin');

-- 2020-09-14 13:34:50