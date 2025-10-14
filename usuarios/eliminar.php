<?php
include("../../conexion.php");

if (!isset($_GET['id'])) {
    die("Error: falta el ID.");
}

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id_usuario=$id";

if ($conexion->query($sql)) {
    header("Location: ../../vistas/administrador.php");
    exit();
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
