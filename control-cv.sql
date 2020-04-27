-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2020 a las 11:37:56
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control-cv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `id_localizacion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `latitud` varchar(200) NOT NULL,
  `longitud` varchar(200) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`id_localizacion`, `id_persona`, `latitud`, `longitud`, `fecha`, `hora`) VALUES
(13, 4, 'null', 'null', '2020-04-17 04:00:00', '08:46:49'),
(14, 4, 'null', 'null', '2020-04-17 04:00:00', '08:47:18'),
(15, 3, 'null', 'null', '2020-04-17 04:00:00', '08:47:55'),
(16, 3, 'null', 'null', '2020-04-17 04:00:00', '08:48:04'),
(17, 3, 'null', 'null', '2020-04-17 04:00:00', '08:48:14'),
(18, 4, 'null', 'null', '2020-04-17 04:00:00', '09:09:50'),
(20, 4, 'null', 'null', '2020-04-20 04:00:00', '10:12:00'),
(21, 5, 'null', 'null', '2020-04-21 04:00:00', '12:19:03'),
(22, 5, 'GPS Desactivado', 'null', '2020-04-21 04:00:00', '12:24:22'),
(23, 4, '-12.312', '-32.4242', '2020-04-21 04:00:00', '01:09:10'),
(24, 5, '-17.972835', '-67.1143321', '2020-04-27 09:36:44', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ci` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `f_nac` date NOT NULL,
  `r_foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `ci`, `f_nac`, `r_foto`, `hash`) VALUES
(1, 'Cristofer Ramiro', 'Aguilar Mollo', '6787779', '1990-09-17', '', 'd07be9c72a43c6eba810f81aaef855c034709972e800a4c816d15e4a8538ae03'),
(2, 'Raul', 'Aguilar Mollo', '6843984', '1991-09-17', '', '00872c5091b72c1d5b6ea299597dd0c8e013bcec271b8a91f38b0f4f7466dbe4'),
(3, 'Abel', 'Calle Apaza', '7973289', '2000-05-04', '', '6e5946dd4a346d1660673c26d614d0f52b6818a6ca1bf4b6463cdde48018473a'),
(4, 'Arturo', 'Lopez Ali', '7973281', '2020-04-03', '', '146af5871aaeea77dbcb411494d673455f56b1673ab7298185560091c197c927'),
(5, 'Elvis Ramiro', 'Ali Quispe', '7878789', '2001-08-08', '20-04-2020-10-05-21-000000.png', 'b64d0e3f1daeba453dfd689e03f8d41f310831da4bc17d2df2a749bbeb6d9c83'),
(6, 'adimer', 'chambi', '7336199', '2020-01-01', '24-04-2020-03-21-03-000000.png', '01441fb427a5b1da7bfa420c0633e8353f92072260edf8fdfb33805465033912'),
(7, 'adimer', 'chambi', '7336199', '2020-04-02', '24-04-2020-10-32-05-000000.png', '175447c401c0ccce29096faf4c6341a472282d549b49b9b7a78086ab834aea1e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`id_localizacion`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  MODIFY `id_localizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
