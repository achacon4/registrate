/*
SQLyog Community v12.2.2 (64 bit)
MySQL - 5.7.12-log : Database - registrate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`registrate` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `registrate`;

/*Table structure for table `administrador` */

DROP TABLE IF EXISTS `administrador`;

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `idDatosPersonalesFK` int(11) NOT NULL,
  `usuarioAdministrador` varchar(15) NOT NULL,
  `contraseñaAdministrador` varchar(20) NOT NULL,
  PRIMARY KEY (`idAdministrador`,`idDatosPersonalesFK`),
  KEY `fk_Administrador_DatosPersonales1_idx` (`idDatosPersonalesFK`),
  CONSTRAINT `fk_Administrador_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `administrador` */

insert  into `administrador`(`idAdministrador`,`idDatosPersonalesFK`,`usuarioAdministrador`,`contraseñaAdministrador`) values 
(2,1,'ADSI','1116897');

/*Table structure for table `asistenciaevento` */

DROP TABLE IF EXISTS `asistenciaevento`;

CREATE TABLE `asistenciaevento` (
  `idAsistenciaEvento` int(11) NOT NULL AUTO_INCREMENT,
  `idAsistenteEventoFK` int(11) NOT NULL,
  `idEventoFK` int(11) NOT NULL,
  `tomarAsistencia` varchar(20) NOT NULL,
  PRIMARY KEY (`idAsistenciaEvento`,`idAsistenteEventoFK`,`idEventoFK`),
  KEY `fk_AsistenciaEvento_AsistenteEvento1_idx` (`idAsistenteEventoFK`,`idEventoFK`),
  CONSTRAINT `fk_AsistenciaEvento_AsistenteEvento1` FOREIGN KEY (`idAsistenteEventoFK`, `idEventoFK`) REFERENCES `asistenteevento` (`idAsistenteEvento`, `idEventoFK`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asistenciaevento` */

/*Table structure for table `asistenteevento` */

DROP TABLE IF EXISTS `asistenteevento`;

