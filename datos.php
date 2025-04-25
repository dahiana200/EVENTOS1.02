<?php
include("conexion.php");

$data = [
    "usuarios" => [],
    "citas" => [],
    "suscripciones" => []
];

// Obtener usuarios
$queryUsuarios = "SELECT nombre, apellidos, correo, telefono, fecha_registro FROM usuarios";
$resultUsuarios = mysqli_query($conn, $queryUsuarios);
while ($row = mysqli_fetch_assoc($resultUsuarios)) {
    $data["usuarios"][] = $row;
}

// Obtener citas (ejemplo)
$queryCitas = "SELECT nombre, telefono, fecha_cita, fecha_registro FROM citas";
$resultCitas = mysqli_query($conn, $queryCitas);
while ($row = mysqli_fetch_assoc($resultCitas)) {
    $data["citas"][] = $row;
}

// Obtener suscripciones (ejemplo)
$querySuscripciones = "SELECT correo, fecha_registro FROM suscripciones";
$resultSuscripciones = mysqli_query($conn, $querySuscripciones);
while ($row = mysqli_fetch_assoc($resultSuscripciones)) {
    $data["suscripciones"][] = $row;
}

// Devolver datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
