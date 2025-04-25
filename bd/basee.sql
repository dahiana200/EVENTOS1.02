CREATE DATABASE mi_base_datos;

USE mi_base_datos;

CREATE TABLE registros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    correo VARCHAR(100) UNIQUE,
    telefono VARCHAR(20),
    contraseña VARCHAR(255)
);

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    telefono VARCHAR(20),
    fecha DATE
);

CREATE TABLE suscripciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(100) UNIQUE
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) UNIQUE,
    clave VARCHAR(255),
    perfil ENUM('admin', 'user') DEFAULT 'user'
);
