
<?php
 include("../../php/bd.php");
 $con = conectar();

if (isset($_POST['cambiar_estado'])) {
 

  $id = $_GET['id'];
  $id_estado = $_GET['id_estado'];

  $cero == "0";
  $uno == "1";

  if ($id_estado == "1") {

   $sq1 =" UPDATE `articulo` SET `id_estado` = '0' WHERE `articulo`.`id_articulo` = 60";
    $sqli = mysqli_query($con, $sq1);
  } else {

    $sq = "UPDATE articulo SET id_estado = '$uno' where id_articulo = '$id'";
    $sqli2 = mysqli_query($con, $sq);
  }

  if ($sqli && $sqli2) {
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Estado cambiado Correctamente');\n";
    echo "</script>";
    header("location:index.php");
  } else {
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Hubo un error');\n";
    echo "</script>";
    header("location:index.php");
  }
}


?>