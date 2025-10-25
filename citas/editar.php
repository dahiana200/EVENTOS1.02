<?php
include("../c/conexion.php");

// Obtener ID desde la URL
$id = intval($_GET['id'] ?? 0);
if ($id <= 0) die("ID inválido.");

// Buscar cita
$stmt = $conexion->prepare("SELECT * FROM citas WHERE id_cita = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$cita = $res->fetch_assoc();
$stmt->close();

if (!$cita) die("Cita no encontrada.");

// Procesar actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = intval($_POST['id_usuario']);
    $nombre     = $_POST['nombre'];
    $telefono   = $_POST['telefono'];
    $fecha_cita = $_POST['fecha_cita'];

    $upd = $conexion->prepare("UPDATE citas SET id_usuario=?, nombre=?, telefono=?, fecha_cita=? WHERE id_cita=?");
    $upd->bind_param("isssi", $id_usuario, $nombre, $telefono, $fecha_cita, $id);

    if ($upd->execute()) {
        $upd->close();
        header("Location: /EVENTOS/vistas/administrador.php");
        exit;
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Editar Cita</title>
<style>
    body { font-family: Arial, sans-serif; background:#d9ecf5; margin:0; padding:0; }
    .container { max-width:520px; margin:50px auto; background:#fff; padding:26px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.12); }
    h2 { text-align:center; color:#2c3e50; margin-bottom:18px; }
    label{display:block; margin:10px 0 6px; color:#444; font-weight:600;}
    input { width:100%; padding:10px; border:1px solid #bbb; border-radius:8px; background:#f8f9fa; }
    .btn { width:100%; padding:12px; border:none; border-radius:8px; cursor:pointer; font-weight:700; margin-top:16px;}
    .btn-primary { background:#3498db; color:#fff; }
    .btn-primary:hover { background:#2980b9; }
    .btn-back { display:block; text-align:center; margin-top:12px; color:#3498db; text-decoration:none; font-weight:700; }
</style>
</head>
<body>
<div class="container">
    <h2>Editar Cita</h2>
    <form method="POST">
        <label>ID Usuario</label>
        <input type="number" name="id_usuario" value="<?= htmlspecialchars($cita['id_usuario']) ?>" required>

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($cita['nombre']) ?>" required>

        <label>Teléfono</label>
        <input type="text" name="telefono" value="<?= htmlspecialchars($cita['telefono']) ?>" required>

        <label>Fecha de la cita</label>
        <input type="date" name="fecha_cita" value="<?= htmlspecialchars($cita['fecha_cita']) ?>" required>

        <button class="btn btn-primary" type="submit">Actualizar Cita</button>
    </form>

    <a class="btn-back" href="listar_citas.php">← Volver a Citas</a>
</div>
</body>
</html>
