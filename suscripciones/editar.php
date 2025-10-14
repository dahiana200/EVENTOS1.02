<?php
include("../../conexion.php");

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) die("ID inválido.");

// obtener suscripción
$stmt = $conexion->prepare("SELECT * FROM suscripciones WHERE id_suscripcion = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$s = $res->fetch_assoc();
$stmt->close();

if (!$s) die("Suscripción no encontrada.");

// actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario   = intval($_POST['id_usuario']);
    $plan         = $_POST['plan'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin    = $_POST['fecha_fin'];
    $estado       = $_POST['estado'];

    $upd = $conexion->prepare("UPDATE suscripciones SET id_usuario=?, plan=?, fecha_inicio=?, fecha_fin=?, estado=? WHERE id_suscripcion=?");
    $upd->bind_param("issssi", $id_usuario, $plan, $fecha_inicio, $fecha_fin, $estado, $id);
    if ($upd->execute()) {
        $upd->close();
        header("Location: listar_suscripciones.php");
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
<title>Editar Suscripción</title>
<style>
    body { font-family: Arial, sans-serif; background:#d9ecf5; margin:0; padding:0; }
    .container { max-width:520px; margin:50px auto; background:#fff; padding:26px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.12); }
    h2 { text-align:center; color:#2c3e50; margin-bottom:18px; }
    label{display:block; margin:10px 0 6px; color:#444; font-weight:600;}
    input, select { width:100%; padding:10px; border:1px solid #bbb; border-radius:8px; background:#f8f9fa; }
    .btn { width:100%; padding:12px; border:none; border-radius:8px; cursor:pointer; font-weight:700; margin-top:16px; }
    .btn-primary { background:#3498db; color:#fff; }
    .btn-primary:hover { background:#2980b9; }
    .btn-back { display:block; text-align:center; margin-top:12px; color:#3498db; text-decoration:none; font-weight:700; }
</style>
</head>
<body>
<div class="container">
    <h2>Editar Suscripción</h2>
    <form method="POST">
        <label>ID Usuario</label>
        <input type="number" name="id_usuario" value="<?= htmlspecialchars($s['id_usuario']) ?>" required>

        <label>Plan</label>
        <select name="plan">
            <option value="mensual" <?= $s['plan']=="mensual" ? "selected":"" ?>>Mensual</option>
            <option value="trimestral" <?= $s['plan']=="trimestral" ? "selected":"" ?>>Trimestral</option>
            <option value="anual" <?= $s['plan']=="anual" ? "selected":"" ?>>Anual</option>
        </select>

        <label>Fecha Inicio</label>
        <input type="date" name="fecha_inicio" value="<?= htmlspecialchars($s['fecha_inicio']) ?>" required>

        <label>Fecha Fin</label>
        <input type="date" name="fecha_fin" value="<?= htmlspecialchars($s['fecha_fin']) ?>" required>

        <label>Estado</label>
        <select name="estado">
            <option value="activa" <?= $s['estado']=="activa" ? "selected":"" ?>>Activa</option>
            <option value="inactiva" <?= $s['estado']=="inactiva" ? "selected":"" ?>>Inactiva</option>
        </select>

        <button class="btn btn-primary" type="submit">Actualizar Suscripción</button>
    </form>

    <a class="btn-back" href="listar_suscripciones.php">← Volver a Suscripciones</a>
</div>
</body>
</html>
    