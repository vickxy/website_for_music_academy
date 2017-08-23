-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2017 at 06:35 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2463452_db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `no` bigint(20) NOT NULL,
  `category` varchar(500) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `code` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`no`, `category`, `price`, `name`, `image`, `code`) VALUES
(1, 'Guitar', 18900, 'Epiphone LP Special II Ltd Plus Top Electric Guitar, Black', 'Epiphone LP Special II Ltd Plus Top Electric Guitar, Black.jpg', 'G001'),
(2, 'Bass Guitar', 17990, 'Yamaha TRBX174 4-String Electric Bass Guitar - Dark Blue Metallic', 'Yamaha TRBX174 4-String Electric Bass Guitar - Dark Blue Metallic.jpg', 'B001'),
(3, 'Bass Guitar', 17550, 'Yamaha PACIFICA012 Electric Guitar, Dark Blue Metallic', 'Yamaha PACIFICA012 Electric Guitar, Dark Blue Metallic.jpg', 'B002'),
(4, 'Guitar', 24500, 'Yamaha CG142S Spruce Top Classical Guitar', 'Yamaha CG142S Spruce Top Classical Guitar.jpg', 'G002'),
(5, 'Piano', 76490, 'Roland RP-302RW Digital Piano', 'Roland RP-302RW Digital Piano.jpg', 'P001'),
(6, 'Piano', 74149, 'Roland RP-301 Digital Piano', 'Roland RP-301 Digital Piano.jpg', 'P002'),
(9, 'Guitar', 30000, 'Acoustic Guitar CG1442', 'Acoustic Guitar CG1442.png', 'G003');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `no` bigint(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `plan` varchar(500) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`fname`, `lname`, `no`, `email`, `password`, `plan`, `register_date`) VALUES
('Bhawana', 'Singh', 9702392290, 'a@a.com', 'abc', 'Monthly', '2017-08-17'),
('Sumedha', 'Rani', 8879716459, 'iamsumedha@gmail.com', 'abc', 'Monthly', '2017-07-07'),
('Bhawana', 'Singh', 9702392290, 'sumedha.r.1209@gmail.com', 'abcdef', 'Monthly', '2017-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `video_tbl`
--

CREATE TABLE `video_tbl` (
  `no` bigint(20) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `artist` varchar(5000) NOT NULL,
  `comments` varchar(5000) NOT NULL,
  `instrument` varchar(300) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `filename` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `video_tbl`
--
ALTER TABLE `video_tbl`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
