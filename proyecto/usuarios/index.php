<?php


include("headerindex.php");



$id_estado = 1;

$query = "SELECT * FROM articulo WHERE id_estado = '$id_estado'";
$resulta = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
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
              <li class="active"><a href="Productos_agregados.php"><i class="glyphicon glyphicon-ok"></i> Productos Listados</a></li>
              <li class="active"><a href="inventario.php"><i class="glyphicon glyphicon-plus"></i>Listar Productos</a></li>
            </ul>

          </li>


          <li class="active treeview">
            <a href="#">
              <i class="glyphicon glyphicon-tasks"></i> <span>Reportes</span>

              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="morris.php"><i class="glyphicon glyphicon-stats"></i> Estadisticas</a></li>
            </ul>

          </li>


      </section>
    </aside>

 


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>

        </h1>
        <nav class="navbar navbar-inverse" role="navigation">
          <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Desplegar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            </a>

          </div>

          <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li class=""><a href="index.php">Shop</a></li>
              <li><a href="#">Novedades</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Servicios <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Restaurante</a></li>
                  <li><a href="#">Repostería</a></li>
                  <li><a href="#">Modistería</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Floristería</a></li>
                  <li><a href="#"></a></li>

                </ul>
              </li>



              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Destacados<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Bisutería</a></li>
                  <li><a href="#">Joyería</a></li>
                  <li><a href="#">Tecnología</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Licor Artesanal</a></li>
                  <li class="divider"></li>
                  <li><a href="#"></a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-left">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Información de Interés<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="paginas/team_startshop.php">Team StartShop</a></li>

                  <li><a href="paginas/contacto.php">Contáctanos</a></li>

                </ul>
              </li>
            </ul>


            <ul class="nav navbar-nav navbar-left">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  LOREM IPSUM<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="">Team StartShop</a></li>

                  <li><a href="">Contáctanos</a></li>

                </ul>
              </li>
            </ul>

          
              </li>
            </ul>


            <form action="" method="get" class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
              </div>
              <button type="submit" class="btn btn-default glyphicon glyphicon-search" name="enviar"></button>
            </form>


          </div>
        </nav>



      </section>



      <!-- Main content -->
      <section class="content">
        <div class="main">
          <div class="row ">


            <?php
            //iniciar la carga de los datos directamente de la tabla

            while ($mostrar = mysqli_fetch_array($resulta)) {

            ?>




              <div class="col-md-3 shop_box"><a href="single.html">
              <?php echo '<img src="data:image/jpg;base64, '.base64_encode($mostrar['foto_producto']).'"  class="img-responsive" /> ' 
                  ?>

                  <span class="new-box">
                    <!--<span class="new-label">New</span>-->
                  </span>
                  <span class="sale-box">
                    <span class="sale-label">En venta</span>
                  </span>

                  <div class="shop_desc">
                    <td><?php echo $mostrar['nombre']; ?></td>


                    <p>
                      <td><?php echo $mostrar['descripcion']; ?></td>
                    </p>


                    <span class="actual"><?php echo number_format($mostrar['precio_venta'], 2, '.', ','); ?></span><br>

                    <ul class="buttons">
                      <li class="cart btn-warning"><a href="editar.php? id=<?php echo $mostrar['id_articulo'] ?>" name="agregar">añadir a carrito</a></li>
                      <li class="shop_btn btn-primary"><a href="paginas/producto_detallado.php? id=<?php echo $mostrar['id_articulo'] ?>" name="leer">Conoce más</a></li>
                      <div class="clear"> </div>
                    </ul>
                  </div>
                </a></div>





            <?php
            }
            ?>
          </div>

        </div>

      </section>

      <center>
            <nav aria-label="">
              <ul class="pagination pagination-lg">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
            <center>





      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
      </div>
      <strong>Copyright &copy; 2022 <a href="http://localhost/startshop/usuarios/index.php">STARTSHOP</a>.</strong> All rights
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