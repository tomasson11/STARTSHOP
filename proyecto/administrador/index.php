<?php

include("headeradmin.php");
?>





<!DOCTYPE html>
<html>

<head>
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
      <div class="col-lg-6 col-xs-5">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $rowcount2; ?> </h3>

            <p>Productos Registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-xs-5">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>319</h3>

            <p>Total de Ventas </p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>





    <center>
      <h1>
        Tabla General Productos
      </h1>
    </center>

    <!-- Main content -->
    <section class="content">

      <!-- Main content -->
      <section class="content">
      <a href="usuarios.php"><button type="" class="glyphicon glyphicon-home" name="home"></button></a>
      <form action="" method="post" class="navbar-form navbar-right" role="search">
          <tr>
          
            <td>
            <div class="form-group">
              <input onkeyup="buscar_ahora($('#busqueda').val());" type="text" class="form-control" placeholder="Buscar..." name="busqueda" id="busqueda">
            </div>
            <button type="submit" class="btn btn-default glyphicon glyphicon-search" name="enviar"></button>
            </td>
          </tr>
        </form>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">productos agregados</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>


                      <th>NOMBRE</th>
                      <th>PRECIO</th>
                      <th>STOCK</th>
                      <th>CATEGORIA</th>
                      <th>CREACION</th>
                      <th>DESCRIPCION</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>

                  <?php
                  //iniciar la carga de los datos directamente de la tabla

                  while ($mostrar = mysqli_fetch_array($result)) {

                  ?>

                    <tr>
                      <td><?php echo $mostrar['id_articulo']; ?></td>

                      <td><?php echo $mostrar['nombre']; ?></td>
                      <td><?php echo $mostrar['precio_venta']; ?></td>
                      <td><?php echo $mostrar['stock']; ?></td>
                      <td><?php echo $mostrar['nombre_categoria']; ?></td>
                      <td><?php echo $mostrar['fecha_creacion']; ?></td>
                      <td><?php echo $mostrar['descripcion']; ?></td>
                      <td><?php echo $mostrar['id_estado']; ?></td>
                      <td>


                        <a href="php/eliminar_producto.php? id=<?php echo $mostrar['id_articulo'] ?> id_estado=<?php echo $mostrar['id_estado'] ?>" class="btn btn-danger glyphicon glyphicon-trash"></a>

                        <a href="php/estado.php? id=<?php echo $mostrar['id_articulo'] ?>" class="btn btn-warning" name="cambiar_estado">estado</a>




                      </td>
                    </tr>

                  <?php
                  }
                  ?>
                </table>


              </div>
              <!-- /.box-body -->
            </div>
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