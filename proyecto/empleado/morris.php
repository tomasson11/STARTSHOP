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
        <?php echo '<img src="data:image/jpg;base64, '.base64_encode($row['imagen_usuario']).'"  class="img-circle" class="user-image" /> ' 
                  ?>
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
        ESTADISTICAS 
</h1></center>

</section>

    <!-- Main content -->
    <section class="content"

    >

    <canvas id="canvas" style="position: relative; height: 80vh; width: 80vw;"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
    const ctx = document.getElementById('canvas').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
          $id = $datos['id_usuario'];
          $sqli = "SELECT * FROM articulo WHERE id_usuario = '$id'";
          $result = mysqli_query($con,$sqli);
          while ($registros = mysqli_fetch_array($result)){
          ?>
            '<?php echo $registros["nombre"]?>',
          <?php
          }
          ?>  
        ],
        datasets: [{
            label: 'Stock de productos',
            data: [
              <?php
              $id1= $datos['id_usuario'];
              $sqli1 = "SELECT * FROM articulo WHERE id_usuario = '$id1'";
              $resulto = mysqli_query($con,$sqli1);
              while ($registro = mysqli_fetch_array($resulto)){
              ?>
             '<?php echo $registro["stock"]?>',
              <?php
              }
              ?>  
                      
          ],
            backgroundColor: ['#6bf1ab','#63d69f','#438c6c','#509c7f','#1f794e','#34444c'],
            borderColor: ['black'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
    
    </script>

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
