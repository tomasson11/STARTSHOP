<?php

	session_start();


	ConsultarUsuario($_POST['inputUsuario'], $_POST['inputPassword']);

	function ConsultarUsuario($usuario, $password)
	{
		include'conexion.php';
		include_once "alerta_modal.php";
		$sentencia="SELECT * FROM usuarios WHERE usuario='".$usuario."' AND password='".$password."' AND status='ACTIVO'  ";
		$resultado=$conexion->query($sentencia) or die ("Error al comprobar usuario: ".mysqli_error($conexion));

		$count = mysqli_num_rows($resultado); //Numero de filas del resultado de la consulta

		if($count > 0) //si la variable count es mayor a 0
		{
			$_SESSION['usuario']=$usuario;

			/***  AHORA ***/
			MensajeAlerta("correcto", "Bienvenido", "menu.php");

			/***  ANTES ***/ 
			/*echo '<script>';
				echo 'alert("Bienvenido!!");';
				echo 'window.location.href="menu.php";';
			echo '</script>';*/
		}
		else
		{
			MensajeAlerta("error", "Datos de acceso incorrectos", "index.php");
			/*echo '<script>';
				echo 'alert("Datos de acceso incorrectos");';
				echo 'window.location.href="index.php";';
			echo '</script>';*/
		}
	}
?>