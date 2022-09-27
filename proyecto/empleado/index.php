<?php
include("header.php");


?>




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

        <h1>
          <center>
            PRODUCTOS AGREGADOS
        </h1>
        </center>

        <!-- Main content -->
        <section class="content">

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Lista de productos</h3>
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

                      while ($mostrar = mysqli_fetch_array($resulta)) {

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


                            <a href="editar.php? id=<?php echo $mostrar['id_articulo'] ?>" name="editar">
                              <button type="button" class="btn btn-primary fa-duotone fa-pen-to-square" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">editar</button></a>

                            <a href="php/eliminar_producto.php? id=<?php echo $mostrar['id_articulo'] ?> id_estado=<?php echo $mostrar['id_estado'] ?>" class="btn btn-danger glyphicon glyphicon-trash"></a>

                            <a href="php/estado.php? id=<?php echo $mostrar['id_articulo'] ?>" class="btn btn-warning" name="cambiar_estado">estado</a>




                          </td>
                        </tr>

                      <?php
                      }
                      ?>
                    </table>




                    <!--MODAL DESPLAZAMIENTO PARA EDITAR PRODUCTO-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>

                              <div class="row">
                                <div class="col-md-12">

                                  <div class="panel panel-primary">
                                    <div class="panel-heading">
                                      <h3 class="panel-title">
                                        Edición de productos</h3>
                                    </div>
                                    <div class="panel-body">

                                      <form action="index.php" method="post">
                                        <div class="row">

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">Nombre</label>
                                              <input value="<?php echo $mostrar['nombre'] ?>" type="text" class="form-control" name="name_producto" placeholder="Ingrese el nombre del producto">
                                            </div>

                                            <div class="form-group">
                                              <label for="">Precio</label>
                                              <input type="number" class="form-control" value="<?php echo $mostrar['precio_venta'] ?>" name="precio" id="precio" placeholder="Ingrese el precio del producto">
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">Codigo</label>
                                              <input type="text" class="form-control" name="code_producto" value="<?php echo $mostrar['codigo'] ?>" placeholder="Ingrese el codigo del producto">
                                            </div>


                                            <div class="form-group">
                                              <label for="">categoria</label>
                                              <select name="categoria_producto" class="form-control">
                                                <option id="opcion" value="value=" <?php echo $mostrar['nombre_categoria'] ?>></option>
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
                                              <input type="number" class="form-control" name="stock" value="<?php echo $mostrar['stock']; ?>" id="stock" placeholder="Ingrese la cantidad de productos">
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">Fecha</label>
                                              <input type="date" class="form-control" min="2022-09-10" name="fecha_creacion" id="fecha" placeholder="Ingrese el codigo del producto">

                                              <!--<input type="date" id="start" name="trip-start"
          value="2018-07-22"
            min="2018-01-01" max="2018-12-31">-->
                                            </div>
                                          </div>

                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Descripcion</label>
                                              <textarea class="form-control" type="text" value="<?php echo $mostrar['descripcion']; ?>" id="exampleFormControlTextarea1" id="descrpcion" rows="3" name="descripcion" placeholder="Ingrese la descripcion del producto"></textarea>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="ol-md-12">

                                            </div>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default glyphicon glyphicon-remove-circle" data-dismiss="modal"></button>


                            <button type="button" class="btn btn-success">Guardar Cambios</button>
                          </div>
                        </div>
                      </div>
                    </div>








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