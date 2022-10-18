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
                <li class="header">Apoyamos el emprendimiento</li>

                <li class="active treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-shopping-cart"></i> <span>Información de interés </span>

                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="active"><a href="../paginas/team_startshop.php"><i class="glyphicon glyphicon-gift"></i>Team StartShop</a></li>
                        <li class="active"><a href="../paginas/contacto.php"><i class="glyphicon glyphicon-earphone"></i>Contáctanos</a></li>

                    </ul>

                </li>




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>