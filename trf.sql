-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 18:48:07
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `curso_cod` int(11) NOT NULL,
  `curso_nombre` varchar(50) NOT NULL,
  `curso_profesor` varchar(50) NOT NULL,
  `curso_desc` varchar(255) NOT NULL,
  `curso_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`curso_cod`, `curso_nombre`, `curso_profesor`, `curso_desc`, `curso_fecha`) VALUES
(1, 'HTML', 'Apreneras a usar HTML', 'Keko', '2018-11-08'),
(2, 'JS', 'Federico Morales', 'En este curso aprenderás a. Programar con JavaScript; Comprender la arquitectura básica de un programa. Trabajar con eventos. Armar funciones.', '2019-05-01'),
(3, 'CSS', 'Federico Morales', 'En este curso aprenderemos gratis a maquetar sitios Web con HTML5 y a brindar estilos con CSS. No necesitas conocimientos previos, pues empezaremos', '2019-04-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `cod_persona` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT 'g'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`cod_persona`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `pass`, `tipo`) VALUES
(4, 'dddd', 'ddd', 222222, 22222, 'fedee_morales@hotmail.com', '$2y$10$rJFyoUKplRUMqUtLnxkA1.7PSBjR2MIht91mYpr8EpxVne2V4NLiK', 'g'),
(5, 'fede', 'moral', 123, 44444444, 'f@hotmail.com', '$2y$10$IXDAndz.QYpBIjrg2h9FDO.8d7/BVo9wWubVkW2XfkZXtnzLtcO.i', 'g');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`curso_cod`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cod_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `curso_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
