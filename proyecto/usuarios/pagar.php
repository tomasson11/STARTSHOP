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
$total=0;
foreach($_SESSION['CARRITO'] as $indice=>$producto){

$total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

}
?>
<script src="https://www.paypal.com/sdk/js?client-id=AV8BqABniBMpfvjum0FFpMVftTNzFT5NUqmbgZVbtlbpXLsC7tAmglg_tuWvLmVqrgBzKRVDh1K3Mo6G&currency=USD"></script>

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

paypal.Buttons({
       style:{
        shape: 'pill',
        label: 'pay',
       },

       createOrder: function(data,actions){
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: <?php echo $total;?>
              
            }
          }]
        })
       },
       onApprove: function(data,actions){
        let URL ='validar.php'
          actions.order.capture().then(function (detalles){

            console.log(detalles)

            window.location="validar.php?id="+detalles.id+"&status="+detalles.status+"&creacion="+detalles.create_time+"&email="+detalles.payer.email_address+"&nombre="+detalles.payer.name.given_name+"&apellido="
            +detalles.payer.name.surname+"&id_cliente="+detalles.payer.payer_id
        });

       },

       onCancel: function(data){
        alert("Pago cancelado");
        console.log(data);
       }
      
            
      }).render('#paypal-button-container');

</script>


