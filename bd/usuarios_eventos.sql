
CREATE DATABASE crud;
USE crud;

CREATE TABLE usuarios(
id_usuario int(4) primary key auto_increment,
usuario varchar(60) not null,
clave varchar(16) not null,
nombre varchar(50) not null,
apellidos varchar(50) not null,
perfil varchar(10) not null,
estado varchar(10) null
);
insert into usuarios values
('1', 'dahi@gmail.com', '1234', 'dahiana', 'duarte', 'admin', 'activo');

