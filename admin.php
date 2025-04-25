<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['perfil'] !== '1') {
    header("Location: index.html");
    exit();
}

require_once 'conexion.php';

if (isset($_POST['guardar_registro'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO registros (nombre, apellido, correo, telefono, contraseña) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $contraseña);

    if ($stmt->execute()) {
        echo "<script>alert('Registro guardado con éxito');</script>";
    } else {
        echo "<script>alert('Error al guardar el registro');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Registro</title>
</head>
<body>
    <h2>Agregar Registro</h2>
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Correo: <input type="email" name="correo" required><br>
        Teléfono: <input type="text" name="telefono" required><br>
        Contraseña: <input type="password" name="contraseña" required><br>
        <button type="submit" name="guardar_registro">Guardar</button>
    </form>
</body>
</html>
