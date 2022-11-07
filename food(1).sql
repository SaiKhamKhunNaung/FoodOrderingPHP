-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 03:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(50) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `AdminPassword` varchar(50) DEFAULT NULL,
  `AdminEmail` varchar(50) DEFAULT NULL,
  `AdminPhNo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminPassword`, `AdminEmail`, `AdminPhNo`) VALUES
('A-000001', 'MgMg', '1234', 'mgmg@gmail.com', '098675940'),
('A-000002', 'Steven', '123', 'steven@gmail.com', '094380483048');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` varchar(50) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
('CT-000001', 'Italian '),
('CT-000002', 'Japanese '),
('CT-000003', 'Burmese'),
('CT-000004', 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(50) NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `CustomerPassword` varchar(50) DEFAULT NULL,
  `CustomerEmail` varchar(50) DEFAULT NULL,
  `CustomerPhNo` varchar(50) DEFAULT NULL,
  `CustomerAddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerPassword`, `CustomerEmail`, `CustomerPhNo`, `CustomerAddress`) VALUES
('C-000001', 'ayeee', 'aa', 'aa@gmail.com', '11', 'aa'),
('C-000003', 'SuSu', '1234', 'hlhl@gmail.com', '0944789076', 'Hledan'),
('C-000004', 'sagawah', 'sai', 'sagawahphoo@gmail.com', '095052783', 'Kamayut');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `DeliveryID` varchar(50) NOT NULL,
  `DeliveryDate` varchar(50) DEFAULT NULL,
  `DeliveryTime` varchar(50) DEFAULT NULL,
  `Status` varchar(50) NOT NULL,
  `OrderID` varchar(50) NOT NULL,
  `DeliStaffID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`DeliveryID`, `DeliveryDate`, `DeliveryTime`, `Status`, `OrderID`, `DeliStaffID`) VALUES
('D-000001', '2020-10-27', '14:00', 'Delivered', 'Or-000001', 'DS-000001'),
('D-000002', '2020-10-22', '14:00', 'Delivered', 'Or-000002', 'DS-000001'),
('D-000003', '2020-11-16', '14:00', 'Delivered', 'Or-000003', 'DS-000001'),
('D-000004', '2020-11-25', '10:00', 'Delivered', 'Or-000007', 'DS-000001');

-- --------------------------------------------------------

--
-- Table structure for table `deliverystaff`
--

