-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 12:22 AM
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
-- Table structure for table `plan_hrxhr`
--

CREATE TABLE `plan_hrxhr` (
                              `plan_id` int(11) NOT NULL,
                              `plant_id` int(11) NOT NULL,
                              `site_id` int(11) NOT NULL,
                              `plan_asset` int(11) NOT NULL,
                              `date` date NOT NULL,
                              `6` int(11) NOT NULL,
                              `7` int(11) NOT NULL,
                              `8` int(11) NOT NULL,
                              `9` int(11) NOT NULL,
                              `10` int(11) NOT NULL,
                              `11` int(11) NOT NULL,
                              `12` int(11) NOT NULL,
                              `13` int(11) NOT NULL,
                              `14` int(11) NOT NULL,
                              `15` int(11) NOT NULL,
                              `16` int(11) NOT NULL,
                              `17` int(11) NOT NULL,
                              `18` int(11) NOT NULL,
                              `19` int(11) NOT NULL,
                              `20` int(11) NOT NULL,
                              `21` int(11) NOT NULL,
                              `22` int(11) NOT NULL,
                              `23` int(11) NOT NULL,
                              `24` int(11) NOT NULL,
                              `1` int(11) NOT NULL,
                              `2` int(11) NOT NULL,
                              `3` int(11) NOT NULL,
                              `4` int(11) NOT NULL,
                              `5` int(11) NOT NULL,
                              `6h` int(11) NOT NULL,
                              `7h` int(11) NOT NULL,
                              `8h` int(11) NOT NULL,
                              `9h` int(11) NOT NULL,
                              `10h` int(11) NOT NULL,
                              `11h` int(11) NOT NULL,
                              `12h` int(11) NOT NULL,
                              `13h` int(11) NOT NULL,
                              `14h` int(11) NOT NULL,
                              `15h` int(11) NOT NULL,
                              `16h` int(11) NOT NULL,
                              `17h` int(11) NOT NULL,
                              `18h` int(11) NOT NULL,
                              `19h` int(11) NOT NULL,
                              `20h` int(11) NOT NULL,
                              `21h` int(11) NOT NULL,
                              `22h` int(11) NOT NULL,
                              `23h` int(11) NOT NULL,
                              `24h` int(11) NOT NULL,
                              `1h` int(11) NOT NULL,
                              `2h` int(11) NOT NULL,
                              `3h` int(11) NOT NULL,
                              `4h` int(11) NOT NULL,
                              `5h` int(11) NOT NULL,
                              `wo_6` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_7` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_8` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_9` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_10` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_11` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_12` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_13` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_14` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_15` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_16` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_17` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_18` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_19` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_20` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_21` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_22` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_23` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_24` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_3` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_4` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `wo_5` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_6` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_7` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_8` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_9` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_10` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_11` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_12` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_13` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_14` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_15` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_16` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_17` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_18` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_19` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_20` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_21` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_22` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_23` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_24` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_3` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_4` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `pn_5` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                              `date_create` datetime NOT NULL,
                              `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                              `turno` int(1) NOT NULL,
                              `status` int(1) NOT NULL DEFAULT 0 COMMENT '0-Cargada\r\n1-En proceso\r\n2-Terminada\r\n3-Suspendida\r\n4-Cancelada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plan_hrxhr`
--
ALTER TABLE `plan_hrxhr`
    ADD PRIMARY KEY (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plan_hrxhr`
--
ALTER TABLE `plan_hrxhr`
    MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
