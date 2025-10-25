<?php
require_once '../c/conexion.php';

if ($_POST) {
    $errores = [];

    // Normalizar y validar campos
    $nombre = trim($_POST['nombre'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    // usamos 'usuario' como campo de email en el formulario
    $usuario_raw = trim($_POST['usuario'] ?? '');
    $usuario = strtolower($usuario_raw);
    $clave_raw = $_POST['clave'] ?? '';

    if ($nombre === '') $errores[] = "El nombre es obligatorio.";
    if ($apellidos === '') $errores[] = "Los apellidos son obligatorios.";

    if ($usuario === '') {
        $errores[] = "El correo es obligatorio.";
    } else {
        // validar formato de email
        if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El correo no tiene un formato válido.";
        }
    }

    if (strlen($clave_raw) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
    }

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<script>alert('" . addslashes($error) . "');</script>";
        }
        echo "<script>window.location.href = 'index1.html';</script>";
        exit;
    }

    // Comprobar unicidad del correo con prepared statement
    $stmt = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE usuario = ? LIMIT 1");
    if (!$stmt) {
        echo "<script>alert('Error interno, intente más tarde.');</script>";
        exit;
    }
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.');</script>";
        echo "<script>window.location.href = '../vistas/index1.html';</script>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    // Hash de contraseña
    $clave_hash = password_hash($clave_raw, PASSWORD_DEFAULT);

    $perfil = "user";
    $estado = "activo";

    $insert = $conexion->prepare("INSERT INTO usuarios (usuario, clave, nombre, apellidos, perfil, estado) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$insert) {
        echo "<script>alert('Error interno al preparar la consulta.');</script>";
        exit;
    }
    $insert->bind_param('ssssss', $usuario, $clave_hash, $nombre, $apellidos, $perfil, $estado);
    if ($insert->execute()) {
        echo "<script>alert('Registro exitoso.');</script>";
        echo "<script>window.location.href = '../vistas/index1.html';</script>";
    } else {
        echo "<script>alert('Error al registrar el usuario.');</script>";
    }
    $insert->close();
    $conexion->close();
}
?>