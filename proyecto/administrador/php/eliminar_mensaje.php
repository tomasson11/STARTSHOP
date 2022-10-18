<?php
include("../../php/bd.php");
$con = conectar();



    $id_mensaje=$_GET['id_mensaje'];

    $sql1="DELETE FROM contactanos WHERE id_mensaje='$id_mensaje'";
    $query=mysqli_query($con,$sql1);

    if($query){
        header("location: ../mensajes.php");
    }

?>