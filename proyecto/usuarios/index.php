<?php
include("../php/bd.php");
$con = conectar();

session_start();
//COMPRUEBA QUE EL USUARIO INICIÓ SESIÓN
if ($_SESSION["autentificado_usuario"] != "SI") {
  //SI NO HAY UNA SESION ACTIVA MANDO A INICIAR SESIÓN
  header("Location:/STARTSHOP/index.php");
  exit();
}

$uss = $_SESSION["usuario"];
$sql = "SELECT * FROM usuario WHERE usuario_login='$uss'";
$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
mysqli_data_seek($resultado, 0);
$datos = mysqli_fetch_array($resultado);

$query = "SELECT imagen_usuario FROM usuario WHERE usuario_login = '$uss'";
$resulta = mysqli_query($con, $query);

if ($row = mysqli_fetch_array($resulta)) {
  $img = $row['imagen_usuario'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Startshop-Usuarios
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="bootstrap/css/bootstraps.css" rel='stylesheet' type='text/css' />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/responsive-nav.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".dropdown img.flag").addClass("flagvisibility");

      $(".dropdown dt a").click(function() {
        $(".dropdown dd ul").toggle();
      });

      $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("sample"));
      });

      function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
      }

      $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown"))
          $(".dropdown dd ul").hide();
      });


      $("#flagSwitcher").click(function() {
        $(".dropdown img.flag").toggleClass("flagvisibility");
      });
    });
  </script>
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
                    <li>
                      <!-- start message -->
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
                    <li>
                      <!-- Task item -->
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
                    <li>
                      <!-- Task item -->
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
                    <li>
                      <!-- Task item -->
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
                    <li>
                      <!-- Task item -->
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
                    <?php echo $datos['nombre'] . " " . $datos['apellidos']; ?> - <?php echo $datos['tipo_rol']; ?>
                    <small><?php echo $datos['email']; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="/STARTSHOP/php/salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>

        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="main">
          <div class="shop_top">
            <div class="container">
              <div class="row shop_box-top">
                <div class="col-md-3 shop_box"><a href="#">
                    <img src="dist/img/Velas.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <!--<span class="new-label">New</span>-->
                    </span>
                    <span class="sale-box">
                      <span class="sale-label">Sale!</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="reducedfrom">$66.00</span>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>

                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/algodon.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <span class="new-label">New</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/tela.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <!--<span class="new-label">New</span>-->
                    </span>
                    <span class="sale-box">
                      <span class="sale-label">Sale!</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="reducedfrom">$66.00</span>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/pic8.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <span class="new-label">New</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="reducedfrom">$66.00</span>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
              </div>
              <div class="row">
                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/pic9.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <span class="new-label">New</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/pic10.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <span class="new-label">New</span>
                    </span>
                    <span class="sale-box">
                      <!--<span class="new-label">sale</span>-->
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/pic11.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <span class="new-label">New</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="reducedfrom">$66.00</span>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
                <div class="col-md-3 shop_box"><a href="single.html">
                    <img src="dist/img/pic12.jpg" class="img-responsive" alt="" />
                    <span class="new-box">
                      <!--<span class="new-label">New</span>-->
                    </span>
                    <span class="sale-box">
                      <span class="sale-label">Sale!</span>
                    </span>
                    <div class="shop_desc">
                      <h3><a href="#">aliquam volutp</a></h3>
                      <p>Lorem ipsum consectetuer adipiscing </p>
                      <span class="reducedfrom">$66.00</span>
                      <span class="actual">$12.00</span><br>
                      <ul class="buttons">
                        <li class="cart"><a href="#">Add To Cart</a></li>
                        <li class="shop_btn"><a href="#">Read More</a></li>
                        <div class="clear"> </div>
                      </ul>
                    </div>
                  </a></div>
              </div>
            </div>
          </div>
        </div>

      </section>



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