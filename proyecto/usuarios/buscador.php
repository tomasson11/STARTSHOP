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

                    <form action="" method="post">
                     <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($mostrar['id_articulo'],COD,KEY); ?>">
                     <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($mostrar['nombre'],COD,KEY); ?>">
                     <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($mostrar['precio_venta'],COD,KEY); ?>">
                     <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
                     

                    <button class="cart btn-warning" 
                    name="btnAccion"
                    value="AGREGAR"
                    type="submit"
                    >
                    Agregar al carrito
                    </button>
                    </form>
                  </div>
                </a>
                <br>
                <BR>
              </div>

               



            <?php
            }
            ?>