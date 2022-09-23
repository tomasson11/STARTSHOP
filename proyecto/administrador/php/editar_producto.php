<?php
include("../../php/bd.php");
$con = conectar();

$id=$_GET['id'];
            
            $sqli="SELECT * from articulo where id_articulo='$id'" ;
            $result=mysqli_query($con,$sqli);
            $datosproducto=mysqli_fetch_array($result);



//LISTAR INFORMACION DEL PRODUCTO EDITADO A BD

if (isset($_POST['cerrar'])){
    header("location: ../index.php");

}

elseif (isset($_POST['guardar_cambios'])){
$categoria=""; 
$codigo="";  
$nombre="";
$precio="";
$stock="";
$fecha="";
$descripcion="";
$estado=1;

if ($_POST){     
$categoria=$_POST['categoria_producto']; 
	$codigo=$_POST['code_producto'];  
	$nombre=$_POST['name_producto'];

	$precio=$_POST['precio'];
	$stock=$_POST['stock'];
	$fecha=$_POST['fecha_creacion'];
	$descripcion=$_POST['descripcion'];
	

$sql2="UPDATE articulo SET  nombre_categoria='$categoria',codigo='.$codigo.'nombre='.$nombre.',precio_venta='.$precio.',
 stock=.$stock., fecha_creacion='.$fecha.' ,descripcion='.$descripcion.' id_estado='.$estado.' where id_articulo='$id' ";

$resultado_editar=mysqli_query($con,$sqli);

// redireccionar luego de editar
}if($resultado_editar){
  
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Producto Editado Correctamente');\n";
    echo "</script>";
   // header("location:../create_count.php");

}else{
      echo "<script language=\"JavaScript\">\n";
      echo "alert('Hubo un error');\n";
      echo "</script>";
    // header("location:../create_count.php");
}
mysqli_close($con);

}


?>

    