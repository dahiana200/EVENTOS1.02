<?php
require_once 'conexion.php';

if ($_POST) {
    $errores = [];

    // Validación de nombre
    $nombre = trim($_POST['nombre'] ?? '');
    if ($nombre === '') {
        $errores[] = "El nombre es obligatorio.";
    }

    // Validación de apellidos
    $apellidos = trim($_POST['apellidos'] ?? '');
    if ($apellidos === '') {
        $errores[] = "Los apellidos son obligatorios.";
    }

    // Validación de usuario (sin espacios)
    $usuario = trim($_POST['usuario'] ?? '');
    if ($usuario === '' || preg_match('/\s/', $usuario)) {
        $errores[] = "El usuario es obligatorio y no debe tener espacios.";
    }

    // Validación de clave (mínimo 6 caracteres)
    $clave_raw = $_POST['clave'] ?? '';
    if (strlen($clave_raw) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }
    $clave = password_hash($clave_raw, PASSWORD_DEFAULT);

    // Si hay errores, los mostramos y detenemos el registro
    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>window.location.href = 'index1.html';</script>";
        exit;
    }

    $perfil = "user"; // usuario normal por defecto
    $estado = "activo";

    $consulta = "INSERT INTO usuarios 
    (usuario, clave, nombre, apellidos, perfil, estado) 
    VALUES ('$usuario', '$clave', '$nombre', '$apellidos', '$perfil', '$estado')";

    if ($conexion->query($consulta) === true) {
        echo "<script>alert('Registro exitoso.')</script>";
        echo "<script>window.location.href = 'index_usser.php';</script>";   
    } else {
        echo "<script>alert('Error al registrar el usuario.')</script>";
        echo "Error de SQL: " . $conexion->error;
        echo "<script>window.location.href = 'index1.html';</script>";
    }
}
?>