-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 00:32:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gama`
--

INSERT INTO `gama` (`id_gama`, `name_gama`, `description_gama`) VALUES
(28, 'Gama baja', 'La gama baja o de entrada, como se suele nombrar, es donde se encuentran las computadoras con los requisitos mínimos modernos para considerarse gamers. Estas suelen incluir procesadores recientes como la serie 3000 de AMD o los i3 de novena generación de Intel, así como 8 gigabytes de memoria RAM.'),
(29, 'Gama media', 'La gama media es donde se ubican la gran mayoría de computadoras y componentes, debido a que su espectro de capacidades es muy amplio.'),
(32, 'Gama alta', 'Las computadoras de alta gama se destacan por tener procesadores más rápidos, pantallas con resolución alta y mayor rendimiento.'),
(39, 'Gama Gamer', 'Pc dedicadas a videjuegos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc`
--

CREATE TABLE `pc` (
  `id_pc` int(11) NOT NULL,
  `motherboard` varchar(40) NOT NULL,
  `processor` varchar(40) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `disco` varchar(400) NOT NULL,
  `video` varchar(40) NOT NULL,
  `description_pc` varchar(400) NOT NULL,
  `id_gama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pc`
--

INSERT INTO `pc` (`id_pc`, `motherboard`, `processor`, `RAM`, `disco`, `video`, `description_pc`, `id_gama`) VALUES
(51, 'AB-350M', 'Core i5-12400F', '16GB', 'SSD M.2 1TB', 'NVIDIA® Geforce RTX 3060Ti 8GB GDDR6', 'La PC Banghó Game Master 220T, fue creada para aportar mayor velocidad en el juego y portabilidad. Equipada con Procesador Intel Core i5 de 12va generación y placa gráfica NVIDIA Geforce RTX 3060Ti de 8GB.', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `user_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `user_password`) VALUES
(22, 'Profe', '$2y$10$3cIEk57f4ljDMi137d1njuH6VVThEXtCB4Vf7NQLQSajXMHmg48My');

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
  MODIFY `id_gama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `pc`
--
ALTER TABLE `pc`
  MODIFY `id_pc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
