
<?php
include("../../php/config.php");
$con = conectar();


$id=$_GET['id'];

$sql="DELETE FROM articulo WHERE id_articulo='$id'";
$query=mysqli_query($con,$sql);

if($query){
    header("location: ../index.php");
}
?>