-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2018 a las 15:48:29
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `literatura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(6) NOT NULL,
  `autor` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `aNacimiento` int(4) NOT NULL,
  `aFallecimiento` int(4) DEFAULT NULL,
  `lugarNac` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `vida` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `estilo` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `refEpoca` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `autor`, `aNacimiento`, `aFallecimiento`, `lugarNac`, `vida`, `estilo`, `refEpoca`) VALUES
(1, 'Jose Emilio Pacheco Berny', 1939, 2014, 'Ciudad de Mexico', 'Fue un escritor mexicano famoso principalmente por su poesía, aunque cultivo con éxito también la crónica, la novela, el cuento el ensayo y la traducción. ', 'Poesía, cuento, novela, ensayo ', 'Vivió durante el cambio del México revolucionario al moderno.'),
(2, 'Edgar Allan Poe', 1809, 1849, 'Boston, Estados Unidos ', 'Fue renovador de la novela gótica, recordado especialmente por sus cuentos de terror', 'Ficción de detectives, ficción gótica y romanticismo oscuro.', 'Durante su época predominaba el romanticismo oscuro, por lo que adopto ese movimiento.'),
(4, '                      Stephen   King   ', 1960, 2060, 'Estados Unidos', 'Es el escritor de diversos libros de terror', 'Loco', 'Moderna');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
