SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `alerts` (
  `alert_id` int(11) NOT NULL,
  `alert_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE `hour_order` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `order_item` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `order_qty` float NOT NULL,
  `order_pph` float NOT NULL DEFAULT 0,
  `order_asset` int(11) NOT NULL,
  `order_reg_date` datetime NOT NULL,
  `order_start_date` datetime NOT NULL,
  `order_end_date` datetime NOT NULL,
  `order_status` int(1) NOT NULL,
  `order_suspended` int(1) NOT NULL,
  `order_factor` int(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE `hour_pph` (
  `id_pph` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `routing` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descrip` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facility` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `runlabor` float DEFAULT NULL,
  `pph` float DEFAULT NULL,
  `sec` float DEFAULT NULL,
  `hrs` float DEFAULT NULL,
  `setup` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


CREATE TABLE `hour_pph_2` (
  `id_pph` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `routing` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descrip` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `facility` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `runlabor` float DEFAULT NULL,
  `pph` float DEFAULT NULL,
  `sec` float DEFAULT NULL,
  `hrs` float DEFAULT NULL,
  `setup` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hour_registry`
--

CREATE TABLE `hour_registry` (
  `reg_id` int(11) NOT NULL,
  `reg_qty` float NOT NULL,
  `reg_time_block` int(2) NOT NULL,
  `reg_real_time` datetime NOT NULL,
  `reg_order_id` int(11) NOT NULL,
  `source` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



CREATE TABLE `hour_suspends` (
  `suspend_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `suspend_date` datetime NOT NULL,
  `suspend_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_plan`
--

CREATE TABLE `hr_plan` (
  `id_plan` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `plan_order` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `plan_item` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `plan_asset` int(11) NOT NULL,
  `plan_qty` float NOT NULL,
  `plan_qty_pph` float NOT NULL,
  `plan_factor` int(11) NOT NULL,
  `hc` int(11) NOT NULL,
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
  `date_create` datetime NOT NULL,
  `turno` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0-Cargada\r\n1-En proceso\r\n2-Terminada\r\n3-Suspendida\r\n4-Cancelada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `hr_plan`
--

INSERT INTO `hr_plan` (`id_plan`, `plant_id`, `site_id`, `plan_order`, `plan_item`, `plan_asset`, `plan_qty`, `plan_qty_pph`, `plan_factor`, `hc`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `1`, `2`, `3`, `4`, `5`, `6h`, `7h`, `8h`, `9h`, `10h`, `11h`, `12h`, `13h`, `14h`, `15h`, `16h`, `17h`, `18h`, `19h`, `20h`, `21h`, `22h`, `23h`, `24h`, `1h`, `2h`, `3h`, `4h`, `5h`, `date_create`, `turno`, `status`) VALUES
(16, 7, 12, 'WO123', 'AC3703K', 8, 10000, 100.5, 1, 1, 50, 101, 101, 101, 101, 101, 101, 101, 101, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-01 14:28:27', 1, 1),
(17, 7, 12, 'MXMT120', 'AC3703K', 8, 1000, 100, 1, 1, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-01 14:27:58', 1, 0),
(18, 7, 12, 'WO123', 'AC3703K', 8, 500, 100, 1, 1, 75, 100, 100, 100, 100, 80, 100, 100, 100, 75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-01 14:39:20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr_pph_data`
--

CREATE TABLE `hr_pph_data` (
  `Routing identifier` varchar(18) DEFAULT NULL,
  `Oper` varchar(4) DEFAULT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Facility` varchar(8) DEFAULT NULL,
  `Setup hours` varchar(11) DEFAULT NULL,
  `Run labor` varchar(9) DEFAULT NULL,
  `PPH` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `m1___runtime_07192021` (
  `Routing identifier` varchar(18) DEFAULT NULL,
  `Oper` varchar(4) DEFAULT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Facility` varchar(8) DEFAULT NULL,
  `Setup hours` varchar(11) DEFAULT NULL,
  `Run labor` varchar(9) DEFAULT NULL,
  `PPH` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `m1___runtime_07192021_1` (
  `Routing identifier` varchar(18) DEFAULT NULL,
  `Oper` varchar(4) DEFAULT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Facility` varchar(8) DEFAULT NULL,
  `Setup hours` varchar(11) DEFAULT NULL,
  `Run labor` varchar(9) DEFAULT NULL,
  `PPH` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `m1___runtime_07192021_2` (
  `Routing identifier` varchar(18) DEFAULT NULL,
  `Oper` varchar(4) DEFAULT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Facility` varchar(8) DEFAULT NULL,
  `Setup hours` varchar(11) DEFAULT NULL,
  `Run labor` varchar(9) DEFAULT NULL,
  `PPH` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
(3, 'Lunch', 0.5, 0, 1),
(4, 'Calistenia', 0.133, 1, 1),
(5, 'Shift Change', 0.083, 1, 1),
(6, 'Tier', 0.167, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `use_pass` int(1) NOT NULL DEFAULT 0,
  `plant_password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `plant_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`plant_id`, `plant_name`, `use_pass`, `plant_password`, `date_create`, `date_update`, `plant_active`) VALUES
(6, 'Moldeo', 1, 'planta1', '2021-11-01 16:29:47', '2021-11-01 23:29:47', 1),
(7, 'Ensamble', 1, 'planta2', '2021-11-01 16:34:41', '2021-11-01 23:34:41', 1),
(8, 'Planta 3 ', 1, 'planta3', '2021-11-01 16:36:07', '2021-11-01 23:36:07', 1);


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
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0-Cargada\r\n1-En proceso\r\n2-Terminada\r\n3-Suspendida\r\n4-Cancelada',
  `shift` int(1) NOT NULL,
  `supervisor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `plan_hrxhr`
--

INSERT INTO `plan_hrxhr` (`plan_id`, `plant_id`, `site_id`, `plan_asset`, `date`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `1`, `2`, `3`, `4`, `5`, `6h`, `7h`, `8h`, `9h`, `10h`, `11h`, `12h`, `13h`, `14h`, `15h`, `16h`, `17h`, `18h`, `19h`, `20h`, `21h`, `22h`, `23h`, `24h`, `1h`, `2h`, `3h`, `4h`, `5h`, `wo_6`, `wo_7`, `wo_8`, `wo_9`, `wo_10`, `wo_11`, `wo_12`, `wo_13`, `wo_14`, `wo_15`, `wo_16`, `wo_17`, `wo_18`, `wo_19`, `wo_20`, `wo_21`, `wo_22`, `wo_23`, `wo_24`, `wo_1`, `wo_2`, `wo_3`, `wo_4`, `wo_5`, `pn_6`, `pn_7`, `pn_8`, `pn_9`, `pn_10`, `pn_11`, `pn_12`, `pn_13`, `pn_14`, `pn_15`, `pn_16`, `pn_17`, `pn_18`, `pn_19`, `pn_20`, `pn_21`, `pn_22`, `pn_23`, `pn_24`, `pn_1`, `pn_2`, `pn_3`, `pn_4`, `pn_5`, `date_create`, `date_update`, `turno`, `status`, `shift`, `supervisor`) VALUES
(5, 7, 13, 147, '2022-01-06', 591, 600, 600, 586, 550, 600, 0, 0, 0, 120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 6, 6, 6, 6, 6, 6, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'wo01', 'wo01', 'wo01', 'wo02', 'wo02', 'wo03', 'N/A', 'N/A', 'N/A', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'AC1002HF', 'AC1002HF', 'AC1002HF', 'AC1006', 'AC1006', 'AC1011HFC', 'N/A', 'N/A', 'N/A', 'AC1002HF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-06 15:28:19', '2022-01-06 23:49:50', 2, 0, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `profile_alert`
--

CREATE TABLE `profile_alert` (
  `profile_alert_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `alert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `profile_alert`
--

INSERT INTO `profile_alert` (`profile_alert_id`, `profile_id`, `alert_id`) VALUES
(82, 34, 8),
(83, 34, 9),
(84, 34, 10),
(85, 34, 11),
(86, 35, 8),
(87, 36, 8),
(88, 36, 9),
(89, 36, 10),
(90, 36, 11),
(110, 42, 8),
(111, 42, 9),
(112, 42, 10),
(113, 42, 11),
(114, 43, 8),
(115, 43, 9),
(116, 43, 10),
(117, 43, 11),
(118, 44, 8),
(119, 45, 9),
(120, 46, 8),
(121, 47, 8),
(122, 47, 9),
(123, 47, 10),
(124, 47, 11),
(125, 48, 9),
(126, 48, 10);

-- --------------------------------------------------------

--
-- Table structure for table `profile_area`
--

CREATE TABLE `profile_area` (
  `user_area_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `profile_area`
--

INSERT INTO `profile_area` (`user_area_id`, `site_id`, `plant_id`, `profile_id`) VALUES
(111, 8, 6, 34),
(112, 9, 6, 34),
(113, 10, 6, 34),
(114, 11, 7, 34),
(115, 12, 7, 34),
(116, 13, 7, 34),
(117, 14, 7, 34),
(118, 15, 7, 34),
(119, 16, 7, 34),
(120, 17, 7, 34),
(121, 18, 8, 34),
(122, 19, 8, 34),
(123, 20, 8, 34),
(124, 11, 7, 35),
(125, 12, 7, 35),
(126, 13, 7, 35),
(127, 14, 7, 35),
(128, 15, 7, 35),
(129, 16, 7, 35),
(130, 17, 7, 35),
(131, 13, NULL, 36),
(132, 16, NULL, 36),
(177, 11, 7, 42),
(178, 12, 7, 42),
(179, 13, 7, 42),
(180, 14, 7, 42),
(181, 15, 7, 42),
(182, 16, 7, 42),
(183, 17, 7, 42),
(184, 11, 7, 43),
(185, 12, 7, 43),
(186, 13, 7, 43),
(187, 14, 7, 43),
(188, 15, 7, 43),
(189, 16, 7, 43),
(190, 17, 7, 43),
(191, 8, 6, 44),
(192, 9, 6, 44),
(193, 10, 6, 44),
(194, 11, 7, 44),
(195, 12, 7, 44),
(196, 13, 7, 44),
(197, 14, 7, 44),
(198, 15, 7, 44),
(199, 16, 7, 44),
(200, 17, 7, 44),
(201, 18, 8, 44),
(202, 19, 8, 44),
(203, 20, 8, 44),
(204, 8, 6, 45),
(205, 9, 6, 45),
(206, 10, 6, 45),
(207, 11, 7, 45),
(208, 12, 7, 45),
(209, 13, 7, 45),
(210, 14, 7, 45),
(211, 15, 7, 45),
(212, 16, 7, 45),
(213, 17, 7, 45),
(214, 18, 8, 45),
(215, 19, 8, 45),
(216, 20, 8, 45),
(217, 8, 6, 46),
(218, 9, 6, 46),
(219, 10, 6, 46),
(220, 11, NULL, 47),
(221, 13, NULL, 48);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `screen_id` int(11) NOT NULL,
  `screen_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `screen_site_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE `site` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` varchar(1) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '0 Cant add users or add machines or lines\r\n\r\n1 Can add machines lines\r\n\r\n2 Can add users machines and lines\r\n',
  `user_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'A administration-views everything\r\n\r\nS support-views only their issues issue type\r\n\r\nO operations-views only their plants/area issues',
  `e1` int(1) NOT NULL,
  `e2` int(1) NOT NULL,
  `e3` int(1) NOT NULL,
  `e4` int(1) NOT NULL,
  `e5` int(1) NOT NULL,
  `user_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


CREATE TABLE `users_backup` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` varchar(1) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '0 Cant add users or add machines or lines\r\n\r\n1 Can add machines lines\r\n\r\n2 Can add users machines and lines\r\n',
  `user_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'A administration-views everything\r\n\r\nS support-views only their issues issue type\r\n\r\nO operations-views only their plants/area issues',
  `e1` int(1) NOT NULL,
  `e2` int(1) NOT NULL,
  `e3` int(1) NOT NULL,
  `e4` int(1) NOT NULL,
  `e5` int(1) NOT NULL,
  `user_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


CREATE TABLE `users_operations` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_support`
--

CREATE TABLE `users_support` (
  `support_id` int(11) NOT NULL,
  `support_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_alert`
--

CREATE TABLE `user_alert` (
  `user_alert_id` int(11) NOT NULL,
  `alert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_area`
--

CREATE TABLE `user_area` (
  `user_area_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` int(11) NOT NULL,
  `profile_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `e1` int(1) NOT NULL,
  `e2` int(1) NOT NULL,
  `e3` int(1) NOT NULL,
  `e4` int(1) NOT NULL,
  `e5` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `user_profile`
--

CREATE TABLE `user_profile_link` (
  `link_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;