<?php
  session_start();

  if ($_SESSION['usuario'] != 'admin')
  {
    echo '<script>';
        echo 'alert("No eres Admin!!");';
        echo 'window.location.href="index.php";';
      echo '</script>';
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejemplo de interaccion con DB</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="todo">
  
  <div id="cabecera">
  	<img src="images/swirl.png" width="1188" id="img1">
  </div>
  
  <div id="contenido">
    <?php include'navbar.php'; ?>

  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>No.</th>
  			<th>ID</th>
  			<th>Producto</th>
  			<th>Descripcion</th>
  			<th> <a href="productos/nuevo_prod1.php"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
  		</thead>
  		
  		
  		<?php
      include "conexion.php";
      $sentencia="SELECT * FROM productos";
      $resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));
      while($filas=$resultado->fetch_assoc())
      {
        echo "<tr>";
          echo "<td>"; echo $filas['no']; echo "</td>";
          echo "<td>"; echo $filas['id_producto']; echo "</td>";
          echo "<td>"; echo $filas['nombre']; echo "</td>";
          echo "<td>"; echo $filas['descripcion']; echo "</td>";
          echo "<td>  <a href='productos/modif_prod1.php?no=".$filas['no']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
          echo "<td> <a href='productos/eliminar_prod.php?no=".$filas['no']."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
        echo "</tr>";
      }

      ?>
  	</table>
  </div>
  
	<div id="footer">
  		<img src="images/swirl2.png" id="img2">
  	</div>

</div>


</body>
</html>