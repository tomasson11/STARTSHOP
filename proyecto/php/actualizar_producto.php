<?php
include("../bd.php");
$con=conectar();

    

    $id=$POST=[''];
    $categoria=$POST=['nombre_categoria'];
    $nombre_producto=$_POST['nombre'];
    $precio=$_POST['precio_venta'];
    $stock=$_POST['stock'];
    $fecha=$_POST['fecha_actualizacion'];
    $descripcion=$_POST['descripcion'];
    $estado=$_POST['id_estado'];

    

    $sql="UPDATE articulo SET nombre_categoria='$categoria',nombre='$nombre_producto',
    precio_venta='$precio',stock='$stock', fecha_creacion='$fecha', descripcion='$descripcion', estado='$estado' WHERE documento='$id'";
    $query=mysqli_query($con,$sql);

    if($query){
        header("location: index.php");
    }


?>