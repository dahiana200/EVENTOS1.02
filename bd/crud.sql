CREATE DATABASE crud;

USE crud;

CREATE TABLE usuarios(
id_usuario int(4) primary key auto_increment,
nombre varchar(60) not null,
apellidos varchar(70) not null,
usuario varchar(60) not null,
clave varchar(16) not null,
perfil int(1) not null
);

INSERT INTO usuarios VALUES ('1','pepe','perez','a@gmail.com','1234',1);
