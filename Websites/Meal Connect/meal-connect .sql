-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 08:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal-connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE `food_details` (
  `fid` int(10) NOT NULL,
  `fname` text NOT NULL,
  `quantity` int(3) NOT NULL,
  `city` text NOT NULL,
  `expiry` date NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`fid`, `fname`, `quantity`, `city`, `expiry`, `address`) VALUES
(3, 'Milk', 4, 'delhi', '2023-03-29', 'chandni chowk delhi'),
(8, 'Veg Biryani', 19, 'chennai', '2023-03-09', 'mangoan Chennai'),
(9, 'Biryani', 4, 'kolkata', '2023-03-25', 'chandni chowk delhi'),
(10, 'Vada Pav', 13, 'chennai', '2023-03-08', 'mangoan Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(20) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `name`, `email`, `password`, `phone`, `rating`) VALUES
(1, 'test', 'munib@333', 'munib@333', 0, 2),
(2, 'Sharif', '20co29@aiktc.ac', '20co29@aiktc.ac', 0, 2),
(3, 'Sharif', 'sharif@aiktc', 'sharif@aiktc', 0, 0),
(4, 'faisal', '20co27@aiktc.ac', '20co27@aiktc.ac', 0, 0),
(5, 'mubin', 'munib@344', 'munib@344', 0, 0),
(6, 'shaibaz', 'saibaz@aiktc', 'saibaz@aiktc', 326463432, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_details`
--
ALTER TABLE `food_details`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_details`
--
ALTER TABLE `food_details`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
