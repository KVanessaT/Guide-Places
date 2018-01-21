
CREATE TABLE  `Cargo` (
  `idCargo` INT NOT NULL,
  `Cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB;

CREATE TABLE `Usuarios` (
  `idUsuarios` INT NOT NULL,
  `Nombres` VARCHAR(45) NOT NULL,
  `Cedula` VARCHAR(10) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `idCargo` INT NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  INDEX `fk_Usuarios_Cargo_idx` (`idCargo` ASC),
  CONSTRAINT `fk_Usuarios_Cargo`
    FOREIGN KEY (`idCargo`)
    REFERENCES `GidePalces`.`Cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE `Provincia` (
  `idProvincia` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProvincia`))
ENGINE = InnoDB;

CREATE TABLE `Lugares` (
  `idLugares` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Descripcion` TEXT NOT NULL,
  `Ubicacion` TEXT NOT NULL,
  `idProvincia` INT NOT NULL,
  PRIMARY KEY (`idLugares`),
  INDEX `fk_Lugares_Provincia1_idx` (`idProvincia` ASC),
  CONSTRAINT `fk_Lugares_Provincia1`
    FOREIGN KEY (`idProvincia`)
    REFERENCES `GidePalces`.`Provincia` (`idProvincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

