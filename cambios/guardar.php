<?php
include('../php/bd.php');
$con=conectar();


if($_POST){
    $nombre="";
    $imagen="";
    
    
    
    
    $nombre = $_POST['nombre'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    
    
    $q="INSERT INTO imagen (id, nombre, imagen)values('', '$nombre', '$imagen')";
    
            $result = mysqli_query($con, $q);
    
    if($result){
        echo "se inserto";
    }else{
        echo "no se inserto";
    }


}

?>
