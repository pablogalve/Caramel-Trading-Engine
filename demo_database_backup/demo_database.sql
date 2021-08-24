-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-08-2021 a las 11:09:56
-- Versión del servidor: 10.3.30-MariaDB-cll-lve
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pabloga4_BURkGx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `amount_EUR` decimal(9,2) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deposits`
--

INSERT INTO `deposits` (`id`, `username`, `amount_EUR`, `reference`, `status`, `date`) VALUES
(1, 'test1', 1500.00, NULL, 'confirmed', '2020-02-23 16:37:54'),
(2, 'test1', 25000.00, NULL, 'confirmed', '2020-02-23 16:39:20'),
(3, 'test1', 7500.00, NULL, 'confirmed', '2020-02-23 16:40:48'),
(4, 'test2', 3500.00, NULL, 'confirmed', '2020-02-23 16:41:17'),
(5, 'test2', 72.00, NULL, 'rejected', '2020-02-23 16:43:57'),
(6, 'test1', 50.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(7, 'test1', 60.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(8, 'test1', 70.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(9, 'test1', 80.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(10, 'test1', 90.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(11, 'test1', 100.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(12, 'test1', 150.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(13, 'test1', 130.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(14, 'test1', 10.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(15, 'test1', 12.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(16, 'test1', 9.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(17, 'test1', 8.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(18, 'test2', 2.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(19, 'test2', 2.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(20, 'test2', 2.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(21, 'test1', 50.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(22, 'test1', 50.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(23, 'test1', 50.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(24, 'test1', 1.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(25, 'test1', 1.00, NULL, 'confirmed', '0000-00-00 00:00:00'),
(26, 'test1', 1.00, NULL, 'confirmed', '0000-00-00 00:00:00'),

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mfeurcandlestick`
--

