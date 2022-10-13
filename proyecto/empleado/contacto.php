<?php
include("header.php");






$query = "SELECT imagen_usuario FROM usuario WHERE usuario_login = '$uss'";
$resulta = mysqli_query($con, $query);

if ($row = mysqli_fetch_array($resulta)) {
    $img = $row['imagen_usuario'];
}



if (isset($_POST['Actualizar'])) {

    $id = "";
    $nombre = "";
    $apellido = "";
    $tipo_documento = "";
    $num_documento = "";
    $telefono = "";
    $fecha = "";
    $email = "";


    if ($_POST) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre_usuario'];
        $apellido = $_POST['apellidos'];
        $tipo_documento = $_POST['tipo_documento'];
        $num_documento = $_POST['num_documento'];
        $telefono = $_POST['telefono'];
        $fecha = $_POST['fecha_nacimiento'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];



        $sql2 = "UPDATE usuario SET  
              nombre = '$nombre', apellidos ='$apellido', 
              telefono = '$telefono', email = '$email', direccion = '$direccion'
              
               where id_usuario ='$id' ";

        $resultado_editar = mysqli_query($con, $sql2) or die(mysqli_error($con));

        // MENSAJE DE APROBACION AL EDITAR

        if ($resultado_editar) {

            echo "<script language=\"JavaScript\">\n";
            echo "alert('Usuario Editado Correctamente');\n";
            echo "</script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../empleado/index.php'>";
        } else {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Hubo un error');\n";
            echo "</script>";
            header("location: index.php");
        }
        mysqli_close($con);
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <?php

    include('loyout/header.php');

    ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">



    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php echo '<img src="data:image/jpg;base64, ' . base64_encode($datos['imagen_usuario']) . '" class="img-circle" /> '
                    ?>
                </div>
                <div class="pull-left info">
                    <p><?php echo $datos['nombre'] . " " . $datos['apellidos']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MENU DE NAVEGACION</li>

                <li class="active treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-shopping-cart"></i> <span>Mi tienda</span>

                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="index.php"><i class="fa fa-table"></i> Productos</a></li>
                        <li class="active"><a href="inventario.php"><i class="glyphicon glyphicon-folder-close"></i> Inventarios</a></li>
                        <li class="active"><a href="contacto.php"><i class="glyphicon glyphicon-earphone"></i>Contactanos</a></li>
                    </ul>
                </li>

                <li class="header">REPORTES</li>
                <li class="active"><a href="morris.php"><i class="glyphicon glyphicon-stats"></i> Estadisticas</a></li>
            </ul>


        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <center>
                <h1>
                    Envía tu inquietud
                </h1>
            </center>

        </section>
        <br>
        <br>






        <section class="content">
            <div class="wrap">
                <div class="row col-lg-5">
                    <div class="col-7 col-sm-6 col-lg-5">
                        <img src="https://cdn.glitch.me/aa746bf3-a6c3-4002-b05c-06b267451fe0%2Fundraw_message_sent_re_q2kl.svg?v=1635881296678" width="300px" height="300px" />
                    </div>
                </div>
                <div class="row col-lg-5">
                    <?php
                    date_default_timezone_set('America/Bogota');
                    $DateAndTime = date("Y-m-d H:i:s ");
                    ?>

                    <form action="header.php" method="post" class="form-horizontal" role="form">
                        <div class="form-group">


                            <input type="hidden" name="hora" value="<?= $DateAndTime ?>" class="form-control" id="ejemplo_email_3" placeholder="ejemplo_email@gmail.com">


                            <label for="ejemplo_email_3" class="col-lg-2 control-label">correo</label>

                            <div class="col-lg-10">
                                <input type="email" required name="correo" class="form-control" id="ejemplo_email_3" placeholder="ejemplo_email@gmail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ejemplo_password_3" class="col-lg-2 control-label">Comentario</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" required rows="3" name="mensaje" placeholder="Quisiera ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group container mt-5 mb-5">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button name="enviar_comentario" type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="row col-lg-5">
                    <center>
                        <h3>
                            Ingresa un correo para eneviarte una respuesta
                        </h3>
                    </center>
                    <center>
                        <p>

                        </p>
                    </center>
                </div>

                <br>


            </div>


        </section>








        </section>

        <!-- Main content -->
        <section class="content">
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>StartShop</b> 2022
        </div>
        <strong>Copyright &copy; 2022 <a href="http://localhost/startshop/usuarios/index.php">STARSHOP</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>