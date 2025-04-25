<?php
require_once 'conexion.php';

if (isset($_POST['enviar'])) {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);
    $perfil = "usser";

    // Validación de campos
    $errores = [];
    if (empty($nombre)) {
        $errores[] = 'El nombre es obligatorio';
    }
    if (empty($apellidos)) {
        $errores[] = 'Los apellidos son obligatorios';
    }
    if (empty($usuario)) {
        $errores[] = 'El usuario es obligatorio';
    }
    if (empty($clave)) {
        $errores[] = 'La contraseña es obligatoria';
    }
    if (strlen($clave) < 8) {
        $errores[] = 'La contraseña debe tener al menos 8 caracteres';
    }

    if (!empty($errores)) {
        echo "<script>alert('" . implode('\n', $errores) . "')</script>";
        exit;
    }

    try {
        $consulta = $conexion->prepare("INSERT INTO usuarios VALUES ('', ?, ?, ?, ?, ?)");
        $consulta->bind_param("sssss", $nombre, $apellidos, $usuario, password_hash($clave, PASSWORD_BCRYPT), $perfil);
        $consulta->execute();

        echo "<script>alert('Registro exitoso.')</script>";
        header('Location: bienvenido_user.html');
        exit;
    } catch (Exception $e) {
        echo "<script>alert('Error al registrar el usuario: " . $e->getMessage() . "')</script>";
        header('Location: index1.html');
        exit;
    }
}
?>