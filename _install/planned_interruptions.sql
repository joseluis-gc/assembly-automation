-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 10:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andonv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `planned_interruptions`
--

CREATE TABLE `planned_interruptions` (
                                         `id` int(11) NOT NULL,
                                         `i_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                                         `i_time` double NOT NULL,
                                         `shift` int(1) NOT NULL,
                                         `i_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `planned_interruptions`
--

INSERT INTO `planned_interruptions` (`id`, `i_name`, `i_time`, `shift`, `i_active`) VALUES
                                                                                        (1, 'Lunch', 0.5, 0, 1),
                                                                                        (2, 'Calistenia', 0.133, 0, 1),
                                                                                        (3, 'Lunch', 0.5, 0, 1),
                                                                                        (4, 'Calistenia', 0.133, 1, 1),
                                                                                        (5, 'Shift Change', 0.083, 1, 1),
                                                                                        (6, 'Tier', 0.167, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `planned_interruptions`
--
ALTER TABLE `planned_interruptions`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `planned_interruptions`
--
ALTER TABLE `planned_interruptions`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
