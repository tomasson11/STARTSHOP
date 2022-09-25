<?php


function conectar()
{
   	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "starshop_project";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

   return 	$conexion;

}




/*
$conexion=mysqli_connect("localhost","root","","tablas")or die(
    "error de conexion");
    */


/*
 

 function conectar (){
	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "starshop_project";
	 try {
			$conexion = new PDO('mysql:host='( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos"));
 
	 }
	 catch (PDOException $e) {
		 echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		 exit;
	 }
	 return $conexion;
  }*/
 
  ?>