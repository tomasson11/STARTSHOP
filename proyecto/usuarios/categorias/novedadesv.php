<?php





include("../header.php");
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
    include('sidebarv.php')
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
                        <li class=""><a href="../paginas/normal_user.php">Shop</a></li>
                        <li><a href="novedades.php">Novedades</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Servicios <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="restaurantev.php">Restaurante</a></li>
                                <li><a href="reposteriav.php">Repostería</a></li>

                                <li class="divider"></li>
                                <li><a href="floristeriav.php">Floristería</a></li>
                                <li><a href="#"></a></li>

                            </ul>
                        </li>



                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Destacados<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="bisuteriav.php">Bisutería</a></li>
                                <li><a href="tecnologiav.php">Tecnología</a></li>
                                <li class="divider"></li>
                                <li><a href="licorv.php">Licor Artesanal</a></li>
                                <li class="divider"></li>
                                <li><a href="#"></a></li>
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
            <div class="wrap">

                <div class="jumbotron text-center">
                    <h1>Celebra el emprendimiento</h1>
                    <p>Con el primer marketplace instaurado en Yarumal!</p>
                </div>

                <div class="container">

                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="../dist/img/1.jpg" alt="Los Angeles">
                        </div>

                        <div class="item">
                            <img src="../dist/img/2.png" alt="Chicago" width="">
                        </div>

                        <div class="item">
                            <img src="../dist/img/l.jpeg" alt="New York">
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

            </div>




        </section>


        <section class="content">
            <div class="wrap">




                <div class="jumbotron text-center">
                    <h1>¿Quieres conocer más?</h1>
                    <p>Pues estas en el sitio correcto... Para aprender más sobre Hecho en Yarumal!</p>
                </div>



                <div class="progress" style="width: 100%">
                    <div class="progress-bar progress-bar-success" style="width: 33%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 33%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 33%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>




                <div id="myCarousel" class="carousel slide" data-ride="carousel">



                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="../dist/img/e.jpeg" alt="Los Angeles">
                        </div>

                    </div>

                </div>
                <br>

                <br>


                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <center>
                                <h3>Feria Empresaríal</h3>
                            </center>
                            <p>


                            </p>
                        </div>
                        <div class="col-sm-4">
                            <center>
                                <h3> Hecho en Yarumal</h3>
                            </center>
                            <p></p>
                        </div>
                        <div class="col-sm-3">
                            <center>
                                <h3>Próxima Feria</h3>
                            </center>
                            <p>

                            </p>
                        </div>

                    </div>
                </div>


                <div class="row ">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="../dist/img/1.jpg" alt="...">
                            <div class="caption">
                                <h3></h3>
                                <p>Es la fería celebrada en yarumal, en la cual se
                                    exponen los diferentes productos de emprendedores locales,
                                    ademas en la que se puede encontrar diversos productos
                                </p>
                                <p>
                                <a href="https://www.facebook.com/reddemprendedoresyarumal/" target="_blank"><button type="button" class="btn btn-default btn-xs"><img src="../dist/img/facebook.png" alt="" class="img-circle"></button></a>
                                    <a href="https://www.yarumal.gov.co/alcaldia/noticias/2565-ii-feria-empresarial-hecho-en-yarumal" target="_blank"> <button type="button" class="btn btn-default btn-xs"><img src="../dist/img/sitio-web.png" alt="" class="img-circle"></button></a>
                                    <a href=" https://instagram.com/yarumal_emprende?igshid=YmMyMTA2M2Y=" target="_blank"> <button type="button" class="btn btn-default btn-xs"><img src="../dist/img/instagram.png" alt="" class="img-circle"></button></a>
                                    
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="../dist/img/1.jpg" alt="...">
                            <div class="caption">
                                <h3></h3>
                                <p>Red de emprededores que se crearon con el fin de apoyar
                                    el emprendimiento yarumaleño y
                                    que juntos buscan un desarrollo economico a nivel municipal
                                    y regional
                                </p>
                                <p>
                                    <a href="https://www.facebook.com/reddemprendedoresyarumal/" target="_blank"><button type="button" class="btn btn-default btn-xs"><img src="../dist/img/facebook.png" alt="" class="img-circle"></button></a>
                                    <a href="https://www.yarumal.gov.co/alcaldia/noticias/2565-ii-feria-empresarial-hecho-en-yarumal" target="_blank"> <button type="button" class="btn btn-default btn-xs"><img src="../dist/img/sitio-web.png" alt="" class="img-circle"></button></a>
                                    <a href=" https://instagram.com/yarumal_emprende?igshid=YmMyMTA2M2Y=" target="_blank"> <button type="button" class="btn btn-default btn-xs"><img src="../dist/img/instagram.png" alt="" class="img-circle"></button></a>
                                    
                                   

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="../dist/img/1.jpg" alt="...">
                            <div class="caption">
                                <h3></h3>
                                <p>Para saber la proxima feria empresarial debes estar atento
                                    para poder participar de ella. ya que son muy especiales y hay demasiadas opciones para tu ojo
                                    y estomago
                                </p>
                                <p>
                                <a href="https://www.facebook.com/reddemprendedoresyarumal/" target="_blank"><button type="button" class="btn btn-default btn-xs"><img src="../dist/img/facebook.png" alt="" class="img-circle"></button></a>
                                    <a href="https://www.yarumal.gov.co/alcaldia/noticias/2565-ii-feria-empresarial-hecho-en-yarumal" target="_blank"> <button type="button" class="btn btn-default btn-xs"><img src="../dist/img/sitio-web.png" alt="" class="img-circle"></button></a>
                                    <a href=" https://instagram.com/yarumal_emprende?igshid=YmMyMTA2M2Y=" target="_blank"> <button type="button" class="btn btn-default btn-xs"><img src="../dist/img/instagram.png" alt="" class="img-circle"></button></a>
                                    
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <br>


                <div class="media-left">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <img src="../dist/img/iss.jpeg" alt="" width="600px">

                        </div>

                    </div>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">RED DE EMPRENDEDORES YARUMAL</h4>
                    Surgió apróximadamente hace 5 años, Jorge luego
                    de graduarse de la carrera administración de empresas, trabajo en la alcaldia del municipio de Yarumal

                    el manejo de una empresa, los activos, los fijos, los pasivos, etc. Fue cuando le intereso
                    fundar un espacio para los emprendedores, le nació la idea de Hecho en Yarumal porque en la zona del Norte
                    Antioqueño no había un sitio especifico para los emprendedores. Fué cuando Jorge y junto a la alcaldia
                    pensaron en la idea.
                    El espacio fué creciendo y cada vez eran mas los emprendedores que querian participar de las diferentes ferias empresariales
                    con el tiempo fue creciendo y a las
                    personas les gustaba la idea e integracion de la misma.
                    Luego buscaron una mejor ubicación, se ubicaron cerca del
                    centro, más específicamente al lado de Bancolombia.
                    <p>

                    </p>
                    Actualmente están en el mismo lugar y trabajan diariamente a la par con los emprendedores
                    los emprendedores trabajan con armarios, cocinas, puertas, muebles de alcoba, muebles
                    de televisor y más, también se hace el diseño que deseen. Hasta ahora han tenido muy buena
                    acogida, se manejan materiales de muy buena cálidad, resitentes a húmedades,
                    nunca cambia de color.

                    <p>

                    </p>



                    el manejo de una empresa, los activos, los fijos, los pasivos, etc. Fue cuando le intereso
                    fundar un espacio para los emprendedores, le nació la idea de Hecho en Yarumal porque en la zona del Norte
                    Antioqueño no había un sitio especifico para los emprendedores. Fué cuando Jorge y junto a la alcaldia
                    pensaron en la idea.
                    El espacio fué creciendo y cada vez eran mas los emprendedores que querian participar de las diferentes ferias empresariales
                    con el tiempo fue creciendo y a las

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