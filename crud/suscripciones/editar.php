<?php
include("../../conexion.php");

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) die("ID inválido.");

// obtener suscripción actual
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
    $tipo         = $_POST['tipo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin    = !empty($_POST['fecha_fin']) ? $_POST['fecha_fin'] : NULL;
    $estado       = $_POST['estado'];

    $check = $conexion->prepare("SELECT usuario FROM usuarios WHERE id_usuario = ? LIMIT 1");
    $check->bind_param("i", $id_usuario);
    $check->execute();
    $resUser = $check->get_result();
    if ($resUser->num_rows === 0) {
        echo "<script>alert('Error: El usuario con ID $id_usuario no existe.'); window.history.back();</script>";
        exit;
    }
    $row = $resUser->fetch_assoc();
    $correo = $row['usuario']; // lo usamos como correo
    $check->close();

    $upd = $conexion->prepare("UPDATE suscripciones 
                               SET id_usuario=?, correo=?, tipo=?, fecha_inicio=?, fecha_fin=?, estado=? 
                               WHERE id_suscripcion=?");
    $upd->bind_param("isssssi", $id_usuario, $correo, $tipo, $fecha_inicio, $fecha_fin, $estado, $id);
    
    if ($upd->execute()) {
        $upd->close();
        echo "<script>
                alert('Suscripción actualizada correctamente');
                window.location.href = '../../administrador.php';
              </script>";
        exit;
    } else {
        echo "Error al actualizar: " . $conexion->error;
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
    <!-- Formulario apuntando al mismo archivo -->
    <form method="POST" action="">
        <label>ID Usuario</label>
        <input type="number" name="id_usuario" value="<?= htmlspecialchars($s['id_usuario']) ?>" required>

        <label>Tipo de Suscripción</label>
        <select name="tipo" required>
            <option value="un mes" <?= $s['tipo']=="un mes" ? "selected":"" ?>>Un mes</option>
            <option value="un trimestre" <?= $s['tipo']=="un trimestre" ? "selected":"" ?>>Un trimestre</option>
            <option value="un semestre" <?= $s['tipo']=="un semestre" ? "selected":"" ?>>Un semestre</option>
            <option value="un año" <?= $s['tipo']=="un año" ? "selected":"" ?>>Un año</option>
        </select>

        <label>Fecha Inicio</label>
        <input type="date" name="fecha_inicio" value="<?= htmlspecialchars($s['fecha_inicio']) ?>" required>

        <label>Fecha Fin</label>
        <input type="date" name="fecha_fin" value="<?= htmlspecialchars($s['fecha_fin']) ?>">

        <label>Estado</label>
        <select name="estado" required>
            <option value="activo" <?= $s['estado']=="activo" ? "selected":"" ?>>Activo</option>
            <option value="inactivo" <?= $s['estado']=="inactivo" ? "selected":"" ?>>Inactivo</option>
        </select>

        <button class="btn btn-primary" type="submit">Actualizar Suscripción</button>
    </form>

    <a class="btn-back" href="listar_suscripciones.php">← Volver a Suscripciones</a>
</div>
</body>
</html>
