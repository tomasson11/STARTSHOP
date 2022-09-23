<?php
include("../php/bd.php"); 
$con=conectar();



session_start(); 
//COMPRUEBA QUE EL USUARIO INICIÓ SESIÓN
if ($_SESSION["autentificado_Administrador"] != "SI") { 
   	//SI NO HAY UNA SESION ACTIVA MANDO A INICIAR SESIÓN
   	header("Location:/starshop/index.php"); 
   	exit();
}

$uss = $_SESSION["usuario"];
$sql = "SELECT * FROM usuario WHERE usuario_login='$uss'"; 
        $resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
        mysqli_data_seek ($resultado, 0);
        $datos = mysqli_fetch_array($resultado);

$query="SELECT imagen_usuario FROM usuario WHERE usuario_login = '$uss'"; 
        $resulta=mysqli_query($con,$query);

        /*if ($row = mysqli_fetch_array($resulta)) {
              $img = $row['imagen_usuario'];
            }   */ 
            
$id = $_GET['id'];
$sqli="SELECT * from articulo where id_articulo='$id'";
$result=mysqli_query($con,$sqli);
$datosproducto=mysqli_fetch_array($result);

//LISTAR INFORMACION DEL PRODUCTO EDITADO A BD

if (isset($_POST['cerrar'])){
  header('location:index.php');

}

if (isset($_POST['guardar_cambios'])){

$id = "";  
$categoria = ""; 
$codigo = "";  
$nombre = "";
$precio = "";
$stock = "";
$fecha = "";
$descripcion = "";
$estado = 1;

if ($_POST){  
  $id = $_POST['id'];
  $categoria = $_POST['categoria_producto']; 
	$codigo = $_POST['code_producto'];  
	$nombre = $_POST['name_producto'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];
	$fecha = $_POST['fecha_creacion'];
	$descripcion = $_POST['descripcion'];
  $estado = 1;
	

$sql2="UPDATE articulo SET  id_articulo = '$id', nombre_categoria = '$categoria', codigo ='$codigo', nombre = '$nombre', precio_venta = '$precio',
 stock = '$stock', fecha_creacion = '$fecha', descripcion = '$descripcion', id_estado = '$estado' where id_articulo ='$id' ";

$resultado_editar=mysqli_query($con,$sql2) or die(mysqli_error($con));

// redireccionar luego de editar
}if($resultado_editar){
  
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Producto Editado Correctamente');\n";
    echo "</script>";
    header("location: index.php");

}else{
      echo "<script language=\"JavaScript\">\n";
      echo "alert('Hubo un error');\n";
      echo "</script>";
     header("location: index.php");
}
mysqli_close($con);

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
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>STS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>STARTSHOP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">      
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user4-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/per.jpg" class="img-circle">

                <p>
                <?php echo $datos['nombre']." ".$datos['apellidos']; ?> - <?php echo $datos['tipo_rol'];?>
                  <small><?php echo $datos['email'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="editar_perfil.php" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="/starshop/php/salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
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
          <p><?php echo $datos['nombre']." ".$datos['apellidos']; ?></p>
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
        
        
        <!--TABLAS PARA COMPRAS              
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        ----------------------------------------------------------------------------------------------->

        <!--CALENDARIO PARA EMPRENDEDORES
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        ------------------------------------------------------------------------------------------------>
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
    EDITAR PRODUCTO
  </h1></center>

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
    <form action="editar.php" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" value="<?php echo  $datosproducto['nombre']?>" name="name_producto" placeholder="Ingrese el nombre del producto">
          </div>

            <div class="form-group">
            <label for="">Precio</label>
            <input type="number" class="form-control" value="<?php echo  $datosproducto['precio_venta']?>" name="precio" placeholder="Ingrese el precio del producto">
      </div> 
          </div> 

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Codigo</label>
            <input type="text" readonly class="form-control" value="<?php echo  $datosproducto['codigo']?>" name="code_producto" placeholder="Ingrese el codigo del producto">
      </div> 
           
      
      <div class="form-group">
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

    <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <input class="form-control" type="text" id="exampleFormControlTextarea1" value="<?php echo  $datosproducto['descripcion']; ?>" rows="3" name="descripcion" placeholder="Ingrese la descripcion del producto"></textarea>
      </div> 
    </div>

    <div class="col-md-6">
          <div class="form-group">
            <label for="">ID</label>
            <input type="number" readonly class="form-control" value="<?php echo  $datosproducto['id_articulo']; ?>" name="id" placeholder="Ingrese la cantidad de productos">
      </div> 
    </div>

    <div class="row">
      <div class="ol-md-12">
        <center>
        
        <input type="submit" value="Cerrar" class="btn btn-danger" name="cerrar">
        <input type="submit" value="Guardar Cambios" class="btn btn-primary" name="guardar_cambios">
        </center>
	  </div>
    </div>
    </form>
  </div>
</div>
</div>
          </div>  
</section>			 <!-- Main content -->
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
