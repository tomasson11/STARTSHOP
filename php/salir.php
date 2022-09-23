<?php
/*
Tomas estuvo aqui.
include('bd.php');

if(isset($_SESSION['salir'])){
    session_destroy();
    header("<location: ../index.php");
}else{
    header("location: ../index.php");
    
}
*/
/* Destruir la sesion */
session_start();
session_destroy();
/* Redirigir */
        echo "<script language=\"JavaScript\">\n"; 
        echo "alert('Sesion cerrada ¡Hasta pronto!');\n"; 
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/STARTSHOP/proyecto/usuarios/normal_user.php'>"; 
?>
