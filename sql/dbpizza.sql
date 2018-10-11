-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2018 at 01:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpizza`
--
CREATE DATABASE IF NOT EXISTS `dbpizza` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbpizza`;

-- --------------------------------------------------------

--
-- Table structure for table `tblcheckout`
--

CREATE TABLE IF NOT EXISTS `tblcheckout` (
  `orderID` int(200) NOT NULL AUTO_INCREMENT,
  `transactionID` int(200) NOT NULL,
  `name` longtext NOT NULL,
  `mobilenumber` int(200) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcheckout`
--

INSERT INTO `tblcheckout` (`orderID`, `transactionID`, `name`, `mobilenumber`) VALUES
(4, 5229188, 'Errold', 3122312),
(5, 7373047, 'adwasdasd', 21232123);

-- --------------------------------------------------------

--
-- Table structure for table `tblitems`
--

CREATE TABLE IF NOT EXISTS `tblitems` (
  `item_itemno` int(200) NOT NULL AUTO_INCREMENT,
  `item_name` longtext NOT NULL,
  `item_type` longtext NOT NULL,
  `item_small` int(200) NOT NULL,
  `item_medium` int(200) NOT NULL,
  `item_large` int(200) NOT NULL,
  PRIMARY KEY (`item_itemno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tblitems`
--

INSERT INTO `tblitems` (`item_itemno`, `item_name`, `item_type`, `item_small`, `item_medium`, `item_large`) VALUES
(1, 'Cheese', 'Classic Pizza', 175, 285, 440),
(2, 'New York Classic', 'Classic Pizza', 210, 340, 530),
(3, 'Pepperoni & Mushroom', 'Classic Pizza', 220, 250, 540),
(4, 'Manhattan', 'Classic Pizza', 250, 295, 565),
(5, 'Garden Special', 'Classic Pizza', 210, 340, 530),
(6, 'Hawaiian ', 'Classic Pizza', 210, 340, 530),
(7, 'New York Finest', 'Classic Pizza', 260, 420, 575),
(8, 'Tribeca Mushroom', 'Specialty Pizza', 245, 390, 560),
(9, 'Anchovy Lovers', 'Specialty Pizza', 275, 450, 595),
(10, '#4 Cheese', 'Specialty Pizza', 250, 400, 560),
(11, 'Corona Chicken', 'Specialty Pizza', 250, 420, 575),
(12, 'Gourmet Garden', 'Specialty Pizza', 250, 410, 585),
(13, 'Roasted Garlic', 'Specialty Pizza', 240, 405, 505),
(14, 'Four Seasons', 'Specialty Pizza', 275, 430, 590),
(15, 'Cheese', 'Toppings', 35, 45, 60),
(16, 'Bacon', 'Toppings', 35, 45, 60),
(17, 'Ground Beef', 'Toppings', 35, 45, 60),
(18, 'Ham', 'Toppings', 35, 45, 60),
(19, 'Italian Sausage', 'Toppings', 35, 45, 60),
(20, 'Pepperoni', 'Toppings', 35, 45, 60),
(21, 'Salami', 'Toppings', 35, 45, 60),
(22, 'Capers', 'Toppings', 35, 45, 60),
(23, 'Roasted Garlic', 'Toppings', 35, 45, 60),
(24, 'Bell Pepper', 'Toppings', 35, 45, 60),
(25, 'Mushrooms', 'Toppings', 35, 45, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE IF NOT EXISTS `tblorder` (
  `orderID` int(200) NOT NULL AUTO_INCREMENT,
  `transactionID` int(200) NOT NULL,
  `itemname` longtext NOT NULL,
  `itemsize` longtext NOT NULL,
  `toppings` longtext NOT NULL,
  `quantity` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderID`, `transactionID`, `itemname`, `itemsize`, `toppings`, `quantity`, `price`) VALUES
(2, 660401, 'Pepperoni & Mushroom', 'Medium', 'Ham', 2, 590),
(3, 660401, 'Anchovy Lovers', 'Small', 'Salami', 1, 310),
(4, 660401, 'Corona Chicken', 'Small', 'Bell Pepper', 1, 285),
(5, 593964, 'New York Classic', 'Medium', '', 2, 680),
(6, 593964, 'Four Seasons', 'Small', '', 1, 275),
(7, 593964, 'New York Finest', 'Large', 'Bell Pepper,Mushrooms', 1, 695),
(8, 593964, 'Tribeca Mushroom', 'Small', 'Ground Beef', 1, 280),
(9, 266449, 'New York Classic', 'Medium', 'Cheese,Bacon', 1, 430),
(10, 266449, 'New York Classic', 'Medium', 'Cheese,Bacon', 1, 0),
(11, 266449, 'New York Classic', 'Medium', 'Cheese,Bacon', 1, 430),
(12, 13978, 'Pepperoni & Mushroom', 'Large', 'Cheese', 1, 600),
(13, 6372376, 'New York Finest', 'Medium', 'Cheese,Pepperoni,Bell Pepper', 2, 1110),
(14, 6372376, 'Hawaiian ', 'Large', 'Cheese,Mushrooms', 1, 650),
(15, 6372376, 'Pepperoni & Mushroom', 'Small', 'Cheese,Mushrooms', 1, 290),
(16, 6202393, 'Manhattan', 'Small', 'Ground Beef', 3, 855),
(17, 6202393, 'Corona Chicken', 'Large', 'Ham', 1, 635),
(18, 5229188, 'Hawaiian ', 'Medium', 'Salami,Capers', 2, 860),
(19, 5229188, 'New York Classic', 'Small', 'Cheese,Bacon', 1, 280),
(20, 5229188, 'Hawaiian ', 'Large', 'Cheese,Pepperoni', 1, 650),
(21, 567627, 'New York Classic', 'Small', '', 1, 210),
(22, 9419556, 'New York Finest', 'Small', 'Cheese,Bacon', 1, 330),
(23, 186463, 'New York Classic', 'Small', 'Cheese', 1, 245),
(24, 7373047, 'Hawaiian ', 'Small', 'Cheese', 1, 245);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `user_id` int(200) NOT NULL AUTO_INCREMENT,
  `user_username` longtext NOT NULL,
  `user_password` longtext NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `user_username`, `user_password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
