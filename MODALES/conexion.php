<?php
	$conexion= new mysqli("localhost", "usuario", "usuario", "mi_negocio");
	//Comprobar conexion
	if(mysqli_connect_errno())
	{
		printf("Fallo la conexion");
	}
	else {
		//printf("Estas conectado");
	}
?>