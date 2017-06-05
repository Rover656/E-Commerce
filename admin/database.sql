-- phpMyAdmin SQL Dump
-- version 4.8.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2017 at 12:56 PM
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
('shopTitle', 'E-Shop'),
('userModuleLocation', 'core/classes/User.php');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(21) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` float NOT NULL,
  `Price` float NOT NULL,
  `Quantity` float NOT NULL,
  `Enabled` int(21) NOT NULL,
  `Featured` int(21) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Name`, `Type`, `Price`, `Quantity`, `Enabled`, `Featured`, `Image`, `Description`) VALUES
(1, 'Pen', 0, 2, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/pen.jpg', 'A ballpoint pen'),
(2, 'T-Shirt', 0, 10.99, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/T-Shirt.png', 'A nice white cotton t-shirt.'),
(3, 'Watch', 0, 30, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/watch.png', 'A cool watch with adjustable strap.'),
(4, 'Book', 0, 12.5, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/book.png', 'An open source biology text book.'),
(5, 'Keyring', 0, 3.99, 1, 1, 1, 'http://peterentwistle.co.uk/e-shop/img-tmp/keyring.png', 'To help you keep all your keys together.'),
(6, 'Test Item', 0, 5.99, 15, 1, 0, 'http://cliparts.co/cliparts/kTM/R6B/kTMR6Bnpc.png', 'Test Item.');

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

--
-- Dumping data for table `logintokens`
--

INSERT INTO `logintokens` (`id`, `Username`, `Token`, `Expiry`) VALUES
(4, 'test', 'f6be719129871ba9f9322f165b211b30', 29362006052017),
(9, 'test', '47240663f7e0c0fd0a10cd6a0c8a993b', 33231205062017);

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
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logintokens`
--
ALTER TABLE `logintokens`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
