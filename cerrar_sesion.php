
<?php
  // Iniciar sesión
  session_start();

  if (!isset($_SESSION['usuarios'])){
  // Redireccionar al usuario a la página de inicio de sesión
  header("Location: index.html");
  exit;
  }
  //// Destruir la sesión
  //session_destroy();
  //header("cache-control: no-cache, no-store, must-revalidate");
  //header("pragma: no-cache");
  //header("expires: 0");
?>
