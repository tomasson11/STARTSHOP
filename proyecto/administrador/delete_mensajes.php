<?php
include("../php/bd.php");
$con = conectar();


$id=$_GET['id'];

$sql="DELETE FROM contactanos WHERE id_mensaje ='$id'";
$query=mysqli_query($con,$sql);

if($query){
    header("location: mensajes.php");
}
?>