<?php
include("../php/bd.php");
$con = conectar();

include("carrito.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Cart - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>

</head>
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>
    <?php if(!empty($_SESSION['CARRITO'])) { ?>
    <table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">----</th>
        </tr>
        <?php $total=0 ;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="40%"><?php echo $producto['NOMBRE']?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center">$<?php echo $producto['PRECIO']?></td>
            <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
            <td width="5%">

            <form action="" method="post">

            <input type="hidden" name="id" id="id1" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">

                <button class="btn btn-danger" 
                name="btnAccion"
                value="Eliminar"
                type="submit"
                >Eliminar</button>
            </form>

        </tr> 
        <?php $total=$total + ($producto['PRECIO']*$producto['CANTIDAD'])  ;?>
        <?php }?> 
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3><?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="../usuarios/index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Regresar</a></td>
            <td colspan="2"></td>
            <td></td>
            <td><a href="#" class="btn btn-success btn-block">Continuar<i class="glyphicon glyphicon-menu-right"></i></a></td>
        </tr>
    </tfoot>
    </table>
    <?php }else{?>

        <div class="alert alert-success">

        no hay productos en el carrito...

        </div>

    <?php }?>    

</div>
</body>
</html>