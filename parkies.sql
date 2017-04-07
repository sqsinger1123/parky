-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2016 at 01:05 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `[redacted]`
--

-- --------------------------------------------------------

--
-- Table structure for table `parkies`
--

CREATE TABLE IF NOT EXISTS `parkies` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(11) NOT NULL,
  `instructions` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `reserver` int(11) NOT NULL,
  `reservation_start` time NOT NULL,
  `reservation_end` time NOT NULL,
  `confirmed` int(11) NOT NULL,
  `distance` float NOT NULL,
  `date` varchar(100) NOT NULL,
  `carsize` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkies`
--

INSERT INTO `parkies` (`id`, `name`, `owner`, `description`, `price`, `total_price`, `address`, `city`, `state`, `zipcode`, `instructions`, `start`, `end`, `reserver`, `reservation_start`, `reservation_end`, `confirmed`, `distance`, `date`, `carsize`) VALUES
(1, 'Parky Koolness', 0, 'Can fit SUV', 9, 0, '22 Wendell Street', 'Cambridge', 'MA', '02138', 'Please park by the rosebushes and not the trash cans. We use the alleyway for garbage pickup - thanks!', '01:00:00', '15:00:00', 38, '12:00:00', '14:00:00', 1, 0.3, '', 2),
(2, 'Parky Harvard', 0, 'Nice parking spot located close to Harvard Square. Can only fit small sedan', 6, 24, '33 Walker Street', 'Cambridge', 'MA', '02138', 'Please pull as close to the curb as possible. No parking on snowy days - thank you!', '06:00:00', '16:00:00', 53, '11:00:00', '15:00:00', 1, 0.6, '', 1),
(3, 'Parky Pfoho', 0, 'Perfect spot located right behind the gorgeous, historic Harvard Pforzheimer House. Can fit large cars', 3, 6, '40 Linnaean Street', 'Cambridge', 'MA ', '02138', 'Please be sure to park within the white lines. Maximum parking time is 5 hours. Please be respectful of the residents in the area! Thank you.', '02:00:00', '12:00:00', 38, '08:00:00', '10:00:00', 1, 0.7, '', 2),
(6, 'Parky Eric Lu', 0, 'Tight squeeze. Small cars only', 8, 8, '31 Trowbridge Street', 'Cambridge', 'MA', '02138', 'Please park next to the number 9, not the number 8.', '00:00:00', '09:00:00', -1, '00:00:00', '01:00:00', 1, 0.7, '', 0),
(7, 'Parky Tae', 0, 'Small cars only', 2, 0, '48 Avon Street', 'Sommerville', 'MA', '02138', 'Tae is cool', '00:00:00', '00:00:00', -1, '00:00:00', '00:00:00', 0, 1.1, 'Thu, April 18', 1),
(12, 'Parky Kool B', 0, 'LALA', 5, 0, 'ha', '', 'MA', '', 'LALA', '03:00:00', '06:00:00', -1, '00:00:00', '00:00:00', 0, 0, 'Sat, April 20', 0),
(15, 'Parky Pierce Hall', 42, 'Parky right outside of the Applied Math Department', 4, 4, '50 Oxford Street', 'Cambridge', 'MA', '02138', 'Please do not park for more than 2 hours!', '04:00:00', '09:00:00', -1, '05:00:00', '06:00:00', 0, 0, 'Thu, April 25', 1),
(16, 'Cabot House!!!', 43, 'This is Cabot House!', 10, 10, '100 Walker Street', 'Cambridge', 'MA', '02138', 'Park by the playground', '03:00:00', '04:00:00', -1, '03:00:00', '04:00:00', 1, 0, 'Thu, April 25', 0),
(19, 'Walden Street', 47, 'Large driveway 13 min walk from Harvard Square', 7, 0, '348 Walden Street', 'Cambridge', '1', '02138', 'Please park until 5pm only', '09:00:00', '05:00:00', -1, '00:00:00', '00:00:00', 0, 0, 'Wed, May 1', 0),
(20, 'My Test Drive', 53, 'This is a wonderful place to park!', 4, 0, '123 Massachusetts Avenue', 'Cambridge', 'MA', '02138', 'Do not park here. It''s fake!', '10:00:00', '22:00:00', -1, '00:00:00', '00:00:00', 0, 0, 'Mon, January 27', 0),
(21, 'Test User''s Driveway', 38, 'Beautiful driveway along the river.', 1, 0, '1 Memorial Drive', 'Cambridge', 'MA', '02139', 'Please be aware: this is only a demo.', '12:00:00', '22:00:00', -1, '00:00:00', '00:00:00', 0, 0, 'Mon, March 10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `parkies` varchar(50) NOT NULL,
  `creditcards` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cardtype` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `parkies`, `creditcards`, `email`, `cardtype`) VALUES
(38, 'Test User', 'Test', 'test', 'fca3619474f4227248312ac39f48fd1b9412d87e', '', '4716758877592824', 'test@test.com', 'Visa'),
(39, 'lalala', 'lalala', 'lala', 'b51925e8016da0eef5bd0f78893bcf20d77f74b0', '', '', 'lalala@lalala.com', ''),
(41, 'sdfjknf', 'asdflkj', 'a', 'fdabd99ba3888e49a422b4c35b72277ea8be6302', '', '', 'dfg@gmail.com', ''),
(42, 'test', 'test', 'b', '832063e54b83dc5d813873f657153db775ee9e6c', '', '', 'test@test.com', ''),
(44, 'asdfjkl', 'asdfjkl', 'asdfjkl', '536fdfcba442b6d7c7fa1469b8d2aece09bae65d', '', '4716758877592824', 'asdflkjasdf@yahoo.com', 'Visa'),
(45, 'haha', 'haha', 'haha', '229eaeec2cd1d3d922f5effd691ab46ce2249654', '', '4716758877592824', '', 'Mastercard'),
(46, 'asdflkj', 'jklfdsa', 'asdflkjasdf', 'df7ceaf948aef2c742b08f5bc0dbdf393476627d', '', '4716758877592824', 'asdfjkl@yahoo.com', ''),
(49, 'eric', 'eric', 'ericlu', '2865c5c315ef1bc4e8a36d9435f23468cd977a6f', '', '4716758877592824', 'eric@eric.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parkies`
--
ALTER TABLE `parkies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parkies`
--
ALTER TABLE `parkies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
