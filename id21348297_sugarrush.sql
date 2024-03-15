-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 09:54 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21348297_sugarrush`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'ali', '$2y$10$xsXTXnNPGQggMSiawnFqo.fDb6FDoLwtpyCHz9SnJJC/xMGqiKoV.'),
(2, 'ali', '$2y$10$BSbGbsQkRCws/BuxtFRGFe5lhrCW4tdX6qgKoY15pnBeiW0BJeqpq'),
(3, 'hassan', '$2y$10$1AS6f/ajGEcAW6wa.bUseudxTzvhe4.ylsiOU.NCdPVLx4NrItFmq'),
(4, 'hassan', '$2y$10$ztq2c61IF/jR6Ozqdj/w2OG4loNmussbtzfZjbk3901lkhIT7Ig8m');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `CatDescriiption` varchar(500) NOT NULL DEFAULT 'This is a menu Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `CatDescriiption`) VALUES
(40, 'OUR SPECIALITIES', ''),
(41, 'BEL PAN', ''),
(42, ' ADD - ON', ''),
(43, 'MELTY TOPPINGS', ''),
(44, 'MILKSHAKES', ''),
(45, 'SMOOTHIES', ''),
(54, 'FRAPPE', ''),
(55, 'HOT DRINKS', ''),
(56, 'DRINKS', ''),
(57, 'HOOKAH', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `itemDescription` varchar(250) NOT NULL DEFAULT '',
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `itemDescription`, `price`) VALUES
(18, 40, 'Ice Rolls (VANILLA) S (3 rolls)', '', '2.00'),
(19, 40, 'Ice Rolls (VANILLA) L (6 rolls)', '', '3.00'),
(21, 40, 'Mini Pancakes S (5pcs)', '', '2.00'),
(22, 40, 'Mini Pancakes L (10pcs)', '', '3.50'),
(23, 40, 'Bubble Waffle', '', '3.50'),
(24, 40, 'Brownie', '', '6.00'),
(25, 40, 'Brownie Cup', '', '4.50'),
(26, 40, 'Fondant', '', '6.00'),
(27, 41, 'Special Bubble Waffle', '', '9.50'),
(28, 41, 'Burger Pancake', '', '9.50'),
(29, 42, 'Bubbly', '', '1.50'),
(30, 42, 'Lotus', '', '1.50'),
(31, 42, 'Cookies', '', '1.50'),
(32, 42, 'Brownie', '', '1.50'),
(33, 42, 'Oreo', '', '1.50'),
(34, 42, 'Kinder', '', '1.50'),
(35, 42, 'Twix', '', '1.50'),
(36, 42, 'Whipped Cream', '', '1.50'),
(37, 42, 'Milka', '', '1.50'),
(38, 42, 'Marshmallow', '', '1.50'),
(39, 42, 'Kit Kat', '', '1.50'),
(40, 42, 'Snickers', '', '1.50'),
(41, 42, 'White Crunch', '', '1.50'),
(42, 42, 'Loacker', '', '1.50'),
(43, 42, 'Fruits', '', '1.50'),
(44, 42, 'M&M\'s', '', '1.50'),
(45, 42, 'Maltesers', '', '1.50'),
(46, 42, 'Kinder Bueno', '', '1.50'),
(47, 43, 'Nutella', '', '1.50'),
(48, 43, 'Lotus Spread', '', '1.50'),
(49, 43, 'Milka Spread', '', '1.50'),
(50, 43, 'White Chocolate', '', '1.50'),
(51, 43, 'Chocolate Syrup', '', '0.50'),
(52, 43, 'Starwberry Syrup', '', '0.50'),
(53, 43, 'Caramel Syrup', '', '0.50'),
(54, 57, 'Arguile', '', '5.00'),
(55, 57, 'تبديل راس', '', '3.00'),
(56, 57, 'Extra Nabrich', '', '1.00'),
(57, 44, 'Oreo', '', '3.50'),
(58, 44, 'Strawberry ', '', '3.50'),
(59, 44, 'Vanilla', '', '3.50'),
(60, 44, 'Lotus', '', '4.00'),
(61, 44, 'Maltesers', '', '4.50'),
(62, 44, 'Snickers', '', '4.50'),
(63, 44, 'Nutella & Blueberry', '', '5.00'),
(64, 45, 'Strawberry ', '', '3.00'),
(65, 45, 'Peach', '', '3.50'),
(66, 45, 'Mango', '', '3.50'),
(67, 45, 'Passion', '', '4.00'),
(68, 45, 'Apple', '', '3.50'),
(69, 45, 'Minted Lemonade', '', '3.00'),
(70, 45, 'Mango Passion', '', '4.00'),
(71, 45, 'Strawberry Passion ', '', '4.00'),
(72, 45, 'Strawberry Banana', '', '3.50'),
(73, 45, 'Strawberry Mango Passion ', '', '4.50'),
(74, 45, 'Mixed Berries', '', '4.50'),
(75, 54, 'Caramel Frappe', '', '4.00'),
(76, 54, 'Mocha Frappe', '', '4.50'),
(77, 56, 'Iced Tea', '', '2.50'),
(78, 56, 'Iced Coffe', '', '3.50'),
(79, 56, 'Blue Drink', '', '3.50'),
(80, 56, 'Orange Juice', '', '2.50'),
(81, 55, 'Latte', '', '2.50'),
(82, 55, 'Cappuccino', '', '2.50'),
(83, 55, 'Mochaccino', '', '3.00'),
(84, 55, 'Hot Chocolate', '', '3.00'),
(85, 55, 'Espresso', '', '1.00'),
(86, 55, 'Turkish Coffee', '', '1.00'),
(87, 55, 'Tea', '', '1.50'),
(88, 55, 'Nescafe', '', '2.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
