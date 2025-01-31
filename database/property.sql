-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'fn', 'ln1', 'admin', '123456'),
(2, 'fn2', 'ln2', 'admin1', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` varchar(11) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'active',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `image_name`, `title`, `type`, `location`, `size`, `description`, `price`, `status`, `createdAt`) VALUES
(7015, '1.jpg', 'Property 1', 'House for sale', 'Matale', '6000 Sn ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', '34,000,000', 'active', '2025-01-26 14:34:41'),
(7017, '2.jpg', 'Property 2', 'House', 'Colombo', '6000 Sn', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', '75,000', 'active', '2025-01-26 14:34:41'),
(7018, '1.jpg', 'Property 3', 'House for sale - Mar', 'Kandy', 'Perches - 40, 2000 Sqft', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', '8,000,000/-', 'active', '2025-01-26 14:34:41'),
(7019, '2.jpg', 'Property 4', 'House for sale', 'Wadduwa', '11 Perch and 2000 Sqft', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', '7,800,000/-', 'active', '2025-01-26 14:34:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7020;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
