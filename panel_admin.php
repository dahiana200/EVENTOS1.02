<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root"; // Cambia si usas otro usuario
$contrasena = ""; // Cambia si tienes contraseña
$base_de_datos = "crud";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de la tabla usuarios
$usuarios = [];
$result = $conn->query("SELECT nombre, apellidos, usuario AS correo, '' AS telefono, '' AS fecha_registro FROM usuarios");

while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

// Devolver solo la parte de usuarios en formato JSON
echo json_encode(["usuarios" => $usuarios]);

$conn->close();
?>
