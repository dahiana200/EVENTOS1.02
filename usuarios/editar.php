<?php
include("../../conexion.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID no proporcionado.");
}

// Obtener datos del usuario
$sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
$result = $conexion->query($sql);
$usuario = $result->fetch_assoc();

if (!$usuario) {
    die("Usuario no encontrado.");
}

// Actualizar usuario
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $perfil = $_POST['perfil'];
    $estado = $_POST['estado'];

    $update = "UPDATE usuarios 
               SET nombre='$nombre', apellidos='$apellidos', perfil='$perfil', estado='$estado'
               WHERE id_usuario=$id";

    if ($conexion->query($update)) {
        header("../vistas/administrador.php");
        exit;
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d6ecfa; /* azul claro del admin */
            margin: 0;
            padding: 0;
        }
        .container {
            background: #ffffff;
            max-width: 500px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #4682B4; /* azul más claro y suave */
        }
        label {
            display: block;
            margin: 12px 0 5px;
            font-weight: bold;
            color: #555; /* gris azulado, no tan oscuro */
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #4682B4; /* azul medio */
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #5a9bd6; /* azul más claro en hover */
        }
        .volver {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #4682B4; /* mismo azul medio */
            text-decoration: none;
            font-weight: bold;
        }
        .volver:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <form method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>

            <label>Apellidos</label>
            <input type="text" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>

            <label>Perfil</label>
            <input type="text" name="perfil" value="<?php echo $usuario['perfil']; ?>" required>

            <label>Estado</label>
            <select name="estado">
                <option value="activo" <?php if($usuario['estado']=="activo") echo "selected"; ?>>Activo</option>
                <option value="inactivo" <?php if($usuario['estado']=="inactivo") echo "selected"; ?>>Inactivo</option>
            </select>

            <button type="submit" name="actualizar">Actualizar</button>
        </form>
        <a href="../vistas/administrador.php" class="volver">← Volver</a>
    </div>
</body>
</html>