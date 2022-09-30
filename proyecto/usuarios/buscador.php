<?php

include("../php/bd.php");
$con = conectar();
            //iniciar la carga de los datos directamente de la tabla
$articulos = mysqli_query($con, "SELECT * FROM articulo WHERE nombre LIKE LOWER('%".$_POST['busqueda']."%')");

            while ($mostrar = mysqli_fetch_assoc($articulos)) {

            ?>




              <div class="col-md-3 shop_box"><a href="single.html">
                  <?php echo '<img src="data:image/jpg;base64, ' . base64_encode($mostrar['foto_producto']) . '"  class="img-responsive" /> '
                  ?>

                  <span class="new-box">
                    <!--<span class="new-label">New</span>-->
                  </span>
                  <span class="sale-box">
                    <span class="sale-label">En venta</span>
                  </span>

                  <div class="shop_desc">
                    <td><?php echo $mostrar['nombre']; ?></td>


                    <p>
                      <td><?php echo $mostrar['descripcion']; ?></td>
                    </p>


                    <span class="actual"><?php echo number_format($mostrar['precio_venta'], 2, '.', ','); ?></span><br>

                    <ul class="buttons">
                      <li class="cart btn-warning"><a href="editar.php? id=<?php echo $mostrar['id_articulo'] ?>" name="agregar">añadir a carrito</a></li>
                      <li class="shop_btn btn-primary"><a href="producto_detallado.php? id=<?php echo $mostrar['id_articulo'] ?>" name="leer">Conoce más</a></li>
                      <div class="clear"> </div>
                    </ul>
                  </div>
                </a>
                <br>
                <BR>
              </div>

               



            <?php
            }
            ?>