<?php


include("header.php");



 

  

?>


<!DOCTYPE html>
<html>
<head>
  <?php 

 

   ?>
</head>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
          <?php echo '<img src="data:image/jpg;base64, '.base64_encode($datos['imagen_usuario']).'" class="img-circle" /> '
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
              <li class="active"><a href="inventario.php"><i class="fa fa-circle-o"></i> Inventarios</a></li>
              <li class="active"><a href="morris.php"><i class="glyphicon glyphicon-stats"></i> Estadisticas</a></li>
            </ul>

          </li>

        <li class="header">REPORTES</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

<section class="content-header">

  <h1><center>
    AGREGAR PRODUCTO
  </h1></center>

</section>

<?php
//LISTAR INFORMACION DEL PRODUCTO A BD

if (isset($_POST['crear'])){
$categoria=""; 
$descuento="";
$nombre="";
$precio="";
$stock="";
$fecha="";
$descripcion="";
$e="";
$imagen="";
$estado = 1;
$id_usuario= $id;

if ($_POST) {
$categoria=$_POST['categoria_producto']; 
$descuento=$_POST['descuento'];
$nombre=$_POST['name_producto'];
$e = $_FILES['imagen_articulo']['tmp_name'];
$imagen = addslashes(file_get_contents($e));
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$fecha=$_POST['fecha_creacion'];
$descripcion=$_POST['descripcion'];
$estado = 1;
$id_usuario= $id;

$sql="INSERT INTO `articulo`(`id_articulo`, `id_usuario`, `nombre_categoria`, `nombre`,
 `precio_venta`, `descuento`, `stock`, `fecha_creacion`, `descripcion`, `foto_producto`, `id_estado`)
    VALUES ('', '$id_usuario', '$categoria' , '$nombre', '$precio', '$descuento', '$stock', '$fecha', '$descripcion', '$imagen', '$estado' )";
$datos=$con->query($sql);
}
}
/*listar la informacion de mi tabla 
$sql="SELECT * FROM `articulo`";
$datos=$con->query($sql);*/

?>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">
      Aquí puedes agregar tus productos</h3>
  </div>
  <div class="panel-body">
    <form action="inventario.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nombres</label>
            <input type="text" max="20" class="form-control" name="name_producto" placeholder="Ingrese el nombre del producto">
          </div>

            <div class="form-group">
            <label for="">Precio</label>
            <input type="number" class="form-control" name="precio" placeholder="Ingrese el precio del producto">
      </div> 
          </div> 

        <div class="col-md-6">
          <div class="form-group">
            <label for="">descuento</label>
            <input type="number" class="form-control" name="descuento" placeholder="Ingrese el descuento del producto">
      </div> 
           
      
          <div class="form-group">
          <label for="">categoria</label>
            <select name="categoria_producto" class="form-control">
      <option id="opcion" value="0">Selecciona:</option>
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
      </div>
          </div>  
      
          <div class="col-md-6">
          <div class="form-group">
            <label for="">Stock</label>
            <input type="number" class="form-control" name="stock" placeholder="Ingrese la cantidad de productos">
      </div> 
    </div>

    <div class="col-md-6">
          <div class="form-group">
            <label for="">Fecha</label>
            <input type="date" class="form-control" min="2022-09-10" name="fecha_creacion" placeholder="Ingrese el codigo del producto">
    
    <!--<input type="date" id="start" name="trip-start"
    value="2018-07-22"
       min="2018-01-01" max="2018-12-31">-->
          </div> 
    </div>

    <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" type="text" id="exampleFormControlTextarea1" rows="3" name="descripcion" placeholder="Ingrese la descripcion del producto"></textarea>
      </div>   
    </div>

    <div class="col-md-12">
    <div class="form-group">
			        <label class="col-sm-2 control-label">Sube una imagen para mostrar en tu perfil</label>
			        <div class="col-sm-8">
			        <input type="file" class="form-control" name="imagen_articulo" multiple >
		</div>
    </div>
    </div>

    <div class="row">
      <div class="ol-md-12">
        <center>
        <input type="submit" value="Crear" class="btn btn-primary" name="crear">
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
