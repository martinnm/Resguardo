-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-03-2017 a las 21:24:03
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Resguardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEVICES`
--

CREATE TABLE `DEVICES` (
  `device_id` int(11) NOT NULL,
  `device_serialn` varchar(30) NOT NULL,
  `device_name` varchar(30) NOT NULL,
  `device_description` varchar(100) NOT NULL,
  `device_buydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `DEVICES`
--

INSERT INTO `DEVICES` (`device_id`, `device_serialn`, `device_name`, `device_description`, `device_buydate`) VALUES
(11, '2016', 'Macbook', 'Computadora', '2017-01-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TICKETS`
--

CREATE TABLE `TICKETS` (
  `ticket_id` int(11) NOT NULL,
  `ticket_date` datetime NOT NULL,
  `ticket_user` int(11) NOT NULL,
  `ticket_device` int(11) NOT NULL,
  `ticket_exitdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `TICKETS`
--

INSERT INTO `TICKETS` (`ticket_id`, `ticket_date`, `ticket_user`, `ticket_device`, `ticket_exitdate`) VALUES
(11, '2017-03-02 21:23:40', 1, 11, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` enum('ADMIN','NORMAL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'NORMAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DEVICES`
--
ALTER TABLE `DEVICES`
  ADD PRIMARY KEY (`device_id`);

--
-- Indices de la tabla `TICKETS`
--
ALTER TABLE `TICKETS`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `ticket_user` (`ticket_user`),
  ADD KEY `ticket_device` (`ticket_device`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `DEVICES`
--
ALTER TABLE `DEVICES`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `TICKETS`
--
ALTER TABLE `TICKETS`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `TICKETS`
--
ALTER TABLE `TICKETS`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`ticket_user`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`ticket_device`) REFERENCES `DEVICES` (`device_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
