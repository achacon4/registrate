-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-03-2017 a las 20:23:09
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `registrate`
--
CREATE DATABASE IF NOT EXISTS `registrate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `registrate`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarLugar`(
pnombre varchar(60))
BEGIN
SELECT * FROM Lugar WHERE nombre REGEXP pnombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPersona`(
pnumero VARCHAR(40))
BEGIN
SELECT * FROM DatosPersonales WHERE numeroDocumento REGEXP pnumero;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarRol`(
prol varchar(50))
BEGIN 
SELECT * FROM TipoUsuario WHERE rolUsuario REGEXP prol;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxEvento`(
pidEventoFK int(11))
BEGIN
SELECT idAsistenteEvento, idEventoFK, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, telefono FROM AsistenteEvento WHERE idEventoFK = pidEventoFK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxIdAsistencia`(
pidAsistenteFK int(11),
pidEventoFK int(11))
BEGIN
SELECT idAsistenciaEvento FROM AsistenciaEvento WHERE idAsistenteEventoFK = pidAsistenteFK AND idEventoFK = pidEventoFK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxIdAsistenteYIdEvento`(
pidAsistenteFK int(11),
pidEventoFK int(11))
BEGIN
SELECT tomarAsistencia FROM AsistenciaEvento WHERE idAsistenteEventoFK = pidAsistenteFK AND idEventoFK = pidEventoFK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxNombreEvento`(
pnombreEvento varchar(100))
BEGIN
SELECT * FROM evento WHERE nombreEvento REGEXP pnombreEvento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxNombrePersona`(
pnombre VARCHAR (40))
BEGIN 
SELECT * FROM DatosPersonales WHERE nombre REGEXP pnombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editarAsistencia`(

pidAsistencia int(11),
pasistencia varchar(20))
BEGIN
UPDATE AsistenciaEvento SET idAsistenciaEvento = pidAsistencia AND tomarAsistencia = pasistencia WHERE idAsistenciaEvento = pidAsistencia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_guardarAsistente`(
pidAsistencia int(11),
pidAsistenteFK int(11),
pidEventoFK int(11),
pAsistencia VARCHAR (20))
BEGIN
INSERT INTO AsistenciaEvento (idAsistenciaEvento, idAsistenteEventoFK, idEventoFK, tomarAsistencia) VALUES (pidAsistencia, pidAsistenteFK, pidEventoFK, pAsistencia);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarAsistente`(
pidAsistente int(11),
pidEventoFK int(11),
pnombre varchar(40),
papaterno varchar(30),
pamaterno varchar(30),
ptipoDocumento varchar(20),
pnumeroDocumento varchar(15),
pemail varchar(60),
ptelefono varchar(10))
BEGIN
INSERT INTO AsistenteEvento (idAsistente, idEventoFK, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, email, telefono) VALUES (pidAsistente, pidEventoFK, pnombre, papaterno, pamaterno, ptipoDocumento, pnumeroDocumento, pemail, ptelefono);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarDatosPersonales`(
pidDatosPersonales int(11),
pnombre varchar(40),
papaterno varchar(30),
pamaterno varchar(30),
ptipoDocumento varchar(20),
pnumeroDocumento varchar(15),
pemail varchar(60),
ptelefono varchar(15),
pestado varchar(10))
BEGIN
INSERT INTO DatosPersonales (idDatosPersonales, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, email, telefono, estado) VALUES (pidDatosPersonales, pnombre, papaterno, pamaterno, ptipoDocumento, pnumeroDocumento, pemail, ptelefono, pestado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarEvento`(
pidEvento int(11),

pidLugarFK int(11),
pidDatosPersonalesFK int(11),
pidCategoriaFK int(11),
pnombreEvento varchar(100),
pfechaInicial DATE,
pfechaFinal DATE,

phoraInicial TIME,
phoraFinal TIME,
pcantidadAsistentes int(11),
pdescripcionEvento varchar(300),
pestadoEvento varchar(15))
BEGIN
INSERT INTO Evento (idEvento, idLugarFK, idDatosPersonalesFK, idCategoriaFK, nombreEvento, fechaInicial, fechaFinal, horaInicial, horaFinal, cantidadAsistentes, descripcionEvento, estadoEvento) VALUES (pidEvento, pidLugarFK, pidDatosPersonalesFK, pidCategoriaFK, pnombreEvento, pfechaInicial, pfechaFinal, phoraInicial, phoraFinal, pcantidadAsistentes, pestadoEvento);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarRol`(
pidTipoUsuario int(11),
pidDatosPersonalesFK int(11),
prolUsuario varchar(20),
pnumeroFichaPrograma varchar(10),
pnombrePrograma varchar(60),
plineaInstructor varchar(50),
pnombreEmpresa varchar(50), 
pcargoFuncionario varchar(50),
potroRol varchar(50))
BEGIN
INSERT INTO TipoUsuario (idTipoUsuario, idDatosPersonalesFK, rolUsuario, numeroFichaPrograma, nombrePrograma, lineaInstructor, nombreEmpresa, cargoFuncionario, otroRol) VALUES (pidTipoUsuario, pidDatosPersonalesFK, prolUsuario, pnumeroFichaPrograma, pnombrePrograma, plineaInstructor, pnombreEmpresa, pcargoFuncionario, potroRol);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarUsuario`(
pidUsuario int(11),
pusuario varchar(15),
pcontraseña varchar(20),
pidDatosPersonalesFK int(11))
BEGIN
INSERT INTO Usuario (idUsuario, usuario, contraseña, idDatosPersonalesFK) VALUES (pidUsuario, pusuario, pcontraseña, pidDatosPersonalesFK);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `idDatosPersonalesFK` int(11) NOT NULL,
  `usuarioAdministrador` varchar(15) NOT NULL,
  `contraseñaAdministrador` varchar(20) NOT NULL,
  PRIMARY KEY (`idAdministrador`,`idDatosPersonalesFK`),
  KEY `fk_Administrador_DatosPersonales1_idx` (`idDatosPersonalesFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `idDatosPersonalesFK`, `usuarioAdministrador`, `contraseñaAdministrador`) VALUES
(2, 1, 'ADSI', '1116897');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciaevento`
--

CREATE TABLE IF NOT EXISTS `asistenciaevento` (
  `idAsistenciaEvento` int(11) NOT NULL AUTO_INCREMENT,
  `idAsistenteEventoFK` int(11) NOT NULL,
  `idEventoFK` int(11) NOT NULL,
  `tomarAsistencia` varchar(20) NOT NULL,
  PRIMARY KEY (`idAsistenciaEvento`,`idAsistenteEventoFK`,`idEventoFK`),
  KEY `fk_AsistenciaEvento_AsistenteEvento1_idx` (`idAsistenteEventoFK`,`idEventoFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenteevento`
--

CREATE TABLE IF NOT EXISTS `asistenteevento` (
  `idAsistenteEvento` int(11) NOT NULL,
  `idEventoFK` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apaterno` varchar(30) NOT NULL,
  `amaterno` varchar(30) NOT NULL,
  `tipoDocumento` varchar(20) NOT NULL,
  `numeroDocumento` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  PRIMARY KEY (`idAsistenteEvento`,`idEventoFK`),
  KEY `fk_AsistenteEvento_Evento1_idx` (`idEventoFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Bienestar Aprendices');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE IF NOT EXISTS `datospersonales` (
  `idDatosPersonales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apaterno` varchar(30) NOT NULL,
  `amaterno` varchar(30) NOT NULL,
  `tipoDocumento` varchar(20) NOT NULL,
  `numeroDocumento` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idDatosPersonales`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`idDatosPersonales`, `nombre`, `apaterno`, `amaterno`, `tipoDocumento`, `numeroDocumento`, `email`, `telefono`, `estado`) VALUES
(1, 'Angie Lorena', 'Galindo', 'Falla', 'T.I', '99110707939', 'angie@gmail.com', '8703557', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `idLugarFK` int(11) NOT NULL,
  `idDatosPersonalesFK` int(11) NOT NULL,
  `idCategoriaFK` int(11) NOT NULL,
  `nombreEvento` varchar(100) NOT NULL,
  `fechaInicial` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `horaInicial` time NOT NULL,
  `horaFinal` time NOT NULL,
  `cantidadAsistentes` int(11) NOT NULL,
  `descripcionEvento` varchar(300) NOT NULL,
  `estadoEvento` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idEvento`,`idLugarFK`,`idDatosPersonalesFK`,`idCategoriaFK`),
  KEY `fk_Evento_Lugar1_idx` (`idLugarFK`),
  KEY `fk_Evento_DatosPersonales1_idx` (`idDatosPersonalesFK`),
  KEY `fk_Evento_Categoria1_idx` (`idCategoriaFK`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `idLugarFK`, `idDatosPersonalesFK`, `idCategoriaFK`, `nombreEvento`, `fechaInicial`, `fechaFinal`, `horaInicial`, `horaFinal`, `cantidadAsistentes`, `descripcionEvento`, `estadoEvento`) VALUES
(1, 1, 1, 1, 'Encuentro Regional de Líderes', '2017-03-01', '2017-03-01', '08:00:00', '04:00:00', 100, 'Evento realizado por bienestar de aprendices', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `presupuesto` int(20) NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idLugar`, `nombre`, `disponibilidad`, `descripcion`, `presupuesto`, `cantidadPersonas`) VALUES
(1, 'Auditorio Sena Industrial', 0, 'Auditorio con aire acondicionado', 0, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idDatosPersonalesFK` int(11) NOT NULL,
  `rolUsuario` varchar(20) NOT NULL,
  `numeroFichaPrograma` varchar(10) DEFAULT NULL,
  `nombrePrograma` varchar(60) DEFAULT NULL,
  `lineaInstructor` varchar(50) DEFAULT NULL,
  `nombreEmpresa` varchar(50) DEFAULT NULL,
  `cargoFuncionario` varchar(50) DEFAULT NULL,
  `otroRol` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTipoUsuario`,`idDatosPersonalesFK`),
  KEY `fk_TipoUsuario_DatosPersonales1_idx` (`idDatosPersonalesFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idDatosPersonalesFK` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idDatosPersonalesFK`),
  KEY `fk_Usuario_DatosPersonales1_idx` (`idDatosPersonalesFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistenciaevento`
--
ALTER TABLE `asistenciaevento`
  ADD CONSTRAINT `fk_AsistenciaEvento_AsistenteEvento1` FOREIGN KEY (`idAsistenteEventoFK`, `idEventoFK`) REFERENCES `asistenteevento` (`idAsistenteEvento`, `idEventoFK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistenteevento`
--
ALTER TABLE `asistenteevento`
  ADD CONSTRAINT `fk_AsistenteEvento_Evento1` FOREIGN KEY (`idEventoFK`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_Lugar1` FOREIGN KEY (`idLugarFK`) REFERENCES `lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Evento_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Evento_Categoria1` FOREIGN KEY (`idCategoriaFK`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD CONSTRAINT `fk_TipoUsuario_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
