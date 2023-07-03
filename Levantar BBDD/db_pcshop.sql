-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2023 a las 01:33:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pcshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gama`
--

CREATE TABLE `gama` (
  `id_gama` int(11) NOT NULL,
  `name_gama` varchar(40) NOT NULL,
  `description_gama` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gama`
--

INSERT INTO `gama` (`id_gama`, `name_gama`, `description_gama`) VALUES
(28, 'Gama baja', 'La gama baja o de entrada, como se suele nombrar, es donde se encuentran las computadoras con los requisitos mínimos modernos para considerarse gamers. Estas suelen incluir procesadores recientes como la serie 3000 de AMD o los i3 de novena generación de Intel, así como 8 gigabytes de memoria RAM.'),
(29, 'Gama media', 'La gama media es donde se ubican la gran mayoría de computadoras y componentes, debido a que su espectro de capacidades es muy amplio.'),
(32, 'Gama alta', 'Las computadoras de alta gama se destacan por tener procesadores más rápidos, pantallas con resolución alta y mayor rendimiento.'),
(39, 'Gamer', 'gama para pc de jugadores'),
(40, '4124321', '12414');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc`
--

CREATE TABLE `pc` (
  `id_pc` int(11) NOT NULL,
  `motherboard` varchar(40) NOT NULL,
  `processor` varchar(40) NOT NULL,
  `disco` varchar(400) NOT NULL,
  `video` varchar(40) NOT NULL,
  `description_pc` varchar(400) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `id_gama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pc`
--

INSERT INTO `pc` (`id_pc`, `motherboard`, `processor`, `disco`, `video`, `description_pc`, `RAM`, `id_gama`) VALUES
(46, 'pc lili', '123123', '12313', '3123', '111', '13123', 29),
(48, '2', '222222222222222', '333333333333', '4444444444444', 'asdasdasd', 'asdasda', 28),
(49, '4', '111111111111', '666666666666', '4444444444444', 'asdasdasd', 'asdasda', 28),
(57, '3', '111', 'AFGADFG', 'pc modificada', 'pc modificada', 'pc', 28),
(58, '5', '111', 'AFGADFG', 'pc modificada', 'pc modificada', 'pc', 28),
(59, '1', '111', '11', '11', '111', '1111', 39),
(60, '10', 'token', 'token', 'token', '111', '1111', 39),
(61, '1', '1', '1', '1', '1', '1', 39),
(62, 'ñkjdfn´gsjdn', '´ñiajsfbdpiag', 'ttt1', 'ttt1', '1', '1', 39),
(63, '555555', '5555', '5555', '5555', '55555', '5555', 28),
(64, 'pc nueva', '´pc nueva', 'pc nueva', 'ttt1', '1', '1', 39),
(65, 'modificada', '´modificada', 'pc nueva', 'ttt1', '1', '1', 39),
(66, 'cambios 3', 'cambios 3', 'cambios 3', 'cambios 3', 'cambios', 'cambios', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `token` text NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `user_password`, `token`, `time`) VALUES
(26, 'mati', '$2y$10$mfI9ju3bHyQZq1lh5OUm2OuLpUabs133Z0OUIFEUb1IMQ8ZCB5euy', 'e197e42ac1871d4be9e85d159fbf7e8681f40b3d0e97ca933949735112682258', 1688425442);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gama`
--
ALTER TABLE `gama`
  ADD PRIMARY KEY (`id_gama`);

--
-- Indices de la tabla `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id_pc`),
  ADD KEY `id_gama` (`id_gama`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gama`
--
ALTER TABLE `gama`
  MODIFY `id_gama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `pc`
--
ALTER TABLE `pc`
  MODIFY `id_pc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `id_gama` FOREIGN KEY (`id_gama`) REFERENCES `gama` (`id_gama`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
