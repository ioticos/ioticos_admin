-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2019 a las 23:38:01
-- Versión del servidor: 5.7.27-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_lte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `data_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_temp` float(4,2) NOT NULL,
  `data_hum` int(3) NOT NULL,
  `data_device_sn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`data_id`, `data_date`, `data_temp`, `data_hum`, `data_device_sn`) VALUES
(1, '2019-08-11 22:32:04', 22.00, 80, '111'),
(2, '2019-08-11 22:32:29', 25.00, 70, '111'),
(3, '2019-08-11 22:32:44', 30.00, 60, '111'),
(4, '2019-08-11 22:33:04', 10.00, 40, '111'),
(5, '2019-08-11 22:33:16', 5.00, 10, '111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `device_id` int(7) UNSIGNED NOT NULL,
  `device_user_id` int(7) DEFAULT NULL,
  `device_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `device_alias` varchar(50) DEFAULT '',
  `device_sn` int(7) DEFAULT NULL,
  `device_topic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`device_id`, `device_user_id`, `device_date`, `device_alias`, `device_sn`, `device_topic`) VALUES
(19, 4, '2019-08-11 22:58:22', 'Casa', 111, '4-b1kvnNAW2S'),
(20, 4, '2019-08-11 22:58:39', 'Oficina', 222, '4-M5CDnLXocA'),
(22, 4, '2019-08-13 22:47:47', 'Campo', 44444, '4-vqEV4aN69k');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `devices_full`
--
CREATE TABLE `devices_full` (
`data_id` int(11)
,`data_date` timestamp
,`data_temp` float(4,2)
,`data_hum` int(3)
,`data_device_sn` varchar(10)
,`device_id` int(7) unsigned
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `fb_user` varchar(100) DEFAULT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_image` varchar(200) NOT NULL DEFAULT 'https://cdn1.iconfinder.com/data/icons/avatars-vol-2/140/_robocop-512.png',
  `user_selected_device` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `fb_user`, `user_date`, `user_name`, `user_email`, `user_password`, `user_image`, `user_selected_device`) VALUES
(4, NULL, '2019-07-29 21:46:21', 'IoTicos', 'somosioticos@gmail.com', '48058e0c99bf7d689ce71c360699a14ce2f99774', 'https://ioticosadmin.ml/images/imp.jpg', 19),
(14, NULL, '2019-08-12 23:55:37', 'schiale', 'santiagochiale@gmail.com', '95ed2506f93ce08fa4c8adfa146e8e08901f83be', 'https://cdn1.iconfinder.com/data/icons/avatars-vol-2/140/_robocop-512.png', NULL);

-- --------------------------------------------------------

--
-- Estructura para la vista `devices_full`
--
DROP TABLE IF EXISTS `devices_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_lte`@`localhost` SQL SECURITY DEFINER VIEW `devices_full`  AS  select `data`.`data_id` AS `data_id`,`data`.`data_date` AS `data_date`,`data`.`data_temp` AS `data_temp`,`data`.`data_hum` AS `data_hum`,`data`.`data_device_sn` AS `data_device_sn`,`devices`.`device_id` AS `device_id` from (`data` join `devices`) where (`devices`.`device_sn` = `data`.`data_device_sn`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
