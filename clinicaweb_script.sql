-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-09-2019 a las 03:26:46
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idc` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(10) NOT NULL,
  `descripcion` varchar(210) NOT NULL,
  `recordatorios` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idc`, `idp`, `idd`, `fecha`, `hora`, `estado`, `descripcion`, `recordatorios`) VALUES
(1, 1, 1, '2019-06-12 00:00:00', '00:12:00', 'v', 'sdfsdf', 1),
(2, 1, 1, '2019-06-21 00:00:00', '01:00:00', 's', 'extracciones dentales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `idd` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `especialidad` varchar(30) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `email` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `lugar` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idp` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `escuela` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `estadocivil` varchar(10) NOT NULL,
  `fechan` date NOT NULL,
  `fechar` date NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `estatus` char(1) NOT NULL,
  `observ` varchar(150) NOT NULL,
  `keycode` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `cliente` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `num_pago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `cantidad` double NOT NULL,
  `deuda` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `Nombre` varchar(40) NOT NULL,
  `Encabezado` varchar(80) NOT NULL,
  `Imagen` varchar(250) NOT NULL,
  `Contenido` text NOT NULL,
  `Pie` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servidores`
--

CREATE TABLE `servidores` (
  `id` int(11) NOT NULL,
  `servidor` varchar(30) NOT NULL,
  `puerto` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpublico`
--

CREATE TABLE `tblpublico` (
  `nombre` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `fechan` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tomas`
--

CREATE TABLE `tomas` (
  `fol` int(11) NOT NULL,
  `fec` date NOT NULL,
  `nom` varchar(60) NOT NULL,
  `dir` varchar(80) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `ema` varchar(40) NOT NULL,
  `fen` date NOT NULL,
  `rem` varchar(50) NOT NULL,
  `emarem` varchar(40) NOT NULL,
  `telrem` varchar(12) NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `rol` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idc`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`idd`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
