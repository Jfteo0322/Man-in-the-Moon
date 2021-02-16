-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2020 at 03:08 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdt_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(8) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `username`, `email`, `password`, `account_type`) VALUES
(1, 'teyjiarong', 'jiarong@mail.com', '1234', 'Admin'),
(2, 'boey', 'boey@mail.com', '321', 'Admin'),
(15, 'jessulord', 'jun@mail.com', '1', 'Customer'),
(16, '123', '123@mail.com', 'aaa', 'Customer'),
(27, 'abc', 'abc@mail.com', '123', 'Customer'),
(20, 'test1', 'test@mail.com', '1233', 'Staff'),
(26, '123123', '123@mail.com', '12', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `customer_name`, `contact_number`, `address`, `dob`) VALUES
(1, '15', 'asd', 1932123, 'asd', '2020-07-29'),
(2, '16', '1', 123, '2', '2020-08-01'),
(4, '27', 'Lim', 100, 'bukit jalil', '2020-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(6) NOT NULL,
  `paid` varchar(3) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `paid`) VALUES
(1, '2', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(6) NOT NULL,
  `product_id` varchar(6) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_id`, `quantity`, `sub_total`, `product_image`) VALUES
(7, '1', '15 ', 2, '20.00', 'purposecream.png ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `categories` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `categories`, `description`, `image`) VALUES
(7, 'Full Cream Milk', '10.00', 'Milk', 'Goodday UHT Full Cream Milk is made from happy & healthy cows â€“which is our best kept secret. One sip of this will have you smacking your lips from its smooth and creamy taste.\r\n\r\n', 'fullcreammilk.png'),
(8, 'Low Fat Milk', '8.50', 'Milk', 'Goodday UHT Low Fat Milk is made from happy & healthy cows â€“which is our best kept secret. One sip of this will have you smacking your lips from its smooth and creamy taste.', 'lowfatmilk.png'),
(9, 'Strawberry Milk', '9.60', 'Milk', 'Goodday UHT Strawberry Milk is made from happy & healthy cows â€“which is our best kept secret. One sip of this will have you smacking your lips from its smooth and creamy taste.\r\n\r\n', 'strawberry.png'),
(10, 'Chocolate Milk', '9.00', 'Milk', 'Goodday UHT Chocolate Milk is made from happy & healthy cows â€“which is our best kept secret. One sip of this will have you smacking your lips from its smooth and creamy taste.', 'chocolatemilk.png'),
(11, 'Salted Pure Butter', '12.90', 'Butter', 'Anchor Salted Pure New Zealand Butter is perfect for both sweet and savoury recipes. Made from 100% pure New Zealand milk, and with a rich and creamy taste, this salted butter is the natural choice for every home-chefâ€™s favourite dishes.', 'buttersalted.png'),
(12, 'Unsalted Pure Butter', '12.80', 'Butter', 'Made from 100% pure New Zealand milk, Anchor\'s delicious butter is what every home-chef needs. With a rich, smooth taste, loved by entire family. Anchor Unsalted Pure New Zealand Butter is perfect for bringing out the natural flavours in cooking and baking.', 'unsaltedbutter.png'),
(13, 'Challenge Butter', '15.00', 'Butter', 'Challenge Butter has been a quality staple in kitchens since 1911. Itâ€™s churned daily from two natural ingredients: the freshest 100% real pasteurized sweet cream and salt. Thatâ€™s it. Nothing artificial or synthetic. The taste is pure, and the flavor is consistent. Itâ€™s no wonder it is our best selling butter.', 'challengebutter.png'),
(14, 'Challenge Unsalted Butter', '11.00', 'Butter', 'Challenge Unsalted Butter, also known as \"sweet butter,â€ is 100% real cream butter but with no salt added. In cooking, many recipes call for unsalted butter to give the cook greater control over the flavor and savoriness of their dishes. Itâ€™s also a delicious way for people to reduce their intake of sodium.', 'challengeunsalted.png'),
(15, 'All Purpose Cream', '10.00', 'Cream', 'NESTLÃ‰Â® All Purpose Cream can be a good base for your savory dishes, and is very versatile - enough to be paired with vegetables and different kinds of meat. It helps balance the different flavors of your ingredients together to make for a truly delightful dish. It is great for desserts,  for cream-based savory dishes, for pasta sauces, dips and dressings, for marinades and soups and stews.', 'purposecream.png'),
(16, 'Thick Cream', '20.00', 'Cream', 'NESTLÃ‰Â® Thick CreamÂ® is the extra rich premium cream that makes your every dessert delightfully great.', 'thickcream.png'),
(17, 'Cheddar Cheese', '13.50', 'Cheese', 'With Anchor Cheddar Cheese Slices, itâ€™s never been simpler to prepare tasty treats for the whole family. These convenient slices come individually-wrapped, so they can be easily added to your recipes or enjoyed on-the-go.', 'cheddarcheese.png'),
(18, ' Mozzarella Shredded Cheese', '30.00', 'Cheese', 'Anchor Mozzarella Shredded Cheese is a simple way to make irresistible dishes. With its high-quality stretch and beautiful golden colour, this pre-shredded, easy-to-use cheese is a delicious addition to salads, pizzas and many more crowd-pleasing dishes.\r\n', 'mozzarellacheese.png'),
(20, 'asdas', '1.00', 'Butter', ' das ', 'challengebutter.png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `card_number` varchar(19) NOT NULL,
  `fullname_card` varchar(255) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `order_id`, `customer_name`, `email`, `address`, `total_price`, `card_number`, `fullname_card`) VALUES
(1, 1, 'asd', 'jun@mail.com', 'asd', 26, '1111-2222-3333-4444', 'test'),
(2, 1, '1', '123@mail.com', '1', 6, '12312', ' '),
(3, 1, 'Tey Jia Rong', 'jackfeng5011@gmail.com', 'No 58 ,Jalan Batu Ni lam 5 , Ambang Botanic 2 , 41200, Klang, Selangor', 20, '1234-5678-1235-1257', 'Tey Jia Rong');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `user_id`, `staff_name`, `contact_number`, `gender`) VALUES
(1, '20', 'test', 123, 'Male'),
(6, '26', '1', 1, 'Female');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
