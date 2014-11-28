-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2013 a las 01:32:00
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fundacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE IF NOT EXISTS `colegio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colegio` varchar(150) NOT NULL,
  `direccion` varchar(350) NOT NULL,
  `detalles` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colegio` (`colegio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla de Colegios de Miranda' AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`id`, `colegio`, `direccion`, `detalles`) VALUES
(1, 'ESCUELA BASICA SANTA CRUZ DEL ESTE', 'BARRIO SANTA CRUZ DEL ESTE PARTE DE ATRAS DEL CONCRESA', ''),
(2, 'UNIDAD EDUCATIVA SOROCAIMA', 'BARUTA, URBANIZACION CHARALLAVITO, CALLE ARAURE AL FINAL', ''),
(3, 'UNIDAD EDUCATIVA ESTADAL ADOLFO NAVAS CORONADO', 'CALLE LA PEDRERA, SECTOR EL RELLENO', ''),
(4, 'LICEO FRANCISCO ESPEJO', 'EL CAFETAL', ''),
(5, 'ESCUELA BOLIVARIANA EUTIMIO RIVAS', 'CALLE EL LIMON FRENTE ESTADIO DE BEISBOL EL CAFETAL AL LADO DEL COLEGIO ESPEJO', ''),
(6, 'UNIDAD ESCOLAR ESTADAL EVARISTO GONZÁLEZ', 'SECTOR ALTAGRACIA DE LA MONTAÑA', ''),
(8, 'UNIDAD EDUCATIVA NACIONAL SAN DIEGO DE ALCALA', 'AV PRINCIPAL SAN JOSE DE LOS ALTOS', ''),
(9, 'UNIDAD EDUCATIVA ESTADAL EL JARILLO(ESCUELA ESTADAL NÚMERO 57)', 'CALLE PINABETTI, SECTOR EL JARILLO CENTRO', ''),
(10, 'ESCUELA NACIONAL CLEMENTE URBANEJA', 'CALLE CEDEÑO BARRIO LA MATA LOS TEQUES', ''),
(11, 'ESCUELA TÉCNICA ROQUE PINTO', 'AV. BICENTANARIO, C/C PEDRO RUSO FERRA, FRENTE A ESTACIÓN DE MTRO LOS TEQUES, EL T', ''),
(12, 'UNIDAD EDUCATIVA BASICA GUAICAIPURO', 'BARRIO 23 DE ENERO ZONA A LOS TEQUES', ''),
(13, 'UNIDAD EDUCATIVA CECILIO ACOSTA 1', 'CALLE CAMACAGUA SECTOR LOS LAGOS', ''),
(14, 'UNIDAD EDUCATIVA ESTADAL JOSÉ ANTONIO RODRÍGUEZ LÓPEZ', 'CALLE ACUEDUCTO, N° 1, SECTOR EL BARBECHO', ''),
(15, 'UNIDAD EDUCATIVA ESTADAL JOSÉ MANUEL SISO MARTÍNEZ', 'CARRETERA VIEJA CARACAS-LOS TEQUES, SECTOR LAS LOMITAS', ''),
(16, 'UNIDAD EDUCATIVA ESTATAL EL NACIONAL', 'BARRIO EL NACIONAL.PARTE ALTA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre1` varchar(30) NOT NULL,
  `nombre2` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) NOT NULL,
  `nacionalidad` int(10) NOT NULL,
  `cedula` int(10) NOT NULL,
  `sexo` int(2) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `colegio` int(10) NOT NULL,
  `serial` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla de Estudiantes de Miranda' AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `nacionalidad`, `cedula`, `sexo`, `fecha_nacimiento`, `telefono`, `colegio`, `serial`) VALUES
(2, 'Pedro', 'José', 'Ilarreta', 'Heydras', 1, 16301894, 2, '1984-01-24', '2147483647', 5, 'AA45905890823'),
(4, 'Fanny', 'Alexandra', 'Mogollón', 'Rojas', 1, 19334181, 1, '1989-02-02', '04120147741', 11, 'RR1230938098124'),
(5, 'Perly', 'Johana', 'Ilarreta', 'Heydras', 1, 16341791, 1, '1981-06-20', '04245006791', 5, 'QS3249038490284'),
(6, 'Carlos', 'Alfredo', 'Ilarreta', 'Heydras', 1, 20911187, 2, '1991-08-08', '04262065540', 5, 'FF4343434324893'),
(8, 'Danny', 'Alexander', 'Corro', 'Rodriguez', 1, 17980432, 2, '2013-12-31', '04262065540', 11, ''),
(9, 'Peverly', 'Johanny', 'Ilarreta', 'Mendéz', 1, 17588631, 1, '1982-06-16', '04241009080', 5, 'AD45454354');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nacionalidad` varchar(1) NOT NULL,
  `detalles` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nacionalidad` (`nacionalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla especifica la nacionalidad' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id`, `nacionalidad`, `detalles`) VALUES
(1, 'V', 'Venezolana'),
(2, 'E', 'Extranjera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE IF NOT EXISTS `privilegio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `privilegio` varchar(20) NOT NULL,
  `detalles` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `privilegio` (`privilegio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla de Tipo de privilegio de usuario' AUTO_INCREMENT=778 ;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`id`, `privilegio`, `detalles`) VALUES
(1, 'Administrador', 'Posee todos los privilegios para todos los Módulos'),
(777, 'Administrador Master', 'Root con todos los privilegios no se borra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(10) NOT NULL,
  `detalles` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sexo` (`sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla especifica tipos de sexo' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `sexo`, `detalles`) VALUES
(1, 'Femenino', ''),
(2, 'Masculino', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `nombre1` varchar(30) NOT NULL,
  `nombre2` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) NOT NULL,
  `nacionalidad` int(10) NOT NULL,
  `cedula` int(10) NOT NULL,
  `privilegio` int(10) NOT NULL,
  `correo` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`,`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasenia`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `nacionalidad`, `cedula`, `privilegio`, `correo`) VALUES
(1, 'dilarreta', 'e10adc3949ba59abbe56e057f20f883e', 'Domingo', 'José', 'Ilarreta', 'Heydras', 1, 17588630, 1, 'akimxtreme.dj@gmail.com'),
(7, 'fmogollon', 'a04a923d5e00ffc173ddfa5ea571f491', 'Fanny', 'Alexandra', 'Mogollón', 'Rojas', 1, 19334181, 1, ''),
(8, 'mtotesautt', 'e2f2619119f2ac8de080e6ac0243a99b', 'Mayerlin', '', 'Totesautt', '', 1, 16713354, 1, ''),
(9, 'eilarreta', 'e10adc3949ba59abbe56e057f20f883e', 'Elisa', 'Natalia', 'Ilarreta', 'Mogollón', 1, 20911188, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