CREATE TABLE `mfeurcandlestick` (
  `open` float DEFAULT NULL,
  `close` float DEFAULT NULL,
  `high` float DEFAULT NULL,
  `low` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `date` date NOT NULL,
  `timestamp` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mfeurcandlestick`
--

INSERT INTO `mfeurcandlestick` (`open`, `close`, `high`, `low`, `volume`, `date`, `timestamp`) VALUES
(30, 54.87, 67, 15.7, 103307, '2020-07-22', '1595432847'),
(22, 30, 50.87, 20, 70000, '2020-07-21', '1595346447'),
(23, 28, 33, 22, 52000, '2020-07-19', '1595173647'),
(28, 22, 42.72, 21.77, 60000, '2020-07-20', '1595260047'),
(7, 8, 5, 5, 17000, '2020-07-15', '1594828047'),
(8, 10.5, 5, 5, 12000, '2020-07-16', '1594914447'),
(10.5, 16, 20, 10, 15000, '2020-07-17', '1595000847'),
(16, 23, 23, 12, 30000, '2020-07-18', '1595087247'),
(20, 7, 22, 5, 67000, '2020-07-14', '1594741647'),
(1.5, 2, 2.5, 1, 9000, '2020-06-30', '1593532047'),
(2, 2.5, 3, 2, 10000, '2020-07-01', '1593618447'),
(2.5, 7, 5, 2.3, 12000, '2020-07-02', '1593704847'),
(7, 13, 22, 3.7, 32000, '2020-07-03', '1593791247'),
(13, 17, 27, 10, 47000, '2020-07-04', '1593877647'),
(17, 5, 28, 3, 52000, '2020-07-05', '1593964047'),
(5, 6, 6.7, 17, 12000, '2020-07-06', '1594050447'),
(6, 8, 12, 17, 12000, '2020-07-07', '1594136847'),
(8, 8.6, 13, 17, 45000, '2020-07-08', '1594223247'),
(8.6, 15, 23, 17, 27000, '2020-07-09', '1594309647'),
(15, 25, 36, 17, 30000, '2020-07-10', '1594396047'),
(25, 30, 32, 17, 32000, '2020-07-11', '1594482447'),
(30, 37, 56, 26, 75000, '2020-07-12', '1594568847'),
(37, 20, 39, 17, 85000, '2020-07-13', '1594655247'),
(60, 54.87, 60, 54.87, 3345.4, '2020-08-16', '1597607884'),
(54.87, 52.37, 54.87, 52.37, 882.857, '2020-08-17', '1597664578'),
(56, 56, 56, 56, 4592, '2021-06-04', '1622765823');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `open_orders`
--

CREATE TABLE `open_orders` (
  `id` int(11) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `amount_RP` decimal(10,4) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `ticker` varchar(10) DEFAULT NULL,
  `order_type` varchar(5) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `open_orders`
--

INSERT INTO `open_orders` (`id`, `price`, `amount_RP`, `date`, `username`, `ticker`, `order_type`, `order_id`) VALUES
(90, 69.00, 25.0000, '2020-07-16 17:25:45', 'test1', 'pgeur', 'sell', 70),
(91, 67.25, 7.0000, '2020-07-16 17:26:20', 'test1', 'pgeur', 'sell', 71),
(92, 45.00, 37.0000, '2020-07-17 13:18:42', 'test1', 'pgeur', 'buy', 114),
(93, 38.34, 25.0000, '2020-07-17 13:19:08', 'test1', 'pgeur', 'buy', 115),
(95, 65.48, 38.0000, '2020-07-17 13:21:36', 'test1', 'pgeur', 'sell', 72),
(96, 61.28, 68.0000, '2020-07-17 13:21:43', 'test1', 'pgeur', 'sell', 73),
(99, 61.00, 15.0000, '2020-07-17 13:22:39', 'test1', 'pgeur', 'sell', 76),
(100, 47.00, 30.0000, '2020-07-17 13:23:01', 'test1', 'pgeur', 'buy', 117),
(101, 27.00, 150.0000, '2020-07-17 13:23:15', 'test1', 'pgeur', 'buy', 118),
(102, 18.00, 150.0000, '2020-07-17 13:23:37', 'test1', 'pgeur', 'buy', 119),
(103, 19.00, 5.0000, '2020-07-17 13:23:48', 'test1', 'pgeur', 'buy', 120),
(104, 20.00, 5.0000, '2020-07-17 13:24:05', 'test1', 'pgeur', 'buy', 121),
(105, 22.00, 7.0000, '2020-07-17 13:24:09', 'test1', 'pgeur', 'buy', 122),
(106, 35.00, 7.0000, '2020-07-17 13:24:21', 'test1', 'pgeur', 'buy', 123),
(107, 16.00, 5.0000, '2020-07-17 13:24:28', 'test1', 'pgeur', 'buy', 124),
(108, 13.00, 5.0000, '2020-07-17 13:24:36', 'test1', 'pgeur', 'buy', 125),
(109, 12.00, 5.0000, '2020-07-17 13:24:38', 'test1', 'pgeur', 'buy', 126),
(110, 75.00, 150.0000, '2020-07-17 13:24:41', 'test1', 'pgeur', 'sell', 77),
(111, 77.50, 37.0000, '2020-07-17 13:25:21', 'test1', 'pgeur', 'sell', 78),
(112, 66.00, 27.0000, '2020-07-17 13:25:35', 'test1', 'pgeur', 'sell', 79),
(113, 65.70, 19.0000, '2020-07-17 13:25:47', 'test1', 'pgeur', 'sell', 80),
(114, 59.78, 30.0000, '2020-07-17 13:26:14', 'test1', 'pgeur', 'sell', 81),
(115, 67.20, 28.0000, '2020-07-17 13:26:25', 'test1', 'pgeur', 'sell', 82),
(117, 72.00, 58.0000, '2020-07-17 13:28:17', 'test1', 'pgeur', 'sell', 84),
(118, 62.50, 30.0000, '2020-07-17 13:28:30', 'test1', 'pgeur', 'sell', 85),
(119, 65.55, 25.0000, '2020-07-17 13:29:15', 'test3', 'pgeur', 'sell', 86),
(120, 33.00, 7.0000, '2020-07-17 13:36:43', 'test3', 'pgeur', 'buy', 127),
(121, 43.00, 5.0000, '2020-07-17 13:39:24', 'test3', 'pgeur', 'buy', 128),
(132, 37.00, 380.0000, '2020-07-20 16:44:18', 'test1', 'pgeur', 'buy', 134),
(134, 83.00, 10.0000, '2020-07-20 16:45:19', 'test1', 'pgeur', 'sell', 92),
(135, 97.00, 5.0000, '2020-07-20 16:45:52', 'test1', 'pgeur', 'sell', 93),
(136, 105.00, 5.0000, '2020-07-20 16:46:02', 'test1', 'pgeur', 'sell', 94),
(137, 74.80, 50.0000, '2020-07-20 16:46:11', 'test1', 'pgeur', 'sell', 95),
(138, 59.60, 35.0000, '2020-07-20 16:46:26', 'test1', 'pgeur', 'sell', 96),
(139, 70.30, 25.0000, '2020-07-20 16:46:39', 'test1', 'pgeur', 'sell', 97),
(140, 64.30, 250.0000, '2020-07-20 16:46:48', 'test1', 'pgeur', 'sell', 98),
(141, 75.00, 112.0000, '2020-07-20 16:46:59', 'test1', 'pgeur', 'sell', 99),
(142, 10.00, 751.0000, '2020-07-20 16:50:36', 'test1', 'pgeur', 'buy', 136),
(144, 60.00, 5.0000, '2020-07-22 17:09:37', 'test1', 'pgeur', 'buy', 137),
(146, 57.00, 5.0000, '2020-07-22 19:59:57', 'test1', 'pgeur', 'sell', 102),
(161, 5.00, 5.0000, '2020-07-22 21:55:49', 'test1', 'pgeur', 'buy', 140),
(171, 62.30, 5.0000, '2020-08-16 17:22:17', 'test1', 'pgeur', 'sell', 119),
(172, 62.30, 5.0000, '2020-08-16 17:22:17', 'test1', 'pgeur', 'sell', 120),
(184, 54.00, 5.0000, '2020-08-17 14:50:03', 'test1', 'pgeur', 'buy', 147),
(185, 54.00, 5.0000, '2020-08-17 14:50:03', 'test1', 'pgeur', 'buy', 148),
(186, 52.73, 5.0000, '2020-08-17 14:51:23', 'test1', 'pgeur', 'buy', 149),
(187, 50.32, 7.2435, '2020-08-17 14:51:53', 'test1', 'pgeur', 'buy', 150),
(188, 55.20, 5.0000, '2020-08-17 14:53:22', 'test3', 'pgeur', 'buy', 151),
(189, 60.00, 60.0000, '2020-08-17 15:10:12', 'test1', 'pgeur', 'sell', 131),
(191, 53.00, 5.0000, '2020-08-18 04:17:36', 'test1', 'pgeur', 'buy', 152),
(192, 53.00, 5.0000, '2020-08-18 04:17:45', 'test1', 'pgeur', 'buy', 153),
(193, 53.30, 6.0000, '2020-08-18 04:18:23', 'test1', 'pgeur', 'buy', 154),
(194, 52.00, 5.0000, '2020-08-18 04:19:11', 'test1', 'pgeur', 'buy', 155),
(195, 57.00, 75.0000, '2020-08-19 02:54:23', 'test1', 'pgeur', 'sell', 133),
(196, 56.00, 56.0000, '2020-08-19 03:26:14', 'test1', 'pgeur', 'buy', 156),
(201, 12.00, 5.0000, '2021-08-19 03:58:49', 'appnana', 'pgeur', 'buy', 157),
(202, 10.00, 1000.0000, '2021-08-24 07:16:47', 'test1', 'pgeur', 'buy', 158);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secondary_market_pgeur_ask`
--

CREATE TABLE `secondary_market_pgeur_ask` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `amount_RP` decimal(9,4) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secondary_market_pgeur_ask`
--

INSERT INTO `secondary_market_pgeur_ask` (`id`, `username`, `price`, `amount_RP`, `date`) VALUES
(70, 'test1', 69.00, 25.0000, '2020-07-16 19:26:20'),
(71, 'test1', 67.25, 7.0000, '2020-07-16 19:26:33'),
(72, 'test1', 65.48, 38.0000, '2020-07-17 15:21:43'),
(73, 'test1', 61.28, 68.0000, '2020-07-17 15:22:02'),
(76, 'test1', 61.00, 15.0000, '2020-07-17 15:23:01'),
(77, 'test1', 75.00, 150.0000, '2020-07-17 15:25:21'),
(78, 'test1', 77.50, 37.0000, '2020-07-17 15:25:33'),
(79, 'test1', 66.00, 27.0000, '2020-07-17 15:25:47'),
(80, 'test1', 65.70, 19.0000, '2020-07-17 15:26:14'),
(81, 'test1', 59.78, 30.0000, '2020-07-17 15:26:25'),
(82, 'test1', 67.20, 28.0000, '2020-07-17 15:26:39'),
(84, 'test1', 72.00, 58.0000, '2020-07-17 15:28:30'),
(85, 'test1', 62.50, 30.0000, '2020-07-17 15:28:46'),
(86, 'test3', 65.55, 25.0000, '2020-07-17 15:36:43'),
(92, 'test1', 83.00, 10.0000, '2020-07-20 18:45:52'),
(93, 'test1', 97.00, 5.0000, '2020-07-20 18:46:02'),
(94, 'test1', 99.99, 5.0000, '2020-07-20 18:46:11'),
(95, 'test1', 74.80, 50.0000, '2020-07-20 18:46:26'),
(96, 'test1', 59.60, 28.0000, '2020-07-20 18:46:39'),
(97, 'test1', 70.30, 25.0000, '2020-07-20 18:46:48'),
(98, 'test1', 64.30, 250.0000, '2020-07-20 18:46:59'),
(99, 'test1', 75.00, 112.0000, '2020-07-20 18:47:16'),
(119, 'test1', 62.30, 5.0000, '2020-08-16 19:22:45'),
(120, 'test1', 62.30, 5.0000, '2020-08-16 19:26:58'),
(131, 'test1', 60.00, 60.0000, '2020-08-17 17:10:16'),
(133, 'test1', 57.00, 75.0000, '2020-08-19 05:26:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secondary_market_pgeur_bid`
--

CREATE TABLE `secondary_market_pgeur_bid` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `amount_RP` decimal(9,4) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secondary_market_pgeur_bid`
--

INSERT INTO `secondary_market_pgeur_bid` (`id`, `username`, `price`, `amount_RP`, `date`) VALUES
(114, 'test1', 45.00, 37.0000, '2020-07-17 15:19:04'),
(115, 'test1', 38.34, 25.0000, '2020-07-17 15:19:24'),
(117, 'test1', 47.00, 30.0000, '2020-07-17 15:23:15'),
(118, 'test1', 27.00, 150.0000, '2020-07-17 15:23:32'),
(119, 'test1', 18.00, 150.0000, '2020-07-17 15:23:48'),
(120, 'test1', 19.00, 5.0000, '2020-07-17 15:24:05'),
(121, 'test1', 20.00, 5.0000, '2020-07-17 15:24:09'),
(122, 'test1', 22.00, 7.0000, '2020-07-17 15:24:12'),
(123, 'test1', 35.00, 7.0000, '2020-07-17 15:24:28'),
(124, 'test1', 16.00, 5.0000, '2020-07-17 15:24:36'),
(125, 'test1', 13.00, 5.0000, '2020-07-17 15:24:38'),
(126, 'test1', 12.00, 5.0000, '2020-07-17 15:24:41'),
(127, 'test3', 33.00, 7.0000, '2020-07-17 15:39:24'),
(128, 'test3', 43.00, 5.0000, '2020-07-17 15:39:38'),
(134, 'test1', 37.00, 380.0000, '2020-07-20 18:44:57'),
(136, 'test1', 10.00, 751.0000, '2020-07-20 18:50:52'),
(140, 'test1', 5.00, 5.0000, '2020-07-22 23:55:50'),
(147, 'test1', 54.00, 5.0000, '2020-08-17 16:50:38'),
(148, 'test1', 54.00, 5.0000, '2020-08-17 16:51:23'),
(149, 'test1', 52.73, 5.0000, '2020-08-17 16:51:38'),
(150, 'test1', 50.32, 7.2435, '2020-08-17 16:52:11'),
(151, 'test3', 55.20, 5.0000, '2020-08-17 16:53:37'),
(152, 'test1', 53.00, 5.0000, '2020-08-18 06:17:41'),
(153, 'test1', 53.00, 5.0000, '2020-08-18 06:17:48'),
(154, 'test1', 53.30, 6.0000, '2020-08-18 06:18:29'),
(155, 'test1', 52.00, 5.0000, '2020-08-18 06:19:15'),
(156, 'test1', 56.00, 15.0000, '2020-08-19 05:26:39'),
(157, 'appnana', 12.00, 5.0000, '2021-08-19 03:59:09'),
(158, 'test1', 10.00, 1000.0000, '2021-08-24 07:17:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trades`
--

CREATE TABLE `trades` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `ticker` varchar(10) DEFAULT NULL,
  `price` decimal(6,4) DEFAULT NULL,
  `amount_RP` decimal(10,4) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `eur` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `pg` decimal(12,4) NOT NULL DEFAULT 0.0000,
  `role` varchar(15) NOT NULL,
  `freeze` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `amount_EUR` decimal(9,2) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mfeurcandlestick`
--
ALTER TABLE `mfeurcandlestick`
  ADD PRIMARY KEY (`date`);

--
-- Indices de la tabla `open_orders`
--
ALTER TABLE `open_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secondary_market_pgeur_ask`
--
ALTER TABLE `secondary_market_pgeur_ask`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secondary_market_pgeur_bid`
--
ALTER TABLE `secondary_market_pgeur_bid`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `open_orders`
--
ALTER TABLE `open_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `secondary_market_pgeur_ask`
--
ALTER TABLE `secondary_market_pgeur_ask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `secondary_market_pgeur_bid`
--
ALTER TABLE `secondary_market_pgeur_bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `trades`
--
ALTER TABLE `trades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