CREATE TABLE `deliverystaff` (
  `DeliStaffID` varchar(50) NOT NULL,
  `DeliStaffName` varchar(50) DEFAULT NULL,
  `DeliStaffEmail` varchar(50) DEFAULT NULL,
  `DeliStaffPhNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverystaff`
--

INSERT INTO `deliverystaff` (`DeliStaffID`, `DeliStaffName`, `DeliStaffEmail`, `DeliStaffPhNo`) VALUES
('DS-000001', 'Mike', 'mike12@gmail.com', '0987778544'),
('DS-000002', 'Duke', 'duke@gmail.com', '095865698496');

-- --------------------------------------------------------

--
-- Table structure for table `favlist`
--

CREATE TABLE `favlist` (
  `FavlistID` varchar(50) NOT NULL,
  `CustomerID` varchar(50) DEFAULT NULL,
  `FoodID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favlist`
--

INSERT INTO `favlist` (`FavlistID`, `CustomerID`, `FoodID`) VALUES
('FL-000001', 'C-000001', 'F-000002'),
('FL-000002', 'C-000001', 'F-000003'),
('FL-000003', 'C-000003', 'F-000005'),
('FL-000004', 'C-000003', 'F-000004'),
('FL-000005', 'C-000003', 'F-000001');

-- --------------------------------------------------------

--
-- Table structure for table `fooddetail`
--

CREATE TABLE `fooddetail` (
  `OrderID` varchar(50) NOT NULL,
  `FoodID` varchar(50) NOT NULL,
  `Quantity` varchar(50) DEFAULT NULL,
  `Amount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooddetail`
--

INSERT INTO `fooddetail` (`OrderID`, `FoodID`, `Quantity`, `Amount`) VALUES
('Or-000001', 'F-000002', '1', '5000'),
('Or-000002', 'F-000003', '2', '9000'),
('Or-000003', 'F-000002', '2', '10000'),
('Or-000004', 'F-000002', '1', '5000'),
('Or-000005', 'F-000002', '1', '5000'),
('Or-000006', 'F-000002', '1', '5000'),
('Or-000007', 'F-000003', '1', '4500');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `FoodID` varchar(50) NOT NULL,
  `FoodName` varchar(50) DEFAULT NULL,
  `FoodDesc` varchar(50) DEFAULT NULL,
  `FoodPrice` varchar(50) DEFAULT NULL,
  `FoodPhoto` varchar(225) DEFAULT NULL,
  `CategoryID` varchar(50) DEFAULT NULL,
  `ratingno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`FoodID`, `FoodName`, `FoodDesc`, `FoodPrice`, `FoodPhoto`, `CategoryID`, `ratingno`) VALUES
('F-000001', 'Hawaiian Pizza', 'Pineapple, Beacon, Mozzarella Cheese', '5000', '../Customer/FoodImage/_hawaiian-pizza_1203-2455.webp', 'CT-000001', 2),
('F-000002', 'Pepperoni Pizza', 'Beacon, Chilies, Pepperoni, Cheese', '5000', '../Customer/FoodImage/_pepo.jpg', 'CT-000001', 3),
('F-000003', 'Sausage Spaghetti', 'Hot & Spicy Sausage, Tomato Based', '4500', '../Customer/FoodImage/_spage.jpg', 'CT-000001', 3),
('F-000004', 'Traditional Lasagna', 'Mozzarella & Ricotta cheese, Meat sauce', '4500', '../Customer/FoodImage/_lasagna.jpg', 'CT-000001', 3),
('F-000005', 'Sushi', 'Tuna with Japenese traditional sauce ', '4500', '../Customer/FoodImage/_SuShi.jpg', 'CT-000002', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` varchar(50) NOT NULL,
  `PaymentType` varchar(50) DEFAULT NULL,
  `AccNo` varchar(50) DEFAULT NULL,
  `OrderID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PaymentType`, `AccNo`, `OrderID`) VALUES
('Pay-000001', 'COD', '', 'Or-000001'),
('Pay-000002', 'COD', '', 'Or-000002'),
('Pay-000003', 'COD', '', 'Or-000003'),
('Pay-000004', 'COD', '', 'Or-000004'),
('Pay-000005', 'COD', '', 'Or-000005'),
('Pay-000006', 'Visa', '6576587678678678', 'Or-000006'),
('Pay-000007', 'COD', '', 'Or-000007');

-- --------------------------------------------------------

--
-- Stand-in structure for view `qry_order`
-- (See below for the actual view)
--
CREATE TABLE `qry_order` (
`OrderID` varchar(50)
,`TotalPrice` varchar(50)
,`OrderDate` varchar(50)
,`OrderTime` varchar(50)
,`CustomerID` varchar(50)
,`CusName` varchar(30)
,`CusAddress` varchar(30)
,`CusPhNo` varchar(30)
,`OrderStatus` varchar(30)
,`FoodName` varchar(50)
,`CategoryName` varchar(50)
,`FoodPrice` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` varchar(50) NOT NULL,
  `Rate` varchar(50) DEFAULT NULL,
  `CustomerID` varchar(50) DEFAULT NULL,
  `FoodID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `Rate`, `CustomerID`, `FoodID`) VALUES
('R-000001', '3', 'C-000001', 'F-000003'),
('R-000002', '1', 'C-000001', 'F-000004'),
('R-000003', '2', 'C-000001', 'F-000001'),
('R-000004', '4', 'C-000001', 'F-000002');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `OrderID` varchar(50) NOT NULL,
  `TotalPrice` varchar(50) DEFAULT NULL,
  `OrderDate` varchar(50) DEFAULT NULL,
  `OrderTime` varchar(50) DEFAULT NULL,
  `CustomerID` varchar(50) DEFAULT NULL,
  `CusName` varchar(30) NOT NULL,
  `CusAddress` varchar(30) NOT NULL,
  `CusPhNo` varchar(30) NOT NULL,
  `OrderStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`OrderID`, `TotalPrice`, `OrderDate`, `OrderTime`, `CustomerID`, `CusName`, `CusAddress`, `CusPhNo`, `OrderStatus`) VALUES
('Or-000001', '5000', '2020-10-27', '14:00', 'C-000001', 'ayeee', 'Kamayut', '11', 'Delivered'),
('Or-000002', '9000', '2020-10-22', '14:00', 'C-000001', 'Mama', 'Kamayut', '095052783', 'Delivered'),
('Or-000003', '10000', '2020-11-16', '14:00', 'C-000003', 'SuSu', 'Kamayut ', '0944789076', 'Delivered'),
('Or-000004', '5000', '2020-11-19', '14:00', 'C-000003', 'SuSu', 'Kamayut', '0944789076', 'Ordered'),
('Or-000005', '5000', '2020-11-18', '15:00', 'C-000003', 'SuSu', 'Kamayut', '0944789076', 'Ordered'),
('Or-000006', '5000', '2020-11-11', '14:00', 'C-000003', 'SuSu', 'hlysymt', '0944789076', 'Ordered'),
('Or-000007', '4500', '2020-11-25', '10:00', 'C-000004', 'sagawah', 'Kamayut ', '095052783', 'Delivered');

-- --------------------------------------------------------

--
-- Structure for view `qry_order`
--
DROP TABLE IF EXISTS `qry_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qry_order`  AS  select `o`.`OrderID` AS `OrderID`,`o`.`TotalPrice` AS `TotalPrice`,`o`.`OrderDate` AS `OrderDate`,`o`.`OrderTime` AS `OrderTime`,`o`.`CustomerID` AS `CustomerID`,`o`.`CusName` AS `CusName`,`o`.`CusAddress` AS `CusAddress`,`o`.`CusPhNo` AS `CusPhNo`,`o`.`OrderStatus` AS `OrderStatus`,`fm`.`FoodName` AS `FoodName`,`c`.`CategoryName` AS `CategoryName`,`fm`.`FoodPrice` AS `FoodPrice` from ((((`tblorder` `o` join `foodmenu` `fm`) join `fooddetail` `fd`) join `category` `c`) join `customer` `cu`) where `cu`.`CustomerID` = `o`.`CustomerID` and `o`.`OrderID` = `fd`.`OrderID` and `fd`.`FoodID` = `fm`.`FoodID` and `c`.`CategoryID` = `fm`.`CategoryID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`DeliveryID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `DeliStaffID` (`DeliStaffID`);

--
-- Indexes for table `deliverystaff`
--
ALTER TABLE `deliverystaff`
  ADD PRIMARY KEY (`DeliStaffID`);

--
-- Indexes for table `favlist`
--
ALTER TABLE `favlist`
  ADD PRIMARY KEY (`FavlistID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `FoodID` (`FoodID`);

--
-- Indexes for table `fooddetail`
--
ALTER TABLE `fooddetail`
  ADD PRIMARY KEY (`OrderID`,`FoodID`),
  ADD KEY `FoodID` (`FoodID`);

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`FoodID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `FoodID` (`FoodID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favlist`
--
ALTER TABLE `favlist`
  ADD CONSTRAINT `favlist_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `favlist_ibfk_2` FOREIGN KEY (`FoodID`) REFERENCES `foodmenu` (`FoodID`);

--
-- Constraints for table `fooddetail`
--
ALTER TABLE `fooddetail`
  ADD CONSTRAINT `fooddetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `tblorder` (`OrderID`),
  ADD CONSTRAINT `fooddetail_ibfk_2` FOREIGN KEY (`FoodID`) REFERENCES `foodmenu` (`FoodID`);

--
-- Constraints for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD CONSTRAINT `foodmenu_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryId`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `tblorder` (`OrderID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`FoodID`) REFERENCES `foodmenu` (`FoodID`);

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
