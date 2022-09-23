<?php
include('bd.php');


//VARIABLES PARA EL LOGIN

$usuario_login=$_POST['usuario'];
$password_login=$_POST['password'];


//CONSULTA EN LA TABLA
$consulta="SELECT* COUNT(*) as contar FROM usuarioss where nombre_usuario='$usuario_login' and password_login='$password_login'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

//Condiciones del formulario
if($filas ['contar']>0){

    $_SESSION['usuario'] = $usuario_login;
    header("location:principal.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
      <h3 >UPPS! NO SE PUDO ACCEDER</h3>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

