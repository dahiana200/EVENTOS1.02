
<?php
require_once '../c/conexion.php';

if ($_POST) {
    $fecha = $_POST['fecha'];
    $nombre = $_POST['nombre'];
    $email= $_POST['email'];
    $mensaje = $_POST['mensaje'];
   // $perfil = "2"; // usuario normal por defecto
    //$estado = "activo";

    $consulta = "INSERT INTO citas 
    (fecha, nombre, email, mensaje,) 
    VALUES ('$fecha', '$nombre', '$email', '$mensaje')";

    if ($conexion->query($consulta) === true) {
        echo "<script>alert('cita agendada exitosmente.')</script>";
        echo "<script>window.location.href = 'index.html';</script>";   
    } else {
        echo "<script>alert('Error')</script>";
        echo "Error de SQL: " . $conexion->error;
        echo "<script>window.location.href = 'quienes somos.html';</script>";
    }
}
?>