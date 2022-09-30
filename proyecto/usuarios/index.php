<?php
include("headerindex.php");


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
            <p><?php echo $datos['nombre'] . " " . $datos['apellidos'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Apoyamos el emprendimiento</li>

          <li class="active treeview">
            <a href="#">
              <i class="glyphicon glyphicon-shopping-cart"></i> mi actividad<span></span>

              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href=""><i class="glyphicon glyphicon-ok"></i>Mi carrito</a></li>
              <li class="active"><a href=""><i class="glyphicon glyphicon-plus"></i>Historial de compras</li>
              <li class="active"><a href=""><i class="glyphicon glyphicon-plus"></i>Facturas</li>
            </ul>

        

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
                <input onkeyup="buscar_ahora($('#busqueda').val());" type="text" class="form-control" placeholder="Buscar..." name="busqueda" id="busqueda">
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

          <div id="datos_buscador" ></div>


          </div>
  </section>
  

  <script type="text/javascript"> 

      function buscar_ahora(busqueda){
      var parametros = {"busqueda":busqueda};
      $.ajax({
      data:parametros,
      type: 'POST',
      url: 'buscador.php',
      success: function (data) {
      document.getElementById("datos_buscador").innerHTML = data;
      }
      });   
      }
      buscar_ahora();
      </script>


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