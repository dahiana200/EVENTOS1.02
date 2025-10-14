<?php
include("../../conexion.php");

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("ID inválido.");
}

$stmt = $conexion->prepare("DELETE FROM suscripciones WHERE id_suscripcion = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    $stmt->close();
    header("Location: listar_suscripciones.php");
    exit;
} else {
    echo "Error al eliminar: " . $conexion->error;
}
