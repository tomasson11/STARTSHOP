<?php

include("../../php/bd.php");
$con = conectar();


if (!empty($_REQUEST["nume"])){$_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
if ($_REQUEST["nume"] == ""){ $_REQUEST["nume"] = "1";}
            //iniciar la carga de los datos directamente de la tabla
$articulos = mysqli_query($con, "SELECT * FROM articulo WHERE nombre LIKE LOWER('%".$_POST['busqueda']."%')");
$num_registros=mysqli_num_rows($articulos);
$registros= '6';
$pagina=$_REQUEST["nume"];
if (is_numeric($pagina))
$inicio= (($pagina-1)*$registros);
else
$inicio=0;
$busqueda=mysqli_query($con, "SELECT * FROM articulo WHERE nombre LIKE LOWER('%".$_POST['busqueda']."%') LIMIT $inicio,$registros;");
$paginas=ceil($num_registros/$registros);
            
?>

<div class="container-fluid  col-12">
        <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='index.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='index.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='index.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='index.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
                                             