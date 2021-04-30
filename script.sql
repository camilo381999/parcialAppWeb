-- -----------------------------------------------------
-- Base de datos
-- -----------------------------------------------------
CREATE DATABASE carritoCompras CHARACTER SET utf8;


-- -----------------------------------------------------
-- Table USUARIOS
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `USUARIOS` 
(
  `ID_USUARIO` INT(15) NOT NULL PRIMARY KEY,
  `NOMBRE` VARCHAR(60) NOT NULL,
  `PASSWORD` VARCHAR(255) NOT NULL,
  `CORREO` VARCHAR(45) NOT NULL
);

-- -----------------------------------------------------
-- Table CARRITO
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `CARRITO` 
(
  `ID_CARRITO` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `USUARIOS_ID_USUARIO` INT(15) NOT NULL,
  `ID_PRODUCTO` INT(15) NOT NULL,
  `PRODUCTO` VARCHAR(255) NOT NULL,
  `COSTO` VARCHAR(60) NOT NULL,
  `ID_FACTURA` INT(15) NOT NULL,
  `FECHA` DATE NOT NULL
);