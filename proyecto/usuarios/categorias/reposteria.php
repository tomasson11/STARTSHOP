<?php

include("../headerindex.php");
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
    <link href="../bootstrap/css/bootstraps.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap 3.3.6 -->

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>

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

<body class="hold-transition skin-yellow sidebar-mini">
    <?php





    include("sidebar.php");
    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
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
                        <li class=""><a href="../index.php">Shop</a></li>
                        <li><a href="novedades.php">Novedades</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Servicios <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="restaurante.php">Restaurante</a></li>
                                <li><a href="reposteria.php">Repostería</a></li>

                                <li class="divider"></li>
                                <li><a href="floristeria.php">Floristería</a></li>
                                <li><a href="#"></a></li>

                            </ul>
                        </li>



                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Destacados<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="bisuteria.php">Bisutería</a></li>
                                <li><a href="tecnologia.php">Tecnología</a></li>
                                <li class="divider"></li>
                                <li><a href="licor.php">Licor Artesanal</a></li>
                                <li class="divider"></li>
                                <li><a href="#"></a></li>
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


        <section class="content">
            <div class="wrap">







                <div class="jumbotron text-center">
                    <h1>En la Red emprededores de Yarumal</h1>
                    <p>Encuentras servicios de Repostería</p>
                </div>








                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                    </div>
                </div>
                <br>

                <!-- Media top -->
                <div class="media">
                    <div class="media-left media-top">
                        <img src="../dist/img/magdalena.png" class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Servicios Deliciosos y Económicos</h4>
                        <p>Contamos con todo tipo de decorado, logos de compañías,
                            escudos de escuelas, personajes infantiles y de caricatura,
                            mascotas comerciales ó cualquier otro diseño que pueda ser
                            plasmado en un pastel. Nuestros diseños pueden ser dibujados, realzados
                            o con figurines. También podemos decorar tu pastel con
                            flores naturales, flores artificiales o cualquier otra figura</p>
                    </div>
                </div>

                <!-- Media middle -->
                <div class="media">
                    <div class="media-left media-middle">
                        <img src="../dist/img/panadero.png" class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Profesionales Capacitados</h4>
                        <p>La repostería es un sector ligado al mundo
                            de la artesanía que requiere conocimientos muy
                            específicos y una alta dosis de creatividad. por lo que nuestros miembros
                            cumplen con todas las altas espectativas de nuestros clientes </p>
                    </div>
                </div>

                <!-- Media bottom -->
                <div class="media">
                    <div class="media-left media-bottom">
                        <img src="../dist/img/experiencia.png" class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Experiencia Excepcional</h4>
                        <p>Contamos con una amplia variedad de pasteles y postres hechos
                            a mano y de forma casera. La elaboración de nuestros
                            pasteles y postres siguen las recetas
                            tradicionales que han estado en nuestro municipio por varias
                            generaciones. Ofrecemos varios servicios de repostería
                            que ponemos a su disposición.</p>
                    </div>
                </div>
                <br>

                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only">60% Complete (warning)</span>
                    </div>











                </div>


                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>

                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="../dist/img/pan.jpg" alt="" width="1200px">
                        </div>

                        <div class="item">
                            <img src="../dist/img/choco.jpg" alt="" width="1200px">
                        </div>

                        <div class="item">
                            <img src="../dist/img/mesero2.jpg" alt="" width="1200px">
                        </div>

                        <div class="item">
                            <img src="../dist/img/p.jpg" alt="" width="1200px">
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <br>

                <br>
                <div class="well">Si necesitas algun servicio es importante que debes contactarnos <a href="https://wa.me/573136861897?text=HOLA...%20VENGO%20A%20PRESTAR%20UN%20SERVICIO%20DE%20RESTAURANTE" target="_blank">AQUÍ </a></div>
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
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>