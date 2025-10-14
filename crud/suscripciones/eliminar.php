<?php
include("../../conexion.php");

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("ID inválido.");
}

$check = $conexion->prepare("SELECT id_suscripcion FROM suscripciones WHERE id_suscripcion = ?");
$check->bind_param("i", $id);
$check->execute();
$res = $check->get_result();
if ($res->num_rows === 0) {
    echo "<script>alert('La suscripción no existe.'); window.location.href='listar_suscripciones.php';</script>";
    exit;
}
$check->close();

$stmt = $conexion->prepare("DELETE FROM suscripciones WHERE id_suscripcion = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $stmt->close();
    echo "<script>
            alert('Suscripción eliminada correctamente');
            window.location.href='listar_suscripciones.php';
          </script>";
    exit;
} else {
    echo "Error al eliminar: " . $conexion->error;
}
