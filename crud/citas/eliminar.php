<?php
include("../../c/conexion.php");

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("ID inválido.");
}

$stmt = $conexion->prepare("DELETE FROM citas WHERE id_cita = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    $stmt->close();
    header("Location: /EVENTOS/vistas/administrador.php");
    exit;
} else {
    echo "Error al eliminar: " . $conexion->error;
}
