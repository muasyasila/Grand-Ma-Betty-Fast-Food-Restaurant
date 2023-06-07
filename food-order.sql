-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 01:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'Curtis Muasya', 'muasyasila', 'd2fc95808d41f96e6fb89969668b30ce');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Chicken Sausage Pizza', 'Made with Italian Sause, Chicken and Organic Vegetables.  ', 900, 'Food-Name-5344.jpg', 0, 'Yes', 'Yes'),
(2, 'RoseMary Chicken', 'Made with Italian Sause, Chicken and Organic Vegetables ', 1200, 'Food-Name-3101.jpg', 0, 'Yes', 'Yes'),
(3, 'French Fries ', 'Made with Italian Sause, Chicken and Organic Vegetables. ', 500, 'Food-Name-1902.jpg', 0, 'Yes', 'Yes'),
(4, 'Big Max Combo (Burger + Fries) Special Offer ', 'Made with Italian Sause, Chicken and Organic Vegetables. ', 800, 'Food-Name-6346.jpg', 0, 'Yes', 'Yes'),
(5, 'Seattle Style Hotdog', 'Made with Italian Sause, Chicken and Organic Vegetables. ', 200, 'Food-Name-8237.jpg', 0, 'Yes', 'Yes'),
(6, 'Bananna French Toast with Blue berries ', 'Made with Italian Sause, Chicken and Organic Vegetables. ', 300, 'Food-Name-8751.jpg', 0, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'RoseMary Chicken', 1200, 2, 2400, '2021-11-12 09:00:00', 'On Delivery', 'Gil Nolan', '+1 (452) 989-7522', 'gilnolan@gmail.com', 'Westlands 7th District'),
(2, 'French Fries ', 500, 4, 2000, '2021-11-12 09:00:45', 'Delivered', 'Jasper Wooten', '+1 (399) 289-1469', 'jasperwooten@gmail.com', 'Ngong Road'),
(3, 'Big Max Combo (Burger + Fries) Special Offer ', 800, 2, 1600, '2021-11-12 09:03:56', 'Cancelled', 'Alma Hamilton', '+1 (487) 142-5085', 'almahamilton@gmail.com', 'BuruBuru Shopping Center'),
(4, 'Bananna French Toast with Blue berries ', 300, 5, 1500, '2021-11-12 09:05:18', 'Delivered', 'Rowan Malone', '+1 (513) 964-1795', 'rowanmalone@gmail.com', 'Ngong Road'),
(5, 'Chicken Sausage Pizza', 900, 3, 2700, '2021-11-15 01:05:05', 'Delivered', 'Meghan Kane', '+1 (124) 296-4418', 'fajecabode@mailinator.com', 'Rem debitis sint au');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
