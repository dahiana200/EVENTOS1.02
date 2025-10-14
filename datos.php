<?php
include("conexion.php");

$data = [
    "usuarios" => [],
    "citas" => [],
    "suscripciones" => []
];

// Obtener usuarios (ajustado a tu tabla real)
$queryUsuarios = "SELECT id_usuario, usuario, nombre, apellidos, perfil, estado FROM usuarios";
$resultUsuarios = mysqli_query($conexion, $queryUsuarios);
while ($row = mysqli_fetch_assoc($resultUsuarios)) {
    $data["usuarios"][] = $row;
}

// Obtener citas (AQUÍ agregamos el id_cita para que funcione editar/eliminar)
$queryCitas = "SELECT id_cita, nombre, telefono, fecha_cita, fecha_registro FROM citas";
$resultCitas = mysqli_query($conexion, $queryCitas);
while ($row = mysqli_fetch_assoc($resultCitas)) {
    $data["citas"][] = $row;
}

// Obtener suscripciones
$querySuscripciones = "SELECT id_suscripcion, correo, fecha_registro FROM suscripciones";
$resultSuscripciones = mysqli_query($conexion, $querySuscripciones);
while ($row = mysqli_fetch_assoc($resultSuscripciones)) {
    $data["suscripciones"][] = $row;
}

// Devolver datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
