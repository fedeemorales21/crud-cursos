-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2018 a las 00:28:34
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
(2, 'JS', 'fede moral', 'En este curso aprender&aacute;s a. Programar con JavaScript; Comprender la arquitectura b&aacute;sica de un programa. Trabajar con eventos. Armar funciones.', '2019-04-23'),
(3, 'CSS', 'fede moral', 'En este curso aprenderemos gratis a maquetar sitios Web con HTML5 y a brindar estilos con CSS. No necesitas conocimientos previos, pues empezaremos', '2019-04-25'),
(7, 'adccc', 'liz lisa', 'aaaaaaaaaaaaaaa', '2018-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_alumno`
--

CREATE TABLE `curso_alumno` (
  `curso_nro` int(11) NOT NULL,
  `alumno_nro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso_alumno`
--

INSERT INTO `curso_alumno` (`curso_nro`, `alumno_nro`) VALUES
(2, 8),
(3, 8),
(7, 8),
(2, 10),
(3, 10),
(2, 13),
(7, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `curso_cod` int(11) NOT NULL,
  `alumno_nro` int(11) NOT NULL,
  `preg_nro` int(11) NOT NULL,
  `rta` varchar(20) DEFAULT NULL,
  `observacion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`curso_cod`, `alumno_nro`, `preg_nro`, `rta`, `observacion`) VALUES
(2, 8, 3, '3', NULL),
(2, 8, 19, '3', NULL),
(2, 8, 20, NULL, 'qq'),
(2, 13, 3, '1', NULL),
(2, 13, 19, '5', NULL),
(2, 13, 20, NULL, 'eeeeeee'),
(3, 8, 5, '2', NULL),
(3, 8, 22, '3', NULL),
(7, 8, 23, '5', NULL),
(2, 10, 3, '5', NULL),
(2, 10, 19, '1', NULL),
(2, 10, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_obs`
--

CREATE TABLE `encuesta_obs` (
  `Id_observacion` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta_obs`
--

INSERT INTO `encuesta_obs` (`Id_observacion`, `observacion`) VALUES
(2, 'sad');

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
(6, 'liz', 'lisa', 111, 111, 'liz@hotmail.com', '$2y$10$za9LB9pHVdzOvJAokEAE7.ym08HZXpaM.x2jKWyVms6C2Ztfv.JrC', 'a'),
(8, 'Roberto', 'Lopez', 123, 123, 'yo@gmail.com', '$2y$10$dkZqH2bEQod2u1BpN1rtCeoHoxT/TiRr5uGdZCGW9InoYK4twhf5K', 'g'),
(10, 'fdfdsfsd', 'fsddsfsd', 1233, 44444444, 'ffff@hotmail.com', '$2y$10$uPMmratXRC8mAemUg/HeDOPpJLv1HfbpwdO/G0x0qDmWwr9/3686O', 'g'),
(13, 'rodolfo', 'depa', 123456789, 111111111, 'rododepa@hotmail.com', '$2y$10$Jr2nIVwXlsbUuvjJ5oV5LuR1h/2qPJqXwnvfTOfFMRMaUu/fIINwC', 'p'),
(15, 'Federico', 'Morales', 38231553, 2147483647, 'fedeemorales21@gmail.com', '$2y$10$ShgOBzlAtdmKToII3WOT5uYU.8fixSgNhtOH4vQfEqOcmPoF6Z.Au', 'a'),
(25, 'Atilio', 'Gonzalez', 38230962, 123456789, 'ati.gonzalez27@gmail.com', '$2y$10$1tEJsdvz9EY4C69cfYeR1OpG0sqSybldK9J0VqE9mB7fAzo.95oYG', 'g'),
(26, 'Usuario', 'Administrador', 12345678, 123456789, 'administrador@gmail.com', '$2y$10$h5BjYoSNF0iLgSkh0.g0A.1ZdSxnCtZu4ZGIRJ5Sp9JmSyU9g6s6C', 'a'),
(27, 'Usuario', 'Profesor', 12345678, 123456789, 'profesor@gmail.com', '$2y$10$XHH9oSoUlOaklGpx2u2YTeY9hNej/bzaJaw5KEInPEPVoslg1YnpO', 'p'),
(28, 'Usuario', 'Alumno', 12345678, 123456789, 'alumno@gmail.com', '$2y$10$lZuxG9c91AhN5g2YUF5MFeYnKSpveztt0RWpMTo1awJmF5j./upom', 'g');

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
(5, '¿que onda?', 'opciones', 3),
(19, 'aaaaaaaaaaaaaaa', 'opciones', 2),
(20, 'sdssd', 'texto', 2),
(22, 'sdadddsddddd', 'opciones', 3),
(23, 'asd', 'opciones', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE `tipo_pregunta` (
  `tipopreg_cod` int(11) NOT NULL,
  `tipopreg_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`tipopreg_cod`, `tipopreg_desc`) VALUES
(1, 'Excelente'),
(2, 'Muy bueno'),
(3, 'Bien'),
(4, 'Regular'),
(5, 'Malo');

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
  ADD KEY `preg_nro` (`preg_nro`);

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
  MODIFY `curso_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `encuesta_obs`
--
ALTER TABLE `encuesta_obs`
  MODIFY `Id_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `preg_nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  MODIFY `tipopreg_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
