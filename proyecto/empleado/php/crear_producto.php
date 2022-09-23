<?php
require_once '/php/bd.php';

                            //LISTAR INFORMACION DEL PRODUCTO A BD

    if(isset($_POST['crear'])){
	$categoria=$_POST['categoria_producto']; 
	$codigo=$_POST['code_producto'];  
	$nombre=$_POST['name_producto'];

	$precio=$_POST['precio'];
	$stock=$_POST['stock'];
	$fecha=$_POST['fecha_creacion'];
	$descripcion=$_POST['descripcion'];
	$estado = 1;



		$sql="INSERT INTO `articulo`(`id_articulo`, `id_categoria`, `codigo`, `nombre`,
		 `precio_venta`, `stock`, `descripcion`, `id_estado`)
			  VALUES ('', '$categoria' , '$codigo' , '$nombre', '$precio', $stock', '$descripcion', '$estado' )";
		$datos=$con->query($sql);

	
}


?>
