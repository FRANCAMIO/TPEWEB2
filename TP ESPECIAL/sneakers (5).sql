-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 18:29:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sneakers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `modelo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `modelo`) VALUES
(1, 'nike', 'JORDAN'),
(2, 'adidas', 'YEZZY'),
(3, 'puma', 'FENTY'),
(4, 'puma', 'PLAY-STATION'),
(5, 'puma', 'PUMA-180\r\n'),
(6, 'puma', 'PALERMO'),
(7, 'puma', 'RYDER'),
(8, 'puma', 'LIBERTY'),
(9, 'puma', 'A$AP ROCKY'),
(10, 'puma', 'CALI'),
(11, 'puma', 'TROLLS'),
(12, 'puma', 'P.A.M'),
(13, 'nike', 'DUNK'),
(14, 'nike', 'AIR MAX'),
(15, 'nike', 'AIR FORCE 1'),
(16, 'nike', 'SB'),
(17, 'nike', 'LEBRON'),
(18, 'nike', 'CORTEZ'),
(19, 'nike', 'AIR JORDAN 2'),
(20, 'nike', 'VAPOR MAX'),
(21, 'adidas', 'FORUM'),
(22, 'adidas', 'ORIGINALS'),
(23, 'adidas', 'GAZELLE'),
(24, 'adidas', 'SUPERNOVA'),
(25, 'adidas', 'TERRACE'),
(26, 'adidas', 'SUPERSTAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$4rQL3n0Pyf524RZtuafNvegioiLjKUHPH0FX7EsRy/8xlNvMgfKwG'),
(2, 'francisco', 'francisco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatillas`
--

CREATE TABLE `zapatillas` (
  `id_zapatilla` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `diseño` varchar(200) NOT NULL,
  `talle` int(200) NOT NULL,
  `material` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zapatillas`
--

INSERT INTO `zapatillas` (`id_zapatilla`, `id_marca`, `diseño`, `talle`, `material`) VALUES
(11, 10, 'deportivo', 42, 'cuero'),
(12, 12, 'urbano', 40, 'lona\r\n'),
(13, 13, 'urbano', 41, 'cuero\r\n'),
(14, 14, 'urbano', 40, 'cuero'),
(15, 15, 'urbano', 50, 'lona'),
(16, 16, 'urbano', 40, 'plastico-cuero'),
(17, 17, 'deportivo-urbano', 40, 'goretex\r\n'),
(18, 18, 'deportivo', 43, 'cuero'),
(19, 19, 'deportivo', 37, 'tela'),
(20, 20, 'urbano', 40, 'cuero'),
(22, 22, 'urbano', 42, 'lona'),
(23, 23, 'urbano', 39, 'cuero'),
(24, 24, 'deportivo', 41, 'lona');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD PRIMARY KEY (`id_zapatilla`),
  ADD KEY `id_marca` (`id_marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  MODIFY `id_zapatilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD CONSTRAINT `zapatillas_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
