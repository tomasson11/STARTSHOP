<?php
if(!empty($_GET['id']){

include("bd.php"); 
$con=conectar();
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT imagen_usuario FROM usuario WHERE usuario_login = $_SESSION["usuario_login"]");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgDatos['imagenes']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>