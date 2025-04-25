<?php
$servidor = "127.0.0.1";
$usuario_db = "root";
$clave_db = "";
$base_datos = "crud";

$conexion = new mysqli($servidor, $usuario_db, $clave_db, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
