/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 13.5 		*/
/*  Created On : 21-jul.-2021 08:19:19 p. m. 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */

SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `ARTICULO` CASCADE
;

DROP TABLE IF EXISTS `CATEGORIA` CASCADE
;

DROP TABLE IF EXISTS `CLIENTE` CASCADE
;

DROP TABLE IF EXISTS `DETALLEVENTA` CASCADE
;

DROP TABLE IF EXISTS `PROVEEDOR` CASCADE
;

DROP TABLE IF EXISTS `USUARIO` CASCADE
;

DROP TABLE IF EXISTS `VENTA` CASCADE
;

/* Create Tables */

CREATE TABLE `ARTICULO`
(
	`ART_ID` INT NOT NULL AUTO_INCREMENT,
	`ART_NOMBRE` VARCHAR(50) NULL,
	`ID_CATEGORIA` INT NULL,
	`ID_PROVEEDOR` INT NULL,
	`ART_PRECIO` INT NULL,
	`ART_STOCK` INT NULL,
	CONSTRAINT `PK_ARTICULO` PRIMARY KEY (`ART_ID` ASC)
)

;

CREATE TABLE `CATEGORIA`
(
	`CAT_ID` INT NOT NULL AUTO_INCREMENT,
	`CAT_NOMBRE` VARCHAR(50) NULL,
	CONSTRAINT `PK_CATEGORIA` PRIMARY KEY (`CAT_ID` ASC)
)

;

CREATE TABLE `CLIENTE`
(
	`CLI_ID` INT NOT NULL AUTO_INCREMENT,
	`CLI_NOMBRE` VARCHAR(50) NULL,
	`CLI_NIT` INT NULL,
	`CLI_TELEFONO` INT NULL,
	`CLI_CORREO` VARCHAR(50) NULL,
	CONSTRAINT `PK_CLIENTE` PRIMARY KEY (`CLI_ID` ASC)
)

;

CREATE TABLE `DETALLEVENTA`
(
	`DV_ID` INT NOT NULL AUTO_INCREMENT,
	`ID_ARTICULO` INT NOT NULL,
	`DV_CANTIDAD` INT NULL,
	`ID_VENTA` INT NOT NULL,
	`DV_SUBTOTAL` INT NULL,
	CONSTRAINT `PK_DETALLEVENTA` PRIMARY KEY (`DV_ID` ASC)
)

;

CREATE TABLE `PROVEEDOR`
(
	`PRO_ID` INT NOT NULL AUTO_INCREMENT,
	`PRO_NOMBRE` VARCHAR(50) NULL,
	`PRO_CORREO` VARCHAR(50) NULL,
	`PRO_TELEFONO` INT NULL,
	`PRO_CIUDAD` VARCHAR(50) NULL,
	`PRO_PAIS` VARCHAR(50) NULL,
	CONSTRAINT `PK_PROVEEDOR` PRIMARY KEY (`PRO_ID` ASC)
)

;

CREATE TABLE `USUARIO`
(
	`USR_ID` INT NOT NULL AUTO_INCREMENT,
	`USR_NOMBRES` VARCHAR(50) NULL,
	`USR_APELLIDOS` VARCHAR(50) NULL,
	`USR_TELEFONO` INT NULL,
	`USR_CORREO` VARCHAR(50) NULL,
	`USU_USER` VARCHAR(50) NULL,
	`USR_PASSWORD` VARCHAR(250) NULL,
	`USR_TIPO` VARCHAR(50) NULL,
	CONSTRAINT `PK_USUARIO` PRIMARY KEY (`USR_ID` ASC)
)

;

CREATE TABLE `VENTA`
(
	`VEN_ID` INT NOT NULL AUTO_INCREMENT,
	`VEN_FECHA` DATE NULL,
	`ID_USUARIO` INT NOT NULL,
	`ID_CLIENTE` INT NOT NULL,
	`VEN_TOTAL` INT NULL,
	CONSTRAINT `PK_VENTA` PRIMARY KEY (`VEN_ID` ASC)
)

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `ARTICULO` 
 ADD INDEX `IXFK_ARTICULO_CATEGORIA` (`ID_CATEGORIA` ASC)
;

ALTER TABLE `ARTICULO` 
 ADD INDEX `IXFK_ARTICULO_PROVEEDOR` (`ID_PROVEEDOR` ASC)
;

ALTER TABLE `DETALLEVENTA` 
 ADD INDEX `IXFK_DETALLEVENTA_ARTICULO` (`ID_ARTICULO` ASC)
;

ALTER TABLE `DETALLEVENTA` 
 ADD INDEX `IXFK_DETALLEVENTA_VENTA` (`ID_VENTA` ASC)
;

ALTER TABLE `VENTA` 
 ADD INDEX `IXFK_VENTA_CLIENTE` (`ID_CLIENTE` ASC)
;

ALTER TABLE `VENTA` 
 ADD INDEX `IXFK_VENTA_DETALLEVENTA` (`VEN_TOTAL` ASC)
;

ALTER TABLE `VENTA` 
 ADD INDEX `IXFK_VENTA_USUARIO` (`ID_USUARIO` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `ARTICULO` 
 ADD CONSTRAINT `FK_ARTICULO_CATEGORIA`
	FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `CATEGORIA` (`CAT_ID`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `ARTICULO` 
 ADD CONSTRAINT `FK_ARTICULO_PROVEEDOR`
	FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `PROVEEDOR` (`PRO_ID`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `DETALLEVENTA` 
 ADD CONSTRAINT `FK_DETALLEVENTA_ARTICULO`
	FOREIGN KEY (`ID_ARTICULO`) REFERENCES `ARTICULO` (`ART_ID`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `DETALLEVENTA` 
 ADD CONSTRAINT `FK_DETALLEVENTA_VENTA`
	FOREIGN KEY (`ID_VENTA`) REFERENCES `VENTA` (`VEN_ID`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `VENTA` 
 ADD CONSTRAINT `FK_VENTA_CLIENTE`
	FOREIGN KEY (`ID_CLIENTE`) REFERENCES `CLIENTE` (`CLI_ID`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `VENTA` 
 ADD CONSTRAINT `FK_VENTA_USUARIO`
	FOREIGN KEY (`ID_USUARIO`) REFERENCES `USUARIO` (`USR_ID`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1 
;