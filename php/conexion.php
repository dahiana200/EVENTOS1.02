<?php    
   $localhost="127.0.0.1"; //localhost
   $username="root"; //admin de phpmyadmin
   $password=""; //contraseña del root
   $dbname="crud"; //nombre de la BD

   $conexion= new mysqli($localhost,$username,$password,$dbname);
  
   //Probar la conexión con la BD
   if($conexion->connect_error){
       echo "Error de conexión."." ".$conexion->connect_error;
   }else{
       //echo "Conexión exitosa.";
   }
      //guardar es con ctl+S
?>


