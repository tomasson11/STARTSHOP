<?php
  $servidor = "localhost";
  $usuario = "root";
  $password = "";
  $nombre= "starshop_project";
  define("KEY","develoteca");
  define("COD","AES-128-ECB");

  $servido="mysql:dbname=".$nombre.";host=".$servidor;
 
  try {
        $pdo= new PDO($servido,$usuario,$password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
		
      );
      }
 
  catch(PDOException $e)
      {
      echo "La conexión ha fallado: " . $e->getMessage();
      }
 


  ?>