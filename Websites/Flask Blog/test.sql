-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 11:25 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `sr no` int(99) NOT NULL,
  `name` text NOT NULL,
  `phone_num` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`sr no`, `name`, `phone_num`, `email`, `msg`, `date`) VALUES
(0, 'omera', '23354566767', 'omerask11111@gmail.c', 'sadasdffdasfsffdfa', '2021-09-28 14:30:09'),
(1, 'test', '1233456890', 'test@test.com', 'sdfsfsdf grt5ehtrht gdsgdfsgdfggfsdgdfgdg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `sno` int(99) NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `img_file` varchar(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`sno`, `title`, `slug`, `content`, `img_file`, `date`) VALUES
(1, 'Title', 'first-post', 'Some quick example text to build on the card title.', '1.jpg', '2021-09-27 21:08:48'),
(2, 'Title', 'second-post', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '2.jpg', '2021-09-26 15:26:36'),
(3, 'Title', 'third-post', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '3.jpg', '2021-09-26 15:26:57'),
(4, 'Title', 'fourth-post', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1.jpg', '2021-09-26 15:27:24'),
(5, 'Title', 'fifth-post', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '2.jpg', '2021-09-26 15:27:51'),
(6, 'Title', 'sixth-post', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '3.jpg', '2021-09-26 15:28:12'),
(7, 'Title', 'seventh-post', 'Some quick example text to build on the card title.', '1.jpg', '2021-09-27 21:07:08'),
(8, 'eigth', 'eigth-post', 'Some quick example text to build on the card title.', '1.jpg', '2021-09-27 21:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`sr no`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
