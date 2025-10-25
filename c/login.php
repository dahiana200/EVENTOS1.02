<?php
//primero llamamos al archivo de conexion con la BD
require_once '../c/conexion.php';

if($_POST){
   // Normalizar email/usuario
   $usuario_raw = trim($_POST['usuario'] ?? '');
   $usuario = strtolower($usuario_raw);
   $clave = $_POST['clave'] ?? '';

   if ($usuario === '' || $clave === '') {
     echo "<script>alert('Ingresa usuario y contraseña.')</script>";
     echo "<script>window.location.href = '../vistas/index1.html';</script>";
     exit;
   }

   // buscar usuario por correo
   $stmt = $conexion->prepare("SELECT id_usuario, usuario, clave, perfil FROM usuarios WHERE usuario = ? LIMIT 1");
   if (!$stmt) {
     echo "<script>alert('Error interno.')</script>";
     exit;
   }
   $stmt->bind_param('s', $usuario);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($row = $result->fetch_assoc()){
     $id = $row['id_usuario'];
     $userOk = $row['usuario'];
     $claveOk = $row['clave'];
     $perfil = $row['perfil'];

     $passwordMatches = false;
     // Si la contraseña en BD es un hash (empieza con $2y$ o $2a$ o $argon2), usamos password_verify
     if (password_get_info($claveOk)['algo'] !== 0) {
       if (password_verify($clave, $claveOk)) $passwordMatches = true;
     } else {
       // Fallback: comparar texto plano (migración) - NO recomendado a largo plazo
       if ($clave === $claveOk) $passwordMatches = true;
     }

     if ($passwordMatches) {
       session_start();
       $_SESSION['logueado'] = $id;
       // redirigir según perfil
       if ($perfil === 'admi' || $perfil === 'admin'){
         header("Location: ../vistas/administrador.php");
         exit;
       }
       header("Location: ../vistas/index_usser.php");
       exit;
     }
   }

   // Si llega aquí: usuario/clave inválidos
   echo "<script>alert('Usuario y/o clave incorrectos.')</script>";
   echo "<script>window.location.href = '../vistas/index1.html';</script>";
   $stmt->close();
   $conexion->close();

}
?>

