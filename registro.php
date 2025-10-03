
<?php
require_once 'conexion.php';

if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $perfil = "2"; // usuario normal por defecto
    $estado = "activo";

    $consulta = "INSERT INTO usuarios 
    (usuario, clave, nombre, apellidos, perfil, estado) 
    VALUES ('$usuario', '$clave', '$nombre', '$apellidos', '$perfil', '$estado')";

    if ($conexion->query($consulta) === true) {
        echo "<script>alert('Registro exitoso.')</script>";
        echo "<script>window.location.href = 'index.php';</script>";   
    } else {
        echo "<script>alert('Error al registrar el usuario.')</script>";
        echo "Error de SQL: " . $conexion->error;
        echo "<script>window.location.href = 'index1.html';</script>";
    }
}
?>