CREATE TABLE `asistenteevento` (
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
  KEY `fk_AsistenteEvento_Evento1_idx` (`idEventoFK`),
  CONSTRAINT `fk_AsistenteEvento_Evento1` FOREIGN KEY (`idEventoFK`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asistenteevento` */

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

insert  into `categoria`(`idCategoria`,`nombreCategoria`) values 
(1,'Bienestar Aprendices');

/*Table structure for table `datospersonales` */

DROP TABLE IF EXISTS `datospersonales`;

CREATE TABLE `datospersonales` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `datospersonales` */

insert  into `datospersonales`(`idDatosPersonales`,`nombre`,`apaterno`,`amaterno`,`tipoDocumento`,`numeroDocumento`,`email`,`telefono`,`estado`) values 
(1,'Angie Lorena','Galindo','Falla','T.I','99110707939','angie@gmail.com','8703557','A');

/*Table structure for table `evento` */

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento` (
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
  KEY `fk_Evento_Categoria1_idx` (`idCategoriaFK`),
  CONSTRAINT `fk_Evento_Categoria1` FOREIGN KEY (`idCategoriaFK`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Lugar1` FOREIGN KEY (`idLugarFK`) REFERENCES `lugar` (`idLugar`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `evento` */

insert  into `evento`(`idEvento`,`idLugarFK`,`idDatosPersonalesFK`,`idCategoriaFK`,`nombreEvento`,`fechaInicial`,`fechaFinal`,`horaInicial`,`horaFinal`,`cantidadAsistentes`,`descripcionEvento`,`estadoEvento`) values 
(1,1,1,1,'Encuentro Regional de Líderes','2017-03-01','2017-03-01','08:00:00','04:00:00',100,'Evento realizado por bienestar de aprendices','A');

/*Table structure for table `lugar` */

DROP TABLE IF EXISTS `lugar`;

CREATE TABLE `lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `presupuesto` int(20) NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `lugar` */

insert  into `lugar`(`idLugar`,`nombre`,`disponibilidad`,`descripcion`,`presupuesto`,`cantidadPersonas`) values 
(1,'Auditorio Sena Industrial',DISPONIBLE,'Auditorio con aire acondicionado',0,100);

/*Table structure for table `tipousuario` */

DROP TABLE IF EXISTS `tipousuario`;

CREATE TABLE `tipousuario` (
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
  KEY `fk_TipoUsuario_DatosPersonales1_idx` (`idDatosPersonalesFK`),
  CONSTRAINT `fk_TipoUsuario_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipousuario` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idDatosPersonalesFK` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idUsuario`,`idDatosPersonalesFK`),
  KEY `fk_Usuario_DatosPersonales1_idx` (`idDatosPersonalesFK`),
  CONSTRAINT `fk_Usuario_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

/* Procedure structure for procedure `sp_buscarLugar` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarLugar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarLugar`(
pnombre varchar(60))
BEGIN
SELECT * FROM Lugar WHERE nombre REGEXP pnombre;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarPersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarPersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPersona`(
pnumero VARCHAR(40))
BEGIN
SELECT * FROM DatosPersonales WHERE numeroDocumento REGEXP pnumero;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarRol` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarRol` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarRol`(
prol varchar(50))
BEGIN 
SELECT * FROM TipoUsuario WHERE rolUsuario REGEXP prol;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxEvento`(
pidEventoFK int(11))
BEGIN
SELECT idAsistenteEvento, idEventoFK, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, telefono FROM AsistenteEvento WHERE idEventoFK = pidEventoFK;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxIdAsistencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxIdAsistencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxIdAsistencia`(
pidAsistenteFK int(11),
pidEventoFK int(11))
BEGIN
SELECT idAsistenciaEvento FROM AsistenciaEvento WHERE idAsistenteEventoFK = pidAsistenteFK AND idEventoFK = pidEventoFK;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxIdAsistenteYIdEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxIdAsistenteYIdEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxIdAsistenteYIdEvento`(
pidAsistenteFK int(11),
pidEventoFK int(11))
BEGIN
SELECT tomarAsistencia FROM AsistenciaEvento WHERE idAsistenteEventoFK = pidAsistenteFK AND idEventoFK = pidEventoFK;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxNombreEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxNombreEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxNombreEvento`(
pnombreEvento varchar(100))
BEGIN
SELECT * FROM evento WHERE nombreEvento REGEXP pnombreEvento;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxNombrePersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxNombrePersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxNombrePersona`(
pnombre VARCHAR (40))
BEGIN 
SELECT * FROM DatosPersonales WHERE nombre REGEXP pnombre;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_editarAsistencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_editarAsistencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editarAsistencia`(
pidAsistencia int(11),
pasistencia varchar(20))
BEGIN
UPDATE AsistenciaEvento SET idAsistenciaEvento = pidAsistencia AND tomarAsistencia = pasistencia WHERE idAsistenciaEvento = pidAsistencia;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_guardarAsistente` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_guardarAsistente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_guardarAsistente`(
pidAsistencia int(11),
pidAsistenteFK int(11),
pidEventoFK int(11),
pAsistencia VARCHAR (20))
BEGIN
INSERT INTO AsistenciaEvento (idAsistenciaEvento, idAsistenteEventoFK, idEventoFK, tomarAsistencia) VALUES (pidAsistencia, pidAsistenteFK, pidEventoFK, pAsistencia);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarAsistente` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarAsistente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarAsistente`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarDatosPersonales` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarDatosPersonales` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarDatosPersonales`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarEvento`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarRol` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarRol` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarRol`(
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
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarUsuario`(
pidUsuario int(11),
pusuario varchar(15),
pcontraseña varchar(20),
pidDatosPersonalesFK int(11))
BEGIN
INSERT INTO Usuario (idUsuario, usuario, contraseña, idDatosPersonalesFK) VALUES (pidUsuario, pusuario, pcontraseña, pidDatosPersonalesFK);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
