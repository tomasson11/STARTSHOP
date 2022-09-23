<?php

include("bd.php");
$con = conectar();

if (isset($_POST['start'])) {

    $usua = $_POST["usuario_login"];
    $psw = $_POST["password_login"];

    $query = "SELECT usuario_login, password_login, tipo_rol FROM usuario WHERE (usuario_login='$usua' AND password_login='$psw')";
    $resulta = mysqli_query($con, $query);
    $consulta = mysqli_fetch_assoc($resulta);

    //Compruebo que la consulta arroja al menos un resultado, si lo hace mando mensaje de bienvenida

    if (mysqli_num_rows($resulta) >= 1) {

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Bienvenido al Sistema');\n";
        echo "</script>";
        //Aqui se crean las variables para comprobar el inicio de sesión


        //Manda a iniciar sesion al administrador
        if (($consulta['tipo_rol'] == "Admin")) {
            session_start();
            $_SESSION["autentificado_Administrador"] = "SI";
            $_SESSION["usuario"] = $usua;
            //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/administrador/index.php'>";
        }

        //Manda a iniciar sesion al usuario corriente

        if ($consulta['tipo_rol'] == "Usuario") {
            session_start();
            $_SESSION["autentificado_usuario"] = "SI";
            $_SESSION["usuario"] = $usua;
            //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/usuarios/index.php'>";
        }

        //Manda a iniciar sesion al empleado 
        if (($consulta['tipo_rol'] == "Empleado")) {
            session_start();
            $_SESSION["autentificado_empleado"] = "SI";
            $_SESSION["Usuario"] = $usua;
            //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
            echo "<META HTTP-EQUIV='refresh' URL=../proyecto/empleado/index.php'>";
        }
    } else {
        //si hay problemas con el usuario, contraseña o el tipo de usuario, se manda mensaje y 
        //lo devuelvo a la página de inicio de sesión
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Usuario o Contraseña incorrecto');\n";
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/starshop/index.php'>";
    }
}


if (isset($_POST['create'])) {
    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/starshop/create_count.php'>";
}



mysqli_close($con);
exit;



  
 




/*

//VARIABLES PARA EL LOGIN

    
$usuario_login=$_POST['usuario_login'];
$password_login=$_POST['password_login'];


//CONSULTA EN LA TABLA
$consulta="SELECT COUNT(*) as contar from usuarioss where nombre_usuario='$usuario_login' and password_login='$password_login'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

//Condiciones del formulario
if($filas['contar']>0){

    $_SESSION['usuario'] = $usuario_login;
  
    header("location:principal.php");

}else{

    <?php
    include("index.php");

  
      <h3 >UPPS! NO SE PUDO ACCEDER</h3>
      
  <?php
}
mysqli_fetch_result($resultado);
mysqli_close($conexion);
*/


 
































 /*

include("bd.php"); 
$con=conectar();

if(isset($_POST['start'])){

$usua= $_POST["usuario_login"];
$psw= $_POST["password_login"];
$tip= $_POST["usua"];

$query="SELECT * FROM usuario WHERE (usuario_login='$usua' AND password_login='$psw' AND tipo_rol='$tip')"; 
$resulta=mysqli_query($con,$query);

if ((mysqli_num_rows($resulta)>=1)){
    $query1="SELECT * FROM empleados WHERE (usuario_login='$usua' AND password_login='$psw' AND tipo_rol='$tip')"; 
    $resulta1=mysqli_query($con,$query1);
    if ((mysqli_num_rows($resulta1)>=1)){
        
    echo "<script language=\"JavaScript\">\n"; 
    echo "alert('Bienvenido al Sistema...');\n"; 
    echo "</script>"; 
    //Manda a iniciar sesion al administrador
    if (($tip=="Admin") ){
        session_start(); 
        $_SESSION["autentificado_Administrador"]= "SI";
        $_SESSION["usuario"]= $usua;
        //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/administrador/index.php'>";
        }
    
    //Manda a iniciar sesion al usuario corriente
    
        if (($tip=="Usuario") ){
            session_start(); 
        $_SESSION["autentificado_usuario"]= "SI";
        $_SESSION["usuario"]= $usua;
        //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/usuarios/index.php'>";
        }
    //Manda a iniciar sesion al empleado 
        if (($tip=="Empleado") ){
            session_start(); 
            $_SESSION["autentificado_empleado"]= "SI";
            $_SESSION["usuario"]= $usua;
            //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/empleados/index.php'>";
            }
    
    
//inicio de sesion
    }else{
        echo "<script language=\"JavaScript\">\n"; 
        echo "alert('Usuario y/o contraseña incorrecta');\n"; 
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/starshop/index.php'>"; 
//no inicio
    }
}
}




//Compruebo que la consulta arroja al menos un resultado, si lo hace mando mensaje de bienvenida
/*
if ((mysqli_num_rows($resulta)>=0) || (mysqli_num_rows($resulta1)>=0)){
    
    echo "<script language=\"JavaScript\">\n"; 
    echo "alert('Bienvenido al Sistema...');\n"; 
    echo "</script>"; 
    //Aqui se crean las variables para comprobar el inicio de sesión


   //Manda a iniciar sesion al administrador
    if (($tip=="Admin") ){
    session_start(); 
    $_SESSION["autentificado_Administrador"]= "SI";
    $_SESSION["usuario"]= $usua;
    //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/administrador/index.php'>";
    }

//Manda a iniciar sesion al usuario corriente

    if (($tip=="Usuario") ){
        session_start(); 
    $_SESSION["autentificado_usuario"]= "SI";
    $_SESSION["usuario"]= $usua;
    //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/usuarios/index.php'>";
    }
//Manda a iniciar sesion al empleado 
    if (($tip=="Empleado") ){
        session_start(); 
        $_SESSION["autentificado_empleado"]= "SI";
        $_SESSION["usuario"]= $usua;
        //Si todo se hizo correctamente, mando a la pagina de inicio de sesion correcto
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../proyecto/empleados/index.php'>";
        }



    } else {
        //si hay problemas con el usuario, contraseña o el tipo de usuario, se manda mensaje y 
        //lo devuelvo a la página de inicio de sesión
        echo "<script language=\"JavaScript\">\n"; 
        echo "alert('Usuario y/o contraseña incorrecta');\n"; 
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/starshop/index.php'>"; 
    }
}

if(isset($_POST['create'])){
    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/starshop/create_count.php'>"; 
}



 mysqli_close($con);
  exit;*/
