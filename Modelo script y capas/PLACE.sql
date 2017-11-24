create database GUIDE_PLACES DEFAULT CHARACTER SET UTF8 COLLATE UTF8_UNICODE_CI;
USE GUIDE_PLACES;

CREATE TABLE USUARIOS(
id_usuario int not null auto_increment,
nombre_usuario varchar (30) not null,
apellido_usuario varchar (30) not null,
edad_usuario int (2) not null,
email_usuario varchar(60) not null,
PRIMARY KEY (id_usuario)
);

CREATE TABLE REGISTRO(
id_registro int not null auto_increment,
id_usuario int,
clave BLOB NULL,
PRIMARY KEY (id_registro)
);

CREATE TABLE LUGARES(
id_lugar int not null auto_increment,
nombre_lugar varchar (30) not null,
PRIMARY KEY (id_lugar)
);

CREATE TABLE PROVINCIAS(
id_provincia int not null auto_increment,
nombre_provincia varchar (30) not null,
PRIMARY KEY (id_provincia )
);

CREATE TABLE DETALLES(
id_detalle int not null auto_increment,
descripcion varchar (900) not null,
PRIMARY KEY (id_detalle )
);

CREATE TABLE INFORMACION_COMPLETA(
id_infcom int not null auto_increment,
id_lugar int not null,
id_provincia int not null,
id_detalle  int,
descripcion varchar (1000) not null,
PRIMARY KEY (id_infcom )
);

CREATE TABLE ADDINFO (
id_addinfo int not null auto_increment, 
id_infcom int,
id_lugar int,
id_provincia int,
id_detalle int,
PRIMARY KEY (id_addinfo )
);

ALTER TABLE REGISTRO
ADD CONSTRAINT R_1 
FOREIGN KEY (id_usuario) 
REFERENCES USUARIOS (id_usuario);

ALTER TABLE INFORMACION_COMPLETA
ADD CONSTRAINT R_2 
FOREIGN KEY (id_lugar) 
REFERENCES LUGARES (id_lugar);

ALTER TABLE INFORMACION_COMPLETA
ADD CONSTRAINT R_3
FOREIGN KEY (id_provincia) 
REFERENCES PROVINCIAS (id_provincia);

ALTER TABLE INFORMACION_COMPLETA
ADD CONSTRAINT R_4
FOREIGN KEY (id_detalle) 
REFERENCES DETALLES (id_detalle);

ALTER TABLE ADDINFO
ADD CONSTRAINT R_5
FOREIGN KEY (id_infcom) 
REFERENCES INFORMACION_COMPLETA (id_infcom);

ALTER TABLE ADDINFO
ADD CONSTRAINT R_6
FOREIGN KEY (id_lugar) 
REFERENCES LUGARES (id_lugar);

ALTER TABLE ADDINFO
ADD CONSTRAINT R_7
FOREIGN KEY (id_provincia) 
REFERENCES PROVINCIAS (id_provincia);

ALTER TABLE ADDINFO
ADD CONSTRAINT R_8
FOREIGN KEY (id_detalle) 
REFERENCES DETALLES (id_detalle);






