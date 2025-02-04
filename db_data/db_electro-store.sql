USE db_electro-store;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 12:58 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_electro-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `username`, `email`, `phone_number`, `password`) VALUES
(36, 'Dennis', 'Mwanzia', 'd.munyaka30@gmail.com', '0711637084', '$2y$10$gDEcc4YRPySS9AGeVgZX8OSQmMW2ElDHpTGOtz1iIq5xXJPlOZ2hO'),
(37, 'Michael Mutisya', 'mutisya', 'navusmike@gmail.com', '0702364845', '$2y$10$aQPws0I5SR3UmcxzBSIUHeAlLxzutVFk4v/vyzl9XnBljo88x5q96');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL,
  `featured` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `image_name`, `active`, `featured`) VALUES
(47, 'Kitchen Appliances', 'Kitchen Appliances43.png', 'Yes', 'Yes'),
(48, 'Office Appliances', 'Office Appliances868.jpg', 'Yes', 'Yes'),
(49, 'Others Appliances', 'Others Appliances144.PNG', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `name`, `email`, `phone_number`, `password`) VALUES
(10, 'victor kipruto', 'rotichvicky14@gmail.com', '0721472218', '$2y$10$k9647KK1DBpASDraRLs4n.FN5YOz6UTjrdOvSWNUbM9dZ5bYL8Pei'),
(11, 'Michael Mutisya', 'navusmike@gmail.com', '0702364845', '$2y$10$lg.4gqxeHASvUYe8fLyem.tj5..pPP9U/i6NLLxjAHlnzoW4nyfoK'),
(12, 'Eunice Wanza', 'wanzaeunice3@gmail.com', '0723770567', '$2y$10$MLpmpnDW4lMzBselpbmJHulc72/hrquOUuS/Tv2.GQUyrfPhsCeYy'),
(13, 'Dan Kariuki', 'dankaris79@gmail.com', '0726233838', '$2y$10$3ijUfYYKIBashsvTDyqWieEJVisv3WIPkczNCRmbqchZBAfKsJiwS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `products_name` text NOT NULL,
  `no._of_products` int(10) NOT NULL,
  `customer_phone_number` varchar(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `pickup_station` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `products_name`, `no._of_products`, `customer_phone_number`, `customer_email`, `order_date`, `delivery_date`, `pickup_station`, `customer_id`, `status`, `total_amount`) VALUES
(1, 'Hp desktop, dell laptop, oven, airpods', 4, '0702364845', 'navusmike@gmail.com', '2022-06-24', '2022-06-30', 'Greenspan mall', 1, 'Delivered', '225368.00'),
(2, 'hp desktop, dell laptop', 2, '0745426288', 'customer@gmail.com', '2022-06-24', '2022-06-30', 'Greenspan mall', 2, 'Cancelled', '129362.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` longtext NOT NULL,
  `active` varchar(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `category_name`, `brand_name`, `short_description`, `long_description`, `active`, `featured`, `image_name`, `original_price`, `price`) VALUES
(20, 'Oven', 'Kitchen Appliances', 'Ramtoms', 'A quality kitchen appliance', '  A quality kitchen appliance A quality kitchen appliance A quality kitchen appliance A quality kitchen appliance A quality kitchen appliance A quality kitchen appliance A quality kitchen appliance', 'Yes', 'Yes', 'Oven601.jpg', '34567.00', '21345.00'),
(21, 'Hp Laptop', 'Office Appliances', 'Helwett Packard', 'A quality office appliance', 'A quality office appliance A quality office appliance A quality office appliance A quality office appliance A quality office appliance A quality office appliance A quality office appliance A quality office appliance', 'Yes', 'Yes', 'Hp Laptop866.png', '56785.00', '43215.00'),
(22, 'gas cylinder', 'Kitchen Appliances', 'kgas', 'the best gas in africa', ' the best gas in africa the best gas in africa', 'Yes', 'Yes', 'gas cylinder89.jpg', '5500.00', '4500.00'),
(23, 'Iphone X', 'Others Appliances', 'Apple', 'Works everyday', '  asdfdf a fasdfasdfa asd fsd fasdfasdf  asdfasd asd f asdfasdfasd asdfasdfasdf asdf adsf asd fasdf asd fasdjfasd fasdf asdf asdf asd fasdf asdf asdf asdlfjasdlfksjja lsfj asd fsda', 'No', 'No', 'Iphone X648.png', '4567.00', '2435.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

CREATE TABLE `tbl_stores` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`store_id`, `store_name`, `store_location`) VALUES
(9, 'Green span mall', 'Donholm'),
(10, 'olkalet mall ', 'Narok'),
(11, 'Shujaah mall', 'Umoja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `subscription_id` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`subscription_id`, `customer_email`, `customer_name`) VALUES
(1, 'navusmike@gmail.com', 'Michael Mutisya'),
(2, 'amosmakawa112@gmail.com', 'Amos Makawa'),
(3, 'solomonwanjala46@gmail.com', 'Solomon Wanjala'),
(4, 'rotichvicky14@gmail.com', 'Vic'),
(5, '', 'navusmike@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
