<?php

include("../php/bd.php");
$con = conectar();


//VARIABLES PARA REGISTRAR USUARIO
if (isset($_POST['finalizar'])) {

    $tipo_rol = $_POST['usuario'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipo_documento = $_POST['documento'];
    $num_documento = $_POST['num_documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $estado = 1;
    $name_usuario = $_POST['name_usuario'];
    $password_usuario = $_POST['password_usuario'];

    $e = $_FILES['imagen_usuario']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($e));




    //CONSULTAR EN LA TABLA
    $query = "SELECT * FROM usuario WHERE num_documento='$num_documento' || email='$email' || usuario_login='$name_usuario' ";
    $resulta = mysqli_query($con, $query);

    if ((mysqli_num_rows($resulta) >= 1)) {

        echo "<script language=\"JavaScript\">\n";
        echo "alert(' encontro un usuario con: Este nombre de usuario/Email/ Documento');\n";
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL= crear_usuario.php'>";
        mysqli_close($con);
        exit;
    }

    //INSERTAR EN LA TABLA
    else {
        $Consulta = "INSERT INTO usuario (id_usuario, tipo_rol, nombre, apellidos,
     tipo_documento, num_documento, fecha_nacimiento, direccion, telefono, email, id_estado, usuario_login, password_login, imagen_usuario)values('', '$tipo_rol', '$nombres', '$apellidos',
    '$tipo_documento','$num_documento','$fecha_nacimiento','$direccion','$telefono','$email','$estado','$name_usuario','$password_usuario', '$imgContenido')";
        $result = mysqli_query($con, $Consulta);


        echo "<script language=\"JavaScript\">\n";
        echo "alert('Usuario creado con Exito');\n";
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=crear_usuario.php'>";
    }

    if ($result == 0) {
        mysqli_close($con);
        exit;
    }
}

?>

