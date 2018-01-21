
CREATE TABLE  `Cargo` (
  `idCargo` INT NOT NULL,
  `Cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB;

CREATE TABLE Usuarios (
    `idUsuarios` INT NOT NULL,
  `Nombres` VARCHAR(45) NOT NULL,
  `Cedula` VARCHAR(10) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `idCargo` INT NOT NULL,
    PRIMARY KEY ('idUsuarios'),
    CONSTRAINT FK_usercago FOREIGN KEY ('idCargo')
    REFERENCES 'Cargo'('idCargo')
);

 

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
  PRIMARY KEY ('idLugares'),
    CONSTRAINT 'FK_luarpro' FOREIGN KEY ('idProvincia')
    REFERENCES 'Provincia'('idProvincia'));


