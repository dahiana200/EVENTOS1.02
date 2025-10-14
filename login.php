<?php
//primero llamamos al archivo de conexion con la BD
require_once 'conexion.php';

if($_POST){
   $usuario= $_POST['usuario']; //campo del formulario
   $clave= $_POST['clave']; //campo del formulario
   $userOk=""; //campo de la tabla de la BD
   $claveOk=""; //campo de la tabla de la BD

   $consulta= "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave' ";
   if($resultado=$conexion->query($consulta)){ 
      while($row= $resultado->fetch_array()){
           $userOk=$row["usuario"];
           $claveOk=$row["clave"];
           $id=$row["id_usuario"];
           $perfil=$row["perfil"]; //son los datos de la BD           
      }
         $resultado->close(); //cerramos la consulta
      
    //si todo va bien y encontró el registro en la BD  
      if($usuario == $userOk && $clave == $claveOk){
        session_start();
        $_SESSION['logueado']= $id;
        //verificamos el perfil a donde va ingresar
        if($perfil=="admi"){        
            header("Location: administrador.php");          
            $conexion->close();
        }
        if($perfil=="user"){
            header("Location: index_usser.php");
            $conexion->close();
        }        
      }else{
    //Que pasa si el usuario y la clave estan incorrectos
    echo "<script>alert('Usuario y/o clave incorrectos.')</script>";
    //lo devuelvo a la interfaz de login
    echo "<script>window.location.href = 'index1.html';</script>"; 
      }  
       $conexion->close(); //cerramos la BD 
    
    } 
    
 }//cierra POST

?>

