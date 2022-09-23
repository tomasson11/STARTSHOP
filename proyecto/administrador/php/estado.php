<?php
include("../../php/bd.php");
$con = conectar();

if (isset($_POST['cambiar_estado'])){
        $id=$_GET['id'];
        $id_estado=$_GET['id_estado'];

        if($id_estado=1){

		
		$sq = "UPDATE articulo SET id_estado = 0 where id_articulo = '$id'";
		$sqli=mysql_query($con,$sq);


        }elseif($id_estado=0){

            $sq = "UPDATE articulo SET id_estado = 1 where id_articulo = '$id'";
            $sqli2=mysql_query($con,$sq);

        }



if($sqli){
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Estado cambiado Correctamente');\n";
    echo "</script>";
    header("location:index.php");

}elseif($sqli2){
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Estado cambiado Correctamente');\n";
    echo "</script>";
    header("location:index.php");

}else{
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Hubo un error');\n";
    echo "</script>";
    header("location:index.php");
}}



/*$sql= "UPDATE FROM articulo SET id_estado='$estado' WHERE id_articulo='$id'";
$query=mysqli_query($con,$sql);
}

if($query){
    header("location: ../index.php");
}*/
?>