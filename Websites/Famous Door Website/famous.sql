-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2023 at 11:36 PM
-- Server version: 10.5.19-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famous`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `name` text NOT NULL,
  `subject` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `name`, `subject`, `email`, `message`) VALUES
(1, 'Taha', 'task8242@gmaill.com', 'test', 'ssklfadjflskdajslf\'jslkadjslfkad'),
(2, 'Taha', 'task8242@gmaill.com', 'test', 'ssklfadjflskdajslf\'jslkadjslfkad');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(5) NOT NULL,
  `name` text NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `price`, `image`, `description`) VALUES
(1, 'New Design Door', 4000, 'door1.jpg', 'door is a hinged or otherwise movable barrier that allows ingress (entry) into and egress (exit) from an enclosure. The created opening in the wall is a doorway or portal. A door\'s essential and primary purpose is to provide security by controlling access to the doorway '),
(2, 'Door 2', 5000, 'door2.jpg', 'door is a hinged or otherwise movable barrier that allows ingress (entry) into and egress (exit) from an enclosure. The created opening in the wall is a doorway or portal. A door\'s essential and primary purpose is to provide security by controlling access to the doorway '),
(3, 'Door 3', 6000, 'door3.jpg', 'door is a hinged or otherwise movable barrier that allows ingress (entry) into and egress (exit) from an enclosure. The created opening in the wall is a doorway or portal. A door\'s essential and primary purpose is to provide security by controlling access to the doorway '),
(4, 'Door Dummy', 8000, 'door4.jpg', 'door is a hinged or otherwise movable barrier that allows ingress (entry) into and egress (exit) from an enclosure. The created opening in the wall is a doorway or portal. A door\'s essential and primary purpose is to provide security by controlling access to the doorway ');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(10) NOT NULL,
  `c_name` text NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `amount` int(10) NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `c_name`, `mobile_no`, `address`, `amount`, `status`, `date`) VALUES
(4, 'tahashaikh', 212312312, 'test', 11000, 'pending', '2023-03-25'),
(5, 'task8242', 2343243432, 'test', 9000, 'complete', '2023-03-25'),
(6, 'tahashaikh', 12122, 'test', 10000, 'pending', '2023-03-25'),
(7, 'Website', 2343243432, 'trjglksjkfsjgsjglkfggfgfggfggfgsfgfsgsfg', 56000, 'pending', '2023-03-25'),
(8, 'Website', 34234343434, 'asfsfsasfad', 24000, 'pending', '2023-03-25'),
(9, 'tahashaikh', 34234343434, 'sdafsfsffsd', 20000, 'pending', '2023-03-25'),
(10, 'tahashaikh', 34234343434, 'sfdajsfasfd', 20000, 'pending', '2023-03-25'),
(11, 'tahashaikh', 2343243432, 'edsfdasfd', 20000, 'pending', '2023-03-25'),
(12, 'tahashaikh', 2343243432, 'sadsfadsdfsfa', 4000, 'pending', '2023-03-25'),
(13, 'tahashaikh', 2343243432, 'adsffsdsfd', 4000, 'pending', '2023-03-25'),
(14, 'tahashaikh', 2343243432, 'sdjfhsfkdjasfadjsfad', 15000, 'pending', '2023-03-25'),
(15, 'Mydoor', 12122, 'jlkewjflksflkfsd', 24000, 'pending', '2023-03-25'),
(16, 'task8242', 2343243432, 'test', 24000, 'pending', '2023-03-25'),
(17, 'task8242', 34234343434, 'sdjsfdsfalksfalksfkajsfkadj', 24000, 'complete', '2023-03-25'),
(18, 'OR \'1\'=\'1\'', 34234343434, 'fasfsdsdfsdf', 24000, 'complete', '2023-03-25'),
(19, 'date', 34234343434, 'dateeeeeeeeeeeeeeeeeeeeeee', 5000, 'pending', '2023-03-25'),
(20, 'tahashaikh', 2343243432, 'rfagsfadsfd', 25000, 'pending', '2023-03-26'),
(21, 'task8242', 34234343434, 'Tetsejfsfd', 6000, 'pending', '2023-03-26'),
(22, 'tahashaikh', 3423434343, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 40000, 'pending', '2023-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_product_details`
--

CREATE TABLE `transaction_product_details` (
  `tid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `quantity` int(4) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_product_details`
--

INSERT INTO `transaction_product_details` (`tid`, `pid`, `quantity`, `size`) VALUES
(5, 1, 1, 32),
(5, 2, 1, 55),
(6, 2, 2, 67),
(7, 3, 4, 55),
(7, 1, 3, 55),
(7, 2, 4, 33),
(8, 1, 1, 33),
(8, 2, 4, 12),
(11, 1, 5, 55),
(13, 1, 1, 0),
(14, 2, 3, 33),
(15, 3, 4, 33),
(16, 3, 4, 33),
(17, 3, 4, 33),
(18, 3, 4, 33),
(19, 2, 1, 33),
(20, 2, 5, 67),
(21, 3, 1, 55),
(22, 1, 5, 33),
(22, 2, 4, 67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
