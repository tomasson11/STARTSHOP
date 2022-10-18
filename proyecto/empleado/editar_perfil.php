<?php
include("header.php");


$query = "SELECT imagen_usuario FROM usuario WHERE usuario_login = '$uss'";
$resulta = mysqli_query($con, $query);

if ($row = mysqli_fetch_array($resulta)) {
  $img = $row['imagen_usuario'];
}



if (isset($_POST['Actualizar'] )) {

  $id = "";
  $nombre = "";
  $apellido = "";
  $tipo_documento = "";
  $num_documento = "";
  $telefono = "";
  $fecha = "";
  $email = "";
  $e="";
  $imgContenido="";

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

    /*$e = $_FILES['imagen_usuario']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($e));

            if(isset($_FILES['imagen_usuario']['tpm_name'])){

           

            //$delete= " DELETE imagen_usuario From usuario";
           
            $resultado_delete = mysqli_query($con, $delete) or die(mysqli_error($con));

            $sql2 = "UPDATE usuario SET  
                  nombre = '$nombre', apellidos ='$apellido', 
                  telefono = '$telefono', email = '$email', direccion = '$direccion', imagen_usuario= '$imgContenido', 
                
                  where id_usuario ='$id' ";

          $resultado_editar = mysqli_query($con, $sql2) or die(mysqli_error($con));
       


     
      // MENSAJE DE APROBACION AL EDITAR

      if ($resultado_editar) {

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Usuario Editado Correctamente');\n";
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=../empleado/index.php'>";
      }}} }
      */

      else{

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
        telefono = '$telefono', email = '$email', direccion = '$direccion', 
      
         where id_usuario ='$id' ";

$resultado_editar = mysqli_query($con, $sql2) or die(mysqli_error($con));

  }}
      
    }else {
      echo "<script language=\"JavaScript\">\n";
      echo "alert('Hubo error');\n";
      echo "</script>";
      header("location: contacto.php");
    }*/
  
    mysqli_close($con);
  


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

                <label class="col-sm-12 control-label">Sube una nueva foto</label>
                <div class="col-sm-">
                <input type="file" class="form-control" name="imagen_usuario" multiple >
                </div>
                
              


            </div>


            <div class="panel-body">
              <form action="editar_perfil.php" method="POST">
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">ID</label>
                      <input type="hidden" max="11" value="<?php echo $datos['id_usuario']; ?>" class="form-control" name="id">
                    </div>

                    <div class="form-group">
                      <label for="">Tipo Rol</label>
                      <input readonly type="text" value="<?php echo $datos['tipo_rol']; ?>" class="form-control" name="tipo_rol">
                    </div>

                    <div class="form-group">
                      <label for="">Documento</label>
                      <input type="int" readonly class="form-control" name="num_documento" value="<?php echo $datos['num_documento']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="">Teléfono Celular </label>
                      <input maxlength="12" minlength="10" type="number" required class="form-control" name="telefono" value="<?php echo $datos['telefono']; ?>">
                    </div>
                  </div>



                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input type="text" maxlength="20" minlength="3" required class="form-control" name="nombre_usuario" value="<?php echo $datos['nombre']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="">Tipo Documento</label>
                      <input type="int" readonly max="20" class="form-control" name="tipo_documento" value="<?php echo $datos['tipo_documento']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="">Dirección</label>
                      <input type="text" maxlength="30" minlength="5" required class="form-control" name="direccion" value="<?php echo $datos['direccion']; ?>">
                    </div>


                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Apellidos</label>
                      <input type="text" maxlength="20" minlength="3" required class="form-control" name="apellidos" value="<?php echo $datos['apellidos']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="">fecha Nacimiento</label>
                      <input type="date" readonly class="form-control" name="fecha_nacimiento" value="<?php echo $datos['fecha_nacimiento']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="">email</label>
                      <input type="email" maxlength="50" required class="form-control" name="email" value="<?php echo $datos['email']; ?>">
                    </div>


                  </div>
                </div>




                <div class="row">
                  <div class="ol-md-12">
                    <center>
                      <a href="index.php" style="color: #000; text-decoration: none;"> <button name="crear" type="button" class="btn btn-danger">Cerrar</button> </a>
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