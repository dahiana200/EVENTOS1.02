<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "loguin");

// Verificar si los datos ingresados por el usuario son correctos
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$query = "SELECT * FROM usuarios WHERE nombre='$usuario' AND clave='$contrasena'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) == 1) {
  // Iniciar sesión y redirigir al usuario a la página de perfil
  session_start();
  $_SESSION["usuario"] = $usuario;
  header("Location: perfil.php");
} else {
  // Mostrar mensaje de error si los datos son incorrectos
  echo "Nombre de usuario o contraseña incorrectos.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>