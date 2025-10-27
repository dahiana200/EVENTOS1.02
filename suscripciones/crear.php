<?php
include("../c/conexion.php"); // conexión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Suscripción</title>
    <link rel="stylesheet" href="/EVENTOS/css/stilos.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #d9ecf5; 
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 50px auto;
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #34495e;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            background: #f8f9fa;
        }
        input:focus {
            border-color: #3498db;
            background: #ecf6fb;
        }
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-primary {
            background: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background: #2980b9;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        .btn-back:hover {
            color: #21618c;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nueva Suscripción</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>ID Usuario</label>
                <input type="number" name="id_usuario" required>
            </div>
            <div class="form-group">
                <label>Tipo de Suscripción</label>
                <input type="text" name="tipo" required>
            </div>
            <div class="form-group">
                <label>Fecha Inicio</label>
                <input type="date" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label>Fecha Fin</label>
                <input type="date" name="fecha_fin">
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit" name="guardar" class="btn btn-primary">Guardar Suscripción</button>
        </form>
        <a href="../../administrador.php" class="btn-back">← Volver al Panel</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['guardar'])) {
    $id_usuario  = $_POST['id_usuario'];
    $tipo        = $_POST['tipo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin    = $_POST['fecha_fin'] ?? null;
    $estado       = $_POST['estado'];

    $sql = "INSERT INTO suscripciones (id_usuario, tipo, fecha_inicio, fecha_fin, estado)
            VALUES ('$id_usuario','$tipo','$fecha_inicio','$fecha_fin','$estado')";

    if ($conexion->query($sql)) {
        header("Location: ../vistas/administrador.php"); // Redirige al panel
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
