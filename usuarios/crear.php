<?php
include("../c/conexion.php"); // conexión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="/EVENTOS/css/stilos.css"> <!-- Usa tu mismo estilo -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #d9ecf5; /* Fondo igual al administrador */
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
            color: #2c3e50; /* Azul oscuro elegante */
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #34495e; /* gris azulado más suave */
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
        input:focus, select:focus {
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
            background: #3498db; /* Azul más suave */
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
        <h2>Nuevo Usuario</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Usuario / Correo</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label>Clave</label>
                <input type="password" name="clave" required>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" name="apellidos" required>
            </div>
            <div class="form-group">
                <label>Perfil</label>
                <select name="perfil" required>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit" name="guardar" class="btn btn-primary">Guardar Usuario</button>
        </form>
        <a href="../vistas/administrador.php" class="btn-back">← Volver al Panel</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['guardar'])) {
    $usuario   = $_POST['usuario'];
    $clave     = $_POST['clave'];
    $nombre    = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $perfil    = $_POST['perfil'];
    $estado    = $_POST['estado'];

    // En producción usar password_hash()
    $sql = "INSERT INTO usuarios (usuario, clave, nombre, apellidos, perfil, estado)
            VALUES ('$usuario','$clave','$nombre','$apellidos','$perfil','$estado')";

    if ($conexion->query($sql)) {
        header("Location: ../vistas/administrador.php");
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

