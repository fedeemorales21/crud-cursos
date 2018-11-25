-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2018 a las 03:41:29
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
(2, 'JS', 'Federico Morales', 'En este curso aprenderás a. Programar con JavaScript; Comprender la arquitectura básica de un programa. Trabajar con eventos. Armar funciones.', '2019-05-01'),
(3, 'CSS', 'Federico Morales', 'En este curso aprenderemos gratis a maquetar sitios Web con HTML5 y a brindar estilos con CSS. No necesitas conocimientos previos, pues empezaremos', '2019-04-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_alumno`
--

CREATE TABLE `curso_alumno` (
  `curso_nro` int(11) NOT NULL,
  `alumno_nro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `curso_cod` int(11) NOT NULL,
  `alumno_nro` int(11) NOT NULL,
  `preg_nro` int(11) NOT NULL,
  `rta` varchar(20) NOT NULL,
  `Id_observacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_obs`
--

CREATE TABLE `encuesta_obs` (
  `Id_observacion` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(5, 'fede', 'moral', 123, 44444444, 'f@hotmail.com', '$2y$10$IXDAndz.QYpBIjrg2h9FDO.8d7/BVo9wWubVkW2XfkZXtnzLtcO.i', 'p'),
(6, 'liz', 'lisa', 111, 111, 'liz@hotmail.com', '$2y$10$za9LB9pHVdzOvJAokEAE7.ym08HZXpaM.x2jKWyVms6C2Ztfv.JrC', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `preg_nro` int(11) NOT NULL,
  `preg_desc` varchar(255) NOT NULL,
  `preg_tipo` enum('opciones','texto') NOT NULL,
  `curso_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`preg_nro`, `preg_desc`, `preg_tipo`, `curso_cod`) VALUES
(3, '¿mando cualquier cosa?', 'opciones', 2),
(4, '¿que onda?', 'opciones', 2),
(5, '¿que onda?', 'opciones', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE `tipo_pregunta` (
  `tipopreg_cod` int(11) NOT NULL,
  `tipopreg_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`curso_cod`);

--
-- Indices de la tabla `curso_alumno`
--
ALTER TABLE `curso_alumno`
  ADD KEY `curso_nro` (`curso_nro`),
  ADD KEY `alumno_nro` (`alumno_nro`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD KEY `curso_cod` (`curso_cod`),
  ADD KEY `preg_nro` (`preg_nro`),
  ADD KEY `encuesta_obs` (`Id_observacion`) USING BTREE;

--
-- Indices de la tabla `encuesta_obs`
--
ALTER TABLE `encuesta_obs`
  ADD PRIMARY KEY (`Id_observacion`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cod_persona`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`preg_nro`),
  ADD KEY `curso_cod` (`curso_cod`);

--
-- Indices de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  ADD PRIMARY KEY (`tipopreg_cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `curso_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `encuesta_obs`
--
ALTER TABLE `encuesta_obs`
  MODIFY `Id_observacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `preg_nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  MODIFY `tipopreg_cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso_alumno`
--
ALTER TABLE `curso_alumno`
  ADD CONSTRAINT `curso_alumno_ibfk_1` FOREIGN KEY (`curso_nro`) REFERENCES `cursos` (`curso_cod`),
  ADD CONSTRAINT `curso_alumno_ibfk_2` FOREIGN KEY (`alumno_nro`) REFERENCES `personas` (`cod_persona`);

--
-- Filtros para la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `FK_encuesta_obs` FOREIGN KEY (`Id_observacion`) REFERENCES `encuesta_obs` (`Id_observacion`),
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`curso_cod`) REFERENCES `cursos` (`curso_cod`),
  ADD CONSTRAINT `encuesta_ibfk_2` FOREIGN KEY (`preg_nro`) REFERENCES `preguntas` (`preg_nro`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`curso_cod`) REFERENCES `cursos` (`curso_cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
