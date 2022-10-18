<?php

include("headeradmin.php");
?>





<!DOCTYPE html>
<html>

<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">

</head>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php echo '<img src="data:image/jpg;base64, ' . base64_encode($datos['imagen_usuario']) . '"  class="img-circle"  /> '
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $datos['nombre'] . " " . $datos['apellidos']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Administración General</li>

      <li class="active treeview">
        <a href="#">
          <i class="glyphicon glyphicon-shopping-cart"></i> <span>Informes</span>

          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          <li class="active"><a href="index.php"><i class="glyphicon glyphicon-gift"></i>ARTICULOS</a></li>
          <li class="active"><a href="usuarios.php"><i class="glyphicon glyphicon-user"></i>USUARIOS</a></li>
          <li class="active"><a href="crear_usuario.php"><i class="glyphicon glyphicon-plus"></i>CREAR USUARIO</a></li>
          <li class="active"><a href="mensajes.php"><i class="glyphicon glyphicon-envelope"></i>Mensajes</a></li>
        </ul>

      </li>




    </ul>
  </section>


  <!-- /.sidebar -->
</aside>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">

  <div class="row">
      <!-- ./col -->
      <div class="col-lg-6 col-xs-5">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $rowcount3; ?><sup style="font-size: 20px"></sup></h3>

            <p>Empleados Registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="usuarios.php #example2" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-xs-5">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $rowcount; ?> </h3>

            <p>Usuarios Registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="usuarios.php #example2" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>






    <center>
      <h1>
        Formulario para agregar Emprendedor
      </h1>
    </center>

    <!-- Main content -->
    <section class="content">

     
<form action="create_count.php" method="post" enctype="multipart/form-data">

<div id="loginContainer" class="form-step form-step-active">
    <div id="loginPicture">
        <!--<img src="imagenes/image1.jpg" alt=""> -->
    </div>
    <div id="loginPictureCover"></div>



    <!--Primeras variables con informacion basica del usuario -->
    <label for="username">Tipo Usuario</label>
    <select name="usuario"  required>
        <option id="opcion" value="0">Seleccione:</option>
        <?php
        include("../bd.php");
        $con = conectar();

        $query = "SELECT * FROM rol";
        $resulta = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($resulta)) {

            $tipo = $row['tipo_rol'];

            echo "<option value='$tipo'>$tipo</option>";
        }
        ?>
    </select>


    <label for="username">Nombre</label>
    <input type="text" placeholder="Ingresa tus Nombres" name="nombres" minlength="2" maxlength="20" required>

    <label for="username">Apellidos</label>
    <input type="text" placeholder="Ingresa tus Apellidos" name="apellidos" minlength="2" maxlength="20" required>

   

   


    <!--SE LLAMA EL TIPO DE DOCUMENTO DIRECTAMENTE DE DB-->


    <label for="username">Tipo Documento</label>
    <select name="documento">
        <option id="opcion" value="0">Seleccione:</option>
        <?php
        include("php/bd.php");
        $con = conectar();

        $query = "SELECT * FROM documento";
        $resulta = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($resulta)) {

            $tipo = $row['tipo_documento'];

            echo "<option value='$tipo'>$tipo</option>";
        }
        ?>
    </select>


    <!--variables relacionadas con la cuenta-->


    <label for="Num_documento">Num Documento</label>
    <input type="int" placeholder="Ingresa tu Documento" name="num_documento" minlength="7" maxlength="10" required>

    <label for="Fecha_-nacimiento">Fecha Nacimiento</label>
    <input type="date" placeholder="" name="fecha_nacimiento" min="1950-01-01" required>

    <label for="Direccion">Dirección</label>
    <input type="text" placeholder="Ingresa tu Dirección" name="direccion" required>


    <label for="Telefono">Teléfono Celular</label>
    <input type="int" placeholder="Ingresa tu Teléfono" name="telefono" maxlength="10" required>

    <label for="Email">Email</label>
    <input type="email" name="email" placeholder="Ingresa tu Email" required>


    <label for="Usuario">CREA UN NOMBRE DE USUARIO CON EL CUAL SIEMPRE INICIARAS SESION</label>
    <input type="text" name="name_usuario" minlength="3" maxlength="15">

    <label for="Contraseña">CONTRASEÑA DEL USUARIO</label>
    <input type="password" name="password_usuario" minlength="7" maxlength="100" required>



    <div class="form-group">
        <label class="col-sm-12 control-label">Sube una imagen para mostrar en el perfil</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name="imagen_usuario" multiple>
        </div>


        <!--Botones-->

        <button name="finalizar" type="submit">Crear</button>
    




</form>
            <!-- /.box -->
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
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
<script>
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>




</body>

</html>




