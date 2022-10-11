<?php
include ("../php/bd.php");
include ("carrito.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
if($_POST){

    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }

        $sentencia = $pdo->prepare("INSERT INTO venta (id_venta, id_usuario, clavetransaccion, paypaldatos, fecha, correo, total, status_ve) 
        VALUES (NULL, '15', :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");

        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":Correo", $Correo);
        $sentencia->bindParam(":Total", $total);
        $sentencia->execute();
        $idVenta=$pdo->lastInsertId() ;

        foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $sentencia=$pdo->prepare("INSERT INTO detalle_venta (id_detalle_venta, id_venta, id_articulo, cantidad, precio, adquirido) 
        VALUES (NULL,:IDVENTA, :IDPRODUCTO, :cantidad, :precio, '0');");

        $sentencia->bindParam(":IDVENTA", $idVenta);
        $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
        $sentencia->bindParam(":cantidad", $producto['CANTIDAD']);
        $sentencia->bindParam(":precio", $producto['PRECIO']);
        $sentencia->execute();

        }

}
?>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<style>

    @media screen and (max-width:400px){
        #paypal-button-container{
            width: 100%;
        }
    }

    @media screen and (min-width: 400px){
        #paypal-button-container{
            width: 250px;
            display: inline-block;
        }
    }
</style>

<div class="jumbotron text-center">
    <br>
    <h1 class="display-4">¡ Paso Final !</h1>
    <hr class="my-4">
    <p class="lead"> Estas a punto de pagar con paypal la cantidad de: 
    <h4>$<?php echo number_format($total,2); ?></h4>
    <div id="paypal-button-container"></div>
    </p>
    <p>Los productos seran enviados una vez que se procese el pago</br>
    <strong>(Para aclaraciones :torrescamilo0024)</strong>
</p>
</div>


<script>

    paypal.button.render({

    env: 'sandbox', //sandbox | production

    style:{
        label: 'checkout',
        size: 'responsive',
        shape: 'pill',
        color: 'gold'
    },

    client: {
        sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXLewfBP4-8aqX3PiV8e1GWU6LiB2CUXLkA59kJXE7M6R',
        production: '<insert production client id>'
    },

    paymen: function(data, actions){
        return actions.payment.create({
            paymen: {
                transactions: [
                    {
                        amount: {total: '<?php echo $total;?>', currency: 'USD'}
                      }
                    ]
                }

            });
    },
    
    onAuthorize: function(data, actions){
        return actions.payment.execute().then(function() {
            window.alert('Payment complete!');
        });
    }
},   '#paypal-button-container');

</script>




</script>


