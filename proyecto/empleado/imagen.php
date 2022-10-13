<?php

include('header.php');


if(isset($_POST['actualizar'])){
    $e = $_FILES['imagen_usuario']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($e));

    $Consulta = "UPDATE usuario SET  (imagen_usuario)values('$imgContenido')";
       $result = mysqli_query($con, $Consulta);

        
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

            <h1>
                <center>
                    Perfil
            </h1>
            </center>

        </section>



        <section class="content">


            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">

                                <?php echo '<img src="data:image/jpg;base64, ' . base64_encode($datos['imagen_usuario']) . '" class="img-circle" /> '
                                ?>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sube una nueva foto</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="imagen_usuario" multiple>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <form action="imagen.php" method="POST">
                                        <div class="row">


                                            <div class="row">
                                                <div class="ol-md-12">
                                                    <center>
                                                        <a href="editar_perfil.php" style="color: #000; text-decoration: none;"> <button name="crear" type="button" class="btn btn-danger">Cerrar</button> </a>
                                                        <input type="submit" value="Actualizar" class="btn btn-primary" name="Actualizar">


                                                    </center>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>







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