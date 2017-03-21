/*
SQLyog Community v12.4.0 (32 bit)
MySQL - 5.7.17-log : Database - registrate
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `administrador` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `asistenciaevento` */

insert  into `asistenciaevento`(`idAsistenciaEvento`,`idAsistenteEventoFK`,`idEventoFK`,`tomarAsistencia`) values 
(0,1,1,'Asistió'),
(0,2,1,'Asistió'),
(0,3,1,'No asistió'),
(0,4,1,'Asistió'),
(0,5,1,'No asistió'),
(6,6,1,'No asistió');

/*Table structure for table `asistenteevento` */

DROP TABLE IF EXISTS `asistenteevento`;

CREATE TABLE `asistenteevento` (
  `idAsistenteEvento` int(11) NOT NULL AUTO_INCREMENT,
  `idEventoFK` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apaterno` varchar(30) NOT NULL,
  `amaterno` varchar(30) NOT NULL,
  `tipoDocumento` varchar(20) NOT NULL,
  `numeroDocumento` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'SIN CONFIRMAR',
  PRIMARY KEY (`idAsistenteEvento`,`idEventoFK`),
  KEY `fk_AsistenteEvento_Evento1_idx` (`idEventoFK`),
  CONSTRAINT `fk_AsistenteEvento_Evento1` FOREIGN KEY (`idEventoFK`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `asistenteevento` */

insert  into `asistenteevento`(`idAsistenteEvento`,`idEventoFK`,`nombre`,`apaterno`,`amaterno`,`tipoDocumento`,`numeroDocumento`,`email`,`telefono`,`estado`) values 
(1,1,'Lorena','Galindo','Falla','T.I','99110707939','lorena12@gmail.com','8703557','SIN CONFIRMAR'),
(2,1,'Juan Esteban','Betancourt','Galindo','T.I','4567890','juan@hotmail.com','8704369','CANCELADO'),
(3,1,'Gina Marcela','Galindo','Rivas','C.C','55239653','marcela@outlook.cl','8704523','CONFIRMADO'),
(4,1,'Andrés Felipe','Galindo','Falla','T.I','226714509','andresf@gmail.com','8702638','SIN CONFIRMAR'),
(5,1,'Fernando','Galindo','Falla','C.C','7700045','fernandog@hotmail.com','8703487','SIN CONFIRMAR'),
(6,1,'Josep','Betancourt','Alchila','C.C','5432764','josepb@hotmail.com','8645321','SIN CONFIRMAR');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

insert  into `categoria`(`idCategoria`,`nombreCategoria`) values 
(1,'Bienestar');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `datospersonales` */

insert  into `datospersonales`(`idDatosPersonales`,`nombre`,`apaterno`,`amaterno`,`tipoDocumento`,`numeroDocumento`,`email`,`telefono`,`estado`) values 
(1,'Angie','Galindo','Falla','T.I','99110707939','asf','7890','I'),
(2,'Edna Toledo','Toledo','Chavarro','C.C','1075313828','jh','3228195572','A');

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
(1,1,1,1,'Encuentro Regional de Líderes','2017-03-20','2017-03-20','08:00:00','02:00:00',100,'asdf','A');

/*Table structure for table `lugar` */

DROP TABLE IF EXISTS `lugar`;

CREATE TABLE `lugar` (
  `idLugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `disponibilidad` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `presupuesto` int(20) NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `lugar` */

insert  into `lugar`(`idLugar`,`nombre`,`disponibilidad`,`descripcion`,`presupuesto`,`cantidadPersonas`) values 
(1,'Auditorio Sena','0','hghghg',600000,150);

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
  PRIMARY KEY (`idUsuario`,`idDatosPersonalesFK`),
  KEY `fk_Usuario_DatosPersonales1_idx` (`idDatosPersonalesFK`),
  CONSTRAINT `fk_Usuario_DatosPersonales1` FOREIGN KEY (`idDatosPersonalesFK`) REFERENCES `datospersonales` (`idDatosPersonales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

/* Procedure structure for procedure `sp_BuscarDatosPersonales` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_BuscarDatosPersonales` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarDatosPersonales`(
pnumero VARCHAR(40))
BEGIN
SELECT * FROM DatosPersonales WHERE numeroDocumento REGEXP pnumero;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarLugar` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarLugar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarLugar`(
pnombre VARCHAR(40))
BEGIN 
SELECT * FROM Lugar WHERE nombre REGEXP pnombre;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarTipoUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarTipoUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarTipoUsuario`(
prolUsuario VARCHAR(40))
BEGIN
SELECT * FROM TipoUsuario WHERE rolUsuario REGEXP prolUsuario;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxDocumentoA` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxDocumentoA` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxDocumentoA`(
pdocumento varchar(15))
BEGIN
SELECT * FROM datospersonales WHERE numeroDocumento REGEXP pdocumento AND estado='A';
end */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxDocumentoI` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxDocumentoI` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxDocumentoI`(
pdocumento varchar(15))
BEGIN
SELECT * FROM datospersonales WHERE numeroDocumento REGEXP pdocumento AND estado='I';
end */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxEvento`(
pidEventoFK INT(11))
BEGIN
SELECT idAsistenteEvento, idEventoFK, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, telefono FROM AsistenteEvento WHERE idEventoFK = pidEventoFK;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxIdAsistencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxIdAsistencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxIdAsistencia`(
pidAsistenteEventoFK INT(11),
pidEventoFK INT(11))
BEGIN
SELECT idAsistenciaEvento FROM AsistenciaEvento WHERE idAsistenteEventoFK = pidAsistenteEventoFK AND idEventoFK = pidEventoFK;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxIdAsistenteYIdEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxIdAsistenteYIdEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxIdAsistenteYIdEvento`(
pidAsistenteEventoFK INT (11),
pidEventoFK INT (11))
BEGIN
SELECT tomarAsistencia FROM AsistenciaEvento WHERE idAsistenteEventoFK = pidAsistenteEventoFK AND idEventoFK = pidEventoFK;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buscarxNombreEvento` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buscarxNombreEvento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarxNombreEvento`(
pnombreEvento VARCHAR(100))
BEGIN
SELECT * FROM Evento WHERE nombreEvento REGEXP pnombreEvento;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_busquedaH` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_busquedaH` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busquedaH`()
BEGIN
SELECT * FROM  datospersonales  WHERE  estado = 'A';
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_busquedaI` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_busquedaI` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_busquedaI`()
BEGIN
SELECT * FROM  datospersonales  WHERE  estado= 'I';
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_editarAsistencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_editarAsistencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editarAsistencia`(
pidAsistencia INT (11),
pAsistencia VARCHAR (20))
BEGIN
UPDATE AsistenciaEvento SET idAsistenciaEvento = pidAsistencia AND tomarAsistencia = pAsistencia WHERE idAsistenciaEvento = pidAsistencia;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_guardarAsistencia` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_guardarAsistencia` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_guardarAsistencia`(
pidAsistencia INT(11),
pidAsistenteEventoFK INT(11),
pidEventoFK INT(11),
pAsistencia VARCHAR(10))
BEGIN
INSERT INTO AsistenciaEvento (idAsistenciaEvento, idAsistenteEventoFK, idEventoFK, tomarAsistencia) VALUES (pidAsistencia, pidAsistenteEventoFK, pidEventoFK, pAsistencia);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_habilitar` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_habilitar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_habilitar`(
pidDato int(11))
begin
Update datospersonales set estado='A' where idDatosPersonales =pidDato;
end */$$
DELIMITER ;

/* Procedure structure for procedure `sp_inhabilitar` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_inhabilitar` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inhabilitar`(
piddato int(11))
begin
Update datospersonales set estado='I' where idDatosPersonales =pidDato;
end */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarAsistente` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarAsistente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarAsistente`(
pidEventoFK INT(11),
pnombre VARCHAR(40),
papaterno VARCHAR(30),
pamaterno VARCHAR(30),
ptipoDocumento VARCHAR(20),
pnumeroDocumento VARCHAR(15),
pemail VARCHAR(60),
ptelefono VARCHAR(10))
BEGIN
INSERT INTO AsistenteEvento (idEventoFK, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, email, telefono) VALUES (pidEventoFK, pnombre, papaterno, pamaterno, ptipoDocumento, pnumeroDocumento, pemail, ptelefono);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarDatosPersonales` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarDatosPersonales` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarDatosPersonales`(
pidDatosPersonales INT(11),
pnombre VARCHAR(40),
papaterno VARCHAR(30),
pamaterno VARCHAR(30),
ptipoDocumento VARCHAR(20),
pnumeroDocumento VARCHAR(15),
pemail VARCHAR(40),
ptelefono VARCHAR(15),
pestado VARCHAR(10))
BEGIN
INSERT INTO DatosPersonales (idDatosPersonales, nombre, apaterno, amaterno, tipoDocumento, numeroDocumento, email, telefono, email, telefono, estado) VALUES (pidDatosPersonales, pnombre, papaterno, pamaterno, ptipoDocumento, pnumeroDocumento, pemail, ptelefono, pestado);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarTipoUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarTipoUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarTipoUsuario`(
pidTipoUsuario INT(11),
pidDatosPersonalesFK INT(11),
prolUsuario VARCHAR(20), 
pnumeroFichaPrograma VARCHAR(10),
pnombrePrograma VARCHAR (50),
plineaInstructor VARCHAR(50),
pnombreEmpresa VARCHAR(50),
pcargoFuncionario VARCHAR(50),
potroRol VARCHAR(50))
BEGIN
INSERT INTO TipoUsuario (idTipoUsuario, idDatosPersonalesFK, rolUsuario, numeroFichaPrograma, nombrePrograma, lineaInstructor, nombreEmpresa, cargoFuncionario, otroRol) VALUES (pidTipoUsuario, pidDatosPersonalesFK, prolUsuario, pnumeroFichaPrograma, pnombrePrograma, plineaInstructor, pnombreEmpresa, pcargoFuncionario, potroRol);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_insertarUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertarUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarUsuario`(
pidUsuario INT(11),
pusuario VARCHAR(30),
pcontraseña VARCHAR(30),
pidDatosPersonalesFK INT(11))
BEGIN
INSERT INTO Usuario (idUsuario, usuario, contraseña, idDatosPersonalesFK) VALUES (pidUsuario, pusuario, pcontraseña, pidDatosPersonalesFK);
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_update` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_update` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update`(
pid int (11),
pnombre varchar (40),
papaterno varchar (25),
pamaterno varchar (25),
ptipo varchar (10),
pdocumento varchar (15),
pemail varchar (40),
ptelefono varchar (15),
pestado varchar (15))
begin	
update datospersonales set idDatosPersonales =pid, nombre=pnombre, apaterno=papaterno, amaterno=pamaterno, tipoDocumento=ptipo, numeroDocumento=pdocumento, email=pemail, telefono=ptelefono, estado=pestado where idDatosPersonales =pid;
end */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
