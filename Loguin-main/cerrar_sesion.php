<?php
  // Iniciar sesión
  session_start();

  // Destruir la sesión
  session_destroy();

  // Redireccionar al usuario a la página de inicio de sesión
  header("Location: index.php");
?>