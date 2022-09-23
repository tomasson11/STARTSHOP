<?php
require_once 'bd.php';
$con=conectar();

$id=$_GET['id_articulo'];

$sql = "DELETE FROM articulo WHERE id_articulo = $id";
$query = mysqli_query($con,$sql);

if($query){
    header("location: STARTSHOP/proyecto/administrador/index.php");
}

?>