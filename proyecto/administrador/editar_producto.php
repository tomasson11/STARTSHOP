<?php

include("headeradmin.php");






  $idrp = $_GET['idsp'];



  $sqli = "SELECT * from articulo where id_articulo='$idrp'";
  $result = mysqli_query($con, $sqli);
  $datosproducto = mysqli_fetch_array($result);

  //LISTAR INFORMACION DEL PRODUCTO EDITADO A BD
  if (isset($_POST['guardar_cambios']) and $datosproducto == 0) {
    /* echo "<script language=\"JavaScript\">\n";
    echo "alert('No hubieron cambios');\n";
    echo "</script>";
    header("location: index.php");*/
  }




  if (isset($_POST['guardar_cambios'])) {


    if (isset($_FILES['imagen_articulo']['tmp_name'])) {
      $id = "";
      $categoria = "";
      $descuento = "";
      $nombre = "";
      $precio = "";
      $stock = "";
      $fecha = "";
      $descripcion = "";
      $e = "";
      $imagen = "";
      $estado = "";
      $id_articulo = $id;
      $id_usuario = $id1;

      if ($_POST) {
        $id = $_POST['id'];
        $categoria = $_POST['categoria_producto'];
        $descuento = $_POST['descuento'];
        $nombre = $_POST['name_producto'];

        $e = $_FILES['imagen_articulo']['tmp_name'];
        $imagen = addslashes(file_get_contents($e));

        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $fecha = $_POST['fecha_creacion'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['id_estado'];
        $id_articulo = $idrp;
      


        $sq = "DELETE foto_producto from articulo where id_articulo ='$id_articulo' and id_usuario ='$id_usuario' ";
        $resultado_eliminar = mysqli_query($con, $sq) or die(mysqli_error($con));

        $sql = " INSERT INTO `articulo`(` foto_producto`) values ('$imagen') where id_articulo ='$id_articulo'and id_usuario ='$id_usuario'";
        $resultado_insertar = mysqli_query($con, $sql) or die(mysqli_error($con));


        $sql2 = "UPDATE articulo SET  id_articulo = '$id', id_usuario = '$id1', nombre_categoria = '$categoria', nombre = '$nombre', precio_venta = '$precio', descuento = '$descuento',
       stock = '$stock', fecha_creacion = '$fecha', descripcion = '$descripcion', '' , id_estado = '$estado' where id_articulo ='$id' and id_usuario ='$id_usuario' ";

        $resultado_editar = mysqli_query($con, $sql2) or die(mysqli_error($con));

        // redireccionar luego de editar
      }
      if ($resultado_editar) {

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Producto Editado Correctamente');\n";
        echo "</script>";
        // header("location: index.php");
      } else {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Hubo un error');\n";
        echo "</script>";
        // header("location: index.php");
      }
    } else {
      $id_art = "";
      $categoria = "";
      $descuento = "";
      $nombre = "";
      $precio = "";
      $stock = "";
      $fecha = "";
      $descripcion = "";
      $e = "";
      $imagen = "";
      $estado = "";
  


      if ($_POST) {
        $id_art = $_POST['id_articulo'];
        $categoria = $_POST['categoria_producto'];
        $descuento = $_POST['descuento'];
        $nombre = $_POST['name_producto'];

        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $fecha = $_POST['fecha_creacion'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['id_estado'];
       


        $sql2 = "UPDATE articulo SET  id_articulo = '$id_art', nombre_categoria = '$categoria', nombre = '$nombre', precio_venta = '$precio', descuento = '$descuento',
         stock = '$stock', fecha_creacion = '$fecha', descripcion = '$descripcion', id_estado = '$estado' where id_articulo ='$id_art' ";

        $resultado_editar = mysqli_query($con, $sql2) or die(mysqli_error($con));

        // redireccionar luego de editar
      }
      if ($resultado_editar) {

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Producto Editado Correctamente');\n";
        echo "</script>";
        echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=index.php'>";
      } else {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Hubo un error');\n";
        echo "</script>";
         header("location: index.php");
      }
    }
  }



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
        <li class="header">Administtracion General</li>

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
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>
        <center>
          EDITAR PRODUCTO
      </h1>
      </center>

    </section>


    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
                Edicion de productos</h3>
            </div>
            <div class="panel-body">
              <form action="editar_producto.php" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" value="<?php echo  $datosproducto['nombre'] ?>" name="name_producto" placeholder="Ingrese el nombre del producto">
                    </div>
                    <label for="">categoria</label>
                    <select name="categoria_producto" class="form-control">
                      <option id="opcion"><?php echo  $datosproducto['nombre_categoria']; ?></option>
                      <?php
                      include("php/bd.php");
                      $con = conectar();

                      $query = "SELECT * FROM categoria";
                      $resulta = mysqli_query($con, $query);

                      while ($row = mysqli_fetch_array($resulta)) {

                        $tipo = $row['nombre_categoria'];

                        echo "<option value='$tipo'>$tipo</option>";
                      }
                      ?>
                    </select>

                    <div class="form-group">
                      <label for="">Precio</label>
                      <input type="number" class="form-control" value="<?php echo  $datosproducto['precio_venta'] ?>" name="precio" placeholder="Ingrese el precio del producto">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Descuento</label>
                      <input type="number" readonly class="form-control" value="<?php echo  $datosproducto['descuento'] ?>" name="descuento" placeholder="Ingrese el descuento del producto">
                    </div>


                    <div class="form-group">
                      <label for="" type="hidden"></label>
                      <select type="hidden" name="ola" class="form-control">


                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Stock</label>
                      <input type="number" class="form-control" value="<?php echo  $datosproducto['stock']; ?>" name="stock" placeholder="Ingrese la cantidad de productos">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Fecha modificación</label>
                      <input type="date" class="form-control" value="<?php echo  $datosproducto['fecha_creacion']; ?>" min="2022-09-10" name="fecha_creacion" placeholder="Ingrese el codigo del producto">

                      <!--<input type="date" id="start" name="trip-start"
    value="2018-07-22"
       min="2018-01-01" max="2018-12-31">-->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">ID</label>
                      <input type="number" readonly class="form-control" value="<?php echo  $datosproducto['id_articulo']; ?>" name="id" placeholder="Ingrese la cantidad de productos">
                    </div>
                  </div>
                  <div class="col-md-12">

                    <div class="form-group ">
                      <label for="">Estado</label>
                      <select name="id_estado" class="form-control">
                        <option id="opcion"><?php echo  $datosproducto['id_estado']; ?></option>
                        <?php
                        include("php/bd.php");
                        $con = conectar();

                        $query = "SELECT * FROM estado";
                        $resulta = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_array($resulta)) {

                          $tipo = $row['id_estado'];

                          echo "<option value='$tipo'>$tipo</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>




                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">ID</label>
                      <input type="number" readonly class="form-control" value="<?php echo  $datosproducto['id_articulo']; ?>" name="id_articulo" placeholder="Ingrese la cantidad de productos">
                    </div>
                  </div>



                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">FOTO</label>

                      <input type="file" class="form-control" name="imagen_articulo" multiple>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Descripcion</label>
                      <input class="form-control" type="text" id="exampleFormControlTextarea1" value="<?php echo  $datosproducto['descripcion']; ?>" rows="3" name="descripcion" placeholder="Ingrese la descripcion del producto"></textarea>
                    </div>
                  </div>




                  <div class="row">
                    <div class="ol-md-12">
                      <center>

                        <a href="index.php" style="color: #000; text-decoration: none;"> <button type="button" class="btn btn-danger">cerrar</button> </a>
                        <input type="submit" value="Guardar Cambios" class="btn btn-primary" name="guardar_cambios">
                      </center>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>

  </section> <!-- Main content -->
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