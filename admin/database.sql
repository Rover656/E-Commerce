-- phpMyAdmin SQL Dump
-- version 4.8.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2017 at 07:47 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('currency', 'GBP'),
('currency_format', 'english'),
('footerCopy', '&copy; Peter Entwistle and Rover656. Check out the source code on <a href=\"http://github.com/Rover656/E-Commerce\">GitHub</a>'),
('installDirectory', '/E-Commerce'),
('shopTitle', 'E-Shop');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(21) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` int(21) NOT NULL,
  `Price` int(21) NOT NULL,
  `Quantity` int(21) NOT NULL,
  `Enabled` int(21) NOT NULL,
  `Featured` int(21) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Name`, `Type`, `Price`, `Quantity`, `Enabled`, `Featured`, `Image`) VALUES
(1, 'Pen', 0, 2, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/pen.jpg'),
(2, 'T-Shirt', 0, 11, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/T-Shirt.png'),
(3, 'Watch', 0, 30, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/watch.png'),
(4, 'Book', 0, 13, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/book.png'),
(5, 'Keyring', 0, 4, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/keyring.png');

-- --------------------------------------------------------

--
-- Table structure for table `logintokens`
--

CREATE TABLE `logintokens` (
  `id` int(21) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Expiry` bigint(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Enabled` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `Email`, `Enabled`) VALUES
(1, 'test', '2fea0a41ab40861c0a41', 'test@example.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`setting`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintokens`
--
ALTER TABLE `logintokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `logintokens`
--
ALTER TABLE `logintokens`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
