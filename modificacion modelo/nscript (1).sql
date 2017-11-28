create database GUIDEPLACES DEFAULT CHARACTER SET UTF8 COLLATE UTF8_UNICODE_CI;
USE GUIDEPLACES;

CREATE TABLE Usuarios(
idUsuario int not null auto_increment,
nombreUsuario varchar (30) not null,
apellidoUsuario varchar (30) not null,
edadUsuario int (2) not null,
emailUsuario varchar(60) not null,
PRIMARY KEY (idUsuario)
);

CREATE TABLE Registro(
idRegistro int not null auto_increment,
idUsuario int,
clave BLOB NULL,
PRIMARY KEY (idRegistro)
);

CREATE TABLE Lugares(
idLugar int not null auto_increment,
nombreLugar varchar (30) not null,
PRIMARY KEY (idLugar)
);

CREATE TABLE Provincia(
idProvincia int not null auto_increment,
nombreProvincia varchar (30) not null,
PRIMARY KEY (idProvincia )
);

CREATE TABLE Detalles(
idDetalle int not null auto_increment,
descripcion varchar (900) not null,
PRIMARY KEY (idDetalle )
);

CREATE TABLE InformacionCompleta(
idInfcom int not null auto_increment,
idLugar int not null,
idProvincia int not null,
idDetalle  int,
datosGoogle varchar (1000) not null,
PRIMARY KEY (idInfcom )
);

ALTER TABLE REGISTRO
ADD CONSTRAINT R_1 
FOREIGN KEY (idUsuario) 
REFERENCES USUARIOS (idUsuario);

ALTER TABLE InformacionCompleta
ADD CONSTRAINT R_2 
FOREIGN KEY (idLugar) 
REFERENCES LUGARES (idLugar);

ALTER TABLE InformacionCompleta
ADD CONSTRAINT R_3
FOREIGN KEY (idProvincia) 
REFERENCES PROVINCIAS (idProvincia);

ALTER TABLE InformacionCompleta
ADD CONSTRAINT R_4
FOREIGN KEY (idDetalle) 
REFERENCES DETALLES (idDetalle);
