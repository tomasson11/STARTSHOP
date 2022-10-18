<?php
include ("../php/bd.php");
include ("carrito.php");
?>


<?php
$id=$_GET['id'];
$status=$_GET['status'];
$creacion=$_GET['creacion'];
$email=$_GET['email'];
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$id_cliente=$_GET['id_cliente'];

if($_POST){
    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }

    $sentencia = $pdo->prepare("INSERT INTO venta (id_venta, id_usuario, clavetransaccion, paypaldatos, fecha, correo, total, status_ve) 
        VALUES (NULL, '15', :ClaveTransaccion, :PaypalDatos, NOW(), :Correo, :Total, :status1);");

        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":Correo", $Correo);
        $sentencia->bindParam(":Total", $total);
        $sentencia->bindParam(":status1", $status);
        $sentencia->bindParam(":PaypalDatos", $id);
        $sentencia->execute();
        $idVenta=$pdo->lastInsertId() ;

        foreach($_SESSION['CARRITO'] as $indice=>$producto){

            $sentencia=$pdo->prepare("INSERT INTO detalle_venta (id_detalle_venta, id_venta, id_articulo, cantidad, precio, adquirido) 
            VALUES (NULL,:IDVENTA, :IDPRODUCTO, :cantidad, :precio, :cantidad1);");
    
            $sentencia->bindParam(":IDVENTA", $idVenta);
            $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
            $sentencia->bindParam(":cantidad", $producto['CANTIDAD']);
            $sentencia->bindParam(":precio", $producto['PRECIO']);
            $sentencia->bindParam(":cantidad1", $producto['CANTIDAD']);
            $sentencia->execute();
    
            }

            unset($_SESSION['CARRITO']);

}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice with ribbon - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
			<div class="invoice-ribbon"><div class="ribbon-inner">PAGADO</div></div>
		    <div class="row">

				<div class="col-sm-6 top-left">
					<i class="fa fa-rocket"></i>
				</div>

				<div class="col-sm-6 top-right">
						<h3 class="marginright">FACTURA-<?php echo $idVenta;?> </h3>
						<span class="marginright"><?php echo $creacion;?></span>
			    </div>

			</div>
			<hr>
			<div class="row">

				<div class="col-xs-4 from">
					<p class="lead marginbottom">DE : Startshop</p>
					<p>Yarumal - Antioquia</p>
					<p>Central, 052030</p>
					<p>Celular: 3232964145</p>
					<p>Email: startshop12@gmail.com</p>
				</div>

				<div class="col-xs-4 to">
					<p class="lead marginbottom">PARA : <?php echo $nombre." ".$apellido;?></p>
					<p>Id: <?php echo $id;?> </p>
					<p>Cliente: <?php echo $id_cliente;?> </p>
					<p>Transaccion: <?php echo $SID;?> </p>
					<p>Email: <?php echo $email;?></p>

			    </div>

			    <div class="col-xs-4 text-right payment-details">
					<p class="lead marginbottom payment-info">Detalles del pago</p>
					<p>FECHA: <?php echo $creacion;?> </p>
					<p>STATUS: <?php echo $status;?> </p>
					<p>TOTAL: $<?php echo $total;?> </p>
					<p>CUENTA: <?php echo $id_cliente;?> </p>
			    </div>

			</div>
            <hr>
			<div class="row">
			<div class="col-xs-6 from">
				<p class="lead marginbottom">GRACIAS POR SU COMPRA!</p>

				<td><a href="index.php" class="btn btn-success btn-lg "><i class="glyphicon glyphicon-menu-left"></i> Regresar</a></td>
            
			</div>
			<div class="col-xs-6 text-right pull-right invoice-total">
					  <p>Subtotal : $<?php echo $total?></p>
			          <p>Total : $<?php echo $total?></p>
			</div>
			</div>

		  </div>
		</div>
	</div>
</div>
</div>

<style type="text/css">
body{margin-top:20px;
background:#eee;
}

/*Invoice*/
.invoice .top-left {
    font-size:65px;
	color:#3ba0ff;
}

.invoice .top-right {
	text-align:right;
	padding-right:20px;
}

.invoice .table-row {
	margin-left:-15px;
	margin-right:-15px;
	margin-top:25px;
}

.invoice .payment-info {
	font-weight:500;
}

.invoice .table-row .table>thead {
	border-top:1px solid #ddd;
}

.invoice .table-row .table>thead>tr>th {
	border-bottom:none;
}

.invoice .table>tbody>tr>td {
	padding:8px 20px;
}

.invoice .invoice-total {
	margin-right:-10px;
	font-size:16px;
}

.invoice .last-row {
	border-bottom:1px solid #ddd;
}

.invoice-ribbon {
	width:85px;
	height:88px;
	overflow:hidden;
	position:absolute;
	top:-1px;
	right:14px;
}

.ribbon-inner {
	text-align:center;
	-webkit-transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-ms-transform:rotate(45deg);
	-o-transform:rotate(45deg);
	position:relative;
	padding:7px 0;
	left:-5px;
	top:11px;
	width:120px;
	background-color:#66c591;
	font-size:15px;
	color:#fff;
}

.ribbon-inner:before,.ribbon-inner:after {
	content:"";
	position:absolute;
}

.ribbon-inner:before {
	left:0;
}

.ribbon-inner:after {
	right:0;
}

@media(max-width:575px) {
	.invoice .top-left,.invoice .top-right,.invoice .payment-details {
		text-align:center;
	}

	.invoice .from,.invoice .to,.invoice .payment-details {
		float:none;
		width:100%;
		text-align:center;
		margin-bottom:25px;
	}

	.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
		font-size:22px;
	}

	.invoice .btn {
		margin-top:10px;
	}
}

@media print {
	.invoice {
		width:900px;
		height:800px;
	}
}
</style>

<script type="text/javascript">

</script>
</body>
</html>